<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Shop Clothes</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icons/favicon-16x16.png">
    <link rel="manifest" href="assets/images/icons/site.html">
    <link rel="mask-icon" href="assets/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="{{ url('assets/images/icons/favicon.ico') }}">

    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/plugins/magnific-popup/magnific-popup.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    @yield('style')
</head>

<body>
    <div class="page-wrapper">

        @include('layouts._header')
        @yield('content')
        @include('layouts._footer')
    </div>
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin"
                                        role="tab" aria-controls="signin" aria-selected="true">Đăng nhập</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register"
                                        role="tab" aria-controls="register" aria-selected="false">Đăng ký</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel"
                                    aria-labelledby="signin-tab">
                                    <form action="" id="SubmitFormLogin" method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="singin-email">Email *</label>
                                            <input type="text" class="form-control" id="singin-email" name="email"
                                                required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="singin-password">Password *</label>
                                            <input type="password" class="form-control" id="singin-password"
                                                name="password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>Đăng nhập</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>
                                            <a href="{{ url('forgot-password') }}" class="forgot-link">Forgot Your
                                                Password?</a>
                                        </div><!-- End .form-footer -->
                                    </form>
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="register" role="tabpanel"
                                    aria-labelledby="register-tab">
                                    <form action="" id="SubmitFormRegister" method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="register-name">Name *</label>
                                            <input type="text" class="form-control" name="name" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-email">Email *</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                required>
                                        </div><!-- End .form-group -->
                                        <div class="form-group">
                                            <label for="register-password">Password *</label>
                                            <input type="password" class="form-control" id="password"
                                                name="password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>Đăng kí</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>


                                        </div><!-- End .form-footer -->
                                    </form>

                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->

    <!-- Plugins JS File -->
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.hoverIntent.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ url('assets/js/superfish.min.js') }}"></script>
    <script src="{{ url('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Main JS File -->
    <script src="{{ url('assets/js/main.js') }}"></script>
    @yield('script')
    <script>
        $('body').on('submit', '#SubmitFormLogin', function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ url('auth_login') }}",
                data: $(this).serialize(),
                dataType: "json",
                success: function(data) {
                    alert(data.message);
                    if (data.status == true) {
                        location.reload();

                    }
                },
                error: function(xhr, status, error) {
                    // console.error('Error fetching subcategories:', error);
                }
            });

        })


        $('body').on('submit', '#SubmitFormRegister', function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ url('auth_register') }}",
                data: $(this).serialize(),
                dataType: "json",
                success: function(data) {
                    alert(data.message);
                    if (data.status == true) {
                        location.reload();

                    }
                },
                error: function(xhr, status, error) {
                    // console.error('Error fetching subcategories:', error);
                }
            });

        })
    </script>
</body>

</html>
