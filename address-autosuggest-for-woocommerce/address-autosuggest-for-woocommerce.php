<?php
/**
 * Plugin Name: Address AutoSuggest for WooCommerce
 * Plugin URI: https://webv8.net/address-autosuggest-for-woocommerce/
 * Description: Enable Google Places API on the checkout page to autocomplete WooCommerce address fields.
 * Version: 1.4.1
 * Author: Web V8
 * Author URI: https://webv8.net
 * License: GPLv2 or later
 * Text Domain: address-autosuggest-for-woocommerce
 * Requires Plugins: woocommerce
 * Requires at least: 5.8
 * Requires PHP: 7.4
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'ADDRESS_AUTOSUGGEST_FOR_WOOCOMMERCE_VERSION', '1.1' );
define( 'ADDRESS_AUTOSUGGEST_FOR_WOOCOMMERCE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'ADDRESS_AUTOSUGGEST_FOR_WOOCOMMERCE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'ADDRESS_AUTOSUGGEST_FOR_WOOCOMMERCE_SETTINGS_OPTION', 'address_autosuggest_for_woocommerce_api_key' );

require ADDRESS_AUTOSUGGEST_FOR_WOOCOMMERCE_PLUGIN_DIR . 'includes/class-address-autosuggest-settings.php';
require ADDRESS_AUTOSUGGEST_FOR_WOOCOMMERCE_PLUGIN_DIR . 'includes/class-address-autosuggest.php';

add_action( 'plugins_loaded', [ 'Address_AutoSuggest', 'init' ] );

