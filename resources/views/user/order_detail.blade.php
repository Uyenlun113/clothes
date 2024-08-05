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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold" for="">ID: {{ $detail->id }}</label>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold" for="">Name : {{ $detail->first_name }}
                                            {{ $detail->last_name }}</label>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold" for="">address one :
                                            {{ $detail->address_one }}</label>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold" for="">address two :
                                            {{ $detail->address_two }}</label>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold" for="">phone :
                                            {{ $detail->phone }}</label>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold" for="">email :
                                            {{ $detail->email }}</label>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold" for="">note : {{ $detail->note }}</label>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold" for="">payment_method :
                                            {{ $detail->payment_method }}</label>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold" for="">discount_code :
                                            {{ $detail->discount_code }}
                                        </label>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold" for="">discount_amount :
                                            {{ number_format($detail->discount_amount) }}</label>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold" for="">total_amount :
                                            {{ number_format($detail->total_amount) }} đ</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Image</th>
                                                <th>Product name</th>
                                                <th>quantity</th>
                                                <th>color_name</th>
                                                <th>size_name</th>
                                                <th>total_price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($detail->getItem as $value)
                                                @php
                                                    $getProductImage = $value->getProduct->getImageSingle(
                                                        $value->getProduct->id,
                                                    );
                                                @endphp
                                                <tr class="align-middle">
                                                    <td>{{ $value->id }}</td>
                                                    <td><img src="{{ $getProductImage->getLogo() }}"
                                                            alt=""width="80px" height="80px">
                                                    </td>
                                                    <td>{{ $value->getProduct->name }}</td>
                                                    <td>{{ $value->quantity }}</td>
                                                    <td>{{ $value->color_name }} </td>
                                                    <td>{{ $value->size_name }}</td>
                                                    <td>{{ number_format($value->total_price) }} đ</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>

                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .dashboard -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
