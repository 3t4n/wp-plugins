<?php

/*
Plugin Name: Custom Currency Sign
Plugin URI: https://tool.lk/custom-currency/
Description: Adds a custom Unicode currency sign to WooCommerce settings.
Version: 1.1
Author: Vishwajith Rajapakse
Author URI: https://www.linkedin.com/in/vishwajithr/
License: GPLv2 or later
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Add custom currency symbol text field to WooCommerce settings
add_filter('woocommerce_get_settings_general', 'wc_custom_currency_add_custom_currency_symbol_field', 20, 1);

function wc_custom_currency_add_custom_currency_symbol_field($settings) {
    $new_settings = array();

    foreach ($settings as $setting) {
        $new_settings[] = $setting;

        if ($setting['id'] == 'woocommerce_currency') {
            $new_settings[] = array(
                'title'    => __('Custom Currency Symbol', 'woocommerce'),
                'desc'     => __('Enter a custom currency symbol (text or Unicode)', 'woocommerce'),
                'id'       => 'wc_custom_currency_custom_currency_symbol',
                'type'     => 'text',
                'css'      => 'min-width:300px;',
                'default'  => '',
                'desc_tip' => true,
            );
        }
    }

    return $new_settings;
}

// Hook to change the currency symbol in WooCommerce
add_filter('woocommerce_currency_symbol', 'wc_custom_currency_use_custom_currency_symbol', 10, 2);

function wc_custom_currency_use_custom_currency_symbol($currency_symbol, $currency) {
    $custom_symbol = get_option('wc_custom_currency_custom_currency_symbol');

    if (!empty($custom_symbol)) {
        return $custom_symbol;
    }

    return $currency_symbol;
}