<?php
/**
 * Plugin Name: Afftra - Affiliate Marketing Blocks
 * Description: Show affiliate products in stylish way with Affiliate Marketing Blocks.
 * Author: Gutenbergkits
 * Version: 1.0.1
 * Text Domain: affiliate-marketing-blocks
 * Domain Path: /languages
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package Afmb-blocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'Afmb_Blocks ' ) ) {

	/**
	 * Afmb Blocks Final Class
	 *
	 * @since 1.0.0
	 * @package Afmb-blocks
	 */
	final class Afmb_Blocks {

		/**
		 * Afmb Blocks Instance
		 *
		 * @since 1.0.0
		 */
		private static $instance;

		/**
		 * Afmb Blocks Constructor
		 *
		 * @since 1.0.0
		 * @return void
		 */
		private function __construct() {
			$this->define_constants();
			$this->includes();

			// redirect to dashboard page after plugin activation
			register_activation_hook( __FILE__, array( $this, 'user_redirect' ) );

			// handle redirect
			add_action( 'admin_init', array( $this, 'redirect_to_dashboard' ) );
		}

		/**
		 * Afmb Blocks Define Constants
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function define_constants() {
			$constants = array(
				'AFMB_VERSION'    => '1.0.1',
				'AFMB__FILE__'    => __FILE__,
				'AFMB_URL_FILE'   => plugin_dir_url( __FILE__ ),
				'AFMB_PLUGIN_DIR' => plugin_dir_path( __FILE__ ),
				'AFMB_URL'        => plugins_url( '/', plugin_dir_path( __FILE__ ) ),
			);

			foreach ( $constants as $key => $value ) {
				if ( ! defined( $key ) ) {
					define( $key, $value );
				}
			}
		}

		/**
		 * Afmb Blocks Instance
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
		 * Afmb Blocks Includes Files
		 *
		 * @since 1.0.0
		 * @return void
		 */
		private function includes() {
			require_once trailingslashit( AFMB_PLUGIN_DIR ) . 'inc/afmb-loader.php';
		}

		/**
		 * Afmb Blocks User Redirect
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function user_redirect() {
			add_option( 'afmb_redirect', true );
		} 

		/**
		 * Afmb Blocks Redirect to Dashboard
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function redirect_to_dashboard() {
			if ( get_option( 'afmb_redirect', false ) && current_user_can( 'manage_options' ) ) {
				delete_option( 'afmb_redirect' ); // Remove the option to prevent repeated redirects.
				wp_safe_redirect( admin_url( 'admin.php?page=afftra-blocks' ) );
				exit;
			}
		} 
	}

}

/**
 * Afmb Blocks
 *
 * @since 1.0.0
 * @return Afmb_Blocks
 */
function afmb_blocks() {
	return Afmb_Blocks::get_instance();
}
afmb_blocks(); // Initialize the Afmb Blocks class.
