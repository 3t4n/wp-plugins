<?php
/**
 * Plugin Name: FAQ Block For Gutenberg
 * Plugin URI : https://wordpress.org/plugins/faq-block-for-gutenberg/
 * Description: This plugin provides a quick and easy way to add FAQ's block using Gutenberg visual editor.
 * Tags: blocks, faq, gutenberg faq, editor, faq block
 * Author: Dilip Bheda
 * Author URI: http://profiles.wordpress.org/dilipbheda
 * Text Domain: faq-block-for-gutenberg
 * Domain Path: /languages
 * Version: 2.7
 * License: GPLv3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package Faq_Block_For_Gutenberg
 */

// Include class file.
require_once plugin_dir_path( __FILE__ ) . '/includes/class-faq-block-for-gutenberg.php';

/**
 * Load textdomain.
 */
function gutenberg_faq_block_textdomain() {
	load_plugin_textdomain( 'faq-block-for-gutenberg', false, basename( __DIR__ ) . '/languages' );
}

/**
 * Register activation.
 */
function gutenberg_faq_block_activation() {
	// Activation code.
}
register_activation_hook( __FILE__, 'gutenberg_faq_block_activation' );

/**
 * Register deactivation.
 */
function gutenberg_faq_block_deactivation() {
	// Deactivation code.
}
register_deactivation_hook( __FILE__, 'gutenberg_faq_block_deactivation' );

/**
 * Plugin init.
 */
function gutenberg_faq_block_init() {
	new Faq_Block_For_Gutenberg();
}
add_action( 'plugins_loaded', 'gutenberg_faq_block_init' );
