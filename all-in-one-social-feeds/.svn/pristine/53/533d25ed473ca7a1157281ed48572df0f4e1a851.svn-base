<?php
/*
Plugin Name: All in one Social Feeds
Plugin URI: http://www.netattingo.com/
Description: This plugin helps to display latest feeds from facebook, twitter,instagram,pinterest and youtube with tabs using a widget.
Author: NetAttingo Technologies
Version: 1.0.0
Author URI: http://www.netattingo.com/
*/

define('WP_DEBUG',true);
define('AIOSF_DIR', plugin_dir_path(__FILE__));
define('AIOSF_URL', plugin_dir_url(__FILE__));
define('AIOSF_PAGE_DIR', plugin_dir_path(__FILE__).'pages/');
define('AIOSF_INCLUDE_DIR', plugin_dir_path(__FILE__).'includes/');
define('AIOSF_INCLUDE_URL', plugin_dir_url(__FILE__).'includes/'); 

require_once plugin_dir_path(__FILE__)."/includes/widget.php";

//Include menu and assign page
function aiosf_plugin_menu() {
    $icon = AIOSF_URL. 'includes/icon.png';
	add_menu_page("All in one Social Feeds", "All in one Social Feeds", "administrator", "aiosf-page-setting", "aiosf_plugin_pages", $icon ,30);
	add_submenu_page("aiosf-page-setting", "About Us", "About Us", "administrator", "about-us", "aiosf_plugin_pages");
}
add_action("admin_menu", "aiosf_plugin_menu");

add_action( 'widgets_init', 'allsocialfeed_load_widget' );

function aiosf_plugin_pages() {

   $itm = AIOSF_PAGE_DIR.$_GET["page"].'.php';
   include($itm);
}

//Include css and jquery
function aiosf_js_css_add_init() {
    wp_enqueue_style("aiosf_css_and_js", plugins_url('includes/front-style.css',__FILE__ )); 
	wp_enqueue_script('aiosf_css_and_js');
	
	wp_register_script("aiosf_css_and_js_sc", plugins_url('includes/js/scroller/jquery.mCustomScrollbar.concat.min.js' ,__FILE__ ), array( 'jquery' ) , false, true); 
	wp_enqueue_style("aiosf_css_and_js_sc", plugins_url('includes/js/scroller/jquery.mCustomScrollbar.css' ,__FILE__ ));  
	wp_enqueue_script('aiosf_css_and_js_sc');
	
	wp_register_script("aiosf_css_and_js_in", plugins_url('includes/js/init.js',__FILE__ ), array( 'jquery' ), false, true);  
	wp_enqueue_script('aiosf_css_and_js_in'); 
	
	wp_register_script("aiosf_css_and_js_pop", plugins_url('includes/js/popup2.2.js',__FILE__ ), array( 'jquery' ), false, true);  
	wp_enqueue_script('aiosf_css_and_js_pop'); 	
}
add_action( 'wp_enqueue_scripts', 'aiosf_js_css_add_init' );


//add admin css
function aiosf_admin_css() {
  wp_register_style('admin_css', plugins_url('includes/admin-style.css',__FILE__ ));
  wp_enqueue_style('admin_css');
}
add_action( 'admin_init','aiosf_admin_css');
 
?>