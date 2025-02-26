<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
//todo: correct urls
class Photo_Gallery_Admin_Assets {

	/**
	 * Photo_Gallery_Admin_Assets constructor.
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
	}

	/**
	 * @param $hook hook of current page
	 */
	public function admin_styles( $hook ){
		if( in_array($hook, Photo_Gallery()->admin->pages ) ){
			wp_enqueue_style( "admin_css", Photo_Gallery()->plugin_url()."/assets/style/admin.style.css", false );
			wp_enqueue_style( "jquery_ui",  Photo_Gallery()->plugin_url()."/assets/style/jquery-ui.css", false );
			wp_enqueue_style( "simple_slider_css", Photo_Gallery()->plugin_url()."/assets/style/simple-slider.css",  false );
			wp_enqueue_style( "licensing_css", Photo_Gallery()->plugin_url()."/assets/style/licensing.css",  false );
		}
	}

	public function admin_scripts( $hook ) {
		$ajax_url              = admin_url( "admin-ajax.php" );
		if( in_array($hook, Photo_Gallery()->admin->pages ) ){
			wp_enqueue_media();
			wp_enqueue_script( "photo_gallery_admin_js", Photo_Gallery()->plugin_url()."/assets/js/admin.js", false );
			wp_enqueue_script( "jquery-ui-core" );
			wp_enqueue_script( "simple_slider_js", Photo_Gallery()->plugin_url().'/assets/js/simple-slider.js', false );
			wp_enqueue_script( 'param_block2', Photo_Gallery()->plugin_url()."/assets/js/jscolor.js");
            wp_localize_script( 'photo_gallery_admin_js', 'imagesUrl', PHOTO_PORTFOLIO_IMAGES_URL );
            wp_localize_script( 'photo_gallery_admin_js', 'ajaxUrl', $ajax_url );
		}
		$edit_pages = array('post.php','post-new.php');
		if ( in_array( $hook, $edit_pages ) ){
			wp_enqueue_script( "photo_gallery_add_shortecode", Photo_Gallery()->plugin_url() . "/assets/js/shortecode.js", false );
			wp_localize_script( 'photo_gallery_add_shortecode', 'ajax_object_shortecode', $ajax_url );
		}
	}

	public function localize_scripts(){

	}
}
