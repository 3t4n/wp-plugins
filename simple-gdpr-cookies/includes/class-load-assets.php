<?php

namespace Smeechos\Simple_GDPR_Cookies\Includes;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Load_Assets
{
    /**
     * Load_Assets constructor.
     */
    public function __construct()
    {
        // Actions
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_styles' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_scripts' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
    }

    /**
     * Enqueue styles for the front end of the plugin.
     */
    public function enqueue_frontend_styles() {
        wp_enqueue_style(
            'simple_gdpr_cookies_frontend',
            SGC_PLUGIN_URL . 'assets/css/public/dist/styles.min.css',
            [],
            '1.0.0'
        );
    }

    /**
     * Enqueue scripts for the front end of the plugin.
     */
    public function enqueue_frontend_scripts() {
        // Register the script
        wp_register_script(
            'simple_gdpr_cookies_frontend',
            SGC_PLUGIN_URL . 'assets/js/public/dist/scripts.min.js',
            [ 'jquery' ],
            '1.0.0'
        );

        // Localize the script with new data
        $content    = get_option( 'simple_gdpr_cookies_content_settings' );
        $modal      = get_option( 'simple_gdpr_cookies_modal_settings' );
        $cookies    = get_option( 'simple_gdpr_cookies_cookie_settings' );

        $translation_array = [
            'choice'        => ($content['user_consent'] == '0') ? 'default' : 'consent',
            'dismiss'       => ($modal['dismiss_effect'] == '0') ? 'default' : 'fade',
            'num'           => $cookies['cookie_duration']['num'],
            'duration'      => $cookies['cookie_duration']['duration']
        ];
        wp_localize_script( 'simple_gdpr_cookies_frontend', 'simple_gdpr_cookies', $translation_array );

        // Enqueued script with localized data.
        wp_enqueue_script( 'simple_gdpr_cookies_frontend' );
    }

    /**
     * Enqueue styles for the admin of the plugin.
     */
    public function enqueue_admin_styles( $hook ) {
        if ( 'toplevel_page_simple_gdpr_cookies' == $hook ) {
            wp_enqueue_style( 'wp-color-picker' );

            wp_enqueue_style(
                'simple_gdpr_cookies_admin',
                SGC_PLUGIN_URL . 'assets/css/admin/dist/styles.min.css',
                [],
                '1.0.0'
            );
        }
    }

    /**
     * Enqueue scripts for the admin of the plugin.
     */
    public function enqueue_admin_scripts( $hook ) {
        if ( 'toplevel_page_simple_gdpr_cookies' == $hook ) {
            wp_enqueue_script(
                'simple_gdpr_cookies_admin',
                SGC_PLUGIN_URL . 'assets/js/admin/dist/scripts.min.js',
                [ 'jquery', 'wp-color-picker' ],
                '1.0.0',
                true
            );
        }
    }
}

new Load_Assets();