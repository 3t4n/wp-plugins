<?php
defined( 'ABSPATH' ) or exit;
function mbo_premium_tag( $label = '' )
{
    if ( !apply_filters( 'mbo/display/pro/tag', true ) ) return;

    if ( empty( $label ) ) $label = __( "PRO", 'molongui-bump-offer' );

    return '<span class="mbo-tag">'.$label.'</span>';
}
function mbo_dont_esc_html( $safe_text, $text )
{
    return $text;
}