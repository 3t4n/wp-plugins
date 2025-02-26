<?php
/**
Plugin Name: Remove Scripts & Styles
Description: Remove scripts & styles in specific pages
Author: Gambit Technologies, Inc
Version: 1.0
Author URI: http://gambit.ph
Plugin URI: https://wordpress.org/plugins/remove-scripts-styles
Text Domain: remove-script
Domain Path: /languages
 *
 * The main plugin file.
 *
 * @package Custom Admin
 */

if ( ! defined( 'ABSPATH' ) ) { exit; // Exit if accessed directly.
}

// Identifies the current plugin version.
defined( 'VERSION_REMOVE_SCRIPTS' ) || define( 'VERSION_REMOVE_SCRIPTS', '0.1' );

// Initializes plugin class.
if ( ! class_exists( 'G_Remove_Scripts' ) ) {

	/**
	 * Initializes core plugin that is readable by WordPress.
	 *
	 * @return void
	 * @since 1.0
	 */
	class G_Remove_Scripts {

		/**
		 * Hook into WordPress.
		 *
		 * @return	void
		 * @since	1.0
		 */
		function __construct() {

            require_once( 'acf.php' );
            add_action( 'wp_enqueue_scripts', array( $this, 'dequeue_scripts' ), 999 );
        }

        public function dequeue_scripts() {
            if ( function_exists( 'get_field' ) ) {

                $handle_string = get_field( 'dequeue_scripts' );
                $handles = explode( "\n", $handle_string );
                foreach ( $handles as $handle ) {
                    $handle = trim( $handle );
                    if ( wp_script_is( $handle, 'registered' ) ) {
                        wp_deregister_script( $handle );
                    }
                    if ( wp_script_is( $handle, 'enqueued' ) ) {
                        wp_dequeue_script( $handle );
                    }
                }

                $handle_string = get_field( 'dequeue_styles' );
                $handles = explode( "\n", $handle_string );
                foreach ( $handles as $handle ) {
                    $handle = trim( $handle );
                    if ( wp_style_is( $handle, 'registered' ) ) {
                        wp_deregister_style( $handle );
                    }
                    if ( wp_style_is( $handle, 'enqueued' ) ) {
                        wp_dequeue_style( $handle );
                    }
                }
            }
        }
    }

    new G_Remove_Scripts();
}

/**
 * Checks if the ACF plugin is activated
 *
 * @since 1.0.0
 * 
 * @see https://github.com/DevinVinson/WordPress-Plugin-Boilerplate/issues/468
 */
function grs_activate_acf() {
    if ( ! function_exists( 'is_plugin_active_for_network' ) ) {
        include_once( ABSPATH . '/wp-admin/includes/plugin.php' );
    }
    if ( current_user_can( 'activate_plugins' ) && ! function_exists( 'get_field' ) ) {
        // Deactivate the plugin.
        deactivate_plugins( plugin_basename( __FILE__ ) );
        // Throw an error in the WordPress admin console.
        $error_message = '<p style="font-family:-apple-system,BlinkMacSystemFont,\'Segoe UI\',Roboto,Oxygen-Sans,Ubuntu,Cantarell,\'Helvetica Neue\',sans-serif;font-size: 13px;line-height: 1.5;color:#444;">' . esc_html__( 'This plugin requires ', 'remove-script' ) . '<a href="' . esc_url( 'https://wordpress.org/plugins/advanced-custom-fields/' ) . '">Advanced Custom Fields</a>' . esc_html__( ' plugin to be active.', 'remove-script' ) . '</p>';
        die( $error_message ); // WPCS: XSS ok.
    }
  }
  register_activation_hook( __FILE__, 'grs_activate_acf' );
  