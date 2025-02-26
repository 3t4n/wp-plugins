<?php
/*
 * Plugin Name: Disable Shipments when the free one is active
 * Plugin URI: https://ondesarrollo.com
 * Description: Disable Shipments when the free one is active
 * Author: Marta Torre
 * Version: 2.0
 * Author URI: https://martatorre.dev
 * Text Domain: Disable-Shipments-when-the-free-one-is-active
 * Domain Path: /languages
 * License: GPLv3+
*/

// Disable Shipments when the free one is active
function my_hide_shipping_when_free_is_available( $rates ) {
$free = array();
foreach ( $rates as $rate_id => $rate ) {
if ( 'free_shipping' === $rate->method_id ) {
$free[ $rate_id ] = $rate;
break;
}
}
return ! empty( $free ) ? $free : $rates;
}
add_filter( 'woocommerce_package_rates', 'my_hide_shipping_when_free_is_available', 100 );
?>