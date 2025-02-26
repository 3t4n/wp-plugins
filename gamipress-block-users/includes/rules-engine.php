<?php
/**
 * Rules Engine
 *
 * @package GamiPress\Block_Users\Rules_Engine
 * @since 1.0.0
 */
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Check if user is deserved to get awarded
 *
 * @since 1.0.0
 *
 * @param bool      $return
 * @param int       $user_id
 * @param string    $trigger
 * @param int       $site_id
 * @param array     $args
 *
 * @return bool
 */
function gamipress_block_users_user_deserves_trigger( $return, $user_id, $trigger, $site_id, $args ) {

    if( $return === false ) {
        return $return;
    }
    
    if( gamipress_block_users_is_blocked( $user_id ) ) {
        return false;
    }

    return $return;
	
}
add_filter( 'gamipress_user_deserves_trigger', 'gamipress_block_users_user_deserves_trigger', 999, 5 );

/**
 * Check if user is deserved to get awarded or deducted points
 *
 * @since 1.0.0
 *
 * @param bool      $return
 * @param int       $user_id
 * @param int       $points
 * @param string    $points_type
 * @param array     $args
 *
 * @return bool
 */
function gamipress_block_users_user_deserves_points( $return, $user_id, $points, $points_type, $args ) {
	
    if( $return === false ) {
        return $return;
    }
    
    if( gamipress_block_users_is_blocked( $user_id ) ) {
        return false;
    }

    return $return;
	
}
add_filter( 'gamipress_allow_award_points_to_user', 'gamipress_block_users_user_deserves_points', 999, 5 );
add_filter( 'gamipress_allow_deduct_points_to_user', 'gamipress_block_users_user_deserves_points', 999, 5 );

/**
 * Check if user is deserved to get the user earning
 *
 * @since 1.0.0
 *
 * @param bool      $return
 * @param int       $user_id
 * @param array     $data
 * @param array     $meta
 *
 * @return bool
 */
function gamipress_block_users_user_deserves_insert_earning( $return, $user_id, $data, $meta ) {

    if( $return === false ) {
        return $return;
    }
	
    if( gamipress_block_users_is_blocked( $user_id ) ) {
        return false;
    }

    return $return;

}
add_filter( 'gamipress_allow_insert_user_earning_to_user', 'gamipress_block_users_user_deserves_insert_earning', 999, 4 );

/**
 * Check if user meets the conditions
 *
 * @param int       $user_id
 * 
 * @since 1.0.0
 *
 * @return bool
 */

function gamipress_block_users_is_blocked( $user_id ) {
	
	$blocked_roles = gamipress_block_users_get_option( 'blocked_roles' );

    // Check if user role has been manually blocked
    if( is_array( $blocked_roles ) ) {

        foreach( $blocked_roles as $blocked_role ) {
            if( user_can( $user_id, $blocked_role ) ) {
                return true;
            }
        }

    }

    $blocked_users = gamipress_block_users_get_option( 'blocked_users' );

    // Check if user has been manually blocked
    if( is_array( $blocked_users ) ) {

        // Turn blocked users IDs to int to ensure check
        $blocked_users = array_map( 'intval', $blocked_users );

        if( in_array( $user_id, $blocked_users ) ) {
            return true;
        }
    }

    return false;
	
}
