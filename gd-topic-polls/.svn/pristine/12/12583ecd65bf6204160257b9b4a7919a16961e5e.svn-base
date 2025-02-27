<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function d4p_plugin_gdpol_autoload( $class ) {
	$path = dirname( __FILE__ ) . '/';
	$base = 'Dev4Press\\Plugin\\TopicPolls\\';

	dev4press_v53_autoload_for_plugin( $class, $base, $path );
}

spl_autoload_register( 'd4p_plugin_gdpol_autoload' );
