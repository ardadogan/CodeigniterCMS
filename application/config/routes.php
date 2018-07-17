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

# Load Config
	require_once( BASEPATH .'../config.php');

	require_once( BASEPATH .'database/DB.php');
	$db =& DB();


	if(!function_exists('sef_url')){

		function sef_url($string)
		{
			$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#', '&');
			$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp', 've');
			$string = strtolower(str_replace($find, $replace, $string));
			$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
			$string = trim(preg_replace('/\s+/', ' ', $string));
			$string = str_replace(' ', '-', $string);
			return $string;
		}

	}


# Page translations urls
		$pageCategories = $db
					->join('pages_category_lang lng','lng.categoryId=c.categoryId')
					->get('pages_category c')
					->result();




		foreach ($pageCategories as $ckey => $cval) {
			$route['(:any)/page/'.sef_url($cval->name).'/(:any)/(:any)'] = 'pages/detail/$2/$3';
		}

# Product routing
	$route['(:any)/product/(:num)/(:any)'] = 'product/detail/$2/$3';

# Base Routes
	$route['default_controller'] = 'home';
	
	$route['404_override'] 	= '';
	$route['translate_uri_dashes'] = TRUE;


	$route['^(\w{2})/(.*)$'] 	= '$2';
	$route['^(\w{2})$'] 		= $route['default_controller'];


/**************************
	echo '<pre>';
		print_r($route);
	echo '</pre>';
	exit();
**************************/