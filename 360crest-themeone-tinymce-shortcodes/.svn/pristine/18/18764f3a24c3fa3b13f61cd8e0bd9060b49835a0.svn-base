<?php
/**
 * This file loads the CSS and JS necessary for your shortcodes display
 */

if( !function_exists ('sq_shortcodes_scripts') ) :
	function sq_shortcodes_scripts() {

		$scripts_dir = plugin_dir_url( __FILE__ );

		// Make sure jquery is loaded
		wp_enqueue_script( 'jquery' );

		// Enqueue CSS
		wp_enqueue_style('theme_one_shortcode_styles', plugin_dir_url( __FILE__ ) . 'css/sq-shortcodes.css');		
		wp_enqueue_script('theme_one_shortcode_js', plugin_dir_url( __FILE__ ) . 'mce/js/custom.js');		
	}
	add_action('wp_enqueue_scripts', 'sq_shortcodes_scripts');
endif;