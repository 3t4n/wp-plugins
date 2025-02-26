<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
class Photo_Gallery_General_Options {
	
	public function __construct() {
		add_action( 'photo_gallery_save_general_options', array($this,'save_options') );
	}

	/**
	 * Loads General options page
	 */
	public function load_page(){
		if ( isset( $_GET['page'] ) && $_GET['page'] == 'Options_web_pace_portfolio_styles' ) {
            $this->show_page();
		}
	}

	/**
	 * Shows General options page
	 */
	public function show_page(){
		require( PHOTO_PORTFOLIO_TEMPLATES_PATH.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'photo-portfolio-admin-general-settings-view.php' );
	}
}