<?php
/**
 * Class AWRPG_Init_Functions
 *
 * This file contains functions that play a crucial role in the initial setup
 * of the "Awesome Responsive Photo Gallery" plugin. These functions handle tasks such as
 * text domain setup for translations, adding action links to the plugin settings,
 * and various other essential tasks needed when the plugin is live at the front-end.
 * It's important to understand the role of each function before making any modifications,
 * as they collectively ensure a smooth and error-free activation process.
 *
 * @package Awesome Responsive Photo Gallery - v1.2 - 12 January, 2025
 * @author Realwebcare
 * @link https://www.realwebcare.com/
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if(!class_exists('AWRPG_Init_Functions')) {
    class AWRPG_Init_Functions {

        public function __construct() {
            add_action( 'init', array( $this, 'awrpg_textdomain' ) );

            // This filter allows us to modify the action links displayed on the Plugins page
            add_filter( 'plugin_action_links_' . plugin_basename(AWRPG_AUF), array( $this, 'awrpg_plugin_actions' ) );

            // This code enable for widget shortcode support
            add_filter( 'widget_text', array( $this, 'do_shortcode' ) );
        }

        /* Internationalization */
        function awrpg_textdomain() {
            $locale = apply_filters( 'plugin_locale', get_locale(), 'awesome-responsive-photo-gallery' );
            load_textdomain( 'awesome-responsive-photo-gallery', trailingslashit( WP_PLUGIN_DIR ) . 'awesome-responsive-photo-gallery/languages/awesome-responsive-photo-gallery-' . $locale . '.mo' );
            load_plugin_textdomain( 'awesome-responsive-photo-gallery', FALSE, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
        }

        /* Add plugin action links */
        function awrpg_plugin_actions( $links ) {
            $list_gallery_url = esc_url( menu_page_url( 'awrpg-lists', false ) );
            $list_gallery_url = wp_nonce_url( $list_gallery_url, 'awrpg_setting_gallery_action' );

            $support_url = esc_url( "https://wordpress.org/support/plugin/awesome-responsive-photo-gallery" );

            $links[] = '<a href="'. $list_gallery_url .'">'. esc_html__('Gallery Lists', 'awesome-responsive-photo-gallery') .'</a>';
            $links[] = '<a href="'. $support_url .'" target="_blank">'. esc_html__('Support', 'awesome-responsive-photo-gallery') .'</a>';
            return $links;
        }
    }
}

new AWRPG_Init_Functions();