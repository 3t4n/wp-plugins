<?php
/**
 * Logs
 *
 * @package GamiPress\Activity_by_Category\Logs
 * @since 1.0.0
 */
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Extended meta data for event trigger logging
 *
 * @since 1.0.0
 *
 * @param array 	$log_meta
 * @param integer 	$user_id
 * @param string 	$trigger
 * @param integer 	$site_id
 * @param array 	$args
 *
 * @return array
 */
function gamipress_activity_by_category_log_event_trigger_meta_data( $log_meta, $user_id, $trigger, $site_id, $args ) {

    switch ( $trigger ) {
        case 'gamipress_specific_category_publish_post':
        case 'gamipress_specific_category_post_visit':
            // Add the published/visited post ID and the category ID
            $log_meta['post_id'] = $args[0];
            $log_meta['post_category'] = $args[2];
            break;
        case 'gamipress_user_specific_category_post_visit':
            // Add the visited post ID, visitor ID and the post category ID
            $log_meta['post_id'] = $args[0];
            $log_meta['visitor_id'] = $args[2];
            $log_meta['post_category'] = $args[3];
            break;
        case 'gamipress_specific_category_new_comment':
            // Add the comment ID, post commented ID and post commented category ID
            $log_meta['comment_id'] = $args[0];
            $log_meta['comment_post_category'] = $args[2];
            $log_meta['comment_post_id'] = $args[3];
            break;
    }

    return $log_meta;

}
add_action( 'gamipress_log_event_trigger_meta_data', 'gamipress_activity_by_category_log_event_trigger_meta_data', 10, 5 );

/**
 * Override the meta data to filter the logs count
 *
 * @since   1.0.8
 *
 * @param  array    $log_meta       The meta data to filter the logs count
 * @param  int      $user_id        The given user's ID
 * @param  string   $trigger        The given trigger we're checking
 * @param  int      $since 	        The since timestamp where retrieve the logs
 * @param  int      $site_id        The desired Site ID to check
 * @param  array    $args           The triggered args or requirement object
 *
 * @return array                    The meta data to filter the logs count
 */
function gamipress_activity_by_category_get_user_trigger_count_log_meta( $log_meta, $user_id, $trigger, $since, $site_id, $args ) {

    switch( $trigger ) {
        // Publish
        case 'gamipress_specific_category_publish_post':
        // Visit
        case 'gamipress_specific_category_post_visit':
            if( isset( $args[0] ) && isset( $args[2] ) ) {
                // Add the post and category IDs
                $log_meta['post_id'] = absint( $args[0] );
                $log_meta['post_category'] = absint( $args[2] );
            }

            // $args could be a requirement object
            if( isset( $args['post_id'] ) && isset( $args['post_category'] ) ) {
                // Add the post and category IDs
                $log_meta['post_id'] = absint( $args['post_id'] );
                $log_meta['post_category'] = absint( $args['post_category'] );
            }
            break;
        // Comment
        case 'gamipress_specific_category_new_comment':
            if( isset( $args[0] ) && isset( $args[3] ) && isset( $args[2] ) ) {
                // Add the comment, post and category IDs
                $log_meta['comment_id'] = absint( $args[0] );
                $log_meta['comment_post_id'] = absint( $args[3] );
                $log_meta['comment_post_category'] = absint( $args[2] );
            }

            // $args could be a requirement object
            if( isset( $args['comment_id'] ) && isset( $args['comment_post_id'] ) && isset( $args['comment_post_category'] ) ) {
                // Add the comment, post and category IDs
                $log_meta['comment_id'] = absint( $args['comment_id'] );
                $log_meta['comment_post_id'] = absint( $args['comment_post_id'] );
                $log_meta['comment_post_category'] = absint( $args['comment_post_category'] );
            }
            break;
        // Get visit
        case 'gamipress_user_specific_category_post_visit':
            if( isset( $args[0] ) && isset( $args[3] ) ) {
                // Add the post and category IDs
                $log_meta['post_id'] = absint( $args[0] );
                $log_meta['post_category'] = absint( $args[3] );
            }

            // $args could be a requirement object
            if( isset( $args['post_id'] ) && isset( $args['post_category'] ) ) {
                // Add the download and variation IDs
                $log_meta['post_id'] = absint( $args['post_id'] );
                $log_meta['post_category'] = absint( $args['post_category'] );
            }
            break;
    }

    return $log_meta;

}
add_filter( 'gamipress_get_user_trigger_count_log_meta', 'gamipress_activity_by_category_get_user_trigger_count_log_meta', 10, 6 );

/**
 * Extra data fields
 *
 * @since 1.0.0
 *
 * @param array     $fields
 * @param int       $log_id
 * @param string    $type
 *
 * @return array
 */
function gamipress_activity_by_category_log_extra_data_fields( $fields, $log_id, $type ) {

    $prefix = '_gamipress_';

    if( $type !== 'event_trigger' ) {
        return $fields;
    }

    $log = ct_get_object( $log_id );
    $trigger = $log->trigger_type;

    if( $trigger === 'gamipress_specific_category_publish_post'
        || $trigger === 'gamipress_specific_category_new_comment'
        || $trigger === 'gamipress_specific_category_post_visit'
        || $trigger === 'gamipress_user_specific_category_post_visit' ) {

        $field_name = ( $trigger === 'gamipress_specific_category_new_comment' ? 'comment_post_category' : 'post_category' );

        if( is_gamipress_upgraded_to( '1.2.8' ) ) {
            $category_id = ct_get_object_meta( $log_id, $prefix . $field_name, true );
        } else {
            $category_id = get_post_meta( $log_id, $prefix . $field_name, true );
        }

        $fields[] = array(
            'name' 	=> __( 'Category', 'gamipress-activity-by-category' ),
            'desc' 	=> __( 'Category assigned to this log.', 'gamipress-activity-by-category' ),
            'id'   	=> $prefix . $field_name,
            'type' 	=> 'advanced_select',
            'options' 	=> array(
                $category_id => ( absint( $category_id ) !== 0 ? get_cat_name( absint( $category_id ) ) : __( 'No category logged', 'gamipress-activity-by-category' ) )
            ),
        );

    }

    return $fields;

}
add_filter( 'gamipress_log_extra_data_fields', 'gamipress_activity_by_category_log_extra_data_fields', 10, 3 );