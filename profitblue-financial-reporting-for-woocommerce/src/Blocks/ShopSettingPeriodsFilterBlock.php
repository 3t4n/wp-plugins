<?php
namespace ProfitBlue\Blocks;

use ProfitBlue\Blocks\TooltipBlock;
use ProfitBlue\Admin\AdminPage;
use ProfitBlue\Helpers\Helper;
use ProfitBlue\Controllers\ShopSettingPeriodsController;

/**
 * ShopSettingPeriodsFilterBlock
 */
class ShopSettingPeriodsFilterBlock {

	
	/**
	 * render
	 *
	 * @return void
	 */
	public static function render() {

		
		ob_start();

		$periodsController = new ShopSettingPeriodsController();
		$period = 'whole-period';
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['period'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$period = isset( $_GET['period'] ) ? wp_unslash( sanitize_text_field( $_GET['period'] ) ) : '';
		}
		$last_year = gmdate( 'Y', strtotime( '-1 year' ) );
		$current_year = gmdate( 'Y' );
		$next_year = gmdate( 'Y', strtotime( '+1 year' ) );

		echo '<div class="product-overwiev-periods-inner">';
		if ( 'custom' == $period ) {
			echo '<div class="product-overwiev-periods-custom" id="product-overwiev-periods-custom">';
		} else {
			echo '<div class="product-overwiev-periods-custom hidden" id="product-overwiev-periods-custom">';
		}

				echo '<h3>' . esc_html__( 'Custom periods', 'profitblue-financial-reporting-for-woocommerce' ) . '</h3>';
				$custom_periods = $periodsController->get_custom_periods();
				if ( false == $custom_periods ) {
					echo '<p>' . esc_html__( 'You don´t have custom period', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
				} else {
					echo wp_kses( self::render_custom_periods( $custom_periods ), Helper::get_allowed_tags() );
				}


			echo '</div>';
			echo '<div class="product-overwiev-periods-select">';
		
				echo '<select id="cost-years" name="cost-years" class="cost-years 9" data-url="' . esc_url( admin_url() ) . 'admin.php?page=data-settings&subpage=shop-settings">';
						echo '<option value="whole-period" selected="selected">' . esc_html__( 'Whole e-shop period', 'profitblue-financial-reporting-for-woocommerce' ) . ')</option>';	
						echo '<option value="' . esc_html( $last_year ) . '" disabled>' . esc_html__( 'Last year', 'profitblue-financial-reporting-for-woocommerce' ) . ' (' . esc_html( $last_year ) . ')</option>';	
						echo '<option value="' . esc_html( $current_year ) . '" disabled>' . esc_html__( 'Actual year', 'profitblue-financial-reporting-for-woocommerce' ) . ' (' . esc_html( $current_year ) . ')</option>';
					echo '</select>';
				echo '<div class="product-period hidden">';
					echo '<input class="product-datepicker-datepicker" id="cogs-datepicker" name="product-period-datepicker" readonly="">';
					echo '<a href="#" class="btn save-product-custom">' . esc_html__( 'Save custom period', 'profitblue-financial-reporting-for-woocommerce' ) . '</a>';
				echo '</div>';
			

			echo '</div>';

		echo '</div>';

		
		return ob_get_clean();

	}

	public static function render_custom_periods( $periods ) {

		$html = '';
		$array = array();

		foreach( $periods as $period ) {

			if ( 'custom' == $period->type ) {
				$array[$period->year][] = array(
					'date-start' => $period->date_start,
					'date-end' => $period->date_end
				);
			}

		}

		if ( !empty( $array ) ) {
			ksort( $array );
			$html .= '<div class="product-overwiev-periods-data" id="data-item-date-">';
			foreach( $array as $key => $item ){
				$html .= '<div class="data-item">';
				$html .= '<div class="data-item-year">' . esc_html( $key ) . '</div>';
				$html .= '<div class="data-item-dates">';
					foreach( $item as $item_dates ) {
											
						$html .= '<div class="data-item-date">';
						$html .= '<a href="' . admin_url() . 'admin.php?page=data-settings&subpage=shop-settings&period=custom&date_start=' . esc_html( $item_dates['date-start'] ) . '&date_end=' . esc_html( $item_dates['date-end'] ) . '">' . esc_html( $item_dates['date-start'] ) . ' - ' . esc_html( $item_dates['date-end'] ) . '</a>';
						$html .= '<span class="data-item-delete" data-id=""></span>';
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
