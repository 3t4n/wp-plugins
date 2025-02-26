<?php
/*
 * Live Preview - Product Options
 * https://sahu.media
 *
 * @package sahu_live_product_options_lite
 * @copyright Copyright (c) 2020, SAHU MEDIA®
 *
 */
 
  if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Output engraving field.
 */
 
function sahu_live_product_options_lite_output_fields() {
	global $post;
	global $product;
	global $woocommerce;
	
	$product = wc_get_product( $post->ID );
	$single = $product->get_meta( 'singleproduct' );
	if(isset($single)) {
	?>
	<div class="iconic-engraving-field">
		<input type="text" id="en_text" name="en_text" placeholder="" maxlength="22">
	</div>
	<div class="iconic-engraving-field">
		<input type="text" id="en_text2" name="en_text2" placeholder="" maxlength="22">
	</div>
	<div class="iconic-engraving-field">
		<input type="text" id="en_text2" name="gfont" placeholder="" maxlength="22">
	</div>
	<?php
	}
}
add_action( 'woocommerce_before_add_to_cart_button', 'sahu_live_product_options_lite_output_fields', 10 );

/**
 * Add engraving text to cart item.
 */
 
add_filter( 'woocommerce_add_cart_item_data', 'sahu_live_product_options_lite_text_to_cart_item', 10, 3 );
function sahu_live_product_options_lite_text_to_cart_item( $cart_item_data, $product_id, $variation_id ) {
	$engraving_text = filter_input( INPUT_POST, 'en_text' );
	$engraving_text2 = filter_input( INPUT_POST, 'en_text2' );
	$gfont = filter_input( INPUT_POST, 'gfont' );

	if ( empty( $engraving_text ) ) {
		return $cart_item_data;
    }
    $cart_item_data['font'] = $gfont;


	$cart_item_data['en_text'] = $engraving_text;
	if ( empty( $engraving_text2 ) ) {
		return $cart_item_data;
	}

	$cart_item_data['en_text2'] = $engraving_text2;

	return $cart_item_data;
}

/**
 * Display engraving text in the cart.
 */

add_filter( 'woocommerce_get_item_data', 'sahu_live_product_options_lite_display_text_cart', 10, 2 );
function sahu_live_product_options_lite_display_text_cart( $item_data, $cart_item ) {
	if ( empty( $cart_item['en_text'] ) ) {
		return $item_data;
	}

	$item_data[] = array(
		'key'     => __( 'Wunschtext', 'iconic' ),
		'value'   => wc_clean( $cart_item['en_text'] ),
		'display' => '',
    );
    
    if ( empty( $cart_item['font'] ) ) {
		return $item_data;
	}
	$fonts = array(
		"Philosopher" => "Philosopher",
		"YanoneKaffeesatz" => "Yanone Kaffeesatz",
		"GloriaHallelujah" => "Gloria Hallelujah"
	);
		$fn = $cart_item['font'];
	$item_data[] = array(
		'key'     => __( 'Schriftart', 'iconic' ),
		'value'   => $fonts[$fn],
		'display' => '',
	);
	
	if ( empty( $cart_item['en_text2'] ) ) {
		return $item_data;
	}

	$item_data[] = array(
		'key'     => __( 'Wunschtext 2', 'iconic' ),
		'value'   => wc_clean( $cart_item['en_text2'] ),
		'display' => '',
	);
	
	return $item_data;
}

/**
 * Add engraving text to order.
 */

add_action( 'woocommerce_checkout_create_order_line_item', 'sahu_live_product_options_lite_add_text_to_order_items', 10, 4 );
function sahu_live_product_options_lite_add_text_to_order_items( $item, $cart_item_key, $values, $order ) {
	if ( empty( $values['en_text'] ) ) {
		return;
	}

	$font = $values['font'];
	$fonts = array(
		"Philosopher" => "Philosopher-RegularMrcouple",
		"YanoneKaffeesatz" => "YanoneKaffeesatz-RegularMrcouple",
		"GloriaHallelujah" => "GloriaHallelujahMrcouple"
	);
	$myfont = $fonts[$font];

    $item->add_meta_data( __( 'Engraving', 'iconic' ), '<span style="font-family:'.$myfont.'">'.$values['en_text'].'</span>' );
    $item->add_meta_data( __( 'Font', 'iconic' ), '<span style="font-family:'.$myfont.'">'.$values['font'].'</span>' );

	
	if ( empty( $values['en_text2'] ) ) {
		return;
	}

	$item->add_meta_data( __( 'Engraving 2', 'iconic' ), '<span style="font-family:'.$myfont.'">'.$values['en_text2'].'</span>' );

}