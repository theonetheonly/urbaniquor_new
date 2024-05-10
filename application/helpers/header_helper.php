<?php
function breadCrumb($current_page = "", $current_link ="")
{
    $base_url = base_url();
?>
    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo $base_url; ?>">Home</a></li>
                        <li class="breadcrumb-item active"><a href="<?php echo $current_link; ?>"><?php echo $current_page; ?></a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
<?php
}
function pageheader()
{
    $theme_url = theme_url();
?>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo getOptions("WEBSITE_TITLE"); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Use Minified Plugins Version For Fast Page Load -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $theme_url; ?>css/plugins.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $theme_url; ?>css/main.css" />
        <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
        <script type="text/javascript" src="<?php echo base_url(); ?>js/common.js?n=<?php echo rand(10000, 2000000); ?>"> </script>

        <script type="text/javascript">

        
    </script>
    </head>
<?php
}

function cart_widget()
{
    $theme_url = theme_url();
    $root_url = root_url();
    $base_url = base_url();
    $images_url = $base_url."images/";


    ?>
    <div class="cart-block">
                                <div class="cart-total">
                                    <span class="text-number">
                                    <span id="cart_count"><?php echo cart_get_item_count(); ?></span>
                                    </span>
                                    <span class="text-item">
                                        Shopping Cart
                                    </span>
                                    <span class="price">
                                        <span id="cart_total"><?php echo "KSH ".cart_get_total_cost(); ?></span>
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
                                </div>
                              <div class="cart-dropdown-block">
                                  
                                
                                    
                                    <!-- <div class=" single-cart-block ">
                                        <div class="cart-product">
                                            <a href="product-details.html" class="image">
                                                <img src="<?php echo $theme_url; ?>image/products/cart-product-1.jpg" alt="">
                                            </a>
                                            <div class="content">
                                                <h3 class="title"><a href="product-details.html">Kodak PIXPRO
                                                        Astro Zoom AZ421 16 MP</a>
                                                </h3>
                                                <p class="price"><span class="qty">1 ×</span> £87.34</p>
                                                <button class="cross-btn"><i class="fas fa-times"></i></button>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class=" single-cart-block ">
                                        <div class="btn-block">
                                            <a href="javascript:void(0);" onclick="checkToCart('<?php echo $root_url; ?>')" class="btn">View Cart <i class="fas fa-chevron-right"></i></a>
                       <!--                     <a href="checkout.html" class="btn btn--primary">Check Out <i class="fas fa-chevron-right"></i></a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
}
function search_widget()
{
    $theme_url = theme_url();
    $root_url = root_url();
    $base_url = base_url();
    $images_url = $base_url."images/";

?>
        
 <div class="col-lg-5">

                    <div class="header-search-block">
                  <?php echo form_open("shop/search")?>
                  
                    <input id="searchtextx" name="searchtextx" type="text" placeholder="search drinks...">
                        <button type="submit">Search</button>
                        <?php
                        form_close();
                        ?>

                    </div>
                </div>
<?php
}

function login_widget()
{
    ?>
        <div class="login-block">
                                <a href="login-register.html" class="font-weight-bold">Login</a> <br>
                                <span>or</span><a href="login-register.html">Register</a>
                            </div>
    <?php
}

function header_top_area($show_search="yes", $show_cart="yes", $show_login="yes")
{
    $theme_url = theme_url();
    $root_url = root_url();
    $base_url = base_url();
    $images_url = $base_url."images/";

?>
    <div class="header-bottom pb--10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <?php // nav_category(); 
                    ?>
                </div>
                <?php
                        if($show_search=="yes")
                            {
                                   search_widget();
                            }
                ?>
               
                <div class="col-lg-4">
                    <div class="main-navigation flex-lg-right">
                        <div class="cart-widget">
                            <?php 
                                    if ($show_login =="yes")      
                                    {
                              
                         //                   login_widget();
                                    }   
                            ?>
                           <?php
                                if ($show_cart =="yes")
                                {
                                cart_widget();
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}

?>
