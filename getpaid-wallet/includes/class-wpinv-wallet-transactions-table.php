<?php

/**
 * Displays a list of all transactions.
 */

if ( ! class_exists( 'WP_List_Table' ) ) {
	include_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

/**
 * Transactions table class.
 */
class WPInv_Wallet_Transactions_Table extends WP_List_Table {

	/**
	 * URL of this page
	 *
	 * @var   string
	 * @since 1.0.0
	 */
	public $base_url;

	/**
	 * Transactions to display on this page.
	 *
	 * @var   array
	 * @since 1.0.0
	 */
	public $items;

	/**
	 * Total transactions
	 *
	 * @var   string
	 * @since 1.0.0
	 */
	public $total;

	/**
	 *  Constructor function.
	 *
	 */
	public function __construct() {

		parent::__construct(
			array(
				'singular' => 'id',
				'plural'   => 'ids',
			)
		);

		$this->base_url = admin_url( 'admin.php?page=wpinv-wallet-transactions' );

		$this->process_bulk_action();
	}

	/**
	 *  Processes a bulk action
	 */
	public function process_bulk_action() {
		global $wpdb;

		$action = 'bulk-' . $this->_args['plural'];

		if ( empty( $_POST['id'] ) || empty( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'], $action ) ) {
			return;
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$action = $this->current_action();

		if ( 'delete' == $action && ! empty( $_POST['id'] ) ) {

			$transactions = wp_parse_id_list( $_POST['id'] );
			$transactions = implode( ', ', $transactions );
			$table        = $wpdb->prefix . 'wpinv_wallet_transactions';
			$wpdb->query( "DELETE FROM `$table` WHERE `transaction_id` IN ( $transactions )" );

		}

	}

	/**
	 *  Prepares the display query
	 */
	public function prepare_query() {
		global $wpdb;

		$table       = $wpdb->prefix . 'wpinv_wallet_transactions';
		$paged       = empty( $_GET['paged'] ) ? 1 : (int) $_GET['paged'];
		$offset      = ( $paged - 1 ) * 10;
        $this->items = $wpdb->get_results( "SELECT * FROM $table ORDER BY transaction_id DESC LIMIT $offset,10" );
		$this->total = $wpdb->get_var( "SELECT COUNT(`transaction_id`) FROM $table" );

	}

	/**
	 * Default columns.
	 *
	 * @param object $item        item.
	 * @param string $column_name column name.
	 */
	public function column_default( $item, $column_name ) {

		/**
		 * Runs when displaying an transactions' table column.
		 *
		 * @param array $item The current transaction.
		 */
		do_action( "wpinv_wallet_transactions_display_table_$column_name", $item );

	}

	/**
	 * Displays the amount.
	 *
	 * @param  stdClass $item item.
	 * @return HTML
	 */
	public function column_amount( $item ) {
		$amount = wpinv_round_amount( (float) wpinv_wallet_decrypt( $item->amount ) );

		echo wp_kses_post( wpinv_price( wpinv_format_amount( $amount ), $item->currency ) );
	}

	/**
	 * Displays the balance after transaction.
	 *
	 * @param  stdClass $item item.
	 * @return HTML
	 */
	public function column_balance( $item ) {
		$balance = wpinv_round_amount( (float) wpinv_wallet_decrypt( $item->balance ) );
		echo wp_kses_post( wpinv_price( wpinv_format_amount( $balance ), $item->currency ) );
	}

	/**
	 * Displays the transaction's date
	 *
	 * @param  stdClass $item item.
	 * @return HTML
	 */
	public function column_date( $item ) {

		$date = strtotime( $item->date );
		$diff = current_time( 'timestamp' ) - $date;

		if ( $date && $diff > 0 && $diff < DAY_IN_SECONDS ) {
			/* translators: %s: Human-readable time difference. */
			return sprintf( esc_html__( '%s ago', 'getpaid-wallet' ), human_time_diff( $date, current_time( 'timestamp' ) ) );
		} else {
			return date_i18n( get_option( 'date_format' ) . ' ' .  get_option( 'time_format' ), $date );
		}

	}

	/**
	 * Displays the transaction details
	 *
	 * @param  stdClass $item item.
	 * @return HTML
	 */
	public function column_details( $item ) {
		echo esc_html( $item->details );
	}

	/**
	 * Displays the transaction currency
	 *
	 * @param  stdClass $item item.
	 * @return HTML
	 */
	public function column_currency( $item ) {
		echo esc_html( $item->currency );
	}

	/**
	 * Displays the transactor's name
	 *
	 * @param  stdClass $item item.
	 * @return HTML
	 */
	public function column_name( $item ) {

		$username = __( '(Missing User)', 'getpaid-wallet' );

		$user = get_userdata( $item->user_id );
		if ( $user ) {

			$username = sprintf(
				'<a href="user-edit.php?user_id=%s">%s</a>',
				absint( $user->ID ),
				! empty( $user->display_name ) ? esc_html( $user->display_name ) : sanitize_email( $user->user_email )
			);

		}

		// translators: $1: is transaction id number, $2: is user's name
		$column_content = sprintf(
			_x( '#%1$s for %2$s', 'Transaction title on admin table. (e.g.: #211 for John Doe)', 'getpaid-wallet' ),
			absint( $item->transaction_id ),
			wp_kses_post( $username )
		);

		$details        = '';
		if ( ! empty( $item->details ) ) {
			$details    = wp_kses_post( $item->details );
			$details    = "<span class='text-muted form-text mt-2 mb-2'>$details</span>";
		}

		return "<strong>$column_content</strong>&nbsp;&mdash;&nbsp;" . $details;

	}

	/**
	 * This is how checkbox column renders.
	 *
	 * @param  stdClass $item item.
	 * @return HTML
	 */
	function column_cb( $item ) {
		return sprintf( '<input type="checkbox" name="id[]" value="%s" />', esc_html( $item->transaction_id ) );
	}

	/**
	 * [OPTIONAL] Return array of bulk actions if has any
	 *
	 * @return array
	 */
	function get_bulk_actions() {

		$actions = array(
			'delete'     => __( 'Delete', 'getpaid-wallet' ),
		);

		/**
		 * Filters the bulk table actions shown on transaction tables.
		 *
		 * @param array $actions An array of bulk actions.
		 */
		return apply_filters( 'manage_wpinv_wallet_transactions_bulk_actions', $actions );

	}

	/**
	 * Whether the table has items to display or not
	 *
	 * @return bool
	 */
	public function has_items() {
		return ! empty( $this->total );
	}

	/**
	 * Fetch data from the database to render on view.
	 */
	function prepare_items() {

		$this->prepare_query();

		$per_page = 10;

		$columns  = $this->get_columns();
		$hidden   = array();
		$sortable = $this->get_sortable_columns();

		$this->_column_headers = array( $columns, $hidden, $sortable );

		$this->set_pagination_args(
			array(
				'total_items' => $this->total,
				'per_page'    => $per_page,
				'total_pages' => ceil( $this->total / $per_page ),
			)
		);

	}

	/**
	 * Table columns.
	 *
	 * @return array
	 */
	function get_columns() {

		$columns = array(
			'cb'       => '<input type="checkbox" />',
			'name'     => __( 'Transaction', 'getpaid-wallet' ),
			'amount'   => __( 'Amount', 'getpaid-wallet' ),
			'balance'  => __( 'Balance', 'getpaid-wallet' ),
			'currency' => __( 'Currency', 'getpaid-wallet' ),
			'date'     => __( 'Date', 'getpaid-wallet' ),
		);

		/**
		 * Filters the columns shown in the transactions table.
		 *
		 * @param array $columns transactions table columns.
		 */
		return apply_filters( 'manage_wpinv_wallet_transactions_table_columns', $columns );
	}

	/**
	 * Table sortable columns.
	 *
	 * @return array
	 */
	public function get_sortable_columns() {
		return array();
	}

}
