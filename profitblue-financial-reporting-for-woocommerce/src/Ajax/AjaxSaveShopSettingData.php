<?php

namespace ProfitBlue\Ajax;

use ProfitBlue\Controllers\ShopSettingPeriodsController;
use ProfitBlue\Models\ShopSettingCostsModel;

/**
 * Class Settings
 *
 * @package  Deps\Settings
 * @property Plugin $plugin
 */
class AjaxSaveShopSettingData {

	public static function handle() {

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_text_field( $_POST['nonce'] ) ), 'profitblue_ajax_nonce' ) ) {
			wp_send_json_error( 'Invalid nonce' );
			wp_die();
		}
		
		$response = array();
		$data = array();
		if ( !empty( $_POST['exclude'] ) ) {
			$exclude = wp_unslash( sanitize_text_field( $_POST['exclude'] ) );
			$data['exclude'] = $exclude;
		} else {
			$data['exclude'] = 'no';
		}
		
		if ( !empty( $_POST['taxincome'] ) ) {
			$taxincome = wp_unslash( sanitize_text_field( $_POST['taxincome'] ) );
			$data['tax_income'] = $taxincome;
		} else {
			$data['tax_income'] = 0;
		}
		
		if ( !empty( $_POST['period'] ) ) {
			$date_period = wp_unslash( sanitize_text_field( $_POST['period'] ) );
		}		
		
		//Get period 
		$periodsController = new ShopSettingPeriodsController();

		if ( 'custom' == $date_period ) {
			$date_start = isset( $_POST['start'] ) ? wp_unslash( sanitize_text_field( $_POST['start'] ) ) : '';
			$date_end   = isset( $_POST['end'] ) ? wp_unslash( sanitize_text_field( $_POST['end'] ) ) : '';
			$period_data = $periodsController->get_period( $date_period, $date_start, $date_end );	
			$period_id 	 = $period_data[0]->ID;
			$year 		 = $period_data[0]->year;
		} else {
			$period_data = $periodsController->get_period( $date_period );
			$period_id 	 = $period_data[0]->ID;
			$year 		 = $date_period;
		}

		$data['period_id'] = $period_id;
		$data['year'] = $year;

		$setting_model = new ShopSettingCostsModel();

		if ( 'whole-period' == $date_period ) {
			global $wpdb;
			$table_name = $wpdb->prefix . 'profitblue_shop_setting_periods';
			$result = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM %i", array( $table_name ) ) );
			if ( !empty( $result ) ) {
				foreach( $result as $item ) {
					
					$table_name = $wpdb->prefix . 'profitblue_shop_setting';
					$check_result = $wpdb->get_results( 
						$wpdb->prepare(	
							"SELECT * FROM %i WHERE period_id = %d",
							array( $table_name, $item->ID ) 
						) 
					);
					$p_data = array(
						'exclude' => $data['exclude'],
						'tax_income' => $data['tax_income']
					);
					if ( !empty( $check_result ) ) {
						$wpdb->update( $wpdb->prefix . 'profitblue_shop_setting', $p_data, array( 'period_id' => $item->ID ) );
					} else {
						$p_data['period_id'] = $item->ID;
						if ( 'whole-period' == $item->type ) {
							$p_data['year'] = 'whole-period';
						} elseif ( 'custom' == $item->type ) {
							$p_data['year'] = $item->year;
						} else {
							$p_data['year'] = $item->type;
						}
						$wpdb->insert( $wpdb->prefix . 'profitblue_shop_setting', $p_data );
					}
				}
			}
		} else {
			$setting_model->save_setting( $data );
		}
						
		$response['status'] = 'succes';
		$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'Data was saved.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
		echo wp_json_encode( $response );
		exit();
			
	}
}
