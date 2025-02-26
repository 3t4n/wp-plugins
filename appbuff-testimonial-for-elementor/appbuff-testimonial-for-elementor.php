<?php
/**
 * Plugin Name: Testimonial for Elementor
 * Description: Demonstrate the happy client experience on your site and draw new users
 * Plugin URI: 	https://wordpress.org/plugins/appbuff-testimonial-for-elementor/
 * Author: 		Shameem Reza
 * Author URI: 	https://shameem.dev
 * Version: 	0.0.4
 * License:     GPL2
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: abtestimonial
 * Domain Path: /languages
*/

if( ! defined( 'ABSPATH' ) ) exit(); // Exit if accessed directly
define( 'APPBUFF_TESTIMONIAL_FOR_ELEMENTOR_VERSION', '0.0.1' );
define( 'APPBUFF_TESTIMONIAL_FOR_ELEMENTOR_PLUGIN_ROOT', __FILE__ );
define( 'APPBUFF_TESTIMONIAL_FOR_ELEMENTOR_CSS', APPBUFF_TESTIMONIAL_FOR_ELEMENTOR_PLUGIN_ROOT.'assets/css' );
define( 'APPBUFF_TESTIMONIAL_FOR_ELEMENTOR_PLUGIN_URL', plugins_url( '/', APPBUFF_TESTIMONIAL_FOR_ELEMENTOR_PLUGIN_ROOT ) );
define( 'APPBUFF_TESTIMONIAL_FOR_ELEMENTOR_PLUGIN_PATH', plugin_dir_path( APPBUFF_TESTIMONIAL_FOR_ELEMENTOR_PLUGIN_ROOT ) );
define( 'APPBUFF_TESTIMONIAL_FOR_ELEMENTOR_PLUGIN_BASE', plugin_basename( APPBUFF_TESTIMONIAL_FOR_ELEMENTOR_PLUGIN_ROOT ) );
define( 'APPBUFF_TESTIMONIAL_FOR_ELEMENTOR_PLUGIN_INCLUDE', APPBUFF_TESTIMONIAL_FOR_ELEMENTOR_PLUGIN_PATH .'include/' );

// Required File
require_once ( APPBUFF_TESTIMONIAL_FOR_ELEMENTOR_PLUGIN_PATH .'include/class.appbuff.testimonial.php' );