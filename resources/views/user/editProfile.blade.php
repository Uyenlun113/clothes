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
                        <div class="col-md-8 col-lg-9">
                            @include('layouts._message')
                            <form action="" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-9">
                                        <h4>Thông tin </h4>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Tên *</label>
                                                <input type="text" value="{{ $getRecord->name }}" name="name"
                                                    class="form-control" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Họ *</label>
                                                <input type="text" value="{{ $getRecord->last_name }}"
                                                    name="last_name"class="form-control" required>
                                            </div>
                                        </div>
                                        <label>Địa chỉ *</label>
                                        <input type="text" value="{{ $getRecord->address_one }}" name="address_one"
                                            class="form-control" placeholder="House number and Street name" required>
                                        <input type="text" value="{{ $getRecord->address_two }}" name="address_two"
                                            class="form-control" placeholder="Appartments, suite, unit etc ..." required>
                                        <label>Số điện thoại *</label>
                                        <input type="tel" value="{{ $getRecord->phone }}" name="phone"
                                            class="form-control" required>
                                        <label>Email *</label>
                                        <input type="email" value="{{ $getRecord->email }}" name="email"
                                            class="form-control" required>
                                        <button type="submit" class="btn btn-info ">Save</button>
                                    </div>

                                </div>
                            </form>
                        </div><!-- End .col-lg-9 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .dashboard -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
