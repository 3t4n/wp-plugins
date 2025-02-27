<?php
/*
Plugin Name: HTTP Security Header
Description: A simple plugin to add security headers to your WordPress site with dynamic control from the admin dashboard.
Version: 2.1
Author: Inspired Monks
Author URI: https://inspiredmonks.com
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

include_once(plugin_dir_path(__FILE__) . 'inspiredmonks-security-admin-dashboard.php');

// Function to add security headers dynamically based on settings
function inspiredmonks_security_add_headers() {
    if (!headers_sent()) { // Ensure headers aren't already sent
        $options = get_option('inspiredmonks_security_header_options');

        // Strict Transport Security (HSTS)
        if (!empty($options['hsts_header'])) {
            header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload');
        }

        // X-Frame-Options (Prevents clickjacking)
        if (!empty($options['x_frame_header'])) {
            header('X-Frame-Options: SAMEORIGIN');
        }

        // X-Content-Type-Options (Prevents MIME-type sniffing)
        if (!empty($options['x_content_type_header'])) {
            header('X-Content-Type-Options: nosniff');
        }

        // Referrer-Policy
        if (!empty($options['referrer_policy_header'])) {
            header('Referrer-Policy: no-referrer-when-downgrade');
        }

        // Content-Security-Policy
        if (!empty($options['content_security_policy_header'])) {
            header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval'; style-src 'self' 'unsafe-inline';");
        }

        // X-XSS-Protection (Cross-site scripting attack prevention)
        if (!empty($options['x_xss_protection_header'])) {
            header('X-XSS-Protection: 1; mode=block');
        }

        // Permissions-Policy
        if (!empty($options['permissions_policy_header'])) {
            header("Permissions-Policy: geolocation=(), microphone=(), camera=()");
        }

        // X-Permitted-Cross-Domain-Policies
        if (!empty($options['x_permitted_cross_domain_header'])) {
            header('X-Permitted-Cross-Domain-Policies: none');
        }

        // Expect-CT
        if (!empty($options['expect_ct_header'])) {
            header('Expect-CT: max-age=86400, enforce, report-uri="/report"');
        }

        // Feature-Policy
        if (!empty($options['feature_policy_header'])) {
            header("Feature-Policy: geolocation 'none'; microphone 'none'; camera 'none'");
        }

        // Cross-Origin-Opener-Policy (COOP)
        if (!empty($options['cross_origin_opener_policy_header'])) {
            header("Cross-Origin-Opener-Policy: same-origin");
        }

        // Cross-Origin-Resource-Policy (CORP)
        if (!empty($options['cross_origin_resource_policy_header'])) {
            header("Cross-Origin-Resource-Policy: same-origin");
        }

    }
}
add_action('init', 'inspiredmonks_security_add_headers');

// Add settings link to the plugin page
function inspiredmonks_security_settings_link($links) {
    $settings_link = '<a href="options-general.php?page=inspiredmonks-security-header-settings">Manage Headers</a>';
    array_push($links, $settings_link);
    return $links;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'inspiredmonks_security_settings_link');

function inspiredmonks_security_activate() {
    $default_options = [
        'hsts_header' => 1, // Enable HTTP Strict Transport Security (HSTS)
        'x_frame_header' => 1, // Enable X-Frame-Options (Prevent Clickjacking)
        'x_content_type_header' => 1, // Enable X-Content-Type-Options (Prevent MIME-Sniffing)
        'referrer_policy_header' => 0, // Disable Referrer-Policy by default
        'content_security_policy_header' => 0, // Disable Content-Security-Policy by default
        'x_xss_protection_header' => 0, // Disable X-XSS-Protection by default
        'permissions_policy_header' => 0, // Disable Permissions-Policy by default
        'x_permitted_cross_domain_header' => 0, // Disable X-Permitted-Cross-Domain-Policies by default
        'expect_ct_header' => 0, // Disable Expect-CT by default
        'feature_policy_header' => 0, // Disable Feature-Policy by default
        'cross_origin_opener_policy_header' => 0, // Disable Cross-Origin-Opener-Policy by default
        'cross_origin_resource_policy_header' => 0 // Disable Cross-Origin-Resource-Policy by default
    ];

    if (!get_option('inspiredmonks_security_header_options')) {
        add_option('inspiredmonks_security_header_options', $default_options);
    }
}
register_activation_hook(__FILE__, 'inspiredmonks_security_activate');

// Enqueue custom CSS for the admin dashboard
function inspiredmonks_enqueue_admin_scripts($hook) {
    // Ensure scripts are loaded only on the plugin's settings page
    if ($hook !== 'settings_page_inspiredmonks-security-header-settings') {
        return;
    }

    // Enqueue the JavaScript file
    wp_enqueue_script(
        'inspiredmonks-admin-script', // Unique handle
        plugin_dir_url(__FILE__) . 'assets/admin-dashboard-script.js', // Path to the JS file
        array(), // Dependencies (if any, like jQuery)
        '1.0.0', // Version
        true // Load in footer
    );

    // Enqueue the CSS file (if not already enqueued)
    wp_enqueue_style(
        'inspiredmonks-admin-style', // Unique handle
        plugin_dir_url(__FILE__) . 'assets/admin-dashboard-style.css', // Path to the CSS file
        array(), // Dependencies
        '1.0.0', // Version
        'all' // Media type
    );
}
add_action('admin_enqueue_scripts', 'inspiredmonks_enqueue_admin_scripts');

// Register the deactivation hook
register_deactivation_hook(__FILE__, 'inspiredmonks_security_remove_data_on_deactivation');

function inspiredmonks_security_remove_data_on_deactivation() {
    // Delete the plugin settings from the database when the plugin is deactivated
    delete_option('inspiredmonks_security_header_options');
}

// Register the uninstall hook
register_uninstall_hook(__FILE__, 'inspiredmonks_security_remove_data_on_uninstall');

function inspiredmonks_security_remove_data_on_uninstall() {
    // Delete the plugin settings from the database when the plugin is uninstalled
    delete_option('inspiredmonks_security_header_options');
}