<?php
namespace ProfitBlue\Blocks;

use ProfitBlue\Abstracts\AbstractForm;
use ProfitBlue\Helpers\Helper;

/**
 * ShippingVariableCostFormLine
 */
class ShippingVariableCostFormLine {
	
	/**
	 * render
	 *
	 * @param  array $data
	 * @return void
	 */
	public static function render( $data = null ) {

		echo '<div class="shipping-variable-cost-label section-line-input">' . esc_html__( 'Shipping costs', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
		echo '<input type="hidden" name="variable-label" id="variable-label" value="' . esc_html__( 'Shipping costs', 'profitblue-financial-reporting-for-woocommerce' ) . '" />';
		echo '<div class="shipping-variable-cost-type section-line-input">';
			$option = array(
				'name' => 'type',
				'id' =>'variable-amounttype',
				'values' => array(
					'pecentage' => esc_html__( 'Pecentage (%)', 'profitblue-financial-reporting-for-woocommerce' ),
					'fixed' => esc_html__( 'Fixed', 'profitblue-financial-reporting-for-woocommerce' )
				)
			);
			$value = 'pecentage';
			if ( !empty( $data[0]->amount_type ) ) {
				$value = $data[0]->amount_type;
			}
			echo wp_kses( AbstractForm::select( $option, $value ), Helper::get_allowed_tags() );
		echo '</div>';
		echo '<div class="shipping-variable-cost-amount section-line-input">';
		$option = array(
			'name' => 'amount',
			'id' =>'variable-amount',
			'min' => 0,
			'step' => '0.01'
		);
		$value =  0;
		if ( !empty( $data[0]->amount ) ) {
			$value = $data[0]->amount;
		}
		echo wp_kses( AbstractForm::number( $option, $value ), Helper::get_allowed_tags() );
		echo '</div>';
			
	}

}
