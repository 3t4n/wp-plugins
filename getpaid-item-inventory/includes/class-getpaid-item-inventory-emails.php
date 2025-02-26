<?php
/**
 * Main emails Class.
 *
 * @package GetPaid
 * @subpackage Item Inventory
 * @version 1.0.0
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Main emails class.
 *
 * @package GetPaid
 * @subpackage Item Inventory
 * @version 1.0.0
 * @since   1.0.0
 */
class GetPaid_Item_Inventory_Emails {

	/**
	 * Class constructor.
	 *
	 */
	public function __construct() {

		add_action( 'getpaid_low_stock', array( $this, 'low_stock' ), 10, 2 );
		add_action( 'getpaid_no_stock', array( $this, 'no_stock' ), 10, 2 );
		add_action( 'getpaid_item_on_backorder', array( $this, 'backorder' ), 10, 3 );

	}

	/**
	 * Get blog name formatted for emails.
	 *
	 * @return string
	 */
	private function get_blogname() {
		return wp_specialchars_decode( get_option( 'blogname' ), ENT_QUOTES );
	}

	/**
	 * Sends a low stock notification.
	 *
	 * @param WPInv_Item $item
	 * @param int $remaining_stock
	 */
	public function low_stock( $item, $remaining_stock ) {

		// Abort if low stock notifications are disabled.
		$enabled = wpinv_get_option( 'notify_low_stock', 1 );

		if ( ! apply_filters( 'getpaid_should_send_low_stock_notification', ! empty( $enabled ), $item ) ) {
			return;
		}

		$subject = sprintf( '[%s] %s', $this->get_blogname(), esc_html__( 'Item low in stock', 'getpaid-item-inventory' ) );
		$url     = $item->get_edit_url();
		$message = sprintf(
			/* translators: 1: item name 2: items in stock */
			__( '"%1$s" is low in stock. There are %2$d left. Click on the link below to manage the item.', 'getpaid-item-inventory' ),
			html_entity_decode( wp_strip_all_tags( $item->get_name() ), ENT_QUOTES, get_bloginfo( 'charset' ) ),
			html_entity_decode( wp_strip_all_tags( $remaining_stock ) )
		) . "\n\n$url";

		wp_mail(
			apply_filters( 'getpaid_email_recipient_low_stock', wpinv_get_option( 'stock_email_recipient', wpinv_get_admin_email() ), $item, $remaining_stock ),
			apply_filters( 'getpaid_email_subject_low_stock', $subject, $item, $remaining_stock ),
			apply_filters( 'getpaid_email_content_low_stock', $message, $item, $remaining_stock ),
			apply_filters( 'getpaid_email_headers_low_stock', '', $item, $remaining_stock ),
			apply_filters( 'getpaid_email_attachments_low_stock', array(), $item, $remaining_stock )
		);

	}

	/**
	 * Sends a no stock notification.
	 *
	 * @param WPInv_Item $item
	 * @param int $remaining_stock
	 */
	public function no_stock( $item, $remaining_stock ) {

		// Abort if low stock notifications are disabled.
		$enabled = wpinv_get_option( 'notify_no_stock', 1 );

		if ( ! apply_filters( 'getpaid_should_send_no_stock_notification', ! empty( $enabled ), $item ) ) {
			return;
		}

		$subject = sprintf( '[%s] %s', $this->get_blogname(), esc_html__( 'Item out of stock', 'getpaid-item-inventory' ) );
		$url     = $item->get_edit_url();
		$message = sprintf(
			/* translators: 1: item name 2: items in stock */
			__( '"%1$s" is out of stock. There are %2$d left. Click on the link below to manage the item.', 'getpaid-item-inventory' ),
			html_entity_decode( wp_strip_all_tags( $item->get_name() ), ENT_QUOTES, get_bloginfo( 'charset' ) ),
			html_entity_decode( wp_strip_all_tags( $remaining_stock ) )
		) . "\n\n$url";

		wp_mail(
			apply_filters( 'getpaid_email_recipient_no_stock', wpinv_get_option( 'stock_email_recipient', wpinv_get_admin_email() ), $item, $remaining_stock ),
			apply_filters( 'getpaid_email_subject_no_stock', $subject, $item, $remaining_stock ),
			apply_filters( 'getpaid_email_content_no_stock', $message, $item, $remaining_stock ),
			apply_filters( 'getpaid_email_headers_no_stock', '', $item, $remaining_stock ),
			apply_filters( 'getpaid_email_attachments_no_stock', array(), $item, $remaining_stock )
		);

	}

	/**
	 * Sends a backorder notification.
	 *
	 * @param WPInv_Item $item
	 * @param WPInv_Invoice $invoice
	 * @param int $quantity
	 */
	public function backorder( $item, $invoice, $quantity ) {

		if ( ! apply_filters( 'getpaid_should_send_backorder_notification', ! empty( $quantity ), $item, $invoice ) ) {
			return;
		}

		$subject = sprintf( '[%s] %s', $this->get_blogname(), esc_html__( 'Item backorder', 'getpaid-item-inventory' ) );
		$url     = $invoice->get_view_url();
		$message = sprintf(
			/* translators: 1: item quantity 2: item name 3: invoice number */
			__( '"%1$s" units of %2$s have been backordered in invoice #%3$s. Click on the link below to view the invoice.', 'getpaid-item-inventory' ),
			intval( $quantity ),
			html_entity_decode( wp_strip_all_tags( $item->get_name() ), ENT_QUOTES, get_bloginfo( 'charset' ) ),
			html_entity_decode( wp_strip_all_tags( $invoice->get_number() ), ENT_QUOTES, get_bloginfo( 'charset' ) )
		) . "\n\n$url";

		wp_mail(
			apply_filters( 'getpaid_email_recipient_backorder', wpinv_get_option( 'stock_email_recipient', wpinv_get_admin_email() ), $item, $invoice, $quantity ),
			apply_filters( 'getpaid_email_subject_backorder', $subject, $item, $invoice, $quantity ),
			apply_filters( 'getpaid_email_content_backorder', $message, $item, $invoice, $quantity ),
			apply_filters( 'getpaid_email_headers_backorder', '', $item, $invoice, $quantity ),
			apply_filters( 'getpaid_email_attachments_backorder', array(), $item, $invoice, $quantity )
		);

	}

}
