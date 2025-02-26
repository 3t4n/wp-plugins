<?php

/**
 * @package Best WP SMTP Email
 * @version 1.1
 */

/*
Plugin Name: Best WP SMTP Email
Plugin URI: https://www.tinypixi.com/plugins/best-wp-smtp-email
Description: Best WP SMTP Email Plugin
Author: Themexa
Version: 1.1
Author URI: https://www.themexa.com/
Text Domain: bwpse
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currentl plugin version.
 */
define( 'bwpse', '1.1' );

/**
 * Code that runs on plugin activation
 */
register_activation_hook( __FILE__, 'bwpse_activate' );

function bwpse_activate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/activation.php';
}

//Calling the core file
require_once plugin_dir_path( __FILE__ ) . 'includes/core.php';
