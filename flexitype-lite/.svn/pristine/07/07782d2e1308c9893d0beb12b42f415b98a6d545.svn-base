<?php
// Exit if accessed directly 
if ( ! defined( 'ABSPATH' ) ) exit; 


if ( ! did_action( 'elementor/loaded' ) ) {
    // Hook into admin notices to show the message
    add_action( 'admin_notices', 'flexitype_elementor_notice' );

    function flexitype_elementor_notice() {
        $plugin = 'elementor/elementor.php';
        
        if ( file_exists( WP_PLUGIN_DIR . '/' . $plugin ) ) {
            $activation_url = wp_nonce_url(
                'plugins.php?action=activate&plugin=' . $plugin . '&plugin_status=all&paged=1&s', 
                'activate-plugin_' . $plugin
            );

            $message = '<p>' . esc_html__( 'Flexitype Lite requires the Elementor plugin, but it is currently not active.', 'flexitype-lite' ) . '</p>';
            $message .= '<p>' . sprintf(
                '<a href="%s" class="button-primary">%s</a>',
                esc_url( $activation_url ),
                esc_html__( 'Activate Elementor Now', 'flexitype-lite' )
            ) . '</p>';
        } else {
            $install_url = wp_nonce_url(
                self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ),
                'install-plugin_elementor'
            );

            $message = '<p>' . esc_html__( 'Flexitype Lite requires the Elementor plugin, but it is currently not installed.', 'flexitype-lite' ) . '</p>';
            $message .= '<p>' . sprintf(
                '<a href="%s" class="button-primary">%s</a>',
                esc_url( $install_url ),
                esc_html__( 'Install Elementor Now', 'flexitype-lite' )
            ) . '</p>';
        }

        echo '<div class="notice notice-error flexitype-lite-notice">' . wp_kses_post( $message ) . '</div>';
    }
}
