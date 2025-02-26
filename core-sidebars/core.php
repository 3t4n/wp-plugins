<?php
/*
Plugin Name: Core Sidebars
Plugin URI: http://www.nexterous.com/scripts/coresidebars.php
Description: A plugin that enables you to have dedicated content and/or widget sidebar for each specific page or post. For example, on a featured blog post you may want to place additional contact while on a calendar page you might want to place a calender widget or some text events or both.
Version: 1.0.0
Author: Daniel
Author URI: http://www.nexterous.com
*/

/*  Copyright 2008  Daniel  (contact: use form at www.nexterous.com)
Check out a full copy of the license at http://wordpress.org/about/gpl/

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Enabling widget support with the plugin
add_action('admin_init', 'sidebar_widgets');
add_action('get_header', 'sidebar_widgets');
function sidebar_widgets(){
	if ( function_exists('register_sidebar') ) {
	
	// First check to see if the option is set - If not, create it, if so, unserialize it
		$option = get_option('pswidgets');
		if(is_string($option)){
			$option = unserialize($option);
		} else {
			$value = array('default' => 'TRUE'); $value2 = serialize($value);
			add_option('pswidgets', $value2, '', 'yes');
			$option = $value;
			unset($value, $value2);
		}
	
	// Register the sidebars
		$final = array();
		GLOBAL $final;
		if(!empty($option)){
			foreach($option as $sidebar => $n){
				$array = array(
					'name'=>$sidebar,
					'before_widget' => '',
					'after_widget' => '',
					'before_title' => '<h2 class="widgettitle">',
					'after_title' => "</h2>"
				);
				register_sidebar($array);
				$final[$sidebar] = 'TRUE';
			}
			unset($option);
		}
	}
}

// Widget Slug - Gets a few properties about the widget
function postinfo($id){
		$data = array();
		$post = get_post($id, ARRAY_A);
		$data['id'] = $id;
		$data['content'] = $post['sidebar_content'];
		$data['title'] = $post['sidebar_title'];
		$data['slug'] = $post['post_name'] . "-$id";
		unset($post);
		$post = $data;
		unset($data);
	return $post;
}

// When the user deletes a post without removing the widget sidebar first
add_action('delete_post', 'remove_widgets');
function remove_widgets($pageid){
	$option = get_option('pswidgets');
	$option = unserialize($option);
	$post = postinfo($pageid);
	$slug = $post['slug'];
	$check = $option[$slug];
	if(isset($check)){
		unset($option[$slug]);
		$option = serialize($option);
		update_option('pswidgets', $option);
	}
}

// Adding a new column to the page editing screen (Javascript must be enabled)
require_once('managepages.php');

// Modifying the pages column
add_filter('manage_pages_columns', 'add_columns');
add_filter('manage_posts_columns', 'add_columns');
function add_columns($defaults) {
    $defaults['widgets'] = __('Widgets');
    return $defaults;
}

// Adding the link to the widget editing screen
add_action('manage_pages_custom_column', 'widgets_column', 10, 2);
add_action('manage_posts_custom_column', 'widgets_column', 10, 2);
function widgets_column($column_name, $pageid){
	if ( $column_name == 'widgets') {
		GLOBAL $final;
		$url = get_option('siteurl');
		$url = $url . '/wp-content/plugins/core-sidebars/widgets.php';
			
		// Check slug
		$post = postinfo($pageid);
		$slug = $post['slug'];
			
		if(isset($final[$slug])){
			echo "<a href='$url?id=$pageid&action=remove'>Remove Widgets</a>";
		} else {
			echo "<a href='$url?id=$pageid&action=add'>Add Widgets</a>";
		}
	}
}

// Check to see if the script is in action - If not, set edit the tables for the sidebars and add the option
$check = get_option('pagesidebar');
if($check == 'TRUE'){
	delete_option('pagesidebar');
	delete_option('pswidgets');
	sidebar_widgets();
} else {
	$check = get_option('coresidebars');
	if($check != 'TRUE'){
		GLOBAL $wpdb;
		$wpdb->query("ALTER TABLE $wpdb->posts ADD `sidebar_title` TEXT NOT NULL AFTER `post_content`");
		$wpdb->query("ALTER TABLE $wpdb->posts ADD `sidebar_content` LONGTEXT NOT NULL AFTER `sidebar_title`");
		add_option('coresidebars', 'TRUE', '', 'yes');
	}
}

// Set the script into action
add_action('edit_page_form', 'form');
add_action('edit_form_advanced', 'form');
add_action('save_post', 'edit_sidebar');

// Setting up the admin control panel section
function form(){
	$lock = TRUE;
	require('display.php');
}


// Time to edit the sidebars
function edit_sidebar($ID){
	GLOBAL $wpdb;
	$array = $_POST['sidebar'];
	$title = $wpdb->escape($array[0]);
	$content = $wpdb->escape($array[1]);
	$wpdb->query("UPDATE $wpdb->posts SET `sidebar_title` = '$title',`sidebar_content` = '$content' WHERE `ID` = '$ID'");
}

// Add the universal template tag function
function coresidebar($options){

	// Get post info
	GLOBAL $id;
	$post = postinfo($id);
	
	// Set all the variables derived from the options
	$settings = explode('-', $options['order']);
	$before_title = $options['before_title'];
	$after_title = $options['after_title'];
	$before_content = $options['before_content'];
	$after_content = $options['after_content'];
	
	// Load each part of the plugin package :)
	foreach($settings as $module){
		switch($module){
			case 'title':
				$title = stripslashes($post['title']);
				echo "$before_title $title $after_title";
			break;
			case 'content':
				$content = stripslashes($post['content']);
				echo "$before_content $content $after_content"; 
			break;
			case 'widgets':
				$slug = $post['slug'];
				dynamic_sidebar($slug);
			break;
		}
	}
}

// Or get a specific sidebar
function default_sidebar(){
	dynamic_sidebar('default');
}
?>