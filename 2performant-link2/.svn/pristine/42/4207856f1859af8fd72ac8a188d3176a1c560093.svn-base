<?php
/**
* Plugin Name: 2Performant Link2
* Plugin URI: https://2performant.com/
* Version: 1.0.1
* Author: 2Performant
* Description: Allows you to configure Link2 tool from 2Performant Affiliate platform
* License: GPL2
*/

class Link2Performant {
	
	public function __construct() {

        $this->plugin               = new stdClass;
        $this->plugin->name         = '2performant-link2';
        $this->plugin->displayName  = '2Performant Link2';
        $this->plugin->version      = '1.0.1';
        $this->plugin->folder       = plugin_dir_path( __FILE__ );
        $this->plugin->url          = plugin_dir_url( __FILE__ );
        $this->plugin->db_welcome_dismissed_key = $this->plugin->name . '_welcome_dismissed_key';

		add_action( 'admin_init', array( &$this, 'registerSettings' ) );
        add_action( 'admin_menu', array( &$this, 'adminPanelsAndMetaBoxes' ) );
        add_action( 'admin_notices', array( &$this, 'dashboardNotices' ) );
        add_action( 'wp_ajax_' . $this->plugin->name . '_dismiss_dashboard_notices', array( &$this, 'dismissDashboardNotices' ) );
		add_action( 'wp_footer', array( &$this, 'generateLink2Tag' ) );
	}

    function dashboardNotices() {
        global $pagenow;

        if ( !get_option( $this->plugin->db_welcome_dismissed_key ) ) {
        	if ( ! ( $pagenow == 'options-general.php' && isset( $_GET['page'] ) && $_GET['page'] == '2performant-link2' ) ) {
	            $setting_page = admin_url( 'options-general.php?page=' . $this->plugin->name );
                include_once( $this->plugin->folder . '/views/dashboard-notices.php' );
        	}
        }
    }

    function dismissDashboardNotices() {
    	check_ajax_referer( $this->plugin->name . '-nonce', 'nonce' );
        update_option( $this->plugin->db_welcome_dismissed_key, 1 );
        exit;
    }
	
	function registerSettings() {
		register_setting( $this->plugin->name, 'link2id', 'trim' );
	}

    function adminPanelsAndMetaBoxes() {
    	add_submenu_page( 'options-general.php', $this->plugin->displayName, $this->plugin->displayName, 'manage_options', $this->plugin->name, array( &$this, 'adminPanel' ) );
	}

    function adminPanel() {
		if ( !current_user_can( 'administrator' ) ) {
			echo '<p>' . __( 'Sorry, you are not allowed to access this page.', $this->plugin->name ) . '</p>';
			return;
		}

        if ( isset( $_REQUEST['submit'] ) ) {
			if ( !isset( $_REQUEST[$this->plugin->name.'_nonce'] ) ) {
	        	$this->errorMessage = __( 'nonce field is missing. Link2 ID NOT saved.', $this->plugin->name );
        	} elseif ( !wp_verify_nonce( $_REQUEST[$this->plugin->name.'_nonce'], $this->plugin->name ) ) {
	        	$this->errorMessage = __( 'Invalid nonce specified. Link2 ID NOT saved.', $this->plugin->name );
        	} else {
	    		update_option( 'link2id', $_REQUEST['link2id'] );
	    		update_option( $this->plugin->db_welcome_dismissed_key, 1 );
				$this->message = __( 'Link2 ID Saved.', $this->plugin->name );
			}
        }

        $this->settings = array(
			'link2id' => esc_html( get_option( 'link2id'  ) ),
        );

        include_once( WP_PLUGIN_DIR . '/' . $this->plugin->name . '/views/settings.php' );
    }

	function generateLink2Tag() {
		$this->output( 'link2id' );
	}

	function output( $setting ) {
		
		if ( is_admin() || is_feed() || is_robots() || is_trackback() ) {
			return;
		}
		define('LINK2ID', get_option( $setting ));
		if ( empty( LINK2ID ) ) {
			return;
		}
		if ( trim( LINK2ID ) == '' ) {
			return;
		}
		
		function customizeScript( $tag, $handle ) {
			if ( $handle === 'link2Script' ) {
				return str_replace( '<script', '<script id="linkTwoPerformant" data-id="' . LINK2ID . '" data-api-host="https://cdn.2performant.com"', $tag );
			}
			return $tag;    
		}
		
		wp_register_script('link2Script', 'https://cdn.2performant.com/l2/link2.js');
		add_filter( 'script_loader_tag', 'customizeScript', 10, 2);
		
		wp_enqueue_script('link2Script');
		add_action('wp_enqueue_scripts', 'link2Script');
	}
}

$link2 = new Link2Performant();