<?php

/*
Plugin Name: Relink
Description: Insert link to other posts by shortcode with custom templates.
Version: 1.2
Author: e.nechehin
Author URI: https://github.com/nechehin
*/
/*  Copyright 2018  e.nechehin  (email: nechehin@gmail.com)

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


if ( ! defined( 'WPINC' ) ) {
	die;
}


define('RELINK_VERSION', '1.2');


/**
 * Add relink tinymce plugin
 */
add_filter( 'mce_external_plugins', function($plugin){
	if (defined('WP_DEBUG') && WP_DEBUG) {
		$plugin['relink'] = plugins_url( 'assets/js/relink-tinymce.js?v=' . RELINK_VERSION, __FILE__ );
	} else {
		$plugin['relink'] = plugins_url( 'assets/js/relink-tinymce.min.js?v=' . RELINK_VERSION, __FILE__ );
	}
	return $plugin;
});


/**
 * Add relink tinymce button
 */
add_filter( 'mce_buttons', function($buttons){
	$buttons[] = 'relink_button';
	return $buttons;
});


/**
 * Add relink shortcode
 */
add_shortcode( 'relink' , function($atts){

	// id is required
	if (empty($atts['id'])) {
		return;
	}

	// id must be integer
	$postId = (int)$atts['id'];

	// find post
	if (! $post = get_post($postId)) {
		return false;
	}

	// get template path
	$templatePath = apply_filters( 'relink_template', plugin_dir_path(__FILE__) . 'templates/readmore.php', $postId, $post );

	// render template
	ob_start();
	include($templatePath);
	return ob_get_clean();
});


/**
 * Find post id by post link
 */
add_action( 'wp_ajax_relink_url_to_id', function(){

	$link = filter_var($_GET['link'], FILTER_SANITIZE_URL);
	$postID = url_to_postid($link);

	wp_die(json_encode([
		'ID' => $postID
	]));
});