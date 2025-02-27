<?php
do_action( 'ump_admin_after_top_menu_add_ons' );
$pluginSlug = $data['plugin_slug'];

?>

<form action="" method="post">

	<div class="ihc-stuffbox">
		<?php if ( defined('UMP_PAYFAST_PRO') && UMP_PAYFAST_PRO ): ?>
			<h3 class="ihc-h3"><?php esc_html_e('PayFast Pro Payment Service', 'ultimate-membership-pro-payfast');?></h3>
		<?php else : ?>
			<h3 class="ihc-h3"><?php esc_html_e('PayFast Payment Service', 'ultimate-membership-pro-payfast');?></h3>
		<?php endif;?>
		<div class="inside">
				<div class="iump-form-line">
					<h2><?php  esc_html_e('Activate ', 'ultimate-membership-pro-payfast');?> PayFast <?php  esc_html_e(' Payment Service', 'ultimate-membership-pro-payfast' );?></h2>
					<p><?php esc_html_e('With this payment service activated, transactions can be made for South Africa region and not only ', 'ultimate-membership-pro-payfast');?></p>
		      <label class="iump_label_shiwtch iump_checkbox">
							<?php $checked = ($data[ 'ump_payfast-enabled' ]) ? 'checked' : '';?>
							<input type="checkbox" class="iump-switch" onClick="iumpCheckAndH(this, '#ump_payfast-enabled');" <?php esc_html_e($checked);?> />
							<div class="switch"></div>
					</label>
					<p><?php esc_html_e('Once all Settings are properly done, Activate the Payment Service for further use.', 'ultimate-membership-pro-payfast');?> </p>
					<input type="hidden" name="ump_payfast-enabled" value="<?php esc_html_e($data['ump_payfast-enabled']);?>" id="ump_payfast-enabled" />
				</div>

					<?php if ( defined('UMP_PAYFAST_PRO') && UMP_PAYFAST_PRO ): ?>
						<!-- pro version description -->
						<div class="iump-form-line">
						<h4>PayFast Pro <?php  esc_html_e(' Capabilities', 'ultimate-membership-pro-payfast');?></h4>
						<ul class="ihc-payment-capabilities-list">
						<li><?php _e('To receive payments using PayFast for the goods or services that you sell, you will <b>need to have a South African bank account</b> for PayFast to pay the funds out to.', 'ultimate-membership-pro-payfast');?></li>
						<li><?php  _e(' PayFast Pro support <b>subscriptions</b> with <code>1 month</code>, <code>3 months</code>, <code>6 months</code> or <code>1 year</code>.', 'ultimate-membership-pro-payfast');?> </li>
						<li><?php esc_html_e(' PayFast is made for businesses based in South Africa.', 'ultimate-membership-pro-payfast');?> </li>
						<li><?php esc_html_e(' PayFast use ZAR ( R ) currency.', 'ultimate-membership-pro-payfast');?> </li>
						</ul>
						</div>
						<!-- end of pro version description -->
					<?php else : ?>
						<!-- free version description -->
						<div class="iump-form-line">
						<h4>PayFast <?php  esc_html_e(' Capabilities', 'ultimate-membership-pro-payfast');?></h4>
						<ul class="ihc-payment-capabilities-list">
						<li><?php _e('To receive payments using PayFast for the goods or services that you sell, you will <b>need to have a South African bank account</b> for PayFast to pay the funds out to.', 'ultimate-membership-pro-payfast');?></li>
						<li><?php  _e(' PayFast support only <b>one-time or limited payments</b>.', 'ultimate-membership-pro-payfast');?> </li>
						<li><?php esc_html_e(' PayFast is made for businesses based in South Africa.', 'ultimate-membership-pro-payfast');?> </li>
						<li><?php esc_html_e(' PayFast use ZAR ( R ) currency.', 'ultimate-membership-pro-payfast');?> </li>
						</ul>
						</div>

							<div class="ihc-alert-warning"><?php _e('To handle recurring Subscriptions management and charge recurring Payments, you must install the <b>Payfast Pro</b> version, which is available ', 'ultimate-membership-pro-razorpay');?><a href="https://store.wpindeed.com/addon/payfast-pro-payment-gateway/" target="_blank"><?php esc_html_e(' here', 'ultimate-membership-pro-razorpay');?>.</a></div>


						<!-- end of free version description -->
					<?php endif;?>

				<div class="ihc-wrapp-submit-bttn iump-submit-form">
						<input id="ihc_submit_bttn" type="submit" value="<?php _e('Save Changes', 'ultimate-membership-pro-payfast' );?>" name="ihc_save" class="button button-primary button-large" />
				</div>

	</div>
