<?php
/**
 * Content Filters
 *
 * @package GamiPress\BuddyPress_Group_Leaderboard\Content_Filters
 * @since 1.0.0
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Filter leaderboard query vars to just include group members
 *
 * @param array     $query_vars
 * @param int       $leaderboard_id
 *
 * @return array
 */
function gamipress_bp_group_leaderboard_leaderboard_pre_query_vars( $query_vars, $leaderboard_id ) {

    // Check if leaderboard is for a specific group
    $group_id = absint( gamipress_get_post_meta( $leaderboard_id, '_gamipress_bp_group_leaderboard_group_id' ) );

    if( $group_id !== 0 ) {

        // Get all group members
        $group_members = groups_get_group_members( array(
            'group_id' => $group_id,
            'page' => 1,
            'per_page' => 9999,
            'exclude_admins_mods' => false
        ) );

        // Setup an array of group members IDs to be used on $query_vars
        $include_users = array();

        if( $group_members && isset( $group_members['members'] ) && ! empty( $group_members['members'] ) ) {

            foreach( $group_members['members'] as $group_member ) {

                $include_users[] = $group_member->ID;
            }

        }

        // Force leaderboards users to just group members
        if( count( $include_users ) )
            $query_vars['where'][] = "u.ID IN ( " . implode( ', ', $include_users ) . " )";

    }

    return $query_vars;

}
add_filter( 'gamipress_leaderboards_leaderboard_pre_query_vars', 'gamipress_bp_group_leaderboard_leaderboard_pre_query_vars', 10, 2 );

/**
 * Common function to override a group leaderboard option
 *
 * @param mixed $option_value
 * @param int   $leaderboard_id
 *
 * @return mixed
 */
function gamipress_bp_group_leaderboard_override_leaderboard_option( $option_value, $leaderboard_id ) {

    // Check if leaderboard is for a specific group
    $group_id = absint( gamipress_get_post_meta( $leaderboard_id, '_gamipress_bp_group_leaderboard_group_id' ) );

    if( $group_id !== 0 ) {

        // Turns 'gamipress_leaderboards_leaderboard_columns' into 'columns'
        $option = str_replace( 'gamipress_leaderboards_leaderboard_', '', current_filter() );

        // Setup option default value
        $option_default = '';

        switch( $option ) {
            case 'columns':
            case 'metrics':
                $option_default = array();
                break;
            case 'users':
            case 'users_per_page':
                $option_default = 10;
                break;
        }

        // Override option value
        $option_value = gamipress_bp_group_leaderboard_get_option( $option, $option_default );

    }

    return $option_value;

}
add_filter( 'gamipress_leaderboards_leaderboard_users', 'gamipress_bp_group_leaderboard_override_leaderboard_option', 10, 2 );
add_filter( 'gamipress_leaderboards_leaderboard_users_per_page', 'gamipress_bp_group_leaderboard_override_leaderboard_option', 10, 2 );
add_filter( 'gamipress_leaderboards_leaderboard_columns', 'gamipress_bp_group_leaderboard_override_leaderboard_option', 10, 2 );
add_filter( 'gamipress_leaderboards_leaderboard_metrics', 'gamipress_bp_group_leaderboard_override_leaderboard_option', 10, 2 );
add_filter( 'gamipress_leaderboards_leaderboard_period', 'gamipress_bp_group_leaderboard_override_leaderboard_option', 10, 2 );
add_filter( 'gamipress_leaderboards_leaderboard_period_start_date', 'gamipress_bp_group_leaderboard_override_leaderboard_option', 10, 2 );
add_filter( 'gamipress_leaderboards_leaderboard_period_end_date', 'gamipress_bp_group_leaderboard_override_leaderboard_option', 10, 2 );