<?php
/**
 * @package     Advanced Embed For YouTube
 * @author      Kashberg (@kashberg)
 * @license     GPL2+
 *
 * @wordpress-plugin
 * Plugin Name: Advanced Embed For YouTube
 * Description: Advanced YouTube embed block with plenty of options that gives you full control over your embeded video. Customize the embed size, show and hide video controls, change the player language and more.
 * Version:     1.0.0
 * Author:      Kashberg
 * Author URI: https://profiles.wordpress.org/kashberg/
 * Requires at least: 5.0
 * Requires PHP: 5.6
 * Text Domain: advanced-youtube-embed
 * Domain Path: /languages
 * License:     GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

defined('ABSPATH') || exit;

define( 'AYE_VERSION', '1.0.0' );
define( 'AYE_PLUGIN_URI', plugin_dir_url( __FILE__  ) );

class Aye_Youtube_Embed {

	private static $instance = null;
		
	private function __construct() {
		$this->hooks();
	}

	public static function get_instance() {
    if ( self::$instance == null ) {
      self::$instance = new Aye_Youtube_Embed();
    }
 
    return self::$instance;
  }

	/**
	 * Fire wp action hooks.
	 *
	 * @return void
	 */
	function hooks() {
		add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_block_editor_assets_cb' ] );
	}

	/**
	 * Enqueue block gutenberg assets.
	 *
	 * @return void
	 */
	function enqueue_block_editor_assets_cb() {
		wp_enqueue_script(
			'advanced-youtube-embed-block-script',
			AYE_PLUGIN_URI . '/assets/js/editor.js',
			[ 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-editor', 'wp-api', 'wp-compose' ],
			AYE_VERSION
		);
		wp_enqueue_style(
			'advanced-youtube-embed-block-style',
			AYE_PLUGIN_URI . '/assets/css/blocks.css',
			null,
			AYE_VERSION
		);
	}

}

/**
 * Initialize Plugin.
 *
 * @return void
 */
function aye_init_youtube_embed() {
	Aye_Youtube_Embed::get_instance();
}

add_action( 'plugins_loaded', 'aye_init_youtube_embed' );