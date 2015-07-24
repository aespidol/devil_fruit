<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'customers';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['product'] = 'customers/product';
$route['home'] = 'customers/index';
$route['cart'] = 'customers/cart';
//admin dashboard
$route['admin'] = 'logregs/index';
$route['register'] = 'logregs/register';
$route['login'] = 'logregs/login';
$route['addproduct'] = 'dashboards/addproduct';
$route['editproduct'] = 'dashboards/editproduct';
$route['orders'] = 'dashboards/index';
$route['products'] = 'dashboards/get_products';
$route['deleterow/(:any)'] = 'dashboards/delete_row/$1';
$route['logoff'] = 'logregs/logoff';
