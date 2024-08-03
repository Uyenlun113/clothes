@extends('layouts.app')
@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Thanh toán</h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <form action="{{ url('checkout/place_order') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-9">
                                <h4>Thông tin khách hàng</h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Tên *</label>
                                        <input type="text" name="first_name" class="form-control" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Họ *</label>
                                        <input type="text" name="last_name"class="form-control" required>
                                    </div>
                                </div>
                                <label>Địa chỉ *</label>
                                <input type="text" name="address_one" class="form-control"
                                    placeholder="House number and Street name" required>
                                <input type="text" name="address_two" class="form-control"
                                    placeholder="Appartments, suite, unit etc ..." required>
                                <label>Số điện thoại *</label>
                                <input type="tel" name="phone" class="form-control" required>
                                <label>Email *</label>
                                <input type="email" name="email" class="form-control" required>
                                <label>Ghi chú</label>
                                <textarea class="form-control" name="note" cols="30" rows="4"
                                    placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                            </div>
                            <aside class="col-lg-3">
                                <div class="summary">
                                    <h3 class="summary-title">Đơn hàng của bạn</h3>
                                    <table class="table table-summary">
                                        <thead>
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Tiền</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach (Cart::getContent() as $cart)
                                                @php
                                                    $getCartProduct = App\Models\Product::getProductById($cart->id);
                                                @endphp
                                                <tr>
                                                    <td><a href="{{ $getCartProduct->url }}">{{ $getCartProduct->name }}</a>
                                                    </td>
                                                    <td>{{ number_format($cart->price * $cart->quantity) }} đ</td>
                                                </tr>
                                            @endforeach
                                            <tr class="summary-subtotal">
                                                <td>Tổng tiền:</td>
                                                <td>{{ number_format(Cart::getSubTotal()) }} đ</td>
                                            </tr>
                                            <td colspan="2">
                                                <div class="cart-discount">
                                                    <div class="input-group">
                                                        <input type="text" id="getDiscountCode" name="discount_code"
                                                            class="form-control" placeholder="Mã giảm giá" />
                                                        <div class="input-group-append">
                                                            <button id="ApplyDiscount" style="height: 38px"
                                                                class="btn btn-outline-primary-2" type="button">
                                                                <i class="icon-long-arrow-right"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <tr class="summary-subtotal">
                                                <td>Giảm giá :</td>
                                                <td><span id="getDiscountAmount">0</span> </td>
                                            </tr>
                                            <tr>
                                                <td>Shipping:</td>
                                                <td>Đồng giá 25.000đ</td>
                                            </tr>
                                            <tr class="summary-total">
                                                <td>Tổng:</td>
                                                <td><span
                                                        id="getPayableTotal">{{ number_format(Cart::getSubTotal() + 25000) }}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="accordion-summary" id="accordion-payment">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="payment_method_cash" value="cash"
                                                name="payment_method" required class="custom-control-input">
                                            <label class="custom-control-label" for="payment_method_cash">Thanh toán khi
                                                nhận hàng</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="payment_method_online" value="paypal"
                                                name="payment_method" required class="custom-control-input">
                                            <label class="custom-control-label" for="payment_method_online">Thanh toán
                                                online</label>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                        <span class="btn-text">Place Order</span>
                                        <span class="btn-hover-text">Proceed to Checkout</span>
                                    </button>
                                </div>
                            </aside>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script>
        $(document).on('click', '#ApplyDiscount', function() {
            var discount_code = $('#getDiscountCode').val();
            $.ajax({
                type: "POST",
                url: "{{ url('checkout/apply_discount_code') }}",
                data: {
                    discount_code: discount_code,
                    "_token": "{{ csrf_token() }}",
                },
                dataType: "json",
                success: function(data) {
                    $('#getDiscountAmount').html(data.discount_amount + ' đ');
                    $('#getPayableTotal').html(data.payable_total + ' đ');
                    if (!data.status) {
                        alert(data.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Lỗi khi áp dụng mã giảm giá:', error);
                }
            });
        });
    </script>
@endsection
