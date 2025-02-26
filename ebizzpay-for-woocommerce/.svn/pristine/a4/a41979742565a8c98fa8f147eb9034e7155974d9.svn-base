<?php
/**
 * Plugin Name:       EbizzPay for WooCommerce
 * Description:       Accept payments on WooCommerce using EbizzPay.
 * Version:           1.0.0
 * Requires at least: 4.6
 * Requires PHP:      7.0
 * Author:            EbizzPay
 * Author URI:        https://ebizzpay.com/
 * License:           GPLv2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       ebizzpay-wc
 */

if ( !defined( 'ABSPATH' ) ) exit;

if ( class_exists( 'EbizzPay_WC' ) ) return;

define( 'EBIZZPAY_WC_FILE', __FILE__ );
define( 'EBIZZPAY_WC_URL', plugin_dir_url( EBIZZPAY_WC_FILE ) );
define( 'EBIZZPAY_WC_PATH', plugin_dir_path( EBIZZPAY_WC_FILE ) );
define( 'EBIZZPAY_WC_BASENAME', plugin_basename( EBIZZPAY_WC_FILE ) );
define( 'EBIZZPAY_WC_VERSION', '1.0.0' );

// Plugin core class
require( EBIZZPAY_WC_PATH . 'includes/class-ebizzpay-wc.php' );
