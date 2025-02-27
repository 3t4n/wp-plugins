<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Hide_Anything_Rest_Api_Controller' ) ) {
	class Hide_Anything_Rest_Api_Controller extends WP_REST_Controller {
		/** @var null */
		private static $instance = null;

		/**
		 * Hide_Anything_Rest_Api_Controller constructor.
		 */
		public function __construct() {
			$this->namespace = 'hide-anything/v1';

		}

		/**
		 * Register REST API routes
		 *
		 * @since 1.0.0
		 */
		public function register_routes() {

			//update settings
			register_rest_route( $this->namespace, '/settings/', array(
				array(
					'methods'             => WP_REST_Server::EDITABLE,
					'callback'            => array( $this, 'update_settings' ),
					'permission_callback' => array( $this, 'check_permission' ),
				),
			) );

		}

		public function update_settings( $request ) {
			$posted = json_decode( $request->get_body() );

			$data = [
				'enableBackend'  => ! empty( $posted->enableBackend ) ? sanitize_key( $posted->enableBackend ) : 'on',
				'enableFrontend' => ! empty( $posted->enableFrontend ) ? sanitize_key( $posted->enableFrontend ) : 'on',
			];

			update_option( 'hide_anything_settings', $data );

			wp_send_json_success();
		}

		/**
		 * @return bool
		 */
		public function check_permission() {
			return current_user_can( 'manage_options' );
		}

		/**
		 * @return Hide_Anything_Rest_Api_Controller|null
		 */
		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}
	}

}