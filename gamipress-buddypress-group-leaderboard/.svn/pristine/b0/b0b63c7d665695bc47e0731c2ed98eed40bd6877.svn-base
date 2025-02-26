<?php
/**
 * Scripts
 *
 * @package     GamiPress\BuddyPress_Group_Leaderboard\Scripts
 * @since       1.0.0
 */
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Register admin scripts
 *
 * @since       1.0.0
 * @return      void
 */
function gamipress_bp_group_leaderboard_admin_register_scripts() {
    // Use minified libraries if SCRIPT_DEBUG is turned off
    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

    // Stylesheets
    wp_register_style( 'gamipress-buddypress-group-leaderboard-admin-css', GAMIPRESS_BP_GROUP_LEADERBOARD_URL . 'assets/css/gamipress-buddypress-group-leaderboard-admin' . $suffix . '.css', array( ), GAMIPRESS_BP_GROUP_LEADERBOARD_VER, 'all' );

    // Scripts
    wp_register_script( 'gamipress-buddypress-group-leaderboard-admin-js', GAMIPRESS_BP_GROUP_LEADERBOARD_URL . 'assets/js/gamipress-buddypress-group-leaderboard-admin' . $suffix . '.js', array( 'jquery', 'jquery-ui-sortable' ), GAMIPRESS_BP_GROUP_LEADERBOARD_VER, true );

}
add_action( 'admin_init', 'gamipress_bp_group_leaderboard_admin_register_scripts' );

/**
 * Enqueue admin scripts
 *
 * @since       1.0.0
 * @return      void
 */
function gamipress_bp_group_leaderboard_admin_enqueue_scripts( $hook ) {

    // Settings page
    if( $hook === 'gamipress_page_gamipress_settings' ) {

        //Stylesheets
        wp_enqueue_style( 'gamipress-buddypress-group-leaderboard-admin-css' );

        //Scripts
        wp_enqueue_script( 'gamipress-buddypress-group-leaderboard-admin-js' );

    }

}
add_action( 'admin_enqueue_scripts', 'gamipress_bp_group_leaderboard_admin_enqueue_scripts', 100 );