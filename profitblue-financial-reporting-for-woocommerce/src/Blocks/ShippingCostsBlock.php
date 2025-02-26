<?php
namespace ProfitBlue\Blocks;

use ProfitBlue\Blocks\TooltipBlock;
use ProfitBlue\Blocks\ShippingVariableCostFormLine;
use ProfitBlue\Blocks\ShippingZonesCostFormLine;
use ProfitBlue\Models\ShippingCostsModel;
use ProfitBlue\Controllers\ShippingPeriodsController;
use ProfitBlue\Admin\AdminPage;
use ProfitBlue\Helpers\Helper;
use ProfitBlue\Abstracts\AbstractForm;
use ProfitBlue\Models\OrderShippingModel;
use ProfitBlue\Models\OrderPaymentModel;

/**
 * ShippingCostsBlock
 */
class ShippingCostsBlock {
	
	/**
	 * get_shipping_costs_block
	 *
	 * @param  array $data
	 * @param  object $shipping_cost
	 * @return string
	 */
	public static function get_shipping_costs_block( $data, $shipping_cost = null ) {

		global $wpdb;		

		if ( false == $data ) {
			return;
		}

		/**
		 * Get settings type from data array
		 * 
		 */
		$type = 'same-costs';
		
		/**
		 * Get selected period id
		 * 
		 */
		$periodsController = new ShippingPeriodsController();
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
			$period_data = $periodsController->get_period( 'custom-range', $date_start, $date_end );
			$period_id 	 = $period_data[0]->ID;
		} else {
			$period_data = $periodsController->get_period( $date_period );			
			$period_id 	 = $period_data[0]->ID;
		}

		ob_start();

		echo '<div id="shipping-list" class="shipping-list" data-period="' . esc_html( $period_id) . '">';			
			echo '<div class="shipping-list-item no-shipping-cost-all" style="opacity:0.5;">';
				echo '<div class="shipping-list-item-left">';
					echo '<div class="shipping-list-item-radio" data-target="no" data-value="no-costs"></div>';
					echo '<input type="radio" class="shipping-costs" id="radio-no-costs" name="shipping-costs" value="no-costs" />';
				echo '</div>';
				echo '<div class="shipping-list-item-right">';
					echo esc_html__( 'No shipping costs at all', 'profitblue-financial-reporting-for-woocommerce' );
				echo '</div>';
			echo '</div>';
			echo '<div class="shipping-list-item same-shipping-cost">';
				echo '<div class="shipping-list-item-left">';
					echo '<div class="shipping-list-item-radio ' . esc_html( Helper::is_active( 'same-costs', $type ) ) . '" data-target="no" data-value="same-costs"></div>';
					echo '<input type="radio" class="shipping-costs" id="radio-same-costs" name="shipping-costs" value="same-costs" ' . esc_html( Helper::is_checked( 'same-costs', $type ) ) . ' />';
				echo '</div>';
				echo '<div class="shipping-list-item-right">';
					echo esc_html__( 'The shipping costs are are the same as what customers pay', 'profitblue-financial-reporting-for-woocommerce' );
				echo '</div>';
			echo '</div>';
			echo '<div class="shipping-list-item different-shipping-cost" style="opacity:0.5;">';
				echo '<div class="shipping-list-item-left">';
					echo '<div class="shipping-list-item-radio" data-target="zone-cost" data-value="custom-costs"></div>';
					echo '<input type="radio" class="shipping-costs" id="radio-custom-costs" name="shipping-costs" value="custom-costs" />';
				echo '</div>';
				echo '<div class="shipping-list-item-right">';
					echo esc_html__( 'The shipping costs are different to what customers pay - create Shipping profile', 'profitblue-financial-reporting-for-woocommerce' );
				echo '</div>';
			echo '</div>';
			echo '<div class="shipping-list-item insert-shipping-cost" style="opacity:0.5;">';
				echo '<div class="shipping-list-item-left">';
					echo '<div class="shipping-list-item-radio" data-target="variable-cost" data-value="variable-costs"></div>';
					echo '<input type="radio" class="shipping-costs" id="radio-variable-costs" name="shipping-costs" value="variable-costs" />';
				echo '</div>';
				echo '<div class="shipping-list-item-right">';
					echo esc_html__( 'Insert Shipping cost as a variable cost (% or amount)', 'profitblue-financial-reporting-for-woocommerce' );
				echo '</div>';
			echo '</div>';

		echo '</div>';

		echo '<div id="shipping-custom-cost" class="shipping-custom-cost">';
		//Get shipping zones

