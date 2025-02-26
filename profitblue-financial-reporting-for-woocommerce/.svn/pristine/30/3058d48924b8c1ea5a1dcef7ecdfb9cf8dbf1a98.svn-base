<?php
namespace ProfitBlue\Blocks;

use ProfitBlue\Abstracts\AbstractForm;
use ProfitBlue\Models\ShippingCostsModel;
use ProfitBlue\Helpers\Helper;

/**
 * ShippingZonesCostFormLine
 */
class ShippingZonesCostFormLine {
	
	/**
	 * render
	 *
	 * @param  object $shipping
	 * @param  object $shipping_cost
	 * @param  int $period_id
	 * @return void
	 */
	public static function render( $shipping = null, $shipping_cost = null, $period_id = null ) {

		$line_data = $shipping_cost->get_shipping_item( $shipping->get_rate_id(), $period_id );
		
		echo '<div class="shipping-variable-cost-label section-line-input">';
			echo esc_html( $shipping->get_method_title() );
			echo '<input type="hidden" name="shipping-id" value="' . esc_html( $shipping->get_rate_id() ) . '" />';
		echo '</div>';
		echo '<div class="shipping-variable-cost-type section-line-input">';
			$value = 0;
			if ( !empty( $line_data[0] ) ) {
				$value = $line_data[0]->shipping_price;
			}
			$option = array(
				'name' => 'amount',
				'min' => 0,
				'step' => '0.01'
			);
			echo wp_kses( AbstractForm::number( $option, $value ), Helper::get_allowed_tags() );
		echo '</div>';
		echo '<div class="shipping-variable-cost-amount section-line-input">';
			$value = 0;
			if ( !empty( $line_data[0] ) ) {
				$value = $line_data[0]->shipping_cod;
			}
			$option = array(
				'name' => 'cod',
				'min' => 0,
				'step' => '0.01'
			);
			echo wp_kses( AbstractForm::number( $option, $value ), Helper::get_allowed_tags() );
		echo '</div>';
			
	}

}
