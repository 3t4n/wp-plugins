<?php

namespace ProfitBlue\Models;

use ProfitBlue\Controllers\ShopSettingPeriodsController;

class ShopSettingCostsModel {

	private $wpdb;

	public function __construct() {

		global $wpdb;
		$this->wpdb = $wpdb;

	}

	public function save_setting( $data ) {

		if ( 'custom' == $data['year'] ) {
			$setting_data = $this->get_data( $data['year'], $data['period_id'] );
		} else {
			$setting_data = $this->get_data_by_year( $data['year'] );
		}
		
		
		if ( false ===  $setting_data ) {
			$this->insert_data( $data );
		} else {
			$this->update_data( $setting_data[0]->ID, $data );
		}

	}
	
	public function get_data( $period_id, $year ) {

		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i WHERE period_id = %s AND year = %s",
				array(
					$wpdb->prefix . 'profitblue_shop_setting',
					$period_id,
					$year				
				)
			)
		);
		
		if ( empty( $result ) ) {
			return false;
		} else {
			return $result;
		}

	}

	public function get_data_by_year( $year ) {

		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i WHERE year = %s",
				array(
					$wpdb->prefix . 'profitblue_shop_setting',
					$year				
				)
			)
		);
		if ( empty( $result ) ) {
			return false;
		} else {
			return $result;
		}

	}

	public function insert_data( $data ) {

		$this->wpdb->insert( $this->wpdb->prefix . 'profitblue_shop_setting', $data );

		return $this->wpdb->insert_id;

	}

	public function update_data( $id, $data ) {

		$this->wpdb->update( $this->wpdb->prefix . 'profitblue_shop_setting', $data, array( 'ID' => $id ) );

	}

	public function get_setting_cost() {

		global $wpdb;
		$period = 'whole-period';
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['period'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$period = isset( $_GET['period'] ) ? wp_unslash( sanitize_text_field( $_GET['period'] ) ) : '';

		}
		$date_start = null;
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['date_start'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$date_start = isset( $_GET['date_start'] ) ? wp_unslash( sanitize_text_field( $_GET['date_start'] ) ) : '';

		}
		$date_end = null;
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['date_end'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$date_end = isset( $_GET['date_end'] ) ? wp_unslash( sanitize_text_field( $_GET['date_end'] ) ) : '';

		}

		$periodController = new ShopSettingPeriodsController();

		if ( 'custom' == $period ) {
		
			$period_data = $periodController->get_period( $period, $date_start, $date_end );
			if ( empty( $period_data ) ) {
				return false;
			}

			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i WHERE period_id = %d",
					array(
						$wpdb->prefix . 'profitblue_shop_setting',
						$period_data[0]->ID				
					)
				)
			);					

		} else {

			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i WHERE year = %s",
					array(
						$wpdb->prefix . 'profitblue_shop_setting',
						$period				
					)
				)
			);
			
		}
		
		if ( empty( $result ) ) {
			return false;
		} else {
			return $result;
		}

	}

	public function get_setting_cost_by_period( $period ) {

		global $wpdb;
		$date_start = null;
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['date_start'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$date_start = isset( $_GET['date_start'] ) ? wp_unslash( sanitize_text_field( $_GET['date_start'] ) ) : '';
		}
		$date_end = null;
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['date_end'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$date_end = isset( $_GET['date_end'] ) ? wp_unslash( sanitize_text_field( $_GET['date_end'] ) ) : '';
		}

		$periodController = new ShopSettingPeriodsController();

		if ( 'custom' == $period ) {
		
			$period_data = $periodController->get_period( $period, $date_start, $date_end );
			if ( empty( $period_data ) ) {
				return false;
			}
			
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i WHERE period_id = %d",
					array(
						$wpdb->prefix . 'profitblue_shop_setting',
						$period_data[0]->ID				
					)
				)
			);
			
		} else {

			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i WHERE type = %s",
					array(
						$wpdb->prefix . 'profitblue_shop_setting',
						$period				
					)
				)
			);
			
		}

		if ( empty( $result ) ) {
			return false;
		} else {
			return $result;
		}

	}

}
