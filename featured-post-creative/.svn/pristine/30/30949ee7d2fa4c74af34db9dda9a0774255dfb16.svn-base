<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package WP Featured Post
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Wpfp_Script {

	function __construct() {

		// Action to add script at admin side
		add_action( 'admin_enqueue_scripts', array( $this, 'wpfp_admin_script' ));

		// Action to add style at front side
		add_action( 'wp_enqueue_scripts', array( $this, 'wpfp_front_style' ));

		// Action to add custom css in head
		add_action( 'wp_head', array( $this, 'wpfp_custom_css' ), 20);
	}

	/**
	 * Function to add script at admin side
	 * 
	 * @since 1.1.7
	 */
	function wpfp_admin_script( $hook ) {

		global $wp_version, $post_type;

		$new_ui = $wp_version >= '3.5' ? '1' : '0'; // Check wordpress version for older scripts

		// Pages array
		$pages_array = array( WPFP_POST_TYPE, 'toplevel_page_wpfp-about', 'featured-post_page_wpfp-setting' );

		// Registring admin script
		wp_register_script( 'wpfp-admin-js', WPFP_URL.'assets/js/wpfp-admin.js', array('jquery'), WPFP_VERSION, true );
		wp_localize_script( 'wpfp-admin-js', 'Wpfp_Admin', array(
													'code_editor'			=> ( version_compare( $wp_version, '4.9' ) >= 0 ) ? 1 : 0,
													'syntax_highlighting'	=> ( 'false' === wp_get_current_user()->syntax_highlighting ) ? 0 : 1,
								));

		// Settings Page
		if( version_compare( $wp_version, '4.9' ) >= 0 && $hook == 'featured-post_page_wpfp-setting' ) {
			// WP CSS Code Editor
			wp_enqueue_code_editor( array(
				'type'			=> 'text/css',
				'codemirror'	=> array(
									'indentUnit'	=> 2,
									'tabSize'		=> 2,
									'lint'			=> false,
								),
			) );
		}

		// If page is plugin setting page then enqueue script
		if( in_array( $post_type, $pages_array ) || in_array( $hook, $pages_array ) ) {
			wp_enqueue_script( 'wpfp-admin-js' );
		}
	}

	/**
	 * Function to add style at front side
	 * 
	 * @since 1.0.0
	 */
	function wpfp_front_style() {

		// Registring and enqueing public css
		wp_register_style( 'wpfp-public-style', WPFP_URL.'assets/css/wpfp-public.css', array(), WPFP_VERSION );
		wp_enqueue_style( 'wpfp-public-style' );

	}

	/**
	 * Add custom css to head
	 * 
	 * @since 1.0.0
	 */
	function wpfp_custom_css() {

		$custom_css = wpfp_get_option('custom_css');

		if( ! empty( $custom_css ) ) {
			echo '<style type="text/css">' . "\n" .
				wp_strip_all_tags( $custom_css )
			. "\n" . '</style>' . "\n";
		}
	}

}

$wpfp_script = new Wpfp_Script();