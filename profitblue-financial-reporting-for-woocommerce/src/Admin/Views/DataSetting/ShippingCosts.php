<?php
namespace ProfitBlue\Admin\DataSetting;

use ProfitBlue\Blocks\ShippingCostsBlock;
use ProfitBlue\Models\ShippingCostsModel;
use ProfitBlue\Helpers\Helper;
use ProfitBlue\Blocks\BatchUpdateBlock;

$shipping_cost = new ShippingCostsModel();

// phpcs:ignore WordPress.Security.NonceVerification.Recommended
if ( !empty( $_GET['period'] ) ) {

	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$period = isset( $_GET['period'] ) ? wp_unslash( sanitize_text_field( $_GET['period'] ) ) : '';
	if ( 'custom' == $period ) {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$date_start = isset( $_GET['date_start'] ) ? wp_unslash( sanitize_text_field( $_GET['date_start'] ) ) : '';
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$date_end = isset( $_GET['date_end'] ) ? wp_unslash( sanitize_text_field( $_GET['date_end'] ) ) : '';
		$data = $shipping_cost->get_shipping_cost( 'custom-range', $date_start, $date_end );
	} else {
		$data = $shipping_cost->get_shipping_cost( $period );
	}

} else {
	$data = $shipping_cost->get_shipping_cost( 'whole-period' );
}

echo '<div class="shipping-costs-wrap">';
	echo wp_kses( ShippingCostsBlock::get_shipping_costs_block( $data, $shipping_cost ), Helper::get_allowed_tags() );
echo '</div>';

