<?php
/**
 * Plugin Name: RWIT Phone Formatter
 * Description: Formats and validates phone number based on a country
 * Version:     1.0.0
 * Author:      RWIT
 * Author URI:	https://www.rwit.io
 * License:     GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*
* Currently plugin version
*/
define( 'RWITPF_VERSION', '1.0.0' );

/*
* Only run plugin code if PHP version bigger than or equal to 7.0 
*/
if ( version_compare( PHP_VERSION, '7.0', '<' ) ) {
	return;
}

/*
* Load classes
*/
if ( !function_exists( 'rwitpf_autoloader' ) ) {
	function rwitpf_autoloader($class) {
		
		$prefix = 'RWITPF_';
		if (substr($class, 0, strlen($prefix)) == $prefix) {
			$class = substr($class, strlen($prefix));
		}
		$currentDir = dirname(__FILE__);
		if (file_exists($currentDir . '/src/' . $class . '.php')) {
			include $currentDir . '/src/' . $class . '.php';
		}
		if (file_exists($currentDir . '/src/admin/' . $class . '.php')) {
			include $currentDir . '/src/admin/' . $class . '.php';
		}
	}

	spl_autoload_register('rwitpf_autoloader');

	$assets = new RWITPF_Assets();
	$settings = new RWITPF_Settings();

	// Add plugin file if is plugin active function does not exist
	if( !function_exists('is_plugin_active') ) {

		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );		
	}
	// Check if CF7 plugin is active then load CF7 related data
	if( function_exists('is_plugin_active') && is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {

		$validation = new RWITPF_PhoneFieldRequiredValidation();
	}
}