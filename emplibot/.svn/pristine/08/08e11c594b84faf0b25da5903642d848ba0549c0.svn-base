<?php
/*
 * Plugin Name:       Emplibot
 * Description:       Automated keyword research, automated blogging, with internal and external links, engaging infographics, unique featured images, and more.
 * Version:           1.0.3
 * Requires at least: 6.4
 * Requires PHP:      7.2
 * Author:            emplibot
 * Author URI:        https://emplibot.com/
 * License:           GPL v3
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

define("EMPLIBOT_ENVIRONMENT", "PROD");

// Include necessary files
require_once plugin_dir_path(__FILE__) . 'includes/class-emplibot.php';
require_once plugin_dir_path(__FILE__) . 'includes/functions.php';
require_once plugin_dir_path(__FILE__) . 'includes/rest-api.php';
require_once plugin_dir_path(__FILE__) . 'includes/database.php';


// Function to get the public key and activate the plugin
function emplibot_get_backend_public_key_and_activate() {
    
    register_setting(
        'emplibot_public_key_group', // option_group
        'emplibot_public_key', // option_name
        array(
            'sanitize_callback' => 'emplibot_public_key_sanitize' // sanitization function
        )
    );

    emplibot_get_newest_public_key(); // Call the function to fetch and save the public key

}

// Register the activation hook
register_activation_hook(__FILE__, 'emplibot_get_backend_public_key_and_activate');


// Initialize the plugin
if ( is_admin() ) {
    $emplibot = new Emplibot();
}

register_activation_hook(__FILE__, 'emplibot_hashes_create_table');