<?php
namespace AffiAffiliate\Inc;


defined( 'ABSPATH' ) || exit;

use AffiAffiliate\Admin\AFRanks;
use WP_List_Table;
use AffiAffiliate\AffiEnv;
use AffiAffiliate\Inc\Data;
use AffiAffiliate\Inc\AFFunctions;

if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

class ClassRank extends WP_List_Table {
	protected static $instance = null;
	protected static $format_date, $woo_payments;
	private $data = array();

	/**
	 * Get instance class
	 * @param bool $new Is new instance
	 *
	 * @return ClassRank|null
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

	/**
	 * Get conversation table column
	 */
	function get_columns() {
		$columns = array(
			'cb'     => '<input type="checkbox" />',
			'name'   => esc_html__( 'Name', 'affi-affiliate-marketing-for-woo' ),
			'order'  => esc_html__( 'Rank order', 'affi-affiliate-marketing-for-woo' ),
			'amount' => esc_html__( 'Amount to reach', 'affi-affiliate-marketing-for-woo' ),
			'badge'   => esc_html__( 'Rank Badge', 'affi-affiliate-marketing-for-woo' ),
		);

		return $columns;
	}

	/**
	 * Column combobox.
	 */
	public function column_cb( $item ) {
		return sprintf( '<input type="checkbox" name="id[]" value="%s" />', $item['id'] ? $item['id'] : 0 );
	}

	/**
	 * Diplay table column
	 * @param array|object $item Item in table data
	 * @param string $column_name
	 *
	 * @return string|void
	 */
	public function column_default( $item, $column_name ) {
		switch ( $column_name ) {
			case 'name':

				return sprintf( '<span class="affi-rank-name-table">%s</span><div class="row-actions affi-row-actions"><span class="edit">
						<a class="submitedit" href="admin.php?page=affi-rank-setting&amp;action=edit&amp;id=%s">%s</a></span><span class="delete"> | 
						<a class="submitdelete" href="admin.php?page=affi-rank-setting&amp;action=remove&amp;id=%s">%s</a></span></div>',
					esc_html( $item['name'] ), esc_html( $item['id'] ), esc_html__( 'Edit', 'affi-affiliate-marketing-for-woo' ),
					esc_html( $item['id'] ), esc_html__( 'Delete', 'affi-affiliate-marketing-for-woo' ) );
				break;
			case 'order':

				return esc_html( $item['order'] );
				break;
			case 'amount':
				$data_amount = $item['achievement'];
				//format field

				return esc_html( $data_amount );
				break;
			case 'badge':
				$badge_src = '';
				if ( $item['badge'] ) {
					$badge_src = wp_get_attachment_image_url( $item['badge'], 'thumbnail', true );
				}

				return $badge_src ? sprintf('<div class="affi-rank-badge-table"><img alt="Badge" src="%s"/></div>', $badge_src) : '';// phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
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
//			'enable'   => esc_html__( 'Enable', 'affi-affiliate-marketing-for-woo' ),
//			'disable'   => esc_html__( 'Disable', 'affi-affiliate-marketing-for-woo' ),
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
		wp_nonce_field( '_affi_rank_action', '_affi_rank_action' );
		if ( $this->has_items() ) {
			printf( '<div class="alignleft actions bulkactions">' );
			$this->bulk_actions( $which );
			printf( '</div>' );
		}
//		$this->extra_tablenav( $which );
//		$this->pagination( $which );
		printf( '<br class="clear" /></div>' );
	}

	/**
	 * Query and prepare data for table
	 */
	public function prepare_items() {
		$per_page     = $this->get_items_per_page( 'affi_ranks_per_page', 99 );
		$current_page = $this->get_pagenum();
		$action       = $this->current_action();
		$where        = array();

		if ( $action && ( 'delete' === $action ) ) {
			if ( ! current_user_can( 'manage_options' ) ) {
				wp_die( esc_html__( 'You do not have permission to delete conversations', 'affi-affiliate-marketing-for-woo' ) );
			}
			$ranks_id = isset( $_REQUEST['id'] ) ? array_map( 'absint', (array) villatheme_sanitize_fields( wp_unslash( $_REQUEST['id'] ) ) ) : array();// phpcs:ignore WordPress.Security.ValidatedSanitizedInput, WordPress.Security.NonceVerification.Recommended
			if ( $ranks_id ) {
				foreach ( $ranks_id as $rank_id ) {
					AFRanks::delete_rank( $rank_id );
				}
			}
		}
		$args              = [
			'where'  => $where,
			'limit'  => $per_page,
			'offset' => ( $current_page - 1 ) * $per_page
		];
		$get_ranks = AFRanks::get_ranks( $args ) ?? array();
		$this->items       = $get_ranks;
//		if ( ! empty( $this->items ) ) {
//			$total_items = count($get_ranks);
//			$this->set_pagination_args( array(
//				'total_items' => $total_items,
//				'per_page'    => $per_page,
//				'total_pages' => ceil( $total_items / $per_page )
//			) );
//		}
		$columns = $this->get_columns();
		$hidden                = array();
		$sortable              = array();
		$this->_column_headers = array( $columns, $hidden, $sortable );
	}
}