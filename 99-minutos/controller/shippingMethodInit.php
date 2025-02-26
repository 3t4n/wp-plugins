<?php
if(!defined('ABSPATH')){
    die;
}

require_once plugin_dir_path( __FILE__ ) . 'classes/WC_99_Minutos.php';

function include99Minutos( $methods ) {
    $methods['99minutos'] = 'WC_99_Minutos';
    return $methods;
}

add_filter( 'woocommerce_shipping_methods', 'include99Minutos' );
add_action( 'woocommerce_shipping_init', 'init99Minutos' );
