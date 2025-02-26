<?php
/**
 * Handles plugin Constants
 *
 * @package embed-power-bi-reports\Wrappers
 */

namespace MoEmbedPowerBI\Wrappers;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class containing all wrapper functions to use.
 */
class wpWrapper {

	/**
	 * Holds the instance of WpWrapper class.
	 *
	 * @var WpWrapper
	 */
	private static $instance;

	/**
	 * Object instance(WpWrapper) getter method.
	 *
	 * @return WpWrapper
	 */
	public static function get_wrapper() {
		if ( ! isset( self::$instance ) ) {
			$class          = __CLASS__;
			self::$instance = new $class();
		}
		return self::$instance;
	}

	/**
	 * Function to set option value in database.
	 *
	 * @param mixed $key Stores the key on which the value will be stored.
	 * @param mixed $value Stores the value to be stored in the key.
	 * @return void
	 */
	public static function mo_epbr_set_option( $key, $value ) {
		if ( current_user_can( 'manage_options' ) ) {
			update_option( $key, $value );
		}
	}

	/**
	 * Function to get the option value from database.
	 *
	 * @param mixed $key Stores the option whose value is to be retrieved from the database.
	 * @return mixed
	 */
	public static function mo_epbr_get_option( $key ) {
		return get_option( $key );
	}

	/**
	 * Undocumented function
	 *
	 * @param mixed $key Stores the option which is to be deleted from the database.
	 * @return bool
	 */
	public static function mo_epbr_delete_option( $key ) {
		return delete_option( $key );
	}

	/**
	 * Function to show a red error notice.
	 *
	 * @param string $message Stores the error notice string to be displayed.
	 * @return void
	 */
	public static function mo_epbr__show_error_notice( $message ) {
		self::mo_epbr_set_option( pluginConstants::NOTICE_MESSAGE, $message );
		$hook_name = 'admin_notices';
		remove_action( $hook_name, array( self::get_wrapper(), 'mo_epbr_success_notice' ) );
		add_action( $hook_name, array( self::get_wrapper(), 'mo_epbr_error_notice' ) );
	}

	/**
	 * Function to show a green success notice.
	 *
	 * @param string $message Stores the success notice string to be displayed.
	 * @return void
	 */
	public static function mo_epbr__show_success_notice( $message ) {
		self::mo_epbr_set_option( pluginConstants::NOTICE_MESSAGE, $message );
		$hook_name = 'admin_notices';
		remove_action( $hook_name, array( self::get_wrapper(), 'mo_epbr_error_notice' ) );
		add_action( $hook_name, array( self::get_wrapper(), 'mo_epbr_success_notice' ) );
	}

	/**
	 * Function for html of success notice.
	 *
	 * @return void
	 */
	public function mo_epbr_success_notice() {
		$class   = 'updated';
		$message = self::mo_epbr_get_option( pluginConstants::NOTICE_MESSAGE );
		echo "<div class='" . esc_attr( $class ) . "'> <p>" . esc_html( $message ) . '</p></div>';
	}

	/**
	 * Function for html of error notice.
	 *
	 * @return void
	 */
	public function mo_epbr_error_notice() {
		$class   = 'error';
		$message = self::mo_epbr_get_option( pluginConstants::NOTICE_MESSAGE );
		echo "<div class='" . esc_attr( $class ) . "'> <p>" . esc_html( $message ) . '</p></div>';
	}

	/**
	 * Function to encrypt data.
	 *
	 * @param string $data The key=value pairs separated with &.
	 * @param mixed  $key The key value.
	 * @return string
	 */
	public static function mo_epbr_encrypt_data( $data, $key ) {
		$key       = openssl_digest( $key, 'sha256' );
		$method    = 'aes-128-ecb';
		$str_crypt = openssl_encrypt( $data, $method, $key, OPENSSL_RAW_DATA || OPENSSL_ZERO_PADDING );
		return base64_encode( $str_crypt ); // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.obfuscation_base64_encode -- Used for benign reasons as required.
	}

