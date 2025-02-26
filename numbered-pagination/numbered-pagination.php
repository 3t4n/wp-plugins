<?php
/*
Plugin Name: Numbered Pagination
Version: 1.3
Description: Adds custom pagination with numbers for posts, using shortcode.
Author: Den
Text Domain: numbered-pagination
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'NUM_PAG_URL', plugin_dir_url(__FILE__) );
include( 'inc/numbered-pagination-class.php' );


 
   
	add_action('plugins_loaded',function(){new NUM_PAG_main();});


	add_action('init', 'numbered_pagination_load_textdomain');

	function numbered_pagination_load_textdomain(){
		
		  load_plugin_textdomain( 'numbered-pagination', false, NUM_PAG_URL . 'languages' ); 

	}

