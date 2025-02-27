<?php
defined( 'ABSPATH' ) or exit;
function mbo_get_options()
{
    $options = (array) get_option( MOLONGUI_BUMP_OFFER_PREFIX.'_options', array() );

    if ( empty( $options ) ) $options = mbo_get_defaults();
    $options = apply_filters( 'mbo/get_options', $options );

    return $options;
}
function mbo_get_defaults()
{
    return apply_filters( 'mbo/default_options', array() );
}
function mbo_add_defaults()
{
    $options  = mbo_get_options();
    $defaults = mbo_get_defaults();
    update_option( MOLONGUI_BUMP_OFFER_PREFIX.'_options', array_merge( $defaults, $options ) );
}
function mbo_get_config()
{
    global $wpdb;
    $entries = $wpdb->get_results
    (
        $wpdb->prepare( "SELECT option_name,option_value FROM {$wpdb->options} WHERE option_name LIKE %s", MOLONGUI_BUMP_OFFER_PREFIX.'_%' ),
        ARRAY_A
    );

    if ( !empty( $entries ) )
    {
        $options = array();
        foreach ( $entries as $entry ) $options[$entry['option_name']] = maybe_unserialize( $entry['option_value'] );
    }

    return empty( $options ) ? false : $options;
}