<?php

/*
Plugin Name: Date Published Shortcode
Description: Put the shortcode “[post_published]” in the article to automatically show the date of publication.
Version: 0.1.0
Author: Jonah Hoj
License: GPLv2 or later
*/

function shortcode_post_published_date(){
 return get_the_date();
}
add_shortcode( 'post_published', 'shortcode_post_published_date' );