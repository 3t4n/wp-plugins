<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// first popup order as draft

// Register the custom order status
function digages_register_checkout_draft_order_status() {
    register_post_status('wc-checkout-draft', array(
        'label'                     => 'Checkout Draft',
        'public'                    => true,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true, 
        // translators: %s: The number of checkout drafts
        'label_count' => _n_noop(
            'Checkout Draft <span class="count">(%s)</span>', 
            'Checkout Draft <span class="count">(%s)</span>', 
            'direct-payments-for-woocommerce'
        )
        ));
}
add_action('init', 'digages_register_checkout_draft_order_status');

// Add the custom status to WooCommerce order statuses
function digages_add_checkout_draft_to_order_statuses( $order_statuses ) {
    $new_order_statuses = array();
    foreach ( $order_statuses as $key => $status ) {
        $new_order_statuses[ $key ] = $status;
        if ( 'wc-pending' === $key ) {
            $new_order_statuses['wc-checkout-draft'] = 'Checkout Draft';
        }
    }
    return $new_order_statuses;
}
add_filter('wc_order_statuses', 'digages_add_checkout_draft_to_order_statuses');


add_action('woocommerce_new_order', 'digages_set_custom_order_status', 10, 1);
function digages_set_custom_order_status($order_id) {
    $order = wc_get_order($order_id);

    // Only set to 'wc-checkout-draft' if the status is not 'on-hold'
    if ($order->get_payment_method() === 'digages_direct_payments' && $order->get_status() !== 'on-hold') {
        // Prevent overwriting 'on-hold' status
        if ($order->get_status() !== 'on-hold') {
            $order->update_status('wc-checkout-draft', 'Order set to draft for payment processing.');
            $order->save();
        }
    }
}

?>