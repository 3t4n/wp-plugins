<?php 
    /*
    Plugin Name: Add Custom CSS and JS
    Plugin URI: https://wordpress.org/plugins/add-custom-css-and-js/
    Description: Now you can write different code of CSS and JS for admin panel and for front-end and you can also use different css and js if user is login.
    Author: Muhammad Sufian
    Version: 1.2.0
    Author URI: http://technologicx.com/
    */

if ( ! defined( 'ABSPATH' ) ) exit;
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
function accaj_admin_js_actions() {
    add_options_page("Custom CSS JS", "Custom JS CSS", 1, "custom_js_css", "accaj_custom_admin_js_css");
}
function accaj_custom_admin_js_css(){
	include('include/config_page_js.php');
	}
 
add_action('admin_menu', 'accaj_admin_js_actions');
//add admin css
function accaj_load_custom_style_for_admin() {
        wp_register_style( 'custom_wp_admin_css', content_url().'/uploads/add-custom-css-and-js/cs_for_admin.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'accaj_load_custom_style_for_admin' );
//add frontend css
function accaj_load_custom_style_for_front() {
        wp_register_style( 'custom_wp_front_css', content_url().'/uploads/add-custom-css-and-js/cs_for_front.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_front_css' );
}
add_action( 'wp_enqueue_scripts', 'accaj_load_custom_style_for_front' );
//add login css
function accaj_load_custom_style_for_login() {
	if(is_user_logged_in ()){
        wp_register_style( 'custom_wp_login_css', content_url().'/uploads/add-custom-css-and-js/cs_for_login.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_login_css' );
	}
}
add_action( 'wp_enqueue_scripts', 'accaj_load_custom_style_for_login' );
//add custom js for adminpanel
function accaj_add_custom_js_for_admin() {
    wp_enqueue_script( 'accaj_add_custom_js_admin', content_url().'/uploads/add-custom-css-and-js/js_for_admin.js' );
}
add_action( 'admin_enqueue_scripts', 'accaj_add_custom_js_for_admin');
//add custom js for frontend
function accaj_add_custom_js_for_front() {
    wp_enqueue_script( 'accaj_add_custom_js_front', content_url().'/uploads/add-custom-css-and-js/js_for_front.js' );
}
add_action( 'wp_head', 'accaj_add_custom_js_for_front');

//add custom js for login
function accaj_add_custom_js_for_login() {
	if(is_user_logged_in ()){
    wp_enqueue_script( 'accaj_add_custom_js_login', content_url().'/uploads/add-custom-css-and-js/js_for_login.js' );
	}
}
add_action( 'wp_head', 'accaj_add_custom_js_for_login');

if ( is_plugin_active( 'Add Custom CSS and JS/custom_css_js.php' ) ) {
	$upload_detail = wp_upload_dir();
	$upload_path = $upload_detail['basedir'];
	$upload_full_path = $upload_path.'/add-custom-css-and-js';
if (!file_exists($upload_full_path)) {
    mkdir($upload_full_path, 0777, true);
}
		//Create JS file for admin
if (!file_exists($upload_full_path."\js_for_admin.js")) {
 		$js_for_admin = fopen($upload_full_path."\js_for_admin.js", "w") or die("Please Change Your File Permissions!");
		 fwrite($js_for_admin, '//write JS file for admin');
		 fclose($js_for_admin);
}
		 //Create JS file for frontend
if (!file_exists($upload_full_path."\js_for_front.js")) {
		 $js_for_front = fopen($upload_full_path."\js_for_front.js", "w") or die("Please Change Your File Permissions!");
		 fwrite($js_for_front, '//write JS file for frontend');
		 fclose($js_for_front);
}
		 //Create JS file for login
if (!file_exists($upload_full_path."\js_for_login.js")) {
		 $js_for_login = fopen($upload_full_path."\js_for_login.js", "w") or die("Please Change Your File Permissions!");
		 fwrite($js_for_login, '//write JS file for login');
		 fclose($js_for_login);
}
		 //Create CSS file only for frontend
if (!file_exists($upload_full_path."\cs_for_front.css")) {
		 $cs_for_front = fopen($upload_full_path."\cs_for_front.css", "w") or die("Please Change Your File Permissions!");
		 fwrite($cs_for_front, '//write CSS file only for frontend');
		 fclose($cs_for_front);
}
		//Create CSS file only for adminpanel
if (!file_exists($upload_full_path."\cs_for_admin.css")) {
		 $cs_for_admin = fopen($upload_full_path."\cs_for_admin.css", "w") or die("Please Change Your File Permissions!");
		 fwrite($cs_for_admin, '//write CSS file only for adminpanel');
		 fclose($cs_for_admin);
}
		//Create CSS file only for loginuser
if (!file_exists($upload_full_path."\cs_for_login.css")) {
		 $cs_for_login = fopen($upload_full_path."\cs_for_login.css", "w") or die("Please Change Your File Permissions!");
		 fwrite($cs_for_login, '//write CSS file only for loginuser');
		 fclose($cs_for_login);
}
}
?>