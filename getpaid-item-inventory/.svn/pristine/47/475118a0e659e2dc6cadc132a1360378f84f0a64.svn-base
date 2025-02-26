<?php
/**
 * Main cron Class.
 *
 * @package GetPaid
 * @subpackage Item Inventory
 * @version 1.0.0
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Main cron class.
 *
 * @package GetPaid
 * @subpackage Item Inventory
 * @version 1.0.0
 * @since   1.0.0
 */
class GetPaid_Item_Inventory_CRON {

	/**
	 * Class constructor.
	 *
	 */
	public function __construct() {

		// Maybe schedule the cron.
		add_action( 'getpaid_init', array( $this, 'maybe_schedule' ) );

		// And update it whenever the schedule changes.
		add_filter( 'wpinv_settings_sanitize_hold_stock_minutes', array( $this, 'maybe_reschedule' ) );

		// Cancel unpaid invoices to release stock.
		add_action( 'getpaid_item_inventory_cancel_invoices_cron', array( $this, 'cancel_invoices' ) );
	}

	/**
	 * Schedules the CRON if not yet scheduled.
	 *
	 */
	public function maybe_schedule() {

		if ( get_option( 'getpaid_item_inventory_scheduled_cron' ) != 1 ) {

			$this->schedule( $this->get_held_duration() );
			update_option( 'getpaid_item_inventory_scheduled_cron', 1 );

		}

	}

	/**
	 * Schedules the CRON.
	 *
	 * @param int|string $held_duration
	 */
	public function schedule( $held_duration ) {
		wp_clear_scheduled_hook( 'getpaid_item_inventory_cancel_invoices_cron' );

		if ( ! empty( $held_duration ) ) {
			wp_schedule_single_event( current_time( 'timestamp', 1 ) + ( absint( $held_duration ) * 60 ), 'getpaid_item_inventory_cancel_invoices_cron' );
		}

	}

	/**
	 * Retrieves the duration in minutes to hold stock.
	 *
	 * @return int
	 */
	public function get_held_duration() {

		if ( ! GetPaid_Item_Inventory::is_enabled() ) {
			return 0;
		}

		return (int) wpinv_get_option( 'hold_stock_minutes', 24 * MINUTE_IN_SECONDS );
	}

	/**
	 * Re-schedules the CRON if options change.
	 *
	 * @param int|string $held_duration
	 */
	public function maybe_reschedule( $held_duration ) {

		$this->schedule( $held_duration );
		return empty( $held_duration ) ? '' : absint( $held_duration );

	}

	/**
	 * Cancel all unpaid invoices after held duration to prevent stock lock for those items.
	 *
	 */
	public function cancel_invoices() {
		$held_duration = $this->get_held_duration();

		if ( empty( $held_duration ) ||  ! GetPaid_Item_Inventory::is_enabled()  ) {
			return;
		}

		$held_duration = absint( $held_duration );
		$invoices      = new WP_Query(
			apply_filters(
				'getpaid_item_inventory_cancellable_invoices_query',
				array(
					'date_query' => array(
						'before'        => "-$held_duration minutes",
					),
					'post_status'   => 'wpi-pending',
					'post_type'     => 'wpi_invoice',
					'fields'        => 'ids',
					'no_found_rows' => false,
				),
				$held_duration,
				$this
			)
		);

		$this->schedule( $held_duration );

		foreach ( $invoices->posts as $invoice ) {
			$invoice = new WPInv_Invoice( $invoice );

			if ( apply_filters( 'getpaid_item_inventory_cancel_unpaid_invoice', 'payment_form' === $invoice->get_created_via(), $invoice ) ) {
				$invoice->update_status( 'wpi-cancelled', esc_html__( 'Unpaid invoice cancelled - time limit reached.', 'getpaid-item-inventory' ) );
			}

		}

	}

}
