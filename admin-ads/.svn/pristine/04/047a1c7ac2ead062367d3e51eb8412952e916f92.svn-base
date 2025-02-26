<?php

/**
 * The dashboard-specific functionality of the plugin - Admin Ads.
 *
 * Defines the version, and other hooks for dashboard specific
 * functionalities.
 * Also adds admin options page display.
  *
 * @link       http://jkshoppie.com/product/admin-ads
 * @since      1.0.0
 *
 * @package    AADS
 * @subpackage AADS/admin
 * @author     Joel James <me@joelsays.com>
 */
class AADS_Admin {

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;
	
	/**
	 * The output of ads.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $output    The content to output as ads.
	 */
	private $output;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @author	 Joel James
	 * @var      string    $version    The version of this plugin.
	 */
	public function __construct( $version ) {
		$this->version = $version;
	}

	/**
	 * Show defined ads on admin head.
	 *
	 * Get the defined ad code and shows it in admin
	 * dashboard head area.
	 *
	 * @since    1.0.0
	 * @author	 Joel James
	 * @var      string    $output		The output of ad code.
	 * @var      string    $options 	Options value from db.
	 */
	public function show_admin_ads() {

		$options = get_option( 'aads_settings' );
		
		$output = '<div class="'.$options['aads_class'].'" align="center"><p>'.$options['aads_code'].'</p></div>';
		
		echo $output;

	}
	
	/**
	 * Creating admin menu for Admin Ads.
	 *
	 * @since    1.0.0
	 * @author	 Joel James
	 * @var      string    $plugin_name       The name of this plugin.
	 * @action	 hook	   add_options_page	  Action hook to add new admin menu.
	 */
	public function aads_create_menu() {
		add_options_page(
			'Admin Ads',
			'Admin Ads', 
			'manage_options', 
			'admin-ads-settings', 
			array( $this, 'aads_options_page' ) 
		);
	}
	
	/**
	 * Registering options.
	 *
	 * @since    1.0.0
	 * @author	 Joel James
	 * @action	 hooks 		register_setting       Hook to register options in db.
	 */
	public function aads_options_register(){
		register_setting( 
			'aads_settings', 
			'aads_settings' 
		);
	}

	/**
	 * Admin options page display.
	 *
	 * Includes admin page contents to manage ad code
	 * and other thing. Including an Html content page.
	 *
	 * @since    1.0.0
	 * @author	 Joel James
	 */
	public function aads_options_page() {
		require plugin_dir_path( __FILE__ ) . 'partials/admin-ads-admin-display.php';
	}

}