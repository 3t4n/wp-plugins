<?php
/**
 * Class to handle form actions specific to Connection tab.
 *
 * @package embed-sharepoint-onedrive-documents\Controller
 */

namespace MoSharePointObjectSync\Controller;

use MoSharePointObjectSync\API\Azure;
use MoSharePointObjectSync\Wrappers\PluginConstants;
use MoSharePointObjectSync\Wrappers\WpWrapper;

/**
 * Class AppConfig
 *
 * @package embed-sharepoint-onedrive-documents\Controller
 */
class AppConfig {

	/**
	 * Holds the AppConfig class instance.
	 *
	 * @var AppConfig
	 */
	private static $instance;

	/**
	 * Object instance(AppConfig) getter method.
	 *
	 * @return AppConfig
	 */
	public static function get_controller() {
		if ( ! isset( self::$instance ) ) {
			$class          = __CLASS__;
			self::$instance = new $class();
		}
		return self::$instance;
	}

	/**
	 * Function to execute form actions based on the option value recieved in post request.
	 *
	 * @param array $post This variable holds global POST array value.
	 * @return void
	 */
	public function mo_sps_save_settings( $post ) {

		if ( ! isset( $post['option'] ) ) {
			return;
		}

		$option = $post['option'];

		switch ( $option ) {
			case 'mo_sps_azure_config_option':
				$this->mo_sps_save_azure_config( $post );
				break;

			case 'mo_sps_remove_configured_account':
				$this->mo_sps_remove_configured_account();
				break;
		}
	}


	/**
	 * Function to remove the connection account.
	 */
	private function mo_sps_remove_configured_account() {
		delete_option( 'mo_sps_test_connection_status' );
		delete_option( 'mo_sps_test_connection_user_details' );
		delete_option( 'mo_sps_refresh_token' );
		delete_option( 'mo_sps_auth_code' );
		WpWrapper::mo_sps_delete_option( PluginConstants::CLOUD_CONNECTOR );
		WpWrapper::mo_sps_delete_option( PluginConstants::APP_CONFIG );
		WpWrapper::mo_sps_delete_option( PluginConstants::SPS_SEL_SITE );
		WpWrapper::mo_sps_delete_option( PluginConstants::SPS_SITES );
		WpWrapper::mo_sps_delete_option( PluginConstants::SPS_DRIVES );
		WpWrapper::mo_sps_delete_option( PluginConstants::SPS_SEL_DRIVE );
		WpWrapper::mo_sps_delete_option( PluginConstants::SPS_SEL_DRIVE_NAME );
		WpWrapper::mo_sps_delete_option( PluginConstants::SPS_SEL_FOLDER );
		WpWrapper::mo_sps_delete_option( PluginConstants::SPS_SEL_FOLDER_PATH );
		WpWrapper::mo_sps_delete_option( PluginConstants::BREADCRUMBS );
		WpWrapper::mo_sps__show_success_notice( esc_html__( 'Account Removed Successfully, Please connect via any other account.', 'embed-sharepoint-onedrive-documents' ) );
	}


	/**
	 * Function to check empty or null values.
	 *
	 * @param array $input This is the result array containing sanitized values.
	 * @param array $arr This is config array containing app config keys.
	 * @param array $post This contains sanitized global post data.
	 * @return boolean
	 */
	private function mo_sps_check_for_empty_or_null( &$input, $arr, $post ) {
		foreach ( $arr as $key ) {
			if ( ! isset( $post[ $key ] ) || empty( $post[ $key ] ) ) {
				return false;
			}
			$input[ $key ] = ( $post[ $key ] );
		}
		return true;
	}

	/**
	 * Function to save the Service Principal details.
	 *
	 * @param array $post This contains sanitized global post data.
	 */
	private function mo_sps_save_azure_config( $post ) {
		check_admin_referer( 'mo_sps_azure_config_option' );
		$input_arr     = array( 'client_id', 'client_secret', 'tenant_id' );
		$sanitized_arr = array();
		if ( ! $this->mo_sps_check_for_empty_or_null( $sanitized_arr, $input_arr, $post ) ) {
			WpWrapper::mo_sps__show_error_notice( esc_html__( 'Input is empty or present in the incorrect format.', 'embed-sharepoint-onedrive-documents' ) );
			return;
		}

		$sanitized_arr['client_secret'] = WpWrapper::mo_sps_encrypt_data( $sanitized_arr['client_secret'], hash( 'sha256', $sanitized_arr['client_id'] ) );

		$feedback_config              = WpWrapper::mo_sps_get_option( 'mo_sps_feedback_config' );
		$feedback_config['client_id'] = $sanitized_arr['client_id'];
		$feedback_config['tenant_id'] = $sanitized_arr['tenant_id'];
		WpWrapper::mo_sps_set_option( 'mo_sps_feedback_config', $feedback_config );
		WpWrapper::mo_sps_set_option( 'mo_sps_application_config', $sanitized_arr );
		WpWrapper::mo_sps__show_success_notice( esc_html__( 'Settings Saved Successfully.', 'embed-sharepoint-onedrive-documents' ) );
	}
}
