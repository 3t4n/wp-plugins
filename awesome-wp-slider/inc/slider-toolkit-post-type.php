<?php
if(!defined('ABSPATH')) die ('-1');
// Custom post register
function aws_toolkit_custom_post() {
    register_post_type( 'slide',
        array(
            'labels' => array(
                'name' => esc_html__( 'Slides', 'aws-toolkit' ),
                'singular_name' => esc_html__( 'Slide', 'aws-toolkit' ),
                'add_new' => esc_html__( 'Add New', 'aws-toolkit'  ),
                'add_new_item' => esc_html__( 'Add New Slide', 'aws-toolkit'  ),
                'edit_item' => esc_html__( 'Edit Slide', 'aws-toolkit'  ),
                'new_item' => esc_html__( 'New Slide', 'aws-toolkit'  ),
                'view_item' => esc_html__( 'View Slide', 'aws-toolkit'  ),
                'not_found' => esc_html__( 'Sorry, we couldn\'t find the Slide you are looking for.', 'aws-toolkit'  )
            ),
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'menu_icon' => 'dashicons-images-alt',
        'menu_position' => 14,
        'has_archive' => false,
        'hierarchical' => false,
        'capability_type' => 'page',
        'rewrite' => array( 'slug' => 'slide' ),
        'supports' => array('title', 'editor', 'thumbnail'),
        )
    );
}
add_action( 'init', 'aws_toolkit_custom_post' );

// Post message update
function aws_toolkit_custom_post_message( $messages ) {
	$post             = get_post();
	$post_type        = get_post_type( $post );
	$post_type_object = get_post_type_object( $post_type );

    $messages['slide'] = array(
        0  => '', // Unused. Messages start at index 1.
        1  => esc_html__( 'Slide updated.', 'aws-toolkit'  ),
        2  => esc_html__( 'Slide updated.', 'aws-toolkit'  ),
        3  => esc_html__( 'Slide deleted.', 'aws-toolkit'  ),
        4  => esc_html__( 'Slide updated.', 'aws-toolkit'  ),
        /* translators: %s: date and time of the revision */
        5  => isset( $_GET['revision'] ) ? sprintf( esc_html__( 'Slide restored to revision from %s', 'aws-toolkit'  ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6  => esc_html__( 'Slide published.', 'aws-toolkit'  ),
        7  => esc_html__( 'Slide saved.', 'aws-toolkit'  ),
        8  => esc_html__( 'Slide submitted.', 'aws-toolkit' ),
        9  => sprintf(
            esc_html__( 'Slide scheduled for: <strong>%1$s</strong>.', 'aws-toolkit' ),
            // translators: Publish box date format, see http://php.net/date
            date_i18n( esc_html__( 'M j, Y @ G:i', 'aws-toolkit' ), strtotime( $post->post_date ) )
        ),
        10 => esc_html__( 'Slide draft updated.', 'aws-toolkit' )
    );
	return $messages;
}
add_filter( 'post_updated_messages', 'aws_toolkit_custom_post_message' );