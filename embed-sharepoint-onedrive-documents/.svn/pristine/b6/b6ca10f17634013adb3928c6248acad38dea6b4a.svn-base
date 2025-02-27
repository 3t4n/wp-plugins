<?php
/**
 * Handles signing up and login of user with their minOrange account
 *
 * @package embed-sharepoint-onedrive-documents/Controller
 */

namespace MoSharePointObjectSync\Controller;

use MoSharePointObjectSync\API\CustomerMOSPS;
use MoSharePointObjectSync\Wrappers\WpWrapper;


/**
 * Class to Handle sign up and login of user with their minOrange account
 */
class AccountSetupHandler {

	/**
	 * Holds the instance of Account setup handler class
	 *
	 * @var AccountSetupHandler
	 */
	private static $instance;

	/**
	 * Object instance(Account Setup handler) getter method.
	 *
	 * @return AccountSetupHandler
	 */
	public static function get_controller() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Function to execute the action based on the option value recieved in form post request
	 *
	 * @param array $post This variable holds global POST array value.
	 * @return void
	 */
	public function mo_sps_save_settings( $post ) {

		$option = $post['option'];

		if ( ! isset( $option ) ) {
			return;
		}

		switch ( $option ) {

			case 'mo_api_account_registration_setup_option':
				$this->mo_sps_account_registration_setup();
				break;

			case 'mo_api_remove_account_option':
				$this->mo_sps_remove_account();
				break;

			case 'mo_api_account_login_setup_option':
				$this->mo_sps_account_login_setup();
				break;

			case 'mo_api_is_login':
				$this->mo_sps_is_login();
				break;

			case 'mo_api_is_regis':
				$this->mo_sps_is_regis();
				break;
		}
	}


	/**
	 * Function to perform the user account registration process
	 *
	 * @return void
	 */
	private function mo_sps_account_registration_setup() {
		check_admin_referer( 'mo_api_account_registration_setup_option' );

		if ( ! $this->mo_saml_is_extension_installed( 'curl' ) ) {
			wpWrapper::mo_sps__show_success_notice( 'ERROR: PHP cURL extension is not installed or disabled. Login failed.' );
			return;
		}
		if ( empty( $_POST['account_email'] ) || empty( $_POST['account_pwd'] ) || empty( $_POST['confirm_account_pwd'] ) ) {
			wpWrapper::mo_sps__show_error_notice( 'All the fields are required. Please enter valid entries.' );
			return;
		} elseif ( wpWrapper::mo_api_check_password_pattern( wp_strip_all_tags( wp_unslash( $_POST['account_pwd'] ) ) ) || wpWrapper::mo_api_check_password_pattern( wp_strip_all_tags( wp_unslash( $_POST['confirm_account_pwd'] ) ) ) ) {
			wpWrapper::mo_sps__show_error_notice( 'Minimum 6 characters should be present. Maximum 15 characters should be present. Only following symbols (!@#.$%^&*-_) should be present.' );
			return;
		} else {
			$email            = sanitize_email( wp_unslash( $_POST['account_email'] ) );
			$password         = wp_strip_all_tags( sanitize_text_field( wp_unslash( $_POST['account_pwd'] ) ) );
			$confirm_password = wp_strip_all_tags( sanitize_text_field( wp_unslash( $_POST['confirm_account_pwd'] ) ) );
		}
		update_option( 'mo_sps_admin_email', $email );

		if ( strcmp( $password, $confirm_password ) === 0 ) {
			update_option( 'mo_sps_admin_password', $password );
			$customer       = new CustomerMOSPS();
			$customer_exist = json_decode( $customer->mo_sps_check_customer(), true );

			if ( ! is_null( $customer_exist ) ) {
				if ( strcasecmp( $customer_exist['status'], 'CUSTOMER_NOT_FOUND' ) === 0 ) {
					$response = $this->create_mo_customer();
					if ( is_array( $response ) && array_key_exists( 'status', $response ) && 'success' === $response['status'] ) {
						WpWrapper::mo_sps__show_success_notice( 'Successfully Logged In' );

					} else {
						WpWrapper::mo_sps__show_error_notice( 'User registration failed! Please try again after sometime.' );
					}
				} else {
					$response = $this->get_mo_current_customer();
					if ( is_array( $response ) && array_key_exists( 'status', $response ) && 'success' === $response['status'] ) {
						WpWrapper::mo_sps__show_success_notice( 'Successfully Logged In' );
					}
				}
			}
		} else {
			WpWrapper::mo_sps__show_error_notice( "Password Doesn't match" );
		}
	}

