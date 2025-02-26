<?php

namespace Ambikly\Shortcodes;

use Ambikly\Models\Cart;

class CheckoutShortcode extends BaseShortcode
{
    public function __construct()
    {
        parent::__construct('ambikly_checkout');
    }

    public function output($args)
    {

        wp_enqueue_style('ambikly-checkout-style');

        wp_enqueue_script('ambikly-checkout-js');

        /**
         * @var $ambikly_cart Cart
         */
        global $ambikly_cart;

        $ambikly_cart = ambikly()->getClass('Models.Cart');

        $ambikly_cart->prepareCart();

        ambikly_get_template('checkout.checkout');
    }
}