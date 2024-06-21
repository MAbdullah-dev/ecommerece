<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Fashion | Teamplate</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/img/favicon.ico">

    <!-- CSS here -->
   
    <link rel="stylesheet" href="<?php echo BASEURL ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>assets/css/slicknav.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>assets/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>assets/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>assets/css/gijgo.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>assets/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>assets/css/animated-headline.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>assets/css/slick.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>assets/css/nice-select.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>assets/css/style.css">
    <?php linkCSS('css/cart.css') ?>
    
</head>
<body class="full-wrapper">
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="./<?php echo BASEURL ?>assets/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start-->
    <header>
        <!-- Header Start -->
        <div class="header-area ">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper d-flex align-items-center justify-content-between">
                        <div class="header-left d-flex align-items-center">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="<?php echo BASEURL ?>"><img src="<?php echo BASEURL ?>assets/img/logo/logo.png" alt=""></a>
                            </div>
                            <!-- Main-menu -->
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="<?php echo BASEURL ?>">Home</a></li> 
                                        <li><a href="<?php echo BASEURL ?>HomeController/shop">shop</a></li>
                                        <li><a href="<?php echo BASEURL ?>HomeController/about">About</a></li>
                                        <li><a href="<?php echo BASEURL ?>HomeController/blog">Blog</a>
                                        <ul class="submenu">
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="blog_details.html">Blog Details</a></li>
                                            <li><a href="elements.html">Elements</a></li>
                                            <li><a href="product_details.html">Product Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo BASEURL ?>HomeController/contact">Contact</a></li>
                                    <li><a href="<?php echo BASEURL ?>DashboardController/Dashboardpage"><img src="https://img.icons8.com/?size=100&id=XnHBz2LnhELw&format=png&color=000000" style="max-width: 30px;"alt="dashboard icon"></a></li>
                                    </ul>
                                </nav>
                            </div>   
                        </div>
                        <div class="header-right1 d-flex align-items-center">
                            <!-- Social -->
                           
                            <div class="header-social d-none d-md-block">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="https://bit.ly/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            </div>
                            <!-- Search Box -->
                            <div class="search d-none d-md-block">
                                <ul class="d-flex align-items-center">
                                    <li class="mr-15">
                                        <div class="nav-search search-switch">
                                            <i class="ti-search"></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item dropdown">
            <div class="card-stor" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="<?php echo BASEURL ?>assets/img/gallery/card.svg" alt="Cart Icon">
                <span>0</span>
            </div>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">
                    <img src="https://via.placeholder.com/40" alt="Item 1">
                    <div class="item-info">
                        <div class="item-name">Item 1</div>
                        <div class="item-price">$10.00</div>
                    </div>
                </a>
                <a class="dropdown-item" href="#">
                    <img src="https://via.placeholder.com/40" alt="Item 2">
                    <div class="item-info">
                        <div class="item-name">Item 2</div>
                        <div class="item-price">$20.00</div>
                    </div>
                </a>
                <a class="dropdown-item" href="#">
                    <img src="https://via.placeholder.com/40" alt="Item 3">
                    <div class="item-info">
                        <div class="item-name">Item 3</div>
                        <div class="item-price">$30.00</div>
                    </div>
                </a>
                <div class="dropdown-footer">
                    <div class="total-price">Total: $60.00</div>
                    <a class="checkout-btn" href="#">Checkout</a>
                </div>
            </div>
        </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <!-- header end -->
    <main>
        <!--? Hero Area Start-->
        <div class="container-fluid">
            <div class="slider-area">
                <!-- Mobile Device Show Menu-->
                <div class="header-right2 d-flex align-items-center">
                    <!-- Social -->
                    <div class="header-social  d-block d-md-none">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="https://bit.ly/sai4ull"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                    </div>
                    <!-- Search Box -->
                    <div class="search d-block d-md-none" >
                        <ul class="d-flex align-items-center">
                            <li class="mr-15">
                                <div class="nav-search search-switch">
                                    <i class="ti-search"></i>
                                </div>
                            </li>
                            <li>
                                <div class="card-stor">
                                    <img src="./<?php echo BASEURL ?>assets/img/gallery/card.svg" alt="">
                                    <span>0</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /End mobile  Menu-->
                <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>