	/**
	 * Function to set session value.
	 *
	 * @param string $session_variable Stores the session variable value.
	 * @param mixed  $value Stores the value of the session variable.
	 * @return void
	 */
	public static function mo_epbr_set_session_value( $session_variable, $value ) {
		if ( ! session_id() || session_id() === '' || empty( $_SESSION ) ) {
			session_start();
		}
		$_SESSION[ $session_variable ] = $value;
	}

	/**
	 * Function to get session value.
	 *
	 * @param string $session_variable Stores the session variable value.
	 * @return string|array|mixed
	 */
	public static function mo_epbr_get_session_value( $session_variable ) {
		if ( ! session_id() || session_id() === '' || empty( $_SESSION ) ) {
			session_start();
		}
		$value = isset( $_SESSION[ $session_variable ] ) ? sanitize_text_field( wp_unslash( $_SESSION[ $session_variable ] ) ) : '';
		return $value;
	}

	/**
	 * Function to decrypt data.
	 *
	 * @param string $data Crypt response from Sagepay.
	 * @param [type] $key The key value.
	 * @return string
	 */
	public static function mo_epbr_decrypt_data( $data, $key ) {
		$str_in  = base64_decode( $data ); // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.obfuscation_base64_decode -- Used for benign reasons as required.
		$key     = openssl_digest( $key, 'sha256' );
		$method  = 'AES-128-ECB';
		$iv_size = openssl_cipher_iv_length( $method );
		$iv      = substr( $str_in, 0, $iv_size );
		$data    = substr( $str_in, $iv_size );
		$clear   = openssl_decrypt( $data, $method, $key, OPENSSL_RAW_DATA || OPENSSL_ZERO_PADDING, $iv );

		return $clear;
	}

	/**
	 * Function to flatten the attributes for array.
	 *
	 * @param mixed $details Contains the array to be flattened.
	 * @return array
	 */
	public static function mo_epbr_array_flatten_attributes( $details ) {
		$arr = array();
		foreach ( $details as $key => $value ) {
			if ( empty( $value ) ) {
				continue;}
			if ( ! is_array( $value ) ) {
				$arr[ $key ] = sanitize_text_field( $value );
			} else {
				self::mo_epbr_flatten_lvl_2( $key, $value, $arr );
			}
		}
		return $arr;
	}

	/**
	 * This function recursively flattens a multi-dimensional array and adds its elements to a flattened array.
	 * If the value of an element is an array, it recursively calls itself until it reaches a non-array value.
	 * The resulting flattened array is stored in the $haystack parameter.
	 *
	 * @param mixed $index The index of the current array.
	 * @param array $arr The array to flatten.
	 * @param array $haystack The resulting flattened array.
	 * @return void
	 */
	public static function mo_epbr_flatten_lvl_2( $index, $arr, &$haystack ) {
		foreach ( $arr as $key => $value ) {
			if ( empty( $value ) ) {
				continue;}
			if ( ! is_array( $value ) ) {
				if ( ! strpos( strtolower( $index ), 'error' ) ) {
					$haystack[ $index . '|' . $key ] = $value;
				}
			} else {
				self::mo_epbr_flatten_lvl_2( $index . '|' . $key, $value, $haystack );
			}
		}
	}

