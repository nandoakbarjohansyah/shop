<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @if(!empty($menu))
    <title>NandoShop | {{$menu}}</title>
    @else
    <title>NandoShop</title>
    @endif
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('winter/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('winter/css/animate.css') }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('winter/css/owl.carousel.min.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('winter/css/all.css') }}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('winter/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('winter/css/themify-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('winter/css/nice-select.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('winter/css/magnific-popup.css') }}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{ asset('winter/css/slick.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('winter/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('winter/css/price_rangs.css') }}">

    <link rel="stylesheet" href="{{ asset('winter/css/lightslider.min.css') }}">
    
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-11">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{ route('front.index') }}"> <img src="{{ asset('winter/img/logo.png') }}" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('front.index') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('front.product') }}" aria-expanded="false">
                                        Products
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        @if (auth()->guard('customer')->check())
                                        {{Auth::guard('customer')->user()->name}}
                                        @else
                                        User
                                        @endif
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        @if (auth()->guard('customer')->check())
                                        <a class="dropdown-item" href="{{ route('customer.logout') }}">Logout</a>
                                        @else
                                        <a class="dropdown-item" href="{{ route('customer.login') }}">Login</a>
                                        <a class="dropdown-item" href="{{ route('registrasi') }}">Registrasi</a>
                                        @endif
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex">
                            <div class="dropdown cart">
                                <a href="{{ route('front.cart') }}">
                                    <i class="ti-bag"></i>
                                </a>
                            </div>
                            <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    <!-- Header part end-->