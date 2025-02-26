<?php
namespace ProfitBlue\Blocks;

use ProfitBlue\Admin\AdminPage;
use ProfitBlue\Helpers\Helper;

/**
 * OrdersFilterBlock
 */
class OrdersFilterBlock {
	
	/**
	 * render
	 *
	 * @return string
	 */
	public static function render() {

		
		ob_start();
		echo '<div class="orders-datepicker">';
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['period'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$value = isset( $_GET['period'] ) ? wp_unslash( sanitize_text_field( $_GET['period'] ) ) : '';
		} else {
			$year = gmdate( 'Y' ); 
			$start_date = gmdate( 'Y-m-01' );
			$end_date = gmdate( 'Y-m-t' );
			$value = $start_date . ' - ' . $end_date;
		}		
			echo '<input class="product-datepicker-datepicker" id="orders-datepicker" value="' . esc_html( $value ) . '" name="orders-datepicker" readonly="">';	
		echo '</div>';
		
		
		//return ob_get_clean();

	}	

}
