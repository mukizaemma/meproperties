@extends('layouts.frontbase')


@section('content')

<section class="blog-wrap5">
    <div class="container">
        <div class="row gutters-40">
            <div class="col-lg-8">
                <div class="row">

                    @foreach ($services as $service)
                    <div class="col-lg-12">
                        <div class="blog-box1 blog-box2 wow fadeInUp" data-wow-delay=".4s">
                            <div class="item-img img-style-2">
                                <a href="{{ route('service',['slug'=>$service->slug]) }}"><img src="{{ asset('storage/images/services/' .$service->image) }}" alt="blog" width="739" height="399"></a>
                            </div>
                            <div class="item-content content-style-2">
                                <div class="heading-title title-style-2">
                                    <h3><a href="{{ route('service',['slug'=>$service->slug]) }}">{{ $service->name }}</a></h3>
                                    <p>
                                        {!! Str::words($service->description, 50, '...') !!}
                                    </p>
                                </div>
                                <div class="blog-button-style2">
                                    <a href="{{ route('service',['slug'=>$service->slug]) }}" class="item-btn">Read More<i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>
            <div class="col-lg-4 widget-break-lg sidebar-widget">
                <div class="widget widget-search-box">
                    <h3 class="widget-subtitle">Search</h3>
                    <div class="widget-form-box">
                        <input class="form-control" type="text" placeholder="What are you looking for?">
                        <div class="item-search"><i class="fas fa-search"></i></div>
                    </div>
                </div>
                <div class="widget widget-listing-box1">
                    <h3 class="widget-subtitle">Latest Listing</h3>
                    <div class="widget-listing">
                        <div class="item-img">
                            <a href="single-listing1.html"><img src="img/blog/widget2.jpg" alt="widget" width="120" height="102"></a>
                        </div>
                        <div class="item-content">
                            <h5 class="item-title"><a href="single-listing1.html">House Highland Uganda</a></h5>
                            <div class="location-area"><i class="flaticon-maps-and-flags"></i>California</div>
                            <div class="item-price">$3,000<span>/mo</span></div>
                        </div>
                    </div>
                    <div class="widget-listing">
                        <div class="item-img">
                            <a href="single-listing1.html"><img src="img/blog/widget3.jpg" alt="widget" width="120" height="102"></a>
                        </div>
                        <div class="item-content">
                            <h5 class="item-title"><a href="single-listing1.html">House Highland Uganda</a></h5>
                            <div class="location-area"><i class="flaticon-maps-and-flags"></i>California</div>
                            <div class="item-price">$1,200<span>/mo</span></div>
                        </div>
                    </div>
                    <div class="widget-listing no-brd">
                        <div class="item-img">
                            <a href="single-agent1.html"><img src="img/blog/widget4.jpg" alt="widget" width="120" height="102"></a>
                        </div>
                        <div class="item-content">
                            <h5 class="item-title"><a href="single-listing1.html">House Highland Uganda</a></h5>
                            <div class="location-area"><i class="flaticon-maps-and-flags"></i>California</div>
                            <div class="item-price">$1,900<span>/mo</span></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

      

@endsection