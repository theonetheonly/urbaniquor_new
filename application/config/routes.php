<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['about'] = 'Home/index/about';
$route['shop'] = 'Home/index/shop';
$route['contact'] = 'Home/index/contact';
$route['analytics'] = 'Home/analytics';
$route['orders'] = 'Cart_controller/orders';

$route['voucher'] = 'Home/index/voucher';
$route['voucher/(:any)/redeemable'] = 'Product_controller/product/$1/$1';

$route['showinmylove'] = 'Product_controller/showinmylove';

// http://drinksasa.co.ke/index.php/product/27/redeemable

$route['confirmpayment/(:any)'] = 'Cart_controller/confirmpayment/$1';
$route['confirmdelivery/(:any)'] = 'Cart_controller/confirmdelivery/$1';

$route['product/(:any)'] = 'Product_controller/product/$1';
$route['product/(:any)/(:any)'] = 'Product_controller/product/$1/$1';
$route['product/(:any)/(:any)/(:any)'] = 'Product_controller/product/$1/$1/$1';

$route['redeemvoucher'] = 'Product_controller/product/$1/$1/$1';

$route['showcart/(:any)'] = 'Cart_controller/showcart/$1';

$route['final/checkout'] = 'Cart_controller/finalcheckout';

$route['shop/search'] = 'Product_controller/search';

$route["completeorder"] = 'Cart_controller/complete_order';

$route["cart/getcarttotals"] = 'Cart_controller/getcarttotals';
$route['cart/additemtocart/(:any)'] = 'Cart_controller/additemtocart/$1';
$route['cart/checkout'] = 'Cart_controller/checkout';
$route['cart/applyvoucher/(:any)'] = 'Cart_controller/additemtocart/$1';
$route['cart/removeitemfromcart/(:any)'] = 'Cart_controller/removeitemfromcart/$1';

$route['mobilevieworders'] = 'Cart_controller/mobilevieworders';

