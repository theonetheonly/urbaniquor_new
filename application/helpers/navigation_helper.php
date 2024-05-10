<?php
function topnav()
{
    $theme_url = theme_url();
    $root_url = root_url();
    $base_url = base_url();
    $images_url = $base_url."images/";

//    $theme_url = theme_url();
?>

    <div class="header-middle pt--2 pb--2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 ">
                    <a href="<?php echo $base_url."index.php"; ?>" class="site-brand">
                        <img src="<?php echo $theme_url; ?>image/logo.jpg" alt="" style="height: 100px">
                    </a>
                    <p align="center" style="font-weight:bold">Get your favorite drink now!</p>
                </div>
                <div class="col-lg-2">
                    <div class="header-phone ">
                        <div class="icon">
                            <i class="fas fa-headphones-alt"></i>
                        </div>
                        <div class="text">
                            <p>Call us on</p>
                            <p class="font-weight-bold number"><?php echo getOptions("CONTACT_TELEPHONE"); ?></p>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-2" align="left">
              
                            <img src="<?php echo $theme_url; ?>image/lipanampesa.png" alt="" style="max-height: 160px">
                </div>
               
                <div class="col-lg-5">

                    <div class="main-navigation flex-lg-right">
                        <ul class="main-menu menu-right ">
                            <li class="menu-item">
                                <a href="<?php echo $base_url; ?>">Home</a>
                            </li>
                            <!-- Shop -->
                         <!--   <li class="menu-item mega-menu">
                                <a href="<?php // echo $root_url."about"; ?> ">About</i></a>
                            </li> -->
                            <!-- Pages -->
                            <li class="menu-item ">
                                <a href="<?php echo $root_url."shop"; ?> ">Shop</a>
                            </li>
                            <!-- Blog -->
                            <li class="menu-item">
                                <a  href="<?php echo $root_url."contact"; ?> ">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
function topnav_flex()
{
    $theme_url = theme_url();
    $root_url = root_url();
    $base_url = base_url();
    $images_url = $base_url."images/";
?> <div class="sticky-init fixed-header common-sticky">
        <div class="container d-none d-lg-block">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <a href="index.html" class="site-brand">
                        <img src="<?php echo $theme_url; ?>image/logo.jpg" alt="" style="height: 100px">
                    </a>
                </div>
                <div class="col-lg-2">
                <div class="header-phone ">
                        <div class="icon">
                            <i class="fas fa-headphones-alt"></i>
                        </div>
                        <div class="text">
                            <p>Call us on</p>
                            <p class="font-weight-bold number"><?php echo getOptions("CONTACT_TELEPHONE"); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2" align="left">
                      <img src="<?php echo $theme_url; ?>image/lipanampesa.png" alt="" style="max-height: 160px">
                  </div>

                <div class="col-lg-5">
                    <div class="main-navigation flex-lg-right">
                        <ul class="main-menu menu-right ">
                            <li class="menu-item ">
                                <a href="javascript:void(0)">Home</a>
                            </li>
                            <!-- Shop -->
                      <!--      <li class="menu-item  mega-menu">
                                <a href="<?php // echo $root_url."about"; ?>" >About</a>
                            </li> -->
                            <!-- Pages -->
                            <li class="menu-item ">
                                <a href="<?php echo $root_url."shop"; ?> ">Shop</a>
                            </li>
                            <!-- Blog -->
                            <li class="menu-item">
                                <a href="<?php echo $root_url."contact"; ?> ">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
function topnav_mobile()
{
   $theme_url = theme_url();
    $root_url = root_url();
    $base_url = base_url();
    $images_url = $base_url."images/";
?>
    <div class="site-mobile-menu">
        <header class="mobile-header d-block d-lg-none pt--10 pb-md--10">
            <div class="container">
                <div class="row align-items-sm-end align-items-center">
                    <div class="col-md-4 col-7">
                        <a href="index.html" class="site-brand">
                            <img src="<?php echo $theme_url; ?>image/logo.jpg" alt="">
                        </a>
                    </div>
                    <div class="col-md-5 order-3 order-md-2">
                        <nav class="category-nav   ">
                            <div>
                                <a href="javascript:void(0)" class="category-trigger"><i class="fa fa-bars"></i>Menu</a>
                                <ul class="category-menu">
                                    <li >
                                        <a href="<?php echo base_url(); ?>" style="padding-left: 20px;font-size: 26px; font-weight: bold">Home</a>
                                    </li>
                          <!--          <li ><a href="<?php // echo $root_url."about"; ?>" style="padding-left: 20px; font-size: 26px; font-weight: bold">About</a>  -->
                                    </li>
                                    <li ><a href="<?php echo $root_url."shop"; ?>" style="padding-left: 20px; font-size: 26px; font-weight: bold">Shop</a>
                                    </li>
                                    <li ><a href="<?php echo $root_url."contact"; ?>" style="padding-left: 20px;font-size: 26px; font-weight: bold">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="col-md-3 col-5  order-md-3 text-right">
                        <div class="mobile-header-btns header-top-widget">
                            <ul class="header-links">
                                <li class="sin-link">
                                    <a href="<?php echo $root_url."cart/checkout"; ?>" class="cart-link link-icon"><i class="ion-bag"></i></a>
                                </li>
                                <li class="sin-linl">
                                      <img src="<?php echo $theme_url; ?>image/lipanampesa.png" alt="" style="max-height: 80px">
                                </li>


                         <!--        <li class="sin-link">
                                    <a href="javascript:void(0);" class="link-icon hamburgur-icon off-canvas-btn"><i class="ion-navicon"></i></a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--Off Canvas Navigation Start-->
        <aside class="off-canvas-wrapper">
            <div class="btn-close-off-canvas">
                <i class="ion-android-close"></i>
            </div>
            <div class="off-canvas-inner">
                <!-- search box start -->
                <div class="search-box offcanvas">
                    <form>
                        <input type="text" placeholder="Search Here">
                        <button class="search-btn"><i class="ion-ios-search-strong"></i></button>
                    </form>
                </div>
                <!-- search box end -->
                <!-- mobile menu start -->
                <div class="mobile-navigation">
                    <!-- mobile menu navigation start -->
                    <nav class="off-canvas-nav">
                        <ul class="mobile-menu main-mobile-menu">
                            <li class="menu-item-has-children">
                                <a href="#">Home</a>
                                <ul class="sub-menu">
                                    <li> <a href="index.html">Home One</a></li>
                                    <li> <a href="index-2.html">Home Two</a></li>
                                    <li> <a href="index-3.html">Home Three</a></li>
                                    <li> <a href="index-4.html">Home Four</a></li>
                                    <li> <a href="index-5.html">Home Five</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Blog nyeff</a>
                                <ul class="sub-menu">
                                    <li class="menu-item-has-children">
                                        <a href="#">Blog Grid</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog.html">Full Widh (Default)</a></li>
                                            <li><a href="blog-left-sidebar.html">left Sidebar</a></li>
                                            <li><a href="blog-right-sidebar.html">Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Blog List</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog-list.html">Full Widh (Default)</a></li>
                                            <li><a href="blog-list-left-sidebar.html">left Sidebar</a></li>
                                            <li><a href="blog-list-right-sidebar.html">Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Blog Details</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog-details.html">Image Format (Default)</a></li>
                                            <li><a href="blog-details-gallery.html">Gallery Format</a></li>
                                            <li><a href="blog-details-audio.html">Audio Format</a></li>
                                            <li><a href="blog-details-video.html">Video Format</a></li>
                                            <li><a href="blog-details-left-sidebar.html">left Sidebar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Shop</a>
                                <ul class="sub-menu">
                                    <li class="menu-item-has-children">
                                        <a href="#">Shop Grid</a>
                                        <ul class="sub-menu">
                                            <li><a href="shop-grid.html">Fullwidth</a></li>
                                            <li><a href="shop-grid-left-sidebar.html">left Sidebar</a></li>
                                            <li><a href="shop-grid-right-sidebar.html">Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Shop List</a>
                                        <ul class="sub-menu">
                                            <li><a href="shop-list.html">Fullwidth</a></li>
                                            <li><a href="shop-list-left-sidebar.html">left Sidebar</a></li>
                                            <li><a href="shop-list-right-sidebar.html">Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Product Details 1</a>
                                        <ul class="sub-menu">
                                            <li><a href="product-details.html">Product Details Page</a></li>
                                            <li><a href="product-details-affiliate.html">Product Details
                                                    Affiliate</a></li>
                                            <li><a href="product-details-group.html">Product Details Group</a></li>
                                            <li><a href="product-details-variable.html">Product Details
                                                    Variables</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Product Details 2</a>
                                        <ul class="sub-menu">
                                            <li><a href="product-details-left-thumbnail.html">left Thumbnail</a>
                                            </li>
                                            <li><a href="product-details-right-thumbnail.html">Right Thumbnail</a>
                                            </li>
                                            <li><a href="product-details-left-gallery.html">Left Gallery</a></li>
                                            <li><a href="product-details-right-gallery.html">Right Gallery</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Pages</a>
                                <ul class="sub-menu">
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="compare.html">Compare</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="login-register.html">Login Register</a></li>
                                    <li><a href="my-account.html">My Account</a></li>
                                    <li><a href="order-complete.html">Order Complete</a></li>
                                    <li><a href="faq.html">Faq</a></li>
                                    <li><a href="contact-2.html">contact 02</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </nav>
                    <!-- mobile menu navigation end -->
                </div>
                <!-- mobile menu end -->
                <nav class="off-canvas-nav">
                    <ul class="mobile-menu menu-block-2">
                        <li class="menu-item-has-children">
                            <a href="#">Currency - USD $ <i class="fas fa-angle-down"></i></a>
                            <ul class="sub-menu">
                                <li> <a href="cart.html">USD $</a></li>
                                <li> <a href="checkout.html">EUR €</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Lang - Eng<i class="fas fa-angle-down"></i></a>
                            <ul class="sub-menu">
                                <li>Eng</li>
                                <li>Ban</li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">My Account <i class="fas fa-angle-down"></i></a>
                            <ul class="sub-menu">
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Order History</a></li>
                                <li><a href="#">Transactions</a></li>
                                <li><a href="#">Downloads</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div class="off-canvas-bottom">
                    <div class="contact-list mb--10">
                        <a href="#" class="sin-contact"><i class="fas fa-mobile-alt"></i>(12345) 78790220</a>
                        <a href="#" class="sin-contact"><i class="fas fa-envelope"></i>examle@handart.com</a>
                    </div>
                    <div class="off-canvas-social">
                        <a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="single-icon"><i class="fas fa-rss"></i></a>
                        <a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="single-icon"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </aside>
        <!--Off Canvas Navigation End-->
    </div>
<?php
}


function nav_category()
{
?>
    < <nav class="category-nav   ">
        <div>
            <a href="javascript:void(0)" class="category-trigger"><i class="fa fa-bars"></i>Browse
                categories</a>
            <ul class="category-menu">
                <li class="cat-item has-children">
                    <a href="#">Arts & Photography</a>
                    <ul class="sub-menu">
                        <li><a href="#">Bags & Cases</a></li>
                        <li><a href="#">Binoculars & Scopes</a></li>
                        <li><a href="#">Digital Cameras</a></li>
                        <li><a href="#">Film Photography</a></li>
                        <li><a href="#">Lighting & Studio</a></li>
                    </ul>
                </li>
                <li class="cat-item has-children mega-menu"><a href="#">Biographies</a>
                    <ul class="sub-menu">
                        <li class="single-block">
                            <h3 class="title">WHEEL SIMULATORS</h3>
                            <ul>
                                <li><a href="#">Bags & Cases</a></li>
                                <li><a href="#">Binoculars & Scopes</a></li>
                                <li><a href="#">Digital Cameras</a></li>
                                <li><a href="#">Film Photography</a></li>
                                <li><a href="#">Lighting & Studio</a></li>
                            </ul>
                        </li>
                        <li class="single-block">
                            <h3 class="title">WHEEL SIMULATORS</h3>
                            <ul>
                                <li><a href="#">Bags & Cases</a></li>
                                <li><a href="#">Binoculars & Scopes</a></li>
                                <li><a href="#">Digital Cameras</a></li>
                                <li><a href="#">Film Photography</a></li>
                                <li><a href="#">Lighting & Studio</a></li>
                            </ul>
                        </li>
                        <li class="single-block">
                            <h3 class="title">WHEEL SIMULATORS</h3>
                            <ul>
                                <li><a href="#">Bags & Cases</a></li>
                                <li><a href="#">Binoculars & Scopes</a></li>
                                <li><a href="#">Digital Cameras</a></li>
                                <li><a href="#">Film Photography</a></li>
                                <li><a href="#">Lighting & Studio</a></li>
                            </ul>
                        </li>
                        <li class="single-block">
                            <h3 class="title">WHEEL SIMULATORS</h3>
                            <ul>
                                <li><a href="#">Bags & Cases</a></li>
                                <li><a href="#">Binoculars & Scopes</a></li>
                                <li><a href="#">Digital Cameras</a></li>
                                <li><a href="#">Film Photography</a></li>
                                <li><a href="#">Lighting & Studio</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="cat-item has-children"><a href="#">Business & Money</a>
                    <ul class="sub-menu">
                        <li><a href="#">Brake Tools</a></li>
                        <li><a href="#">Driveshafts</a></li>
                        <li><a href="#">Emergency Brake</a></li>
                        <li><a href="#">Spools</a></li>
                    </ul>
                </li>
                <li class="cat-item has-children"><a href="#">Calendars</a>
                    <ul class="sub-menu">
                        <li><a href="#">Brake Tools</a></li>
                        <li><a href="#">Driveshafts</a></li>
                        <li><a href="#">Emergency Brake</a></li>
                        <li><a href="#">Spools</a></li>
                    </ul>
                </li>
                <li class="cat-item has-children"><a href="#">Children's Books</a>
                    <ul class="sub-menu">
                        <li><a href="#">Brake Tools</a></li>
                        <li><a href="#">Driveshafts</a></li>
                        <li><a href="#">Emergency Brake</a></li>
                        <li><a href="#">Spools</a></li>
                    </ul>
                </li>
                <li class="cat-item has-children"><a href="#">Comics</a>
                    <ul class="sub-menu">
                        <li><a href="#">Brake Tools</a></li>
                        <li><a href="#">Driveshafts</a></li>
                        <li><a href="#">Emergency Brake</a></li>
                        <li><a href="#">Spools</a></li>
                    </ul>
                </li>
                <li class="cat-item"><a href="#">Perfomance Filters</a></li>
                <li class="cat-item has-children"><a href="#">Cookbooks</a>
                    <ul class="sub-menu">
                        <li><a href="#">Brake Tools</a></li>
                        <li><a href="#">Driveshafts</a></li>
                        <li><a href="#">Emergency Brake</a></li>
                        <li><a href="#">Spools</a></li>
                    </ul>
                </li>
                <li class="cat-item "><a href="#">Accessories</a></li>
                <li class="cat-item "><a href="#">Education</a></li>
                <li class="cat-item hidden-menu-item"><a href="#">Indoor Living</a></li>
                <li class="cat-item"><a href="#" class="js-expand-hidden-menu">More
                        Categories</a></li>
            </ul>
        </div>
        </nav>
    <?php
}
    ?>
