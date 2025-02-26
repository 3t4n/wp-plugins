<?php
/**
 * Plugin Name: Accept Donations with bKash Payment
 * Description: A simple plugin to accept donations via bKash.
 * Version: 1.0.1
 * Author: Ahmed Imran
 * License: GPL-2.0-or-later
 * Text Domain: accept-donations-with-bkash-payment
 * Requires PHP: 7.4
 * Requires at least: 5.0
 */

// Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Enqueue plugin assets (CSS and JS).
 */
function adbkp_enqueue_assets() {
    $plugin_version = '1.0.1'; // Define the plugin version

    // Enqueue CSS with version number
    wp_enqueue_style(
        'adbkp-styles',
        plugins_url( 'assets/css/style.css', __FILE__ ),
        array(),
        $plugin_version
    );

    // Enqueue JS with jQuery dependency and version number
    wp_enqueue_script(
        'adbkp-scripts',
        plugins_url( 'assets/js/script.js', __FILE__ ),
        array( 'jquery' ),
        $plugin_version,
        true
    );

    // Localize script to pass AJAX URL
    wp_localize_script( 'adbkp-scripts', 'adbkp_ajax', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'adbkp_enqueue_assets' );

// Require the Composer autoloader if it exists.
$autoload_path = __DIR__ . '/vendor/autoload.php';
if ( file_exists( $autoload_path ) ) {
    require_once $autoload_path;
} else {
    wp_die( esc_html__( 'Composer autoload file not found. Please run `composer install`.', 'accept-donations-with-bkash-payment' ) );
}

// Namespace imports
use AcceptDonationBKash\ADBKP_Plugin;
use AcceptDonationBKash\ADBKP_SettingsPage;

/**
 * Initialize the plugin.
 */
function adbkp_initialize_plugin() {
    // Initialize main plugin classes
    $plugin = new ADBKP_Plugin();
    $plugin->run();

    new ADBKP_SettingsPage(); // Load settings page
}
add_action( 'plugins_loaded', 'adbkp_initialize_plugin' );