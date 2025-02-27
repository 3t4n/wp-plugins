<?php
/*
Plugin Name: Disable WP Sitemap
Description: Disable WordPress Native Sitemap Automatic Creation. Very Simple: Just Activate or Deactivate it. No Admin Panel available. 
Version: 1.7
Author: Bill Minozzi
Author URI: http://billminozzi.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// Make sure the file is not directly accessible.
if (!defined('ABSPATH')) {
    die('We\'re sorry, but you can not directly access this file.');
}

define("DISABLE_SITEMAP_PATH", plugin_dir_path(__FILE__));

function disable_sitemap_main() {
    add_filter( 'wp_sitemaps_enabled', '__return_false' );
}
add_action( 'init', 'disable_sitemap_main' );



?>
