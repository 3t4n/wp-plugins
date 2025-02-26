<?php
/*
Plugin Name: AmazonFeed
Plugin URI: http://www.warkensoft.com/products/amazonfeed-wordpress-plugin/
Description: Make money from your blog by advertising Amazon.com products specifically related to the topic of your posts.
Version: 2.1
Author: WarkenSoft Productions
Author URI: http://warkensoft.com/
Requires: WordPress Version 2.3 and PHP 5.x
*/

	// Include the class once if it doesn't exist.
	include_once("php/amazonfeed.class.php");

	// Create an instance of the class once, if it doesn't exist.
	if(class_exists("AmazonFeed") AND !isset($amazonFeedObj))
	{
		// Instantiate new instance of the class.
		$amazonFeedObj = new AmazonFeed();
		
		/*
		 * Debugging Controls:
		 * Only change these if the plugin is not working properly for you and you want
		 * to try and find out why.
		 * 
		 * debug_mode: choose what level of debugging to use
		 *   options are:
		 *   off 	- nothing is sent to the log
		 *   basic	- basic messages are logged
		 *   all		- all possible debug messages are logged.
		 * 
		 * debug_visible: set this to true if you wish debugging messages to be
		 * visible on the live website as they occur.
		 *   options are:
		 *   true
		 *   false
		 *  
		 */
		$amazonFeedObj->debug_mode = 'off';
		$amazonFeedObj->debug_visible = false;
		
		/**
		 * You shouldn't need to edit anything beyond this point.
		 */
		 
		// Define variables for AmazonFeed
		$amazonFeedObj->basePath = dirname(__FILE__);
		$amazonFeedObj->baseFileName = basename(__FILE__);
		$amazonFeedObj->urlPath = get_option('siteurl') . str_replace(ABSPATH, "/", $amazonFeedObj->basePath);

		// Add hooks as necessary to connect to WordPress
		add_action('admin_menu', array(&$amazonFeedObj, 'wp_admin_init'));
		add_action('admin_menu', array(&$amazonFeedObj, 'add_custom_box'));
		add_action('admin_notices', array(&$amazonFeedObj, 'wp_admin_notices'));

		add_action('save_post',  array(&$amazonFeedObj, 'save_postdata'));
		add_action('edit_post',  array(&$amazonFeedObj, 'save_postdata'));
		add_action('publish_post',  array(&$amazonFeedObj, 'save_postdata'));

		add_action('wp_head', array(&$amazonFeedObj, 'wp_head'));
		add_action('admin_head', array(&$amazonFeedObj, 'admin_head'));

		add_action('widgets_init', array(&$amazonFeedObj, 'widget_init'));
		
		register_deactivation_hook( __FILE__, array(&$amazonFeedObj, 'unInstall') );
		

		// Only add actions to the posts and live blog if the object is live (meaning ready to go)
		if($amazonFeedObj->live)
		{
			add_action('the_content', array(&$amazonFeedObj, 'wp_content'));
		}
	}
