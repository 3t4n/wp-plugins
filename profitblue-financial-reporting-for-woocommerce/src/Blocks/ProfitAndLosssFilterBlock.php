<?php
namespace ProfitBlue\Blocks;

use ProfitBlue\Blocks\TooltipBlock;
use ProfitBlue\Admin\AdminPage;
use ProfitBlue\Helpers\Helper;
use ProfitBlue\Controllers\PaymentsPeriodsController;

/**
 * ProfitAndLosssFilterBlock
 */
class ProfitAndLosssFilterBlock {
	
	/**
	 * render
	 *
	 * @return string
	 */
	public static function render() {
		
		ob_start();

		$actual_year = gmdate( 'Y' );
		$last_year   = gmdate( 'Y', strtotime ( '-1 year' , strtotime ( $actual_year ) ) );
		$actual_period = $actual_year . '-01-01 - ' . $actual_year . '-12-31';
		$last_period = $last_year . '-01-01 - ' . $last_year . '-12-31';
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['period'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$dates = isset( $_GET['period'] ) ? wp_unslash( sanitize_text_field( $_GET['period'] ) ) : '';
			$parts = explode( ' - ', $dates );
			$start_date = $parts[0];
			$end_date = $parts[1];
			$period = $dates;
		} else {
			$period = $actual_period;
		}

		echo '<div class="profit-and-loss-periods-inner">';
			echo '<div class="profit-and-loss-periods-select">';
		
				echo '<select id="cost-years" name="cost-years" class="cost-years 6" data-url="' . esc_url( admin_url() ) . 'admin.php?page=profit-and-loss">';
						echo '<option value="' . esc_html( $last_period ) . '" disabled>' . esc_html__( 'Last year', 'profitblue-financial-reporting-for-woocommerce' ) . ' (' . esc_html( $last_year ) . ')</option>';	
						echo '<option value="' . esc_html( $actual_period ) . '" selected="selected">' . esc_html__( 'Actual year', 'profitblue-financial-reporting-for-woocommerce' ) . ' (' . esc_html( $actual_year ) . ')</option>';	
					echo '</select>';
			echo '</div>';
		echo '</div>';
		
		return ob_get_clean();

	}

}
