<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'AUAM_Enqueue_Scripts' ) ) {
	
	/**
	 * Main AUAM_Enqueue_Scripts class
	 *
	 * @since       1.0.0
	 */
	class AUAM_Enqueue_Scripts {

		/**
		 * Singleton pattern
		 *
		 * @var bool $instance
		 */
		private static $instance = false;

		/**
		 * Initializes the AUAM_Enqueue_Scripts class.
		 *
		 * Checks for an existing AUAM_Enqueue_Scripts instance
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
            add_action( 'login_enqueue_scripts', array( $this, 'auam_login_page_enqueue_frontend_script' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'auam_get_enqueue_admin_scripts' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'auam_get_enqueue_frontend_script' ) );
            
		}

		/**
         * Load frontend script
         *
         * @since       1.0.0
         * @return      void
         */
        function auam_get_enqueue_frontend_script() {
            wp_enqueue_style(
                'auam-frontend-style',
                AUAM_URL . 'assets/css/default.css',
                array(),
                AUAM_VERSION
            );
        }

        /**
         * Load login page enqueue script
         *
         * @since       1.0.0
         * @return      void
         */
        function auam_login_page_enqueue_frontend_script() {
            wp_enqueue_style(
                'auam-login-frontend-style',
                AUAM_URL . 'assets/css/login-page.css',
                array(),
                AUAM_VERSION
            );
        }

        /**
         * Admin Enqueue style and scripts
         *
         * @access      public
         * @since       1.0.0
         * @return      void
         *
         */
        function auam_get_enqueue_admin_scripts() {

            $main_page = auam_get_admin_page_by_name();

            if ( auam_admin_page_restriction( 'admin.php', $main_page['slug'] ) ) {

                wp_enqueue_media(); // load media scripts

                wp_enqueue_style(
                    'auam-admin-style',
                    AUAM_URL . 'assets/admin/css/admin.css',
                    array(),
                    AUAM_VERSION
                );

                wp_enqueue_script(
                    'auam-admin-script',
                    AUAM_URL . 'assets/admin/js/admin.js',
                    array( 'jquery' ),
                    AUAM_VERSION,
                    true
                );

                wp_enqueue_script(
                    'auam-admin-tab-script',
                    AUAM_URL . 'assets/admin/js/tabs.js',
                    array( 'jquery' ),
                    AUAM_VERSION,
                    true
                );

                wp_enqueue_script( 'jquery-ui-tabs' );

            }

        }

	}

} // AUAM_Enqueue_Scripts

AUAM_Enqueue_Scripts::instance();
