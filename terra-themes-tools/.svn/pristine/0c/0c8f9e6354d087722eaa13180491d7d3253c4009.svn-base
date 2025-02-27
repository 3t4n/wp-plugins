<?php

/**
 * This file registers the Clients custom post type
 *
 * @package    	Terra_Themes_Tools
 * @link        http://terra-themes.com
 * Author:      Terra Themes
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


// Register the Projects custom post type
function terra_themes_tools_register_clients() {

	$slug = apply_filters( 'terra_themes_clients_rewrite_slug', 'clients' );	

	$labels = array(
		'name'                  => _x( 'Clients', 'Post Type General Name', 'terra_themes_tools' ),
		'singular_name'         => _x( 'Client', 'Post Type Singular Name', 'terra_themes_tools' ),
		'menu_name'             => __( 'Clients', 'terra_themes_tools' ),
		'name_admin_bar'        => __( 'Client', 'terra_themes_tools' ),
		'archives'              => __( 'Item Archives', 'terra_themes_tools' ),
		'parent_item_colon'     => __( 'Parent Item:', 'terra_themes_tools' ),
		'all_items'             => __( 'All Clients', 'terra_themes_tools' ),
		'add_new_item'          => __( 'Add New Client', 'terra_themes_tools' ),
		'add_new'               => __( 'Add New Client', 'terra_themes_tools' ),
		'new_item'              => __( 'New Client', 'terra_themes_tools' ),
		'edit_item'             => __( 'Edit Client', 'terra_themes_tools' ),
		'update_item'           => __( 'Update Client', 'terra_themes_tools' ),
		'view_item'             => __( 'View Client', 'terra_themes_tools' ),
		'search_items'          => __( 'Search Client', 'terra_themes_tools' ),
		'not_found'             => __( 'Not found', 'terra_themes_tools' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'terra_themes_tools' ),
		'featured_image'        => __( 'Featured Image', 'terra_themes_tools' ),
		'set_featured_image'    => __( 'Set featured image', 'terra_themes_tools' ),
		'remove_featured_image' => __( 'Remove featured image', 'terra_themes_tools' ),
		'use_featured_image'    => __( 'Use as featured image', 'terra_themes_tools' ),
		'insert_into_item'      => __( 'Insert into client', 'terra_themes_tools' ),
		'uploaded_to_this_item' => __( 'Uploaded to this client', 'terra_themes_tools' ),
		'items_list'            => __( 'Clients list', 'terra_themes_tools' ),
		'items_list_navigation' => __( 'Clients list navigation', 'terra_themes_tools' ),
		'filter_items_list'     => __( 'Filter clients list', 'terra_themes_tools' ),
	);
	$args = array(
		'label'                 => __( 'Client', 'terra_themes_tools' ),
		'description'           => __( 'A post type for your clients', 'terra_themes_tools' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'taxonomies'            => array( 'client-category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 28,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite' 				=> array( 'slug' => $slug ),		
	);
	register_post_type( 'clients', $args );

}
add_action( 'init', 'terra_themes_tools_register_clients', 0 );

// Register Custom Taxonomy
function terra_themes_tools_client_taxanomy() {

	$labels = array(
		'name'                       => _x( 'Client Categories', 'Taxonomy General Name', 'terra_themes_tools' ),
		'singular_name'              => _x( 'Client Category', 'Taxonomy Singular Name', 'terra_themes_tools' ),
		'menu_name'                  => __( 'Client Categories', 'terra_themes_tools' ),
		'all_items'                  => __( 'All categories', 'terra_themes_tools' ),
		'parent_item'                => __( 'Parent Category', 'terra_themes_tools' ),
		'parent_item_colon'          => __( 'Parent Category:', 'terra_themes_tools' ),
		'new_item_name'              => __( 'New Category', 'terra_themes_tools' ),
		'add_new_item'               => __( 'Add New Category', 'terra_themes_tools' ),
		'edit_item'                  => __( 'Edit Category', 'terra_themes_tools' ),
		'update_item'                => __( 'Update Category', 'terra_themes_tools' ),
		'view_item'                  => __( 'View Category', 'terra_themes_tools' ),
		'separate_items_with_commas' => __( 'Separate categories with commas', 'terra_themes_tools' ),
		'add_or_remove_items'        => __( 'Add or remove categories', 'terra_themes_tools' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'terra_themes_tools' ),
		'popular_items'              => __( 'Popular Categories', 'terra_themes_tools' ),
		'search_items'               => __( 'Search Categories', 'terra_themes_tools' ),
		'not_found'                  => __( 'Not found', 'terra_themes_tools' ),
		'no_terms'                   => __( 'No Categories', 'terra_themes_tools' ),
		'items_list'                 => __( 'Categories list', 'terra_themes_tools' ),
		'items_list_navigation'      => __( 'Categories list navigation', 'terra_themes_tools' ),
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
	register_taxonomy( 'client-category', array( 'clients' ), $args );
}
add_action( 'init', 'terra_themes_tools_client_taxanomy', 0 );