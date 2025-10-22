@extends('layouts.frontbase')

@section('content')

      <!--=====================================-->
      <!--=   Breadcrumb     Start            =-->
      <!--=====================================-->

      <div class="breadcrumb-wrap">
        <div class="container">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('propertySearch') }}">ALl Properties</a></li>
              <li class="breadcrumb-item">
                <a href="">{{ $property->title }}</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                All Listing
              </li>
            </ol>
          </nav>
        </div>
      </div>
      <!--=====================================-->
      <!--=   Single Listing     Start        =-->
      <!--=====================================-->

      <section class="single-listing-wrap1">
        <div class="container">
          <div class="single-property">
            <div class="content-wrapper">
              <div class="property-heading">
                <div class="row">
                  <div class="col-lg-6 col-md-12">
                    <div class="single-list-cate">
                      <div class="item-categoery">For {{ $property->listing_type ?? 'Rent' }}</div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12">
                    <div class="single-list-price">{{ $property->currency }} {{ $property->price }}</div>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-lg-8 col-md-12">
                    <div class="single-verified-area">
                      <div class="item-title">
                        <h3>
                          <a 
                            >{{ $property->title }}</a
                          >
                        </h3>
                      </div>
                    </div>
                    <div class="single-item-address">
                      <ul>
                        <li>
                          <i class="fas fa-map-marker-alt"></i>{{ $property->location }} /
                        </li>
                        <li><i class="fas fa-clock"></i>{{ \Carbon\Carbon::parse($property->created_at)->diffForHumans() }} /</li>

                        <li><i class="fas fa-eye"></i>Views: {{ $property->views }}</li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-12">
                    <div class="side-button">
                      <ul>
                        <li>
                          <a href="with-sidebar2.html" class="side-btn"
                            ><i class="flaticon-share"></i
                          ></a>
                        </li>
                        <li>
                          <a href="with-sidebar2.html" class="side-btn"
                            ><i class="flaticon-heart"></i
                          ></a>
                        </li>
                        <li>
                          <a href="with-sidebar2.html" class="side-btn"
                            ><i class="flaticon-left-and-right-arrows"></i
                          ></a>
                        </li>
                        <li>
                          <a href="with-sidebar2.html" class="side-btn"
                            ><i class="flaticon-printer"></i
                          ></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-8">
                <div
                    class="featured-thumb-slider-area wow fadeInUp"
                    data-wow-delay=".4s"
                >
                    <div class="feature-box3 swiper-container">
                        <div class="swiper-wrapper">
                            {{-- Main property image as first slide --}}
                            <div class="swiper-slide">
                                <div class="feature-img1 zoom-image-hover">
                                    <img
                                        src="{{ asset('storage/images/properties/' . $property->image) }}"
                                        alt="feature"
                                        width="798"
                                        height="420"
                                    />
                                </div>
                            </div>

                            {{-- Additional images --}}
                            @foreach($images as $image)
                                <div class="swiper-slide">
                                    <div class="feature-img1 zoom-image-hover">
                                        <img
                                            src="{{ asset('storage/images/properties/' . $image->image) }}"
                                            alt="feature"
                                            width="798"
                                            height="420"
                                        />
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="featured-thum-slider2 swiper-container">
                        <div class="swiper-wrapper">
                            {{-- Main property image thumbnail --}}
                            <div class="swiper-slide">
                                <div class="item-img">
                                    <img
                                        src="{{ asset('storage/images/properties/' . $property->image) }}"
                                        alt="feature"
                                        width="154"
                                        height="100"
                                    />
                                </div>
                            </div>

                            {{-- Additional image thumbnails --}}
                            @foreach($images as $image)
                                <div class="swiper-slide">
                                    <div class="item-img">
                                        <img
                                            src="{{ asset('storage/images/properties/' . $image->image) }}"
                                            alt="feature"
                                            width="154"
                                            height="100"
                                        />
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>


                  <div class="single-listing-box1">
                    <div class="overview-area">
                      <h3 class="item-title">Overview</h3>
                      <div class="gallery-icon-box">
                        {{-- <div class="item-icon-box">
                          <div class="item-icon">
                            <i class="flaticon-comment"></i>
                          </div>
                          <ul class="item-number">
                            <li>Category :</li>
                            <li class="deep-clr">{{ $property->category }}</li>
                          </ul>
                        </div> --}}
                        <div class="item-icon-box">
                          <div class="item-icon">
                            <i class="flaticon-home"></i>
                          </div>
                          <ul class="item-number">
                            <li>Type :</li>
                            <li class="deep-clr">{{ $property->category }}</li>
                          </ul>
                        </div>
                        <div class="item-icon-box">
                          <div class="item-icon">
                            <i class="flaticon-bed"></i>
                          </div>
                          <ul class="item-number">
                            <li>Bed Rooms :</li>
                            <li class="deep-clr">{{ $property->bedrooms }}</li>
                          </ul>
                        </div>
                        <div class="item-icon-box">
                          <div class="item-icon">
                            <i class="flaticon-shower"></i>
                          </div>
                          <ul class="item-number">
                            <li>Bath Rooms :</li>
                            <li class="deep-clr">{{ $property->bathrooms }}</li>
                          </ul>
                        </div>

                        <div class="item-icon-box">
                          <div class="item-icon">
                            <i class="flaticon-home"></i>
                          </div>
                          <ul class="item-number">
                            <li>Parking :</li>
                            <li class="deep-clr">{{ $property->paring }}</li>
                          </ul>
                        </div>

                      </div>
                      {{-- <div class="gallery-icon-box">

                        <div class="item-icon-box">
                          <div class="item-icon">
                            <i class="flaticon-home"></i>
                          </div>
                          <ul class="item-number">
                            <li>Area :</li>
                            <li class="deep-clr">{{ $property->area }}</li>
                          </ul>
                        </div>
                        <div class="item-icon-box">
                          <div class="item-icon">
                            <i class="flaticon-pencil"></i>
                          </div>
                          <ul class="item-number">
                            <li>Land Size :</li>
                            <li class="deep-clr">{{ $property->category }}</li>
                          </ul>
                        </div>
                        <div class="item-icon-box">
                          <div class="item-icon">
                            <i class="flaticon-two-overlapping-square"></i>
                          </div>
                          <ul class="item-number">
                            <li>Year Build :</li>
                            <li class="deep-clr">2022</li>
                          </ul>
                        </div>
                      </div> --}}
                    </div>
                    <div class="overview-area listing-area">
                      <h3 class="item-title">About This Listing</h3>
                      <p>
                        {!! $property->description !!}
                      </p>
                    </div>

                  </div>
                </div>
                <div class="col-lg-4 widget-break-lg sidebar-widget">
                  <div class="widget widget-contact-box">
                    <h3 class="widget-subtitle">Contact Agent</h3>
                    <div class="media d-flex">
                      <div class="flex-shrink-0">
                        <div class="item-logo">
                          <img
                            src="{{ asset('storage/images') . $setting->logo }}"
                            alt="logo"
                            width="100"
                            height="100"
                          />
                        </div>
                      </div>
                      <div class="media-body flex-grow-1 ms-3">
                        <h4 class="item-title">{{ $setting->company }}</h4>
                        <div class="item-phn">
                          {{ $setting->phone }}
                        </div>
                        <div class="item-mail">{{ $setting->email }}</div>
                        {{-- <div class="item-rating">
                          <ul>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li class="rating-count">(Reviews 15)</li>
                          </ul>
                        </div> --}}
                      </div>
                    </div>
                    {{-- <ul class="wid-contact-button">
                      <li>
                        <a href="contact.html"
                          ><i class="fas fa-comment"></i>Quick Chat</a
                        >
                      </li>
                      <li>
                        <a href="contact.html"
                          ><i class="fas fa-share-alt"></i>Share</a
                        >
                      </li>
                    </ul> --}}
                    <form class="contact-box rt-contact-form">
                      <div class="row">
                        <div class="form-group col-lg-12">
                          <input
                            type="text"
                            class="form-control"
                            name="fname"
                            placeholder="Your Full Name"
                            data-error="First Name is required"
                            required
                          />
                        </div>
                        <div class="form-group col-lg-12">
                          <input
                            type="text"
                            class="form-control"
                            name="phone"
                            placeholder="Phone"
                            data-error="Phone is required"
                            required
                          />
                        </div>
                        <div class="form-group col-lg-12">
                          <input
                            type="text"
                            class="form-control"
                            name="phone"
                            placeholder="E-mail"
                            data-error="Phone is required"
                            required
                          />
                        </div>
                        <div class="form-group col-lg-12">
                          <textarea
                            name="comment"
                            id="message"
                            class="form-text"
                            placeholder="Message"
                            cols="30"
                            rows="4"
                            data-error="Message Name is required"
                            required
                          ></textarea>
                        </div>
                        <div class="form-group col-lg-12">
                          <div class="advanced-button">
                            <button type="submit" class="item-btn">
                              Send Message <i class="fas fa-search"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                      <div class="form-response"></div>
                    </form>
                  </div>
                  <div class="widget widget-listing-box1">
                    <h3 class="widget-subtitle">Today's Recommendation</h3>
                    <div class="widget-content">
                    <a href="{{ route('property', ['slug' => $promoted->slug]) }}"
                        ><img
                          src="{{ asset('storage/images/properties/' . $promoted->image) }}"
                          alt="widget"
                          width="540"
                          height="360"
                      /></a>

                      <div class="item-category10">
                        <a href="{{ route('property', ['slug' => $promoted->slug]) }}">{{ $promoted->listing_type }}</a>
                      </div>
                      <h4 class="item-title">
                        <a href="{{ route('property', ['slug' => $promoted->slug]) }}"
                          >{{ $promoted->title }}</a
                        >
                      </h4>
                      <div class="location-area">
                        <i class="flaticon-maps-and-flags"></i>{{ $promoted->location }}
                      </div>
                      <div class="item-price">
                        {{ $promoted->currency }} {{ number_format($promoted->price) }}
                        @if($promoted->listing_type === 'Rent')
                            <span>/mo</span>
                        @endif
                      </div>
                    </div>

                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--=====================================-->
      <!--=   Property     Start              =-->
      <!--=====================================-->

      <section class="property-wrap1">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6 col-md-7 col-sm-7">
              <div class="item-heading-left">
                <h2 class="section-title">Latest Properties</h2>
              </div>
            </div>
            <div class="col-lg-6 col-md-5 col-sm-5">
              <div class="heading-button">
                <a href="{{ route('propertySearch') }}" class="heading-btn item-btn2"
                  >All Properties</a
                >
              </div>
            </div>
          </div>
          <div class="row justify-content-center">

            @foreach ($latestProperties as $latest)
            <div class="col-xl-4 col-lg-6 col-md-6">
              <div class="property-box2 wow animated fadeInUp" data-wow-delay=".3s">
                  <div class="item-img">
                      <a href="{{ route('property', ['slug' => $latest->slug]) }}"><img src="{{ asset('storage/images/properties/' . $latest->image) }}" alt="blog" width="510" height="340"></a>
                      <div class="item-category-box1">
                          <div class="item-category">For {{ $promotedProp->listing_type ?? 'Sell' }}</div>
                      </div>
                      <div class="rent-price">
                          <div class="item-price">
                            {{ $promoted->currency }} {{ number_format($promoted->price) }}
                            @if($promoted->listing_type === 'Rent')
                                <span>/mo</span>
                            @endif
                          </div>
                      </div>

                  </div>
                  <div class="item-category10"><a href="{{ route('property', ['slug' => $latest->slug]) }}">Appartment</a></div>
                  <div class="item-content">
                      <div class="verified-area">
                          <h3 class="item-title"><a href="{{ route('property', ['slug' => $latest->slug]) }}">Family House For Sell</a></h3>
                      </div>
                      <div class="location-area"><i class="flaticon-maps-and-flags"></i>{{ $latest->location }}</div>
                      <div class="item-categoery3">
                          <ul>
                            <li><i class="flaticon-bed"></i>Beds: {{ $latest->bedrooms ?? 'N/A' }}</li>
                            <li><i class="flaticon-shower"></i>Baths: {{ $latest->bathrooms ?? 'N/A' }}</li>
                            <li><i class="fas fa-car"></i>Parking: {{ $latest->parking ?? 'N/A' }}</li>
                          </ul>
                      </div>
                  </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </section>
      <!--=====================================-->
      <!--=   Newsletter     Start            =-->
      <!--=====================================-->


      <!--=====================================-->
      <!--=   Footer     Start                =-->
      <!--=====================================-->
@endsection
      