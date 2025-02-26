<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Scripts Class
 *
 * Handles adding scripts functionality to the admin pages
 * as well as the front pages.
 *
 * @package Subtitle
 * @since 1.1.0
 */
class wpd_sub_title_Scripts{
	
	public function __construct() {
		
	}
	
	/**
	 * Enqueue Styles 
	 *
	 * Enqueue Style Sheet for public
	 *
	 * @package Subtitle
	 * @since 1.1.0
	 */
	
	public function wpd_sub_title_styles() {
		
		wp_register_style( 'wpd-sub-title-public-style', WPD_SUB_TITLE_PLUGIN_URL . 'includes/css/wpd-sub-title-public.css');
		wp_enqueue_style( 'wpd-sub-title-public-style' );
		
	}

	
	/**
	 * Adding Hooks
	 *
	 * Adding hooks for the styles and scripts.
	 *
	 * @package Subtitle
	 * @since 1.1.0
	 */
	public function add_hooks() {

		//add style for front side
		add_action( 'wp_enqueue_scripts', array( $this, 'wpd_sub_title_styles' ) ); 
	}
}
?>