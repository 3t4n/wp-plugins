<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.powr.io/social-feed-website-app
 * @since             2.0.0
 * @package           Powr_Social_Feed
 *
 * @wordpress-plugin
 * Plugin Name:       POWr Social Feed
 * Plugin URI:        https://www.powr.io/social-feed-website-app
 * Description:       Collect more leads, get more conversions and save time.
 * Version:           2.0.2
 * Author:            POWr
 * Author URI:        https://www.powr.io
 * License:           GPL-3.0-or-later
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       powr-social-feed
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
	exit;
}

define('POWRIOSF_PLUGIN_NAME_VERSION', '2.0.2');

if (!function_exists('powriosf_social_feed_menu')) {
	function powriosf_social_feed_menu()
	{
		if (empty($GLOBALS['admin_page_hooks']['powrio-plugins'])) {
			$page_title = 'Social Feed';
			$menu_title = 'Social Feed';
			$capability = 'manage_options';
			$menu_slug = 'powrio-social-feed';
			$icon_url = plugins_url('/src/icons/powr-icon.png', __FILE__);
			$position = null;

			add_menu_page(
				$page_title,
				$menu_title,
				$capability,
				$menu_slug,
				'powriosf_powr_social_feed_options',
				$icon_url,
				$position
			);
		}
	}
}

if (!function_exists('powriosf_powr_base_url')) {
	function powriosf_powr_base_url()
	{
		$base_url = 'www.powr.io';
		if (!empty($base_url)) {
			return $base_url;
		} else {
			return 'www.powr.io';
		}
	}
}

if (!function_exists('powriosf_render_iframe')) {
	function powriosf_render_iframe($url)
	{
		$iframe_url = $url;
		$frameborder = 0;
		$scrolling = 'yes';
		$seamless = 'seamless';
		$style = 'background: white;display:block; width: calc(100% - -20px); height: calc(100vh - 35px); margin-left: -20px;';

		echo ('<iframe src="' . esc_attr($iframe_url) . '" frameborder="' . (int)$frameborder . '" scrolling="' . esc_attr($scrolling) . '" seamless="' . esc_attr($seamless) . '" style="' . esc_attr($style) . '"></iframe>');
	}
}

if (!function_exists('powriosf_powr_social_feed_options')) {
	function powriosf_powr_social_feed_options()
	{
		if (function_exists('wp_get_current_user')) {
			$current_user = wp_get_current_user();

			if ($current_user && !empty($current_user->user_email)) {
				$email = $current_user->user_email;

				$base_url = powriosf_powr_base_url();
				$protocol = 'https://';
				$api_endpoint = '/api/woo_commerce/auth/apps/social-feed';
				$email_param = '?email=' . esc_attr($email);
				$platform = '&platform=wordpress';
				$ending = '&done=1';
				$full_url = $protocol . $base_url . $api_endpoint . $email_param . $platform . $ending;

				if (!empty($full_url)) {
					powriosf_render_iframe($full_url);
				}
			}
		}
	}
}

add_action('admin_menu', 'powriosf_social_feed_menu');
