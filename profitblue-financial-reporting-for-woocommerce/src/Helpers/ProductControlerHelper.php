<?php

namespace ProfitBlue\Helpers;

/**
 * Helper
 * 
 * Helper class
 * 
 * @since 1.0.0
 * 
 */
class ProductControlerHelper {
		
	public static function sql_1( $period_id, $search_text, $sql_offset, $limit ) {
		global $wpdb;
		$products_table_name = $wpdb->prefix . 'profitblue_products';
		$cogs_table_name = $wpdb->prefix . 'profitblue_cogs';
		global $wpdb;
		$result_cogs = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT p.product_id, c.cogs 
				FROM %i p 
				LEFT JOIN %i c ON p.product_id = c.product_id 
				WHERE c.period =%d  AND c.cogs = '0'  AND ( c.product_name LIKE %s OR c.sku LIKE %s )
				LIMIT %d OFFSET %d",
				array(
					$products_table_name,
					$cogs_table_name,
					$period_id,
					'%' . $search_text . '%',
					'%' . $search_text . '%',
					$sql_offset,
					$limit
				)
			)
		);

		return $result_cogs;

	}

	public static function sql_2( $period_id, $search_text, $limit ) {
		global $wpdb;
		$products_table_name = $wpdb->prefix . 'profitblue_products';
		$cogs_table_name = $wpdb->prefix . 'profitblue_cogs';
		global $wpdb;
		$result_cogs = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT p.product_id, c.cogs 
				FROM %i p 
				LEFT JOIN %i c ON p.product_id = c.product_id 
				WHERE c.period =%d  AND c.cogs = '0'  AND ( c.product_name LIKE %s OR c.sku LIKE %s )
				LIMIT %d",
				array(
					$products_table_name,
					$cogs_table_name,
					$period_id,
					'%' . $search_text . '%',
					'%' . $search_text . '%',
					$limit
				)
			)
		);

		return $result_cogs;

	}

	public static function sql_3( $period_id, $search_text, $sql_offset, $limit ) {
		global $wpdb;
		$products_table_name = $wpdb->prefix . 'profitblue_products';
		$cogs_table_name = $wpdb->prefix . 'profitblue_cogs';
		global $wpdb;
		$result_cogs = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT p.product_id, c.cogs 
				FROM %i p 
				LEFT JOIN %i c ON p.product_id = c.product_id 
				WHERE c.period =%d  AND ( c.product_name LIKE %s OR c.sku LIKE %s )
				LIMIT %d OFFSET %d",
				array(
					$products_table_name,
					$cogs_table_name,
					$period_id,
					'%' . $search_text . '%',
					'%' . $search_text . '%',
					$sql_offset,
					$limit
				)
			)
		);

		return $result_cogs;

	}

	public static function sql_4( $period_id, $search_text, $limit ) {
		global $wpdb;
		$products_table_name = $wpdb->prefix . 'profitblue_products';
		$cogs_table_name = $wpdb->prefix . 'profitblue_cogs';
		global $wpdb;
		$result_cogs = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT p.product_id, c.cogs 
				FROM %i p 
				LEFT JOIN %i c ON p.product_id = c.product_id 
				WHERE c.period =%d  AND ( c.product_name LIKE %s OR c.sku LIKE %s )
				LIMIT %d",
				array(
					$products_table_name,
					$cogs_table_name,
					$period_id,
					'%' . $search_text . '%',
					'%' . $search_text . '%',
					$limit
				)
			)
		);

		return $result_cogs;

	}

	public static function count_sql_1( $period_id, $search_text ) {
		global $wpdb;
		$products_table_name = $wpdb->prefix . 'profitblue_products';
		$cogs_table_name = $wpdb->prefix . 'profitblue_cogs';
		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT COUNT(*) AS total_records 
				FROM %i p 
				LEFT JOIN %i c ON p.product_id = c.product_id 
				WHERE c.period =%d  AND c.cogs = '0'  AND ( c.product_name LIKE %s OR c.sku LIKE %s )",
				array(
					$products_table_name,
					$cogs_table_name,
					$period_id,
					'%' . $search_text . '%',
					'%' . $search_text . '%'
				)
			)
		);

		return $result;
		
	}

	public static function count_sql_3( $period_id, $search_text ) {
		global $wpdb;
		$products_table_name = $wpdb->prefix . 'profitblue_products';
		$cogs_table_name = $wpdb->prefix . 'profitblue_cogs';
		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT COUNT(*) AS total_records 
				FROM %i p 
				LEFT JOIN %i c ON p.product_id = c.product_id 
				WHERE c.period =%d  AND ( c.product_name LIKE %s OR c.sku LIKE %s )",
				array(
					$products_table_name,
					$cogs_table_name,
					$period_id,
					'%' . $search_text . '%',
					'%' . $search_text . '%'
				)
			)
		);

		return $result;
		
	}


	/////////////////////////////////////////////

	public static function sql_5( $period_year, $search_text, $sql_offset, $limit ) {
		global $wpdb;
		$products_table_name = $wpdb->prefix . 'profitblue_products';
		$cogs_table_name = $wpdb->prefix . 'profitblue_cogs';
		global $wpdb;
		$result_cogs = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT p.product_id, c.cogs 
				FROM %i p 
				LEFT JOIN %i c ON p.product_id = c.product_id 
				WHERE c.year =%s  AND c.cogs = '0'  AND ( c.product_name LIKE %s OR c.sku LIKE %s )
				LIMIT %d OFFSET %d",
				array(
					$products_table_name,
					$cogs_table_name,
					$period_year,
					'%' . $search_text . '%',
					'%' . $search_text . '%',
					$sql_offset,
					$limit
				)
			)
		);

		return $result_cogs;

	}

	public static function sql_6( $period_year, $search_text, $limit ) {
		global $wpdb;
		$products_table_name = $wpdb->prefix . 'profitblue_products';
		$cogs_table_name = $wpdb->prefix . 'profitblue_cogs';
		global $wpdb;
		$result_cogs = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT p.product_id, c.cogs 
				FROM %i p 
				LEFT JOIN %i c ON p.product_id = c.product_id 
				WHERE c.year =%s  AND c.cogs = '0'  AND ( c.product_name LIKE %s OR c.sku LIKE %s )
				LIMIT %d",
				array(
					$products_table_name,
					$cogs_table_name,
					$period_year,
					'%' . $search_text . '%',
					'%' . $search_text . '%',
					$limit
				)
			)
		);

		return $result_cogs;

	}

	public static function sql_7( $period_year, $search_text, $sql_offset, $limit ) {
		global $wpdb;
		$products_table_name = $wpdb->prefix . 'profitblue_products';
		$cogs_table_name = $wpdb->prefix . 'profitblue_cogs';
		global $wpdb;
		$result_cogs = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT p.product_id, c.cogs 
				FROM %i p 
				LEFT JOIN %i c ON p.product_id = c.product_id 
				WHERE c.year =%s  AND ( c.product_name LIKE %s OR c.sku LIKE %s )
				LIMIT %d OFFSET %d",
				array(
					$products_table_name,
					$cogs_table_name,
					$period_year,
					'%' . $search_text . '%',
					'%' . $search_text . '%',
					$sql_offset,
					$limit
				)
			)
		);

		return $result_cogs;

	}

	public static function sql_8( $period_year, $search_text, $limit ) {
		global $wpdb;
		$products_table_name = $wpdb->prefix . 'profitblue_products';
		$cogs_table_name = $wpdb->prefix . 'profitblue_cogs';
		global $wpdb;
		$result_cogs = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT p.product_id, c.cogs 
				FROM %i p 
				LEFT JOIN %i c ON p.product_id = c.product_id 
				WHERE c.year =%s  AND ( c.product_name LIKE %s OR c.sku LIKE %s )
				LIMIT %d",
				array(
					$products_table_name,
					$cogs_table_name,
					$period_year,
					'%' . $search_text . '%',
					'%' . $search_text . '%',
					$limit
				)
			)
		);

		return $result_cogs;

	}

	public static function count_sql_5( $period_year, $search_text ) {
		global $wpdb;
		$products_table_name = $wpdb->prefix . 'profitblue_products';
		$cogs_table_name = $wpdb->prefix . 'profitblue_cogs';
		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT COUNT(*) AS total_records 
				FROM %i p 
				LEFT JOIN %i c ON p.product_id = c.product_id 
				WHERE c.year =%s  AND c.cogs = '0'  AND ( c.product_name LIKE %s OR c.sku LIKE %s )",
				array(
					$products_table_name,
					$cogs_table_name,
					$period_year,
					'%' . $search_text . '%',
					'%' . $search_text . '%'
				)
			)
		);

		return $result;
		
	}

	public static function count_sql_7( $period_year, $search_text ) {
		global $wpdb;
		$products_table_name = $wpdb->prefix . 'profitblue_products';
		$cogs_table_name = $wpdb->prefix . 'profitblue_cogs';
		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT COUNT(*) AS total_records 
				FROM %i p 
				LEFT JOIN %i c ON p.product_id = c.product_id 
				WHERE c.year =%s  AND ( c.product_name LIKE %s OR c.sku LIKE %s )",
				array(
					$products_table_name,
					$cogs_table_name,
					$period_year,
					'%' . $search_text . '%',
					'%' . $search_text . '%'
				)
			)
		);

		return $result;
		
	}


	///////////////////////////////////////////////
	//////////////////////////////////////////////
	/////////////////////////////////////////////

	public static function sql_9( $period_id, $sql_offset, $limit ) {
		global $wpdb;
		$products_table_name = $wpdb->prefix . 'profitblue_products';
		$cogs_table_name = $wpdb->prefix . 'profitblue_cogs';
		global $wpdb;
		$result_cogs = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT p.product_id, c.cogs 
				FROM %i p 
				LEFT JOIN %i c ON p.product_id = c.product_id 
				WHERE c.period =%d  AND c.cogs = '0'
				LIMIT %d OFFSET %d",
				array(
					$products_table_name,
					$cogs_table_name,
					$period_id,
					$sql_offset,
					$limit
				)
			)
		);

		return $result_cogs;

	}

	public static function sql_10( $period_id, $limit ) {
		global $wpdb;
		$products_table_name = $wpdb->prefix . 'profitblue_products';
		$cogs_table_name = $wpdb->prefix . 'profitblue_cogs';
		global $wpdb;
		$result_cogs = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT p.product_id, c.cogs 
				FROM %i p 
				LEFT JOIN %i c ON p.product_id = c.product_id 
				WHERE c.period =%d  AND c.cogs = '0'
				LIMIT %d",
				array(
					$products_table_name,
					$cogs_table_name,
					$period_id,
					$limit
				)
			)
		);

		return $result_cogs;

	}

	public static function sql_11( $period_id, $sql_offset, $limit ) {

		global $wpdb;
		$products_table_name = $wpdb->prefix . 'profitblue_products';
		$cogs_table_name = $wpdb->prefix . 'profitblue_cogs';
		global $wpdb;
		$result_cogs = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT p.product_id, c.cogs 
				FROM %i p 
				LEFT JOIN %i c ON p.product_id = c.product_id 
				WHERE c.period =%d LIMIT %d OFFSET %d",
				array(
					$products_table_name,
					$cogs_table_name,
					$period_id,
					$sql_offset,
					$limit
				)
			)
		);		

		return $result_cogs;

	}

	public static function sql_12( $period_id, $limit ) {
		global $wpdb;
		$products_table_name = $wpdb->prefix . 'profitblue_products';
		$cogs_table_name = $wpdb->prefix . 'profitblue_cogs';
		global $wpdb;
		$result_cogs = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT p.product_id, c.cogs 
				FROM %i p 
				LEFT JOIN %i c ON p.product_id = c.product_id 
				WHERE c.period =%d
				LIMIT %d",
				array(
					$products_table_name,
					$cogs_table_name,
					$period_id,
					$limit
				)
			)
		);

		return $result_cogs;

	}

	public static function count_sql_9( $period_id ) {

		global $wpdb;

		$products_table_name = $wpdb->prefix . 'profitblue_products';
		$cogs_table_name = $wpdb->prefix . 'profitblue_cogs';
		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT COUNT(*) AS total_records 
				FROM %i p 
				LEFT JOIN %i c ON p.product_id = c.product_id 
				WHERE c.period =%d  AND c.cogs = '0'",
				array(
					$products_table_name,
					$cogs_table_name,
					$period_id
				)
			)
		);

		return $result;
		
	}

	public static function count_sql_11( $period_id ) {
		global $wpdb;
		$products_table_name = $wpdb->prefix . 'profitblue_products';
		$cogs_table_name = $wpdb->prefix . 'profitblue_cogs';
		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT COUNT(*) AS total_records 
				FROM %i p 
				LEFT JOIN %i c ON p.product_id = c.product_id 
				WHERE c.period =%d",
				array(
					$products_table_name,
					$cogs_table_name,
					$period_id
				)
			)
		);

		return $result;
		
	}


	/////////////////////////////////////////////

	public static function sql_13( $period_year, $sql_offset, $limit ) {
		global $wpdb;
		$products_table_name = $wpdb->prefix . 'profitblue_products';
		$cogs_table_name = $wpdb->prefix . 'profitblue_cogs';
		global $wpdb;
		$result_cogs = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT p.product_id, c.cogs 
				FROM %i p 
				LEFT JOIN %i c ON p.product_id = c.product_id 
				WHERE c.year =%s  AND c.cogs = '0'
				LIMIT %d OFFSET %d",
				array(
					$products_table_name,
					$cogs_table_name,
					$period_year,
					$sql_offset,
					$limit
				)
			)
		);

		return $result_cogs;

	}

	public static function sql_14( $period_year, $limit ) {
		global $wpdb;
		$products_table_name = $wpdb->prefix . 'profitblue_products';
		$cogs_table_name = $wpdb->prefix . 'profitblue_cogs';
		global $wpdb;
		$result_cogs = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT p.product_id, c.cogs 
				FROM %i p 
				LEFT JOIN %i c ON p.product_id = c.product_id 
				WHERE c.year =%s  AND c.cogs = '0'
				LIMIT %d",
				array(
					$products_table_name,
					$cogs_table_name,
					$period_year,
					$limit
				)
			)
		);

		return $result_cogs;

	}

	public static function sql_15( $period_year, $sql_offset, $limit ) {
		global $wpdb;
		$products_table_name = $wpdb->prefix . 'profitblue_products';
		$cogs_table_name = $wpdb->prefix . 'profitblue_cogs';
		global $wpdb;
		$result_cogs = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT p.product_id, c.cogs 
				FROM %i p 
				LEFT JOIN %i c ON p.product_id = c.product_id 
				WHERE c.year =%s
				LIMIT %d OFFSET %d",
				array(
					$products_table_name,
					$cogs_table_name,
					$period_year,
					$sql_offset,
					$limit
				)
			)
		);

		return $result_cogs;

	}

	public static function sql_16( $period_year, $limit ) {
		global $wpdb;
		$products_table_name = $wpdb->prefix . 'profitblue_products';
		$cogs_table_name = $wpdb->prefix . 'profitblue_cogs';
		global $wpdb;
		$result_cogs = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT p.product_id, c.cogs 
				FROM %i p 
				LEFT JOIN %i c ON p.product_id = c.product_id 
				WHERE c.year =%s
				LIMIT %d",
				array(
					$products_table_name,
					$cogs_table_name,
					$period_year,
					$limit
				)
			)
		);

		return $result_cogs;

	}

	public static function count_sql_13( $period_year ) {
		global $wpdb;
		$products_table_name = $wpdb->prefix . 'profitblue_products';
		$cogs_table_name = $wpdb->prefix . 'profitblue_cogs';
		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT COUNT(*) AS total_records 
				FROM %i p 
				LEFT JOIN %i c ON p.product_id = c.product_id 
				WHERE c.year =%s  AND c.cogs = '0'",
				array(
					$products_table_name,
					$cogs_table_name,
					$period_year
				)
			)
		);

		return $result;
		
	}

	public static function count_sql_15( $period_year ) {
		global $wpdb;
		$products_table_name = $wpdb->prefix . 'profitblue_products';
		$cogs_table_name = $wpdb->prefix . 'profitblue_cogs';
		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT COUNT(*) AS total_records 
				FROM %i p 
				LEFT JOIN %i c ON p.product_id = c.product_id 
				WHERE c.year =%s",
				array(
					$products_table_name,
					$cogs_table_name,
					$period_year
				)
			)
		);

		return $result;
		
	}

	
}