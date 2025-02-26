<?php
/**
* Plugin Name: eStoreInfo Manager
* Plugin URI: http://www.estoreinfo.com/
* Version: 1.0.0
* Author: eStoreInfo
* Author URI: http://www.estoreinfo.com/
* Description: Rating & Reviews Plugin Designed to Helping Online Merchants Thrive.
* License: GPL2
*/

/**
* Insert Badges Class
*/
class eStoreinfoManager {
	/**
	* Constructor
	*/
	public function __construct() {

		// Plugin Details
        $this->plugin               = new stdClass;
        $this->plugin->name         = 'estoreinfo-manager'; // Plugin Folder
        $this->plugin->displayName  = 'eStoreInfo Manager'; // Plugin Name
        $this->plugin->version      = '1.0.0';
        $this->plugin->folder       = plugin_dir_path( __FILE__ );
        $this->plugin->url          = plugin_dir_url( __FILE__ );

		// Hooks
		add_action( 'admin_init', array( &$this, 'registerSettings' ) );
        add_action( 'admin_menu', array( &$this, 'adminPanelsAndMetaBoxes' ) );

        // Frontend Hooks
		add_action( 'wp_footer', array( &$this, 'frontendFooter' ) );
	}

	/**
	* Register Settings
	*/
	function registerSettings() {
		register_setting( $this->plugin->name, 'estbadge_insert_footer', 'trim' );
	}

	/**
    * Register the plugin settings panel
    */
    function adminPanelsAndMetaBoxes() {
    	add_menu_page( $this->plugin->displayName, 'eStoreInfo', 'manage_options', 'estoreinfo-manager', array( &$this, 'adminPanel' ), $this->plugin->url.'img/esticon.png', 50 );
    	add_submenu_page( 'estoreinfo-manager', 'Welcome', 'Welcome', 'manage_options', 'estoreinfo-manager', array( &$this, 'adminPanel' ) );
    	
    	add_submenu_page( 'estoreinfo-manager', 'Insert Badges', 'Insert Badges', 'manage_options', 'est-badge', array( &$this, 'adminPanel' ) );
	}

    /**
    * Output the Administration Panel
    * Save POSTed data from the Administration Panel into a WordPress option
    */
    function adminPanel() {
		// only admin user can access this page
		if ( !current_user_can( 'administrator' ) ) {
			echo '<p>' . __( 'Sorry, you are not allowed to access this page.', $this->plugin->name ) . '</p>';
			return;
		}

    	// Save Settings
        if ( isset( $_REQUEST['submit'] ) ) {
        	// Check nonce
			if ( !isset( $_REQUEST[$this->plugin->name.'_nonce'] ) ) {
	        	// Missing nonce
	        	$this->errorMessage = __( 'nonce field is missing. Settings NOT saved.', $this->plugin->name );
        	} elseif ( !wp_verify_nonce( $_REQUEST[$this->plugin->name.'_nonce'], $this->plugin->name ) ) {
	        	// Invalid nonce
	        	$this->errorMessage = __( 'Invalid nonce specified. Settings NOT saved.', $this->plugin->name );
        	} else {
	        	// Save
				// $_REQUEST has already been slashed by wp_magic_quotes in wp-settings
				// so do nothing before saving
	    		update_option( 'estbadge_insert_footer', $_REQUEST['estbadge_insert_footer'] );
				$this->message = __( 'Settings Saved.', $this->plugin->name );
			}
        }
        
        // Get latest settings
        $this->settings = array(
			'estbadge_insert_footer' => esc_html( wp_unslash( get_option( 'estbadge_insert_footer' ) ) ),
        );
        
        if ( isset( $_GET['page'] ) ){
			$est_page_wp_r = array('estoreinfo-manager', 'est-badge');
			$req_page = str_replace('est-', '', $_GET['page']);
			if( in_array($_GET['page'], $est_page_wp_r) ) {
				$estpage = str_replace('est-', '', $_GET['page']);
			}else {
				$estpage = 'estoreinfo-manager';
			}
			
			include_once( WP_PLUGIN_DIR . '/' . $this->plugin->name . '/views/'.$estpage.'.php' );
		}
        
    }

    /**
	* Loads plugin textdomain
	*/
	function loadLanguageFiles() {
		load_plugin_textdomain( $this->plugin->name, false, $this->plugin->name . '/languages/' );
	}

	/**
	* Outputs script / CSS to the frontend footer
	*/
	function frontendFooter() {
		$this->output( 'estbadge_insert_footer' );
	}

	/**
	* Outputs the given setting, if conditions are met
	*
	* @param string $setting Setting Name
	* @return output
	*/
	function output( $setting ) {
		// Ignore admin, feed, robots or trackbacks
		if ( is_admin() || is_feed() || is_robots() || is_trackback() ) {
			return;
		}

		// Get meta
		$meta = get_option( $setting );
		if ( empty( $meta ) ) {
			return;
		}
		if ( trim( $meta ) == '' ) {
			return;
		}

		// Output
		echo wp_unslash( $meta );
	}
}

$estbadge = new eStoreinfoManager();