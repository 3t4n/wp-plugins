<?php

/*
  Plugin Name: Change Add To Cart Text
  Plugin URI: https://arrowdesign.ie
  Description: A plugin for updating the add to cart text. Change the add to cart text to any text of your choosing. Your text will then be dislayed on the on the shop and product pages.
  Version: 4.1
  Author: Arrow Design
  Author URI: https://arrowdesign.ie/change-add-to-cart-text/
 */

// Exit if accessed directly
  if (!defined('ABSPATH'))
    exit;

/*
* Admin panel for saving buy now
* button text
*/
include_once 'admin/admin.php';

/*
* Hook function for showing updated
* text on the front end
*/



// To change add to cart text on single product page
function BNBT_custom_cart_button_text_udpate( $text, $product ) {
	global $product;

	$terms = get_term_meta('2020', '_buy_now_btn_text', true);
	if ($terms =="") {
		# code...

    if( $product->is_type( 'variable' ) ){
        $text = __('Buy Now', 'woocommerce');
    }
    else{
    	$terms ="Buy Now";
    }
    }
    return esc_html ( $terms );
}
add_filter( 'woocommerce_product_single_add_to_cart_text', 'BNBT_custom_cart_button_text_udpate', 10, 2 );

// To change add to cart text on product archives(Collection) page
add_filter( 'woocommerce_product_add_to_cart_text', 'BNBT_woocommerce_custom_product_add_to_cart_text' );
function BNBT_woocommerce_custom_product_add_to_cart_text() {

	global $product;
$terms = get_term_meta('2020', '_buy_now_btn_text', true);

	if ( ($terms =="") || (is_null($terms)) ) { add_term_meta('2020', "_buy_now_btn_text" ,"Buy Now"); } //set defaults
	if ($terms =="") {
		# code...

    if( $product->is_type( 'variable' ) ){
        $text = __('Buy Now', 'woocommerce');
    }
    else{
    	$terms ="Buy Now";
    }
    }
    return esc_html ( $terms );
}
