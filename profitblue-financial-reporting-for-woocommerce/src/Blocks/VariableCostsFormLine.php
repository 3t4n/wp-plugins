<?php
namespace ProfitBlue\Blocks;

use ProfitBlue\Abstracts\AbstractForm;
use ProfitBlue\Enums\VariableCostTypes;
use ProfitBlue\Models\CustomCostsAndIncomeModel;
use ProfitBlue\Helpers\Helper;

/**
 * VariableCostsFormLine
 */
class VariableCostsFormLine {
	
	/**
	 * render
	 *
	 * @param  array $data
	 * @return void
	 */
	public static function render( $data = null ) {

		$ccai_model = new CustomCostsAndIncomeModel();
		$lines = $ccai_model->get_items( 'variable' );
		if ( false != $lines ) {
			foreach( $lines as $line ) {
				echo wp_kses( self::get_line( $line ), Helper::get_allowed_tags() );
			}
		}

	}
	
	/**
	 * get_line
	 *
	 * @param  array $data
	 * @return string
	 */
	public static function get_line( $data = null ) {

		$id = 1;
		
		$yearly_amount = 0;
		$date_start = null;
		$date_end = null;
		$amount_type = null;
		$date = null;
		if ( !empty( $data ) ) {
			if ( !empty( $data['count'] ) ) {
				$id = $data['count'];
			} else {
				$id = $data['ID'];
			}
			if ( !empty( $data['amount'] ) ) {
				$yearly_amount = $data['amount'];
			}
			if ( !empty( $data['amount-type'] ) ) {
				$amount_type = $data['amount-type'];
			}
			if ( !empty( $data['date_start'] ) ) {
				$date = $data['date_start'] . ' - ' . $data['date_end'];
			}
		}
		$html = '';
		$html .= '<div class="variable-cost-line-wrap" id="variable-cost-line-' . esc_html( $id ) . '" data-id="' . esc_html( $id ) . '">';
			$html .= '<div class="ccai-remove-line" data-line="variable-cost-line-' . esc_html( $id ) . '"></div>';
			$html .= '<div class="variable-cost-line form-section-line line-3-2-2-3">';
				$html .= '<div class="variable-cost-label section-line-input" data-id="' . esc_html( $id ) . '">';
					$option = array(
						'name' => 'label',
						'values' => VariableCostTypes::get(),
						'dropdown-class' => 'ccai-label'
					);
					if ( !empty( $data['label'] ) ) {
						$html .= AbstractForm::select( $option, $data['label'] );
					} else {
						$html .= AbstractForm::select( $option );				
					}				
				$html .= '</div>';
				$html .= '<div class="variable-cost-amount-per-order section-line-input">';
					
					$values = array(
						'percent' => esc_html__( 'Percentage (%)', 'profitblue-financial-reporting-for-woocommerce' ),
						'amount'  => esc_html__( 'Amount (currency)', 'profitblue-financial-reporting-for-woocommerce' ),
					);
					$option = array(
						'name' => 'type',
						'values' => $values
					);
					$html .= AbstractForm::select( $option, $amount_type );
				$html .= '</div>';
				$html .= '<div class="variable-cost-amount section-line-input">';
					$option = array(
						'name' => 'amount',
						'min' => 0,
						'step' => '0.01'
					);
					$html .= AbstractForm::number( $option, $yearly_amount );
				$html .= '</div>';				
				$html .= '<div class="variable-cost-date-range section-line-input">';
					$option = array(
						'name' => 'date',
						'id' => 'variable-datepicker-' . $id
					);
					$html .= AbstractForm::datepicker( $option, $date );
				$html .= '</div>';
				
			$html .= '</div>';

			if ( $data['label'] == 'own-variable-costs' || $data['label'] == 'variable-ads' ) {
				$html .= '<div class="variable-cost-line form-section-hidden-line form-section-line line-3-2-2-3 open" id="hidden-line-' . esc_html( $id ) . '">';
			} else {
				$html .= '<div class="variable-cost-line form-section-hidden-line form-section-line line-3-2-2-3" id="hidden-line-' . esc_html( $id ) . '">';
			}
					$html .= '<div class="variable-cost-text section-line-input">';
						$option = array(
							'name' => 'name',
							'value' => $data['name'],
							'id' => 'hidden-name-' . $id
						);
						$html .= AbstractForm::text( $option, $data['name'] );
					$html .= '</div>';
					$html .= '<div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div>';

				
			$html .= '</div>';
			


		$html .= '</div>';

		return $html;

	}

