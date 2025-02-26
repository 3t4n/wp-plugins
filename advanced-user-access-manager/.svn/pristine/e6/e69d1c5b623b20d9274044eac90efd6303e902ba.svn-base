<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'AUAM_Admin_Login_Form_Customize' ) ) {
	
	/**
	 * Main AUAM_Admin_Login_Form_Customize class
	 *
	 * @since       1.0.0
	 */
	class AUAM_Admin_Login_Form_Customize {

		/**
		 * Singleton pattern
		 *
		 * @var bool $instance
		 */
		private static $instance = false;

		/**
		 * Initializes the AUAM_Admin_Login_Form_Customize class.
		 *
		 * Checks for an existing AUAM_Admin_Login_Form_Customize instance
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
			add_filter( 'login_headerurl', array( $this, 'auam_login_logo_url' ) );
			add_filter( 'login_headertext', array( $this, 'auam_login_logo_url_title' ) );
			add_filter( 'login_body_class', array( $this, 'auam_add_body_calss_admin_login_page' ) );
		}

		/**
         * Modify login form logo url
         *
         * @return array
         */
        function auam_login_logo_url() {
            return home_url();
        }

        /**
         * Add login form title
         *
         * @return array
         */
        function auam_login_logo_url_title() {
            $login_form_title = get_option( 'auam_login_form_title' );
            return $login_form_title['login_form_title'];
        }

        /**
         * Add body class of login page
         *
         * @return array
         */
        function auam_add_body_calss_admin_login_page ( $classes ) {
            $classes[] = 'auam-login';
            return $classes;
        }
	}

} // AUAM_Admin_Login_Form_Customize

AUAM_Admin_Login_Form_Customize::instance();
