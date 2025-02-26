<?php
/**
 * Class Order_Bulk_Actions Add Status to WC Statuses
 *
 * @version           1.0.0
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @package           AWSA_Shipping
 */

namespace AWSA_Shipping;

/**
 * Class Order_Bulk_Actions Add export to WC Bulk Actions
 */
class Order_Bulk_Actions {

	/**
	 * Init
	 *
	 * @return void
	 */
	public static function init(): void {

		add_filter( 'bulk_actions-edit-shop_order', __CLASS__ . '::dropdown_bulk_actions_shop_order', 30, 1 );

		$order_bulk_actions = array(
			'aw-export-orders-without-parcel-code',
			'aw-export-orders-with-parcel-code',
		);

		foreach ( $order_bulk_actions as $action ) {

			add_action( "admin_action_{$action}", __CLASS__ . '::bulk_actions_process' );
		}
	}

	/**
	 * Add Options to Order Bulk Actions
	 *
	 * @param array $actions
	 *
	 * @return array
	 */
	public static function dropdown_bulk_actions_shop_order( array $actions ): array {

		$new_bulk_actions = array(
			'aw-export-orders-without-parcel-code' => __( 'Export orders without parcel code', 'awsa-shipping' ),
			'aw-export-orders-with-parcel-code'    => __( 'Export orders with parcel code', 'awsa-shipping' ),
		);

		return array_merge( $actions, $new_bulk_actions );
	}

	/**
	 * Process Bulk Actions
	 *
	 * @return void
	 */
	public static function bulk_actions_process(): void {

		$current_action = current_action();
		$action_key     = str_replace( 'admin_action_', '', $current_action );

		$post__in = array();
		if ( isset( $_REQUEST['post'] ) && is_array( $_REQUEST['post'] ) ) {

			$post__in = $_REQUEST['post'];
		}

		$headers = array(
			'order_id'    => 'string',
			'parcel_code' => 'string',
		);
		$rows    = self::get_rows( $post__in, $action_key );
		$url     = awsa_create_excel( $action_key . time(), $headers, $rows );

		wp_redirect( $url );
		exit;
	}

	public static function get_rows( $order_ids = array(), $action_key = 'all' ): ?array {

		global $wpdb;
		$sql = "SELECT `ID` as `order_id`,`meta_value` as `parcel_code` FROM `{$wpdb->posts}` as posts 
    			LEFT JOIN 
    			(SELECT `post_id`,`meta_value` FROM `{$wpdb->postmeta}` WHERE `meta_key` = '_awsa_parcel_code') as parcel_codes
				ON posts.ID = parcel_codes.post_id
    			WHERE `post_type` = 'shop_order'";

		if ( !empty( $order_ids ) ) {

			$ids = "'" . implode( "','", $order_ids ) . "'";
			$sql .= " AND `ID` IN ($ids)";
		}

		switch ( $action_key ) {
			case 'aw-export-orders-without-parcel-code':

				$sql .= " AND (`meta_value` LIKE '' || `meta_value` IS NULL)";
				break;
			case 'aw-export-orders-with-parcel-code':

				$sql .= " AND (`meta_value` NOT LIKE '' && `meta_value` IS NOT NULL)";
				break;
		}

		return $wpdb->get_results( $sql, ARRAY_A );
	}

}
