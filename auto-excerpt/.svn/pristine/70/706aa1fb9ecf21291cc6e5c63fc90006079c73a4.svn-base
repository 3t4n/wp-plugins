<?php
/*
Plugin Name: Auto Excerpt
Plugin URI: http://mr.hokyaa.com/auto-excerpt
Description: Automatically show excerpt view on each posts on your homepage and archive pages. It need no HTML editting, so do not worry and just activate it to see the_excerpt view on your homepage.
Version: 3.12
Author: Julian Widya Perdana
Author URI: http://mr.hokyaa.com/
*/

if (!get_option("excerpt_length")) update_option("excerpt_length",418);

function auto_excerpt($content) {
	$length = get_option("excerpt_length");
	$content = substr(strip_tags($content),0,$length);
	$more = get_option("readmore");
	if ($more<>"") {
		$link = get_permalink();
		$content .= " <a href='$link'>$more</a>";
	}
	return $content;
}

function auto_excerpt_notice() {
	echo "<p>You are currently using <strong><a href='http://mr.hokya.com/auto-excerpt/' target='_blank'>Auto Excerpt</a></strong> to show only excerpt of the posts</p>";
}

function auto_excerpt_init() {
	if(!is_single() && !is_page()) add_filter('the_content','auto_excerpt',100);
	echo "\n<!-- Excerpts generated using Auto Excerpt plugin, http://mr.hokya.com/auto-excerpt/ -->\n";
}

function auto_excerpt_options() {
	add_options_page('Auto Excerpt', 'Auto Excerpt', 'manage_options','auto-excerpt/options.php');
}

add_action('the_post', 'auto_excerpt_init');
add_action('rightnow_end','auto_excerpt_notice');
add_action('admin_menu','auto_excerpt_options');

?>