<?php
/*
Plugin Name: Janeman Core
Plugin URI: https://annurtheme.com/plugins/janemancore
Description: A simple and nice janeman theme core plugin for elementor Widget. It's help you to add section drag and drop. You can change section style using this widget.
Version: 1.0.3
Author: annurtheme
Author URI: https://annurtheme.com
License: GPLv2 or later
Text Domain: janemancore
Domain Path: /languages/
*/

use \Elementor\Plugin as Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	die( __( "Direct Access is not allowed", 'janemancore' ) );
}

// Plugin URL
define( 'JANEMANCORE_PLUGIN_URL', plugins_url( '/', __FILE__ ) );

// Plugin PATH
define( 'JANEMANCORE_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'JANEMANCORE_PLUGIN_ASTS', JANEMANCORE_PLUGIN_URL . 'assets' );
define( 'JANEMANCORE_PLUGIN_IMGS', JANEMANCORE_PLUGIN_ASTS . '/img' );
define( 'JANEMANCORE_PLUGIN_INC', JANEMANCORE_PLUGIN_PATH . 'include' );

// Extra functions
require_once( JANEMANCORE_PLUGIN_INC . '/theme-functions.php' );

final class JanemancoreExtension {

	const VERSION = "1.0.0";
	const MINIMUM_ELEMENTOR_VERSION = "2.0.0";
	const MINIMUM_PHP_VERSION = "7.4";

	private static $_instance = null;

	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;

	}

	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}

	public function init() {
		load_plugin_textdomain( 'janemancore' );

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );

			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );

			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );

			return;
		}

		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );

		add_action( "elementor/elements/categories_registered", [ $this, 'register_new_category' ] );

		add_action( "elementor/frontend/after_enqueue_styles", [ $this, 'janemancore_assets_styles' ] );
		add_action( "elementor/frontend/after_enqueue_scripts", [ $this, 'janemancore_assets_scripts' ] );
		add_action( "admin_enqueue_scripts", [ $this, 'janemancore_admin_scripts_styles' ] );


	}

	function janemancore_assets_scripts(){
		wp_enqueue_script("slick-slider",plugins_url("/assets/js/slick-slider.js",__FILE__),array('jquery'),'1.0',false);
		wp_enqueue_script("helper-js",plugins_url("/assets/js/scripts.js",__FILE__),array('jquery'),time(),true);
	}


	function janemancore_assets_styles() {
		wp_enqueue_style("themify-icons",plugins_url("/assets/css/themify-icons.css",__FILE__));
		wp_enqueue_style("slick-slide",plugins_url("/assets/css/slick.css",__FILE__));
		wp_enqueue_style("slick-theme",plugins_url("/assets/css/slick-theme.css",__FILE__));
		wp_enqueue_style("style-css",plugins_url("/assets/css/style.css",__FILE__));
	}

	/**
	 * Enqueue Files for BackEnd
	 */
  function janemancore_admin_scripts_styles() {
  	wp_enqueue_style("admin-style",plugins_url("/assets/css/admin-styles.css",__FILE__));
  }
  
	public function register_new_category( $manager ) {
		$manager->add_category( 'annurtheme-category', [
			'title' => esc_html__( 'Janemanpro Theme : By annurthemes', 'janemancore' ),
			'icon'  => 'fa fa-chart'
		] );
	}

	public function init_widgets() {
		require_once( __DIR__ . '/widgets/janeman-slider.php' );
		require_once( __DIR__ . '/widgets/janeman-couple.php' );
		require_once( __DIR__ . '/widgets/janeman-thanks.php' );
	}


	public function admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
		/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'janemancore' ),
			'<strong>' . esc_html__( 'Elementor Chart Extension', 'janemancore' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'janemancore' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function admin_notice_minimum_elementor_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
		/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'janemancore' ),
			'<strong>' . esc_html__( 'Elementor Chart Extension', 'janemancore' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'janemancore' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function admin_notice_missing_main_plugin() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
		/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'janemancore' ),
			'<strong>' . esc_html__( 'Elementor Chart Extension', 'janemancore' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'janemancore' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );


	}

	public function includes() {
	}

}

JanemancoreExtension::instance();
