<?php
/**
 * Plugin Name: Auto Size Textarea
 * Plugin URI: https://bitwisecode.com/
 * Description: A simple plugin to auto size Wordpress site's textarea
 * Version: 1.0
 * Author: BitwiseCode
 * Author URI: https://bitwisecode.com
 * License:      GPL2
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 *
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Enqueue plugin script
function bitwisecode_enqueue_script() {
	
	wp_enqueue_style( 'bc-autosize-css', plugins_url('/css/bc-custom.css', __FILE__) );
	wp_enqueue_script('jquery');
    wp_enqueue_script( 'bc_autosize',  plugins_url('/js/autosize.min.js', __FILE__), array('jquery'), true );
    wp_enqueue_script( 'bc_custom',  plugins_url('/js/custom.js', __FILE__), array('jquery'), true );
	
	
}
add_action( 'wp_enqueue_scripts', 'bitwisecode_enqueue_script' );
