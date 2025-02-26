<?php
/*
Plugin Name: Add Bootstrap Tailwind Css
Description: A simple plugin to add Bootstrap and Tailwind CSS to your WordPress site.
Version: 1.0
License: GPLv2 or later
Author: Habib Ali
*/

// Ensure direct access is not allowed
if (!defined('ABSPATH')) {
    die("You are not eligible to access the resources."); // Exit if accessed directly
}

// Enqueue Bootstrap and Tailwind CSS based on context
function abat_main() {
    // Check if we are in the admin dashboard
    if (is_admin()) {
        // Only enqueue styles for the admin dashboard if needed
        // Example: wp_enqueue_style('admin-specific-css', plugin_dir_url(__FILE__).'assets/css/admin.css', array(), '1.0.0');
    } else {
        // Enqueue styles for the client/front-end side only
        wp_enqueue_style('bootstrap-css', plugin_dir_url(__FILE__).'assets/css/bootstrap.css', array(), '5.3.0');
        wp_enqueue_style('tailwind-css', plugin_dir_url(__FILE__) . 'dist/styles.css', array(), '2.0.0');
    }
}

// Enqueue styles for the front-end
add_action('wp_enqueue_scripts', 'abat_main');

// Handle plugin activation
function abat_activate() {
    // Activation logic here if needed
}
register_activation_hook(__FILE__, 'abat_activate');

// Handle plugin deactivation
function abat_deactivate() {
    // Deactivation logic here if needed
}
register_deactivation_hook(__FILE__, 'abat_deactivate');
