<?php
/**
 * Plugin Name: Ocultar "Añadir al Carrito"
 * Plugin URI: http://mikeldeluis.com/wp-plugins
 * Description: Convierte tu WooCommerce en un catálogo ocultando el botón "Añadir al Carrito"
 * Author: Mikel de Luis
 * Author URI: http://mikeldeluis.com
 * Version: 1.0
 */


// Eliminar el botón "Añadir al Carrito"

add_action('woocommerce_single_product_summary','quitar_boton');
add_action( 'woocommerce_after_shop_loop_item', 'quitar_boton');
add_action('woocommerce_simple_add_to_cart','quitar_boton');
add_action('woocommerce_grouped_add_to_cart','quitar_boton');
add_action('woocommerce_loop_add_to_cart_link','quitar_boton');
add_action('woocommerce_output_content_wrapper_end', 'quitar_boton');
add_action('woocommerce_before_shop_loop_item_title', 'quitar_boton');

function quitar_boton(){
    
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 10 );

remove_action( 'woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30 );

remove_action( 'woocommerce_grouped_add_to_cart', 'woocommerce_grouped_add_to_cart', 10 );

remove_action( 'woocommerce_loop_add_to_cart_link', 'add_to_cart_button');

remove_action('woocommerce_output_content_wrapper_end', 'add_to_cart_button');

remove_action('woocommerce_before_shop_loop_item_title', 'add_to_cart_button');

}

?>
