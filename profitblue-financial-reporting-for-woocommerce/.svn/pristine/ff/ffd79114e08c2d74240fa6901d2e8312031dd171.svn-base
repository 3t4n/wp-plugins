<?php

namespace Profitblue\Controllers;

use ProfitBlue\Controllers\ProductsPeriodsController;

/**
 * AdsDaysData
 */
class AdsDaysData {
	
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
		$days_in_interval = $this->get_number_of_days( $this->start_date, $this->end_date );
		$days = array();
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
									order_date,
									formated_date,
									SUM(order_subtotal) as total,
									COUNT(*) as order_count
								FROM 
									%i
								WHERE 
									order_date BETWEEN %s AND %s
								GROUP BY 
									formated_date
								ORDER BY 
									formated_date;",
								array(
									$wpdb->prefix . 'profitblue_orders',
									$start_date,
									$end_date
								)
							)
						);

						if ( !empty( $result ) ) {
							foreach( $result as $result_item ) {

								$ccai_array[$ccai_item['ID']]['data'][$result_item->formated_date]['count'] = $result_item->order_count;
								$ccai_array[$ccai_item['ID']]['data'][$result_item->formated_date]['total'] = $result_item->total;
								$amount = (float)$ccai_item['amount'];
								if ( $ccai_item['amount-type'] == 'percent' ) {
									$item_value = round( ( $result_item->total / 100 ) * $amount, 2 );
									$ccai_array[$ccai_item['ID']]['data'][$result_item->formated_date]['amount'] = $item_value;
								} else {
									$orders_count = (float)$exploded[1];
									$ccai_array[$ccai_item['ID']]['data'][$result_item->formated_date]['amount'] = $amount * $result_item->order_count;
								}

								if ( !in_array( $result_item->formated_date, $days ) ) {
									$days[] = $result_item->formated_date;
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
						foreach( $days_in_interval as $item_day => $day ) {
							if ( empty( $day ) ) {
								continue;
							}
							if ( empty( $days ) ) {
								$days = array( $day );
							} else {
								if ( !in_array( $day, $days ) && !empty( $day ) ) {
									$days[] = $day;
								}
							}
							$current_month = gmdate( 'n', strtotime( $item_day ) );
							$days_in_month = cal_days_in_month(CAL_GREGORIAN, $current_month, gmdate( 'Y', strtotime( $item_day ) ) );
							$price_per_day = $ccai_item['month-' . $current_month] / $days_in_month;
							$ccai_array[$ccai_item['ID']]['data'][$item_day]['amount'] = round( $price_per_day, 2 );
						}					
					} else {		

						$number_of_days = count( $this->get_number_of_days( $ccai_item['date_start'], $ccai_item['date_end'] ) );
						$days_in_year = $this->get_days_in_year( $year );
						$price_per_day = (float)$ccai_item['amount'] / $number_of_days;
						
						foreach( $days_in_interval as $item_day => $day ) {
							if ( empty( $day ) ) {
								continue;
							}
							if ( empty( $days ) ) {
								$days = array( $day );
							} else {
								if ( !in_array( $day, $days ) && !empty( $day ) ) {
									$days[] = $day;
								}
							}
							$ccai_array[$ccai_item['ID']]['data'][$item_day]['amount'] = $price_per_day;
						}
					}
									
				}
			}

		}

		return array(
			'days' => $days,
			'data' => $ccai_array
		);

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
	 * get_number_of_days
	 *
	 * @param  string $start_date_string
	 * @param  string $end_date_string
	 * @return array
	 */
	public function get_number_of_days( $start_date_string, $end_date_string ) {

		$startDate = new \DateTime($start_date_string);
		$endDate = new \DateTime($end_date_string);
	
		$days = [];
	
		$currentDate = clone $startDate;
		while ($currentDate <= $endDate) {
			// Get the week number in the year
			$day_of_interval = $currentDate->format('Y-m-d');
	
			// Create an entry for this week if it doesn't exist
			if (!isset($days[$day_of_interval])) {
				$days[$day_of_interval] = [];
			}
	
			// Add the day to the current week
			$days[$day_of_interval] = $currentDate->format('Y-m-d');
	
			$currentDate->modify('+1 day');
		}
	
		return $days;

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

	
	
}
