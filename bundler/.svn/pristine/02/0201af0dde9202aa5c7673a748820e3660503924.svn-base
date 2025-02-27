<?php

/**
 * Integrations
 *
 * Handle integrations between Bundler and 3rd-Party plugins
 *
 * @since 2.1.5
 */

namespace Bundler\Controllers;

if (!defined('ABSPATH')) exit;

class Integrations
{

    /**
     * Add built-in integrations with 3rd party plugins
     */
    public static function init()
    {
        global $bdlr_key;
        if (isset($bdlr_key) && !$bdlr_key->is_valid()) return;

        if (!function_exists('is_plugin_active')) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }

        $namespace = "Bundler\Integrations\\";
        $integrations = array(
            'WC_Multi_Currency' => array(
                'file' => BDLR_PLUGIN_DIR . '/integrations/woocommerce-multi-currency.php',
                'plugin_check' => array(
                    'woocommerce-multi-currency/woocommerce-multi-currency.php',
                    'woo-multi-currency/woo-multi-currency.php'
                ),
            ),
            'WCPBC' => array(
                'file' => BDLR_PLUGIN_DIR . '/integrations/woocommerce-product-price-based-on-countries.php',
                'plugin_check' => array(
                    'woocommerce-product-price-based-on-countries/woocommerce-product-price-based-on-countries.php'
                ),
            ),
            'FOX_Currency_Switcher' => array(
                'file' => BDLR_PLUGIN_DIR . '/integrations/woocommerce-currency-switcher.php',
                'plugin_check' => array(
                    'woocommerce-currency-switcher/index.php'
                ),
            ),
        );

        foreach ($integrations as $class => $data) {
            $class = $namespace . $class;
            $integration_file = $data['file'];
            $plugin_checks = $data['plugin_check'];

            // Check if the required plugin is active
            $is_plugin_active = false;
            foreach ($plugin_checks as $plugin) {
                if (is_plugin_active($plugin)) {
                    $is_plugin_active = true;
                    break;
                }
            }

            if ($is_plugin_active && !class_exists($class)) {
                require_once $integration_file;
                if (class_exists($class)) {
                    new $class;
                }
            }
        }
    }
}

Integrations::init();
