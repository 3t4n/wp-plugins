<?php

/**
* Initializing meta box
*
*@package AwesomeRecipePlugin
*/


function arpcpt_awesome_recipe_create_metaboxes(){
	add_meta_box( 
		'arpcpt_awesome_recipe_options', // ID 
		__('Recipe Information', 'arpcpt_awesome_recipe'),  // metabox header
		'arpcpt_awesome_recipe_options', // callback function
		'arpcpt_recipe', // post type
		'normal', // sets meta box below post editor, other available options: side (sidbar), advanced (above post editor)
		'high' // Priority
		 );
}




