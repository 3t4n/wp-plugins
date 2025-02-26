<?php

/**
* Registering custom post
*
*@package AwesomeRecipePlugin
*/



function arpcpt_awesome_recipe_init(){
	$labels = array(
		'name'               => __( 'Recipes', 'arpcpt_recipes', 'arpcpt_awesome_recipe' ),
		'singular_name'      => __( 'Recipe', 'arpcpt_recipe', 'arpcpt_awesome_recipe' ),
		'menu_name'          => __( 'Recipes', 'admin menu', 'arpcpt_awesome_recipe' ),
		'name_admin_bar'     => __( 'Recipe', 'add new on admin bar', 'arpcpt_awesome_recipe' ),
		'add_new'            => __( 'Add New', 'Recipe', 'arpcpt_awesome_recipe' ),
		'add_new_item'       => __( 'Add New Recipe', 'arpcpt_awesome_recipe' ),
		'new_item'           => __( 'New Recipe', 'arpcpt_awesome_recipe' ),
		'edit_item'          => __( 'Edit Recipe', 'arpcpt_awesome_recipe' ),
		'view_item'          => __( 'View Recipe', 'arpcpt_awesome_recipe' ),
		'all_items'          => __( 'All Recipes', 'arpcpt_awesome_recipe' ),
		'search_items'       => __( 'Search Recipes', 'arpcpt_awesome_recipe' ),
		'parent_item_colon'  => __( 'Parent Recipes:', 'arpcpt_awesome_recipe' ),
		'not_found'          => __( 'No Recipe found.', 'arpcpt_awesome_recipe' ),
		'not_found_in_trash' => __( 'No Recipe found in Trash.', 'arpcpt_awesome_recipe' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Publish your awesome recipe like a pro.', 'arpcpt_awesome_recipe' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'arpcpt_recipe' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 110, //seting dashboard menu position
		'taxonomies'		 => array( 'category', 'post_tag' ),
		'supports'           => array( 'title', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'arpcpt_recipe', $args );
	


	// clear the permalinks to remove our post type's rules from the database
   flush_rewrite_rules();
}

