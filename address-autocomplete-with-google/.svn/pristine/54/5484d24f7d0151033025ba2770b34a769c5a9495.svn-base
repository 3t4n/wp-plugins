<?php
/**
 * Plugin Name: Address Autocomplete with Google
 * Description: A simple address autocomplete feature for WordPress using Google Places API. Supports all kinds of input fields.
 * Version: 1.0.0
 * Author: Maruf Sarkar
 * Author URI: 
 * License: GPL-2.0-or-later
 * Text Domain:address-autocomplete-with-google
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Prevent direct access
}

// Define a global constant for the text domain
define( 'ADDRESS_AUTOCOMPLETE_TEXTDOMAIN', 'address-autocomplete-with-google' );

// Include necessary files
require_once plugin_dir_path( __FILE__ ) . 'includes/class-address-autocomplete.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-address-autocomplete-settings.php';

// Initialize the plugin
function address_autocomplete_init() {
    new Address_Autocomplete();
    new Address_Autocomplete_Settings();
}
add_action( 'plugins_loaded', 'address_autocomplete_init' );
