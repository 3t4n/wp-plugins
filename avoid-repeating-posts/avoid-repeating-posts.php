<?php
/**
 * Plugin Name: Avoid Repeating Posts
 * Description: Avoid showing same WordPress post in multiple loops. Fresh content in every loop.
 * Version: 1.1.0
 * Author: ChrisBAshton
 * Author URI: https://twitter.com/ChrisBAshton
 */

 add_filter('post_link', 'arposts__track_displayed_posts');
 add_action('pre_get_posts','arposts__remove_already_displayed_posts');

 $displayed_posts = [];

 function arposts__track_displayed_posts($url) {
     global $displayed_posts;
     $displayed_posts[] = get_the_ID();
     return $url; // don't mess with the url
 }

 function arposts__remove_already_displayed_posts($query) {
    global $displayed_posts;
    $query->set('post__not_in', $displayed_posts);
 }
