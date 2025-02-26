<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	$dir = dirname( plugin_basename( AWTB_PLUGIN_FILE ) ) . DIRECTORY_SEPARATOR . 'languages';
	load_plugin_textdomain('AWTB', false, $dir);
	global $wpdb;
	//************* End *************
	add_action( 'admin_init', 'AWTB_plugin_settings' );
	function AWTB_plugin_settings() {
		register_setting( 'AWTB', 'message_box' );
	}
//*************
	add_action('admin_menu', 'AWTB_plugin_menu');
	function AWTB_plugin_menu() {
	add_menu_page('AWTB', 'AWTB', 'administrator', 'AWTB-settings', 'AWTB_forms_settings', 'dashicons-admin-links');
	//add_submenu_page( 'contact-records-plugin-settings', '', '', 'manage_options', 'full_details', 'sub_menu_listings_fulldetails');
	}
	
function AWTB_enqueue_assets() {
	
	global $AWTB_footer_scripts;
	wp_enqueue_style('my-styles', plugins_url('assets/css/style.css', AWTB_PLUGIN_FILE), array(), '');
	echo $AWTB_footer_scripts; 
	}
add_action('wp_footer', 'AWTB_enqueue_assets');
/********************* Admin Includes*******************/
function AWTB_load_custom_wp_admin_style() {
/********************* Admin Style*******************/ 
	wp_register_style( 'awtb_custom_wp_admin_css', plugins_url('/admin/css/awtb-admin-style.css', __FILE__), false, '1.0.0' );
	wp_enqueue_style( 'awtb_custom_wp_admin_css' );
	
  /********************* Admin Script*******************/ 
   wp_enqueue_script( 'awtb_colorpicker', plugins_url('/admin/js/colorpicker.min.js', __FILE__), array(), false, true );
  wp_register_script( 'awtb_colorpicker', '' ); 
  wp_enqueue_script( 'awtb_adminjs', plugins_url('/admin/js/awtb-adminjs.js', __FILE__), array(), false, true );
  wp_register_script( 'awtb_adminjs', '' );
  
	
	 
	 
	 
}
add_action( 'admin_enqueue_scripts', 'AWTB_load_custom_wp_admin_style' );
/////////
if(!@include_once('admin/settings-page.php')) {
	include_once('admin/settings-page.php');
	}  