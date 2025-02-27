<?php

/*
* Plugin Name: VidSEO - Video SEO Embedder with Transcription
* Description: Vidseo plugin allows to embed your videos (Youtube, Vimeo, …) with transcription (hidden or visible) to boost your website’s SEO and get better Google Search rankings.
* Author: Pagup
* Version: 1.2.7
* Author URI: https://pagup.com/
* Text Domain: vidseo
* Domain Path: /languages/
*/
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
if ( function_exists( 'vidseo_fs' ) ) {
    vidseo_fs()->set_basename( false, __FILE__ );
} else {
    if ( !defined( 'VIDSEO_PLUGIN_BASE' ) ) {
        define( 'VIDSEO_PLUGIN_BASE', plugin_basename( __FILE__ ) );
    }
    if ( !defined( 'VIDSEO_PLUGIN_DIR' ) ) {
        define( 'VIDSEO_PLUGIN_DIR', plugins_url( '', __FILE__ ) );
    }
    require 'vendor/autoload.php';
    /******************************************
                       Freemius Init
       *******************************************/
    if ( !function_exists( 'vidseo_fs' ) ) {
        // Create a helper function for easy SDK access.
        function vidseo_fs() {
            global $vidseo_fs;
            if ( !isset( $vidseo_fs ) ) {
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/vendor/freemius/start.php';
                $vidseo_fs = fs_dynamic_init( array(
                    'id'              => '4577',
                    'slug'            => 'vidseo',
                    'type'            => 'plugin',
                    'public_key'      => 'pk_8f427527a77137d5bb8fd9c6c44cb',
                    'is_premium'      => false,
                    'has_addons'      => false,
                    'has_paid_plans'  => true,
                    'trial'           => array(
                        'days'               => 7,
                        'is_require_payment' => true,
                    ),
                    'has_affiliation' => 'all',
                    'menu'            => array(
                        'slug'       => 'settings',
                        'first-path' => 'edit.php?post_type=vidseo&page=settings',
                        'support'    => false,
                        'parent'     => array(
                            'slug' => 'edit.php?post_type=vidseo',
                        ),
                    ),
                    'is_live'         => true,
                ) );
            }
            return $vidseo_fs;
        }

        // Init Freemius.
        vidseo_fs();
        // Signal that SDK was initiated.
        do_action( 'vidseo_fs_loaded' );
        function vidseo_fs_settings_url() {
            return admin_url( 'edit.php?post_type=vidseo&page=settings' );
        }

        vidseo_fs()->add_filter( 'connect_url', 'vidseo_fs_settings_url' );
        vidseo_fs()->add_filter( 'after_skip_url', 'vidseo_fs_settings_url' );
        vidseo_fs()->add_filter( 'after_connect_url', 'vidseo_fs_settings_url' );
        vidseo_fs()->add_filter( 'after_pending_connect_url', 'vidseo_fs_settings_url' );
    }
    // freemius opt-in
    function vidseo_fs_custom_connect_message(
        $message,
        $user_first_name,
        $product_title,
        $user_login,
        $site_link,
        $freemius_link
    ) {
        $break = "<br><br>";
        $more_plugins = '<p><a target="_blank" href="https://wordpress.org/plugins/meta-tags-for-seo/">Meta Tags for SEO</a>, <a target="_blank" href="https://wordpress.org/plugins/automatic-internal-links-for-seo/">Auto internal links for SEO</a>, <a target="_blank" href="https://wordpress.org/plugins/bulk-image-alt-text-with-yoast/">Bulk auto image Alt Text</a>, <a target="_blank" href="https://wordpress.org/plugins/bulk-image-title-attribute/">Bulk auto image Title Tag</a>, <a target="_blank" href="https://wordpress.org/plugins/mobilook/">Mobile view</a>, <a target="_blank" href="https://wordpress.org/plugins/better-robots-txt/">Wordpress Better-Robots.txt</a>, <a target="_blank" href="https://wordpress.org/plugins/wp-google-street-view/">Wp Google Street View</a>, <a target="_blank" href="https://wordpress.org/plugins/vidseo/">VidSeo</a>, ...</p>';
        return sprintf( esc_html__( 'Hey %1$s, %2$s Click on Allow & Continue to boost your website’s SEO with video transcription.  %2$s Never miss an important update -- opt-in to our security and feature updates notifications. %2$s See you on the other side.', 'vidseo' ), $user_first_name, $break ) . $more_plugins;
    }

    vidseo_fs()->add_filter(
        'connect_message',
        'vidseo_fs_custom_connect_message',
        10,
        69
    );
    class Vidseo {
        function __construct() {
            register_deactivation_hook( __FILE__, array(&$this, 'deactivate') );
            add_action( 'init', array(&$this, 'vidseo_textdomain') );
        }

        public function deactivate() {
            if ( \Pagup\Vidseo\Core\Option::check( 'remove_settings' ) ) {
                delete_option( 'vidseo' );
            }
        }

        function vidseo_textdomain() {
            load_plugin_textdomain( 'vidseo', false, basename( dirname( __FILE__ ) ) . '/languages' );
        }

    }

    $vidseo = new Vidseo();
    /*-----------------------------------------
                    SHORTCODE CONTROLLER
      ------------------------------------------*/
    $shortcode = new \Pagup\Vidseo\Controllers\ShortcodeController();
    add_shortcode( 'vidseo', array(&$shortcode, 'vidseo_shortcode') );
    function vidseo_styles() {
        wp_enqueue_style(
            'vidseo_styles',
            plugin_dir_url( __FILE__ ) . 'admin/assets/vidseo.css',
            array(),
            filemtime( plugin_dir_path( __FILE__ ) . 'admin/assets/vidseo.css' )
        );
        wp_enqueue_script(
            'vidseo_script',
            plugin_dir_url( __FILE__ ) . 'admin/assets/vidseo.js',
            array('jquery'),
            filemtime( plugin_dir_path( __FILE__ ) . 'admin/assets/vidseo.js' ),
            true
        );
    }

    add_action( 'wp_enqueue_scripts', 'vidseo_styles' );
    /*-----------------------------------------
                      Settings
      ------------------------------------------*/
    if ( is_admin() ) {
        include_once \Pagup\Vidseo\Core\Plugin::path( 'admin/Settings.php' );
    }
}