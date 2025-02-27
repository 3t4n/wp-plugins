<?php

/**
 * Plugin Name: Linkt
 * Version: 2.0.1
 * Plugin URI: https://kairaweb.com/wordpress-plugins/linkt/
 * Description: Simplify link management and tracking with Linkt, the ultimate WordPress plugin for tracking, categorizing, and analyzing your website URLs.
 * Author: Kaira
 * Author URI: https://kairaweb.com/
 * Requires at least: 5.0
 * Tested up to: 6.7
 * Text Domain: linkt
 * Domain Path: /lang/
 *
 * @package linkt
 */
defined( 'ABSPATH' ) || exit;
if ( !defined( 'LINKT_PLUGIN_VERSION' ) ) {
    define( 'LINKT_PLUGIN_VERSION', '2.0.1' );
}
if ( !defined( 'LINKT_DB_VERSION' ) ) {
    define( 'LINKT_DB_VERSION', '1.0.0' );
}
if ( !defined( 'LINKT_PLUGIN_URL' ) ) {
    define( 'LINKT_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}
if ( !defined( 'LINKT_PLUGIN_DIR' ) ) {
    define( 'LINKT_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}
if ( function_exists( 'linkt_fs' ) ) {
    linkt_fs()->set_basename( false, __FILE__ );
} else {
    if ( !function_exists( 'linkt_fs' ) ) {
        // Create a helper function for easy SDK access.
        function linkt_fs() {
            global $linkt_fs;
            if ( !isset( $linkt_fs ) ) {
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/freemius/start.php';
                $linkt_fs = fs_dynamic_init( array(
                    'id'             => '14927',
                    'slug'           => 'linkt',
                    'premium_slug'   => 'linkt-pro',
                    'type'           => 'plugin',
                    'public_key'     => 'pk_e62e597dbc56a901b3ed3fca29dac',
                    'is_premium'     => false,
                    'premium_suffix' => 'Pro',
                    'has_addons'     => false,
                    'has_paid_plans' => true,
                    'menu'           => array(
                        'slug'    => 'edit.php?post_type=linkt',
                        'contact' => false,
                        'support' => false,
                    ),
                    'is_live'        => true,
                ) );
            }
            return $linkt_fs;
        }

        // Init Freemius.
        linkt_fs();
        // Signal that SDK was initiated.
        do_action( 'linkt_fs_loaded' );
    }
    require_once 'classes/class-scripts.php';
    require_once 'classes/class-admin.php';
    require_once 'classes/class-frontend.php';
    require_once 'classes/class-rest-api.php';
    require_once 'classes/class-notices.php';
    /**
     * Main instance of Linkt_Admin to prevent the need to use globals
     *
     * @since  1.0.0
     * @return object Linkt_Admin
     */
    function linkt() {
        $instance = Linkt::instance( __FILE__, LINKT_PLUGIN_VERSION );
        return $instance;
    }

    linkt();
}