<?php
/**
 * Plugin Name: Email Sync Between Woo and CM
 * Description: Automatically adds customers to a Campaign Monitor list when an order is marked as 'Processing' in WooCommerce.
 * Version: 1.0
 * Author: KNEET
 * Author URI: https://kneet.be
 * Text Domain: email-sync-between-woo-and-cm
 * Requires at least: 5.7
 * Tested up to: 6.3
 * Requires PHP: 7.2
 * Requires Plugins: woocommerce
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Add admin submenu under WooCommerce.
 */
function esbwacm_add_settings_menu() {
    add_submenu_page(
        'woocommerce',
        'Sync Campaign Monitor',
        'Sync Campaign Monitor',
        'manage_options',
        'esbwacm-settings',
        'esbwacm_settings_page'
    );
}
add_action( 'admin_menu', 'esbwacm_add_settings_menu' );

/**
 * Render settings page.
 */
function esbwacm_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( 'Sync Campaign Monitor', 'email-sync-between-woo-and-cm' ); ?></h1>
        <p>
            <strong><?php esc_html_e( 'Note:', 'email-sync-between-woo-and-cm' ); ?></strong>
            <?php esc_html_e( 'Enter your API Key and List ID below before testing the connection.', 'email-sync-between-woo-and-cm' ); ?>
        </p>
        <form method="post" action="options.php">
            <?php
            settings_fields( 'esbwacm_settings_group' );
            do_settings_sections( 'esbwacm-settings' );
            submit_button();
            ?>
        </form>

        <h2><?php esc_html_e( 'Test Connection', 'email-sync-between-woo-and-cm' ); ?></h2>
        <p><?php esc_html_e( 'This will sync the latest customer from a Processing order. If none are found, it will sync the latest Completed order.', 'email-sync-between-woo-and-cm' ); ?></p>

        <button id="esbwacm-test-button" class="button button-primary">
            <?php esc_html_e( 'Test API Connection', 'email-sync-between-woo-and-cm' ); ?>
        </button>
        <p id="esbwacm-test-status"></p>
    </div>
    <?php
}

/**
 * Register settings.
 */
function esbwacm_register_settings() {
    register_setting(
        'esbwacm_settings_group',
        'esbwacm_api_key',
        array(
            'type'              => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default'           => '',
        )
    );

    register_setting(
        'esbwacm_settings_group',
        'esbwacm_list_id',
        array(
            'type'              => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default'           => '',
        )
    );

    add_settings_section(
        'esbwacm_main_section',
        __( 'API Settings', 'email-sync-between-woo-and-cm' ),
        null,
        'esbwacm-settings'
    );

    add_settings_field(
        'esbwacm_api_key',
        __( 'Campaign Monitor API Key', 'email-sync-between-woo-and-cm' ),
        'esbwacm_api_key_callback',
        'esbwacm-settings',
        'esbwacm_main_section'
    );

    add_settings_field(
        'esbwacm_list_id',
        __( 'Campaign Monitor List ID', 'email-sync-between-woo-and-cm' ),
        'esbwacm_list_id_callback',
        'esbwacm-settings',
        'esbwacm_main_section'
    );
}
add_action( 'admin_init', 'esbwacm_register_settings' );

/**
 * Callback for API Key field.
 */
function esbwacm_api_key_callback() {
    $api_key = get_option( 'esbwacm_api_key' );
    echo '<input type="password" name="esbwacm_api_key" value="' . esc_attr( $api_key ) . '" placeholder="' . esc_attr__( 'Fill in your API key', 'email-sync-between-woo-and-cm' ) . '" />';
}

/**
 * Callback for List ID field.
 */
function esbwacm_list_id_callback() {
    $list_id = get_option( 'esbwacm_list_id' );
    echo '<input type="password" name="esbwacm_list_id" value="' . esc_attr( $list_id ) . '" placeholder="' . esc_attr__( 'Fill in your List ID', 'email-sync-between-woo-and-cm' ) . '" />';
}

/**
 * Enqueue admin scripts for the settings page.
 */
