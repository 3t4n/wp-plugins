<?php
/**
 * Requirements
 *
 * @package GamiPress\Activity_by_Category\Requirements
 * @since 1.0.0
 */
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Add the post category field to the requirement object
 *
 * @param $requirement
 * @param $requirement_id
 *
 * @return array
 */
function gamipress_activity_by_category_requirement_object( $requirement, $requirement_id ) {

    if( isset( $requirement['trigger_type'] )
        && ( $requirement['trigger_type'] === 'gamipress_specific_category_publish_post'
            || $requirement['trigger_type'] === 'gamipress_specific_category_new_comment'
            || $requirement['trigger_type'] === 'gamipress_specific_category_post_visit'
            || $requirement['trigger_type'] === 'gamipress_user_specific_category_post_visit' ) ) {

        // The post category field
        $requirement['post_category'] = get_post_meta( $requirement_id, '_gamipress_post_category', true );

    }

    return $requirement;
}
add_filter( 'gamipress_requirement_object', 'gamipress_activity_by_category_requirement_object', 10, 2 );

/**
 * Category field on requirements UI
 *
 * @param $requirement_id
 * @param $post_id
 */
function gamipress_activity_by_category_requirement_ui_fields( $requirement_id, $post_id ) {

    $selected = absint( get_post_meta( $requirement_id, '_gamipress_post_category', true ) );

    wp_dropdown_categories( array(
        'show_option_none'   => __( 'Select a category', 'gamipress-activity-by-category' ),
        'selected'           => $selected,
        'hierarchical'       => 0,
        'hide_empty'         => 0,
        'name'               => '',
        'id'                 => '',
        'class'              => 'select-post-category select-post-category-' . $requirement_id,
        'taxonomy'           => 'category',
    ) );
}
add_action( 'gamipress_requirement_ui_html_after_achievement_post', 'gamipress_activity_by_category_requirement_ui_fields', 10, 2 );

/**
 * Custom handler to save the post category on requirements UI
 *
 * @param $requirement_id
 * @param $requirement
 */
function gamipress_activity_by_category_ajax_update_requirement( $requirement_id, $requirement ) {

    if( isset( $requirement['trigger_type'] )
        && ( $requirement['trigger_type'] === 'gamipress_specific_category_publish_post'
            || $requirement['trigger_type'] === 'gamipress_specific_category_new_comment'
            || $requirement['trigger_type'] === 'gamipress_specific_category_post_visit'
            || $requirement['trigger_type'] === 'gamipress_user_specific_category_post_visit' ) ) {

        // Save the post category field
        update_post_meta( $requirement_id, '_gamipress_post_category', $requirement['post_category'] );

    }
}
add_action( 'gamipress_ajax_update_requirement', 'gamipress_activity_by_category_ajax_update_requirement', 10, 2 );