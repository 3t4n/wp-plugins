<?php
$decimal_separator = get_option( 'woocommerce_price_decimal_sep' );
$thousand_separator = get_option( 'woocommerce_price_thousand_sep' ); 
$woocommerce_currency =  get_option( 'woocommerce_currency' ); 
$setting = [ 'decimal_separator' => $decimal_separator, 'thousand_separator' => $thousand_separator , 'woo_curency' => $woocommerce_currency];
echo wp_json_encode( $setting );
die();