<?php

namespace ProfitBlue\Ajax;

use ProfitBlue\Models\NotificationsModel;

/**
 * Class Settings
 *
 * @package  Deps\Settings
 * @property Plugin $plugin
 */
class AjaxSaveWizardStep {

	public static function handle() {

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_text_field( $_POST['nonce'] ) ), 'profitblue_ajax_nonce' ) ) {
			wp_send_json_error( 'Invalid nonce' );
			wp_die();
		}
		
		$response = array();
		if ( empty( $_POST['user_id'] ) ) {
			
			$response['status'] = 'error';
			$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'User id missing', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
			echo wp_json_encode( $response );
			exit();
		}
    	if ( !empty( $_POST['user_id'] ) ) {
			$user_id = wp_unslash( sanitize_text_field( $_POST['user_id'] ) );
		}
		
		if ( !empty( $_POST['step_url'] ) ) {
			$step_url = wp_unslash( sanitize_text_field( $_POST['step_url'] ) );
		} else {
			$step_url = ''; // Initialize the variable in case it's empty
		}
		
		if ( !empty( $_POST['page'] ) ) {
			$step_url .= '?page=' . wp_unslash( sanitize_text_field( $_POST['page'] ) );
		}
		
		if ( !empty( $_POST['subpage'] ) ) {
			$step_url .= '&subpage=' . wp_unslash( sanitize_text_field( $_POST['subpage'] ) );
		}
		
		if ( !empty( $_POST['wizard'] ) ) {
			$step_url .= '&wizard=' . wp_unslash( sanitize_text_field( $_POST['wizard'] ) );
		}
		
		if ( !empty( $_POST['wizard-step'] ) ) {
			$step_url .= '&wizard-step=' . wp_unslash( sanitize_text_field( $_POST['wizard-step'] ) );
		}
		
		if ( !empty( $_POST['step'] ) ) {
			$step_url .= '&step=' . wp_unslash( sanitize_text_field( $_POST['step'] ) );
		}
		

        update_user_meta( $user_id, 'profitblue_wizard_current_step', esc_url( $step_url ) );
				
		$response['status'] = 'succes';
		echo wp_json_encode( $response );
		exit();
			
	}
}
