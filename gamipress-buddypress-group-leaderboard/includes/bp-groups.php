<?php
/**
 * BuddyPress Groups
 *
 * @package GamiPress\BuddyPress_Group_Leaderboard\BuddyPress_Groups
 * @since 1.0.0
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Loads GamiPress_BP_Component Class from bp_init
 *
 * @since 1.0.0
 */
function gamipress_bp_group_leaderboard_load_components() {

    if ( function_exists( 'buddypress' ) && buddypress() && ! buddypress()->maintenance_mode && gamipress_bp_group_leaderboard_is_active( 'groups' ) ) {
        // Load the component if site pass all checks
        $GLOBALS['gamipress_leaderboard_bp_component'] = new GamiPress_Leaderboard_BP_Component();
    }

}
add_action( 'bp_init', 'gamipress_bp_group_leaderboard_load_components', 1 );

/**
 * Setup the Leaderboard tab screen
 *
 * @since 1.0.0
 */
function gamipress_bp_group_leaderboard_screen() {

    add_action( 'bp_template_content', 'gamipress_bp_group_leaderboard_content' );

    bp_core_load_template( apply_filters( 'gamipress_bp_group_leaderboard', 'groups/single/plugins' ) );

}

/**
 * Leaderboard tab screen content
 *
 * @since 1.0.0
 */
function gamipress_bp_group_leaderboard_content() {

    // Get the group ID
    $group_id = bp_get_current_group_id();

    // Get the group leaderboard
    $leaderboard_id = gamipress_bp_group_leaderboard_get_group_leaderboard( $group_id );

    $search = (bool) gamipress_bp_group_leaderboard_get_option( 'search', false ) ? 'yes' : 'no';
    $sort = (bool) gamipress_bp_group_leaderboard_get_option( 'sort', false ) ? 'yes' : 'no';
    $hide_admins = (bool) gamipress_bp_group_leaderboard_get_option( 'hide_admins', false ) ? 'yes' : 'no';

    $content = do_shortcode( '[gamipress_leaderboard id="' . $leaderboard_id . '" title="" excerpt="no" search="' . $search . '" sort="' . $sort . '" hide_admins="' . $hide_admins . '"]' );

    /**
     * Filters the group leaderboard content
     *
     * @since 1.0.4
     *
     * @param string    $content
     * @param int       $group_id
     * @param int       $leaderboard_id
     *
     * @return string
     */
    $content = apply_filters( 'gamipress_bp_group_leaderboard_content', $content, $group_id, $leaderboard_id );

    echo $content;

}

/**
 * On delete a group, also delete the assigned leaderboard
 *
 * @since 1.0.5
 *
 * @param int $group_id
 */
function gamipress_bp_group_leaderboard_on_delete_group( $group_id ) {

    // Get the leaderboard ID of this group
    $leaderboard_id = gamipress_bp_group_leaderboard_get_group_leaderboard( $group_id );

    if( $leaderboard_id )
        wp_delete_post( $leaderboard_id, true );

}
add_action( 'groups_delete_group', 'gamipress_bp_group_leaderboard_on_delete_group' );