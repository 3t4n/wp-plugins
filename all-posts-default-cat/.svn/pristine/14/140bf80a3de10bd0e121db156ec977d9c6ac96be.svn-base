<?php
/**
 * @package all-posts-default-cat
 * @version 1.1
 */
/*
Plugin Name: All Posts Default Category
Description: This plugin ensures that all posts will always be in the default category. Whenever any post is saved, all posts not currently in the default category are put in the default category. For example, by renaming the default category 'All' you always have a category containing all posts.
Author: Jake Stookey
Version: 1.1
*/

add_action('save_post', 'add_all_posts_to_default_category');

function add_all_posts_to_default_category() {
  // Determine default category id
  $default_category = get_option('default_category');

  // Get all posts not currently in the default category
  $args = array('category' => -$default_category);
  $posts = get_posts($args);
  
  // For each post
  foreach($posts as $post) : setup_postdata($post);
    // Append the default category to the post's categories 
    wp_set_post_categories($post->ID, $default_category, 1);
  endforeach;
}

?>
