<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
@package Wp Instagram Feed Awplife
Plugin Name: Social Media Feed
Description: Instagram Feed Gallery Plugin For WordPress allows you to fetch your Instagram feeds to your WordPress website.
Version: 1.4.2
Author: A WP Life
Author URI: https://awplife.com/
License: GPLv2 or later
Text Domain: wp-instagram-feed-awplife
Domain Path: /languages
*/

if ( ! class_exists( 'Instagram_Feed_Awplife' ) ) {

	class Instagram_Feed_Awplife {
		
		protected $protected_plugin_api;
		protected $ajax_plugin_nonce;
		
		public function __construct() {
			$this->_constants();
			$this->_hooks();
		}
		
		protected function _constants() {
			//Plugin Version
			define( 'IFGP_PLUGIN_VER', '1.4.2' );
			
			//Plugin Text Domain
			define("IFGP_TXTDM", "wp-instagram-feed-awplife" );

			//Plugin Name
			define( 'IFGP_PLUGIN_NAME', __( 'Wp-Instagram-Feed-Awplife', IFGP_TXTDM ) );

			//Plugin Slug
			define( 'IFGP_PLUGIN_SLUG', 'wp-instagram-feed-awplife' );

			//Plugin Directory Path
			define( 'IFGP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

			//Plugin Directory URL
			define( 'IFGP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

			/**
			 * Create a key for the .htaccess secure download link.
			 * @uses    NONCE_KEY     Defined in the WP root config.php
			 */
			define( 'IFGP_SECURE_KEY', md5( NONCE_KEY ) );
			
		} // end of constructor function
		
		/**
		 * Setup the default filters and actions
		 */
		protected function _hooks() {
			//Load text domain
			add_action( 'plugins_loaded', array( $this, '_load_textdomain' ) );
			
			//add instagram type gallery menu item, change menu filter for multisite
			add_action( 'admin_menu', array( $this, 'instagram_feed_menu' ) );
		
			add_action( 'wp_enqueue_scripts', array(&$this, 'enqueue_scripts_in_header') );
		
		}// end of hook function
		
		public function enqueue_scripts_in_header() {
			wp_enqueue_script('jquery');
		}
		
		/**
		 * Loads the text domain.
		 */
		public function _load_textdomain() {
			load_plugin_textdomain( 'wp-instagram-feed-awplife', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
		}
		
		/**
		 * Adds the Instagram Feed menu item
		 */
		public function instagram_feed_menu() {
			$icon =  IFGP_PLUGIN_URL  . '/img/insta-icon.png';
			add_menu_page( 'Instagram Feed', 'Instagram Feed', 'administrator', 'wp-instagram-feed-awplife', array( $this, 'wp_instagram_feed_settings_page'), $icon , 65);
		}
		
		public function wp_instagram_feed_settings_page() {
			require_once('setting.php');
		}
		
		
	} // end of class

	/**
	 * Instantiates the Class
	 * @since     1.0
	 * @global    object	$ifgp_gallery_object
	 */
	$igp_gallery_object = new Instagram_Feed_Awplife();
	require_once('shortcode.php');
} // end of class exists
?>