<?php
/*
 * Plugin Name: Awesome Elements For Elementor
 * Description: This plugin for elements widget for elementor
 * Version: 1.2.1
 * Author: Md Abul Bashar
 * Author URI: https://www.facebook.com/hmbashar/
 * Text Domain: AEFE
 * Elementor tested up to:     3.6.8
 * Elementor Pro tested up to: 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


//define URL
define('AEFE_URL', plugin_dir_url( __FILE__ ));
define('AEFE_PATH', plugin_dir_path(__FILE__));
define('AEFE_URI', plugin_dir_url( dirname( __FILE__ ) ));

// Define Text Domain
define('AEFE_TEXTDOMAIN','AEFE');



function aefe_plugin_general_init() {

	// Load plugin file
	require_once( AEFE_PATH . '/elementor-addon/includes/elementor-configuration.php' );
	require_once( AEFE_PATH . '/inc/hooks.php' );

	// Run the plugin
	\AEFE_ELEMENTOR\Plugin::instance();

}
add_action( 'plugins_loaded', 'aefe_plugin_general_init' );



/**
 * Enqueue scripts and styles.
 */
function aefe_stylesheet_enque() {    
    wp_enqueue_style( 'owlcarousel',  AEFE_URL . "assets/css/owl.carousel.min.css");
    wp_enqueue_style( 'barfilter',  AEFE_URL . "assets/css/barfilter.css");
	//Awesome Elements plugin main stylesheet
	wp_enqueue_style( 'aefe_main_stylesheet',  AEFE_URL . "assets/css/style.css");
	//Awesome Elements Plugin Responsive Stylesheet
    wp_enqueue_style( 'aefe_responsive_stylesheet',  AEFE_URL . "assets/css/responsive.css", array('aefe_main_stylesheet'));

	//OWL Carousel jQuery
	wp_enqueue_script( 'owlcarousel', AEFE_URL . "assets/js/owl.carousel.min.js", array( 'jquery' ), false, true );		
	wp_enqueue_script( 'aefe_main_jquery', AEFE_URL . "assets/js/main.js", array( 'jquery' ), false, true );



}
add_action( 'wp_enqueue_scripts', 'aefe_stylesheet_enque' );



//General Functions
function aefe_general_function() {
	add_image_size( 'our-work', 400, 300, true );
}
add_action('after_setup_theme', 'aefe_general_function');



// add custom our own category for this plugin
function aefe_add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'aefe-category',
		[
			'title' => esc_html__( 'Awesome Elements', 'aefe' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'aefe_add_elementor_widget_categories' );