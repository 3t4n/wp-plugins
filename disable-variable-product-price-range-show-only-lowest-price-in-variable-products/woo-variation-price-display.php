<?php
/*
 * Plugin Name: Variation Price Display For WooCommerce
 * Plugin URI: https://wordpress.org/plugins/disable-variable-product-price-range-show-only-lowest-price-in-variable-products/
 * Description: Disable Price Range and shows only the lowest price and sale price in the WooCommerce variable products.
 * Author: Tanvirul Haque
 * Version: 1.2.0
 * Author URI: https://wpxpress.net
 * Text Domain: woo-variation-price-display
 * Domain Path: /languages
 * Requires PHP: 7.4
 * Requires at least: 4.8
 * Tested up to: 6.4
 * WC requires at least: 4.5
 * WC tested up to: 8.6
 * License: GPLv2+
*/

defined( 'ABSPATH' ) or die( 'Keep Silent' );

if ( ! defined( 'WOO_VARIATION_PRICE_DISPLAY_PLUGIN_VERSION' ) ) {
    define( 'WOO_VARIATION_PRICE_DISPLAY_PLUGIN_VERSION', '1.2' );
}

if ( ! defined( 'WOO_VARIATION_PRICE_DISPLAY_PLUGIN_FILE' ) ) {
    define( 'WOO_VARIATION_PRICE_DISPLAY_PLUGIN_FILE', __FILE__ );
}

/**
 * Include plugin main class
 */
if ( ! class_exists( 'Woo_Variation_Price_Display', false ) ) {
    require_once dirname( __FILE__ ) . '/includes/class-woo-variation-price-display.php';
}

/**
 * WooCommerce require admin notice
 */
function woo_variation_price_display_wc_require_notice() {
    if ( ! class_exists( 'WooCommerce' ) ) {
        $text = esc_html__( 'WooCommerce', 'woo-variation-price-display' );
        $link = esc_url( add_query_arg(
            array(
                'tab'       => 'plugin-information',
                'plugin'    => 'woocommerce',
                'TB_iframe' => 'true',
                'width'     => '640',
                'height'    => '500',
            ),
            admin_url( 'plugin-install.php' )
        ) );

        $message = wp_kses( __( "<strong>Variation Price Display For WooCommerce</strong> is an add-on of ", 'woo-variation-price-display' ), array( 'strong' => array() ) );

        printf( '<div class="%1$s"><p>%2$s <a class="thickbox open-plugin-details-modal" href="%3$s"><strong>%4$s</strong></a></p></div>', 'notice notice-error', $message, $link, $text );
    }
}

add_action( 'admin_notices', 'woo_variation_price_display_wc_require_notice' );

/**
 * Returns the main instance.
 */
function woo_variation_price_display() {
    if ( ! class_exists( 'WooCommerce', false ) ) {
        return false;
    }

    if ( function_exists( 'woo_variation_price_display_pro' ) ) {
        return woo_variation_price_display_pro();
    }

    return Woo_Variation_Price_Display::instance();
}

add_action( 'plugins_loaded', 'woo_variation_price_display' );

/**
 * Supporting WooCommerce High-Performance Order Storage
 */
function woo_variation_price_display_hpos_compatibility() {
    if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
        \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
    }
}

add_action( 'before_woocommerce_init', 'woo_variation_price_display_hpos_compatibility' );