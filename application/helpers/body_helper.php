<?php
function  home_brands_slider()
{
    $theme_url = theme_url();
    $base_url = base_url();
?>
    <section class="section-margin">
        <h2 class="sr-only">Brand Slider</h2>
        <div class="container">
            <div class="brand-slider sb-slick-slider border-top border-bottom" data-slick-setting='{
                                            "autoplay": true,
                                            "autoplaySpeed": 8000,
                                            "slidesToShow": 6
                                            }' data-slick-responsive='[
                {"breakpoint":992, "settings": {"slidesToShow": 4} },
                {"breakpoint":768, "settings": {"slidesToShow": 3} },
                {"breakpoint":575, "settings": {"slidesToShow": 3} },
                {"breakpoint":480, "settings": {"slidesToShow": 2} },
                {"breakpoint":320, "settings": {"slidesToShow": 1} }
            ]'>
                <div class="single-slide">
                    <img src="<?php echo $theme_url; ?>image/others/brand-1.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="<?php echo $theme_url; ?>image/others/brand-2.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="<?php echo $theme_url; ?>image/others/brand-3.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="<?php echo $theme_url; ?>image/others/brand-4.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="<?php echo $theme_url; ?>image/others/brand-5.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="<?php echo $theme_url; ?>image/others/brand-6.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="<?php echo $theme_url; ?>image/others/brand-1.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="<?php echo $theme_url; ?>image/others/brand-2.jpg" alt="">
                </div>
            </div>
        </div>
    </section>


<?php

}

function home_latest_blogs()
{
    //
    $theme_url = theme_url();
?>

    <section class="section-margin">
        <div class="container">
            <div class="section-title">
                <h2>LATEST BLOGS</h2>
            </div>
            <div class="blog-slider sb-slick-slider" data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow": 2,
                "dots": true
            }' data-slick-responsive='[
                {"breakpoint":1200, "settings": {"slidesToShow": 1} }
            ]'>
                <div class="single-slide">
                    <div class="blog-card">
                        <div class="image">
                            <img src="<?php echo $theme_url; ?>image/others/blog-grid-1.jpg" alt="">
                        </div>
                        <div class="content">
                            <div class="content-header">
                                <div class="date-badge">
                                    <span class="date">
                                        13
                                    </span>
                                    <span class="month">
                                        Aug
                                    </span>
                                </div>
                                <h3 class="title"><a href="blog-details.html">How to Water and Care for Mounted</a>
                                </h3>
                            </div>
                            <p class="meta-para"><i class="fas fa-user-edit"></i>Post by <a href="#">Hastech</a></p>
                            <article class="blog-paragraph">
                                <h2 class="sr-only">blog-paragraph</h2>
                                <p>Virtual reality and 3-D technology are already well-established in the
                                    entertainment...</p>
                            </article>
                            <a href="blog-details.html" class="card-link">Read More <i class="fas fa-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="blog-card">
                        <div class="image">
                            <img src="<?php echo $theme_url; ?>image/others/blog-grid-2.jpg" alt="">
                        </div>
                        <div class="content">
                            <div class="content-header">
                                <div class="date-badge">
                                    <span class="date">
                                        19
                                    </span>
                                    <span class="month">
                                        Jan
                                    </span>
                                </div>
                                <h3 class="title"><a href="blog-details.html">Why You Never See BLOG TITLE That </a>
                                </h3>
                            </div>
                            <p class="meta-para"><i class="fas fa-user-edit"></i>Post by <a href="#">Hastech</a></p>
                            <article class="blog-paragraph">
                                <h2 class="sr-only">blog-paragraph</h2>
                                <p>Virtual reality and 3-D technology are already well-established in the
                                    entertainment...</p>
                            </article>
                            <a href="blog-details.html" class="card-link">Read More <i class="fas fa-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="blog-card">
                        <div class="image">
                            <img src="<?php echo $theme_url; ?>image/others/blog-grid-3.jpg" alt="">
                        </div>
                        <div class="content">
                            <div class="content-header">
                                <div class="date-badge">
                                    <span class="date">
                                        31
                                    </span>
                                    <span class="month">
                                        Aug
                                    </span>
                                </div>
                                <h3 class="title"><a href="blog-details.html">What Everyone Must Know About </a>
                                </h3>
                            </div>
                            <p class="meta-para"><i class="fas fa-user-edit"></i>Post by <a href="#">Hastech</a></p>
                            <article class="blog-paragraph">
                                <h2 class="sr-only">blog-paragraph</h2>
                                <p>Virtual reality and 3-D technology are already well-established in the
                                    entertainment...</p>
                            </article>
                            <a href="blog-details.html" class="card-link">Read More <i class="fas fa-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
}


