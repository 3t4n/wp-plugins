<?php
/*
Plugin Name: Loyalty.js
Description: Page view based storytelling based on loyalty.js for Wordpress
Version: 2.0.2
Author: Ivan Eisenberg
Author URI: http://thosewhodig.net
*/

// Register Shortcode
function loyalty_js_shortcode( $atts , $content = null ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'exact' => '',
			'min' => '',
			'max' => '',
		), $atts )
	);

	// Code
	return '<span data-loyalty="'.$atts['exact'].'" data-loyalty-min="'.$atts['min'].'" data-loyalty-max="'.$atts['max'].'">' . $content . '</span>';
}

// Register Display Count Shortcode
function loyalty_js_count() {
	return '<span class="loyaltyjs_count" data-loyalty-count></span>';
}


// register Scripts
function register_loyalty_scripts() {
	wp_enqueue_script( 'loyalty-js', plugins_url( 'js/jquery.loyalty.min.js', __FILE__ ), array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'init-loyalty-js', plugins_url( 'js/init.loyalty.js', __FILE__ ), array('loyalty-js'), '1.0.0', true );

	$loyaltyConfig = array(
		'antiflicker' => get_option('loyalty_antiflicker'),
		'debug' => get_option('loyalty_debug'),
		'delay' => get_option('loyalty_delay')
	);

	wp_localize_script( 'loyalty-js', 'loyaltyConfig', $loyaltyConfig );
}

function loyalty_init(){

	// register shortcodes
	add_shortcode( 'loyalty', 'loyalty_js_shortcode' );
	add_shortcode( 'loyalty_count', 'loyalty_js_count' );

	// register scripts
	add_action( 'wp_enqueue_scripts', 'register_loyalty_scripts' );

}

function loyalty_js_admin_actions() {
		add_options_page("Loyalty.js", "Loyalty.js", "manage_options", "loyalty_js_options", "loyalty_js_admin_render");
}

function loyalty_js_admin_render(){
	include('loyalty-js-admin.php');
}

// Add settings link on plugin page
function loyalty_plugin_settings_link($links) { 
	$settings_link = '<a href="options-general.php?page=loyalty_js_options">Settings</a>'; 
	array_unshift($links, $settings_link); 
	return $links; 
}

$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'loyalty_plugin_settings_link' );


if(!is_admin()){
	// Frontend
	add_action('setup_theme', 'loyalty_init');	
} else {
	// Admin
	add_action('admin_menu', 'loyalty_js_admin_actions');	
}
