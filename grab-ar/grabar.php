<?php
/*
Plugin Name: GRAB AR
Plugin URI: https://grabarviewer.com/
Description: This GRAB AR plugin enables you to integrate our GRAB AR into your website, and to offer a way for your visitors to generate utilize the GRAB AR APP
Version: 2.4
Author: CIRRUS SOFT
Author URI: http://cirrussoft.com
*/

//$GLOBALS['grabar_wpress']['plugin_code'] = 'grabar_wpress';
require_once dirname( __FILE__ ).'/include/functions.php';
require_once dirname( __FILE__ ).'/include/widget.php';
define('GRABAR_PLUGIN_URL',plugin_dir_url(__FILE__));

class GrabAR {
	/**
	* Constructor
	*/
	public function __construct() {

		// Plugin Details
        $this->plugin               = new stdClass;
        $this->plugin->name         = 'grabar'; // Plugin Folder
        $this->plugin->displayName  = 'GRAB AR'; // Plugin Name
        $this->plugin->version      = '2.4';
        $this->plugin->folder       = plugin_dir_path( __FILE__ );
        $this->plugin->url          = plugin_dir_url( __FILE__ );
        $this->plugin->db_welcome_dismissed_key = $this->plugin->name . '_welcome_dismissed_key';
        $this->body_open_supported	= function_exists( 'wp_body_open' ) && version_compare( get_bloginfo( 'version' ), '5.2' , '>=' );

		// Hooks
		add_action( 'admin_init', array( &$this, 'registerSettings' ) );
    add_action( 'admin_menu', array( &$this, 'adminPanelsAndMetaBoxes' ) );
    add_action( 'admin_notices', array( &$this, 'dashboardNotices' ) );
    add_action( 'wp_ajax_' . $this->plugin->name . '_dismiss_dashboard_notices', array( &$this, 'dismissDashboardNotices' ) );
    register_activation_hook( __FILE__, array( &$this, 'grabar_activate' ) );

	}

	function grabar_activate(){
	    if(get_option('grabar_custom_style') === false)
	      update_option( 'grabar_custom_style','position:absolute;top:100px;right:20px;');
	 		if(get_option('grabar_inc_button') === false)
	 			update_option( 'grabar_inc_button','1');
	  	if(get_option('grabar_fixed') === false)
	  		update_option( 'grabar_fixed','top_right');
	}
	
   
    /**
     * Show relevant notices for the plugin
     */
    function dashboardNotices() {
        global $pagenow;

        if ( !get_option( $this->plugin->db_welcome_dismissed_key ) ) {
        	if ( ! ( $pagenow == 'options-general.php' && isset( $_GET['page'] ) && $_GET['page'] == 'grabar' ) ) {
	            $setting_page = admin_url( 'options-general.php?page=' . $this->plugin->name );
	            // load the notices view
                include_once( $this->plugin->folder . '/views/dashboard-notices.php' );
        	}
        }
    }

    /**
     * Dismiss the welcome notice for the plugin
     */
    function dismissDashboardNotices() {
    	check_ajax_referer( $this->plugin->name . '-nonce', 'nonce' );
        // user has dismissed the welcome notice
        update_option( $this->plugin->db_welcome_dismissed_key, 1 );
        exit;
    }

	/**
	* Register Settings
	*/
	function registerSettings() {

		register_setting( $this->plugin->name, 'grabar_btn_width', 'trim' );
		register_setting( $this->plugin->name, 'grabar_btn_color', 'trim' );
		register_setting( $this->plugin->name, 'grabar_background_img', 'trim' );
		register_setting( $this->plugin->name, 'grabar_product_url', 'trim' );
		register_setting( $this->plugin->name, 'grabar_fixed', array('default'=>'top_right') );
		register_setting( $this->plugin->name, 'grabar_top', 'trim' );
		register_setting( $this->plugin->name, 'grabar_padding', 'trim' );
		register_setting( $this->plugin->name, 'grabar_inc_background', 'trim' );
		register_setting( $this->plugin->name, 'grabar_custom_style', array('default'=>'position:absolute;top:100px;right:20px;') );
		register_setting( $this->plugin->name, 'grabar_inc_button', array('default'=>'1') );
		register_setting( $this->plugin->name, 'grabar_woo_btn', 'trim' );
		register_setting( $this->plugin->name, 'grabar_custom_btn', 'trim' );
		register_setting( $this->plugin->name, 'grabar_side_button', 'trim' );
		register_setting( $this->plugin->name, 'grabar_side_button_position', 'trim' );
	}

	/**
    * Register the plugin settings panel
    */
   function adminPanelsAndMetaBoxes() {
    	add_submenu_page( 'options-general.php', $this->plugin->displayName, 'GRAB AR Settings', 'manage_options', $this->plugin->name, array( &$this, 'adminPanel' ) );
	}

