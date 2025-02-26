<?php
/**
 * Plugin Name: ACF Add Testimonials Blocks
 * Plugin URL: https://wordpress.org/plugins/acf-add-testimonials-blocks/
 * Description: Create New Testimonial Slider block using ACF
 * Version: 2.0.0
 * Author: AIS Technolabs
 * Author URI: https://www.aistechnolabs.com/
 *
 */

// Define Constants.
define( 'ACFTB_PATH', plugin_dir_path( __FILE__ ) . '/acftb-create-block/' );



// File Includes
include_once 'includes/acftb-block-register.php';

function acftb_styles() {
	wp_enqueue_style( 'style', plugin_dir_url( __FILE__ ) . 'assets/css/style.css',false,'1.1','all');
	wp_enqueue_style( 'bootstrap.min', plugin_dir_url( __FILE__ ) . 'assets/css/bootstrap.min.css',false,'1.1','all');
	wp_enqueue_style( 'bootstrap', plugin_dir_url( __FILE__ ) . 'assets/css/bootstrap.css',false,'1.1','all');
	wp_enqueue_style( 'font-awesome.min', plugin_dir_url( __FILE__ ) . 'assets/css/font-awesome.min.css',false,'1.1','all');
	wp_enqueue_style( 'site', plugin_dir_url( __FILE__ ) . 'assets/css/site.css',false,'1.1','all');
	wp_enqueue_style( 'custom-style', plugin_dir_url( __FILE__ ) . 'assets/css/custom-style.css',false,'1.1','all');
	wp_enqueue_script(' bootstrap', plugin_dir_url(__FILE__) . 'assets/js/bootstrap.js', array('jquery'));
	wp_enqueue_script(' bootstrap.min', plugin_dir_url(__FILE__) . 'assets/js/bootstrap.min.js', array('jquery'));
	}
add_action( 'wp_enqueue_scripts', 'acftb_styles' );

