<?php

/**
 * This file registers the Slides custom post type
 *
 * @package    	Terra_Themes_Tools
 * @link        http://terra-themes.com
 * Author:      Terra Themes
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


// Register the Slides custom post type
function terra_themes_tools_register_slides() {

	$slug = apply_filters( 'terra_themes_slides_rewrite_slug', 'slides' );	

	$labels = array(
		'name'                  => _x( 'Slides', 'Post Type General Name', 'terra_themes_tools' ),
		'singular_name'         => _x( 'Slide', 'Post Type Singular Name', 'terra_themes_tools' ),
		'menu_name'             => __( 'Terra Slider', 'terra_themes_tools' ),
		'name_admin_bar'        => __( 'Slide', 'terra_themes_tools' ),
		'archives'              => __( 'Slides Archives', 'terra_themes_tools' ),
		'parent_item_colon'     => __( 'Parent Slide:', 'terra_themes_tools' ),
		'all_items'             => __( 'All Slides', 'terra_themes_tools' ),
		'add_new_item'          => __( 'Add New Slide', 'terra_themes_tools' ),
		'add_new'               => __( 'Add New Slide', 'terra_themes_tools' ),
		'new_item'              => __( 'New Slide', 'terra_themes_tools' ),
		'edit_item'             => __( 'Edit Slide', 'terra_themes_tools' ),
		'update_item'           => __( 'Update Slide', 'terra_themes_tools' ),
		'view_item'             => __( 'View Slide', 'terra_themes_tools' ),
		'search_items'          => __( 'Search Slides', 'terra_themes_tools' ),
		'not_found'             => __( 'Not found', 'terra_themes_tools' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'terra_themes_tools' ),
		'featured_image'        => __( 'Featured Image', 'terra_themes_tools' ),
		'set_featured_image'    => __( 'Set featured image', 'terra_themes_tools' ),
		'remove_featured_image' => __( 'Remove featured image', 'terra_themes_tools' ),
		'use_featured_image'    => __( 'Use as featured image', 'terra_themes_tools' ),
		'insert_into_item'      => __( 'Insert into slide', 'terra_themes_tools' ),
		'uploaded_to_this_item' => __( 'Uploaded to this slide', 'terra_themes_tools' ),
		'items_list'            => __( 'Slides list', 'terra_themes_tools' ),
		'items_list_navigation' => __( 'Slides list navigation', 'terra_themes_tools' ),
		'filter_items_list'     => __( 'Filter Slides list', 'terra_themes_tools' ),
	);
	$args = array(
		'label'                 => __( 'Slides', 'terra_themes_tools' ),
		'description'           => __( 'A post type for your slides', 'terra_themes_tools' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'taxonomies'            => array( 'slides-category' ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 28,
		'menu_icon'             => TT_URI . 'inc/img/terra-themes-favicon.png',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'capability_type'       => 'page',
		'rewrite' 				=> array( 'slug' => $slug ),		
	);
	register_post_type( 'slides', $args );

}
add_action( 'init', 'terra_themes_tools_register_slides', 0 );

// Register Custom Taxonomy
function terra_themes_tools_slides_taxanomy() {

	$labels = array(
		'name'                       => _x( 'Slider', 'Taxonomy General Name', 'terra_themes_tools' ),
		'singular_name'              => _x( 'Slider', 'Taxonomy Singular Name', 'terra_themes_tools' ),
		'menu_name'                  => __( 'Slider', 'terra_themes_tools' ),
		'all_items'                  => __( 'All Slider', 'terra_themes_tools' ),
		'parent_item'                => __( 'Parent Slider', 'terra_themes_tools' ),
		'parent_item_colon'          => __( 'Parent Slider:', 'terra_themes_tools' ),
		'new_item_name'              => __( 'New Slider', 'terra_themes_tools' ),
		'add_new_item'               => __( 'Add New Slider', 'terra_themes_tools' ),
		'edit_item'                  => __( 'Edit Slider', 'terra_themes_tools' ),
		'update_item'                => __( 'Update Slider', 'terra_themes_tools' ),
		'view_item'                  => __( 'View Slider', 'terra_themes_tools' ),
		'separate_items_with_commas' => __( 'Separate slider with commas', 'terra_themes_tools' ),
		'add_or_remove_items'        => __( 'Add or remove slider', 'terra_themes_tools' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'terra_themes_tools' ),
		'popular_items'              => __( 'Popular Slider', 'terra_themes_tools' ),
		'search_items'               => __( 'Search Slider', 'terra_themes_tools' ),
		'not_found'                  => __( 'Not found', 'terra_themes_tools' ),
		'no_terms'                   => __( 'No Slider', 'terra_themes_tools' ),
		'items_list'                 => __( 'Slider list', 'terra_themes_tools' ),
		'items_list_navigation'      => __( 'Slider list navigation', 'terra_themes_tools' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'slides-category', array( 'slides' ), $args );
}
add_action( 'init', 'terra_themes_tools_slides_taxanomy', 0 );