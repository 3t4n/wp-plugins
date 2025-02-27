<?php
defined( 'ABSPATH' ) or exit;
function mbo_add_to_wc_check_list( $matches, $header, $plugins )
{
    if ( $header != ( defined( 'VERSION_TESTED_HEADER' ) ? VERSION_TESTED_HEADER : 'WC tested up to' ) ) return $matches;
    if ( in_array( MOLONGUI_BUMP_OFFER_BASENAME, $matches ) ) return $matches;
    if ( isset( $plugins[MOLONGUI_BUMP_OFFER_BASENAME] ) ) $matches[] = $plugins[MOLONGUI_BUMP_OFFER_BASENAME];
    return $matches;
}
add_filter( 'woocommerce_get_plugins_with_header', 'mbo_add_to_wc_check_list', 99, 3 );
function mbo_check_offer_applies()
{
    $products = $categories = $added_bumps = array();
    list( $products, $categories, $added_bumps ) = mbo_get_cart_contents();
    foreach ( $added_bumps as $cart_item_key => $bump_id )
    {
        $bump = mbo_get_bump( $bump_id, 'publish', 'active' );
        if ( apply_filters( 'mbo/cart/requirements_fail', !mbo_is_displayable( $bump ), $bump ) )
        {
            if ( WC()->cart->remove_cart_item( $cart_item_key ) ) //if ( WC()->cart->set_quantity( $cart_item_key, 0, false ) )
            {
                wc_add_notice( __( "Looks like your cart no longer contains what it takes to opt to the offer you picked and it has been removed.", 'molongui-bump-offer' ), 'notice' );
            }
        }
    }
}
add_filter( 'woocommerce_check_cart_items', 'mbo_check_offer_applies', 999 );