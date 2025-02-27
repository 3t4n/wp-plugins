<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class HBAgency_Admin {
	
	private static $initiated = false;
	
	public static function init() {
		if (!self::$initiated ) {
			self::init_hooks();
		}
	}
	
	public static function init_hooks() {
		self::$initiated = true;
		
		add_action( 'admin_init', array( 'HBAgency_Admin', 'admin_init' ) );
		add_action( 'admin_menu', array( 'HBAgency_Admin', 'admin_menu' ), 5); 
		add_action( 'wp_ajax_hb_register', array( 'HBAgency_Ajax_Api', 'register' ));
		add_action( 'wp_ajax_hb_refresh', array( 'HBAgency_Ajax_Api', 'refresh' ));
		add_action( 'wp_ajax_hb_reload_placements', array( 'HBAgency_Ajax_Api', 'reload_placements' ));
		add_action( 'wp_ajax_hb_save_placements', array( 'HBAgency_Ajax_Api', 'save_placements' ));
		add_action( 'wp_ajax_hb_save_settings', array( 'HBAgency_Ajax_Api', 'save_settings' ));
		add_action( 'wp_ajax_hb_ads_txt', array( 'HBAgency_Ajax_Api', 'adsTxt' ));
		load_plugin_textdomain( 'hbagency', false, basename( dirname( __FILE__ ) ) . '/languages/' );

	}
	
	public static function admin_init() {
		
	}
	
	public static function hbagency_submenu_page() {
		if(!current_user_can('manage_options')) {
			wp_die(esc_html(__('You do not have sufficient permissions to access this page.', 'hbagency')));
	    	}
	    	
		include_once(HBAGENCY__PLUGIN_DIR . 'hbagency-admin-page.php' );
	}

	
	public static function admin_menu() {
		add_submenu_page( 'options-general.php', 
			'HBAgency', 
			'HBAgency', 
			'manage_options', 
			'HBAgency', 
			array('HBAgency_Admin', 'hbagency_submenu_page'),
			1);
		 		
		$main_menu_messages = array(
			"operation_response_success" => __("Operation Completed", "hbagency"),
			"operation_response_fail" => __("An Error Occurred", "hbagency"),
			"ads_txt_not_valid" => __("It seems there is an error in your extra ads.txt lines. Please check line number ", "hbagency"),
			"registration_completed" => __("Registration Completed", "hbagency"),
		);
		
	  	wp_enqueue_script( 'registration_script', plugins_url( '/js/registration.js', __FILE__ ), array( 'jquery' ), '5.2.0', array('in_footer'  => true));
	  	wp_enqueue_script( 'main_menu_script', plugins_url( '/js/main-menu.js', __FILE__ ), array( 'jquery' ), '5.2.0', array('in_footer'  => true) );
	  	wp_enqueue_script( 'bootstrap_js', plugins_url( '/js/main.js', __FILE__ ), array( 'jquery', 'main_menu_script' ), '5.2.0', array('in_footer'  => true) );
	  		
		wp_localize_script( "main_menu_script", "strings_messages", $main_menu_messages );
		wp_localize_script( 'ajax-script', 'ajax_object',
		array( 'ajax_url' => admin_url( 'admin-ajax.php' )));
				
		wp_enqueue_style('bootstrap_css', plugins_url('./css/mainx.css', __FILE__), array(), '5.2.0');
	}
	
	
}
	
?>
