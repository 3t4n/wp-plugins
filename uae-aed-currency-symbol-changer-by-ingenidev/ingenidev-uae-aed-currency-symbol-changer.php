<?php

/**
 * Plugin Name: ingenidev, UAE - AED Currency Symbol Changer
 * Plugin URI: https://ingenidev.com/uae-aed-currency-symbol-changer-wordpress-plugin/
 * Author: ingenidev
 * Author URI: https://ingenidev.com
 * Description: By default, WooCommerce uses the currency symbol for the United Arab Emirates Dirham (AED) as "د.إ". This plugin changes it to "AED ".
 * Version: 1.0.6
 * Requires Plugins: woocommerce
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */
defined('ABSPATH') or die('Direct access not permitted');

add_filter('woocommerce_currency_symbol', 'ingenidev_uaecsc_change_uae_currency_symbol', 10, 2);

function ingenidev_uaecsc_change_uae_currency_symbol($currency_symbol, $currency)
{
    switch ($currency) {
        case 'AED':
            $currency_symbol = 'AED ';
            break;
    }
    return $currency_symbol;
}
