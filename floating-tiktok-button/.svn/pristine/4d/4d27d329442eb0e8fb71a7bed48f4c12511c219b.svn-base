<?php

/*
* Plugin Name: Floating TikTok Button
* Description: This plugin allows you to display a static/animated floating Tiktok logo or Tikcode (on frontend) linked to your Tiktok account to increase your Tiktok followers.
* Author: Pagup
* Version: 1.0.8
* Author URI: https://pagup.com/
* Text Domain: floating-tiktok-button
* Domain Path: /languages/
*/
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
/******************************************
                Freemius Init
*******************************************/
if ( function_exists( 'ftb__fs' ) ) {
    ftb__fs()->set_basename( false, __FILE__ );
} else {
    if ( !function_exists( 'ftb__fs' ) ) {
        if ( !defined( 'FTB_PLUGIN_BASE' ) ) {
            define( 'FTB_PLUGIN_BASE', plugin_basename( __FILE__ ) );
        }
        if ( !defined( 'FTB_PLUGIN_URL' ) ) {
            define( 'FTB_PLUGIN_URL', plugins_url( '', __FILE__ ) );
        }
        require 'vendor/autoload.php';
        // Create a helper function for easy SDK access.
        function ftb__fs() {
            global $ftb__fs;
            if ( !isset( $ftb__fs ) ) {
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/vendor/freemius/start.php';
                $ftb__fs = fs_dynamic_init( array(
                    'id'             => '8696',
                    'slug'           => 'floating-tiktok-button',
                    'type'           => 'plugin',
                    'public_key'     => 'pk_ce7e00d42820852455c830b0927a7',
                    'is_premium'     => false,
                    'premium_suffix' => 'Pro',
                    'has_addons'     => false,
                    'has_paid_plans' => true,
                    'menu'           => array(
                        'slug'       => 'floating-tiktok-button',
                        'first-path' => 'admin.php?page=floating-tiktok-button',
                        'support'    => false,
                    ),
                    'is_live'        => true,
                ) );
            }
            return $ftb__fs;
        }

        // Init Freemius.
        ftb__fs();
        // Signal that SDK was initiated.
        do_action( 'ftb__fs_loaded' );
        function ftb__fs_settings_url() {
            return admin_url( 'admin.php?page=floating-tiktok-button' );
        }

        ftb__fs()->add_filter( 'connect_url', 'ftb__fs_settings_url' );
        ftb__fs()->add_filter( 'after_skip_url', 'ftb__fs_settings_url' );
        ftb__fs()->add_filter( 'after_connect_url', 'ftb__fs_settings_url' );
        ftb__fs()->add_filter( 'after_pending_connect_url', 'ftb__fs_settings_url' );
        function ftb__fs_custom_icon() {
            return dirname( __FILE__ ) . '/admin/assets/icon.jpg';
        }

        ftb__fs()->add_filter( 'plugin_icon', 'ftb__fs_custom_icon' );
        // freemius opt-in
        function ftb__fs_custom_connect_message(
            $message,
            $user_first_name,
            $product_title,
            $user_login,
            $site_link,
            $freemius_link
        ) {
            $break = "<br><br>";
            $more_plugins = '<p><a target="_blank" href="https://wordpress.org/plugins/meta-tags-for-seo/">Meta Tags for SEO</a>, <a target="_blank" href="https://wordpress.org/plugins/automatic-internal-links-for-seo/">Auto internal links for SEO</a>, <a target="_blank" href="https://wordpress.org/plugins/bulk-image-alt-text-with-yoast/">Bulk auto image Alt Text</a>, <a target="_blank" href="https://wordpress.org/plugins/bulk-image-title-attribute/">Bulk auto image Title Tag</a>, <a target="_blank" href="https://wordpress.org/plugins/mobilook/">Mobile view</a>, <a target="_blank" href="https://wordpress.org/plugins/better-robots-txt/">Wordpress Better-Robots.txt</a>, <a target="_blank" href="https://wordpress.org/plugins/wp-google-street-view/">Wp Google Street View</a>, <a target="_blank" href="https://wordpress.org/plugins/vidseo/">VidSeo</a>, ...</p>';
            return sprintf( esc_html__( 'Hey %1$s, %2$s Click on Allow & Continue to optimize your Floating Tiktok button. %2$s Never miss an important update -- opt-in to our security and feature updates notifications. %2$s See you on the other side.', 'bulk-image-title-attribute' ), $user_first_name, $break ) . $more_plugins;
        }

        ftb__fs()->add_filter(
            'connect_message',
            'ftb__fs_custom_connect_message',
            10,
            6
        );
    }
    class FloatingTiktokButton {
        function __construct() {
            register_activation_hook( __FILE__, array(&$this, 'activate') );
            register_deactivation_hook( __FILE__, array(&$this, 'deactivate') );
            add_action( 'init', array(&$this, 'ftb__textdomain') );
        }

        public function activate() {
            if ( !is_array( get_option( 'floating-tiktok-button' ) ) && ftb__fs()->can_use_premium_code__premium_only() ) {
                update_option( 'floating-tiktok-button', [
                    "enable_button"   => "button",
                    "display_on"      => 'post_pages',
                    "devices"         => "desktop_mobile",
                    "button_position" => "bottom_right",
                    "margin_right"    => 10,
                    "margin_bottom"   => 10,
                    "icon_styles"     => 'icon_style1',
                    "icon_url"        => FTB_PLUGIN_URL . '/admin/assets/icon1.svg',
                    "border_size"     => 0,
                    "button_padding"  => 5,
                    "border_radius"   => 5,
                    "font_size"       => 10,
                    "font_color"      => "#555555",
                    "border_color"    => "#cccccc",
                    "bg_color"        => "#ffffff",
                    "img_width"       => 50,
                    "img_height"      => 50,
                    "text_position"   => 'below',
                ] );
            } else {
                update_option( 'floating-tiktok-button', [
                    "enable_button"   => "button",
                    "display_on"      => 'post_pages',
                    "devices"         => "desktop_mobile",
                    "button_position" => "bottom_right",
                    "margin_right"    => 10,
                    "margin_bottom"   => 10,
                    "icon_styles"     => 'icon_style1',
                    "icon_url"        => FTB_PLUGIN_URL . '/admin/assets/icon1.svg',
                    "text_position"   => 'below',
                ] );
            }
        }

        public function deactivate() {
            if ( \Pagup\TikTokButton\Core\Option::check( 'remove_settings' ) ) {
                delete_option( 'floating-tiktok-button' );
            }
        }

        function ftb__textdomain() {
            load_plugin_textdomain( "floating-tiktok-button", false, basename( dirname( __FILE__ ) ) . '/languages' );
        }

    }

    $ftb = new FloatingTiktokButton();
    /*-----------------------------------------
                  Button CONTROLLER
      ------------------------------------------*/
    require_once 'admin/controllers/ButtonController.php';
    /*-----------------------------------------
                      Settings
      ------------------------------------------*/
    if ( is_admin() ) {
        include_once 'admin/Settings.php';
    }
}