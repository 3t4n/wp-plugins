<?php
namespace Altoviz;

defined( 'ABSPATH' ) || exit;

class AOZ4WC_WC_Front {

	/**
	 * Summary of __construct
	 */
	public function __construct() {
		add_filter( 'woocommerce_my_account_my_orders_actions', array( $this, 'woocommerce_my_account_my_orders_actions' ), 10, 2 );
	}
	/**
	 * Summary of woocommerce_my_account_my_orders_actions
	 *
	 * @param mixed $actions
	 * @param mixed $order
	 */
	public function woocommerce_my_account_my_orders_actions( $actions, $order ) {
		$link   = AOZ4WC()->wc()->get_aoz4wc_invoice_link( $order );
		$number = AOZ4WC()->wc()->get_aoz4wc_invoice_number( $order );
		if ( $link && $number ) {
			$actions['aoz-view-invoice'] = array(
				'url'  => $link,
				// translators: %s invoice number
				'name' => sprintf( __( 'Invoice #%s', 'altoviz' ), $number ),
			);
		}
		return $actions;
	}
}
