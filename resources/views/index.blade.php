@extends('layout.site')
@section('title', 'Главная страница')
@section('content')
    <!-- ##### Right Side Cart Area ##### -->
    <div class="">
        <div class="cart-bg-overlay"></div>

    <div class="right-side-cart-area">

        <!-- Cart Button -->
        <div class="cart-button">
            <a href="#" id="rightSideCart"><img src="{{ asset('img/core-img/bag.svg')}}" alt=""> <span>3</span></a>
        </div>

        <div class="cart-content d-flex">

            <!-- Cart List Area -->
            <div class="cart-list">
                <!-- Single Cart Item -->
                <div class="single-cart-item">
                    <a href="#" class="product-image">
                        <img src="{{ asset('img/product-img/product-1.jpg')}}" class="cart-thumb" alt="">
                        <!-- Cart Item Desc -->
                        <div class="cart-item-desc">
                        <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <span class="badge">Mango</span>
                            <h6>Button Through Strap Mini Dress</h6>
                            <p class="size">Size: S</p>
                            <p class="color">Color: Red</p>
                            <p class="price">$45.00</p>
                        </div>
                    </a>
                </div>

                <!-- Single Cart Item -->
                <div class="single-cart-item">
                    <a href="#" class="product-image">
                        <img src="{{ asset('img/product-img/product-2.jpg')}}" class="cart-thumb" alt="">
                        <!-- Cart Item Desc -->
                        <div class="cart-item-desc">
                        <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <span class="badge">Mango</span>
                            <h6>Button Through Strap Mini Dress</h6>
                            <p class="size">Size: S</p>
                            <p class="color">Color: Red</p>
                            <p class="price">$45.00</p>
                        </div>
                    </a>
                </div>

                <!-- Single Cart Item -->
                <div class="single-cart-item">
                    <a href="#" class="product-image">
                        <img src="{{ asset('img/product-img/product-3.jpg')}}" class="cart-thumb" alt="">
                        <!-- Cart Item Desc -->
                        <div class="cart-item-desc">
                        <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <span class="badge">Mango</span>
                            <h6>Button Through Strap Mini Dress</h6>
                            <p class="size">Size: S</p>
                            <p class="color">Color: Red</p>
                            <p class="price">$45.00</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="cart-amount-summary">

                <h2>Summary</h2>
                <ul class="summary-table">
                    <li><span>subtotal:</span> <span>$274.00</span></li>
                    <li><span>delivery:</span> <span>Free</span></li>
                    <li><span>discount:</span> <span>-15%</span></li>
                    <li><span>total:</span> <span>$232.00</span></li>
                </ul>
                <div class="checkout-btn mt-100">
                    <a href="checkout.html" class="btn essence-btn">check out</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Right Side Cart End ##### -->

    <!-- ##### Welcome Area Start ##### -->
    <section class="welcome_area bg-img background-overlay" style="background-image: url(img/bg-img/bg-1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-content">
                        <h6>New Balance</h6>
                        <h2>Новый Бренд</h2>
                        <a href="{{route('catalog.brand', 'New-Balance')}}" class="btn essence-btn">Просмотреть</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Welcome Area End ##### -->

    <!-- ##### Top Catagory Area Start ##### -->
    <div class="top_catagory_area section-padding-80 clearfix">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Single Catagory -->
                @foreach ($category as $product => $value)
                    <div class="col-12 col-sm-10 col-md-4 single-prod">
                        <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url( {{Storage::url($value->image)}});">
                            <div class="catagory-content">
                                <a href="{{ route('catalog.category', ['slug' => $value->slug]) }}" style="
                                    text-align: center;
                                ">{{$value->name}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach    
                <style>
                        @media only screen and (min-width:576px) and (max-width:767px) {
                        .single-prod {flex-wrap:wrap}
                        }
                        @media only screen and (max-width:576px) {
                        .single-prod {margin-bottom: 30px;}
                        }
                </style>
            </div>
        </div>
    </div>
    <!-- ##### Top Catagory Area End ##### -->

    <!-- ##### CTA Area Start ##### -->
    <div class="cta-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content bg-img background-overlay" style="background-image: url(img/bg-img/bg-5.jpg);">
                        <div class="h-100 d-flex align-items-center justify-content-end">
                            <div class="cta--text">
                                <h2>Категории</h2>
                                <a href="{{route('catalog.index')}}" class="btn essence-btn">Просмотреть</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### CTA Area End ##### -->

    <!-- ##### New Arrivals Area Start ##### -->
    <section class="new_arrivals_area section-padding-80 clearfix">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Хиты продаж</h2>
                    </div>
                </div>
            </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    
                    <div class="popular-products-slides owl-carousel" style="
                                                align-items: flex-start;
                                                justify-content: center;">
                                @foreach ($allproduct as $product)
                                        @include('catalog.part.product', ['product' => $product])
                                @endforeach
                        
                    </div>
                    <style>
                        @media only screen and (min-width:576px) and (max-width:767px) {
                        .popular-products-slides.owl-carousel {flex-wrap:wrap}
                        }
                        @media only screen and (max-width:576px) {
                        .popular-products-slides.owl-carousel {flex-wrap:wrap}
                        }
                    </style>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### New Arrivals Area End ##### -->

    <!-- ##### Brands Area Start ##### -->
    <div class="brands-area d-flex align-items-center justify-content-between">
        <!-- Brand Logo -->
        @foreach($allbrand as $brand)    
            <div class="single-brands-logo" style="
    display: flex;
    justify-content: center;
    align-items: center;
">
                <img src="{{Storage::url($brand->image)}}" alt="">
            </div>
        @endforeach
    </div>
    <!-- ##### Brands Area End ##### -->
    </div>
@endsection