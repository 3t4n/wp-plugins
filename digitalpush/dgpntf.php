<?php
/**
* Plugin Name: DigitalPUSH
* Plugin URI: http://digitalpush.org/
* Version: 1.6.2
* Author: DigitalPUSH
* Author URI: http://digitalpush.org/
* Description: Allows you to implement push notifications with your WordPress blog
* License: GPL2
* Text Domain: digitalpush-notifications
* Domain Path: languages
*/

/*  Copyright 2019 DigitalPUSH

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/**
* DigitalPUSH Class
*/
class DigitalPUSHNotifications {
	/**
	* Constructor
	*/
	public function __construct() {

		// Plugin Details
        $this->plugin               = new stdClass;
        $this->plugin->name         = 'digitalpush-notifications'; // Plugin Folder
        $this->plugin->displayName  = 'DigitalPUSH'; // Plugin Name
        $this->plugin->version      = '1.6.2';
        $this->plugin->folder       = plugin_dir_path( __FILE__ );
        $this->plugin->url          = plugin_dir_url( __FILE__ );
        $this->plugin->db_welcome_dismissed_key = $this->plugin->name . '_welcome_dismissed_key';

        // Check if the global wpb_feed_append variable exists. If not, set it.
        if ( ! array_key_exists( 'wpb_feed_append', $GLOBALS ) ) {
              $GLOBALS['wpb_feed_append'] = false;
        }

		// Hooks
		add_action( 'admin_init', array( &$this, 'registerSettings' ) );
        add_action( 'admin_menu', array( &$this, 'adminPanelsAndMetaBoxes' ) );
        add_action( 'wp_feed_options', array( &$this, 'dashBoardRss' ), 10, 2 );
        add_action( 'admin_notices', array( &$this, 'dashboardNotices' ) );
        add_action( 'wp_ajax_' . $this->plugin->name . '_dismiss_dashboard_notices', array( &$this, 'dismissDashboardNotices' ) );
		add_action( 'transition_post_status', array( &$this, 'schedule_notification_sending' ), 10, 3 );
		add_action( 'dgp_ntf_sending', array( &$this, 'dgp_notify_subscribers' ), 11, 3 );

        // Frontend Hooks
		add_action( 'wp_footer', array( &$this, 'implementation_code' ) );

		// Filters
		add_filter( 'dashboard_secondary_items', array( &$this, 'dashboardSecondaryItems' ) );

	}

    /**
     * Verify the status of the post to make sure it is a new post
     */
	function schedule_notification_sending( $new_status, $old_status, $post ) {

		$subscription = false;
		if ( $new_status == 'publish' && $old_status != 'publish' )
			$subscription = 'publish_post';
		if ( ! $subscription )
			return;
		
		//check whether the "send notifications on new post" option is enabled
		if ( get_option( 'dgp_autosend' ) != 'yes' ){ return; }
		
		wp_schedule_single_event(time(), 'dgp_ntf_sending', array($new_status, $old_status, $post) );

	}
	
    /**
     * Make the cURL post to the API of DigitalPUSH in order to deliver the push notifications
     */
	function dgp_notify_subscribers( $new_status, $old_status, $post ) {
		
		$dgptitle = substr(wp_unslash($post->post_title),0,64);
		$dgpmessage = substr(str_replace(array("\r", "\n"), ' ',str_replace("|[[\/\!]*?[^\[\]]*?]|si","",wp_strip_all_tags(wp_unslash($post->post_content))) ),0,128);
		$dgpurl = get_permalink($post->ID);
		$dgpimg = get_the_post_thumbnail_url($post->ID);
		if(!preg_match("/https:\/\//i",$dgpimg)){ $dgpimg = "https://digitalpush.org/images/bell.png"; }
		
		
				//Composing the push notification and putting together it's title, body, URL and icon
				$notification_content = array();
				$notification_content['message_title'] = htmlspecialchars_decode($dgptitle,ENT_QUOTES);
				$notification_content['message_body'] = htmlspecialchars_decode($dgpmessage,ENT_QUOTES);
				$notification_content['message_click_url'] = $dgpurl;
				$notification_content['message_icon'] = $dgpimg;
		 
				$args = array(
				    'body' => json_encode($notification_content),
				    'timeout' => '5',
				    'redirection' => '5',
				    'httpversion' => '1.0',
				    'blocking' => true,
				    'headers' => array('Authorization' => get_option( 'dgp_api' ), 'Content-Type' => 'application/json'),
				    'cookies' => array()
				);
				
				//Sending the request to the DigitalPUSH api URL in order to be processed and for the notification to be sent
				$request = wp_remote_post( 'https://api.digitalpush.org/push/', $args );
				
				if ( is_wp_error( $request ) || wp_remote_retrieve_response_code( $request ) != 200 ) {
			        error_log( print_r( $request, true ) );
			    }

			    $response = wp_remote_retrieve_body( $request );
			    
			    update_option( 'dgp_error', $response );

			    

	}


