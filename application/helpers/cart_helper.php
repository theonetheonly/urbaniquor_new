<?php


function updatecart_section()
{
?>
    <div class="update-block text-right">
        <input type="submit" class="btn btn-outlined" name="update_cart" value="Update cart">
        <input type="hidden" id="_wpnonce" name="_wpnonce" value="05741b501f"><input type="hidden" name="_wp_http_referer" value="/petmark/cart/">
    </div>

<?php
}


function coupon_section()
{
?>
    <div class="coupon-block">
        <div class="coupon-text">
            <label for="coupon_code">Coupon:</label>
            <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code">
        </div>
        <div class="coupon-btn">
            <input type="submit" class="btn btn-outlined" name="apply_coupon" value="Apply coupon">
        </div>
    </div>
<?php

}


function cart_summary($cart_session_id = "-1")
{
  //  $root_url = root_url();
    $ci = get_instance();
    $voucher_code = "";
    
    $shipping = getOptions("SHIPPING");
	// echo "<h1>Shippinng cost: ".$shipping."</h1>";

    $currency  = getAnyFieldValue($cart_session_id, "currency", "cart_session");
    $root_url = root_url();
    $theme_url = theme_url();
    $running_total = 0;
    $query = "SELECT * FROM shopping_cart_cache WHERE cart_session_id = '$cart_session_id' ORDER BY id ASC ";
    $result =  $ci->db->query($query);
    if ($result->num_rows() > 0) {
        foreach ($result->result_array() as $r) {
            $running_total = $running_total + (float)$r["total"];
            $voucher_code = $r["voucher_code"];
        }
    }
	if (is_numeric($shipping) == false)
	{
		$shipping = 0;
	}

	if($running_total <=0)
	{
		$shipping =0;
	}

    $grand_total = $shipping + $running_total;
?>
    <div class="cart-section-2">
        <div class="container">
            <div class="row">
                <!-- You may be interested in section -- >
                    <!-- Cart Summary -->
                <div class="col-lg-6 col-12 d-flex">
                </div>
                <div class="col-lg-6 col-12 d-flex">
                    <div class="cart-summary">
                        <div class="cart-summary-wrap">
                            <h4><span>Cart Summary</span></h4>
                            <p>Sub Total <span class="text-primary"><?php echo $currency . " " . number_format($running_total, 2, ".", ","); ?></span></p>
                            <p>Shipping Cost <span class="text-primary"><?php echo number_format($shipping, 2,".",",")?></span></p>
                            <h2>Grand Total <span class="text-primary"><?php echo $currency . " " . number_format($grand_total, 2, ".", ","); ?></span></h2>
                            <?php if (strlen($voucher_code) > 0)
														{
															if (validateVoucherX($voucher_code) =="VALID" )
															{
																$voucher_discount= getVoucherDiscount($voucher_code);
																$vd = (float)$voucher_discount * (float)$grand_total;
																$vd= $vd/100;
																$grand_total =(int)$grand_total -(int)$vd;
																?>				
							<h2 color="red"><font color="#FF0000">Voucher Discount<br /><?php echo $voucher_code; ?></font><span><font color="#ff0000"><?php echo $currency." -".number_format($vd, 2, ".", ","); ?></font></span></h2>
																<?php
	            												?>
														<h2>Total With Discount<span><?php echo $currency." ".number_format($grand_total, 2, ".", ","); ?></span></h2>
													<?php
																}
														}
													
													?>

    
                            </div>
                        <div class="cart-summary-button">
                            <a href="<?php echo $root_url."/final/checkout"?>" class="checkout-btn c-btn btn--primary">Checkout</a>
                            <button class="update-btn c-btn btn-outlined">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}

function cart_get_item_count()
{
    $ci = get_instance();
    $session_cookie = $ci->input->cookie('web_session', true);

    $query = "SELECT id, status FROM cart_session WHERE web_session LIKE '$session_cookie' AND status LIKE 'ACTIVE' ORDER BY id DESC LIMIT 1 ";
    $result =  $ci->db->query($query);
    // echo $result;
    $cart_session_id = "0";
    if ($result->num_rows() == 1) {
        //  add item to shopping cart
        foreach ($result->result_array() as $r) {
           $cart_session_id = $r["id"]; // , $product_id, $quantity, $currency);
        }
    }
     //   echo "<h1>csi:".$cart_session_id."</h1>";

    $total = 0;
    $query = "SELECT  COUNT(*) AS total FROM shopping_cart_cache WHERE cart_session_id LIKE '$cart_session_id' ";
    $result =  $ci->db->query($query);
    // echo $result;
    $cart_session_id = "0";
    if ($result->num_rows() > 0) {
        //  add item to shopping cart
        foreach ($result->result_array() as $r) {
           $total = $r["total"]; // , $product_id, $quantity, $currency);
        }
    }
    return $total;
}