function home_promotion_section()
{
    $theme_url = theme_url();

?>
    <section class="section-margin">
        <div class="promo-wrapper promo-type-three">
   <?php /*         <a href="#" class="promo-image promo-overlay bg-image" data-bg="<?php echo $theme_url; ?>image/bg-images/fast_delivery_banner.png">
            </a>  */ ?>
            <div class="promo-text w-100 ml-0">
                <div class="container">
                    <div class="row w-100">
                        <div class="col-lg-12">
                            <h2 style="color: #4a4a4a">Fast Delivery! 60 Minutes within Nairobi</h2>
                            <h3 style="color: #4a4a4a">Call <a href="tel:+254705114522" ><h3 style="color: #4a4a4a">+254-705-11-45-22</h3></a>
                            <h4 style="color: #4a4a4a">Please Note. We don't sell or deliver alcoholic beverages to persons under 18 years of age!</h4>
                         <!--   <a href="#" class="btn btn--yellow">Nation </a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
}



function home_arts_and_photography()
{
    $theme_url = theme_url();


?>
    <section class="section-margin">
        <div class="container">
            <div class="section-title section-title--bordered">
                <h2>ARTS & PHOTOGRAPHY BOOKS</h2>
            </div>
            <div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow": 5,
                "dots":true
            }' data-slick-responsive='[
                {"breakpoint":1500, "settings": {"slidesToShow": 4} },
                {"breakpoint":992, "settings": {"slidesToShow": 3} },
                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                {"breakpoint":480, "settings": {"slidesToShow": 1} },
                {"breakpoint":320, "settings": {"slidesToShow": 1} }
            ]'>
                <div class="single-slide">
                    <div class="product-card">
                        <div class="product-header">
                            <a href="#" class="author">
                                Lpple
                            </a>
                            <h2><a href="product-details.html">Revolutionize Your BOOK With These Easy
                                </a></h2>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="<?php echo $theme_url; ?>image/products/product-2.jpg" alt="">
                                <div class="hover-contents">
                                    <a href="product-details.html" class="hover-image">
                                        <img src="<?php echo $theme_url; ?>image/products/product-1.jpg" alt="">
                                    </a>
                                    <div class="hover-btns">
                                        <a href="cart.html" class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a href="wishlist.html" class="single-btn">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        <a href="compare.html" class="single-btn">
                                            <i class="fas fa-random"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price-block">
                                <span class="price">£51.20</span>
                                <del class="price-old">£51.20</del>
                                <span class="price-discount">20%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="product-card">
                        <div class="product-header">
                            <a href="#" class="author">
                                Jpple
                            </a>
                            <h3><a href="product-details.html">Turn Your BOOK Into High Machine</a>
                            </h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="<?php echo $theme_url; ?>image/products/product-2.jpg" alt="">
                                <div class="hover-contents">
                                    <a href="product-details.html" class="hover-image">
                                        <img src="<?php echo $theme_url; ?>image/products/product-1.jpg" alt="">
                                    </a>
                                    <div class="hover-btns">
                                        <a href="cart.html" class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a href="wishlist.html" class="single-btn">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        <a href="compare.html" class="single-btn">
                                            <i class="fas fa-random"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price-block">
                                <span class="price">£51.20</span>
                                <del class="price-old">£51.20</del>
                                <span class="price-discount">20%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="product-card">
                        <div class="product-header">
                            <a href="#" class="author">
                                Wpple
                            </a>
                            <h3><a href="product-details.html">Create Better BOOK With The Help Of Your</a></h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="<?php echo $theme_url; ?>image/products/product-3.jpg" alt="">
                                <div class="hover-contents">
                                    <a href="product-details.html" class="hover-image">
                                        <img src="<?php echo $theme_url; ?>image/products/product-2.jpg" alt="">
                                    </a>
                                    <div class="hover-btns">
                                        <a href="cart.html" class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a href="wishlist.html" class="single-btn">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        <a href="compare.html" class="single-btn">
                                            <i class="fas fa-random"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price-block">
                                <span class="price">£51.20</span>
                                <del class="price-old">£51.20</del>
                                <span class="price-discount">20%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="product-card">
                        <div class="product-header">
                            <a href="#" class="author">
                                Epple
                            </a>
                            <h3><a href="product-details.html">What You Can Learn From Bill Gates</a>
                            </h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="<?php echo $theme_url; ?>image/products/product-5.jpg" alt="">
                                <div class="hover-contents">
                                    <a href="product-details.html" class="hover-image">
                                        <img src="<?php echo $theme_url; ?>image/products/product-4.jpg" alt="">
                                    </a>
                                    <div class="hover-btns">
                                        <a href="cart.html" class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a href="wishlist.html" class="single-btn">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        <a href="compare.html" class="single-btn">
                                            <i class="fas fa-random"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price-block">
                                <span class="price">£51.20</span>
                                <del class="price-old">£51.20</del>
                                <span class="price-discount">20%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="product-card">
                        <div class="product-header">
                            <a href="#" class="author">
                                Hpple
                            </a>
                            <h3><a href="product-details.html">a Half Very Simple Things You To Save</a></h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="<?php echo $theme_url; ?>image/products/product-6.jpg" alt="">
                                <div class="hover-contents">
                                    <a href="product-details.html" class="hover-image">
                                        <img src="<?php echo $theme_url; ?>image/products/product-4.jpg" alt="">
                                    </a>
                                    <div class="hover-btns">
                                        <a href="cart.html" class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a href="wishlist.html" class="single-btn">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        <a href="compare.html" class="single-btn">
                                            <i class="fas fa-random"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price-block">
                                <span class="price">£51.20</span>
                                <del class="price-old">£51.20</del>
                                <span class="price-discount">20%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="product-card">
                        <div class="product-header">
                            <a href="#" class="author">
                                Bpple
                            </a>
                            <h3><a href="product-details.html">Here Is A Quick Cure For Book</a></h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="<?php echo $theme_url; ?>image/products/product-8.jpg" alt="">
                                <div class="hover-contents">
                                    <a href="product-details.html" class="hover-image">
                                        <img src="<?php echo $theme_url; ?>image/products/product-7.jpg" alt="">
                                    </a>
                                    <div class="hover-btns">
                                        <a href="cart.html" class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a href="wishlist.html" class="single-btn">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        <a href="compare.html" class="single-btn">
                                            <i class="fas fa-random"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price-block">
                                <span class="price">£51.20</span>
                                <del class="price-old">£51.20</del>
                                <span class="price-discount">20%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="product-card">
                        <div class="product-header">
                            <a href="#" class="author">
                                zpple
                            </a>
                            <h3><a href="product-details.html">Do You Really Need It? This Will Help You
                                </a>
                            </h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="<?php echo $theme_url; ?>image/products/product-13.jpg" alt="">
                                <div class="hover-contents">
                                    <a href="product-details.html" class="hover-image">
                                        <img src="<?php echo $theme_url; ?>image/products/product-11.jpg" alt="">
                                    </a>
                                    <div class="hover-btns">
                                        <a href="cart.html" class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a href="wishlist.html" class="single-btn">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        <a href="compare.html" class="single-btn">
                                            <i class="fas fa-random"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price-block">
                                <span class="price">£51.20</span>
                                <del class="price-old">£51.20</del>
                                <span class="price-discount">20%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



