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
    <div class="col-lg-12">
        <div class="property-wrap-9">
            <div class="tab-style-1 tab-style-3">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="mylisting" role="tabpanel">
                        <div class="row">
                            @if($noResults)
                                <div class="col-lg-12 text-center">
                                    <p class="alert alert-warning">No properties found matching your search criteria.</p>
                                </div>
                            @else
                                @if(isset($properties) && $properties->count())
                                    @foreach ($properties as $property)
                                        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                                            <div class="property-box2 wow animated fadeInUp" data-wow-delay=".2s"
                                                 style="border-radius:10px; overflow:hidden; transition:transform 0.3s ease;">
                                                
                                                <div class="item-img" style="position:relative; overflow:hidden; border-bottom:1px solid #eee;">
                                                    <a href="{{ route('property', ['slug'=>$property->slug]) }}">
                                                        <img src="{{ asset('storage/images/properties/' . $property->image) }}"
                                                             alt="property"
                                                             style="width:100%; height:250px; object-fit:cover; transition:transform 0.4s ease;">
                                                    </a>
                                                    <div class="item-category-box1">
                                                        <div class="item-category">{{ $property->listing_type }}</div>
                                                    </div>
                                                    <div class="rent-price">
                                                        <div class="item-price">
                                                            {{ $property->currency }} {{ number_format($property->price) }}
                                                            @if($property->listing_type === 'For Rent')
                                                                <span><i>/</i>mo</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="react-icon">
                                                        <ul>
                                                            <li>
                                                                <a href="#" data-bs-toggle="tooltip" title="Favourites">
                                                                    <i class="flaticon-heart"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" data-bs-toggle="tooltip" title="Compare">
                                                                    <i class="flaticon-left-and-right-arrows"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="item-content" style="padding:15px;">
                                                    <div class="verified-area mb-2">
                                                        <h3 class="item-title mb-1" style="font-size:16px; font-weight:600;">
                                                            <a href="{{ route('property', ['slug'=>$property->slug]) }}"
                                                               style="color:#333; text-decoration:none;">
                                                               {{ Str::limit($property->title, 45) }}
                                                            </a>
                                                        </h3>
                                                        <div class="location-area" style="font-size:14px; color:#777;">
                                                            <i class="flaticon-maps-and-flags" style="margin-right:5px;"></i>{{ $property->city }}
                                                        </div>
                                                    </div>
                                                    <div class="item-categoery3 mt-2">
                                                        <ul style="display:flex; justify-content:space-between; font-size:13px; color:#555; padding:0;">
                                                            <li><i class="flaticon-bed"></i> {{ $property->bedrooms }} Beds</li>
                                                            <li><i class="flaticon-shower"></i> {{ $property->bathrooms }} Baths</li>
                                                            <li><i class="flaticon-two-overlapping-square"></i> {{ $property->area }} Sqft</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            @endif
                        </div>

                        {{-- Pagination --}}
                        <div class="pagination-style-1">
                            {{ $properties->links() }}
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