<?php
/**
* Plugin Name: Estimated Delivery Date Per Product For Woocommerce
* Description: This plugin allows you to Create Estimated Shipping Date Per Product in WooCommerce.
* Version: 1.0
* Copyright: 2023
* Text Domain: estimated-shipping-date-per-product-for-woocommerce
* Domain Path: /languages 
*/

if (!defined('ABSPATH')) {
  die('-1');
}
if (!defined('ESDPPFW_PLUGIN_DIR')) {
    define('ESDPPFW_PLUGIN_DIR', plugin_dir_path(__FILE__));
}
if (!defined('ESDPPFW_PLUGIN_URL')) {
  define('ESDPPFW_PLUGIN_URL',plugins_url('', __FILE__));
}

include_once(ESDPPFW_PLUGIN_DIR . 'includes/admin.php');
include_once(ESDPPFW_PLUGIN_DIR . 'includes/frontend.php');

add_action( 'wp_enqueue_scripts',  'ESDPFW_load_script_style_front');
function ESDPFW_load_script_style_front() {
    wp_enqueue_script( 'ESDPFW_front_script', ESDPPFW_PLUGIN_URL . '/public/js/design.js',array("jquery") ,'1.0.0',true);
    wp_localize_script('ESDPFW_front_script', 'product_estdate', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'delivry_date' => get_post_meta(get_the_id(),'est_date_delivry_time',true),
        'delvry_time_outstock' => get_post_meta(get_the_id(),'delvry_time_outstock',true),
        'delvry_time_backorder' => get_post_meta(get_the_id(),'delvry_time_backorder',true),
    ));
    wp_enqueue_style( 'ESDPFW_front_style', ESDPPFW_PLUGIN_URL . '/public/css/design.css', false, '1.0.0' );
}

add_action( 'admin_enqueue_scripts','ESDPFW_loadAdminScriptStyle');
function ESDPFW_loadAdminScriptStyle() {
    if( is_admin() && isset( $_GET['page'] ) && $_GET['page'] === 'product-estdate' ){
        wp_enqueue_script( 'ESDPFW_front_script', ESDPPFW_PLUGIN_URL . '/admin/js/design.js',array("jquery") ,'1.0.0',true);
        wp_enqueue_style( 'ESDPFW-admin-style', ESDPPFW_PLUGIN_URL . '/admin/css/design.css', false, '1.0.0' );
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'wp-color-picker-alpha', ESDPPFW_PLUGIN_URL . '/admin/js/wp-color-picker-alpha.js', array( 'wp-color-picker' ), '1.0.0', true );
    }
}

// Check plugin activted or not
add_action('admin_init', 'esdppfw_check_plugin_state');
function esdppfw_check_plugin_state() {
    if ( ! ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) ) {
        set_transient( get_current_user_id() . 'edwerror', 'message' );
    }
}

// Show admin notice for plugin require
add_action( 'admin_notices', 'esdppfw_show_notice');
function esdppfw_show_notice() {

    if ( get_transient( get_current_user_id() . 'edwerror' ) ) {
        deactivate_plugins( plugin_basename(__FILE__) );

        delete_transient( get_current_user_id() . 'edwerror' );

        echo '<div class="error"><p> This plugin is deactivated because it require <a href="plugin-install.php?tab=search&s=woocommerce">WooCommerce</a> plugin installed and activated.</p></div>';
    }
}
