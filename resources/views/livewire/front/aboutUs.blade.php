
<div>
    <section class="about-wrap2">
        <div class="container">
            <div class="row flex-row-reverse flex-lg-row">
                <div class="col-xl-6 col-lg-6">
                    <div class="about-img">
                        <img src="{{ asset('storage/images/about') . $about->image1 }}" alt="about" width="746" height="587">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="about-box3 wow fadeInUp" data-wow-delay=".2s">
                        <h2 class="item-title">About Us</h2>
                        <p>
                            {!! $about->founderDescription !!}
                        </p>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="about-layout1">
                                    <div class="item-img">
                                        <img src="img/figure/shape14.svg" alt="shape" width="60" height="57">
                                    </div>
                                    <h3 class="item-sm-title">Modern Technology</h3>
                                    <p>We’re Here to Help You Sell and Connect
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="about-layout1">
                                    <div class="item-img">
                                        <img src="img/figure/shape15.svg" alt="shape" width="62" height="57">
                                    </div>
                                    <h3 class="item-sm-title">Secure Payment</h3>
                                    <p>We Make Buying and Selling Easier in Rwanda
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>

        </div>
    </section>
</div>
