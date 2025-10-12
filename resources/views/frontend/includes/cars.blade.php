<section class="feature-rent-wrap1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-7 col-sm-12">
                <div class="item-heading-left">
                    <h2 class="section-title">Find your next car or home with ease. Verified listings, real connections</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-5 col-sm-12">
                <div class="heading-button">
                    <a href="{{ route('properties') }}" class="heading-btn">View All Properties</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-5">
                @if($cars->count() > 0)
                @php
                    $latestCar = $cars->first();
                @endphp
                <div class="rent-box1 wow fadeInUp" data-wow-delay=".2s">
                    <div class="item-img">
                        <a href="{{ route('car',['slug'=>$latestCar->slug]) }}"><img src="{{ asset('storage/images/cars/' .$latestCar->image) }}" alt="property" width="630" height="430"></a>
                        <div class="item-category-box1">
                            <div class="item-category">{{ $latestCar->advertType ?? 'For Rent' }}</div>
                        </div>  
                    </div>
                    <div class="item-content">
                        <h3 class="item-title"><a href="{{ route('car',['slug'=>$latestCar->slug]) }}">{{ $latestCar->title }}</a></h3>
                        <div class="location-area"><i class="flaticon-maps-and-flags"></i>{{ $latestCar->location }}</div>
                        <p>
                            {!! Str::words($latestCar->description, 50, '...') !!}
                        </p>
                        <div class="item-categoery3">
                            <ul>
                                <li><strong>Engine Type</strong> : {{ $latestCar->engineType }}</li>,
                                <li><strong>Transmission</strong> : {{ $latestCar->transmission }}</li>
                                <li>
                                    <div class="item-price">{{ number_format($latestCar->price) }} Rwf
                                        @if($latestCar->advertType == 'For Rent')
                                        <span>/Day</span>
                                        @endif
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                @endif
            </div>
            <div class="col-xl-6 col-lg-7 wow fadeInUp" data-wow-delay=".4s">
                @foreach($cars->skip(1) as $car)
                    <div class="rent-feature1">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="rent-box2">
                                    <div class="item-img">
                                        <a href="{{ route('car',['slug'=>$car->slug]) }}">
                                            <img src="{{ asset('storage/images/cars/' .$car->image) }}" alt="car" height="170" width="220">
                                        </a>
                                        <div class="item-category">
                                            <a href="{{ route('car',['slug'=>$car->slug]) }}">{{ $car->advertType ?? 'For Rent' }}</a>
                                        </div>
                                    </div>
                                    <div class="item-content">
                                        <h3 class="item-title">
                                            <a href="{{ route('car',['slug'=>$car->slug]) }}">{{ $car->title }}</a>
                                        </h3>
                                        {{-- <div class="location-area"><i class="flaticon-maps-and-flags"></i>{{ $car->location }}</div> --}}

                                        <div class="item-categoery3">
                                            <ul>
                                                <li><strong>Engine</strong> : {{ $car->engineType }}</li>,
                                                <li><strong>Transmission</strong> : {{ $car->transmission }}</li>
                                                {{-- <li><strong>Doors</strong> : {{ $car->doors }}</li> --}}
                                            </ul>
                                        </div>
                                        <div class="rent-price">
                                            <div class="item-price">{{ number_format($car->price) }} Rwf
                                                @if($car->advertType == 'For Rent')
                                                <span>/Day</span>
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