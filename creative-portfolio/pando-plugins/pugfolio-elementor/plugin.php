<?php
namespace PandoExtra;

use PandoExtra\Widgets\Pando_Pugfolio;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Main Plugin Class
 *
 * Register new elementor widget.
 *
 * @since 1.0.0
 */
class ElementorPugfolio {

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
			//wp_register_script( 'hello-world', plugins_url( '/assets/js/hello-world.js', ELEMENTOR_Pando_Slideshow__FILE__ ), [ 'jquery' ], false, true );
			wp_enqueue_script( 'imagesloaded', plugin_dir_url( __FILE__ ) . '../easy-portfolio/js/vendor/imagesloaded.pkgd.min.js', array('jquery'), '20151215', true );
			wp_enqueue_script( 'isotope', plugin_dir_url( __FILE__ ) . '../easy-portfolio/js/vendor/isotope/js/isotope.pkgd.min.js', array('jquery'), '20151215', true );
				
			//Image Lightbox
			wp_enqueue_script( 'simple-lightbox-js', plugin_dir_url( __FILE__ ) .  '../easy-portfolio/js/vendor/simplelightbox/dist/simple-lightbox.min.js', array('jquery'), '20151218', true );
			wp_enqueue_style( 'simple-lightbox-css', plugin_dir_url( __FILE__ ) .  '../easy-portfolio/js/vendor/simplelightbox/dist/simplelightbox.min.css' );

			wp_enqueue_script( 'pgflio-portfolio-elementor-js', plugin_dir_url( __FILE__ ) . '../easy-portfolio/js/custom-portfolio-elementor.js', array('jquery'), '20151215', true );				
		
			//Custom CSS
			wp_enqueue_style( 'pgflio-portfolio-css', plugin_dir_url( __FILE__ ) .  '../easy-portfolio/css/pgflio_portfolio_css.css' );
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
		require __DIR__ . '/widgets/pugfolio.php';
	}

	/**
	 * Register Widget
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function register_widget() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Pando_Pugfolio() );
	}
}

new ElementorPugfolio();