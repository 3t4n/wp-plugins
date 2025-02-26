<?php
/**
 * Class AWRPG_Admin_Enqueue
 *
 * This file contains functions responsible for enqueuing styles and scripts for
 * the WP admin sections of the "Awesome Responsive Photo Gallery" plugin.
 * Proper enqueuing ensures that the required assets are loaded only where necessary,
 * enhancing performance and maintaining a seamless user experience.
 *
 * @package Awesome Responsive Photo Gallery - v1.2 - 12 January, 2025
 * @author Realwebcare
 * @link https://www.realwebcare.com/
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if(!class_exists('AWRPG_Admin_Enqueue')) {
    class AWRPG_Admin_Enqueue {

        public function __construct() {
            // Enqueuing admin scripts and styles
            add_action( 'admin_enqueue_scripts', array( $this, 'awrpg_admin_adding_style' ) );
        }

        public function awrpg_admin_adding_style() {
            // Checking whether the current user has the specified capability
			if ( !current_user_can( 'manage_options' ) ) {
				wp_die( __('Unauthorized Access!', 'awesome-responsive-photo-gallery') );
			}

            $awrpg_ver = '1.0.5';

            // Enqueuing scripts
            wp_enqueue_script( 'awrpg-admin', AWRPG_PLUGIN_URL . 'assets/js/awrpg-admin.js', array('jquery', 'quicktags'), $awrpg_ver, true );
            wp_enqueue_script( 'jquery-ui-tabs' );
            wp_enqueue_script( 'jquery-ui-accordion' );
            wp_enqueue_script( 'wp-color-picker' );

            // Generates a unique nonce code
            $nonce = wp_create_nonce( 'awrpg_ajax_action_nonce' );

            // Registering scripts with data for a JavaScript variable
            wp_localize_script( 'awrpg-admin', 'awrpgajax', array(
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
                'nonce' => $nonce,
                'process_message' => __('Gallery are being loaded. Please wait...', 'awesome-responsive-photo-gallery'),
                'process_success' => __('Gallery loaded successfully! Redirecting...', 'awesome-responsive-photo-gallery'),
                'update_gallery'  => __('Update is being processed. Please wait...', 'awesome-responsive-photo-gallery'),
                'update_success'  => __('Update completed successfully!', 'awesome-responsive-photo-gallery'),
                'deleting_message'	=> __('Deleting the gallery. Please wait...', 'awesome-responsive-photo-gallery'),
                'deleting_success'	=> __('Gallery deleted successfully! Reloading...', 'awesome-responsive-photo-gallery'),
                'error_message' => __('An error occurred. Please try again.', 'awesome-responsive-photo-gallery'),
                'loading_image' => AWRPG_PLUGIN_URL . 'assets/images/ajax-loader.gif',
            ) );

            wp_enqueue_media(); // Enqueue the necessary scripts and styles for the media uploader

            // Enqueuing styles
            wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_style( 'jquery-ui-awrpg', AWRPG_PLUGIN_URL . 'assets/css/awrpg-jquery-ui.css', '', $awrpg_ver );
            wp_enqueue_style( 'awrpg-admin', AWRPG_PLUGIN_URL . 'assets/css/awrpg-admin.css', '', $awrpg_ver );
        }
    }
}

new AWRPG_Admin_Enqueue();