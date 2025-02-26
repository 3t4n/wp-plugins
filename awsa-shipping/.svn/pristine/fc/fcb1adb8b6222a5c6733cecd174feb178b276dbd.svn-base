<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

?>
	<div id="awsa-parcel-info" class="awsa-parcel-info">
		<label><?php esc_html_e( 'Parcel status', 'awsa-shipping' ); ?></label>
		<br/>

		<?php if ( !empty( $parcel_code ) ) : ?>
			<label><?php esc_html_e( 'Parcel code:', 'awsa-shipping' ); ?></label>
			<?php echo esc_html( $parcel_code ); ?>
			<br/>

			<?php do_action( 'awsa_shipping_parcel_info', $order_id, $parcel_code ); ?>

		<?php else : ?>
			<span style="color:red"><?php echo esc_html__( 'Parcel is not registered', 'awsa-shipping' ); ?></span>
		<?php endif; ?>
	</div>
<?php
