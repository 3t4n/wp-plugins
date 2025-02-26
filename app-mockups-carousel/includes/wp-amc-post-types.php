<?php
/**
 * Register Post type functionality
 *
 * @package App Mockups Carousel
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Function to register post type
 * 
 * @package App Mockups Carousel
 * @since 1.0.0
 */
function wp_amc_register_post_type() {
	
	$wp_amc_post_lbls = apply_filters( 'wp_amc_post_labels', array(
								'name'                 	=> __('App Mockups Carousel', 'app-mockups-carousel'),
								'singular_name'        	=> __('App Mockups Carousel', 'app-mockups-carousel'),
								'add_new'              	=> __('Add Carousel', 'app-mockups-carousel'),
								'add_new_item'         	=> __('Add New Image Carousel', 'app-mockups-carousel'),
								'edit_item'            	=> __('Edit Image Carousel', 'app-mockups-carousel'),
								'new_item'             	=> __('New Image Carousel', 'app-mockups-carousel'),
								'view_item'            	=> __('View Image Carousel', 'app-mockups-carousel'),
								'search_items'         	=> __('Search Image Carousel', 'app-mockups-carousel'),
								'not_found'            	=> __('No Image Carousel found', 'app-mockups-carousel'),
								'not_found_in_trash'   	=> __('No Image Carousel found in Trash', 'app-mockups-carousel'),								
								'menu_name'           	=> __('App Mockups Carousel', 'app-mockups-carousel')
							));

	$wp_amc_slider_args = array(
		'labels'				=> $wp_amc_post_lbls,
		'public'              	=> false,
		'show_ui'             	=> true,
		'query_var'           	=> false,
		'rewrite'             	=> false,
		'capability_type'     	=> 'post',
		'hierarchical'        	=> false,
		'menu_icon'				=> 'dashicons-format-gallery',
		'supports'            	=> apply_filters('wp_igsp_post_supports', array('title')),
	);

	// Register slick slider post type
	register_post_type( WP_AMC_POST_TYPE, apply_filters( 'wp_amc_registered_post_type_args', $wp_amc_slider_args ) );
}

// Action to register plugin post type
add_action('init', 'wp_amc_register_post_type');

/**
 * Function to update post message for team showcase
 * 
 * @package App Mockups Carousel
 * @since 1.0.0
 */
function wp_amc_post_updated_messages( $messages ) {
	
	global $post, $post_ID;
	
	$messages[WP_AMC_POST_TYPE] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __( 'Image Gallery updated.', 'app-mockups-carousel' ) ),
		2 => __( 'Custom field updated.', 'app-mockups-carousel' ),
		3 => __( 'Custom field deleted.', 'app-mockups-carousel' ),
		4 => __( 'Image Gallery updated.', 'app-mockups-carousel' ),
		5 => isset( $_GET['revision'] ) ? sprintf( __( 'Image Gallery restored to revision from %s', 'app-mockups-carousel' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __( 'Image Gallery published.', 'app-mockups-carousel' ) ),
		7 => __( 'Image Gallery saved.', 'app-mockups-carousel' ),
		8 => sprintf( __( 'Image Gallery submitted.', 'app-mockups-carousel' ) ),
		9 => sprintf( __( 'Image Gallery scheduled for: <strong>%1$s</strong>.', 'app-mockups-carousel' ),
		  date_i18n( __( 'M j, Y @ G:i', 'app-mockups-carousel' ), strtotime( $post->post_date ) ) ),
		10 => sprintf( __( 'Image Gallery draft updated.', 'app-mockups-carousel' ) ),
	);
	
	return $messages;
}

// Filter to update slider post message
add_filter( 'post_updated_messages', 'wp_amc_post_updated_messages' );