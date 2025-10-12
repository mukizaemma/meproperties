@extends('layouts.frontbase')
{{-- <base href="/public"> --}}

@section('content')


    <!--=====================================-->
    <!--=   Terms     Start                 =-->
    <!--=====================================-->

    <section class="blog-wrap6">
        <div class="container">
            <div class="row gutters-40">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="blog-box1 blog-box3 wow fadeInUp" data-wow-delay=".4s">
                                <div class="item-content">
                                    <div class="heading-title title-style-2">
                                        {{-- <h3><a href="single-listing1.html">Our Terms and Conditions</a></h3> --}}
                                        <p>
                                            {!! $about->terms !!}
                                        </p>
                                    </div>
    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 widget-break-lg sidebar-widget">
                    {{-- <div class="widget widget-search-box">
                        <h3 class="widget-subtitle">Search</h3>
                        <div class="widget-form-box">
                            <input class="form-control" type="text" placeholder="What are you looking for?">
                            <div class="item-search"><i class="fas fa-search"></i></div>
                        </div>
                    </div> --}}
                    <div class="widget widget-categoery-box">
                        <h3 class="widget-subtitle">Categories</h3>
                        <ul class="categoery-list">
                            <li><a href="{{ route('properties') }}">Real Estate<span class="categoery-count">{{ $properties->count() }}</span></a></li>
                            <li><a href="{{ route('cars') }}">Cars<span class="categoery-count">{{ $cars->count() }}</span></a></li>
                            <li><a href="{{ route('products') }}">Special Deals<span class="categoery-count">{{ $deals->count() }}</span></a></li>

                        </ul>
                    </div>
                    <div class="widget widget-listing-box1">
                        <h3 class="widget-subtitle">Latest Listing</h3>
                        @foreach ($recentProducts as $product)
                        <div class="widget-listing">
                            <div class="item-img">
                                <a href="{{ route('product',['slug'=>$product->slug]) }}"><img src="{{ asset('storage/images/products/' .$product->image) }}" alt="widget" width="120" height="102"></a>
                            </div>
                            <div class="item-content">
                                <h5 class="item-title"><a href="{{ route('product',['slug'=>$product->slug]) }}">{{ $product->title }}</a></h5>
                                <div class="location-area"><i class="flaticon-maps-and-flags"></i>{{ $product->location }}</div>
                                <div class="item-price">{{ $product->currency }} {{ $product->price }}</div>
                            </div>
                        </div>
                        @endforeach


                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection