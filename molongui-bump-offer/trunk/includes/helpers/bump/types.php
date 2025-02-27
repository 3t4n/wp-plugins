<?php
defined( 'ABSPATH' ) or exit;
function mbo_get_deal_types( $output = 'array' )
{
    $types = array
    (
        'mbo_deal_type_1' => array
        (
            'label'    => __( "Buy One, Get One Free", 'molongui-bump-offer' ),
            'desc'     => __( "Give away a product that's exactly the same as the one purchased by the user. The classic 2x1.", 'molongui-bump-offer' ),
            'disabled' => apply_filters( '_mbo/deal/types/disabled', true ),
        ),
        'mbo_deal_type_2' => array
        (
            'label'    => __( "Buy One, Save on Another", 'molongui-bump-offer' ),
            'desc'     => __( "This sale promotion offers the customer a second item at a discount.", 'molongui-bump-offer' ),
            'disabled' => apply_filters( '_mbo/deal/types/disabled', true ),
        ),
        'mbo_deal_type_3' => array
        (
            'label'    => __( "Giveaway", 'molongui-bump-offer' ),
            'desc'     => __( "A giveaway could be just the thing you need to spark interest and turn people who are curious about your brand into loyal customers", 'molongui-bump-offer' ),
            'disabled' => apply_filters( '_mbo/deal/types/disabled', true ),
        ),
        'custom' => array
        (
            'label'    => __( "Price Deal", 'molongui-bump-offer' ),
            'desc'     => __( "Offer your customers a reduction in the price of a promoted product.", 'molongui-bump-offer' ),
            'disabled' => false,
        ),/*
        'mbo_deal_type_5' => array
        (
            'label'    => __( "Cross-Sell", 'molongui-bump-offer' ),
            'desc'     => __( "", 'molongui-bump-offer' ),
            'disabled' => false,
        ),
        'mbo_deal_type_6' => array
        (
            'label'    => __( "Coupon", 'molongui-bump-offer' ),
            'desc'     => __( "Offer your customer discount coupons they can benefit from based on their Cart content", 'molongui-bump-offer' ),
            'disabled' => false,
        ),*/
        'mbo_deal_type_7' => array
        (
            'label'    => __( "Free Shipping", 'molongui-bump-offer' ),
            'desc'     => __( "Customers have come to expect free shipping when shopping online and use it as a determinant of where they shop.", 'molongui-bump-offer' ),
            'disabled' => apply_filters( '_mbo/deal/types/disabled', true ),
        ),
        'mbo_deal_type_8' => array
        (
            'label'    => __( "Banner", 'molongui-bump-offer' ),
            'desc'     => __( "Show a notice to your customers when their order meets certain conditions. Not a deal, but useful in many cases.", 'molongui-bump-offer' ),
            'disabled' => apply_filters( '_mbo/deal/types/disabled', true ),
        ),
    );
    $types = apply_filters( 'mbo/deal/types', $types );
    if ( $output == 'dropdown' )
    {
        foreach ( $types as $key => $value )
        {
            $types[$key] = array
            (
                'label'    => $value['label'],
                'value'    => $key,
                'desc'     => $value['desc'],
                'disabled' => $value['disabled'],
            );
        }
    }
    return $types;
}