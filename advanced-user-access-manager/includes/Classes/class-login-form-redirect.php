<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'AUAM_Login_Form_Redirect' ) ) {
	
	/**
	 * Main AUAM_Login_Form_Redirect class
	 *
	 * @since       1.0.0
	 */
	class AUAM_Login_Form_Redirect {

		/**
		 * Singleton pattern
		 *
		 * @var bool $instance
		 */
		private static $instance = false;

		/**
		 * Initializes the AUAM_Login_Form_Redirect class.
		 *
		 * Checks for an existing AUAM_Login_Form_Redirect instance
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
            add_action( 'login_redirect', array( $this, 'auam_redirect_after_login' ) );
			add_action( 'wp_logout', array( $this, 'auam_redirect_after_logout' ) );

		}

		/**
		 * Redirect page after login func
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function auam_redirect_after_login ( ) {
			$settings = auam_user_access_get_settings();

			if ( 'url' === $settings['login_redirect_type'] && ! empty( $settings['after_login_redirect'] ) ) {
				$redirect = $settings['after_login_redirect_url'];

			} elseif ( 'page' === $settings['login_redirect_type'] && ! empty( $settings['after_login_redirect'] ) ) {
				$redirect = get_permalink( $settings['after_login_redirect'] );
				
			}
			
			if ( empty( $redirect ) ){
				$redirect = admin_url();
			}

			return $redirect;
		}

		/**
		 * Redirect page after logout func
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function auam_redirect_after_logout() {
			$settings = auam_user_access_get_settings();

			if ( 'url' === $settings['login_redirect_type'] && ! empty( $settings['after_logout_redirect'] ) ) {
				$redirect = $settings['after_logout_redirect_url'];

			} elseif ( 'page' === $settings['login_redirect_type'] && ! empty( $settings['after_logout_redirect'] ) ) {
				$redirect = get_permalink( $settings['after_logout_redirect'] );
				
			}

			if ( empty( $redirect ) ) {
				$redirect = home_url();
			}

			wp_redirect( $redirect ); 
			exit();

		}
	}

} // AUAM_Login_Form_Redirect

AUAM_Login_Form_Redirect::instance();
