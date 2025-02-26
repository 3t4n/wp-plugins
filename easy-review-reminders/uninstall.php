<?php
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) exit();

/**
 * Function that houses the code that cleans up the plugin on un-installation.
 *
 * @since 1.2.0
 */
function errPluginCleanup() {

    $cleanup = get_option( 'err_general_clean_plugin_options' );

    if( isset( $cleanup ) && $cleanup == 'yes' ){

        global $wpdb;

        // Delete options.
        $wpdb->query( "DELETE FROM $wpdb->options WHERE option_name LIKE 'err\_%';" );

        // Delete Entries
        $wpdb->query( "DELETE FROM {$wpdb->posts} WHERE post_type IN ( 'err-review-reminders' );" );
        $wpdb->query( "DELETE meta FROM {$wpdb->postmeta} meta LEFT JOIN {$wpdb->posts} posts ON posts.ID = meta.post_id WHERE posts.ID IS NULL;" );

        // Removes all pending cron event at the background
        wp_clear_scheduled_hook( 'err_email_sender_cron' );
        wp_clear_scheduled_hook( 'err_time_considered_not_reviewed_cron' );

        // Clear any cached data that has been removed
        wp_cache_flush();

    }
}

if ( function_exists( 'is_multisite' ) && is_multisite() ) {

    global $wpdb;

    $blogIDs = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );

    foreach ( $blogIDs as $blogID ) {

        switch_to_blog( $blogID );
        errPluginCleanup();

    }

    restore_current_blog();

    return;

} else
    errPluginCleanup();