<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class ACWC_APPLY_CHARGE_OPTIONS {

    public function __construct() {
        // Hook into WooCommerce to apply charges
        add_action("woocommerce_cart_calculate_fees", array($this, 'acwc_apply_charges_fee'));
    }

    /**
     * Apply additional charges to the cart
     */
    public function acwc_apply_charges_fee() {
        // Check if the option to enable additional charges is set
        if (get_option('wc_enable_additional_charges_options', 'no') === 'yes') {
            // Retrieve settings with default values
            $fee_label = sanitize_text_field(get_option('wc_additional_fee_title', __('Additional Charge', 'additional-charges-on-wc-checkout')));
            $fee_amount = floatval(get_option('wc_additional_fee_amount', 0));
            $selected_categories = get_option('wc_additional_fee_categories', array());
            $selected_products = get_option('wc_additional_fee_products', array());
           
            $selected_categories = is_array($selected_categories) ? $selected_categories : array();
            $selected_products = is_array($selected_products) ? $selected_products : array();
            $has_matching_category = false;
            $has_matching_product = false;

            foreach (WC()->cart->get_cart() as $cart_item) {
                $product_id = $cart_item['product_id'];
                $product = wc_get_product($product_id);

                $product_categories = wp_get_post_terms($product_id, 'product_cat', array('fields' => 'ids'));
                if (!empty(array_intersect($selected_categories, $product_categories))) {
                    $has_matching_category = true;
                }
                // Check for matching products
                if (in_array($product_id, $selected_products)) {
                    $has_matching_product = true;
                }
                // If both conditions are met, no need to check further
                if ($has_matching_category && $has_matching_product) {
                    break;
                }
            }
            // Determine if default behavior should be applied
                $apply_default = empty($selected_categories) && empty($selected_products);
                // If neither condition is met and default behavior is not applicable, do not apply the fee
                if (!$apply_default && !$has_matching_category && !$has_matching_product) {
                    return;
                }

            $cart_total = WC()->cart->subtotal ?? 0;
            $shipping_total = WC()->cart->get_shipping_total() ?? 0;
            
            // Check minimum cart amount condition
            $min_cart_val = floatval(get_option('wc_additional_fee_minimum_cart_amount', 0));
            $condition_type = sanitize_text_field(get_option('wc_additional_fee_condition_type', ''));
            
            if (
                $min_cart_val > 0 &&
                (($condition_type === 'Order is more than' && $cart_total <= $min_cart_val) ||
                 ($condition_type === 'Order is less than' && $cart_total >= $min_cart_val))
            ) {
                return;
            }

            // Include or exclude shipping in total
            if (get_option('wc_additional_fee_include_shipping_charge', 'no') !== 'yes') {
                $shipping_total = 0; // Ignore shipping total if not included
            }

            // Calculate the fee based on type
            $fee_type = sanitize_text_field(get_option('wc_additional_fee_type', 'Fixed Amount'));
            if ($fee_type === 'Fixed Amount') {
                $calculated_fee = $fee_amount;
            } else {
                $calculated_fee = ($cart_total + $shipping_total) * ($fee_amount / 100);
            }

            // Add fee to cart if valid
            if ($calculated_fee > 0) {
                WC()->cart->add_fee(esc_html($fee_label), $calculated_fee);
            }
        }
    }
}

$chargeOptions = new ACWC_APPLY_CHARGE_OPTIONS();
?>
