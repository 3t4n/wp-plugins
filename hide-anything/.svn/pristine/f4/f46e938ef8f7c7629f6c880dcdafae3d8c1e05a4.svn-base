<?php

defined( 'ABSPATH' ) || exit();

if ( ! class_exists( 'Hide_Anything_Admin' ) ) {
	class Hide_Anything_Admin {
		/** @var null */
		private static $instance = null;

		/**
		 * WP_Podcasts_Admin constructor.
		 */
		public function __construct() {
			add_action( 'admin_menu', [ $this, 'admin_menu' ], 99 );
			add_action( 'admin_init', [ $this, 'activation_redirect' ] );
			add_action( 'admin_init', [ $this, 'init_update' ] );
		}

		public function init_update() {

			if ( current_user_can( 'manage_options' ) ) {
				include_once HIDE_ANYTHING_INCLUDES . '/class-update.php';

				$updater = Hide_Anything_Update::instance();
				if ( $updater->needs_update() ) {
					$updater->perform_updates();
				}
			}
		}

		public function activation_redirect() {
			if ( get_option( 'hide_anything_redirect' ) ) {
				delete_option( 'hide_anything_redirect' );

				wp_redirect( admin_url( 'options-general.php?page=hide-anything-settings' ) );
				die();
			}
		}


		/**
		 * Add admin menu
		 * @since 1.0.0
		 */
		public function admin_menu() {
			add_options_page( __( 'Hide Anything Settings', 'hide-anything' ), __( 'Hide Anything', 'hide-anything' ), 'manage_options', 'hide-anything-settings', [
				$this,
				'render_settings_page',
			] );
		}


		public function render_settings_page() { ?>
            <div id="hide_anything_settings_app"></div>
		<?php }


		/**
		 * @return Hide_Anything_Admin|null
		 */
		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}
	}

}

Hide_Anything_Admin::instance();