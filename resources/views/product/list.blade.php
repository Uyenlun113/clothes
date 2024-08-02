@extends('layouts.app')
@section('style')
    <style>
        .active-color {
            border: 3px solid #000 !important;
        }
    </style>
@endsection
@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                @if (!empty($getSubCategory))
                    <h1 class="page-title">{{ $getSubCategory->name }}</h1>
                @elseif(!empty($getCategory))
                    <h1 class="page-title">{{ $getCategory->name }}</h1>
                @else
                    <h1 class="page-title">Kết quả tìm kiếm :{{ Request::get('q') }}</h1>
                @endif
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    @if (!empty($getSubCategory))
                        <li class="breadcrumb-item " aria-current="page">{{ $getCategory->name }}</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $getSubCategory->name }}</li>
                    @elseif(!empty($getCategory))
                        <li class="breadcrumb-item active" aria-current="page">{{ $getCategory->name }}</li>
                    @endif
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="toolbox">
                            <div class="toolbox-left">
                            </div><!-- End .toolbox-left -->

                            <div class="toolbox-right">
                                <div class="toolbox-sort">
                                    <label for="sortby">Sort by:</label>
                                    <div class="select-custom">
                                        <select name="sortby" id="sortby" class="form-control">
                                            <option value="popularity" selected="selected">Most Popular</option>
                                            <option value="rating">Most Rated</option>
                                            <option value="date">Date</option>
                                        </select>
                                    </div>
                                </div><!-- End .toolbox-sort -->

                            </div><!-- End .toolbox-right -->
                        </div><!-- End .toolbox -->



                        <div id="getAjax">
                            @include('product._list')
                        </div>

                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3 order-lg-first">
                        <form action="" id="FilterForm" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="old_sub_category_id"
                                value="{{ !empty(Request::get('q')) ? Request::get('q') : '' }}">
                            <input type="hidden" name="old_sub_category_id"
                                value="{{ !empty($getSubCategory) ? $getSubCategory->id : '' }}">
                            <input type="hidden" name="old_category_id"
                                value="{{ !empty($getCategory) ? $getCategory->id : '' }}">
                            <input type="hidden" name="sub_category_id" id="get_sub_category_id">
                            <input type="hidden" name="color_id" id="get_color_id">
                        </form>
                        <div class="sidebar sidebar-shop">
                            <div class="widget widget-clean">
                                <label>Filters:</label>
                                <a href="#" class="sidebar-filter-clear">Clean All</a>
                            </div><!-- End .widget widget-clean -->

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true"
                                        aria-controls="widget-1">
                                        Category
                                    </a>
                                </h3><!-- End .widget-title -->

                                <div class="collapse show" id="widget-1">
                                    <div class="widget-body">
                                        <div class="filter-items filter-items-count">
                                            @isset($getSubFilter)
                                                @foreach ($getSubFilter as $filter)
                                                    <div class="filter-item">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input ChangeCategory"
                                                                value="{{ $filter->id }}" id="cat-{{ $filter->id }}">
                                                            <label class="custom-control-label"
                                                                for="cat-{{ $filter->id }}">{{ $filter->name }}</label>
                                                        </div><!-- End .custom-checkbox -->

                                                    </div><!-- End .filter-item -->
                                                @endforeach
                                            @endisset

                                        </div><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->



                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true"
                                        aria-controls="widget-3">
                                        Colour
                                    </a>
                                </h3><!-- End .widget-title -->
                                @if (!empty($getColor))
                                    <div class="collapse show" id="widget-3">
                                        <div class="widget-body">
                                            <div class="filter-colors">
                                                @foreach ($getColor as $color)
                                                    <a href="javascript:;" id="{{ $color->id }}" class="ChangeColor"
                                                        data-val="0" style="background: {{ $color->code }};">
                                                        <span class="sr-only">{{ $color->name }}</span>
                                                    </a>
                                                @endforeach
                                            </div>


                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                @endif
                            </div><!-- End .widget -->



                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true"
                                        aria-controls="widget-5">
                                        Price
                                    </a>
                                </h3><!-- End .widget-title -->

                                <div class="collapse show" id="widget-5">
                                    <div class="widget-body">
                                        <div class="filter-price">
                                            <div class="filter-price-text">
                                                Price Range:
                                                <span id="filter-price-range"></span>
                                            </div><!-- End .filter-price-text -->

                                            <div id="price-slider"></div><!-- End #price-slider -->
                                        </div><!-- End .filter-price -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->
                        </div><!-- End .sidebar sidebar-shop -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
@section('script')
    <script>
        $('.ChangeCategory').change(function() {
            var ids = '';
            $('.ChangeCategory').each(function() {
                if (this.checked) {
                    var id = $(this).val();
                    ids += id + ','

                }
            });
            $('#get_sub_category_id').val(ids)
            FilterForm();
        })
        $('.ChangeColor').click(function() {
            var id = $(this).attr('id');
            var status = $(this).attr('data-val');
            if (status == 0) {
                $(this).attr('data-val', 1);
                $(this).addClass('active-color'); // Chuyển this thành $(this)
            } else {
                $(this).attr('data-val', 0);
                $(this).removeClass('active-color'); // Chuyển this thành $(this)
            }
            var ids = ''
            $('.ChangeColor').each(function() {
                var status = $(this).attr('data-val');
                if (status == 1) {
                    var id = $(this).attr('id');
                    ids += id + ','

                }
            });
            $('#get_color_id').val(ids)
            FilterForm();

        });
        var xhr;

        function FilterForm() {
            if (xhr && xhr.readyState != 4) {
                xhr.abort();
            }
            xhr = $.ajax({
                type: "POST",
                url: "{{ url('get_product_ajax') }}",
                data: $('#FilterForm').serialize(),
                dataType: "json",
                success: function(data) {
                    $('#getAjax').html(data.success)
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching subcategories:', error);
                }
            });


        }
    </script>
@endsection
