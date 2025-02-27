<?php
/**
 * Holds the Wrappers class instance.
 *
 * @package embed-sharepoint-onedrive-documents\Wrappers
 */

namespace MoSharePointObjectSync\Wrappers;

use DateTime;
/**
 * Class to handle WpWrapper functions.
 */
class WpWrapper {
	/**
	 * Holds the singleton instance of the WpWrapper.
	 *
	 * @var WpWrapper
	 */
	private static $instance;
	/**
	 * Returns the singleton instance of the WpWrapper.
	 * If the instance does not exist, it creates a new one.
	 *
	 * @return WpWrapper The singleton instance of the WpWrapper.
	 */
	public static function get_wrapper() {
		if ( ! isset( self::$instance ) ) {
			$class          = __CLASS__;
			self::$instance = new $class();
		}
		return self::$instance;
	}
	/**
	 * This function sets a specific configuration key to the provided value
	 *
	 * @param string $key The configuration key to be set.
	 * @param mixed  $val The value to be set for the specified configuration key.
	 */
	public static function mo_sps_set_feedback_config( $key, $val ) {
		$feedback_config         = self::mo_sps_get_option( PluginConstants::FEEDBACK_CONFIG );
		$feedback_config[ $key ] = $val;
		self::mo_sps_set_option( PluginConstants::FEEDBACK_CONFIG, $feedback_config );
	}
	/**
	 * This function checks the client secret expiry.
	 *
	 * @return boolean returns true when secret is expired else returns false.
	 */
	public static function mo_sps_check_client_secret_expiry_customers() {
		$test_connection_status       = self::mo_sps_get_option( 'mo_sps_test_connection_status' );
		$is_new_client_secret_fetched = self::mo_sps_get_option( 'mo_sps_check_if_new_client_secret_fetched' );
		$refresh_token                = self::mo_sps_get_option( PluginConstants::SPS_RFTK );
		$current_date                 = new DateTime();
		$expiry_date                  = new DateTime( '2024-06-15 00:00:00' );

		if ( $refresh_token && $test_connection_status && ! $is_new_client_secret_fetched && $current_date >= $expiry_date ) {
			return true;
		}
		return false;
	}
	/**
	 * This function sets key to the provided value
	 *
	 * @param string $key The key to be set.
	 * @param mixed  $value The value to be set for the specified key.
	 */
	public static function mo_sps_set_option( $key, $value ) {
		if ( is_user_logged_in() && current_user_can( 'manage_options' ) ) {
			update_option( $key, $value );
		}
	}
	/**
	 * This function get the value of the specified key
	 *
	 * @param string $key The key.
	 */
	public static function mo_sps_get_option( $key ) {
		return get_option( $key );
	}
	/**
	 * This function deletes the option from database
	 *
	 * @param mixed $key Stores the option which is to be deleted from the database.
	 * @return bool
	 */
	public static function mo_sps_delete_option( $key ) {
		if ( is_user_logged_in() && current_user_can( 'manage_options' ) ) {
			return delete_option( $key );
		}
	}
	/**
	 * Function to show a red error notice.
	 *
	 * @param string $message Stores the error notice string to be displayed.
	 * @return void
	 */
	public static function mo_sps__show_error_notice( $message ) {
		self::mo_sps_set_option( PluginConstants::NOTICE_MESSAGE, $message );
		$hook_name = 'admin_notices';
		remove_action( $hook_name, array( self::get_wrapper(), 'mo_sps_success_notice' ) );
		add_action( $hook_name, array( self::get_wrapper(), 'mo_sps_error_notice' ) );
	}
	/**
	 * Function to show a green success notice.
	 *
	 * @param string $message Stores the success notice string to be displayed.
	 * @return void
	 */
	public static function mo_sps__show_success_notice( $message ) {
		self::mo_sps_set_option( PluginConstants::NOTICE_MESSAGE, $message );
		$hook_name = 'admin_notices';
		remove_action( $hook_name, array( self::get_wrapper(), 'mo_sps_error_notice' ) );
		add_action( $hook_name, array( self::get_wrapper(), 'mo_sps_success_notice' ) );
	}
	/**
	 * Function for html of success notice.
	 *
	 * @return void
	 */
	public function mo_sps_success_notice() {
		$class   = 'updated';
		$message = self::mo_sps_get_option( PluginConstants::NOTICE_MESSAGE );
		echo "<div style='margin:5px 0' class='" . esc_attr( $class ) . "'> <p>" . esc_attr( $message ) . '</p></div>';
	}
	/**
	 * Function for html of error notice.
	 *
	 * @return void
	 */
	public function mo_sps_error_notice() {
		$class   = 'error';
		$message = self::mo_sps_get_option( PluginConstants::NOTICE_MESSAGE );
		echo "<div style='margin:5px 0' class='" . esc_attr( $class ) . "'> <p>" . esc_attr( $message ) . '</p></div>';
	}

