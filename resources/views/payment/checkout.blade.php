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
                    <div class="checkout-discount">
                        <form action="#">
                            <input type="text" class="form-control" required id="checkout-discount-input">
                            <label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to
                                    enter your code</span></label>
                        </form>
                    </div><!-- End .checkout-discount -->
                    <form action="#">
                        <div class="row">
                            <div class="col-lg-9">
                                <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>First Name *</label>
                                        <input type="text" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Last Name *</label>
                                        <input type="text" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label>Company Name (Optional)</label>
                                <input type="text" class="form-control">

                                <label>Country *</label>
                                <input type="text" class="form-control" required>

                                <label>Street address *</label>
                                <input type="text" class="form-control" placeholder="House number and Street name"
                                    required>
                                <input type="text" class="form-control" placeholder="Appartments, suite, unit etc ..."
                                    required>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Town / City *</label>
                                        <input type="text" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>State / County *</label>
                                        <input type="text" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Postcode / ZIP *</label>
                                        <input type="text" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Phone *</label>
                                        <input type="tel" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label>Email address *</label>
                                <input type="email" class="form-control" required>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkout-create-acc">
                                    <label class="custom-control-label" for="checkout-create-acc">Create an account?</label>
                                </div><!-- End .custom-checkbox -->

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkout-diff-address">
                                    <label class="custom-control-label" for="checkout-diff-address">Ship to a different
                                        address?</label>
                                </div><!-- End .custom-checkbox -->

                                <label>Order notes (optional)</label>
                                <textarea class="form-control" cols="30" rows="4"
                                    placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                            </div><!-- End .col-lg-9 -->
                            <aside class="col-lg-3">
                                <div class="summary">
                                    <h3 class="summary-title">Đơn hàng của bạn</h3><!-- End .summary-title -->

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
                                            </tr><!-- End .summary-subtotal -->
                                            <td colspan="2">
                                                <div class="cart-discount">
                                                    <div class="input-group">
                                                        <input type="text" id="getDiscountCode" class="form-control"
                                                            placeholder="Mã giảm giá" />
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
                                    </table><!-- End .table table-summary -->

                                    <div class="accordion-summary" id="accordion-payment">
                                        <div class="card">
                                            <div class="card-header" id="heading-1">
                                                <h2 class="card-title">
                                                    <a role="button" data-toggle="collapse" href="#collapse-1"
                                                        aria-expanded="true" aria-controls="collapse-1">
                                                        Thanh toán khi nhận hàng
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-1" class="collapse show" aria-labelledby="heading-1"
                                                data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    Make your payment directly into our bank account. Please use your Order
                                                    ID as the payment reference. Your order will not be shipped until the
                                                    funds have cleared in our account.
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->
                                        <div class="card">
                                            <div class="card-header" id="heading-2">
                                                <h2 class="card-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        href="#collapse-2" aria-expanded="false"
                                                        aria-controls="collapse-2">
                                                        Thanh toán online
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-2" class="collapse" aria-labelledby="heading-2"
                                                data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    Ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque
                                                    volutpat mattis eros. Nullam malesuada erat ut turpis.
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->
                                    </div><!-- End .accordion -->

                                    <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                        <span class="btn-text">Place Order</span>
                                        <span class="btn-hover-text">Proceed to Checkout</span>
                                    </button>
                                </div><!-- End .summary -->
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    </form>
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
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
