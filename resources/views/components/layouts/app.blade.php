@php
    $setting = \App\Models\Setting::first();
    $slides = \App\Models\Slide::oldest()->get();
@endphp

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $setting->company ?? '' }} </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon Start Here -->
    <link rel="shortcut icon" type="{{ asset('image/x-icon')}}" href="{{ asset('storage/images') . $setting->logo }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css')}}">
    <!-- Bootstrap Css Start Here -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <!-- Animate Css Start Here -->
    <link rel="stylesheet" href="{{ asset('css/animate.min.css')}}">
    <!-- Owl Carousel Start Here -->
    <link rel="stylesheet" href="{{ asset('vendor/owlcarousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendor/owlcarousel/owl.theme.default.min.css')}}">
    <!-- Swiper Css Start Here -->
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css')}}" />
    <!-- Flaticon Css Start Here -->
    <link rel="stylesheet" href="{{ asset('css/flaticon/font/flaticon.css')}}">
    <!-- Select Css Start Here -->
    <link rel="stylesheet" href="{{ asset('css/nice-select.css')}}">
    <!-- Animate Css Start Here -->
    <link rel="stylesheet" href="{{ asset('css/animate.min.css')}}">
    <!-- Pop Up Css Start Here -->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}">
    <!-- All min Css Start Here -->
    <link rel="stylesheet" href="{{ asset('css/all.min.css')}}">
    <!-- Pannellum -->
    <link rel="stylesheet" href="{{ asset('css/pannellum.css')}}">
    <!-- noUIrangle slider -->
    <link rel="stylesheet" href="{{ asset('vendor/noUiSlider/nouislider.min.css')}}">
    <!-- Style Css Start Here -->
    <link rel="stylesheet" href="{{ asset('style.css')}}">
    <!-- Google Font Start Here -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://unpkg.com/nprogress@0.2.0/nprogress.css" />


    @livewireStyles

</head>