function esbwacm_enqueue_admin_scripts( $hook ) {
    // Only load on our settings page: woocommerce_page_esbwacm-settings
    if ( 'woocommerce_page_esbwacm-settings' !== $hook ) {
        return;
    }

    // Register a dummy script handle so we can add inline JS to it.
    wp_register_script( 'esbwacm-admin-script', '' );
    wp_enqueue_script( 'esbwacm-admin-script' );

    // Inline script to handle the test connection functionality
    $inline_js = "
        (function() {
            document.addEventListener('DOMContentLoaded', function() {
                var button = document.getElementById('esbwacm-test-button');
                if (!button) return;

                button.addEventListener('click', function() {
                    var statusElement = document.getElementById('esbwacm-test-status');
                    statusElement.innerHTML = '" . esc_js( __( 'Testing connection...', 'email-sync-between-woo-and-cm' ) ) . "';

                    fetch(ajaxurl, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: 'action=esbwacm_test_connection'
                    })
                    .then(response => response.json())
                    .then(data => {
                        statusElement.innerHTML = data.message;
                    })
                    .catch(error => {
                        statusElement.innerHTML = '" . esc_js( __( 'An error occurred.', 'email-sync-between-woo-and-cm' ) ) . "';
                    });
                });
            });
        })();
    ";

    wp_add_inline_script( 'esbwacm-admin-script', $inline_js );
}
add_action( 'admin_enqueue_scripts', 'esbwacm_enqueue_admin_scripts' );

/**
 * WooCommerce hook for 'Processing' order status: add customer to Campaign Monitor.
 */
function esbwacm_add_customer_to_campaign_monitor( $order_id ) {
    $order = wc_get_order( $order_id );
    if ( ! $order ) {
        return false;
    }

    $email      = $order->get_billing_email();
    $first_name = $order->get_billing_first_name();
    $last_name  = $order->get_billing_last_name();

    $api_key = get_option( 'esbwacm_api_key' );
    $list_id = get_option( 'esbwacm_list_id' );

    if ( ! $api_key || ! $list_id || ! $email ) {
        error_log( '[ESBWACM] Missing API Key, List ID, or email. Sync stopped.' );
        return false;
    }

    $url  = 'https://api.createsend.com/api/v3.3/subscribers/' . $list_id . '.json';
    $data = json_encode(
        array(
            'EmailAddress'   => $email,
            'Name'           => trim( $first_name . ' ' . $last_name ),
            'Resubscribe'    => true,
            'ConsentToTrack' => 'Yes',
        )
    );

    $response = wp_remote_post(
        $url,
        array(
            'body'    => $data,
            'headers' => array(
                'Authorization' => 'Basic ' . base64_encode( $api_key . ':x' ),
                'Content-Type'  => 'application/json',
            ),
        )
    );

    if ( is_wp_error( $response ) ) {
        error_log( '[ESBWACM] API Error: ' . $response->get_error_message() );
        return false;
    } else {
        $response_code = wp_remote_retrieve_response_code( $response );
        return ( 201 === $response_code );
    }
}
add_action( 'woocommerce_order_status_processing', 'esbwacm_add_customer_to_campaign_monitor' );

/**
 * AJAX test connection function.
 */
function esbwacm_test_connection_ajax() {
    $api_key = get_option( 'esbwacm_api_key' );
    $list_id = get_option( 'esbwacm_list_id' );

    if ( empty( $api_key ) || empty( $list_id ) ) {
        wp_send_json( array( 'message' => __( 'API Key or List ID is missing. Please fill in both fields.', 'email-sync-between-woo-and-cm' ) ), 400 );
    }

    // Try a processing order first; if none found, fallback to completed.
    $order = wc_get_orders( array( 'status' => 'processing', 'limit' => 1, 'orderby' => 'date', 'order' => 'DESC' ) );
    if ( empty( $order ) ) {
        $order = wc_get_orders( array( 'status' => 'completed', 'limit' => 1, 'orderby' => 'date', 'order' => 'DESC' ) );
    }

    if ( ! empty( $order ) ) {
        $success = esbwacm_add_customer_to_campaign_monitor( $order[0]->get_id() );
        if ( $success ) {
            wp_send_json( array( 'message' => __( 'Test successful! Last order synced. Please check your list in 1-2 minutes.', 'email-sync-between-woo-and-cm' ) ) );
        } else {
            wp_send_json( array( 'message' => __( 'Failed to sync the last order. Please check your API Key and List ID.', 'email-sync-between-woo-and-cm' ) ), 400 );
        }
    } else {
        wp_send_json( array( 'message' => __( 'No orders found.', 'email-sync-between-woo-and-cm' ) ), 400 );
    }
}
add_action( 'wp_ajax_esbwacm_test_connection', 'esbwacm_test_connection_ajax' );

