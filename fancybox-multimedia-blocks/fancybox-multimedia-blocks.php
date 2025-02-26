<?php
/**
 * FancyBox for Multimedia Blocks
 *
 * @package     FancyBox-Multimedia-Blocks
 * @author      Stanislav Ogryzkov
 * @copyright   2023 – 2024 StanisLaw.ru
 * @license     GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: FancyBox for Multimedia Blocks
 * Plugin URI:  https://stanislaw.ru/eng/author/software.asp#fancybox-multimedia-blocks
 * Description: This plugin automatically makes standard blocks of the <a href="https://wordpress.org/documentation/article/wordpress-block-editor/" target="_blank">WordPress Block Editor</a> (particularly, <a href="https://wordpress.org/documentation/article/image-block/" target="_blank">images</a> and <a href="https://wordpress.org/documentation/article/gallery-block/" target="_blank">galleries</a>) using the latest <a href="https://fancyapps.com/fancybox/" target="_blank">FancyBox</a> without any additional actions of a web master.
 * Version:     1.4.3
 * Author:      Stanislav Ogryzkov
 * Author URI:  https://stanislaw.ru/
 * Text Domain: fancybox-multimedia-blocks
 * Domain Path: /languages/
 * License:     GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// Exit if accessed directly      

if (!defined('ABSPATH')) exit; 

// Load the plugin's translations to the current language

function fancybox_multimedia_blocks_load_plugin_textdomain() {
	load_plugin_textdomain('fancybox-multimedia-blocks', false, dirname(plugin_basename(__FILE__)) . '/languages'); 
}
add_action('init', 'fancybox_multimedia_blocks_load_plugin_textdomain');

// Add the plugin's menu item to the administrative interface

function fancybox_multimedia_blocks_admin_menu() {add_options_page(
	__('FancyBox for Multimedia Blocks', 'fancybox-multimedia-blocks'), // Page title
	__('FancyBox for Multimedia Blocks', 'fancybox-multimedia-blocks'), // Menu title
	'manage_options',                                                   // Capability
	'fancybox-multimedia-blocks',                                       // Menu slug
	'fancybox_multimedia_blocks_settings_page',                         // Function
);}
add_action('admin_menu', 'fancybox_multimedia_blocks_admin_menu');

// Show some content on the plugin's settings page

function fancybox_multimedia_blocks_settings_page() {
	echo '<h1>' . __('FancyBox for Multimedia Blocks', 'fancybox-multimedia-blocks') . '</h1>';
	echo '<p>' . __('This plugin automatically makes standard blocks of the <a href="https://wordpress.org/documentation/article/wordpress-block-editor/" target="_blank">WordPress Block Editor</a> using the latest <a href="https://fancyapps.com/fancybox/" target="_blank">FancyBox</a> without any additional actions of a web master.', 'fancybox-multimedia-blocks') . '</p>';
	echo '<h2>' . __('Supported Multimedia Blocks', 'fancybox-multimedia-blocks') . '</h2>';
	echo '<p><input type="checkbox" checked disabled> ' . __('<a href="https://wordpress.org/documentation/article/gallery-block/" target="_blank">Galleries</a> set up with links to media files', 'fancybox-multimedia-blocks') . '</p>';
	echo '<p><input type="checkbox" checked disabled> ' . __('<a href="https://wordpress.org/documentation/article/image-block/" target="_blank">Images</a> wrapped with links to media files', 'fancybox-multimedia-blocks') . '</p>';
}

// Add the FancyBox' styles and script and the plugin's initializing script to the output

function fancybox_multimedia_blocks_enqueue_styles_and_scripts() {
	wp_enqueue_style('fancybox-multimedia-blocks', plugin_dir_url(__FILE__) . 'fancybox.css');
	wp_enqueue_script('fancybox-multimedia-blocks-umd', plugin_dir_url(__FILE__) . 'scripts/fancybox.umd.js');
	wp_enqueue_script('fancybox-multimedia-blocks-bind', plugin_dir_url(__FILE__) . 'scripts/fancybox.bind.js');
}
add_action('wp_enqueue_scripts', 'fancybox_multimedia_blocks_enqueue_styles_and_scripts');

?>
