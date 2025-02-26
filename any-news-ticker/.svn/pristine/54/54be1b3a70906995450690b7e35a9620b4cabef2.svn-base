<?php
/*
Plugin Name: Any News Ticker
Plugin URI: https://demo.mucasoft.com/wp/plugins-demo/any-news-ticker-demo/
Description: Any news ticker to show anything as ticker in your website.
Author: Mucasoft
Author URI: https://mucasoft.com/
Version: 3.1.1
License: GPL2
*/


/************************************/
/* Register styles and js files    */
/***********************************/
function ant_load_css_js() {
    wp_enqueue_style( 'main-style', plugins_url('/styles/ticker-style.css', __FILE__), array( 'wp-color-picker' ));
    wp_enqueue_script( 'main-script', plugins_url('/js/jquery.ticker.js', __FILE__), array('jquery'),'1.1.1',true );


}
add_action( 'wp_enqueue_scripts', 'ant_load_css_js' );

include_once ('src/ticker-main.php');
include_once ('src/options.php');

add_action( 'admin_enqueue_scripts', 'ant_color_picker' );
function ant_color_picker( $hook_suffix ) {
	// first check that $hook_suffix is appropriate for your admin page
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'ant-color-picker-script', plugins_url('js/admin-color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}
