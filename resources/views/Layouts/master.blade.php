<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- title -->
    <title>Green Farm</title>
    <!-- favicon -->


    <link rel="" type="image/png" href="{{asset ('assets/img/favicon.png') }}" style="display: none;">
    <!-- google font -->
    <link href=" https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css') }}">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{asset ('assets/css/animate.css') }}">
    <!-- mean menu css -->
    <link rel="stylesheet" href="{{asset ('assets/css/meanmenu.min.css') }}">
    <!-- main style -->
    <link rel="stylesheet" href="{{asset ('assets/css/main.css') }}">
    <!-- responsive -->
    <link rel="stylesheet" href="{{asset ('assets/css/responsive.css') }}">



</head>

<body>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container" style="max-width: 1350px;">
            <div class="row">
                <div class="text-center col-lg-12 col-sm-12">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="{{asset ('/') }}">
                                {{-- <img src="assets/img/logo.png" alt=""> --}}
                                <h1 class="orange-text">Green Farm</h1>
                            </a>
                        </div>
                        <!-- logo -->
                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>

                                <li class="current-list-item"><a href="/">Home</a>
                                </li>
                                <li><a href="{{asset ('/category') }}">Category</a></li>
                                <li><a href="{{asset ('/product') }}">Product</a></li>
                                <li><a href="{{asset ('/addproduct') }}">Add Product</a></li>
                                <li><a href="{{asset ('/productstable') }}">Products Table</a></li>

                                <!-- Authentication Links -->
                                @guest
                                @if (Route::has('login'))
                                <li>
                                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @endif

                                @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                                @endif
                                @else
                                <li class="nav-item dropdown">
                                    <a href="#">
                                        {{ Auth::user()->name }}
                                    </a>
                                </li>
                                <li>

                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </li>
                                @endguest

                                <li>
                                    <div class="header-icons">
                                        <a class="shopping-cart" href="/cart"><i class="fas fa-shopping-cart"></i></a>
                                        <a class="mobile-hide search-bar-icon" href="#"><i
                                                class="fas fa-search"></i></a>
                                    </div>
                                </li>
                            </ul>



                        </nav>
                        <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>

                        <div class="mobile-menu"></div>
                        <!-- menu end -->



                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->

    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>Search For:</h3>
                            <form action="/search" method="post">
                                @csrf
                                <input type="text" name='searchkey' placeholder="Keywords">
                                <button type="submit">Search <i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search area -->

    <!-- home page slider -->
    <div class="homepage-slider">
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">Fresh & Organic</p>
                                <h1>Delicious Seasonal Fruits</h1>
                                <div class="hero-btns">
                                    <a href="/category" class="boxed-btn">Fruit Collection</a>
                                    <a href="contact.html" class="bordered-btn">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-2">
            <div class="container">
                <div class="row">
                    <div class="text-center col-lg-10 offset-lg-1">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">Fresh Everyday</p>
                                <h1>100% Organic Collection</h1>
                                <div class="hero-btns">
                                    <a href="/" class="boxed-btn">Visit Shop</a>
                                    <a href="contact.html" class="bordered-btn">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-3">
            <div class="container">
                <div class="row">
                    <div class="text-right col-lg-10 offset-lg-1">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">Mega Sale Going On!</p>
                                <h1>Get December Discount</h1>
                                <div class="hero-btns">
                                    <a href="shop.html" class="boxed-btn">Visit Shop</a>
                                    <a href="contact.html" class="bordered-btn">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end home page slider -->








    @yield('content')











    <!-- footer -->
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box about-widget">
                        <h2 class="widget-title">About us</h2>
                        <p>Welcome to Green Farm, your one-stop-shop for fresh and high-quality fruits and
                            vegetables. We're passionate about providing our customers with the best online shopping
                            experience, delivering the freshest produce right to their doorstep.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box get-in-touch">
                        <h2 class="widget-title">Get in Touch</h2>
                        <ul>
                            <li>Toronto, Ontario, Canada</li>
                            <li>support@greenfarm.com</li>
                            <li>+01 111 222 3333</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box pages">
                        <h2 class="widget-title">Pages</h2>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="/product">Product</a></li>
                            <li><a href="/category">Category</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box subscribe">
                        <h2 class="widget-title">Subscribe</h2>
                        <p>Subscribe to our mailing list to get the latest updates.</p>
                        <form action="index.html">
                            <input type="email" placeholder="Email">
                            <button type="submit"><i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end footer -->

    <!-- copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    {{-- <p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran Hossain</a>, All Rights
                        Reserved.<br>
                        Distributed By - <a href="https://themewagon.com/">Themewagon</a>
                    </p> --}}
                    <p>Copyrights &copy; 2025 - Mohammed Alhamadani, All Rights
                        Reserved.
                    </p>
                </div>
                <div class="text-right col-lg-6 col-md-12">
                    <div class="social-icons">
                        <ul>
                            <li><a href="https://www.facebook.com/mohamed.mohamedalhamdani" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://x.com/MbmwBasil7" target="_blank"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li><a href="https://www.instagram.com/mohammed_alhamadani7/" target="_blank"><i
                                        class="fab fa-instagram"></i></a></li>
                            <li><a href="https://www.linkedin.com/in/mohammed-alhamadani-108910109/" target="_blank"><i
                                        class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end copyright -->

    <!-- jquery -->
    <script src="{{asset ('assets/js/jquery-1.11.3.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{asset ('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- count down -->
    <script src="{{asset ('assets/js/jquery.countdown.js') }}"></script>
    <!-- isotope -->
    <script src="{{asset ('assets/js/jquery.isotope-3.0.6.min.js') }}"></script>
    <!-- waypoints -->
    <script src="{{asset ('assets/js/waypoints.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{asset ('assets/js/owl.carousel.min.js') }}"></script>
    <!-- magnific popup -->
    <script src="{{asset ('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- mean menu -->
    <script src="{{asset ('assets/js/jquery.meanmenu.min.js') }}"></script>
    <!-- sticker js -->
    <script src="{{asset ('assets/js/sticker.js') }}"></script>
    <!-- main js -->
    <script src="{{asset ('assets/js/main.js') }}"></script>

</body>

</html>