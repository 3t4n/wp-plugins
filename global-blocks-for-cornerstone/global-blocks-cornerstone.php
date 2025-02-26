<?php
/*
Plugin Name: Global Blocks for Cornerstone and X Pro
Plugin URI:  https://xthemetips.com
Description: Creates a Cornerstone/X Pro enabled custom post type, where you can create any design you want for global use in any other pages using a simple custom element or shortcode.
Version:     1.4
Author:      Michael Bourne
Author URI:  https://ursa6.com
License:     GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
Text Domain: global-blocks-cornerstone
*/

/**
*  Check for Cornerstone/X Pro. If not installed, deactivate plugin and die with error. 
*  Run on after_setup_theme to ensure Cornerstone is loaded, but prior to init so our CPT can be registered properly.
*/

function global_blocks_plugin_init() {

	if( class_exists( 'Cornerstone_Plugin' ) || function_exists('cornerstone_boot') ){
	// Cornerstone enabled
		$cornerstone = TRUE;
	}
	else {
	// No Cornerstone, no X, get lost
		$cornerstone = FALSE;
	}

	// If Cornerstone is NOT active
	if ( current_user_can( 'activate_plugins' ) && $cornerstone === FALSE ) {

		add_action( 'admin_init', 'global_blocks_plugin_deactivate' );
		add_action( 'admin_notices', 'global_blocks_plugin_admin_notice' );

		// Deactivate the Global Blocks Plugin
		function global_blocks_plugin_deactivate()
		{
			deactivate_plugins(plugin_basename(__FILE__));
		}

		// Throw an error up for disclosure
		function global_blocks_plugin_admin_notice()
		{
			$global_blocks_child_plugin = __('Global Blocks', 'global-blocks-cornerstone');
			$global_blocks_parent_plugin = __('Cornerstone or X Pro', 'global-blocks-cornerstone');
			echo '<div class="error"><p>Current theme: ' . wp_get_theme()->get( 'Name' ) . ', ' .sprintf(__('%1$s requires %2$s to function correctly. Please activate %2$s before activating %1$s. For now, the plugin has been deactivated.', 'global-blocks-cornerstone') , '<strong>' . esc_html($global_blocks_child_plugin) . '</strong>', '<strong>' . esc_html($global_blocks_parent_plugin) . '</strong>') . '</p></div>';
			if (isset($_GET['activate'])) {
				unset($_GET['activate']);
			}
		}

	} else {

		// Cornerstone is active, build plugin
		// Define constants
		define('GLOBAL_BLOCKS_PATH', plugin_dir_path(__FILE__));
		define('GLOBAL_BLOCKS_URL', plugin_dir_url(__FILE__));

		require_once(GLOBAL_BLOCKS_PATH . 'element.php');
		require_once(GLOBAL_BLOCKS_PATH . 'template.php');
		require_once(GLOBAL_BLOCKS_PATH . 'activate.php');
		require_once(GLOBAL_BLOCKS_PATH . 'options.php');

	}
}
add_action( 'after_setup_theme', 'global_blocks_plugin_init' );