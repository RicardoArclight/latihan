<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['welcome'] = 'welcome';
$route['about'] = 'welcome/about';
$route['contact'] = 'welcome/contact';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['pengaduan/uploadGambar'] = 'pengaduan/uploadGambar';
$route['pengaduan/deleteGambar'] = 'pengaduan/deleteGambar';

// route login
$route['login'] = 'login';

// route dashboard
$route['admin'] = 'dashboard';

// route caridata
$route['search'] = 'welcome/search';
