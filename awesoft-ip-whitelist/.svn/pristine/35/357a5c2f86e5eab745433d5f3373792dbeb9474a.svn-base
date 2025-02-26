<?php

/**
 * Awesoft IP Whitelist
 *
 * Plugin Name: IP Whitelist
 * Plugin URI: https://wordpress.org/plugins/awesoft-ip-whitelist/
 * Description: Whitelist specific IP addresses to access your WordPress admin site.
 * Version: 1.0.2
 * Author: Awesoft
 * Author URI: https://awesoft.dev/
 * License URI: https://awesoft.dev/license/
 * License: GPLv2 or later
 * Requires at least: 6.0
 * Requires PHP: 7.4
 */

if ( ! defined( 'ABSPATH' ) ) {
    die( 'Invalid request.' );
}

function awesoft_ip_whitelist_check() {
    $enabled = get_option( 'awesoft_ip_whitelist_enabled' );
    if ( $enabled == 'on' ) {
        $whitelist    = explode( PHP_EOL, get_option( 'awesoft_ip_whitelist_list' ) );
        $ip_addresses = [];

        if ( array_key_exists( 'HTTP_X_FORWARDED_FOR', $_SERVER ) ) {
            $ip_addresses[] = sanitize_text_field( wp_unslash( $_SERVER['HTTP_X_FORWARDED_FOR'] ) );
        }

        if ( array_key_exists( 'REMOTE_ADDR', $_SERVER ) ) {
            $ip_addresses[] = sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) );
        }

        $ip_addresses = implode( ',', $ip_addresses );
        $ip_addresses = array_unique( array_map( 'trim', explode( ',', $ip_addresses ) ) );

        if ( ! array_intersect( $ip_addresses, $whitelist ) ) {
            wp_die(
                esc_html( __( 'Sorry, you are not allowed to access this page.', 'awesoft-ip-whitelist' ) ),
                esc_html( __( 'Access Denied', 'awesoft-ip-whitelist' ) ),
                [ 'response' => 403 ],
            );
        }
    }
}

function awesoft_ip_whitelist_validate_ip( $input ): string {
    $input = trim( (string) $input );
    $ips   = array_map( 'trim', explode( PHP_EOL, $input ) );

    if ( empty( $input ) ) {
        return '';
    }

    foreach ( $ips as $ip ) {
        if ( ! filter_var( $ip, FILTER_VALIDATE_IP ) ) {
            add_settings_error(
                'awesoft_ip_whitelist_list',
                'awesoft_ip_whitelist_list_error',
                __(
                    'Invalid IP address(es) found. Please check the entered addresses.',
                    'awesoft-ip-whitelist'
                ),
            );

            return (string) $input;
        }
    }

    return implode( PHP_EOL, $ips );
}

function awesoft_ip_whitelist_validate_enabled( $input ): string {
    $input = strtolower( trim( (string) $input ) );

    return in_array( $input, [ 'on', 'off', '' ] ) ? $input : '';
}

function awesoft_ip_whitelist_options_page() {
    require __DIR__ . '/templates/options.phtml';
}

function awesoft_ip_whitelist_enabled_field() {
    require __DIR__ . '/templates/enabled.phtml';
}

function awesoft_ip_whitelist_ips_field() {
    require __DIR__ . '/templates/ips.phtml';
}

function awesoft_ip_whitelist_plugin_links( $actions, $plugin_file ) {
    if ( plugin_basename( __FILE__ ) === $plugin_file ) {
        $actions[] = sprintf(
            '<a href="%s" class="awesoft-buy-me-coffee"><span style="font-weight:bold;color:#e77f00">%s</span></a>',
            'https://buymeacoffee.com/awesoft',
            'Buy Me A Coffee',
        );
    }

    return $actions;
}

add_action( 'admin_menu', function () {
    add_options_page(
        'IP Whitelist',
        'IP Whitelist',
        'manage_options',
        'awesoft-ip-whitelist',
        'awesoft_ip_whitelist_options_page'
    );
} );
add_action( 'admin_init', function () {
    register_setting( 'awesoft_ip_whitelist', 'awesoft_ip_whitelist_enabled', 'awesoft_ip_whitelist_validate_enabled' );
    register_setting( 'awesoft_ip_whitelist', 'awesoft_ip_whitelist_list', 'awesoft_ip_whitelist_validate_ip' );

    add_settings_section( 'awesoft_ip_whitelist_section', 'Configuration', [], 'awesoft-ip-whitelist' );

    add_settings_field(
        'awesoft_ip_whitelist_enabled',
        'Status',
        'awesoft_ip_whitelist_enabled_field',
        'awesoft-ip-whitelist',
        'awesoft_ip_whitelist_section'
    );
    add_settings_field(
        'awesoft_ip_whitelist_list',
        'IP Addresses',
        'awesoft_ip_whitelist_ips_field',
        'awesoft-ip-whitelist',
        'awesoft_ip_whitelist_section'
    );
} );

add_action( 'authenticate', 'awesoft_ip_whitelist_check' );
add_action( 'admin_init', 'awesoft_ip_whitelist_check' );
add_filter( 'plugin_action_links', 'awesoft_ip_whitelist_plugin_links', 20, 2 );
