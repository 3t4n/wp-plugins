<?php
namespace ProfitBlue\Blocks;

use ProfitBlue\Abstracts\AbstractForm;
use ProfitBlue\Enums\IncomeCostTypes;
use ProfitBlue\Models\CustomCostsAndIncomeModel;
use ProfitBlue\Helpers\Helper;

/**
 * IncomeCostsFormLine
 */
class IncomeCostsFormLine {
	
	/**
	 * render
	 *
	 * @param  array $data
	 * @return void
	 */
	public static function render( $data = null ) {

		$ccai_model = new CustomCostsAndIncomeModel();
		$lines = $ccai_model->get_items( 'income' );
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
		$date = null;
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
		if ( !empty( $data ) ) {
			if ( !empty( $data['count'] ) ) {
				$id = $data['count'];
			} else {
				$id = $data['ID'];
			}
			if ( !empty( $data['label'] ) ) {

			}
			if ( !empty( $data['amount'] ) ) {
				$yearly_amount = $data['amount'];
			}
			if ( !empty( $data['date_start'] ) ) {
				$date = $data['date_start'] . ' - ' . $data['date_end'];
			}
			if ( !empty( $data['month-1'] ) ) {
				$month_1 = $data['month-1'];
			}
			if ( !empty( $data['month-2'] ) ) {
				$month_2 = $data['month-2'];
			}
			if ( !empty( $data['month-3'] ) ) {
				$month_3 = $data['month-3'];
			}
			if ( !empty( $data['month-4'] ) ) {
				$month_4 = $data['month-4'];
			}
			if ( !empty( $data['month-5'] ) ) {
				$month_5 = $data['month-5'];
			}
			if ( !empty( $data['month-6'] ) ) {
				$month_6 = $data['month-6'];
			}
			if ( !empty( $data['month-7'] ) ) {
				$month_7 = $data['month-7'];
			}
			if ( !empty( $data['month-8'] ) ) {
				$month_8 = $data['month-8'];
			}
			if ( !empty( $data['month-9'] ) ) {
				$month_9 = $data['month-9'];
			}
			if ( !empty( $data['month-10'] ) ) {
				$month_10 = $data['month-10'];
			}
			if ( !empty( $data['month-11'] ) ) {
				$month_11 = $data['month-11'];
			}
			if ( !empty( $data['month-12'] ) ) {
				$month_12 = $data['month-12'];
			}
		}
		$html = '';
		$html .= '<div class="income-cost-line-wrap" id="income-cost-line-' . esc_html( $id ) . '" data-id="' . esc_html( $id ) . '">';
			$html .= '<div class="ccai-remove-line" data-line="income-cost-line-' . esc_html( $id ) . '"></div>';
			$html .= '<div class="income-cost-line form-section-line line-3-2-2-3">';
				$html .= '<div class="income-cost-label section-line-input" data-id="' . esc_html( $id ) . '">';
					$option = array(
						'name' => 'label',
						'values' => IncomeCostTypes::get(),
						'dropdown-class' => 'ccai-label'
					);
					if ( !empty( $data['label'] ) ) {
						$option['value'] = $data['label'];
						$html .= AbstractForm::select( $option, $data['label'] );
					} else {
						$html .= AbstractForm::select( $option );				
					}			
				$html .= '</div>';
				$html .= '<div class="income-cost-amount section-line-input">';
					$option = array(
						'name' => 'amount',
						'min' => 0,
						'step' => '0.01',
						'value' => $yearly_amount,
						'data' => 'data-type="fixed" data-id="' . $id . '"',
						'id' => 'income-amount-' . $id
					);
					$html .= AbstractForm::number( $option, $yearly_amount );
				$html .= '</div>';
				$html .= '<div class="income-cost-date-range section-line-input">';
					$option = array(
						'name' => 'date',
						'id' => 'income-datepicker-' . $id
					);
					$html .= AbstractForm::datepicker( $option, $date );
				$html .= '</div>';
				$html .= '<div class="income-cost-recalculte section-line-input">';
					
					$option = array(
						'name' => 'manually-recalculate',
						'data' => 'data-type="income" data-id="' . $id . '"',
						'value' => 'yes'
					);
					if ( !empty( $data['manually'] ) && 'yes' == $data['manually'] ) {
						$html .= AbstractForm::checkbox( $option, 'yes' );
						$html .= '<div class="income-cost-line-tables" data-hide="' . esc_html__( 'Hide tables', 'profitblue-financial-reporting-for-woocommerce' ) . '" data-show="' . esc_html__( 'Show tables', 'profitblue-financial-reporting-for-woocommerce' ) . '">' . esc_html__( 'Show tables', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
					} else {
						$html .= AbstractForm::checkbox( $option );
						$html .= '<div class="income-cost-line-tables hide" data-hide="' . esc_html__( 'Hide tables', 'profitblue-financial-reporting-for-woocommerce' ) . '" data-show="' . esc_html__( 'Show tables', 'profitblue-financial-reporting-for-woocommerce' ) . '">' . esc_html__( 'Hide tables', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
					}
				$html .= '</div>';
			$html .= '</div>';
			if ( $data['label'] == 'own-income-costs' ) {
				$html .= '<div class="income-cost-line form-section-hidden-line form-section-line line-3-2-2-3 open" id="hidden-line-' . esc_html( $id ) . '">';
			} else {
				$html .= '<div class="income-cost-line form-section-hidden-line form-section-line line-3-2-2-3" id="hidden-line-' . esc_html( $id ) . '">';
			}
				$html .= '<div class="income-cost-text section-line-input">';
					$option = array(
						'name' => 'name',
						'value' => $data['name'],
						'id' => 'hidden-name-' . $id
					);
					$html .= AbstractForm::text( $option, $data['name'] );
				$html .= '</div>';
				$html .= '<div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div>';
			$html .= '</div>';
			if ( !empty( $data['manually'] ) && 'yes' == $data['manually'] ) {
				$html .= '<div class="income-cost-line-parts">';
			} else {
				$html .= '<div class="income-cost-line-parts closed">';
			}

				$array = array(
					'month-1' => $month_1,
					'month-2' => $month_2,
					'month-3' => $month_3,
					'month-4' => $month_4,
					'month-5' => $month_5,
					'month-6' => $month_6,
					'month-7' => $month_7,
					'month-8' => $month_8,
					'month-9' => $month_9,
					'month-10' => $month_10,
					'month-11' => $month_11,
					'month-12' => $month_12
				);
				$i = 1;
				foreach( $array as $key => $item ) {
					$html .= '<div class="income-cost-line-month">';
					$option = array(
						'name' => $key,
						//'name' => $key,
						'value' => $item,
						'min' => '0',
						'step' => '0.01',
						'data' => 'data-month="' . esc_html( $key ) . '" data-id="' . esc_html( $id ) . '" data-type="income"',
						'class' => array( 'month-number-item' )
					);
					$html .= AbstractForm::number( $option, $item );
					$html .= '<div class="mont-number">' . esc_html( $i ) . '</div>';
					$html .= '</div>';
					$i++;
				}				
			$html .= '</div>';
		$html .= '</div>';

		return $html;

	}

}
