<?php
/**
 * Plugin Name:       Advance Faq Block
 * Description:       The Advance FAQ Block is a WordPress plugin that allows you to easily create and manage Frequently Asked Questions (FAQs) on your website using the Gutenberg block editor. With this plugin, you can add a customizable FAQ section to any page or post on your site.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           1.0.2
 * Author:            Sydur Rahman
 * Author URI: 		  https://sydurrahman.com/
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       advance-faq-block
 *
 * @package           create-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */

//  Enqueue the Block assets.

 function wtd_faq_block_enqueue_assets() {
	wp_register_script(
	  'wtd-faq-block-script',
	  plugins_url( 'assets/js/wtd-script.js', __FILE__ ),
	  array( 'jquery' ),
	  '1.0.0',
	  true
	);

	// Enqueue the assets.
	wp_enqueue_script( 'wtd-faq-block-script' );
  }
  add_action( 'enqueue_block_assets', 'wtd_faq_block_enqueue_assets' );


//  Init the Block.
function create_block_advance_faq_block_block_init() {
	register_block_type( __DIR__ . '/build' );

	// Load the translation files.
	load_plugin_textdomain( 'advance-faq-block', false, basename( __DIR__ ) . '/languages' );
}
add_action( 'init', 'create_block_advance_faq_block_block_init' );


/**
 * Appsero Initialize the plugin tracker
 *
 * @return void
 */
function appsero_init_tracker_advance_faq_block() {

    if ( ! class_exists( 'Appsero\Client' ) ) {
      require_once (__DIR__ . '/inc/appsero/src/Client.php');
    }

    $client = new Appsero\Client( '5f08a1ed-dcb9-44a5-817f-31b72ce130a8', 'Advance Faq Block', __FILE__ );

    // Active insights
    $client->insights()->init();

}

appsero_init_tracker_advance_faq_block();
