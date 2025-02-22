   <div class="products mb-3">
       <div class="row justify-content-center">
           @if (isset($getProduct) && $getProduct->count() > 0)
               @foreach ($getProduct as $value)
                   @php
                       $getProductImage = $value->getImageSingle($value->id);
                   @endphp
                   <div class="col-6 col-md-4 col-lg-4">
                       <div class="product product-7 text-center">
                           <figure class="product-media">
                               <span class="product-label label-new">New</span>
                               <a href="{{ url($value->url) }}">
                                   @if (!empty($getProductImage) && !empty($getProductImage->getLogo()))
                                       <img src="{{ $getProductImage->getLogo() }}" alt="Product image"
                                           class="product-image" style="width:100% ;height:320px">
                                   @endif
                               </a>
                               <div class="product-action-vertical">
                                   <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add
                                           to wishlist</span></a>
                               </div><!-- End .product-action-vertical -->
                               <div class="product-action">
                                   <a href="#" class="btn-product btn-cart"><span>add to
                                           cart</span></a>
                               </div><!-- End .product-action -->
                           </figure><!-- End .product-media -->
                           <div class="product-body">
                               <div class="product-cat">
                                   <a href="#">{{ $value->sub_name }}</a>
                               </div><!-- End .product-cat -->
                               <h3 class="product-title"><a href="{{ url($value->url) }}">{{ $value->name }}</a></h3>
                               <!-- End .product-title -->
                               <div class="product-price">
                                   {{ number_format($value->price) }}
                               </div><!-- End .product-price -->
                               <div class="ratings-container">
                                   <div class="ratings">
                                       <div class="ratings-val" style="width: 20%;"></div>
                                       <!-- End .ratings-val -->
                                   </div><!-- End .ratings -->
                                   <span class="ratings-text">( 2 Reviews )</span>
                               </div><!-- End .rating-container -->

                           </div><!-- End .product-body -->
                       </div><!-- End .product -->
                   </div><!-- End .col-sm-6 col-lg-4 -->
               @endforeach
           @else
               <p>Không có sản phẩm nào.</p>
           @endif

       </div><!-- End .row -->
   </div><!-- End .products -->
   <div style="padding: 10px;float: right;">
       {!! $getProduct->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
   </div>
