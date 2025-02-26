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
 * @link       https://alessioruggieri.com
 * @since      1.0.0
 *
 * @package    Arpcso_Page_Cpt_Style_Organizer
 */

// If uninstall not called from WordPress, then exit.
if (! defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

// Delete plugin options
delete_option('arpcso_page_cpt_ct_groups');

// Delete custom metadata from posts/pages
global $wpdb;
$meta_keys = ['_arpcso_page_cpt_ct_group', '_arpcso_page_cpt_ct_type', '_arpcso_page_cpt_ct_role'];

// Delete associated metadata
foreach ($meta_keys as $meta_key) {
    global $wpdb;

    foreach ($meta_keys as $meta_key) {
        // This direct database call is required as no WordPress function supports batch deletion of meta keys.
        $wpdb->query(
            $wpdb->prepare(
                "DELETE FROM {$wpdb->postmeta} WHERE meta_key = %s",
                sanitize_key($meta_key) // Ensures the meta key is sanitized
            )
        );

        // Clear cache for the deleted meta key
        wp_cache_delete($meta_key, 'post_meta');
    }
}