<?php
}


function home_childrens_books()
{

    $theme_url = theme_url();
?>
    <section class="section-margin">
        <div class="container">
            <div class="section-title section-title--bordered">
                <h2>CHILDREN’S BOOKS</h2>
            </div>
            <div class="product-list-slider slider-two-column product-slider multiple-row sb-slick-slider slider-border-multiple-row" data-slick-setting='{
                                            "autoplay": true,
                                            "autoplaySpeed": 8000,
                                            "slidesToShow":3,
                                            "rows":2,
                                            "dots":true
                                        }' data-slick-responsive='[
                                            {"breakpoint":1200, "settings": {"slidesToShow": 2} },
                                            {"breakpoint":992, "settings": {"slidesToShow": 2} },
                                            {"breakpoint":768, "settings": {"slidesToShow": 1} },
                                            {"breakpoint":575, "settings": {"slidesToShow": 1} },
                                            {"breakpoint":490, "settings": {"slidesToShow": 1} }
                                        ]'>
                <div class="single-slide">
                    <div class="product-card card-style-list">
                        <div class="card-image">
                            <img src="<?php echo $theme_url; ?>image/products/product-2.jpg" alt="">
                        </div>
                        <div class="product-card--body">
                            <div class="product-header">
                                <a href="#" class="author">
                                    Rpple
                                </a>
                                <h3><a href="product-details.html">Revolutionize Your BOOK With</a></h3>
                            </div>
                            <div class="price-block">
                                <span class="price">£51.20</span>
                                <del class="price-old">£51.20</del>
                                <span class="price-discount">20%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="product-card card-style-list">
                        <div class="card-image">
                            <img src="<?php echo $theme_url; ?>image/products/product-1.jpg" alt="">
                        </div>
                        <div class="product-card--body">
                            <div class="product-header">
                                <a href="#" class="author">
                                    Dpple
                                </a>
                                <h3><a href="product-details.html">Turn Your BOOK Into High Machine</a>
                                </h3>
                            </div>
                            <div class="price-block">
                                <span class="price">£51.20</span>
                                <del class="price-old">£51.20</del>
                                <span class="price-discount">20%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="product-card card-style-list">
                        <div class="card-image">
                            <img src="<?php echo $theme_url; ?>image/products/product-3.jpg" alt="">
                        </div>
                        <div class="product-card--body">
                            <div class="product-header">
                                <a href="#" class="author">
                                    Epple
                                </a>
                                <h3><a href="product-details.html">BOOK: Do You Really Need It? This </a></h3>
                            </div>
                            <div class="price-block">
                                <span class="price">£51.20</span>
                                <del class="price-old">£51.20</del>
                                <span class="price-discount">20%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="product-card card-style-list">
                        <div class="card-image">
                            <img src="<?php echo $theme_url; ?>image/products/product-4.jpg" alt="">
                        </div>
                        <div class="product-card--body">
                            <div class="product-header">
                                <a href="#" class="author">
                                    Ppple
                                </a>
                                <h3><a href="product-details.html">Here Is A Quick Cure For Book</a>
                                </h3>
                            </div>
                            <div class="price-block">
                                <span class="price">£51.20</span>
                                <del class="price-old">£51.20</del>
                                <span class="price-discount">20%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="product-card card-style-list">
                        <div class="card-image">
                            <img src="<?php echo $theme_url; ?>image/products/product-5.jpg" alt="">
                        </div>
                        <div class="product-card--body">
                            <div class="product-header">
                                <a href="#" class="author">
                                    Ypple
                                </a>
                                <h3><a href="product-details.html">What You Can Learn From Bill Gates</a>
                                </h3>
                            </div>
                            <div class="price-block">
                                <span class="price">£51.20</span>
                                <del class="price-old">£51.20</del>
                                <span class="price-discount">20%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="product-card card-style-list">
                        <div class="card-image">
                            <img src="<?php echo $theme_url; ?>image/products/product-6.jpg" alt="">
                        </div>
                        <div class="product-card--body">
                            <div class="product-header">
                                <a href="#" class="author">
                                    Wpple
                                </a>
                                <h3><a href="product-details.html">3 Ways Create Better BOOK With</a></h3>
                            </div>
                            <div class="price-block">
                                <span class="price">£51.20</span>
                                <del class="price-old">£51.20</del>
                                <span class="price-discount">20%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
}



