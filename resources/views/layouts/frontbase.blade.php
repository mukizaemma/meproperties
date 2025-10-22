<!DOCTYPE html>
<html class="no-js" lang="en">
<base href="/public">
<head>
    <meta charset="utf-8">
    <title>{{ $setting->company ?? '' }} </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon Start Here -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/images') . $setting->logo }}">
    <!-- Bootstrap Css Start Here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Animate Css Start Here -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Owl Carousel Start Here -->
    <link rel="stylesheet" href="vendor/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/owlcarousel/owl.theme.default.min.css">
    <!-- Swiper Css Start Here -->
    <link rel="stylesheet" href="css/swiper-bundle.min.css" />
    <!-- Flaticon Css Start Here -->
    <link rel="stylesheet" href="css/flaticon/font/flaticon.css">
    <!-- Select Css Start Here -->
    <link rel="stylesheet" href="css/nice-select.css">
    <!-- Animate Css Start Here -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Pop Up Css Start Here -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- All min Css Start Here -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Pannellum -->
    <link rel="stylesheet" href="css/pannellum.css">
    <!-- Style Css Start Here -->
    <link rel="stylesheet" href="style.css">
   <!-- Google Font Start Here -->
   <link crossorigin href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
   <link crossorigin href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
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
                                    <img src="{{ asset('storage/images') . $setting->logo }}" width="90" alt="logo" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 d-flex justify-content-center position-static">
                            <nav id="dropdown" class="template-main-menu template-main-menu-2">
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}" class="active">Home</a>

                                </li>

                                <li>
                                  <a href="{{ route('about') }}">About</a>
                                  <ul class="dropdown-menu-col-1">
                                      <li>
                                          <a href="{{ route('about') }}">Company Profile</a>
                                      </li>
                                      <li>
                                          <a href="#">Our Team</a>
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
                                    <a href="{{ route('services') }}">Our Services</a>
                                    <ul class="dropdown-menu-col-1">
                                        @foreach($services as $service)
                                        <li>
                                            <a href="{{ route('service',['slug'=>$service->slug]) }}">{{ $service->name }}</a>
                                        </li>
                                        @endforeach

                                    </ul>
                                </li>
                                <li class="position-static hide-on-mobile-menu">
                                    <a href="{{ route('properties') }}">Properties</a>
                                    <div class="template-mega-menu">
                                        <div class="container">
                                            <div class="row">

                                                <!-- Rent -->
                                                <div class="col-4">
                                                    <div class="menu-ctg-title">Rent</div>
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <a href="{{ route('propertySearch') }}">
                                                                <i class="fas fa-home"></i> House
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('propertySearch') }}">
                                                                <i class="fas fa-building"></i> Apartment
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('propertySearch') }}">
                                                                <i class="fas fa-briefcase"></i> Office
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <!-- Buy -->
                                                <div class="col-4">
                                                    <div class="menu-ctg-title">Buy</div>
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <a href="{{ route('propertySearch') }}">
                                                                <i class="fas fa-home"></i> House
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('propertySearch') }}">
                                                                <i class="fas fa-city"></i> Office
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('propertySearch') }}">
                                                                <i class="fas fa-store-alt"></i> Commercial Building
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('propertySearch') }}">
                                                                <i class="fas fa-tree"></i> Land
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <!-- Sell -->
                                                <div class="col-4">
                                                    <div class="menu-ctg-title">Sell</div>
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <a href="{{ route('propertySearch') }}">
                                                                <i class="fas fa-home"></i> House
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('propertySearch') }}">
                                                                <i class="fas fa-building"></i> Apartment
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('propertySearch') }}">
                                                                <i class="fas fa-warehouse"></i> Commercial Building
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('propertySearch') }}">
                                                                <i class="fas fa-map-marked-alt"></i> Land
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </li>

                              
                                <li>
                                    <a href="{{ route('projects') }}">Projects</a>
                                    <ul class="dropdown-menu-col-1">
                                        <li>
                                            <a href="{{ route('projects') }}">Construction Projects</a>
                                        </li>

                                    </ul>
                                </li>


                                <li>
                                    <a href="{{ route('blogs') }}">Articles</a>
                                </li>
                                <li>
                                    <a href="{{ route('connect') }}">Contacts</a>
                                </li>

                            </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div
            class="rt-header-menu mean-container position-relative"
            id="meanmenu">
            <div class="mean-bar">
                <a href="index.html">
                    <img src='img/logo_light2.svg' alt='logo' class='img-fluid'/>
                </a>
                <div class="mean-bar--right">
                    <div class="actions search">
                        <a href="#template-search" class="item-icon" title="Search">
                            <i class="fas fa-search"></i>
                        </a>
                    </div>
                    <div class="actions user">
                        <a href="account.html"><i class="flaticon-user"></i></a>
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
                            <li class="list menu-item-parent">
                                <a class="animation" href="{{ route('home') }}">Home</a>
                            </li>

                            <li class="list menu-item-parent menu-item-has-children">
                                <a class="animation" href="index.html">Properties</a>
                                <ul class="main-menu__dropdown sub-menu">
                                    <li><a href="{{ route('home') }}">Rent</a></li>
                                    <li><a href="{{ route('home') }}">Buy</a></li>
                                    <li><a href="{{ route('home') }}">Sell</a></li>
                                </ul>
                            </li>
                            <li class="list menu-item-parent menu-item-has-children">
                                <a class="animation" href="index.html">Projects</a>
                                <ul class="main-menu__dropdown sub-menu">
                                    <li><a href="{{ route('home') }}">Project 1</a></li>
                                    <li><a href="{{ route('home') }}">Project 2</a></li>
                                </ul>
                            </li>
                            <li class="list menu-item-parent">
                                <a class="animation" href="{{ route('home') }}">Articles</a>
                            </li>
                            <li class="list menu-item-parent">
                                <a class="animation" href="{{ route('home') }}">Contact us</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>


    <div class="container-fluid">
        {{-- @show --}}
        @yield('content')
    </div>

    <footer class="footer-area">
        <div class="footer-top footer-top-style">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="footer-logo-area footer-logo-area-2">
                            <div class="item-logo">
                                <img src="{{ asset('storage/images') . $setting->logo }}" width="157" height="40" alt="logo" class="img-fluid">
                            </div>
                            <p>
                               Your Trusted Partner in Property and Development.
                            </p>
                            <div class="item-social">
                                <ul>
                                    <li><a href="{{ $setting->address }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{ $setting->linkedin }}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="{{ $setting->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="https://web.whatsapp.com/" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-link footer-link-style-2">
                            <div class="footer-title footer-title-style2">
                                <h3>Quick Links</h3>
                            </div>
                            <div class="item-link">
                                <ul>
                                    <li><a href="{{ route('about') }}">About Us </a></li>
                                    <li><a href="{{ route('blogs') }}">Blogs & Articles </a></li>
                                    <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
                                    <li><a href="{{ route('connect') }}">Contact Us </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-contact footer-contact-style-2">
                            <div class="footer-title footer-title-style2">
                                <h3>Contact</h3>
                            </div>
                            <div class="footer-location">
                                <ul>
                                    <li class="item-map"><i class="fas fa-map-marker-alt"></i>{{ $setting->address }}</li>
                                    <li><a href="mailto:{{ $setting->email }}"><i class="fas fa-envelope"></i>{{ $setting->email }}</a></li>
                                    <li>
                                          <a href="https://wa.me/{{ $setting->phone }}" target="_blank" class="whatsapp-float">
                                            <i class="fab fa-whatsapp"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom footer-bottom-style-2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-6">
                        <div class="copyright-area1">
                            <ul>
                                <li><a href="{{ route('terms') }}">Terms of Use</a></li>
                                <li><a href="{{ route('terms') }}">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright-area2">
                            <p>{{ date('Y') }}© All rights reserved by {{ $setting->company }}</p>

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
    <script src="js/jquery-3.6.0.min.js"></script>
    <!-- Popper Js Start Here -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap Js Start Here -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Wow Js Start Here -->
    <script src="js/wow.min.js"></script>
    <!-- Owl Carousel Js Start Here -->
    <script src="vendor/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/swiper-bundle.min.js"></script>
    <!-- Count down Js Start Here -->
    <script src="js/jquery.appear.min.js"></script>
    <!-- Pop up Js Start Here -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <!-- Nice Select Js Start Here -->
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- Parallaxie Js Start Here -->
    <script src="js/parallaxie.js"></script>
    <!-- Tween Js Start Here -->
    <script src="js/tween-max.js"></script>
    <!-- Appear Js Start Here -->
    <script src="js/appear.min.js"></script>
    <!-- Isotope Js Start Here -->
    <script src="js/isotope.pkgd.min.js"></script>
    <!-- Imagesloaded Js Start Here -->
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <!-- noUiRangeSlider -->
    <script src="vendor/noUiSlider/nouislider.min.js"></script>
    <script src="vendor/noUiSlider/wNumb.js"></script>
    <!-- Validator Slider -->
    <script src="js/validator.min.js"></script>
    <!-- Pannellum  -->
    <script src="js/pannellum.js"></script>
    <!-- Zoom Image  -->
    <script src="js/jquery.zoom.min.js"></script>

    <!-- Main Js Start Here -->
    <script src="js/main.js"></script>


</body>

</html>