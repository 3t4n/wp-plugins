<?php
defined( 'ABSPATH' ) or exit;
function mbo_register_support_styles()
{
    $file = apply_filters( 'mbo/support/styles', MOLONGUI_BUMP_OFFER_FOLDER . ( is_rtl() ? '/assets/css/common/support-rtl.7160.min.css' : '/assets/css/common/support.5779.min.css' ) );
    $deps = array();

    mbo_register_style( $file, 'support', $deps );
}
add_action( 'admin_enqueue_scripts', 'mbo_register_support_styles' );
function mbo_enqueue_support_styles()
{
    $file = apply_filters( 'mbo/support/styles', MOLONGUI_BUMP_OFFER_FOLDER . ( is_rtl() ? '/assets/css/common/support-rtl.7160.min.css' : '/assets/css/common/support.5779.min.css' ) );

    mbo_enqueue_style( $file, 'support', true );
}
function mbo_support_extra_styles()
{
    $css = '';
    $css .= molongui_get_admin_color();
    return apply_filters( 'mbo/support/extra_styles', $css );
}