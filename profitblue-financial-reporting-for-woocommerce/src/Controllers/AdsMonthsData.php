<?php

namespace Profitblue\Controllers;

use ProfitBlue\Controllers\ProductsPeriodsController;

/**
 * AdsMonthsData
 */
class AdsMonthsData {
	
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
	public  $display = false;
		
	/**
	 * months_array
	 *
	 * @var array
	 */
	public $months_array = false;
	
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

	}

	/**
	 * get_data
	 *
	 * @param  array $ccai
	 * @return array
	 */
	public function get_data( $ccai ) {

		global $wpdb;
		$interval = array( $this->start_date, $this->end_date );
		$ccai_array = array();
		$this->months_array = $this->get_all_months( $this->start_date, $this->end_date );
		$days_in_months = $this->get_days_in_months( $this->start_date, $this->end_date );
		$months_year = $this->get_months_year( $this->start_date, $this->end_date );	
		$months = array();
		$year = gmdate( 'Y', strtotime( $this->start_date ) );
		if ( !empty( $ccai ) ) {
			foreach( $ccai as $ccai_item ) {				
				if ( 'variable-ads' == $ccai_item['label'] ) {
					
					$result_dates = $this->get_overlapping_interval( $interval, array( $ccai_item['date_start'], $ccai_item['date_end'] ) );
					if ( null !== $result_dates ) {
						$ccai_array[$ccai_item['ID']]['name'] = $ccai_item['name'];
						$ccai_array[$ccai_item['ID']]['start_date'] = $result_dates[0];
						$ccai_array[$ccai_item['ID']]['end_date'] = $result_dates[1];
						$start_date = strtotime( $result_dates[0] . ' 00:00:00' );
						$end_date = strtotime( $result_dates[1] . ' 23:59:59' );
						$result = $wpdb->get_results(
							$wpdb->prepare(
								"
								SELECT 
									CONCAT(MONTH(formated_date), '-', COUNT(*), '-', SUM(order_subtotal)) AS monthly_order_summary
								FROM 
									%i
								WHERE 
									order_date BETWEEN %s AND %s
								GROUP BY 
									MONTH(formated_date)
								ORDER BY 
									MONTH(formated_date);",
								array(
									$this->wpdb->prefix . 'profitblue_orders',
									$start_date,
									$end_date
								)
							)
						);
						if ( !empty( $result ) ) {
							foreach( $result as $result_item ) {

								$exploded = explode( '-', $result_item->monthly_order_summary );
								$ccai_array[$ccai_item['ID']]['data'][$exploded[0]]['count'] = $exploded[1];
								$item_total = round( $exploded[2], 2 );
								$ccai_array[$ccai_item['ID']]['data'][$exploded[0]]['total'] = $item_total;
								$amount = (float)$ccai_item['amount'];
								if ( $ccai_item['amount-type'] == 'percent' ) {
									$item_value = round( ( $item_total / 100 ) * $amount, 2 );
									$ccai_array[$ccai_item['ID']]['data'][$exploded[0]]['amount'] = $item_value;
								} else {
									$orders_count = (float)$exploded[1];
									$ccai_array[$ccai_item['ID']]['data'][$exploded[0]]['amount'] = $amount * $orders_count;
								}
								
								if ( !in_array( $exploded[0], $months ) ) {
									$months[] = $exploded[0];
								}

							}						
						}
					}
				}
			}

			foreach( $ccai as $ccai_item ) {				
				if ( 'fixed-ads' == $ccai_item['label'] ) {

					$result_dates = $this->get_overlapping_interval( $interval, array( $ccai_item['date_start'], $ccai_item['date_end'] ) );
					$ccai_array[$ccai_item['ID']]['name'] 		= $ccai_item['name'];
					$ccai_array[$ccai_item['ID']]['start_date'] = $result_dates[0];
					$ccai_array[$ccai_item['ID']]['end_date'] 	= $result_dates[1];

					if ( !empty( $ccai_item['manually'] ) && 'yes' == $ccai_item['manually'] ) {

						foreach( $days_in_months as $item_month => $item_days ) {
							$days_in_year = $this->get_days_in_year( $months_year[$item_month] );
							$days_in_month = cal_days_in_month(CAL_GREGORIAN, $item_month, $months_year[$item_month]);
							$price_per_day = $ccai_item['month-' . $item_month] / $days_in_month;
							$ccai_array[$ccai_item['ID']]['data'][$item_month]['amount'] = round( $price_per_day * $item_days, 2 );
							if ( !in_array( $item_month, $months ) ) {
								$months[] = $item_month;
							}
						}

					} else {						
						
						$number_of_days = $this->get_number_days( $ccai_item['date_start'], $ccai_item['date_end'] );
						$days_in_year = $this->get_days_in_year( $year );
						$price_per_day = (float)$ccai_item['amount'] / $number_of_days;

						foreach( $days_in_months as $item_month => $item_days ) {

							$item_amount = $this->calculate_month_item( $ccai_item, $item_month , $year, $price_per_day );

							$ccai_array[$ccai_item['ID']]['data'][$item_month]['amount'] = $item_amount;
							if ( !in_array( $item_month, $months ) ) {
								$months[] = $item_month;
							}
						}

					}
									
				}
			}

		}

		sort( $months );
		
		return array(
			'months' => $months,
			'data' => $ccai_array
		);

	}

	/**
	 * get_overlapping_interval
	 *
	 * @param  array $firstInterval
	 * @param  marrayixed $checkedInterval
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

	/**
	 * get_number_days
	 *
	 * @param  string $date_start
	 * @param  string $date_end
	 * @return int
	 */
	public function get_number_days( $date_start, $date_end ) {		
		$startDate = new \DateTime( $date_start );
		$endDate = new \DateTime( $date_end );
		$interval = date_diff($startDate, $endDate);
		$number_of_days = (int)$interval->format('%a');
		$number_of_days++;
		return $number_of_days;
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
			$daysInMonths[$startDate->format('n')] = $endDate->diff($startDate)->days + 1;
		} else {
			// Add days for the first month
			$daysInMonths[$startDate->format('n')] = $firstMonthDays;

			// Iterate through each month between the start and end
			$currentMonth = clone $startDate;
			$currentMonth->modify('first day of next month');
			while ($currentMonth <= $endDate) {
				$yearMonthKey = $currentMonth->format('n');
				$daysInMonth = (int) $currentMonth->format('t');
				$daysInMonths[$yearMonthKey] = $daysInMonth;
				$currentMonth->modify('first day of next month');
			}

			// Add days for the last month
			$daysInMonths[$endDate->format('n')] = $lastMonthDays;
		}

		return $daysInMonths;

	}

	/**
	 * get_months_year
	 *
	 * @param  string $start_date_string
	 * @param  string $end_date_string
	 * @return array
	 */
	public function get_months_year($start_date_string, $end_date_string) {
		// Create DateTime objects from the date strings
		$startDate = new \DateTime($start_date_string);
		$endDate = new \DateTime($end_date_string);
	
		// Initialize an array to store the months and years
		$monthsYear = [];
	
		// Iterate through each month between the start and end dates
		$currentMonth = clone $startDate;
		while ($currentMonth->format('Y-m') <= $endDate->format('Y-m')) {
			$yearMonthKey = $currentMonth->format('n'); // key as 'YYYY-MM'
			$monthsYear[$yearMonthKey] = $currentMonth->format('Y');		
			$currentMonth->modify('first day of next month');
		}
	
		return $monthsYear;
	}

	/**
	 * get_all_months
	 *
	 * @param  string $start_date
	 * @param  string $end_date
	 * @return array
	 */
	public function get_all_months( $start_date, $end_date ) {

		//Get all months
		$start    = new \DateTime($start_date);
		$start->modify('first day of this month');
		$end      = new \DateTime($end_date);
		$end->modify('first day of next month');
		$interval = new \DateInterval('P1M');
		$period   = new \DatePeriod($start, $interval, $end);

		$months = [];
		foreach ($period as $dt) {
			$months[] = $dt->format('n');
		}

		return $months;

	}

	/**
	 * get_days_in_year
	 *
	 * @param  string $year
	 * @return int
	 */
	public function get_days_in_year($year) {
		if (checkdate(2, 29, $year)) {
			return 366;
		} else {
			return 365;
		}
	}

	/**
	 * Set month data
	 *
	 * @since  1.0.0
	 * @access public
	 * 
	 * @param array $item
	 * @param string $month
	 * @param string $month_string
	 * @param string $year
	 * @param string $day_price
	 * 
	 * @return string
	 */
	public function calculate_month_item( $item, $month = '1', $year = null, $day_price = null ) {

		if ( null === $year ) {
			$year = gmdate( 'Y' );
		}

		if ( 12 == $month ) {
			$month_string = '12';
		} elseif ( 11 == $month ) {
			$month_string = '11';
		} elseif ( 10 == $month ) {
			$month_string = '10';
		} else {
			$month_string = '0' . $month;
		}

		if ( 'yes' == $item['manually'] ) {

			if ( null != $item['month-' . $month] && '0' !== $item['month-' . $month] ) {
				$price	= $item['month-' . $month];
			} else {
				$price = '0';
			}

		} else {

			$start_date 	= new \DateTime( $item['date_start'] );
			$end_date 	= new \DateTime( $item['date_end'] );

			// Define the start and end dates for February
			$month_start = new \DateTime($year . '-' . $month_string . '-01');
			$month_end = (clone $month_start)->modify('last day of this month');

			//If month is out of the range, return zero
			if ( $month_end < $start_date || $month_start > $end_date ) {

				$price = '0';

			} else {

				$month_days = min($end_date, $month_end)->diff(max($start_date, $month_start))->days;
				$month_days++;
				
				$price = round( $day_price * $month_days, 2 );
				$price = (string)$price;

			}

		}

		return $price;
		
	}
	
}