	/**
	 * Function to perform the process of user login with miniOrange account
	 *
	 * @return void
	 */
	private function mo_sps_account_login_setup() {
		check_admin_referer( 'mo_api_account_login_setup_option' );

		if ( ! $this->mo_saml_is_extension_installed( 'curl' ) ) {
			WpWrapper::mo_sps__show_error_notice( 'ERROR: PHP cURL extension is not installed or disabled. Login failed.' );
			return;
		}
		if ( empty( $_POST['account_email'] ) || empty( $_POST['account_pwd'] ) ) {
			WpWrapper::mo_sps__show_error_notice( 'All the fields are required. Please enter valid entries.' );
			return;
		} elseif ( WpWrapper::mo_api_check_password_pattern( wp_strip_all_tags( wp_unslash( $_POST['account_pwd'] ) ) ) ) {
			WpWrapper::mo_sps__show_error_notice( 'Minimum 6 characters should be present. Maximum 15 characters should be present. Only following symbols (!@#.$%^&*-_) should be present.' );
			return;
		} else {
			$email    = sanitize_email( wp_unslash( $_POST['account_email'] ) );
			$password = wp_strip_all_tags( wp_unslash( $_POST['account_pwd'] ) );
		}
		update_option( 'mo_sps_admin_email', $email );
		update_option( 'mo_sps_admin_password', $password );

		$customer = new CustomerMOSPS();
		$content  = $customer->mo_sps_get_customer_key();

		if ( ! $content ) {
			return;
		}

		$customer_key = json_decode( $content, true );

		if ( json_last_error() === JSON_ERROR_NONE ) {
			update_option( 'mo_sps_admin_customer_key', $customer_key['id'] );
			update_option( 'mo_sps_admin_api_key', $customer_key['apiKey'] );
			update_option( 'mo_sps_customer_token', $customer_key['token'] );
			if ( ! empty( $customer_key['phone'] ) ) {
				update_option( 'mo_sps_admin_phone', $customer_key['phone'] );
			}

			WpWrapper::mo_sps__show_success_notice( 'Successfully Logged In' );
		} else {
			WpWrapper::mo_sps__show_error_notice( 'Invalid username or password. Please try again.' );
		}
	}

	/**
	 * Function to delete the registration status while removing account
	 *
	 * @return void
	 */
	private function mo_sps_remove_account() {
		check_admin_referer( 'mo_api_remove_account_option' );
		WpWrapper::mo_sps_deactivate();
		wpWrapper::mo_sps_delete_option( 'mo_sps_registration_status' );
	}

	/**
	 * Function to check for the extensions like curl, open_ssl etc
	 *
	 * @param String $extension_name contains the name of the extension to check if loaded or not.
	 * @return Boolean
	 */
	private function mo_saml_is_extension_installed( $extension_name ) {
		if ( in_array( $extension_name, get_loaded_extensions(), true ) ) {
			return 1;
		} else {
			return 0;
		}
	}

	/**
	 * Function to create new customer.
	 *
	 * @return array
	 */
	private function create_mo_customer() {
		$customer     = new CustomerMOSPS();
		$customer_key = json_decode( $customer->mo_sps_create_customer(), true );
		if ( ! is_null( $customer_key ) ) {
			$response = array();
			if ( strcasecmp( $customer_key['status'], 'CUSTOMER_USERNAME_ALREADY_EXISTS' ) === 0 ) {
				$api_response = $this->get_mo_current_customer();
				if ( ! empty( $api_response ) && 'success' === $api_response['status'] ) {
					$response['status'] = 'success';
				} else {
					$response['status'] = 'error';
				}
			} elseif ( strcasecmp( $customer_key['status'], 'SUCCESS' ) === 0 ) {
				update_option( 'mo_sps_admin_customer_key', $customer_key['id'] );
				update_option( 'mo_sps_admin_api_key', $customer_key['apiKey'] );
				update_option( 'mo_sps_customer_token', $customer_key['token'] );
				delete_option( 'mo_sps_verify_customer' );
				$response['status'] = 'success';
				return $response;
			}
			return $response;
		}
	}

	/**
	 * Function to get the current miniorange user.
	 *
	 * @return array
	 */
	private function get_mo_current_customer() {
		$customer = new CustomerMOSPS();
		$content  = $customer->mo_sps_get_customer_key();

		if ( ! is_null( $content ) ) {
			$customer_key = json_decode( $content, true );

			$response = array();
			if ( json_last_error() === JSON_ERROR_NONE ) {
				update_option( 'mo_sps_admin_customer_key', $customer_key['id'] );
				update_option( 'mo_sps_admin_api_key', $customer_key['apiKey'] );
				update_option( 'mo_sps_customer_token', $customer_key['token'] );
				delete_option( 'mo_sps_verify_customer' );
				$response['status'] = 'success';
				return $response;
			} else {
				WpWrapper::mo_sps__show_error_notice( 'You already have an account with miniOrange. Please enter a valid password.' );
				$response['status'] = 'error';
				return $response;
			}
		}
	}

	/**
	 * Fucntion to set registration status as the Login User for pre-registered user.
	 *
	 * @return void
	 */
	private function mo_sps_is_login() {
		check_admin_referer( 'mo_api_is_login' );
		wpWrapper::mo_sps_set_option( 'mo_sps_registration_status', 'Login User' );
	}

	/**
	 * Function to set registeration status to blank for new registration.
	 *
	 * @return void
	 */
	private function mo_sps_is_regis() {
		check_admin_referer( 'mo_api_is_regis' );
		wpWrapper::mo_sps_set_option( 'mo_sps_registration_status', '' );
	}
}
