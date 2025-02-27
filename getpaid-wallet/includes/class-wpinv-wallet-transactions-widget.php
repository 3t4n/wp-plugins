<?php
/**
 * Widget Class.
 *
 * @package GetPaid
 * @subpackage Wallet
 * @version 1.0.0
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Contains the wallet transactions widget.
 *
 * @package GetPaid
 * @subpackage Wallet
 * @version 1.0.0
 * @since   1.0.0
 */
class WPInv_Wallet_Transactions_Widget extends WP_Super_Duper {

	/**
	 * @var array
	 */
	public $transactions;

	/**
	 * @var int
	 */
	public $total;

	/**
	 * Register the widget with WordPress.
	 *
	 */
	public function __construct() {

		$options = array(
			'textdomain'    => 'getpaid-wallet',
			'block-icon'    => 'privacy',
			'block-category'=> 'widgets',
			'block-keywords'=> "['invoicing','wallet', 'getpaid']",
			'class_name'     => __CLASS__,
			'base_id'       => 'wpinv_wallet_transactions',
			'name'          => __( 'GetPaid > Wallet Transactions', 'getpaid-wallet' ),
			'widget_ops'    => array(
				'classname'   => 'wpinv-wallet-transactions bsui',
				'description' => esc_html__( "Displays the current user's downloads.", 'getpaid-wallet' ),
			),
			'arguments'     => array(
				'title'  => array(
					'title'       => __( 'Widget title', 'getpaid-wallet' ),
					'desc'        => __( 'Enter widget title.', 'getpaid-wallet' ),
					'type'        => 'text',
					'desc_tip'    => true,
					'default'     => '',
					'advanced'    => false
				),
			)

		);

		parent::__construct( $options );
	}

	/**
	 * Retrieves the current user's transactions.
	 *
	 */
	public function prepare_transactions() {
		global $wpdb;

		$table              = $wpdb->prefix . 'wpinv_wallet_transactions';
		$paged              = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
		$offset             = ( $paged - 1 ) * 10;
		$user_id            = (int) get_current_user_id();
        $this->transactions = $wpdb->get_results( "SELECT * FROM $table WHERE `user_id`=$user_id ORDER BY `transaction_id` DESC LIMIT $offset,10" );
		$this->total        = $wpdb->get_var( "SELECT COUNT(`transaction_id`) FROM $table WHERE `user_id`=$user_id" );

	}

	/**
	 * The Super block output function.
	 *
	 * @param array $args
	 * @param array $widget_args
	 * @param string $content
	 *
	 * @return mixed|string|bool
	 */
	public function output( $args = array(), $widget_args = array(), $content = '' ) {

		// Ensure that the user is logged in.
		if ( ! is_user_logged_in() ) {

			return aui()->alert(
				array(
					'content' => wp_kses_post( __( 'You need to log-in or create an account to view this section.', 'getpaid-wallet' ) ),
					'type'    => 'error',
				)
			);

		}

		// Retrieve the user's transactions.
		$this->prepare_transactions();

		if ( empty( $this->total ) ) {

			return aui()->alert(
				array(
					'content' => wp_kses_post( __( 'No transactions found.', 'getpaid-wallet' ) ),
					'type'    => 'info',
				)
			);

		}

		// Start the output buffer.
		ob_start();

		do_action( 'wpinv_wallet_transactions_before_notices', $this->transactions );

		// Display errors and notices.
		wpinv_print_errors();

		do_action( 'wpinv_wallet_transactions_before_downloads', $this->transactions );

		// Display the transactions.
		$this->display_transactions();

		// Display the pagination.
		$this->display_pagination();

		do_action( 'wpinv_wallet_transactions_after_downloads', $this->transactions );

		// Return the output.
		return ob_get_clean();

	}

