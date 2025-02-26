<?php
/**
 * Plugin Name: Indiemetrics
 * Version: 1.1.0
 * Plugin URI: https://indiemetrics.net
 * Description: This is the offical WordPress plugin of Indiemetrics, previously known as Arnold Analytics.
 * Author: Arne Govaerts
 * Author URI: https://indiemetrics.net
 * Requires at least: 1.0
 * Tested up to: 4.0
 *
 * Text Domain: arnold-analytics
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author Arne Govaerts
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Load plugin class files.
require_once 'includes/class-arnold-analytics.php';
require_once 'includes/class-arnold-analytics-settings.php';

// Load plugin libraries.
require_once 'includes/lib/class-arnold-analytics-admin-api.php';
//require_once 'includes/lib/class-arnold-analytics-post-type.php';
//require_once 'includes/lib/class-arnold-analytics-taxonomy.php';

/**
 * Returns the main instance of Arnold_Analytics to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object Arnold_Analytics
 */
function arnold_analytics() {
	$instance = Arnold_Analytics::instance( __FILE__, '1.0.1' );

	if ( is_null( $instance->settings ) ) {
		$instance->settings = Arnold_Analytics_Settings::instance( $instance );
	}

	return $instance;
}

arnold_analytics();
