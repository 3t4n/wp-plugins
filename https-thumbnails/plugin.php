<?php
/*
Plugin Name: HTTPS Thumbnails
Plugin URI: https://martykokes.com/httpsthumnails
Description: A simple plugin that sets the protocol of a thumbnails source to match the protocol that is currently being used to display a page.
Version: 1.0.0
Author: Marty Kokes
Author URI: https://martykokes.com/
License: GPLv3
Text Domain: https-thumbnails
*/

function ssl_post_thumbnail_urls($url, $post_id) {

  //Skip file attachments
  if(!wp_attachment_is_image($post_id)) {
    return $url;
  }

  //Correct protocol for https connections
  list($protocol, $uri) = explode('://', $url, 2);

  if(is_ssl()) {
    if('http' == $protocol) {
      $protocol = 'https';
    }
  } else {
    if('https' == $protocol) {
      $protocol = 'http';
    }
  }

  return $protocol.'://'.$uri;
}
add_filter('wp_get_attachment_url', 'ssl_post_thumbnail_urls', 10, 2);
?>