  /**
  * Output the Administration Panel
  * Save POSTed data from the Administration Panel into a WordPress option
  */
  function adminPanel() {
		// only admin user can access this page
		if ( !current_user_can( 'administrator' ) ) {
			echo '<p>' . __( 'Sorry, you are not allowed to access this page.', 'grabar' ) . '</p>';
			return;
		}

  	// Save Settings
      if ( isset( $_REQUEST['btnSubmit'] ) ) {
      	// Check nonce
				if ( !isset( $_REQUEST[$this->plugin->name.'_nonce'] ) ) {
        	// Missing nonce
        	$this->errorMessage = __( 'nonce field is missing. Settings NOT saved.', 'grabar' );
      	} elseif ( !wp_verify_nonce( sanitize_text_field($_REQUEST[$this->plugin->name.'_nonce']), $this->plugin->name ) ) {
        	// Invalid nonce
        	$this->errorMessage = __( 'Invalid nonce specified. Settings NOT saved.', 'grabar' );
      	} else {
        	// Save
					// $_REQUEST has already been slashed by wp_magic_quotes in wp-settings
					// so do nothing before saving
					if(!$_REQUEST['grabar_side_button'])
		    		update_option( 'grabar_side_button', "0" );
		    	else
		    		update_option( 'grabar_side_button', sanitize_text_field($_REQUEST['grabar_side_button']) );
					update_option( 'grabar_side_button_position', sanitize_text_field($_REQUEST['grabar_side_button_position']) );
		    	update_option( 'grabar_btn_width', sanitize_text_field($_REQUEST['grabar_btn_width']) );
		    	update_option( 'grabar_btn_color', sanitize_text_field($_REQUEST['grabar_btn_color']) );
					update_option( 'grabar_background_img', sanitize_text_field($_REQUEST['grabar_background_img']) );
		    	update_option( 'grabar_product_url', sanitize_text_field($_REQUEST['grabar_product_url']) );
		    	update_option( 'grabar_woo_btn', sanitize_text_field($_REQUEST['grabar_woo_btn']) );
		    	if(!$_REQUEST['grabar_fixed'])
		    		update_option( 'grabar_fixed', "0" );
		    	else
		    		update_option( 'grabar_fixed', sanitize_text_field($_REQUEST['grabar_fixed']) );
		    	update_option( 'grabar_top', sanitize_text_field($_REQUEST['grabar_top']) );
		    	update_option( 'grabar_padding', sanitize_text_field($_REQUEST['grabar_padding']) );
		    	update_option( 'grabar_inc_background', sanitize_text_field($_REQUEST['grabar_inc_background']) );
		    	update_option( 'grabar_custom_style',sanitize_text_field( $_REQUEST['grabar_custom_style']) );
		    	if(!$_REQUEST['grabar_inc_button'] || $_REQUEST['grabar_woo_btn'])
		    		update_option( 'grabar_inc_button', '0' );
		    	else
		    		update_option( 'grabar_inc_button', sanitize_text_field($_REQUEST['grabar_inc_button']) );
					
					update_option( 'grabar_custom_btn', sanitize_text_field($_REQUEST['grabar_custom_btn']) );
									
					//( 'grabar_inc_background', isset( $_REQUEST['grabar_inc_background'] ) ? $_REQUEST['grabar_inc_background'] : '' );
					update_option( $this->plugin->db_welcome_dismissed_key, 1 );
					$this->message = __( 'Settings Saved.', 'grabar' );
				}
      }

      // Get latest settings
      $this->settings = array(
				'grabar_side_button' => wp_unslash( get_option( 'grabar_side_button' ) ),
				'grabar_side_button_position' => wp_unslash( get_option( 'grabar_side_button_position' ) ),
				'grabar_btn_width' => wp_unslash( get_option( 'grabar_btn_width' ) ),
				'grabar_btn_color' => wp_unslash( get_option( 'grabar_btn_color' ) ),
				'grabar_background_img' => wp_unslash( get_option( 'grabar_background_img' ) ),
				'grabar_product_url' => wp_unslash( get_option( 'grabar_product_url' ) ),
				'grabar_fixed' => wp_unslash( get_option( 'grabar_fixed' ) ),
				'grabar_top' => wp_unslash( get_option( 'grabar_top' ) ),
				'grabar_padding' => wp_unslash( get_option( 'grabar_padding' ) ),
				'grabar_inc_background' => wp_unslash( get_option( 'grabar_inc_background' ) ),
				'grabar_custom_style' => wp_unslash( get_option( 'grabar_custom_style' ) ),
				'grabar_inc_button' => wp_unslash( get_option( 'grabar_inc_button' ) ),
				'grabar_custom_btn' => wp_unslash( get_option( 'grabar_custom_btn' ) ),
				'grabar_woo_btn' => wp_unslash( get_option( 'grabar_woo_btn' ) ),
	        );

  		// Load Settings Form
      include_once( $this->plugin->folder . '/views/settings.php' );
  }	
		
}

$grabar = new GrabAR();

?>