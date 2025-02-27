<?php
/**
 * Triggers
 *
 * @package GamiPress\Activity_by_Category\Triggers
 * @since 1.0.0
 */
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Register plugin activity triggers
 *
 * @param array $activity_triggers
 * @return mixed
 */
function gamipress_activity_by_category_activity_triggers( $activity_triggers ) {

    $activity_triggers[__( 'Activity by Categories', 'gamipress-activity-by-category' )] = array(
        'gamipress_specific_category_publish_post' 		=> __( 'Publish a post on a specific category', 'gamipress-activity-by-category' ),
        'gamipress_specific_category_new_comment' 		=> __( 'Comment on a post of a specific category', 'gamipress-activity-by-category' ),
        'gamipress_specific_category_post_visit'  		=> __( 'Daily visit a post of a specific category', 'gamipress-activity-by-category' ),
        'gamipress_user_specific_category_post_visit'	=> __( 'Get visits on any post of a specific category', 'gamipress-activity-by-category' ),
    );

    return $activity_triggers;

}
add_filter( 'gamipress_activity_triggers', 'gamipress_activity_by_category_activity_triggers' );

/**
 * Build custom activity trigger label
 *
 * @param string    $title
 * @param integer   $requirement_id
 * @param array     $requirement
 *
 * @return string
 */
function gamipress_activity_by_category_activity_trigger_label( $title, $requirement_id, $requirement ) {

    $category_id = ( isset( $requirement['post_category'] ) ) ? absint( $requirement['post_category'] ) : 0;

    if( $category_id === 0 ) {
        return $title;
    }

    $category_name = get_cat_name( $category_id );

    switch( $requirement['trigger_type'] ) {
        case 'gamipress_specific_category_publish_post':
            return sprintf( __( 'Publish a post on category %s', 'gamipress-activity-by-category' ), $category_name );
            break;
        case 'gamipress_specific_category_new_comment':
            return sprintf( __( 'Comment on any post of category %s', 'gamipress-activity-by-category' ), $category_name );
            break;
        case 'gamipress_specific_category_post_visit':
            return sprintf( __( 'Visit any post of category %s', 'gamipress-activity-by-category' ), $category_name );
            break;
        case 'gamipress_user_specific_category_post_visit':
            return sprintf( __( 'Get a visit on any post of category %s', 'gamipress-activity-by-category' ), $category_name );
            break;
    }

    return $title;
}
add_filter( 'gamipress_activity_trigger_label', 'gamipress_activity_by_category_activity_trigger_label', 10, 3 );

/**
 * Get user for a given trigger action.
 *
 * @since  1.0.0
 *
 * @param  integer $user_id user ID to override.
 * @param  string  $trigger Trigger name.
 * @param  array   $args    Passed trigger args.
 *
 * @return integer          User ID.
 */
function gamipress_activity_by_category_trigger_get_user_id( $user_id, $trigger, $args ) {

    switch ( $trigger ) {
        case 'gamipress_specific_category_publish_post':
        case 'gamipress_specific_category_new_comment':
        case 'gamipress_specific_category_post_visit':
        case 'gamipress_user_specific_category_post_visit':
            $user_id = $args[1];
            break;
    }

    return $user_id;

}
add_filter( 'gamipress_trigger_get_user_id', 'gamipress_activity_by_category_trigger_get_user_id', 10, 3 );