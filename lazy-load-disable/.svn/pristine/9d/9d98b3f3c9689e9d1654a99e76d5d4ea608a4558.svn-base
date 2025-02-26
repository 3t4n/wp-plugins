<?php
/*
Plugin Name: Lazy Load Disable 
Description: Disable the new WP Lazy Loading functionality (added in WP version 5.5)
Version: 1.9
Author: Bill Minozzi
Author URI: http://billminozzi.com
License URI: http://www.gnu.org/licenses/gpl-2.0.html
License: GPL v2 or later
*/

// Make sure the file is not directly accessible.
if (!defined('ABSPATH')) {
    die("We are sorry, but you can not directly access this file.");
}
define("LAZY_LOAD_DISABLE_PATH", plugin_dir_path(__FILE__));

// Attempt to disable lazy loading globally.
add_filter('wp_lazy_loading_enabled', '__return_false');

// Ensure all images are set to load eagerly.
function lazy_load_disable_all_images($attr) {
    $attr['loading'] = 'eager';
    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'lazy_load_disable_all_images');

// For images directly in post content.
add_filter('the_content', function($content) {
    return preg_replace('/<img(.*?)>/', '<img$1 loading="eager">', $content);
});

// Add a message to the plugin row in the admin area.
add_filter('plugin_row_meta', 'add_lazy_load_disable_message', 10, 2);

function add_lazy_load_disable_message($plugin_meta, $plugin_file) {
    if ($plugin_file === 'lazy-load-disable/lazy-load-disable.php') {
        $plugin_meta[] = 'To prevent lazy loading, keep the plugin active';
    }
    return $plugin_meta;
}
?>
