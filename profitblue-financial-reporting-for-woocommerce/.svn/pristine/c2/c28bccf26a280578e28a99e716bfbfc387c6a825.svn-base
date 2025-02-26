<?php

namespace ProfitBlue\Models;

/**
 * @method OrderPaymentModel
 */
class OrderPaymentModel {

	private $wpdb = null;
	private $order = null;
	private $payments = null;
	private $payment_periods = null;

	public function __construct( $order ) {

		global $wpdb;
		$this->wpdb = $wpdb;
		$this->order = $order;
		$this->set_payment_data();

	}

	/**
	 * Set payment data
	 *
	 * @return void
	 */
	public function set_payment_data() {
		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i",
				array(
					$wpdb->prefix . 'profitblue_payments'					
				)
			)
		);
		if ( !empty( $result ) ) {
			$this->payments = $result;
		}
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i",
				array(
					$wpdb->prefix . 'profitblue_payment_periods'					
				)
			)
		);
		if ( !empty( $result ) ) {
			$this->payment_periods = $result;
		}		
	
	}

	/**
	 * Get order payment income
	 *
	 * @return void
	 */
	public function get_payment_income() {
		
		//payment_periods
		$date = gmdate( 'Y-m-d', $this->order->order_date );
		$year = gmdate( 'Y', $this->order->order_date );

		foreach( $this->payment_periods as $payment_period ) {
			if ( $payment_period->type == 'custom' ) {
				if ( $date >= $payment_period->date_start && $date <= $payment_period->date_end ) {
					$payment_period_id = $payment_period->ID;
					break;
				}
			}			
		}
		if ( empty( $payment_period_id ) ) {
			foreach( $this->payment_periods as $payment_period ) {
				if ( $payment_period->year == $year ) {
					$payment_period_id = $payment_period->ID;
					break;
				}
			}
		}
		if ( empty( $payment_period_id ) ) {
			foreach( $this->payment_periods as $payment_period ) {
				if ( $payment_period->type == 'whole-period' ) {
					$payment_period_id = $payment_period->ID;
					break;
				}
			}
		}

		$payment_cost = 0;
		//Now we have payment cost_id - proccess price
		foreach( $this->payments as $payment ) {
			if ( $payment->payment_period_id == $payment_period_id && $payment->payment == $this->order->order_payment_id ) {

				$payment_cost_id_data = $payment;
				break;
			}
		}
		
		if ( !empty( $payment_cost_id_data ) ) {
			if ( !empty( $payment_cost_id_data->amount ) ) {
				$amount = (float)$payment_cost_id_data->amount;
				$payment_cost = $payment_cost + $amount;
			} else {
				if ( !empty( $payment_cost_id_data->percent && $payment_cost_id_data->percent > 0 ) ) {
					$percent = (float)$payment_cost_id_data->percent;
					$price = $order->order_subtotal;
					$payment_cost = $payment_cost + ( ( $order->order_subtotal / 100 ) * $percent );
				}
			}
		}
		
		return $payment_cost;

	}

}
