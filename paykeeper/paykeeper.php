<?php
/**
 * Plugin Name: WooCommerce PayKeeper
 * Plugin URI: https://docs.paykeeper.ru/cms/
 * Description: Легко добавляет платежный шлюз PayKeeper в плагин WooCommerce для приема платежей через платформу PayKeeper.
 * Version: 2.2.0
 * Author: PayKeeper
 * Author URI: https://paykeeper.ru/
 * Requires at least: 4.2
 * Requires Plugins: woocommerce
 * License: GPL2 or Later
 */

if (!defined('ABSPATH')) {
    exit;
}

add_filter('plugin_row_meta', 'paykeeper_register_plugin_links', 10, 2);

/**
 * Adds a link to the documentation for a specific plugin.
 *
 * @param $links
 * @param $file
 * @return mixed
 */
function paykeeper_register_plugin_links($links, $file)
{
    $base = plugin_basename(__FILE__);
    if ($file == $base) {
        $links[] = '<a href="' . esc_url('https://docs.paykeeper.ru/cms/modul-oplaty-dlya-woocommerce/') . '" target="_blank">' . __('Docs', 'woocommerce') . '</a>';
    }
    return $links;
}

add_action('plugins_loaded', 'woocommerce_paykeeper_init');
function woocommerce_paykeeper_init() {
    if ( !class_exists( 'WC_Payment_Gateway' ) ) return;

    add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'paykeeper_action_plugin_links' );
    add_action( 'before_woocommerce_init', 'declare_custom_function_compatibility' );

    /**
     * Adds a settings link to the plugin actions on the Plugins page in the WordPress admin.
     *
     * @param array $links An array of plugin action links.
     *
     * @return array The modified array of plugin action links with the added settings link.
     */
    function paykeeper_action_plugin_links( $links ) {
        $settings_link = '<a href="' . admin_url('admin.php?page=wc-settings&tab=checkout&section=paykeeper') . '">' . __('Settings', 'woocommerce') . '</a>';
        array_unshift( $links, $settings_link );
        return $links;
    }

    /**
     * Custom function to declare compatibility with cart_checkout_blocks and custom_order_tables feature
     */
    function declare_custom_function_compatibility() {
        if (class_exists('\Automattic\WooCommerce\Utilities\FeaturesUtil')) {
            \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility('custom_order_tables', __FILE__, true);
            \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility('cart_checkout_blocks', __FILE__, true);
        }
    }

    /**
     * Localisation
     */
    load_plugin_textdomain('paykeeper', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/');

    /**
     * WC PayKeeper Payment gateway plugin class.
     *
     * @class WC_PayKeeper_Addon
     */
    class WC_PayKeeper_Addon {

        static $version = '2.2.0';
        static $plugin_url;
        static $plugin_path;

        /**
         * Initializes the PayKeeper payment gateway integration for WooCommerce.
         *
         * This method defines constants for the plugin version, URL, and path. It also includes
         * necessary files for the PayKeeper functionality and ensures the required classes are
         * loaded, such as `PaykeeperPayment` and the gateway class (`paykeeper-gateway-class.php`).
         * Additionally, it registers the PayKeeper payment gateway with WooCommerce by hooking
         * into the 'woocommerce_payment_gateways' filter and sets up a custom order approval
         * payment method type via the 'woocommerce_blocks_loaded' action.
         *
         * @return void
         */
        public static function init() {
            define('WC_PK_ADDON_VERSION', self::$version);
            define('WC_PK_ADDON_URL', self::plugin_url());
            define('WC_PK_ADDON_PATH', self::plugin_path());

            if ( !class_exists( 'PaykeeperPayment' ) ) {
                require_once 'paykeeper_common_class/paykeeper.class.php';
            }

            require_once 'paykeeper-gateway-class.php';

            add_filter('woocommerce_payment_gateways', array(__CLASS__, 'woocommerce_add_paykeeper_gateway'));
            add_action('woocommerce_blocks_loaded', array(__CLASS__, 'register_order_approval_payment_method_type'));
        }

        /**
         * Retrieves the URL to the plugin's directory.
         *
         * @return string The URL to the plugin's directory.
         */
        public static function plugin_url() {
            if (self::$plugin_url) {
                return self::$plugin_url;
            }
            return self::$plugin_url = plugins_url(basename(plugin_dir_path(__FILE__)), basename(__FILE__));
        }

        /**
         * Retrieves the file system path to the plugin's directory.
         *
         * @return string The file system path to the plugin's directory.
         */
        public static function plugin_path() {
            if (self::$plugin_path) {
                return self::$plugin_path;
            }
            return self::$plugin_path = untrailingslashit(plugin_dir_path(__FILE__));
        }

        /**
         * Adds the PayKeeper payment gateway to the list of available WooCommerce gateways.
         *
         * @param array $methods The existing list of payment gateway methods.
         * @return array The updated list of payment gateway methods, including PayKeeper.
         */
        public static function woocommerce_add_paykeeper_gateway($methods) {
            $methods[] = 'WC_PK_Gateway';
            return $methods;
        }

        /**
         * Custom function to register a payment method type.
         * Registers the PayKeeper payment method type with WooCommerce Blocks.
         *
         * @return void
         */
        public static function register_order_approval_payment_method_type() {
            // Check if the required class exists
            if ( class_exists( 'Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType' ) ) {
                // Include the custom Blocks Checkout class
                require_once 'class-block.php';

                // Hook the registration function to the 'woocommerce_blocks_payment_method_type_registration' action
                add_action(
                    'woocommerce_blocks_payment_method_type_registration',
                    function( Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry $payment_method_registry ) {
                        // Register an instance of My_Custom_Gateway_Blocks
                        $payment_method_registry->register( new WC_Paykeeper_Blocks );
                    }
                );
            }
        }
    }

    WC_PayKeeper_Addon::init();
}