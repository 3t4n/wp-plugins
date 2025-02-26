<?php
/**
 * Main plugin Class.
 *
 * @package GetPaid
 * @subpackage Item Inventory
 * @version 1.0.0
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Main plugin class.
 *
 * @package GetPaid
 * @subpackage Item Inventory
 * @version 1.0.0
 * @since   1.0.0
 */
class GetPaid_Item_Inventory {

	/**
	 * Admin Manager.
	 *
	 * @var GetPaid_Item_Inventory_Admin
	 */
	public $admin;

	/**
	 * Cron Manager.
	 *
	 * @var GetPaid_Item_Inventory_CRON
	 */
	public $cron;

	/**
	 * Inventory Manager.
	 *
	 * @var GetPaid_Item_Inventory_Helper
	 */
	public $inventory;

	/**
	 * Notifications Manager.
	 *
	 * @var GetPaid_Item_Inventory_Emails
	 */
	public $emails;

	/**
	 * Class constructor.
	 *
	 */
	public function __construct() {

		// Init class variables.
		$this->admin     = new GetPaid_Item_Inventory_Admin();
		$this->cron      = new GetPaid_Item_Inventory_CRON();
		$this->inventory = new GetPaid_Item_Inventory_Helper();
		$this->emails    = new GetPaid_Item_Inventory_Emails();

		// Maybe update the database.
		add_action( 'getpaid_init', array( $this, 'maybe_install' ) );

		// Order bumps.
		add_action( 'getpaid_order_bumps_after_item_name', array( $this, 'display_stock_status' ) );
		add_filter( 'getpaid_disable_order_bump', array( $this, 'maybe_disable_order_bump' ), 10, 2 );

		// Buy buttons.
		add_filter( 'getpaid_buy_item_button_widget', array( $this, 'maybe_disable_buy_button' ), 10, 2 );

		// Payment forms.
		add_action( 'getpaid_submissions_process_items', array( $this, 'process_submission' ) );
		add_action( 'getpaid_payment_form_cart_item_description', array( $this, 'display_stock_status' ) );
		add_action( 'getpaid_payment_form_cart_item_name', array( $this, 'display_stock_status_deprecated' ) );

		// Hold stock.
		add_action( 'getpaid_checkout_before_gateway',        array( $this, 'reserve_stock' ), 11, 2 );

		// Release stock.
		add_action( 'getpaid_checkout_invoice_exception',     array( $this, 'release_stock' ), 11 );
		add_action( 'getpaid_invoice_status_wpi-cancelled',   array( $this, 'release_stock' ), 11 );
		add_action( 'getpaid_invoice_status_publish',         array( $this, 'release_stock' ), 11 );
		add_action( 'getpaid_invoice_status_wpi-processing',  array( $this, 'release_stock' ), 11 );
		add_action( 'getpaid_invoice_status_wpi-renewal',     array( $this, 'release_stock' ), 11 );
		add_action( 'getpaid_invoice_status_wpi-onhold',      array( $this, 'release_stock' ), 11 );
		add_action( 'getpaid_invoice_status_wpi-failed',      array( $this, 'release_stock' ), 11 );

		// Increase stocks.
		add_action( 'getpaid_invoice_status_wpi-cancelled', array( $this, 'increase_stock' ) );
		add_action( 'getpaid_invoice_status_wpi-failed',    array( $this, 'increase_stock' ) );
		add_action( 'getpaid_invoice_status_wpi-pending',   array( $this, 'increase_stock' ) );
		add_action( 'getpaid_invoice_status_wpi-refunded',   array( $this, 'increase_stock' ) );

		// Reduce stocks.
		add_action( 'getpaid_invoice_status_publish',        array( $this, 'reduce_stock' ) );
		add_action( 'getpaid_invoice_status_wpi-renewal',    array( $this, 'reduce_stock' ) );
		add_action( 'getpaid_invoice_status_wpi-processing', array( $this, 'reduce_stock' ) );
		add_action( 'getpaid_invoice_status_wpi-onhold',     array( $this, 'reduce_stock' ) );

	}

	/**
	 * Checks whether or not stock management is enabled.
	 *
	 * @return bool
	 */
	public static function is_enabled() {
		$enabled = wpinv_get_option( 'manage_stock', 1 );
		return ! empty( $enabled );
	}

	/**
	 * Returns the not enough stock text.
	 *
	 * @param GetPaid_Form_Item $item
	 * @param int $available_stock
	 * @return string
	 */
	public function get_inadiquate_stock_text( $item, $available_stock ) {

		$text = sprintf(
			/* translators: %1$s: item , %2$s Ordered quantity, %3$s Available quantity  */
			__( '"%1$s" does not have enough stock to fullfill your order of %2$s items. (Only %3$s available).', 'getpaid-item-inventory' ),
			esc_html( $item->get_raw_name() ),
			absint( $item->get_quantity() ),
			absint( $available_stock )
		);

		return apply_filters( 'getpaid_inadiquate_stock_text', $text, $item, $available_stock );
	}

