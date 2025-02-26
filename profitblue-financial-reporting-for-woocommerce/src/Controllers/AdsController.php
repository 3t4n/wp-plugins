<?php

namespace Profitblue\Controllers;

use ProfitBlue\Controllers\ProductsPeriodsController;
use ProfitBlue\Controllers\AdsDaysData;
use ProfitBlue\Controllers\AdsWeeksData;
use ProfitBlue\Controllers\AdsMonthsData;

/**
 * Class return data for Overwiev Ads graph
 * 
 */
class AdsController {
	
	/**
	 * period
	 *
	 * @var string
	 */
	private $period = 'whole-period';
		
	/**
	 * period_id
	 *
	 * @var int
	 */
	private $period_id = null;
		
	/**
	 * start_date
	 *
	 * @var string
	 */
	private $start_date = false;
		
	/**
	 * end_date
	 *
	 * @var string
	 */
	private $end_date = false;
		
	/**
	 * limit
	 *
	 * @var int
	 */
	private $limit = 20;
		
	/**
	 * offset
	 *
	 * @var int
	 */
	private $offset = null;
		
	/**
	 * wpdb
	 *
	 * @var object
	 */
	private $wpdb = null;
		
	/**
	 * ccai
	 *
	 * @var array
	 */
	private $ccai = false;
		
	/**
	 * display
	 *
	 * @var string
	 */
	public $display = false;
	
	/**
	 * count
	 *
	 * @var int
	 */
	public $count = null;
	
	/**
	 * __construct
	 *
	 * @param  string $start_date
	 * @param  string $end_date
	 * @return void
	 */
	public function __construct( $start_date, $end_date ) {

		global $wpdb;
		$this->wpdb = $wpdb;
		$this->start_date = $start_date;
		$this->end_date = $end_date;
		$this->set_ads_ccai();		

	}

	/**
	 * set_limit
	 *
	 * @param  int $limit
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
			$this->offset = isset( $_GET['offset'] ) ? wp_unslash( sanitize_text_field( $_GET['offset'] ) ) : '';
		}

	}

	/**
	 * Get variable ads
	 *
	 * @return void
	 */
	public function get_variable_ads() {

		$variable_ads = array();
		foreach( $this->ccai as $item ) {
			if ( $item['variable-ads'] ) {

			}
		}		

	}

	/**
	 * get_data_by_date
	 *
	 * @param  string $mode
	 * @return array
	 */
	public function get_data_by_date( $mode = null ) {

		$start_date = new \DateTime( $this->start_date );
		$end_date = new \DateTime( $this->end_date );
		$days_interval = $start_date->diff( $end_date );
		$number_of_days = $days_interval->days;
		$number_of_days++;
		$interval = array( $this->start_date, $this->end_date );
		if ( $number_of_days < 31 ) {
			//Display days
			$this->display = 'days';
			$days_data = new AdsDaysData( $this->start_date, $this->end_date );
			return $days_data->get_data( $this->ccai );
		} elseif ( $number_of_days > 30 && $number_of_days < 210 ) {			
			//Display weeks
			$this->display = 'weeks';
			$weeks_data = new AdsWeeksData( $this->start_date, $this->end_date );	
			return $weeks_data->get_data( $this->ccai );			
		} elseif ( $number_of_days > 209 ) {
			//Display monts
			$this->display = 'months';
			$months_data = new AdsMonthsData( $this->start_date, $this->end_date );			
			return $months_data->get_data( $this->ccai );
		}		

	}
	
	/**
	 * set_ads_ccai
	 *
	 * @return void
	 */
	private function set_ads_ccai() {

		global $wpdb;
		$args = array();
		$where = '';
		if ( false != $this->start_date && false != $this->end_date ) {
			
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i
					WHERE (date_start BETWEEN %s AND %s)
					OR (date_end BETWEEN %s AND %s)
					OR (date_start <= %s AND date_end >= %s)",
					array(
						$wpdb->prefix . 'profitblue_ccai',
						$this->start_date,
						$this->end_date,
						$this->start_date,
						$this->end_date,
						$this->start_date,
						$this->end_date
					)
				),
				ARRAY_A
			);

		} else {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i",
					array(
						$wpdb->prefix . 'profitblue_ccai'
					)
				),
				ARRAY_A
			);
		}
		
		if ( !empty( $result ) ) {
			$this->ccai = $result;
		}

	}

		
	/**
	 * get_orders_by_monts
	 *
	 * @return int|false
	 */
	private function get_orders_by_monts() {

		global $wpdb;
		$start_date = $this->start_date;
		$end_date = $this->end_date;

		$count_result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT 
				DATE_FORMAT(formated_date, %s) AS month,
				COUNT(order_id) AS order_count,
				SUM(order_subtotal) AS revenue
				FROM %i
				WHERE 
					formated_date >= %s 00:00:00' AND
					formated_date <= IF(order_date = %s, %s 23:59:59', LAST_DAY(order_date))
				GROUP BY month
				ORDER BY month;",
				array(
					'%Y-%m',
					$wpdb->prefix . 'profitblue_orders',
					$start_date,
					$start_date,
					$end_date,						
				)
			),
			ARRAY_A
		);

		if ( !empty( $count_result ) ) {
			return $count_result;
		} else {
			return false;
		}

	}

	/**
	 * get_days_in_months
	 *
	 * @param  string $start_date_string
	 * @param  string $end_date_string
	 * @return array
	 */
	public function get_days_in_months( $start_date_string, $end_date_string ) {

		// Create DateTime objects from the date strings
		$startDate = new \DateTime( $start_date_string );
		$endDate = new \DateTime( $end_date_string );

		// Initialize an array to store the number of days for each month
		$daysInMonths = [];

		// Calculate the number of days for the first and last months
		$firstMonthDays = (int) $startDate->format('t') - $startDate->format('j') + 1;
		$lastMonthDays = $endDate->format('j');

		// If the interval is within the same month
		if ($startDate->format('Y-m') === $endDate->format('Y-m')) {
			$daysInMonths[$startDate->format('Y-m')] = $endDate->diff($startDate)->days + 1;
		} else {
			// Add days for the first month
			$daysInMonths[$startDate->format('Y-m')] = $firstMonthDays;

			// Iterate through each month between the start and end
			$currentMonth = clone $startDate;
			$currentMonth->modify('first day of next month');
			while ($currentMonth <= $endDate) {
				$yearMonthKey = $currentMonth->format('Y-m');
				$daysInMonth = (int) $currentMonth->format('t');
				$daysInMonths[$yearMonthKey] = $daysInMonth;
				$currentMonth->modify('first day of next month');
			}

			// Add days for the last month
			$daysInMonths[$endDate->format('Y-m')] = $lastMonthDays;
		}

		return $daysInMonths;

	}
	
	/**
	 * get_overlapping_interval
	 *
	 * @param  array $firstInterval
	 * @param  array $checkedInterval
	 * @return array|null
	 */
	public function get_overlapping_interval( $firstInterval, $checkedInterval ) {

		$firstStart = new \DateTime($firstInterval[0]);
		$firstEnd = new \DateTime($firstInterval[1]);
		$checkedStart = new \DateTime($checkedInterval[0]);
		$checkedEnd = new \DateTime($checkedInterval[1]);
	
		$start = $firstStart > $checkedStart ? $firstStart : $checkedStart;
		$end = $firstEnd < $checkedEnd ? $firstEnd : $checkedEnd;
	
		if ($start <= $end) {
			return [$start->format('Y-m-d'), $end->format('Y-m-d')];
		} else {
			return null;
		}

	}
	
}