	/**
	 * Retrieves the current page URL.
	 *
	 * This function fetches the current page URL using information from the $_SERVER superglobal.
	 * It sanitizes and validates the HTTP_HOST and REQUEST_URI variables before constructing the URL.
	 *
	 * @return string The current page URL.
	 */
	public static function mo_epbr_get_current_page_url() {
		$http_host = isset( $_SERVER['HTTP_HOST'] ) ? esc_url( sanitize_text_field( wp_unslash( $_SERVER['HTTP_HOST'] ) ) ) : '';
		$is_https  = isset( $_SERVER['HTTPS'] ) && strcasecmp( sanitize_text_field( wp_unslash( $_SERVER['HTTPS'] ) ), 'on' ) === 0;

		if ( filter_var( $http_host, FILTER_VALIDATE_URL ) ) {
			$http_host = wp_parse_url( $http_host, PHP_URL_HOST );
		}
		$request_uri = isset( $_SERVER['REQUEST_URI'] ) ? esc_url( sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) ) : '';
		if ( substr( $request_uri, 0, 1 ) === '/' ) {
			$request_uri = substr( $request_uri, 1 );
		}
		if ( strpos( $request_uri, '?option=saml_user_login' ) !== false ) {
			return strtok( esc_url( sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) ), '?' );
		}
		$relay_state = 'http' . ( $is_https ? 's' : '' ) . '://' . $http_host . '/' . $request_uri;
		return $relay_state;
	}

	/**
	 * Function to get the url endpoint as per the tenant id.
	 *
	 * @return string
	 */
	public static function mo_epbr_get_url_endpoint() {
		$app          = self::mo_epbr_get_option( pluginConstants::APPLICATION_CONFIG_OPTION );
		$tenantid     = ! empty( $app['tenant_id'] ) ? $app['tenant_id'] : '';
		$endpoint_url = 'https://login.microsoftonline.com/' . $tenantid . '/oauth2/v2.0/';
		return $endpoint_url;
	}

	/**
	 * Function to check if the customer is registered with miniOrange or not.
	 *
	 * @return bool
	 */
	public static function mo_epbr_is_customer_registered() {

		$email        = get_option( 'mo_epbr_admin_email' );
		$customer_key = get_option( 'mo_epbr_admin_customer_key' );

		if ( ! $email || ! $customer_key || ! is_numeric( trim( $customer_key ) ) ) {
			return 0;
		} else {
			return 1;
		}
	}

	/**
	 * Checks if the provided password matches a specific pattern.
	 *
	 * This function takes a password as input and checks if it matches a predefined pattern.
	 * The pattern ensures that the password contains at least one alphanumeric character
	 * and one special character from the set (!@#$%^&*.-_).
	 *
	 * @param string $password The password to be checked.
	 * @return bool True if the password does not match the pattern, false otherwise.
	 */
	public static function mo_epbr_check_password_pattern( $password ) {
		$pattern = '/^[(\w)*(\!\@\#\$\%\^\&\*\.\-\_)*]+$/';
		return ! preg_match( $pattern, $password );
	}

	/**
	 * Performs a synchronous WordPress remote call using either POST or GET method.
	 *
	 * This function sends a HTTP request to the specified URL using either POST or GET method,
	 * based on the value of the $is_get parameter. It then retrieves the response body and
	 * returns it on success. If an error occurs during the request, it displays an error notice
	 * and logs the error message to the PHP error log.
	 *
	 * @param string $url The URL to which the request is made.
	 * @param array  $args Optional. Arguments for the request. Default is an empty array.
	 * @param bool   $is_get Optional. Whether the request is a GET request. Default is false.
	 * @return mixed|false The response body on success, false on failure.
	 */
	public static function mo_epbr_sync_wp_remote_call( $url, $args = array(), $is_get = false ) {
		if ( ! $is_get ) {
			$response = wp_remote_post( $url, $args );
		} else {
			$response = wp_remote_get( $url, $args );
		}
		if ( ! is_wp_error( $response ) ) {
			return $response['body'];
		} else {
			self::mo_epbr__show_error_notice( 'Unable to connect to the Internet. Please try again.' );
			error_log( 'Unable to connect to the Internet, following error occured : ' + $response['body'] ); //phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
			return false;
		}
	}

	/**
	 * Function to delete database options on deactivation of plugin.
	 *
	 * @return void
	 */
	public static function mo_epbr_deactivate() {
		delete_option( 'mo_epbr_admin_password' );
		delete_option( 'mo_epbr_admin_customer_key' );
		delete_option( 'mo_epbr_admin_api_key' );
		delete_option( 'mo_epbr_customer_token' );
	}
}
