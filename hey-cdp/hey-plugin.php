<?php

/* 
 * Plugin Name:       Hey CDP
 * Plugin URI:        https://wp-plugin-hey.hey.net.co/
 * Description:       Este plugin te permite integrar con 3 clics tu sitio web de WordPress con Hey! CDP.
 * Version:           1.0
 * Requires at least: 6.1.1
 * Requires PHP:      7.2 
 * Author:            Hey
 * Author URI:        https://hey.hey.net.co/
 * License:           GPL v2 or later 
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

require_once plugin_dir_path(__FILE__)."public/shortcode/insert-tag.php";

require_once plugin_dir_path(__FILE__)."admin/create-admin-page.php";