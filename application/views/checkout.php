<?php
// $theme_url = $baseurl . "theme/";
// echo $theme_url . "css/plugins.css";
$theme_url = theme_url();
$root_url = root_url();
$base_url = base_url();
$images_url = $base_url."images/";

$voucher_code ="";
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
        breadCrumb("Checkout");

		$shipping  = getOptions("SHIPPING");
		$shipping = (float)$shipping;
		
        ?>

		<main id="content" class="page-section inner-page-sec-padding-bottom space-db--20">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- Checkout Form s-->
						<div class="checkout-form">
							<div class="row row-40">
								<div class="col-12">
									<h1 class="quick-title">Checkout</h1>
									<!-- Slide Down Trigger  -->
							<?php /*		<div class="checkout-quick-box">
										<p><i class="far fa-sticky-note"></i>Returning customer? <a href="javascript:"
												class="slide-trigger" data-target="#quick-login">Click
												here to login</a></p>
									</div>
									<!-- Slide Down Blox ==> Login Box  -->
                            
                                    <div class="checkout-slidedown-box" id="quick-login">
										<form action="https://demo.hasthemes.com/pustok-preview/pustok/">
											<div class="quick-login-form">
												<p>If you have shopped with us before, please enter your details in the
													boxes below. If you are a new
													customer
													please
													proceed to the Billing & Shipping section.</p>
												<div class="form-group">
													<label for="quick-user">Username or email *</label>
													<input type="text" placeholder="" id="quick-user">
												</div>
												<div class="form-group">
													<label for="quick-pass">Password *</label>
													<input type="text" placeholder="" id="quick-pass">
												</div>
												<div class="form-group">
													<div class="d-flex align-items-center flex-wrap">
														<a href="#" class="btn btn-outlined   mr-3">Login</a>
														<div class="d-inline-flex align-items-center">
															<input type="checkbox" id="accept_terms" class="mb-0 mr-1">
															<label for="accept_terms" class="mb-0">I’ve read and accept
																the terms &amp; conditions</label>
														</div>
													</div>
													<p><a href="javascript:" class="pass-lost mt-3">Lost your
															password?</a></p>
												</div>
											</div>
										</form>
									</div>
									<!-- Slide Down Trigger  -->
									<div class="checkout-quick-box">
										<p><i class="far fa-sticky-note"></i>Have a coupon? <a href="javascript:"
												class="slide-trigger" data-target="#quick-cupon">
												Click here to enter your code</a></p>
									</div>
									<!-- Slide Down Blox ==> Cupon Box -->
									<div class="checkout-slidedown-box" id="quick-cupon">
										<form action="https://demo.hasthemes.com/pustok-preview/pustok/">
											<div class="checkout_coupon">
												<input type="text" class="mb-0" placeholder="Coupon Code">
												<a href="#" class="btn btn-outlined">Apply coupon</a>
											</div>
										</form>
									</div>
								</div>
								<div class="col-lg-7 mb--20">
									<!-- Billing Address -->
									<div id="billing-form" class="mb-40">
										<h4 class="checkout-title">Billing Address</h4>
										<div class="row">
											<div class="col-md-6 col-12 mb--20">
												<label>First Name*</label>
												<input type="text" placeholder="First Name">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Last Name*</label>
												<input type="text" placeholder="Last Name">
											</div>
											<div class="col-12 mb--20">
												<label>Company Name</label>
												<input type="text" placeholder="Company Name">
											</div>
											<div class="col-12 col-12 mb--20">
												<label>Country*</label>
												<select class="nice-select">
													<option>Bangladesh</option>
													<option>China</option>
													<option>country</option>
													<option>India</option>
													<option>Japan</option>
												</select>
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Email Address*</label>
												<input type="email" placeholder="Email Address">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Phone no*</label>
												<input type="text" placeholder="Phone number">
											</div>
											<div class="col-12 mb--20">
												<label>Address*</label>
												<input type="text" placeholder="Address line 1">
												<input type="text" placeholder="Address line 2">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Town/City*</label>
												<input type="text" placeholder="Town/City">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>State*</label>
												<input type="text" placeholder="State">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Zip Code*</label>
												<input type="text" placeholder="Zip Code">
											</div>
											<div class="col-12 mb--20 ">
												<div class="block-border check-bx-wrapper">
													<div class="check-box">
														<input type="checkbox" id="create_account">
														<label for="create_account">Create an Acount?</label>
													</div>
													<div class="check-box">
														<input type="checkbox" id="shiping_address" data-shipping>
														<label for="shiping_address">Ship to Different Address</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- Shipping Address -->
									<div id="shipping-form" class="mb--40">
										<h4 class="checkout-title">Shipping Address</h4>
										<div class="row">
											<div class="col-md-6 col-12 mb--20">
												<label>First Name*</label>
												<input type="text" placeholder="First Name">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Last Name*</label>
												<input type="text" placeholder="Last Name">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Email Address*</label>
												<input type="email" placeholder="Email Address">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Phone no*</label>
												<input type="text" placeholder="Phone number">
											</div>
											<div class="col-12 mb--20">
												<label>Company Name</label>
												<input type="text" placeholder="Company Name">
											</div>
											<div class="col-12 mb--20">
												<label>Address*</label>
												<input type="text" placeholder="Address line 1">
												<input type="text" placeholder="Address line 2">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Country*</label>
												<select class="nice-select">
													<option>Bangladesh</option>
													<option>China</option>
													<option>country</option>
													<option>India</option>
													<option>Japan</option>
												</select>
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Town/City*</label>
												<input type="text" placeholder="Town/City">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>State*</label>
												<input type="text" placeholder="State">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Zip Code*</label>
												<input type="text" placeholder="Zip Code">
											</div>
										</div>
									</div>
									<div class="order-note-block mt--30">
										<label for="order-note">Order notes</label>
										<textarea id="order-note" cols="30" rows="10" class="order-note"
											placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
									</div>
                                </div>  
                                
                                */ ?>
                                <?php 
                                    $sub_total =0;
									$grand_total = 0;
									$items =array();
                                ?>
                                <div class="col-lg-12">
									<div class="row">
										<!-- Cart Total -->
										<div class="col-12">
											<div class="checkout-cart-total">
												<h2 class="checkout-title">YOUR ORDER</h2>
                                                <h4>Product <span>Total</span></h4>
                                                <ul>
                                                <?php 
                                                											$currency  = getAnyFieldValue($cart_session_id, "currency", "cart_session");
                                                                                            $running_total = 0;
                                                                                            $query = "SELECT * FROM shopping_cart_cache WHERE cart_session_id = '$cart_session_id' ORDER BY id ASC ";
                                                                                            $result =  $this->db->query($query);
                                                                                            if ($result->num_rows() > 0) {
                                                
                                                                                                foreach ($result->result_array() as $r) {
                                                
                                                                                                    $product_id = $r["product_id"];		
                                                                                                    $title = getAnyFieldValue($product_id, "product_title", "product");
                                                                                                    //			$currency = $r["currency"];
                                                                                                    $cost_per_unit = $r["cost_per_unit"];
                                                                                                    $quantity = $r["quantity"];
                                                                                                    $total = $r["total"];
                                                                                                //	$product_image = getAnyFieldValue($r["product_id"], "product_image", "product");
                                                
																									$items[] = $title."(qty: ".$quantity.")";	
                                                                                                
                                                                                                  //  $product_id = $r["id"];
                                                                                                    $product_link = base_url() . 'index.php/product/' . $product_id;
																									$image_string = $images_url.getAnyFieldValue($product_id, "product_image", "product");
																									
																									$voucher_code =$r["voucher_code"];

                                                                                                    $sub_total = $sub_total+ (double)$total;
                                                ?>

													<li><span class="left"><?php echo $title; ?> X <?php echo $quantity; ?></span> <span
															class="right"><?php echo number_format($total, 2, ".", ",");  ?></span></li>
                                                <?php
                                                                                                } 
                                                                                            }
                                                                                            else
                                                                                            {
                                                                                                ?>
                                                                                             <h3>No items selected</h3>
                                                                                             <p>Please go back to the <a href="<?php echo $root_url."/shop"?>">Shop</a> page and select an item.</p>  
                                                                                                <?php
                                                                                            } 
                                                                                            
                                                $grand_total = $sub_total+ $shipping;                                                                            
												if($sub_total <=0)
												{
													$shipping =0; 
												}


												echo form_open("completeorder");
												
											?>
												
													</ul>

													                   
                                                <p>Sub Total <span><?php echo $currency." ".number_format($sub_total, 2,".", ",")?></span></p>
											
											
												<p>Shipping Fee <span><?php echo $currency." ".number_format($shipping, 2, ".", ","); ?></span></p>
												<h4>Grand Total <span><?php echo $currency." ".number_format($grand_total, 2, ".", ","); ?></span></h4>
													<?php
														if (strlen($voucher_code) > 0)
														{
															if (validateVoucherX($voucher_code) =="VALID" )
															{

																$voucher_discount= getVoucherDiscount($voucher_code);
																$vd = (float)$voucher_discount * (float)$grand_total;
																$vd= $vd/100;
																$grand_total =(int)$grand_total -(int)$vd;
																
																?>				
							<h4 color="red">Voucher Discount<br /><?php echo $voucher_code; ?><span><font color="#ff0000"><?php echo $currency." -".number_format($vd, 2, ".", ","); ?></font></span></h4>
																<?php

													?>
														<h4>Total With Discount<span><?php echo $currency." ".number_format($grand_total, 2, ".", ","); ?></span></h4>
													<?php
																	}
																}
													
													?>
													
													<input type="hidden" id="cart_session_id" name="cart_session_id" value ="<?php echo $cart_session_id; ?>" />
                                        			<input type="hidden" id="items" name="items" value ="<?php echo implode("-",$items); ?>" />
                                                    <input type="hidden" id="grand_total" name="grand_total" value="<?php echo $grand_total; ?>" />
                                                    <input type="hidden" id="shipping" name="shipping" value="<?php echo $shipping; ?>" />
                                                    <input type="hidden" id="sub_total" name="sub_total" value="<?php echo $sub_total; ?>" />
						                            <input type="hidden" id="voucher_code" name="voucher_code" value="<?php echo $voucher_code; ?>" />
						                            
												<div class="term-block">
													<input type="checkbox" id="accept_terms2" name="accept_terms2">
													<label for="accept_terms2">I’ve read and accept the terms &	conditions</label>
                                                </div>
											    <div class="col-sm-12" align="center" style="padding-top: 30px">
												<h1>Your bill is <?php echo $currency." ".$grand_total; ?></h1>
																	
														<?php
														if((int)$grand_total > 0)
																				{?>
														<h3>Payment Details</h3>
                                                        <p>Please pay through the MPESA Buy Goods Till Number shown below</p>
														<?php 
																
																				
																									?>
														<img src="<?php echo base_url();?>/theme/image/lipanampesa.png" width="240px" /></p>
                                                                                        </div>
                                                                                        <div class="col-sm-12" align="center"  style="padding-top: 30px">
	                                                                                    <p>After Making the payment enter your <br />Name and MPESA phone Number using the format <br /><strong><h3>07XXXXXXXX</h3></strong> below and your delivery adddress<br />then click on the complete order button</p>                                         
                                                                                        </div>
																				<?php
																				}
																				else{
																				?>
																				<?php
																				}

																				?>

																				        <div class="col-sm-12" align="center"  style="padding-top: 15px">
                                                                                        <h3> Your Name</h3><br /> 
                                                                        <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Your Name" style="background-color: #FFFFFF; width:300px" />
                                          		                                        </div> 
                                                                                          <div class="col-sm-12" align="center"  style="padding-top: 15px">
																			<h3> Your <?php if ((int)$grand_total > 0){ echo "MPESA"; } ?> phone number</h3><br /> 
	                                                                                    <input type="number" class="form-control" id="mpesa_number" name="mpesa_number" placeholder="07xxxxxxxx" style="background-color: #FFFFFF; width:300px" />
                                                  									</div>
																					  <div class="col-sm-12" align="center"  style="padding-top: 15px">
                                                                            		  <h3> Your Delivery Address</h3><br /> 
	                                                                                    <input type="text" class="form-control" id="delivery_address" name="delivery_address" placeholder="Estate/Building and House/Door Number" style="background-color: #FFFFFF; width:300px" />
                                                  </div>
                                                 
												  <div class="col-sm-12" align="center"  style="padding-top: 15px">
                                         		<button class="place-order w-30" type="submit" align="center">Complete order</button>
                                                                                       <?php
																					echo 	form_close();  
																					   ?>
																					   
																					    </div>

                                            </div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>


        <?php
            // relatedProductsArea();
            //    brandArea();
            footer();
            footerJSScripts();
            ?>
</body>

</html>
