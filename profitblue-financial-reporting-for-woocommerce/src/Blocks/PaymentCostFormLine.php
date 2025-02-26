<?php
namespace ProfitBlue\Blocks;

use ProfitBlue\Abstracts\AbstractForm;
use ProfitBlue\Helpers\Helper;

/**
 * PaymentCostFormLine
 */
class PaymentCostFormLine {
	
	/**
	 * render
	 *
	 * @param  array $gateway
	 * @param  array $payments
	 * @param  int $period_id
	 * @return void
	 */
	public static function render( $gateway = null, $payments = null, $period_id = null ) {

		$values = null;
		if ( !empty( $payments ) ) {
			foreach( $payments as $payment ) {
				if ( $gateway->order_payment_id == $payment->payment && $period_id == $payment->payment_period_id ) {
					$values = $payment;
				}
			}
		}
		if ( empty( $values->label ) ) { 
			$payment_label = $gateway->order_payment_label;
		} else {
			$payment_label = $values->label;
		}
		echo '<div class="payment-label section-line-input">';	
			echo '<div class="payment-label">' . esc_html( $payment_label ) . '</div>';
			echo '<input type="hidden" name="paymentid" value="' . esc_html( $gateway->order_payment_id ) . '" />';
			echo '<input type="hidden" name="label" value="' . esc_html( $payment_label ) . '" />';
		echo '</div>';
		echo '<div class="payment-percent">';
			$option = array(
				'name' => 'percent',
				'id' =>'payment-percent',
				'min' => 0,
				'step' => '0.01'
			);
			$value =  0;
			if ( !empty( $values->percent ) ) {
				$value = $values->percent;
			}
			echo wp_kses( AbstractForm::number( $option, $value ), Helper::get_allowed_tags() );
		echo '</div>';
		echo '<div class="payment-amount">';
			$option = array(
				'name' => 'amount',
				'id' =>'payment-amount',
				'min' => 0,
				'step' => '0.01'
			);
			$value =  0;
			if ( !empty( $values->amount ) ) {
				$value = $values->amount;
			}
			echo wp_kses( AbstractForm::number( $option, $value ), Helper::get_allowed_tags() );
		echo '</div>';
			
	}

}
