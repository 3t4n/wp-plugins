<?php 

if (!defined('ABSPATH')) {
    exit;
}


// Remove the COD option if match the conditions

add_filter( 'woocommerce_available_payment_gateways', 'accodps_cod_payment_gateway_disabled', 1 );
function accodps_cod_payment_gateway_disabled( $gateways ) {
    global $accodps_adv_min_order_total;
    if(function_exists('WC') && WC()->cart){
        $cart_contents_total = WC()->cart->total;
        if($cart_contents_total > $accodps_adv_min_order_total){
            print_r(WC()->cart->get_total);
            if ( isset($gateways['cod']) ) {
                unset( $gateways['cod'] );
            }
            
        }
    }
    return $gateways;
}



// Update order total before processing the order
function accodps_wc_advance_payment_update_order_total($order) {
global $accodps_adv_pay_per;
    // Verify nonce
    if (!isset($_POST['accodps_payment_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['accodps_payment_nonce'])), 'accodps_process_payment')) {
        return;
    }
    if (isset($_POST['advance_payment_checkbox']) && sanitize_text_field(wp_unslash($_POST['accodps_payment_nonce'])) === '1') {
        $order_total = $order->get_total();
        $advance_amount = $order_total * ($accodps_adv_pay_per / 100);

        // Store the original order total
        $order->update_meta_data('_original_order_total', $order_total);

        // Set the new order total to the advance amount
        $order->set_total($advance_amount);

        // Add meta data to inform about the advance payment
        $order->update_meta_data('_advance_payment', $advance_amount);
        $order->update_meta_data('_remaining_payment', $order_total - $advance_amount);
        $order->save();
    }
}
add_action('woocommerce_checkout_create_order', 'accodps_wc_advance_payment_update_order_total');