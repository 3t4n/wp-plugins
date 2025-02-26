<?php
// Die if uninstall file is not called by WordPress
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    die;
}

// Delete options
$anicons_options = array(
    'anicons_whatsapp_enabled',
    'anicons_whatsapp_number',
    'anicons_whatsapp_bottom',
    'anicons_whatsapp_left',
    'anicons_whatsapp_icon',

    'anicons_scroll_enabled',
    'anicons_scroll_bottom',
    'anicons_scroll_right',
    'anicons_scroll_icon',
);

foreach ( $anicons_options as $option ) {
    if ( get_option( $option ) ) {
        delete_option( $option );
    }
}