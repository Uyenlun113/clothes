@extends('layouts.app')
@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Giỏ hàng</h1>
            </div>
            <!-- End .container -->
        </div>
        <!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Giỏ hàng
                    </li>
                </ol>
            </div>
            <!-- End .container -->
        </nav>
        <!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="cart">
                <div class="container">
                    @if (!empty(Cart::getContent()->count()))
                        <div class="row">
                            <div class="col-lg-9">
                                <form action="{{ url('update_cart') }}" method="POST">
                                    {{ csrf_field() }}
                                    <table class="table table-cart table-mobile">
                                        <thead>
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Giá</th>
                                                <th>Số lượng</th>
                                                <th>Tổng tiền</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        @foreach (Cart::getContent() as $key => $cart)
                                            @php
                                                $getCartProduct = App\Models\Product::getProductById($cart->id);
                                                $getProductImage = $getCartProduct->getImageSingle($cart->id);
                                            @endphp
                                            <tbody>
                                                <tr>
                                                    <td class="product-col">
                                                        <div class="product">
                                                            <figure class="product-media">
                                                                <a href="#">
                                                                    <img src="{{ $getProductImage->getLogo() }}"
                                                                        alt="Product image" />
                                                                </a>
                                                            </figure>

                                                            <h3 class="product-title">
                                                                <a
                                                                    href="{{ $getCartProduct->url }}">{{ $getCartProduct->name }}</a>
                                                            </h3>
                                                            <!-- End .product-title -->
                                                        </div>
                                                        <!-- End .product -->
                                                    </td>
                                                    <td class="price-col">{{ number_format($cart->price) }} đ</td>
                                                    <td class="quantity-col">
                                                        <div class="cart-product-quantity">
                                                            <input type="number" class="form-control"
                                                                value="{{ $cart->quantity }}"
                                                                name="cart[{{ $key }}][qty]" min="1"
                                                                max="100" step="1" data-decimals="0" required />
                                                        </div>
                                                        <input type="hidden" value="{{ $cart->id }}"
                                                            name="cart[{{ $key }}][id]" />
                                                    </td>
                                                    <td class="total-col">
                                                        {{ number_format($cart->price * $cart->quantity) }} đ</td>
                                                    <td class="remove-col">
                                                        <a href="{{ url('cart/delete/' . $cart->id) }}" class="btn-remove">
                                                            <i class="icon-close"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="cart-bottom">
                                        <button type="submit" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i
                                                class="icon-refresh"></i></button>
                                    </div>
                                </form>
                            </div>
                            <!-- End .col-lg-9 -->
                            <aside class="col-lg-3">
                                <div class="summary summary-cart">
                                    <h3 class="summary-title">Cart Total</h3>
                                    <!-- End .summary-title -->

                                    <table class="table table-summary">
                                        <tbody>
                                            <tr class="summary-subtotal">
                                                <td>Tổng tiền :</td>
                                                <td>{{ number_format(Cart::getSubTotal()) }} đ</td>
                                            </tr>
                                            <tr class="summary-total">
                                                <td>Total:</td>
                                                <td>{{ number_format(Cart::getSubTotal()) }} đ</td>
                                            </tr>
                                            <!-- End .summary-total -->
                                        </tbody>
                                    </table>
                                    <!-- End .table table-summary -->

                                    <a href="{{ url('checkout') }}"
                                        class="btn btn-outline-primary-2 btn-order btn-block">Thanh
                                        toán</a>
                                </div>
                                <!-- End .summary -->

                                <a href="{{ url('') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>Tiếp tục
                                        mua
                                        hàng</span><i class="icon-refresh"></i></a>
                            </aside>
                            <!-- End .col-lg-3 -->
                        </div>
                    @else
                        <p>Không có sản phẩm trong giỏ hàng !</p>
                    @endif
                </div>
                <!-- End .container -->
            </div>
            <!-- End .cart -->
        </div>
        <!-- End .page-content -->
    </main>
@endsection
