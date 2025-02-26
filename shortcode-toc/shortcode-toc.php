<?php
/*
Plugin Name: Shortcode Table of Contents
Plugin URI: http://jckemp.com
Description: Display an automated table of contents via shortcode.
Version: 1.0.3
Author: James Kemp
Author URI: https://jckemp.com
Text Domain: shortcode-toc
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class JCK_Shortcode_TOC {
	/**
	 * Version
	 *
	 * @var string
	 */
	public $version = "1.0.3";

	/**
	 * Full name
	 *
	 * @var string
	 */
	public $name = 'Shortcode TOC';

	/**
	 * Variable to hold settings framework instance
	 *
	 * @var object
	 */
	public $settings_framework = null;

	/**
	 * Class prefix
	 *
	 * @since  4.5.0
	 * @access protected
	 * @var string $class_prefix
	 */
	protected $class_prefix = "JCK_STOC_";

	/**
	 * Construct
	 */
	function __construct() {
		$this->define_constants();
		$this->load_classes();
	}

	/**
	 * Define Constants.
	 */
	private function define_constants() {
		$this->define( 'JCK_STOC_PATH', plugin_dir_path( __FILE__ ) );
		$this->define( 'JCK_STOC_URL', plugin_dir_url( __FILE__ ) );
		$this->define( 'JCK_STOC_INC_PATH', JCK_STOC_PATH . 'inc/' );
		$this->define( 'JCK_STOC_ASSETS_URL', JCK_STOC_URL . 'assets/' );
		$this->define( 'JCK_STOC_BASENAME', plugin_basename( __FILE__ ) );
		$this->define( 'JCK_STOC_VERSION', $this->version );
	}

	/**
	 * Define constant if not already set.
	 *
	 * @param string      $name
	 * @param string|bool $value
	 */
	private function define( $name, $value ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}

	/**
	 * Load classes
	 */
	private function load_classes() {
		spl_autoload_register( array( $this, 'autoload' ) );

		JCK_STOC_Assets::run();
		JCK_STOC_Shortcodes::run();
	}

	/**
	 * Autoloader
	 *
	 * Classes should reside within /inc and follow the format of
	 * Iconic_The_Name ~ class-the-name.php or {{class-prefix}}The_Name ~ class-the-name.php
	 */
	private function autoload( $class_name ) {
		/**
		 * If the class being requested does not start with our prefix,
		 * we know it's not one in our project
		 */
		if ( 0 !== strpos( $class_name, 'JCK_' ) && 0 !== strpos( $class_name, $this->class_prefix ) ) {
			return;
		}

		$file_name = strtolower( str_replace(
			array( $this->class_prefix, 'JCK_', '_' ),      // Prefix | Plugin Prefix | Underscores
			array( '', '', '-' ),                           // Remove | Remove | Replace with hyphens
			$class_name
		) );

		// Compile our path from the current location
		$file = dirname( __FILE__ ) . '/inc/class-' . $file_name . '.php';

		// If a file is found
		if ( file_exists( $file ) ) {
			// Then load it up!
			require( $file );
		}
	}
}

$shortcode_toc_class = new JCK_Shortcode_TOC();