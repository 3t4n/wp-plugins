<?php if ( !defined( 'ABSPATH' ) ) exit; ?>

<h3 class="wc-settings-sub-title " id="woocommerce_ebizzpay_Redirect_url"><?php esc_html_e( 'Webhook &amp; Redirect', 'ebizzpay-wc' ); ?></h3>
<p><?php esc_html_e( 'Set webhook URL to automatically update order status and redirect URL to automatically redirect customer to successful payment page upon payment completion.' ); ?></p>

<table class="form-table">
	<tr valign="top">
		<th scope="row" class="titledesc">
			<label><?php esc_html_e( 'Webhook &amp; Redirect URL', 'ebizzpay-wc' ); ?></label>
		</th>
		<td class="forminp">
			<fieldset>
				<legend class="screen-reader-text"><span><?php esc_html_e( 'Webhook &amp; Redirect URL', 'ebizzpay-wc' ); ?></span></legend>
				<input class="input-text regular-input" type="text" value="<?php echo esc_attr( WC()->api_request_url( get_class( $this ) ) ); ?>" onclick="this.select()" readonly>
				<p class="description"><?php esc_html_e( 'Copy this URL and update it on your collection in EbizzPay dashboard > Settings > API > Webhooks &amp; Redirects.', 'ebizzpay-wc' ); ?></p>
			</fieldset>
		</td>
	</tr>
</table>
