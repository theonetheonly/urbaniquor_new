<?php
// $theme_url = $baseurl . "theme/";
// echo $theme_url . "css/plugins.css";
$theme_url = theme_url();
$root_url = root_url();
$base_url = base_url();
$images_url = $base_url . "images/";

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
        header_top_area();
        topnav_mobile();
        topnav_flex();
        breadCrumb("About");
        ?>

        <main class="contact_area inner-page-sec-padding-bottom">
            <div class="container">
                <!-- <div class="row">
                    <div class="col-lg-12">
                        <div id="google-map"></div>
                    </div> 
                </div> -->
                <div class="row mt--60 ">
                    <div class="col-lg-12 col-md-12 col-12" align="center">
                        <div class="contact_adress">
                            <div class="ct_address">
                                <h2 class="ct_title">Contact us...</h2>
                                <div class="icon">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <h4>Email: </span> urbanmart@gmail.com</h4>
                                <div class="icon">
                                    <i class="fas fa-mobile-alt"></i>
                                </div>
                                <h4><span>Phone:</span><a href="tel:+254705119522">+254-705-11-45-22</h4>
                                <div class="icon">
                                    <i class="fa fa-map-pin"></i>
                                </div>
                                <h4><span>Address:</span>Shell Uhuru Highway Service Station, near Lusaka Road Roundabout </h4>
                                <div class="map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.7822646005443!2d36.82464007452912!3d-1.3057559986818457!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f110249c9ebef%3A0x6228cf4d04a314f!2sShell%20Uhuru%20Highway%20Service%20Station!5e0!3m2!1sen!2ske!4v1709647163763!5m2!1sen!2ske" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>

                            </div>
                            <div class="address_wrapper" align="center">
                                <!-- <div class="address">
                                    <div class="icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="contact-info-text">
                                        <p><span>Postal Address:</span> XXX - XXXXX.<br />Nairobi, Kenya</p>
                                    </div>
                                </div>
                                <div class="address">
                                    <div class="icon">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                    <div class="contact-info-text">
                                        <p><span>Email: </span> urbanmart@gmail.com </p>
                                    </div>
                                </div>
                                <div class="address">
                                    <div class="icon">
                                        <i class="fas fa-mobile-alt"></i>
                                    </div>
                                    <div class="contact-info-text">
                                        <p><span>Phone:</span>+254 701 547 432 </p>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <!--<div class="col-lg-7 col-md-7 col-12 mt--30 mt-md--0">
                        <div class="contact_form">
                            <h3 class="ct_title">Send Us a Message</h3>
                            <form id="contact-form" action="<?php echo $root_url . "/mail"; ?>" method="post" class="contact-form">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Your Name <span class="required">*</span></label>
                                            <input type="text" id="con_name" name="con_name" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Your Email <span class="required">*</span></label>
                                            <input type="email" id="con_email" name="con_email" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Your Phone*</label>
                                            <input type="text" id="con_phone" name="con_phone" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Your Message</label>
                                            <textarea id="con_message" name="con_message"
                                                class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-btn">
                                            <button type="submit" value="submit" id="submit" class="btn btn-black"
                                                name="submit">send</button>
                                        </div>
                                        <div class="form__output"></div>
                                    </div>
                                </div>
                            </form>
                            <div class="form-output">
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </main>
        <?php

        ?>


    </div>
    <?php
    // relatedProductsArea();
    //    brandArea();
    footer();
    footerJSScripts();
    ?>
</body>

</html>
