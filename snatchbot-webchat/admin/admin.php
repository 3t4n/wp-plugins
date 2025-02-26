<?php 

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('SBW_Admin') ) :
	
class SBW_Admin {
	
	/**
	 * __construct
	 *
	 * Sets up the class functionality.
	 *
	 * @date	23/11/19
	 * @since	1.0.0
	 *
	 * @param	void
	 * @return	void
	 */
	 function __construct() {
		
		// Add hooks.
		add_action( 'admin_menu', 				array( $this, 'admin_menu' ) );
		add_action( 'admin_enqueue_scripts',	array( $this, 'admin_enqueue_scripts' ) );
	}
	
	/**
	 * admin_menu
	 *
	 * Adds the SBW menu item.
	 *
	 * @date	23/11/19
	 * @since	1.0.0
	 *
	 * @param	void
	 * @return	void
	 */
	function admin_menu() {
		// Vars.
		$slug = esc_html('snatchbot_webchat');
		$cap = esc_html('manage_options');
		$assetPaths = sbw_get_paths();
		if ( current_user_can( 'manage_options' ) ) {
			add_menu_page( __("SnatchBot Webchat",'sbw'), __("SnatchBot Webchat",'sbw'), $cap, $slug, array($this, 'add_my_page'), $assetPaths['images']['favicons'], '50' );
		}
	}
	
	/**
	 * admin_enqueue_scripts
	 *
	 * Enqueues global admin scripts and styling.
	 *
	 * @date	23/11/19
	 * @since	1.0.0
	 *
	 * @param	void
	 * @return	void
	 */
	function admin_enqueue_scripts( $hook_suffix ){
		$current_screen = get_current_screen();
		
		if ( current_user_can( 'manage_options' ) ) { //install_plugins
			if (strpos($current_screen->id, 'snatchbot_webchat') !== false ) {
				$assetPaths = sbw_get_paths();
				wp_enqueue_style('easyDeployCSS', $assetPaths['files']['myStyleCSS'] );
				wp_enqueue_style('BotsTableCSS', $assetPaths['files']['BotsTableCSS'] );
			}
		}
	}

	/**
	 * admin_enqueue_scripts
	 *
	 * add page to administrator site
	 *
	 * @date	23/11/19
	 * @since	1.0.0
	 *
	 * @param	void
	 * @return	void
	 */
	function add_my_page() {

		global $wpdb; 
		$table = $wpdb->prefix . 'snatchbot_webchat';
		$current_screen = get_current_screen();
		$assetPaths = sbw_get_paths();
		
		$wp_user_id = null;
		if ( current_user_can( 'manage_options' ) ) { //install_plugins
			$wp_user_id = get_current_user_id();
			$user = $wpdb->get_results( $wpdb->prepare("SELECT * FROM $table WHERE  wp_user_id = %d", $wp_user_id) );
			if (!isset($user[0])) {
				$wpdb->insert( $table, array(
					"wp_user_id" => (int) $wp_user_id,
				));
				$user = $wpdb->get_results( $wpdb->prepare("SELECT * FROM $table WHERE  wp_user_id = %d", $wp_user_id) );
			}
			$wp_esc_user = sbw_esc_checking_db($user[0]);
			if (isset($wp_esc_user) && strpos($current_screen->id, 'snatchbot_webchat') !== false ) {
				sbw_get_view('Ajax-view.php', $wp_esc_user, $assetPaths['images']);
			}
		}
	}
}

// Instantiate.
sbw_new_instance('SBW_Admin');

endif; // class_exists check
