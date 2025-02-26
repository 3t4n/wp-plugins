<?php

namespace Ambikly\Shortcodes;

use Ambikly\Models\Cart;

class CartShortcode extends BaseShortcode
{
    public function __construct()
    {
        parent::__construct('ambikly_cart');
    }

    public function output($args)
    {
        wp_enqueue_style('ambikly-cart-style');
        wp_enqueue_script('ambikly-cart-js');
        /**
         * @var $ambikly_cart Cart
         */
        global $ambikly_cart;

        $ambikly_cart = ambikly()->getClass('Models.Cart');

        $ambikly_cart->prepareCart();

        ambikly_get_template('cart.cart');
    }
}