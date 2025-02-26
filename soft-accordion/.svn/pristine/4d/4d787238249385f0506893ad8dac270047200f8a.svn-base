<?php

namespace Soft_Accordion;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Admin Class
 */
class Admin {

	/**
	 * Instance of the class.
	 *
	 * @var self|null
	 */
	protected static $instance = null;

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_menu' ) );
		add_action( 'admin_init', array( $this, 'init_update' ) );
	}

	/**
	 * Init update
	 */
	public function init_update() {
	}

	/**
	 * Add admin menu
	 *
	 * @since 1.0.0
	 */
	public function add_menu() {
		$slug       = 'soft-accordion';
		$capability = 'manage_options';

		add_menu_page(
			__( 'Soft Accordion', 'soft-accordion' ),
			__( 'Soft Accordion', 'soft-accordion' ),
			$capability,
			$slug,
			array( $this, 'render_soft_accordion_page' ),
			SOFT_ACCORDION_ASSETS . '/images/soft-accordion.svg',
			50
		);

		// All Accordion page
		add_submenu_page(
			$slug,
			__( 'All Accordions', 'soft-accordion' ),
			__( 'All Accordions', 'soft-accordion' ),
			$capability,
			'soft-accordion'
		);

		// Getting started page
		add_submenu_page(
			$slug,
			__( 'Getting Started - Soft Accordion', 'soft-accordion' ),
			__( 'Getting Started', 'soft-accordion' ),
			$capability,
			'soft-accordion-getting-started',
			array( $this, 'render_getting_started_page' )
		);

		// Setting
		add_submenu_page(
			$slug,
			__( 'Settings - Soft Accordion', 'soft-accordion' ),
			__( 'Settings', 'soft-accordion' ),
			$capability,
			'soft-accordion-settings',
			array( $this, 'render_accordion_setting_page' )
		);

		// Recommended plugins page
		if ( empty( get_option( 'soft_accordion_hide_recommended_plugins' ) ) ) {
			add_submenu_page(
				$slug,
				esc_html__( 'Recommended Plugins', 'soft-accordion' ),
				esc_html__( 'Recommended Plugins', 'soft-accordion' ),
				'manage_options',
				'soft-accordion-recommended-plugins',
				array( $this, 'render_recommended_plugins_page' )
			);
		}
	}

	/**
	 * Render Accordion Page
	 */
	public function render_soft_accordion_page() {
		echo "<div class='soft-accordion-app' id='soft-accordion-app'></div>";
	}

	/**
	 * Get started page callback
	 *
	 * @since 1.0.0
	 */
	public function render_getting_started_page() {
		include SOFT_ACCORDION_INCLUDES . '/views/getting-started/index.php';
	}

	/**
	 * Setting page callback
	 *
	 * @since 1.0.0
	 */
	public function render_accordion_setting_page() {
		echo "<div class='soft-accordion-settings' id='soft-accordion-settings'></div>";
	}

	/**
	 * Recommended Plugin Callback
	 */
	public function render_recommended_plugins_page() {
		include SOFT_ACCORDION_INCLUDES . '/views/recommended-plugins.php';
	}

	/**
	 * Get the instance of Enqueue class.
	 *
	 * @since 1.0.0
	 * @return Enqueue
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}

Admin::instance();
