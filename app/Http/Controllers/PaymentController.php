<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\DiscountCode;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\Order;
use App\Models\Color;
use App\Models\Orderitem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    public function cart(Request $request)
    {
        return view('payment.cart');
    }

    public function addToCart(Request $request)
    {

        $getProduct = Product::getProductById($request->product_id);
        $total = $getProduct->price;
        if (!empty($request->size_id)) {
            $size_id = $request->size_id;
            $getSize = ProductSize::getSingle($size_id);
            $size_price = !empty($getSize->price) ? $getSize->price : 0;
            $total = $total + $size_price;
        } else {
            $size_id = 0;
        }
        $color_id = !empty($request->color_id) ? $request->color_id : 0;

        Cart::add([
            'id' => $getProduct->id,
            'name' => 'Product',
            'price' => $total,
            'quantity' => $request->qty,
            'attributes' => array(
                'size_id' => $size_id,
                'color_id' => $color_id,
            ),
        ]);
        return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng');

    }

    public function cartDelete($id)
    {
        Cart::remove($id);
        return redirect()->back();

    }

    public function cartUpdate(Request $request)
    {
        foreach ($request->cart as $cart) {
            Cart::update(
                $cart['id'],
                array(
                    'quantity' => array(
                        'relative' => false,
                        'value' => $cart['qty']
                    ),
                )
            );
        }
        return redirect()->back();
    }

    public function checkout(Request $request)
    {
        return view('payment.checkout');
    }

    public function apply_discount_code(Request $request)
    {
        $getDiscount = DiscountCode::checkDiscount($request->discount_code);
        if (!empty($getDiscount)) {
            $total = Cart::getSubTotal() + 25000;
            if ($getDiscount->type == 'Amount') {
                $discount_amount = $getDiscount->percent_amount;
                $payable_total = $total - $getDiscount->percent_amount;
            } else {
                $discount_amount = ($total * $getDiscount->percent_amount) / 100;
                $payable_total = $total - $discount_amount;
            }
            $json['discount_amount'] = number_format($discount_amount);
            $json['payable_total'] = number_format($payable_total);
            $json['status'] = true;
            $json['message'] = 'success';
        } else {
            $json['discount_amount'] = '0';
            $json['payable_total'] = number_format(Cart::getSubTotal());
            $json['status'] = false;
            $json['message'] = 'Mã giảm giá không tồn tại';
        }
        return response()->json($json);
    }

    public function checkout_place_order(Request $request)
    {
        $payable_total = Cart::getSubTotal() + 25000;
        $discount_amount = 0;
        $discount_code = '';

        if (!empty($request->discount_code)) {
            $getDiscount = DiscountCode::checkDiscount($request->discount_code);
            if (!empty($getDiscount)) {
                $discount_code = $request->discount_code;
                if ($getDiscount->type == 'Amount') {
                    $discount_amount = $getDiscount->percent_amount;
                    $payable_total = $payable_total - $getDiscount->percent_amount;
                } else {
                    $discount_amount = ($payable_total * $getDiscount->percent_amount) / 100;
                    $payable_total = $payable_total - $discount_amount;
                }
            }
        }

        $order = new Order;
        $order->first_name = trim($request->first_name);
        $order->user_id = Auth::id();
        $order->last_name = trim($request->last_name);
        $order->address_one = trim($request->address_one);
        $order->address_two = trim($request->address_two);
        $order->phone = trim($request->phone);
        $order->email = trim($request->email);
        $order->note = trim($request->note);
        $order->payment_method = trim($request->payment_method);
        $order->discount_amount = trim($discount_amount);
        $order->discount_code = trim($discount_code);
        $order->total_amount = trim($payable_total);
        $order->save();

        foreach (Cart::getContent() as $key => $cart) {
            $order_item = new Orderitem;
            $order_item->order_id = $order->id;
            $order_item->product_id = $cart->id;
            $order_item->quantity = $cart->quantity;
            $order_item->price = $cart->price;
            $color_id = $cart->attributes->color_id;
            $size_id = $cart->attributes->size_id;
            if (!empty($color_id)) {
                $getColor = Color::getColorById($color_id);
                $order_item->color_name = $getColor->name;
            }
            if (!empty($size_id)) {
                $getSize = ProductSize::getSingle($size_id);
                $order_item->size_name = $getSize->name;
                $order_item->size_amount = $getSize->price;
            }
            $order_item->total_price = $cart->price;
            $order_item->save();
        }
        return redirect('checkout/payment?order_id=' . base64_encode($order->id));
    }



    public function checkout_payment(Request $request)
    {
        if (!empty(Cart::getSubTotal()) && !empty($request->order_id)) {
            $order_id = base64_decode($request->order_id);
            $getOrder = Order::getSingle($order_id);
            if (!empty($getOrder)) {
                if ($getOrder->payment_method == 'cash') {
                    $getOrder->is_payment = 1;
                    $getOrder->save();
                    Cart::clear();
                    return redirect('cart')->with('success', 'Đặt hàng thành công');
                } else if ($getOrder->payment_method == 'paypal') {
                    function execPostRequest($url, $data)
                    {
                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt(
                            $ch,
                            CURLOPT_HTTPHEADER,
                            array(
                                'Content-Type: application/json',
                                'Content-Length: ' . strlen($data)
                            )
                        );
                        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                        $result = curl_exec($ch);
                        curl_close($ch);
                        return $result;
                    }


                    $extraData = "";
                    $partnerCode = 'MOMOBKUN20180529';
                    $accessKey = 'klm05TvNBzhg7h7j';
                    $serectkey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
                    $orderId = time() . "";
                    $orderInfo = "Thanh toán qua MoMo";
                    $amount = $getOrder->total_amount;
                    $ipnUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
                    $redirectUrl = "http://localhost/asm_php3/paypal/success-payment?order_id=" . $orderInfo . "&amount=" . $amount;
                    $extraData = "";
                    $requestId = time() . "";
                    $requestType = "payWithATM";
                    $extraData = "";
                    $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                    $signature = hash_hmac("sha256", $rawHash, $serectkey);
                    $data = array(
                        'partnerCode' => $partnerCode,
                        'partnerName' => "Test",
                        "storeId" => "MomoTestStore",
                        'requestId' => $requestId,
                        'amount' => $amount,
                        'orderId' => $orderId,
                        'orderInfo' => $orderInfo,
                        'redirectUrl' => $redirectUrl,
                        'ipnUrl' => $ipnUrl,
                        'lang' => 'vi',
                        'extraData' => $extraData,
                        'requestType' => $requestType,
                        'signature' => $signature
                    );
                    $result = execPostRequest("https://test-payment.momo.vn/v2/gateway/api/create", json_encode($data));
                    $jsonResult = json_decode($result, true); 
                    return Redirect::to($jsonResult['payUrl']);

                } else {
                    abort(404);
                }

            } else {
                abort(404);
            }

        }
    }

    public function paypal_success_payment(Request $request)
    {
        
    }



}