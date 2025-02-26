<?php
/**
 * Plugin Name: Fancy Fields For WPForms
 * Description: Fancy Fields For WPForms Lite Plugin Including File Upload
 * Version: 1.0.5.1
 * Author: Sanjeev Aryal
 * Author URI: http://www.sanjeebaryal.com.np
 * Text Domain: fancy-fields-for-wpforms
 * Domain Path: /languages/
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Define FANCY_FIELDS_FOR_WPFORMS.
if ( ! defined( 'FANCY_FIELDS_FOR_WPFORMS' ) ) {
	define( 'FANCY_FIELDS_FOR_WPFORMS', __FILE__ );
}

// Include the main Fancy_fields_for_WPForms class.
if ( ! class_exists( 'Fancy_Fields_For_WPForms' ) ) {
	include_once dirname( __FILE__ ) . '/includes/class-fancy-fields-for-wpforms.php';
}

// Initialize the plugin.
add_action( 'plugins_loaded', array( 'Fancy_Fields_For_WPForms', 'get_instance' ) );
