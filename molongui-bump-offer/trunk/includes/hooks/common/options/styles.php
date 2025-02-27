<?php
defined( 'ABSPATH' ) or exit;
function mbo_register_common_options_styles()
{
    if ( apply_filters( 'mbo/options/enqueue_colorpicker', false ) ) wp_enqueue_style( 'wp-color-picker' );
    $file = apply_filters( 'mbo/options/common_styles', MOLONGUI_BUMP_OFFER_FOLDER . ( is_rtl() ? '/assets/css/common/options-rtl.140b.min.css' : '/assets/css/common/options.1909.min.css' ) );
    $deps = array();

    mbo_register_style( $file, 'common_options', $deps );
}
add_action( 'admin_enqueue_scripts', 'mbo_register_common_options_styles' );
function mbo_enqueue_common_options_styles()
{
    $file = apply_filters( 'mbo/options/common_styles', MOLONGUI_BUMP_OFFER_FOLDER . ( is_rtl() ? '/assets/css/common/options-rtl.140b.min.css' : '/assets/css/common/options.1909.min.css' ) );

    mbo_enqueue_style( $file, 'common_options', true );
}
function mbo_common_options_extra_styles()
{
    $css = '';
    $css .= molongui_get_admin_color();
    return apply_filters( 'mbo/options/common_extra_styles', $css );
}