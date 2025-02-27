<?php
defined( 'ABSPATH' ) or exit;
function mbo_remove_bump_cookie()
{
    if ( is_admin() ) return;
    foreach ( $_COOKIE as $name => $value )
    {
        if ( strpos( $name, 'molongui_added_order_bump_' ) === 0 and !empty( $value ) )
        {
            if ( is_object( WC()->cart ) and !array_key_exists( $value, WC()->cart->get_cart_contents() ) )
            {
                mbo_setcookie( $name, '', -1, $path = "/", "", null, false, 'strict' );
            }
        }
    }
}

add_action( 'wp_loaded', 'mbo_remove_bump_cookie', 999 );