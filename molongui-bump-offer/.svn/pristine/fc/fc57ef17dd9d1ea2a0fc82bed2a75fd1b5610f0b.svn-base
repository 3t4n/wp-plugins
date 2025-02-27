<?php
defined( 'ABSPATH' ) or exit;
function mbo_get_hooks( $page = 'checkout', $output = 'array' )
{
    if ( !in_array( $page, array( 'checkout', 'cart', 'minicart' ) ) ) return array();
    $checkout = array
    (
        ''                        => __( '&mdash; Nowhere &mdash;', 'molongui-bump-offer' ),

        'mbo_wc_checkout_hook_1'  => __( 'Before customer details', 'molongui-bump-offer' ),
        'mbo_wc_checkout_hook_2'  => __( 'Before billing form', 'molongui-bump-offer' ),
        'mbo_wc_checkout_hook_3'  => __( 'After billing form', 'molongui-bump-offer' ),
        'mbo_wc_checkout_hook_4'  => __( 'Before shipping form', 'molongui-bump-offer' ),
        'mbo_wc_checkout_hook_5'  => __( 'After shipping form', 'molongui-bump-offer' ),
        'mbo_wc_checkout_hook_6'  => __( 'Before order notes', 'molongui-bump-offer' ),
        'mbo_wc_checkout_hook_7'  => __( 'After order notes', 'molongui-bump-offer' ),
        'mbo_wc_checkout_hook_8'  => __( 'After customer details', 'molongui-bump-offer' ),

        'mbo_wc_checkout_hook_9'  => __( 'Before order review', 'molongui-bump-offer' ),
        'mbo_wc_checkout_hook_10' => __( 'Before cart contents', 'molongui-bump-offer' ),
        'mbo_wc_checkout_hook_11' => __( 'After cart contents', 'molongui-bump-offer' ),
        'mbo_wc_checkout_hook_12' => __( 'Before shipping details', 'molongui-bump-offer' ),
        'mbo_wc_checkout_hook_13' => __( 'After shipping details', 'molongui-bump-offer' ),
        'mbo_wc_checkout_hook_14' => __( 'Before order total', 'molongui-bump-offer' ),
        'mbo_wc_checkout_hook_15' => __( 'After order total', 'molongui-bump-offer' ),

        'mbo_wc_checkout_hook_16' => __( 'Before payment section', 'molongui-bump-offer' ),
        'woocommerce_review_order_before_submit' => __( 'Before checkout button', 'molongui-bump-offer' ),
        'mbo_wc_checkout_hook_18' => __( 'After checkout button', 'molongui-bump-offer' ),

        'mbo_wc_checkout_hook_19' => __( 'After payment section', 'molongui-bump-offer' ),
        'mbo_wc_checkout_hook_20' => __( 'After order review', 'molongui-bump-offer' ),
        'mbo_wc_checkout_hook_21' => __( 'After checkout form', 'molongui-bump-offer' ),
    );
    $checkout = apply_filters( 'mbo/hooks/checkout', $checkout );
    $cart = array
    (
        ''                    => __( '&mdash; Nowhere &mdash;', 'molongui-bump-offer' ),

        'mbo_wc_cart_hook_1'  => __( 'Before cart table', 'molongui-bump-offer' ),
        'mbo_wc_cart_hook_2'  => __( 'Before cart contents', 'molongui-bump-offer' ),
        'mbo_wc_cart_hook_3'  => __( 'Below cart contents', 'molongui-bump-offer' ),
        'mbo_wc_cart_hook_4'  => __( 'After coupon input', 'molongui-bump-offer' ),
        'mbo_wc_cart_hook_5'  => __( 'After cart contents', 'molongui-bump-offer' ),
        'mbo_wc_cart_hook_6'  => __( 'After cart table', 'molongui-bump-offer' ),
        'mbo_wc_cart_hook_7'  => __( 'As cart collaterals', 'molongui-bump-offer' ),
        'mbo_wc_cart_hook_8'  => __( 'Before cart totals', 'molongui-bump-offer' ),
        'mbo_wc_cart_hook_9'  => __( 'Before shipping form', 'molongui-bump-offer' ),
        'mbo_wc_cart_hook_10' => __( 'After shipping form', 'molongui-bump-offer' ),
        'mbo_wc_cart_hook_11' => __( 'Before order total', 'molongui-bump-offer' ),
        'mbo_wc_cart_hook_12' => __( 'After order total', 'molongui-bump-offer' ),
        'mbo_wc_cart_hook_13' => __( 'Before "Proceed to checkout" button', 'molongui-bump-offer' ),
        'mbo_wc_cart_hook_14' => __( 'After cart totals', 'molongui-bump-offer' ),
        'mbo_wc_cart_hook_15' => __( 'After cart', 'molongui-bump-offer' ),
    );
    $cart = apply_filters( 'mbo/hooks/cart', $cart );
    $minicart = array
    (
        ''                       => __( '&mdash; Nowhere &mdash;', 'molongui-bump-offer' ),

        'mbo_wc_minicart_hook_1' => __( 'Above Mini-cart table', 'molongui-bump-offer' ),
        'mbo_wc_minicart_hook_2' => __( 'Before Mini-cart contents', 'molongui-bump-offer' ),
        'mbo_wc_minicart_hook_3' => __( 'After Mini-cart contents', 'molongui-bump-offer' ),
        'mbo_wc_minicart_hook_4' => __( 'After Mini-cart totals', 'molongui-bump-offer' ),
        'mbo_wc_minicart_hook_5' => __( 'Before Mini-cart buttons', 'molongui-bump-offer' ),
        'mbo_wc_minicart_hook_6' => __( 'After Mini-cart buttons', 'molongui-bump-offer' ),
        'mbo_wc_minicart_hook_7' => __( 'Below Mini-cart table', 'molongui-bump-offer' ),
    );
    $minicart = apply_filters( 'mbo/hooks/minicart', $minicart );
    if ( $output == 'dropdown' )
    {
        foreach ( ${$page} as $key => $value )
        {
            ${$page}[$key] = array
            (
                'label'    => $value,
                'value'    => $key,
                'disabled' => apply_filters( '_mbo/hooks/option/disabled', true ),
            );
        }
        if ( $page == 'checkout' ) $checkout['woocommerce_review_order_before_submit']['disabled'] = false;
    }
    return ${$page};
}