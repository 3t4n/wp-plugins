<?php

/*
* Plugin Name: BIGTA - Bulk Image Title Attribute
* Description: Auto-optimize (bulk) your Image title attributes (Image title tags, title text) from page/post/product titles &/or site name or with custom instructions (Post META Box) into HTML code.
* Author: Pagup
* Version: 2.0.1
* Author URI: https://pagup.com/
* Text Domain: bulk-image-title-attribute
* Domain Path: /languages/
*/
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
/******************************************
                    Freemius Init
*******************************************/
if ( function_exists( 'bigta_fs' ) ) {
    bigta_fs()->set_basename( false, __FILE__ );
} else {
    if ( !function_exists( 'bigta_fs' ) ) {
        if ( !defined( 'BIGTA_PLUGIN_MODE' ) ) {
            define( 'BIGTA_PLUGIN_MODE', "prod" );
        }
        require 'vendor/autoload.php';
        // Create a helper function for easy SDK access.
        function bigta_fs() {
            global $bigta_fs;
            if ( !isset( $bigta_fs ) ) {
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/vendor/freemius/start.php';
                $bigta_fs = fs_dynamic_init( array(
                    'id'              => '3974',
                    'slug'            => 'bulk-image-title-attribute',
                    'type'            => 'plugin',
                    'public_key'      => 'pk_8b18bd9431acf723d6c12c5652835',
                    'is_premium'      => false,
                    'premium_suffix'  => 'PRO',
                    'has_addons'      => false,
                    'has_paid_plans'  => true,
                    'trial'           => array(
                        'days'               => 7,
                        'is_require_payment' => true,
                    ),
                    'has_affiliation' => 'all',
                    'menu'            => array(
                        'slug'       => 'bigta',
                        'first-path' => 'admin.php?page=bigta',
                        'support'    => false,
                    ),
                    'is_live'         => true,
                ) );
            }
            return $bigta_fs;
        }

        // Init Freemius.
        bigta_fs();
        // Signal that SDK was initiated.
        do_action( 'bigta_fs_loaded' );
        function bigta_fs_settings_url() {
            return admin_url( 'admin.php?page=bigta&tab=bigta-settings' );
        }

        bigta_fs()->add_filter( 'connect_url', 'bigta_fs_settings_url' );
        bigta_fs()->add_filter( 'after_skip_url', 'bigta_fs_settings_url' );
        bigta_fs()->add_filter( 'after_connect_url', 'bigta_fs_settings_url' );
        bigta_fs()->add_filter( 'after_pending_connect_url', 'bigta_fs_settings_url' );
    }
    // freemius opt-in
    function bigta_fs_custom_connect_message(
        $message,
        $user_first_name,
        $product_title,
        $user_login,
        $site_link,
        $freemius_link
    ) {
        $break = "<br><br>";
        return sprintf( esc_html__( 'Hey %1$s, %2$s Click on Allow & Continue to start auto-optimizing your image title attributes for SEO purpose on Google images and to improve user experience (UX). %2$s Never miss an important update -- opt-in to our security and feature updates notifications. %2$s See you on the other side.', 'bulk-image-title-attribute' ), $user_first_name, $break );
    }

    bigta_fs()->add_filter(
        'connect_message',
        'bigta_fs_custom_connect_message',
        10,
        6
    );
    class bigta {
        function __construct() {
            register_deactivation_hook( __FILE__, array(&$this, 'deactivate') );
            $plugin = plugin_basename( __FILE__ );
            add_filter( "plugin_action_links_{$plugin}", array(&$this, 'setting_link') );
            add_action( 'init', array(&$this, 'bigta_textdomain') );
        }

        public function deactivate() {
            if ( \Pagup\Bigta\Core\Option::check( 'remove_settings' ) ) {
                delete_option( 'bigta' );
            }
        }

        function setting_link( $links ) {
            $settings_link = '<a href="admin.php?page=bigta">Settings</a>';
            array_unshift( $links, $settings_link );
            return $links;
        }

        // register options
        function bigta_options() {
            $bigta_options = get_option( 'bigta' );
            return $bigta_options;
        }

        // end function bigta_options()
        function bigta_textdomain() {
            load_plugin_textdomain( "bulk-image-title-attribute", false, basename( dirname( __FILE__ ) ) . '/languages' );
        }

    }

    $bigta = new bigta();
    /*-----------------------------------------
                  DOM CONTROLLER
      ------------------------------------------*/
    require_once 'admin/controllers/DomController.php';
    /*-----------------------------------------
                      Settings
      ------------------------------------------*/
    if ( is_admin() ) {
        include_once 'admin/Settings.php';
    }
}