    /**
     * Number of Secondary feed items to show
     */
	function dashboardSecondaryItems() {
		return 6;
	}

    /**
     * Update the planet feed to add the WPB feed
     */
    function dashBoardRss( $feed, $url ) {
        // Return early if not on the right page.
        global $pagenow;
        if ( 'admin-ajax.php' !== $pagenow ) {
            return;
        }

        // Return early if not on the right feed.
        if ( strpos( $url, 'planet.wordpress.org' ) === false ) {
            return;
        }

        // Only move forward if this action hasn't been done already.
        if ( ! $GLOBALS['wpb_feed_append'] ) {
            $GLOBALS['wpb_feed_append'] = true;
            $urls = array( 'https://digitalpush.org/feed/', $url );
            $feed->set_feed_url( $urls );
        }
    }

    /**
     * Show relevant notices for the plugin
     */
    function dashboardNotices() {
        global $pagenow;

        if ( !get_option( $this->plugin->db_welcome_dismissed_key ) ) {
        	if ( ! ( $pagenow == 'options-general.php' && isset( $_GET['page'] ) && $_GET['page'] == 'digitalpush-notifications' ) ) {
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
		register_setting( $this->plugin->name, 'dgp_api', 'trim' );
		register_setting( $this->plugin->name, 'dgp_autosend', 'trim' );
		register_setting( $this->plugin->name, 'dgp_key', 'trim' );
		register_setting( $this->plugin->name, 'dgp_delay', 'trim' );
		register_setting( $this->plugin->name, 'dgp_nativerequest', 'trim' );
		register_setting( $this->plugin->name, 'dgp_inpageads', 'trim' );
		register_setting( $this->plugin->name, 'dgp_type', 'trim' );
		register_setting( $this->plugin->name, 'dgp_theme', 'trim' );
		register_setting( $this->plugin->name, 'dgp_message', 'trim' );
		register_setting( $this->plugin->name, 'dgp_title', 'trim' );
		register_setting( $this->plugin->name, 'dgp_allowbutton', 'trim' );
		register_setting( $this->plugin->name, 'dgp_denybutton', 'trim' );
		register_setting( $this->plugin->name, 'dgp_bgimage', 'trim' );
		register_setting( $this->plugin->name, 'dgp_error', 'trim' );
	}

	/**
    * Register the plugin settings panel
    */
    function adminPanelsAndMetaBoxes() {
    	add_submenu_page( 'options-general.php', $this->plugin->displayName, $this->plugin->displayName, 'manage_options', $this->plugin->name, array( &$this, 'adminPanel' ) );
	}

    /**
    * Output the Administration Panel
    * Save POSTed data from the Administration Panel into a WordPress option
    */
    function adminPanel() {
		// only admin user can access this page
		if ( !current_user_can( 'administrator' ) ) {
			echo '<p>' . __( 'Sorry, you are not allowed to access this page.', 'digitalpush-notifications' ) . '</p>';
			return;
		}

    	// Save Settings
        if ( isset( $_REQUEST['submit'] ) ) {
        	// Check nonce
			if ( !isset( $_REQUEST[$this->plugin->name.'_nonce'] ) ) {
	        	// Missing nonce
	        	$this->errorMessage = __( 'nonce field is missing. Settings NOT saved.', 'digitalpush-notifications' );
        	} elseif ( !wp_verify_nonce( $_REQUEST[$this->plugin->name.'_nonce'], $this->plugin->name ) ) {
	        	// Invalid nonce
	        	$this->errorMessage = __( 'Invalid nonce specified. Settings NOT saved.', 'digitalpush-notifications' );
	       	} elseif (
	       	$_REQUEST['dgp_autosend'] == 'yes' && (
	       	!preg_match("/eb6zzx551r166d5aa/i",$_REQUEST['dgp_api']) && 
			!preg_match("/eb6zzx552r166d5aa/i",$_REQUEST['dgp_api']) && 
			!preg_match("/abf5dfa6158105haf/i",$_REQUEST['dgp_api']) && 
			!preg_match("/abf5dfa6258105haf/i",$_REQUEST['dgp_api']) && 
			!preg_match("/b73fb8c315928d243/i",$_REQUEST['dgp_api']) && 
			!preg_match("/b73fb8c325928d243/i",$_REQUEST['dgp_api']) )
	       	) {	
	       		update_option( 'dgp_autosend', 'no' );
	        	$this->errorMessage = __( 'Invalid API key specified. Settings NOT saved.', 'digitalpush-notifications' );
	        	
        	} else {
        	
	        	// Sanitize the data received before saving
	        	$dgp_api = sanitize_text_field( $_REQUEST['dgp_api'] );
	        	$dgp_autosend = sanitize_text_field( $_REQUEST['dgp_autosend'] );
	        	$dgp_key = sanitize_text_field( $_REQUEST['dgp_key'] );
	        	$dgp_delay = sanitize_text_field( $_REQUEST['dgp_delay'] );
	        	$dgp_nativerequest = sanitize_text_field( $_REQUEST['dgp_nativerequest'] );
	        	$dgp_inpageads = sanitize_text_field( $_REQUEST['dgp_inpageads'] );
	        	$dgp_type = sanitize_text_field( $_REQUEST['dgp_type'] );
				$dgp_theme = sanitize_text_field( $_REQUEST['dgp_theme'] );
	        	$dgp_message = sanitize_text_field( $_REQUEST['dgp_message'] );
	        	$dgp_title = sanitize_text_field( $_REQUEST['dgp_title'] );
	        	$dgp_allowbutton = sanitize_text_field( $_REQUEST['dgp_allowbutton'] );
	        	$dgp_denybutton = sanitize_text_field( $_REQUEST['dgp_denybutton'] );
	        	$dgp_bgimage = sanitize_text_field( $_REQUEST['dgp_bgimage'] );
	        	
	        	//Validate the inputs from the settings page of the plugin
	        	if( $dgp_autosend != 'yes' && $dgp_autosend != 'no' ){ $dgp_autosend = 'no'; }
	        	if( $dgp_nativerequest != '0' && $dgp_nativerequest != '1' ){ $dgp_nativerequest = '1'; }
	        	if( $dgp_inpageads != '0' && $dgp_inpageads != '1' ){ $dgp_inpageads = '1'; }
	        	if( $dgp_delay != '0' && $dgp_delay != '3000' && $dgp_delay != '5000' && $dgp_delay != '7000' && $dgp_delay != '10000' ){ $dgp_delay = '0'; }
	        	if( $dgp_type != 'overlay' && $dgp_type != 'flying' && $dgp_type != 'balloon' ){ $dgp_type = 'overlay'; }
	        	if( strlen($dgp_title)<'2' ){ $dgp_title = "Don't miss it!"; }
	        	if( strlen($dgp_allowbutton)<'2' ){ $dgp_allowbutton = "ALLOW"; }
	        	if( strlen($dgp_denybutton)<'2' ){ $dgp_denybutton = "No thanks"; }

	    		update_option( 'dgp_error', 'none' );
	    		update_option( 'dgp_api', $dgp_api );
	    		update_option( 'dgp_autosend', $dgp_autosend );
	    		update_option( 'dgp_key', $dgp_key );
	    		update_option( 'dgp_delay', $dgp_delay );
	    		update_option( 'dgp_nativerequest', $dgp_nativerequest );
	    		update_option( 'dgp_inpageads', $dgp_inpageads );
	    		update_option( 'dgp_type', $dgp_type );
	    		update_option( 'dgp_theme', $dgp_theme );				
	    		update_option( 'dgp_message', $dgp_message );
	    		update_option( 'dgp_title', $dgp_title );
	    		update_option( 'dgp_allowbutton', $dgp_allowbutton );
	    		update_option( 'dgp_denybutton', $dgp_denybutton );
	    		update_option( 'dgp_bgimage', $dgp_bgimage );
	    		update_option( $this->plugin->db_welcome_dismissed_key, 1 );
				$this->message = __( 'Settings Saved.', 'digitalpush-notifications' );
			}
        }

        // Get latest settings
        $this->settings = array(
			'dgp_api' => esc_html( wp_unslash( get_option( 'dgp_api' ) ) ),
			'dgp_autosend' => esc_html( wp_unslash( get_option( 'dgp_autosend' ) ) ),
			'dgp_key' => esc_html( wp_unslash( get_option( 'dgp_key' ) ) ),
			'dgp_delay' => esc_html( wp_unslash( get_option( 'dgp_delay' ) ) ),
			'dgp_nativerequest' => esc_html( wp_unslash( get_option( 'dgp_nativerequest' ) ) ),
			'dgp_inpageads' => esc_html( wp_unslash( get_option( 'dgp_inpageads' ) ) ),
			'dgp_type' => esc_html( wp_unslash( get_option( 'dgp_type' ) ) ),
			'dgp_theme' => esc_html( wp_unslash( get_option( 'dgp_theme' ) ) ),
			'dgp_message' => esc_html( wp_unslash( get_option( 'dgp_message' ) ) ),
			'dgp_title' => esc_html( wp_unslash( get_option( 'dgp_title' ) ) ),
			'dgp_allowbutton' => esc_html( wp_unslash( get_option( 'dgp_allowbutton' ) ) ),
			'dgp_denybutton' => esc_html( wp_unslash( get_option( 'dgp_denybutton' ) ) ),
			'dgp_bgimage' => esc_html( wp_unslash( get_option( 'dgp_bgimage' ) ) ),
			'dgp_error' => esc_html( wp_unslash( get_option( 'dgp_error' ) ) ),
        );




    	// Load Settings Form
        include_once( $this->plugin->folder . '/views/settings.php' );
    }

    /**
	* Loads plugin textdomain
	*/
	function loadLanguageFiles() {
		load_plugin_textdomain( 'digitalpush-notifications', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	/**
	* Outputs the implementation code if conditions are met
	*/
	function implementation_code() {
		// Ignore admin, feed, robots or trackbacks
		if ( is_admin() || is_feed() || is_robots() || is_trackback() ) {
			return;
		}
		
		// The DigitalPUSH implementation code settings which allows visitors to subscribe to notifications
		$ech = 'var DGPkey = "'.esc_html( wp_unslash( get_option( 'dgp_key' ) ) ).'";
		var DGPnativerequest = "'.esc_html( wp_unslash( get_option( 'dgp_nativerequest' ) ) ).'";
		var DGPdelay = "'.esc_html( wp_unslash( get_option( 'dgp_delay' ) ) ).'";
		var DGPmtype = "'.esc_html( wp_unslash( get_option( 'dgp_type' ) ) ).'";
		var DGPtheme = "'.esc_html( wp_unslash( get_option( 'dgp_theme' ) ) ).'";
		var DGPmessage = "'.esc_html( wp_unslash( get_option( 'dgp_message' ) ) ).'";
		var DGPtitle = "'.esc_html( wp_unslash( get_option( 'dgp_title' ) ) ).'";
		var DGPbgimage = "'.esc_html( wp_unslash( get_option( 'dgp_bgimage' ) ) ).'";
		var DGPallowbutton = "'.esc_html( wp_unslash( get_option( 'dgp_allowbutton' ) ) ).'";
		var DGPrejectbutton = "'.esc_html( wp_unslash( get_option( 'dgp_denybutton' ) ) ).'"; ';
		
		wp_enqueue_script( 'dgp-lib', 'https://dgpcdn.org/lib.js', array());
		wp_add_inline_script( 'dgp-lib', $ech, 'before' );
   
	}
}

$dgpntf = new DigitalPUSHNotifications();