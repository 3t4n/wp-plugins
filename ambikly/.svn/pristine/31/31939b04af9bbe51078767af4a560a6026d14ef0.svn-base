<?php

namespace Ambikly;
class Assets
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'register']);

        add_action('wp_enqueue_scripts', [$this, 'enqueue']);
    }

    public function register()
    {
        // Libraries
        wp_register_style(
            'ambikly-select2-style',
            AMBIKLY_ASSETS_URI . 'lib/select2/css/select2.css',
        );
        wp_register_script(
            'ambikly-select2-script',
            AMBIKLY_ASSETS_URI . 'lib/select2/js/select2.js'
        );

        wp_register_script(
            'ambikly-common-js',
            AMBIKLY_ASSETS_URI . 'js/common-script.js',
            array('jquery'),
            AMBIKLY_VERSION,
            true
        );
        wp_register_style(
            'ambikly-common-style',
            AMBIKLY_ASSETS_URI . 'css/common-style.css'
        );
        wp_register_style(
            'ambikly-product-style',
            AMBIKLY_ASSETS_URI . 'css/product-style.css',
            array('ambikly-common-style')
        );
        wp_register_style(
            'ambikly-shop-style',
            AMBIKLY_ASSETS_URI . 'css/shop-style.css',
            array('ambikly-common-style')
        );
        wp_register_script(
            'ambikly-product-js',
            AMBIKLY_ASSETS_URI . 'js/product-script.js',
            array('ambikly-common-js'),
            AMBIKLY_VERSION,
            true
        );
        wp_register_style(
            'ambikly-category-style',
            AMBIKLY_ASSETS_URI . 'css/category-style.css',
            array('ambikly-common-style')
        );

        wp_register_style(
            'ambikly-cart-style',
            AMBIKLY_ASSETS_URI . 'css/cart-style.css',
            array('ambikly-common-style'),
        );
        wp_register_script(
            'ambikly-cart-js',
            AMBIKLY_ASSETS_URI . 'js/cart-script.js',
            array('ambikly-common-js'),
            AMBIKLY_VERSION,
            true
        );
        wp_register_style(
            'ambikly-account-style',
            AMBIKLY_ASSETS_URI . 'css/account-style.css',
            array('ambikly-common-style')
        );
        wp_register_style(
            'ambikly-checkout-style',
            AMBIKLY_ASSETS_URI . 'css/checkout-style.css',
            array('ambikly-common-style', 'ambikly-select2-style')
        );
        wp_register_script(
            'ambikly-checkout-js',
            AMBIKLY_ASSETS_URI . 'js/checkout-script.js',
            array('ambikly-common-js', 'ambikly-select2-script'),
            AMBIKLY_VERSION,
            true
        );

    }

    public function enqueue()
    {
        if (ambikly_is_page(Constants::AMBIKLY_PRODUCT_TYPE)) {

            wp_enqueue_style(
                'ambikly-product-style'

            );
            wp_enqueue_script(
                'ambikly-product-js',
            );
        } else if (ambikly_is_page(Constants::AMBIKLY_CATEGORY_TYPE)) {

            wp_enqueue_style(
                'ambikly-category-style'
            );
        } else if (get_the_ID() == ambikly_get_shop_page()) {

            wp_enqueue_style(
                'ambikly-shop-style'
            );
        }

        $localize_data = [
            'ajax_url' => admin_url('admin-ajax.php'),
        ];

        if (get_the_ID() == ambikly_get_checkout_page()) {
            $localize_data['states'] = include AMBIKLY_ABSPATH . 'src/Helpers/states.php';
        }


        wp_localize_script('ambikly-common-js', 'ambikly', $localize_data);

    }
}