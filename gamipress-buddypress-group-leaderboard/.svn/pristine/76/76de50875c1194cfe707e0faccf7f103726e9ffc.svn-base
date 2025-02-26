<?php
/**
 * GamiPress Leaderboard BuddyPress Component
 *
 * @package GamiPress\BuddyPress_Group_Leaderboard\GamiPress_Leaderboard_BP_Component
 * @since 1.0.0
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'GamiPress_Leaderboard_BP_Component' ) ) {

    /**
     * Class GamiPress_Leaderboard_BP_Component
     *
     * @since 1.0.0
     */
    class GamiPress_Leaderboard_BP_Component extends BP_Component {

        function __construct() {

            parent::start(
                'gamipress-leaderboard',
                __( 'GamiPress Leaderboard', 'gamipress-buddypress-group-leaderboard' ),
                BP_PLUGIN_DIR
            );

        }

        // Globals
        public function setup_globals( $args = '' ) {

            $bp = buddypress();

            $tab_title = gamipress_bp_group_leaderboard_get_option( 'tab_title', __( 'Leaderboard', 'gamipress-buddypress-group-leaderboard' ) );

            $tab_slug = sanitize_title( $tab_title );

            parent::setup_globals( array(
                'has_directory' => true,
                'root_slug'     =>  isset( $bp->pages->groups->slug ) ? $bp->pages->groups->slug : BP_GROUPS_SLUG,
                'slug'          => $tab_slug,
            ) );

        }

        // BuddyPress actions
        public function setup_actions() {
            parent::setup_actions();
        }

        // Group Profile Menu
        public function setup_nav( $main_nav = '', $sub_nav = '' ) {

            if ( ! bp_is_groups_component() && ! bp_is_single_item() ) {
                return;
            }

            // Get the group ID
            $group_id = bp_get_current_group_id();

            if( ! $group_id ) {
                return;
            }

            // Setup the group object
            $group = groups_get_group( $group_id );

            $tab_title = gamipress_bp_group_leaderboard_get_option( 'tab_title', __( 'Leaderboard', 'gamipress-buddypress-group-leaderboard' ) );

            // Setup the navigation sub-item
            $sub_nav = array(
                'name'                  => $tab_title,
                'slug'                  => $this->slug,
                'parent_url'            => bp_get_group_permalink( $group ),
                'parent_slug'           => $group->slug,
                'position'              => 100,
                'screen_function'       => 'gamipress_bp_group_leaderboard_screen',
                'default_subnav_slug'   => $this->slug
            );

            // Add to the groups navigation
            bp_core_new_subnav_item( $sub_nav, 'groups' );

            //parent::setup_nav( $main_nav, $sub_nav );

        }

    }

}