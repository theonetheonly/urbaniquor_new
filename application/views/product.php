<?php
// $theme_url = $baseurl . "theme/";
// echo $theme_url . "css/plugins.css";
$theme_url = theme_url();
$root_url = root_url();
$base_url = base_url();
$images_url = $base_url."images/";

?>
<!DOCTYPE html>
<html lang="zxx">
<?php
pageheader();
?>

<body>
    <div class="site-wrapper" id="top">
        <div class="site-header d-none d-lg-block" style="padding-top:10px">
            <?php topnav(); ?>
        </div>

        <?php // site mobile menu;
        header_top_area("yes");
        topnav_mobile();
        topnav_flex();
        breadCrumb("Product");
        ?>

        <main class="inner-page-sec-padding-bottom">
            <div class="container">
                <div class="row  mb--60">
         <div class="col-lg-5 mb--30">
           <hr />
                        <!-- Product Details Slider Big Image-->
                        <?php
                        product_Slider_main($product_id);
                        ?>
                    </div>
                    <div class="col-lg-7">
                <hr />
                <?php
                        product_details_section($product_id, $redeem_mode);
                          ?>
                    </div>
              </div>
                    <?php
              
                    ?>


                </div>
                <?php
                //     product_description_and_reviews();

                ?>


                <!-- <div class="tab-product-details">
  <div class="brand">
    <img src="<?php // echo $theme_url;; 
                ?>image/others/review-tab-product-details.jpg" alt="">
  </div>
  <h5 class="meta">Reference <span class="small-text">demo_5</span></h5>
  <h5 class="meta">In stock <span class="small-text">297 Items</span></h5>
  <section class="product-features">
    <h3 class="title">Data sheet</h3>
    <dl class="data-sheet">
      <dt class="name">Compositions</dt>
      <dd class="value">Viscose</dd>
      <dt class="name">Styles</dt>
      <dd class="value">Casual</dd>
      <dt class="name">Properties</dt>
      <dd class="value">Maxi Dress</dd>
    </dl>
  </section>
</div> -->
            </div>
            <?php
            // relatedProductsArea();
            //    brandArea();
            footer();
            footerJSScripts();
            ?>
</body>

</html>
