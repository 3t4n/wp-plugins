<?php

namespace ProfitBlue\Helpers;

/**
 * CreateTables
 * 
 * This class create database tables after activation
 * 
 * @since 1.0.0
 * 
 */
class CreatePeriods {
	
	/**
	 * create_periods
	 * Create starter data for periods
	 *
	 * @since    1.0.0
	 * @access public
	 * 
	 * @return null
	 */
	public static function create_periods() {
		
		global $wpdb;
		$current_year = gmdate( 'Y' );
		$last_year = gmdate( 'Y' ) -1;

		//Products periods
		$data = array(
			'name' 			=> 'Whole e-shop period',
			'type' 			=> 'whole-period',
			'date_start' 	=> '',
			'date_end' 		=> '',
			'year' 			=> ''
		);
		$wpdb->insert( $wpdb->prefix . 'profitblue_products_periods', $data );
		$data = array(
			'name' 			=> $last_year,
			'type' 			=> $last_year,
			'date_start' 	=> '',
			'date_end' 		=> '',
			'year' 			=> $last_year
		);
		$wpdb->insert( $wpdb->prefix . 'profitblue_products_periods', $data );
		$data = array(
			'name' 			=> $current_year,
			'type' 			=> $current_year,
			'date_start' 	=> '',
			'date_end' 		=> '',
			'year' 			=> $current_year
		);
		$wpdb->insert( $wpdb->prefix . 'profitblue_products_periods', $data );

		//Shipping data
		$data = array(
			'type' 			=> 'no-costs',
			'period_type'	=> 'whole-period',
			'period_start' 	=> '',
			'period_end' 	=> '',
			'year' 			=> 'whole-period',
			'label'			=> 'Shipping costs'
		);
		$wpdb->insert( $wpdb->prefix . 'profitblue_shiping_costs', $data );
		$data = array(
			'type' 			=> 'no-costs',
			'period_type'	=> $last_year,
			'period_start' 	=> '',
			'period_end' 	=> '',
			'year' 			=> $last_year,
			'label'			=> 'Shipping costs'
		);
		$wpdb->insert( $wpdb->prefix . 'profitblue_shiping_costs', $data );
		$data = array(
			'type' 			=> 'no-costs',
			'period_type'	=> $current_year,
			'period_start' 	=> '',
			'period_end' 	=> '',
			'year' 			=> $current_year,
			'label'			=> 'Shipping costs'
		);
		$wpdb->insert( $wpdb->prefix . 'profitblue_shiping_costs', $data );

		//Payment period
		$data = array(
			'name' 			=> 'Whole e-shop period',
			'type' 			=> 'whole-period',
			'date_start' 	=> '',
			'date_end' 		=> '',
			'year' 			=> ''
		);
		$wpdb->insert( $wpdb->prefix . 'profitblue_payment_periods', $data );
		$data = array(
			'name' 			=> $last_year,
			'type' 			=> $last_year,
			'date_start' 	=> '',
			'date_end' 		=> '',
			'year' 			=> $last_year
		);
		$wpdb->insert( $wpdb->prefix . 'profitblue_payment_periods', $data );
		$data = array(
			'name' 			=> $current_year,
			'type' 			=> $current_year,
			'date_start' 	=> '',
			'date_end' 		=> '',
			'year' 			=> $current_year
		);
		$wpdb->insert( $wpdb->prefix . 'profitblue_payment_periods', $data );
		
		//Shop settings
		$data = array(
			'name' 			=> 'Whole e-shop period',
			'type' 			=> 'whole-period',
			'date_start' 	=> '',
			'date_end' 		=> '',
			'year' 			=> ''
		);
		$wpdb->insert( $wpdb->prefix . 'profitblue_shop_setting_periods', $data );
		$data = array(
			'name' 			=> $last_year,
			'type' 			=> $last_year,
			'date_start' 	=> '',
			'date_end' 		=> '',
			'year' 			=> $last_year
		);
		$wpdb->insert( $wpdb->prefix . 'profitblue_shop_setting_periods', $data );
		$data = array(
			'name' 			=> $current_year,
			'type' 			=> $current_year,
			'date_start' 	=> '',
			'date_end' 		=> '',
			'year' 			=> $current_year
		);
		$wpdb->insert( $wpdb->prefix . 'profitblue_shop_setting_periods', $data );

	}

	
}