<?php
/**
 * @package hide shipping if free
 */
/*
Plugin Name: Search Only Posts
Description: A simple plugin that forces Wordpress default search feature to search only posts and excludes pages from the search.
Version: 1.0.0
Author: face 2 face
Author URI: https://f2f.co.il/
License: GPLv2 or later
Text Domain: search-only-posts
*/


if (!is_admin()) {
function wpb_search_filter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}
add_filter('pre_get_posts','wpb_search_filter');
}