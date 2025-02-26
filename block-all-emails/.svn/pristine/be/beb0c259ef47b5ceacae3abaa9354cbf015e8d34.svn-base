<?php
/*
Plugin Name: Block All Emails
Description: Stops all outgoing emails to ensure no emails are sent from your WordPress site, particularly useful for staging environments.
Version: 1.0.1
Author: WPDuck.com
Author URI: https://wpduck.com
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Text Domain: block-all-emails
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Include the main class file
require_once plugin_dir_path( __FILE__ ) . 'includes/class-block-all-emails.php';

// Initialize the plugin
function wpduck_bae_init() {
    $plugin = new WPDuck_BAE_Block_All_Emails();
    $plugin->init();
}
add_action( 'plugins_loaded', 'wpduck_bae_init' );

// Load plugin text domain for translations
function wpduck_bae_load_textdomain() {
    load_plugin_textdomain( 'block-all-emails', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'wpduck_bae_load_textdomain' );