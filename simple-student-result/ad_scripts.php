<?php
// ad_scripts.php

/**
 * Enqueue Front-end and Admin Scripts and Styles
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue Front-end Scripts and Styles
 */
function ssr_enqueue_frontend_scripts() {
    // Enqueue Front-end Styles
    wp_enqueue_style(
        'ssr_frontend_style',
        SSR_plugin_url( 'css/ssr_style.css' ),
        array(),
        SSR_VERSION,
        'all'
    );

    // Enqueue Front-end Scripts
    wp_enqueue_script(
        'ssr_frontend_js',
        SSR_plugin_url( 'js/ssr_scripts_front.js' ),
        array( 'jquery' ),
        SSR_VERSION,
        true // Load in footer
    );

    // Localize Script with AJAX URL and REST API root
    wp_localize_script(
        'ssr_frontend_js',
        'SSR_Ajax',
        array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'root'    => esc_url_raw( rest_url() ),
            // 'nonce' is not necessary for public endpoints
        )
    );
}
add_action( 'wp_enqueue_scripts', 'ssr_enqueue_frontend_scripts' );

/**
 * Enqueue Admin Scripts and Styles
 */
function ssr_enqueue_admin_scripts( $hook ) {
    // Check for specific admin pages
    if ( isset( $_GET['page'] ) ) {
        $page = sanitize_text_field( $_GET['page'] );

        $allowed_pages = array( 'ssr_add_results', 'ssr_settings', 'ssr_all_entries', 'SSR' );

        if ( in_array( $page, $allowed_pages, true ) ) {
            // Enqueue Media Uploader
            wp_enqueue_media();

            // Enqueue Admin JavaScript
            wp_enqueue_script(
                'ssr_admin_js',
                SSR_plugin_url( 'js/ssr_scripts.js' ),
                array( 'jquery', 'jquery-ui-core' ),
                SSR_VERSION,
                true // Load in footer
            );

            // Enqueue Additional Admin Scripts
            wp_enqueue_script(
                'zebra_dialog_js',
                SSR_plugin_url( 'js/zebra_dialog.js' ),
                array( 'jquery' ),
                '1.3.8',
                true
            );

            wp_enqueue_script(
                'jquery_ui_shake',
                SSR_plugin_url( 'js/jquery-ui_shake_pack.min.js' ),
                array( 'jquery' ),
                '1.11.1',
                true
            );

            // Enqueue Admin Styles
            wp_enqueue_style(
                'ssr_zebra_dialog_css',
                SSR_plugin_url( 'css/zebra_dialog.css' ),
                array(),
                '1.3.8'
            );

            wp_enqueue_style(
                'ssr_admin_css',
                SSR_plugin_url( 'css/admin-style.css' ),
                array(),
                SSR_VERSION
            );

            // Specific Styles for 'SSR' Page
            if ( 'SSR' === $page ) {
                wp_enqueue_style(
                    'ssr_viewst_css',
                    SSR_plugin_url( 'css/ssr_viewst.css' ),
                    array(),
                    SSR_VERSION
                );
            }

            // Specific Scripts for 'ssr_all_entries' Page
            if ( 'ssr_all_entries' === $page ) {
                wp_enqueue_script(
                    'ssr_jquery_ui_column',
                    SSR_plugin_url( 'js/jquery.columns-1.0.min.js' ),
                    array( 'jquery' ),
                    '1.0.0',
                    true
                );
            }

            // Common Admin Styles
            wp_enqueue_style(
                'ssr_admin_others_css',
                SSR_plugin_url( 'css/others.css' ),
                array(),
                SSR_VERSION
            );

            // Localize Admin Script with AJAX URL and Nonce
            wp_localize_script(
                'ssr_admin_js',
                'ssrSettings',
                array(
                    'restRoot' => esc_url_raw( rest_url() ),
                    'nonce'    => wp_create_nonce( 'wp_rest' )
                )
            );
        }
    }
}
add_action( 'admin_enqueue_scripts', 'ssr_enqueue_admin_scripts' );

/**
 * Enqueue Additional Admin Scripts on Initialization
 */
function ssr_enqueue_additional_admin_scripts() {
    // jQuery UI Core is already enqueued as a dependency in 'ssr_admin_js'
}
add_action( 'admin_init', 'ssr_enqueue_additional_admin_scripts' );
?>
