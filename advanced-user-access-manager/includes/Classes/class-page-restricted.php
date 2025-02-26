<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'AUAM_Page_Restrict' ) ) {
	
	/**
	 * Main AUAM_Page_Restrict class
	 *
	 * @since       1.0.0
	 */
	class AUAM_Page_Restrict {

		/**
		 * Singleton pattern
		 *
		 * @var bool $instance
		 */
		private static $instance = false;

		/**
		 * Initializes the AUAM_Page_Restrict class.
		 *
		 * Checks for an existing AUAM_Page_Restrict instance
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
			add_action( 'template_redirect', array( $this, 'auam_check_page_restriction' ), 1 );
			add_filter( 'the_content', array( $this, 'auam_display_login_form_page_restriction' ) );

		}

		/**
		 * Checks if current request is for a restricted page
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function auam_check_page_restriction() {

			$settings = auam_user_access_get_settings();
			$enable_restriction = $settings['enable_restriction'];
			$all_page_restriction = empty( $settings['all_page_restrict'] ) ? 0 : 1;

			if ( 'yes' !== $enable_restriction )  {
				return;
			}

			if ( is_user_logged_in() ) {
				return;
			}

			if ( is_page( $settings['advance_login_form'] ) ) {
				if ( 'yes' === $settings['advance_rd_lform'] ) {
					if ( get_permalink() != wp_login_url() && ! is_user_logged_in() ){
						wp_redirect( wp_login_url() ); exit;
					}
				}
			}

			if ( $all_page_restriction ) {
				return;
			}

			if ( is_page( $settings['login_page'] ) ) {
				return;
			}

			

			if ( is_page( $settings['login_user_page'] ) ) {
				$redirect_url = '';

				if ( 'yes' === $settings['show_login_form'] ) {
					return;
				}

				if ( 'url' === $settings['redirect_type'] && ! empty( $settings['redirect_url'] ) ) {
					$redirect_url = $settings['redirect_url'];
				} elseif ( 'page' === $settings['redirect_type'] && ! empty( $settings['login_page'] ) ) {
					$redirect_url = get_permalink( $settings['login_page'] );
	
				}

				if ( empty( $redirect_url ) ) {
					$redirect_url = home_url( '/' );
				}
				
				wp_redirect( $redirect_url );

				exit;
			}
			
		}

		/**
		 * Display login form of the page restrict
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function auam_display_login_form_page_restriction( $content ) {
			$settings = auam_user_access_get_settings();
			$enable_restriction = $settings['enable_restriction'];
			$all_page_restriction = empty( $settings['all_page_restrict'] ) ? 0 : 1;

			if ( 'yes' !== $enable_restriction ) {
				return $content;
			}

			if ( is_user_logged_in() ) {
				return $content;
			}

			if ( 1 === $all_page_restriction ) {
				if ( 'yes' === $settings['show_login_form'] ) {
					$content = wp_login_form();
				} else {
					$content = '<h4>You are required to login to view this page.</h4>';
				}

				return $content;
			}

			if ( is_page( $settings['login_user_page'] ) ) {
				if ( 'yes' === $settings['show_login_form'] ) {
					$content = wp_login_form();
				} else {
					$content = '<h4>You are required to login to view this page.</h4>';
				}	
			}

			return $content;

		}
	}

} // AUAM_Page_Restrict

AUAM_Page_Restrict::instance();
