<?php
/**
 * Plugin Name:        Advanced User Access Manager
 * Plugin URI:         https://github.com/ariful93/advanced-user-access-manager
 * Description:        Introducing Advanced User Access Manager for WordPress – your go-to solution for precise user control. Easily restrict page access, customize login redirect, and redesign your login page. Take charge of your WordPress experience effortlessly with Advanced User Access Manager.
 * Author:             WPFound
 * Author URI:         https://github.com/ariful93
 * Version:            1.0.2
 * Requires at least:  6.4
 * Requires PHP:       7.2
 * License:            GPL-2.0-or-later
 * Text Domain:        advanced-user-access-manager
 *
 * @package         AUAM_Advanced_User_Access_Manager
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'AUAM_Advanced_User_Access_Manager' ) ) {

	/**
	 * Main AUAM_Advanced_User_Access_Manager class
	 *
	 * @since       1.0.0
	 */
	class AUAM_Advanced_User_Access_Manager {

		/**
		 * Singleton pattern
		 *
		 * @var bool $instance
		 */
		private static $instance = false;

		/**
		 * Initializes the AUAM_Advanced_User_Access_Manager class.
		 *
		 * Checks for an existing AUAM_Advanced_User_Access_Manager instance
		 * and if it can't find one, then creates it.
		 *
		 * @since 1.0.0
		 *
		 * @return self
		 */
		public static function instance() {
			if ( ! self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Constructor for the AUAM_Advanced_User_Access_Manager class
		 *
		 * Sets up all the appropriate hooks and actions
		 * within our plugin.
		 *
		 * @return void
		 */
		public function __construct() {
			$this->hooks();
			$this->define_constants();
		}

		/**
		 * Setup plugin define constants
		 *
		 * @since       1.0.0
		 * @return      void
		 */
		private function define_constants() {

			/**
			 * Define the version of auam.
			 *
			 * @since 1.0.0
			 */
			define( 'AUAM_VERSION', '1.0.0' );

			/**
			 * Define the dir of auam.
			 *
			 * @since 1.0.0
			 */
			define( 'AUAM_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );

			/**
			 * Define the url of auam.
			 *
			 * @since 1.0.0
			 */
			define( 'AUAM_URL', plugin_dir_url( __FILE__ ) );

		}

		/**
		 * Load all hooks
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function hooks() {
			add_action( 'init', array( $this, 'auam_load_template' ) );

		}

		/**
		 * Load template file
		 *
		 * @since       1.0.0
		 * @return      void
		 */
		public function auam_load_template() {
			require_once AUAM_DIR . 'includes/functions.php';
			require_once AUAM_DIR . 'includes/login-inline-css.php';
			
			// Classes
			require_once AUAM_DIR . 'includes/Classes/class-admin-menu.php';
			require_once AUAM_DIR . 'includes/Classes/class-admin-login-form-customize.php';
			require_once AUAM_DIR . 'includes/Classes/class-login-form-redirect.php';
			require_once AUAM_DIR . 'includes/Classes/class-page-restricted.php';
			require_once AUAM_DIR . 'includes/Classes/class-scripts-style.php';
		}

	}   

} // AUAM_Advanced_User_Access_Manager

AUAM_Advanced_User_Access_Manager::instance();