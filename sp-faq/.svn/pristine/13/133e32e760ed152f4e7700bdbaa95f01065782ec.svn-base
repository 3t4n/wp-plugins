<?php
/**
 * Script Class
 * Handles the script and style functionality of plugin
 *
 * @package WP FAQ
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Wp_Faq_Script {

	function __construct() {

		// Action to add style in backend
		add_action( 'admin_enqueue_scripts', array( $this, 'wp_faq_admin_style_script' ) );

		// Action to add style at front side
		add_action( 'wp_enqueue_scripts', array( $this, 'wp_faq_front_style_script' ) );
	}

	/**
	 * Function to register admin scripts and styles
	 * 
	 * @since 1.3
	 */
	function wp_faq_register_admin_assets() {

		/* Styles */
		// Registring Admin Style
		wp_register_style( 'wp-faq-admin-style', WP_FAQ_URL.'assets/css/wp-faq-admin.css', array(), WP_FAQ_VERSION );

		/* Scripts */
		// Registring Admin script
		wp_register_script( 'wp-faq-admin-script', WP_FAQ_URL.'assets/js/wp-faq-admin.js', array('jquery'), WP_FAQ_VERSION, true );
	}

	/**
	 * Enqueue admin styles
	 * 
	 * @since 1.2.1
	 */
	function wp_faq_admin_style_script( $hook ) {

		global $typenow;

		$this->wp_faq_register_admin_assets();

		// Taking pages array
		$pages_arr = array( WP_FAQ_POST_TYPE );

		if( in_array( $typenow, $pages_arr ) ) {
			wp_enqueue_style( 'wp-faq-admin-style' );
		}

		// If page is plugin setting page then enqueue script
		if( $hook == WP_FAQ_POST_TYPE.'_page_wp-faq-designs' || $hook == WP_FAQ_POST_TYPE.'_page_sp-faq-solutions-features' ) {

			// Enqueue admin Script
			wp_enqueue_script( 'wp-faq-admin-script' );
		}
	}

	/**
	 * Function to add style at front side
	 * 
	 * @since 1.0.0
	 */
	function wp_faq_front_style_script() {

		global $post;

		/* Styles */
		// Registring public style
		wp_register_style( 'wp-faq-public-style', WP_FAQ_URL."assets/css/wp-faq-public.css", array(), WP_FAQ_VERSION );
		wp_enqueue_style('wp-faq-public-style');


		/* Scripts */
		// Register Elementor script
		wp_register_script( 'wp-faq-elementor-script', WP_FAQ_URL.'assets/js/elementor/wp-faq-elementor.js', array('jquery'), WP_FAQ_VERSION, true );

		// Registring public script
		wp_register_script( 'wp-faq-public-script', WP_FAQ_URL."assets/js/wp-faq-public.js", array('jquery'), WP_FAQ_VERSION, true );

		// Enqueue Script for Elementor Preview
		if ( defined('ELEMENTOR_PLUGIN_BASE') && isset( $_GET['elementor-preview'] ) && $post->ID == (int) $_GET['elementor-preview'] ) {

			wp_enqueue_script( 'wp-faq-public-script' );
			wp_enqueue_script( 'wp-faq-elementor-script' );
		}

		// Enqueue Style & Script for Beaver Builder
		if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_active() ) {

			$this->wp_faq_register_admin_assets();

			wp_enqueue_script( 'wp-faq-admin-script' );
			wp_enqueue_script( 'wp-faq-public-script' );
		}

		// Enqueue Admin Style & Script for Divi Page Builder
		if( function_exists( 'et_core_is_fb_enabled' ) && isset( $_GET['et_fb'] ) && $_GET['et_fb'] == 1 ) {
			$this->wp_faq_register_admin_assets();

			wp_enqueue_style('wp-faq-admin-style');
		}

		// Enqueue Admin Style for Fusion Page Builder
		if( class_exists( 'FusionBuilder' ) && (( isset( $_GET['builder'] ) && $_GET['builder'] == 'true' ) ) ) {
			$this->wp_faq_register_admin_assets();

			wp_enqueue_style('wp-faq-admin-style');
		}
	}
}

$wp_faq_script = new Wp_Faq_Script();