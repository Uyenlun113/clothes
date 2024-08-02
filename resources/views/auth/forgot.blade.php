@extends('layouts.app')
@section('content')
    <main class="main">
        <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17"
            style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
            <div class="container">
                <div class="form-box">
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab"
                                    aria-controls="signin-2" aria-selected="false">Quên mật khẩu</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
                                @include('layouts._message')
                                <form action="" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="singin-email-2">Email *</label>
                                        <input type="email" class="form-control" id="singin-email-2" name="email"
                                            required>
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>Gửi yêu cầu</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
