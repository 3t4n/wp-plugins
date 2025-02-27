<?php
/**
 * Plugin Name: AI for Home Services
 * Description: Easily embed OC Studio widgets into your Wordpress site.
 * Version:     1.1.1
 * Author:      XAPP AI
 * Text Domain: oc-studio-integration
 *
 * @package oc-studio-integration
 */

namespace XAPP;

// Define constants.
define( 'XAPP_INTEGRATION_PATH', dirname( __FILE__ ) );
define( 'XAPP_INTEGRATION_URL', plugin_dir_url( __FILE__ ) );
define( 'XAPP_INTEGRATION_VERSION', '1.1.1' );

/**
 * Register block-editor-only scripts.
 */
function enqueue_search_widget_button_toggle_in_toolbar() {
    wp_enqueue_script(
        'add-xapp-search-widget-toggle',
        XAPP_INTEGRATION_URL . 'build/index.js',
        [ // Required dependencies for blocks.
            'wp-blocks',
            'wp-element',
            'wp-i18n',
            'wp-compose',
            'wp-block-editor',
        ],
        filemtime( XAPP_INTEGRATION_PATH . '/build/index.js' )
    );
}
add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\\enqueue_search_widget_button_toggle_in_toolbar' );

/**
 * Register admin-only scripts and styles.
 *
 * @return void
 */
function enqueue_admin_scripts_and_styles() {

    // Register and enqueue styles.
    wp_register_style(
        'xapp-plugin-admin-styles',
        XAPP_INTEGRATION_URL . 'build/admin.css',
        false,
        XAPP_INTEGRATION_VERSION
    );
    wp_enqueue_style( 'xapp-plugin-admin-styles' );

    // Enqueue scripts.
    wp_enqueue_script(
        'xapp-plugin-admin-scripts',
        XAPP_INTEGRATION_URL . 'build/admin.js',
        false,
        XAPP_INTEGRATION_VERSION
    );
}
add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\\enqueue_admin_scripts_and_styles' );

/**
 * Register submenu settings page.
 *
 * @return void
 */
function add_menu_page() {
    add_submenu_page(
        'tools.php',
        __( 'OC Studio Settings', 'oc-studio-integration' ),
        __( 'OC Studio Settings', 'oc-studio-integration' ),
        'manage_options',
        'oc-studio-integration',
        function() {
            include XAPP_INTEGRATION_PATH . '/template-parts/admin-settings-page.php';
        }
    );

    // adds the page to the settings menu
    add_options_page(
        'XAPP AI Settings',
        'XAPP AI',
        'manage_options',
        'xapp-ai-settings',
        function() {
            include XAPP_INTEGRATION_PATH . '/template-parts/admin-settings-page.php';
        }
    );
}
add_action( 'admin_menu', __NAMESPACE__ . '\\add_menu_page' );


/**
 * Register settings.
 *
 * @return void
 */
function register_settings() {
    register_setting( 'oc-studio-integration-settings-group', 'xapp_chat_widget_key' );
    register_setting( 'oc-studio-integration-settings-group', 'xapp_form_widget_key' );
    register_setting( 'oc-studio-integration-settings-group', 'xapp_search_widget_key' );
}
add_action( 'admin_init', __NAMESPACE__ . '\\register_settings' );

/**
 * Render widgets on the frontend.
 *
 * @return void
 */
function render_widgets() {

    /**
     * Enqueue the chat widget.
     */
    $xapp_chat_widget_key = (string) get_option( 'xapp_chat_widget_key' );
    if ( ! empty( $xapp_chat_widget_key ) ) {
        wp_enqueue_script(
            'xapp',
            esc_url( 'https://widget.xapp.ai/xapp-chat-widget.js?key=' . $xapp_chat_widget_key ),
            false,
            XAPP_INTEGRATION_VERSION,
            true
        );
    }

    /**
     * Enqueue the form widget
     */
    $xapp_form_widget_key = (string) get_option( 'xapp_form_widget_key' );
     if ( ! empty( $xapp_form_widget_key ) ) {
        wp_enqueue_script(
            'xapp-form',
            esc_url( 'https://form.xapp.ai/xapp-form-widget.js?key=' . $xapp_form_widget_key ),
            false,
            XAPP_INTEGRATION_VERSION,
            true
        );
    }

    /**
     * Enqueue the search widget
     */
    $xapp_search_widget_key = (string) get_option( 'xapp_search_widget_key' );
    if ( ! empty( $xapp_chat_widget_key ) ) {
        wp_enqueue_script(
            'xapp-search',
            esc_url( 'https://search.xapp.ai/xapp-search-bar.js?key=' . $xapp_search_widget_key ),
            false,
            XAPP_INTEGRATION_VERSION,
            true
        );
    }

}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\render_widgets' );