function home_best_seller_section()
{
    $theme_url = theme_url();

?>
    <section class="section-margin bg-image section-padding-top section-padding" data-bg="image/bg-images/best-seller-bg.jpg">
        <div class="container">
            <div class="section-title section-title--bordered mb-0">
                <h2>Best BEST SELLER BOOKS</h2>
            </div>
            <div class="best-seller-block">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-6">
                        <div class="author-image">
                            <img src="<?php echo $theme_url; ?>image/others/best-seller-author.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="sb-slick-slider product-slider product-list-slider multiple-row slider-border-multiple-row" data-slick-setting='{
                                    "autoplay": false,
                                    "autoplaySpeed": 8000,
                                    "slidesToShow":2,
                                    "rows":2,
                                    "dots":true
                                }' data-slick-responsive='[
                                    {"breakpoint":1200, "settings": {"slidesToShow": 1} },
                                    {"breakpoint":992, "settings": {"slidesToShow": 1} },
                                    {"breakpoint":768, "settings": {"slidesToShow": 1} },
                                    {"breakpoint":575, "settings": {"slidesToShow": 1} },
                                    {"breakpoint":490, "settings": {"slidesToShow": 1} }
                                ]'>
                            <div class="single-slide">
                                <div class="product-card card-style-list">
                                    <div class="card-image">
                                        <img src="<?php echo $theme_url; ?>image/products/product-6.jpg" alt="">
                                    </div>
                                    <div class="product-card--body">
                                        <div class="product-header">
                                            <a href="#" class="author">
                                                Rpple
                                            </a>
                                            <h3><a href="product-details.html">Do You Really Need It? This
                                                    Will Help You
                                                </a></h3>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card card-style-list">
                                    <div class="card-image">
                                        <img src="<?php echo $theme_url; ?>image/products/product-1.jpg" alt="">
                                    </div>
                                    <div class="product-card--body">
                                        <div class="product-header">
                                            <a href="#" class="author">
                                                Epple
                                            </a>
                                            <h3><a href="product-details.html">Here Is Quick Cure BOOK This
                                                    Will Help

                                                </a></h3>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card card-style-list">
                                    <div class="card-image">
                                        <img src="<?php echo $theme_url; ?>image/products/product-2.jpg" alt="">
                                    </div>
                                    <div class="product-card--body">
                                        <div class="product-header">
                                            <a href="#" class="author">
                                                Wpple
                                            </a>
                                            <h3><a href="product-details.html">Do You Really Need It? This
                                                    Will Help You

                                                </a></h3>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card card-style-list">
                                    <div class="card-image">
                                        <img src="<?php echo $theme_url; ?>image/products/product-3.jpg" alt="">
                                    </div>
                                    <div class="product-card--body">
                                        <div class="product-header">
                                            <a href="#" class="author">
                                                Ypple
                                            </a>
                                            <h3><a href="product-details.html">Very Simple Things You
                                                    Can Save BOOK



                                                </a>
                                            </h3>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card card-style-list">
                                    <div class="card-image">
                                        <img src="<?php echo $theme_url; ?>image/products/product-5.jpg" alt="">
                                    </div>
                                    <div class="product-card--body">
                                        <div class="product-header">
                                            <a href="#" class="author">
                                                Mople
                                            </a>
                                            <h3><a href="product-details.html">What You Can Learn From Bill Gates

                                                </a></h3>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card card-style-list">
                                    <div class="card-image">
                                        <img src="<?php echo $theme_url; ?>image/products/product-4.jpg" alt="">
                                    </div>
                                    <div class="product-card--body">
                                        <div class="product-header">
                                            <a href="#" class="author">
                                                Cpple
                                            </a>
                                            <h3><a href="product-details.html">3 Ways Create Better BOOK With
                                                    Help

                                                </a></h3>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
}