function cart_get_total_cost()
{
    $ci = get_instance();
    $session_cookie = $ci->input->cookie('web_session', true);

    $query = "SELECT id, status FROM cart_session WHERE web_session LIKE '$session_cookie' AND status LIKE 'ACTIVE' ORDER BY id DESC LIMIT 1 ";
    $result =  $ci->db->query($query);
    // echo $result;
    $cart_session_id = "0";
    if ($result->num_rows() == 1) {
        //  add item to shopping cart
        foreach ($result->result_array() as $r) {
           $cart_session_id = $r["id"]; // , $product_id, $quantity, $currency);
        }
    }
     //   echo "<h1>csi:".$cart_session_id."</h1>";

    $total = 0;
    $query = "SELECT  total FROM shopping_cart_cache WHERE cart_session_id LIKE '$cart_session_id' ";
    $result =  $ci->db->query($query);
    // echo $result;
    $cart_session_id = "0";
    if ($result->num_rows() > 0) {
        //  add item to shopping cart
        foreach ($result->result_array() as $r) {
           $total = $r["total"]; // , $product_id, $quantity, $currency);
        }
    }
    return $total;
}


function show_cart_interested_in($show_id)
{
    // download and show
?>
    <div class="col-lg-6 col-12 mb--30 mb-lg--0">
        <!-- slide Block 5 / Normal Slider -->
        <div class="cart-block-title">
            <h2>YOU MAY BE INTERESTED IN…</h2>
        </div>
        <div class="product-slider sb-slick-slider" data-slick-setting='{
							          "autoplay": true,
							          "autoplaySpeed": 8000,
							          "slidesToShow": 2
									  }' data-slick-responsive='[
                                    {"breakpoint":992, "settings": {"slidesToShow": 2} },
                                    {"breakpoint":768, "settings": {"slidesToShow": 3} },
                                    {"breakpoint":575, "settings": {"slidesToShow": 2} },
                                    {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                    {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                    ]'>
            <div class="single-slide">
                <div class="product-card">
                    <div class="product-header">
                        <span class="author">
                            Lpple
                        </span>
                        <h3><a href="product-details.html">Revolutionize Your BOOK With These
                                Easy-peasy Tips</a></h3>
                    </div>
                    <div class="product-card--body">
                        <div class="card-image">
                            <img src="image/products/product-10.jpg" alt="">
                            <div class="hover-contents">
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
                        <span class="author">
                            Jpple
                        </span>
                        <h3><a href="product-details.html">Turn Your BOOK Into High Machine</a></h3>
                    </div>
                    <div class="product-card--body">
                        <div class="card-image">
                            <img src="image/products/product-2.jpg" alt="">
                            <div class="hover-contents">
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
                        <span class="author">
                            Wpple
                        </span>
                        <h3><a href="product-details.html">3 Ways Create Better BOOK With</a></h3>
                    </div>
                    <div class="product-card--body">
                        <div class="card-image">
                            <img src="image/products/product-3.jpg" alt="">
                            <div class="hover-contents">
                                <a href="product-details.html" class="hover-image">
                                    <img src="image/products/product-2.jpg" alt="">
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
                        <span class="author">
                            Epple
                        </span>
                        <h3><a href="product-details.html">What You Can Learn From Bill Gates</a>
                        </h3>
                    </div>
                    <div class="product-card--body">
                        <div class="card-image">
                            <img src="image/products/product-5.jpg" alt="">
                            <div class="hover-contents">
                                <a href="product-details.html" class="hover-image">
                                    <img src="image/products/product-4.jpg" alt="">
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
                        <span class="author">
                            Hpple
                        </span>
                        <h3><a href="product-details.html">Simple Things You To Save BOOK</a></h3>
                    </div>
                    <div class="product-card--body">
                        <div class="card-image">
                            <img src="image/products/product-6.jpg" alt="">
                            <div class="hover-contents">
                                <a href="product-details.html" class="hover-image">
                                    <img src="image/products/product-4.jpg" alt="">
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


<?php
}




?>
