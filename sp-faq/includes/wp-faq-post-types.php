<?php
/**
 * Register Post type functionality
 *
 * @package WP FAQ
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Function to register post type
 * 
 * @since 1.0.0
 */
function wp_faq_register_post_type() {

	$labels = apply_filters( 'sp_faq_labels', array(
				'name'					=> __( 'FAQs', 'sp-faq' ),
				'singular_name'			=> __( 'FAQ', 'sp-faq' ),
				'add_new'				=> __( 'Add FAQ', 'sp-faq' ),
				'add_new_item'			=> __( 'Add New FAQ', 'sp-faq' ),
				'edit_item'				=> __( 'Edit FAQ', 'sp-faq' ),
				'new_item'				=> __( 'New FAQ', 'sp-faq' ),
				'all_items'				=> __( 'All FAQ', 'sp-faq' ),
				'view_item'				=> __( 'View FAQ', 'sp-faq' ),
				'search_items'			=> __( 'Search FAQ', 'sp-faq' ),
				'not_found'				=> __( 'No FAQ found', 'sp-faq' ),
				'not_found_in_trash'	=> __( 'No FAQ found in Trash', 'sp-faq' ),
				'menu_name'				=> __( 'FAQ', 'sp-faq' ),
				'parent_item_colon'		=> '',
	));

	$args = array(
				'labels' 				=> $labels,
				'public' 				=> true,
				'publicly_queryable'	=> true,
				'show_ui'				=> true,
				'show_in_menu'			=> true,
				'query_var'				=> true,
				'has_archive' 			=> true,
				'hierarchical'			=> false,
				'capability_type'		=> 'post',
				'menu_icon' 			=> 'dashicons-info',
				'supports' 				=> apply_filters( 'wp_faq_post_supports', array('title', 'editor', 'thumbnail', 'excerpt', 'revisions') )
	);

	// Register faq post type
	register_post_type( WP_FAQ_POST_TYPE, apply_filters( 'sp_faq_post_type_args', $args ) );
}

// Action to register plugin post type
add_action('init', 'wp_faq_register_post_type' );

/**
 * Function to register taxonomy
 * 
 * @since 1.0.0
 */
function wp_faq_register_taxonomies() {

	$labels = apply_filters('wp_faq_cat_labels', array(
		'name'				=> __( 'Category', 'sp-faq' ),
		'singular_name'		=> __( 'Category', 'sp-faq' ),
		'search_items'		=> __( 'Search Category', 'sp-faq' ),
		'all_items'			=> __( 'All Category', 'sp-faq'  ),
		'parent_item'		=> __( 'Parent Category', 'sp-faq' ),
		'parent_item_colon' => __( 'Parent Category', 'sp-faq' ),
		'edit_item'			=> __( 'Edit Category', 'sp-faq' ),
		'update_item'		=> __( 'Update Category', 'sp-faq' ),
		'add_new_item'		=> __( 'Add New Category', 'sp-faq' ),
		'new_item_name'		=> __( 'New Category Name', 'sp-faq' ),
		'menu_name'			=> __( 'Category', 'sp-faq' ),
	));

	$args = array(
		'labels'			=> $labels,
		'hierarchical'		=> true,
		'public'			=> true,
		'show_ui'			=> true,
		'show_admin_column' => true,
		'query_var'			=> true,
		'rewrite'			=> array(
									'slug' 			=> apply_filters( 'wp_faq_cat_slug', 'faq_cat' ),
									'with_front' 	=> false,
								),
	);

	// Register faq category
	register_taxonomy( WP_FAQ_CAT, array( WP_FAQ_POST_TYPE ), apply_filters('wp_faq_registered_cat', $args) );
}

// Action to register plugin taxonomies
add_action( 'init', 'wp_faq_register_taxonomies' );

/**
 * Function to update post message
 * 
 * @since 1.0.0
 */
function wp_faq_post_updated_messages( $messages ) {

	global $post, $post_ID;

	$messages[WP_FAQ_POST_TYPE] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __( 'FAQ updated. <a href="%s">View FAQ</a>', 'sp-faq' ), esc_url( get_permalink( $post_ID ) ) ),
		2 => __( 'Custom field updated.', 'sp-faq' ),
		3 => __( 'Custom field deleted.', 'sp-faq' ),
		4 => __( 'FAQ updated.', 'sp-faq' ),
		5 => isset( $_GET['revision'] ) ? sprintf( __( 'FAQ restored to revision from %s', 'sp-faq' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __( 'FAQ published. <a href="%s">View FAQ</a>', 'sp-faq' ), esc_url( get_permalink( $post_ID ) ) ),
		7 => __( 'FAQ saved.', 'sp-faq' ),
		8 => sprintf( __( 'FAQ submitted. <a target="_blank" href="%s">Preview FAQ</a>', 'sp-faq' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
		9 => sprintf( __( 'FAQ scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview FAQ</a>', 'sp-faq' ),
		  date_i18n( 'M j, Y @ G:i', strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
		10 => sprintf( __( 'FAQ draft updated. <a target="_blank" href="%s">Preview FAQ</a>', 'sp-faq' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
	);

	return $messages;
}

// Filter to update faq post message
add_filter( 'post_updated_messages', 'wp_faq_post_updated_messages' );