@extends('layouts.frontbase')

@section('content')

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
                      <div class="item-categoery">{{ $property->advertType ?? 'For Rent' }}</div>
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
                          <a href=""
                            >{{ $property->title }}</a
                          >
                        </h3>
                      </div>
                    </div>
                    <div class="single-item-address">
                      <ul>
                        <li>
                          <i class="fas fa-map-marker-alt"></i>{{ $property->location }}
                        </li>
                        <li><i class="fas fa-clock"></i> {{ $property->created_at->diffForHumans() }} /</li>
                        <li><i class="fas fa-eye"></i>Views: {{ $property->views }}</li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-12">
                    {{-- <div class="side-button">
                      <ul>
                        <li>
                          <a href="#" class="side-btn"
                            ><i class="flaticon-share"></i
                          ></a>
                        </li>
                        <li>
                          <a href="#" class="side-btn"
                            ><i class="flaticon-heart"></i
                          ></a>
                        </li>
                        <li>
                          <a href="#" class="side-btn"
                            ><i class="flaticon-left-and-right-arrows"></i
                          ></a>
                        </li>
                        <li>
                          <a href="#" class="side-btn"
                            ><i class="flaticon-printer"></i
                          ></a>
                        </li>
                      </ul>
                    </div> --}}
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-8">
                    
                    <div class="featured-thumb-slider-area wow fadeInUp" data-wow-delay=".4s">
                        <div class="feature-box3 swiper-container">
                          <div class="swiper-wrapper">
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
                          <div class="item-icon-box">
                            <div class="item-icon">
                              <i class="fa fa-money-bill-wave"></i>
                            </div>
                            <ul class="item-number">
                              <li>Price :</li>
                              <li class="deep-clr">{{ $property->currency }} {{ $property->price }}</li>
                            </ul>
                          </div>
                          <div class="item-icon-box">
                            <div class="item-icon">
                              <i class="flaticon-home"></i>
                            </div>
                            <ul class="item-number">
                              <li>Type :</li>
                              <li class="deep-clr">{{ $house->property_type ?? '' }}</li>
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
                              <i class="fa fa-bath"></i>
                            </div>
                            <ul class="item-number">
                              <li>Bath Rooms :</li>
                              <li class="deep-clr">{{ $property->bathrooms }}</li>
                            </ul>
                          </div>
                        </div>
                        <div class="gallery-icon-box">
                          <div class="item-icon-box">
                            <div class="item-icon">
                              <i class="fa fa-car"></i>
                            </div>
                            <ul class="item-number">
                              <li>Parking :</li>
                              <li class="deep-clr">Yes</li>
                            </ul>
                          </div>
                          <div class="item-icon-box">
                            <div class="item-icon">
                              <i class="flaticon-bed"></i>
                            </div>
                            <ul class="item-number">
                              <li>Category :</li>
                              <li class="deep-clr">{{ $property->furnished_status }}</li>
                            </ul>
                          </div>
                          <div class="item-icon-box">
                            <div class="item-icon">
                              <i class="flaticon-pencil"></i>
                            </div>
                            <ul class="item-number">
                              <li>Land Size :</li>
                              <li class="deep-clr"></li>
                            </ul>
                          </div>

                        </div>
                      </div>
                    <div class="overview-area listing-area">
                      <h3 class="item-title">About This Listing</h3>
                      <p>
                        {!! $property->description !!}
                      </p>
                    </div>

                    {{-- <div class="overview-area video-box1">
                      <h3 class="item-title">Property Video</h3>
                      <div class="item-img">
                        <img
                          src="img/blog/listing1.jpg"
                          alt="map"
                          width="731"
                          height="349"
                        />
                        <div class="play-button">
                          <div class="item-icon">
                            <a
                              href="http://www.youtube.com/watch?v=1iIZeIy7TqM"
                              class="play-btn play-btn-big"
                            >
                              <span class="play-icon style-2">
                                <i class="fas fa-play"></i>
                              </span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div> --}}

                  </div>
                </div>
                <div class="col-lg-4 widget-break-lg sidebar-widget">
                  <div class="widget widget-contact-box">
                    <h3 class="widget-subtitle">Contact Agent</h3>
                    <div class="media d-flex">
                      <div class="flex-shrink-0">
                        <div class="item-logo">
                          {{-- <img
                            src="img/theme2.png"
                            alt="logo"
                            width="100"
                            height="100"
                          /> --}}
                        </div>
                      </div>
                      <div class="media-body flex-grow-1 ms-3">
                        <h4 class="item-title">{{ $property->subscription->names ?? '' }}</h4>
                        <div class="item-phn">
                          {{ $property->contact }}
                        </div>
                        <div class="item-mail">{{ $property->email }}</div>
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
                    <ul class="wid-contact-button">
                      <li>
                        <a href="https://wa.me/{{$property->phone}}"
                          ><i class="fas fa-comment"></i>Quick Chat</a
                        >
                      </li>
                      <li>
                        <a onclick="sharePage(event)"
                          ><i class="fas fa-share-alt"></i>Share</a
                        >
                      </li>
                    </ul>

                    <script>
                      function sharePage(event) {
                        event.preventDefault();
                        const shareData = {
                          title: document.title,
                          text: 'Check this out!',
                          url: window.location.href,
                        };
                    
                        if (navigator.share) {
                          navigator.share(shareData).catch(console.error);
                        } else {
                          alert('Sharing is not supported in this browser.');
                        }
                      }
                    </script>

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
                    <h3 class="widget-subtitle">Latest Listing</h3>
                    <div class="item-img">
                      <a href="{{ route('product',['slug'=>$propertyAdvert->slug]) }}"
                        ><img
                          src="{{ asset('storage/images/properties/' . $propertyAdvert->image) }}"
                          alt="widget"
                          width="540"
                          height="360"
                      /></a>
                      <div class="item-category-box1">
                        <div class="item-category">{{ $property->propertyAdvert ?? 'For Rent' }}</div>
                      </div>
                    </div>

                  </div>

                  @foreach ($propertyAdvert as $rs )
                  <div class="widget widget-post">
                    <div class="item-img">
                      <img src="{{ asset('storage/images/properties/' .$rs->image) }}" alt="widget" />
                      <div class="circle-shape">
                        <span class="item-shape"></span>
                      </div>
                    </div>
                    <div class="item-content">
                      <h4 class="item-title">{{ $rs->title }}</h4>
                      <div class="item-price">{{ $rs->currency }} {{ $rs->price }}</div>
                      <div class="post-button">
                        <a href="{{ route('car',['slug'=>$rs->slug]) }}" class="item-btn"
                          >Shop Now</a
                        >
                      </div>
                    </div>
                  </div>
                  @endforeach
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
            {{-- <div class="col-lg-6 col-md-7 col-sm-7">
              <div class="item-heading-left">
                <h2 class="section-title">Latest Cars</h2>
              </div>
            </div> --}}
            <div class="col-lg-6 col-md-5 col-sm-5">
              <div class="heading-button">
                <a href="{{ route('cars') }}" class="heading-btn item-btn2"
                  >All Featured Cars</a
                >
              </div>
            </div>
          </div>
          {{-- <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-6 col-md-6">
              <div class="property-box2 wow animated fadeInUp" data-wow-delay=".3s">
                  <div class="item-img">
                      <a href="single-listing1.html"><img src="img/blog/blog4.jpg" alt="blog" width="510" height="340"></a>
                      <div class="item-category-box1">
                          <div class="item-category">For Sell</div>
                      </div>
                      <div class="rent-price">
                          <div class="item-price">$15,000<span><i>/</i>mo</span></div>
                      </div>
                      <div class="react-icon">
                          <ul>
                              <li>
                                  <a href="favourite.html" data-bs-toggle="tooltip" data-bs-placement="top"
                                      title="Favourites">
                                      <i class="flaticon-heart"></i>
                                  </a>
                              </li>
                              <li>
                                  <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="top"
                                      title="Compare">
                                      <i class="flaticon-left-and-right-arrows"></i>
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </div>
                  <div class="item-category10"><a href="single-listing1.html">Appartment</a></div>
                  <div class="item-content">
                      <div class="verified-area">
                          <h3 class="item-title"><a href="single-listing1.html">Family House For Sell</a></h3>
                      </div>
                      <div class="location-area"><i class="flaticon-maps-and-flags"></i>Downey, California</div>
                      <div class="item-categoery3">
                          <ul>
                              <li><i class="flaticon-bed"></i>Beds: 03</li>
                              <li><i class="flaticon-shower"></i>Baths: 02</li>
                              <li><i class="flaticon-two-overlapping-square"></i>931 Sqft</li>
                          </ul>
                      </div>
                  </div>
              </div>
            </div>

          </div> --}}
        </div>
      </section>
      <!--=====================================-->
      <!--=   Newsletter     Start            =-->
      <!--=====================================-->


      

@endsection