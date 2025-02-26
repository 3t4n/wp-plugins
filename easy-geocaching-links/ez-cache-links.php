<?php
/*
Plugin Name: Easy Geocaching Links
Version: 1.2
Plugin URI: http://blog.tatonka.info/geocaching/cache-links-plugin-fur-wordpress/
Description: Creates links automatically from Cache-ID or Trackable-id anywhere within your blog posts and comments. Based on Easy Twitter Links by Josh Jones.
Author: Simon Szustkowski
Author URI: http://www.tatonka.info
*/

function cache_links($auto_tags) {
	$cache_id	= '/([^a-zA-Z0-9])GC(?!STATS|C)([A-Z0-9]+)/';
	$cache_links		= ' \1<a href="http://www.coord.info/GC\2" target="_blank">GC\2</a>';
return preg_replace($cache_id,$cache_links,$auto_tags);
}

function trackable_links($auto_tags) {
	$trackable_id	= '/([^a-zA-Z0-9])TB([A-Z0-9]+)/';
	$trackable_links		= ' <a href="http://www.coord.info/TB\2" target="_blank">TB\2</a>';
return preg_replace($trackable_id,$trackable_links,$auto_tags);
}


// if(is_single()) {
add_filter('the_content','trackable_links');
add_filter('the_content','cache_links');
add_filter('comment_text','trackable_links');
add_filter('comment_text','cache_links');
//	}

?>