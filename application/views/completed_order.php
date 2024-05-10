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
        breadCrumb("Checkout");

        $shipping = 200;

        ?>

		<main id="content" class="page-section inner-page-sec-padding-bottom space-db--20">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- Checkout Form s-->
						<div class="checkout-form">
							<div class="row row-40">
								<div class="col-12">
									<h1 class="quick-title">Done!</h1>
							    <?php 
                                    $sub_total =0;
                                    $grand_total = 0;
                                ?>
                                <div class="col-lg-12">
									<div class="row">
										<!-- Cart Total -->
										<div class="col-12">
											<div class="checkout-cart-total" align="center">
												<?php

												$disc_order_state="NONE";
												?>

                    			   <?php  if($disc_order_state=="NONE")
								   		{
											   ?>
											<h2 class="checkout-title">THANK YOU. YOUR ORDER WILL BE ON THE WAY SOON!</h2>
						<p>Thank you <?php echo ucwords(strtolower($customer_name)); ?> Your order with ID (<?php echo $order_id; ?>) is being processed and will be on its way soon.<br />
                                             Once your payment is confirmed we will dispatch it for delivery<br />
                                             We will notify you as soon as it arrives at your delivery address<br />
                                             Orders are usually delivered within 60 minutes<br />
                                             If you have any questions or need help please call <h4>+254-705-11-45-22</h4><p>
										   <?php 
											}
											else if ($disc_order_state =="SUCCESS")
											{
												?>	
										<h2 class="checkout-title">CONGRATS! YOUR ORDER WITH A DISCOUNT VOUCHER WILL BE ON THE WAY SOON!</h2>
												<p>Congrats <?php echo ucwords(strtolower($customer_name)); ?> Your order with ID (<?php echo $order_id; ?>) and discount voucher <i><?php echo $disc_order_voucher; ?></i> is being processed and will be on its way soon.
                                                Keep checking for more discount opportunities<br />
                                                We will notify you as soon as it arrives at your delivery address<br />
                                                Orders are usually delivered within 60 minutes<br />
                                                If you have any questions or need help please call <h4>+254-705-11-45-22</h4></p>

 												 <?php
											}	
											else{		
												?>
						<h2 class="checkout-title">SORRY WE COULD NOT PROCESS THIS ORDER!</h2>
					
						<p>Sorry <?php echo ucwords(strtolower($customer_name)); ?> Your order with  discount voucher <i><?php echo $disc_order_voucher; ?></i> could not be processed.<br />
                        The discount voucher may have already been used or is innacurate. Please try again or contact us</p>
						If you have any questions or need help please call <h4>+254-705-11-45-22</h4></p>
                                             


												<?php
												}
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
		</main>


        <?php
            // relatedProductsArea();
            //    brandArea();
            footer();
            footerJSScripts();
            ?>
</body>

</html>
