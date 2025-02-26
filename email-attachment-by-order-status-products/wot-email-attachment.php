<?php
/*
Plugin Name:    Email Attachment by Order Status & Products
Plugin URI:     https://wordpress.org/plugins/email-attachment-by-order-status-products/
Description:    Send custom attachment for default woocommerce email by order status and products
Version:        1.0.1
Author:         WebOccult Technologies Pvt Ltd
Author URI:     https://www.weboccult.com
Text Domain:    email-attachment-by-order-status-products
Domain Path:    /languages
*/

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    add_action( 'admin_init', 'wot_ea_activation_failure' );
}
function wot_ea_activation_failure() {
    deactivate_plugins( plugin_basename( __FILE__ ) );
}
add_action( 'admin_notices', 'wot_ea_activation_failure_admin_notice' );
function wot_ea_activation_failure_admin_notice() {
    unset( $_GET['activate'] );
    if ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
        ?>
        <div class="notice notice-error is-dismissible">
            <p><?php esc_html_e( 'WooCommerce is not activated, Please activate WooCommerce first to activate Email Attachment by Order Status or Products.', 'email-attachment' ); ?></p>
        </div>

        <?php
    }
}

if( !defined( 'WOTEA_DIR' ) ) {
    define('WOTEA_DIR', dirname( __FILE__ ) ); // plugin dir
}
if( !defined( 'WOTEA_URL' ) ) {
    define('WOTEA_URL', plugin_dir_url( __FILE__ ) ); // plugin url
}
if( !defined('WOTEA_BASENAME') ){
    define('WOTEA_BASENAME', 'wot-email-attachment');  // plugin base name
}
if( !defined( 'WOTEA_ADMIN_DIR' ) ) {
    define('WOTEA_ADMIN_DIR', WOTEA_DIR . '/backend' ); // plugin admin dir
}
if( !defined( 'WOTEA_ADMIN_URL' ) ) {
    define('WOTEA_ADMIN_URL', WOTEA_URL . 'backend' ); // plugin admin url
}
if( !defined( 'WOTEA_FRONT_DIR' ) ) {
    define('WOTEA_FRONT_DIR', WOTEA_DIR . '/frontend' ); // plugin frontend dir
}
if( !defined( 'WOTEA_FRONT_URL' ) ) {
    define('WOTEA_FRONT_URL', WOTEA_URL . 'frontend' ); // plugin frontend url
}
if( !defined( 'WOTEA_META_PREFIX' ) ) {
    define( 'WOTEA_PREFIX', '_WOTEA_' ); // meta box prefix
}


//include custom function file for backend
include WOTEA_ADMIN_DIR . '/wot-email-attachment-backend-custom-functions.php';

//include custom function file for frontend
include WOTEA_FRONT_DIR . '/wot-email-attachment-frontend-custom-functions.php';

function wot_ea_load_textdomain() {

    load_plugin_textdomain( 'email-attachment-by-order-status-products', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

}
add_action( 'init', 'wot_ea_load_textdomain' );

/**
 * Activation Hook
 *
 * Register plugin activation hook.
 */
register_activation_hook( __FILE__, 'wot_ea_install' );

/**
 * Deactivation Hook
 *
 * Register plugin deactivation hook.
 */
register_deactivation_hook( __FILE__, 'wot_ea_deactivate' );

/**
 * Uninstall Hook
 *
 * Register plugin deactivation hook.
 */
register_uninstall_hook ( __FILE__, 'wot_ea_uninstall' );

/**
 * Plugin Setup (On Activation)
 *
 * Does the initial setup,
 * stest default values for the plugin options.
 */
function wot_ea_install() {
    
    

    //IMP Call of Function
    //Need to call when custom post type is being used in plugin
    flush_rewrite_rules();
}

/**
 * Plugin Setup (On Deactivation)
 *
 * Delete plugin options.
 */
function wot_ea_deactivate() {
    
    
}
/**
 * Plugin Setup (On Uninstall)
 *
 * Delete plugin options.
 */
function wot_ea_uninstall() {
    
}
?>