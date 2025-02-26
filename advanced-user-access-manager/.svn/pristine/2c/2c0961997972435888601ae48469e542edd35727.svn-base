<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'AUAM_Admin_Menu' ) ) {
	
	/**
	 * Main AUAM_Admin_Menu class
	 *
	 * @since       1.0.0
	 */
	class AUAM_Admin_Menu {

		/**
		 * Singleton pattern
		 *
		 * @var bool $instance
		 */
		private static $instance = false;

		/**
		 * Initializes the AUAM_Admin_Menu class.
		 *
		 * Checks for an existing AUAM_Admin_Menu instance
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

		public function __construct() {
			add_action( 'admin_menu', array( $this, 'auam_add_page_menu' ) );

		}

		/**
		 * Add page restriction menu
		 *
		 * @since 1.0.2
		 * @access public
		 * @return void
		 */
		public function auam_add_page_menu() {

			add_menu_page(
				__( 'Advanced User Access Manager', 'advanced-user-access-manager' ),
				'AUA Manager',
				'manage_options',
				'auam',
				array( $this, 'auam_setting_templage' ),
				'dashicons-privacy', 6,
				
			);

		}

		public function auam_setting_templage(){
			require_once( AUAM_DIR . 'includes/settings/settings.php' );
		}
	}

} // AUAM_Admin_Menu

AUAM_Admin_Menu::instance();
