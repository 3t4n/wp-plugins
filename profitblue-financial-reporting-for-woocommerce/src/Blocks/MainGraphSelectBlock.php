<?php
namespace ProfitBlue\Blocks;

use ProfitBlue\Admin\AdminPage;
use ProfitBlue\Helpers\Helper;

/**
 * MainGraphSelectBlock
 */
class MainGraphSelectBlock {
	
	/**
	 * render_block
	 *
	 * @param  string $mode
	 * @return string
	 */
	public static function render_block( $mode = null ) {

		ob_start();

		echo '<div class="overview-main-header">';
			echo '<h2>' . esc_html__( 'Main graph', 'profitblue-financial-reporting-for-woocommerce' ) . '</h2>';
			echo '<select name="main-graph-mode" id="main-graph-mode" class="main-graph-mode">';
				echo '<option value="---">' . esc_html__( 'Customize columns', 'profitblue-financial-reporting-for-woocommerce' ) . '</option>';
				if ( 'revenue' == $mode ) {
					echo '<option value="revenue" selected="selected">' . esc_html__( 'Revenue', 'profitblue-financial-reporting-for-woocommerce' ) . '</option>';
				} else {
					echo '<option value="revenue">' . esc_html__( 'Revenue', 'profitblue-financial-reporting-for-woocommerce' ) . '</option>';
				}
				if ( 'cogs' == $mode ) {
					echo '<option value="cogs" selected="selected">' . esc_html__( 'COGS - Cost Of Goods Sold', 'profitblue-financial-reporting-for-woocommerce' ) . '</option>';
				} else {
					echo '<option value="cogs">' . esc_html__( 'COGS - Cost Of Goods Sold', 'profitblue-financial-reporting-for-woocommerce' ) . '</option>';
				}
				if ( 'margin-amount' == $mode ) {
					echo '<option value="margin-amount" selected="selected">' . esc_html__( 'Gross margin (Amount)', 'profitblue-financial-reporting-for-woocommerce' ) . '</option>';
				} else {
					echo '<option value="margin-amount">' . esc_html__( 'Gross profit (Amount)', 'profitblue-financial-reporting-for-woocommerce' ) . '</option>';
				}
				if ( 'margin-percent' == $mode ) {
					echo '<option value="margin-percent" selected="selected">' . esc_html__( 'Gross margin (%)', 'profitblue-financial-reporting-for-woocommerce' ) . '</option>';
				} else {
					echo '<option value="margin-percent">' . esc_html__( 'Gross margin (%)', 'profitblue-financial-reporting-for-woocommerce' ) . '</option>';
				}
				if ( 'number-orders' == $mode ) {
					echo '<option value="number-orders" selected="selected">' . esc_html__( 'Number of orders', 'profitblue-financial-reporting-for-woocommerce' ) . '</option>';
				} else {
					echo '<option value="number-orders">' . esc_html__( 'Number of orders', 'profitblue-financial-reporting-for-woocommerce' ) . '</option>';
				}
				if ( 'net-profit' == $mode ) {
					echo '<option value="net-profit" selected="selected">' . esc_html__( 'Net profit', 'profitblue-financial-reporting-for-woocommerce' ) . '</option>';
				} else {
					echo '<option value="net-profit">' . esc_html__( 'Net profit', 'profitblue-financial-reporting-for-woocommerce' ) . '</option>';
				}					
			echo '</select>';
		echo '</div>';

		return ob_get_clean();

	}

}
