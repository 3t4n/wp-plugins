<?php


if ( !defined( 'ABSPATH' ) ) {
	exit;
}

if ( isset( $_POST['awsa-shipping-import-parcel-codes'] ) && isset( $_POST['_awsa_import_nonce'] ) && wp_verify_nonce( $_POST['_awsa_import_nonce'] ) ) {

	global $awsa_notices;
	$type          = $_FILES["awsa-file-for-import-parcel-codes"]["type"];
	$allowed_types = array(
			'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
			'application/vnd.ms-excel',
			'text/csv',
	);

	if ( !in_array( $type, $allowed_types, true ) ) {

		$awsa_notices = new \AWSA_Error( 'incorrect_format', 'The file format is incorrect. The file format must be .xlsx , .xls, .csv' );
	}

	$attachment_id = awsa_handle_attachment( "awsa-file-for-import-parcel-codes" );

	if ( !is_numeric( $attachment_id ) ) {

		$awsa_notices = new \AWSA_Error( 'error_upload', 'Error in upload file.' );
	}

	if ( null === $awsa_notices ) {

		$filename     = get_attached_file( $attachment_id );
		$awsa_notices = awsa_shipping_update_parcel_codes_from_excel( $filename );
	}
}


global $awsa_notices;
if ( is_a( $awsa_notices, 'AWSA_Error' ) ) {

	echo "<div class='notice notice-error is-dismissible error-{$awsa_notices->get_code()}'><p>{$awsa_notices->get_message()}</p></div>";
} elseif ( is_numeric( $awsa_notices ) ) {

	$success_message = __( 'Done', 'awsa-shipping' ) . ' ' . $awsa_notices;
	echo "<div class='notice notice-success is-dismissible'><p>{$success_message}</p></div>";
}

?>

<div class="wrap">
	<h2><?php _e( 'Tools', 'awsa-shipping' ); ?></h2>
	<h3><?php _e( 'Import parcel codes', 'awsa-shipping' ); ?></h3>
	<form action="" method="post" enctype="multipart/form-data">
		<table class="form-table">
			<tr>
				<td>
					<input type="file" name="awsa-file-for-import-parcel-codes" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>
				</td>
			</tr>
		</table>
		<?php do_action( 'awsa_shipping_tools_import_parcel_codes_form' ); ?>
		<?php wp_nonce_field( -1, '_awsa_import_nonce' ); ?>
		<?php submit_button( __( 'Import', 'awsa-shipping' ), 'primary', 'awsa-shipping-import-parcel-codes' ); ?>
	</form>
</div>

