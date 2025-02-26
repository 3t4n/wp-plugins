<?php
/**
 *
 *     Plugin Name: AmwalPay for WooCommerce
 *     Description: Amwal Credit Card Payment gateway for woocommerce. This plugin supports woocommerce version 3.0.0 or greater version.
 *     Version: 1.0.2
 *     Author: AmwalPay Plugin Team
 *     Author URI: https://www.amwal-pay.com/
 *     Text Domain: amwalpay-for-woocommerce
 *     Domain Path: /languages
 *     Requires PHP: 7.0
 *     Requires at least: 5.0
 *     Requires Plugins: woocommerce
 *     WC requires at least: 4.0
 *     WC tested up to: 9.5
 *     Tested up to: 6.7
 *     License: GNU General Public License v3.0
 *     License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *     Copyright: © 2025 AmwalPay
 *
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Define constants
if (!defined('AMPR_VERSION')) {
    define('AMPR_VERSION', '1.0.2');
}
if (!defined('AMPR_PLUGIN_PATH')) {
    define('AMPR_PLUGIN_PATH', plugin_dir_path(__FILE__));
}
if (!defined('AMPR_PLUGIN_URL')) {
    define('AMPR_PLUGIN_URL', plugin_dir_url(__FILE__));
}
if (!defined('AMPR_PLUGIN_NAME')) {
    define('AMPR_PLUGIN_NAME', dirname(plugin_basename(__FILE__)));
}

// Declare compatibility with WooCommerce features
add_action(
    'before_woocommerce_init',
    function () {
        if (class_exists('\Automattic\WooCommerce\Utilities\FeaturesUtil')) {
            \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility('custom_order_tables', __FILE__, true);
            \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility('cart_checkout_blocks', __FILE__, true);
        }
    }
);

require_once AMPR_PLUGIN_PATH . '/includes/helper/amwalpay.php';

//load plugin finction when woocommerce loaded
add_action('plugins_loaded', 'amwalpay_wc_init', 0);
function amwalpay_wc_init()
{
    if (!class_exists('WC_Payment_Gateway'))
        return;

    // Load the gateway class
    require_once AMPR_PLUGIN_PATH . 'includes/gateway/class-amwalpay-gateway.php';

    /**
     * Add the Gateway to WooCommerce
     **/
    function amwalpay_wc_gateway($methods)
    {
        $methods[] = 'AmwalPayWcPayment';
        return $methods;
    }

    add_filter('woocommerce_payment_gateways', 'amwalpay_wc_gateway');
    // Load translations
    load_plugin_textdomain('amwalpay-for-woocommerce', false, AMPR_PLUGIN_NAME . '/languages');
}
add_action('activate_' . plugin_basename(__FILE__), 'amwalpay_wc_install', 0);
function amwalpay_wc_install()
{
    global $wpdb;
    if (is_dir(WP_LANG_DIR . '/plugins/')) {
        $arTrans = 'amwal-ar';
        $transPath = WP_LANG_DIR . '/plugins/' . $arTrans;
        $pluginTransPath = AMPR_PLUGIN_PATH . 'languages/' . $arTrans;
        copy($pluginTransPath . '.mo', $transPath . '.mo');
        copy($pluginTransPath . '.po', $transPath . '.po');
    }
    // Require parent plugin
    if (!in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) && !array_key_exists('woocommerce/woocommerce.php', apply_filters('active_plugins', get_site_option('active_sitewide_plugins')))) {
        wp_die(esc_html__('Sorry, AmwalPay plugin requires WooCommerce to be installed and active.', 'amwalpay-for-woocommerce'));
    }
}

//Show action links on the plugin screen.
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'amwalpay_wc_plugin_links');

function amwalpay_wc_plugin_links($links)
{
    $plugin_links = array(
        '<a href="' . admin_url('admin.php?page=wc-settings&tab=checkout&section=amwal') . '">' . esc_html__('AmwalPay Settings', 'amwalpay-for-woocommerce') . '</a>',
    );
    return array_merge($links, $plugin_links);
}
//load block support
add_action('woocommerce_blocks_loaded', 'amwalpay_wc_woocommerce_block_support');
function amwalpay_wc_woocommerce_block_support()
{
    if (class_exists('Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType') && class_exists('Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry')) {
        require_once __DIR__ . '/includes/block/checkout-block.php';
        add_action(
            'woocommerce_blocks_payment_method_type_registration',
            function (Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry $payment_method_registry) {
                $container = Automattic\WooCommerce\Blocks\Package::container();
                $container->register(
                    WC_AmwalPay_Blocks::class,
                    function () {
                        return new WC_AmwalPay_Blocks();
                    }
                );
                $payment_method_registry->register($container->get(WC_AmwalPay_Blocks::class));
            }
        );
    }
}