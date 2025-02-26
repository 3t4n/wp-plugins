<?php
/*
Plugin Name: RA Widgets Bundle
Plugin URI: https://github.com/webdevsuperfast/ra-widgets-bundle
Description: A collection of widgets for WordPress built using the SiteOrigin Widgets API.
Version: 	1.0.3
Author: 	Rotsen Mark Acob
Author URI: https://rotsenacob.com
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: ra-widgets-bundle
Domain Path: /languages
*/

defined( 'ABSPATH' ) or die( esc_html_e( 'With great power comes great responsibility.', 'ra-widgets-bundle' ) );

class RAWB_Widgets_Bundle {
	public function __construct() {
		// Enqueue Scripts
		add_action( 'wp_enqueue_scripts', array( $this, 'rawb_enqueue_scripts' ) );

		// Add widgets folder to SiteOrigin Widgets
		add_filter( 'siteorigin_widgets_widget_folders', array( $this, 'rawb_widget_folders' ) );

		//* Require if mr_image_resize function doesn't exist
		if ( !function_exists( 'rawb_image_resize' ) ) {
			require_once( plugin_dir_path( __FILE__ ) . 'lib/classes/rawb-image-resize.php' );
		}

		//* Require if mr_image_resize function exists
		if ( function_exists( 'rawb_image_resize' ) ) {
			require_once( plugin_dir_path( __FILE__ ) . 'lib/misc.php' );
		}
	}

	public function rawb_enqueue_scripts() {
		if ( ! is_admin() ) {
			// Widget CSS
			wp_register_style( 'rawb-css', plugin_dir_url( __FILE__ ) . 'public/css/widget.css' );
			wp_enqueue_style( 'rawb-css' );

			// Owl Carousel JS
			wp_register_script( 'rawb-owl-carousel-js', plugin_dir_url( __FILE__ ) . 'public/js/owl.carousel.min.js', array( 'jquery' ), null, true );

			// Widget JS
			wp_register_script( 'rawb-widgets-js', plugin_dir_url( __FILE__ ) . 'public/js/widget.min.js', array( 'jquery' ), null, true );
		}
	}

	public function rawb_widget_folders( $folders ) {
		$folders[] = plugin_dir_path( __FILE__ ) . 'widgets/';

		return $folders;
	}
}

new RAWB_Widgets_Bundle();
