<?php
// $theme_url = $baseurl . "theme/";
// echo $theme_url . "css/plugins.css";
$theme_url = theme_url();
$root_url = root_url();
$base_url = base_url();
$images_url = $base_url."images/";

$search_text ="";
$search_text = @$searchtextx;

?>
<!DOCTYPE html>
<html lang="zxx">
<?php
pageheader();
?>
<?php // echo "csi:".cart_get_item_count();?>
<body>
    <div class="site-wrapper" id="top">
        <div class="site-header d-none d-lg-block" style="padding-top:10px">
            <?php topnav(); ?>
        </div>
        <?php // site mobile menu;
header_top_area("yes");
topnav_mobile();
        topnav_flex();
        breadCrumb("Shop");
        ?>
<main class="inner-page-sec-padding-bottom">
			<div class="container">
                <?php // books_toolbar_1(); ?>
            
                <?php books_toolbar_2(); ?>
           


				<div class="shop-product-wrap grid with-pagination row space-db--30 shop-border">
                    
                            <?php
                       //     $ci = get_instance();
                       $query = "SELECT * FROM product WHERE product_cost_ksh > 0 ORDER BY shop_ordering, product_title ASC ";
                       if(strlen($search_text) > 0) 
                       {
                                $query = "SELECT * FROM product WHERE product_cost_ksh > 0 AND (product_title LIKE '%$search_text%' OR product_description LIKE '%$search_text%' OR home_slider_tagline LIKE '%$search_text%' OR category LIKE '%$search_text%') ORDER BY category, product_title ";
                       }
                        
              //      echo "<h1>search text: ".$search_text."</h1>";

                //    echo "<h1>query: ".$query."</h1>";
                       

                            $res = $this->db->query($query);
                
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
                                    $product_type = $r["category"];
                                    $size = $r["size"];
                                        
                                    
                                            ?>
                
                
                     <div class="col-lg-4 col-sm-6">
						<div class="product-card">
							<div class="product-grid-content">
								<div class="product-header">
									<a href="#" class="author">
                                        <?php echo  $product_type; ?>
                                </a>
									<h3><a href="<?php echo $product_link; ?>"><?php echo $product_title; ?></a></h3>
								</div>
								<div class="product-card--body">
									<div class="card-image">
                                    <a href="<?php  echo $product_link; ?>"><img src="<?php echo $image_string; ?>" alt=""></a>
								<!--		<div class="hover-contents">
											<a href="product-details.html" class="hover-image">
												<img src="image/products/product-1.jpg" alt="">
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
												<a href="#" data-toggle="modal" data-target="#quickModal"
													class="single-btn">
													<i class="fas fa-eye"></i>
												</a>
											</div>
										</div> -->
									</div>
									<div class="price-block">
                                    <span class="price-discount"><?php echo $size; ?></span><br />
                				    <span class="price"><?php echo "KSH ".$product_cost; ?></span><br />
                       
                                </div>
								</div>
							</div>
                     </div>
                    </div>
                        <?php
                             }
                            }
                             ?>
                    
				</div>
				</div>
				<!-- Pagination Block -->
                <?php
            
                ?>
				<!-- Modal -->
			<?php  // book_slider_quick_view(); ?>
			</div>
        
        
        </main>



    <?php
            // relatedProductsArea();
            //    brandArea();
            footer();
            footerJSScripts();
            ?>
</body>
<script type="text/javascript">
function togglePanes(active, cats) {

//            var div1 = "#" + div1;
//          var div2 = "#" + div2;
//        var div3 = "#" + div3;

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
//                    alert(cat_obs);
//      $(div1).fadeIn(3000);
//    $(div2).fadeOut(2000)
//
//  $(div3).fadeOut(2000);


}
</script>
</html>
