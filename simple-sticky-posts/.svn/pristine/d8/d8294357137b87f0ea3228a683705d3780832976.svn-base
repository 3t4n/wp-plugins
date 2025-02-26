<?php
/*
Plugin Name: Simple Sticky Posts
Plugin URI: http://bitworker.blogspot.com/2008/04/wordpress-plugin-my-sticky-posts.html
Description: Show sticky posts. To set up a sticky post add a custom field named 'sticky' set to value '1' while editing one of your blog entries.
Author: Csaba Lorincz
Version: 0.1
Author URI: http://bitworker.blogspot.com/
*/


if(!function_exists('add_sticky_posts')) {
  function add_sticky_posts($the_posts){
    if(!is_home() || get_query_var("paged") > 1) return $the_posts;
    $sticky_posts = get_posts('meta_key=sticky&meta_value=1&numberposts=3&offset=0');
    $the_posts = array_merge($sticky_posts, $the_posts);
    return $the_posts;
  }
}

add_filter('the_posts','add_sticky_posts');

?>