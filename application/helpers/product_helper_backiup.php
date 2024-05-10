<?php

function homepage_product($field_needed)
{

    $ci = get_instance();
    $query = "SELECT * FROM product WHERE home_slider LIKE 'YES' ";
    $result = $ci->db->query($query);

    $data = array();
    if ($result->num_rows() > 0)
    {
            foreach($result->result_array() as $r)       
            {
                $data[] = $r[$field_needed];
            }
    }

        return $data;
}


function product_Slider_main($product_id = 0)
{
    $theme_url = theme_url();
    $root_url = root_url();
    $base_url = base_url();
    $images_url = $base_url."images/";


  //  $product_id = $r["id"];
    $product_link = base_url() . 'index.php/product/' . $product_id;
    $image_string = $images_url.getAnyFieldValue($product_id, "product_image", "product");
    $product_title = getAnyFieldValue($product_id, "product_title", "product");
    $home_slider_tagline = getAnyFieldValue($product_id, "home_slider_tagline", "product");
  //  $product_cost = $r["product_cost_ksh"];
    // $category = $r["category"];  


?>
    <div class="product-deta/ils-slider sb-slick-slider arrow-type-two" data-slick-setting='{
                                "slidesToShow": 1,
                                "arrows": false,
                                "fade": true,
                                "draggable": false,
                                "swipe": false,
                                "asNavFor": ".product-slider-nav"
                                }'>
        <div class="single-slide">
            <img src="<?php   echo $image_string ;?>" alt="" width="260px" >
        </div>
    <!--    <div class="single-slide">
            <img src="<?php //echo $theme_url;; ?>image/products/product-details-2.jpg" alt="">
        </div>
        <div class="single-slide">
            <img src="<?php  //echo $theme_url;; ?>image/products/product-details-3.jpg" alt="">
        </div>
        <div class="single-slide">
            <img src="<?php // echo $theme_url;; ?>image/products/product-details-4.jpg" alt="">
        </div>
        <div class="single-slide">
            <img src="<?php // echo $theme_url;; ?>image/products/product-details-5.jpg" alt="">
        </div> -->
    </div>

<?php
}


