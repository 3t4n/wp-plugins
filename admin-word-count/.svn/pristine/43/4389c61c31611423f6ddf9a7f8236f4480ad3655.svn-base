<?php

/* 
Plugin Name: Admin Word Count
Plugin URI: http://www.bestcreditcards.com.au/development
Description: Displays the word count for each post in the post list within the Admin section
Author: M. Restuccia
Version: 1.2
Author URI: http://www.bestcreditcards.com.au/
*/

add_filter('manage_posts_columns', 'count_columns');
function count_columns($defaults) {
    $defaults['count'] = __('Word Count');
    return $defaults;
}

add_action('manage_posts_custom_column', 'count_custom_column', 10, 2);
function count_custom_column($column, $post_id)
{
	global $post;
	if($column == 'count') {
	   echo str_word_count(strip_tags($post->post_content), 0);
	}
}

?>
