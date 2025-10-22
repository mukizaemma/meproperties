@extends('layouts.frontbase')
{{-- <base href="/public"> --}}

@section('content')


      <!--=====================================-->
    <!--=   Breadcrumb     Start            =-->
    <!--=====================================-->

    <div class="breadcrumb-wrap breadcrumb-wrap-2">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Listing</li>
                </ol>
            </nav>
        </div>
    </div>
<!--=====================================-->
<!--=   Grid     Start                  =-->
<!--=====================================-->

    <section class="grid-wrap3">
        <div class="container">
            <div class="row gutters-40">
                <div class="col-lg-4 widget-break-lg sidebar-widget">
                    <div class="widget widget-advanced-search">
                        <h3 class="widget-subtitle">Advanced Search</h3>
                        <form action="{{ route('propertySearch') }}" method="GET" class="map-forms map-form-style-2">
                            <!-- Search by keyword or location -->
                            <input type="text" name="location" class="form-control" placeholder="What are you looking for?">

                            <div class="row">
                                <!-- Category -->
                                <div class="col-lg-12 pl-15 mb-0">
                                    <div class="rld-single-select">
                                        <select class="select single-select mr-0" name="category">
                                            <option value="">Property Type</option>
                                            <option value="Residential">Residential</option>
                                            <option value="Commercial">Commercial</option>
                                            <option value="Land">Land</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Status (Rent, Sell, Buy) -->
                                <div class="col-lg-12 pl-15 mb-0">
                                    <div class="rld-single-select">
                                        <select class="select single-select mr-0" name="status">
                                            <option value="">All Categories</option>
                                            <option value="For Rent">Rent</option>
                                            <option value="For Sell">Sell</option>
                                            <option value="For Buy">Buy</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- City -->
                                <div class="col-lg-12 pl-15">
                                    <div class="rld-single-select">
                                        <select class="select single-select mr-0" name="city">
                                            <option value="">All Cities</option>
                                            <option value="Arua">Arua</option>
                                            <option value="Entebbe">Entebbe</option>
                                            <option value="Fort Portal">Fort Portal</option>
                                            <option value="Gulu">Gulu</option>
                                            <option value="Hoima">Hoima</option>
                                            <option value="Jinja">Jinja</option>
                                            <option value="Kabale">Kabale</option>
                                            <option value="Kampala">Kampala</option>
                                            <option value="Masaka">Masaka</option>
                                            <option value="Mbale">Mbale</option>
                                            <option value="Mbarara">Mbarara</option>
                                            <option value="Mukono">Mukono</option>
                                            <option value="Mubende">Mubende</option>
                                            <option value="Wakiso">Wakiso</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="form-group-button col-lg-12 text-center">
                                    <button type="submit" class="filter-btn1 search-btn">Search Now</button>
                                </div>
                            </div>
                        </form>

 
                    </div>
                    <div class="widget widget-listing-box1">
                        <h3 class="widget-subtitle">Latest Listing</h3>
                        <div class="item-img">
                            <a href="single-listing1.html"><img src="img/blog/widget6.jpg" alt="widget" width="630" height="400"></a>
                            <div class="item-category-box1">
                                <div class="item-category">For Rent</div>
                            </div>
                        </div>
                        <div class="widget-content">
                            <div class="item-category10"><a href="single-listing1.html">Villa</a></div>
                            <h4 class="item-title"><a href="single-listing1.html">Modern Villa for House Highland  Ave Kampala</a></h4>
                            <div class="location-area"><i class="flaticon-maps-and-flags"></i>Downey,California</div>
                            <div class="item-price">$11,000<span>/mo</span></div>
                        </div>
                        <div class="widget-listing">
                            <div class="item-img">
                                <a href="single-listing1.html"><img src="img/blog/widget2.jpg" alt="widget" width="120" height="102"></a>
                            </div>
                            <div class="item-content">
                                <h5 class="item-title"><a href="single-listing1.html">House Highland Ave  Kampala</a></h5>
                                <div class="location-area"><i class="flaticon-maps-and-flags"></i>California</div>
                                <div class="item-price">$3,000<span>/mo</span></div>
                            </div>
                        </div>
                        <div class="widget-listing">
                            <div class="item-img">
                                <a href="single-listing1.html"><img src="img/blog/widget3.jpg" alt="widget" width="120" height="102"></a>
                            </div>
                            <div class="item-content">
                                <h5 class="item-title"><a href="single-listing1.html">House Highland Ave  Kampala</a></h5>
                                <div class="location-area"><i class="flaticon-maps-and-flags"></i>California</div>
                                <div class="item-price">$1,200<span>/mo</span></div>
                            </div>
                        </div>
                        <div class="widget-listing no-brd">
                            <div class="item-img">
                                <a href="single-listing1.html"><img src="img/blog/widget4.jpg" alt="widget" width="120" height="102"></a>
                            </div>
                            <div class="item-content">
                                <h5 class="item-title"><a href="single-listing1.html">House Highland Ave  Kampala</a></h5>
                                <div class="location-area"><i class="flaticon-maps-and-flags"></i>California</div>
                                <div class="item-price">$1,900<span>/mo</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="widget widget-post">
                        <div class="item-img">
                            <img src="img/blog/widget5.jpg" alt="widget" width="690" height="850">
                            <div class="circle-shape">
                            <span class="item-shape"></span>
                        </div>
                        </div>
                        <div class="item-content">
                            <h4 class="item-title">Find Your  Dream House</h4>
                            <div class="item-price">$2,999</div>
                            <div class="post-button"><a href="single-listing1.html" class="item-btn">Shop Now</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="property-wrap-9">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12">
                                <div class="item-shorting-box">
                                    <div class="shorting-title">
                                        <h4 class="item-title">9 Search Results Found</h4>
                                    </div>
                                    <div class="item-shorting-box-2">
                                        <div class="by-shorting">
                                            <div class="shorting">Sort by:</div>
                                            <select class="select single-select mr-0">
                                                <option value="1">Default</option>
                                                <option value="2">High Price</option>
                                                <option value="3">Medium Price</option>
                                                <option value="3">Low Price</option>
                                            </select>
                                        </div>
                                        <div class="grid-button">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-bs-toggle="tab" href="#mylisting"><i class="fas fa-th"></i></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#reviews"><i class="fas fa-list-ul"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-style-1 tab-style-3">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="mylisting" role="tabpanel">
                                    <div class="row">
                                        @if($noResults)
                                            <div class="col-lg-12 text-center">
                                                <p class="alert alert-warning">No properties found matching your search criteria.</p>
                                            </div>
                                        @else
                                            @foreach($properties as $property)
                                            <div class="col-lg-6 col-md-6">
                                                <div class="property-box2 wow animated fadeInUp" data-wow-delay=".3s">
                                                    <div class="item-img">
                                                        <a href="{{ route('property', ['slug'=>$property->slug]) }}">
                                                            <img src="{{ asset('storage/images/properties/' . $property->image) }}" alt="property" width="510" height="340">
                                                        </a>
                                                        <div class="item-category-box1">
                                                            <div class="item-category">{{ $property->listing_type }}</div>
                                                        </div>
                                                        <div class="rent-price">
                                                            <div class="item-price">{{ $property->currency }} {{ number_format($property->price) }}
                                                                @if($property->listing_type === 'For Rent')<span><i>/</i>mo</span>@endif
                                                            </div>
                                                        </div>
                                                        <div class="react-icon">
                                                            <ul>
                                                                <li>
                                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Favourites">
                                                                        <i class="flaticon-heart"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                                        <i class="flaticon-left-and-right-arrows"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="item-category10">
                                                        <a href="#">{{ $property->category }}</a>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="verified-area">
                                                            <h3 class="item-title">
                                                                <a href="{{ route('property', ['slug'=>$property->slug]) }}">{{ $property->location }}</a>
                                                            </h3>
                                                        </div>
                                                        <div class="location-area">
                                                            <i class="flaticon-maps-and-flags"></i>{{ $property->city }}
                                                        </div>
                                                        <div class="item-categoery3">
                                                            <ul>
                                                                <li><i class="flaticon-bed"></i>Beds: {{ $property->bedrooms }}</li>
                                                                <li><i class="flaticon-shower"></i>Baths: {{ $property->bathrooms }}</li>
                                                                <li><i class="flaticon-two-overlapping-square"></i>{{ $property->area }} Sqft</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif
                                    </div>

                                    {{-- Pagination --}}
                                    <div class="pagination-style-1">
                                        {{ $properties->links() }}
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="property-box2 property-box4 wow animated fadeInUp" data-wow-delay=".6s">
                                                <div class="item-img">
                                                    <a href="single-listing1.html"><img src="img/blog/blog13.jpg" alt="blog" width="250" height="200"></a>
                                                    <div class="item-category-box1">
                                                        <div class="item-category">For Rent</div>
                                                    </div>
                                                </div>
                                                <div class="item-content item-content-property">
                                                    <div class="item-category10"><a href="single-listing1.html">Appartment</a></div>
                                                    <div class="react-icon react-icon-2">
                                                        <ul>
                                                            <li>
                                                                <a href="favourite.html" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                    title="Favourites">
                                                                    <i class="flaticon-heart"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                    title="Compare">
                                                                    <i class="flaticon-left-and-right-arrows"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="verified-area">
                                                        <h3 class="item-title"><a href="single-listing1.html">Family House For Rent</a></h3>
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
                                        <div class="col-lg-12">
                                            <div class="property-box2 property-box4 wow animated fadeInUp" data-wow-delay=".6s">
                                                <div class="item-img">
                                                    <a href="single-listing1.html"><img src="img/blog/blog13.jpg" alt="blog" width="250" height="200"></a>
                                                    <div class="item-category-box1">
                                                        <div class="item-category">For Rent</div>
                                                    </div>
                                                </div>
                                                <div class="item-content item-content-property">
                                                    <div class="item-category10"><a href="single-listing1.html">Appartment</a></div>
                                                    <div class="react-icon react-icon-2">
                                                        <ul>
                                                            <li>
                                                                <a href="favourite.html" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                    title="Favourites">
                                                                    <i class="flaticon-heart"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                    title="Compare">
                                                                    <i class="flaticon-left-and-right-arrows"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="verified-area">
                                                        <h3 class="item-title"><a href="single-listing1.html">Family House For Rent</a></h3>
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
                                        <div class="col-lg-12">
                                            <div class="property-box2 property-box4 wow animated fadeInUp" data-wow-delay=".6s">
                                                <div class="item-img">
                                                    <a href="single-listing1.html"><img src="img/blog/blog14.jpg" alt="blog" width="250" height="200"></a>
                                                    <div class="item-category-box1">
                                                        <div class="item-category">For Rent</div>
                                                    </div>
                                                </div>
                                                <div class="item-content item-content-property">
                                                    <div class="item-category10"><a href="single-listing1.html">Appartment</a></div>
                                                    <div class="react-icon react-icon-2">
                                                        <ul>
                                                            <li>
                                                                <a href="favourite.html" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                    title="Favourites">
                                                                    <i class="flaticon-heart"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                    title="Compare">
                                                                    <i class="flaticon-left-and-right-arrows"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="verified-area">
                                                        <h3 class="item-title"><a href="single-listing1.html">Family House For Rent</a></h3>
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
                                        <div class="col-lg-12">
                                            <div class="property-box2 property-box4 wow animated fadeInUp" data-wow-delay=".6s">
                                                <div class="item-img">
                                                    <a href="single-listing1.html"><img src="img/blog/blog15.jpg" alt="blog" width="250" height="200"></a>
                                                    <div class="item-category-box1">
                                                        <div class="item-category">For Rent</div>
                                                    </div>
                                                </div>
                                                <div class="item-content item-content-property">
                                                    <div class="item-category10"><a href="single-listing1.html">Appartment</a></div>
                                                    <div class="react-icon react-icon-2">
                                                        <ul>
                                                            <li>
                                                                <a href="favourite.html" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                    title="Favourites">
                                                                    <i class="flaticon-heart"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                    title="Compare">
                                                                    <i class="flaticon-left-and-right-arrows"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="verified-area">
                                                        <h3 class="item-title"><a href="single-listing1.html">Family House For Rent</a></h3>
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
                                        <div class="col-lg-12">
                                            <div class="property-box2 property-box4 wow animated fadeInUp" data-wow-delay=".6s">
                                                <div class="item-img">
                                                    <a href="single-listing1.html"><img src="img/blog/blog16.jpg" alt="blog" width="250" height="200"></a>
                                                    <div class="item-category-box1">
                                                        <div class="item-category">For Rent</div>
                                                    </div>
                                                </div>
                                                <div class="item-content item-content-property">
                                                    <div class="item-category10"><a href="single-listing1.html">Appartment</a></div>
                                                    <div class="react-icon react-icon-2">
                                                        <ul>
                                                            <li>
                                                                <a href="favourite.html" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                    title="Favourites">
                                                                    <i class="flaticon-heart"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                    title="Compare">
                                                                    <i class="flaticon-left-and-right-arrows"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="verified-area">
                                                        <h3 class="item-title"><a href="single-listing1.html">Family House For Rent</a></h3>
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
                                        <div class="col-lg-12">
                                            <div class="property-box2 property-box4 wow animated fadeInUp" data-wow-delay=".6s">
                                                <div class="item-img">
                                                    <a href="single-listing1.html"><img src="img/blog/blog17.jpg" alt="blog" width="250" height="200"></a>
                                                    <div class="item-category-box1">
                                                        <div class="item-category">For Rent</div>
                                                    </div>
                                                </div>
                                                <div class="item-content item-content-property">
                                                    <div class="item-category10"><a href="single-listing1.html">Appartment</a></div>
                                                    <div class="react-icon react-icon-2">
                                                        <ul>
                                                            <li>
                                                                <a href="favourite.html" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                    title="Favourites">
                                                                    <i class="flaticon-heart"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                    title="Compare">
                                                                    <i class="flaticon-left-and-right-arrows"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="verified-area">
                                                        <h3 class="item-title"><a href="single-listing1.html">Family House For Rent</a></h3>
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
                                        <div class="col-lg-12">
                                            <div class="property-box2 property-box4 wow animated fadeInUp" data-wow-delay=".6s">
                                                <div class="item-img">
                                                    <a href="single-listing1.html"><img src="img/blog/blog18.jpg" alt="blog" width="250" height="200"></a>
                                                    <div class="item-category-box1">
                                                        <div class="item-category">For Rent</div>
                                                    </div>
                                                </div>
                                                <div class="item-content item-content-property">
                                                    <div class="item-category10"><a href="single-listing1.html">Appartment</a></div>
                                                    <div class="react-icon react-icon-2">
                                                        <ul>
                                                            <li>
                                                                <a href="favourite.html" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                    title="Favourites">
                                                                    <i class="flaticon-heart"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                    title="Compare">
                                                                    <i class="flaticon-left-and-right-arrows"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="verified-area">
                                                        <h3 class="item-title"><a href="single-listing1.html">Family House For Rent</a></h3>
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
                                    </div>
                                    <div class="pagination-style-1">
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="page-link" href="with-sidebar.html" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link active" href="with-sidebar2.html">1</a></li>
                                            <li class="page-item"><a class="page-link" href="with-sidebar2.html">2</a></li>
                                            <li class="page-item"><a class="page-link" href="with-sidebar2.html">3</a></li>
                                            <li class="page-item"><a class="page-link" href="with-sidebar2.html">4</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="with-sidebar2.html" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection