<?php

namespace Soft_Accordion;

defined( 'ABSPATH' ) || exit;

/**
 * Elamentor
 */
class Elementor {
	/**
	 * Instance of the class.
	 *
	 * @var self|null
	 */
	protected static $instance = null;

	/**
	 * Initialize the class and register the widget.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {

		// Check if Elementor installed and activated.
		if ( ! did_action( 'elementor/loaded' ) ) {
			return;
		}

		if ( defined( 'ELEMENTOR_VERSION' ) ) {
			if ( version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
				add_action( 'elementor/widgets/register', array( $this, 'register_widgets' ) );
			} else {
				add_action( 'elementor/widgets/widgets_registered', array( $this, 'register_widgets' ) );
			}
		}

		add_action( 'elementor/preview/enqueue_scripts', array( $this, 'preview_scripts' ) );
		add_action( 'elementor/frontend/before_enqueue_scripts', array( $this, 'preview_scripts' ) );
	}

	/**
	 * Enqueue frontend assets for the Elementor preview.
	 *
	 * @since 1.0.0
	 */
	public function preview_scripts() {
		Enqueue::instance()->frontend_assets();
	}


	/**
	 * Register the Soft Accordion widget.
	 *
	 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
	 *
	 * @since 1.0.0
	 */
	public function register_widgets( $widgets_manager ) {

		include_once SOFT_ACCORDION_INCLUDES . '/elementor/class-soft-accordion-widget.php';

		if ( method_exists( $widgets_manager, 'register' ) ) {
			$widgets_manager->register( new Soft_Accordion_Widget() );
		} else {
			$widgets_manager->register_widget_type( new Soft_Accordion_Widget() );
		}
	}

	/**
	 * Get the instance of Elementor class.
	 *
	 * @since 1.0.0
	 * @return Elementor
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}

Elementor::instance();
