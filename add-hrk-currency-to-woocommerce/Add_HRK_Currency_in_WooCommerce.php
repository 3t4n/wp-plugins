<?php
/*
Plugin Name: Add HRK Currency in WooCommerce
Plugin URI: http://dizajner2.com
Description: Adds Croatian Kuna (HRK) currency in Woocommerce. Also puts currency to the right of the price.
Version: 1.0
Author: dizajner2.com
Author URI: http://dizajner2.com
*/


// ##########################################################
// add kuna = new currency
function add_my_currency( $currencies ) {
     $currencies['HRK'] = __( 'Croatian kuna', 'woocommerce' );
     return $currencies;
}
function add_my_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'HRK': $currency_symbol = 'kn'; break;
     }
     return $currency_symbol;
}
add_filter( 'woocommerce_currencies', 'add_my_currency' );
add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);

// croatian kuna on right of price!
update_option('woocommerce_currency_pos', 'right_space');
// ##########################################################

?>