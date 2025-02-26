<?php
/**
 * Plugin Name: Auto Location for WP Job Manager via Google
 * Description: Auto complete location and address by google api to easy to search data
 * Version:     1.1
 * Author:      Gravity Master
 * License:     GPLv2 or later
 * Text Domain: algwjm
 */

/* Stop immediately if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) {
	die();
}

/* All constants should be defined in this file. */
if ( ! defined( 'ALGWJM_PREFIX' ) ) {
	define( 'ALGWJM_PREFIX', 'algwjm' );
}
if ( ! defined( 'ALGWJM_PLUGINDIR' ) ) {
	define( 'ALGWJM_PLUGINDIR', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'ALGWJM_PLUGINBASENAME' ) ) {
	define( 'ALGWJM_PLUGINBASENAME', plugin_basename( __FILE__ ) );
}
if ( ! defined( 'ALGWJM_PLUGINURL' ) ) {
	define( 'ALGWJM_PLUGINURL', plugin_dir_url( __FILE__ ) );
}

/* Auto-load all the necessary classes. */
if( ! function_exists( 'algwjm_class_auto_loader' ) ) {
	
	function algwjm_class_auto_loader( $class ) {
		
	 	$includes = ALGWJM_PLUGINDIR . 'includes/' . $class . '.php';
		
		if( is_file( $includes ) && ! class_exists( $class ) ) {
			include_once( $includes );
			return;
		}
		
	}
}
spl_autoload_register('algwjm_class_auto_loader');

new ALGWJM_Admin();
new ALGWJM_Frontend();
?>