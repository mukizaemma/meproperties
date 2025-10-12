@extends('layouts.frontbase')

<base href="/public">
@section('content')


<section class="blog-wrap6">
    <div class="container">
        <div class="row gutters-40">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-box1 blog-box3 wow fadeInUp" data-wow-delay=".4s">
                            <div class="item-img img-style-3">
                                <a href="blog1.html"><img src="{{ asset('storage/images/services/' .$service->image) }}" alt="blog" width="739" height="399"></a>
                            </div>
                            <div class="item-content">
                                <div class="heading-title title-style-2">
                                    <h3><a href="single-listing1.html">{{ $service->name }}</a></h3>
                                    <p>
                                        {!! !$service->description !!}
                                    </p>
                                </div>

                                <div class="row gutters-10">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="single-blog-img">
                                            <img src="img/blog/blog26.jpg" alt="blog" width="363" height="240">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="single-blog-img">
                                            <img src="img/blog/blog27.jpg" alt="blog" width="363" height="240">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single-blog-img single-blog-img2">
                                            <img src="img/blog/blog28.jpg" alt="blog" width="739" height="370">
                                        </div>
                                    </div>
                                </div>
                                <div class="heading-title title-style-2">
                                    <h3><a href="single-listing1.html">12 Walkable Cities Where You Can Live Affordably</a></h3>
                                    <p class="style-3">when an unknown printer took a galley of type and scrambled it to make a type specimen bookItea 
                                        has survived not only five centuries, but also the leap into electronic typesetting, remaining essen
                                        tially unchanged.printer took a galley of type and scrambled it to make a type specimen bookh
                                        as survived not only five.
                                    </p>
                                </div>
                                <div class="single-blog-list">
                                    <ul>
                                        <li>Affordable housing</li>
                                        <li>List of housing statutes</li>
                                        <li>List of human habitation forms</li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
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
                    <h3 class="widget-subtitle">Related Services</h3>

                    @foreach ($otherServices as $rs)
                    <div class="widget-listing">
                        <div class="item-img">
                            <a href="{{ route('service',['slug'=>$rs->slug]) }}"><img src="{{ asset('storage/images/services/' .$rs->image) }}" alt="widget" width="120" height="102"></a>
                        </div>
                        <div class="item-content">
                            <h5 class="item-title"><a href="{{ route('service',['slug'=>$rs->slug]) }}">{{ $rs->name }}</a></h5>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
</section>

      

@endsection