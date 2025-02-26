<?php
/*
Plugin Name: Convert Rails to Toman in the plugin edd
Plugin URI: https://coindej.com/
description: This plugin will automatically Convert Rails to Toman in the plugin edd
Version: 2.0
Author: CoinDej - AriaHaman Group
Author URI: https://coindej.com/
License: GPL2
*/

function edd_rial_currency($formatted, $currency, $price){
    if (!is_admin()) {
        $price = @str_replace( edd_get_option( 'thousands_separator', ',' ) , '', $price );
        $price = @intval($price) / 10; return $price . ' تومان';} else return $price . ' ریال';}
add_filter( 'edd_rial_currency_filter_after', 'edd_rial_currency', 10, 3 );
add_filter( 'edd_rial_currency_filter_before', 'edd_rial_currency', 10, 3 );
