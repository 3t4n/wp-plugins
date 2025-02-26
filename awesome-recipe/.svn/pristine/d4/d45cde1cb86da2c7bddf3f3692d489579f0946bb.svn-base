<?php

/**
* Create meta boxes for custom input
*
*@package AwesomeRecipePlugin
*/


function arpcpt_awesome_recipe_admin_init(){

	include('create-metaboxes.php');
	include('recipe-options.php');
	include( 'enqueue.php' );

	add_action( 'add_meta_boxes_arpcpt_recipe', 'arpcpt_awesome_recipe_create_metaboxes' );
	// add_meta_boxes_{recipe} {post type}
	add_action( 'admin_enqueue_scripts', 'arpcpt_awesome_recipe_enqueue' );
}