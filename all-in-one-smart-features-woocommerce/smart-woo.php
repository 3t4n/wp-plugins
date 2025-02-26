<?php
/**
 * Plugin Name: Smart Features for WooCommerce
 * Plugin URI: https://ecompundit.com/all-in-one-smart-features-for-woocommerce-plugin/
 * Description: All-in-one smart features for woocommerce to boost sales. Social Proof, Trust Building, Store Optimization - this plugin does it all.
 * Version: 1.4.0
 * Author: Ecom Pundit
 * Author URI: https://ecompundit.com/
 * Text Domain: smart-woo
 * Domain Path: /translations/
 * License: GPL2
 */
 
defined( 'ABSPATH' ) || exit;

if(! function_exists('add_action')){
exit;
}


if ( ! class_exists( 'Smart_Woo', false ) ) {
Class Smart_Woo {


	/*
	 * The Constructor
	 *
	 */
	public function __construct() 
	{
  
     
		// Defining constants
		define('SWP_VERSION', '1.6.0');
		define('SWP_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . dirname( plugin_basename(__FILE__) ) );
		define('SWP_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );

		add_action( 'admin_menu', array( $this, 'add_main_menu_page' ), 10 );
	
		add_action( 'wp_enqueue_scripts', array( $this, 'init_front_end_scripts' ) );
		add_action( 'init', array( $this, 'load_resources_admin' ) );
      
	}

/*
	 * Add the main menu page
	 *
	 */
	public function add_main_menu_page() 
	{
	
		add_menu_page('Smart Woo', 'Smart Woo', '','swp-smart-woo', '', plugin_dir_url( __FILE__).'uploads/plugin-icon.png',48 );
		add_submenu_page('swp-smart-woo',  'Woocommerce trustale images','Trustable Images',   'manage_options', 'smart-trust-image','swp_myplugins_smart_woo_trust_image');
        	add_submenu_page('swp-smart-woo',  'Smart Tracking','Tracking Code Fields',   'manage_options', 'smart-tracking','swp_myplugins_smart_tracking');
		add_submenu_page('swp-smart-woo',  'Custom Css','Custom Css',   'manage_options', 'custom-css','swp_myplugins_custom_css'); 
		 
		
	}



	/*
	 * Enqueue scripts for the front-end
	 *
	 */
	public function init_front_end_scripts() 
	{
          
		wp_register_style( 'swp-frontends-style', plugin_dir_url( __FILE__ ) . 'assets/css/trust-image.css' );
		wp_enqueue_style( 'swp-frontends-style' );
        
	}




   
	/*
	 * Include plugin files for the admin area
	 *
	 */
	public function load_resources_admin() 
	{
       wp_enqueue_code_editor( array( 'type' => 'text/html' ) );
        wp_enqueue_script( 'js-code-editor', plugin_dir_url( __FILE__ ) . 'assets/js/code-editor.js', array( 'jquery' ), '', true );
        	 wp_register_style( 'swp-admin-style', plugin_dir_url( __FILE__ ) . 'assets/css/admin.css', false, '1.0.0'  );      wp_enqueue_style( 'swp-admin-style' );
			
					if( file_exists( SWP_PLUGIN_DIR . '/includes/smart-woo-trust-images.php' ) )
			include_once( SWP_PLUGIN_DIR . '/includes/smart-woo-trust-images.php' );
						if( file_exists( SWP_PLUGIN_DIR . '/includes/smart-tracking.php' ) )
			include_once( SWP_PLUGIN_DIR . '/includes/smart-tracking.php' );
				if( file_exists( SWP_PLUGIN_DIR . '/includes/custom-css.php' ) )
			include_once( SWP_PLUGIN_DIR . '/includes/custom-css.php' );
				if( file_exists( SWP_PLUGIN_DIR . '/includes/store-setting.php' ) )
			include_once( SWP_PLUGIN_DIR . '/includes/store-setting.php' );

	}
	

}

}
// Let's get the party started
$smartwoo = new Smart_Woo;

 register_activation_hook( __FILE__, 'add_main_menu_page' );
 register_deactivation_hook( __FILE__, 'add_main_menu_page' );

	   
	

	
	
	
