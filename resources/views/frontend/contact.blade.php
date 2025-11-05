@extends('layouts.frontbase')
{{-- <base href="/public"> --}}

@section('content')


    <!--=====================================-->
    <!--=   contact    Start                =-->
    <!--=====================================-->

    <section class="contact-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-box1">
                        <div class="contact-img">
                            <img src="{{ asset('storage/images') . $setting->donate }}" alt="contact" height="502" width="607">
                        </div>
                        <div class="contact-content">
                            <h3 class="contact-title">Office Information</h3>
                            <div class="contact-list">
                                <ul>
                                    <li>{{ $setting->company }}</li>
                                    <li>{{ $setting->address }}</li>
                                    <li>Uganda</li>
                                </ul>
                            </div>
                            <div class="phone-box">
                                <div class="item-lebel">Call us for direct support :</div>
                                <div class="phone-number"><a href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a> </div>
                                <div class="item-icon"><i class="fas fa-phone-alt"></i></div>
                            </div>
                            <div class="social-box">
                                <div class="item-lebel">Social Share :</div>
                                <ul class="item-social">
                                    <li><a href="{{ $setting->address }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{ $setting->linkedin }}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="{{ $setting->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="https://web.whatsapp.com/" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                                </ul>
                                <div class="item-icon"><i class="fas fa-share-alt"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-box2">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.7548142240153!2d32.62913687496458!3d0.32327299967355405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x177db9c873fffe8f%3A0x4e080453c0c41229!2sEnkombe%20Villas!5e0!3m2!1sen!2srw!4v1762324028028!5m2!1sen!2srw" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <div class="contact-content">
                            <h3 class="contact-title">Quick Contact</h3>
                            <p>Borem ipsum dolor sit amet conse ctetur adipisicing elit sed do eiusmod 
                                Eorem ipsum dolor sit amet conse ctetur.
                            </p>
                            <form class="contact-box rt-contact-form">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label>Name *</label>
                                        <input type="text" class="form-control" name="fname" placeholder="First Name*" data-error="First Name is required" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Phone *</label>
                                        <input type="text" class="form-control" name="phone" placeholder="Phone*" data-error="Phone is required" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label>Message *</label>
                                        <textarea name="comment" id="message" class="form-text"  placeholder="Message" cols="30" rows="5" data-error="Message Name is required" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <button type="submit" class="item-btn">Send message</button>
                                    </div>
                                </div>
                                <div class="form-response"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection