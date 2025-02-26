<?php
namespace ProfitBlue\Blocks;

use ProfitBlue\Models\ShopSettingCostsModel;
use ProfitBlue\Abstracts\AbstractForm;
use ProfitBlue\Admin\AdminPage;
use ProfitBlue\Helpers\Helper;

/**
 * ShopSettingBlock
 */
class ShopSettingBlock {
	
	/**
	 * get_shop_setting_block
	 *
	 * @return string
	 */
	public static function get_shop_setting_block() {

		$model = new ShopSettingCostsModel();
		$data = $model->get_setting_cost();

		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( empty( $_GET['period'] ) ) {
			$date_period = 'whole-period';
		} else {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$period = isset( $_GET['period'] ) ? wp_unslash( sanitize_text_field( $_GET['period'] ) ) : '';
		}

		ob_start();

		echo '<div id="shop-setting" class="shop-setting">';
			echo '<div class="form-section">';
				echo '<div class="form-section-inner">';
					
					if ( 'whole-period' == $date_period ) {
						echo '<div class="form-section-line line-3-1 shop-setting-first-line">';						
							echo '<div class="exclude-proccessing section-line-label">';
								echo '<span class="tooltip-wrap">' . esc_html__( 'Exclude "processing" and "pending payment" order statuses from reports', 'profitblue-financial-reporting-for-woocommerce' );
								echo '</span>';
							echo '</div>';
							echo '<div class="exclude-proccessing">';
								$option = array(
									'name' => 'exclude-proccessing',
									'id' =>'exclude-proccessing',
								);
								$value =  0;
								if ( !empty( $data[0]->exclude ) ) {
									$value = $data[0]->exclude;
								}
								echo wp_kses( AbstractForm::checkbox( $option, $value ), Helper::get_allowed_tags() );
							echo '</div>';
						echo '</div>';
					}
					echo '<div class="form-section-line line-3-1 shop-setting-second-line">';	
						echo '<div class="tax-income section-line-label">';
							echo '<span class="tooltip-wrap">' . esc_html__( 'Tax on income rate in your country (percentage)', 'profitblue-financial-reporting-for-woocommerce' );
							echo '</span>';
						echo '</div>';	
						echo '<div class="tax-income">';
							$option = array(
								'name' => 'tax-income',
								'id' =>'tax-income',
								'min' => 0,
								'step' => '0.01'
							);
							$value =  0;
							if ( !empty( $data[0]->tax_income ) ) {
								$value = $data[0]->tax_income;
							}
							echo wp_kses( AbstractForm::number( $option, $value ), Helper::get_allowed_tags() );
						echo '</div>';					
					echo '</div>';

					
				echo '</div>';
			echo '</div>';
		echo '</div>';			

		return ob_get_clean();

	}

}
