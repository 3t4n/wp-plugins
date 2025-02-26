<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


	require_once( ADDONP_PLUGIN_PATH . 'core/cpt/orders.php' );
	require_once( ADDONP_PLUGIN_PATH . 'core/functions/functions.php' );
	require_once( ADDONP_PLUGIN_PATH . 'core/menu/loader-menu.php' );
	
	if( ! function_exists('is_plugin_active') ) {
			
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			
		}

	if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
		require_once( ADDONP_PLUGIN_PATH . 'core/visual-composer/visual-composer.php' );
		}