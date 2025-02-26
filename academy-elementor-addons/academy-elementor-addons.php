<?php

/**
 * Plugin Name: Academy Elementor Addons
 * Description: Elementor Integration - Design your eLearning website using Academy Elementor Addons.
 * Plugin URI:  https://demo.academylms.net
 * Version:     1.3.3
 * Author:      Academy LMS
 * Author URI:  https://academylms.net
 * Text Domain: academy-elementor-addons
 *
 * Elementor tested up to: 3.15.3
 * Elementor Pro tested up to: 3.15.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


final class AcademyEA {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {
		$this->define_constant();
		$this->load_dependency();
		register_activation_hook( __FILE__, [ $this, 'activate' ] );
		add_action( 'init', array( $this, 'i18n' ) );
		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}

	public function define_constant() {
		define( 'ACADEMYEA_VERSION', '1.3.3' );
		define( 'ACADEMYEA_PLUGIN_SLUG', 'academyea' );
		define( 'ACADEMYEA_PLUGIN_URL', plugins_url( '/', __FILE__ ) );
		define( 'ACADEMYEA_CORE_ROOT_PATH', plugin_dir_path( __FILE__ ) );
		define( 'ACADEMYEA_CORE_ROOT_URI', plugin_dir_url( __FILE__ ) );
		define( 'ACADEMYEA_ASSETS', trailingslashit( ACADEMYEA_CORE_ROOT_URI . 'assets' ) );
	}

	public function load_dependency() {
		require_once ACADEMYEA_CORE_ROOT_PATH . 'includes/autoload.php';
	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function i18n() {
		load_plugin_textdomain(
			'academy-elementor-addons',
			false,
			dirname( plugin_basename( __FILE__ ) ) . '/languages/'
		);
	}

	/**
	 * Initialize the plugin
	 *
	 * Validates that Elementor is already loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed include the plugin class.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function init() {
		$Dependency = new AcademyEA\Dependency();
		$Dependency->dispatch_notice();
		if ( $Dependency->is_missing_dependency ) {
			return;
		}

		// Once we get here, We have passed all validation checks so we can safely include our plugin
		AcademyEA\Plugin::instance();

	}

	public function activate() {
		AcademyEA\Installer::init();
	}
}

// Instantiate AcademyEA.
new AcademyEA();
