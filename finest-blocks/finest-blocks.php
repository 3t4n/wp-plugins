<?php
/**
 * Plugin Name: Finest Blocks
 * Plugin URI: http://finestplugins.com/items/finestblocks/
 * Description: Packed with a bunch of trendy designed widget for Gutenberg Block.
 * Version: 1.0.0
 * Author: finestplugins
 * Author URI: http://finestplugins.com/
 * Text Domain: finestblocks
 * Domain Path: /languages
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

defined( 'ABSPATH' ) || exit;

require_once __DIR__ . '/php/vendor/autoload.php';

class Finest_Blocks {

	function __construct() {
		$this->define_constants();
		add_action( 'plugins_loaded', [ $this, 'plugin_init' ] );
		add_action( 'init', [ $this, 'load_textdomain' ] );
	}

	public function define_constants() {
		define( 'FINEST_BLOCKS_FILE', __FILE__ );
		define( 'FINEST_BLOCKS_PATH', __DIR__ );
		define( 'FINEST_BLOCKS_URL', plugins_url( '', FINEST_BLOCKS_FILE ) );
		define( 'FINEST_BLOCKS_ASSETS', FINEST_BLOCKS_URL . '/assets' );
	}

	public function load_textdomain() {
		load_plugin_textdomain( 'finestblocks', false, dirname( plugin_basename( __FILE__ ) ) . '/i18n' );
	}

	public function plugin_init() {
		new Finest\Blocks\Assets();
		new Finest\Blocks\ImageGallery();
	}

}

new Finest_Blocks();
