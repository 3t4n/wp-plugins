<?php
/**
 * Inspect Block Data
 *
 * @package           inspect-block-data     
 * @author            khokansardar
 *
 * @wordpress-plugin
 * Plugin Name:       Inspect Block Data
 * Description:       A block toolkit that helps you inspect block data. A developer console.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           1.1.0
 * Author:            Khokan Sardar
 * Author URI:        https://profiles.wordpress.org/khokansardar
 * Text Domain:       inspect-block-data
 * Domain Path:       /languages
 * License:           GPLv2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

// Define IBD_PLUGIN_FILE.
if ( ! defined( 'IBD_PLUGIN_FILE' ) ) {
	define( 'IBD_PLUGIN_FILE', __FILE__ );
}

// Initialize the main Inspect_Block_Data class.
if ( ! class_exists( 'Inspect_Block_Data' ) ) {

    /**
	 * Main Inspect_Block_Data Class.
	 *
	 * @class Inspect_Block_Data
	 */
	final class Inspect_Block_Data {

		/**
		 * The single instance of the class.
		 */
		protected static $_instance = null;

		/**
		 * Main Inspect_Block_Data Instance.
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		/**
		 * Inspect_Block_Data Constructor.
		 */
		public function __construct() {
			// Set up localisation.
			$this->load_plugin_textdomain();
			add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_block_editor_assets' ) );
		}

		/**
		 * Get the plugin url.
		 *
		 * @return string
		 */
		public function plugin_url() {
			return untrailingslashit( plugins_url( '/', IBD_PLUGIN_FILE ) );
		}

		/**
		 * Get the plugin path.
		 *
		 * @return string
		 */
		public function plugin_path() {
			return untrailingslashit( plugin_dir_path( IBD_PLUGIN_FILE ) );
		}

		/**
		 * Load Localisation files.
		 */
		public function load_plugin_textdomain() {
			$locale = is_admin() && function_exists( 'get_user_locale' ) ? get_user_locale() : get_locale();
			$locale = apply_filters( 'plugin_locale', $locale, 'inspect-block-data' );

			unload_textdomain( 'inspect-block-data' );
			load_textdomain( 'inspect-block-data', WP_LANG_DIR . '/inspect-block-data/inspect-block-data-' . $locale . '.mo' );
			load_plugin_textdomain( 'inspect-block-data', false, plugin_basename( dirname ( IBD_PLUGIN_FILE ) ) . '/languages' );
		}

		/**
		 * Enqueue assets used in block editor context.
		 */
		public function enqueue_block_editor_assets() {
			$script_dependencies = array(
				'dependencies' => null,
				'version' => null,
			);
			
			if ( file_exists( $this->plugin_path() . '/build/index.asset.php' ) ) {
				$script_dependencies = include $this->plugin_path() . '/build/index.asset.php';
			}

			wp_enqueue_script(
				'inspect-block-data',
				$this->plugin_url() . '/build/index.js',
				$script_dependencies['dependencies'],
				$script_dependencies['version'],
				true
			);
		}
	}

	Inspect_Block_Data::instance();
}
