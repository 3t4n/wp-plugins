<?php
/**
 * Plugin Name: Scroll Up Sticky Header for Total
 * Plugin URI:  https://wordpress.org/plugins/scroll-up-sticky-header-for-total/
 * Description: Displays the theme's sticky header only when scrolling up so it will be hidden as you scroll down.
 * Author: WPExplorer
 * Author URI: https://www.wpexplorer.com/
 * Version: 1.3
 *
 * Text Domain: scroll-up-sticky-header-for-total
 * Domain Path: /languages/
 *
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Scroll_Up_Sticky_Header_For_Total' ) ) {

	final class Scroll_Up_Sticky_Header_For_Total {

		/**
		 * Class version.
		 */
		public $version = '1.3';

		/**
		 * Our single Scroll_Up_Sticky_Header_For_Total instance.
		 *
		 * @var Scroll_Up_Sticky_Header_For_Total
		 */
		private static $instance;

		/**
		 * Disable the cloning of this class.
		 *
		 * @return void
		 */
		final public function __clone() {
			throw new Exception( 'You\'re doing things wrong.' );
		}

		/**
		 * Disable the wakeup of this class.
		 *
		 * @return void
		 */
		final public function __wakeup() {
			throw new Exception( 'You\'re doing things wrong.' );
		}

		/**
		 * Create or retrieve the instance of Scroll_Up_Sticky_Header_For_Total.
		 *
		 * @return Scroll_Up_Sticky_Header_For_Total
		 */
		public static function instance() {
			if ( is_null( static::$instance ) ) {
				static::$instance = new self();
			}

			return static::$instance;
		}

		/**
		 * Disable instantiation.
		 */
		private function __construct() {
			$this->init_hooks();
		}

		/**
		 * Hook into actions and filters.
		 */
		public function init_hooks() {
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 100 );
		}

		/**
		 * Enqueue scripts.
		 */
		public function enqueue_scripts() {
			if ( ! function_exists( 'totaltheme_call_static' ) || ! totaltheme_call_static( 'Header\Sticky', 'is_enabled' ) ) {
				return;
			}

			$dir_url = trailingslashit( plugin_dir_url( __FILE__ ) );

			wp_enqueue_script(
				'scroll-up-sticky-header-for-total',
				$dir_url . 'assets/scroll-up-sticky-header-for-total.min.js',
				[],
				$this->version,
				[
					'in_footer' => false,
					'strategy' => 'defer',
				]
			);

			wp_enqueue_style(
				'scroll-up-sticky-header-for-total',
				$dir_url . 'assets/scroll-up-sticky-header-for-total.css',
				[],
				$this->version
			);

		}
	}

	Scroll_Up_Sticky_Header_For_Total::instance();

}