<?php
namespace ProfitBlue\Admin\ProfitAndLoss;

use ProfitBlue\Admin\AdminPage;
use ProfitBlue\Controllers\OrderUpdateController;
use ProfitBlue\Controllers\OrdersController;
use ProfitBlue\Controllers\ProfitAndLossController;
use ProfitBlue\Enums\FixedCostTypes;
use ProfitBlue\Enums\VariableCostTypes;
use ProfitBlue\Enums\IncomeCostTypes;
use ProfitBlue\Models\ShopSettingCostsModel;
use ProfitBlue\Helpers\Cache;
use ProfitBlue\Helpers\Helper;



echo '<div class="page-notice">';
echo '</div>';

/**
 * Get year from url  
 */
$this_month = gmdate( 'Y-m' );
$cache_file_year = gmdate( 'Y' );
// phpcs:ignore WordPress.Security.NonceVerification.Recommended
if ( !empty( $_GET['period'] ) ) {
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$period_parts = isset( $_GET['period'] ) ? explode( '-', wp_unslash( sanitize_text_field( $_GET['period'] ) ) ) : [];
	if ( !empty( $period_parts[0] ) ) {
		$cache_file_year = sanitize_text_field( $period_parts[0] );
	}
}
$cache_file_name = 'profit-and-loss-' . $cache_file_year . '.html';
$cache_content = false;
$cache = new Cache();
$is_cached = get_option( 'profitblue_pnl_cache' );
if ( !empty( $is_cached ) ) {	
	$cache_content = $cache->get_file( $cache_file_name );
}
$cache_content = false;
if ( false != $cache_content ) {
	echo wp_kses( $cache_content, Helper::get_allowed_tags() );	
} else {

	ob_start();

	$ordersController = new OrdersController();
	$profitAndLossController = new ProfitAndLossController();
	$months_data = $profitAndLossController->months_data;
	$variable_type = VariableCostTypes::get();
	$fixed_type    = FixedCostTypes::get();
	$income_type   = IncomeCostTypes::get();

	$year = $profitAndLossController->year_data['year'];

	$ShopSettingCostsModel = new ShopSettingCostsModel();
	$shopSetting = $ShopSettingCostsModel->get_data_by_year( $year );
	if ( empty( $shopSetting[0]->tax_income ) ) {
		$incomeTax = 0;
	} else {
		$incomeTax = $shopSetting[0]->tax_income;
	}


	//Define variables
	$orders_total 					= 0;
	$products_total 				= 0;
	$shipping_total 				= 0;
	$cogs_total 					= 0;
	$month_gross_margin 			= 0;
	$variable_totals 				= 0;
	$margin_after_cogs_and_variable = 0;
	$income_totals 					= 0;
	$fixed_totals 					= 0;
	$total_fixed_and_income 		= 0;
	$ebt 							= 0;
	$total_tax						= 0;
	$net_income						= 0;

	$mode = 'normal';
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	if ( !empty( $_GET['mode'] ) ) {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$mode = isset( $_GET['mode'] ) ? wp_unslash( sanitize_text_field( $_GET['mode'] ) ) : '';
	}

	$redirect = admin_url() . 'admin.php?page=profit-and-loss&download=pnl';
	$url_base = admin_url() . 'admin.php?page=profit-and-loss';
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	if ( !empty( $_GET['period'] ) ) {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$period = isset( $_GET['period'] ) ? str_replace( ' ', '+', wp_unslash( sanitize_text_field( $_GET['period'] ) ) ) : '';
		$url_base .= '&period=' . esc_html( $period );
	}
	if (version_compare(PHP_VERSION, '8.0', '>=')) {
		echo '<div class="pnl-export-wrap">';
			echo '<div class="pnl-export-inner">';
				echo '<a href="#" class="pnl-export btn not-export" data-redirect="' . esc_url( $redirect ) . '" style="opacity:0.5;">' . esc_html__( 'Export to xlsx', 'profitblue-financial-reporting-for-woocommerce' ) . '</a>';
			echo '</div>';
		echo '</div>';
	}
	echo '<div class="month-to-date">';
		echo '<div class="month-to-date-inner">';
			echo '<select name="month-to-date" class="month-to-date" data-url="' . esc_url( $url_base ) . '">';
				echo '<option value="mtd">' . esc_html__( 'Month to date (MTD)', 'profitblue-financial-reporting-for-woocommerce' ) . '</value>';
				// phpcs:ignore WordPress.Security.NonceVerification.Recommended
				if ( !empty( $_GET['mode'] ) && 'ytd' === wp_unslash( sanitize_text_field( $_GET['mode'] ) ) ) {
					echo '<option value="ytd" selected="selected">' . esc_html__( 'Year to date (YTD) - Cumulative', 'profitblue-financial-reporting-for-woocommerce' ) . '</value>';
				} else {
					echo '<option value="ytd">' . esc_html__( 'Year to date (YTD) - Cumulative', 'profitblue-financial-reporting-for-woocommerce' ) . '</value>';
				}
			echo '</select>';
		echo '</div>';
	echo '</div>';

	echo '<div id="profit-and-loss" class="profit-and-loss">';
		echo '<div class="profit-and-loss-labels">';
			echo '<div class="profit-and-loss-labels-container">';
				echo '<div class="profit-and-loss-labels-inner">';

					echo '<div class="profit-and-loss-labels-title" style="border-top:solid 1px #000000;">' . esc_html__( 'Revenue', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
					echo '<div class="profit-and-loss-labels-item">' . esc_html__( 'thereof Sales of goods', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
					echo '<div class="profit-and-loss-labels-item">' . esc_html__( 'thereof Shipping and fees revenue', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
					echo '<div class="profit-and-loss-labels-subtitle">' . esc_html__( 'COGS - Cost of Goods Sold (-)', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';

					echo '<div class="profit-and-loss-labels-title">' . esc_html__( 'Gross profit/margin', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
					echo '<div class="profit-and-loss-labels-subtitle">' . esc_html__( 'Total Variable Costs (-)', 'profitblue-financial-reporting-for-woocommerce' ) . '<span class="pnl-dropdown" data-id="tvc"></span></div>';

					echo '<div class="profit-and-loss-labels-item tvc">' . esc_html__( 'Shipping Costs (-)', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
					echo '<div class="profit-and-loss-labels-item tvc">' . esc_html__( 'Payment Costs (-)', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
					if ( !empty( $profitAndLossController->ccai['variable'] ) ) {
						foreach( $profitAndLossController->ccai['variable'] as $caai_id => $ccai_item ) {
							if ( 'own-variable-costs' == $ccai_item['label'] ) {
								echo '<div class="profit-and-loss-labels-item tvc">' . esc_html( $ccai_item['name'] ) . '</div>';
							} elseif ( 'variable-ads' == $ccai_item['label'] ) {
								echo '<div class="profit-and-loss-labels-item tvc">' . esc_html( $ccai_item['name'] ) . '</div>';
							} else {
								echo '<div class="profit-and-loss-labels-item tvc">' . esc_html( $variable_type[$ccai_item['label']] ) . '</div>';
							}
						}
					}
					echo '<div class="profit-and-loss-labels-title">' . esc_html__( 'Margin after COGS and Variable Costs', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
					echo '<div class="profit-and-loss-labels-subtitle">' . esc_html__( 'Total Fixed Costs and Income', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
					echo '<div class="profit-and-loss-labels-item bottom-blue">' . esc_html__( 'Fixed Costs Total (-)', 'profitblue-financial-reporting-for-woocommerce' ) . '<span class="pnl-dropdown" data-id="fct"></span></div>';				
					if ( !empty( $profitAndLossController->ccai['fixed'] ) ) {
						foreach( $profitAndLossController->ccai['fixed'] as $caai_id => $ccai_item ) {
							if ( 'own-fixed-costs' == $ccai_item['label'] ) {
								echo '<div class="profit-and-loss-labels-item pl-60 fct">' . esc_html( $ccai_item['name'] ) . '</div>';
							} else {
								echo '<div class="profit-and-loss-labels-item pl-60 fct">' . esc_html( $fixed_type[$ccai_item['label']] ) . '</div>';
							}
						}
					}

					echo '<div class="profit-and-loss-labels-item bottom-blue">' . esc_html__( 'Income Total (+)', 'profitblue-financial-reporting-for-woocommerce' ) . '<span class="pnl-dropdown" data-id="int"></span></div>';
					if ( !empty( $profitAndLossController->ccai['income'] ) ) {
						foreach( $profitAndLossController->ccai['income'] as $caai_id => $ccai_item ) {
							if ( 'own-income-costs' == $ccai_item['label'] ) {
								echo '<div class="profit-and-loss-labels-item pl-60 int">' . esc_html( $ccai_item['name'] ) . '</div>';
							} else {
								echo '<div class="profit-and-loss-labels-item pl-60 int">' . esc_html( $income_type[$ccai_item['label']] ) . '</div>';
							}
						}
					}

					echo '<div class="profit-and-loss-labels-title">' . esc_html__( 'EBT - Earnings before Tax', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
					echo '<div class="profit-and-loss-labels-subtitle">' . esc_html__( 'Taxes on Income', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
					echo '<div class="profit-and-loss-labels-footer">' . esc_html__( 'Net Profit / Loss', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';

					
					
				echo '</div>';
			echo '</div>';
		echo '</div>';	
		echo '<div class="profit-and-loss-months">';
			echo '<div class="profit-and-loss-months-container">';
				echo '<div class="profit-and-loss--months-inner" id="profit-and-loss--months-inner">';
				
				if( !empty( $months_data ) ) {

					$all_orders_total = 0;
					$all_products_total = 0;
					$all_shipping_total = 0;
					$all_cogs_total = 0;
					$all_gross_margin = 0;
					$all_variable_totals = 0;
					$all_margin_after_cogs_and_variable = 0;
					$all_fixed 							= array();
					$all_variable 						= array();
					$all_income 						= array();
					$all_shipping_income 				= 0;
					$all_payment_income 				= 0;
					$all_income_totals 					= 0;
					$all_fixed_totals	 				= 0;
					$all_total_fixed_and_income	 		= 0;
					$all_ebt	 						= 0;
					$all_total_tax	 					= 0;
					$all_net_income 					= 0;
					$v_total							= 0;
					$shipping_income					= 0;
					$payment_income						= 0;

					foreach( $months_data as $key => $month ) {

						
						if ( 'ytd' == $mode ) {
							if ( !empty( $month['orders_total'] ) ) {

								$orders_total 					+= $month['orders_total'];
								$products_total 				+= $month['products_total'];							
								$s_total = ( $month['shipping_total'] + $month['fees_total'] );
								$shipping_total 				+= $s_total;
								$c_total = $month['cogs_total'];
								$cogs_total 					+= $c_total;
								$month_gross_margin 			+= ( $month['products_total'] + $s_total ) - $c_total;						
								$v_total += $profitAndLossController->get_data_total( $profitAndLossController->get_variable_totals( $profitAndLossController, $month ), $month['month'] );							
								$variable_totals 				+= $v_total;
								if ( empty( $month['shipping_income'] ) ) {
									$shipping_income 			+= 0;
								} else {
									$shipping_income 			+= $month['shipping_income'];
								}
								if ( empty( $month['payment_income'] ) ) {
									$payment_income 			+= 0;
								} else {
									$payment_income 			+= $month['payment_income'];
								}
								
								$margin_after_cogs_and_variable = $month_gross_margin - ( $v_total + $shipping_income + $payment_income );
								
								$i_total = $profitAndLossController->get_data_total( $profitAndLossController->get_income_totals( $profitAndLossController, $month ), $month['month'] );
								$income_totals 					+= $i_total;

								$f_total = $profitAndLossController->get_data_total( $profitAndLossController->get_fixed_totals( $profitAndLossController, $month ), $month['month'] );
								$f_total = $f_total * -1;
								$fixed_totals 					+= $f_total;

								$total_fixed_and_income 		= $income_totals - $fixed_totals;
								
								//$ebt 							= $margin_after_cogs_and_variable - $total_fixed_and_income;
								$ebt                            = ( $orders_total - ( $cogs_total - $fixed_totals + $variable_totals + $shipping_income + $payment_income ) ) + $income_totals;
								
								$total_tax						= ( ( $ebt / 100 ) * $incomeTax * -1 );
								if ( $ebt < 0 ) {
									$net_income					= $ebt + $total_tax;
								} else {
									$net_income					= $ebt - $total_tax;
								}


								$income_totals;
								$total_tax						= ( ( $ebt / 100 ) * $incomeTax );
								$net_income						= $ebt - $total_tax;

								$all_orders_total				+= $orders_total;
								$all_products_total				+= $products_total;
								$all_shipping_total				+= $shipping_total;
								$all_cogs_total					+= $cogs_total;
								$all_gross_margin				+= $month_gross_margin;
								$all_variable_totals 			+= $v_total + $shipping_income + $payment_income;
								$all_shipping_income 			+= $shipping_income;
								$all_payment_income 			+= $payment_income;
								//$all_margin_after_cogs_and_variable += ( $month['products_total'] + $s_total ) - ( $c_total + $v_total + $shipping_income + $payment_income );
								$all_margin_after_cogs_and_variable = $all_gross_margin - $all_variable_totals;
								$all_income_totals 				+= $i_total;
								$all_fixed_totals 				+= $fixed_totals;
								$all_total_fixed_and_income 	+= $total_fixed_and_income;
								$all_ebt						+= $ebt;
								$all_total_tax					+= $total_tax;
								$all_net_income					+= $net_income;							

							} else {
								
								$i_total = $profitAndLossController->get_data_total( $profitAndLossController->get_income_totals( $profitAndLossController, $month ), $month['month'] );
								$income_totals 					+= $i_total;

								$f_total = $profitAndLossController->get_data_total( $profitAndLossController->get_fixed_totals( $profitAndLossController, $month ), $month['month'] );
								$f_total = $f_total * -1;
								$fixed_totals 					+= $f_total;

								$total_fixed_and_income 		= $fixed_totals + $income_totals;
								$all_fixed_totals 				+= $fixed_totals;
								
								$ebt                            = ( $orders_total - ( $cogs_total - $fixed_totals + $variable_totals + $shipping_income + $payment_income ) ) + $income_totals;

								$total_tax						= ( ( $ebt / 100 ) * $incomeTax );								
								$net_income						= $ebt - $total_tax;								
							}
						} else {

							//Month to day mode
							if ( empty( $month['orders_total'] ) ) {
								$month['orders_total'] = 0;
							}
							if ( empty( $month['products_total'] ) ) {
								$month['products_total'] = 0;
							}
							if ( empty( $month['shipping_total'] ) ) {
								$month['shipping_total'] = 0;
							}
							if ( empty( $month['fees_total'] ) ) {
								$month['fees_total'] = 0;
							}
							if ( empty( $month['cogs_total'] ) ) {
								$month['cogs_total'] = 0;
							}

							$orders_total 					= $month['orders_total'];
							$p_total 						= $month['products_total'];
							$products_total 				= $p_total;
							$shipping_total 				= $month['shipping_total'] + $month['fees_total'];
							$cogs_total 					= $month['cogs_total'];
							$month_gross_margin 			= ( $p_total + $shipping_total ) - $cogs_total;
							$v_total = $profitAndLossController->get_data_total( $profitAndLossController->get_variable_totals( $profitAndLossController, $month ), $month['month'] );
							$variable_totals 				= $v_total;
							if ( empty( $month['shipping_income'] ) ) {
								$shipping_income 			= 0;
							} else {
								//$shipping_income 			= $month['shipping_cost_total'];
								$shipping_income 			= $month['shipping_income'];
							}
							if ( empty( $month['payment_income'] ) ) {
								$payment_income 			= 0;
							} else {
								$payment_income 			= $month['payment_income'];
							}
							$margin_after_cogs_and_variable = ( $p_total + $shipping_total ) - ( $cogs_total + $v_total + $shipping_income + $payment_income );

							$i_total = $profitAndLossController->get_data_total( $profitAndLossController->get_income_totals( $profitAndLossController, $month ), $month['month'] );
							$income_totals 					= $i_total;
							
							$f_total = $profitAndLossController->get_data_total( $profitAndLossController->get_fixed_totals( $profitAndLossController, $month ), $month['month'] );
							$f_total = $f_total * -1;
							$fixed_totals 					= $f_total;
							
							//If order total is 0, income total is 0 too
							if ( 0 == $orders_total ) {
								//$i_total = 0;
							}
							$total_fixed_and_income 		= $f_total + $i_total;
							//$ebt 							= $margin_after_cogs_and_variable - $total_fixed_and_income;
							$ebt                            = ( $orders_total - ( $cogs_total - $fixed_totals + $variable_totals + $shipping_income + $payment_income ) ) + $income_totals;
							$total_tax						= ( ( $ebt / 100 ) * $incomeTax );
							$net_income						= $ebt - $total_tax;
							
							$all_orders_total				+= $orders_total;
							$all_products_total				+= $products_total;
							$all_shipping_total				+= $shipping_total;
							$all_cogs_total					+= $cogs_total;
							$all_gross_margin				+= $month_gross_margin;
							$all_variable_totals 			+= $v_total + $shipping_income + $payment_income;
							$all_shipping_income 			+= $shipping_income;
							$all_payment_income 			+= $payment_income;
							$all_margin_after_cogs_and_variable += ( $p_total + $shipping_total ) - ( $cogs_total + $v_total + $shipping_income + $payment_income );
							$all_income_totals 				+= $income_totals;
							$all_fixed_totals 				+= $fixed_totals;
							$all_total_fixed_and_income 	+= $total_fixed_and_income;
							$all_ebt						+= $ebt;
							$all_total_tax					+= $total_tax;
							$all_net_income					+= $net_income;
														
						}

						echo '<div class="profit-and-loss-months-item">';
							
							echo '<div class="profit-and-loss-month-label">' . esc_html( $month['month-short-label'] ) . '</div>';
							echo '<div class="profit-and-loss-month-main"><span class="pnl-e">' . wp_kses( Helper::formated_price( $orders_total ), Helper::get_allowed_tags() ) . '</span><span class="pnl-percent pnl-p">100%</span></div>';

							if ( 0 == $products_total ) {
								echo '<div class="profit-and-loss-month-item"><span class="pnl-e">0</span><span class="pnl-percent pnl-p">0%</span></div>';
							} else {
								if ( 0 == $orders_total ) {
									$total_percent = 0;
								} else {
									$total_percent = Helper::formated_price( $products_total / ( $orders_total * 0.01 ) );
								}
								echo '<div class="profit-and-loss-month-item"><span class="pnl-e">' . wp_kses( Helper::formated_price( $products_total ), Helper::get_allowed_tags() ) . '</span><span class="pnl-percent pnl-p">' . wp_kses( $total_percent, Helper::get_allowed_tags() ) . '%</span></div>';
							}
							
							if ( 0 == $shipping_total ) {
								echo '<div class="profit-and-loss-month-item"><span class="pnl-e">0</span><span class="pnl-percent pnl-p">0%</span></div>';
							} else {
								if ( 0 == $orders_total ) {
									$total_percent = 0;
								} else {
									$total_percent = Helper::formated_price( $shipping_total / ( $orders_total * 0.01 ) );
								}
								echo '<div class="profit-and-loss-month-item"><span class="pnl-e">' . esc_html( Helper::formated_price( $shipping_total ) ) . '</span><span class="pnl-percent pnl-p">' . esc_html( $total_percent ) . '%</span></div>';
							}
							
							if ( 0 == $cogs_total ) {
								echo '<div class="profit-and-loss-month-sub"><span class="pnl-e">0</span><span class="pnl-percent pnl-p">0%</span></div>';
							} else {
								if ( 0 == $orders_total ) {
									$total_percent = 0;
								} else {
									$total_percent = Helper::formated_price( $cogs_total / ( $orders_total * 0.01 ) );
								}
								echo '<div class="profit-and-loss-month-sub"><span class="pnl-e">-' . esc_html( Helper::formated_price( $cogs_total ) ) . '</span><span class="pnl-percent pnl-p">-' . esc_html( $total_percent ) . '%</span></div>';		
							}
							
							if ( 0 == $month_gross_margin ) {
								echo '<div class="profit-and-loss-month-main"><span class="pnl-e">0</span><span class="pnl-percent pnl-p">0%</span></div>';
							} else {
								if ( 0 == $orders_total ) {
									$total_percent = 0;
								} else {
									$total_percent = Helper::formated_price( $month_gross_margin / ( $orders_total * 0.01 ) );				
								}
								echo '<div class="profit-and-loss-month-main"><span class="pnl-e">' . esc_html( Helper::formated_price( $month_gross_margin ) ) . '</span><span class="pnl-percent pnl-p">' . esc_html( $total_percent ) . '%</span></div>';	
							}

							$total_variable_number = $v_total;
							$total_variable_number += $shipping_income;
							$total_variable_number += $payment_income;
							$total_variable_number = $total_variable_number;

							if ( 0 == $total_variable_number ) {
								echo '<div class="profit-and-loss-month-sub"><span class="pnl-e">0</span><span class="pnl-percent pnl-p">0%</span></div>';
							} else {				
								if ( 0 == $orders_total ) {
									$total_percent = 0;
								} else {			
									$total_percent = Helper::formated_price( $total_variable_number / ( $orders_total * 0.01 ) );	
								}
								echo '<div class="profit-and-loss-month-sub"><span class="pnl-e">-' . esc_html(Helper::formated_price( $total_variable_number ) ) . '</span><span class="pnl-percent pnl-p">-' . esc_html( $total_percent ) . '%</span></div>';
							}
							if ( 0 == $shipping_income ) {
								echo '<div class="profit-and-loss-month-item tvc"><span class="pnl-e">0</span><span class="pnl-percent pnl-p">0%</span></div>';
							} else {
								if ( 0 == $orders_total ) {
									$total_percent = 0;
								} else {
									$total_percent = Helper::formated_price( $shipping_income / ( $orders_total * 0.01 ) );
								}
								echo '<div class="profit-and-loss-month-item tvc"><span class="pnl-e">-' . esc_html( Helper::formated_price( $shipping_income ) ) . '</span><span class="pnl-percent pnl-p">-' . esc_html( $total_percent ) . '%</span></div>';
							}
							
											
							if ( 0 == $payment_income ) {
								echo '<div class="profit-and-loss-month-item tvc"><span class="pnl-e">0</span><span class="pnl-percent pnl-p">0%</span></div>';
							} else {
								if ( 0 == $orders_total ) {
									$total_percent = 0;
								} else {
									$total_percent = Helper::formated_price( $payment_income / ( $orders_total * 0.01 ) );
								}
								echo '<div class="profit-and-loss-month-item tvc"><span class="pnl-e">-' . esc_html( Helper::formated_price( $payment_income ) ) . '</span><span class="pnl-percent pnl-p">-' . esc_html( $total_percent ) . '%</span></div>';
							}						

							if ( !empty( $profitAndLossController->ccai['variable'] ) ) {
								foreach( $profitAndLossController->ccai['variable'] as $caai_id => $ccai_item ) {							
									$value = $profitAndLossController->calculate_value( $month, $ccai_item );
									if ( 0 == $value ) {
										echo '<div class="profit-and-loss-month-item tvc"><span class="pnl-e">0</span><span class="pnl-percent pnl-p">0%</span></div>';
									} else {
										if ( 0 == $orders_total ) {
											$total_percent = 0;
										} else {
											$total_percent = Helper::formated_price( $value / ( $orders_total * 0.01 ) );
										}
										echo '<div class="profit-and-loss-month-item tvc"><span class="pnl-e">-' . esc_html( Helper::formated_price( $value ) ) . '</span><span class="pnl-percent pnl-p">-' . esc_html( $total_percent ) . '%</span></div>';
									}
									if ( empty( $all_variable[$caai_id] ) ) {
										$all_variable[$caai_id] = $value;
									} else {
										$all_variable[$caai_id] += $value;
									}
								}
							}

							if ( 0 == $margin_after_cogs_and_variable ) {
								echo '<div class="profit-and-loss-month-main"><span class="pnl-e">0</span><span class="pnl-percent pnl-p">0%</span></div>';
							} else {
								if ( 0 == $orders_total ) {
									$total_percent = 0;
								} else {
									$total_percent = Helper::formated_price( $margin_after_cogs_and_variable / ( $orders_total * 0.01 ) );	
								}
								echo '<div class="profit-and-loss-month-main"><span class="pnl-e">' . esc_html( Helper::formated_price( $margin_after_cogs_and_variable ) ) . '</span><span class="pnl-percent pnl-p">' . esc_html( $total_percent ) . '%</span></div>';
							}

							if ( 0 == $total_fixed_and_income ) {
								echo '<div class="profit-and-loss-month-sub"><span class="pnl-e">0</span><span class="pnl-percent pnl-p">0%</span></div>';
							} else {
								if ( 0 == $orders_total ) {
									$total_percent = '0';
								} else {
									$total_percent = Helper::formated_price( $total_fixed_and_income / ( $orders_total * 0.01 ) );
								}
								echo '<div class="profit-and-loss-month-sub"><span class="pnl-e">' . esc_html( Helper::formated_price( $total_fixed_and_income ) ) . '</span><span class="pnl-percent pnl-p">' . esc_html( $total_percent ) . '%</span></div>';
							}

							if ( 0 == $fixed_totals ) {
								echo '<div class="profit-and-loss-month-item bottom-blue"><span class="pnl-e">0</span><span class="pnl-percent pnl-p">0%</span></div>';
							} else {									
								if ( 0 == $orders_total ) {
									$total_percent = '0';
								} else {
									$total_percent = Helper::formated_price( $fixed_totals / ( $orders_total * 0.01 ) );
								}
								echo '<div class="profit-and-loss-month-item bottom-blue"><span class="pnl-e">' . esc_html( Helper::formated_price( $fixed_totals ) ) . '</span><span class="pnl-percent pnl-p">' . esc_html( $total_percent ) . '%</span></div>';
							}						

							if ( !empty( $profitAndLossController->ccai['fixed'] ) ) {
								foreach( $profitAndLossController->ccai['fixed'] as $caai_id => $ccai_item ) {
									$value = $profitAndLossController->calculate_value( $month, $ccai_item );							
									if ( 0 == $orders_total ) {
										$total_percent = '0';
									} else {
										$total_percent = Helper::formated_price( $value / ( $orders_total * 0.01 ) );
									}
									if ( $value < 1 ) {
										$string = Helper::formated_price( $value );
									} else {
										$string = '-' . Helper::formated_price( $value );
									}
									echo '<div class="profit-and-loss-month-item fct"><span class="pnl-e">' . esc_html( $string ) . '</span><span class="pnl-percent pnl-p">-' . esc_html( $total_percent ) . '%</span></div>';	
									if ( empty( $all_fixed[$caai_id] ) ) {
										$all_fixed[$caai_id] = $value;
									} else {
										$all_fixed[$caai_id] += $value;
									}
								}
							}

							//Income
							if ( 0 == $income_totals ) {
								echo '<div class="profit-and-loss-month-item bottom-blue"><span class="pnl-e">0</span><span class="pnl-percent pnl-p">0%</span></div>';
							} else {				
								if ( 0 == $orders_total ) {
									$total_percent = 0;
								} else {					
									$total_percent = Helper::formated_price( $income_totals / ( $orders_total * 0.01 ) );
								}
								echo '<div class="profit-and-loss-month-item bottom-blue"><span class="pnl-e">' . esc_html( Helper::formated_price( $income_totals ) ) . '</span><span class="pnl-percent pnl-p">' . esc_html( $total_percent ) . '%</span></div>';
							}

							if ( !empty( $profitAndLossController->ccai['income'] ) ) {
								foreach( $profitAndLossController->ccai['income'] as $caai_id => $ccai_item ) {
									$value = $profitAndLossController->calculate_value( $month, $ccai_item );
									if ( 0 == $value ) {
										echo '<div class="profit-and-loss-month-item int"><span class="pnl-e">0</span><span class="pnl-percent pnl-p">0%</span></div>';
									} else {
										if ( 0 == $orders_total ) {
											$total_percent = 0;
										} else {
											$total_percent = Helper::formated_price( $value / ( $orders_total * 0.01 ) );
										}
										if ( $value < 0 ) {
											$total_percent = '-' . $total_percent;
										}
										echo '<div class="profit-and-loss-month-item int"><span class="pnl-e">' . esc_html( Helper::formated_price( $value ) ) . '</span><span class="pnl-percent pnl-p">' . esc_html( $total_percent ) . '%</span></div>';							
									}
									if ( empty( $all_income[$caai_id] ) ) {
										$all_income[$caai_id] = $value;
									} else {
										$all_income[$caai_id] += $value;
									}
								}
							}

							if ( 0 == $ebt ) {
								echo '<div class="profit-and-loss-month-main"><span class="pnl-e">0</span><span class="pnl-percent pnl-p">0%</span></div>';
							} else {
								if ( 0 == $orders_total ) {
									$total_percent = 0;
								} else {
									$total_percent = Helper::formated_price( $ebt / ( $orders_total * 0.01 ) );
								}
								if ( $ebt < 0 ) {
									$total_percent = $total_percent;
								}
								echo '<div class="profit-and-loss-month-main"><span class="pnl-e">' . esc_html( Helper::formated_price( $ebt ) ) . '</span><span class="pnl-percent pnl-p">' . esc_html( $total_percent ) . '%</span></div>';
							}

							if ( 0 == $total_tax ) {
								echo '<div class="profit-and-loss-month-sub"><span class="pnl-e">0</span><span class="pnl-percent pnl-p">0%</span></div>';
							} else {
								if ( 0 == $orders_total ) {
									$total_percent = 0;
								} else {
									$total_percent = Helper::formated_price( $total_tax / ( $orders_total * 0.01 ) );
								}
								if ( $total_tax < 0 ) {
									$total_percent = $total_percent;
									$total_tax_string = Helper::formated_price( $total_tax * -1 );
								} else {
									$total_tax_string = ' - ' . Helper::formated_price( $total_tax );
								}
								echo '<div class="profit-and-loss-month-sub"><span class="pnl-e"> ' . esc_html( $total_tax_string ) . '</span><span class="pnl-percent pnl-p">' . esc_html( $total_percent ) . '%</span></div>';
							}

							if ( 0 == $net_income ) {
								echo '<div class="profit-and-loss-month-footer"><span class="pnl-e">0</span><span class="pnl-percent pnl-p">0%</span></div>';
							} else {
								if ( 0 == $orders_total ) {
									$total_percent = 0;
								} else {
									$total_percent = Helper::formated_price( $net_income / ( $orders_total * 0.01 ) );
								}
								if ( $net_income < 0 ) {
									$total_percent = $total_percent;
								}
								echo '<div class="profit-and-loss-month-footer"><span class="pnl-e">' . esc_html( Helper::formated_price( $net_income ) ) . '</span><span class="pnl-percent pnl-p">' . esc_html( $total_percent ) . '%</span></div>';
							}



						echo '</div>';						
					}
					
					if ( 'ytd' != $mode ) {
						
						//Last item summary
						echo '<div class="profit-and-loss-months-item">';
							echo '<div class="profit-and-loss-month-label">' . esc_html__( 'Year summary', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
							echo '<div class="profit-and-loss-month-main"><span class="pnl-e">' . esc_html( Helper::formated_price( $all_orders_total ) ) . '</span><span class="pnl-percent pnl-p">100%</span></div>';
							
							if ( 0 == $all_orders_total ) {
								$total_percent = 0;
							} else {
								$total_percent = Helper::formated_price( $all_products_total / ( $all_orders_total * 0.01 ) );
							}
							if ( $all_products_total < 0 ) {
								$total_percent = $total_percent;
							}
							echo '<div class="profit-and-loss-month-item"><span class="pnl-e">' . esc_html( Helper::formated_price( $all_products_total ) ) . '</span><span class="pnl-percent pnl-p">' . esc_html( $total_percent ) . '%</span></div>';
							
							if ( 0 == $all_orders_total ) {
								$total_percent = 0;
							} else {
								$total_percent = Helper::formated_price( $all_shipping_total / ( $all_orders_total * 0.01 ) );
							}
							if ( $all_shipping_total < 0 ) {
								$total_percent = $total_percent;
							}
							echo '<div class="profit-and-loss-month-item"><span class="pnl-e">' . esc_html( Helper::formated_price( $all_shipping_total ) ) . '</span><span class="pnl-percent pnl-p">' . esc_html( $total_percent ) . '%</span></div>'; 
							
							if ( 0 == $all_orders_total ) {
								$total_percent = 0;
							} else {
								$total_percent = Helper::formated_price( $all_cogs_total / ( $all_orders_total * 0.01 ) );
							}
							if ( $all_cogs_total < 0 ) {
								$total_percent = $total_percent;
							}
							echo '<div class="profit-and-loss-month-sub"><span class="pnl-e">-' . esc_html( Helper::formated_price( $all_cogs_total ) ) . '</span><span class="pnl-percent pnl-p">' . esc_html( $total_percent ) . '%</span></div>';	
							
							if ( 0 == $all_orders_total ) {
								$total_percent = 0;
							} else {
								$total_percent = Helper::formated_price( $all_gross_margin / ( $all_orders_total * 0.01 ) );
							}
							if ( $all_gross_margin < 0 ) {
								$total_percent = $total_percent;
							}
							echo '<div class="profit-and-loss-month-main"><span class="pnl-e">' . esc_html( Helper::formated_price( $all_gross_margin ) ) . '</span><span class="pnl-percent pnl-p">' . esc_html( $total_percent ) . '%</span></div>';	

							if ( 0 == $all_orders_total ) {
								$total_percent = 0;
							} else {
								$total_percent = Helper::formated_price( $all_variable_totals / ( $all_orders_total * 0.01 ) );
							}
							if ( $all_variable_totals < 0 ) {
								$total_percent = $total_percent;
							}
							echo '<div class="profit-and-loss-month-sub"><span class="pnl-e">-' . esc_html( Helper::formated_price( $all_variable_totals ) ) . '</span><span class="pnl-percent pnl-p">' . esc_html( $total_percent ) . '%</span></div>';
						
							if ( 0 == $all_orders_total ) {
								$total_percent = 0;
							} else {
								$total_percent = Helper::formated_price( $all_shipping_income / ( $all_orders_total * 0.01 ) );
							}
							if ( $all_shipping_income < 0 ) {
								$total_percent = $total_percent;
							}
							echo '<div class="profit-and-loss-month-item tvc"><span class="pnl-e">' . esc_html( Helper::formated_price( $all_shipping_income ) ) . '</span><span class="pnl-percent pnl-p">' . esc_html( $total_percent ) . '%</span></div>';

							if ( 0 == $all_orders_total ) {
								$total_percent = 0;
							} else {
								$total_percent = Helper::formated_price( $all_payment_income / ( $all_orders_total * 0.01 ) );
							}
							if ( $all_payment_income < 0 ) {
								$total_percent = $total_percent;
							}
							echo '<div class="profit-and-loss-month-item tvc"><span class="pnl-e">' . esc_html( Helper::formated_price( $all_payment_income ) ) . '</span><span class="pnl-percent pnl-p">' . esc_html( $total_percent ) . '%</span></div>';
							
							
							foreach( $all_variable as $caai_id => $value) {							
								if ( 0 == $all_orders_total ) {
									$total_percent = 0;
								} else {
									$total_percent = Helper::formated_price( $value / ( $all_orders_total * 0.01 ) );
								}
								if ( $value < 0 ) {
									$total_percent = $total_percent;
								}
								echo '<div class="profit-and-loss-month-item tvc"><span class="pnl-e">' . esc_html( Helper::formated_price( $value ) ) . '</span><span class="pnl-percent pnl-p">' . esc_html( $total_percent ) . '%</span></div>';							
							}

							if ( 0 == $all_orders_total ) {
								$total_percent = 0;
							} else {
								$total_percent = Helper::formated_price( $all_margin_after_cogs_and_variable / ( $all_orders_total * 0.01 ) );
							}
							if ( $all_margin_after_cogs_and_variable < 0 ) {
								$total_percent = $total_percent;
							}
							echo '<div class="profit-and-loss-month-main"><span class="pnl-e">' . esc_html( Helper::formated_price( $all_margin_after_cogs_and_variable ) ) . '</span><span class="pnl-percent pnl-p">' . esc_html( $total_percent ) . '%</span></div>';					
							
							if ( 0 == $all_orders_total ) {
								$total_percent = 0;
							} else {
								$total_percent = Helper::formated_price( $all_total_fixed_and_income / ( $all_orders_total * 0.01 ) );
							}
							if ( $all_total_fixed_and_income < 0 ) {
								$total_percent = $total_percent;
							}
							echo '<div class="profit-and-loss-month-sub"><span class="pnl-e">' . esc_html( Helper::formated_price( $all_total_fixed_and_income ) ) . '</span><span class="pnl-percent pnl-p">' . esc_html( $total_percent ) . '%</span></div>';										
							
							if ( 0 == $all_orders_total ) {
								$total_percent = 0;
							} else {
								$total_percent = Helper::formated_price( $all_fixed_totals / ( $all_orders_total * 0.01 ) );
							}
							if ( $all_fixed_totals < 0 ) {
								$total_percent = $total_percent;
							}
							echo '<div class="profit-and-loss-month-item bottom-blue"><span class="pnl-e">' . esc_html( Helper::formated_price( $all_fixed_totals ) ) . '</span><span class="pnl-percent pnl-p">' . esc_html( $total_percent ) . '%</span></div>';
							foreach( $all_fixed as $caai_id => $value) {	
								if ( 0 == $all_orders_total ) {
									$total_percent = 0;
								} else {
									$total_percent = Helper::formated_price( $value / ( $all_orders_total * 0.01 ) );
								}
								if ( $value < 0 ) {
									$total_percent = $total_percent;
								}						
								echo '<div class="profit-and-loss-month-item fct"><span class="pnl-e">' . esc_html( Helper::formated_price( $value ) ) . '</span><span class="pnl-percent pnl-p">' . esc_html( $total_percent ) . '%</span></div>';							
							}	
							
							
							if ( 0 == $all_orders_total ) {
								$total_percent = 0;
							} else {
								$total_percent = Helper::formated_price( $all_income_totals / ( $all_orders_total * 0.01 ) );
							}
							if ( $all_income_totals < 0 ) {
								$total_percent = $total_percent;
							}
							echo '<div class="profit-and-loss-month-item bottom-blue"><span class="pnl-e">' . esc_html( Helper::formated_price( $all_income_totals ) ) . '</span><span class="pnl-percent pnl-p">' . esc_html( $total_percent ) . '%</span></div>';
							foreach( $all_income as $caai_id => $value) {	
								if ( 0 == $all_orders_total ) {
									$total_percent = 0;
								} else {
									$total_percent = Helper::formated_price( $value / ( $all_orders_total * 0.01 ) );
								}
								if ( $value < 0 ) {
									$total_percent = $total_percent;
								}						
								echo '<div class="profit-and-loss-month-item int"><span class="pnl-e">' . esc_html( Helper::formated_price( $value ) ) . '</span><span class="pnl-percent pnl-p">' . esc_html( $total_percent ) . '%</span></div>';							
							}
							
							if ( 0 == $all_orders_total ) {
								$total_percent = 0;
							} else {
								$total_percent = Helper::formated_price( $all_ebt / ( $all_orders_total * 0.01 ) );
							}
							if ( $all_ebt < 0 ) {
								$total_percent = $total_percent;
							}
							echo '<div class="profit-and-loss-month-main"><span class="pnl-e">' . esc_html( Helper::formated_price( $all_ebt ) ) . '</span><span class="pnl-percent pnl-p">' . esc_html( $total_percent ) . '%</span></div>';						
							
							if ( 0 == $all_orders_total ) {
								$total_percent = 0;
							} else {
								$total_percent = Helper::formated_price( $all_total_tax / ( $all_orders_total * 0.01 ) );
							}
							if ( $all_total_tax < 0 ) {
								$total_percent = $total_percent;
							}
							echo '<div class="profit-and-loss-month-sub"><span class="pnl-e">' . esc_html( Helper::formated_price( $all_total_tax ) ) . '</span><span class="pnl-percent pnl-p">' . esc_html( $total_percent ) . '%</span></div>';
							
							if ( 0 == $all_orders_total ) {
								$total_percent = 0;
							} else {
								$total_percent = Helper::formated_price( $all_net_income / ( $all_orders_total * 0.01 ) );
							}
							if ( $all_net_income < 0 ) {
								$total_percent = $total_percent;
							}
							echo '<div class="profit-and-loss-month-footer"><span class="pnl-e">' . esc_html( Helper::formated_price( $all_net_income ) ) . '</span><span class="pnl-percent pnl-p">' . esc_html( $total_percent ) . '%</span></div>';
							
						echo '</div>';

					}

				}
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';

	$html = ob_get_clean();
	$cache->create_file( $cache_file_name, $html );
	update_option( 'profitblue_pnl_cache', 'yes' );
	echo wp_kses( $html, Helper::get_allowed_tags() );
	
}