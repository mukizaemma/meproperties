<div>
    <div class="row">
        @foreach ($products as $product)
        <div class="col-lg-6 col-sm-12 mx-auto h-100">
            <div class="property-box2 property-box5 wow animated fadeInUp" data-wow-delay=".6s">
                <div class="item-img">
                    <a href="{{ route('product',['slug'=>$product->slug]) }}">"><img src="{{ asset('storage/images/products/' .$product->image) }}" alt="blog" height="170" style="height: 170px; object-fit: contain;"></a>

                </div>
                <div class="item-content item-content-property">
                    <div class="verified-area">
                        <h3 class="item-title"><a href="{{ route('product',['slug'=>$product->slug]) }}">">{{ $product->title }}</a></h3>
                    </div>
                    <div class="location-area"><i class="flaticon-maps-and-flags"></i>{{ $product->location }}</div>
                    <div class="item-categoery5">
                        <ul>
                            <li><strong>Condition</strong>: {{ $product->condition }}</li>
                        </ul>
                    </div>
                    <div class="item-price">{{ $product->currency }} {{ $product->price }}</div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