	/**
	 * Function to encrypt data.
	 *
	 * @param string $data The key=value pairs separated with &.
	 * @param mixed  $key The key value.
	 * @return string
	 */
	public static function mo_sps_encrypt_data( $data, $key ) {
		$key       = openssl_digest( $key, 'sha256' );
		$method    = 'aes-128-ecb';
		$str_crypt = openssl_encrypt( $data, $method, $key, OPENSSL_RAW_DATA || OPENSSL_ZERO_PADDING );
		// phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.obfuscation_base64_encode -- We need to encrypt and encode the client secret before storing.
		return base64_encode( $str_crypt );
	}

	/**
	 * Helper function to return the sanitized $_POST array
	 *
	 * @param array $array $_POST array.
	 * @return array
	 */
	public static function mo_sps_sanitize_array_map( $array ) {
		$result = array();
		foreach ( $array as $key => $value ) {
			if ( ! is_array( $key ) ) {
				$key = sanitize_text_field( $key );
			}

			if ( ! is_array( $value ) ) {
				if ( preg_match( '#^/drives/#', $value ) ) {
					$value = wp_kses( ( $value ), array() );
				} else {
					$value = sanitize_text_field( $value );
				}
			}

			$result[ $key ] = $value;
		}
		return $result;
	}



	/**
	 * Function to decrypt data.
	 *
	 * @param string $data Crypt response from Sagepay.
	 * @param [type] $key The key value.
	 * @return string
	 */
	public static function mo_sps_decrypt_data( $data, $key ) {
		// phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.obfuscation_base64_decode -- We need to decrypt and decode the client secret before storing.
		$str_in  = base64_decode( $data );
		$key     = openssl_digest( $key, 'sha256' );
		$method  = 'AES-128-ECB';
		$iv_size = openssl_cipher_iv_length( $method );
		$iv      = substr( $str_in, 0, $iv_size );
		$data    = substr( $str_in, $iv_size );
		$clear   = openssl_decrypt( $data, $method, $key, OPENSSL_RAW_DATA || OPENSSL_ZERO_PADDING, $iv );

		return $clear;
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
	public static function mo_api_check_password_pattern( $password ) {
		$pattern = '/^[(\w)*(\!\@\#\$\%\^\&\*\.\-\_)*]+$/';
		return ! preg_match( $pattern, $password );
	}
	/**
	 * Function to delete database options on deactivation of plugin.
	 *
	 * @return void
	 */
	public static function mo_sps_deactivate() {
		delete_option( 'mo_sps_admin_password' );
		delete_option( 'mo_sps_admin_customer_key' );
		delete_option( 'mo_sps_admin_api_key' );
		delete_option( 'mo_sps_customer_token' );
	}

	/**
	 * Function to check if the customer is registered with miniOrange or not.
	 *
	 * @return bool
	 */
	public static function mo_sps_is_customer_registered() {

		$email        = get_option( 'mo_sps_admin_email' );
		$customer_key = get_option( 'mo_sps_admin_customer_key' );

		if ( ! $email || ! $customer_key || ! is_numeric( trim( $customer_key ) ) ) {
			return 0;
		} else {
			return 1;
		}
	}
	/**
	 * Performs an HTTP request and retrieves response.
	 *
	 * @param string  $url URL to retrieve.
	 * @param array   $args Request arguments.
	 * @param boolean $is_get if the request should be made by GET method or not.
	 * @return array|bool
	 */
	public static function mo_azure_sync_wp_remote_call( $url, $args = array(), $is_get = false ) {
		if ( ! $is_get ) {
			$response = wp_remote_post( $url, $args );
		} else {
			$response = wp_remote_get( $url, $args );
		}
		if ( ! is_wp_error( $response ) ) {
			return $response['body'];
		} else {
			self::mo_sps__show_error_notice( 'Unable to connect to the Internet. Please try again.' );
			return false;
		}
	}
	/**
	 * This function returns the image url from the image name
	 *
	 * @param string $image_name name of the image.
	 * @return string
	 */
	public static function mo_sps_get_image_src( $image_name ) {
		return esc_url( plugin_dir_url( MO_SPS_PLUGIN_FILE ) . 'images/' . $image_name );
	}
}
