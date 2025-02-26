<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.powr.io/multi-slider-website-app
 * @since             2.0.0
 * @package           POWR_Multi_Slider
 *
 * @wordpress-plugin
 * Plugin Name:       POWR Multi Slider
 * Plugin URI:        https://www.powr.io/multi-slider-website-app
 * Description:       Capture more eyeballs with images, videos, and banners  Drop the widget anywhere in your theme. Or use the POWr icon in your WP text editor to add to a page or post. Edit on your live page by clicking the settings icon. More plugins and tutorials at POWr.io.
 * Version:           2.0.0
 * Author:            POWR
 * Author URI:        https://www.powr.io
 * License:           GPL-3.0-or-later
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       powr-multi-slider
 */

 // If this file is called directly, abort.
 if (!defined('WPINC')) {
	 die;
 }
 
 define('PLUGIN_NAME_VERSION', '2.0.0');
 define('POWR_MULTI_SLIDER_OPTION', 'powr_multi_slider_settings');
 
 // Add menu item in WordPress admin
 if (!function_exists('powrio_multi_slider_menu')) {
	 function powrio_multi_slider_menu()
	 {
		 if (empty($GLOBALS['admin_page_hooks']['powrio-plugins'])) {
			 add_menu_page(
				 'Multi Slider',
				 'Multi Slider',
				 'manage_options',
				 'powrio-multi-slider',
				 'powrio_powr_multi_slider_options',
				 plugins_url('/src/icons/powr-icon.png', __FILE__)
			 );
		 }
	 }
 }
 
 // Get POWr base URL
 if (!function_exists('powrio_powr_base_url')) {
	 function powrio_powr_base_url()
	 {
		 return 'www.powr.io';
	 }
 }
 
 // Render an iframe for the plugin
 if (!function_exists('powrio_render_iframe')) {
	 function powrio_render_iframe($url)
	 {
		 echo '<iframe src="' . esc_url($url) . '" frameborder="0" scrolling="yes" seamless="seamless" style="background: white; display: block; width: 100%; height: calc(100vh - 35px);"></iframe>';
	 }
 }
 
 // Admin settings page
 if (!function_exists('powrio_powr_multi_slider_options')) {
	 function powrio_powr_multi_slider_options()
	 {
		 $current_user = wp_get_current_user();
		 $iframe_url = 'https://' . powrio_powr_base_url() . '/api/woo_commerce/auth/apps/multi-slider?email=' . urlencode($current_user->user_email) . '&platform=wordpress&done=1';
		 powrio_render_iframe($iframe_url);
	 }
 }
 
 add_action('admin_menu', 'powrio_multi_slider_menu');
 
 // Register plugin settings
 function powrio_register_settings() {
	 register_setting('powr_multi_slider_group', POWR_MULTI_SLIDER_OPTION);
 }
 add_action('admin_init', 'powrio_register_settings');
 
 // Add settings link to plugins page
 function powrio_plugin_settings_link($links) {
	 $settings_link = '<a href="admin.php?page=powrio-multi-slider">Settings</a>';
	 array_push($links, $settings_link);
	 return $links;
 }
 add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'powrio_plugin_settings_link');
 
 // Shortcode to display slider
 function powrio_multi_slider_shortcode($atts) {
	 $options = get_option(POWR_MULTI_SLIDER_OPTION);
	 $slider_id = isset($atts['id']) ? esc_attr($atts['id']) : 'default';
	 $embed_url = 'https://' . powrio_powr_base_url() . '/app/multi-slider?id=' . $slider_id;
	 return '<iframe src="' . esc_url($embed_url) . '" style="width:100%; height:500px; border:none;"></iframe>';
 }
 add_shortcode('powr_multi_slider', 'powrio_multi_slider_shortcode');
 
 // Enqueue admin styles
 function powrio_enqueue_admin_styles() {
	 wp_enqueue_style('powrio_admin_css', plugins_url('admin-style.css', __FILE__), array(), PLUGIN_NAME_VERSION);
 }
 add_action('admin_enqueue_scripts', 'powrio_enqueue_admin_styles');
 
 // Add plugin uninstall hook
 function powrio_multi_slider_uninstall() {
	 delete_option(POWR_MULTI_SLIDER_OPTION);
 }
 register_uninstall_hook(__FILE__, 'powrio_multi_slider_uninstall');
 
 // Function to display admin notices
 function powrio_admin_notices() {
	 if (!current_user_can('manage_options')) {
		 return;
	 }
	 echo '<div class="notice notice-info is-dismissible"><p>POWr Multi Slider is active. Configure it <a href="admin.php?page=powrio-multi-slider">here</a>.</p></div>';
 }
 add_action('admin_notices', 'powrio_admin_notices');
 
 // AJAX handler for updating settings
 function powrio_update_settings() {
	 if (!current_user_can('manage_options')) {
		 wp_send_json_error(['message' => 'Permission denied']);
	 }
	 check_ajax_referer('powrio_save_settings', 'security');
	 
	 wp_send_json_success(['message' => 'Settings updated successfully']);
 }
 add_action('wp_ajax_powrio_update_settings', 'powrio_update_settings');

?>