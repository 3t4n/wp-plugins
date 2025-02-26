<?php
/*
Component Name: Widgets Function
Plugin: Core Sidebars
Purpose: Controls the addition and removal of widget sidebars (to register them later)
Author: Daniel
Author URI: http://www.nexterous.com
*/

// Set initial variables
	$url = $_SERVER['HTTP_REFERER'];
	require('../../../wp-config.php');
	$id = $_GET['id'];
	$action = $_GET['action'];
	$post = get_post($id, ARRAY_A);
	$slug = $post['post_name'] . "-$id";
	
// Get option and unserialize
	$option = get_option('pswidgets');
	$option = unserialize($option);

// Take appropriate action
	if($action == 'add'){
		$option[$slug] = 'TRUE';
	} elseif ($action == 'remove'){
		unset($option[$slug]);
	} else {
		header("Location:	$url");
		exit();
	}
	
// Serialize it again
	$option = serialize($option);
	
// Update the option
	update_option('pswidgets', $option);
	
// Redirect back
	header("Location:	$url");
	exit();
?>