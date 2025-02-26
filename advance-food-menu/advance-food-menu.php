<?php
/*
Plugin Name: Advance Food Menu
Plugin URI: http://plugins.dhakaambulance.com/
Description: The simplest solution to display beautiful restaurant menus in WordPress.
Author: Md. Abunaser Khan
Version: 1.0
Author URI: http://abunaserkhan.tk/https://fixmysite.com
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
Text Domain: advance-food-menu
Domain Path: /languages
*/

// Exit If Accessed Directly
if(!defined('ABSPATH')){
    exit;
}

// Global Options Variable
$srm_options = get_option('srm_settings');

require_once(plugin_dir_path(__FILE__) . '/includes/advance-food-menu-cpts.php');
require_once(plugin_dir_path(__FILE__) . '/includes/advance-food-menu-settings.php');
require_once(plugin_dir_path(__FILE__) . '/includes/advance-food-menu-meta.php');
require_once(plugin_dir_path(__FILE__) . '/includes/advance-food-menu-shortcode.php');




//Add Here Plugin FrontEnd Css And Js File
function advance_food_menu_scripts() {
	wp_enqueue_style('advance-food-menu-bootstrap', plugins_url('/assets/css/bootstrap.min.css', __FILE__));
	wp_enqueue_style('advance-food-menu-lightbox.min', plugins_url('/assets/css/lightbox.min.css', __FILE__));
	wp_enqueue_style('advance-food-menu-afm', plugins_url('/assets/css/afm.css', __FILE__));
	
	
	wp_enqueue_script('jquery');
	
	wp_enqueue_script( 'advance-food-menu-bootstrap',  plugins_url('/assets/js/bootstrap.min.js', __FILE__), array( 'jquery' ), '3.7.7', true );
	wp_enqueue_script( 'advance-food-menu-afm-lightbox',  plugins_url('/assets/js/lightbox-plus-jquery.min.js', __FILE__), array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'advance-food-menu-images-loded',  plugins_url('/assets/js/images-loded.min.js', __FILE__), array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'advance-food-menu-isotope.min',  plugins_url('/assets/js/isotope.min.js', __FILE__), array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'advance-food-menu-afm-scripts',  plugins_url('/assets/js/afm-scripts.js', __FILE__), array( 'jquery' ), '1.0', true );
}
add_action('wp_enqueue_scripts', 'advance_food_menu_scripts');

