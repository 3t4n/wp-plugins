<?php

namespace Profitblue\Controllers;

use ProfitBlue\Controllers\ProductsPeriodsController;

/**
 * AdsWeeksData
 */
class AdsWeeksData {
	
	/**
	 * period
	 *
	 * @var string
	 */
	private $period = 'whole-period';
	
	/**
	 * period_id
	 *
	 * @var inf
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
		
		$days_in_weeks = $this->get_days_in_weeks( $this->start_date, $this->end_date );
		$weeks_year = $this->get_weeks_year($this->start_date, $this->end_date);		
		$ccai_array = array();
		$weeks = array();
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
						$result_cogs = $wpdb->get_results(
							$wpdb->prepare(
								"SELECT 
								CONCAT(WEEK(formated_date, 1), '-', COUNT(*), '-', SUM(order_subtotal)) AS weekly_order_summary
								FROM 
								%i
								WHERE 
								order_date BETWEEN %s AND %s
								GROUP BY 
								WEEK(formated_date, 1)
								ORDER BY 
								WEEK(formated_date, 1);",
								array(
									$this->wpdb->prefix . 'profitblue_orders',
									$start_date,
									$end_date
								)
							)
						);
						if ( !empty( $result_cogs ) ) {
							foreach( $result_cogs as $result_item ) {

								$exploded = explode( '-', $result_item->weekly_order_summary );
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
								if ( !in_array( $exploded[0], $weeks ) ) {
									$weeks[] = $exploded[0];
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
						foreach( $days_in_weeks as $item_week => $item_days ) {
							$current_month = gmdate( 'n', strtotime( $item_days[0] ) );
							$days_in_month = cal_days_in_month(CAL_GREGORIAN, $current_month, $weeks_year[$item_week]);
							$price_per_day = $ccai_item['month-' . $current_month] / $days_in_month;
							$item_week = $this->get_week_number( $item_week );
							$ccai_array[$ccai_item['ID']]['data'][$item_week]['amount'] = round( $price_per_day * count( $item_days ), 2 );
							if ( !in_array( $item_week, $weeks ) ) {
								$weeks[] = $item_week;
							}
						}
					} else {
						$number_of_days = $this->get_number_days( $ccai_item['date_start'], $ccai_item['date_end'] );
						if ( !empty( $ccai_item['amount'] ) ) {
							$price_per_day = (float)$ccai_item['amount'] / $number_of_days;
						} else {
							$price_per_day = 0;
						}
						foreach( $days_in_weeks as $item_week => $item_days ) {
							$ccai_array[$ccai_item['ID']]['data'][$item_week]['amount'] = $price_per_day * count( $item_days );
							if ( !in_array( $item_week, $weeks ) ) {
								$weeks[] = $item_week;
							}
						}				
					}
									
				}
			}

		}

		return array(
			'weeks' => $weeks,
			'data' => $ccai_array
		);

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
	 * get_weeks_year
	 *
	 * @param  string $start_date_string
	 * @param  string $end_date_string
	 * @return array
	 */
	public function get_weeks_year($start_date_string, $end_date_string) {

		$start_time = strtotime( (string)$start_date_string );
		if ( '1' == gmdate( 'n', $start_time ) && gmdate( 'W', $start_time ) == '52' ) {
			$start_time = $start_time + 86400;
		}
		$start_date_string = gmdate( 'Y-m-d', $start_time );
		// Create DateTime objects from the date strings
		$startDate = new \DateTime($start_date_string);
		$endDate = new \DateTime($end_date_string);
	
		// Initialize an array to store the months and years
		$weeksYear = [];		
		// Iterate through each month between the start and end dates
		$currentWeek = clone $startDate;
		
		while ($currentWeek->format('Y-m') <= $endDate->format('Y-m')) {
			$yearWeekKey = $currentWeek->format('W');
			$weeksYear[$yearWeekKey] = $currentWeek->format('Y');		
			$currentWeek->modify('next week');
		}
	
		return $weeksYear;

	}

	/**
	 * get_days_in_weeks
	 *
	 * @param  string $start_date_string
	 * @param  string $end_date_string
	 * @return array
	 */
	public function get_days_in_weeks( $start_date_string, $end_date_string ) {

		$start_time = strtotime( (string)$start_date_string );
		if ( '1' == gmdate( 'n', $start_time ) && gmdate( 'W', $start_time ) == '52' ) {
			$start_time = $start_time + 86400;
		}
		$start_date_string = gmdate( 'Y-m-d', $start_time );
		// Create DateTime objects from the date strings
		$startDate = new \DateTime($start_date_string);
		$endDate = new \DateTime($end_date_string);
	
		// Initialize an array to store the days in each week
		$daysInWeeks = [];
	
		// Iterate from the start date to the end date
		$currentDate = clone $startDate;
		while ($currentDate <= $endDate) {
			// Get the week number in the year
			$weekOfYear = $currentDate->format('W'); // 'o' for ISO-8601 year number
	
			// Create an entry for this week if it doesn't exist
			if (!isset($daysInWeeks[$weekOfYear])) {
				$daysInWeeks[$weekOfYear] = [];
			}
	
			// Add the day to the current week
			$daysInWeeks[$weekOfYear][] = $currentDate->format('Y-m-d');
	
			// Move to the next day
			$currentDate->modify('+1 day');
		}
	
		return $daysInWeeks;

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

	/**
	 * get_week_number
	 *
	 * @param  string $week
	 * @return string
	 */
	public function get_week_number( $week ) {

		$weeks = array( '01', '02', '03', '04','05', '06', '07', '08', '09' );
		if ( in_array( $week, $weeks ) ) {
			$week = str_replace( '0', '', $week );
		}

		return $week;

	}

	/**
	 * get_days_in_year
	 *
	 * @param  string $year
	 * @return int
	 */
	public function get_days_in_year( $year ) {
		if ( checkdate( 2, 29, $year ) ) {
			return 366;
		} else {
			return 365;
		}
	}
	
}
