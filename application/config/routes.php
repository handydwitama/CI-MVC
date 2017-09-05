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
$route['news/(:any)'] = 'News/view';
$route['news'] = 'News';
$route['default_controller'] = 'Pages/view';
$route['crud'] = 'Crud';
$route['crud/login'] = 'Crud/login';
$route['crud/registrasi'] = 'Crud/new_regist';
$route['crud/logout'] = 'Crud/logout';
$route['crud/buy'] = 'Crud/buy';
$route['crud/buy_proses'] = 'Crud/buy_proses';
$route['crud/lihat_user'] = 'Crud/lihat_user';
$route['crud/detail_user'] = 'Crud/detail_user';
$route['crud/edit_user'] = 'Crud/edit_user';
$route['crud/del_user'] = 'Crud/del_user';
$route['crud/lihat_barang'] = 'Crud/lihat_barang';
$route['crud/edit_barang'] = 'Crud/edit_barang';
$route['crud/add_barang'] = 'Crud/add_barang';
$route['crud/del_barang'] = 'Crud/del_barang';
$route['crud/laporan'] = 'Crud/laporan';
$route['crud/laporan/user'] = 'Crud/laporan_by_user';
$route['crud/laporan/detail_laporan1'] = 'Crud/all_laporan_user';
$route['crud/laporan/printpdf1.php'] = 'Crud/printpdf_1';
$route['crud/laporan/date'] = 'Crud/laporan_by_date';
$route['crud/laporan/detail_laporan2'] = 'Crud/all_laporan_date';
$route['crud/laporan/printpdf2.php'] = 'Crud/printpdf_2';

$route['bisaaja'] = 'Homepage';

?>
