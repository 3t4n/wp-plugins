<?php

/**
 * Plugin Name: Add Categories and Tags To Pages
 * Plugin URI: https://eastsidecode.com
 * Description: WordPress plugin for adding categories and tags to pages
 * Version: 1.0
 * Author: Louis Fico
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class esCodeAddCatTagsToPages {

	function __construct() {

	add_action( 'init', function() {
		register_taxonomy_for_object_type('post_tag', 'page');
    	register_taxonomy_for_object_type('category', 'page');  
	} );

	 if ( !is_admin() ) {

	 	 add_action('pre_get_posts', function($wp_query) {

	 	    if ($wp_query->get('tag') || $wp_query->get('category_name') || $wp_query->get( 'cat' )) {

		        $esCodePostTypesList = $wp_query->get('post_type');

		        // convert to an array if necessary
		        if ( is_string ( $esCodePostTypesList ) )  {

		        	// cast to an array
		           $esCodePostTypesList = (array)$esCodePostTypesList;
		           
		        }

		         // add page as an additional post type
		        $esCodePostTypesList[] = 'page';
		        $wp_query->set('post_type', $esCodePostTypesList );

		    }

	 	 });

	   

	 } // end if not admin 


	} // end construct

} // end class


$esCodeAddCatTagsToPages = new esCodeAddCatTagsToPages();