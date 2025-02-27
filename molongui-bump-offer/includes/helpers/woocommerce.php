<?php
defined( 'ABSPATH' ) or exit;
function mbo_wc_deactivated( $plugin, $network_wide )
{
    if ( $plugin == 'woocommerce/woocommerce.php' )
    {
        deactivate_plugins( MOLONGUI_BUMP_OFFER_BASENAME, false, $network_wide );
    }
}
function mbo_get_random_product_id()
{
    $product_id = '';

    if ( function_exists( 'wc_get_products' ) )
    {
        $args = array
        (
            'status'       => 'publish',
            'visibility'   => 'visible',
            'stock_status' => 'instock',
            'limit'        => 1,
            'orderby'      => 'rand',
            'return'       => 'ids',
        );
        $product_ids = wc_get_products( $args );
        $product_id  = $product_ids[0];
        $product = wc_get_product( $product_id );
        if ( $product instanceof WC_Product )
        {
            $variations = $product->get_children();
            if ( !empty( $variations ) )
            {
                $product_id = $variations[array_rand( $variations )];
            }
        }

    }

    return $product_id;
}