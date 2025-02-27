<?php
defined( 'ABSPATH' ) or exit;
function mbo_save_options()
{
    if ( !isset( $_POST['nonce'] ) ) return;
    if ( !wp_verify_nonce( $_POST['nonce'], 'mfw_save_options_nonce' ) ) return;
    $options = wp_unslash( $_POST['data'] );
    foreach ( $options as $key => $value ) $options[$key] = sanitize_text_field( $value );

    if ( isset( $options ) and is_array( $options ) )
    {
        $options['plugin_version'] = MOLONGUI_BUMP_OFFER_VERSION;
        $current = (array) get_option( MOLONGUI_BUMP_OFFER_PREFIX.'_options', array() );
        $options = array_merge( $current, $options );
        $options = apply_filters( 'mbo/validate_options', $options, $current );
        update_option( MOLONGUI_BUMP_OFFER_PREFIX.'_options', $options );

        $old = $current;
        do_action( 'mbo/options', $options, $old );
    }
    wp_die();
}
add_action( 'wp_ajax_'.MOLONGUI_BUMP_OFFER_PREFIX.'_save_options', 'mbo_save_options' );
function mbo_export_options()
{
    $options = mbo_get_config();
    $options['plugin_id']      = MOLONGUI_BUMP_OFFER_PREFIX;
    $options['plugin_version'] = MOLONGUI_BUMP_OFFER_VERSION;
    $options = apply_filters( 'mbo/export_options', $options );
    echo json_encode( $options );
    wp_die();
}
add_action( 'wp_ajax_'.MOLONGUI_BUMP_OFFER_PREFIX.'_export_options', 'mbo_export_options' );