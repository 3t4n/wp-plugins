<?php

namespace AffiAffiliate\Inc;


defined( 'ABSPATH' ) || exit;

use AffiAffiliate\Admin\AFPayout;
use WP_List_Table;
use AffiAffiliate\AffiEnv;
use AffiAffiliate\Inc\Data;
use AffiAffiliate\Inc\AFFunctions;

//
//if ( ! class_exists( 'WP_List_Table' ) ) {
//	require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
//}

class ClassPayout extends WP_List_Table {
	protected static $instance = null;
	protected static $format_date, $woo_payments;
	private $data = array();

	/**
	 * Get instance class
	 *
	 * @param bool $new Is new instance
	 *
	 * @return ClassPayout|null
	 */
	public static function get_instance( $new = false ) {
		if ( $new || null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Get format date
	 */
	public static function get_format_date() {
		if ( self::$format_date ) {
			return self::$format_date;
		}

		return self::$format_date = get_option( 'date_format' ) . ' ' . get_option( 'time_format' );
	}

	function get_columns() {
		$columns = array(
			'cb'           => '<input type="checkbox" />',
			'user'         => esc_html__( 'Affiliate user', 'affi-affiliate-marketing-for-woo' ),
			'amount'       => esc_html__( 'Withdrawal amount', 'affi-affiliate-marketing-for-woo' ),
			'fee'          => esc_html__( 'Processing fee', 'affi-affiliate-marketing-for-woo' ),
			'payment'      => esc_html__( 'Transfer Channel', 'affi-affiliate-marketing-for-woo' ),
			'status'       => esc_html__( 'Status', 'affi-affiliate-marketing-for-woo' ),
			'type'         => esc_html__( 'Type', 'affi-affiliate-marketing-for-woo' ),
			'description'  => esc_html__( 'Description', 'affi-affiliate-marketing-for-woo' ),
			'date_created' => esc_html__( 'Time', 'affi-affiliate-marketing-for-woo' ),
		);

		return $columns;
	}

	/**
	 * Column combobox.
	 */
	public function column_cb( $item ) {
		return sprintf( '<input type="checkbox" name="id[]" value="%s" />', $item['id'] ?? 0 );
	}

	/**
	 * Diplay table column
	 *
	 * @param array|object $item Item in table data
	 * @param string $column_name
	 *
	 * @return string|void
	 */
	public function column_default( $item, $column_name ) {
		switch ( $column_name ) {
			case 'date_created':
				$str_time = gmdate( 'Y-m-d H:i:s', $item['date_created'] );

				return esc_html( $str_time );
				break;
			case 'payment':

				return esc_html( $item['payment'] );
				break;
			case 'user':

				return sprintf( '<span class="affi-aff-user-table">%s</span><div class="row-actions affi-row-actions"><span class="edit">
						<a class="submitedit" href="admin.php?page=affi-request-payout&amp;action=edit&amp;id=%s">%s</a></span><span class="delete">
						<a class="submitdelete" href="admin.php?page=affi-request-payout&amp;action=remove&amp;id=%s">%s</a></span></div>',
					esc_html( $item['user_nicename'] . ' (' . $item['user_email'] . ')' ),
					esc_attr( $item['id'] ), esc_html__( 'Edit', 'affi-affiliate-marketing-for-woo' ),
					esc_attr( $item['id'] ), esc_html__( 'Delete', 'affi-affiliate-marketing-for-woo' ) );
				break;
			case 'amount':
				$data_earning = wc_price( (float) $item['amount'] );

				return wp_kses_post( $data_earning );
				break;
			case 'fee':
				$data_balance = wc_price( (float) $item['fee'] );

				return wp_kses_post( $data_balance );
				break;
			case 'status':
				switch ( $item['status'] ) {
					case 'approved':
						$data_status = '<div class="affi-approved-status-label">' . esc_html__( 'Approved', 'affi-affiliate-marketing-for-woo'  ) . '</div>';
						break;
					default:
						$data_status = '<div class="affi-pending-status-label">' . esc_html__( 'Pending', 'affi-affiliate-marketing-for-woo'  ) . '</div>';
				}

				return wp_kses_post( $data_status );
				break;
			case 'type':
				switch ( $item['type'] ) {
					case 'admin':
						$data_status = '<div class="affi-admin-type-label">' . esc_html__( 'Admin', 'affi-affiliate-marketing-for-woo'  ) . '</div>';
						break;
					default:
						$data_status = '<div class="affi-affiliate-type-label">' . esc_html__( 'Affiliate' , 'affi-affiliate-marketing-for-woo' ) . '</div>';
				}

				return wp_kses_post( $data_status );
				break;
			case 'description':
				$data_description = $item['description'];

				return wp_kses_post( $data_description );
				break;
			default:
		}

		return '';
	}

	/**
	 * Get bulk actions.
	 *
	 * @return array
	 */
	public function get_bulk_actions() {
		return array(
			'delete' => esc_html__( 'Delete', 'affi-affiliate-marketing-for-woo' ),
		);
	}

	/**
	 * Display tablenav for search
	 */
	public function display_tablenav( $which ) {
//		if ( 'top' === $which ) {
//			printf( '<div class="alignright actions">' );
//			$this->search_box( esc_html__( 'Search By User', 'affi-affiliate-marketing-for-woo' ), 'affi-conversation-search' );
//			printf( '</div>' );
//		}
		printf( '<div class="tablenav %s">', esc_attr( $which ) );
		wp_nonce_field( '_affi_payout_action', '_affi_payout_action' );
		if ( $this->has_items() ) {
			printf( '<div class="alignleft actions bulkactions">' );
			$this->bulk_actions( $which );
			printf( '</div>' );
		}
//		$this->extra_tablenav( $which );
		$this->pagination( $which );
		printf( '<br class="clear" /></div>' );
	}

	public function get_sortable_columns() {
		$sortable_columns = array(
			'user'         => array( 'user', true ),
			'amount'       => array( 'amount', true ),
			'status'       => array( 'status', true ),
			'type'         => array( 'type', true ),
			'date_created' => array( 'date_created', true ),
		);

		return $sortable_columns;
	}

	/**
	 * Query and prepare data for table
	 */
	public function prepare_items() {
		$per_page     = $this->get_items_per_page( 'affi_payout_per_page', 20 );
		$current_page = $this->get_pagenum();
		$action       = $this->current_action();
		$where        = array();

		if ( $action && ( 'delete' === $action ) ) {
			if ( ! current_user_can( 'manage_options' ) ) {
				wp_die( esc_html__( 'You do not have permission to delete conversations', 'affi-affiliate-marketing-for-woo' ) );
			}
			$affiliates_id = isset( $_REQUEST['id'] ) ? array_map( 'absint', (array) villatheme_sanitize_fields( wp_unslash( $_REQUEST['id'] ) ) ) : array();// phpcs:ignore WordPress.Security.ValidatedSanitizedInput, WordPress.Security.NonceVerification.Recommended
			if ( $affiliates_id ) {
				foreach ( $affiliates_id as $affiliate_id ) {
					AFPayout::delete_affiliate( $affiliate_id );
				}
			}
		}
		$args           = [
			'where'  => $where,
			'limit'  => $per_page,
			'offset' => ( $current_page - 1 ) * $per_page
		];
		$get_payout_data = AFPayout::get_payouts( $args ) ?? array();

		usort( $get_payout_data, array( $this, 'usort_reorder' ) );

		$this->items = $get_payout_data;
		if ( ! empty( $this->items ) ) {
			$total_items = QueryDB::instance()->get_payouts_count();
			$this->set_pagination_args( array(
				'total_items' => $total_items,
				'per_page'    => $per_page,
				'total_pages' => ceil( $total_items / $per_page )
			) );
		}
		$columns               = $this->get_columns();
		$hidden                = array();
		$sortable              = $this->get_sortable_columns();
		$this->_column_headers = array( $columns, $hidden, $sortable );
	}

	public function usort_reorder( $a, $b ) {
		$orderby = ( ! empty( $_REQUEST['orderby'] ) ) ? sanitize_text_field( wp_unslash( $_REQUEST['orderby'] ) ) : 'id';// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$order   = ( ! empty( $_REQUEST['order'] ) ) ? sanitize_text_field( wp_unslash( $_REQUEST['order'] ) ) : 'asc';// phpcs:ignore WordPress.Security.NonceVerification.Recommended

		switch ( $orderby ) {
			case 'user':
				$result = strnatcmp( $a['user_nicename'], $b['user_nicename'] );
				break;
			case 'amount':
			case 'date_created':
				$result = floatval( $a[ $orderby ] ) > floatval( $b[ $orderby ] ) ? 1 : - 1;
				break;
			default:
				$result = strnatcmp( $a[ $orderby ], $b[ $orderby ] );
		}

		return ( $order === 'desc' ) ? $result : - $result;
	}
}