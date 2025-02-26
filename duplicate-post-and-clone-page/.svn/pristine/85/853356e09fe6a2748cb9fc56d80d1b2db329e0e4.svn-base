<?php
/**
 * The sdk-specific functionality of the plugin.
 *
 * @link
 * @since 1.0.0
 *
 * @package HTO_SDK_V1/SDK
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'HTO_SDK_V1' ) ) {
	/**
	 * The sdk-specific functionality of the plugin.
	 *
	 * Defines the sdk configuration, popup consent title, description, and api endpoint
	 * enqueue the admin-specific stylesheet and JavaScript.
	 *
	 * @package    HTO_SDK_V1
	 * @subpackage HTO_SDK_V1/SDK
	 * @author     Shahin Moyshun <shahin.moyshan2@gmail.com>
	 */
	class HTO_SDK_V1 {
		/**
		 * The version of SDK.
		 *
		 * @since  1.0.0
		 * @access protected
		 * @var    string    $version    The version of the sdk.
		 */
		protected string $version;

		/**
		 * The config for this sdk.
		 *
		 * @since  1.0.0
		 * @access protected
		 * @var    array    $config    The config for this sdk.
		 */
		protected array $config;

		/**
		 * User Accepted Consent or not from db.
		 *
		 * @since  1.0.0
		 * @access protected
		 * @var    string    $hto_status_db    user consent status from db.
		 */
		protected string $hto_status_db;

		/**
		 * Register Multiple Popup.
		 *
		 * @since  1.0.0
		 * @access protected
		 * @var    array    $registered_popup    register multiple popup.
		 */
		protected static array $registered_popup = array();

		/**
		 * Check if already popup initialized or not.
		 *
		 * @since  1.0.0
		 * @access protected
		 * @var    bool    $already_initialized    is already initialized.
		 */
		protected static bool $already_initialized = false;

		/**
		 * Check if already sdk hook initialized or not.
		 *
		 * @since  1.0.0
		 * @access protected
		 * @var    bool    $hook_initialized    is already hook initialized.
		 */
		protected static bool $hook_initialized = false;

		/**
		 * Initialize the sdk and set its configuration.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {
			$this->version = '1.0.0';

			$this->hto_status_db = get_option( 'hto_sdk_v1_allow_status', false );
		}

		/**
		 * Initialize the sdk and set its configuration.
		 *
		 * @since 1.0.0
		 * @param array $config The configuration for this sdk.
		 */
		public static function register( $config ) {
			self::$registered_popup[] = $config;
		}

		/**
		 * Check if Sdk Hook already initialized.
		 *
		 * @since 1.0.0
		 */
		public static function is_already_hook_initialized() {
			return true === self::$hook_initialized;
		}

		/**
		 * Set Sdk Hook initialized.
		 *
		 * @since 1.0.0
		 */
		public static function set_hook_initialized() {
			self::$hook_initialized = true;
		}

		/**
		 * Check if Popup already initialized.
		 *
		 * @since 1.0.0
		 */
		public function is_already_sdk_initialized() {
			return true === self::$already_initialized;
		}

		/**
		 * Initialize the sdk popup.
		 *
		 * @since 1.0.0
		 */
		public function initialize_sdk_popup() {

			self::$already_initialized = true;

			$this->config = $this->match_relevant_popup_config();

			if ( ! $this->hto_status_db ) {
				$this->render_consent();
				return;
			}

			if ( 'skip' === $this->hto_status_db && $this->check_date() ) {
				$this->render_consent();
				return;
			}

			if ( ! $this->check_date() ) {
				return;
			}

			$hto_count_name = 'hto_sdk_v1_attempt_count';
			$hto_attempt    = get_option( $hto_count_name, 0 );

			if ( ! $hto_attempt ) {
				update_option( $hto_count_name, 1 );
			}

			update_option( $hto_count_name, $hto_attempt + 1 );

			// Next schedule date for attempt.
			update_option( 'hto_sdk_v1_status_date', gmdate( 'Y-m-d', strtotime( '+1 month' ) ) );

			// Prepare data and send to backend server.
			$this->prepare_and_send_data();
		}

		/**
		 * Find the Relevant Popup Config from Url Match.
		 *
		 * @since 1.0.0
		 */
		public function match_relevant_popup_config() {
			foreach ( self::$registered_popup as $config ) {
				if ( $this->is_popup_valid( $config ) ) {
					return $config;
				}
			}

			// Not Found Relevant Popup then show last register notice.
			return $config;
		}

		/**
		 * Return the sdk initialized config.
		 *
		 * @since 1.0.0
		 */
		public function get_sdk_config() {
			return $this->config;
		}

		/**
		 * Return all the registered sdk configs.
		 *
		 * @since 1.0.0
		 */
		public function get_registered_configs() {
			return self::$registered_popup;
		}

		/**
		 * Check if user accepted the consent or not.
		 *
		 * @since 1.0.0
		 */
		public function accept_concent() {
			return 'yes' === $this->hto_status_db;
		}

		/**
		 * Prepare and send data to backend api.
		 *
		 * @since 1.0.0
		 */
		public function prepare_and_send_data() {
			$server_url  = isset( $this->config['server_url'] ) ? $this->config['server_url'] : false;
			$public_key  = isset( $this->config['public_key'] ) ? $this->config['public_key'] : false;
			$custom_data = isset( $this->config['custom_data'] ) ? $this->config['custom_data'] : false;

			if ( ! $server_url || ! $public_key ) {
				return;
			}

			$data                = array();
			$data['custom_data'] = $custom_data;

			$non_sensitive_data = $this->hto_non_sensitive_data();
			$data               = array_merge( $data, $non_sensitive_data );

			$this->hto_send_data_to_server( $server_url, $public_key, $data );
		}

		/**
		 * Send Data to backend server through api.
		 *
		 * @param string $server_url Backend Api Endpoint.
		 * @param string $public_key Backend Api Authentication Token.
		 * @param array  $data The data to be send to backend.
		 * @since 1.0.0
		 */
		public function hto_send_data_to_server( $server_url, $public_key, $data = array() ) {
			$args = array(
				'method'    => 'POST',
				'timeout'   => 60,
				'sslverify' => false,
				'headers'   => array(
					'X-API-KEY'    => $public_key,
					'Content-Type' => 'application/json',
					'Accept'       => 'application/json',
				),
				'body'      => wp_json_encode( $data ),
			);

			$response = wp_remote_request( $server_url, $args );

			if ( is_wp_error( $response ) ) {
				$this->hto_reset_settings();
			} else {
				$response_data = wp_remote_retrieve_body( $response );
				$response_data = json_decode( $response_data, true );

				if ( isset( $response_data['data']['status'] ) && 401 === $response_data['data']['status'] ) {
					update_option( 'hto_sdk_v1_status_date', gmdate( 'Y-m-d', strtotime( '+3 days' ) ) );
				}
			}
		}

		/**
		 * Reset SDK settings.
		 *
		 * @since 1.0.0
		 */
		public function hto_reset_settings() {
			delete_option( 'hto_sdk_v1_allow_status' );
			delete_option( 'hto_sdk_v1_status_date' );
		}

		/**
		 * Get WordPress Non-Sanative Data.
		 *
		 * @since 1.0.0
		 */
		public function hto_non_sensitive_data() {
			$current_user = wp_get_current_user();

			$first_name = $current_user->first_name;
			$last_name  = $current_user->last_name;

			if ( empty( $first_name ) && empty( $last_name ) ) {
				$first_name = null;
				$last_name  = $current_user->display_name;
			}

			if ( ! function_exists( 'get_plugins' ) ) {
				require_once ABSPATH . 'wp-admin/includes/plugin.php';
			}

			$data = array(
				'first_name'        => $first_name,
				'last_name'         => $last_name,
				'display_name'      => $current_user->display_name,
				'email'             => $current_user->user_email,
				'user_role'         => $current_user->roles[0],
				'website_url'       => $current_user->user_url,
				'installed_plugins' => get_plugins(),
				'website_data'      => array(
					'website_name' => get_bloginfo( 'name' ),
					'wp_version'   => get_bloginfo( 'version' ),
					'php_version'  => phpversion(),
					'locale'       => get_locale(),
					'sdk_version'  => $this->version,
				),
			);

			return $data;
		}

		/**
		 * Check date of skipped of expire.
		 *
		 * @since 1.0.0
		 * @return bool
		 */
		public function check_date() {
			$current_date    = strtotime( gmdate( 'Y-m-d' ) );
			$hto_status_date = strtotime( get_option( 'hto_sdk_v1_status_date', false ) );

			if ( ! $hto_status_date ) {
				return true;
			}

			if ( $hto_status_date && $current_date >= $hto_status_date ) {
				return true;
			}

			return false;
		}

		/**
		 * Render Consent Popup & Notice.
		 *
		 * @since 1.0.0
		 */
		public function render_consent() {
			// enqueue popup stylesheet and javascript file.
			$this->init_hto_hooks();

			if ( $this->is_popup_valid( $this->config ) ) {
				$this->render_popup();
				return;
			}

			if ( ! get_transient( 'dismissed_notice_hto_sdk_v1' ) ) {
				$this->render_notice();
			}
		}

		/**
		 * Check if current URI is valid to render consent popup.
		 *
		 * @since 1.0.0
		 * @param array $config popup configuration.
		 * @return bool
		 */
		public function is_popup_valid( $config ) {
			// check if valid slug to render consent popup.
			$current_uri = $this->get_current_admin_uri();

			foreach ( (array) $config['slug'] as $uri ) {
				if ( $this->match_exists_uri( $uri, $current_uri ) ) {
					return true;
				}
			}

			return false;
		}

		/**
		 * Render consent popup on current URI.
		 *
		 * @since 1.0.0
		 */
		public function render_popup() {
			// render popup output.
			add_action( 'in_admin_header', array( $this, 'display_popup' ), 99999 );
		}

		/**
		 * Init Hooks to include stylesheet and javascript for SKD .
		 *
		 * @since 1.0.0
		 */
		public function init_hto_hooks() {
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_hto_sdk_scripts' ) );
			add_action( 'wp_ajax_hto_sdk_v1_insights', array( $this, 'hto_sdk_insights' ) );
			add_action( 'wp_ajax_hto_sdk_v1_dismiss_notice', array( $this, 'hto_sdk_dismiss_notice' ) );
		}

		/**
		 * Sdk accept action ajax request.
		 *
		 * @since 1.0.0
		 */
		public function hto_sdk_insights() {
			$sanitized_status = isset( $_POST['button_val'] ) ? sanitize_text_field( wp_unslash( $_POST['button_val'] ) ) : '';
			$nonce            = isset( $_POST['nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['nonce'] ) ) : '';

			if ( ! wp_verify_nonce( $nonce, 'hto_sdk_v1' ) ) {
				wp_send_json(
					array(
						'status'  => 'error',
						'title'   => 'Error',
						'message' => 'Nonce verification failed',
					)
				);
				wp_die();
			}

			if ( 'skip' === $sanitized_status ) {
				update_option( 'hto_sdk_v1_allow_status', 'skip' );
				// Next schedule date for attempt.
				update_option( 'hto_sdk_v1_status_date', gmdate( 'Y-m-d', strtotime( '+1 month' ) ) );
			} elseif ( 'yes' === $sanitized_status ) {
				update_option( 'hto_sdk_v1_allow_status', 'yes' );
			}

			wp_send_json(
				array(
					'status'  => 'success',
					'title'   => 'Success',
					'message' => 'Success.',
				)
			);
			wp_die();
		}

		/**
		 * Sdk Ajax dismiss global notice.
		 *
		 * @since 1.0.0
		 */
		public function hto_sdk_dismiss_notice() {
			$nonce = isset( $_POST['nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['nonce'] ) ) : '';

			if ( ! wp_verify_nonce( $nonce, 'hto_sdk_v1' ) ) {
				wp_send_json(
					array(
						'status'  => 'error',
						'title'   => 'Error',
						'message' => 'Nonce verification failed',
					)
				);
				wp_die();
			}

			set_transient( 'dismissed_notice_hto_sdk_v1', true, 30 * DAY_IN_SECONDS );

			wp_send_json(
				array(
					'status'  => 'success',
					'title'   => 'Success',
					'message' => 'Success.',
				)
			);
			wp_die();
		}

		/**
		 * Enqueue Stylesheet and Scripts File for Popup.
		 *
		 * @since 1.0.0
		 */
		public function enqueue_hto_sdk_scripts() {
			global $wp_scripts;

			wp_enqueue_style( 'hto-sdk-v1', plugin_dir_url( __FILE__ ) . 'css/hto-sdk.css', array(), '1.0', 'all' );
			wp_enqueue_script( 'hto-sdk-v1', plugin_dir_url( __FILE__ ) . 'js/hto-sdk.js', array( 'jquery' ), '1.0', true );

			if ( empty( $wp_scripts->get_data( 'hto-sdk-v1', 'data' ) ) ) {
				wp_localize_script(
					'hto-sdk-v1',
					'HTO_SDK_V1',
					array(
						'ajax_url' => admin_url( 'admin-ajax.php' ),
						'nonce'    => wp_create_nonce( 'hto_sdk_v1' ),
					)
				);
			}
		}

		/**
		 * Display the consent popup.
		 *
		 * @since 1.0.0
		 */
		public function display_popup() {
			$popup = $this->config['popup'];

			include __DIR__ . '/partials/hto-sdk-popup.php';
		}

		/**
		 * Display the consent notice.
		 *
		 * @since 1.0.0
		 */
		public function display_global_notice() {
			$notice = $this->config['notice'];

			include __DIR__ . '/partials/hto-sdk-notice.php';
		}

		/**
		 * Render consent notice on current URI.
		 *
		 * @since 1.0.0
		 */
		public function render_notice() {
			// render notice output.
			add_action( 'admin_notices', array( $this, 'display_global_notice' ) );
		}

		/**
		 * Get the base URL of the current admin page, with query params.
		 *
		 * @access protected
		 * @return string
		 */
		protected function get_current_admin_uri() {
			return isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';
		}

		/**
		 * Match URI with each other.
		 *
		 * @access protected
		 * @param string $uri The URI to be matched with.
		 * @param string $current_uri The Base URI to be matched.
		 * @return bool
		 */
		protected function match_exists_uri( $uri, $current_uri ) {
			if ( strpos( $uri, '*' ) !== false && strpos( $current_uri, substr( $uri, 0, -1 ) ) !== false ) {
				return true;
			}

			return stripos( $current_uri, $uri ) !== false;
		}
	}
}
