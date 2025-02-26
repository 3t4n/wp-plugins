<?php
defined('ABSPATH') || exit;

if ( ! class_exists( 'Multiple_Cart_Fee_Public' ) ) {
    
    class Multiple_Cart_Fee_Public {
       
        public function __construct() {
            add_action('woocommerce_cart_calculate_fees', array($this, 'mcfw_add_cart_fee'));
        }

       public function mcfw_add_cart_fee() {
    if (is_admin() && !defined('DOING_AJAX')) {
        return;
    }

    $fees = get_option('multiple_fees', array());
    $included_products = get_option('multiple_fee_products', array());
    $included_categories = get_option('multiple_fee_categories', array());
    $included_tags = get_option('multiple_fee_tags', array());
    $min_amount = get_option('multiple_fee_min_amount', '');
    $max_amount = get_option('multiple_fee_max_amount', '');

    $cart = WC()->cart;
    $cart_total = method_exists($cart, 'get_subtotal') ? $cart->get_subtotal() : $cart->subtotal;

    if ($min_amount !== '' && $cart_total < floatval($min_amount)) {
        return;
    }

    if ($max_amount !== '' && $cart_total > floatval($max_amount)) {
        return;
    }

    foreach ($fees as $fee) {
        if (empty($fee['amount']) || floatval($fee['amount']) <= 0) {
            continue;
        }

        $apply_fee = false;

        foreach ($cart->get_cart() as $cart_item) {
            $product = isset($cart_item['data']) ? $cart_item['data'] : wc_get_product($cart_item['product_id']);
            if (!$product) {
                continue;
            }

            $product_id = $product->get_id();
            $variation_id = $product->get_parent_id();

      

            // Check if product or variation is included
            if (!empty($included_products) && (in_array($product_id, $included_products) || in_array($variation_id, $included_products))) {
                $apply_fee = true;
                break;
            }

            // Check if product belongs to included categories
            if (!empty($included_categories)) {
                $product_cats = wc_get_product_term_ids($product_id, 'product_cat');
                if (!empty(array_intersect($product_cats, $included_categories))) {
                    $apply_fee = true;
                    break;
                }
            }

            // Check if product belongs to included tags
            if (!empty($included_tags)) {
                $product_tags = wc_get_product_term_ids($product_id, 'product_tag');
                if (!empty(array_intersect($product_tags, $included_tags))) {
                    $apply_fee = true;
                    break;
                }
            }
        }

        // Apply fee if no specific conditions are set or if conditions match
        if (empty($included_products) && empty($included_categories) && empty($included_tags)) {
            $apply_fee = true;
        }

        if ($apply_fee) {
            $cart->add_fee($fee['name'], floatval($fee['amount']));
        }
    }
}

    }

    new Multiple_Cart_Fee_Public();
} 