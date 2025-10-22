@extends('layouts.frontbase')
{{-- <base href="/public"> --}}

@section('content')

    <!--=====================================-->
    <!--=   Main Banner     Start           =-->
    <!--=====================================-->

@include('frontend.includes.slide')
    <!--=====================================-->
    <!--=   Property     Start              =-->
    <!--=====================================-->

        <section class="property-wrap2">
            <div class="container">
                <div class="item-heading-center mb-20">
                    <h2 class="section-title">Latest Properties</h2>
                </div>
                <div class="row">
                    @foreach ($properties as $property)
                        
                    <div class="col-lg-4 col-md-6">
                        <div class="property-box3 wow fadeInUp" data-wow-delay=".2s">
                            <div class="item-img">
                                <a href="{{ route('property',['slug'=>$property->slug]) }}"><img src="{{ asset('storage/images/properties/' .$property->image) }}" alt="property" style="height: 259px; object-fit: contain;"></a>
                                <div class="item-category-box1">
                                        <div class="item-category">{{ $property->listing_type ?? 'Rent' }}</div>
                                </div>
                            </div>
                            <div class="property-content">
                                <div class="item-content">
                                    <div class="veryfy-area">
                                        <div class="item-price">
                                            {{ $property->currency }} {{ number_format($property->price) }}
                                            @if($property->listing_type === 'Rent')
                                                <span>/mo</span>
                                            @endif
                                        </div>

                                    </div>
                                    <h3 class="item-title"><a href="{{ route('property',['slug'=>$property->slug]) }}"> {{ $property->location }} </a></h3>
                                    <div class="item-categoery3">
                                        <ul>
                                            
                                            <li><i class="flaticon-bed"></i><span> {{ $property->bedrooms }}</span></li>
                                            <li><i class="flaticon-shower"></i><span> {{ $property->bathrooms }}</span></li>
                                            <li><i class="flaticon fa fa-car mt-2"></i><span> {{ $property->parking }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="property-button">
                    <a href="{{ route('propertySearch') }}" class="item-btn">View All Properties</a>
                </div>
            </div>
        </section>
    <!--=====================================-->
    <!--=   Services    Start                 =-->
    <!--=====================================-->

        <section class="property-wrap-7">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-8">
                        <div class="item-heading-left">
                            <h2 class="section-title">Why People Choose us</h2>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-4">
                        <div class="heading-button">
                            <a href="{{ route('services') }}" class="heading-btn">See All Services</a>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">

                    @foreach ($ourServices as $service )
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-box1 wow fadeInUp" data-wow-delay=".4s">
                            <div class="item-img">
                                <a href="{{ route('service',['slug'=>$service->slug]) }}"><img src="{{ asset('storage/images/services/' .$service->image) }}" alt="blog" width="520" height="350"></a>
                            </div>
                            <div class="item-content">
                                <div class="heading-title">
                                    <h3><a href="{{ route('service',['slug'=>$service->slug]) }}">{{ $service->name }}</a></h3>
                                </div>
                                <div class="blog-button">
                                    <a href="{{ route('service',['slug'=>$service->slug]) }}" class="item-btn">Read More<i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
    <!--=====================================-->
    <!--=   Properties for rent     Start               =-->
    <!--=====================================-->

<section class="feature-rent-wrap1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-7 col-sm-12">
                <div class="item-heading-left">
                    <h2 class="section-title">Properties For Rent</h2>

                </div>
            </div>
            <div class="col-lg-6 col-md-5 col-sm-12">
                <div class="heading-button">
                    <a href="{{ route('propertySearch') }}" class="heading-btn">View All Properties</a>
                </div>
            </div>
        </div>

        <div class="row">
            {{-- LEFT COLUMN - Big Featured Property --}}
            <div class="col-xl-6 col-lg-5">
                @if($latestProperty)
                <div class="rent-box1 wow fadeInUp" data-wow-delay=".2s">
                    <div class="item-img">
                        <a href="{{ route('property', ['slug' => $latestProperty->slug]) }}">
                            <img src="{{ asset('storage/images/properties/' . $latestProperty->image) }}" 
                                 alt="property" width="630" height="430" style="object-fit: cover;">
                        </a>
                        <div class="item-category-box1">
                            <div class="item-category">For {{ $latestProperty->listing_type ?? 'Rent' }}</div>
                        </div>
                    </div>
                    <div class="item-content">
                        <h3 class="item-title">
                            <a href="{{ route('property', ['slug' => $latestProperty->slug]) }}">
                                {{ $latestProperty->title ?? $latestProperty->location }}
                            </a>
                        </h3>
                        <div class="location-area">
                            <i class="flaticon-maps-and-flags"></i> {{ $latestProperty->location }}
                        </div>
                        <p>{!! Str::limit($latestProperty->description, 300) !!}</p>
                        <div class="item-categoery3">
                            <ul>
                                <li><i class="flaticon-bed"></i>Beds: {{ $latestProperty->bedrooms ?? '-' }}</li>
                                <li><i class="flaticon-shower"></i>Baths: {{ $latestProperty->bathrooms ?? '-' }}</li>
                                <li><i class="fa fa-car"></i>Parking: {{ $latestProperty->parking ?? '-' }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            {{-- RIGHT COLUMN - Next 3 Smaller Properties --}}
            <div class="col-xl-6 col-lg-7 wow fadeInUp" data-wow-delay=".4s">
                @foreach($nextProperties as $property)
                    <div class="rent-feature1">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="rent-box2">
                                    <div class="item-img">
                                        <a href="{{ route('property', ['slug' => $property->slug]) }}">
                                            <img src="{{ asset('storage/images/properties/' . $property->image) }}" 
                                                 alt="{{ $property->title }}" height="170" width="220" style="object-fit: cover;">
                                        </a>
                                        <div class="item-category">
                                            <a href="{{ route('property', ['slug' => $property->slug]) }}">
                                                For {{ $property->listing_type ?? 'Rent' }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="item-content">
                                        <h3 class="item-title">
                                            <a href="{{ route('property', ['slug' => $property->slug]) }}">
                                                {{ $property->title ?? $property->location }}
                                            </a>
                                        </h3>
                                        <div class="location-area">
                                            <i class="flaticon-maps-and-flags"></i> {{ $property->location }}
                                        </div>
                                        <div class="item-categoery3">
                                            <ul>
                                                <li><i class="flaticon-bed"></i>Beds: {{ $property->bedrooms ?? '-' }}</li>
                                                <li><i class="flaticon-shower"></i>Baths: {{ $property->bathrooms ?? '-' }}</li>
                                                <li><i class="fa fa-car"></i>Parking: {{ $property->parking ?? '-' }}</li>
                                            </ul>
                                        </div>
                                        <div class="rent-price">
                                            <div class="item-price">
                                                {{ $property->currency }} {{ number_format($property->price) }}
                                                @if($property->listing_type === 'Rent')
                                                    <span><i>/</i>mo</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


    <!--=====================================-->
    <!--=   Promoted Property     Start               =-->
    <!--=====================================-->

    @if($promotedProp)
    <div class="row align-items-center">
        <div class="col-xl-6 col-lg-6">
            <div class="feature-box1 wow fadeInLeft" data-wow-delay=".2s">
                <div class="item-categoery">
                    <a href="{{ route('property', ['slug' => $promotedProp->slug]) }}">
                        For {{ $promotedProp->listing_type ?? 'Sell' }}
                    </a>
                </div>

                <div class="heading-title">
                    <h2>{{ $promotedProp->title ?? 'Promoted Property' }}</h2>
                </div>

                <div class="location-area">
                    <i class="flaticon-maps-and-flags"></i> {{ $promotedProp->location }}
                </div>

                <p>{!! Str::limit($promotedProp->description, 250) !!}</p>

                <div class="item-categoery3">
                    <ul>
                        <li><i class="flaticon-bed"></i>Beds: {{ $promotedProp->bedrooms ?? 'N/A' }}</li>
                        <li><i class="flaticon-shower"></i>Baths: {{ $promotedProp->bathrooms ?? 'N/A' }}</li>
                        <li><i class="fa fa-car"></i>Parking: {{ $promotedProp->parking ?? 'N/A' }}</li>
                    </ul>
                </div>

                <div class="price-area-style-1">
                    <div class="item-price">
                        {{ $promotedProp->currency }} {{ number_format($promotedProp->price) }}
                        @if($promotedProp->listing_type === 'Rent')
                            <span>/mo</span>
                        @endif
                    </div>
                    <div class="details-button">
                        <a href="{{ route('property', ['slug' => $promotedProp->slug]) }}" class="item-btn">
                            See Details
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6">
            <div class="featured-thumb-slider-area">

                {{-- Large Image Slider --}}
                <div class="inner-box-1">
                    <div class="feature-box2 swiper-container wow fadeInRight" data-wow-delay=".3s">
                        <div class="swiper-wrapper">
                            {{-- Always show the main property image first --}}
                            <div class="swiper-slide">
                                <div class="feature-img1">
                                    <img src="{{ $promotedProp->image 
                                        ? asset('storage/images/properties/' . $promotedProp->image) 
                                        : asset('images/no-image.jpg') }}" 
                                        alt="{{ $promotedProp->title }}" width="690" height="765">
                                </div>
                            </div>

                            {{-- Then show any additional images --}}
                            @foreach($promotedProp->images as $image)
                                <div class="swiper-slide">
                                    <div class="feature-img1">
                                        <img src="{{ asset('storage/images/properties/' . $image->filename) }}" 
                                            alt="{{ $promotedProp->title }}" width="690" height="765">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Thumbnail Slider --}}
                <div class="inner-box-2">
                    <div class="featured-thum-slider swiper-container">
                        <div class="swiper-wrapper">
                            {{-- First thumbnail (main image) --}}
                            {{-- <div class="swiper-slide">
                                <div class="item-img">
                                    <img src="{{ $promotedProp->image 
                                        ? asset('storage/images/properties/' . $promotedProp->image) 
                                        : asset('images/no-image.jpg') }}" 
                                        alt="{{ $promotedProp->title }}" width="320" height="247">
                                </div>
                            </div> --}}

                            {{-- Other thumbnails --}}
                            @foreach($promotedProp->images->take(3) as $image)
                                <div class="swiper-slide">
                                    <div class="item-img">
                                        <img src="{{ asset('storage/images/properties/' . $image->filename) }}" 
                                            alt="{{ $promotedProp->title }}" width="320" height="247">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endif




    <!--=====================================-->
    <!--=   Blog     Start                  =-->
    <!--=====================================-->

    <section class="blog-wrap1 blog-wrap2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-8">
                    <div class="item-heading-left">
                        <h2 class="section-title">Latest Updates</h2>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-4">
                    <div class="heading-button">
                        <a href="{{ route('blogs') }}" class="heading-btn">See All Articles</a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-box1 wow fadeInUp" data-wow-delay=".4s">
                            <div class="item-img">
                                <a href="{{ route('blog', $blog->slug) }}">
                                    <img src="{{ asset('storage/images/blogs/' . $blog->image) }}" alt="{{ $blog->title }}" width="520" height="350">
                                </a>
                            </div>
                            <div class="thumbnail-date">
                                <div class="popup-date">
                                    <span class="day">{{ \Carbon\Carbon::parse($blog->created_at)->format('d') }}</span>
                                    <span class="month">{{ \Carbon\Carbon::parse($blog->created_at)->format('M') }}</span>
                                </div>
                            </div>
                            <div class="item-content">
                                {{-- <div class="entry-meta">
                                    <ul>
                                        @if($blog->category)
                                            <li><a href="{{ route('category.show', $blog->category->slug) }}">{{ $blog->category->name }}</a></li>
                                        @endif
                                        <li><a href="#">{{ $blog->read_time ?? '5 min' }}</a></li>
                                    </ul>
                                </div> --}} 
                                <div class="heading-title">
                                    <h3>
                                        <a href="{{ route('blog', $blog->slug) }}">{{ Str::limit($blog->title, 60) }}</a>
                                    </h3>
                                </div>
                                <div class="blog-button">
                                    <a href="{{ route('blog', $blog->slug) }}" class="item-btn">
                                        Read More <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!--=====================================-->
    <!--=   Brand     Start                 =-->
    <!--=====================================-->

        <div class="brand-wrap1 brand-wrap2">
            <div class="container">
                {{-- <div class="brand-layout swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="brand-box2 wow fadeInUp" data-wow-delay=".4s">
                                <div class="item-img">
                                    <a href="index.html"><img src="img/brand/brand1.svg" alt="brand"></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box2 wow fadeInUp" data-wow-delay=".4s">
                                <div class="item-img">
                                    <a href="index.html"><img src="img/brand/brand2.svg" alt="brand"></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box2 wow fadeInUp" data-wow-delay=".4s">
                                <div class="item-img">
                                    <a href="index.html"><img src="img/brand/brand3.svg" alt="brand"></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box2 wow fadeInUp" data-wow-delay=".4s">
                                <div class="item-img">
                                    <a href="index.html"><img src="img/brand/brand4.svg" alt="brand"></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box2 wow fadeInUp" data-wow-delay=".4s">
                                <div class="item-img">
                                    <a href="index.html"><img src="img/brand/brand5.svg" alt="brand"></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box2 wow fadeInUp" data-wow-delay=".4s">
                                <div class="item-img">
                                    <a href="index.html"><img src="img/brand/brand6.svg" alt="brand"></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box2 wow fadeInUp" data-wow-delay=".4s">
                                <div class="item-img">
                                    <a href="index.html"><img src="img/brand/brand1.svg" alt="brand"></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box2 wow fadeInUp" data-wow-delay=".4s">
                                <div class="item-img">
                                    <a href="index.html"><img src="img/brand/brand2.svg" alt="brand"></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box2 wow fadeInUp" data-wow-delay=".4s">
                                <div class="item-img">
                                    <a href="index.html"><img src="img/brand/brand3.svg" alt="brand"></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box2 wow fadeInUp" data-wow-delay=".4s">
                                <div class="item-img">
                                    <a href="index.html"><img src="img/brand/brand4.svg" alt="brand"></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box2 wow fadeInUp" data-wow-delay=".4s">
                                <div class="item-img">
                                    <a href="index.html"><img src="img/brand/brand5.svg" alt="brand"></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box2 wow fadeInUp" data-wow-delay=".4s">
                                <div class="item-img">
                                    <a href="index.html"><img src="img/brand/brand6.svg" alt="brand"></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box2 wow fadeInUp" data-wow-delay=".4s">
                                <div class="item-img">
                                    <a href="index.html"><img src="img/brand/brand1.svg" alt="brand"></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box2 wow fadeInUp" data-wow-delay=".4s">
                                <div class="item-img">
                                    <a href="index.html"><img src="img/brand/brand2.svg" alt="brand"></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-box2 wow fadeInUp" data-wow-delay=".4s">
                                <div class="item-img">
                                    <a href="index.html"><img src="img/brand/brand3.svg" alt="brand"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    <!--=====================================-->
    <!--=   Banner    Start                 =-->
    <!--=====================================-->
        @include('frontend.includes.bottom')
    <!--=====================================-->
    <!--=   Footer     Start                =-->
    <!--=====================================-->


@endsection