<?php
defined( 'ABSPATH' ) or exit;
function mbo_register_options_scripts()
{
    $file = apply_filters( 'mbo/options/script', MOLONGUI_BUMP_OFFER_FOLDER . '/assets/js/options.c9bc.min.js' );

    mbo_register_script( $file, 'options' );
}
add_action( 'admin_enqueue_scripts', 'mbo_register_options_scripts' );
function mbo_enqueue_options_scripts()
{
    $file = apply_filters( 'mbo/options/script', MOLONGUI_BUMP_OFFER_FOLDER . '/assets/js/options.c9bc.min.js' );

    mbo_enqueue_script( $file, 'options', true );
}
add_action( 'mbo/options/before_footer', 'mbo_enqueue_options_scripts' );
function mbo_options_script_params()
{
    $params = array
    (
        'is_premium' => false,
    );
    return apply_filters( 'mbo/options/script_params', $params );
}