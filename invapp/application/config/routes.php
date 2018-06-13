<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Routes for items
$route['items/create']='items/create';
$route['items/update']='items/update';
$route['items/(:any)']='items/view/$1';
$route['items']='items/index';


//Routes for users
$route['users/login']='users/login';
$route['users/logout']='users/logout';
$route['users/create']='users/create';
$route['users/update']='users/update';
$route['users/(:any)']='users/view/$1';
$route['users']='users/index';


$route['default_controller'] = 'pages/view';
$route['(:any)']='pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
