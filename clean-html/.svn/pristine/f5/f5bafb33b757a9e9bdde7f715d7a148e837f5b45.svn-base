<?php
/*
Plugin Name: Cleanup HTML
Plugin URI: http://wordpress.org/plugins/clean-html
Description: Adds a button to the visual editor which allows you to clean up HTML inside a post.
Version: 1.1
Author: Closemarketing
Author URI: http://www.closemarketing.es
*/

function customclmkg_init() {
	load_plugin_textdomain( 'clmkg', false, dirname( plugin_basename( __FILE__ ) ) . '/lang' );
	}
	//Load Translation
add_action('plugins_loaded', 'customclmkg_init');

/**
 * 	Add TinyMCE buttons (WP 2.5+)
 */

add_action('init', 'cleanup_html_addbuttons');

function cleanup_html_addbuttons() {
   // Don't bother doing this stuff if the current user lacks permissions
   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
     return;

   // Add only in Rich Editor mode
   if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "add_cleanup_html_tinymce_plugin");
		add_filter('mce_buttons', 'register_cleanup_html_button');
   }
}

function register_cleanup_html_button($buttons) {
	array_push($buttons, "separator", "cleanuphtml","cleanuphtml2");
	return $buttons;
}

if (!function_exists('plugin_url')) {

	function plugin_url() {
		$plugin_url = get_option('siteurl') . '/wp-content/plugins/' . plugin_basename(dirname(__FILE__));
		return $plugin_url;
	}

}

function add_cleanup_html_tinymce_plugin($plugin_array) {

	$plugin_array['cleanuphtml'] = plugin_url().'/tinymce/editor_plugin.js';
	return $plugin_array;
}


// Insertion scripts
function cleanup_html_admin_scripts() {
	wp_register_script('cleanup_html_admin_scripts', plugin_url() . '/cleanup-html.js');
	wp_enqueue_script('cleanup_html_admin_scripts');
}
if (is_admin()) {
	add_action('init', 'cleanup_html_admin_scripts');
}


?>
