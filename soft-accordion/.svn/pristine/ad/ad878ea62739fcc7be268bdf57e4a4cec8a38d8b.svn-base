<?php

namespace Soft_Accordion;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Hook Class
 */
class Hooks {
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
		add_action( 'wp_head', array( $this, 'print_custom_css' ), 100 );
		add_action( 'admin_head', array( $this, 'print_custom_css' ), 100 );

		add_action( 'wp_footer', array( $this, 'print_footer_scripts' ) );
		add_action( 'admin_footer', array( $this, 'print_footer_scripts' ) );
	}

	/**
	 * Print Custom CSS
	 */
	public function print_custom_css() {
		if ( is_admin() ) {
			$screen = get_current_screen();

			if ( 'toplevel_page_soft-accordion' !== $screen->id ) {
				return;
			}
		}

		$css = soft_accordion_get_setting( 'customCSS' );

		if ( ! empty( $css ) ) {
			echo '<style type="text/css" id="soft-accordion-custom-css">' . $css . '</style>';
		}
	}

	/**
	 * Print Custom JS
	 */
	public function print_footer_scripts() {

		if ( is_admin() ) {
			$screen = get_current_screen();

			if ( 'toplevel_page_soft-accordion' !== $screen->id ) {
				return;
			}
		}

		$js = soft_accordion_get_setting( 'customJS' );

		if ( ! empty( $js ) ) {
			echo '<script type="text/javascript" id="soft-accordion-custom-js">' . $js . '</script>';
		}
	}

	/**
	 * Get the instance of Enqueue class.
	 *
	 * @since 1.0.0
	 * @return Hooks
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}

Hooks::instance();