	/**
	 * Displays the current user's transactions.
	 *
	 */
	public function display_transactions() {

		$columns = array(
			'details'  => __( 'Details', 'getpaid-wallet' ),
			'amount'   => __( 'Amount', 'getpaid-wallet' ),
			'balance'  => __( 'Balance', 'getpaid-wallet' ),
			'currency' => __( 'Currency', 'getpaid-wallet' ),
			'date'     => __( 'Date', 'getpaid-wallet' ),
		);

		?>

		<div class="table-responsive">
		<table class="table table-bordered">

			<thead>
				<tr>
					<?php foreach ( $columns as $key => $label ) : ?>
						<th scope="col" class="wpinv-wallet-transactions-table-<?php echo sanitize_html_class( $key ); ?> border-bottom">
							<?php echo esc_html( $label ); ?>
						</th>
					<?php endforeach; ?>
				</tr>
			</thead>

			<?php
				
				if ( empty( $this->transactions ) ) {
					$this->print_table_body_no_transactions( $columns );
				} else {
					$this->print_table_body_transactions( $columns );
				}
				
			?>

			<tfoot>
				<tr>
					<?php foreach ( $columns as $key => $label ) : ?>
						<th class="wpinv-wallet-transactions-table-<?php echo sanitize_html_class( $key ); ?> border-bottom">
							<?php echo esc_html( $label ); ?>
						</th>
					<?php endforeach; ?>
				</tr>
			</tfoot>

		</table>
		</div>
		<?php
				
	}

	/**
	 * Displays the table body if no transactions were found.
	 *
	 * @param string[] $columns
	 */
	public function print_table_body_no_transactions( $columns ) {

		?>
		<tbody>

			<tr>
				<td colspan="<?php echo count( $columns ); ?>">

					<?php
						echo aui()->alert(
							array(
								'content' => wp_kses_post( __( 'No transactions found.', 'getpaid-wallet' ) ),
								'type'    => 'warning',
							)
						);
					?>

				</td>
			</tr>

		</tbody>
		<?php

	}

	/**
	 * Displays the table body if transactions were found.
	 *
	 * @param string[] $columns
	 */
	public function print_table_body_transactions( $columns ) {

		?>
		<tbody>

			<?php foreach ( $this->transactions as $transaction ) : ?>
				<tr class="wpinv-wallet-transactions transaction-<?php echo (int) $transaction->transaction_id; ?> transaction-type-<?php echo sanitize_html_class( $transaction->type ); ?>">
					<?php

						foreach ( array_keys( $columns ) as $column ) {

							echo "<td>";
							switch ( $column ) {

								case 'details':
									$details    = wp_kses_post( $transaction->details );
									echo "<span class='form-text mt-2 mb-2'>$details</span>";
								break;

								case 'amount':
									$amount = wpinv_round_amount( (float) wpinv_wallet_decrypt( $transaction->amount ) );
									echo wp_kses_post( wpinv_price( wpinv_format_amount( $amount ), $transaction->currency ) );
								break;

								case 'balance':
									$balance = wpinv_round_amount( (float) wpinv_wallet_decrypt( $transaction->balance ) );
									echo wp_kses_post( wpinv_price( wpinv_format_amount( $balance ), $transaction->currency ) );
								break;

								case 'currency':
									echo esc_html__( $transaction->currency );
								break;

								case 'date':
									$date = strtotime( $transaction->date );
									$diff = current_time( 'timestamp' ) - $date;

									if ( $date && $diff > 0 && $diff < DAY_IN_SECONDS ) {
										/* translators: %s: Human-readable time difference. */
										echo sprintf( esc_html__( '%s ago', 'getpaid-wallet' ), human_time_diff( $date, current_time( 'timestamp' ) ) );
									} else {
										echo date_i18n( get_option( 'date_format' ) . ' ' .  get_option( 'time_format' ), $date );
									}
								break;
							}
							echo "</td>";

						}

					?>
				</tr>
			<?php endforeach; ?>

		</tbody>
		<?php
	}

	/**
	 * Displays the pagination.
	 *
	 */
	public function display_pagination() {

		$pages = (int) ceil( $this->total / 10 );

		// Abort if we do not have pages.
		if ( 2 > $pages ) {
			return;
		}

		?>

		<div class="wpinv-wallet-transactions-pagination">
			<?php
				$big = 999999;

				echo getpaid_paginate_links(
					array(
						'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format'  => '?paged=%#%',
						'total'   => $pages,
					)
				);
			?>
		</div>

		<?php
	}

}