		echo '</div>';
		if ( 'variable-costs' == $type ) {
			echo '<div id="shipping-variable-cost" class="shipping-variable-cost" style="display:block;">';
		} else {
			echo '<div id="shipping-variable-cost" class="shipping-variable-cost">';
		}
			echo '<div class="form-section">';
			echo '<h3>' . esc_html__( 'Variable costs', 'profitblue-financial-reporting-for-woocommerce' ) . '</h3>';
			echo '<p>' . esc_html__( 'Lorem ipsum doler sit amet', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
			echo '<div class="form-section-inner">';
					echo '<div class="form-section-line line-3-2-2">';
						echo '<div class="fixed-cost-label section-line-label">';
							echo '<span class="tooltip-wrap">' . esc_html__( 'Expense label', 'profitblue-financial-reporting-for-woocommerce' );
								wp_kses( TooltipBlock::render( esc_html__( 'Lorem ipsum doler sit amet', 'profitblue-financial-reporting-for-woocommerce' ) ), Helper::get_allowed_tags() );
							echo '</span>';
						echo '</div>';
						echo '<div class="fixed-cost-amount section-line-label">';
							echo '<span class="tooltip-wrap">' . esc_html__( 'Amount or % per order', 'profitblue-financial-reporting-for-woocommerce' );
								wp_kses( TooltipBlock::render( esc_html__( 'Lorem ipsum doler sit amet', 'profitblue-financial-reporting-for-woocommerce' ) ), Helper::get_allowed_tags() );
							echo '</span>';
						echo '</div>';
						echo '<div class="fixed-cost-date-range section-line-label">';
							echo '<span class="tooltip-wrap">' . esc_html__( 'Expense amount', 'profitblue-financial-reporting-for-woocommerce' );
								wp_kses( TooltipBlock::render( esc_html__( 'Lorem ipsum doler sit amet', 'profitblue-financial-reporting-for-woocommerce' ) ), Helper::get_allowed_tags() );
							echo '</span>';
						echo '</div>';
						
					echo '</div>';
					echo '<div class="form-section-line line-3-2-2">';
						wp_kses( ShippingVariableCostFormLine::render( $data ), Helper::get_allowed_tags() );
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
		if ( 'custom-costs' == $type ) {
			echo '<div id="shipping-zone-cost" class="shipping-zone-cost" style="display:block;">';
		} else {
			echo '<div id="shipping-zone-cost" class="shipping-zone-cost">';
		}

			$data_store = \WC_Data_Store::load( 'shipping-zone' );
			$raw_zones = $data_store->get_zones();
			foreach ( $raw_zones as $raw_zone ) {
				$zones[] = new \WC_Shipping_Zone( $raw_zone );
			}
			
			foreach ( $zones as $zone ) {
				echo '<div class="form-section">';
				echo '<h3>' . esc_html__( 'Shipping zone:', 'profitblue-financial-reporting-for-woocommerce' ) . ' ' . esc_html( $zone->get_zone_name() ) . '</h3>';
				echo '<div class="form-section-inner">';
						echo '<div class="form-section-line line-3-2-2">';
							echo '<div class="fixed-cost-label section-line-label">';
								echo '<span class="tooltip-wrap">' . esc_html__( 'Shipping method', 'profitblue-financial-reporting-for-woocommerce' );
								echo '</span>';
							echo '</div>';
							echo '<div class="fixed-cost-amount section-line-label">';
								echo '<span class="tooltip-wrap">' . esc_html__( 'Actual shipping price', 'profitblue-financial-reporting-for-woocommerce' );
								echo '</span>';
							echo '</div>';
							echo '<div class="fixed-cost-date-range section-line-label">';
								echo '<span class="tooltip-wrap">' . esc_html__( 'Cash on delivery (COD)', 'profitblue-financial-reporting-for-woocommerce' );
								echo '</span>';
							echo '</div>';				
						echo '</div>';
						$zone_shipping_methods = $zone->get_shipping_methods();
						foreach ( $zone_shipping_methods as $index => $method ) {
							echo '<div class="form-section-line zone-form-line line-3-2-2" data-rateid="' . esc_html( $method->get_instance_id() ) . '">';
								wp_kses( ShippingZonesCostFormLine::render( $method, $shipping_cost, $data[0]->ID ), Helper::get_allowed_tags() );
							echo '</div>';
						}
					echo '</div>';
				echo '</div>';
			}
		echo '</div>';

		if ( 'no-costs' == $type || 'variable-costs' == $type ) {
			echo '<div id="payment-list" class="" style="display:none">';
		} else {
			echo '<div id="payment-list" class="">';
		}
			

				echo '<div class="form-section-line line-3-2-2">
					<div class="fixed-cost-label section-line-label"><span class="tooltip-wrap">' . esc_html__( 'Cash on delivery payment', 'profitblue-financial-reporting-for-woocommerce' ) . '</span></div>
					<div class="fixed-cost-amount section-line-label"><span class="tooltip-wrap">' . esc_html__( 'Payment', 'profitblue-financial-reporting-for-woocommerce' ) . '</span></div>
				</div>';


				$gateways = WC()->payment_gateways->payment_gateways();
				
				if ( !empty( $gateways ) ) {
					
						echo '<div class="form-section-line payment-line line-3-2-2">';

							echo '<div class="payment-label section-line-input">';	
								echo '<div class="payment-label">' . esc_html__( 'Select cash on delivery payment', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
							echo '</div>';
							echo '<div class="payment-percent">';
								
								echo '<select name="cod-payment" id="cod-payment">';
									echo '<option value="---">---</option>';
									foreach( $gateways as $key => $gateway ) { 
										if ( $data[0]->cod_id == $gateway->id ) {
											echo '<option value="' . esc_html( $gateway->id ) . '" selected="selected">' . esc_html( $gateway->title ) . '</option>';
										} else {
											echo '<option value="' . esc_html( $gateway->id ) . '">' . esc_html( $gateway->title ) . '</option>';
										}
									}
								echo '</select>';	
							echo '</div>';					
				
						echo '</div>';
					}

			echo '</div>';
		

		return ob_get_clean();

	}

		
	/**
	 * get_type
	 *
	 * @param  mixed $data
	 * @return string
	 */
	private static function get_type( $data ) {
		$type = 'no-costs';
		if ( !empty( $data[0]->type ) ) {
			$type = $data[0]->type;
		}
		return $type;
	}

}
