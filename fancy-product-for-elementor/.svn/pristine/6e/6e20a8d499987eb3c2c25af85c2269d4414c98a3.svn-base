<?php
namespace FancyProductForElementor;

use FancyProductForElementor\Widgets\Fancy_Product_For_Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Main Plugin Class
 *
 * Register new elementor widget.
 *
 * @since 1.0.0
 */
class Plugin {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		$this->add_actions();
	}

	/**
	 * Add Actions
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function add_actions() {
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );
		add_action( 'elementor/frontend/after_register_scripts', function() {
			wp_register_script( 'fancy-product-for-elementor', plugins_url( '/assets/build/scripts/bundle.js', fancy_product_for_elementor__FILE__ ), [ 'jquery' ], false, true );
			wp_register_script( 'snapsvg', plugins_url( '/assets/js/snap.svg-min.js', fancy_product_for_elementor__FILE__ ), [ 'jquery' ], false, true );
			wp_enqueue_script('jquery-masonry');
		} );

		add_action( 'elementor/frontend/after_enqueue_styles', function() {
			wp_enqueue_style('fancy-product-for-elementor-css',   plugin_dir_url(__FILE__). '/assets/build/styles/fancy-product-for-elementor.css');
		} );

	}

	/**
	 * On Widgets Registered
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function on_widgets_registered() {
		$this->includes();
		$this->register_widget();
	}

	/**
	 * Includes
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function includes() {
		require __DIR__ . '/widgets/fancy-product-for-elementor.php';
	}

	/**
	 * Register Widget
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function register_widget() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Fancy_Product_For_Elementor() );
	}
}

new Plugin();
