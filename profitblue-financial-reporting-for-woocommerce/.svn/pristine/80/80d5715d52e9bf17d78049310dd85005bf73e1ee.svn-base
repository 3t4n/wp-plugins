<?php

namespace ProfitBlue\Models;

use ProfitBlue\Controllers\PaymentsPeriodsController;

class PaymentCostsModel {

	private $wpdb;

	public function __construct() {

		global $wpdb;
		$this->wpdb = $wpdb;

	}

	public function save_payment( $label, $payment, $payment_period_id, $year = null, $percent = null, $amount = null ) {

		$data = array();
		$data['label'] = $label;
		$data['payment'] = $payment;
		$data['payment_period_id'] = $payment_period_id;
		if ( !empty( $percent ) ) {
			$data['percent'] = $percent;
		} else {
			$data['percent'] = 0;
		}
		if ( !empty( $amount ) ) {
			$data['amount'] = $amount;
		} else {
			$data['amount'] = 0;
		}
		$data['year'] = $year;

		$payment_data = $this->get_payment_data( $payment, $payment_period_id );
		
		if ( false ===  $payment_data ) {
			$this->insert_payment_data( $data );
		} else {
			$this->update_payment_data( $payment_data[0]->ID, $data );
		}		

	}
	
	public function get_payment_data( $payment, $payment_period_id ) {

		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i WHERE payment = %s AND payment_period_id = %s",
				array(
					$wpdb->prefix . 'profitblue_payments',
					$payment,
					$payment_period_id				
				)
			)
		);
		
		if ( empty( $result ) ) {
			return false;
		} else {
			return $result;
		}

	}

	public function insert_payment_data( $data ) {

		$this->wpdb->insert( $this->wpdb->prefix . 'profitblue_payments', $data );

		return $this->wpdb->insert_id;

	}

	public function update_payment_data( $shipping_cost_id, $data ) {

		$this->wpdb->update( $this->wpdb->prefix . 'profitblue_payments', $data, array( 'ID' => $shipping_cost_id ) );

	}

	public function get_payments_cost() {

		global $wpdb;
		$period = 'whole-period';
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['period'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$period = isset( $_GET['period'] ) ? wp_unslash( sanitize_text_field( $_GET['period'] ) ) : '';
		}
		$date_start = null;
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['date_start'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$date_start = isset( $_GET['date_start'] ) ? wp_unslash( sanitize_text_field( $_GET['date_start'] ) ) : '';
		}
		$date_end = null;
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['date_end'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$date_end = isset( $_GET['date_end'] ) ? wp_unslash( sanitize_text_field( $_GET['date_end'] ) ) : '';
		}

		$periodController = new PaymentsPeriodsController();
		if ( 'custom' == $period ) {
		
			$period_data = $periodController->get_period( $period, $date_start, $date_end );
			if ( empty( $period_data ) ) {
				return false;
			}

			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i WHERE payment_period_id = %s",
					array(
						$wpdb->prefix . 'profitblue_payments',
						$period_data[0]->ID				
					)
				)
			);
			
		} else {

			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i WHERE year = %s",
					array(
						$wpdb->prefix . 'profitblue_payments',
						$period
					)
				)
			);
			
		}
		
		if ( empty( $result ) ) {
			return false;
		} else {
			return $result;
		}

	}

}
