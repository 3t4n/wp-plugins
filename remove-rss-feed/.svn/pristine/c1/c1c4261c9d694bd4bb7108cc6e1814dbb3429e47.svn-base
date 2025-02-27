<?php
/*
Plugin Name: Remove RSS Feed
description: Remove RSS Feed is the best plugin to remove RSS feed from your website.
Version: 1.2.1
Author: Boopathi Rajan
Author URI: http://www.boopathirajan.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

function wp_remove_rss_feed() 
{
	wp_die( __('No feed available, Please visit our <a href="'. get_bloginfo('url') .'">homepage</a>!') );
}
 
add_action('do_feed', 'wp_remove_rss_feed', 1);
add_action('do_feed_rdf', 'wp_remove_rss_feed', 1);
add_action('do_feed_rss', 'wp_remove_rss_feed', 1);
add_action('do_feed_rss2', 'wp_remove_rss_feed', 1);
add_action('do_feed_atom', 'wp_remove_rss_feed', 1);
add_action('do_feed_rss2_comments', 'wp_remove_rss_feed', 1);
add_action('do_feed_atom_comments', 'wp_remove_rss_feed', 1);
?>