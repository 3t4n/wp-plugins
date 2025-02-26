<?php
/*
 * Live Preview - Product Options
 * https://sahu.media
 *
 * @package sahu_live_product_options_lite
 * @copyright Copyright (c) 2020, SAHU MEDIA®
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Erstelle Schriftarten, Lade nur wenn "Produktansicht"

add_action('admin_head', 'sahu_live_product_options_lite_custom_fonts');
add_action('wp_head', 'sahu_live_product_options_lite_custom_fonts');

function sahu_live_product_options_lite_custom_fonts() {
	if ( is_product() || is_page( 'cart' ) || is_cart() || is_checkout() || is_admin()){
		  echo '<style>
		   @font-face {
					  font-family: "Philosopher-RegularMrcouple";
					  font-style: normal;
					  font-weight: 400;
					  src: url("'.plugin_dir_url( __DIR__ ) . '/fonts/Philosopher-RegularMrcouple.woff") format("woff");
					}
		   @font-face {
						font-family: "YanoneKaffeesatz-RegularMrcouple";
						font-style: normal;
						font-weight: 400;
						src: url("'.plugin_dir_url( __DIR__ ) . '/fonts/YanoneKaffeesatz-RegularMrcouple.woff") format("woff")
			}		
			@font-face {
						font-family: "GloriaHallelujahMrcouple";
						font-style: normal;
						font-weight: 400;
						src: url("'.plugin_dir_url( __DIR__ ) . '/fonts/GloriaHallelujahMrcouple.woff") format("woff")
				}
		  </style>';
	}
}

// Lade Javascript + CSS - Dateien

add_action( 'wp_enqueue_scripts', 'sahu_live_product_options_lite_scripts' );
function sahu_live_product_options_lite_scripts() {
	wp_enqueue_style( 'eng-style',plugin_dir_url( __DIR__ ) . '/css/grav.css',false,'1.1','all');
	wp_enqueue_script( 'custom-script', plugin_dir_url( __DIR__ )  . '/js/custom_script.js', array( 'jquery' ) );
}
