<?php
namespace GSS\Shipping_Options;

defined( 'ABSPATH' ) || exit;

defined( 'GOSWEETSPOT_DOMAIN' ) or define( 'GOSWEETSPOT_DOMAIN', 'GoSweetSpot' );
defined( 'GSS_PLUGIN_NAME' ) or define( 'GSS_PLUGIN_NAME', 'GoSweetSpot Shipping Options' );
defined( 'GSS_PLUGIN_PATH' ) or define( 'GSS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
defined( 'GSS_PLUGIN_URL' ) or define( 'GSS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
defined( 'GSS_SHIPPING_METHOD_NAME' ) or define( 'GSS_SHIPPING_METHOD_NAME', 'GoSweetSpot Shipping Rate' );
defined( 'GSS_LOG_FILE_NAME' ) or define( 'GSS_LOG_FILE_NAME', 'GSS-WC-Shipipng-Options' );
defined( 'GSS_FALLBACK_RATE' ) or define( 'GSS_FALLBACK_RATE', '15' );

$checkout_service_url = "https://checkout.gosweetspot.com";
$ship_url = "https://ship.gosweetspot.com";

if ( function_exists( "wp_get_environment_type" ) && ( wp_get_environment_type() == "local" ) ) {
    $ship_url = "https://dev-ship.gosweetspot.com";
    $checkout_service_url = "https://dev-checkout.gosweetspot.com";
}

defined( 'CHECKOUT_SERVICE_URL' ) or define( 'CHECKOUT_SERVICE_URL', $checkout_service_url );
defined( 'CHECKOUT_SERVICE_API_URL' ) or define( 'CHECKOUT_SERVICE_API_URL', $checkout_service_url . '/api/v1' );
defined( 'GSS_SHIP_URL' ) or define( 'GSS_SHIP_URL', $ship_url );

$plugin_data;
if ( ! function_exists( 'get_plugin_data' ) ) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}
$plugin_data = get_plugin_data( GSS_PLUGIN_PATH . '/gss-shipping-options.php' );

defined( 'GSS_PLUGIN_VERSION' ) or define( 'GSS_PLUGIN_VERSION', $plugin_data['Version'] );

$wc_requires_version = get_file_data( GSS_PLUGIN_PATH . '/gss-shipping-options.php', array( 'RequiresWC' => 'WC requires at least' ), 'plugin' )['RequiresWC'];

// Didn't find a way to pass in the a variable to \add_action( 'plugins_loaded') hook. so made this global.
global $gss_shipping_options_requirements;
$gss_shipping_options_requirements = [
    'php' => $plugin_data['RequiresPHP'],
    'wp' => $plugin_data['RequiresWP'],
    'wc' => $wc_requires_version, // this has to be same as plugin header and readme, didn't find a way to get the info from plugin header
];
