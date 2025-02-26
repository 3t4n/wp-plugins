<?php
/**
 * Plugin Name: Daily Snapshot for WooCommerce Admin
 * Plugin URI: https://makewebbetter.com/product/daily-snapshot-for-woocommerce-admin
 * Description: Recieve a snapshot of past 24 hours for your WooCommerce Store Reportings.
 * Author: MakeWebBetter
 * Author URI: https://makewebbetter.com/
 * Text Domain: mwb-dailyss
 * Domain Path: /languages
 * Version: 1.0.1
 * WC requires at least: 3.6.0
 * WC tested up to: 3.6.2
 *
 */

if ( ! defined( 'MWB_DSS_WC_ADMIN_ABSPATH' ) ) {
	define( 'MWB_DSS_WC_ADMIN_ABSPATH', dirname( __FILE__ ) . '/' );
}

if ( ! defined( 'MWB_DSS_WC_ADMIN_VERSION_NUMBER' ) ) {
	define( 'MWB_DSS_WC_ADMIN_VERSION_NUMBER', '1.0.1' );
}

function mwb_dss_wc_admin_dependencies_satisfied() {  
    if( defined('WC_ADMIN_APP') ){
        return true;
    }
    return false;    
}

function mwb_dss_wc_admin_plugins_notice() {
    $message = sprintf(
        /* translators: URL of WooCommerce plugin */
        __( 'The Daily Snapshots for WooCommerce Admin feature plugin requires <a href="%s">WooCommerce Admin</a> to be installed and active.', 'mwb-dailyss' ),
        'https://wordpress.org/plugins/woocommerce-admin/'
    );
    printf( '<div class="error"><p>%s</p></div>', $message ); /* WPCS: xss ok. */
}

function mwb_dss_wc_admin_plugins_loaded() {

    if ( ! mwb_dss_wc_admin_dependencies_satisfied() ) {

		add_action( 'admin_notices', 'mwb_dss_wc_admin_plugins_notice' );
		return;
    }
    
    require_once MWB_DSS_WC_ADMIN_ABSPATH . 'includes/class-mwb-dss-wc-admin.php';
}

add_action( 'plugins_loaded', 'mwb_dss_wc_admin_plugins_loaded' );

register_deactivation_hook( __FILE__, 'mwb_dss_deactivation' );

/**
 * The code that runs during plugin deactivation.
 */
if( !function_exists( 'mwb_dss_deactivation' ) ) {

    function mwb_dss_deactivation() {

        wp_clear_scheduled_hook( 'mwb_dss_wc_admin_schedule' );
    }
}

function mwb_dss_admin_settings( $actions, $plugin_file ) {

    static $plugin;

    if ( !isset( $plugin ) ) {

        $plugin = plugin_basename ( __FILE__ );
    }

    if ( $plugin == $plugin_file ) {

        $settings = array (
            'settings' => '<a href="' . admin_url ( 'admin.php?page=wc-settings&tab=mwb_dss_wc_admin' ) . '">' . esc_html__( 'Settings', 'mwb-dailyss' ) . '</a>',
        );

        $actions = array_merge ( $settings, $actions );
    }

    return $actions;
}
    
//add link for settings
add_filter ( 'plugin_action_links','mwb_dss_admin_settings', 10, 2 );

function mwb_dss_load_plugin_textdomain() {

    load_plugin_textdomain( 'mwb-dailyss', false, basename( dirname( __FILE__ ) ) . '/languages' );
}

add_action( 'plugins_loaded', 'mwb_dss_load_plugin_textdomain' );