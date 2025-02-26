<?php
/**
 * Holds the Admin Controller Config class instance.
 *
 * @package Admin_Controller
 */

namespace MoEmbedPowerBI\Controller;

use MoEmbedPowerBI\Wrappers\pluginConstants;
use MoEmbedPowerBI\Wrappers\wpWrapper;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class to handle app configurations tab functionalities.
 */
class appConfig {

	/**
	 * Holds the App Config class instance.
	 *
	 * @var App_Config
	 */
	private static $instance;

	/**
	 * Object instance(App Config Controller) getter method.
	 *
	 * @return App_Config
	 */
	public static function get_controller() {
		if ( ! isset( self::$instance ) ) {
			$class          = __CLASS__;
			self::$instance = new $class();
		}
		return self::$instance;
	}

	/**
	 * Function to save the configurations of app config tab and perform other actions.
	 *
	 * @param string $option Stores the option value from the form submitted.
	 * @return void
	 */
	public function mo_epbr_save_settings( $option ) {
		// $option = sanitize_text_field($_POST['option']);
		switch ( $option ) {
			case 'mo_epbr_client_config_option':
				$this->mo_epbr_save_client_config();
				break;

			case 'mo_epbr_add_sso_button_wp_login':
				$this->mo_epbr_add_sso_button();
				break;
		}
	}

	/**
	 * Function to check whether the array is empty or null
	 *
	 * @param pointer $input Input pointer to the array.
	 * @param array   $arr Array containing input values.
	 * @return pointer
	 */
	private function mo_epbr_check_for_empty_or_null( &$input, $arr ) {
		check_admin_referer( 'mo_epbr_client_config_option' );
		foreach ( $arr as $key ) {
			if ( ! isset( $_POST[ $key ] ) || empty( $_POST[ $key ] ) ) {
				return false;
			}
			$input[ $key ] = sanitize_text_field( wp_unslash( $_POST[ $key ] ) );
		}
		return $input;
	}

	/**
	 * Function to save the client configuration.
	 *
	 * @return void
	 */
	private function mo_epbr_save_client_config() {
		check_admin_referer( 'mo_epbr_client_config_option' );
		$input_arr     = array( 'client_id', 'client_secret', 'redirect_uri', 'tenant_id' );
		$sanitized_arr = array();
		if ( ! $this->mo_epbr_check_for_empty_or_null( $sanitized_arr, $input_arr ) ) {
			wpWrapper::mo_epbr__show_error_notice( esc_html__( 'Input is empty or present in the incorrect format.', 'embed-power-bi-reports' ) );
			return;
		}
		$sanitized_arr['upn_id']        = isset( $_POST['upn_id'] ) ? sanitize_text_field( wp_unslash( $_POST['upn_id'] ) ) : '';
		$sanitized_arr['client_secret'] = wpWrapper::mo_epbr_encrypt_data( $sanitized_arr['client_secret'], hash( 'sha256', $sanitized_arr['client_id'] ) );
		wpWrapper::mo_epbr_set_option( pluginConstants::APPLICATION_CONFIG_OPTION, $sanitized_arr );
		wpWrapper::mo_epbr__show_success_notice( esc_html__( 'Settings Saved Successfully.', 'embed-power-bi-reports' ) );
	}

	/**
	 * Function to add the SSO login button via azure ad on WordPress login page.
	 *
	 * @return void
	 */
	private function mo_epbr_add_sso_button() {
		check_admin_referer( 'mo_epbr_add_sso_button_wp_login' );
		$app_id = wpWrapper::mo_epbr_get_option( pluginConstants::APPLICATION_CONFIG_OPTION );
		$app_id = $app_id['client_id'];
		if ( $app_id ) {
			if ( isset( $_POST['option'] ) && 'mo_epbr_add_sso_button_wp_login' === $_POST['option'] ) {
				if ( isset( $_POST['mo_epbr_add_sso_button_wp'] ) && 'on' === $_POST['mo_epbr_add_sso_button_wp'] ) {
					wpWrapper::mo_epbr_set_option( 'mo_epbr_add_sso_button_wp', true );
				} else {
					wpWrapper::mo_epbr_set_option( 'mo_epbr_add_sso_button_wp', false );
				}
				wpWrapper::mo_epbr__show_success_notice( esc_html__( 'Settings Updated Successfully.', 'embed-power-bi-reports' ) );}
		} else {
			wpWrapper::mo_epbr__show_error_notice( 'Kindly configure the application to use the login functionality.' );
		}
	}
}
