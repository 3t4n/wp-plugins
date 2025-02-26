<?php
/*
 * This file is included as part of the WordPress Diverse Group Tag Cloud plugin
 * The plugin is Copyright (C) 2008-2009 Corey Wallis <techxplorer@gmail.com>
 * The plugin is covered by the GPL. 
 */
 
// first, check to ensure page is being called by JQuery using AJAX
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') {
	// not being called by JQuery
	print 'Page must be called by JQuery';
	die;
}

// check passed, we're being called by JQuery

// check to ensure we have a value to lookup
if(isset($_GET['tag']) && $_GET['tag'] != '') {
	$tag = $_GET['tag'];
} else {
	print 'Missing tag parameter';
	die;
}

// load WordPress
$root = dirname(dirname(dirname(dirname(__FILE__))));

if (file_exists($root.'/wp-load.php')) {
	// WP 2.6
	$config_path = $root.'/wp-load.php';
} else {
	// Before 2.6
	$config_path = $root.'/wp-config.php';
}

// include the starting WordPress file
require_once($config_path);

// declare global variables
global $dgtc; // instance of of parent class

// make sure the $dgtc variable is valid
if(!isset($dgtc)) {
	$dgtc = new diverse_group_tag_cloud();
}

// call a function of the parent class to do the work
print $dgtc->lookup_tag($tag);

?>
