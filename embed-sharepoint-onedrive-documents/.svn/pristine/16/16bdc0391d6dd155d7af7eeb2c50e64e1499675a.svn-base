<?php
/**
 * Handles Ajax calls of manage application tab
 *
 * @package embed-sharepoint-onedrive-documents/Observer
 */

namespace MoSharePointObjectSync\Observer;

use MoSharePointObjectSync\Wrappers\PluginConstants;
use MoSharePointObjectSync\Wrappers\WpWrapper;

/**
 * This class handles the tasks for connecting to SharePoint/OneDrive, supporting both automatic and manual connections.
 */
class AppConfigObserver {

	/**
	 * Holds the instance of App_Config_Observer.
	 *
	 * @var AppConfigObserver|null Singleton instance of AppConfigObserver.
	 */
	private static $obj;

	/**
	 * Returns the singleton instance of AppConfigObserver.
	 *
	 * @return AppConfigObserver The singleton instance of AppConfigObserver.
	 */
	public static function get_observer() {
		if ( ! isset( self::$obj ) ) {
			self::$obj = new self();
		}
		return self::$obj;
	}

	/**
	 * Function to execute the task based on the task in form post
	 *
	 * @return void
	 */
	public function mo_sps_app_configuration_api_handler() {
		if ( ! check_ajax_referer( 'mo_sps_app_config__nonce', 'nonce', false ) ) {
			wp_send_json_error(
				array(
					'err' => 'Permission denied.',
				)
			);
			exit;
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error(
				array(
					'err' => 'Permission denied.',
				)
			);
			exit;
		}

		$task = ! empty( $_POST['task'] ) ? sanitize_text_field( wp_unslash( $_POST['task'] ) ) : '';
        // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized -- it is an nested array so for the sanitization we are using our custom method.
		$payload = isset( $_POST['payload'] ) ? wpWrapper::mo_sps_sanitize_array_map( wp_unslash( $_POST['payload'] ) ) : '';
		switch ( $task ) {
			case 'mo_sps_auto_connection_save_type':
				$this->mo_sps_auto_connection_save_type( $payload );
				break;
		}
	}

	/**
	 * Function to save the connection type (sharepoint, onedrive personal/business)
	 *
	 * @param array $payload This contains the data for connection type.
	 * @return void
	 */
	private function mo_sps_auto_connection_save_type( $payload ) {
		$type = $payload['connection_type'];
		WpWrapper::mo_sps_set_option( PluginConstants::CLOUD_CONNECTOR, $type );
		wp_send_json_success( 'Connection established successfully.' );
	}
}
