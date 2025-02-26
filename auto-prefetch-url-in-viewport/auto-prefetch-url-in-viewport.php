<?php
/*
Plugin Name: Auto Prefetch URL in Viewport
Plugin URI: https://wordpress.org/plugins/auto-prefetch-url-in-viewport/
Description: Auto Prefetch URL in Viewport is an ultra-lightweight javascript plugin (<1 KB) that will automatically prefetch all links(URLs) in the viewport and make your website page load faster like a rocket.
Version: 1.0
Author: Wong Siong Kiat
Author URI: https://github.com/wongsiongkiat/auto-prefetch-url-in-viewport
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
Text Domain: auto-prefetch-url-in-viewport
Requires at least: 4.9
Requires PHP: 5.6 or later

This program is free software; you can redistribute it and/or modify it under the terms of the GNU
General Public License version 2, as published by the Free Software Foundation. You may NOT assume
that you can use any other version of the GPL.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

if(!defined('ABSPATH'))
	die('Invalid request.');

// Enqueue auto prefetch url in viewport js in frontend.
function auto_prefetch_url_in_viewport_js() {
	if(!is_admin()) {
		$apuiv_js = 'assets/js/auto-prefetch-url-in-viewport.min.js';
		
		wp_enqueue_script('auto-prefetch-url-in-viewport', plugin_dir_url(__FILE__) . $apuiv_js, array(), filemtime(plugin_dir_path(__FILE__) . $apuiv_js), true);
	}
}
add_action('wp_enqueue_scripts', 'auto_prefetch_url_in_viewport_js', 999);