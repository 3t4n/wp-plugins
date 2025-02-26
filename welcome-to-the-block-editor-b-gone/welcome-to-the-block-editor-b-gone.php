<?php
/**
* Plugin Name: Welcome to the block editor B gone
* Plugin URI: https://plugins.followmedarling.se/welcome-to-the-block-editor-b-gone/
* Description: Finally get rid of that welcome message that's showing up even if you've been using Gutenberg for years!
* Version: 1.04
* Author: Jonk @ Follow me Darling
* Author URI: https://plugins.followmedarling.se/
* Domain Path: /languages
* Text Domain: welcome_to_the_block_editor_b_gone
**/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function welcome_to_the_block_editor_b_gone() {
	$plugin_version = get_plugin_data( __FILE__ )['Version'];
	wp_enqueue_script(
		'welcome-to-the-block-editor-b-gone',
		plugins_url( 'js/admin.js', __FILE__ ),
		null,
		$plugin_version
	);
}
add_action( 'admin_enqueue_scripts', 'welcome_to_the_block_editor_b_gone' );
