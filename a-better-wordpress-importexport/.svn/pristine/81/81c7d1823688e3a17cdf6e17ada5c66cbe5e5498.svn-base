<?php
/*
Plugin Name: A Better WordPress Import/Export
Description: Provides JSON import/export for speed and fewer CPU intensive processes
Version: 1.0-alpha
Author: Aaron Brazell
Author URI: http://technosailor.com
License: GPLv2
*/

class AB_Export {
	
	var $is_multisite;
	var $tables;
	
	function __construct() 
	{
		global $wpdb;
		if( defined( 'MULTISITE') && MULTISITE )
			$this->is_multisite = true;
			
		$this->tables = array( $wpdb->posts, $wpdb->postmeta, $wpdb->comments, $wpdb->commentmeta, $wpdb->links, $wpdb->options, $wpdb->term_relationships, $wpdb->term_taxonomy, $wpdb->terms, $wpdb->users, $wpdb->usermeta );
	}
	
	function __destruct() {}
	
	
}
