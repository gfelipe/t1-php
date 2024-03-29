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
// $route['default_controller'] = 'welcome';


// ADMIN ROUTE
$route['admin'] = 'admin';
$route['admin/products'] = 'admin/products';
$route['admin/products/create'] = 'admin/create_product';
$route['admin/products/save'] = 'admin/save_product';
$route['admin/products/edit/(:any)'] = 'admin/edit_product/$1';
$route['admin/products/update/(:any)'] = 'admin/update_product/$1';
$route['admin/products/remove/(:any)'] = 'admin/remove_product/$1';
$route['admin/products/add_image/(:any)'] = 'admin/add_image/$1';
$route['admin/products/remove_image/(:any)'] = 'admin/remove_image/$1';
$route['admin/users'] = 'admin/users';
$route['admin/users/disable/(:any)'] = 'admin/disable_user/$1';
$route['admin/users/enable/(:any)'] = 'admin/enable_user/$1';


// LOGIN ROUTE
$route['doLogin'] = 'login/doLogin';
$route['logout'] = 'login/logout';
$route['login'] = 'login';

// USER ROUTE
$route['register'] = 'user/register';
$route['user/save'] = 'user/save';
$route['user/edit'] = 'user/edit';
$route['user/orders/(:any)'] = 'order/view/$1';
$route['user/orders'] = 'user/orders';
$route['user/favorites'] = 'user/favorites';

// PRODUCT ROUTE
$route['products/(:any)/remove-favorite'] = 'product/remove_favorite/$1';
$route['products/(:any)/favorite'] = 'product/favorite/$1';
$route['products/(:any)'] = 'product/view/$1';
$route['products'] = 'product';

// ORDER ROUTE
$route['order/buy'] = '/order/buy';

// DEFAULT PAGE ROUTE
$route['(:any)'] = 'home/view';
$route['default_controller'] = 'home/view';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;