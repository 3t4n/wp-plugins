<?php
/**
 * Plugin Name: Addon Package for Elementor
 * Description: Addon Package for Elementor. Includes FlexSlider (Carousel, Basic) + WooCommerce Slider (Products & Categories)
 * Plugin URI:  https://wordpress.org/plugins/addon-package-for-elementor
 * Version:     1.0.2
 * Author:      Michael Leithold
 * Author URI:  https://mlfactory.de
 * Text Domain: addon-package-for-elementor
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) exit;


final class Apfetd_Load {


	const VERSION = '1.2.0';

	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	const MINIMUM_PHP_VERSION = '7.0';


	public function __construct() {

		add_action( 'init', array( $this, 'i18n' ) );

		add_action( 'plugins_loaded', array( $this, 'init' ) );
		
		add_action( 'plugins_loaded', array( $this, 'textdomain' ));
		
	}
	
	public function textdomain(){

		$loadfiles = load_plugin_textdomain('addon-package-for-elementor', false, 
		dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
		plugin_basename(( __FILE__ ). '/languages/' );

	}		
	

	public function i18n() {
		load_plugin_textdomain( 'addon-package-for-elementor' );
	}


	public function init() {

		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_missing_main_plugin' ) );
			return;
		}

		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_elementor_version' ) );
			return;
		}

		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_php_version' ) );
			return;
		}

		require_once( 'plugin.php' );
	}


	public function admin_notice_missing_main_plugin() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'addon-package-for-elementor' ),
			'<strong>' . esc_html__( 'Elementor Addon Package for Elementor', 'addon-package-for-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'apfetd' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}


	public function admin_notice_minimum_elementor_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'apfetd' ),
			'<strong>' . esc_html__( 'Elementor Addon Package for Elementor', 'apfetd' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'apfetd' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}


	public function admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'apfetd' ),
			'<strong>' . esc_html__( 'Elementor Addon Package for Elementor', 'apfetd' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'apfetd' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
}

new Apfetd_Load();
