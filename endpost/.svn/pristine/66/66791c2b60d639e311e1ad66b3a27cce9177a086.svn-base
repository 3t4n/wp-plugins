<?php
/*
Plugin Name: EndPost
Plugin URI: http://henasraf.com/projects/endpost
Description: EndPost lets you add any custom HTML to the end of every post. You may use custom tags to be replaced with post-relevant contents to be used with custom share buttons/codes, etc.
Version: 0.3
Author: Hen Asraf
Author URI: http://henasraf.com
License: GPL2
*/
/*  Copyright 2010  Hen Asraf  (email : email@henasraf.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
define('ENDPOST_PATH', '../wp-content/plugins/endpost');
add_action('admin_menu', 'endpost_add_settings_page_item'); // Add the settings page item to the admin menu
add_filter('the_content', 'endpost_add_html'); // Do the magic!
add_action('the_post', 'endpost_post_tags');

// Setting
add_action('admin_init', 'endpost_options_init');

// Function: Do the magic!
function endpost_add_html($content) {
	$options = endpost_unsanitize(get_option('endpost_options'));
	$options['html'] = endpost_replace_tags($options['html']);
	if (
		($options['on-the-loop'] && in_the_loop() && !is_singular()) ||
		($options['on-single-posts'] && is_single() && !is_page()) ||
		($options['on-pages'] && is_page()) ||
		!$options['custom-settings']
	)
		return $content . $options['html'];
	else
		return $content;
}
function endpost_post_tags($post) {
	global $endpost_post;
	$post->url = get_permalink();
	$endpost_post = $post;
	// var_export($post);
}

// Function: Add settings page item to the admin menu
function endpost_add_settings_page_item() {
	add_submenu_page('options-general.php', 'EndPost Options', 'EndPost', 'manage_options', 'endpost-options', 'endpost_show_options');
}

function endpost_show_options() {
	include(ENDPOST_PATH.'/options.php');
}

function endpost_options_init() {
	register_setting('endpost', 'endpost_options', 'endpost_sanitize');
}
function endpost_sanitize($input) {
	$input['html'] = htmlentities($input['html']);
	return $input;
}
function endpost_unsanitize($input) {
	$input['html'] = html_entity_decode($input['html']);
	return $input;
}
function endpost_replace_tags($input) {
	global $endpost_post;
	$post = $endpost_post;
	$time_format = get_option('time_format');
	$date_format = get_option('date_format');
	$tags = array (
		'[[post_date]]' => date($date_format, strtotime($post->post_date)),
		'[[post_date_gmt]]' => date($date_format, strtotime($post->post_date_gmt)),
		'[[post_time]]' => date($time_format, strtotime($post->post_date)),
		'[[post_time_gmt]]' => date($time_format, strtotime($post->post_date_gmt)),
		'[[post_modified]]' => date($time_format, strtotime($post->post_date)),
		'[[post_modified_gmt]]' => date($time_format, strtotime($post->post_date_gmt)),
		'[[url]]' => urlencode($post->url),
		'[[guid]]' => urlencode($post->guid)
	);
	foreach ($tags as $key=>$val) {
		$finds[] = $key;
		$replaces[] = $val;
	}
	$output = $input;
	$post = get_object_vars($post);
	
	$output = preg_replace('/\%([\w]+)\%/e', '$post[\'\\1\']', $output);
	$output = preg_replace('/\#\#(.+)\#\#/e', 'eval(html_entity_decode(stripslashes(\'\\1\')))', $output);
	$output = str_ireplace($finds, $replaces, $output);
	
	return $output;
}
?>