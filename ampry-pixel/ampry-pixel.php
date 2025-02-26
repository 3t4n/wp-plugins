<?php

/**
 * Plugin Name: Ampry
 * Plugin URI: https://ampry.com/
 * Description: The easy way to install your Ampry pixel on your Wordpress site. Activate this plugin and find the Ampry Pixel menu in your Wordpress Settings
 * Version: 1.0.2
 * Author: Ampry.com
 * Author URI: https://ampry.com/
 * License: GPLv2 or later
 */

define('AMPRY_PLUGIN_DIR', str_replace('\\', '/', dirname(__FILE__)));

if (!class_exists('AmpryPixel')) {

	class AmpryPixel
	{

		function __construct()
		{
			add_action('init', array(&$this, 'init'));
			add_action('admin_init', array(&$this, 'admin_init'));
			add_action('admin_menu', array(&$this, 'admin_menu'));
			add_action('wp_footer', array(&$this, 'wp_footer'), 10);
		}

		function init()
		{

			load_plugin_textdomain('ampry-pixel-code', false, dirname(plugin_basename(__FILE__)) . '/lang');
		}

		function admin_init()
		{
			// register settings for sitewide script
			register_setting('ampry-pixel-code', 'ampry_insert_footer', 'trim');
		}

		// adds menu item to wordpress admin dashboard
		function admin_menu()
		{
			$page = add_submenu_page('options-general.php', esc_html__('Ampry Pixel', 'ampry-pixel-code'), esc_html__('Ampry Pixel', 'ampry-pixel-code'), 'manage_options', __FILE__, array(&$this, 'ampry_options_panel'));
		}

		function wp_footer()
		{
			if (!is_admin() && !is_feed() && !is_robots() && !is_trackback()) {
				$text = get_option('ampry_insert_footer', '');
				$text = convert_smilies($text);
				$text = do_shortcode($text);

				if ($text != '') {
					echo $text, "\n";
				}
			}
		}

		function ampry_options_panel()
		{
			// Load options page
			require_once(AMPRY_PLUGIN_DIR . '/inc/options.php');
		}
	}


	$ampry_pixel = new AmpryPixel();
}
