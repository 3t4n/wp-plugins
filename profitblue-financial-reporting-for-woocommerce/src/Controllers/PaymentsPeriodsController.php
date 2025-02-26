<?php

namespace ProfitBlue\Controllers;

/**
 * PaymentsPeriodsController
 */
class PaymentsPeriodsController {
	
	/**
	 * limit
	 *
	 * @var int
	 */
	private $limit = 20;
	
	/**
	 * offset
	 *
	 * @var undefined
	 */
	private $offset = null;
	
	/**
	 * wpdb
	 *
	 * @var undefined
	 */
	private $wpdb = null;
		
	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {

		global $wpdb;
		$this->wpdb = $wpdb;
		$this->parse_args();


	}

	/**
	 * Set limit
	 *
	 * @return void
	 */
	public function set_limit( $limit ) {
	
		$this->limit = $limit;

	}

	/**
	 * Parse args from url
	 *
	 * @return void
	 */
	public function parse_args() {
	
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['offset'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( $_GET['offset'] > 1 ) {
				// phpcs:ignore WordPress.Security.NonceVerification.Recommended
				$this->offset = isset( $_GET['offset'] ) ? (int) wp_unslash( sanitize_text_field( $_GET['offset'] ) ) - 1 : 0;
			}
		}

	}

	/**
	 * Get periods
	 *
	 * @return array/false
	 */
	public function get_periods() {

		global $wpdb;
		$result = $wpdb->get_results( 
			$wpdb->prepare(
				"SELECT * FROM %i",
				array(
					$this->wpdb->prefix . 'profitblue_payment_periods'
				)
			)
		);
		if ( !empty( $result ) ) {
			return $result;
		} else {
			return false;
		}

	}

	/**
	 * Get periods
	 *
	 * @return array/false
	 */
	public function get_custom_periods() {

		global $wpdb;
		$result = $wpdb->get_results( 
			$wpdb->prepare(
				"SELECT * FROM %i WHERE type='custom'",
				array(
					$this->wpdb->prefix . 'profitblue_payment_periods'
				)
			)
		);
		if ( !empty( $result ) ) {
			return $result;
		} else {
			return false;
		}

	}

	/**
	 * get_period
	 *
	 * @param  string $period
	 * @param  string $date_start
	 * @param  string $date_end
	 * @return array|false
	 */
	public function get_period( $period, $date_start = null, $date_end = null ) {

		global $wpdb;
		if ( 'custom' == $period ) {
			$result = $wpdb->get_results( 
				$wpdb->prepare(
					"SELECT * FROM %i WHERE type='custom' AND date_start=%s AND date_end=%s",
					array(
						$wpdb->prefix . 'profitblue_payment_periods',
						$date_start,
						$date_end
					)
				)
			);
		} elseif ( 'whole-period' == $period ) {
			$result = $wpdb->get_results( 
				$wpdb->prepare(
					"SELECT * FROM %i WHERE type='whole-period'",
					array(
						$wpdb->prefix . 'profitblue_payment_periods'
					)
				)
			);
		} else {
			$result = $wpdb->get_results( 
				$wpdb->prepare(
					"SELECT * FROM %i WHERE type=%s",
					array(
						$wpdb->prefix . 'profitblue_payment_periods',
						$period
					)
				)
			);
		}

		
		if ( !empty( $result ) ) {
			return $result;
		} else {
			return false;
		}

	}

	/**
	 * check_period
	 *
	 * @param  string $date_start
	 * @param  string $date_end
	 * @return bool
	 */
	public function check_period( $date_start, $date_end ) {

		global $wpdb;
		$result = $wpdb->get_results( 
			$wpdb->prepare(
				"SELECT * FROM %i WHERE date_start <= %s AND date_end >= %s",
				array(
					$wpdb->prefix . 'profitblue_payment_periods',
					$date_start,
					$date_start
				)
			)
		);
		if ( !empty( $result ) ) {
			return false;
		}
		$result = $wpdb->get_results( 
			$wpdb->prepare(
				"SELECT * FROM %i WHERE date_start <= %s AND date_end >= %s",
				array(
					$wpdb->prefix . 'profitblue_payment_periods',
					$date_end,
					$date_end
				)
			)
		);
		if ( !empty( $result ) ) {
			return false;
		}

		return true;

	}

	/**
	 * create_custom_periods
	 *
	 * @param  string $date_start
	 * @param  string $date_end
	 * @param  string $year
	 * @return void
	 */
	public function create_custom_periods( $date_start, $date_end, $year ) {

		$data = array(
			'name' 			=> 'Custom period',
			'type' 			=> 'custom',
			'date_start' 	=> $date_start,
			'date_end' 		=> $date_end,
			'year' 			=> $year
		);

		$result = $this->wpdb->insert(
			$this->wpdb->prefix . 'profitblue_payment_periods',
			$data
		);

	}

}
