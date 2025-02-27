<?php
defined( 'ABSPATH' ) or exit;
function mbo_ajax_add_to_cart()
{
    $deal_id = apply_filters( 'mbo/add_to_cart/deal_id', absint( $_POST['bump_id'] ) );
    $deal = mbo_get_bump( $deal_id, 'publish' );
    if ( !$deal ) wp_die();
    $deal_type         = apply_filters( 'mbo/add_to_cart/deal_type', $deal->_molongui_deal_type, $deal_id );
    $product_id        = apply_filters( 'mbo/add_to_cart/deal_product', absint( $deal->_molongui_bump_product ), $deal_id );
    $product_quantity  = apply_filters( 'mbo/add_to_cart/deal_quantity', absint( $deal->_molongui_deal_quantity ), $deal_id );

    $passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, 1 );
    $product_status    = get_post_status( $product_id );
    $cart_item_key = WC()->cart->add_to_cart( $product_id, $product_quantity );
    if ( $passed_validation and $cart_item_key and 'publish' === $product_status )
    {
        do_action( 'woocommerce_ajax_added_to_cart', $product_id );
        ob_start();
        woocommerce_mini_cart();
        $mini_cart = ob_get_clean();
        $data = array
        (
            'fragments' => apply_filters( 'woocommerce_add_to_cart_fragments', array
            (
                'div.widget_shopping_cart_content' => '<div class="widget_shopping_cart_content">' . $mini_cart . '</div>',
            )),
            'cart_hash' => WC()->cart->get_cart_hash(),
        );
        $data['added_item_key'] = $cart_item_key;
        if ( !headers_sent() ) mbo_setcookie( 'molongui_added_order_bump_'.$_POST['bump_id'], $cart_item_key, 0, $path = "/", "", null, false, 'strict' );
        wp_send_json( $data );
    }
    else
    {
        $data = array
        (
            'error'       => true,
            'product_url' => apply_filters( 'woocommerce_cart_redirect_after_error', get_permalink( $product_id ), $product_id )
        );

        echo wp_send_json( $data );
    }

    wp_die();
}
add_action( 'wp_ajax_nopriv_mbo_ajax_add_to_cart', 'mbo_ajax_add_to_cart' );  // Allows to use this function for non-logged in users.
add_action( 'wp_ajax_mbo_ajax_add_to_cart'       , 'mbo_ajax_add_to_cart' );  // Allows to use this function for logged in users.
function mbo_add_deal_data( $cart_item_data, $product_id )
{
    if ( !isset( $_POST['bump_id'] ) ) return $cart_item_data;
    $deal_id = apply_filters( 'mbo/add_to_cart/deal_id', absint( $_POST['bump_id'] ) );
    $deal = mbo_get_bump( $deal_id, 'publish' );
    if ( !$deal ) return $cart_item_data;
    $deal_type           = apply_filters( 'mbo/add_to_cart/deal_type', $deal->_molongui_deal_type, $deal_id );
    $deal_product        = apply_filters( 'mbo/add_to_cart/deal_product', absint( $deal->_molongui_bump_product ), $deal_id );
    $deal_price_criteria = apply_filters( 'mbo/add_to_cart/deal_price_criteria', $deal->_molongui_deal_price_criteria, $deal_id );
    $deal_price          = apply_filters( 'mbo/add_to_cart/deal_price', wc_format_decimal( $deal->_molongui_bump_price ), $deal_id );
    $product_quantity    = apply_filters( 'mbo/add_to_cart/deal_quantity', absint( $deal->_molongui_deal_quantity ), $deal_id );
    $price = mbo_get_deal_price( $deal_product, $deal_price_criteria, $deal_price );
    $cart_item_data['order_bump_id']                = $deal_id;
    $cart_item_data['molongui_deal_type']           = $deal_type;
    $cart_item_data['molongui_deal_product']        = $deal_product;
    $cart_item_data['molongui_deal_price_criteria'] = $deal_price_criteria;
    $cart_item_data['order_bump_price']             = wc_format_decimal( $price );
    $cart_item_data['molongui_deal_quantity']       = $product_quantity;
    $cart_item_data['order_bump_item'] = true;
    return $cart_item_data;
}
add_filter( 'woocommerce_add_cart_item_data', 'mbo_add_deal_data', 999, 2 );
function mbo_overwrite_deal_price( $cart_object )
{
    if ( is_admin() and !defined( 'DOING_AJAX' ) ) return;

    if ( !WC()->session->__isset( "reload_checkout" ) )
    {
        $wc_version = WC()->version;
        foreach ( $cart_object->cart_contents as $key => $value )
        {
            if ( isset( $value['order_bump_price'] ) )
            {
                if ( $wc_version < "3.0.0" )
                {
                    $value['data']->price = $value['order_bump_price'];
                }
                else
                {
                    $value['data']->set_price( $value['order_bump_price'] );
                    $value['data']->set_sold_individually( true );
                }
            }
        }
    }
}
add_action( 'woocommerce_before_calculate_totals', 'mbo_overwrite_deal_price', 999 );
function mbo_overwrite_deal_price_minicart( $price, $cart_item, $cart_item_key )
{

    if ( !empty( $cart_item['order_bump_price'] ) ) return wc_price( $cart_item['order_bump_price'] );

    return $price;
}
add_filter( 'woocommerce_cart_item_price', 'mbo_overwrite_deal_price_minicart', 10, 3 );
function mbo_ajax_remove_from_cart()
{
    $product_id        = apply_filters( 'woocommerce_add_to_cart_product_id', absint( $_POST['product_id'] ) );
    $product_status    = get_post_status( $product_id );
    $variation_id      = absint( $_POST['variation_id'] );
    $passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, $quantity );

    $cart_item_data    = array();
    $cartId      = WC()->cart->generate_cart_id( $product_id );
    $cartItemKey = WC()->cart->find_product_in_cart( $cartId );

    if ( WC()->cart->remove_cart_item( $cartItemKey ) )
    {
        \WC_AJAX::get_refreshed_fragments();
        wc_setcookie( 'molongui_added_order_bump_'.$_POST['bump_id'], '', time()-3600, true );
    }

    wp_die();
}