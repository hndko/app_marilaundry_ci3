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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

# Routes for Auth
$route['auth'] = 'auth/login';

# Routes for Backend
$route['dashboard'] = 'dashboard/index';

# Routes for Services
$route['services'] = 'services/index';
$route['services/create'] = 'services/create';
$route['services/store'] = 'services/store';
$route['services/edit/(:num)'] = 'services/edit/$1';
$route['services/update/(:num)'] = 'services/update/$1';
$route['services/delete/(:num)'] = 'services/delete/$1';
$route['services/show/(:num)'] = 'services/show/$1';

# Routes for Customers
$route['customers'] = 'customers/index';
$route['customers/create'] = 'customers/create';
$route['customers/store'] = 'customers/store';
$route['customers/edit/(:num)'] = 'customers/edit/$1';
$route['customers/update/(:num)'] = 'customers/update/$1';
$route['customers/delete/(:num)'] = 'customers/delete/$1';
$route['customers/show/(:num)'] = 'customers/show/$1';

# Routes for Transactions
$route['orders'] = 'orders/index';
$route['orders/create'] = 'orders/create';
$route['orders/store'] = 'orders/store';
$route['orders/show/(:num)'] = 'orders/show/$1';
$route['orders/update_status/(:num)'] = 'orders/update_status/$1';
$route['orders/pay/(:num)'] = 'orders/pay/$1';

# Routes for Settings (Future)
// $route['settings'] = 'settings/index';
// Expenses Routes
$route['expenses'] = 'expenses/index';
$route['expenses/create'] = 'expenses/create';
$route['expenses/store'] = 'expenses/store';
$route['expenses/edit/(:num)'] = 'expenses/edit/$1';
$route['expenses/update/(:num)'] = 'expenses/update/$1';
$route['expenses/delete/(:num)'] = 'expenses/delete/$1';

// Reports Routes
$route['reports'] = 'reports/index';
$route['reports/expenses'] = 'reports/expenses';
$route['reports/expenses_pdf'] = 'reports/expenses_pdf';
