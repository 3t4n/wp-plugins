<?php
if ( sanitize_text_field( wp_unslash( isset( $_POST['REQUEST_URI_nonce'] ) ) ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['REQUEST_URI_nonce'], 'REQUEST_URI_nonce_action' ) ) ) ) {
    echo esc_html( '' );
}
$mode_currency = sanitize_text_field( wp_unslash(isset($_POST['mode_currency']) ? $_POST['mode_currency'] : ''));
switch ($mode_currency) {
	case 'currency_sign_paypal':
		$skt_choose_currency_paypal = $wpdb->prefix . "skt_choose_currency_paypal";
		$paypal_sktcurrency_id = sanitize_text_field( wp_unslash(isset($_POST['paypal_sktcurrency_id']) ? $_POST['paypal_sktcurrency_id'] : ''));
		$count_row = $wpdb->get_results("SELECT * FROM $skt_choose_currency_paypal"); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared, WordPress.DB.DirectDatabaseQuery.DirectQuery, 	WordPress.DB.DirectDatabaseQuery.NoCaching
		$rowcount = $wpdb->num_rows;
		if ($rowcount <= 0) {
			$data_choose_currency = array(
				'type_currency_id' => $paypal_sktcurrency_id
		    );
		  	$choose_currency_data = $wpdb->insert( $skt_choose_currency_paypal, $data_choose_currency ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery
		}else{
			$update_query = $wpdb->query( $wpdb->prepare("UPDATE $skt_choose_currency_paypal SET type_currency_id = %s WHERE id = %d", $paypal_sktcurrency_id, 1 )); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
		}
	break;
}
?>