	/**
	 * Returns the out of stock text.
	 *
	 * @param WPInv_Item $item
	 * @return string
	 */
	public function get_out_of_stock_text( $item ) {
		return apply_filters( 'getpaid_out_of_stock_text', esc_html__( 'Out of stock', 'getpaid-item-inventory' ), $item );
	}

	/**
	 * Returns the backorder text.
	 *
	 * @param WPInv_Item $item
	 * @return string
	 */
	public function get_backorder_text( $item ) {
		return apply_filters( 'getpaid_backorder_text', esc_html__( "Temporarily out of stock. Order now and we'll deliver when available.", 'getpaid-item-inventory' ), $item );
	}

	/**
	 * Formats a stock amount by running it through a filter.
	 *
	 * @param  int|float $amount Stock amount.
	 * @param  WPInv_Item $item Item object for whose stock you need to format.
	 * @return int|float
	 */
	public function format_stock_amount( $amount, $item ) {
		return apply_filters( 'getpaid_format_stock_amount', $amount, $item );
	}

	/**
	 * Format the stock amount for display based on settings.
	 *
	 * @since  1.0.0
	 * @param  WPInv_Item $item Item object for whose stock you need to format.
	 * @return string
	 */
	public function get_in_stock_text( $item ) {
		$display      = esc_html__( 'In stock', 'getpaid-item-inventory' );
		$stock_amount = (int) $this->inventory->available_stock( $item->get_id() );

		switch ( wpinv_get_option( 'stock_format', 'no_amount' ) ) {

			case 'low_amount':

				if ( $this->inventory->has_low_stock( $item->get_id() ) ) {

					$display = sprintf(
						/* translators: %s: stock amount */
						esc_html__( 'Only %s left in stock', 'getpaid-item-inventory' ),
						$this->format_stock_amount( $stock_amount, $item )
					);

				}
				break;

			case '':

				$display = sprintf(
					/* translators: %s: stock amount */
					esc_html__( '%s in stock', 'getpaid-item-inventory' ),
					$this->format_stock_amount( $stock_amount, $item )
				);
				break;

			case 'no_stock':

				$display = '';
				break;

		}

		return apply_filters( 'getpaid_in_stock_text', $display, $item );

	}

	/**
	 * Retrieves the stock status.
	 *
	 * @since  1.0.0
	 * @param  WPInv_Item $item Item object for whose stock you need to format.
	 * @return string
	 */
	public function get_stock_status( $item ) {

		// Ensure that we are managing the stock for this item.
		if ( ! $this->inventory->manage_stock( $item->get_id() ) ) {
			return '';
		}

		// Out of stock.
		if ( ! $this->inventory->is_in_stock( $item->get_id() ) ) {
			$text = wp_kses_post( $this->get_out_of_stock_text( $item ) );
			return "<strong class='getpaid-out-of-stock-status text-danger d-block form-text'>$text</strong>";
		}

		// Backorders.
		if ( 'onbackorder' === $this->inventory->get_stock_status( $item->get_id() ) ) {
			$text = wp_kses_post( $this->get_backorder_text( $item ) );
			return "<span class='getpaid-stock-backorder-status text-warning d-block form-text'>$text</span>";
		}

		$text = wp_kses_post( $this->get_in_stock_text( $item ) );

		if ( ! empty( $text ) ) {
			return "<strong class='getpaid-in-stock-status text-success d-block form-text'>$text</strong>";
		}

		return '';
	}

	/**
	 *
	 * @deprecated
	 */
	public function display_stock_status_deprecated( $item ) {
		if ( ! did_action( 'getpaid_payment_form_cart_item_description' ) ) {
			$this->display_stock_status( $item );
		}
	}

	/**
	 * Displays the stock status.
	 *
	 * @since  1.0.0
	 * @param  WPInv_Item $item Item object for whose stock you need to format.
	 * @return void
	 */
	public function display_stock_status( $item ) {
		echo $this->get_stock_status( $item );
	}

	/**
	 * Disables an order bump for out of stock items.
	 *
	 * @since  1.0.0
	 * @param  bool $disable Whether or not to disable the order bump.
	 * @param  WPInv_Item $item Item object for whose stock you need to format.
	 * @return void
	 */
	public function maybe_disable_order_bump( $disable, $item ) {

		if ( ! $this->inventory->is_in_stock( $item->get_id() ) ) {
			return true;
		}

		return $disable;
	}

