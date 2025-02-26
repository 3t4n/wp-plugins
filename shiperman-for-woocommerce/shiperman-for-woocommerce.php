<?php
/*
Plugin Name: Shiperman for WooCommerce
Description: Integrates Shiperman shipping services into WooCommerce with real-time rate calculations and flexible rate configurations.
Version: 1.0
Author: Shiperman
Author URI: https://shiperman.com
Requires PHP: 7.4
WC requires at least: 3.0
WC tested up to: 6.9
Text Domain: shiperman-for-woocommerce
License: GPLv2 or later  
License URI: https://www.gnu.org/licenses/gpl-2.0.html 
*/

if (!defined('ABSPATH')) exit;

use SMFWC\Shiperman\Shipping_Method\SMFWC_Shiperman_Shipping_Method;
use SMFWC\Shiperman\Admin\SMFWC_Shiperman_Admin;
use SMFWC\Shiperman\Product_Validation\SMFWC_Shiperman_Product_Validation;
use SMFWC\Shiperman\Admin\SMFWC_Shiperman_Settings;
use SMFWC\Shiperman\Shipment\SMFWC_Shiperman_Shipment;
use SMFWC\Shiperman\API\SMFWC_Shiperman_API;

/**
 * Check WooCommerce dependency before activation.
 */
function smfwc_prevent_activation_if_no_woocommerce()
{
    if (!class_exists('WooCommerce')) {
        deactivate_plugins(plugin_basename(__FILE__));
        wp_die(
            'This plugin requires WooCommerce to be installed and activated. Please install and activate WooCommerce before activating this plugin.',
            'Plugin Activation Error',
            ['back_link' => true]
        );
    }
}
register_activation_hook(__FILE__, 'smfwc_prevent_activation_if_no_woocommerce');

/**
 * Show an admin notice if WooCommerce is not active.
 */
function smfwc_show_admin_notice()
{
    if (!class_exists('WooCommerce')) {
        deactivate_plugins(plugin_basename(__FILE__));
        echo '<div class="notice notice-error">
            <p><strong>Shiperman for WooCommerce:</strong> WooCommerce is not installed or activated. Please install and activate WooCommerce to use this plugin.</p>
        </div>';
    }
}
add_action('admin_notices', 'smfwc_show_admin_notice');

class SMFWC_Shiperman_For_WooCommerce
{
    private static $instance = null;

    const SLUG = 'shiperman-for-woocommerce';

    private function __construct()
    {
        $this->define_constants();
        add_action('plugins_loaded', [$this, 'initialize_plugin']);
    }

    public static function get_instance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function define_constants()
    {
        define('SMFWC_SHIPERMAN_PLUGIN_DIR', plugin_dir_path(__FILE__));
        define('SMFWC_SHIPERMAN_PLUGIN_URL', plugin_dir_url(__FILE__));
        define('SMFWC_SHIPERMAN_PLUGIN_SLUG', self::SLUG);
        define('SMFWC_SHIPERMAN_PLUGIN_VERSION', '1.0.0');
        define('SMFWC_SHIPERMAN_TEXT_DOMAIN', 'shiperman-for-woocommerce');
        define('SMFWC_SHIPERMAN_TEMPLATE_PATH', SMFWC_SHIPERMAN_PLUGIN_DIR . 'templates/');
    }

    public function initialize_plugin()
    {
        if ($this->is_woocommerce_active()) {
            if ($this->is_store_country_supported()) {
                $this->load_dependencies();
                $this->initialize_core();
            } else {
                add_action('admin_notices', [$this, 'store_country_not_supported_notice']);
                return;
            }
        } else {
            add_action('admin_notices', [$this, 'woocommerce_missing_notice']);
            return;
        }
    }

    private function is_woocommerce_active()
    {
        return class_exists('WooCommerce');
    }

    private function is_store_country_supported()
    {
        $store_country = get_option('woocommerce_default_country');
        $store_country = explode(":", $store_country)[0];

        $supported_countries = $this->support_countries();

        return in_array($store_country, $supported_countries, true);
    }

    private function support_countries()
    {
        $support_countries = [
            'NL',
            'DE',
            'ES',
            'IT',
            'CZ',
            'PL',
            'HU',
            'BG',
            'RO'
        ];

        return apply_filters('shiperman_support_countries', $support_countries);
    }

    public static function woocommerce_missing_notice()
    {
        echo '<div class="notice notice-error"><p>';
        esc_html_e('Shiperman for WooCommerce Plugin requires WooCommerce to be installed and active.', 'shiperman-for-woocommerce');
        echo '</p></div>';
    }

    public function store_country_not_supported_notice()
    {
        echo '<div class="notice notice-warning"><p>';
        esc_html_e('Shiperman for WooCommerce is currently not supported in your store\'s country.', 'shiperman-for-woocommerce');
        echo '</p></div>';
    }

    private function load_dependencies()
    {
        require_once SMFWC_SHIPERMAN_PLUGIN_DIR . 'includes/class-shiperman-shipping-method.php';
        require_once SMFWC_SHIPERMAN_PLUGIN_DIR . 'includes/API/class-shiperman-api.php';
        require_once SMFWC_SHIPERMAN_PLUGIN_DIR . 'includes/Admin/class-shiperman-settings.php';
        require_once SMFWC_SHIPERMAN_PLUGIN_DIR . 'includes/Admin/class-shiperman-product-validation.php';
        require_once SMFWC_SHIPERMAN_PLUGIN_DIR . 'includes/Admin/class-shiperman-admin.php';
        require_once SMFWC_SHIPERMAN_PLUGIN_DIR . 'includes/class-shiperman-orders-list-table.php';
        require_once SMFWC_SHIPERMAN_PLUGIN_DIR . 'includes/Admin/class-shiperman-shipment.php';
    }

    public function register_shipping_method()
    {
        add_filter('woocommerce_shipping_methods', function ($methods) {
            $methods['shiperman_shipping_method'] = 'SMFWC_Shiperman_Shipping_Method';
            return $methods;
        });
    }

    private function initialize_core()
    {
        new SMFWC_Shiperman_Settings();
        SMFWC_Shiperman_Shipping_Method::register();
        SMFWC_Shiperman_API::get_instance();
        new SMFWC_Shiperman_Product_Validation();
        new SMFWC_Shiperman_Admin();
        new SMFWC_Shiperman_Shipment();
    }
}

function smfwc_run_shiperman_for_woocommerce()
{
    return SMFWC_Shiperman_For_WooCommerce::get_instance();
}
smfwc_run_shiperman_for_woocommerce();
