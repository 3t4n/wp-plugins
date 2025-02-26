<?php
/**
 * Autoloader for plugin classes in the Astrolabe namespace
 *
 * @package Astrolabe
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Autoloader
 *
 * @param string $class The fully-qualified class name.
 */
function astr_autoloader( $class ) {
	$prefix   = 'ASTR\\';
	$base_dir = ASTR_PLUGIN_PATH;

	$len = strlen( $prefix );
	if ( strncmp( $prefix, $class, $len ) !== 0 ) {
		return;
	}

	$relative_class = substr( $class, $len );
	$relative_class = str_replace( '\\', '/', $relative_class );

	$file_parts = explode( '/', $relative_class );
	$file_name  = 'class-' . str_replace( '_', '-', strtolower( array_pop( $file_parts ) ) );

	$new_path_parts = array();

	foreach ( $file_parts as $part ) {
		$new_path_parts[] = str_replace( '_', '-', strtolower( $part ) );
	}

	array_push( $new_path_parts, $file_name );
	$file = $base_dir . implode( '/', $new_path_parts ) . '.php';

	// echo 'Loading: ' . $file . '<br>';

	if ( file_exists( $file ) ) {
		require_once $file;
	}
}
spl_autoload_register( 'astr_autoloader' );