function product_details_section($product_id)
{
    //    echo "<h1>" . $product_id . "</h1>";

    $root_url = root_url();
    $theme_url = theme_url();
    $release_date = getAnyFieldValue($product_id, "release_date", "product");
    $product_title =  getAnyFieldValue($product_id, "product_title", "product");
    $size =  getAnyFieldValue($product_id, "size", "product");

?>
        <div class="product-details-info pl-lg--30 ">
            <!--                 <p class="tag-block">Tags: <a href="#">Movado</a>, <a href="#">Omega</a></p> -->
            <h3 class="product-title"><?php echo $product_title;  ?></h3>
                    <h4><?php echo $size; ?></h4>
            <ul class="list-unstyled">
        <?php /*        <li>Date Released: <a href="#" class="list-value font-weight-bold"><?php echo date("D d M Y", strtotime($release_date)); ?></a></li>
                <li>Copies Sold: <span class="list-value"><?php echo getAnyFieldValue($product_id, "copies_sold", "product"); ?></span></li>
                <li>ISBN: <span class="list-value"><?php echo getAnyFieldValue($product_id, "isbn", "product"); ?></span></li>
            */ ?>
                </ul>
            <div class="price-block">
                <span class="price-new">KSH <?php echo getAnyFieldValue($product_id, "product_cost_ksh", "product"); ?></span>
             <?php /* <br /><span class="price-new"><small>USD <?php // echo getAnyFieldValue($product_id, "product_cost_usd", "product"); ?></small></span> -->
                <p>Currency is set to <strong>KSH</strong><br /><small><a href="javascript:void(0);" onclick="changeCurrency()">Change to USD</a></small></p>
                    */ ?>
                <input type="hidden" id="product_currency" name="product_currency" value="KSH" />


                <!--                <del class="price-old">£91.86</del> -->
            </div>
            <!--
            <div class="rating-widget">
                <div class="rating-block">
                    <span class="fas fa-star star_on"></span>
                    <span class="fas fa-star star_on"></span>
                    <span class="fas fa-star star_on"></span>
                    <span class="fas fa-star star_on"></span>
                    <span class="fas fa-star "></span>
                </div>
                <div class="review-widget">
                    <a href="#">(1 Reviews)</a> <span>|</span>
                    <a href="#">Write a review</a>
                </div>
            </div> -->
            <article class="product-details-article">
                <h4 class="sr-only">Description</h4>
                <p><?php echo getAnyFieldValue($product_id, "product_description", "product") ?></p>
            </article>
            <div class="add-to-cart-row">
                    <div class="count-input-block">
                    <span class="widget-label">Qty</span>
                    <input type="text" class="form-control text-center" value="1">
                </div>
                <input type="hidden" name="product_quantity" id="product_quantity" value="1" />
                <div class="add-cart-btn">
                    <a href="javascript:void(0);" onclick="addToCart('<?php echo $root_url; ?>','<?php echo $product_id; ?>')" class="btn btn-outlined--primary"><span class="plus-icon">+</span>Add to
                        Cart</a>
                    <a href="javascript:void(0);" onclick="checkToCart('<?php echo $root_url; ?>')" class="btn btn-outlined--primary">Check Out</a>
                </div>
            </div>
            <!--
            <div class="compare-wishlist-row">
                <a href="#" class="add-link"><i class="fas fa-heart"></i>Add to Wish List</a>
                <a href="#" class="add-link"><i class="fas fa-random"></i>Add to Compare</a>
            </div> -->
        </div>

<?php
}
function product_description_and_reviews()
{
    $theme_url = theme_url();
?>
    <div class="sb-custom-tab review-tab section-padding">
        <ul class="nav nav-tabs nav-style-2" id="myTab2" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="tab1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">
                    DESCRIPTION
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="true">
                    REVIEWS (1)
                </a>
            </li>
        </ul>
        <div class="tab-content space-db--20" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1">
                <article class="review-article">
                    <h1 class="sr-only">Tab Article</h1>
                    <p>Fashion has been creating well-designed collections since 2010. The brand offers
                        feminine designs delivering
                        stylish
                        separates and statement dresses which have since evolved into a full ready-to-wear
                        collection in which every
                        item is
                        a
                        vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful
                        elegance and unmistakable
                        signature
                        style. All the beautiful pieces are made in Italy and manufactured with the greatest
                        attention. Now Fashion
                        extends
                        to
                        a range of accessories including shoes, hats, belts and more!</p>
                </article>
            </div>
            <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab2">
                <div class="review-wrapper">
                    <h2 class="title-lg mb--20">1 REVIEW FOR AUCTOR GRAVIDA ENIM</h2>
                    <div class="review-comment mb--20">
                        <div class="avatar">
                            <img src="<?php echo $theme_url;; ?>image/icon/author-logo.png" alt="">
                        </div>
                        <div class="text">
                            <div class="rating-block mb--15">
                                <span class="ion-android-star-outline star_on"></span>
                                <span class="ion-android-star-outline star_on"></span>
                                <span class="ion-android-star-outline star_on"></span>
                                <span class="ion-android-star-outline"></span>
                                <span class="ion-android-star-outline"></span>
                            </div>
                            <h6 class="author">ADMIN – <span class="font-weight-400">March 23, 2015</span>
                            </h6>
                            <p>Lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio
                                quis mi.</p>
                        </div>
                    </div>
                    <h2 class="title-lg mb--20 pt--15">ADD A REVIEW</h2>
                    <div class="rating-row pt-2">
                        <p class="d-block">Your Rating</p>
                        <span class="rating-widget-block">
                            <input type="radio" name="star" id="star1">
                            <label for="star1"></label>
                            <input type="radio" name="star" id="star2">
                            <label for="star2"></label>
                            <input type="radio" name="star" id="star3">
                            <label for="star3"></label>
                            <input type="radio" name="star" id="star4">
                            <label for="star4"></label>
                            <input type="radio" name="star" id="star5">
                            <label for="star5"></label>
                        </span>
                        <form action="https://demo.hasthemes.com/pustok-preview/pustok/" class="mt--15 site-form ">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="message">Comment</label>
                                        <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="name">Name *</label>
                                        <input type="text" id="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="email">Email *</label>
                                        <input type="text" id="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <input type="text" id="website" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="submit-btn">
                                        <a href="#" class="btn btn-black">Post Comment</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}

