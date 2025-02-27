<?php
/**
 * Admin Class
 *
 * Handles the Admin side functionality of plugin
 *
 * @package Preloader for Website - WPOS
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Plwao_Admin {

	function __construct() {

		// Action to register admin menu
		add_action( 'admin_menu', array($this, 'plwao_register_menu') );

		// Action to register plugin settings
		add_action ( 'admin_init', array($this, 'plwao_register_settings') );
	}

	/**
	 * Function to register admin menus
	 * 
	 * @since 1.0.0
	 */
	function plwao_register_menu() {

		// Main Menu
		add_menu_page(__('Preloader - WPOS', 'preloader-for-website'), __('Preloader - WPOS', 'preloader-for-website'), 'manage_options', 'plwao-settings', array($this, 'plwao_main_page'), 'dashicons-image-rotate' );

		// How it work page
		//add_submenu_page( 'plwao-settings', __('How it works - Page Loader', 'preloader-for-website'), __('How it works', 'preloader-for-website'), 'manage_options', 'plwao-how-it-work',  array($this, 'plwao_settings_page'), 'dashicons-sticky', 6 );
		add_submenu_page( 'plwao-settings', __('How it works - Page Loader', 'preloader-for-website'), __('How It Works', 'preloader-for-website'), 'manage_options', 'plwao-how-it-work', array($this, 'plwao_settings_page') );
	}

	/**
	 * Function to handle the setting page html
	 * 
	 * @since 1.0.0
	 */
	function plwao_main_page() {
		include_once( PLWAO_DIR . '/includes/admin/settings/plwao-settings.php' );
	}

	/**
	 * Function to display plugin design HTML
	 * 
	 * @since 1.2
	 */
	function plwao_settings_page() {
		include_once( PLWAO_DIR . '/includes/admin/plwao-how-it-work.php' );
	}

	/**
	 * Function register setings
	 * 
	 * @since 1.0.0
	 */
	function plwao_register_settings() {

		// Reset default settings
		if( ! empty( $_POST['plwao_reset_settings'] ) && check_admin_referer( 'plwao_reset_settings', 'plwao_reset_sett_nonce' ) ) {
			plwao_default_settings();
		}

		register_setting( 'plwao_plugin_options', 'plwao_options', array($this, 'plwao_validate_options') );
	}

	/**
	 * Validate Settings Options
	 * 
	 * @since 1.0.0
	 */
	function plwao_validate_options( $input ) {

		// Taking some variable
		$input['is_preloader']		= isset( $input['is_preloader'] )		? plwao_clean( $input['is_preloader'] )					: '';
		$input['preloader_type']	= isset( $input['preloader_type'] )		? plwao_clean( $input['preloader_type'] )				: '';
		$input['plwao_spinner']		= isset( $input['plwao_spinner'] )		? plwao_clean( $input['plwao_spinner'] )				: 'spinner-1';
		$input['content_font_size']	= isset( $input['content_font_size'] )	? plwao_clean_number( $input['content_font_size'] )		: '';
		$input['content_font_clr']	= ! empty( $input['content_font_clr'] )	? plwao_clean_color( $input['content_font_clr'] )		: '#333333';
		$input['plwao_bgcolor']		= ! empty( $input['plwao_bgcolor'] )	? plwao_clean_color( $input['plwao_bgcolor'] )			: '#ffffff';
		$input['custom_content']	= isset( $input['custom_content'] )		? plwao_clean_html( $input['custom_content'], true )	: '';

		return $input;
	}
}

$plwao_admin = new Plwao_Admin();