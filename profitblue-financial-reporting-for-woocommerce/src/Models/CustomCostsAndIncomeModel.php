<?php

namespace ProfitBlue\Models;

/**
 * CustomCostsAndIncomeModel
 */
class CustomCostsAndIncomeModel {
	
	/**
	 * wpdb
	 *
	 * @var object
	 */
	private $wpdb;
	
	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {

		global $wpdb;
		$this->wpdb = $wpdb;

	}
	
	/**
	 * get_items
	 *
	 * @param  string $type
	 * @return array|false
	 */
	public function get_items( $type = null ) {

		global $wpdb;
		$year = gmdate( 'Y' );
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['cost-years'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$year = isset( $_GET['cost-years'] ) ? wp_unslash( sanitize_text_field( $_GET['cost-years'] ) ) : '';		
		}

		if ( null === $type ) {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i WHERE year = %s",
					array(
						$wpdb->prefix . 'profitblue_ccai',
						$year					
					)
				), ARRAY_A
			);
		} else {

			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i WHERE year = %s AND type = %s",
					array(
						$wpdb->prefix . 'profitblue_ccai',
						$year,
						$type					
					)
				), ARRAY_A
			);
		}
		
		if ( empty( $result ) ) {
			return false;
		} else {
			return $result;
		}

	}
	
	/**
	 * get_ccai
	 *
	 * @param  int $id
	 * @return array|false
	 */
	public function get_ccai( $id ) {

		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i WHERE ID = %d",
				array(
					$wpdb->prefix . 'profitblue_ccai',
					$id					
				)
			)
		);
		
		if ( empty( $result ) ) {
			return false;
		} else {
			return $result;
		}

	}
	
	/**
	 * get_ccai_by_year
	 *
	 * @param  int $id
	 * @param  string $year
	 * @return array|false
	 */
	public function get_ccai_by_year( $year ) {

		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i WHERE year = %s",
				array(
					$wpdb->prefix . 'profitblue_ccai',
					$id					
				)
			), ARRAY_A
		);
		
		if ( empty( $result ) ) {
			return false;
		} else {
			return $result;
		}

	}

	public function insert_ccai( $data ) {

		$this->wpdb->insert( $this->wpdb->prefix . 'profitblue_ccai', $data );

		return $this->wpdb->insert_id;

	}

	public function clear( $year ) {

		$this->wpdb->delete( $this->wpdb->prefix . 'profitblue_ccai', array( 'year' => $year ), array( '%s' ) );

	}


}