	/**
	 * Disables buy buttons for out of stock items.
	 *
	 * @since  1.0.0
	 * @param  string $button The buy button markup.
	 * @param  string $item The items being bought.
	 * @return void
	 */
	public function maybe_disable_buy_button( $button, $item ) {

		// Abort if we have more that one item.
		if ( 1 !== count( wpinv_parse_list( $item ) ) ) {
			return $button;
		}

		$item = explode( '|', $item );
		$item = (int) trim( $item[0] );

		if ( $this->inventory->is_in_stock( $item ) ) {

			if ( wpinv_get_option( 'stock_details_button' ) ) {
				$text   = wp_kses_post( $this->get_stock_status( new WPInv_Item( $item ) ) );
				$button = "$button&nbsp;$text";
			}

			return $button;
		}

		$button = str_replace( 'data-item', ' disabled data-item', $button );
		$text   = wp_kses_post( $this->get_out_of_stock_text( new WPInv_Item( $item ) ) );
		$button = "$button&nbsp;<strong class='getpaid-out-of-stock-status text-danger'>$text</strong>";

		return "<span class='getpaid-out-of-stock-button'>$button</span>";
	}

	/**
	 * Processes a submission.
	 *
	 * @since  1.0.0
	 * @param  GetPaid_Payment_Form_Submission $submission The submission to process.
	 * @return void
	 */
	public function process_submission( $submission ) {

		foreach ( $submission->get_items() as $item ) {

			$invoice_id      = $submission->has_invoice() ? $submission->get_invoice()->get_id() : 0;
			$available_stock = $this->inventory->available_stock( $item->get_id(), $invoice_id );

			// Abort if we're not managing stock.
			if ( is_null( $available_stock ) ) {
				continue;
			}

			// Handle backorders.
			if ( $this->inventory->backorders_allowed( $item->get_id() ) ) {

				$threshold = $this->inventory->backorder_threshold( $item->get_id() );

				if ( false === $threshold ) {
					continue;
				}

				if ( 1 > $available_stock && ( absint( $available_stock ) + $item->get_quantity() > $threshold ) ) {
					throw new Exception(
						sprintf(
							/* translators: %1$s: item , %2$s Ordered quantity, %3$s Available quantity  */
							__( '"%1$s" has reached the maximum number of allowed backorders.', 'getpaid-item-inventory' ),
							esc_html( $item->get_raw_name() )
						)
					);
				}

				continue;
			}

			// Is the available stock enough to fullfill this order?
			if ( $item->get_quantity() > $available_stock ) {
				throw new Exception( $this->get_inadiquate_stock_text( $item, absint( $available_stock ) ) );
			}

		}

	}

	/**
	 * Hold stock for an invoice.
	 *
	 * @since 1.0.0
	 * @param WPInv_Invoice $invoice Invoice.
	 */
	public function reserve_stock( $invoice ) {

		if ( apply_filters( 'getpaid_hold_stock_for_invoice', $this->is_enabled(), $invoice ) ) {

			try {
				$this->inventory->reserve_stock_for_invoice( $invoice );
			} catch ( Exception $e ) {
				wpinv_set_error( 'reserve_stock_error', wp_kses_post( $e->getMessage() ) );
			}

		}

	}

	/**
	 * Release held stock for an invoice.
	 *
	 * @since 1.0.0
	 * @param WPInv_Invoice|int $invoice Invoice ID or object.
	 */
	public function release_stock( $invoice ) {

		$invoice = $this->prepare_invoice( $invoice );
		if ( $invoice->exists() && apply_filters( 'getpaid_hold_stock_for_invoice', $this->is_enabled(), $invoice ) ) {
			$this->inventory->release_stock_for_invoice( $invoice );
		}

	}

	/**
	 * Prepares an invoice.
	 *
	 * @since 1.0.0
	 * @param WPInv_Invoice|int $invoice Invoice ID or object.
	 * @return WPInv_Invoice
	 */
	public function prepare_invoice( $invoice ) {
		return $invoice instanceof WPInv_Invoice ? $invoice : new WPInv_Invoice( $invoice );
	}

