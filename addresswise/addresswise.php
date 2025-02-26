<?php
/**
 *
 * Plugin Name: AddressWise
 * Plugin URI: https://github.com/niketmandalia/addresswise-woocommerce-plugin
 * Description: Woocommerce plugin for autocompleting addresses in New Zealand and Australia.
 * Version: 1.0.0
 * Requires at least: 5.2
 * Requires PHP: 7.4 or later
 * Author: AddressWise
 * License: GPL v3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */

// Check if ABSPATH is not defined
if ( !defined('ABSPATH') ) {
    die();
}

// Enqueue the JavaScript file for the  address finder functionality
function addresswise_enqueue_scripts()
{
    if ( is_checkout() && !is_wc_endpoint_url() ) {
            wp_enqueue_script('addresswise',
            plugin_dir_url(__FILE__) . 'autosuggest.js',
            array('jquery'),
            '1.0.0',
            true);
        wp_enqueue_style('addresswise',
            plugin_dir_url(__FILE__) . 'autosuggest.css',
            array(),
            '1.0.0',
            'all');
        // Pass AJAX URL to JavaScript
        wp_localize_script('addresswise', 'addresswise_ajax', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('addresswise_nonce'), // Generate nonce
        ));
    }
}

// Enqueue the JavaScript file for address autofill on the checkout page
add_action('wp_enqueue_scripts', 'addresswise_enqueue_scripts');
require_once plugin_dir_path(__FILE__) . 'settings/settings.php';


// AJAX action handler to get client token
add_action('wp_ajax_get_client_token', 'addresswise_get_client_token');
add_action('wp_ajax_nopriv_get_client_token', 'addresswise_get_client_token'); // Allow non-logged-in users to use the AJAX action

function addresswise_get_client_token() {

    // Verify nonce
    if ( ! check_ajax_referer( 'addresswise_nonce', 'nonce', false ) ) {
        wp_send_json_error( 'Invalid nonce' );
    }
    
    // Check if WordPress is loaded
    if ( ! function_exists( 'get_option' ) || ! function_exists( 'wp_json_encode' ) ) {
        status_header(500);
        wp_send_json_error(array('error' => 'WordPress environment is not properly loaded.'));
        wp_die();
    }

    // Retrieve the client token from options
    $client_token = get_option('addresswise_settings_input_field');

    // Check if the client token is retrieved successfully
    if ( ! $client_token ) {
        status_header(500);
        wp_send_json_error(array('error' => 'Client token not found.'));
        wp_die();
    }

    // Return the token as JSON
    echo wp_json_encode(array('client_token' => esc_html($client_token)));
    wp_die();
}