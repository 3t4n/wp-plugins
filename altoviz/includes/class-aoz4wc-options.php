<?php
namespace Altoviz;

class AOZ4WC_Options {

	public function __construct() {
	}
	/**
	 * Summary of async_mode
	 */
	public function async_mode() {
		return AOZ4WC()->is_true( get_option( 'aoz4wc_async_mode', 'no' ) );
	}
	/**
	 * Summary of autosync_customers
	 */
	public function autosync_customers() {
		return AOZ4WC()->is_true( get_option( 'aoz4wc_autosync_customers', 'no' ) );
	}
	/**
	 * Summary of autosync_orders
	 */
	public function autosync_orders() {
		return AOZ4WC()->is_true( get_option( 'aoz4wc_autosync_orders', 'no' ) );
	}
	/**
	 * Summary of autosync_products
	 */
	public function autosync_products() {
		return AOZ4WC()->is_true( get_option( 'aoz4wc_autosync_products', 'no' ) );
	}
	/**
	 * Summary of invoice_draft
	 */
	public function invoice_draft() {
		return AOZ4WC()->is_true( get_option( 'aoz4wc_invoice_draft', 'true' ) );
	}
	/**
	 * Summary of invoice_send
	 */
	public function invoice_send() {
		return AOZ4WC()->is_true( get_option( 'aoz4wc_invoice_send', 'no' ) );
	}
	/**
	 * Summary of invoice_trigger
	 */
	public function invoice_trigger() {
		return get_option( 'aoz4wc_order_status_trigger', 'completed' );
	}
	/**
	 * Summary of invoice_zero_value
	 */
	public function invoice_zero_value() {
		return AOZ4WC()->is_true( get_option( 'aoz4wc_invoice_zero_value', 'no' ) );
	}
	/**
	 * Summary of log_level
	 *
	 * @return int
	 */
	public function log_level() {
		return intval( get_option( 'aoz4wc_log_level', '0' ) );
	}
}
