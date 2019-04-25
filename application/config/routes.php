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
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* APIS */

$route['api/login'] = 'api/login';

$route['api/getCity'] = 'api/common/getCity';

$route['api/getRoomType'] = 'api/common/getRoomType';

$route['api/getDocument'] = 'api/common/getDocuments';

// $route['api/getBooking'] = 'api/';
// $route['api/setBooking'] = 'api/';
// $route['api/deleteBooking'] = 'api/';
// $route['api/updateBooking'] = 'api/';

$route['api/getCustomer'] = 'api/customer/getCustomer';
$route['api/setCustomer'] = 'api/customer/setCustomer';
$route['api/deleteCustomer'] = 'api/customer/deleteCustomer';
$route['api/updateCustomer'] = 'api/customer/updateCustomer';

$route['api/getRoom'] = 'api/room/getRoom';
$route['api/setRoom'] = 'api/room/setRoom';
$route['api/deleteRoom'] = 'api/room/deleteRoom';
$route['api/updateRoom'] = 'api/room/updateRoom';

$route['api/getUser'] = 'api/user/getUser';
$route['api/setUser'] = 'api/user/setUser';
$route['api/deleteUser'] = 'api/user/deleteUser';
$route['api/updateUser'] = 'api/user/updateUser';

$route['api/getHotel'] = 'api/hotel/getHotel';
$route['api/setHotel'] = 'api/hotel/setHotel';
$route['api/deleteHotel'] = 'api/hotel/deleteHotel';
$route['api/updateHotel'] = 'api/hotel/updateHotel';

$route['api/getLocation'] = 'api/location/getLocation';
$route['api/setLocation'] = 'api/location/setLocation';
$route['api/deleteLocation'] = 'api/location/deleteLocation';
$route['api/updateLocation'] = 'api/location/updateLocation';


/* FRONT-END */
$route['admin/login'] = 'login';

$route['admin/home'] = 'booking';

$route['admin/customers'] = 'customer';

$route['admin/room'] = 'room';
$route['admin/room/add'] = 'room/addRoom';

$route['admin/user'] = 'user';
$route['admin/user/add'] = 'user/addUser';

$route['admin/hotel'] = 'hotel';
$route['admin/hotel/add'] = 'hotel/addHotel';


$route['admin/location'] = 'location';
$route['admin/location/add'] = 'location/addLocation';







