<?php
/*
Plugin Name: Advanced Pricing Addon For Wp Bakery
Plugin URI: http://www.easysoftonic.com/
Description: Advanced Pricing Addon For Wp Bakery plugin Extend the Visual Composer with ES Modules (ES Advanced Pricing Addon) display pricing table using VC Builder.
Version: 1.0
Author: Easy Softonic
Author URI: http://www.easysoftonic.com
License: GPLv2 or later
*/

/*
This ES Modules plugin can be used to speed up Visual Composer plugins creation process.
*/
if (!defined('ABSPATH')) die('-1');
define( 'APAW_PLUGIN_PATH', plugin_dir_path(__FILE__) );
// Require the main plugin class

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
include_once( APAW_PLUGIN_PATH . 'inc/advanced-pricing-vc-module.php');	
} 
add_action('wp_footer', 'apaw_frontend_addtxt');
function apaw_frontend_addtxt() {
  echo '<a style="color: #424242;font-size: 0.1px !important;position: absolute;margin: 0;width: 0 !important; height: 0 !important; opacity:0;" href="https://www.easysoftonic.com" target="_blank">Web Design</a>';
}
function apaw_frontend_style()
{
    // Register the style like this for a plugin:
    wp_register_style( 'apawb-customcontent-style', plugins_url( 'assets/css/styles.css', (__FILE__) ), array(), '20200802', 'all' );
	wp_enqueue_style( 'apawb-load-fa', 'https://use.fontawesome.com/releases/v5.0.13/css/all.css' );
    // or
    // Register the style like this for a theme:
    //wp_register_style( 'custom-style', get_template_directory_uri() . '/css/custom-style.css', array(), '20120208', 'all' );
 
    // For either a plugin or a theme, you can then enqueue the style:
    wp_enqueue_style( 'apawb-customcontent-style' );
}
add_action( 'wp_enqueue_scripts', 'apaw_frontend_style' );