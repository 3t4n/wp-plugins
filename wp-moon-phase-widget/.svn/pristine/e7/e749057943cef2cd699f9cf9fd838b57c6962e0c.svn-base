<?php
/*
* Plugin Name: WP Moon Phase Widget
* Description: This plugin adds moon phase widget to your site.
* Version: 1.0.0
* Author: MoonOrganizer
* Author URI: https://moonorganizer.com/en/
* License: GPL2
* Domain Path: /languages
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define constants
define( 'MPH__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'MPH__PLUGIN_SLUG', 'wp-moon-phase-widget');
define( 'MPH__SHORTCODE_TAG', 'mph-widget');

// Require MoonPhaseWidget class
require_once MPH__PLUGIN_DIR . 'classes/MoonPhaseWidget.php';

// Load text domain
load_plugin_textdomain(MPH__PLUGIN_SLUG, false, basename( dirname( __FILE__ ) ) . '/languages' );


// Register the widget
function mph_widget_register() {
    register_widget( 'MoonPhaseWidget' );

}
// Adds the Main JS to the public-facing side of the site.
function mph_scripts_register() {
    wp_enqueue_script( MPH__PLUGIN_SLUG, plugin_dir_url( __FILE__ ) . 'js/automount.min.js', null, null, true );
}

// Examples:
// [mph-widget]
// [mph-widget color="#ffffff"]
function mph_tag_register( $atts ){
	$color = isset( $atts['color'] ) ? $atts['color'] : '#ffffff';
	return "<div id='moon-phase-widget' data-color='$color'></div>";
}

// Init
add_shortcode(MPH__SHORTCODE_TAG, 'mph_tag_register');

add_action( 'widgets_init', 'mph_widget_register' );

add_action( 'wp_enqueue_scripts', 'mph_scripts_register' );