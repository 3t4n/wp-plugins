<?php
/**
 * Plugin Name: Add Payment Type to WooCommerce Admin Email
 * Plugin URI: http://demo.borbis.com/add_payment_type_to_woocommerce_admin_email
 * Description: Add Payment Type to WooCommerce Admin Email
 * Version: 1.0
 * Author: Borbis Media
 * Author URI: http://www.borbis.com
 * License: GPL
 */
 
add_action( 'woocommerce_email_after_order_table', 'add_payment_method_to_admin_new_order', 15, 2 );
 
function add_payment_method_to_admin_new_order( $order, $is_admin_email ) {
	load_textdomain( 'payment_method', dirname( __FILE__ )."/".get_locale().".mo" );
	if ( $is_admin_email ) {
    echo '<p><strong>'.__('Payment Method:', 'payment_method').'</strong> ' . $order->payment_method_title . '</p>';
  }
}
?>