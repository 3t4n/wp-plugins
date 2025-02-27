<?php
/**
 * Listeners
 *
 * @package GamiPress\Activity_by_Category\Listeners
 * @since 1.0.0
 */
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Listener for content publishing on a specific category
 *
 * Triggers: gamipress_publish_{$post_type}
 *
 * @since  1.0.0
 *
 * @param  string   $new_status The new post status
 * @param  string   $old_status The old post status
 * @param  WP_Post  $post       The post
 *
 * @return void
 */
function gamipress_activity_by_category_transition_post_status_listener( $new_status, $old_status, $post ) {

    // Statuses to check the old status
    $old_statuses = apply_filters( 'gamipress_publish_listener_old_status', array( 'new', 'auto-draft', 'draft', 'private', 'pending', 'future' ), $post->ID );

    // Statuses to check the new status
    $new_statuses = apply_filters( 'gamipress_publish_listener_new_status', array( 'publish', 'private' ), $post->ID );

    // Check if post status transition come to publish
    if ( in_array( $old_status, $old_statuses ) && in_array( $new_status, $new_statuses ) ) {

        // When inserting a post through the block editor, the post gets updated through rest API
        // This is required since on rest saving the post gets updated BEFORE get taxonomies applied
        if( defined( 'REST_REQUEST' ) && REST_REQUEST ) {
            // Hook the action 'rest_after_insert_{post_type}'
            add_action( 'rest_after_insert_post', 'gamipress_activity_by_category_insert_post_rest_listener',  10, 3 );
            return;
        }

        $categories_ids = wp_get_post_categories( $post->ID );

        if( is_array( $categories_ids ) ) {

            // Loop all categories attached to the post
            foreach( $categories_ids as $category_id ) {

                // Trigger content publishing actions
                do_action( "gamipress_specific_category_publish_{$post->post_type}", $post->ID, $post->post_author, $category_id, $post );

            }

        }
    }

}
add_action( 'transition_post_status', 'gamipress_activity_by_category_transition_post_status_listener', 10, 3 );

/**
 * Listener for insert post through rest
 *
 * Triggers: gamipress_publish_{$post_type}
 *
 * @since  1.0.0
 *
 * @param  WP_Post  $post       The post
 * @param  Object   $request    The request object
 * @param  bool     $creating   Boolean to check if is creating or updating
 *
 * @return void
 */
function gamipress_activity_by_category_insert_post_rest_listener( $post, $request, $creating ) {

    $categories_ids = wp_get_post_categories( $post->ID );

    if( is_array( $categories_ids ) ) {

        // Loop all categories attached to the post
        foreach( $categories_ids as $category_id ) {

            // Trigger content publishing actions
            do_action( "gamipress_specific_category_publish_{$post->post_type}", $post->ID, $post->post_author, $category_id, $post );

        }

    }

}

/**
 * Listener for comment publishing on a post of specific category
 *
 * Triggers: gamipress_specific_category_new_comment
 *
 * @since  1.0.0
 *
 * @param  integer $comment_ID The comment ID
 * @param  array|object $comment The comment array
 *
 * @return void
 */
function gamipress_activity_by_category_approved_comment_listener( $comment_ID, $comment ) {

    // Enforce array for both hooks (wp_insert_comment uses object, comment_{status}_comment uses array)
    if ( is_object( $comment ) ) {
        $comment = get_object_vars( $comment );
    }

    // Check if comment is approved
    if ( 1 != (int) $comment[ 'comment_approved' ] ) {
        return;
    }

    $post = get_post( $comment[ 'comment_post_ID' ] );

    if( $post ) {

        $categories_ids = wp_get_post_categories( $post->ID );

        if( is_array( $categories_ids ) ) {

            // Loop all categories attached to the post
            foreach( $categories_ids as $category_id ) {

                // Trigger comment on category action
                do_action( 'gamipress_specific_category_new_comment', (int) $comment_ID, (int) $comment[ 'user_id' ], $category_id, $comment[ 'comment_post_ID' ], $comment );

            }

        }

    }

}
add_action( 'comment_approved_comment', 'gamipress_activity_by_category_approved_comment_listener', 10, 2 );
add_action( 'wp_insert_comment', 'gamipress_activity_by_category_approved_comment_listener', 10, 2 );

/**
 * Listener for daily visits
 *
 * Triggers: gamipress_specific_category_post_visit
 *
 * @since   1.0.0
 * @updated 1.0.5 Update to hook function to gamipress_specific_post_visit
 *
 * @param  int      $post_id    The post ID
 * @param  int      $user_id    The user ID
 * @param  WP_Post  $post       The post object
 *
 * @return void
 */
function gamipress_activity_by_category_site_visit_listener( $post_id, $user_id, $post ) {

    if( $post ) {

        // Current time
        $now = strtotime( date( 'Y-m-d 00:00:00', current_time( 'timestamp' ) ) );

        $categories_ids = wp_get_post_categories( $post->ID );

        if( is_array( $categories_ids ) ) {

            // Loop all categories attached to the post
            foreach( $categories_ids as $category_id ) {

                // Post of category daily visit
                $count = gamipress_get_user_trigger_count( $user_id, 'gamipress_specific_category_post_visit', $now, 0, array( $post->ID, $user_id, $category_id, $post ) );

                // Trigger specific daily visit action if not triggered today
                if( $count === 0 ) {
                    do_action( 'gamipress_specific_category_post_visit', $post->ID, $user_id, $category_id, $post );
                }

            }

        }

    }
}
add_action( 'gamipress_specific_post_visit', 'gamipress_activity_by_category_site_visit_listener', 10, 3 );

/**
 * Listener for user post visits
 *
 * Triggers: gamipress_user_specific_category_post_visit
 *
 * @since   1.0.0
 * @updated 1.0.5 Update to hook function to gamipress_specific_post_visit
 *
 * @param  int      $post_id        The post ID
 * @param  int      $post_author    The post author ID
 * @param  int      $user_id        The user ID
 * @param  WP_Post  $post           The post object
 *
 * @return void
 */
function gamipress_activity_by_category_user_post_visit_listener( $post_id, $post_author, $user_id, $post ) {

    if( $post ) {

        // Trigger user post visit action to the author if visitor not is the author
        if( $post_author && $post_author !== $user_id ) {

            $categories_ids = wp_get_post_categories( $post->ID );

            if( is_array( $categories_ids ) ) {

                // Loop all categories attached to the post
                foreach( $categories_ids as $category_id ) {

                    do_action( 'gamipress_user_specific_category_post_visit', $post->ID, $post_author, $user_id, $category_id, $post );

                }

            }
        }

    }

}
add_action( 'gamipress_user_specific_post_visit', 'gamipress_activity_by_category_user_post_visit_listener', 10, 4 );