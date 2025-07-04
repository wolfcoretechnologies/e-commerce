@extends('layouts.app')

@section('title', $viewedProduct->name)

@section('content')
    <div id="page-content">
        <!--MainContent-->
        <div id="MainContent" class="main-content" role="main">
            <!--Breadcrumb-->
            <div class="bredcrumbWrap">
                <div class="container breadcrumbs">
                    <a href="{{ route('home') }}" title="Back to the home page">Home</a>
                    @if($viewedProduct->name)
                        <span aria-hidden="true">›</span><span> {{$viewedProduct->name}}</span>
                    @endif
                </div>
            </div>
            <!--End Breadcrumb-->

            <div id="ProductSection-product-template" class="product-template__container prstyle2 container">
                <!--#ProductSection-product-template-->
                <div class="product-single product-single-1">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="product-details-img product-single__photos bottom">
                                <div class="zoompro-wrap product-zoom-right pl-20">
                                    <div class="zoompro-span">
                                        <img class="blur-up lazyload zoompro"
                                            data-zoom-image="{{asset('storage/' . $viewedProduct->image)}}" alt=""
                                            src="{{asset('storage/' . $viewedProduct->image)}}" />
                                    </div>
                                    <div class="product-labels"><span class="lbl on-sale">Sale</span><span
                                            class="lbl pr-label1">new</span></div>
                                    <div class="product-buttons">
                                        <a href="https://www.youtube.com/watch?v=93A2jOW5Mog" class="btn popup-video"
                                            title="View Video"><i class="icon anm anm-play-r" aria-hidden="true"></i></a>
                                        <a href="#" class="btn prlightbox" title="Zoom"><i
                                                class="icon anm anm-expand-l-arrows" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="product-thumb product-thumb-1">
                                    <div id="gallery" class="product-dec-slider-1 product-tab-left">
                                        <a data-image="{{asset('storage/' . $viewedProduct->image)}}"
                                            data-zoom-image="{{asset('storage/' . $viewedProduct->image)}}"
                                            class="slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true"
                                            tabindex="-1">
                                            <img class="blur-up lazyload"
                                                src="{{asset('storage/' . $viewedProduct->image)}}" alt="" />
                                        </a>
                                        @foreach($productImages as $productImage)
                                            <a data-image="{{asset('storage/' . $productImage->image)}}"
                                                data-zoom-image="{{asset('storage/' . $productImage->image)}}"
                                                class="slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true"
                                                tabindex="-1">
                                                <img class="blur-up lazyload" src="{{asset('storage/' . $productImage->image)}}"
                                                    alt="" />
                                            </a>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="lightboximages">
                                    {{-- <a href="{{asset('storage/' . $viewedProduct->image)}}" data-size="1462x2048"></a>
                                    --}}
                                    @foreach($productImages as $productImage)
                                        <a href="{{asset('storage/' . $viewedProduct->image)}}" data-size="1462x2048"></a>
                                    @endforeach
                                </div>

                            </div>
                            <!--Product Feature-->
                            <div class="prFeatures">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 feature">
                                        <img src="{{ asset('assets/images/credit-card.png') }}" alt="Safe Payment"
                                            title="Safe Payment" />
                                        <div class="details">
                                            <h3>Safe Payment</h3>Pay with the world's most payment methods.
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 feature">
                                        <img src="{{ asset('assets/images/shield.png') }}" alt="Confidence"
                                            title="Confidence" />
                                        <div class="details">
                                            <h3>Confidence</h3>Protection covers your purchase and personal data.
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 feature">
                                        <img src="{{ asset('assets/images/worldwide.png') }}" alt="Worldwide Delivery"
                                            title="Worldwide Delivery" />
                                        <div class="details">
                                            <h3>Worldwide Delivery</h3>FREE &amp; fast shipping to over 200+
                                            countries &amp; regions.
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 feature">
                                        <img src="{{ asset('assets/images/phone-call.png') }}" alt="Hotline"
                                            title="Hotline" />
                                        <div class="details">
                                            <h3>Hotline</h3>Talk to help line for your question on 4141 456 789,
                                            4125 666 888
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Product Feature-->
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="product-single__meta">
                                <h1 class="product-single__title">{{$viewedProduct->name}}</h1>
                                <div class="product-nav clearfix">
                                    <a href="#" class="next" title="Next"><i class="fa fa-angle-right"
                                            aria-hidden="true"></i></a>
                                </div>
                                <div class="prInfoRow">
                                    <div class="product-stock"> <span class="instock ">In Stock</span> <span
                                            class="outstock hide">Unavailable</span> </div>
                                    <div class="product-sku">SKU: <span class="variant-sku">19115-rdxs</span></div>
                                    <div class="product-review"><a class="reviewLink" href="#tab2"><i
                                                class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i
                                                class="font-13 fa fa-star"></i><i class="font-13 fa fa-star-o"></i><i
                                                class="font-13 fa fa-star-o"></i><span class="spr-badge-caption">6
                                                reviews</span></a></div>
                                </div>
                                <p class="product-single__price product-single__price-product-template">
                                    <span class="visually-hidden">Regular price</span>
                                    <s id="ComparePrice-product-template">@php
                                        $firstSize = $sizes->first();
                                    @endphp

                                        <span class="money">
                                            @if($firstSize)
                                                ${{ number_format($firstSize->price, 2) }}
                                            @else
                                                N/A
                                            @endif
                                        </span></s>
                                    <span
                                        class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                        <span id="ProductPrice-product-template"><span class="money">
                                                @if($firstSize && $firstSize->discount_price)
                                                    ${{ number_format($firstSize->discount_price, 2) }}
                                                @else
                                                    ${{ number_format($firstSize->price ?? 0, 2) }}
                                                @endif
                                            </span>
                                        </span>
                                    </span>
                                    @if($viewedProduct->discount_price)
                                        @php
                                            $savePrice = (float) $viewedProduct->price - (float) $viewedProduct->discount_price;
                                        @endphp
                                        <span class="discount-badge">
                                            <span class="devider">|</span>&nbsp;
                                            <span>You Save</span>
                                            @if($viewedProduct->price > 0)
                                                <span id="SaveAmount-product-template" class="product-single__save-amount">
                                                    <span class="money">{{ number_format($savePrice, 2) }}</span>
                                                </span>
                                                <span class="off">(
                                                    <span id="discount-percent">
                                                        {{ number_format((($savePrice / $viewedProduct->price) * 100), 0) }}
                                                    </span>%)
                                                </span>
                                            @else
                                                <span class="text-muted">No discount</span>
                                            @endif
                                        </span>
                                    @endif

                                </p>
                                <div class="product-single__description rte">
                                    <p>{{$viewedProduct->small_description}}</p>
                                </div>
                                <form method="post" action="http://annimexweb.com/cart/add" id="product_form_10508262282"
                                    accept-charset="UTF-8" class="product-form product-form-product-template hidedropdown"
                                    enctype="multipart/form-data">
                                    <div class="swatch clearfix swatch-0 option1" data-option-index="0">
                                        <div class="product-form__item">
                                            <label class="header">Color:</label>
                                            @foreach($colorProducts as $colorProduct)
                                                <div data-value="{{ $colorProduct->color_category }}"
                                                    class="swatch-element color {{ strtolower($colorProduct->color_category) }} available">

                                                    <input class="swatchInput"
                                                        id="swatch-0-{{ strtolower($colorProduct->color_category) }}"
                                                        type="radio" name="option-0" value="{{ $colorProduct->color_category }}"
                                                        {{ $viewedProduct->id == $colorProduct->id ? 'checked' : '' }}>

                                                    <a href="{{ url('/product/' . $colorProduct->id) }}">
                                                        <img height="50px" width="50"
                                                            src="{{ asset('storage/' . $colorProduct->image) }}"
                                                            alt="{{ $colorProduct->color_category }}"
                                                            style="border: {{ $viewedProduct->id == $colorProduct->id ? '2px solid #007bff' : '1px solid #ccc' }};
                                                                                                                                                                                                                                        border-radius: 5px;">
                                                    </a>
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>
                                    <div class="swatch clearfix swatch-1 option2" data-option-index="1">
                                        <div class="product-form__item">
                                            <label class="header">Size: </label>
                                            @if($sizes)
                                                @foreach ($sizes as $index => $size)
                                                    @php
                                                        $sizeValue = strtolower($size->size);
                                                        $inputId = 'swatch-1-' . $sizeValue . '-' . $index;
                                                    @endphp
                                                    <div data-value="{{ $size->size }}"
                                                        class="swatch-element {{ $sizeValue }} available">
                                                        <input class="swatchInput" id="{{ $inputId }}" type="radio" name="option-1"
                                                            value="{{ $size->size }}" {{ $index === 0 ? 'checked' : '' }}>
                                                        <label class="swatchLbl small" for="{{ $inputId }}"
                                                            title="{{ $size->size }}">{{ $size->size }}</label>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Product Action -->
                                    <div class="product-action clearfix">
                                        <div class="product-form__item--quantity">
                                            <div class="wrapQtyBtn">
                                                <div class="qtyField">
                                                    <a class="qtyBtn minus" href="javascript:void(0);"><i
                                                            class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                                    <input type="text" id="Quantity" name="quantity" value="1"
                                                        class="product-form__input qty">
                                                    <a class="qtyBtn plus" href="javascript:void(0);"><i
                                                            class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-form__item--submit">
                                            <button type="button" name="add" class="btn product-form__cart-submit">
                                                <span>Add to cart</span>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- End Product Action -->
                                </form>
                                <div class="display-table shareRow">
                                    <div class="display-table-cell medium-up--one-third">
                                        <div class="wishlist-btn">
                                            <a class="wishlist add-to-wishlist" href="#" title="Add to Wishlist"><i
                                                    class="icon anm anm-heart-l" aria-hidden="true"></i> <span>Add
                                                    to Wishlist</span></a>
                                        </div>
                                    </div>
                                    <div class="display-table-cell text-right">
                                        <div class="social-sharing">
                                            <a target="_blank" href="#"
                                                class="btn btn--small btn--secondary btn--share share-facebook"
                                                title="Share on Facebook">
                                                <i class="fa fa-facebook-square" aria-hidden="true"></i> <span
                                                    class="share-title" aria-hidden="true">Share</span>
                                            </a>
                                            <a target="_blank" href="#"
                                                class="btn btn--small btn--secondary btn--share share-twitter"
                                                title="Tweet on Twitter">
                                                <i class="fa fa-twitter" aria-hidden="true"></i> <span class="share-title"
                                                    aria-hidden="true">Tweet</span>
                                            </a>
                                            <a href="#" title="Share on google+"
                                                class="btn btn--small btn--secondary btn--share">
                                                <i class="fa fa-google-plus" aria-hidden="true"></i> <span
                                                    class="share-title" aria-hidden="true">Google+</span>
                                            </a>
                                            <a target="_blank" href="#"
                                                class="btn btn--small btn--secondary btn--share share-pinterest"
                                                title="Pin on Pinterest">
                                                <i class="fa fa-pinterest" aria-hidden="true"></i> <span class="share-title"
                                                    aria-hidden="true">Pin it</span>
                                            </a>
                                            <a href="#" class="btn btn--small btn--secondary btn--share share-pinterest"
                                                title="Share by Email" target="_blank">
                                                <i class="fa fa-envelope" aria-hidden="true"></i> <span class="share-title"
                                                    aria-hidden="true">Email</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Product Tabs-->
                            <div class="tabs-listing">
                                <div class="tab-container">
                                    <h3 class="acor-ttl active" rel="tab1">Product Details</h3>
                                    <div id="tab1" class="tab-content">
                                        <div class="product-description rte">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem Ipsum has been the industry's standard dummy text
                                                ever since the 1500s, when an unknown printer took a galley of type
                                                and scrambled it to make a type specimen book. It has survived not
                                                only five centuries, but also the leap into electronic typesetting,
                                                remaining essentially unchanged.</p>
                                            <ul>
                                                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                                                <li>Sed ut perspiciatis unde omnis iste natus error sit</li>
                                                <li>Neque porro quisquam est qui dolorem ipsum quia dolor</li>
                                                <li>Lorem Ipsum is not simply random text.</li>
                                                <li>Free theme updates</li>
                                            </ul>
                                            <h3>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</h3>
                                            <p>You can change the position of any sections such as slider, banner,
                                                products, collection and so on by just dragging and dropping.&nbsp;
                                            </p>
                                            <h3>Lorem Ipsum is not simply random text.</h3>
                                            <p>But I must explain to you how all this mistaken idea of denouncing
                                                pleasure and praising pain was born and I will give you a complete
                                                account of the system, and expound the actual teachings of the great
                                                explorer of the truth, the master-builder of human happiness.</p>
                                            <p>Change colors, fonts, banners, megamenus and more. Preview changes
                                                are live before saving them.</p>
                                            <h3>1914 translation by H. Rackham</h3>
                                            <p>But I must explain to you how all this mistaken idea of denouncing
                                                pleasure and praising pain was born and I will give you a complete
                                                account of the system, and expound the actual teachings of the great
                                                explorer of the truth, the master-builder of human happiness.</p>
                                            <h3>Section 1.10.33 of "de Finibus Bonorum et Malorum", written by
                                                Cicero in 45 BC</h3>
                                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui
                                                blanditiis praesentium voluptatum deleniti atque corrupti quos
                                                dolores et quas molestias excepturi sint occaecati cupiditate non
                                                provident, similique sunt in culpa qui officia deserunt mollitia
                                                animi, id est laborum et dolorum fuga.</p>
                                            <h3>The standard Lorem Ipsum passage, used since the 1500s</h3>
                                            <p>You can use variant style from colors, images or variant images. Also
                                                available differnt type of design styles and size.</p>
                                            <h3>Lorem Ipsum is not simply random text.</h3>
                                            <p>But I must explain to you how all this mistaken idea of denouncing
                                                pleasure and praising pain was born and I will give you a complete
                                                account of the system, and expound the actual teachings of the great
                                                explorer of the truth, the master-builder of human happiness.</p>
                                            <h3>Proin ut lacus eget elit molestie posuere.</h3>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem Ipsum has been the industry's standard dummy text
                                                ever since the 1500s, when an unknown printer took a galley of type
                                                and scrambled.</p>
                                        </div>
                                    </div>
                                    <h3 class="acor-ttl" rel="tab2">Product Reviews</h3>
                                    <div id="tab2" class="tab-content">
                                        <div id="shopify-product-reviews">
                                            <div class="spr-container">
                                                <div class="spr-header clearfix">
                                                    <div class="spr-summary">
                                                        <span class="product-review"><a class="reviewLink"><i
                                                                    class="font-13 fa fa-star"></i><i
                                                                    class="font-13 fa fa-star"></i><i
                                                                    class="font-13 fa fa-star"></i><i
                                                                    class="font-13 fa fa-star-o"></i><i
                                                                    class="font-13 fa fa-star-o"></i> </a><span
                                                                class="spr-summary-actions-togglereviews">Based on 6
                                                                reviews456</span></span>
                                                        <span class="spr-summary-actions">
                                                            <a href="#" class="spr-summary-actions-newreview btn">Write a
                                                                review</a>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="spr-content">
                                                    <div class="spr-form clearfix">
                                                        <form method="post" action="#" id="new-review-form"
                                                            class="new-review-form">
                                                            <h3 class="spr-form-title">Write a review</h3>
                                                            <fieldset class="spr-form-contact">
                                                                <div class="spr-form-contact-name">
                                                                    <label class="spr-form-label"
                                                                        for="review_author_10508262282">Name</label>
                                                                    <input class="spr-form-input spr-form-input-text "
                                                                        id="review_author_10508262282" type="text"
                                                                        name="review[author]" value=""
                                                                        placeholder="Enter your name">
                                                                </div>
                                                                <div class="spr-form-contact-email">
                                                                    <label class="spr-form-label"
                                                                        for="review_email_10508262282">Email</label>
                                                                    <input class="spr-form-input spr-form-input-email "
                                                                        id="review_email_10508262282" type="email"
                                                                        name="review[email]" value=""
                                                                        placeholder="john.smith@example.com">
                                                                </div>
                                                            </fieldset>
                                                            <fieldset class="spr-form-review">
                                                                <div class="spr-form-review-rating">
                                                                    <label class="spr-form-label">Rating</label>
                                                                    <div class="spr-form-input spr-starrating">
                                                                        <div class="product-review"><a class="reviewLink"
                                                                                href="#"><i class="fa fa-star-o"></i><i
                                                                                    class="font-13 fa fa-star-o"></i><i
                                                                                    class="font-13 fa fa-star-o"></i><i
                                                                                    class="font-13 fa fa-star-o"></i><i
                                                                                    class="font-13 fa fa-star-o"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="spr-form-review-title">
                                                                    <label class="spr-form-label"
                                                                        for="review_title_10508262282">Review
                                                                        Title</label>
                                                                    <input class="spr-form-input spr-form-input-text "
                                                                        id="review_title_10508262282" type="text"
                                                                        name="review[title]" value=""
                                                                        placeholder="Give your review a title">
                                                                </div>

                                                                <div class="spr-form-review-body">
                                                                    <label class="spr-form-label"
                                                                        for="review_body_10508262282">Body of Review
                                                                        <span
                                                                            class="spr-form-review-body-charactersremaining">(1500)</span></label>
                                                                    <div class="spr-form-input">
                                                                        <textarea
                                                                            class="spr-form-input spr-form-input-textarea "
                                                                            id="review_body_10508262282"
                                                                            data-product-id="10508262282"
                                                                            name="review[body]" rows="10"
                                                                            placeholder="Write your comments here"></textarea>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            <fieldset class="spr-form-actions">
                                                                <input type="submit"
                                                                    class="spr-button spr-button-primary button button-primary btn btn-primary"
                                                                    value="Submit Review">
                                                            </fieldset>
                                                        </form>
                                                    </div>
                                                    <div class="spr-reviews">
                                                        <div class="spr-review">
                                                            <div class="spr-review-header">
                                                                <span
                                                                    class="product-review spr-starratings spr-review-header-starratings"><span
                                                                        class="reviewLink"><i class="fa fa-star"></i><i
                                                                            class="font-13 fa fa-star"></i><i
                                                                            class="font-13 fa fa-star"></i><i
                                                                            class="font-13 fa fa-star"></i><i
                                                                            class="font-13 fa fa-star"></i></span></span>
                                                                <h3 class="spr-review-header-title">Lorem ipsum
                                                                    dolor sit amet</h3>
                                                                <span
                                                                    class="spr-review-header-byline"><strong>dsacc</strong>
                                                                    on <strong>Apr 09, 2019</strong></span>
                                                            </div>
                                                            <div class="spr-review-content">
                                                                <p class="spr-review-content-body">Lorem ipsum dolor
                                                                    sit amet, consectetur adipiscing elit, sed do
                                                                    eiusmod tempor incididunt ut labore et dolore
                                                                    magna aliqua. Ut enim ad minim veniam, quis
                                                                    nostrud exercitation ullamco laboris nisi ut
                                                                    aliquip ex ea commodo consequat.</p>
                                                            </div>
                                                        </div>
                                                        <div class="spr-review">
                                                            <div class="spr-review-header">
                                                                <span
                                                                    class="product-review spr-starratings spr-review-header-starratings"><span
                                                                        class="reviewLink"><i class="fa fa-star"></i><i
                                                                            class="font-13 fa fa-star"></i><i
                                                                            class="font-13 fa fa-star"></i><i
                                                                            class="font-13 fa fa-star"></i><i
                                                                            class="font-13 fa fa-star"></i></span></span>
                                                                <h3 class="spr-review-header-title">Lorem Ipsum is
                                                                    simply dummy text of the printing</h3>
                                                                <span
                                                                    class="spr-review-header-byline"><strong>larrydude</strong>
                                                                    on <strong>Dec 30, 2018</strong></span>
                                                            </div>

                                                            <div class="spr-review-content">
                                                                <p class="spr-review-content-body"><br><br>Lorem
                                                                    Ipsum is simply dummy text of the printing and
                                                                    typesetting industry. Lorem Ipsum has been the
                                                                    industry's standard dummy text ever since the
                                                                    1500s, when an unknown printer took a galley of
                                                                    type and scrambled.<br><br>
                                                                    Lorem Ipsum is simply dummy text of the printing
                                                                    and typesetting industry.<br><br>Lorem Ipsum is
                                                                    simply dummy text of the printing and
                                                                    typesetting industry.<br>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="spr-review">
                                                            <div class="spr-review-header">
                                                                <span
                                                                    class="product-review spr-starratings spr-review-header-starratings"><span
                                                                        class="reviewLink"><i class="fa fa-star"></i><i
                                                                            class="font-13 fa fa-star"></i><i
                                                                            class="font-13 fa fa-star"></i><i
                                                                            class="font-13 fa fa-star"></i><i
                                                                            class="font-13 fa fa-star"></i></span></span>
                                                                <h3 class="spr-review-header-title">Neque porro
                                                                    quisquam est qui dolorem ipsum quia dolor sit
                                                                    amet, consectetur, adipisci velit...</h3>
                                                                <span
                                                                    class="spr-review-header-byline"><strong>quoctri1905</strong>
                                                                    on <strong>Dec 30, 2018</strong></span>
                                                            </div>

                                                            <div class="spr-review-content">
                                                                <p class="spr-review-content-body">Lorem Ipsum is
                                                                    simply dummy text of the printing and
                                                                    typesetting industry. Lorem Ipsum has been the
                                                                    industry's standard dummy text ever since the
                                                                    1500s, when an unknown printer took a galley of
                                                                    type and scrambled.<br>
                                                                    <br>Lorem Ipsum is simply dummy text of the
                                                                    printing and typesetting industry.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="acor-ttl" rel="tab3">Size Chart</h3>
                                    <div id="tab3" class="tab-content">
                                        <h3>WOMEN'S BODY SIZING CHART</h3>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <th>Size</th>
                                                    <th>XS</th>
                                                    <th>S</th>
                                                    <th>M</th>
                                                    <th>L</th>
                                                    <th>XL</th>
                                                </tr>
                                                <tr>
                                                    <td>Chest</td>
                                                    <td>31" - 33"</td>
                                                    <td>33" - 35"</td>
                                                    <td>35" - 37"</td>
                                                    <td>37" - 39"</td>
                                                    <td>39" - 42"</td>
                                                </tr>
                                                <tr>
                                                    <td>Waist</td>
                                                    <td>24" - 26"</td>
                                                    <td>26" - 28"</td>
                                                    <td>28" - 30"</td>
                                                    <td>30" - 32"</td>
                                                    <td>32" - 35"</td>
                                                </tr>
                                                <tr>
                                                    <td>Hip</td>
                                                    <td>34" - 36"</td>
                                                    <td>36" - 38"</td>
                                                    <td>38" - 40"</td>
                                                    <td>40" - 42"</td>
                                                    <td>42" - 44"</td>
                                                </tr>
                                                <tr>
                                                    <td>Regular inseam</td>
                                                    <td>30"</td>
                                                    <td>30½"</td>
                                                    <td>31"</td>
                                                    <td>31½"</td>
                                                    <td>32"</td>
                                                </tr>
                                                <tr>
                                                    <td>Long (Tall) Inseam</td>
                                                    <td>31½"</td>
                                                    <td>32"</td>
                                                    <td>32½"</td>
                                                    <td>33"</td>
                                                    <td>33½"</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <h3>MEN'S BODY SIZING CHART</h3>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <th>Size</th>
                                                    <th>XS</th>
                                                    <th>S</th>
                                                    <th>M</th>
                                                    <th>L</th>
                                                    <th>XL</th>
                                                    <th>XXL</th>
                                                </tr>
                                                <tr>
                                                    <td>Chest</td>
                                                    <td>33" - 36"</td>
                                                    <td>36" - 39"</td>
                                                    <td>39" - 41"</td>
                                                    <td>41" - 43"</td>
                                                    <td>43" - 46"</td>
                                                    <td>46" - 49"</td>
                                                </tr>
                                                <tr>
                                                    <td>Waist</td>
                                                    <td>27" - 30"</td>
                                                    <td>30" - 33"</td>
                                                    <td>33" - 35"</td>
                                                    <td>36" - 38"</td>
                                                    <td>38" - 42"</td>
                                                    <td>42" - 45"</td>
                                                </tr>
                                                <tr>
                                                    <td>Hip</td>
                                                    <td>33" - 36"</td>
                                                    <td>36" - 39"</td>
                                                    <td>39" - 41"</td>
                                                    <td>41" - 43"</td>
                                                    <td>43" - 46"</td>
                                                    <td>46" - 49"</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="text-center">
                                            <img src="assets/images/size.jpg" alt="" />
                                        </div>
                                    </div>
                                    <h3 class="acor-ttl" rel="tab4">Shipping &amp; Returns</h3>
                                    <div id="tab4" class="tab-content">
                                        <h4>Returns Policy</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eros
                                            justo, accumsan non dui sit amet. Phasellus semper volutpat mi sed
                                            imperdiet. Ut odio lectus, vulputate non ex non, mattis sollicitudin
                                            purus. Mauris consequat justo a enim interdum, in consequat dolor
                                            accumsan. Nulla iaculis diam purus, ut vehicula leo efficitur at.</p>
                                        <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. In blandit
                                            nunc enim, sit amet pharetra erat aliquet ac.</p>
                                        <h4>Shipping</h4>
                                        <p>Pellentesque ultrices ut sem sit amet lacinia. Sed nisi dui, ultrices ut
                                            turpis pulvinar. Sed fringilla ex eget lorem consectetur, consectetur
                                            blandit lacus varius. Duis vel scelerisque elit, et vestibulum metus.
                                            Integer sit amet tincidunt tortor. Ut lacinia ullamcorper massa, a
                                            fermentum arcu vehicula ut. Ut efficitur faucibus dui Nullam tristique
                                            dolor eget turpis consequat varius. Quisque a interdum augue. Nam ut
                                            nibh mauris.</p>
                                    </div>
                                </div>
                            </div>
                            <!--End Product Tabs-->
                        </div>
                    </div>
                    <!--End-product-single-->

                    <!--Related Product Slider-->
                    <div class="related-product grid-products">
                        <header class="section-header">
                            <h2 class="section-header__title text-center h2"><span>Related Products</span></h2>
                            <p class="sub-heading">You can stop autoplay, increase/decrease aniamtion speed and
                                number of grid to show and products from store admin.</p>
                        </header>
                        <div class="productPageSlider">
                            {{ $relatedColorProducts }}
                            @if($relatedColorProducts)
                                @foreach ($relatedColorProducts as $relatedColorProduct)
                                    {{ $relatedColorProduct }}
                                    <div class="col-12 item">
                                        <!-- start product image -->
                                        <div class="product-image">
                                            <!-- start product image -->
                                            <a href="{{ '/product/' . $relatedColorProduct->id }}">
                                                <!-- image -->
                                                <img class="primary blur-up lazyload"
                                                    data-src="{{asset('storage/' . $relatedColorProduct->image)}}"
                                                    src="{{asset('storage/' . $relatedColorProduct->image)}}" alt="image" title="product">
                                                <!-- End image -->
                                                <!-- Hover image -->
                                                <img class="hover blur-up lazyload"
                                                    data-src="{{asset('storage/' . $relatedColorProduct->image)}}"
                                                    src="{{asset('storage/' . $relatedColorProduct->image)}}" alt="image" title="product">
                                                <!-- End hover image -->
                                                <!-- product label -->
                                                <div class="product-labels rectangular"><span class="lbl on-sale">-16%</span> <span
                                                        class="lbl pr-label1">new</span></div>
                                                <!-- End product label -->
                                            </a>

                                            <div class="button-set">
                                                <div class="wishlist-btn">
                                                    <a class="wishlist add-to-wishlist" href="wishlist.html">
                                                        <i class="icon anm anm-heart-l"></i>
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
                                                <a href="short-description.html">{{ $relatedColorProduct->name }}</a>
                                            </div>
                                            <!-- End product name -->
                                            <!-- product price -->
                                           @php
                                                $colorImages = \App\Models\ProductImages::where('product_id', $relatedColorProduct->id)->get();
                                                $sizes = \App\Models\ProductSize::where('product_id', $relatedColorProduct->id)->get();
                                            @endphp

                                            @php
                                                $hasSingleSize = $sizes->count() === 1;

                                                if ($hasSingleSize) {
                                                    $price = $sizes->first()->price;
                                                    $discount = $sizes->first()->discount_price;
                                                } else {
                                                    $minPrice = $sizes->min('price');
                                                    $maxPrice = $sizes->max('price');
                                                    $minDiscount = $sizes->min('discount_price');
                                                    $maxDiscount = $sizes->max('discount_price');
                                                }
                                            @endphp

                                            <div class="product-price">
                                                @if ($hasSingleSize)
                                                    @if ($discount && $discount < $price)
                                                        <span class="old-price">${{ number_format($price, 2) }}</span>
                                                        <span class="price">${{ number_format($discount, 2) }}</span>
                                                    @else
                                                        <span class="price">${{ number_format($price, 2) }}</span>
                                                    @endif
                                                @else
                                                    @if ($minDiscount && $minDiscount < $minPrice)
                                                        <span class="old-price">${{ number_format($minPrice, 2) }}</span>
                                                        <span class="price">
                                                            @if ($minDiscount != $maxDiscount)
                                                                ${{ number_format($minDiscount, 2) }} – ${{ number_format($maxDiscount, 2) }}
                                                            @else
                                                                ${{ number_format($minDiscount, 2) }}
                                                            @endif
                                                        </span>
                                                    @else
                                                        <span class="price">
                                                            @if ($minPrice != $maxPrice)
                                                                ${{ number_format($minPrice, 2) }} – ${{ number_format($maxPrice, 2) }}
                                                            @else
                                                                ${{ number_format($minPrice, 2) }}
                                                            @endif
                                                        </span>
                                                    @endif
                                                @endif
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
                                                        src="{{asset('storage/' . $relatedColorProduct->image)}}" alt="image" width="50"
                                                        height="50" /></li>
                                                <li class="swatch medium rounded"><img
                                                        src="{{asset('storage/' . $relatedColorProduct->image)}}" alt="image" width="50"
                                                        height="50" /></li>
                                                <li class="swatch medium rounded"><img
                                                        src="{{asset('storage/' . $relatedColorProduct->image)}}" alt="image" width="50"
                                                        height="50" /></li>
                                                <li class="swatch medium rounded"><img
                                                        src="{{asset('storage/' . $relatedColorProduct->image)}}" alt="image" width="50"
                                                        height="50" /></li>
                                                <li class="swatch medium rounded"><img
                                                        src="{{asset('storage/' . $relatedColorProduct->image)}}" alt="image" width="50"
                                                        height="50" /></li>

                                            </ul>
                                            <!-- End Variant -->
                                        </div>
                                        <!-- End product details -->
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <!--End Related Product Slider-->
                </div>
                <!--#ProductSection-product-template-->
            </div>
            <!--MainContent-->
        </div>
        <!--End Body Content-->
    </div>


    @section('script')
        <script>
            try {
                document.addEventListener('DOMContentLoaded', function () {
                    console.log("✅ Script loaded");

                     const sizePrices = {!! json_encode($sizePrices) !!};
                    console.log("Loaded sizePrices:", sizePrices);

                    const radios = document.querySelectorAll('.swatchInput[name="option-1"]');
                    console.log("Radios found:", radios.length);

                    radios.forEach(radio => {
                        radio.addEventListener('change', (e) => {

                            handleSizeChange.call(e.target);
                        });
                    });

                    const selected = document.querySelector('.swatchInput[name="option-1"]:checked');
                    if (selected) handleSizeChange.call(selected);

                    function handleSizeChange() {
                        const size = this.value;
                        const data = sizePrices[size];
                        console.log("Size selected:", size, data);

                        if (!data) return;

                        const price = parseFloat(data.price ?? 0);
                        const discount = parseFloat(data.discount_price ?? 0);

                        if (!discount || discount >= price) {
                            document.getElementById('ComparePrice-product-template').innerHTML = '';
                            document.getElementById('ProductPrice-product-template').innerHTML = `<span class="money">$${price.toFixed(2)}</span>`;
                            document.getElementById('SaveAmount-product-template').innerHTML = '';
                            document.getElementById('discount-percent').innerText = '';
                            return;
                        }

                        const save = price - discount;
                        const percent = price > 0 ? ((save / price) * 100).toFixed(0) : 0;

                        document.getElementById('ComparePrice-product-template').innerHTML = `<span class="money">$${price.toFixed(2)}</span>`;
                        document.getElementById('ProductPrice-product-template').innerHTML = `<span class="money">$${discount.toFixed(2)}</span>`;
                        document.getElementById('SaveAmount-product-template').innerHTML = `<span class="money">$${save.toFixed(2)}</span>`;
                        document.getElementById('discount-percent').innerText = percent;
                    }
                });
            } catch (err) {
                console.error("⚠️ Script error:", err);
            }
        </script>
    @endsection




@endsection
