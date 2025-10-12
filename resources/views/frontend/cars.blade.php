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

    <section class="grid-wrap1 grid-wrap2">
        <div class="container">
            {{-- <div class="row">
                <div class="col-lg-12">
                    <div class="top-advanced-search">
                        <form action="index.html" class="map-form">
                            <div class="row gutters-20">
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" placeholder="What are you looking for?">
                                </div>
                                <div class="col-lg-4 pl-15">
                                    <div class="rld-single-select rld-single-select2">
                                        <select class="select single-select mr-0">
                                            <option value="1">Property Type</option>
                                            <option value="2">Family House</option>
                                            <option value="3">Apartment</option>
                                            <option value="3">Condo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-4 pl-15">
                                    <div class="rld-single-select">
                                        <select class="select single-select mr-0">
                                            <option value="1">All Categories</option>
                                            <option value="2">Rent</option>
                                            <option value="3">Sell</option>
                                            <option value="3">Buy</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 pl-15">
                                    <div class="rld-single-select">
                                        <select class="select single-select mr-0">
                                            <option value="1">All Cities</option>
                                            <option value="2">Kampala</option>
                                            <option value="3">Chicago</option>
                                            <option value="3">Philadelphia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="main-search-field-2">
                                        <!-- Area Range -->
                                        <div class="price-range-wrapper">
                                            <div class="range-box">
                                                <div class="price-label">Price:</div>
                                                <div id="price-range-filter-4" class="price-range-filter"></div>
                                                <div class="price-filter-wrap d-flex align-items-center">
                                                    <div class="price-range-select">
                                                        <div class="price-range range-title">$</div>
                                                        <div class="price-range" id="price-range-min-4"></div>
                                                        <div class="price-range">-</div>
                                                        <div class="price-range" id="price-range-max-4"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="banner-search-wrap banner-search-wrap-2">
                            <div class="rld-main-search rld-main-search2">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="box">
                                            <div class="dropdown-filter-1">
                                                <div class="rt-filter-btn-1">
                                                    <span class="icon">
                                                        <i class="fas fa-sliders-h"></i>
                                                    </span>
                                                    <span class="text">Amenities</span>
                                                </div>
                                            </div>
                                            <div class="filter-button">
                                                <a href="#" class="filter-btn1 search-btn">Search<i class="fas fa-search"></i></a>
                                            </div>
                                            <div class="explore__form-checkbox-list explore__form-checkbox-list2 full-filter">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-6 py-1 pr-30 pl-0">
                                                        <!-- Form Property Status -->
                                                        <div class="form-group bed">
                                                            <label class="item-bedrooms">Bedrooms</label>
                                                            <div class="nice-select form-control wide" tabindex="0"><span class="current">Any</span>
                                                                <ul class="list">
                                                                    <li data-value="1" class="option selected ">For Sale</li>
                                                                    <li data-value="2" class="option">For Rent</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!--/ End Form Property Status -->
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 py-1 pr-30 pl-0">
                                                        <!-- Form Bedrooms -->
                                                        <div class="form-group bath">
                                                            <label class="item-bath">Bathrooms</label>
                                                            <div class="nice-select form-control wide" tabindex="0"><span class="current">Any</span>
                                                                <ul class="list">
                                                                    <li data-value="1" class="option selected">1</li>
                                                                    <li data-value="2" class="option">2</li>
                                                                    <li data-value="3" class="option">3</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!--/ End Form Bedrooms -->
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 py-1 pl-0 pr-0">
                                                        <!-- Form Bathrooms -->
                                                        <div class="form-group garage">
                                                            <label class="item-garage">Garage</label>
                                                            <div class="nice-select form-control wide" tabindex="0"><span class="current">Any</span>
                                                                <ul class="list">
                                                                    <li data-value="1" class="option selected">1</li>
                                                                    <li data-value="2" class="option">2</li>
                                                                    <li data-value="3" class="option">3</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!--/ End Form Bathrooms -->
                                                    </div>
                                                    <!-- Price Fields -->
                                                    <div class="main-search-field-2 col-12">
                                                        <!-- Area Range -->
                                                        <div class="row">
                                                            <div class="col-md-6 pl-0">
                                                                <div class="price-range-wrapper">
                                                                    <div class="range-box">
                                                                        <div class="price-label">Flat Size:</div>
                                                                        <div id="price-range-filter-5" class="price-range-filter"></div>
                                                                        <div class="price-filter-wrap d-flex align-items-center">
                                                                            <div class="price-range-select">
                                                                                <div class="price-range" id="price-range-min-5"></div>
                                                                                <div class="price-range">-</div>
                                                                                <div class="price-range" id="price-range-max-5"></div>
                                                                                <div class="price-range range-title">sft</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 pl-0">
                                                                <div class="price-range-wrapper">
                                                                    <div class="range-box">
                                                                        <div class="price-label">Distance:</div>
                                                                        <div id="price-range-filter-6" class="price-range-filter"></div>
                                                                        <div class="price-filter-wrap d-flex align-items-center">
                                                                            <div class="price-range-select">
                                                                                <div class="price-range" id="price-range-min-6"></div>
                                                                                <div class="price-range">-</div>
                                                                                <div class="price-range" id="price-range-max-6"></div>
                                                                                <div class="price-range range-title">km</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- row -->
                                                    <div class="row">
                                                
                                                        <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                                                            <h4 class="text-dark">Amenities</h4>
                                                            <ul class="no-ul-list third-row">
                                                                <li>
                                                                    <input id="a-1" class="checkbox-custom" name="a-1" type="checkbox">
                                                                    <label for="a-1" class="checkbox-custom-label">Air Condition</label>
                                                                </li>
                                                                <li>
                                                                    <input id="a-2" class="checkbox-custom" name="a-2" type="checkbox">
                                                                    <label for="a-2" class="checkbox-custom-label">Bedding</label>
                                                                </li>
                                                                <li>
                                                                    <input id="a-3" class="checkbox-custom" name="a-3" type="checkbox">
                                                                    <label for="a-3" class="checkbox-custom-label">Heating</label>
                                                                </li>
                                                                <li>
                                                                    <input id="a-4" class="checkbox-custom" name="a-4" type="checkbox">
                                                                    <label for="a-4" class="checkbox-custom-label">Internet</label>
                                                                </li>
                                                                <li>
                                                                    <input id="a-5" class="checkbox-custom" name="a-5" type="checkbox">
                                                                    <label for="a-5" class="checkbox-custom-label">Microwave</label>
                                                                </li>
                                                                <li>
                                                                    <input id="a-6" class="checkbox-custom" name="a-6" type="checkbox">
                                                                    <label for="a-6" class="checkbox-custom-label">Smoking Allow</label>
                                                                </li>
                                                                <li>
                                                                    <input id="a-7" class="checkbox-custom" name="a-7" type="checkbox">
                                                                    <label for="a-7" class="checkbox-custom-label">Terrace</label>
                                                                </li>
                                                                <li>
                                                                    <input id="a-8" class="checkbox-custom" name="a-8" type="checkbox">
                                                                    <label for="a-8" class="checkbox-custom-label">Balcony</label>
                                                                </li>
                                                                <li>
                                                                    <input id="a-9" class="checkbox-custom" name="a-9" type="checkbox">
                                                                    <label for="a-9" class="checkbox-custom-label">Balcony</label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        
                                                    </div>
                                                <!-- /row -->
                                                <div class="filter-button">
                                                    <a href="without-sidebar.html" class="filter-btn1">Apply Filter</a>
                                                    <a href="without-sidebar.html" class="filter-btn1 reset-btn">Reset Filter<i class="fas fa-redo-alt"></i></a>
                                                </div>
                                            </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        <!--/ End Search Form -->
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="row justify-content-center">
            
                        @foreach ($cars as $car)
                        <div class="col-lg-4 col-md-6">
                            <div class="property-box2 wow animated fadeInUp" data-wow-delay=".3s">
                                <div class="item-img">
                                    <a href="{{ route('car',['slug'=>$car->slug]) }}"><img src="{{ asset('storage/images/cars/' . $car->image) }}" alt="property" style="height: 340px; object-fit: contain;"></a>
                                    @if($car->status == 'Sold')
                                    <div class="item-category-box1">
                                        <div class="item-category">Sold out</div>
                                    </div>
                                    @endif
                                    <div class="rent-price">
                                        <div class="item-price">{{ $car->currency }} {{ $car->price }}<span><i>/</i>mo</span></div>
                                    </div>
                                    {{-- <div class="react-icon">
                                        <ul>
                                            <li>
                                                <a href="favourite.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Favourites">
                                                    <i class="flaticon-heart"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                    <i class="flaticon-left-and-right-arrows"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div> --}}
                                </div>
                                <div class="item-category10"><a href="{{ route('car',['slug'=>$car->slug]) }}">{{ $car->advertType ?? 'For Rent' }}</a></div>
                       
                                <div class="item-content">
                                    <div class="verified-area">
                                        <h3 class="item-title"><a href="{{ route('car',['slug'=>$car->slug]) }}">{{ $car->title }}</a></h3>
                                    </div>
                                    <div class="location-area"><i class="flaticon-maps-and-flags"></i>{{ $car->location }}</div>
                                    <div class="item-categoery3">
                                        <ul>
                                            <li><strong>Engine Type</strong> : {{ $car->engineType }}</li>,
                                            <li><strong>Transmission</strong> : {{ $car->transmission }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
            
                    </div>
            
                    <!-- Dynamic Pagination -->
                    <div class="pagination-style-1 d-flex justify-content-center mt-4">
                        {{ $cars->links() }}
                    </div>
                </div>
            </div>
            
        </div>
    </section>

@endsection