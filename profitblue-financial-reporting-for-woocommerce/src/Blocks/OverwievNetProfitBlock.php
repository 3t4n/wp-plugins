<?php
namespace ProfitBlue\Blocks;

use ProfitBlue\Enums\ColorTints;

/**
 * OverwievNetProfitBlock
 */
class OverwievNetProfitBlock {
	
	/**
	 * render
	 *
	 * @param  object $overview
	 * @param  array $data
	 * @return void
	 */
	public static function render( $overview, $data ) {

		$red_colors = ColorTints::getRed();
		$blue_colors = ColorTints::getBlue();
		ob_start();

		$revenue = $overview->get_revenue();
		$cogs = $overview->get_cogs();
		$net_profit = $overview->get_net_profit();
		$fixed_income = round( $overview->get_fixed() - $overview->get_income() );
		$taxes = $overview->get_taxes();
		$variable = round( $overview->get_variable() + $overview->get_shipping_income() + $overview->get_payment_income() );
		if ( $net_profit < 0 ) {
			$c_net_profit = $net_profit * ( -1 );
			$net_profit_percent_value = round( $c_net_profit / ( $revenue / 100 ), 2 );
			$net_profit_percent = ceil( $net_profit_percent_value );
			$net_profit_percent_value = $net_profit_percent_value * - 1;
		} else {
			$net_profit_percent_value = ceil( $net_profit / ( $revenue / 100 ) );
			$net_profit_percent = ceil( $net_profit_percent_value );
		}		
		if ( $net_profit_percent_value < 0 ) {
			if ( $net_profit_percent_value < -100 ) {
				$net_color = $red_colors['100'];
			} else {
				$net_color = $red_colors[$net_profit_percent];
			}			
		} else {
			if ( $net_profit_percent_value > 100 ) {
				$net_color = $red_colors['100'];
			} else {
				$net_color = $red_colors[$net_profit_percent];
			}			
		}

		$cogs_percent_value = ceil( $cogs / ( $revenue / 100 ) );
		$cogs_percent = ceil( $cogs_percent_value );
		if ( $cogs_percent_value < 0 ) {
			if ( $cogs_percent_value < -100 ) {
				$cogs_color = $red_colors['100'];
			} else {
				$cogs_color = $red_colors[$cogs_percent];
			}			
		} else {
			$cogs_color = $blue_colors[$cogs_percent];
			if ( $cogs_percent_value > 100 ) {
				$cogs_color = $red_colors['100'];
			} else {
				$cogs_color = $red_colors[$cogs_percent];
			}
		}

		$variable_percent_value = ceil( $variable / ( $revenue / 100 ) );
		$variable_percent = ceil( $variable_percent_value );
		if ( $variable_percent_value < 0 ) {
			if ( $variable_percent_value < -100 ) {
				$variable_color = $red_colors['100'];
			} else {
				$variable_color = $red_colors[$variable_percent];
			}
		} else {
			$variable_color = $blue_colors[$variable_percent];
			if ( $variable_percent_value > 100 ) {
				$variable_color = $red_colors['100'];
			} else {
				$variable_color = $red_colors[$variable_percent];
			}
		}

		$fixes_percent_value = ceil( $fixed_income / ( $revenue / 100 ) );
		$fixes_percent = ceil( $fixes_percent_value );
		if ( $fixes_percent_value < 0 ) {
			if ( $fixes_percent_value < -100 ) {
				$fixes_color = $red_colors['100'];
			} else {
				$fixes_percent = $fixes_percent * -1;
				$fixes_color = $red_colors[$fixes_percent];
			}
		} else {
			if ( $fixes_percent_value > 100 ) {
				$fixes_color = $blue_colors['100'];
			} else {
				$fixes_color = $blue_colors[$fixes_percent];
			}
			
		}

		$taxes_percent_value = ceil( $taxes / ( $revenue / 100 ) );
		$taxes_percent = ceil( $taxes_percent_value );
		if ( $taxes_percent_value < 0 ) {
			if ( $taxes_percent_value < -100 ) {
				$taxes_color = $red_colors['100'];
			} else {
				$fixes_percent = $fixes_percent * -1;
				$taxes_color = $red_colors[$fixes_percent];
			}
		} else {
			if ( $taxes_percent_value > 100 ) {
				$taxes_color = $blue_colors['100'];
			} else {	
				if ( $fixes_percent < 0 ) {
					$fixes_percent = $fixes_percent * -1;
					if ( $fixes_percent > 100 ) {
						$fixes_percent = 100;
					}
				} else {
					if ( $fixes_percent > 100 ) {
						$fixes_percent = 100;
					}
				}
				$taxes_color = $blue_colors[$fixes_percent];
			}
			
		}

		?>
		<div style="display:none;" id="profitData" 
		data-net-profit="'NET Profit (<?php echo esc_html( $net_profit_percent_value ); ?>%)', <?php echo esc_html( $net_profit ); ?>, 'color: <?php echo esc_html( $net_color ); ?>'"
		data-cogs="'COGS - Cost of Gods Sold (<?php echo esc_html( $cogs_percent_value ); ?>%)', <?php echo esc_html( $cogs ); ?>, 'color: <?php echo esc_html( $cogs_color ); ?>'"
		data-taxes="'Taxes on Income (<?php echo esc_html( $taxes_percent_value ); ?>%)', <?php echo esc_html( $taxes ); ?>, 'color: <?php echo esc_html( $taxes_color ); ?>'"
		data-variable="'Variable costs total (<?php echo esc_html( $variable_percent_value ); ?>%)', <?php echo esc_html( $variable ); ?>, 'color: <?php echo esc_html( $variable_color ); ?>' "
		data-fixed="'Total fixed costs and income (<?php echo esc_html( $fixes_percent_value ); ?>%)', <?php echo esc_html( $fixed_income ); ?>, 'color: <?php echo esc_html( $fixes_color ); ?>' "
		></div>
	
		<?php
		
		echo '<div id="overview-analysis-net" class="overview-analysis-net overwiev-item">';
			echo '<div class="overview-analysis-net-header">';
				echo '<h2>' . esc_html__( 'Net Profit/Loss Analysis', 'profitblue-financial-reporting-for-woocommerce' ) . '</h2>';
			echo '</div>';
			echo '<div class="overview-analysis-net-content">';
				echo '<div class="overview-analysis-net-content-data" id="overview-analysis-net-content-data">';
				echo '</div>';
				echo '<div class="overview-analysis-net-content-label">';
					echo '<div class="overview-analysis-net-item"><span class="overview-analysis-net-item-square" style="background-color:' . esc_html( $net_color ) . ';"></span><span class="overview-analysis-net-item-text">- ' . esc_html__( 'Net profit', 'profitblue-financial-reporting-for-woocommerce' ) . ' (' . esc_html( $net_profit_percent_value ) . '%)</span></div>';
					echo '<div class="overview-analysis-net-item"><span class="overview-analysis-net-item-square" style="background-color:' . esc_html( $cogs_color ) . ';"></span><span class="overview-analysis-net-item-text">- ' . esc_html__( 'Costs Of Goods Sold (COGS)', 'profitblue-financial-reporting-for-woocommerce' ) . ' (' . esc_html( $cogs_percent_value ) . '%)</span></div>';
					echo '<div class="overview-analysis-net-item"><span class="overview-analysis-net-item-square" style="background-color:' . esc_html( $taxes_color ) . ';"></span><span class="overview-analysis-net-item-text">- ' . esc_html__( 'Taxes on income', 'profitblue-financial-reporting-for-woocommerce' ) . ' (' . esc_html( $overview->taxes ) . '%)</span></div>';
					echo '<div class="overview-analysis-net-item"><span class="overview-analysis-net-item-square" style="background-color:' . esc_html( $variable_color ) . ';"></span><span class="overview-analysis-net-item-text">- ' . esc_html__( 'Variable costs total', 'profitblue-financial-reporting-for-woocommerce' ) . ' (' . esc_html( $variable_percent_value ) . '%)</span></div>';
					echo '<div class="overview-analysis-net-item"><span class="overview-analysis-net-item-square" style="background-color:' . esc_html( $fixes_color ) . ';"></span><span class="overview-analysis-net-item-text">- ' . esc_html__( 'Total fixed costs and income', 'profitblue-financial-reporting-for-woocommerce' ) . ' (' . esc_html( $fixes_percent_value ) . '%)</span></div>';					
				echo '</div>';
			echo '</div>';
		echo '</div>';

	}

}
