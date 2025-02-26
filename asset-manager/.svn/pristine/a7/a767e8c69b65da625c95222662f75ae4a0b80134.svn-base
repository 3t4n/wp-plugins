<?php
/*
Plugin Name: Asset Manager
Plugin URI: http://www.theriddlebrothers.com
Description: Provides an interface to manage assets such as images or files.
Author: Joshua Riddle
Version: 0.3
Author URI: http://www.theriddlebrothers.com
*/

if (!defined('PAAM_VERSION')) {
	
	// classes are loaded in paam-config.php
	require('paam-config.php');
	
	/**
	 * Bind plugin installation
	 */
	require('paam-install.php');
	
	/**
	 * Public functions
	 */
	require('paam-functions.php');
	
	// Admin section
	if (is_admin()) {
		include('admin/admin.php');	
	} else {
		// require necessary scripts for public-facing site
		wp_enqueue_script('jquery');	
		wp_enqueue_script('bigtarget', PAAM_PLUGINURL . '/js/jquery.bigtarget.js');
		wp_enqueue_script('paamassets', PAAM_PLUGINURL . '/js/assets-view.js');
	}
}