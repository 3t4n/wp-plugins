<?php
/**
* Plugin Name: Auto complete all orders
* Plugin URI: ///
* Description: Plugin that automaticly complete all woocommerce orders. All you need to do is to activate plugin.
* Version: 1.0
* Author: Novica Todorovic
* Author URI: http://www.ntdizajn.com/
**/

add_action( 'woocommerce_thankyou', 'custom_woocommerce_auto_complete_order' );
function custom_woocommerce_auto_complete_order( $order_id ) { 
    if ( ! $order_id ) {
        return;
    }

    $order = wc_get_order( $order_id );
    $order->update_status( 'completed' );
}