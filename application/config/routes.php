<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'dashboard';
$route['login'] = 'dashboard/login';




$route['ajax_login'] = 'dashboard/ajaxLogin';
$route['ajax_form_upload_color_pic'] = 'product/ajax_form_upload_color_pic';
$route['ajax_form_set_color_and_size_unit'] = 'product/ajax_form_set_color_and_size_unit';


/*
shop 商家管理
*/

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
