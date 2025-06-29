@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div id="page-content">
        <!--Home slider-->
        <div class="slideshow slideshow-wrapper pb-section sliderFull">
            <div class="home-slideshow">
                <div class="slide">
                    <div class="blur-up lazyload bg-size">
                        <img class="blur-up lazyload bg-img" data-src="assets/images/home-images/hm-24.jpg"
                            src="assets/images/home-images/hm-24.jpg" alt="Shop Our New Collection"
                            title="Shop Our New Collection" />
                        <div class="slideshow__text-wrap slideshow__overlay classic bottom">
                            <div class="slideshow__text-content bottom">
                                <div class="wrap-caption center">
                                    <h2 class="h1 mega-title slideshow__title">Shop Our <span>New Collection</span>
                                    </h2>
                                    <span class="mega-subtitle slideshow__subtitle">From Hight to low, classic or
                                        modern. We have you covered</span>
                                    <span class="btn">Shop now</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="blur-up lazyload bg-size">
                        <img class="blur-up lazyload bg-img" data-src="assets/images/home-images/hm-1.jpg"
                            alt="Summer Bikini Collection" title="Summer Bikini Collection"
                            src="assets/images/home-images/hm-1.jpg" />
                        <div class="slideshow__text-wrap slideshow__overlay classic bottom">
                            <div class="slideshow__text-content bottom">
                                <div class="wrap-caption center">
                                    <h2 class="h1 mega-title slideshow__title">Shop Our <span>New Collection</span>
                                    </h2>
                                    <span class="mega-subtitle slideshow__subtitle">Save up to 50% off this weekend
                                        only</span>
                                    <span class="btn">Shop now</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Home slider-->
        <!--Collection Tab slider-->
        <div class="tab-slider-product section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-header text-center">
                            <h2 class="h2">New Arrivals</h2>
                            <p>Browse the huge variety of our products</p>
                        </div>
                        <div class="tabs-listing">
                            <ul class="tabs clearfix">
                                <li class="active" rel="tab1">Women</li>
                                <li rel="tab2">Men</li>
                                <li rel="tab3">Sale</li>
                            </ul>
                          
                            <div class="tab_container">
                                <div id="tab1" class="tab_content grid-products">
                                    <div class="productSlider">
                                        @foreach($data as $d)
                                      
                                        <div class="col-12 item">
                                            <!-- start product image -->
                                            <div class="product-image">
                                                <!-- start product image -->
                                                <a href="{{ url('product/'.$d->id) }}">

                                                    <!-- image -->
                                                    <img class="primary blur-up lazyload"
                                                        data-src="{{asset('storage/'.$d->image)}}"
                                                        src="{{asset('storage/'.$d->image)}}" alt="image"
                                                        title="product">
                                                    <!-- End image -->
                                                    <!-- Hover image -->
                                                    <img class="hover blur-up lazyload"
                                                        data-src="{{asset('storage/'.$d->image)}}"
                                                        src="{{asset('storage/'.$d->image)}}" alt="image"
                                                        title="product">
                                                    <!-- End hover image -->
                                                    <!-- product label -->
                                                    <div class="product-labels rectangular"><span
                                                            class="lbl on-sale">-16%</span> <span
                                                            class="lbl pr-label1">new</span></div>
                                                    <!-- End product label -->
                                                </a>
                                                <!-- end product image -->

                                                <!-- countdown start -->
                                                <!-- <div class="saleTime desktop" data-countdown="2022/03/01"></div> -->
                                                <!-- countdown end -->

                                                <!-- Start product button -->
                                                <form class="variants add" action="#"
                                                    onclick="window.location.href='cart.html'" method="post">
                                                    <button class="btn btn-addto-cart" type="button" tabindex="0">Add To
                                                        Cart</button>
                                                </form>
                                                <div class="button-set">
                                                    <a href="javascript:void(0)" title="Quick View"
                                                        class="quick-view-popup quick-view" data-toggle="modal"
                                                        data-target="#content_quickview">
                                                        <i class="icon anm anm-search-plus-r"></i>
                                                    </a>
                                                    <div class="wishlist-btn">
                                                        <a class="wishlist add-to-wishlist" href="wishlist.html">
                                                            <i class="icon anm anm-heart-l"></i>
                                                        </a>
                                                    </div>
                                                    <div class="compare-btn">
                                                        <a class="compare add-to-compare" href="compare.html"
                                                            title="Add to Compare">
                                                            <i class="icon anm anm-random-r"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- end product button -->
                                            </div>
                                            <!-- end product image -->
                                            <!--start product details -->
                                            <div class="product-details text-center">
                                                <!-- product name -->
                                                <div class="product-name">
                                                    <a href="short-description.html">{{$d->name}}</a>
                                                </div>
                                                <!-- End product name -->
                                                <!-- product price -->
                                                <div class="product-price">
                                                   <span class="old-price">₹{{$d->price}}</span>
                                                    <span class="price">₹{{$d->discount_price}}</span>

                                                </div>
                                                <!-- End product price -->

                                                <div class="product-review">
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star-o"></i>
                                                    <i class="font-13 fa fa-star-o"></i>
                                                </div>
                                                <!-- Variant -->
                                                <ul class="swatches">
                                                    <li class="swatch medium rounded"><img
                                                            src="assets/images/home-images/hm-1.jpg" alt="image" width="50"
                                                            height="50" /></li>
                                                    <li class="swatch medium rounded"><img
                                                            src="assets/images/home-images/hm-1.jpg" alt="image" width="50"
                                                            height="50" /></li>
                                                    <li class="swatch medium rounded"><img
                                                            src="assets/images/home-images/hm-1.jpg" alt="image" width="50"
                                                            height="50" /></li>
                                                    <li class="swatch medium rounded"><img
                                                            src="assets/images/home-images/hm-1.jpg" alt="image" width="50"
                                                            height="50" /></li>
                                                    <li class="swatch medium rounded"><img
                                                            src="assets/images/home-images/hm-1.jpg" alt="image" width="50"
                                                            height="50" /></li>

                                                </ul>
                                                <!-- End Variant -->
                                            </div>
                                            <!-- End product details -->
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div id="tab2" class="tab_content grid-products">
                                    <div class="productSlider">
                                        <div class="col-12 item">
                                            <!-- start product image -->
                                            <div class="product-image">
                                                <!-- start product image -->
                                                <a href="short-description.html">
                                                    <!-- image -->
                                                    <img class="primary blur-up lazyload"
                                                        data-src="assets/images/home-images/hm-14.jpg"
                                                        src="assets/images/home-images/hm-14.jpg" alt="image"
                                                        title="product">
                                                    <!-- End image -->
                                                    <!-- Hover image -->
                                                    <img class="hover blur-up lazyload"
                                                        data-src="assets/images/home-images/hm-14.jpg"
                                                        src="assets/images/home-images/hm-14.jpg" alt="image"
                                                        title="product">
                                                    <!-- End hover image -->
                                                    <!-- product label -->
                                                    <div class="product-labels rectangular"><span
                                                            class="lbl on-sale">-16%</span> <span
                                                            class="lbl pr-label1">new</span></div>
                                                    <!-- End product label -->
                                                </a>
                                                <!-- end product image -->

                                                <!-- Start product button -->
                                                <form class="variants add" action="#"
                                                    onclick="window.location.href='cart.html'" method="post">
                                                    <button class="btn btn-addto-cart" type="button" tabindex="0">Add To
                                                        Cart</button>
                                                </form>
                                                <div class="button-set">
                                                    <a href="javascript:void(0)" title="Quick View"
                                                        class="quick-view-popup quick-view" data-toggle="modal"
                                                        data-target="#content_quickview">
                                                        <i class="icon anm anm-search-plus-r"></i>
                                                    </a>
                                                    <div class="wishlist-btn">
                                                        <a class="wishlist add-to-wishlist" href="wishlist.html">
                                                            <i class="icon anm anm-heart-l"></i>
                                                        </a>
                                                    </div>
                                                    <div class="compare-btn">
                                                        <a class="compare add-to-compare" href="compare.html"
                                                            title="Add to Compare">
                                                            <i class="icon anm anm-random-r"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- end product button -->
                                            </div>
                                            <!-- end product image -->

                                            <!--start product details -->
                                            <div class="product-details text-center">
                                                <!-- product name -->
                                                <div class="product-name">
                                                    <a href="short-description.html">Zipper Jacket</a>
                                                </div>
                                                <!-- End product name -->
                                                <!-- product price -->
                                                <div class="product-price">
                                                    <span class="price">$788.00</span>
                                                </div>
                                                <!-- End product price -->

                                                <div class="product-review">
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star-o"></i>
                                                    <i class="font-13 fa fa-star-o"></i>
                                                </div>
                                            </div>
                                            <!-- End product details -->
                                        </div>
                                        <div class="col-12 item">
                                            <!-- start product image -->
                                            <div class="product-image">
                                                <!-- start product image -->
                                                <a href="short-description.html">
                                                    <!-- image -->
                                                    <img class="primary blur-up lazyload"
                                                        data-src="assets/images/home-images/hm-9.jpg"
                                                        src="assets/images/home-images/hm-9.jpg" alt="image"
                                                        title="product">
                                                    <!-- End image -->
                                                    <!-- Hover image -->
                                                    <img class="hover blur-up lazyload"
                                                        data-src="assets/images/home-images/hm-9.jpg"
                                                        src="assets/images/home-images/hm-9.jpg" alt="image"
                                                        title="product">
                                                    <!-- End hover image -->
                                                </a>
                                                <!-- end product image -->

                                                <!-- Start product button -->
                                                <form class="variants add" action="#"
                                                    onclick="window.location.href='cart.html'" method="post">
                                                    <button class="btn btn-addto-cart" type="button" tabindex="0">Select
                                                        Options</button>
                                                </form>
                                                <div class="button-set">
                                                    <a href="javascript:void(0)" title="Quick View"
                                                        class="quick-view-popup quick-view" data-toggle="modal"
                                                        data-target="#content_quickview">
                                                        <i class="icon anm anm-search-plus-r"></i>
                                                    </a>
                                                    <div class="wishlist-btn">
                                                        <a class="wishlist add-to-wishlist" href="wishlist.html">
                                                            <i class="icon anm anm-heart-l"></i>
                                                        </a>
                                                    </div>
                                                    <div class="compare-btn">
                                                        <a class="compare add-to-compare" href="compare.html"
                                                            title="Add to Compare">
                                                            <i class="icon anm anm-random-r"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- end product button -->
                                            </div>
                                            <!-- end product image -->

                                            <!--start product details -->
                                            <div class="product-details text-center">
                                                <!-- product name -->
                                                <div class="product-name">
                                                    <a href="short-description.html">Zipper Jacket</a>
                                                </div>
                                                <!-- End product name -->
                                                <!-- product price -->
                                                <div class="product-price">
                                                    <span class="price">$748.00</span>
                                                </div>
                                                <!-- End product price -->
                                                <div class="product-review">
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                </div>
                                            </div>
                                            <!-- End product details -->
                                        </div>
                                        <div class="col-12 item">
                                            <!-- start product image -->
                                            <div class="product-image">
                                                <!-- start product image -->
                                                <a href="short-description.html">
                                                    <!-- image -->
                                                    <img class="primary blur-up lazyload"
                                                        data-src="assets/images/home-images/hm-11.jpg"
                                                        src="assets/images/home-images/hm-11.jpg" alt="image"
                                                        title="product">
                                                    <!-- End image -->
                                                    <!-- Hover image -->
                                                    <img class="hover blur-up lazyload"
                                                        data-src="assets/images/home-images/hm-11.jpg"
                                                        src="assets/images/home-images/hm-11.jpg" alt="image"
                                                        title="product">
                                                    <!-- End hover image -->
                                                </a>
                                                <!-- end product image -->

                                                <!-- Start product button -->
                                                <form class="variants add" action="#"
                                                    onclick="window.location.href='cart.html'" method="post">
                                                    <button class="btn btn-addto-cart" type="button" tabindex="0">Add To
                                                        Cart</button>
                                                </form>
                                                <div class="button-set">
                                                    <a href="javascript:void(0)" title="Quick View"
                                                        class="quick-view-popup quick-view" data-toggle="modal"
                                                        data-target="#content_quickview">
                                                        <i class="icon anm anm-search-plus-r"></i>
                                                    </a>
                                                    <div class="wishlist-btn">
                                                        <a class="wishlist add-to-wishlist" href="wishlist.html">
                                                            <i class="icon anm anm-heart-l"></i>
                                                        </a>
                                                    </div>
                                                    <div class="compare-btn">
                                                        <a class="compare add-to-compare" href="compare.html"
                                                            title="Add to Compare">
                                                            <i class="icon anm anm-random-r"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- end product button -->
                                            </div>

                                            <!-- end product image -->

                                            <!--start product details -->
                                            <div class="product-details text-center">
                                                <!-- product name -->
                                                <div class="product-name">
                                                    <a href="short-description.html">Workers Shirt Jacket</a>
                                                </div>
                                                <!-- End product name -->
                                                <!-- product price -->
                                                <div class="product-price">
                                                    <span class="price">$238.00</span>
                                                </div>
                                                <!-- End product price -->

                                                <div class="product-review">
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star-o"></i>
                                                </div>
                                            </div>
                                            <!-- End product details -->
                                        </div>
                                        <div class="col-12 item">
                                            <!-- start product image -->
                                            <div class="product-image">
                                                <!-- start product image -->
                                                <a href="short-description.html">
                                                    <!-- image -->
                                                    <img class="primary blur-up lazyload"
                                                        data-src="assets/images/home-images/hm-6.jpg"
                                                        src="assets/images/home-images/hm-6.jpg" alt="image"
                                                        title="product">
                                                    <!-- End image -->
                                                    <!-- Hover image -->
                                                    <img class="hover blur-up lazyload"
                                                        data-src="assets/images/home-images/hm-6.jpg"
                                                        src="assets/images/home-images/hm-6.jpg" alt="image"
                                                        title="product">
                                                    <!-- End hover image -->
                                                </a>
                                                <!-- end product image -->

                                                <!-- Start product button -->
                                                <form class="variants add" action="#"
                                                    onclick="window.location.href='cart.html'" method="post">
                                                    <button class="btn btn-addto-cart" type="button" tabindex="0">Add To
                                                        Cart</button>
                                                </form>
                                                <div class="button-set">
                                                    <a href="javascript:void(0)" title="Quick View"
                                                        class="quick-view-popup quick-view" data-toggle="modal"
                                                        data-target="#content_quickview">
                                                        <i class="icon anm anm-search-plus-r"></i>
                                                    </a>
                                                    <div class="wishlist-btn">
                                                        <a class="wishlist add-to-wishlist" href="wishlist.html">
                                                            <i class="icon anm anm-heart-l"></i>
                                                        </a>
                                                    </div>
                                                    <div class="compare-btn">
                                                        <a class="compare add-to-compare" href="compare.html"
                                                            title="Add to Compare">
                                                            <i class="icon anm anm-random-r"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- end product button -->
                                            </div>
                                            <!-- end product image -->

                                            <!--start product details -->
                                            <div class="product-details text-center">
                                                <!-- product name -->
                                                <div class="product-name">
                                                    <a href="short-description.html">Watercolor Sport Jacket in
                                                        Brown/Blue</a>
                                                </div>
                                                <!-- End product name -->
                                                <!-- product price -->
                                                <div class="product-price">
                                                    <span class="price">$348.00</span>
                                                </div>
                                                <!-- End product price -->

                                                <div class="product-review">
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star-o"></i>
                                                    <i class="font-13 fa fa-star-o"></i>
                                                </div>
                                            </div>
                                            <!-- End product details -->
                                        </div>
                                    </div>
                                </div>
                                <div id="tab3" class="tab_content grid-products">
                                    <div class="productSlider">
                                        <div class="col-12 item">
                                            <!-- start product image -->
                                            <div class="product-image">
                                                <!-- start product image -->
                                                <a href="short-description.html">
                                                    <!-- image -->
                                                    <img class="primary blur-up lazyload"
                                                        data-src="assets/images/home-images/hm-1.jpg"
                                                        src="assets/images/home-images/hm-1.jpg" alt="image"
                                                        title="product">
                                                    <!-- End image -->
                                                    <!-- Hover image -->
                                                    <img class="hover blur-up lazyload"
                                                        data-src="assets/images/home-images/hm-1.jpg"
                                                        src="assets/images/home-images/hm-1.jpg" alt="image"
                                                        title="product">
                                                    <!-- End hover image -->
                                                    <!-- product label -->
                                                    <div class="product-labels rectangular"><span
                                                            class="lbl on-sale">-16%</span> <span
                                                            class="lbl pr-label1">new</span></div>
                                                    <!-- End product label -->
                                                </a>
                                                <!-- end product image -->

                                                <!-- countdown start -->
                                                <div class="saleTime desktop" data-countdown="2022/03/01"></div>
                                                <!-- countdown end -->

                                                <!-- Start product button -->
                                                <form class="variants add" action="#"
                                                    onclick="window.location.href='cart.html'" method="post">
                                                    <button class="btn btn-addto-cart" type="button" tabindex="0">Add To
                                                        Cart</button>
                                                </form>
                                                <div class="button-set">
                                                    <a href="javascript:void(0)" title="Quick View"
                                                        class="quick-view-popup quick-view" data-toggle="modal"
                                                        data-target="#content_quickview">
                                                        <i class="icon anm anm-search-plus-r"></i>
                                                    </a>
                                                    <div class="wishlist-btn">
                                                        <a class="wishlist add-to-wishlist" href="wishlist.html">
                                                            <i class="icon anm anm-heart-l"></i>
                                                        </a>
                                                    </div>
                                                    <div class="compare-btn">
                                                        <a class="compare add-to-compare" href="compare.html"
                                                            title="Add to Compare">
                                                            <i class="icon anm anm-random-r"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- end product button -->
                                            </div>
                                            <!-- end product image -->
                                            <!--start product details -->
                                            <div class="product-details text-center">
                                                <!-- product name -->
                                                <div class="product-name">
                                                    <a href="short-description.html">Edna Dress</a>
                                                </div>
                                                <!-- End product name -->
                                                <!-- product price -->
                                                <div class="product-price">
                                                    <span class="old-price">$500.00</span>
                                                    <span class="price">$600.00</span>
                                                </div>
                                                <!-- End product price -->

                                                <div class="product-review">
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star-o"></i>
                                                    <i class="font-13 fa fa-star-o"></i>
                                                </div>
                                                <!-- Variant -->
                                                <ul class="swatches">
                                                    <li class="swatch medium rounded"><img
                                                            src="assets/images/home-images/hm-1.jpg" alt="image" width="50"
                                                            height="50" /></li>
                                                    <li class="swatch medium rounded"><img
                                                            src="assets/images/home-images/hm-1.jpg" alt="image" width="50"
                                                            height="50" /></li>
                                                    <li class="swatch medium rounded"><img
                                                            src="assets/images/home-images/hm-1.jpg" alt="image" width="50"
                                                            height="50" /></li>
                                                    <li class="swatch medium rounded"><img
                                                            src="assets/images/home-images/hm-1.jpg" alt="image" width="50"
                                                            height="50" /></li>
                                                    <li class="swatch medium rounded"><img
                                                            src="assets/images/home-images/hm-1.jpg" alt="image" width="50"
                                                            height="50" /></li>

                                                </ul>
                                                <!-- End Variant -->
                                            </div>
                                            <!-- End product details -->
                                        </div>
                                        <div class="col-12 item">
                                            <!-- start product image -->
                                            <div class="product-image">
                                                <!-- start product image -->
                                                <a href="short-description.html">
                                                    <!-- image -->
                                                    <img class="primary blur-up lazyload"
                                                        data-src="assets/images/home-images/hm-2.jpg"
                                                        src="assets/images/home-images/hm-2.jpg" alt="image"
                                                        title="product">
                                                    <!-- End image -->
                                                    <!-- Hover image -->
                                                    <img class="hover blur-up lazyload"
                                                        data-src="assets/images/home-images/hm-2.jpg"
                                                        src="assets/images/home-images/hm-2.jpg" alt="image"
                                                        title="product">
                                                    <!-- End hover image -->
                                                </a>
                                                <!-- end product image -->

                                                <!-- Start product button -->
                                                <form class="variants add" action="#"
                                                    onclick="window.location.href='cart.html'" method="post">
                                                    <button class="btn btn-addto-cart" type="button" tabindex="0">Select
                                                        Options</button>
                                                </form>
                                                <div class="button-set">
                                                    <a href="javascript:void(0)" title="Quick View"
                                                        class="quick-view-popup quick-view" data-toggle="modal"
                                                        data-target="#content_quickview">
                                                        <i class="icon anm anm-search-plus-r"></i>
                                                    </a>
                                                    <div class="wishlist-btn">
                                                        <a class="wishlist add-to-wishlist" href="wishlist.html">
                                                            <i class="icon anm anm-heart-l"></i>
                                                        </a>
                                                    </div>
                                                    <div class="compare-btn">
                                                        <a class="compare add-to-compare" href="compare.html"
                                                            title="Add to Compare">
                                                            <i class="icon anm anm-random-r"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- end product button -->
                                            </div>
                                            <!-- end product image -->

                                            <!--start product details -->
                                            <div class="product-details text-center">
                                                <!-- product name -->
                                                <div class="product-name">
                                                    <a href="short-description.html">Elastic Waist Dress</a>
                                                </div>
                                                <!-- End product name -->
                                                <!-- product price -->
                                                <div class="product-price">
                                                    <span class="price">$748.00</span>
                                                </div>
                                                <!-- End product price -->
                                                <div class="product-review">
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                </div>
                                                <!-- Variant -->
                                                <ul class="swatches">
                                                    <li class="swatch medium rounded"><img
                                                            src="assets/images/home-images/hm-2.jpg" alt="image" width="50"
                                                            height="50" /></li>
                                                    <li class="swatch medium rounded"><img
                                                            src="assets/images/home-images/hm-2.jpg" alt="image" width="50"
                                                            height="50" /></li>
                                                    <li class="swatch medium rounded"><img
                                                            src="assets/images/home-images/hm-2.jpg" alt="image" width="50"
                                                            height="50" /></li>
                                                    <li class="swatch medium rounded"><img
                                                            src="assets/images/home-images/hm-2.jpg" alt="image" width="50"
                                                            height="50" /></li>
                                                </ul>
                                                <!-- End Variant -->
                                            </div>
                                            <!-- End product details -->
                                        </div>
                                        <div class="col-12 item">
                                            <!-- start product image -->
                                            <div class="product-image">
                                                <!-- start product image -->
                                                <a href="short-description.html">
                                                    <!-- image -->
                                                    <img class="primary blur-up lazyload"
                                                        data-src="assets/images/home-images/hm-3.jpg"
                                                        src="assets/images/home-images/hm-3.jpg" alt="image"
                                                        title="product">
                                                    <!-- End image -->
                                                    <!-- Hover image -->
                                                    <img class="hover blur-up lazyload"
                                                        data-src="assets/images/home-images/hm-3.jpg"
                                                        src="assets/images/home-images/hm-3.jpg" alt="image"
                                                        title="product">
                                                    <!-- End hover image -->
                                                    <!-- product label -->
                                                    <!-- End product label -->
                                                </a>
                                                <!-- end product image -->

                                                <!-- Start product button -->
                                                <form class="variants add" action="#"
                                                    onclick="window.location.href='cart.html'" method="post">
                                                    <button class="btn btn-addto-cart" type="button" tabindex="0">Add To
                                                        Cart</button>
                                                </form>
                                                <div class="button-set">
                                                    <a href="javascript:void(0)" title="Quick View"
                                                        class="quick-view-popup quick-view" data-toggle="modal"
                                                        data-target="#content_quickview">
                                                        <i class="icon anm anm-search-plus-r"></i>
                                                    </a>
                                                    <div class="wishlist-btn">
                                                        <a class="wishlist add-to-wishlist" href="wishlist.html">
                                                            <i class="icon anm anm-heart-l"></i>
                                                        </a>
                                                    </div>
                                                    <div class="compare-btn">
                                                        <a class="compare add-to-compare" href="compare.html"
                                                            title="Add to Compare">
                                                            <i class="icon anm anm-random-r"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- end product button -->
                                            </div>
                                            <!-- end product image -->

                                            <!--start product details -->
                                            <div class="product-details text-center">
                                                <!-- product name -->
                                                <div class="product-name">
                                                    <a href="short-description.html">3/4 Sleeve Kimono Dress</a>
                                                </div>
                                                <!-- End product name -->
                                                <!-- product price -->
                                                <div class="product-price">
                                                    <span class="price">$550.00</span>
                                                </div>
                                                <!-- End product price -->

                                                <div class="product-review">
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star-o"></i>
                                                </div>
                                                <!-- Variant -->
                                                <ul class="swatches">
                                                    <li class="swatch medium rounded"><img
                                                            src="assets/images/home-images/hm-3.jpg" alt="image" width="50"
                                                            height="50" /></li>
                                                    <li class="swatch medium rounded"><img
                                                            src="assets/images/home-images/hm-3.jpg" alt="image" width="50"
                                                            height="50" /></li>
                                                    <li class="swatch medium rounded"><img
                                                            src="assets/images/home-images/hm-3.jpg" alt="image" width="50"
                                                            height="50" /></li>
                                                    <li class="swatch medium rounded"><img
                                                            src="assets/images/home-images/hm-3.jpg" alt="image" width="50"
                                                            height="50" /></li>
                                                </ul>
                                                <!-- End Variant -->
                                            </div>
                                            <!-- End product details -->
                                        </div>
                                        <div class="col-12 item">
                                            <!-- start product image -->
                                            <div class="product-image">
                                                <!-- start product image -->
                                                <a href="short-description.html">
                                                    <!-- image -->
                                                    <img class="primary blur-up lazyload"
                                                        data-src="assets/images/home-images/hm-5.jpg"
                                                        src="assets/images/home-images/hm-5.jpg" alt="image"
                                                        title="product" />
                                                    <!-- End image -->
                                                    <!-- Hover image -->
                                                    <img class="hover blur-up lazyload"
                                                        data-src="assets/images/home-images/hm-5.jpg"
                                                        src="assets/images/home-images/hm-5.jpg" alt="image"
                                                        title="product" />
                                                    <!-- End hover image -->
                                                    <!-- product label -->
                                                    <div class="product-labels"><span class="lbl on-sale">Sale</span></div>
                                                    <!-- End product label -->
                                                </a>
                                                <!-- end product image -->

                                                <!-- Start product button -->
                                                <form class="variants add" action="#"
                                                    onclick="window.location.href='cart.html'" method="post">
                                                    <button class="btn btn-addto-cart" type="button" tabindex="0">Add To
                                                        Cart</button>
                                                </form>
                                                <div class="button-set">
                                                    <a href="javascript:void(0)" title="Quick View"
                                                        class="quick-view-popup quick-view" data-toggle="modal"
                                                        data-target="#content_quickview">
                                                        <i class="icon anm anm-search-plus-r"></i>
                                                    </a>
                                                    <div class="wishlist-btn">
                                                        <a class="wishlist add-to-wishlist" href="wishlist.html">
                                                            <i class="icon anm anm-heart-l"></i>
                                                        </a>
                                                    </div>
                                                    <div class="compare-btn">
                                                        <a class="compare add-to-compare" href="compare.html"
                                                            title="Add to Compare">
                                                            <i class="icon anm anm-random-r"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- end product button -->
                                            </div>
                                            <!-- end product image -->

                                            <!--start product details -->
                                            <div class="product-details text-center">
                                                <!-- product name -->
                                                <div class="product-name">
                                                    <a href="short-description.html">Cape Dress</a>
                                                </div>
                                                <!-- End product name -->
                                                <!-- product price -->
                                                <div class="product-price">
                                                    <span class="old-price">$900.00</span>
                                                    <span class="price">$788.00</span>
                                                </div>
                                                <!-- End product price -->

                                                <div class="product-review">
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star-o"></i>
                                                    <i class="font-13 fa fa-star-o"></i>
                                                </div>
                                                <!-- Variant -->
                                                <ul class="swatches">
                                                    <li class="swatch medium rounded"><img
                                                            src="assets/images/home-images/hm-5.jpg" alt="image" width="50"
                                                            height="50" /></li>
                                                    <li class="swatch medium rounded"><img
                                                            src="assets/images/home-images/hm-5.jpg" alt="image" width="50"
                                                            height="50" /></li>
                                                    <li class="swatch medium rounded"><img
                                                            src="assets/images/home-images/hm-5.jpg" alt="image" width="50"
                                                            height="50" /></li>
                                                    <li class="swatch medium rounded"><img
                                                            src="assets/images/home-images/hm-5.jpg" alt="image" width="50"
                                                            height="50" /></li>
                                                </ul>
                                                <!-- End Variant -->
                                            </div>
                                            <!-- End product details -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Collection Tab slider-->



        <!--Logo Slider-->
        <div class="section logo-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="logo-bar">
                            <div class="logo-bar__item">
                                <img src="assets/images/logo/brandlogo1.png" alt="" title="" />
                            </div>
                            <div class="logo-bar__item">
                                <img src="assets/images/logo/brandlogo2.png" alt="" title="" />
                            </div>
                            <div class="logo-bar__item">
                                <img src="assets/images/logo/brandlogo3.png" alt="" title="" />
                            </div>
                            <div class="logo-bar__item">
                                <img src="assets/images/logo/brandlogo4.png" alt="" title="" />
                            </div>
                            <div class="logo-bar__item">
                                <img src="assets/images/logo/brandlogo5.png" alt="" title="" />
                            </div>
                            <div class="logo-bar__item">
                                <img src="assets/images/logo/brandlogo6.png" alt="" title="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Logo Slider-->

        <!--Featured Product-->
        <div class="product-rows section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-header text-center">
                            <h2 class="h2">Featured collection</h2>
                            <p>Our most popular products based on sales</p>
                        </div>
                    </div>
                </div>
                <div class="grid-products">
                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-4 col-lg-4 item grid-view-item style2">
                            <div class="grid-view_image">
                                <!-- start product image -->
                                <a href="product-accordion.html" class="grid-view-item__link">
                                    <!-- image -->
                                    <img class="grid-view-item__image primary blur-up lazyload"
                                        data-src="assets/images/home-images/hm-31.jpg"
                                        src="assets/images/home-images/hm-31.jpg" alt="image" title="product">
                                    <!-- End image -->
                                    <!-- Hover image -->
                                    <img class="grid-view-item__image hover blur-up lazyload"
                                        data-src="assets/images/home-images/hm-31.jpg"
                                        src="assets/images/home-images/hm-31.jpg" alt="image" title="product">
                                    <!-- End hover image -->
                                    <!-- product label -->
                                    <div class="product-labels rectangular"><span class="lbl on-sale">-16%</span>
                                        <span class="lbl pr-label1">new</span>
                                    </div>
                                    <!-- End product label -->
                                </a>
                                <!-- end product image -->
                                <!--start product details -->
                                <div class="product-details hoverDetails text-center mobile">
                                    <!-- product name -->
                                    <div class="product-name">
                                        <a href="product-accordion.html">Edna Dress</a>
                                    </div>
                                    <!-- End product name -->
                                    <!-- product price -->
                                    <div class="product-price">
                                        <span class="old-price">$500.00</span>
                                        <span class="price">$600.00</span>
                                    </div>
                                    <!-- End product price -->

                                    <!-- product button -->
                                    <div class="button-set">
                                        <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view"
                                            data-toggle="modal" data-target="#content_quickview">
                                            <i class="icon anm anm-search-plus-r"></i>
                                        </a>
                                        <!-- Start product button -->
                                        <form class="variants add" action="#" onclick="window.location.href='cart.html'"
                                            method="post">
                                            <button class="btn cartIcon btn-addto-cart" type="button" tabindex="0"><i
                                                    class="icon anm anm-bag-l"></i></button>
                                        </form>
                                        <div class="wishlist-btn">
                                            <a class="wishlist add-to-wishlist" href="wishlist.html">
                                                <i class="icon anm anm-heart-l"></i>
                                            </a>
                                        </div>
                                        <div class="compare-btn">
                                            <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                                                <i class="icon anm anm-random-r"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- end product button -->
                                </div>
                                <!-- Variant -->
                                <ul class="swatches text-center">
                                    <li class="swatch medium rounded"><img src="assets/images/home-images/hm-31.jpg"
                                            alt="image" width="30" height="30" /></li>
                                    <li class="swatch medium rounded"><img src="assets/images/home-images/hm-31.jpg"
                                            alt="image" width="30" height="30" /></li>
                                    <li class="swatch medium rounded"><img src="assets/images/home-images/hm-31.jpg"
                                            alt="image" width="30" height="30" /></li>
                                    <li class="swatch medium rounded"><img src="assets/images/home-images/hm-31.jpg"
                                            alt="image" width="30" height="30" /></li>
                                    <li class="swatch medium rounded"><img src="assets/images/home-images/hm-31.jpg"
                                            alt="image" width="30" height="30" /></li>
                                    <li class="swatch medium rounded"><img src="assets/images/home-images/hm-31.jpg"
                                            alt="image" width="30" height="30" /></li>
                                </ul>
                                <!-- End Variant -->
                                <!-- End product details -->
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-4 item grid-view-item style2">
                            <div class="grid-view_image">
                                <!-- start product image -->
                                <a href="product-accordion.html" class="grid-view-item__link">
                                    <!-- image -->
                                    <img class="grid-view-item__image primary blur-up lazyload"
                                        data-src="assets/images/home-images/hm-30.jpg"
                                        src="assets/images/home-images/hm-30.jpg" alt="image" title="product">
                                    <!-- End image -->
                                    <!-- Hover image -->
                                    <img class="grid-view-item__image hover blur-up lazyload"
                                        data-src="assets/images/home-images/hm-30.jpg"
                                        src="assets/images/home-images/hm-30.jpg" alt="image" title="product">
                                    <!-- End hover image -->
                                    <!-- product label -->
                                    <div class="product-labels rectangular"><span class="lbl on-sale">-16%</span>
                                        <span class="lbl pr-label1">new</span>
                                    </div>
                                    <!-- End product label -->
                                </a>
                                <!-- end product image -->
                                <!--start product details -->
                                <div class="product-details hoverDetails text-center mobile">
                                    <!-- product name -->
                                    <div class="product-name">
                                        <a href="product-accordion.html">Elastic Waist Dress</a>
                                    </div>
                                    <!-- End product name -->
                                    <!-- product price -->
                                    <div class="product-price">
                                        <span class="price">$748.00</span>
                                    </div>
                                    <!-- product button -->
                                    <div class="button-set">
                                        <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view"
                                            data-toggle="modal" data-target="#content_quickview">
                                            <i class="icon anm anm-search-plus-r"></i>
                                        </a>
                                        <!-- Start product button -->
                                        <form class="variants add" action="#" onclick="window.location.href='cart.html'"
                                            method="post">
                                            <button class="btn cartIcon btn-addto-cart" type="button" tabindex="0"><i
                                                    class="icon anm anm-bag-l"></i></button>
                                        </form>
                                        <div class="wishlist-btn">
                                            <a class="wishlist add-to-wishlist" href="wishlist.html">
                                                <i class="icon anm anm-heart-l"></i>
                                            </a>
                                        </div>
                                        <div class="compare-btn">
                                            <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                                                <i class="icon anm anm-random-r"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- end product button -->
                                </div>
                                <!-- Variant -->
                                <ul class="swatches text-center">
                                    <li class="swatch medium rounded"><img src="assets/images/home-images/hm-30.jpg"
                                            alt="image" width="30" height="30" /></li>
                                    <li class="swatch medium rounded"><img src="assets/images/home-images/hm-30.jpg"
                                            alt="image" width="30" height="30" /></li>
                                    <li class="swatch medium rounded"><img src="assets/images/home-images/hm-30.jpg"
                                            alt="image" width="30" height="30" /></li>
                                    <li class="swatch medium rounded"><img src="assets/images/home-images/hm-30.jpg"
                                            alt="image" width="30" height="30" /></li>
                                </ul>
                                <!-- End Variant -->
                                <!-- End product details -->
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-4 item grid-view-item style2">
                            <div class="grid-view_image">
                                <!-- start product image -->
                                <a href="product-accordion.html" class="grid-view-item__link">
                                    <!-- image -->
                                    <img class="grid-view-item__image primary blur-up lazyload"
                                        data-src="assets/images/home-images/hm-29.jpg "
                                        src="assets/images/home-images/hm-29.jpg" alt="image" title="product">
                                    <!-- End image -->
                                    <!-- Hover image -->
                                    <img class="grid-view-item__image hover blur-up lazyload"
                                        data-src="assets/images/home-images/hm-29.jpg"
                                        src="assets/images/home-images/hm-29.jpg" alt="image" title="product">
                                    <!-- End hover image -->
                                    <!-- product label -->
                                    <div class="product-labels"><span class="lbl on-sale">Sale</span></div>
                                    <!-- End product label -->
                                </a>
                                <!-- end product image -->
                                <!--start product details -->
                                <div class="product-details hoverDetails text-center mobile">
                                    <!-- product name -->
                                    <div class="product-name">
                                        <a href="product-accordion.html">Cape Dress</a>
                                    </div>
                                    <!-- End product name -->
                                    <!-- product price -->
                                    <div class="product-price">
                                        <span class="old-price">$900.00</span>
                                        <span class="price">$788.00</span>
                                    </div>
                                    <!-- product button -->
                                    <div class="button-set">
                                        <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view"
                                            data-toggle="modal" data-target="#content_quickview">
                                            <i class="icon anm anm-search-plus-r"></i>
                                        </a>
                                        <!-- Start product button -->
                                        <form class="variants add" action="#" onclick="window.location.href='cart.html'"
                                            method="post">
                                            <button class="btn cartIcon btn-addto-cart" type="button" tabindex="0"><i
                                                    class="icon anm anm-bag-l"></i></button>
                                        </form>
                                        <div class="wishlist-btn">
                                            <a class="wishlist add-to-wishlist" href="wishlist.html">
                                                <i class="icon anm anm-heart-l"></i>
                                            </a>
                                        </div>
                                        <div class="compare-btn">
                                            <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                                                <i class="icon anm anm-random-r"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- end product button -->
                                </div>
                                <!-- Variant -->
                                <ul class="swatches text-center">
                                    <li class="swatch medium rounded"><img src="assets/images/home-images/hm-29.jpg"
                                            alt="image" width="30" height="30" /></li>
                                    <li class="swatch medium rounded"><img src="assets/images/home-images/hm-29.jpg"
                                            alt="image" alt="image" width="30" height="30" /></li>
                                    <li class="swatch medium rounded"><img src="assets/images/home-images/hm-29.jpg"
                                            alt="image" alt="image" width="30" height="30" /></li>
                                    <li class="swatch medium rounded"><img src="assets/images/home-images/hm-29.jpg"
                                            alt="image" alt="image" width="30" height="30" /></li>
                                </ul>
                                <!-- End Variant -->
                                <!-- End product details -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--End Featured Product-->

        <!--Latest Blog-->
        <!-- <div class="latest-blog section pt-0">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="section-header text-center">
                                  <h2 class="h2">Latest From our Blog</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="wrap-blog">
                                <a href="blog-left-sidebar.html" class="article__grid-image">
                                      <img src="assets/images/blog/post-img1.jpg" alt="It's all about how you wear" title="It's all about how you wear" class="blur-up lazyloaded"/>
                                </a>
                                <div class="article__grid-meta article__grid-meta--has-image">
                                    <div class="wrap-blog-inner">
                                        <h2 class="h3 article__title">
                                          <a href="blog-left-sidebar.html">It's all about how you wear</a>
                                        </h2>
                                        <span class="article__date">May 02, 2017</span>
                                        <div class="rte article__grid-excerpt">
                                            I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account...
                                        </div>
                                        <ul class="list--inline article__meta-buttons">
                                            <li><a href="blog-article.html">Read more</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="wrap-blog">
                                <a href="blog-left-sidebar.html" class="article__grid-image">
                                      <img src="assets/images/blog/post-img2.jpg" alt="27 Days of Spring Fashion Recap" title="27 Days of Spring Fashion Recap" class="blur-up lazyloaded"/>
                                </a>
                                <div class="article__grid-meta article__grid-meta--has-image">
                                    <div class="wrap-blog-inner">
                                        <h2 class="h3 article__title">
                                          <a href="blog-right-sidebar.html">27 Days of Spring Fashion Recap</a>
                                        </h2>
                                        <span class="article__date">May 02, 2017</span>
                                        <div class="rte article__grid-excerpt">
                                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab...
                                        </div>
                                        <ul class="list--inline article__meta-buttons">
                                            <li><a href="blog-article.html">Read more</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        <!--End Latest Blog-->
        <!--Collection Box slider-->
        <div class="collection-box section">
            <div class="container-fluid">
                <div class="collection-grid">
                    <div class="collection-grid-item">
                        <a href="collection-page.html" class="collection-grid-item__link">
                            <img data-src="assets/images/home-images/hm-6.jpg" src="assets/images/home-images/hm-6.jpg"
                                alt="Fashion" class="lazyload" />
                            <!-- <div class="collection-grid-item__title-wrapper">
                                        <h3 class="collection-grid-item__title btn btn--secondary no-border">Fashion</h3>
                                    </div> -->
                        </a>
                    </div>
                    <div class="collection-grid-item">
                        <a href="collection-page.html" class="collection-grid-item__link">
                            <img class=" lazyload" data-src="assets/images/home-images/hm-7.jpg"
                                src="assets/images/home-images/hm-7.jpg" alt="Cosmetic" />
                            <!-- <div class="collection-grid-item__title-wrapper">
                                        <h3 class="collection-grid-item__title btn btn--secondary no-border">Cosmetic</h3>
                                    </div> -->
                        </a>
                    </div>
                    <div class="collection-grid-item lazyloaded">
                        <a href="collection-page.html" class="collection-grid-item__link">
                            <img data-src="assets/images/home-images/hm-3.jpg" src="assets/images/home-images/hm-7.jpg"
                                alt="Bag" class=" lazyload" />
                            <!-- <div class="collection-grid-item__title-wrapper">
                                        <h3 class="collection-grid-item__title btn btn--secondary no-border">Bag</h3>
                                    </div> -->
                        </a>
                    </div>

                    <div class="collection-grid-item">
                        <a href="collection-page.html" class="collection-grid-item__link">
                            <img data-src="assets/images/home-images/hm-9.jpg" src="assets/images/home-images/hm-9.jpg"
                                alt="Shoes" class=" lazyload" />
                            <!-- <div class="collection-grid-item__title-wrapper">
                                        <h3 class="collection-grid-item__title btn btn--secondary no-border">Shoes</h3>
                                    </div> -->
                        </a>
                    </div>
                    <div class="collection-grid-item">
                        <a href="collection-page.html" class="collection-grid-item__link">
                            <img data-src="assets/images/home-images/hm-8.jpg" src="assets/images/home-images/hm-8.jpg"
                                alt="Jewellry" class=" lazyload" />
                            <!-- <div class="collection-grid-item__title-wrapper">
                                        <h3 class="collection-grid-item__title btn btn--secondary no-border">Jewellry</h3>
                                    </div> -->
                        </a>
                    </div>
                    <div class="collection-grid-item">
                        <a href="collection-page.html" class="collection-grid-item__link">
                            <img data-src="assets/images/home-images/hm-27.jpg" src="assets/images/home-images/hm-6.jpg"
                                alt="Fashion" class=" lazyload" />
                            <!-- <div class="collection-grid-item__title-wrapper">
                                        <h3 class="collection-grid-item__title btn btn--secondary no-border">Fashion</h3>
                                    </div> -->
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--End Collection Box slider-->

        <!--Store Feature-->
        <div class="store-feature section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="display-table store-info">
                            <li class="display-table-cell">
                                <i class="icon anm anm-truck-l"></i>
                                <h5>Free Shipping &amp; Return</h5>
                                <span class="sub-text">Free shipping on all US orders</span>
                            </li>
                            <li class="display-table-cell">
                                <i class="icon anm anm-dollar-sign-r"></i>
                                <h5>Money Guarantee</h5>
                                <span class="sub-text">30 days money back guarantee</span>
                            </li>
                            <li class="display-table-cell">
                                <i class="icon anm anm-comments-l"></i>
                                <h5>Online Support</h5>
                                <span class="sub-text">We support online 24/7 on day</span>
                            </li>
                            <li class="display-table-cell">
                                <i class="icon anm anm-credit-card-front-r"></i>
                                <h5>Secure Payments</h5>
                                <span class="sub-text">All payment are Secured and trusted.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--End Store Feature-->

    </div>
@endsection
