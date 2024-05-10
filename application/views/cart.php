<?php
// $theme_url = $baseurl . "theme/";
$theme_url = theme_url();
$root_url = root_url();
$base_url = base_url();
$images_url = $base_url."images/";
// echo $theme_url . "css/plugins.css";
?>
<!DOCTYPE html>
<html lang="zxx">
<?php
pageheader();
$voucher_code ="";

	$shipping  = getOptions("SHIPPING");
		$shipping = (float)$shipping;
		$grand_total = 0;

?>

<body>
	<div class="site-wrapper" id="top">
		<div class="site-header d-none d-lg-block" style="padding-top:10px">
			<?php topnav(); ?>
		</div>
		<?php // site mobile menu;
		topnav_mobile();
		topnav_flex();
		breadCrumb("Cart");
		?>
		<!-- Cart Page Start -->
		<main class="cart-page-main-block inner-page-sec-padding-bottom">
			<div class="cart_area cart-area-padding  ">
				<div class="container">
					<div class="page-section-title">
						<h1>Shopping Cart</h1>
					</div>
					<div class="row">
						<div class="col-12">
							<form action="#" class="">
								<!-- Cart Table -->
							<?php /*	<p>Session Cookie: <?php echo $this->input->cookie('web_session', true); ?></p> */ ;?>
								<div class="cart-table table-responsive mb--40">
									<table class="table">
										<!-- Head Row -->
										<thead>
											<tr>
												<th class="pro-remove"></th>
												<th class="pro-thumbnail">Image</th>
												<th class="pro-title">Product</th>
												<th class="pro-price">Price</th>
												<th class="pro-quantity">Quantity</th>
												<th class="pro-subtotal">Total</th>
											</tr>
										</thead>
										<tbody>
											<!-- Product Row -->
											<?php
								//			echo $cart_session_id;
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

												
												
												  //  $product_id = $r["id"];
													$product_link = base_url() . 'index.php/product/' . $product_id;
													$image_string = $images_url.getAnyFieldValue($product_id, "product_image", "product");
													$voucher_code = $r["voucher_code"];
											

											?>

													<tr>
														<td class="pro-remove"><a href="javascript:void(0);" onclick="removeShoppingCartItem('<?php echo $root_url; ?>','<?php echo $r["id"]; ?>')"><i class="far fa-trash-alt"></i></a>
														</td>
														<td class="pro-thumbnail"><a href="#">

																<?php
																if (str_replace(" ", "", $image_string) == "") {
																?>
																	<img src="<?php echo $theme_url; ?>image/mm_logo_2.png" alt="">
																<?php
																} else {
																?>
																	<img src="<?php echo $image_string; ?>" width= "120px" alt="">

																<?php
																}
																?>

															</a></td>

														<td class="pro-title"><a href="#"><?php echo $title;  ?></a></td>
														<td class="pro-price"><span><?php echo $currency; ?> <?php echo $cost_per_unit; ?></span></td>
														<td class="pro-quantity"><?php echo $quantity; ?>
															<!-- 	<div class="pro-qty">
																<div class="count-input-block">
																	<input type="number" class="form-control text-center" value="1">
																</div>
															</div> -->
														</td>
														<td class="pro-subtotal"><span><?php echo $currency . " " . $total; ?></span></td>
													</tr>

												<?php

													$running_total = $running_total + (float)$total;
													
													
												}
											} else {
												?>
												<tr>
													<td class="pro-title" colspan="6">
														<H1>Shopping Cart Is Empty</H1>
													</td>
												</tr>
											<?php
											}
											if ($running_total <=0)
											{
												$shipping =0;
											}
											$grand_total = $shipping + $running_total; 
											?>
											<tr>
												<td colspan="4" class="pro-subtotal" align="right">

													<?php
													//		coupon_section();
													?>
												<td class="pro-subtotal"><strong>Sub Total</strong></td>							
												<td class="pro-subtotal"><strong><?php echo $currency . " " . number_format($running_total, 2, ".", ",");
													?></strong></td>
											</tr>
											<tr>
												<td colspan="4" class="pro-subtotal" align="right">

													<?php
													//		coupon_section();
													?>
												<td class="pro-subtotal"><strong>Shipping Fee</strong></td>							
												<td class="pro-subtotal"><strong><?php echo $currency . " " . number_format($shipping, 2, ".", ",");
													?></strong></td>
											</tr>
											<tr>
												<td colspan="4" class="pro-subtotal" align="right">

													<?php
													//		coupon_section();
													?>
												<td class="pro-subtotal"><strong>Grand Total </strong></td>							
												<td class="pro-subtotal"><strong><?php echo $currency . " " . number_format($grand_total, 2, ".", ",");
													?></strong></td>
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
		</tr>
		<tr>
		<td colspan="4" class="pro-subtotal" align="right">

		<td class="pro-subtotal"><strong><font color="#FF0000">Voucher Discount<br /><?php echo $voucher_code; ?></font></strong></td>							
		<td class="pro-subtotal"><strong><font color="#FF0000"><?php echo $currency . " -" . number_format($vd, 2, ".", ",");
					?></font></strong></td>
			</tr>
			<tr>
			<td colspan="4" class="pro-subtotal" align="right">

		<td class="pro-subtotal"><strong>Total With Discount</strong></td>							
		<td class="pro-subtotal"><strong><?php echo $currency . " " . number_format($grand_total, 2, ".", ",");
					?></strong></td>
			</tr>
									
	<?php

?>
<h4>Total With Discount<span><?php echo $currency." ".number_format($grand_total, 2, ".", ","); ?></span></h4>
<?php
			}
		}

														
											
												?>
											</tr>

										</tbody>
									</table>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php
			cart_summary($cart_session_id);
			?>
		</main>
		<!-- Cart Page End -->
	</div>
	<!--=================================
  Brands Slider
===================================== -->

	<!--=================================
    Footer Area
===================================== -->
	<?php
	footer();

	footerJSScripts();
	?>

</html>
