<?php
/**
 * @package Admin
 */
if ( !class_exists( 'advance_login_style_Admin' ) ) {

/**
 * Class that holds most of the admin functionality for Advance Login Style Plugin.
 */
class advance_login_style_Admin {
		
	/**
	* Class constructor
	*/
	function __construct() {

		$options = get_advance_login_style_options();

		// check access status
		//if ( $this->grant_access() ) {
		
			add_action( 'admin_init', array( $this, 'options_init' ) );
			
			add_action( 'admin_menu', array( $this, 'register_settings_page' ), 5 );
			
			add_filter( 'plugin_action_links', array( $this, 'add_action_link' ), 10, 2 );
			
	//	}
		/*
		* add action on plugin optins update to clear cache
		*
		*/
		add_action( 'update_option_advance_login_style', array( $this, 'clear_cache' ) );
	}

	/** 
	* @desc Function to clear w3 total cache plugin cache 
	* @param none
	* @return none
	*/
	function clear_cache() {
		if ( function_exists( 'w3tc_pgcache_flush' ) ) {
			w3tc_pgcache_flush();
		} else if ( function_exists( 'wp_cache_clear_cache' ) ) {
			wp_cache_clear_cache();
		}
	}
	
	/** 
	* @desc Callback for admin_init to register option for setting page.
	* @param none
	* @return none
	*/
	function options_init() {
		register_setting( 'cb_advance_login_style_options', 'advance_login_style' );
		
		register_setting( 'cb_advance_login_style_form_options', 'advance_login_style_form' );

		register_setting( 'cb_advance_login_style_logo_options', 'advance_login_style_logo' );
	}
	
	/** 
	* @desc Check access status.
	* @param none
	* @return bool -> status of is access is grant
	*/
	function grant_access() {
		if ( !function_exists( 'is_multisite' ) || !is_multisite() )
			return true;

		$options = get_site_option( 'advance_login_style_ms' );
		if ( !is_array( $options ) || !isset( $options['access'] ) )
			return true;

		if ( $options['access'] == 'superadmin' && !is_super_admin() )
			return false;

		return true;
	}
	
	/** 
	* @desc This function register setting page of plugin under theme settings. 
	* @param none
	* @return none
	*/
	function register_settings_page() {
			
		//$advance_login_style_page=add_theme_page('WP AB Theme', 'WP AB Theme', 'edit_theme_options', 'advance_login_style_dashboard', array( $this, 'config_page' ));
		
		add_menu_page( 'Advance Login Style', 'Advance Login', 'manage_options','advance_login_style-dashboard', array( $this, 'config_page' ),advance_login_style_URL . 'images/advance-login-style20x20.png', 6 );
		
		
		add_submenu_page( 'advance_login_style-dashboard', 'Login Form', 'Login Form', 'manage_options', 'advance_login_style_form-dashboard', array( $this, 'form_page' )); 
		
		add_submenu_page( 'advance_login_style-dashboard', 'Login Logo', 'Login Logo', 'manage_options', 'advance_login_style_logo-dashboard', array( $this, 'logo_page' ));
		
		 //add_menu_page( 'Advance Login Style', 'Advance Login Style', 'manage_options', 'advance_login_style-dashboard',  array( $this, 'config_page' )'', plugins_url( 'myplugin/images/icon.png' ), 6 );
		
		//add_options_page( 'test', 'test1', 'manage_options', 'advance_login_style-dashboard', array( $this, 'config_page' ));
		
		// Adds advance_login_style_help_tab when advance_login_style_page loads
		//add_action('load-'.$advance_login_style_page, array($this,'advance_login_style_admin_add_help_tab'));	
	}
	
	/** 
	* @desc callback function for show help content.  
	* @param none
	* @return none
	*/
	function advance_login_style_admin_add_help_tab(){
	
		$screen = get_current_screen();

		// Add my_help_tab if current screen is My Admin Page
		$screen->add_help_tab( array(
			'id'	=> 'advance_login_style_help_tab',
			'title'	=> __('How to', 'advance-login-style'),
			'content'	=> '<p>' . __( 'Descriptive content that will show in My Help Tab-body goes here.', 'advance-login-style' ) . '</p>',
			) 
		);
	
	}
	
	/** 
	* @desc callback function to show login style dashboard page.
	* @param none
	* @return none
	*/
	function config_page() {
		if ( isset( $_GET['page'] ) && 'advance_login_style-dashboard' == $_GET['page'] )
			include( advance_login_style_PATH . '/admin/pages/advance_login_style-dashboard.php' );
				
	}
	
	/** 
	* @desc callback function to show login form style dashboard page.
	* @param none
	* @return none
	*/
	function form_page() {
		if ( isset( $_GET['page'] ) && 'advance_login_style_form-dashboard' == $_GET['page'] )
			include( advance_login_style_PATH . '/admin/pages/advance_login_style_form-dashboard.php' );
				
	}
	
	/** 
	* @desc callback function to show login logo dashboard page.
	* @param none
	* @return none
	*/
	function logo_page() {
		if ( isset( $_GET['page'] ) && 'advance_login_style_logo-dashboard' == $_GET['page'] )
			include( advance_login_style_PATH . '/admin/pages/advance_login_style_logo-dashboard.php' );
				
	}


	/** 
	* @desc callback function for plugin_action_links.
	* @param $links, $file
	* @return $links
	*/
	function add_action_link( $links, $file ) {
		static $this_plugin;
		if ( empty( $this_plugin ) ) $this_plugin = 'advance_login_style/advance_login_style.php';
		if ( $file == $this_plugin ) {
			$settings_link = '<a href="' . admin_url( 'admin.php?page=advance_login_style-dashboard' ) . '">' . __( 'Settings', 'advance-login-style' ) . '</a>';
						array_unshift( $links, $settings_link );
		}
		return $links;
	}
	
}

global $advance_login_style_admin;

$advance_login_style_admin = new advance_login_style_Admin();
	
}