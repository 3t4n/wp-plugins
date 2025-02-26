<?php
/**
 * Plugin Name:       Advance Pricing Table
 * Plugin URI:        http://wpbean.com/plugins/
 * Description:       Advance Pricing Table, a highly customizable most advance pricing table plugin for WordPress.
 * Version:           1.0.1
 * Author:            wpbean
 * Author URI:        http://wpbean.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       advance-pricing-table
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

/**
 * Internationalization
 */

function wpb_apt_textdomain() {
	load_plugin_textdomain( 'advance-pricing-table', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'init', 'wpb_apt_textdomain' );


/**
 * Add plugin action links
 */

function wpb_apt_plugin_actions( $links ) {
   $links[] = '<a href="https://wpbean.com/support/" target="_blank">'. __('Support','advance-pricing-table') .'</a>';
   return $links;
}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'wpb_apt_plugin_actions' );



/**
 * Enqueue CSS files
 */

function wpb_apt_adding_style() {
	wp_register_style( 'wpb-apt-grid',  plugin_dir_url( __FILE__ ) . 'assets/css/main.css','','1.0');
	wp_register_style( 'wpb-apt-main',  plugin_dir_url( __FILE__ ) . 'assets/css/wpb-grid.css','','3.3.2');
	wp_enqueue_style('wpb-apt-grid');
	wp_enqueue_style('wpb-apt-main');
}
add_action( 'init', 'wpb_apt_adding_style' );


/**
 * Requred files
 */

require_once dirname( __FILE__ ) . '/includes/wpb_shortcode.php'; // CSS & JS file enqueue script