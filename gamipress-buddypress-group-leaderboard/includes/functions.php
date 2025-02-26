<?php
/**
 * Functions
 *
 * @package GamiPress\BuddyPress_Group_Leaderboard\Functions
 * @since 1.0.0
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Compatibility function to check if a BuddyPress module is active
 *
 * @since 1.0.0
 *
 * @param string $component The component name.
 *
 * @return bool
 */
function gamipress_bp_group_leaderboard_is_active( $component = '' ) {

    if( function_exists( 'bp_is_active' ) ) {
        return bp_is_active( $component );
    }

    return true;

}

/**
 * Helper function to get a group leaderboard, if not exists, will create one
 *
 * @since 1.0.0
 *
 * @param int $group_id     The group ID.
 *
 * @return int              The group leaderboard ID
 */
function gamipress_bp_group_leaderboard_get_group_leaderboard( $group_id ) {

    global $wpdb;

    $posts    	= GamiPress()->db->posts;
    $postmeta 	= GamiPress()->db->postmeta;

    $prefix = '_gamipress_bp_group_leaderboard_';

    $leaderboard_id = absint( $wpdb->get_var( $wpdb->prepare(
        "SELECT p.ID
		FROM {$posts} AS p
		JOIN {$postmeta} AS pm
		ON p.ID = pm.post_id
		WHERE  p.post_type = %s
		       AND p.post_status = %s
		       AND pm.meta_key = %s
		       AND pm.meta_value = %s",
        'gp_leaderboard',
        'publish',
        $prefix . 'group_id',
        $group_id
    ) ) );

    // If this group hasn't a leaderboard, then create one
    if( ! $leaderboard_id ) {

        $site_id = get_current_blog_id();

        // If GamiPress is network wide active and there is not the main site, switch blog
        if( gamipress_is_network_wide_active() && ! is_main_site() ) {
            switch_to_blog( get_main_site_id() );
        }

        $group = groups_get_group( $group_id );

        // Creates a new leaderboard
        $leaderboard_id = wp_insert_post( array(
            'post_title' => sprintf( __( 'Group %s Leaderboard', 'gamipress-buddypress-group-leaderboard' ), $group->name ),
            'post_type' => 'gp_leaderboard',
            'post_status' => 'publish',
        ) );

        // Adds the group ID as meta
        gamipress_update_post_meta( $leaderboard_id, $prefix . 'group_id', $group_id );

        // Restore current blog
        if( gamipress_is_network_wide_active() ) {
            switch_to_blog( $site_id );
        }

    }

    return $leaderboard_id;

}

/**
 * Helper function to loop all groups and reassign a leaderboard if haven't one
 *
 * @since 1.0.2
 */
function gamipress_bp_group_leaderboard_regenerate_leaderboards() {

    // Grab all groups
    $groups = groups_get_groups( array(
        'per_page' => null
    ) );

    if( isset( $groups['groups'] ) ) {
        foreach( $groups['groups'] as $group ) {
            // Automatically generates a leaderboard for this group
            gamipress_bp_group_leaderboard_get_group_leaderboard( $group->id );
        }
    }

}