<?php require_once "partials/header.php" ?>


<main>
    <!-- breadcrumb Start-->
    <div class="page-notification">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- listing Area Start -->
    <div class="category-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-tittle mb-50">
                        <h2>Shop with us</h2>
                        <p>Browse from 230 latest items</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!--? Left content -->
                <div class="col-xl-3 col-lg-3 col-md-4 ">
                    <!-- Job Category Listing start -->
                    <div class="category-listing mb-50">
                        <!-- single one -->
                        <div class="single-listing">
                            <!-- Select City items start -->
                            <div class="select-job-items2">
                                <select name="select2">
                                    <option value="">Category</option>
                                    <option value="">Shat</option>
                                    <option value="">T-shart</option>
                                    <option value="">Pent</option>
                                    <option value="">Dress</option>
                                </select>
                            </div>
                            <!--  Select City items End-->
                            <!-- Select State items start -->
                            <div class="select-job-items2">
                                <select name="select3">
                                    <option value="">Type</option>
                                    <option value="">SM</option>
                                    <option value="">LG</option>
                                    <option value="">XL</option>
                                    <option value="">XXL</option>
                                </select>
                            </div>
                            <!--  Select State items End-->
                            <!-- Select km items start -->
                            <div class="select-job-items2">
                                <select name="select4">
                                    <option value="">Size</option>
                                    <option value="">1.2ft</option>
                                    <option value="">2.5ft</option>
                                    <option value="">5.2ft</option>
                                    <option value="">3.2ft</option>
                                </select>
                            </div>
                            <!--  Select km items End-->
                            <!-- Select km items start -->
                            <div class="select-job-items2">
                                <select name="select5">
                                    <option value="">Color</option>
                                    <option value="">Whit</option>
                                    <option value="">Green</option>
                                    <option value="">Blue</option>
                                    <option value="">Sky Blue</option>
                                    <option value="">Gray</option>
                                </select>
                            </div>
                            <!--  Select km items End-->
                            <!-- Select km items start -->
                            <div class="select-job-items2">
                                <select name="select6">
                                    <option value="">Price range</option>
                                    <option value="">$10 to $20</option>
                                    <option value="">$20 to $30</option>
                                    <option value="">$50 to $80</option>
                                    <option value="">$100 to $120</option>
                                    <option value="">$200 to $300</option>
                                    <option value="">$500 to $600</option>
                                </select>
                            </div>
                            <!--  Select km items End-->
                        </div>
                    </div>
                    <!-- Job Category Listing End -->
                </div>
                <!--?  Right content -->
                <div class="col-xl-9 col-lg-9 col-md-8 ">
                    <!--? New Arrival Start -->
                    <div class="new-arrival new-arrival2">
                        <div class="row">
                    <?php foreach ($data['data'] as $product) : ?>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                <div class="single-new-arrival mb-50 text-center">
                                    <div class="popular-img">
                                        <img src="  https://lh3.googleusercontent.com/gg/ANIJZFGtTrKDVUqvmMApqlN__lD-FykV9YHDX2mi_5edvUbJ8Gm4-yyO7jMc6CNBQc2Is62rf_wiYU1xbFfvoFnLfVFgEJsYBVLfFNPi8twrBEHZtBA-1_o2q6hpvlWGW3pMQWyTk9yqMQIkPXU7tOsmCKSyhSQufcZEiGNP0RkYhw1fcHEU8kKfqGQkjQsjnAxeWNzLpoOJN4iwe8m8Dbur7F2Q7GCr8D02Pg_PD7kFpEhvT-n8Nt_bh3oZKUkvdcndn8Z_rpWUyZi0BavH-w13sDAQXIxRRYPE5KaCH2Ukp90kuYs5b1HnvlrQxQNnp9o3RHjT7W7VEoMO9RF-TJ2axv3N" alt="">
                                        <div class="favorit-items">
                                            <!-- <span class="flaticon-heart"></span> -->
                                            <img src="<?php echo BASEURL ?>assets/img/gallery/favorit-card.png" alt="">
                                        </div>
                                    </div>
                                    <div class="popular-caption">
                                        <h3><a href="<?php echo BASEURL ?>HomeController/product_detail/<?php echo $product->id ?> "><?php echo $product->name ?> </a></h3>
                                        <div class="rating mb-10">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span>$ <?php echo $product->price ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>

                        </div>
                        <!-- Button -->
                        <div class="row justify-content-center">
                            <div class="room-btn mt-20">
                                <a href="catagori.html" class="border-btn">Browse More</a>
                            </div>
                        </div>
                    </div>
                    <!--? New Arrival End -->
                </div>
            </div>
        </div>
    </div>
    <!-- listing-area Area End -->
    <!--? Popular Items Start -->
    <div class="popular-items">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-popular-items mb-50 text-center">
                        <div class="popular-img">
                            <img src="<?php echo BASEURL ?>assets/img/gallery/popular1.png" alt="">
                            <div class="img-cap">
                                <span>Glasses</span>
                            </div>
                            <div class="favorit-items">
                                <a href="shop.html" class="btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-popular-items mb-50 text-center">
                        <div class="popular-img">
                            <img src="<?php echo BASEURL ?>assets/img/gallery/popular2.png" alt="">
                            <div class="img-cap">
                                <span>Watches</span>
                            </div>
                            <div class="favorit-items">
                                <a href="shop.html" class="btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-popular-items mb-50 text-center">
                        <div class="popular-img">
                            <img src="<?php echo BASEURL ?>assets/img/gallery/popular3.png" alt="">
                            <div class="img-cap">
                                <span>Jackets</span>
                            </div>
                            <div class="favorit-items">
                                <a href="shop.html" class="btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-popular-items mb-50 text-center">
                        <div class="popular-img">
                            <img src="<?php echo BASEURL ?>assets/img/gallery/popular4.png" alt="">
                            <div class="img-cap">
                                <span>Clothes</span>
                            </div>
                            <div class="favorit-items">
                                <a href="shop.html" class="btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Popular Items End -->
    <!--? Services Area Start -->
    <div class="categories-area section-padding40 gray-bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-50">
                        <div class="cat-icon">
                            <img src="<?php echo BASEURL ?>assets/img/icon/services1.svg" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5>Fast & Free Delivery</h5>
                            <p>Free delivery on all orders</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-50">
                        <div class="cat-icon">
                            <img src="<?php echo BASEURL ?>assets/img/icon/services2.svg" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5>Fast & Free Delivery</h5>
                            <p>Free delivery on all orders</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-30">
                        <div class="cat-icon">
                            <img src="<?php echo BASEURL ?>assets/img/icon/services3.svg" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5>Fast & Free Delivery</h5>
                            <p>Free delivery on all orders</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat">
                        <div class="cat-icon">
                            <img src="<?php echo BASEURL ?>assets/img/icon/services4.svg" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5>Fast & Free Delivery</h5>
                            <p>Free delivery on all orders</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--? Services Area End -->
