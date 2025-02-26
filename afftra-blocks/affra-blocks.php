<?php
/**
 * Plugin Name: Afftra - Ultimate Affiliate Marketing Blocks
 * Description: Ultimate Affiliate Marketing related Gutenberg blocks to showcase affiliate product's review, pros & cons, coupon code, offerbox, comparison, grid, list, etc in stylish ways.
 * Author: Gutenbergkits
 * Plugin URI: https://www.gutenbergkits.com/
 * Author URI: https://www.gutenbergkits.com
 * Version: 1.1.2
 * Text Domain: afftra-blocks
 * Domain Path: /languages
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package AfftraBlocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'AfftraBlocks ' ) ) {

	/**
	 * Afftra Blocks Final Class
	 *
	 * @since 1.0.0
	 * @package AfftraBlocks
	 */
	final class AfftraBlocks {

		/**
		 * Afftra Blocks Instance
		 *
		 * @since 1.0.0
		 */
		private static $instance;

		/**
		 * Afftra Blocks Constructor
		 *
		 * @since 1.0.0
		 * @return void
		 */
		private function __construct() {
			$this->define_constants();
			$this->init();
			$this->includes();
		}

		/**
		 * Afftra Blocks Define Constants
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function define_constants() {
			if ( ! defined( 'AFFTRA_VERSION' ) ) {
				define( 'AFFTRA_VERSION', '1.1.2' );
			}

			if ( ! defined( 'AFFTRA__FILE__' ) ) {
				define( 'AFFTRA__FILE__', __FILE__ );
			}

			if ( ! defined( 'AFFTRA_URL_FILE' ) ) {
				define( 'AFFTRA_URL_FILE', plugin_dir_url( AFFTRA__FILE__ ) );
			}

			if ( ! defined( 'AFFTRA_PLUGIN_DIR' ) ) {
				define( 'AFFTRA_PLUGIN_DIR', plugin_dir_path( AFFTRA__FILE__ ) );
			}

			if ( ! defined( 'AFFTRA_URL' ) ) {
				define( 'AFFTRA_URL', plugins_url( '/', AFFTRA_PLUGIN_DIR ) );
			}
		}

		/**
		 * Afftra Blocks Init
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function init() {
			add_action( 'init', array( $this, 'load_textdomain' ) );
			register_activation_hook(__FILE__, [$this, 'afftra_blocks_activation']);
		}

		/**
		 * Afftra Blocks Load Text Domain
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function load_textdomain() {
			load_plugin_textdomain( 'afftra-blocks', false, basename( AFFTRA_PLUGIN_DIR ) . '/languages' );
		}

		/**
		 * Afftra Blocks Instance
		 *
		 * @since 1.0.0
		 * @return AfftraBlocks
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Afftra Blocks Includes Files
		 *
		 * @since 1.0.0
		 * @return void
		 */
		private function includes() {
			require_once trailingslashit( AFFTRA_PLUGIN_DIR ) . 'inc/afftra-blocks-loader.php';
		}

		/*
		 * Afftra Blocks Activation Redirect
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function afftra_blocks_activation() {
			add_option('afftra_do_activation_redirect', true);
		}
	}

}

/**
 * Afftra Blocks
 *
 * @since 1.0.0
 * @return AfftraBlocks
 */
function afftra_blocks() {
	return AfftraBlocks::get_instance();
}
afftra_blocks(); // Initialize the Afftra Blocks class.
