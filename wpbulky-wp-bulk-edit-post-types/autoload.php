<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'vi_autoload' ) ) {
	function vi_autoload( $class, $namespace ) {
		$prefix   = $namespace;
		$base_dir = __DIR__;
		$len      = strlen( $prefix );

		if ( strncmp( $prefix, $class, $len ) !== 0 ) {
			return;
		}

		$relative_class = strtolower( substr( $class, $len ) );
		$relative_class = strtolower( str_replace( '_', '-', $relative_class ) );
		$file           = $base_dir . str_replace( '\\', '/', $relative_class ) . '.php';

		if ( file_exists( $file ) ) {
			require_once $file;
		} else {
			return;
		}
	}
}

spl_autoload_register( function ( $class ) {
	vi_autoload( $class, 'BULKYWP' );
} );

spl_autoload_register( function ( $class ) {
	vi_autoload( $class, 'VI_CORE' );
} );

