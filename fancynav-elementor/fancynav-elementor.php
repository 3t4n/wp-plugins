<?php
/**
 * Plugin Name: FancyNav - Elementor
 * Description: Mobile Navigation Widget for Elementor
 * Plugin URI:  https://coffee-office.at/mobile-navigation-for-elementor/
 * Version:     1.1.0
 * Author:      Johann Kratzik
 * Author URI:  https://coffee-office.at/
 */

if ( ! defined( 'ABSPATH' ) )
    exit;

/**
 * Main Elementor Widget Class
 *
 * The init class that runs the plugin.
 * Intended To make sure that the plugin's minimum requirements are met.
 *
 */
final class Elementor_FancyNav {

	/** Plugin Version */
	const VERSION = '1.1.0';

    /** Minimum required Elementor Version */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

    /** Minimum required PHP Version */
	const MINIMUM_PHP_VERSION = '7.0';

    /** Constructor Class */
	public function __construct() {

		// Load translation
		add_action( 'init', array( $this, 'i18n' ) );

		// Init Plugin
		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}

    /** Load Textdomain */
	public function i18n() {
        load_plugin_textdomain( 'elem-fancynav', false, basename( dirname( __FILE__ ) ) . '/languages' );
	}

	/**
	 * Initialize the plugin
	 *
	 * Validates that Elementor is already loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed include the plugin class.
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_missing_main_plugin' ) );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_elementor_version' ) );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_php_version' ) );
			return;
		}

		// Once we get here, We have passed all validation checks so we can safely include our plugin
		require_once( 'plugin.php' );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 */
	public function admin_notice_missing_main_plugin() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'elem-fancynav' ),
			'<strong>' . esc_html__( 'FancyNav', 'elem-fancynav' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'elem-fancynav' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 */
	public function admin_notice_minimum_elementor_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'elem-fancynav' ),
			'<strong>' . esc_html__( 'FancyNav', 'elem-fancynav' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'elem-fancynav' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 */
	public function admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'elem-fancynav' ),
			'<strong>' . esc_html__( 'FancyNav', 'elem-fancynav' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'elem-fancynav' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
}

// Instantiate Elementor_FancyNav.
new Elementor_FancyNav();
?>