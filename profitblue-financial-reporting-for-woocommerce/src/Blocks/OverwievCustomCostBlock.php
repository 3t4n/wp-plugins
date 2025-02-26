<?php
namespace ProfitBlue\Blocks;

use ProfitBlue\Enums\ColorTints;
use ProfitBlue\Enums\FixedCostTypes;
use ProfitBlue\Enums\VariableCostTypes;
use ProfitBlue\Controllers\OverviewCcaiData;

/**
 * OverwievCustomCostBlock
 */
class OverwievCustomCostBlock {
	
	/**
	 * render
	 *
	 * @param  object $overview
	 * @param  array $ccai
	 * @return void
	 */
	public static function render( $overview, $ccai ) {

		$red_colors = ColorTints::getRed();
		$blue_colors = ColorTints::getBlue();
		$blue_count_colors = ColorTints::getCountBlue();
		$red_count_colors = ColorTints::getCountRed();
		ob_start();
		
		$fixed_types = FixedCostTypes::get();
		$variable_types = VariableCostTypes::get();		
		$cutoms_cost = $overview->get_custom_cost();
		$cutoms_cost = array(
			'result' => $overview->ccai,
			'start'  => $overview->start_date,
			'end'    => $overview->end_date
		);
		$shipping_income = $overview->get_shipping_income();
		$payment_income = $overview->get_payment_income();
		
		if ( !empty( $ccai ) ) {
			$fixed = array();
			$fixed_total = 0;
			$variable = array();
			$variable_total = 0;
			if ( !empty( $ccai['variable'] ) ) {
				foreach( $ccai['variable'] as $label => $value ) {
					$variable_total += $value;
				}
			}
			$variable_total += $shipping_income;
			$variable_total += $payment_income;


			if ( !empty( $ccai['fixed'] ) ) {
				foreach( $ccai['fixed'] as $label => $value ) {
					$fixed_total += $value;
				}
			}			
			
			$data = array();		
			$data_f = array();
			$data_v = array();	
			if ( !empty( $ccai['fixed'] ) ) {
				foreach( $ccai['fixed'] as $key => $value ) {
					if ( 0 == $fixed_total ) {
						$data_f[$key] = "['".$fixed_types[$key]."',0]";
						$data_fs[$key] = '0';				
					} else {
						$percent = round( $value / ( $fixed_total / 100 ), 2 );
						$fixed[$key]['percent'] = $percent;
						$data_f[$key] = "['".$fixed_types[$key]."',".$value."]";
						$data_fs[$key] = $value;
					}
				}
			}
			if ( !empty( $ccai['variable'] ) ) {
				foreach( $ccai['variable'] as $key => $value ) {
					if ( 0 == $variable_total ) {
						$data_v[$key] = "['".$fixed_types[$key]."',0]";
						$data_vs[$key] = '0';				
					} else {
						$percent = round( $value / ( $variable_total / 100 ), 2 );
						$variable[$key]['percent'] = $percent;
						$data_v[$key] = "['".$variable_types[$key]."',".$value."]";
						$data_vs[$key] = $value;
					}
				}
			}

			//Shipping income
			if ( 0 == $shipping_income ) {
				$data_v[esc_html__( 'Shipping cost', 'profitblue-financial-reporting-for-woocommerce' )] = "['".esc_html__( 'Shipping cost', 'profitblue-financial-reporting-for-woocommerce' )."',0]";
				$data_vs[esc_html__( 'Shipping cost', 'profitblue-financial-reporting-for-woocommerce' )] = '0';				
			} else {
				$percent = round( $shipping_income / ( $variable_total / 100 ), 2 );
				$variable[esc_html__( 'Shipping cost', 'profitblue-financial-reporting-for-woocommerce' )]['percent'] = $percent;
				$data_v[esc_html__( 'Shipping cost', 'profitblue-financial-reporting-for-woocommerce' )] = "['".esc_html__( 'Shipping cost', 'profitblue-financial-reporting-for-woocommerce' )."',".$shipping_income."]";
				$data_vs[esc_html__( 'Shipping cost', 'profitblue-financial-reporting-for-woocommerce' )] = $shipping_income;
			}

			//Payment income
			if ( 0 == $payment_income ) {
				$data_v[esc_html__( 'Payment cost', 'profitblue-financial-reporting-for-woocommerce' )] = "['".esc_html__( 'Payment cost', 'profitblue-financial-reporting-for-woocommerce' )."',0]";
				$data_vs[esc_html__( 'Payment cost', 'profitblue-financial-reporting-for-woocommerce' )] = '0';				
			} else {
				$percent = round( $payment_income / ( $variable_total / 100 ), 2 );
				$variable[esc_html__( 'Payment cost', 'profitblue-financial-reporting-for-woocommerce' )]['percent'] = $percent;
				$data_v[esc_html__( 'Payment cost', 'profitblue-financial-reporting-for-woocommerce' )] = "['".esc_html__( 'Payment cost', 'profitblue-financial-reporting-for-woocommerce' )."',".$payment_income."]";
				$data_vs[esc_html__( 'Payment cost', 'profitblue-financial-reporting-for-woocommerce' )] = $payment_income;
			}

			$data_string = "[";	
			$colors = array();
			if ( !empty( $data_f ) ) {
				arsort( $data_fs );
				$i = 1;
				if ( count( $data_f ) < 11 ) {
					$step = 0.1;
				} elseif ( count( $data_f ) > 10 ) {
					$step = 0.01;
				}
				$data_nf = array();
				$position = 100;
				foreach( $data_fs as $key => $f ) {
					//$colors[] = 'rgb(248, 0, 0, '.$i.')';
					$colors[] = $red_count_colors[$position];
					$data_nf[] = $data_f[$key];
					$position = $position - 5;
				}
				$data_string .= implode( ',', $data_nf );
			}



			if ( !empty( $data_v ) ) {
				arsort( $data_vs );
				$i = 1;
				if ( count( $data_v ) < 11 ) {
					$step = 0.1;
				} elseif ( count( $data_v ) > 10 ) {
					$step = 0.01;
				}
				$data_nv = array();
				$position = 100;
				foreach( $data_vs as $key => $v ) {
					$colors[] = $blue_count_colors[$position];
					$i = $i - $step;
					$data_nv[] = $data_v[$key];
					$position = $position - 10;
				}
				if ( count( $data_nv ) == 1 ) {
					$data_nstring = $data_nv[0];
				} else {
					$data_nstring = implode( ',', $data_nv );
				}
			}

			if ( !empty( $data_f ) ) {
				$data_string .= ',' . $data_nstring;
			} else {
				$data_string .= $data_nstring;
			}

			$data_string .= "]";
			$color_string = "['" . implode( "','", $colors ) . "']";
			//$color_string = "['#00bbfe', '#ff8079', '#ff4d43', '#fe130f', '#f80000']";

			$data_string = str_replace( "'", '"', $data_string );
			$color_string = str_replace( "'", '"', $color_string );
		
		}

		echo "<div style='display:none;' id='fixedData' data-types='" . esc_html( $data_string ) . "' data-colors='" . esc_html( $color_string ) . "'></div>";
		
		echo '<div id="overview-analysis-custom" class="overview-analysis-custom overwiev-item">';
			echo '<div class="overview-analysis-custom-content">';
				echo '<div class="overview-analysis-custom-content-data-container">';	
					echo '<h2>' . esc_html__( 'Cost analysis', 'profitblue-financial-reporting-for-woocommerce' ) . '</h2>';
					echo '<div class="overview-analysis-custom-content-data" id="overview-analysis-custom-content-data">';
					echo '</div>';
				echo '</div>';
				echo '<div class="overview-analysis-custom-content-labels">';
					echo '<div class="overview-analysis-custom-content-labels-variable">';
						echo '<h3>' . esc_html__( 'Variable costs', 'profitblue-financial-reporting-for-woocommerce' ) . '</h3>';
						$position = 100;
						if ( !empty( $variable ) ) {
							foreach( $variable as $label => $item ) {
								echo '<div class="overview-analysis-net-item"><span class="overview-analysis-net-item-square" style="background-color:' . esc_html( $blue_count_colors[$position] ) . ';"></span><span class="overview-analysis-net-item-text">- ' . esc_html( $label ) . '</span></div>';
								$position = $position - 5;
							}
						}
					echo '</div>';
					echo '<div class="overview-analysis-custom-content-labels-fixed">';
					echo '<h3>' . esc_html__( 'Fixed costs', 'profitblue-financial-reporting-for-woocommerce' ) . '</h3>';
					$position = 100;
					if ( !empty( $fixed ) ) {
					foreach( $fixed as $label => $item ) {
							echo '<div class="overview-analysis-net-item"><span class="overview-analysis-net-item-square" style="background-color:' . esc_html( $red_count_colors[$position] ) . ';"></span><span class="overview-analysis-net-item-text">- ' . esc_html( $label ) . '</span></div>';
							$position = $position - 10;
						}
					}
				echo '</div>';
				echo '</div>';				
			echo '</div>';
		echo '</div>';

	}

	private static function get_ccai() {

		global $wpdb;
		$args = array();
		$where = '';
		if ( false != $start_date && false != $end_date ) {
			global $wpdb;
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i
					WHERE (date_start BETWEEN %s AND %s)
					OR (date_end BETWEEN %s AND %s)
					OR (date_start <= %s AND date_end >= %s)",
					array(
						$wpdb->prefix . 'profitblue_ccai',
						$start_date,
						$end_date,
						$start_date,
						$end_date,
						$start_date,
						$end_date			
					)
				)
			);

		} else {
			global $wpdb;
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i",
					array(
						$wpdb->prefix . 'profitblue_ccai'
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

}
