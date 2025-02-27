<?php
defined( 'ABSPATH' ) or exit;
function mbo_force_deal_quantity( $cart_item_key, $quantity, $old_quantity, $cart )
{
    if ( empty( $cart->cart_contents[$cart_item_key]['order_bump_item'] ) ) return;
    $cart->cart_contents[$cart_item_key]['quantity'] = !empty( $cart->cart_contents[$cart_item_key]['molongui_deal_quantity'] ) ? $cart->cart_contents[$cart_item_key]['molongui_deal_quantity'] : 1;

}
add_action( 'woocommerce_after_cart_item_quantity_update', 'mbo_force_deal_quantity', 10, 4 );