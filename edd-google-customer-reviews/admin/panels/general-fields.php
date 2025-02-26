<?php
if ( isset( $_POST[ 'gcr_submit_plugin' ] ) ) {
	if ( ! isset( $_POST['gcr_nonce'] ) || ! wp_verify_nonce( $_POST['gcr_nonce'], 'gcr_save_settings' ) ) {
		print 'Sorry, your nonce did not verify.';
		exit;
	} 
	else {
		EDD_Google_Customer_Reviews_Settings::add_update_settings( 'gcr_options' );
	}
}
$data = unserialize( get_option( 'gcr_options' ) );
?>
<div class="container">
	<div class="row" style="margin-left:-11%; !important;">
		<div class="col col-9">
			<div class="card mw-100" style="padding:0px;">
				<div class="card-header">
					<h5>EDD Google Customer Reviews</h5>
				</div>
				<div class="card-body">
					<form id="gcr_plugin_form" method="post" action="" enctype="multipart/form-data">
						<table class="table table-bordered">
							<tbody>

								<tr>
									<td>
										<label class="align-middle" for="google_merchant_id"><?php _e('Google Merchant ID','edd-google-customer-reviews'); ?></label>
									</td>
									<td>
										<input type="text" id="google_merchant_id" name="google_merchant_id" required="required" value="<?php echo $data['google_merchant_id'];?>">
										<i style="cursor: help;" class="fas fa-question-circle" title="<?php _e('Enter your Google Merchant ID here. You can login into your Google Merchant account to find your ID.','edd-google-customer-reviews'); ?>"></i>
									</td>
								</tr>
							</tbody>
						</table>
						<p class="submit save-for-later" id="save-for-later">
							<?php wp_nonce_field( 'gcr_save_settings', 'gcr_nonce' ); ?>
							<button type="submit" class="btn btn-primary btn-success" id="gcr_submit_plugin" name="gcr_submit_plugin"><?php _e('Submit','edd-google-customer-reviews'); ?></button>
						</p>
					</form>
				</div>
			</div>
		</div>
		<?php require_once('sidebar.php');?>
	</div>
</div>