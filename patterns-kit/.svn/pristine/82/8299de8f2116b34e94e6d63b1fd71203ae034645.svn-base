<?php
/*
Plugin Name: Patterns Kit
Plugin URI: https://wordpress.org/plugins/patterns-kit/
Description: More advanced custom patterns for the Gutenberg / Full Site Editing themes developed by Sparkle Theme.
Version: 1.0.3
Author: sparklewpthemes
Author URI: https://sparklewpthemes.com
License: GPL3
License URI: http://www.gnu.org/licenses/gpl.html
Text Domain: patterns-kit
Tested up to: 6.2
Requires PHP: 5.6
*/

// Block direct access to the main plugin file.
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class PATTERNS_KIT{

	function __construct(){
		define ( 'PATTERNS_KIT_PLUGIN_URL', plugin_dir_url( __FILE__ ));
		
		add_action( 'init', array( $this, 'patterns_kit_register_block_patterns' ), 9 );
		add_action( 'enqueue_block_editor_assets', array( $this, 'patterns_kit_editor_enqueue_assets' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'patterns_kit_front_scripts' ) );

		include( plugin_dir_path(__FILE__). "/inc/register-patterns.php");
	}

	/**
	 * Registers block patterns and categories.
	 *
	 * @since Patterns Kit 1.0
	 *
	 * @return void
	 */
	function patterns_kit_register_block_patterns() {

		$patterns = array();

		$block_pattern_categories = array(
			'patterns-kit' => array( 'label' => __( 'PK Patterns', 'patterns-kit' ) ),
			'patterns-kit-header' => array( 'label' => __( 'PK Header', 'patterns-kit' ) ),
			'patterns-kit-footer' => array( 'label' => __( 'PK Footer', 'patterns-kit' ) ),
			'patterns-kit-about-section' => array( 'label' => __( 'PK About Section', 'patterns-kit' ) ),
			'patterns-kit-hero' => array( 'label' => __( 'PK Hero Section', 'patterns-kit' ) ),
			'patterns-kit-accordion' => array( 'label' => __( 'PK Accordion', 'patterns-kit' ) ),
			'patterns-kit-cta' => array( 'label' => __( 'PK Call To Action', 'patterns-kit' ) ),
			'patterns-kit-video-cta' => array( 'label' => __( 'PK Video Call To Action', 'patterns-kit' ) ),
			'patterns-kit-contact' => array( 'label' => __( 'PK Contact', 'patterns-kit' ) ),
			'patterns-kit-service' => array( 'label' => __( 'PK Service', 'patterns-kit' ) ),
			'patterns-kit-blog' => array( 'label' => __( 'PK Blog', 'patterns-kit' ) ),
			'patterns-kit-gallery' => array( 'label' => __( 'PK Gallery', 'patterns-kit' ) ),
			'patterns-kit-pricing' => array( 'label' => __( 'PK Pricing', 'patterns-kit' ) ),
			'patterns-kit-team' => array( 'label' => __( 'PK Team', 'patterns-kit' ) ),
			'patterns-kit-testimonial' => array( 'label' => __( 'PK Testimonials', 'patterns-kit' ) ),
			'patterns-kit-page' => array( 'label' => __( 'PK Pages', 'patterns-kit' ) ),
			'patterns-kit-progress' => array( 'label' => __( 'PK Porgress Bar', 'patterns-kit' ) ),
			'patterns-kit-counter' => array( 'label' => __( 'PK Counter', 'patterns-kit' ) ),
			'patterns-kit-client-section' => array( 'label' => __( 'PK Client-Section', 'patterns-kit' ) ),
			'patterns-kit-header' => array( 'label' => __( 'PK Header', 'patterns-kit' ) ),
			'patterns-kit-sidebar' => array( 'label' => __( 'PK Sidebar', 'patterns-kit' ) ),
		);


		/**
		 * Filters the theme block pattern categories.
		 *
		 * @since Sprkle Patterns 1.0
		 *
		 * @param array[] $block_pattern_categories {
		 *     An associative array of block pattern categories, keyed by category name.
		 *
		 *     @type array[] $properties {
		 *         An array of block category properties.
		 *
		 *         @type string $label A human-readable label for the pattern category.
		 *     }
		 * }
		 */
		$block_pattern_categories = apply_filters( 'patterns_kit_block_pattern_categories', $block_pattern_categories );

		foreach ( $block_pattern_categories as $name => $properties ) {
			if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
				register_block_pattern_category( $name, $properties );
			}
		}
	}
	
	/**
	 * Register style and scripts
	 * @since Patterns Kit 1.0
	 *
	 * @return void
	 */
	function patterns_kit_editor_enqueue_assets(){

		wp_enqueue_script( "patterns-kit-scripts", plugin_dir_url( __FILE__ ) . '/assets/js/admin.js', '', '', true);
		wp_enqueue_style( "patterns-kit-style", plugin_dir_url( __FILE__ ) . '/assets/css/admin.css');
		wp_enqueue_style( "patterns-kit-front-style", plugin_dir_url( __FILE__ ) . '/assets/css/front.css');
	}

	/**
	 * Register frontend style and scripts
	 */
	function patterns_kit_front_scripts($hook) {
		wp_enqueue_script( "patterns-kit-scripts", plugin_dir_url( __FILE__ ) . '/assets/js/front.js', array('jquery'), null, true);
		wp_enqueue_style( "patterns-kit-style", plugin_dir_url( __FILE__ ) . '/assets/css/front.css');
	}

}
new PATTERNS_KIT();