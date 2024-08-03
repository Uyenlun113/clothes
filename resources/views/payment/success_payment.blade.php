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
            </div>
        </nav>
        <div class="page-content">
            <div class="checkout">

                <div class="container">
                    <div style="display:flex;justify-content: center">
                        <form action="{{ url('paypal/success-payment') }}" method="POST">
                            @csrf
                            <input type="hidden" name="order_id" value="{{ base64_encode($order_id) }}">
                            <button type="submit" class="btn btn-info">Xác nhận đã thanh toán</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
@endsection
