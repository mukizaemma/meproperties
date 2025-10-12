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

            <div class="row">
                <div class="col-lg-12">
                    <div class="row justify-content-center">
            
                        @foreach ($properties as $property)
                        <div class="col-lg-4 col-md-6">
                            <div class="property-box2 wow animated fadeInUp" data-wow-delay=".3s">
                                <div class="item-img">
                                    <a href="{{ route('property',['slug'=>$property->slug]) }}"><img src="{{ asset('storage/images/properties/' . $property->image) }}" alt="property" style="height: 340px; object-fit: contain;"></a>
                                    @if($property->status == 'Sold')
                                    <div class="item-category-box1">
                                        <div class="item-category">Sold out</div>
                                    </div>
                                    @endif
                                    <div class="rent-price">
                                        <div class="item-price">{{ $property->currency }} {{ $property->price }}<span><i>/</i>mo</span></div>
                                    </div>
                                    <div class="react-icon">

                                    </div>
                                </div>
                                <div class="item-category10"><a href="{{ route('property',['slug'=>$property->slug]) }}">{{ $property->advertType ?? 'For Rent' }}</a></div>
                                <div class="item-content">
                                    <div class="verified-area">
                                        <h3 class="item-title"><a href="{{ route('property',['slug'=>$property->slug]) }}">{{ $property->title }}</a></h3>
                                    </div>
                                    <div class="location-area"><i class="flaticon-maps-and-flags"></i>{{ $property->location }}</div>
                                    <div class="item-categoery3">
                                        <ul>
                                            <li><i class="flaticon-bed"></i><span>Beds: {{ $property->bedrooms }}</span></li>
                                            <li><i class="flaticon-shower"></i><span>Baths: {{ $property->bathrooms }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
            
                    </div>
            
                    <!-- Dynamic Pagination -->
                    <div class="pagination-style-1 d-flex justify-content-center mt-4">
                        {{ $properties->links() }}
                    </div>
                </div>
            </div>
            
        </div>
    </section>

@endsection