function product_slider_small_pics()
{
    $theme_url = theme_url();
?>
    <div class="mt--30 product-slider-nav sb-slick-slider arrow-type-two" data-slick-setting='{
                            "infinite":true,
                                    "autoplay": true,
                            "autoplaySpeed": 8000,
                            "slidesToShow": 4,
                            "arrows": true,
                            "prevArrow":{"buttonClass": "slick-prev","iconClass":"fa fa-chevron-left"},
                            "nextArrow":{"buttonClass": "slick-next","iconClass":"fa fa-chevron-right"},
                            "asNavFor": ".product-details-slider",
                            "focusOnSelect": true
                            }'>
        <div class="single-slide">
            <img src="<?php echo $theme_url;; ?>image/products/product-details-1.jpg" alt="">
        </div>
        <div class="single-slide">
            <img src="<?php echo $theme_url;; ?>image/products/product-details-2.jpg" alt="">
        </div>
        <div class="single-slide">
            <img src="<?php echo $theme_url;; ?>image/products/product-details-3.jpg" alt="">
        </div>
        <div class="single-slide">
            <img src="<?php echo $theme_url;; ?>image/products/product-details-4.jpg" alt="">
        </div>
        <div class="single-slide">
            <img src="<?php echo $theme_url;; ?>image/products/product-details-5.jpg" alt="">
        </div>
    </div>

<?php
}
function homepage_categories()
{

    $categories =  getCategoires();
    $cats = implode(":", $categories);


    ?>

          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <?php
                     //   $categories =  getCategoires();
                        foreach($categories as $category)
                            {
                                $tab_id = $category."-tab";
                                $href = "#".$category;
                       //         $cats = implode(":", $categories);

                                ?>
                    <li class="nav-item">
                        <a   class="nav-link active" id="<?php echo $tab_id; ?>" data-toggle="tab" href="<?php echo $href; ?>" role="tab" aria-controls="<?php echo $category; ?>" aria-selected="true" onclick="togglePanes('<?php echo $category; ?>','<?php echo $cats; ?>') ">
                            <?php echo $category; ?>
                        </a>
                        <span class="arrow-icon"></span>
                    </li>

                                <?php
                            }
            ?>
           </ul>
           

    <?php
}


