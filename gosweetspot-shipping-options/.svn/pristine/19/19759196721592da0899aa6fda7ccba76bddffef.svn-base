<?php
namespace GSS\Shipping_Options;

defined( 'ABSPATH' ) || exit;

require_once GSS_PLUGIN_PATH . 'utils/add-setting-link.php';
require_once GSS_PLUGIN_PATH . 'includes/class-gss-shipping-options.php';

/**
 * Function for delaying initialization of the extension until after WooComerce is loaded.
 */
function gss_shipping_options_initialize() {

    // This is also a great place to check for the existence of the WooCommerce class
    if ( ! class_exists( 'WooCommerce' ) ) {
        // You can handle this situation in a variety of ways, but adding a WordPress admin notice is often a good tactic.
        \add_action( 'admin_notices', function () {
            $class = 'notice notice-error';
            $message = __( 'The ' . '"' . GSS_PLUGIN_NAME . '"' . ' plugin requires WooCommerce to be installed and active.', GOSWEETSPOT_DOMAIN );

            printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );
        } );
        return;
    }

    global $gss_shipping_options_requirements;
    if ( ! version_compare( WC_VERSION, $gss_shipping_options_requirements["wc"], '>=' ) ) {
        \add_action( 'admin_notices', function () use ( $gss_shipping_options_requirements ) {
            $class = 'notice notice-error';
            $message = __( 'The ' . '"' . GSS_PLUGIN_NAME . '"' . ' plugin requires min WooCommerce version of ' . $gss_shipping_options_requirements["wc"], GOSWEETSPOT_DOMAIN );

            printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );
        } );
        return;
    }

    $GLOBALS['gss_shipping_options'] = Gss_Shipping_Options::instance();
}

\add_action( 'plugins_loaded', __NAMESPACE__ . "\gss_shipping_options_initialize", 10 );
