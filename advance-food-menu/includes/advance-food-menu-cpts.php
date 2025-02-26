<?php

/* Create the Menu Item Custom Post Type */
function advance_food_menu_post_type() 
{
	$labels = array(
		'name' => __( 'Advance Food Menu','advance-food-menu'),
		'singular_name' => __( 'Menu Item','advance-food-menu' ),
		'add_new' => __('Add New','advance-food-menu'),
		'add_new_item' => __('Add New Menu Item','advance-food-menu'),
		'edit_item' => __('Edit Menu Item','advance-food-menu'),
		'new_item' => __('New Menu Item','advance-food-menu'),
		'view_item' => __('View Menu Item','advance-food-menu'),
		'search_items' => __('Search Menu Items','advance-food-menu'),
		'not_found' =>  __('No Menu Item found','advance-food-menu'),
		'not_found_in_trash' => __('No Menu Item found in Trash','advance-food-menu'), 
		'parent_item_colon' => ''
	  );
	  
	  $args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'menu_icon' => plugins_url('../assets/images/food-icon.png', __FILE__),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array('title','editor','thumbnail'),
		'rewrite' => array( 'slug' => __('menu-item', 'advance-food-menu') )
	  ); 
	  
	  register_post_type('menu-item',$args);
}
add_action( 'init', 'advance_food_menu_post_type' );



/* Create Menu Item Type Taxonomy */
function advance_food_menu_item_type_taxonomy(){
    
	$labels = array(
        'name' => __( 'Menu Item Types', 'advance-food-menu' ),
        'singular_name' => __( 'Menu Item Type', 'advance-food-menu' ),
        'search_items' =>  __( 'Search Menu Item Types', 'advance-food-menu' ),
        'popular_items' => __( 'Popular Menu Item Types', 'advance-food-menu' ),
        'all_items' => __( 'All Menu Item Types', 'advance-food-menu' ),
        'parent_item' => __( 'Parent Menu Item Type', 'advance-food-menu' ),
        'parent_item_colon' => __( 'Parent Menu Item Type:', 'advance-food-menu' ),
        'edit_item' => __( 'Edit Menu Item Type', 'advance-food-menu' ), 
        'update_item' => __( 'Update Menu Item Type', 'advance-food-menu' ),
        'add_new_item' => __( 'Add New Menu Item Type', 'advance-food-menu' ),
        'new_item_name' => __( 'New Menu Item Type Name', 'advance-food-menu' ),
        'separate_items_with_commas' => __( 'Separate Menu Item Types with commas', 'advance-food-menu' ),
        'add_or_remove_items' => __( 'Add or Remove Menu Item Types', 'advance-food-menu' ),
        'choose_from_most_used' => __( 'Choose from the most used Menu Item Types', 'advance-food-menu' ),
        'menu_name' => __( 'Menu Item Types', 'advance-food-menu' )
    );
    
	register_taxonomy(
	    'menu-item-type', 
	    array( 'menu-item' ), 
	    array(
	        'hierarchical' => true, 
	        'labels' => $labels,
	        'show_ui' => true,
	        'query_var' => true,
	        'rewrite' => array('slug' => __('menu-item-type', 'advance-food-menu'))
	    )
	); 
}

add_action( 'init', 'advance_food_menu_item_type_taxonomy', 0 );
