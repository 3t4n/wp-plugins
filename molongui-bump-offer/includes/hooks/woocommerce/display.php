<?php
defined( 'ABSPATH' ) or exit;
function mbo_hook_bump()
{
    if ( apply_filters( 'mbo/hook_bump', true ) )
    {
        add_action( 'woocommerce_review_order_before_submit', 'mbo_display' );
    }
}
add_action( 'init', 'mbo_hook_bump' );