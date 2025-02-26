<?php

namespace ProfitBlue\Ajax;

/**
 * Class Settings
 *
 * @package  Deps\Settings
 * @property Plugin $plugin
 */
class AjaxSaveWizardEnd {

	public static function handle() {

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_text_field( $_POST['nonce'] ) ), 'profitblue_ajax_nonce' ) ) {
			wp_send_json_error( 'Invalid nonce' );
			wp_die();
		}
		
		$response = array();
		if ( empty( $_POST['user_id'] ) ) {
			
			$response['status'] = 'error';
			$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'User id not exists!', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
			echo wp_json_encode( $response );
			exit();
		}

        if ( !empty( $_POST['user_id'] ) ) {
			$user_id = isset( $_POST['user_id'] ) ? wp_unslash( sanitize_text_field( $_POST['user_id'] ) ) : '';
			update_user_meta( $user_id, 'profitblue_is_wizard_finish', 'yes' );
			delete_user_meta( $user_id, 'profitblue_wizard_current_step' );
        }

		$response['status'] = 'success';
		$response['redirect'] = admin_url() . 'admin.php?page=profitblue';
		echo wp_json_encode( $response );
		exit();

	}
}
