<?php

if ( ! defined( 'DYDO_DONATION_TABLENAME' ) ) {
	define( 'DYDO_DONATION_TABLENAME', 'dydo_donations' );
}

if ( ! defined( 'DYDO_ONETIME_DONATION_TABLENAME' ) ) {
	define( 'DYDO_ONETIME_DONATION_TABLENAME', 'dydo_onetime_donations' );
}

if ( ! defined( 'DYDO_SUBSCRIPTION_TABLENAME' ) ) {
	define( 'DYDO_SUBSCRIPTION_TABLENAME', 'dydo_subscriptions' );
}

if ( ! defined( 'DYDO_SUBSCRIPTION_DONATION_TABLENAME' ) ) {
	define( 'DYDO_SUBSCRIPTION_DONATION_TABLENAME', 'dydo_subscription_donations' );
}

if ( ! defined( 'DYDO_PAYMENT_GATEWAY_TABLENAME' ) ) {
	define( 'DYDO_PAYMENT_GATEWAY_TABLENAME', 'dydo_gateways' );
}

if ( ! function_exists( 'dydo_save_donation' ) ) {
	function dydo_save_donation( $tablename, array $data ) {
		return DyDo_DB::insert( $tablename, $data );
	}
}

if ( ! function_exists( 'dydo_get_donation' ) ) {
	function dydo_get_donation( $tablename = DYDO_DONATION_TABLENAME, array $where ) {
		if ( $tablename === '' ) {
			$tablename = DYDO_DONATION_TABLENAME;
		}
		return DyDo_DB::get( $tablename, $where );
	}
}

if ( ! function_exists( 'dydo_get_donations' ) ) {
	function dydo_get_donations( array $statements = array(), $select_operation = 'SELECT *', $table = DYDO_DONATION_TABLENAME ) {
		$sql = $select_operation . '  FROM ' . $table;
		if ( $statements ) {
			foreach ( $statements as $statement ) {
				if ( gettype( $statement ) == 'string' ) {
					$sql .= " {$statement} ";
				}

				if ( gettype( $statement ) == 'array' ) {
					foreach ( $statement as $item ) {
						$sql .= " {$item} ";
					}
				}
			}
		}		
		return DyDo_DB::query( $sql );
	}
}

if ( ! function_exists( 'dydo_get_donations_total_by_date_interval' ) ) {
	function dydo_get_donations_total_by_date_interval( string $interval_unit = 'day', string $currency = 'USD', $payment_gateway = 'woocommerce' ) {
		$sql      = 'SELECT SUM(amount) total_per_interval, ';
		$currency = strtoupper( $currency );
		switch ( $interval_unit ) {
			case 'day':
				$sql .= 'date(created_at) label FROM ' . DYDO_DONATION_TABLENAME . " WHERE currency='" . $currency . "' AND payment_gateway='" . $payment_gateway . "' GROUP BY label ASC";
				break;
			case 'week':
				$sql .= " CONCAT( WEEK(created_at), ' ', YEAR(created_at))  label ,  WEEK(created_at) as week,  YEAR(created_at) as year FROM " . DYDO_DONATION_TABLENAME . " WHERE currency='" . $currency . "' AND payment_gateway='" . $payment_gateway . "' GROUP BY label, week, year ORDER BY STR_TO_DATE(week, '%V') ASC, STR_TO_DATE(year, '%X') ASC";
				break;
			case 'month':
				$sql .= "CONCAT(MONTHNAME(created_at),' ', YEAR(created_at)) as label FROM " . DYDO_DONATION_TABLENAME . " WHERE currency='" . $currency . "' AND payment_gateway='" . $payment_gateway . "' GROUP BY label ORDER BY STR_TO_DATE(label, '%M %Y') ASC";
				break;
			case 'year':
				$sql .= 'YEAR(created_at) as label FROM ' . DYDO_DONATION_TABLENAME . " WHERE currency='" . $currency . "' AND payment_gateway='" . $payment_gateway . "' GROUP BY label ORDER BY label ASC";
				break;
			default:
				// code...
				break;
		}
		return DyDo_DB::query( $sql );
	}
}

if ( ! function_exists( 'dydo_update_donation' ) ) {
	function dydo_update_donation( array $data, array $where, $table ) {
		return DyDo_DB::update( $table, $data, $where );
	}
}
