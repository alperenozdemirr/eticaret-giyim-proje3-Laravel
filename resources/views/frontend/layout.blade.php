<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('frontend')}}/img/Fevicon.png" type="image/png">
    <link rel="stylesheet" href="{{asset('frontend')}}/vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/vendors/nice-select/nice-select.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/vendors/owl-carousel/owl.carousel.min.css">

    <link rel="stylesheet" href="{{asset('frontend')}}/css/style.css">
</head>
<body>
<!--================ Start Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo_h" href="{{route('index')}}"><img src="{{asset('frontend')}}/img/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                        <li class="nav-item active"><a class="nav-link" href="{{route('index')}}">Anasayfa</a></li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="category.html">Shop Category</a></li>
                                <li class="nav-item"><a class="nav-link" href="single-product.html">Product Details</a></li>
                                <li class="nav-item"><a class="nav-link" href="checkout.html">Product Checkout</a></li>
                                <li class="nav-item"><a class="nav-link" href="confirmation.html">Confirmation</a></li>
                                <li class="nav-item"><a class="nav-link" href="cart.html">Shopping Cart</a></li>
                            </ul>
                        </li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">Blog</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                                <li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">Pages</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                                <li class="nav-item"><a class="nav-link" href="register.html">Register</a></li>
                                <li class="nav-item"><a class="nav-link" href="tracking-order.html">Tracking</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                    </ul>

                    <ul class="nav-shop">
                        <li class="nav-item"><button><i class="ti-search"></i></button></li>
                        <li class="nav-item"><a href="{{route('shoppingCart')}}"> <button><i class="ti-shopping-cart"></i><span class="nav-shop__circle">{{\App\Http\Controllers\Frontend\DefaultController::basketCount()}}</span></button></a> </li>
                        @auth
                            <li style="margin-left: 0px;color:black;" class="nav-item dropdown">
                                <a style="color:black" class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    Hesabım
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                                    <a class="dropdown-item" href="#">Hesabım</a>
                                    <a class="dropdown-item" href="#">Siparişlerim</a>
                                    <a class="dropdown-item" href="{{route('user.logout')}}">Güvenli Çıkış</a>
                                </div>
                            </li>
                        @elseguest
                            <li class="nav-item"><a class="button button-header" href="{{route('user.loginPage')}}">Giriş Yap</a></li>
                        @endauth

                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================ End Header Menu Area =================-->

@yield('content')

<!--================ Start footer Area  =================-->
<footer class="footer">
    <div class="footer-area">
        <div class="container">
            <div class="row section_gap">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title large_title">Our Mission</h4>
                        <p>
                            So seed seed green that winged cattle in. Gathering thing made fly you're no
                            divided deep moved us lan Gathering thing us land years living.
                        </p>
                        <p>
                            So seed seed green that winged cattle in. Gathering thing made fly you're no divided deep moved
                        </p>
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title">Quick Links</h4>
                        <ul class="list">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Shop</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Product</a></li>
                            <li><a href="#">Brand</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget instafeed">
                        <h4 class="footer_title">Gallery</h4>
                        <ul class="list instafeed d-flex flex-wrap">
                            <li><img src="{{asset('frontend')}}/img/gallery/r1.jpg" alt=""></li>
                            <li><img src="{{asset('frontend')}}/img/gallery/r2.jpg" alt=""></li>
                            <li><img src="{{asset('frontend')}}/img/gallery/r3.jpg" alt=""></li>
                            <li><img src="{{asset('frontend')}}/img/gallery/r5.jpg" alt=""></li>
                            <li><img src="{{asset('frontend')}}/img/gallery/r7.jpg" alt=""></li>
                            <li><img src="{{asset('frontend')}}/img/gallery/r8.jpg" alt=""></li>
                        </ul>
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title">Contact Us</h4>
                        <div class="ml-40">
                            <p class="sm-head">
                                <span class="fa fa-location-arrow"></span>
                                Head Office
                            </p>
                            <p>123, Main Street, Your City</p>

                            <p class="sm-head">
                                <span class="fa fa-phone"></span>
                                Phone Number
                            </p>
                            <p>
                                +123 456 7890 <br>
                                +123 456 7890
                            </p>

                            <p class="sm-head">
                                <span class="fa fa-envelope"></span>
                                Email
                            </p>
                            <p>
                                free@infoexample.com <br>
                                www.infoexample.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row d-flex">
                <p class="col-lg-12 footer-text text-center">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</footer>
<!--================ End footer Area  =================-->

@yield('js')

<script src="{{asset('frontend')}}/vendors/jquery/jquery-3.2.1.min.js"></script>
<script src="{{asset('frontend')}}/vendors/bootstrap/bootstrap.bundle.min.js"></script>
<script src="{{asset('frontend')}}/vendors/skrollr.min.js"></script>
<script src="{{asset('frontend')}}/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="{{asset('frontend')}}/vendors/nice-select/jquery.nice-select.min.js"></script>
<script src="{{asset('frontend')}}/vendors/jquery.ajaxchimp.min.js"></script>
<script src="{{asset('frontend')}}/vendors/mail-script.js"></script>
<script src="{{asset('frontend')}}/js/main.js"></script>
</body>
</html>
