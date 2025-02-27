<?php
$flp_approve_status		= get_setting( 'approve_status' );
$flp_reject_status		= get_setting( 'reject_status' );

/**
 * Get plugin settings.
 */
function get_setting( $key ) {
	return get_option( 'wc_settings_woocommerce-fraudlabs-pro_' . $key );
}

$id = (isset($_GET['orderid'])) ? sanitize_text_field($_GET['orderid']) : '';
$action = (isset($_GET['action'])) ? sanitize_text_field($_GET['action']) : '';

if ( $id != '' ) {
	$order = wc_get_order( $id );

	if (empty($order)) {
		die;
	}

	// Update for Approve case
	if ( $action == 'APPROVE' ) {
		if( $flp_approve_status ) {
			// Add note and change status
			$order->add_order_note( __( 'FraudLabs Pro status changed from Review to Approved.', 'woocommerce-fraudlabs-pro' ) );
			$order->update_status( $flp_approve_status );
		}else{
			// Add the note only
			$order->add_order_note( __( 'FraudLabs Pro status changed from Review to Approved.', 'woocommerce-fraudlabs-pro' ) );
		}

		$result = get_post_meta( $id, '_fraudlabspro' );
		if ( !is_array( $result[0] ) && !is_object( $result[0] ) ) {
			$row = json_decode( $result[0] );
		} else {
			$row = $result[0];
		}

		if ( is_array( $result[0] ) ) {
			$row['fraudlabspro_status'] = 'APPROVE';
		} else {
			if (isset($row->fraudlabspro_status)) {
				$row->fraudlabspro_status = 'APPROVE';
			}
		}
		update_post_meta( $id, '_fraudlabspro', $row );
	}
	// Update for Reject case
	elseif( $action == 'REJECT' ) {
		if( $flp_reject_status ) {
			// Add note and change status
			$order->add_order_note( __( 'FraudLabs Pro status changed from Review to Rejected.', 'woocommerce-fraudlabs-pro' ) );
			$order->update_status( $flp_reject_status );
		}else{
			// Add the note only
			$order->add_order_note( __( 'FraudLabs Pro status changed from Review to Rejected.', 'woocommerce-fraudlabs-pro' ) );
		}

		$result = get_post_meta( $id, '_fraudlabspro' );
		if ( !is_array( $result[0] ) && !is_object( $result[0] ) ) {
			$row = json_decode( $result[0] );
		} else {
			$row = $result[0];
		}

		if ( is_array( $result[0] ) ) {
			$row['fraudlabspro_status'] = 'REJECT';
		} else {
			if (isset($row->fraudlabspro_status)) {
				$row->fraudlabspro_status = 'REJECT';
			}
		}
		update_post_meta( $id, '_fraudlabspro', $row );
	}
	// Update for Blacklist case
	elseif ( $action == 'REJECT_BLACKLIST' ) {
		if( $flp_reject_status ) {
			// Add note and change status
			$order->add_order_note( __( 'Blacklisted order to FraudLabs Pro.', 'woocommerce-fraudlabs-pro' ) );
			$order->update_status( $flp_reject_status );
		}else{
			// Add the note only
			$order->add_order_note( __( 'Blacklisted order to FraudLabs Pro.', 'woocommerce-fraudlabs-pro' ) );
		}

		$result = get_post_meta( $id, '_fraudlabspro' );
		if ( !is_array( $result[0] ) && !is_object( $result[0] ) ) {
			$row = json_decode( $result[0] );
		} else {
			$row = $result[0];
		}

		if ( is_array( $result[0] ) ) {
			$row['fraudlabspro_status'] = 'REJECT';
			$row['is_blacklisted'] = '1';
		} else {
			if (isset($row->fraudlabspro_status)) {
				$row->fraudlabspro_status = 'REJECT';
				$row->is_blacklisted = '1';
			}
		}
		update_post_meta( $id, '_fraudlabspro', $row );
	}
}

?>