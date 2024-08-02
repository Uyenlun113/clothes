<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\DiscountCode;
use Darryldecode\Cart\Facades\CartFacade as Cart;

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
        return redirect()->back();

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
        $json['message'] = "success";
    } else {
        $json['discount_amount'] = '0';
        $json['payable_total'] = number_format(Cart::getSubTotal());
        $json['status'] = false;
        $json['message'] = "Mã giảm giá không tồn tại";
    }
    return response()->json($json);
}
}