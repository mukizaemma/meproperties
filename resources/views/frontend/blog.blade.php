@extends('layouts.frontbase')


@section('content')


<section class="blog-wrap6">
    <div class="container">
        <div class="row gutters-40">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-box1 blog-box3 wow fadeInUp" data-wow-delay=".4s">
                            <div class="item-img img-style-3">
                                <a href="blog1.html"><img src="{{ asset('storage/images/blogs/' . $blog->image) }}" alt="blog" width="739" height="399"></a>
                            </div>
                            <div class="item-content">
                                <div class="entry-meta">
                                    <ul>
                                        {{-- <li class="theme-cat"><a href="blog1.html"><img src="img/theme1.png" alt="theme" width="31" height="31">by radiustheme</a></li> --}}
                                        <li class="calendar-icon"><a ><i class="far fa-calendar-alt"></i> {{ $blog->created_at->format('d M Y') }}</a></li>
                                        {{-- <li><a href="single-listing1.html">Apartment, Room</a></li> --}}
                                        <li><a >{{ ceil(str_word_count(strip_tags($blog->body)) / 200) }}</a></li>
                                    </ul>
                                </div>
                                <div class="heading-title title-style-2">
                                    <h3><a >{{ $blog->title }}</a></h3>
                                    <p>
                                        {!! $blog->body !!}
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 widget-break-lg sidebar-widget">


                <div class="widget widget-listing-box1">
                    <h3 class="widget-subtitle">Latest Articles</h3>

                    @foreach ($recentArticles as $recent)
                    <div class="widget-listing">
                        <div class="item-img">
                            <a href="{{ route('blog', $recent->slug) }}"><img src="{{ asset('storage/images/blogs/' . $recent->image) }}" alt="widget" width="120" height="102"></a>
                        </div>
                        <div class="item-content">
                            <h5 class="item-title"><a href="{{ route('blog', $recent->slug) }}">{{ $recent->title }}</a></h5>
                            <div class="item-price">{{ \Carbon\Carbon::parse($recent->created_at)->format('d M Y') }}</div>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
</section>

      

@endsection