function home_deal_of_the_day()
{

    $theme_url = theme_url();
?>
    <div class="section-margin">
        <div class="container">
            <div class="row space-db--30">
                <div class="col-lg-8 mb--30">
                    <div class="promo-wrapper promo-type-one">
                        <a href="#" class="promo-image  promo-overlay bg-image" data-bg="image/bg-images/promo-banner-mid.jpg">
                            <!-- <img src="<?php echo $theme_url; ?>image/bg-images/promo-banner-mid.jpg" alt=""> -->
                        </a>
                        <div class="promo-text">
                            <div class="promo-text-inner">
                                <h2>Buy 3. Get Free 1.</h2>
                                <h3>50% off for selected products in Pustok.</h3>
                                <a href="#" class="btn btn-outlined--red-faded">See More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb--30">
                    <div class="promo-wrapper promo-type-two ">
                        <a href="#" class="promo-image promo-overlay bg-image" data-bg="image/bg-images/promo-banner-small.jpg">
                            <!-- <img src="<?php echo $theme_url; ?>image/bg-images/promo-banner-small.jpg" alt=""> -->
                        </a>
                        <div class="promo-text">
                            <div class="promo-text-inner">
                                <span class="d-block price">$26.00</span>
                                <h2>Praise for <br>
                                    The Night Child</h2>
                                <a href="#" class="btn btn-outlined--primary">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}



