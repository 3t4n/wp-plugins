<?php
/*
Plugin Name: WooCommerce Better Usability
Plugin URI: https://wordpress.org/plugins/woo-better-usability
Description: Improves overall WooCommerce buyer experience
Version: 1.0.55
Author: Moises Heberle
Author URI: https://pluggablesoft.com/contact
Text Domain: woo-better-usability
Domain Path: /i18n/languages/
WC requires at least: 5.0
WC tested up to: 7.0.1
*/

if ( ! defined( 'ABSPATH' ) ) exit;

defined('WBU_BASE_FILE') || define('WBU_BASE_FILE', __FILE__);
defined('WBU_LITE_INSTALLED') || define('WBU_LITE_INSTALLED', true);
defined('WBU_PLUGIN') || define('WBU_PLUGIN', plugin_basename( __FILE__));

if ( !class_exists('WBU') ) {
    include_once( 'includes/class-wbu.php' );
    WBU::boot();
}

add_action( 'before_woocommerce_init', function() {
    if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
        \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
    }
} );