<body class="sticky-header">
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->
    <!--=====================================-->
    <!--=   Preloader     Start             =-->
    <!--=====================================-->
    <div id="preloader"></div>
    <!--=====================================-->
    <!--=   Preloader     End               =-->
    <!--=====================================-->

    <div class="wrapper" id="wrapper">
    <!--=====================================-->
    <!--=   Header     Start                =-->
    <!--=====================================-->

    <header class="header">
        <div id="rt-sticky-placeholder"></div>
        <div id="header-menu" class="header-menu menu-layout1 header-menu menu-layout2">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-xl-2 col-lg-2">
                        <div class="logo-area">
                            <a href="{{ route('home') }}" class="temp-logo">
                                <img src="{{ asset('storage/images') . $setting->logo }}" width="157" height="40" alt="logo" class="img-fluid">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 d-flex justify-content-center position-static">
                        <nav id="dropdown" class="template-main-menu template-main-menu-2">
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}" class="active"  data-turbolinks="true" data-turbolinks-action="replace">Home</a>

                                </li>

                                <li>
                                    <a href="{{ route('aboutUs') }}" data-turbolinks="true">About</a>
                                  <ul class="dropdown-menu-col-1">

                                      <li>
                                          <a href="{{ route('aboutUs') }}" data-turbolinks="true" data-turbolinks-action="replace">About Us</a>
                                      </li>
                                      <li>
                                          <a href="{{ route('pricing') }}">Our Placing Plan</a>
                                      </li>
                                      <li>
                                          <a href="{{ route('connect') }}">Our Contacts</a>
                                      </li>
                                      <li>
                                          <a href="{{ route('terms') }}">our Terms and Conditions</a>
                                      </li>
                                  </ul>
                              </li>
                                <li>
                                    <a href="{{ route('properties') }}">Real Estate</a>
                                    <ul class="dropdown-menu-col-1">
                                        <li>
                                            <a href="{{ route('properties') }}">Houses for Rent</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('properties') }}">Houses for Sell</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('properties') }}">Offices for Rent</a>
                                        </li>
                                      
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('cars') }}">Cars</a>
                                    <ul class="dropdown-menu-col-1">
                                        <li>
                                            <a href="{{ route('cars') }}">for Rent</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('cars') }}">For Sell</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('cars') }}">Move your Products</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('products') }}">Special Deals</a>
                                    <ul class="dropdown-menu-col-1">
                                        <li>
                                            <a href="{{ route('products') }}">Electronics</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('products') }}">Furnitures</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('products') }}">Others</a>
                                        </li>
                                    </ul>
                                </li>
 

                                <li>
                                    <a href="{{ route('pricing') }}">Pricing Plan</a>
                                </li>

                            </ul>
                        </nav>
                    </div>
                    <div class="col-xl-3 col-lg-3 d-flex justify-content-end">
                        <div class="header-action-layout1 header-action-layout4">
                            <ul class="action-list">
                                <li class="action-item-style my-account2">
                                    <a href="{{ route('about') }}" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Sign In">
                                        <i class="flaticon-user-1"></i>
                                    </a>
                                </li>
                                <li class="listing-button">
                                    <a href="{{ route('about') }}" class="listing-btn">
                                        <span>
                                            <i class="fas fa-plus-circle"></i>
                                        </span>
                                        <span class="item-text">Ask Anything</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div
        class="rt-header-menu mean-container position-relative"
        id="meanmenu">
        <div class="mean-bar">
            <a href="{{ route('home') }}">
                <img src='{{ asset('storage/images') . $setting->logo }}' alt='logo' class='img-fluid'/>
            </a>
            <div class="mean-bar--right">
                <div class="actions search">
                    <a href="#template-search" class="item-icon" title="Search">
                        <i class="fas fa-search"></i>
                    </a>
                </div>
                <div class="actions user">
                    <a href="{{ route('login') }}"><i class="flaticon-user"></i></a>
                </div>
                <span class="sidebarBtn">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </span>
            </div>
        </div>
        <div class="rt-slide-nav">
            <div class="offscreen-navigation">
                <nav class="menu-main-primary-container">
                    <ul class="menu">
                        <li class="list menu-item-parent menu-item-has-children">
                            <a class="animation" href="index.html">Home</a>

                        </li>
                        <li class="list menu-item-parent menu-item-has-children">
                            <a class="animation" href="with-sidebar2.html">Real Estate</a>
                            <ul class="main-menu__dropdown sub-menu">
                                <li>
                                    <a href="half-map1.html">Houses for Rent</a>
                                </li>
                                <li>
                                    <a href="half-map2.html">Houses for Sell</a>
                                </li>
                                <li>
                                    <a href="without-sidebar.html">Offices for Rent</a>
                                </li>
                 
                            </ul>
                        </li>
                        <li class="list menu-item-parent menu-item-has-children">
                            <a class="animation" href="index.html">Cars</a>
                            <ul class="main-menu__dropdown sub-menu">
                                <li><a href="about.html">For Rent</a></li>
                                <li><a href="404.html">For Sell</a></li>
                                <li><a href="404.html">Move your Products</a></li>

                            </ul>
                        </li>
                        <li class="list menu-item-parent menu-item-has-children">
                            <a class="animation" href="index.html">Special Deals</a>
                            <ul class="main-menu__dropdown sub-menu">
                                <li><a href="about.html">Electronics</a></li>
                                <li><a href="404.html">Furnitures</a></li>
                                <li><a href="404.html">Accessories</a></li>

                            </ul>
                        </li>

                        <li class="list menu-item-parent">
                            <a class="animation" href="contact.html">Contact us</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!--=====================================-->
    <!--=   Main Banner     Start           =-->
    <!--=====================================-->

    <div class="container-fluid">
        {{$slot}}
    </div>


    <footer class="footer-area" style="background-color: dark !important">
      <div class="footer-top">
          <div class="container">
              <div class="row justify-content-between">
                  <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                      <div class="footer-logo-area">
                          <div class="item-logo">
                              <img src="{{ asset('storage/images') . $setting->logo }}" width="157" height="40" alt="logo" class="img-fluid">
                          </div>
                          <p>

                          </p>
                          <div class="item-social">
                              <ul>
                                  <li><a href="{{ $setting->facebook ?? '' }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                  <li><a href="{{ $setting->linkedin ?? '' }}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                  <li><a href="{{ $setting->instagram ?? '' }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-5 col-lg-5 col-md-6 col-sm-6">
                      <div class="footer-link">
                          <div class="footer-title">
                              <h3>Quick Links</h3>
                          </div>
                          <div class="item-link">
                              <ul>
                                  <li><a href="about-1.html">About Us </a></li>
                                  <li><a href="blog-details1.html">Real Estate </a></li>
                                  <li><a href="about-1.html">Cars for Rent & Sell</a></li>
                                  <li><a href="about-1.html">Special Deals </a></li>
                                  <li><a href="contact.html">Contact Us </a></li>
                              </ul>
                          </div>
                      </div>
                  </div>

                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                      <div class="footer-contact">
                          <div class="footer-title">
                              <h3>Contact</h3>
                          </div>
                          <div class="footer-location">
                              <ul>
                                  <li class="item-map"><i class="fas fa-map-marker-alt"></i> {{ $setting->address ?? '' }}</li>
                                  <li><a href="mailto:{{ $setting->email ?? '' }}"><i class="fas fa-envelope"></i>{{ $setting->email ?? '' }}</a></li>
                                  <li><a href="tel:{{ $setting->phone ?? '' }}"><i class="fas fa-phone-alt"></i>{{ $setting->phone ?? '' }}</a></li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="footer-bottom">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-6 col-md-6">
                      <div class="copyright-area1">
                          <ul>
                              <li><a href="">Terms of Use</a></li>
                              <li><a href="">Privacy Policy</a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                      <div class="copyright-area2">
                          <p> © <script>document.write(new Date().getFullYear())</script>. All Rights Reserved</p> 
                          <a href="https:/iremetech.com" target="_blank" >Developed by Ireme Technologies</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </footer>

  <!-- start back to top -->
  <a href="javascript:void(0)" id="back-to-top">
      <i class="fas fa-angle-double-up"></i>
  </a>
  <!-- End back to top -->

