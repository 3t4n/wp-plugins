<?php 

    
    
// Handle AJAX request to get order total
function accodps_get_order_total() {
    // Check nonce for security
    check_ajax_referer('wc_advance_payment_nonce', 'nonce');

    $order_total = WC()->cart->get_total('edit');
    echo esc_html($order_total);
    wp_die();
}
add_action('wp_ajax_get_order_total', 'accodps_get_order_total');
add_action('wp_ajax_nopriv_get_order_total', 'accodps_get_order_total');