	/**
	 * get_variable_data
	 *
	 * @return void
	 */
	public static function get_variable_data() {

		global $wpdb;		
		$yearly_amount = 0;
		$date_start = null;
		$date_end = null;
		$month_1 = '0';
		$month_2 = '0';
		$month_3 = '0';
		$month_4 = '0';
		$month_5 = '0';
		$month_6 = '0';
		$month_7 = '0';
		$month_8 = '0';
		$month_9 = '0';
		$month_10 = '0';
		$month_11 = '0';
		$month_12 = '0';

		$ccai_model = new CustomCostsAndIncomeModel();
		$lines = $ccai_model->get_items( 'fixed' );
		if ( false != $lines ) {
			foreach( $lines as $data ) {
				$current_yerly_amount = $data['amount'];
				$months = 12;
				//Months data				
				if ( !empty( $data['month-1'] ) ) {
					$month_1 += $data['month-1'];
					$months = $months - 1;
					$current_yerly_amount = $current_yerly_amount - $data['month-1'];
				}
				if ( !empty( $data['month-2'] ) ) {
					$month_2 += $data['month-2'];
					$months = $months - 1;
					$current_yerly_amount = $current_yerly_amount - $data['month-2'];
				}
				if ( !empty( $data['month-3'] ) ) {
					$month_3 += $data['month-3'];
					$months = $months - 1;
					$current_yerly_amount = $current_yerly_amount - $data['month-3'];
				}
				if ( !empty( $data['month-4'] ) ) {
					$month_4 += $data['month-4'];
					$months = $months - 1;
					$current_yerly_amount = $current_yerly_amount - $data['month-4'];
				}
				if ( !empty( $data['month-5'] ) ) {
					$month_5 += $data['month-5'];
					$months = $months - 1;
					$current_yerly_amount = $current_yerly_amount - $data['month-5'];
				}
				if ( !empty( $data['month-6'] ) ) {
					$month_6 += $data['month-6'];
					$months = $months - 1;
					$current_yerly_amount = $current_yerly_amount - $data['month-6'];
				}
				if ( !empty( $data['month-7'] ) ) {
					$month_7 += $data['month-7'];
					$months = $months - 1;
					$current_yerly_amount = $current_yerly_amount - $data['month-7'];
				}
				if ( !empty( $data['month-8'] ) ) {
					$month_8 += $data['month-8'];
					$months = $months - 1;
					$current_yerly_amount = $current_yerly_amount - $data['month-8'];
				}
				if ( !empty( $data['month-9'] ) ) {
					$month_9 += $data['month-9'];
					$months = $months - 1;
					$current_yerly_amount = $current_yerly_amount - $data['month-9'];
				}
				if ( !empty( $data['month-10'] ) ) {
					$month_10 += $data['month-10'];
					$months = $months - 1;
					$current_yerly_amount = $current_yerly_amount - $data['month-10'];
				}
				if ( !empty( $data['month-11'] ) ) {
					$month_11 += $data['month-11'];
					$months = $months - 1;
					$current_yerly_amount = $current_yerly_amount - $data['month-11'];
				}
				if ( !empty( $data['month-12'] ) ) {
					$month_12 += $data['month-12'];
					$months = $months - 1;
					$current_yerly_amount = $current_yerly_amount - $data['month-12'];
				}

				if ( !empty( $data['amount'] ) ) {
					$yearly_amount += $data['amount'];
				}
				if ( $months > 0 ) {
					$mont_parts = $current_yerly_amount / $months ;
				} else {
					$mont_parts = 0;
				}
				
				//Months parts data
				if ( empty( $data['month-1'] ) ) {
					$month_1 += $mont_parts;
				}
				if ( empty( $data['month-2'] ) ) {
					$month_2 += $mont_parts;
				}
				if ( empty( $data['month-3'] ) ) {
					$month_3 += $mont_parts;
				}
				if ( empty( $data['month-4'] ) ) {
					$month_4 += $mont_parts;
				}
				if ( empty( $data['month-5'] ) ) {
					$month_5 += $mont_parts;
				}
				if ( empty( $data['month-6'] ) ) {
					$month_6 += $mont_parts;
				}
				if ( empty( $data['month-7'] ) ) {
					$month_7 += $mont_parts;
				}
				if ( empty( $data['month-8'] ) ) {
					$month_8 += $mont_parts;
				}
				if ( empty( $data['month-9'] ) ) {
					$month_9 += $mont_parts;
				}
				if ( empty( $data['month-10'] ) ) {
					$month_10 += $mont_parts;
				}
				if ( empty( $data['month-11'] ) ) {
					$month_11 += $mont_parts;
				}
				if ( empty( $data['month-12'] ) ) {
					$month_12 += $mont_parts;
				}				

			}
		}

		$year = gmdate( 'Y' );
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['cost-years'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$year = isset( $_GET['cost-years'] ) ? wp_unslash( sanitize_text_field( $_GET['cost-years'] ) ) : '';
		}

		$first_date = gmdate( 'Y-m-d',  strtotime( 'first day of January ' . $year ) );
		$last_date = gmdate( 'Y-m-d',  strtotime( 'last day of December ' . $year ) );
		
		$begin = new \DateTime( $first_date );
		$end = new \DateTime( $last_date );

		$interval = \DateInterval::createFromDateString( '1 day' );
		$period = new \DatePeriod( $begin, $interval, $end );

		foreach ( $period as $dt ) {

			if ( '01' == $dt->format( 'm' ) ) {
				$period_month_amount = $month_1;
			} else if ( '02' == $dt->format( 'm' ) ) {
				$period_month_amount = $month_2;
			} else if ( '03' == $dt->format( 'm' ) ) {
				$period_month_amount = $month_3;
			} else if ( '04' == $dt->format( 'm' ) ) {
				$period_month_amount = $month_4;
			} else if ( '05' == $dt->format( 'm' ) ) {
				$period_month_amount = $month_5;
			} else if ( '06' == $dt->format( 'm' ) ) {
				$period_month_amount = $month_6;
			} else if ( '07' == $dt->format( 'm' ) ) {
				$period_month_amount = $month_7;
			} else if ( '08' == $dt->format( 'm' ) ) {
				$period_month_amount = $month_8;
			} else if ( '09' == $dt->format( 'm' ) ) {
				$period_month_amount = $month_9;
			} else if ( '10' == $dt->format( 'm' ) ) {
				$period_month_amount = $month_10;
			} else if ( '11' == $dt->format( 'm' ) ) {
				$period_month_amount = $month_11;
			} else if ( '12' == $dt->format( 'm' ) ) {
				$period_month_amount = $month_12;
			}

			$number_of_days = $dt->format( 't' );
			$day_amount = $period_month_amount / $number_of_days;

    		$data = array(
				'date' 		=> $dt->format( 'Y-m-d' ),
				'year' 		=> $dt->format( 'Y' ),
				'month' 	=> $dt->format( 'm' ),
				'day' 		=> $dt->format( 'd' ),
				'week' 		=> $dt->format( 'W' ),
				'amount' 	=> $day_amount,
				'type'		=> 'fixed'
			);
			global $wpdb;
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i WHERE date = %s",
					array(
						$wpdb->prefix . 'profitblue_ccai_items',
						$dt->format( 'Y-m-d' )				
					)
				)
			);
			
			if ( empty( $result ) ) {
				$wpdb->insert( $wpdb->prefix . 'profitblue_ccai_items', $data );
			} else {
				$wpdb->update( $wpdb->prefix . 'profitblue_ccai_items', $data, array( 'ID' => $result[0]->ID ) );
			}

		}

		//Save last day
		$very_last_date = $year . '-12-31';
		$period_month_amount = $month_12;
		$day_amount = $period_month_amount / 31;
		$data = array(
			'date' 		=> $very_last_date,
			'year' 		=> $year,
			'month' 	=> '12',
			'day' 		=> '31',
			'week' 		=> '52',
			'amount' 	=> $day_amount,
			'type'		=> 'fixed'
		);
		global $wpdb;
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i WHERE date = %s",
					array(
						$wpdb->prefix . 'profitblue_ccai_items',
						$very_last_date				
					)
				)
			);
		
		if ( empty( $result ) ) {
			$wpdb->insert( $wpdb->prefix . '', $data );
		} else {
			$wpdb->update( $wpdb->prefix . '', $data, array( 'ID' => $result[0]->ID ) );
		}

	}


}
