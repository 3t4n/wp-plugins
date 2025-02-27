<?php
namespace GSS\Shipping_Options\Utils;

defined( 'ABSPATH' ) || exit;

/**
 * Check wp and php version
 */
class VersionCheck {
    /**
     * The single instance of the class.
     */
    protected static $_instance = null;

    /**
     * Constructor.
     */
    protected function __construct( $gss_shipping_options_requirements ) {
        global $wp_version;
        if ( ! version_compare( $wp_version, $gss_shipping_options_requirements["wp"], '>=' ) ) {
            // You can handle this situation in a variety of ways, but adding a WordPress admin notice is often a good tactic.
            \add_action( 'admin_notices', function () use ( $gss_shipping_options_requirements ) {
                $class = 'notice notice-error';
                $message = __( 'The ' . '"' . GSS_PLUGIN_NAME . '"' . ' plugin requires min WordPress version of ' . $gss_shipping_options_requirements["wp"], GOSWEETSPOT_DOMAIN );

                printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );
            } );
            return;
        }

        if ( ! version_compare( PHP_VERSION, $gss_shipping_options_requirements["php"], '>=' ) ) {
            \add_action( 'admin_notices', function () use ( $gss_shipping_options_requirements ) {
                $class = 'notice notice-error';
                $message = __( 'The ' . '"' . GSS_PLUGIN_NAME . '"' . ' plugin requires min php version of ' . $gss_shipping_options_requirements["php"], GOSWEETSPOT_DOMAIN );

                printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );
            } );
            return;
        }

        // declare compatible with HPOS https://woocommerce.com/document/high-performance-order-storage/
        \add_action( 'before_woocommerce_init', function() {
            if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
                \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', GSS_PLUGIN_PATH . '/gss-shipping-options.php', true );
            }
        } );
    }

    /**
     * Main Extension Instance.
     */
    public static function instance( $gss_shipping_options_requirements ) {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self( $gss_shipping_options_requirements );
        }
        return self::$_instance;
    }
}

