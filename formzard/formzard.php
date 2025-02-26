<?php
/**
 * Plugin Name: Formzard - Pre-designed Form Templates for Contact Form 7
 * Plugin URI: https://wordpress.org/plugins/formzard
 * Description: Contact Form 7 Pre-designed Templates Addon - Easily add pre-built templates like job applications, event registration, and more to your Contact Form 7 forms.
 * Version: 1.1.1
 * Requires at least: 5.6
 * Requires PHP: 7.2
 * Author: Anwer Ashif
 * Author URI: https://profiles.wordpress.org/anwerashif/
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: formzard
 * Domain Path: /languages
 * Tested up to: 6.7
 */
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
// Exit if accessed directly
if ( function_exists( 'for_fs' ) ) {
    for_fs()->set_basename( false, __FILE__ );
} else {
    /**
     * DO NOT REMOVE THIS IF, IT IS ESSENTIAL FOR THE
     * `function_exists` CALL ABOVE TO PROPERLY WORK.
     */
    if ( !function_exists( 'for_fs' ) ) {
        // Create a helper function for easy SDK access.
        function for_fs() {
            global $for_fs;
            if ( !isset( $for_fs ) ) {
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/freemius/start.php';
                $for_fs = fs_dynamic_init( array(
                    'id'             => '17623',
                    'slug'           => 'formzard',
                    'premium_slug'   => 'formzard-pro',
                    'type'           => 'plugin',
                    'public_key'     => 'pk_16cc08be123e996e2ed433f9b4ad5',
                    'is_premium'     => false,
                    'premium_suffix' => 'Pro',
                    'has_addons'     => false,
                    'has_paid_plans' => true,
                    'menu'           => array(
                        'slug' => 'formzard-templates',
                    ),
                    'is_live'        => true,
                ) );
            }
            return $for_fs;
        }

        // Init Freemius.
        for_fs();
        // Signal that SDK was initiated.
        do_action( 'for_fs_loaded' );
    }
    // Define constants
    define( 'FORMZARD_ADDON_PATH', plugin_dir_path( __FILE__ ) );
    define( 'FORMZARD_ADDON_URL', plugin_dir_url( __FILE__ ) );
    // Dependency Check
    function formzard_check_dependencies() {
        if ( !function_exists( 'is_plugin_active' ) ) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }
        if ( !is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
            add_action( 'admin_notices', function () {
                echo '<div class="error"><p>';
                esc_html_e( 'Formzard requires Contact Form 7 to be installed and activated.', 'formzard' );
                echo '</p></div>';
            } );
            return;
        }
    }

    add_action( 'admin_init', 'formzard_check_dependencies' );
    // Include Files
    $includes = [
        'admin-page.php',
        'template-functions.php',
        'ajax-handler.php',
        'css-editor.php'
    ];
    foreach ( $includes as $file ) {
        $file_path = FORMZARD_ADDON_PATH . 'includes/' . $file;
        if ( file_exists( $file_path ) ) {
            require_once $file_path;
        }
    }
    // Enqueue Assets
    function formzard_enqueue_assets(  $hook  ) {
        if ( $hook !== 'toplevel_page_formzard-templates' ) {
            return;
        }
        $plugin_version = '1.0.0';
        wp_enqueue_style(
            'formzard-admin-styles',
            FORMZARD_ADDON_URL . 'assets/css/admin.css',
            [],
            $plugin_version
        );
        wp_enqueue_script(
            'formzard-scripts',
            FORMZARD_ADDON_URL . 'assets/js/admin.js',
            ['jquery'],
            $plugin_version,
            true
        );
        wp_localize_script( 'formzard-scripts', 'formzard', [
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'nonce'    => wp_create_nonce( 'formzard_import_template_nonce' ),
        ] );
    }

    // Enqueue assets
    add_action( 'admin_enqueue_scripts', 'formzard_enqueue_assets' );
}