<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

?>
	<div id="awsa-parcel-info" class="awsa-parcel-info">
		<h2 class="woocommerce-order-details__title"><?php esc_html_e( 'Parcel details', 'awsa-shipping' ); ?></h2>
		<table class="woocommerce-table woocommerce-table--order-details shop_table order_details">
			</tr>
			<th scope="row"><?php esc_html_e( 'Parcel code', 'awsa-shipping' ); ?></th>
			<?php
			if ( $parcel_code ) :
				?>
				<td><span><?php echo esc_html( $parcel_code ); ?></span></td>
			<?php else : ?>
				<td>--</td>
			<?php endif; ?>
			</tr>
			<?php do_action( 'awsa_parcel_info_customer_view_order', $order_id ); ?>
		</table>
	</div>
<?php