</div>
<div id="template-search" class="template-search">
  <button type="button" class="close">×</button>
  <form class="search-form">
    <input type="search" value="" placeholder="Search" />
    <button type="submit" class="search-btn btn-ghost style-1">
      <i class="flaticon-search"></i>
    </button>
  </form>
</div>
<script src="{{ asset('js/jquery-3.6.0.min.js')}}"></script>
<!-- Popper Js Start Here -->
<script src="{{ asset('js/popper.min.js')}}"></script>
<!-- Bootstrap Js Start Here -->
<script src="{{ asset('js/bootstrap.min.js')}}"></script>
<!-- Wow Js Start Here -->
<script src="{{ asset('js/wow.min.js')}}"></script>
<!-- Owl Carousel Js Start Here -->
<script src="{{ asset('vendor/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{ asset('js/swiper-bundle.min.js')}}"></script>
<!-- Count down Js Start Here -->
<script src="{{ asset('js/jquery.appear.min.js')}}"></script>
<!-- Pop up Js Start Here -->
<script src="{{ asset('js/jquery.magnific-popup.min.js')}}"></script>
<!-- Nice Select Js Start Here -->
<script src="{{ asset('js/jquery.nice-select.min.js')}}"></script>
<!-- Parallaxie Js Start Here -->
<script src="{{ asset('js/parallaxie.js')}}"></script>
<!-- Tween Js Start Here -->
<script src="{{ asset('js/tween-max.js')}}"></script>
<!-- Appear Js Start Here -->
<script src="{{ asset('js/appear.min.js')}}"></script>
<!-- Isotope Js Start Here -->
<script src="{{ asset('js/isotope.pkgd.min.js')}}"></script>
<!-- Imagesloaded Js Start Here -->
<script src="{{ asset('js/imagesloaded.pkgd.min.js')}}"></script>
<!-- noUiRangeSlider -->
<script src="{{ asset('vendor/noUiSlider/nouislider.min.js')}}"></script>
<script src="{{ asset('vendor/noUiSlider/wNumb.js')}}"></script>
<!-- Validator Slider -->
<script src="{{ asset('js/validator.min.js')}}"></script>
<!-- Pannellum  -->
<script src="{{ asset('js/pannellum.js')}}"></script>
<!-- Zoom Image  -->
<script src="{{ asset('js/jquery.zoom.min.js')}}"></script>

<!-- Main Js Start Here -->
<script src="{{ asset('js/main.js')}}"></script>
@livewireScripts
<script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>
<script src="https://cdn.skypack.dev/@hotwired/turbo"></script>

<script>
    document.addEventListener("turbolinks:load", function() {
        if (window.Livewire) {
            window.Livewire.restart();
        }
    });
    document.addEventListener("livewire:load", function() {
        window.livewire_app = window.Livewire;
    });

    document.addEventListener("DOMContentLoaded", function () {
        Livewire.hook('message.sent', () => {
            NProgress.start();
        });

        Livewire.hook('message.processed', () => {
            NProgress.done();
        });
    });
</script>

</body>

</html>