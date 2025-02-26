<?php
/* Plugin Name: Display Post Feed from Medium
 * Description: Display Post Feed from Medium is a WordPress plugin to display the posts/articles from medium.com on any page/post via the shortcode.
 * Author: Galaxy Weblinks
 * Author URI: http://galaxyweblinks.com
 * Version: 2.3
 * Text Domain: display-post-feed-from-medium
 * License: GPL2
*/

if (!defined('ABSPATH')) {
	exit; /* Exit if accessed directly*/
}

/* Define plugin path and URL */
define('DPFFM_URL', plugin_dir_url(__FILE__));
define('DPFFM_PATH', plugin_dir_path(__FILE__));

require_once(ABSPATH . 'wp-admin/includes/plugin.php');

/* Plugin activation hook */
if (! function_exists('dpffm_plugin_activate')) {
	function dpffm_plugin_activate()
	{
		add_option('dpffm_plugin_do_activation_redirect', true);
	}
}
register_activation_hook(__FILE__, 'dpffm_plugin_activate');

/* Plugin redirect page */
if (! function_exists('dpffm_plugin_redirect')) {
	function dpffm_plugin_redirect()
	{
		if (get_option('dpffm_plugin_do_activation_redirect', false)) {
			delete_option('dpffm_plugin_do_activation_redirect');
			wp_redirect("admin.php?page=dpffm-settings");
			exit;
		}
	}
}
add_action('admin_init', 'dpffm_plugin_redirect');

/* Plugin uninstall hook */
if (! function_exists('dpffm_plugin_uninstall')) {
	function dpffm_plugin_uninstall()
	{
		if (file_exists(DPFFM_PATH . 'includes/display-post-feed-medium-uninstall.php')) {
			require_once(DPFFM_PATH . 'includes/display-post-feed-medium-uninstall.php');
		}
	}
}
register_uninstall_hook(__FILE__, 'dpffm_plugin_uninstall');

/*Check plugin functions file exists*/
if (file_exists(DPFFM_PATH . 'includes/display-post-feed-medium-functions.php')) {
	require_once(DPFFM_PATH . 'includes/display-post-feed-medium-functions.php');
}

/*Check plugin shortcode file exists*/
if (file_exists(DPFFM_PATH . 'includes/display-post-feed-medium-shortcodes.php')) {
	require_once(DPFFM_PATH . 'includes/display-post-feed-medium-shortcodes.php');
}

/*
 * Enqueue Script for admin 
*/
if (! function_exists('dpffm_page_script')) {
	function dpffm_page_script()
	{
		global $post_type;
		if (isset($_GET['page']) && $_GET['page'] == 'dpffm-settings') {
			wp_enqueue_script('jquery');
			wp_enqueue_media();
			wp_enqueue_script('dpffm-validate-js', DPFFM_URL . 'assets/js/jquery.validate.min.js', array('jquery'));
			wp_enqueue_script('dpffm-admin-js', DPFFM_URL . 'assets/js/admin-main.js');
			wp_enqueue_style('dpffm-admin-css', DPFFM_URL . 'assets/css/admin-style.css');
		} else {
			wp_enqueue_style('dpffm-admin-css', DPFFM_URL . 'assets/css/front-style.css');
		}
	}
}
add_action('admin_enqueue_scripts', 'dpffm_page_script');

/*
 * Enqueue Script for Frontend 
*/
if (! function_exists('dpffm_frontend_script')) {
	function dpffm_frontend_script()
	{
		wp_enqueue_style('dpffm-admin-css', DPFFM_URL . 'assets/css/front-style.css');
	}
}
add_action('wp_enqueue_scripts', 'dpffm_frontend_script');

/*
 *  Plugin Setting Link 
*/
if (! function_exists('dpffm_settings_link')) {
	function dpffm_settings_link($actions, $plugin_file)
	{
		static $plugin;

		if (!isset($plugin))
			$plugin = plugin_basename(__FILE__);
		if ($plugin == $plugin_file) {

			$settings = array('settings' => '<a href="' . admin_url('admin.php?page=dpffm-settings') . '">' . __('Settings', 'display-post-feed-from-medium') . '</a>');
			$actions = array_merge($settings, $actions);
		}
		return $actions;
	}
}
add_filter('plugin_action_links', 'dpffm_settings_link', 10, 5);

/**
 * You can use these filters to add custom links to your plugin row in the plugin list.
 * @param $links, $file
 * @return $links [array]
 */
function dpffm_add_custom_plugin_links($links, $file)
{
	if ($file === 'display-post-feed-from-medium/display-post-feed-from-medium.php') {
		$links[] = '<a href="https://wp-plugins.galaxyweblinks.com/wp-plugins/display-post-feed-from-medium/doc/" target="_blank">Documentation</a>';
		$links[] = '<a href="https://wp-plugins.galaxyweblinks.com/wp-plugins/display-post-feed-from-medium/demo/" target="_blank">View Demo</a>';
		$links[] = '<a href="https://wp-plugins.galaxyweblinks.com/contact/" target="_blank">Contact Support</a>';
	}
	return $links;
}

add_filter('plugin_row_meta', 'dpffm_add_custom_plugin_links', 10, 2);
