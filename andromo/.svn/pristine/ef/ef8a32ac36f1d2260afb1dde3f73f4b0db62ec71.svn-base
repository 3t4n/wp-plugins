<?php

/**
 * Plugin Name: Andromo
 * Plugin URI: https://www.andromo.com/woocommerce/
 * Description: Woocommerce plugin helper for builder of mobile applications for Android and IOS, created on <a href="https://andromo.com/"><strong>www.andromo.com</strong></a>
 * Version: 0.3
 * Author: Andromo
 * Author URI: https://andromo.com/
 * Requires at least: 5.5
 * Tested up to: 6.1.1
 * Stable tag: 0.3
 * Requires PHP: 7.0
 * WC tested up to: 7.4.0
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 **/

if (!defined('ABSPATH')) {
    exit;
}

add_action('rest_api_init', function () {
    register_rest_field(
        ['product', 'product_variation'],
        'andromo_price_to_display',
        array(
            'get_callback'    => function ($object) {

                $product = wc_get_product($object['id']);
                $andromo_price_to_display = wc_get_price_to_display($product, []);
                return $andromo_price_to_display;
            },
            'update_callback' => null,
            'schema'          => null,
        )
    );

    register_rest_field(
        ['product', 'product_variation'],
        'andromo_regular_price_to_display',
        array(
            'get_callback'    => function ($object) {

                $product = wc_get_product($object['id']);
                $andromo_regular_price_to_display = wc_get_price_to_display($product, array('price' => $product->get_regular_price()));
                return $andromo_regular_price_to_display;
            },
            'update_callback' => null,
            'schema'          => null,
        )
    );

    register_rest_field(
        ['product'],
        'andromo_variation_min_price_to_display',
        array(
            'get_callback'    => function ($object) {
                $product = wc_get_product($object['id']);
                if ($product->is_type('variable') && $product instanceof WC_Product_Variable) {
                    return $product->get_variation_price('min', true);
                }
                return null;
            },
            'update_callback' => null,
            'schema'          => null,
        )
    );

    register_rest_field(
        ['product'],
        'andromo_variation_max_price_to_display',
        array(
            'get_callback'    => function ($object) {
                $product = wc_get_product($object['id']);
                if ($product->is_type('variable') && $product instanceof WC_Product_Variable) {
                    return $product->get_variation_price('max', true);
                }
                return null;
            },
            'update_callback' => null,
            'schema'          => null,
        )
    );
});
