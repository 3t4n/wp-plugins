<?php

/**
* Enque styles
*
*@package AwesomeRecipePlugin
*/




//Enqueue style for admin panel area for recipe post type.


function arpcpt_add_admin_stylesheet() 
{
    wp_enqueue_style( 'arpcpt_awesome_recipe_CSS', plugins_url( '/assets/styles/admin-styles.css', dirname(__FILE__) ) );
}

add_action('admin_print_styles', 'arpcpt_add_admin_stylesheet');



function arpcpt_awesome_recipe_enqueue(){


	// Including Font Awesome
	wp_enqueue_style( 'arpcpt_awesome_recipe_FONTAWESOME', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );
	

	global $typenow; // This variable is set by WordPress. Value is set to be current post type that user is in.

	// Below code is for keep equeue styles only in the admin panel not front end or other post type, or settings or any admin menu item
	if( $typenow != "arpcpt_recipe" ){ // {recipe} {post_type}
		return;
	}

	wp_register_style( 
		'arpcpt_awesome_recipe_bootstrap',
		plugins_url( '/assets/styles/bootstrap.css', dirname(__FILE__) )
	);

	wp_enqueue_style( 'arpcpt_awesome_recipe_bootstrap' );


	// Script for dynamic fields
 	wp_enqueue_script( 'arpcpt_dynamic_field_CSS', plugins_url ('/assets/scripts/dynamic-fields.js', dirname(__FILE__)));

 	// Style for dynamic fields
 	 wp_enqueue_style( 'arpcpt_custom_wp_admin_css', plugins_url('/assets/styles/dynamic-fields.css', dirname(__FILE__)) );

}





// Enqueueing styles for frontend recipe single post

function arpcpt_add_frontend_stylesheet() {

	if( is_singular( 'arpcpt_recipe' ) ){
	    wp_enqueue_style( 'arpcpt_awesome_recipe_CSS', plugins_url( '/assets/styles/recipe-single-post.css', dirname(__FILE__) ) );
	    
	    // Including Font Awesome
	     wp_enqueue_style( 'arpcpt_awesome_recipe_FONTAWESOME', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );
	}

}


add_action('wp_print_styles', 'arpcpt_add_frontend_stylesheet');


// Enqueueing styles for frontend recipe shortcode page

function arpcpt_add_frontend_stylesheet_shortcode() {

    wp_enqueue_style( 'arpcpt_awesome_recipe_shortcode_CSS', plugins_url( '/assets/styles/recipe-shortcode.css', dirname(__FILE__) ) );

}

add_action('wp_print_styles', 'arpcpt_add_frontend_stylesheet_shortcode');



// Enqueueing styles for frontend rating
function arpcpt_awesome_recipe_frontend_enque_scripts(){

	wp_register_style( 

		'arpcpt_awesome_recipe_rateit',
		plugins_url( '/assets/rateit/rateit.css', dirname(__FILE__) )

	 );

	wp_enqueue_style( 'arpcpt_awesome_recipe_rateit' );


	wp_register_script(

		'arpcpt_awesome_recipe_rateit',
		plugins_url( '/assets/rateit/jquery.rateit.min.js', dirname(__FILE__) ),
		array( 'jquery' ),
		'1.1.0',
		true

	);


	wp_register_script(

		'arpcpt_awesome_recipe_main',
		plugins_url( '/assets/scripts/main.js', dirname(__FILE__) ), // we have to edit this
		array( 'jquery' ),
		'1.1.0',
		true

	);

	// for ratings
	// wp_localize_script() provides translated strings to javaScripts
	wp_localize_script( 'arpcpt_awesome_recipe_main', 'arpcpt_awesome_recipe_obj', array(
		'ajax_url'                  =>  admin_url( 'admin-ajax.php' ),
		'home_url'                  =>  home_url( '/' )
	));

	wp_enqueue_script( 'arpcpt_awesome_recipe_rateit' );
	wp_enqueue_style( 'arpcpt_awesome_recipe_rateit' );
	wp_enqueue_script( 'arpcpt_awesome_recipe_main' );

}

// Color picker
function arpcpt_awesome_recipe_Colorpicker(){
	wp_enqueue_style( 'wp-color-picker');
	//
	wp_enqueue_script( 'wp-color-picker');
}
add_action('admin_enqueue_scripts', 'arpcpt_awesome_recipe_Colorpicker');