<?php
defined( 'ABSPATH' ) or exit;
function mbo_get_cart_contents()
{
    $products   = array();
    $categories = array();
    $bumps      = array();
    foreach ( WC()->cart->get_cart_contents() as $cart_item_key => $cart_item )
    {
        if ( isset( $cart_item['order_bump_item'] ) and $cart_item['order_bump_item'] )
        {
            $bumps[$cart_item_key] = intval( $cart_item['order_bump_id'] );
            if ( apply_filters( 'mbo/get_cart_content/exclude_deals', '__return_true' ) ) continue;
        }
        $products[$cart_item_key] = ( ( isset( $cart_item['variation_id'] ) and !empty( $cart_item['variation_id'] ) ) ? intval( $cart_item['variation_id'] ) : intval( $cart_item['product_id'] ) );
        $cats = wc_get_product_term_ids( $cart_item['product_id'], 'product_cat' );
        if ( !empty( $cats ) ) $categories = array_unique( array_merge( $categories, $cats ) );
    }
    return array( $products, $categories, $bumps );
}