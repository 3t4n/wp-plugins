<?php
namespace ProfitBlue\Blocks;

use ProfitBlue\Blocks\TooltipBlock;
use ProfitBlue\Admin\AdminPage;
use ProfitBlue\Helpers\Helper;
use ProfitBlue\Controllers\ShippingPeriodsController;

/**
 * ShippingPeriodsFilterBlock
 */
class ShippingPeriodsFilterBlock {

	
	/**
	 * render
	 *
	 * @return string
	 */
	public static function render() {

		
		ob_start();

		$periodsController = new ShippingPeriodsController();
		$period = 'whole-period';
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['period'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$period = isset( $_GET['period'] ) ? wp_unslash( sanitize_text_field( $_GET['period'] ) ) : '';
		}
		$last_year = gmdate( 'Y', strtotime( '-1 year' ) );
		$current_year = gmdate( 'Y' );
		$next_year = gmdate( 'Y', strtotime( '+1 year' ) );

		echo '<div class="shipping-overwiev-periods-inner">';
		if ( 'custom' == $period ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$date_start = isset( $_GET['date_start'] ) ? wp_unslash( sanitize_text_field( $_GET['date_start'] ) ) : '';
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$date_end = isset( $_GET['date_end'] ) ? wp_unslash( sanitize_text_field( $_GET['date_end'] ) ) : '';
			echo '<div class="shipping-overwiev-periods-custom" id="shipping-overwiev-periods-custom" date-start="' . esc_html( $date_start ) . '" date-end="' . esc_html( $date_end ) . '">';
		} else {
			echo '<div class="shipping-overwiev-periods-custom hidden" id="shipping-overwiev-periods-custom">';
		}

				echo '<h3>' . esc_html__( 'Custom periods', 'profitblue-financial-reporting-for-woocommerce' ) . '</h3>';
				$custom_periods = $periodsController->get_custom_periods();
				if ( false == $custom_periods ) {
					echo '<p>' . esc_html__( 'You don´t have custom period', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
				} else {
					echo wp_kses( self::render_custom_periods( $custom_periods ), Helper::get_allowed_tags() );
				}


			echo '</div>';
			echo '<div class="shipping-overwiev-periods-select">';
		
				echo '<select id="cost-years" name="cost-years" class="cost-years 7" data-url="' . esc_url( admin_url() ) . 'admin.php?page=data-settings&subpage=shipping-costs">';
						echo '<option value="whole-period" selected="selected">' . esc_html__( 'Whole e-shop period', 'profitblue-financial-reporting-for-woocommerce' ) . ')</option>';	
						echo '<option value="' . esc_html( $last_year ) . '" disabled>' . esc_html__( 'Last year', 'profitblue-financial-reporting-for-woocommerce' ) . ' (' . esc_html( $last_year ) . ')</option>';	
						echo '<option value="' . esc_html( $current_year ) . '" disabled>' . esc_html__( 'Actual year', 'profitblue-financial-reporting-for-woocommerce' ) . ' (' . esc_html( $current_year ) . ')</option>';
						echo '<option value="custom-range" disabled>' . esc_html__( 'Custom', 'profitblue-financial-reporting-for-woocommerce' ) . '</option>';
					echo '</select>';
					// phpcs:ignore WordPress.Security.NonceVerification.Recommended
				if ( !empty( $_GET['period'] ) && 'custom' == wp_unslash( sanitize_text_field( $_GET['period'] ) ) ) {
					echo '<div class="shipping-period">';
				} else {
					echo '<div class="shipping-period hidden">';
				}			
				if ( 'custom' == $period ) {
					echo '<input class="shipping-datepicker-datepicker" id="shipping-datepicker" name="shipping-period-datepicker" readonly="" value="' . esc_html( $date_start ) . ' - ' . esc_html( $date_end ) . '">';
				} else {
					echo '<input class="shipping-datepicker-datepicker" id="shipping-datepicker" name="shipping-period-datepicker" readonly="">';
				}
					echo '<a href="#" class="btn save-shipping-custom">' . esc_html__( 'Save custom period', 'profitblue-financial-reporting-for-woocommerce' ) . '</a>';
				echo '</div>';
			

			echo '</div>';

		echo '</div>';

		
		return ob_get_clean();

	}

	public static function render_custom_periods( $periods ) {

		$html = '';
		$array = array();

		foreach( $periods as $period ) {

			if ( 'custom-range' == $period->period_type ) {
				$array[$period->year][] = array(
					'date-start' => $period->period_start,
					'date-end' => $period->period_end,
					'id' => $period->ID
				);
			}

		}

		if ( !empty( $array ) ) {
			ksort( $array );
			$html .= '<div class="product-overwiev-periods-data">';
			foreach( $array as $key => $item ){
				$html .= '<div class="data-item">';
				$html .= '<div class="data-item-year">' . esc_html( $key ) . '</div>';
				$html .= '<div class="data-item-dates">';
					foreach( $item as $item_dates ) {
											
						$html .= '<div class="data-item-date" id="data-item-date-' . esc_html( $item_dates['id'] ) . '"><a href="' . esc_url( admin_url() ) . 'admin.php?page=data-settings&subpage=shipping-costs&period=custom&date_start=' . esc_html( $item_dates['date-start'] ) . '&date_end=' . esc_html( $item_dates['date-end'] ) . '">' . esc_html( $item_dates['date-start'] ) . ' - ' . esc_html( $item_dates['date-end'] ) . '</a>';
						$html .= '<span class="data-item-delete" data-id="' . esc_html( $item_dates['id'] ) . '"></span>';
						$html .= '</div>';
					}
					$html .= '</div>';
					$html .= '</div>';
			}
			$html .= '</div>';
		}

		return $html;
	
	}

}
