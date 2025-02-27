<?php

// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}

// Load CSS & JS on Plugin Setting Page
function kpftc_admin_scripts( $hook )
{	
	// Define KPFTC_PLUGIN_SLUG as a PHP Constant
	define ( 'KPFTC_PLUGIN_SLUG', $hook );
	
	wp_register_style( 'kpftc-admin-css', KPFTC_DIR_URL . 'assets/css/kpftc-backend.css');
	wp_register_script( 'kpftc-admin-js', KPFTC_DIR_URL . 'assets/js/kpftc-backend.js');
	
	if( 'settings_page_kpftc' == KPFTC_PLUGIN_SLUG )
		wp_enqueue_style( 'kpftc-admin-css' );
	
	wp_enqueue_script( 'kpftc-admin-js' );
	wp_localize_script('kpftc-admin-js', 'kpftc_vars', array(
			'kpftc_ajax_link' => admin_url('admin-ajax.php')
		)
	);
	
}
add_action( 'admin_enqueue_scripts', 'kpftc_admin_scripts' );