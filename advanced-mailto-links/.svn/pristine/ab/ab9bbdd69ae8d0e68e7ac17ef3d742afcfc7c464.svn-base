<?php
/**
 * Admin Class
 *
 * Handles the Admin side functionality of plugin
 *
 * @package Advanced Mailto Links
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Amtol_Admin {

	function __construct() {

		// Action to register admin menu
		add_action( 'admin_menu', array($this, 'amtol_register_menu') );
		
	}

	/**
	 * Function to register admin menus
	 * 
	 * @package Advanced Mailto Links
	 * @since 1.0.0
	 */
	function amtol_register_menu() {
		add_menu_page(__('Advanced Mailto Links', 'advanced-mailto-links'), __('Advanced Mailto Links', 'advanced-mailto-links'), 'manage_options', 'amtol-settings', array($this, 'amtol_main_page'),'dashicons-email-alt' );
	
	}	
	

	/**
	 * Function to handle the setting page html
	 * 
	 * @package Advanced Mailto Links
	 * @since 1.0.0
	 */
	function amtol_main_page() {
		include_once( AMTOL_VERSION_DIR . '/includes/admin/settings/amtol-settings.php' );
	}
	
	
}	

$amtol_admin = new Amtol_Admin();