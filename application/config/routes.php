<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

$route['place_order/laundry']               = "orders/laundry";
$route['place_order/handy_man']             = "orders/handy_man";
$route['place_order/moving']               	= "orders/moving";
$route['place_order/cooking']               = "orders/cooking";
$route['place_order/events']               	= "orders/events";
$route['place_order/cleaning']              = "orders/cleaning";
$route['place_order/delivery']              = "orders/delivery";
$route['place_order/beauty']               	= "orders/beauty";
$route['place_order/auto_repairer']         = "orders/auto_repairer";
$route['place_order/driver']               	= "orders/driver";
$route['place_order/diesel']               	= "orders/diesel";
$route['place_order/custom']               	= "orders/custom_tasks";

# angular backend service calls
$route['backend/customers/get_payments']    = "backend/get_payments";
$route['backend/customers/get_orders']      = "backend/get_orders";
$route['backend/customers/get_profile']     = "backend/get_profile";
$route['backend/customers/update_proile']   = "backend/update_proile";

# send post data to this url
$route['flutter/send_card']					= "orders/angular_send_card";


# this route get the price config saved by the admin
$route["prices/fetch/configuration/(:any)"]	= "orders/fetch_configuration/$1";

$route['get/prices']               			= "orders/get_price";

$route['place_order/get_quote']				= "orders/get_quote";

$route['auth/login']						= 'user/login';
$route['auth/register']						= 'user/register';
$route['auth/signout']						= 'backend/signout';

$route['order/(:num)']						= 'user/order/$1';
$route['verification/(:any)']				= 'user/verifyCustomer/$1';
$route['silent_auth/(:num)/(:any)']			= 'user/silentAuth/$1/$2';
$route['verify_customer/(:num)/(:any)']		= 'user/verifyCustomer/$1/$2';

$route['payment/enter_details/(:any)']		= 'backend/make_payment/$1';
$route['payment/transaction/(:any)']		= 'backend/payment_complete/$1';


$route['customer/registration']				= 'backend/signUp';

$route['backend/']							= 'backend/index';
$route['backend/drop_request/(:num)']		= 'backend/dropOrder/$1';

$route['admin/authenticate']				= 'admin/login';
$route['admin/test']						= 'admin/getDb';

$route['default_controller'] 				= 'user/';
$route['404_override'] 						= 'errors/page_missing';
$route['translate_uri_dashes'] 				= FALSE;
