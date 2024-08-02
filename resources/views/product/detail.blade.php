@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ url('assets/css/plugins/nouislider/nouislider.css') }}">
@endsection

@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chi tiết sản phẩm</li>
                </ol>


            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="product-details-top mb-2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-gallery">
                                <figure class="product-main-image">
                                    @php
                                        $getProductImage = $getProductDetail->getImageSingle($getProductDetail->id);
                                    @endphp
                                    @if (!empty($getProductImage) && !empty($getProductImage->getLogo()))
                                        <img id="product-zoom" src="{{ $getProductImage->getLogo() }}"
                                            data-zoom-image="{{ $getProductImage->getLogo() }}" alt="product image"
                                            style="width:100% ;height:520px">

                                        <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                            <i class="icon-arrows"></i>
                                        </a>
                                    @endif
                                </figure><!-- End .product-main-image -->

                                <div id="product-zoom-gallery" class="product-image-gallery">
                                    @foreach ($getProductDetail->getImage as $image)
                                        <a class="product-gallery-item" href="#" data-image="{{ $image->getLogo() }}"
                                            data-zoom-image="{{ $image->getLogo() }}">
                                            <img src="{{ $image->getLogo() }}" alt="product side"
                                                style="width:100% ;height:150px">
                                        </a>
                                    @endforeach
                                </div><!-- End .product-image-gallery -->
                            </div><!-- End .product-gallery -->
                        </div><!-- End .col-md-6 -->

                        <div class="col-md-6" style="padding-left: 50px">
                            <div class="product-details">
                                <h1 class="product-title">{{ $getProductDetail->name }}</h1>
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div>
                                    </div>
                                    <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                                </div>
                                <div class="product-price">
                                    <span id="getTotalPrice">{{ number_format($getProductDetail->price) }} </span>đ
                                </div>
                                <div class="product-content">
                                    <p> {{ $getProductDetail->short_description }} </p>
                                </div>
                                <form action="{{ url('product/add-to-cart') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="product_id" value="{{ $getProductDetail->id }}"
                                        id="">
                                    <div class="details-filter-row details-row-size">
                                        <label for="size">Màu:</label>
                                        <div class="select-custom">
                                            <select name="color_id" id="color_id" required class="form-control">
                                                <option value="" selected="selected">Chọn màu</option>
                                                @foreach ($getProductDetail->getColor as $color)
                                                    @if ($color->getColor)
                                                        <option value="{{ $color->getColor->id }}">
                                                            {{ $color->getColor->name }}
                                                        </option>
                                                    @endif
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="details-filter-row details-row-size">
                                        <label for="size">Size:</label>
                                        <div class="select-custom">
                                            <select name="size_id" id="size" required
                                                class="form-control getSizePrice">
                                                <option data-price="0" value="#" selected="selected">Chọn size</option>
                                                @foreach ($getProductDetail->getSize as $size)
                                                    <option data-price="{{ !empty($size->price) ? $size->price : 0 }}"
                                                        value="{{ $size->id }}">{{ $size->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div><!-- End .select-custom -->


                                    </div><!-- End .details-filter-row -->

                                    <div class="details-filter-row details-row-size">
                                        <label for="qty">Qty:</label>
                                        <div class="product-details-quantity">
                                            <input type="number" id="qty" class="form-control" value="1"
                                                min="1" max="100" name="qty" required step="1"
                                                data-decimals="0" required>
                                        </div>
                                    </div>
                                    <div class="product-details-action">
                                        <button type="submit" class="btn-product btn-cart">add to cart</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-details-tab product-details-extended">
                <div class="container">
                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab"
                                role="tab" aria-controls="product-desc-tab" aria-selected="true">Mô tả</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab"
                                role="tab" aria-controls="product-review-tab" aria-selected="false">Đánh giá của
                                khách hàng</a>
                        </li>
                    </ul>
                </div><!-- End .container -->

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                        aria-labelledby="product-desc-link">
                        <div class="product-desc-content">
                            <div class="container">
                                <p> {{ $getProductDetail->description }}</p>
                            </div><!-- End .container -->
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->


                    <div class="tab-pane fade" id="product-review-tab" role="tabpanel"
                        aria-labelledby="product-review-link">
                        <div class="reviews">
                            <div class="container">
                                <h3>Reviews (2)</h3>
                                <div class="review">
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <h4><a href="#">Samanta J.</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 80%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                            </div><!-- End .rating-container -->
                                            <span class="review-date">6 days ago</span>
                                        </div><!-- End .col -->
                                        <div class="col">
                                            <h4>Good, perfect size</h4>

                                            <div class="review-content">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum
                                                    dolores assumenda asperiores facilis porro reprehenderit animi culpa
                                                    atque blanditiis commodi perspiciatis doloremque, possimus, explicabo,
                                                    autem fugit beatae quae voluptas!</p>
                                            </div><!-- End .review-content -->

                                            <div class="review-action">
                                                <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                                <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                            </div><!-- End .review-action -->
                                        </div><!-- End .col-auto -->
                                    </div><!-- End .row -->
                                </div><!-- End .review -->

                                <div class="review">
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <h4><a href="#">John Doe</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 100%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                            </div><!-- End .rating-container -->
                                            <span class="review-date">5 days ago</span>
                                        </div><!-- End .col -->
                                        <div class="col">
                                            <h4>Very good</h4>

                                            <div class="review-content">
                                                <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum blanditiis
                                                    laudantium iste amet. Cum non voluptate eos enim, ab cumque nam, modi,
                                                    quas iure illum repellendus, blanditiis perspiciatis beatae!</p>
                                            </div><!-- End .review-content -->

                                            <div class="review-action">
                                                <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                                <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                            </div><!-- End .review-action -->
                                        </div><!-- End .col-auto -->
                                    </div><!-- End .row -->
                                </div><!-- End .review -->
                            </div><!-- End .container -->
                        </div><!-- End .reviews -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .product-details-tab -->

            <div class="container">
                <h2 class="title text-center mb-4">Sản phẩm liên quan</h2><!-- End .title text-center -->
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                "nav": false, 
                "dots": true,
                "margin": 20,
                "loop": false,
                "responsive": {
                    "0": {
                        "items":1
                    },
                    "480": {
                        "items":2
                    },
                    "768": {
                        "items":3
                    },
                    "992": {
                        "items":4
                    },
                    "1200": {
                        "items":4,
                        "nav": true,
                        "dots": false
                    }
                }
            }'>
                    @if (isset($getRelatedProduct) && $getRelatedProduct->count() > 0)
                        @foreach ($getRelatedProduct as $item)
                            @php
                                $getProductImage = $item->getImageSingle($item->id);
                            @endphp
                            <div class="product product-7">
                                <figure class="product-media">
                                    <span class="product-label label-new">New</span>
                                    <a href="product.html">
                                        @if (!empty($getProductImage) && !empty($getProductImage->getLogo()))
                                            <img src="{{ $getProductImage->getLogo() }}" alt="Product image"
                                                class="product-image" style="width:100% ;height:320px">
                                        @endif
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add
                                                to wishlist</span></a>
                                        <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                            title="Quick view"><span>Quick view</span></a>
                                        <a href="#" class="btn-product-icon btn-compare"
                                            title="Compare"><span>Compare</span></a>
                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">{{ $item->sub_name }}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="{{ url($item->url) }}">{{ $item->name }}</a>
                                    </h3>
                                    <!-- End .product-title -->
                                    <div class="product-price">
                                        {{ number_format($item->price) }} đ
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 2 Reviews )</span>
                                    </div><!-- End .rating-container -->

                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        @endforeach
                    @else
                        <div>Không có sản phẩm nào !</div>
                    @endif
                </div><!-- End .owl-carousel -->
            </div><!-- End .container -->


        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
@section('script')
    <script src="{{ url('assets/js/bootstrap-input-spinner.js') }}"></script>
    <script src="{{ url('assets/js/jquery.elevateZoom.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap-input-spinner.js') }}"></script>
    <script src="{{ url('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script>
        $('.getSizePrice').change(function() {
            var product_price = '{{ $getProductDetail->price }}'
            var price = $('option:selected', this).attr('data-price');
            var total = parseFloat(product_price) + parseFloat(price);
            $('#getTotalPrice').html(total);
        })
    </script>
@endsection
