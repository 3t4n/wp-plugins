<?php
/*
  @wordpress-plugin
  Plugin name: 123on Video Embedding
  Description: Easily embed 123on videos by pasting URLs
  Version: 1.0.1
  Author: 123on
  Author URI: https://123on.com
  License: GPL2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/


function whitelist_123on_oembed_provider() {
  wp_oembed_add_provider('https://123on.com/video/*', 'https://123on.com/oembed');
}

add_action('init', 'whitelist_123on_oembed_provider');

?>