function home_promotion_section_two()
{

    $theme_url = theme_url();



?>


    <div class="section-margin">
        <div class="container">
            <div class="row space-db--30">
                <div class="col-lg-8 mb--30">
                    <div class="promo-wrapper promo-type-one">
                        <a href="#" class="promo-image  promo-overlay bg-image" data-bg="image/bg-images/promo-banner-mid.jpg">
                            <!-- <img src="<?php echo $theme_url; ?>image/bg-images/promo-banner-mid.jpg" alt=""> -->
                        </a>
                        <div class="promo-text">
                            <div class="promo-text-inner">
                                <h2>Buy 3. Get Free 1.</h2>
                                <h3>50% off for selected products in Pustok.</h3>
                                <a href="#" class="btn btn-outlined--red-faded">See More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb--30">
                    <div class="promo-wrapper promo-type-two ">
                        <a href="#" class="promo-image promo-overlay bg-image" data-bg="<?php echo $theme_url; ?>image/bg-images/promo-banner-small.jpg">
                            <!-- <img src="<?php echo $theme_url; ?>image/bg-images/promo-banner-small.jpg" alt=""> -->
                        </a>
                        <div class="promo-text">
                            <div class="promo-text-inner">
                                <span class="d-block price">$26.00</span>
                                <h2>Praise for <br>
                                    The Night Child</h2>
                                <a href="#" class="btn btn-outlined--primary">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}


