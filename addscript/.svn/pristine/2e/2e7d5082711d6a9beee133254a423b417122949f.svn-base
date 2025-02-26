<?php

/*
Plugin Name: Add Script
Description: Simple plugin to add Google Analytics in the footer
URI: http://www.tresrl.it
Author: TRe Technology And Research S.r.l.
Author URI: http://www.tresrl.it
Version: 1.4
License: GPL-2.0+

*/

if ( ! defined( 'ABSPATH' ) ) exit;

/* AUTOLOADER */
/* Inspired by: https://www.smashingmagazine.com/2015/05/how-to-use-autoloading-and-a-plugin-container-in-wordpress-plugins/
 * 
 */

spl_autoload_register( 'addscript_autoloader' );

function addscript_autoloader( $class_name ) {
	
	/*
	 * Check if class has our prefix.
	 * Thank to Facebook PHP SDK for the hint.
	 */
	$prefix = 'Addscript\\';
    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class_name, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }
		
	$classes_dir = realpath ( plugin_dir_path ( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR;
	
	$class_file = str_replace( '\\', DIRECTORY_SEPARATOR, $class_name ) . '.php';
	
	require_once $classes_dir . $class_file;
	
}

/*
 * The base dir of the plugin.
 * Returns the absolute path.
 * E.g. /var/docs/html/public/wp-content/plugins/simplest-form
 * 
 * @return string
 * 
 * 
 */

$base_dir = plugin_dir_path( __FILE__ );

if (is_admin()) {

	if ( ! isset ( $admin ) ) {

		$admin = new \Addscript\Admin($base_dir);
		
	}
	
}

if ( ! isset ( $frontend ) ) {
	
	$frontend = new \Addscript\Frontend();	
	
}