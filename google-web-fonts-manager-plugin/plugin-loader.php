<?php
/*
Plugin Name: Google Web Fonts Manager
Plugin URI: http://mywebsiteadvisor.com/tools/wordpress-plugins/google-web-fonts-manager-plugin-for-wordpress/
Description: Easily Add Google Web Fonts to your WordPress Website.
Version: 1.5.4
Author: MyWebsiteAdvisor
Author URI: http://MyWebsiteAdvisor.com
*/

register_activation_hook(__FILE__, 'google_web_fonts_manager_activate');


function google_web_fonts_manager_activate() {

	// display error message to users
	if ($_GET['action'] == 'error_scrape') {                                                                                                   
		die("Sorry, this plugin requires PHP 5.2 or higher. Please Deactivate Plugin.");                                 
	}


	if ( version_compare( phpversion(), '5.2', '<' ) ) {
		trigger_error('', E_USER_ERROR);
	}
	
	if(!function_exists("json_decode")){
		die("Sorry, this plugin requires PHP json_decode() function. Please Deactivate Plugin.");
	}
	
}

// require  Plugin if PHP 5 installed
if ( version_compare( phpversion(), '5.2', '>=') ) {
	define('GFM_LOADER', __FILE__);

	require_once(dirname(__FILE__) . '/google-web-fonts-manager.php');
	require_once(dirname(__FILE__) . '/plugin-admin.php');

	$font_manager = new Google_Web_Fonts_Manager_Admin();
	
}
?>