function home_deal_of_the_day_section()
{
    $theme_url = theme_url();
?>
    <section class="section-margin">
        <div class="container-fluid">
            <div class="promo-section-heading">
                <h2>Deal of the day up to 20% off Special offer</h2>
            </div>
            <div class="product-slider with-countdown  slider-border-single-row sb-slick-slider" data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow": 6,
                "dots":true
            }' data-slick-responsive='[
                {"breakpoint":1400, "settings": {"slidesToShow": 4} },
                {"breakpoint":992, "settings": {"slidesToShow": 3} },
                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                {"breakpoint":575, "settings": {"slidesToShow": 2} },
                {"breakpoint":490, "settings": {"slidesToShow": 1} }
            ]'>
                <div class="single-slide">
                    <div class="product-card">
                        <div class="product-header">
                            <a href="#" class="author">
                                Ypple
                            </a>
                            <h3><a href="product-details.html">Do You Really Need It? This Will Help You
                                </a>
                            </h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="<?php echo $theme_url; ?>image/products/product-2.jpg" alt="">
                                <div class="hover-contents">
                                    <a href="product-details.html" class="hover-image">
                                        <img src="<?php echo $theme_url; ?>image/products/product-1.jpg" alt="">
                                    </a>
                                    <div class="hover-btns">
                                        <a href="cart.html" class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a href="wishlist.html" class="single-btn">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        <a href="compare.html" class="single-btn">
                                            <i class="fas fa-random"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price-block">
                                <span class="price">£51.20</span>
                                <del class="price-old">£51.20</del>
                                <span class="price-discount">20%</span>
                            </div>
                            <div class="count-down-block">
                                <div class="product-countdown" data-countdown="01/05/2020"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="product-card">
                        <div class="product-header">
                            <a href="#" class="author">
                                Upple
                            </a>
                            <h3><a href="product-details.html">Here Is A Quick Cure For Book</a></h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="<?php echo $theme_url; ?>image/products/product-1.jpg" alt="">
                                <div class="hover-contents">
                                    <a href="product-details.html" class="hover-image">
                                        <img src="<?php echo $theme_url; ?>image/products/product-1.jpg" alt="">
                                    </a>
                                    <div class="hover-btns">
                                        <a href="cart.html" class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a href="wishlist.html" class="single-btn">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        <a href="compare.html" class="single-btn">
                                            <i class="fas fa-random"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price-block">
                                <span class="price">£51.20</span>
                                <del class="price-old">£51.20</del>
                                <span class="price-discount">20%</span>
                            </div>
                            <div class="count-down-block">
                                <div class="product-countdown" data-countdown="01/05/2020"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="product-card">
                        <div class="product-header">
                            <a href="#" class="author">
                                Ypple
                            </a>
                            <h3><a href="product-details.html">a Half Very Simple Things You To Save</a></h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="<?php echo $theme_url; ?>image/products/product-3.jpg" alt="">
                                <div class="hover-contents">
                                    <a href="product-details.html" class="hover-image">
                                        <img src="<?php echo $theme_url; ?>image/products/product-2.jpg" alt="">
                                    </a>
                                    <div class="hover-btns">
                                        <a href="cart.html" class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a href="wishlist.html" class="single-btn">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        <a href="compare.html" class="single-btn">
                                            <i class="fas fa-random"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price-block">
                                <span class="price">£51.20</span>
                                <del class="price-old">£51.20</del>
                                <span class="price-discount">20%</span>
                            </div>
                            <div class="count-down-block">
                                <div class="product-countdown" data-countdown="01/05/2020"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="product-card">
                        <div class="product-header">
                            <a href="#" class="author">
                                Epple
                            </a>
                            <h3><a href="product-details.html">What You Can Learn From Bill Gates</a>
                            </h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="<?php echo $theme_url; ?>image/products/product-5.jpg" alt="">
                                <div class="hover-contents">
                                    <a href="product-details.html" class="hover-image">
                                        <img src="<?php echo $theme_url; ?>image/products/product-4.jpg" alt="">
                                    </a>
                                    <div class="hover-btns">
                                        <a href="cart.html" class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a href="wishlist.html" class="single-btn">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        <a href="compare.html" class="single-btn">
                                            <i class="fas fa-random"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price-block">
                                <span class="price">£51.20</span>
                                <del class="price-old">£51.20</del>
                                <span class="price-discount">20%</span>
                            </div>
                            <div class="count-down-block">
                                <div class="product-countdown" data-countdown="01/05/2020"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="product-card">
                        <div class="product-header">
                            <a href="#" class="author">
                                Rpple
                            </a>
                            <h3><a href="product-details.html">Create Better BOOK With The Help Of Your</a></h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="<?php echo $theme_url; ?>image/products/product-6.jpg" alt="">
                                <div class="hover-contents">
                                    <a href="product-details.html" class="hover-image">
                                        <img src="<?php echo $theme_url; ?>image/products/product-4.jpg" alt="">
                                    </a>
                                    <div class="hover-btns">
                                        <a href="cart.html" class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a href="wishlist.html" class="single-btn">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        <a href="compare.html" class="single-btn">
                                            <i class="fas fa-random"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price-block">
                                <span class="price">£51.20</span>
                                <del class="price-old">£51.20</del>
                                <span class="price-discount">20%</span>
                            </div>
                            <div class="count-down-block">
                                <div class="product-countdown" data-countdown="01/05/2020"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="product-card">
                        <div class="product-header">
                            <a href="#" class="author">
                                Tpple
                            </a>
                            <h3><a href="product-details.html">Turn Your BOOK Into High Machine</a>
                            </h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="<?php echo $theme_url; ?>image/products/product-8.jpg" alt="">
                                <div class="hover-contents">
                                    <a href="product-details.html" class="hover-image">
                                        <img src="<?php echo $theme_url; ?>image/products/product-7.jpg" alt="">
                                    </a>
                                    <div class="hover-btns">
                                        <a href="cart.html" class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a href="wishlist.html" class="single-btn">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        <a href="compare.html" class="single-btn">
                                            <i class="fas fa-random"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price-block">
                                <span class="price">£51.20</span>
                                <del class="price-old">£51.20</del>
                                <span class="price-discount">20%</span>
                            </div>
                            <div class="count-down-block">
                                <div class="product-countdown" data-countdown="01/05/2020"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="product-card">
                        <div class="product-header">
                            <a href="#" class="author">
                                Mpple
                            </a>
                            <h3><a href="product-details.html">Revolutionize Your BOOK With These Easy
                                </a></h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="<?php echo $theme_url; ?>image/products/product-13.jpg" alt="">
                                <div class="hover-contents">
                                    <a href="product-details.html" class="hover-image">
                                        <img src="<?php echo $theme_url; ?>image/products/product-11.jpg" alt="">
                                    </a>
                                    <div class="hover-btns">
                                        <a href="cart.html" class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a href="wishlist.html" class="single-btn">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        <a href="compare.html" class="single-btn">
                                            <i class="fas fa-random"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price-block">
                                <span class="price">£51.20</span>
                                <del class="price-old">£51.20</del>
                                <span class="price-discount">20%</span>
                            </div>
                            <div class="count-down-block">
                                <div class="product-countdown" data-countdown="01/05/2020"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php
}

