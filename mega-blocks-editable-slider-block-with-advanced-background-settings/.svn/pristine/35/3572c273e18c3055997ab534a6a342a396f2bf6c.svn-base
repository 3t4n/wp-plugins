<?php
// If this file is called directly, abort.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit;
}

// Cleanup options set by the plugin
delete_option( 'mega_slider_settings' );

// Delete any custom post meta or terms related to the slider block (if any)
global $wpdb;
$wpdb->query( "DELETE FROM {$wpdb->postmeta} WHERE meta_key LIKE '_mega_slider_%'" );
