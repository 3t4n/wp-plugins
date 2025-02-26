<?php
/**
 * Plugin Name: Analytics Buddy
 * Description: Quickly and easily add Google Analytics to your site
 * Version: 1.0.2
 * Author: Frank Corso
 * Author URI: https://frankcorso.me/
 * Plugin URI: https://frankcorso.me/
 * Text Domain: analytics-buddy
 *
 * @author Frank Corso
 * @version 1.0.2
 * @package ANBU
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The main class of the plugin
 *
 * @since 1.0.0
 */
class Analytics_Buddy {

	/**
	 * The current version of the plugin
	 *
	 * @since 1.0.0
	 * @var string
	 */
	public $version = '1.0.2';

	/**
	 * Sets up the entire plugin
	 *
	 * @since 1.0.0
	 * @uses Analytics_Buddy::load_dependencies
	 * @uses Analytics_Buddy::init
	 */
	public function __construct() {
		$this->load_dependencies();
		$this->init();
	}

	/**
	 * Loads the other files of the plugin
	 *
	 * @since 1.0.0
	 */
	public function load_dependencies() {
	    if ( is_admin() ) {
            include 'php/settings-page.php';
            include 'php/class-anbu-review-manager.php';
        }
		include 'php/ga-code.php';
	}

	/**
	 * Sets up all actions and filters
	 *
	 * @since 1.0.0
	 * @uses ANBU_Settings_Page::init
	 */
	public function init() {
	    if ( is_admin() ) {
            ANBU_Settings_Page::init();
        }
		add_action( 'admin_menu', array( $this, 'setup_admin' ) );
		add_action( 'wp_head', 'anbu_add_ga_script' );
	}

	/**
	 * Configures admin pages
	 *
	 * @since 1.0.0
	 */
	public function setup_admin() {
		add_options_page( 'Analytics Buddy', 'Analytics Buddy', 'manage_options', 'analytics_buddy', array( 'ANBU_Settings_Page', 'display_page' ) );
	}

	/**
	 * Wrapper to get our settings
	 *
	 * @since 1.0.0
	 * @return array The array of settings
	 */
	public function get_settings() {
		$settings = get_option( 'anbu-settings', array() );
		$defaults = array(
			'tracking_id'  => '',
			'disable_user' => '0',
			'anonymize_ip' => '0',
			'do_not_track' => '0',
		);
		return wp_parse_args( $settings, $defaults );
	}
}

global $analytics_buddy;
$analytics_buddy = new Analytics_Buddy();
