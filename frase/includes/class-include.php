<?php // phpcs:ignore Class file names should be based on the class name with "class-" prepended.
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The common bothend functionality of the plugin.
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://github.com/codersantosh
 * @since      1.0.0
 *
 * @package    Frase
 * @subpackage Frase/includes
 */

/**
 * The common bothend functionality of the plugin.
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @since      1.0.0
 * @package    Frase
 * @subpackage Frase/includes
 * @author     codersantosh <codersantosh@gmail.com>
 */
class Frase_Include {

	/**
	 * Static property to store Options Settings
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array    settings All settings for this plugin.
	 */
	private static $settings = null;

	/**
	 * Static property to store white label settings
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array    settings All settings for this plugin.
	 */
	private static $white_label = null;

	/**
	 * Gets an instance of this object.
	 * Prevents duplicate instances which avoid artefacts and improves performance.
	 *
	 * @static
	 * @access public
	 * @return object
	 * @since 1.0.0
	 */
	public static function get_instance() {
		// Store the instance locally to avoid private static replication.
		static $instance = null;

		// Only run these methods if they haven't been ran previously.
		if ( null === $instance ) {
			/* Query only once */
			self::$settings    = frase_plugin_get_options();
			self::$white_label = frase_plugin_get_white_label();

			$instance = new self();
		}

		// Always return the instance.
		return $instance;
	}

	/**
	 * Get the settings from the class instance.
	 *
	 * @access public
	 * @return array|null
	 */
	public function get_settings() {
		return self::$settings;
	}

	/**
	 * Get options related to white label.
	 *
	 * @access public
	 * @return array|null
	 */
	public function get_white_label() {
		return self::$white_label;
	}

	/**
	 * Register scripts and styles
	 *
	 * @since    1.0.0
	 * @access   public
	 * @return void
	 */
	public function register_scripts_and_styles() {
		/* Atomic css */
		wp_register_style( 'atomic', FRASE_PLUGIN_URL . 'assets/library/atomic-css/atomic.min.css', array(), FRASE_PLUGIN_VERSION );
	}
}

if ( ! function_exists( 'frase_plugin_include' ) ) {
	/**
	 * Return instance of  Frase_Include class
	 *
	 * @since 1.0.0
	 *
	 * @return Frase_Include
	 */
	function frase_plugin_include() {//phpcs:ignore
		return Frase_Include::get_instance();
	}
}
