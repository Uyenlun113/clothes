@extends('layouts.app')
@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">My Account<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">My Account</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="dashboard">
                <div class="container">
                    <div class="row">
                        @include('user._sidebar')
                        <div class="col-md-8">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>payment method</th>
                                        <th>discount amount</th>
                                        <th>total amount</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getOrder as $value)
                                        <tr class="align-middle">
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->payment_method }}</td>
                                            <td>{{ number_format($value->discount_amount) }} đ</td>
                                            <td>{{ number_format($value->total_amount) }} đ</td>
                                            <td>
                                                @if ($value->status == 0)
                                                    Chờ xác nhận
                                                @elseif($value->status == 1)
                                                    Đã xác nhận
                                                @elseif($value->status == 2)
                                                    Đang giao
                                                @elseif($value->status == 3)
                                                    Đã hoàn thành
                                                @elseif($value->status == 4)
                                                    Đã hủy
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('user/order/detail/' . $value->id) }}"
                                                    class="btn btn-warning">Chi
                                                    tiết</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!-- End .col-lg-9 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .dashboard -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
