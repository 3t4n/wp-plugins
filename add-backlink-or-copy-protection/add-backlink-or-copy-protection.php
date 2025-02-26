<?php
/*
Plugin Name: Add Backlink or Copy Protection    
Description: Automatically adds a backlink to your site when you copy text from it.
Version: 1.0.0
Stable Tag: 1.0.0
Author: Kislitsin Dmitrii
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Requires at least: 5.5
Requires PHP: 7.4
*/

function clp_enqueue_scripts() {
    wp_enqueue_script('clp-copy-script', plugin_dir_url(__FILE__) . 'copy-script.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'clp_enqueue_scripts');