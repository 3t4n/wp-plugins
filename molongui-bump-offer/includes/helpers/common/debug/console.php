<?php
defined( 'ABSPATH' ) or exit;
function mbo_console_log( $message )
{
    if ( apply_filters( 'mbo/disable_console_log', false ) ) return;

    $hook = is_admin() ? 'admin_footer' : 'wp_footer';

    add_action( $hook, function() use ( $message )
    {
        if ( is_array( $message ) ) $message = implode( '\n', $message );
        $output = '"' . '%c' . strtoupper( MOLONGUI_BUMP_OFFER_ID ) . '\n%c' . $message . '", "font-weight: bold; text-decoration: underline;", ""';
        echo '<script>console.log(' . $output . ');</script>';
    });
}