	/**
	 * Increase stock levels for items within an invoice.
	 *
	 * @since 1.0.0
	 * @param WPInv_Invoice|int $invoice Invoice id or object.
	 */
	public function increase_stock( $invoice ) {

		$invoice = $this->prepare_invoice( $invoice );

		// We need an invoice, and a store with stock management to continue.
		if ( ! $invoice->exists() || ! apply_filters( 'getpaid_can_restore_invoice_stock', $this->is_enabled(), $invoice ) ) {
			return;
		}

		$changes = array();

		// Loop over all items.
		foreach ( $invoice->get_items() as $item ) {

			// Only increase stock if it was initially reduced.
			$item_stock_reduced = (int) $invoice->get_meta( '_reduced_stock_' . $item->get_id(), true );

			if ( empty( $item_stock_reduced ) || ! $this->inventory->manage_stock( $item->get_id() ) ) {
				continue;
			}

			$item_name = $item->get_raw_name();
			$new_stock = $item_stock_reduced + $this->inventory->get_stock_quantity( $item->get_id() );

			update_post_meta( $item->get_id(), '_stock', (int) $new_stock );
			delete_post_meta( $invoice->get_id(), '_reduced_stock_' . $item->get_id() );

			$changes[] = esc_html( $item_name ) . ' ' . ( $new_stock - $item_stock_reduced ) . '&rarr;' . $new_stock;
		}

		if ( ! empty( $changes ) ) {
			$invoice->add_note( esc_html__( 'Stock levels restored:', 'getpaid-item-inventory' ) . ' ' . implode( ', ', $changes ), false, false, true );
			do_action( 'getpaid_restore_invoice_stock', $invoice, $changes );
		}

	}

	/**
	 * Reduce stock levels for items within an invoice.
	 *
	 * @since 1.0.0
	 * @param WPInv_Invoice|int $invoice Invoice id or object.
	 */
	public function reduce_stock( $invoice ) {

		$invoice = $this->prepare_invoice( $invoice );

		// We need an invoice, and a store with stock management to continue.
		if ( ! $invoice->exists() || ! apply_filters( 'getpaid_can_reduce_invoice_stock', $this->is_enabled(), $invoice ) ) {
			return;
		}

		$changes = array();

		// Loop over all items.
		foreach ( $invoice->get_items() as $item ) {

			// Only reduce stock once for each item.
			$item_stock_reduced = (int) $invoice->get_meta( '_reduced_stock_' . $item->get_id(), true );

			if ( ! empty( $item_stock_reduced ) || ! $this->inventory->manage_stock( $item->get_id() ) ) {
				continue;
			}

			$new_stock = $this->inventory->get_stock_quantity( $item->get_id() ) - $item->get_quantity();

			update_post_meta( $item->get_id(), '_stock', $new_stock );
			update_post_meta( $invoice->get_id(), '_reduced_stock_' . $item->get_id(), $item->get_quantity() );

			$changes[] = array(
				'item'    => $item,
				'from'    => $new_stock + $item->get_quantity(),
				'to'      => $new_stock,
				'qty'     => $item->get_quantity(),
			);

		}

		if ( ! empty( $changes ) ) {
			$this->trigger_stock_change_notifications( $invoice, $changes );
			do_action( 'getpaid_reduce_invoice_stock', $invoice, $changes );
		}

	}

	/**
	 * After stock change events, triggers emails and adds invoice notes.
	 *
	 * @since 1.0.0
	 * @param WPInv_Invoice $invoice Invoice.
	 * @param array    $changes Array of changes.
	 */
	public function trigger_stock_change_notifications( $invoice, $changes ) {

		if ( empty( $changes ) ) {
			return;
		}

		$invoice_notes     = array();
		$no_stock_amount   = absint( wpinv_get_option( 'no_threshold', 0 ) );

		foreach ( $changes as $change ) {

			$invoice_notes[]  = esc_html( $change['item']->get_raw_name() ) . ' ' . $change['from'] . '&rarr;' . $change['to'];
			$low_stock_amount = $this->inventory->get_low_stock_amount( $change['item']->get_id() );

			if ( $change['to'] < 0 ) {
				do_action( 'getpaid_item_on_backorder', $change['item'], $invoice, abs( $change['from'] - $change['to'] ) );
			} elseif ( $change['to'] <= $no_stock_amount ) {
				do_action( 'getpaid_no_stock', $change['item'], $change['to'] );
			} elseif ( $change['to'] <= $low_stock_amount ) {
				do_action( 'getpaid_low_stock', $change['item'], $change['to'] );
			}

		}

		$invoice->add_note( esc_html__( 'Stock levels reduced:', 'getpaid-item-inventory' ) . ' ' . implode( ', ', $invoice_notes ), false, false, true );
	}

	/**
	 * Installs the plugin if it has not been installed.
	 *
	 */
	public function maybe_install() {

		// Maybe upgrade the database.
		if ( get_option( 'getpaid_item_inventory_db_version' ) != 1 ) {

			// Init the db installer/updater.
			new GetPaid_Item_Inventory_Installer( (int) get_option( 'getpaid_item_inventory_db_version' ) );
			update_option( 'getpaid_item_inventory_db_version', 1 );

		}

	}

}
