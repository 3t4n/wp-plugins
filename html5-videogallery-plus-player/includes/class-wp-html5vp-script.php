<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package Video gallery and Player
 * @since 2.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class WP_Html5Vp_Script {

	function __construct() {

		// Action to add style at front side
		add_action( 'admin_enqueue_scripts', array( $this, 'wp_html5vp_admin_style_script' ) );

		// Action to add style at front side
		add_action( 'wp_enqueue_scripts', array( $this, 'wp_html5vp_front_style' ) );

		// Action to add script at front side
		add_action( 'wp_enqueue_scripts', array( $this, 'wp_html5vp_front_script' ) );
	}

	/**
	 * Function to register admin scripts and styles
	 * 
	 * @since 2.5
	 */
	function wp_html5vp_register_admin_assets() {

		wp_register_style( 'wp-html5vp-admin-style', WP_HTML5VP_URL.'assets/css/html5video-admin.css', array(), WP_HTML5VP_VERSION );

		// Registring admin script
		wp_register_script( 'wp-html5vp-admin-script', WP_HTML5VP_URL.'assets/js/wp-html5vp-admin.js', array('jquery'), WP_HTML5VP_VERSION, true );
	}

	/**
	 * Function to add style at admin side
	 * 
	 * @since 2.5
	 */
	function wp_html5vp_admin_style_script( $hook ) {

		global $post_type;

		$this->wp_html5vp_register_admin_assets();

		if( $hook == WP_HTML5VP_POST_TYPE.'_page_vgap-designs' ) {
			wp_enqueue_script( 'wp-html5vp-admin-script' );
		}

		$registered_posts = array(WP_HTML5VP_POST_TYPE); // Getting registered post types

		// If page is plugin setting page then enqueue script
		if( in_array($post_type, $registered_posts) ) {
			wp_enqueue_style( 'wp-html5vp-admin-style' );
		}
	}

	/**
	 * Function to add script at front side
	 * 
	 * @since 2.5
	 */
	function wp_html5vp_front_style() {

		wp_register_style( 'wp_html5video_css', WP_HTML5VP_URL.'assets/css/video-js.css', array(), WP_HTML5VP_VERSION );

		wp_register_style( 'wp_html5video_colcss', WP_HTML5VP_URL.'assets/css/video-style.css', array(), WP_HTML5VP_VERSION );

		// Registring and enqueing wpos-magnific-popup-style css
		if( ! wp_style_is( 'wpos-magnific-popup-style', 'registered' ) ) {
			wp_register_style( 'wpos-magnific-popup-style', WP_HTML5VP_URL.'assets/css/magnific-popup.css', array(), WP_HTML5VP_VERSION );
		}

		wp_enqueue_style( 'wp_html5video_css' );
		wp_enqueue_style( 'wp_html5video_colcss' );
		wp_enqueue_style( 'wpos-magnific-popup-style' );
	}

	/**
	 * Function to add script at front side
	 * 
	 * @since 2.5
	 */
	function wp_html5vp_front_script() {

		wp_register_script( 'wp-html5video-js', WP_HTML5VP_URL.'assets/js/video.js', array('jquery'), WP_HTML5VP_VERSION, true );

		if( ! wp_script_is( 'wpos-magnific-popup-jquery', 'registered' ) ) {
				wp_register_script( 'wpos-magnific-popup-jquery', WP_HTML5VP_URL.'assets/js/jquery.magnific-popup.min.js', array('jquery'), WP_HTML5VP_VERSION, true );
			}

		wp_register_script( 'wp-html5video-public-js', WP_HTML5VP_URL.'assets/js/wp-html5vp-public.js', array('jquery'), WP_HTML5VP_VERSION, true );

		wp_enqueue_script( 'wp-html5video-js' );
	}
}

$wp_html5vp_script = new WP_Html5Vp_Script();