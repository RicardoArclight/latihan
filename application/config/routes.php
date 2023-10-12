<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['welcome'] = 'welcome';
$route['about'] = 'welcome/about';
$route['contact'] = 'welcome/contact';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// route login
$route['login'] = 'login';

// route dashboard
$route['dashboard'] = 'dashboard';


