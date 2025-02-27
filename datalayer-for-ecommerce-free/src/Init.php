<?php
/**
 * Init Init
 *
 * @version 1.0.1
 * @package 'datalayer-for-ecommerce-free'
 */

namespace DatalayerForWoocommerceFree;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Init' ) ) :
	/**
	 * Class Init
	 */
	final class Init {

		/**
		 * Const PLUGIN_PATH
		 *
		 * @const PLUGIN_PATH
		 */
		const PLUGIN_PATH = __FILE__;

		/**
		 * Instance of this class.
		 *
		 * @var $instance
		 */
		protected static $instance = null;

		/**
		 * Return an instance of this class.
		 *
		 * @return self::$instance
		 */
		public static function instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Init constructor.
		 */
		private function __construct() {
			$this->register_hooks();
			$this->register_admin_classes();
			$this->register_public_classes();
		}

		/**
		 * Register_hooks function.
		 */
		public function register_hooks() {
			add_action( 'init', array( $this, 'load_plugin_textdomain' ) );
			add_action( 'before_woocommerce_init', array( $this, 'declare_compatibility_hpos') );
		}

		/**
		 * Load_plugin_textdomain function
		 */
		public function load_plugin_textdomain() {
			load_plugin_textdomain( 'datalayer-for-ecommerce-free', false, 'datalayer-for-ecommerce-free/languages/');
		}

		/**
		 * Register_admin_classes function.
		 */
		private function register_admin_classes() {

		}

		/**
		 * Register_public_classes function.
		 */
		private function register_public_classes() {
			if ( class_exists( 'DatalayerForWoocommerceFree\RegisterTagManager' ) ) :
				RegisterTagManager::instance();
			endif;
			if ( class_exists( 'DatalayerForWoocommerceFree\RenderDataLayerPro' ) ) :
				RenderDataLayerPro::instance();
			endif;
			if ( class_exists( 'DatalayerForWoocommerceFree\AdminPageReact' ) ) :
				AdminPageReact::instance();
			endif;
		}

		/**
		 * Declare_compatibility_hpos
		 */
		public function declare_compatibility_hpos() {
			if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
				\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', 'datalayer-for-ecommerce-free/datalayer-for-ecommerce-free.php', true );
				\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'cart_checkout_blocks', 'datalayer-for-ecommerce-free/datalayer-for-ecommerce-free.php', true );
			}
		}
	}
endif;
