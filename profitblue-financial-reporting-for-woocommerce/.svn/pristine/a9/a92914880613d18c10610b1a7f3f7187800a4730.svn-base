<?php
namespace ProfitBlue\Blocks;

use ProfitBlue\Blocks\PaymentCostFormLine;
use ProfitBlue\Controllers\PaymentsPeriodsController;
use ProfitBlue\Admin\AdminPage;
use ProfitBlue\Helpers\Helper;

/**
 * PaymentCostsBlock
 */
class PaymentCostsBlock {
	
	/**
	 * get_payment_costs_block
	 *
	 * @param  array $data
	 * @return string
	 */
	public static function get_payment_costs_block( $data = null ) {

		/**
		 * Get selected period id
		 * 
		 */
		$periodsController = new PaymentsPeriodsController();
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( empty( $_GET['period'] ) ) {
			$date_period = 'whole-period';
		} else {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$date_period = isset( $_GET['period'] ) ? wp_unslash( sanitize_text_field( $_GET['period'] ) ) : '';
		}
		if ( 'custom' == $date_period ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$date_start = isset( $_GET['date_start'] ) ? wp_unslash( sanitize_text_field( $_GET['date_start'] ) ) : '';
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$date_end = isset( $_GET['date_end'] ) ? wp_unslash( sanitize_text_field( $_GET['date_end'] ) ) : '';
			$period_data = $periodsController->get_period( $date_period, $date_start, $date_end );	
			$period_id 	 = $period_data[0]->ID;
		} else {
			$period_data = $periodsController->get_period( $date_period );
			$period_id 	 = $period_data[0]->ID;
		}

		ob_start();

		echo '<div id="payment-cost" class="payment-cost">';

			echo '<div class="form-section">';
				echo '<div class="form-section-inner">';
					echo '<div class="form-section-line line-3-2-2">';						
						echo '<div class="fixed-cost-label section-line-label">';
							echo '<span class="tooltip-wrap">' . esc_html__( 'Payment method', 'profitblue-financial-reporting-for-woocommerce' );
							echo '</span>';
						echo '</div>';
						
						echo '<div class="fixed-cost-amount section-line-label">';
							echo '<span class="tooltip-wrap">' . esc_html__( '% of Transaction', 'profitblue-financial-reporting-for-woocommerce' );
							echo '</span>';
						echo '</div>';

						echo '<div class="fixed-cost-date-range section-line-label">';
							echo '<span class="tooltip-wrap">' . esc_html__( 'Fixed fee (Amount)', 'profitblue-financial-reporting-for-woocommerce' );
							echo '</span>';
						echo '</div>';						
					echo '</div>';

					global $wpdb;
					$payments = $wpdb->get_results(
						$wpdb->prepare(
							"SELECT * FROM %i",
							array(
								$wpdb->prefix . 'profitblue_payments'
							)
						)
					);
					
					$gateways = $wpdb->get_results(
						$wpdb->prepare(
							"SELECT * FROM %i GROUP BY order_payment_id",
							array(
								$wpdb->prefix . 'profitblue_orders'
							)
						)
					);
					
					if ( !empty( $gateways ) ) {
						foreach( $gateways as $key => $gateway ) { 
							if ( 'dobirka' == $gateway->order_payment_id || 'cod' == $gateway->order_payment_id ) {
								continue;
							}
							echo '<div class="form-section-line payment-line line-3-2-2">';
								wp_kses( PaymentCostFormLine::render( $gateway, $payments, $period_id ), Helper::get_allowed_tags() );
							echo '</div>';
						}
					}
				echo '</div>';
			echo '</div>';
		echo '</div>';			

		return ob_get_clean();

	}

}
