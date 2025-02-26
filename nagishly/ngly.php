<?php
/**
* Plugin Name: Nagishly
* Plugin URI: https://nagishly.co.il/
* Version: 1.0.0
* Description: Nagishly, the most worthwhile website accessibility system in Israel. AA standard accessibility, according to the law and WCAG 2.0, including a legal reference and customer guarantee
* Text Domain: nagishli
 * Domain Path: /languages
 * License: GPL2
*/


/**
* Nagishly CLASS
*/
class nagishly {
	/**
	* Constructor
	*/
	public function __construct() {

		// Plugin Details
        $this->plugin               = new stdClass;
        $this->plugin->name         = 'nagishly'; // Plugin Folder
        $this->plugin->displayName  = 'nagishly'; // Plugin Name
        $this->plugin->version      = '1.0.0';
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
        add_action( 'admin_notices', array( &$this, 'dashboardNotices' ) );
        add_action( 'wp_ajax_' . $this->plugin->name . '_dismiss_dashboard_notices', array( &$this, 'dismissDashboardNotices' ) );
		add_action( 'wp_footer', array( &$this, 'frontendFooter' ) );

		// Filters
		add_filter( 'dashboard_secondary_items', array( &$this, 'dashboardSecondaryItems' ) );
	}

    /**
     * Number of Secondary feed items to show
     */
	function dashboardSecondaryItems() {
		return 6;
	}
    /**
     * Show relevant notices for the plugin
     */
    function dashboardNotices() {
        global $pagenow;

        if ( !get_option( $this->plugin->db_welcome_dismissed_key ) ) {
        	if ( ! ( $pagenow == 'options-general.php' && isset( $_GET['page'] ) && $_GET['page'] == 'nagishly' ) ) {
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
		register_setting( $this->plugin->name, 'ngly_insert_footer', 'trim' );
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
	    		update_option( 'ngly_insert_footer', $_REQUEST['ngly_insert_footer'] );
	    		update_option( $this->plugin->db_welcome_dismissed_key, 1 );
				$this->message = __( 'Settings Saved.', $this->plugin->name );
			}
        }

        // Get latest settings
        $this->settings = array(
			'ngly_insert_footer' => esc_html( wp_unslash( get_option( 'ngly_insert_footer' ) ) ),
        );

    	// Load Settings Form
        include_once( WP_PLUGIN_DIR . '/' . $this->plugin->name . '/views/settings.php' );
    }

    /**
	* Loads plugin textdomain
	*/
	function loadLanguageFiles() {
		load_plugin_textdomain( $this->plugin->name, false, $this->plugin->name . '/languages/' );
	}

	/**
	* Outputs Nagishly script
	*/
	function frontendFooter() {
		$this->output( 'ngly_insert_footer' );
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

$ngly = new nagishly();