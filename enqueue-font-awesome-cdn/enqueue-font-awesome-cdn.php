<?php
/*
Plugin Name: Enqueue Font Awesome CDN
Plugin URI: http://www.jimmyscode.com/wordpress/enqueue-font-awesome-cdn/
Description: Automatically enqueue <a href="http://fortawesome.github.io/Font-Awesome/">Font Awesome</a> from CDN
Version: 0.0.3
Author: Jimmy Pe&ntilde;a
Author URI: http://www.jimmyscode.com/
License: GPLv2 or later
*/

if (!defined('EFAC_PLUGIN_NAME')) {
	// plugin constants
	define('EFAC_PLUGIN_NAME', 'Enqueue Font Awesome');
	define('EFAC_SLUG', 'enqueue-font-awesome-cdn');
	define('EFAC_LOCAL', 'efac');
	define('EFAC_FA_VERSION', '4.2.0');
}
// oh no you don't
if (!defined('ABSPATH')) {
	wp_die(__('Do not access this file directly.', efac_get_local()));
}

// localization to allow for translations
add_action('init', 'efac_translation_file');
function efac_translation_file() {
	$plugin_path = plugin_basename(dirname(__FILE__) . '/translations');
	load_plugin_textdomain(efac_get_local(), '', $plugin_path);
}

// main function
// based on http://fortawesome.github.io/Font-Awesome/get-started/ and 
// http://wpbacon.com/tutorials/font-awesome-wordpress-cdn/
add_action('wp_enqueue_scripts', 'efac_load_fa_from_cdn');
function efac_load_fa_from_cdn() {
	wp_enqueue_style(
		efac_get_slug(),
		'//maxcdn.bootstrapcdn.com/font-awesome/' . EFAC_FA_VERSION . '/css/font-awesome.min.css',
		array(), 
		EFAC_FA_VERSION, 
		'all'
	);
}
	// add helpful links to plugin page next to plugin name
	// http://wpengineer.com/1295/meta-links-for-wordpress-plugins/
	add_filter('plugin_row_meta', 'efac_meta_links', 10, 2);
	function efac_meta_links($links, $file) {
		if ($file == plugin_basename(__FILE__)) {
			$links = array_merge($links,
			array(
				sprintf(__('<a href="http://wordpress.org/support/plugin/%s">Support</a>', efac_get_local()), efac_get_slug()),
				sprintf(__('<a href="http://wordpress.org/extend/plugins/%s/">Documentation</a>', efac_get_local()), efac_get_slug()),
				sprintf(__('<a href="http://wordpress.org/plugins/%s/faq/">FAQ</a>', efac_get_local()), efac_get_slug())
			));
		}
		return $links;	
	}

// encapsulate these and call them throughout the plugin instead of hardcoding the constants everywhere
	function efac_get_slug() { return EFAC_SLUG; }
	function efac_get_local() { return EFAC_LOCAL; }
?>