<?php
defined( 'ABSPATH' ) or exit;
function mbo_is_displayable( $bump = 0 )
{
    if ( !is_checkout() ) return false;
    if ( !$bump ) return false;
    if ( !is_object( $bump ) and is_numeric( $bump ) )
    {
        $bump = mbo_get_bump( $bump );
    }
    if ( !$bump->_molongui_bump_product ) return false;
    $product = wc_get_product( $bump->_molongui_bump_product );
    if ( $product instanceof WC_Product )
    {
        if ( !$product->is_in_stock() )
        {
            return false;
        }
    }
    list( $products, $categories, $added_bumps ) = mbo_get_cart_contents();
    if ( in_array( $bump->_molongui_bump_product, $products ) )
    {
        $reason = sprintf( __( "Deal #%s hooked into '%s' not displayed because promoted product is already in the Cart.", 'molongui-bump-offer' ), $bump->ID, current_filter() );
        mbo_console_log( $reason );

        return false;
    }
    return apply_filters( 'mbo/is_displayable', true, $bump, $products, $categories );
}