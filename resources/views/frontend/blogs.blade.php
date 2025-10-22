@extends('layouts.frontbase')


@section('content')

<section class="blog-wrap5">
    <div class="container">
        <div class="row gutters-40">
            <div class="col-lg-8">
                <div class="row">
                    @foreach($blogs as $blog)
                    <div class="col-lg-12">
                        <div class="blog-box1 blog-box2 wow fadeInUp" data-wow-delay=".4s">
                            <div class="item-img img-style-2">
                                <a href="{{ route('blog', $blog->slug) }}"><img src="{{ asset('storage/images/blogs/' . $blog->image) }}" alt="blog" width="739" height="399"></a>
                            </div>
                            <div class="item-content content-style-2">
                                <div class="entry-meta">
                                    <ul>
                                        {{-- <li class="theme-cat"><a href="{{ route('blog', $blog->slug) }}"><img src="{{ asset('storage/images/blogs/' . $blog->image) }}" alt="theme"></a></li> --}}
                                        <li class="calendar-icon"><a href="{{ route('blog', $blog->slug) }}"><i class="far fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($blog->created_at)->format('M,d,Y') }}</a></li>
                                        <li><a href="{{ route('blog', $blog->slug) }}">{{ ceil(str_word_count(strip_tags($blog->body)) / 200) }}</a></li>
                                    </ul>
                                </div>
                                <div class="heading-title title-style-2">
                                    <h3><a href="{{ route('blog', $blog->slug) }}">{{ $blog->title }}</a></h3>
                                    <p>
                                        {!! Str::limit($blog->body, 250) !!}
                                    </p>
                                </div>
                                <div class="blog-button-style2">
                                    <a href="{{ route('blog', $blog->slug) }}" class="item-btn">Read More<i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="pagination-style-1">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="with-sidebar2.html" aria-label="Previous">
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
            <div class="col-lg-4 widget-break-lg sidebar-widget">

                <div class="widget widget-listing-box1">
                    <h3 class="widget-subtitle">Latest Listing</h3>

                    @foreach ($properties as $property)
                    <div class="widget-listing">
                        <div class="item-img">
                            <a href="{{ route('property', $property->slug) }}"><img src="{{ asset('storage/images/properties/' . $property->image) }}" alt="widget" width="120" height="102"></a>
                        </div>
                        <div class="item-content">
                            <h5 class="item-title"><a href="{{ route('property', $property->slug) }}">{{ $property->title }}</a></h5>
                            <div class="location-area"><i class="flaticon-maps-and-flags">{{ $property->location }}</i></div>
                            <div class="item-price">
                                {{ $property->currency }} {{ number_format($property->price) }}
                                @if($property->listing_type === 'Rent')
                                    <span>/mo</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
</section>

      

@endsection