function product_home_helper()
{
    $ci = get_instance();

    $theme_url = theme_url();
    $root_url = root_url();
    $base_url = base_url();
    $images_url = $base_url."images/";
    $product_url = product_url();

    $categories =  getCategoires();
    $cats = implode(":", $categories);

?>


    <section class="section-padding" style="padding-top: 20px">
        <h2 class="sr-only">Home Tab Slider Section</h2>
        <div class="container">
            <div class="sb-custom-tab">
                <?php homepage_categories(); ?>

            <?php /*
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pane_featured-tab" data-toggle="tab" href="#pane_featured" role="tab" aria-controls="pane_featured" aria-selected="true" onclick="togglePanes('pane_featured', 'pane_latest','pane_allbooks')">
                            Featured <?php // echo $product_url; 
                                        ?>

                        </a>
                        <span class="arrow-icon"></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pane_latest-tab" data-toggle="tab" href="#pane_latest" role="tab" aria-controls="pane_latest" aria-selected="true" onclick="togglePanes('pane_latest','pane_featured', 'pane_allbooks')">
                            Latest
                        </a>
                        <span class="arrow-icon"></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pane_allbooks-tab" data-toggle="tab" href="#pane_allbooks" role="tab" aria-controls="pane_allbooks" aria-selected="false" onclick="togglePanes( 'pane_allbooks','pane_latest','pane_featured')">
                            All Books
                        </a>
                        <span class="arrow-icon"></span>
                    </li>
                </ul>
            */ ?>
                <?php 
                    $categories = getCategoires();
                            foreach($categories as $category)
                                {
                                    $tab = $category."-tab";
                    ?>
                <div class="tab-content" id="myTabContent">
 
                    <div class="tab-pane show active" id="<?php echo $category; ?>" role="tabpanel" aria-labelledby="<?php echo $tab; ?>" style="display: block">
                        <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                                        "autoplay": true,
                                        "autoplaySpeed": 1500,
                                        "slidesToShow": 3,
                                        "rows":1,
                                        "dots":false
                                    }' data-slick-responsive='[
                                        {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                                        {"breakpoint":768, "settings": {"slidesToShow": 3} },
                                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                    ]'>
                            <?php

                            $filter_category =" AND category LIKE '$category' ";
                            if($category== "ALL")   
                            {
                                $filter_category ="";
                            } 

                            $sql_query = "SELECT * FROM product WHERE product_is_featured LIKE 'yes' $filter_category ORDER BY id ASC LIMIT 100";
                            $results_a = $ci->db->query($sql_query);
                            $n = 0;
                            ?>
                            <p><?php echo $results_a->num_rows(); ?> books found</p>
                            <?php
                            foreach ($results_a->result_array() as $r) {
                                $product_id = $r["id"];
                                $product_link = base_url() . 'index.php/product/' . $product_id;
                                $image_string = $images_url.$r["product_image"];
                                $product_title = $r["product_title"];
                                $home_slider_tagline = $r["home_slider_tagline"];
                                $product_cost = $r["product_cost_ksh"];
                                $category = $r["category"];
                                $minimum_order  = $r["minimum_order"];  

                            ?>
                                <div class="single-slide">
                                    <div class="product-card">
                                        <div class="product-header" style="text-align: left;">
                                            <a href="#" class="author">
                                                <?php echo $category; ?>
                                            </a>
                                            <h3><a href="<?php echo $product_link; ?>"><?php echo $r["product_title"] ?></a></h3>
                                        </div>
                                        <div class="product-card--body">
                                            <div class="card-image">
                                          <a href="<?php echo $product_link; ?>" ><img src="<?php echo $image_string; ?>" stlye="width: 200px" alt=""></a>
                                           <!--
                                              <div class="hover-contents">
                                                    <a href="product-details.html" class="hover-image">
                                                        <img src="<?php // echo $image_string; ?>" stlye="width: 280px" alt="">
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
                                                </div> -->
                                            </div>
                                            <div class="price-block">
                                                <span class="price">KSH <?php echo $r["product_cost_ksh"]; ?></span>
                                                <!--  <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                                }
                    ?>


<?php /*

                    <div class="tab-pane" id="pane_latest" role="tabpanel" aria-labelledby="men-tab">
                        <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                                        "autoplay": true,
                                        "autoplaySpeed": 3000,
                                        "slidesToShow": 5,
                                        "rows":1,
                                        "dots":true
                                    }' data-slick-responsive='[
                                        {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                    ]'>

                            <?php
                            $sql_query = "SELECT * FROM product WHERE product_is_new LIKE 'YES' ORDER BY id ASC LIMIT 100";
                            $results_a = $ci->db->query($sql_query);
                            $n = 0;
                            ?>
                            <p><?php echo $results_a->num_rows(); ?> books found</p>
                            <?php
                            foreach ($results_a->result_array() as $r) {
                                $product_id = $r["id"];
                                $product_link = base_url() . 'index.php/product/' . $product_id;
                                $image_string = $images_url.$r["product_image"];
                                $product_title = $r["product_title"];
                                $home_slider_tagline = $r["home_slider_tagline"];
                                $product_cost = $r["product_cost_ksh"];
                                $category = $r["category"];  

                            ?>

<div class="single-slide">
                                    <div class="product-card">
                                        <div class="product-header" style="text-align: left;">
                                            <a href="#" class="author">
                                                <?php echo $category; ?>
                                            </a>
                                            <h3><a href="<?php echo $product_link; ?>"><?php echo $r["product_title"] ?></a></h3>
                                        </div>
                                        <div class="product-card--body">
                                            <div class="card-image">
                                          <a href="<?php echo $product_link; ?>" ><img src="<?php echo $image_string; ?>" stlye="width: 200px" alt=""></a>
                                           <!--
                                              <div class="hover-contents">
                                                    <a href="product-details.html" class="hover-image">
                                                        <img src="<?php // echo $image_string; ?>" stlye="width: 280px" alt="">
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
                                                </div> -->
                                            </div>
                                            <div class="price-block">
                                                <span class="price">KSH <?php echo $r["product_cost_ksh"]; ?></span>
                                                <!--  <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                            <?php
                            }
                            ?>


                        </div>
                    </div> 
                    */ ?>

                    <?php /*
                    <div class="tab-pane" id="pane_allbooks" role="tabpanel" aria-labelledby="woman-tab">
                        <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                                        "autoplay": true,
                                        "autoplaySpeed": 3000,
                                        "slidesToShow": 4,
                                        "rows": 2,
                                        "dots":true
                                    }' data-slick-responsive='[
                                        {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                    ]'>

                            <?php
                            $sql_query = "SELECT * FROM product  ORDER BY id ASC LIMIT 100";
                            $results_a = $ci->db->query($sql_query);
                            $n = 0;
                            ?>
                            <p><?php echo $results_a->num_rows(); ?> books found</p>
                            <?php
                            foreach ($results_a->result_array() as $r) {

                                $product_id = $r["id"];
                                $product_link = base_url() . 'index.php/product/' . $product_id;
                                $image_string = $images_url.$r["product_image"];
                                $product_title = $r["product_title"];
                                $home_slider_tagline = $r["home_slider_tagline"];
                                $product_cost = $r["product_cost_ksh"];
                                $category = $r["category"];  

                            ?>
                            <div class="single-slide">
                                    <div class="product-card">
                                        <div class="product-header" style="text-align: left;">
                                            <a href="#" class="author">
                                                <?php echo $category; ?>
                                            </a>
                                            <h3><a href="<?php echo $product_link; ?>"><?php echo $r["product_title"] ?></a></h3>
                                        </div>
                                        <div class="product-card--body">
                                            <div class="card-image">
                                          <a href="<?php echo $product_link; ?>" ><img src="<?php echo $image_string; ?>" stlye="width: 200px" alt=""></a>
                                           <!--
                                              <div class="hover-contents">
                                                    <a href="product-details.html" class="hover-image">
                                                        <img src="<?php // echo $image_string; ?>" stlye="width: 280px" alt="">
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
                                                </div> -->
                                            </div>
                                            <div class="price-block">
                                                <span class="price">KSH <?php echo $r["product_cost_ksh"]; ?></span>
                                                <!--  <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                            ?>
                        </div>
                    </div>   */?>
                </div>
            </div>
        </div>
    </section>
  <script type="text/javascript">

      function togglePanes(active, cats) {
               var cat_obs = cats.split(":");
                    for(var x =0; x < cat_obs.length; x++)
                    {
                        var divx = "#" + cat_obs[x];
                         if(cat_obs[x]==active)
                            {
                                  $(divx).fadeIn(3000);
                            }
                            else{
                                 $(divx).fadeOut(2000);
                            }
                    }
        }       

  </script>


<?php
}


function product_home_helper_full()
{
    $theme_url = theme_url();
    $product_url = product_url();

?>
    <section class="section-padding" style="padding-top: 20px">
        <h2 class="sr-only">Home Tab Slider Section</h2>
        <div class="container">
            <div class="sb-custom-tab">
                
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="shop-tab" data-toggle="tab" href="#shop" role="tab" aria-controls="shop" aria-selected="true">
                            Featured
                        </a>
                        <span class="arrow-icon"></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="men-tab" data-toggle="tab" href="#men" role="tab" aria-controls="men" aria-selected="true">
                            Latest
                        </a>
                        <span class="arrow-icon"></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="woman-tab" data-toggle="tab" href="#woman" role="tab" aria-controls="woman" aria-selected="false">
                            Most viewed
                        </a>
                        <span class="arrow-icon"></span>
                    </li>
                </ul>


                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane show active" id="shop" role="tabpanel" aria-labelledby="shop-tab">
                        <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                            "autoplay": true,
                            "autoplaySpeed": 8000,
                            "slidesToShow": 5,
                            "rows":2,
                            "dots":true
                        }' data-slick-responsive='[
                            {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                            {"breakpoint":480, "settings": {"slidesToShow": 1} },
                            {"breakpoint":320, "settings": {"slidesToShow": 1} }
                        ]'>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="#" class="author">
                                            jpple
                                        </a>
                                        <h3><a href="product-details.html">Rpple iPad with Retina Display
                                                MD510LL/A</a></h3>
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
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="#" class="author">
                                            Bpple
                                        </a>
                                        <h3><a href="product-details.html">Koss KPH7 Lightweight Portable
                                                Headphone</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-2.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="<?php echo $theme_url; ?>image/products/product-3.jpg" alt="">
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
                                            Cpple
                                        </a>
                                        <h3><a href="product-details.html">Beats EP Wired On-Ear Headphone-Black</a>
                                        </h3>
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
                                            Dpple
                                        </a>
                                        <h3><a href="product-details.html">Beats Solo2 Solo 2 Wired On-Ear
                                                Headphone</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-4.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="<?php echo $theme_url; ?>image/products/product-5.jpg" alt="">
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
                                            Lpple
                                        </a>
                                        <h3><a href="product-details.html">Beats Solo3 Wireless On-Ear Headphones
                                                2</a></h3>
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
                                            Fpple
                                        </a>
                                        <h3><a href="product-details.html">3 Ways To Have (A) More Appealing
                                                BOOK</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-6.jpg" alt="">
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
                                            Epple
                                        </a>
                                        <h3><a href="product-details.html">In 10 Minutes, I'll Give You The Truth
                                                About</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-7.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="<?php echo $theme_url; ?>image/products/product-6.jpg" alt="">
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
                                            Fpple
                                        </a>
                                        <h3><a href="product-details.html">5 Ways To Get Through To Your BOOK</a>
                                        </h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-8.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="<?php echo $theme_url; ?>image/products/product-9.jpg" alt="">
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
                                            Gpple
                                        </a>
                                        <h3><a href="product-details.html">What Can You Do To Save Your BOOK</a>
                                        </h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-9.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="<?php echo $theme_url; ?>image/products/product-8.jpg" alt="">
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
                                        <h3><a href="product-details.html">From Destruction By Social Media?</a>
                                        </h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-10.jpg" alt="">
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
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="#" class="author">
                                            Gpple
                                        </a>
                                        <h3><a href="product-details.html">Find Out More About BOOK By Social
                                                Media?</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-11.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="<?php echo $theme_url; ?>image/products/product-10.jpg" alt="">
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
                                            Vpple
                                        </a>
                                        <h3><a href="product-details.html">Read This Controversial BOOK By
                                                Social Media?</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-12.jpg" alt="">
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
                    <div class="tab-pane" id="men" role="tabpanel" aria-labelledby="men-tab">
                        <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                                        "autoplay": true,
                                        "autoplaySpeed": 8000,
                                        "slidesToShow": 5,
                                        "rows":2,
                                        "dots":true
                                    }' data-slick-responsive='[
                                        {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                    ]'>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="#" class="author">
                                            jpple
                                        </a>
                                        <h3><a href="product-details.html">Bpple iPad with Retina Display
                                                MD510LL/A</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-3.jpg" alt="">
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
                                            Bpple
                                        </a>
                                        <h3><a href="product-details.html">Koss KPH7 Lightweight Portable
                                                Headphone</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-2.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="<?php echo $theme_url; ?>image/products/product-3.jpg" alt="">
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
                                            Cpple
                                        </a>
                                        <h3><a href="product-details.html">Beats EP Wired On-Ear
                                                Headphone-Black</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-1.jpg" alt="">
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
                                            Dpple
                                        </a>
                                        <h3><a href="product-details.html">Beats Solo2 Solo 2 Wired On-Ear
                                                Headphone</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-4.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="<?php echo $theme_url; ?>image/products/product-5.jpg" alt="">
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
                                            Lpple
                                        </a>
                                        <h3><a href="product-details.html">Beats Solo3 Wireless On-Ear
                                                Headphones 2</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-7.jpg" alt="">
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
                                            Fpple
                                        </a>
                                        <h3><a href="product-details.html">3 Ways To Have (A) More Appealing
                                                BOOK</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-6.jpg" alt="">
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
                                            Epple
                                        </a>
                                        <h3><a href="product-details.html">In 10 Minutes, I'll Give You The
                                                Truth About</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-5.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="<?php echo $theme_url; ?>image/products/product-6.jpg" alt="">
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
                                            Fpple
                                        </a>
                                        <h3><a href="product-details.html">5 Ways To Get Through To Your
                                                BOOK</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-8.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="<?php echo $theme_url; ?>image/products/product-9.jpg" alt="">
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
                                            Gpple
                                        </a>
                                        <h3><a href="product-details.html">What Can You Do To Save Your BOOK</a>
                                        </h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-3.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="<?php echo $theme_url; ?>image/products/product-8.jpg" alt="">
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
                                        <h3><a href="product-details.html">From Destruction By Social Media?</a>
                                        </h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-9.jpg" alt="">
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
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="#" class="author">
                                            Gpple
                                        </a>
                                        <h3><a href="product-details.html">Find Out More About BOOK By Social
                                                Media?</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-10.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="<?php echo $theme_url; ?>image/products/product-10.jpg" alt="">
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
                                            Apple
                                        </a>
                                        <h3><a href="product-details.html">Read This Controversial BOOK By
                                                Social Media?</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-9.jpg" alt="">
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
                    <div class="tab-pane" id="woman" role="tabpanel" aria-labelledby="woman-tab">
                        <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                                        "autoplay": true,
                                        "autoplaySpeed": 8000,
                                        "slidesToShow": 5,
                                        "rows":2,
                                        "dots":true
                                    }' data-slick-responsive='[
                                        {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                    ]'>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="#" class="author">
                                            jpple
                                        </a>
                                        <h3><a href="product-details.html">Zpple fPad with Retina Display
                                                MD510LL/A</a></h3>
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
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="#" class="author">
                                            Bpple
                                        </a>
                                        <h3><a href="product-details.html">Koss KPH7 Lightweight Portable
                                                Headphone</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-4.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="<?php echo $theme_url; ?>image/products/product-3.jpg" alt="">
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
                                            Cpple
                                        </a>
                                        <h3><a href="product-details.html">Beats EP Wired On-Ear
                                                Headphone-Black</a></h3>
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
                                            Dpple
                                        </a>
                                        <h3><a href="product-details.html">Beats Solo2 Solo 2 Wired On-Ear
                                                Headphone</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-1.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="<?php echo $theme_url; ?>image/products/product-5.jpg" alt="">
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
                                            Lpple
                                        </a>
                                        <h3><a href="product-details.html">Beats Solo3 Wireless On-Ear
                                                Headphones 2</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-11.jpg" alt="">
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
                                            Fpple
                                        </a>
                                        <h3><a href="product-details.html">3 Ways To Have (A) More Appealing
                                                BOOK</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-10.jpg" alt="">
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
                                            Epple
                                        </a>
                                        <h3><a href="product-details.html">In 10 Minutes, I'll Give You The
                                                Truth About</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-9.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="<?php echo $theme_url; ?>image/products/product-6.jpg" alt="">
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
                                            Fpple
                                        </a>
                                        <h3><a href="product-details.html">5 Ways To Get Through To Your
                                                BOOK</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-8.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="<?php echo $theme_url; ?>image/products/product-9.jpg" alt="">
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
                                            Gpple
                                        </a>
                                        <h3><a href="product-details.html">What Can You Do To Save Your BOOK</a>
                                        </h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-5.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="<?php echo $theme_url; ?>image/products/product-8.jpg" alt="">
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
                                        <h3><a href="product-details.html">From Destruction By Social Media?</a>
                                        </h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-3.jpg" alt="">
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
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="#" class="author">
                                            Gpple
                                        </a>
                                        <h3><a href="product-details.html">Find Out More About BOOK By Social
                                                Media?</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-11.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="<?php echo $theme_url; ?>image/products/product-10.jpg" alt="">
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
                                            Apple
                                        </a>
                                        <h3><a href="product-details.html">Read This Controversial BOOK By
                                                Social Media? Out More</a>
                                        </h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?php echo $theme_url; ?>image/products/product-12.jpg" alt="">
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
                </div>
            </div>
        </div>
    </section>
<?php
}


function brandArea()
{
    $theme_url = theme_url();
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
                    <img src="<?php echo $theme_url;; ?>image/others/brand-1.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="<?php echo $theme_url;; ?>image/others/brand-2.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="<?php echo $theme_url;; ?>image/others/brand-3.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="<?php echo $theme_url;; ?>image/others/brand-4.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="<?php echo $theme_url;; ?>image/others/brand-5.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="<?php echo $theme_url;; ?>image/others/brand-6.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="<?php echo $theme_url;; ?>image/others/brand-1.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="<?php echo $theme_url;; ?>image/others/brand-2.jpg" alt="">
                </div>
            </div>
        </div>
    </section>




<?php
}


function relatedProductsArea()
{

    $theme_url = theme_url();

?>
    <section class="">
        <div class="container">
            <div class="section-title section-title--bordered">
                <h2>RELATED PRODUCTS</h2>
            </div>
            <div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow": 4,
                "dots":true
                }' data-slick-responsive='[
                {"breakpoint":1200, "settings": {"slidesToShow": 4} },
                {"breakpoint":992, "settings": {"slidesToShow": 3} },
                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                {"breakpoint":480, "settings": {"slidesToShow": 1} }
                ]'>
                <div class="single-slide">
                    <div class="product-card">
                        <div class="product-header">
                            <a href="#" class="author">
                                Lpple
                            </a>
                            <h3><a href="product-details.html">Revolutionize Your BOOK With</a></h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="<?php echo $theme_url;; ?>image/products/product-10.jpg" alt="">
                                <div class="hover-contents">
                                    <a href="product-details.html" class="hover-image">
                                        <img src="<?php echo $theme_url;; ?>image/products/product-1.jpg" alt="">
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
                                <img src="<?php echo $theme_url;; ?>image/products/product-2.jpg" alt="">
                                <div class="hover-contents">
                                    <a href="product-details.html" class="hover-image">
                                        <img src="<?php echo $theme_url;; ?>image/products/product-1.jpg" alt="">
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
                            <h3><a href="product-details.html">3 Ways Create Better BOOK With</a></h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="<?php echo $theme_url;; ?>image/products/product-3.jpg" alt="">
                                <div class="hover-contents">
                                    <a href="product-details.html" class="hover-image">
                                        <img src="<?php echo $theme_url;; ?>image/products/product-2.jpg" alt="">
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
                                <img src="<?php echo $theme_url;; ?>image/products/product-5.jpg" alt="">
                                <div class="hover-contents">
                                    <a href="product-details.html" class="hover-image">
                                        <img src="<?php echo $theme_url;; ?>image/products/product-4.jpg" alt="">
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
                            <h3><a href="product-details.html">a Half Very Simple Things You To</a></h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="<?php echo $theme_url;; ?>image/products/product-6.jpg" alt="">
                                <div class="hover-contents">
                                    <a href="product-details.html" class="hover-image">
                                        <img src="<?php echo $theme_url;; ?>image/products/product-4.jpg" alt="">
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


function descriptionReviewSection()
{
    $theme_url = theme_url();
?>
    <div class="sb-custom-tab review-tab section-padding">
        <ul class="nav nav-tabs nav-style-2" id="myTab2" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="tab1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">
                    DESCRIPTION
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="true">
                    REVIEWS (1)
                </a>
            </li>
        </ul>
        <div class="tab-content space-db--20" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1">
                <article class="review-article">
                    <h1 class="sr-only">Tab Article</h1>
                    <p>Fashion has been creating well-designed collections since 2010. The brand offers
                        feminine designs delivering
                        stylish
                        separates and statement dresses which have since evolved into a full ready-to-wear
                        collection in which every
                        item is
                        a
                        vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful
                        elegance and unmistakable
                        signature
                        style. All the beautiful pieces are made in Italy and manufactured with the greatest
                        attention. Now Fashion
                        extends
                        to
                        a range of accessories including shoes, hats, belts and more!</p>
                </article>
            </div>
            <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab2">
                <div class="review-wrapper">
                    <h2 class="title-lg mb--20">1 REVIEW FOR AUCTOR GRAVIDA ENIM</h2>
                    <div class="review-comment mb--20">
                        <div class="avatar">
                            <img src="<?php echo $theme_url;; ?>image/icon/author-logo.png" alt="">
                        </div>
                        <div class="text">
                            <div class="rating-block mb--15">
                                <span class="ion-android-star-outline star_on"></span>
                                <span class="ion-android-star-outline star_on"></span>
                                <span class="ion-android-star-outline star_on"></span>
                                <span class="ion-android-star-outline"></span>
                                <span class="ion-android-star-outline"></span>
                            </div>
                            <h6 class="author">ADMIN – <span class="font-weight-400">March 23, 2015</span>
                            </h6>
                            <p>Lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio
                                quis mi.</p>
                        </div>
                    </div>
                    <h2 class="title-lg mb--20 pt--15">ADD A REVIEW</h2>
                    <div class="rating-row pt-2">
                        <p class="d-block">Your Rating</p>
                        <span class="rating-widget-block">
                            <input type="radio" name="star" id="star1">
                            <label for="star1"></label>
                            <input type="radio" name="star" id="star2">
                            <label for="star2"></label>
                            <input type="radio" name="star" id="star3">
                            <label for="star3"></label>
                            <input type="radio" name="star" id="star4">
                            <label for="star4"></label>
                            <input type="radio" name="star" id="star5">
                            <label for="star5"></label>
                        </span>
                        <form action="https://demo.hasthemes.com/pustok-preview/pustok/" class="mt--15 site-form ">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="message">Comment</label>
                                        <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="name">Name *</label>
                                        <input type="text" id="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="email">Email *</label>
                                        <input type="text" id="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <input type="text" id="website" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="submit-btn">
                                        <a href="#" class="btn btn-black">Post Comment</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
}


?>