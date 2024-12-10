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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['sendbioEmail'] = 'admin/sendbioEmail';
$route['principal/get-states/(:num)'] = 'login/get_states/$1';

$route['admin/gurukul_invite/(:any)'] = 'admin/gurukul_invite/$1';

$route['thankyou'] = 'admin/thankyou_gurukul';
$route['admin/fetch_teachers/(:num)'] = 'admin/get_teacher/$1';
$route['/dashboards'] = 'admin/dashboard_data';
$route['example'] = 'example/index';

$route['principal/student'] = 'login/student';
$route['principal/student/insert'] = 'login/student/insert';
$route['principal/student/update/(:num)'] = 'login/student/update/$1';
$route['principal/student/delete/(:num)'] = 'login/student/delete/$1';

$route['principal/teacher'] = 'login/teacher';
$route['principal/dashboard'] = 'login/dashboard';
$route['principal/teacher/insert'] = 'login/teacher/insert';
$route['principal/teacher/update/(:num)'] = 'login/teacher/update/$1';
$route['principal/teacher/delete/(:num)'] = 'login/teacher/delete/$1';

$route['principal/manage_profile'] = 'login/manage_profile';
$route['principal/manage_profile/update'] = 'login/manage_profile/update';
$route['principal/manage_profile/change_password'] = 'login/manage_profile/change_password';

$route['reset_password/(:any)'] = 'auth/reset_password/$1';
$route['auth/send_reset_password_link'] = 'auth/send_reset_password_link';
$route['update-password'] = 'auth/update_password';


$route['admin/principal_dashboard/teacher'] = 'admin/teachers';
$route['admin/principal_dashboard/teacher/insert'] = 'admin/teachers/insert';
$route['admin/principal_dashboard/teacher/update/(:num)'] = 'admin/teachers/update/$1';
$route['admin/principal_dashboard/teacher/delete/(:num)'] = 'admin/teachers/delete/$1';
$route['admin/principal_dashboard/(:num)'] = 'admin/principal_dashboard/$1';

$route['admin/principal_dashboard/student'] = 'admin/students';
$route['admin/principal_dashboard/student/insert'] = 'admin/students/insert';
$route['admin/principal_dashboard/student/update/(:num)'] = 'admin/students/update/$1';
$route['admin/principal_dashboard/student/delete/(:num)'] = 'admin/students/delete/$1';

$route['admin/principal_dashboard/manage_profile'] = 'admin/manage_profiles';
$route['admin/principal_dashboard/manage_profile/update'] = 'admin/manage_profiles/update';
$route['admin/principal_dashboard/manage_profile/change_password'] = 'admin/manage_profiles/change_password';

