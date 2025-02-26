<?php
/*
Plugin Name: Hide First Image In Post
Plugin URI: https://www.thekonsulthub.com/introduction-to-hide-first-image-in-post-wordpress-plugin/
Description: Hide First Image In Post plugin hides only the first image in WordPress post (content) on activation, whilst leaving other images intact. To show back hidden images, simply deactivate the plugin.
Author: KWS Adams
Version: 1.0
Author URI: https://www.thekonsulthub.com/

*/

function remove_first_image ($content) {
if (!is_page() && !is_feed() && !is_feed() && !is_home()) {
$content = preg_replace("/<img[^>]+\>/i", "", $content, 1);
} return $content;
}
add_filter('the_content', 'remove_first_image');

?>
