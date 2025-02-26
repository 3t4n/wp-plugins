<?php
/*
 * Author: Michael Finkenberger
 * @since V1.7.0
 * Last change in plugin version: V1.7.0
 * Date: 21.09.2022
 * Tested with the latest plugin version
*/

if(!defined('ABSPATH')) die(); // no direct access



// Shortcode (with separate closing tag): do not show listed democracy poll ids in an archive display
function foodle_archive_do_not_show($atts, $content) {

  if ( strlen($content) == 0 ) return ''; // no separate closing tag or empty content
  
  $do_not_show = ( isset($atts["do_not_show"]) ) ? $atts["do_not_show"] : '';

  $content = do_shortcode($content); // recursive do_shortode to parse the expected democracy archive shorcode inside $content

  if ( $do_not_show != '' ) { // no democracy poll ids selected: behave as if the shortcode wasn't present
    $do_not_show_array = explode(',', $do_not_show); // modify the id list into an array
    $content = $content."<script type='text/javascript'> var $ = jQuery;";
    foreach($do_not_show_array as $not_to_show_id) {
      $content = $content." $('#democracy-".$not_to_show_id."').parent().hide();";
    }
    $content = $content." </script>";
  }
  return $content;
}
function foodle_init_foodle_archive_do_not_show_shortcode(){
  add_shortcode('foodle-archive-do-not-show', 'foodle_archive_do_not_show');
}
add_action('wp_loaded','foodle_init_foodle_archive_do_not_show_shortcode');


