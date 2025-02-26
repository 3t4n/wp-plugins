<?php // Flipdish Ordering - Register Settings

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {

	die;

}


// register plugin settings
function flipdish_ordering_register_settings() {

	register_setting(
		'flipdish_ordering_options',
		'flipdish_ordering_options',
		'flipdish_ordering_callback_validate_options'
	);

	// Register settings groups
	require_once plugin_dir_path( __FILE__ ) . 'settings/configuration.php';
	require_once plugin_dir_path( __FILE__ ) . 'settings/display.php';
	require_once plugin_dir_path( __FILE__ ) . 'settings/payments.php';

}
add_action( 'admin_init', 'flipdish_ordering_register_settings' );
