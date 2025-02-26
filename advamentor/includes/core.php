<?php
/**
 * Core plugin file
 *
 * @since      1.0
 * @package    Advamentor
 * @author     Themexa
 */

/*
 * Exit if accessed directly.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/*
 * Load only if Elementor is installed and activated
 */

function advamentor_init() {
	if ( did_action( 'elementor/loaded' ) ) {

		/* Enqueue and handle assets */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/assets.php';

		/* Custom plugin functions */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/plugin-functions.php';

		/* Admin settings page */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/admin.php';
	}
}
add_action( 'plugins_loaded', 'advamentor_init' );

/*
 * Include the main advamentor class
 */
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/classes/class-advamentor.php';
