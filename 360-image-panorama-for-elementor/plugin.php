<?php
namespace TWPElementorimagepanorama;

use TWPElementorimagepanorama\Widgets\Image_Panorama;

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
		wp_enqueue_script( 'elementor-three', plugins_url( '/assets/js/three.min.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_enqueue_script( 'elementor-panolens', plugins_url( '/assets/js/panolens.js', __FILE__ ), [ 'jquery' ], false, true );
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
		require __DIR__ . '/widgets/image-panorama.php';
	}

	/**
	 * Register Widget
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function register_widget() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Image_Panorama() );
	}
}

new Plugin();
