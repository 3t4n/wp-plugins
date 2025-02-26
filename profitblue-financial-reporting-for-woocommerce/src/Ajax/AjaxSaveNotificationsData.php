<?php

namespace ProfitBlue\Ajax;

use ProfitBlue\Models\NotificationsModel;

/**
 * Class Settings
 *
 * @package  Deps\Settings
 * @property Plugin $plugin
 */
class AjaxSaveNotificationsData {

	public static function handle() {

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_text_field( $_POST['nonce'] ) ), 'profitblue_ajax_nonce' ) ) {
			wp_send_json_error( 'Invalid nonce' );
			wp_die();
		}
		
		$response = array();
		if ( empty( $_POST['email'] ) ) {
			
			$response['status'] = 'error';
			$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'Email is mandatory!', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
			echo wp_json_encode( $response );
			exit();
		}

        $data = array();

		if ( !empty( $_POST['email'] ) ) {
			$data['email'] = wp_unslash( sanitize_text_field( $_POST['email'] ) );
		}
		if ( !empty( $_POST['daily'] ) ) {
			$data['daily'] = wp_unslash( sanitize_text_field( $_POST['daily'] ) );
		}
		if ( !empty( $_POST['weekly'] ) ) {
			$data['weekly'] = wp_unslash( sanitize_text_field( $_POST['weekly'] ) );
		}
		if ( !empty( $_POST['monthly'] ) ) {
			$data['monthly'] = wp_unslash( sanitize_text_field( $_POST['monthly'] ) );
		}
		if ( !empty( $_POST['yearly'] ) ) {
			$data['yearly'] = wp_unslash( sanitize_text_field( $_POST['yearly'] ) );
		}		
		
		if ( is_array( $data ) ) {

            update_option( 'profitblue-notifications-settings', $data );

			$response['status'] = 'error';
			$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'Data was saved.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
			echo wp_json_encode( $response );
			exit();

		}				
	}
}
