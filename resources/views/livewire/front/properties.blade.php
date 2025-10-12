<div>
    <div class="slider-wrapper">
        <div class="swiper-container property-layout1">
            <div class="swiper-wrapper">

                @foreach ($properties as $house)
                <div class="swiper-slide">
                    <div class="property-box6 wow animated fadeInUp" data-wow-delay=".6s">
                        <div class="item-img">
                            <a href="{{ route('property',['slug'=>$house->slug]) }}"><img src="{{ asset('storage/images/properties/' .$house->image) }}" alt="blog" style="height: 259px; object-fit: contain;"></a>
                            <div class="categoery-style-3">
                                <div class="item-category-box1">
                                    <div class="item-category">{{ $house->advertType ?? 'For Rent' }}</div>
                                   
                                </div>
                                {{-- <div class="react-icon">
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
                                </div> --}}
                            </div>
                            {{-- <ul class="item-rating">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                            </ul> --}}
                        </div>
                        <div class="item-content">
                            <div class="verified-area">
                                <h3 class="item-title"><a href="{{ route('property',['slug'=>$house->slug]) }}">{{ $house->title }}</a></h3>
                            </div>
                            <div class="location-area"><i class="flaticon-maps-and-flags"></i>{{ $house->location }}</div>
                            <div class="item-price">{{ $house->currency }} {{ $house->price }}/<span>mo</span></div>
                            <div class="item-categoery3">
                                <ul>
                                    <li><i class="flaticon-bed"></i><span>Beds: {{ $house->bedrooms }}</span></li>
                                    <li><i class="flaticon-shower"></i><span>Baths: {{ $house->bathrooms }}</span></li>
                                    {{-- <li><i class="flaticon-two-overlapping-square"></i><span>931 Sqft</span></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