</div>
	<div class="ihc-stuffbox">
				<h3 class="ihc-h3"><?php esc_html_e('PayFast Settings', 'ultimate-membership-pro-payfast');?></h3>
					<div class="iump-form-line">
					<div class="row ihc-row-no-margin">
						<div class="col-xs-5 ihc-col-no-padding">
						<div class="iump-form-line iump-no-border input-group">
								<span class="input-group-addon"><?php  esc_html_e( 'Merchant ID', 'ultimate-membership-pro-payfast' );?></span>
								<input class="form-control" type="text" name="ump_payfast-merchant_id" value="<?php esc_html_e($data['ump_payfast-merchant_id']);?>" />
						</div>

						<div class="iump-form-line iump-no-border input-group">
								<span class="input-group-addon"><?php  esc_html_e( 'Merchant key', 'ultimate-membership-pro-payfast');?></span>
								<input class="form-control" type="text" name="ump_payfast-merchant_key" value="<?php esc_html_e($data['ump_payfast-merchant_key']);?>" />
						</div>

					</div>
				</div>
				<div class="inside">
				<ul class="ihc-payment-capabilities-list">
					<li><?php esc_html_e('Go to ', 'ultimate-membership-pro-payfast');?> <a href="https://www.payfast.co.za/" target="_blank">payfast.co.za</a> <?php esc_html_e(' and login with username and password.', 'ultimate-membership-pro-payfast');?></li>
					<li><?php _e('On Dashboard will be displayed your <b>Merchant ID</b> and <b>Merchant Key</b> on the top right-hand side of the page.', 'ultimate-membership-pro-payfast');?></li>
				</ul>
			</div>

			<div class="iump-form-line">
				<div class="inside">
						<input type="checkbox" onClick="checkAndH(this, '#ump_payfast-sandbox');" <?php if($data['ump_payfast-sandbox']) esc_html_e('checked');?> />
						<input type="hidden" name="ump_payfast-sandbox" value="<?php esc_html_e($data['ump_payfast-sandbox']);?>" id="ump_payfast-sandbox" />
						<label class="iump-labels"><h4><?php esc_html_e('Enable PayFast Sandbox', 'ultimate-membership-pro-payfast');?></h4></label>

					<div class="row ihc-row-no-margin">
					 <div class="col-xs-5 ihc-col-no-padding">
						 <b><?php esc_html_e('Redirect Page after Payment:', 'ultimate-membership-pro-payfast');?></b>
							 <div class="input-group">
							 <select name="ump_payfast-return_page" class="form-control">
								<option value="-1" <?php if($data['ump_payfast-return_page']==-1) esc_html_e('selected');?> >...</option>
								<?php
									if($data['pages']){
										foreach($data['pages'] as $k=>$v){
											?>
												<option value="<?php esc_html_e($k);?>" <?php if ($data['ump_payfast-return_page']==$k) esc_html_e('selected');?> ><?php esc_html_e($v);?></option>
											<?php
										}
									}
								?>
							</select></div>
						</div>
					</div>
						<div class="ihc-clear"></div>

					<div class="row ihc-row-no-margin">
						<div class="col-xs-5 ihc-col-no-padding">
							<b><?php esc_html_e('Redirect Page after Cancel Payment:', 'ultimate-membership-pro-payfast');?></b>
								<div class="input-group">
								<select name="ump_payfast-cancel_page" class="form-control">
								 <option value="-1" <?php if($data['ump_payfast-cancel_page']==-1) esc_html_e('selected');?> >...</option>
								 <?php
									 if($data['pages']){
										 foreach($data['pages'] as $k=>$v){
											 ?>
												 <option value="<?php esc_html_e($k);?>" <?php if ($data['ump_payfast-cancel_page']==$k) esc_html_e('selected');?> ><?php esc_html_e($v);?></option>
											 <?php
										 }
									 }
								 ?>
							 </select></div>
						 </div>

				 </div>


			 </div>

			 </div>

					 <?php
							 $siteUrl = site_url();
							 $siteUrl = trailingslashit( $siteUrl );
							 $notifyUrl = add_query_arg( 'ihc_action', 'ump_payfast', $siteUrl );
					 ?>

				 <div class="ihc-wrapp-submit-bttn iump-submit-form">
						 <input id="ihc_submit_bttn" type="submit" value="<?php _e('Save Changes', 'ultimate-membership-pro-payfast' );?>" name="ihc_save" class="button button-primary button-large" />
				 </div>

			</div>
		</div>
		<div class="ihc-clear"></div>
					<div class="ihc-admin-register-margin-bottom-space"></div>
				<!---->
			<div class="ihc-stuffbox">
					<h3 class="ihc-h3"><?php esc_html_e('Extra Settings', 'ultimate-membership-pro-payfast');?></h3>
					<div class="inside">
						<div class="row ihc-row-no-margin">
								<div class="col-xs-4">

										<div class="iump-form-line iump-no-border input-group">
											<span class="input-group-addon"><?php esc_html_e('Label:', 'ultimate-membership-pro-payfast');?></span>
											<input type="text" name="ihc_ump_payfast_label" value="<?php esc_html_e( $data['ihc_ump_payfast_label']);?>"  class="form-control" />
										</div>

										<div class="iump-form-line iump-no-border input-group">
											<span class="input-group-addon"><?php esc_html_e('Order:', 'ultimate-membership-pro-payfast');?></span>
											<input type="number" min="1" name="ihc_ump_payfast_select_order" value="<?php esc_html_e( $data['ihc_ump_payfast_select_order']);?>" class="form-control" />
										</div>
									</div>

						</div>
						<!-- developer -->
						<div class="row ihc-row-no-margin">
								<div class="col-xs-4">

									 <div class="input-group">
									 		<h4><?php esc_html_e('Short Description', 'ultimate-membership-pro-payfast');?></h4>
										 	<textarea name="ihc_ump_payfast_short_description" class="form-control" rows="2" cols="125" placeholder="<?php esc_html_e('write a short description', 'ultimate-membership-pro-payfast');?>"><?php esc_html_e( isset( $data['ihc_ump_payfast_short_description'] ) ? stripslashes($data['ihc_ump_payfast_short_description']) : '');?></textarea>
								 	 </div>
							</div>
						</div>
							<!-- end developer -->

							<div class="ihc-wrapp-submit-bttn iump-submit-form">
								<input id="ihc_submit_bttn" type="submit" value="<?php esc_html_e('Save Changes', 'ultimate-membership-pro-payfast');?>" name="ihc_save" class="button button-primary button-large" />
						 </div>
			</div>
		</div>
</form>
<?php
