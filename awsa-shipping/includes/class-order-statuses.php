<?php
/**
 * Class AWSA_Order_Statuses Add Status to WC Statuses
 *
 * @version           1.0.0
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @package           AWSA_Shipping
 */

namespace AWSA_Shipping;

/**
 * Class AWSA_Order_Statuses Add Status to WC Statuses
 */
class Order_Statuses {

	/**
	 * Init
	 *
	 * @return void
	 */
	public static function init(): void {

		add_action( 'init', __CLASS__ . '::register_post_statuses', 10, 1 );
		add_filter( 'wc_order_statuses', __CLASS__ . '::add_order_statuses', 20, 1 );
		add_filter( 'bulk_actions-edit-shop_order', __CLASS__ . '::dropdown_bulk_actions_shop_order', 30, 1 );

		$order_statuses = array(
			'aw-d-warehouse',
			'aw-ready-to-send',
			'aw-sended',

		);

		foreach ( $order_statuses as $order_status ) {

			add_action( "admin_action_mark_{$order_status}", __CLASS__ . '::bulk_process_status' );
		}
	}

	/**
	 * Get Enabled Order Statuses from Settings
	 *
	 * @return array
	 */
	public static function get_enabled_post_statuses(): array {

		$settings         = awsa_shipping_get_settings();
		$enabled_statuses = isset( $settings['add-order-statuses'] ) && is_array( $settings['add-order-statuses'] ) ? $settings['add-order-statuses'] : array();

		return $enabled_statuses;
	}

	/**
	 * Register Post Statuses
	 *
	 * @return void
	 */
	public static function register_post_statuses(): void {

		$enabled_statuses = self::get_enabled_post_statuses();

		if ( in_array( 'wc-aw-d-warehouse', $enabled_statuses, true ) ) {

			register_post_status(
				'wc-aw-d-warehouse',
				array(
					'label'                     => __( 'Delivered to warehouse', 'awsa-shipping' ),
					'public'                    => true,
					'exclude_from_search'       => false,
					'show_in_admin_all_list'    => true,
					'show_in_admin_status_list' => true,
					'label_count'               => _n_noop(
						'Delivered to warehouse <span class="count">(%s)</span>',
						'Delivered to warehouse <span class="count">(%s)</span>',
						'awsa-shipping'
					),
				)
			);
		}

		if ( in_array( 'wc-aw-ready-to-send', $enabled_statuses, true ) ) {

			register_post_status(
				'wc-aw-ready-to-send',
				array(
					'label'                     => __( 'Ready to send', 'awsa-shipping' ),
					'public'                    => true,
					'exclude_from_search'       => false,
					'show_in_admin_all_list'    => true,
					'show_in_admin_status_list' => true,
					'label_count'               => _n_noop(
						'Ready to send <span class="count">(%s)</span>',
						'Ready to send <span class="count">(%s)</span>',
						'awsa-shipping'
					),
				)
			);
		}

		if ( in_array( 'wc-aw-sended', $enabled_statuses, true ) ) {

			register_post_status(
				'wc-aw-sended',
				array(
					'label'                     => __( 'Delivered to post', 'awsa-shipping' ),
					'public'                    => true,
					'exclude_from_search'       => false,
					'show_in_admin_all_list'    => true,
					'show_in_admin_status_list' => true,
					'label_count'               => _n_noop(
						'Delivered to post <span class="count">(%s)</span>',
						'Delivered to post <span class="count">(%s)</span>',
						'awsa-shipping'
					),
				)
			);
		}
	}

	/**
	 * Add Order Statuses to WC Statuses
	 *
	 * @param array $order_statuses
	 *
	 * @return array
	 */
	public static function add_order_statuses( array $order_statuses ): array {

		$enabled_statuses   = self::get_enabled_post_statuses();
		$new_order_statuses = array();

		foreach ( $order_statuses as $k => $order_status ) {

			$new_order_statuses[ $k ] = $order_status;
			if ( 'wc-on-hold' === $k ) {

				if ( in_array( 'wc-aw-d-warehouse', $enabled_statuses, true ) ) {

					$new_order_statuses['wc-aw-d-warehouse'] = __( 'Delivered to warehouse', 'awsa-shipping' );
				}
			} elseif ( 'wc-completed' === $k ) {

				if ( in_array( 'wc-aw-ready-to-send', $enabled_statuses, true ) ) {

					$new_order_statuses['wc-aw-ready-to-send'] = __( 'Ready to send', 'awsa-shipping' );
				}

				if ( in_array( 'wc-aw-sended', $enabled_statuses, true ) ) {

					$new_order_statuses['wc-aw-sended'] = __( 'Sended', 'awsa-shipping' );
				}
			}
		}

		return $new_order_statuses;
	}

	/**
	 * Add Options to Order Bulk Actions
	 *
	 * @param array $actions
	 *
	 * @return array
	 */
	public static function dropdown_bulk_actions_shop_order( array $actions ): array {

		$enabled_statuses = self::get_enabled_post_statuses();
		$new_actions      = array();

		foreach ( $actions as $k => $action ) {

			$new_actions[ $k ] = $action;
			if ( 'mark_on-hold' === $k ) {

				if ( in_array( 'wc-aw-d-warehouse', $enabled_statuses, true ) ) {

					$new_actions['mark_aw-d-warehouse'] = __( 'Change status to delivered to warehouse', 'awsa-shipping' );
				}
			} elseif ( 'mark_completed' === $k ) {

				if ( in_array( 'wc-aw-ready-to-send', $enabled_statuses, true ) ) {

					$new_actions['mark_aw-ready-to-send'] = __( 'Change status to ready to send', 'awsa-shipping' );
				}

				if ( in_array( 'wc-aw-sended', $enabled_statuses, true ) ) {

					$new_actions['mark_aw-sended'] = __( 'Change status to posted', 'awsa-shipping' );
				}
			}
		}

		return $new_actions;
	}

	/**
	 * Process Bulk Actions
	 *
	 * @return void
	 */
	public static function bulk_process_status(): void {

		$current_action = current_action();

		$status_key = str_replace( 'admin_action_mark_', '', $current_action );

		if ( !isset( $_REQUEST['post'] ) && !is_array( $_REQUEST['post'] ) ) {
			return;
		}

		$q_args = array(
			'post__in' => ( isset( $_REQUEST['post'] ) && absint( $_REQUEST['post'] ) ) ? absint(
				$_REQUEST['post']
			) : '',
		);
		$orders = wc_get_orders( $q_args );
		foreach ( $orders as $order ) {
			$order_note = 'That\'s what happened by bulk edit:';
			$order->update_status( $status_key, $order_note, true );
		}

		$location = add_query_arg(
			array(
				'post_type'   => 'shop_order',
				$status_key   => 1,
				'post_status' => 'all',
			),
			'edit.php'
		);

		wp_redirect( admin_url( $location ) );
		exit;
	}

}
