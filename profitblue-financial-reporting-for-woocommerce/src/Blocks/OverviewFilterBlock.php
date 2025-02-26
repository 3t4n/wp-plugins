<?php
namespace ProfitBlue\Blocks;

use ProfitBlue\Admin\AdminPage;
use ProfitBlue\Helpers\Helper;

/**
 * OverviewFilterBlock
 */
class OverviewFilterBlock {
	
	/**
	 * render
	 *
	 * @return string
	 */
	public static function render() {

		ob_start();		
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['period'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$value = isset( $_GET['period'] ) ? wp_unslash( sanitize_text_field( $_GET['period'] ) ) : '';
			echo '<div class="orders-datepicker">';				
				echo '<input class="product-datepicker-datepicker" id="overview-datepicker" name="overview-datepicker" readonly="" value="' . esc_html( $value ) . '">';	
			echo '</div>';
		} else {
			$year = gmdate( 'Y' ); 
			$start_date = gmdate( 'Y-m-01' );
			$end_date = gmdate( 'Y-m-t' );
			$value = $start_date . ' - ' . $end_date;
			echo '<div class="orders-datepicker">';				
				echo '<input class="product-datepicker-datepicker" id="overview-datepicker" name="overview-datepicker" readonly="" value="' . esc_html( $value ) . '">';	
			echo '</div>';
		}			

	}	

}