function home_mast_slider()
{
    record_hit();
    
    $theme_url = theme_url();
    $root_url = root_url();
    $base_url = base_url();
    $images_url = $base_url."images/";
?>
    <section class="hero-area hero-slider-1">
        <div class="sb-slick-slider" data-slick-setting='{
                            "autoplay": true,
                            "fade": true,
                            "autoplaySpeed": 4500,
                            "speed": 4500,
                            "slidesToShow": 1,
                            "dots":true
                            }'>

            <?php /*
            <div class="single-slide bg-shade-whisper  ">
                <div class="container">
                    <div class="home-content text-center text-sm-left position-relative">
                        <div class="hero-partial-image image-right">
                            <img src="<?php echo $pic_path; ?>" alt="" style="max-height: 300px; max-width: 211px">
                        </div>
                        <div class="row no-gutters ">
                            <div class="col-xl-6 col-md-6 col-sm-7">
                                <div class="home-content-inner content-left-side">
                                    <h1>Rafiki Man Guitar</h1>
                                    <!--      <h2>Rafiki Man Safari By Meja Mwangi
                                    </h2> -->
                                    <a href="shop-grid.html" class="btn btn-outlined--primary">
                                        $78.09 - Buy Now!
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            */ ?>
            <?php $pic_path = $base_url . "images/rafikimanguitar.jpg"; ?>
<?php

            $ci = get_instance();
            $query = "SELECT * FROM product WHERE home_slider LIKE 'YES' ORDER BY id ASC ";
            $res = $ci->db->query($query);
            $data = array();
            if ($res->num_rows() > 0)
            {
                
                foreach($res->result_array() as $r)
                        {
                            $product_id = $r["id"];
                            $product_link = base_url() . 'index.php/product/' . $product_id;
                

                     $image_string = $images_url.$r["product_image"];
                     $product_title = $r["product_title"];
                     $home_slider_tagline = $r["home_slider_tagline"];
                     $product_cost = $r["product_cost_ksh"];
                  //   style="background-color:#FF3251"
					?>
            <div class="single-slide bg-ghost-white" style="background-color: #FF3251">
                <div class="container">
                    <div class="home-content text-center text-sm-left position-relative">
                        <div class="hero-partial-image image-right">
                            <img src="<?php echo $image_string; ?>" alt="" style="max-height: 400px; max-width: 281px;">
                        </div>
                        <!-- <div class="row align-items-left justify-content-start justify-content-md-end">
                            <div class="col-lg-6 col-xl-7 col-md-6 col-sm-7"> -->
                            <div class="row no-gutters ">
                            <div class="col-xl-6 col-md-6 col-sm-7">
                            <div class="home-content-inner content-left-side">
                          <!--                            <div class="home-content-inner content-right-side"> -->
                                    <h1 style="color:#FFFFFF"><?php echo $product_title ?></h1>
                                    <h2 style="color:#FAFAFF"><?php echo $home_slider_tagline; ?></h2>
                                    <a href="<?php echo $product_link; ?>" class="btn btn-outlined--success" style="color: #FFFFFF; border:5px solid #">
                                        <?php echo "KSH ".$product_cost; ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                           <?php  //  echo $image_string; ?>
                <?php

                        }
            }
    ?>
        </div>
    </section>

<?php
}
function promotion_section_first()
{
    $theme_url  = theme_url();

?>
    <section class="section-margin">
        <h2 class="sr-only">Promotion Section</h2>
        <div class="container">
            <div class="row space-db--30">
                <div class="col-lg-6 col-md-6 mb--30">
                    <a href="#" class="promo-image promo-overlay">
                        <img src="<?php echo $theme_url; ?>image/bg-images/promo-banner-with-text.jpg" alt="">
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 mb--30">
                    <a href="#" class="promo-image promo-overlay">
                        <img src="<?php echo $theme_url; ?>image/bg-images/promo-banner-with-text-2.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php
}

function home_features_section()
{
    $theme_url = theme_url();

?>

    <section class="mb--30">
        <div class="container ">
            <div class="row">
                <div class="col-xl-3 col-md-6 mt--30">
                    <div class="feature-box h-100">
                        <div class="icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <div class="text">
                            <h5>Free Shipping Item</h5>
                            <p> Orders over $500</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mt--30">
                    <div class="feature-box h-100">
                        <div class="icon">
                            <i class="fas fa-redo-alt"></i>
                        </div>
                        <div class="text">
                            <h5>Money Back Guarantee</h5>
                            <p>100% money back</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mt--30">
                    <div class="feature-box h-100">
                        <div class="icon">
                            <i class="fas fa-piggy-bank"></i>
                        </div>
                        <div class="text">
                            <h5>Cash On Delivery</h5>
                            <p>Lorem ipsum dolor amet</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mt--30">
                    <div class="feature-box h-100">
                        <div class="icon">
                            <i class="fas fa-life-ring"></i>
                        </div>
                        <div class="text">
                            <h5>Help & Support</h5>
                            <p>Call us : + 0123.4567.89</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
}


?>