</main>

<footer>
    <!-- Footer Start-->
    <div class="footer-area footer-padding">
        <div class="container-fluid ">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-8 col-sm-8">
                    <div class="single-footer-caption mb-50">
                        <div class="single-footer-caption mb-30">
                            <!-- logo -->
                            <div class="footer-logo mb-35">
                                <a href="index.html"><img src="<?php echo BASEURL ?>assets/img/logo/logo2_footer.png" alt=""></a>
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p>Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla.</p>
                                </div>
                            </div>
                            <!-- social -->
                            <div class="footer-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="https://bit.ly/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Quick links</h4>
                            <ul>
                                <li><a href="#">Image Licensin</a></li>
                                <li><a href="#">Style Guide</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Shop Category</h4>
                            <ul>
                                <li><a href="#">Image Licensin</a></li>
                                <li><a href="#">Style Guide</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Pertners</h4>
                            <ul>
                                <li><a href="#">Image Licensin</a></li>
                                <li><a href="#">Style Guide</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Get in touch</h4>
                            <ul>
                                <li><a href="#">(89) 982-278 356</a></li>
                                <li><a href="#">demo@colorlib.com</a></li>
                                <li><a href="#">67/A, Colorlib, Green road, NYC</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom area -->
    <div class="footer-bottom-area">
        <div class="container">
            <div class="footer-border">
                <div class="row d-flex align-items-center">
                    <div class="col-xl-12 ">
                        <div class="footer-copy-right text-center">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once "partials/footer.php" ?>