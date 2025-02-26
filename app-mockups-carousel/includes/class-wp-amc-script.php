<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package App Mockups Carousel
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class WP_Amc_Script {
	
	function __construct() {
		
		// Action to add style at front side
		add_action( 'wp_enqueue_scripts', array($this, 'wp_amc_front_style') );
		
		// Action to add script at front side
		add_action( 'wp_enqueue_scripts', array($this, 'wp_amc_front_script') );
		
		// Action to add style in backend
		add_action( 'admin_enqueue_scripts', array($this, 'wp_amc_admin_style') );
		
		// Action to add script at admin side
		add_action( 'admin_enqueue_scripts', array($this, 'wp_amc_admin_script') );
	}

	/**
	 * Function to add style at front side
	 * 
	 * @package App Mockups Carousel
	 * @since 1.0.0
	 */
	function wp_amc_front_style() {

	// Registring and enqueing swiper slider css
		if( !wp_style_is( 'wpos-swiper-style', 'registered' ) ) {	
			// Registring and enqueing swiper css		
			wp_register_style( 'wpos-swiper-style', WP_AMC_URL.'assets/css/swiper.min.css', array(), WP_AMC_VERSION );
			wp_enqueue_style( 'wpos-swiper-style');
		}
		
		// Registring and enqueing public css
		wp_register_style( 'wp-amc-public-css', WP_AMC_URL.'assets/css/wp-amc-public.css', null, WP_AMC_VERSION );
		wp_enqueue_style( 'wp-amc-public-css' );
	}
	
	/**
	 * Function to add script at front side
	 * 
	 * @package App Mockups Carousel
	 * @since 1.0.0
	 */
	function wp_amc_front_script() {

		
		// Registring swiper slider script
		if( !wp_script_is( 'wpos-swiper-jquery', 'registered' ) ) {	
			wp_register_script( 'wpos-swiper-jquery', WP_AMC_URL.'assets/js/swiper.min.js', array('jquery'), WP_AMC_VERSION, true );
		}	

		// Registring public script
		wp_register_script( 'wp-amc-public-js', WP_AMC_URL.'assets/js/wp-amc-public.js', array('jquery'), WP_AMC_VERSION, true );
	}
	
	/**
	 * Enqueue admin styles
	 * 
	 * @package App Mockups Carousel
	 * @since 1.0.0
	 */
	function wp_amc_admin_style( $hook ) {

		global $post_type, $typenow;
		
		$registered_posts = array(WP_AMC_POST_TYPE); // Getting registered post types

		// If page is plugin setting page then enqueue script
		if( in_array($post_type, $registered_posts) ) {
			
			// Registring admin script
			wp_register_style( 'wp-amc-admin-style', WP_AMC_URL.'assets/css/wp-amc-admin.css', null, WP_AMC_VERSION );
			wp_enqueue_style( 'wp-amc-admin-style' );
		}
	}

	/**
	 * Function to add script at admin side
	 * 
	 * @package App Mockups Carousel
	 * @since 1.0.0
	 */
	function wp_amc_admin_script( $hook ) {
		
		global $wp_version, $wp_query, $typenow, $post_type;
		
		$registered_posts = array(WP_AMC_POST_TYPE); // Getting registered post types
		$new_ui = $wp_version >= '3.5' ? '1' : '0'; // Check wordpress version for older scripts
		
		if( in_array($post_type, $registered_posts) ) {

			// Enqueue required inbuilt sctipt
			wp_enqueue_script( 'jquery-ui-sortable' );

			// Registring admin script
			wp_register_script( 'wp-amc-admin-script', WP_AMC_URL.'assets/js/wp-amc-admin.js', array('jquery'), WP_AMC_VERSION, true );
			wp_localize_script( 'wp-amc-admin-script', 'WpAmcAdmin', array(
																	'new_ui' 				=>	$new_ui,
																	'img_edit_popup_text'	=> __('Edit Image in Popup', 'swiper-slider-and-carousel'),
																	'attachment_edit_text'	=> __('Edit Image', 'swiper-slider-and-carousel'),
																	'img_delete_text'		=> __('Remove Image', 'swiper-slider-and-carousel'),
																));
			wp_enqueue_script( 'wp-amc-admin-script' );
			wp_enqueue_media(); // For media uploader
		}
	}
}

$wp_amc_script = new WP_Amc_Script();