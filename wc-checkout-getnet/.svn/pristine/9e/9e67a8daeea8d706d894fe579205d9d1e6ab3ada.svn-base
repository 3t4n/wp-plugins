<?php

/**
 * PIX partial thankyou
 *
 * @package WcGetnet
 */
?>
<div id="getnet-thankyou" class="pix-thankyou">
	<div class="getnet-container">
		<fieldset class="getnet-billet-form wc-payment-form">
			<?php if( $args['status_code'] !== "DENIED" ) : ?>
				<p id="getnet-pix-title"><strong><?php _e( 'Seu pedido foi realizado com sucesso!' ); ?></strong></p>
			<?php endif; ?>
			<p id="qrcode-message"><?php echo $args['status_msg']; ?></p>
			<div id="qrcode-content">
				<p>Este PIX irá expirar em:	</br><span class="time-to-expire"></span></p>
				<?php if( $args['status_code'] !== "DENIED" ) : ?>
					<span class="qrcode-pix">
						<img src="data:image/png;base64,<?php echo $args['qr_code']; ?>" />
					</span>
					<label>
						<div class="linecode-container">
							<span id="linetext"><p><?php _e( 'Chave PIX:' ); ?></p></span>
							<span id="linecode"><?php echo esc_attr( $args['pix_key'] ); ?></span><br/>

							<input type="button" class="btn-linecode-number" value="<?php _e( 'Copiar código' ); ?>"></br>
						</div>
					</label>
				<?php endif ?>
			<div id="qrcode-content">
		</fieldset>
	</div>
	<form id="receipt_form">
		<input type="hidden" id="admin-ajax" value="<?php echo admin_url( 'admin-ajax.php' ); ?>">
		<input type="hidden" name="order_id" id="order_id" value="<?php echo esc_attr( $order_id ); ?>" />
		<input type="hidden" name="creation_date_qrcode" id="creation_date_qrcode" value="<?php echo esc_attr( $args['creation_date_qrcode'] ); ?>" />
		<input type="hidden" name="expiration_date_qrcode" id="expiration_date_qrcode" value="<?php echo esc_attr( $args['expiration_date_qrcode'] ); ?>" />
		<?php echo wp_nonce_field( 'order-pay'.$order_id, 'wad_thankyou_nonce', true, false ); ?>
		<input type="hidden" id="billet-code" value="<?php echo esc_attr( $args['pix_key'] ); ?>">
	</form>
</div>
