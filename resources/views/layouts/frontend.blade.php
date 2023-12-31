<!DOCTYPE html>
<html lang="en">
<head>
    <title>rME Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <div class="site-wrap">
        <div class="site-mobile-menu">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>

        <!-- Website header -->
        <header class="site-navbar" role="banner">
            <!-- Header content -->
            <div class="container-fluid">
                <div class="row align-items-center">
                    <!-- Search form -->
                 <!-- Search form -->
<div class="col-12 search-form-wrap js-search-form">
    <form method="get" action="" class="search-form">
        {{-- <form method="get" action="{{ route('search') }}" class="search-form"> --}}
        <input type="text" id="search" name="q" class="form-control" placeholder="Search..." value="{{ request('q') }}">
        <button class="search-btn" type="submit"><span class="icon-search"></span></button>
    </form>
</div>

                    <!-- Site logo -->
                    <div class="col-4 site-logo">
                        <a href="/" class="text-black h2 mb-0"><img src="{{ url('/images/logo.png') }}"
                                width="143px" style="margin-top: 15px;margin-left: 15px;" alt="" srcset=""></a>
                    </div>

                   
     

                @if (Route::has('login'))
                   
                    <div class="col-8 text-right">
                        <nav class="site-navigation" role="navigation">
                            <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
                                <li><a href="/">Home</a></li>
                                @auth
                                <li><a href="{{ route('home') }}">Dashboard</a></li>
                                @else
                                <li><a href="{{ route('login') }}">Login</a></li>
                                @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Register</a></li>
                                @endif
                                @endauth
                                <li class="d-none d-lg-inline-block"><a href="#" class="js-search-toggle"><span
                                            class="icon-search"></span></a></li>
                                            @endif
                            </ul>
                        </nav>
                        <a href="#"
                            class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span
                                class="icon-menu h3"></span></a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Content section (content will be injected here using Blade) -->
        @yield('content')

        <!-- Website footer -->
        <div class="site-footer">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-4">
                        <h3 class="footer-heading mb-4">About Us</h3>
                        <p>If Ramisha Gimhana would like to use this text for their blog, they can replace it with their own content. Lorem ipsum is often used as a placeholder during the design and development phase of a website or publication. If Ramisha Gimhana needs assistance with specific content or topics for their blog, please provide more details or questions, and I'd be happy to help.</p>
                    </div>
                    <div class="col-md-3 ml-auto">
                        <!-- Footer links -->
                        <ul class="list-unstyled float-left mr-5">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Advertise</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Subscribes</a></li>
                        </ul>
                        <ul class="list-unstyled float-left">
                            <li><a href="#">Travel</a></li>
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Sports</a></li>
                            <li><a href="#">Nature</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <!-- Social media links -->
                            <h3 class="footer-heading mb-4">Connect With Us</h3>
                            <p>
                                <a href="#"><span class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
                                <a href="#"><span class="icon-twitter p-2"></span></a>
                                <a href="#"><span class="icon-instagram p-2"></span></a>
                                <a href="#"><span class="icon-rss p-2"></span></a>
                                <a href="#"><span class="icon-envelope p-2"></span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <p>
                            <!-- Copyright notice -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This Blog is made with <i
                                class="icon-heart text-danger" aria-hidden="true"></i> by <a
                                href="http://rme.000.pe/" target="_blank">rME</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript libraries and scripts -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
