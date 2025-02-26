<?php

function lifted_specials_post_type() 
{

	//Labels
	$labels = array(
		'name'                  => 'Specials',
		'singular_name'         => 'Special',
		'menu_name'             => 'Specials',
		'name_admin_bar'        => 'Special',
		'archives'              => 'Special Archives',
		'parent_item_colon'     => 'Parent Special:',
		'all_items'             => 'All Items',
		'add_new_item'          => 'Add New Special',
		'add_new'               => 'Add New',
		'new_item'              => 'New Special',
		'edit_item'             => 'Edit Special',
		'update_item'           => 'Update Special',
		'view_item'             => 'View Special',
		'search_items'          => 'Search Specials',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Special Image',
		'set_featured_image'    => 'Set Special image',
		'remove_featured_image' => 'Remove Special image',
		'use_featured_image'    => 'Use as Special image',
		'insert_into_item'      => 'Insert into Special',
		'uploaded_to_this_item' => 'Uploaded to this Special',
		'items_list'            => 'Items list',
		'items_list_navigation' => 'Items list navigation',
		'filter_items_list'     => 'Filter Specials',
	);
	//Arguments
	$args = array(
		'label'                 => 'Special',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 21,
		'menu_icon'             => 'dashicons-tickets-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'specials', $args );

}
add_action( 'init', 'lifted_specials_post_type', 0 );