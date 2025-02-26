<?php
/*
Plugin Name: ALT for images
Plugin URI: http://www.sooource.net/alt-for-images
Description: Plugin automatically fills the ALT attribute in HTML IMG tag on every insert a new image into the post, if it is not full.
Version: 1.0
Author: TrueFalse
Author URI: http://www.sooource.net
License: GPLv2 or later
*/

add_filter('image_send_to_editor', 'afi_insert_alt_to_image', 10, 9);

function afi_insert_alt_to_image($html, $id, $caption, $title, $align, $url) {
  //if (stripos($html, '<img') !== false)
  $html = str_replace('alt=""', 'alt="'. $title. '"', $html);
  return $html;
}
?>