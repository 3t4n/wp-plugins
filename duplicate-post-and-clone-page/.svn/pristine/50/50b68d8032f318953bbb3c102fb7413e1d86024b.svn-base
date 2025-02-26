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

if ( ! class_exists( 'HTO_SDK_TRACER_V1' ) ) {
	/**
	 * The sdk-specific functionality of the plugin.
	 *
	 * Defines the sdk configuration, popup consent title, description, and api endpoint
	 * enqueue the admin-specific stylesheet and JavaScript.
	 *
	 * @package    HTO_SDK_TRACER_V1
	 * @subpackage HTO_SDK_TRACER_V1/SDK
	 * @author     Shahin Moyshun <shahin.moyshan2@gmail.com>
	 */
	class HTO_SDK_TRACER_V1 {
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
		 * Time Duration of Send Same Error to server.
		 *
		 * @since  1.0.0
		 * @access protected
		 * @var    int    $duration    timestamp of the duration.
		 */
		protected int $duration;

		/**
		 * Maximum number of cached error hash into database.
		 *
		 * @since  1.0.0
		 * @access protected
		 * @var    int    $max_cached    maximum number of caches.
		 */
		protected int $max_cached;

		/**
		 * Check if already error tracing or not.
		 *
		 * @since  1.0.0
		 * @access protected
		 * @var    bool    $already_tracing    is already tracing.
		 */
		protected static bool $already_tracing = false;

		/**
		 * Initialize the sdk and set its configuration.
		 *
		 * @since 1.0.0
		 * @param array $config The configuration for this sdk.
		 */
		public function __construct( $config ) {

			$this->version = '1.0.0';

			$this->config = $config;

			$this->duration = 86400 * 30; // 86400 = 1 day * 30 = 1 month

			$this->max_cached = 1000;
		}

		/**
		 * Check if Tracer already started or not.
		 *
		 * @since 1.0.0
		 */
		public function is_already_tracing() {
			return true === self::$already_tracing;
		}

		/**
		 * Start/Register Tracer Error Handler.
		 *
		 * @since 1.0.0
		 */
		public function start_tracing() {
			// tracing started.
			self::$already_tracing = true;

			// Set the custom error handler.
			set_error_handler( array( $this, 'error_tracer_handle_error' ) );

			// Set the custom exception handler.
			set_exception_handler( array( $this, 'error_tracer_handle_exception' ) );

			// Register the shutdown function.
			register_shutdown_function( array( $this, 'error_tracer_handle_shutdown' ) );
		}

		/**
		 * Custom error handler function.
		 *
		 * @param string $errno number of the error.
		 * @param string $errstr error message.
		 * @param string $errfile error file.
		 * @param string $errline error line number in file.
		 * @since 1.0.0
		 */
		public function error_tracer_handle_error( $errno, $errstr, $errfile, $errline ) {
			// Check if the error file is in one of the specified plugin directories.
			if ( ! $this->error_tracer_is_in_defined_dirs( $errfile ) ) {
				return false;
			}

			// Create an error array.
			$error = array(
				'errno'   => $errno,
				'errstr'  => $errstr,
				'errfile' => $errfile,
				'errline' => $errline,
				'context' => 'error',
			);

			// Send the error data to the backend server.
			$this->error_tracer_send_error( $error );

			// Continue with PHP's internal error handler.
			return false;
		}

		/**
		 * Custom exception handler function.
		 *
		 * @param mixed $exception throwable error exceptions.
		 * @since 1.0.0
		 */
		public function error_tracer_handle_exception( $exception ) {
			// Get the file and line where the exception occurred.
			$errfile = $exception->getFile();
			$errline = $exception->getLine();

			// Check if the exception file is in one of the specified plugin directories.
			if ( ! $this->error_tracer_is_in_defined_dirs( $errfile ) ) {
				return false;
			}

			// Create an error array.
			$error = array(
				'errno'   => $exception->getCode(),
				'errstr'  => $exception->getMessage(),
				'errfile' => $errfile,
				'errline' => $errline,
				'context' => 'exception',
			);

			// Send the error data to the backend server.
			$this->error_tracer_send_error( $error );
		}

		/**
		 * Shutdown function to catch fatal errors.
		 *
		 * @since 1.0.0
		 */
		public function error_tracer_handle_shutdown() {
			$error = error_get_last();

			if ( null !== $error && $this->error_tracer_is_in_defined_dirs( $error['file'] ) ) {
				// Send the error data to the backend server.
				$error['context'] = 'shutdown';

				$this->error_tracer_send_error( $error );
			}
		}

		/**
		 * Function to check if a file path is in one of the specified plugin directories.
		 *
		 * @param string $file error file path.
		 * @since 1.0.0
		 */
		public function error_tracer_is_in_defined_dirs( $file ) {
			// Convert to real path for accurate comparison.
			$real_file = realpath( $file );

			foreach ( (array) $this->config['trace_dirs'] as $plugin_dir ) {
				$real_plugin_dir = realpath( ABSPATH . 'wp-content/' . ltrim( $plugin_dir, '/' ) );
				if ( strpos( $real_file, $real_plugin_dir ) === 0 ) {
					return true;
				}
			}

			return false;
		}


		/**
		 * Function to send error data to the backend server.
		 *
		 * @param array $error WP Error details to send backend.
		 * @since 1.0.0
		 */
		public function error_tracer_send_error( $error ) {

			$server_url  = isset( $this->config['server_url'] ) ? $this->config['server_url'] : false;
			$public_key  = isset( $this->config['public_key'] ) ? $this->config['public_key'] : false;
			$custom_data = isset( $this->config['custom_data'] ) ? $this->config['custom_data'] : false;

			if ( ! $server_url || ! $public_key ) {
				return;
			}

			// Generate a hash for the error.
			$error_hash = md5( wp_json_encode( $error ) );

			// Check if the error hash is already cached.
			if ( $this->error_tracer_is_error_cached( $error_hash ) ) {
				return;
			}

			// Cache the error hash with the current timestamp.
			$this->error_tracer_cache_error( $error_hash );

			// Prepare all the data to send backend.
			$error_data = array(
				'error'        => $error,
				'custom_data'  => $custom_data,
				'website_data' => array(
					'website_url'  => get_bloginfo( 'url' ),
					'website_name' => get_bloginfo( 'name' ),
					'wp_version'   => get_bloginfo( 'version' ),
					'php_version'  => phpversion(),
					'locale'       => get_locale(),
					'sdk_version'  => $this->version,
				),
			);

			$response = wp_remote_post(
				$server_url,
				array(
					'method'    => 'POST',
					'timeout'   => 60,
					'sslverify' => false,
					'body'      => wp_json_encode( $error_data ),
					'headers'   => array(
						'X-API-KEY'    => $public_key,
						'Content-Type' => 'application/json',
						'Accept'       => 'application/json',
					),
				)
			);

			if ( is_wp_error( $response ) ) {
				// Handle the error.
				error_log( 'Error Tracer SDK: Failed to send error to backend. ' . $response->get_error_message() );
			}
		}

		/**
		 * Function to check if an error is cached.
		 *
		 * @param string $error_hash a hashed string of the whole error.
		 * @since 1.0.0
		 */
		public function error_tracer_is_error_cached( $error_hash ) {
			$cached_errors = get_option( 'hto_sdk_tracer_v1_cached_errors', array() );

			if ( isset( $cached_errors[ $error_hash ] ) && ( time() - $cached_errors[ $error_hash ] ) < $this->duration ) {
				return true;
			}

			return false;
		}

		/**
		 * Function to cache an error.
		 *
		 * @param string $error_hash a hashed string of the whole error.
		 * @since 1.0.0
		 */
		public function error_tracer_cache_error( $error_hash ) {
			$cached_errors = get_option( 'hto_sdk_tracer_v1_cached_errors', array() );

			// Remove the oldest entries if the cache size exceeds the maximum limit.
			if ( count( $cached_errors ) >= $this->max_cached ) {
				asort( $cached_errors );
				$cached_errors = array_slice( $cached_errors, -( $this->max_cached - 1 ), null, true );
			}

			// Add the new error to the cache.
			$cached_errors[ $error_hash ] = time();

			update_option( 'hto_sdk_tracer_v1_cached_errors', $cached_errors );
		}
	}
}
