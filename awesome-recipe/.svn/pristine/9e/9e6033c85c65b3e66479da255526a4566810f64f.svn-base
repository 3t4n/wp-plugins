<?php

/**
*@package AwesomeRecipePlugin
*/

/*
Plugin Name:  Awesome Recipe Plugin
Plugin URI:   http://awesomerecipe.owlsyard.com/
Description:  Publish your recipe like a professional.
Version:      1.1
Author:       Reasad Azim
Author URI:   http://owlsyard.com/about
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  arpcpt-awesome-recipe
Domain Path:  /languages
*/

/*
Awesome Recipe Plugin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Awesome Recipe Plugin is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Awesome Recipe Plugin. If not, see {URI to Plugin License}.
*/


// Secure plugin 

if ( !function_exists('add_action') ){
	die( 'Hi there! I am just a plugin. Not much I can do when called directly!' );
}



// Includes

include ( 'includes/activate.php' );
include ( 'includes/deactivate.php' );
include ( 'includes/init.php' );
include ( 'admin/init.php' );
include ( 'process/save-post.php' );
include ( 'process/filter-content.php' );; 
include ( 'process/rate-recipe.php' ); 
include ( 'process/shortcode.php' ); 
include ( 'process/settings.php' );


// Activation

register_activation_hook( __FILE__, 'arpcpt_awesome_recipe_activation' );



// Creating a custom post type for recipe

add_action( 'init', 'arpcpt_awesome_recipe_init' );



// Save post

add_action( 'save_post_arpcpt_recipe', 'arpcpt_awesome_recipe_save_post_admin', 10, 3 );




// Creating a custom Meta Box

add_action( 'init', 'arpcpt_awesome_recipe_admin_init' );




// Display custom meta box fields to custom post type frontend

add_filter( 'the_content', 'arpcpt_awesome_recipe_content_filter' );




// Enqueue script and style for frontend

add_action( 'wp_enqueue_scripts', 'arpcpt_awesome_recipe_frontend_enque_scripts', 100 );




// Ajax for Recipe ratings

add_action( 'wp_ajax_arpcpt_awesome_recipe_rating', 'arpcpt_awesome_recipe_rating' );
add_action( 'wp_ajax_nopriv_arpcpt_awesome_recipe_rating', 'arpcpt_awesome_recipe_rating' ); // {nopriv} So that not logged in users can also rate a recipe




// Change placeholder for post title {TinyMCE}

function arpcpt_change_default_title( $title ){
    $screen = get_current_screen();
    if ( 'arpcpt_recipe' == $screen->post_type ){
        $title = 'Name of the recipe';
    }
    return $title;
}
add_filter( 'enter_title_here', 'arpcpt_change_default_title' );



// Display post on taxonomy search search


function arpcpt_add_custom_types_in_cat_tag($query) {
  if ( !is_admin() && $query->is_main_query() ) {
    if ( ($query->is_category) || ($query->is_tag)  ){
      $query->set('post_type', array( 'any' ) );
    }
  }
}

add_action('pre_get_posts','arpcpt_add_custom_types_in_cat_tag');




// Add settings page

function arpcpt_awesome_recipe_settings(){

  add_submenu_page( 
    'edit.php?post_type=arpcpt_recipe', 
    'Settings', 
    'Recipe Settings', 
    'manage_options', 
    'arpcpt_recipe_settings', 
    'arpcpt_awesome_recipe_settings_panel' 
  );

}

add_action( 'admin_menu', 'arpcpt_awesome_recipe_settings' );



// Shortcodes

add_shortcode( 'arpcpt_recipe', 'arpcpt_awesome_recipe_creator_shortcode' );



// Plugin Action Link

add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'arpcpt_add_action_links' );

function arpcpt_add_action_links ( $links ) {
 $mylinks = array(
 '<a href="' . admin_url( 'edit.php?post_type=arpcpt_recipe&page=arpcpt_recipe_settings' ) . '">Settings</a>',
 );
return array_merge( $links, $mylinks );
}



// Deactivation

register_deactivation_hook( __FILE__, 'arpcpt_awesome_recipe_deactivation' );


