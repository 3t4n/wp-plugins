<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - This method should be static
 * - Check if the $_REQUEST content actually is the plugin name
 * - Run an admin referrer check to make sure it goes through authentication
 * - Verify the output of $_GET makes sense
 * - Repeat with other user roles. Best directly by using the links/query string parameters.
 * - Repeat things for multisite. Once for a single site in the network, once sitewide.
 *
 * This file may be updated more in future version of the Boilerplate; however, this is the
 * general skeleton and outline for how the file should work.
 *
 * For more information, see the following discussion:
 * https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate/pull/123#issuecomment-28541913
 *
 * @link       https://www.ibsofts.com
 * @since      5.0.7
 *
 * @package    Ghl_Gf_Extension
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}


global $wpdb;
// Delete ghlex_subaccount table
if ( is_multisite() ) {
    // For multisite installations, delete both tables for each site
    $sites = get_sites();
    foreach ( $sites as $site ) {
        $site_id = $site->blog_id;

        // Delete ghlex_subaccount table
        $table_name_subaccount = $wpdb->get_blog_prefix( $site_id ) . "ghlex_subaccount";
        $wpdb->query( "DROP TABLE IF EXISTS $table_name_subaccount" );

        // Delete ghlexform_mapping table
        $table_name_mapping = $wpdb->get_blog_prefix( $site_id ) . "ghlexform_mapping";
        $wpdb->query( "DROP TABLE IF EXISTS $table_name_mapping" );
    }
} else {
    // For non-multisite installations, delete both tables for the main site
    $table_name_subaccount = $wpdb->prefix . "ghlex_subaccount";
    $wpdb->query( "DROP TABLE IF EXISTS $table_name_subaccount" );

    $table_name_mapping = $wpdb->prefix . "ghlexform_mapping";
    $wpdb->query( "DROP TABLE IF EXISTS $table_name_mapping" );
}