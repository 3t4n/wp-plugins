<?php
/**
 * Plugin Name: Ovic Pinmap
 * Plugin URI: https://themeforest.net/user/kutethemes/portfolio
 * Description: The pin image hotspots.
 * Author: Ovic Team
 * Author URI: https://kutethemes.com/contact-us/
 * Version: 1.0.0
 * Text Domain: ovic-pinmap
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Ovic_Pinmap_Builder' ) ) {
	class  Ovic_Pinmap_Builder
	{
		/**
		 * @var Ovic_Pinmap_Builder The one true Ovic_Pinmap_Builder
		 */
		private static $instance;

		public static function instance()
		{
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Ovic_Pinmap_Builder ) ) {
				self::$instance = new Ovic_Pinmap_Builder;
				self::$instance->setup_constants();
				self::$instance->includes();
				add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
				/* Add image size for woocommerce product */
				$size_thumb = apply_filters( 'ovic_pinmap_product_thumbnail', array(
						'width'  => 100,
						'height' => 150,
						'crop'   => true
					)
				);
				add_image_size( 'ovic-pinmap-thumbnail', $size_thumb['width'], $size_thumb['height'], $size_thumb['crop'] );
			}

			return self::$instance;
		}

		public function setup_constants()
		{
			// Plugin version.
			if ( ! defined( 'OVIC_PINMAP_VERSION' ) ) {
				define( 'OVIC_PINMAP_VERSION', '1.0.0' );
			}
			// Plugin Folder Path.
			if ( ! defined( 'OVIC_PINMAP_DIR' ) ) {
				define( 'OVIC_PINMAP_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
			}
			// Plugin Folder URL.
			if ( ! defined( 'OVIC_PINMAP_URL' ) ) {
				define( 'OVIC_PINMAP_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );
			}
		}

		public function includes()
		{
			require_once OVIC_PINMAP_DIR . 'includes/post-type.php';
			require_once OVIC_PINMAP_DIR . 'includes/shortcode.php';
		}

		public function load_textdomain()
		{
			load_plugin_textdomain( 'ovic-pinmap', false, OVIC_PINMAP_DIR . 'languages' );
		}
	}
}
if ( ! function_exists( 'Ovic_Pinmap_Builder' ) ) {
	function Ovic_Pinmap_Builder()
	{
		return Ovic_Pinmap_Builder::instance();
	}
}
Ovic_Pinmap_Builder();