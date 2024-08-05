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
                            <h4>Thay đổi mật khẩu</h4>
                            <div class="row">

                                <form action="" method="POST">
                                    {{ csrf_field() }}
                                    <div class="col-sm-12">
                                        <label>Mật khẩu cũ *</label>
                                        <input type="password" name="old_password" class="form-control" required>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Mật khẩu mới *</label>
                                        <input type="password" name="password"class=" form-control" required>
                                        <button type="submit" class="btn btn-info ">Save</button>
                                    </div>

                                </form>
                            </div>
                        </div><!-- End .col-lg-9 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .dashboard -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
