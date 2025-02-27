<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
//creates redirect

// Register custom endpoint
function digages_register_cancel_order_endpoint() {
    add_rewrite_endpoint('digages-order-canceledl', EP_ROOT);
    flush_rewrite_rules();
}
add_action('init', 'digages_register_cancel_order_endpoint');

// Handle the custom endpoint
function digages_handle_cancel_order_page() {
    global $wp_query;
    
    if (!isset($wp_query->query_vars['digages-order-canceledl'])) {
        return;
    }

    // Get the referring page URL from the session or default to checkout
    $return_url = WC()->session->get('digages_return_url') ?: wc_get_checkout_url();
    
    // Process the canceled order
    $order_id = get_transient('digages_cancelled_order_id');
    if ($order_id) {
        $order = wc_get_order($order_id);
        if ($order) {
            // Clear the current cart
            WC()->cart->empty_cart();
            
            // Add items back to cart
            foreach ($order->get_items() as $item) {
                $product_id = $item->get_product_id();
                $quantity = $item->get_quantity();
                $variation_id = $item->get_variation_id();
                $product = wc_get_product($product_id);

                if ($product && $product->is_in_stock()) {
                    WC()->cart->add_to_cart($product_id, $quantity, $variation_id);
                }
            }
            
            // Clean up
            delete_transient('digages_cancelled_order_id');
            WC()->session->set('digages_return_url', null);
        }
    }

    // Redirect back to the original page
    wp_redirect($return_url);
    exit;
}
add_action('template_redirect', 'digages_handle_cancel_order_page');


?>