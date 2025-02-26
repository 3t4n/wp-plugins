<?php
namespace Altoviz;

defined( 'ABSPATH' ) || exit;

class AOZ4WC_WC {

	public function __construct() {
		add_action( 'aoz4wc_sync_customer', array( $this, 'do_sync_customer' ), 10, 1 );
		add_action( 'aoz4wc_sync_product', array( $this, 'do_sync_product' ), 10, 1 );
		add_action( 'aoz4wc_sync_order', array( $this, 'do_sync_order' ), 10, 1 );
		add_action( 'profile_update', array( $this, 'profile_update' ), 10, 3 );
		add_action( 'woocommerce_order_status_changed', array( $this, 'woocommerce_order_status_changed' ), 99, 3 );
		add_action( 'woocommerce_new_product', array( $this, 'woocommerce_new_product' ), 999, 2 );
		add_action( 'woocommerce_new_order', array( $this, 'woocommerce_new_order' ), 999, 2 );
		add_action( 'woocommerce_update_order', array( $this, 'woocommerce_update_order' ), 999, 2 );
		add_action( 'woocommerce_update_product', array( $this, 'woocommerce_update_product' ), 999, 2 );
		add_action( 'woocommerce_order_refunded', array( $this, 'woocommerce_order_refunded' ), 999, 2 );
		add_action( 'user_register', array( $this, 'user_register' ), 10, 2 );
		add_action( 'before_woocommerce_init', array( $this, 'before_woocommerce_init' ) );
		add_action( 'aoz4wc_log', array( $this, 'aoz4wc_log' ), 999, 2 );
	}
	/**
	 * Summary of before_woocommerce_init
	 *
	 * @return void
	 */
	public function before_woocommerce_init() {
		if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
			\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', AOZ4WC()->get_file(), true );
		}
	}
	/**
	 * Summary of get_internal_id_prefix
	 */
	private function get_internal_id_prefix() {
		return apply_filters( 'aoz4wc_internal_id_prefix', 'wc_' );
	}
	/**
	 * Summary of format_internal_id
	 *
	 * @param mixed $value
	 * @return string
	 */
	/**
	 * Summary of format_internal_id
	 *
	 * @param mixed $value
	 * @return string
	 */
	public function format_internal_id( $value ) {
		return $this->get_internal_id_prefix() . $value;
	}
	/**
	 * Summary of extract_internal_id
	 *
	 * @param mixed $value
	 * @return array|string
	 */
	public function extract_internal_id( $value ) {
		return str_replace( $this->get_internal_id_prefix(), '', $value );
	}
	/**
	 * Summary of profile_update
	 *
	 * @param int      $user_id
	 * @param \WP_User $old_user_data
	 * @param array    $userdata
	 * @return void
	 */
	// phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter.FoundAfterLastUsed
	public function profile_update( int $user_id, \WP_User $old_user_data, array $userdata ) {
		if ( AOZ4WC()->options()->autosync_customers() ) {
			$this->sync_customer( $user_id );
		}
	}
	/**
	 * Summary of user_register
	 *
	 * @param int   $user_id
	 * @param array $userdata
	 * @return void
	 */
	// phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter.FoundAfterLastUsed
	public function user_register( int $user_id, array $userdata ) {
		if ( AOZ4WC()->options()->autosync_customers() ) {
			$this->sync_customer( $user_id );
		}
	}
	/**
	 * Summary of woocommerce_order_status_changed
	 *
	 * @param mixed $order_id
	 * @param mixed $old_status
	 * @param mixed $new_status
	 * @return void
	 */
	public function woocommerce_order_status_changed( $order_id, $old_status, $new_status ) {
		if ( did_action( 'woocommerce_order_status_changed' ) > 1 ) {
			return;
		}
		AOZ4WC()->sys_log(
			array(
				'AOZ Order status changed',
				'order_id'   => $order_id,
				'old_status' => $old_status,
				'new_status' => $new_status,
			)
		);
		$this->sync_order_action( $order_id );
		/*
		if (in_array($new_status, ['completed'])) {
		$order = new \WC_Order($order_id);
		if ($order) {
		$aoz4wc_invocie_id = $this->get_aoz4wc_invoice_id($order);
		if (!$aoz4wc_invoice_id) {
		}
		}
		}
		*/
	}
	/**
	 * Summary of woocommerce_order_refunded
	 *
	 * @param mixed $order_id
	 * @param mixed $order
	 * @return void
	 */
	public function woocommerce_order_refunded( $order_id, $order ) {
		if ( did_action( 'woocommerce_order_refunded' ) > 1 ) {
			return;
		}
		AOZ4WC()->sys_log( array( 'AOZ Order refunded', $order_id ) );
		$this->sync_order_action( $order );
	}
	/**
	 * Summary of woocommerce_new_order
	 *
	 * @param mixed $order_id
	 * @param mixed $order
	 * @return void
	 */
	public function woocommerce_new_order( $order_id, $order ) {
		if ( did_action( 'woocommerce_new_order' ) > 1 ) {
			return;
		}
		AOZ4WC()->sys_log( array( 'AOZ New order', $order_id ) );
		$this->sync_order_action( $order );
	}
	/**
	 * Summary of woocommerce_new_product
	 *
	 * @param mixed $product_id
	 * @param mixed $product
	 * @return void
	 */
	public function woocommerce_new_product( $product_id, $product ) {
		if ( did_action( 'woocommerce_new_product' ) > 1 ) {
			return;
		}
		AOZ4WC()->sys_log( array( 'AOZ New product', $product_id ) );
		$this->sync_product_action( $product );
	}
	/**
	 * Summary of woocommerce_update_order
	 *
	 * @param mixed $order_id
	 * @param mixed $order
	 * @return void
	 */
	public function woocommerce_update_order( $order_id, $order ) {
		if ( did_action( 'woocommerce_update_order' ) > 1 ) {
			return;
		}
		AOZ4WC()->sys_log( array( 'AOZ Update order', $order_id ) );
		$this->sync_order_action( $order );
	}
	/**
	 * Summary of woocommerce_update_product
	 *
	 * @param mixed $product_id
	 * @param mixed $product
	 * @return void
	 */
	public function woocommerce_update_product( $product_id, $product ) {
		if ( did_action( 'woocommerce_update_product' ) > 1 ) {
			return;
		}
		AOZ4WC()->sys_log( array( 'AOZ Update product', $product_id ) );
		$this->sync_product_action( $product );
	}
	/**
	 * Summary of woocommerce_after_order_object_save
	 *
	 * @param mixed $order
	 * @param mixed $data_store
	 * @return void
	 */
	// phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter.FoundAfterLastUsed
	public function woocommerce_after_order_object_save( $order, $data_store ) {
		if ( did_action( 'woocommerce_after_order_object_save' ) > 1 ) {
			return;
		}
		AOZ4WC()->sys_log( array( 'AOZ woocommerce_after_order_object_save', $order->get_id() ) );
		$this->sync_order_action( $order );
	}
	/**
	 * Summary of sync_order_action
	 *
	 * @param mixed $order
	 * @param mixed $force_update
	 * @return void
	 */
	public function sync_order_action( $order, $force_update = false ) {
		$order = is_numeric( $order ) ? wc_get_order( $order ) : $order;
		if ( ! $order ) {
			return;
		}
		$order_id = $order->get_id();
		// $force_update = !empty($order->get_meta('_AOZ4WC_force_update', true));
		// AOZ4WC()->sys_log(
		// ['AOZ  Sync order action', 'Order id' => $order_id, 'Autosync orders' => $this->option_autosync_orders(), 'Invoice trigger' => $this->option_invoice_trigger(),
		// 'force_update' => $force_update, 'Order status' => $order->get_status(), 'order_total' => $order->get_total(), 'option_zero_value' => $this->option_invoice_zero_value()]
		// );
		if ( $force_update || AOZ4WC()->options()->autosync_orders() ) {
			if ( ( ( 'processing' === AOZ4WC()->options()->invoice_trigger() ) && ( 'processing' === $order->get_status() ) )
				|| ( ( 'completed' === AOZ4WC()->options()->invoice_trigger() ) && ( 'completed' === $order->get_status() ) )
				|| ( 'refunded' === $order->get_status() ) ) {
				if ( $force_update || ( $order->get_total() > 0 ) || AOZ4WC()->options()->invoice_zero_value() ) {
					$result = $this->sync_order( $order );
					AOZ4WC()->sys_log(
						array(
							'AOZ  Sync order action',
							'result' => $result,
						)
					);
				}
			}
		}
	}
	/**
	 * Summary of sync_product_action
	 *
	 * @param mixed $product
	 * @return void
	 */
	public function sync_product_action( $product ) {
		if ( AOZ4WC()->options()->autosync_products() ) {
			$this->sync_product( $product );
		}
	}
	/**
	 * Summary of get_order_meta
	 *
	 * @param mixed $order
	 * @param mixed $meta
	 */
	public function get_order_meta( $order, $meta ) {
		$order = ( $order && is_numeric( $order ) ) ? new WC_Order( $order ) : $order;
		if ( ! $order ) {
			return false;
		}
		return $order->get_meta( $meta );
	}
	/**
	 * Summary of get_AOZ4WC_invoice_id
	 *
	 * @param mixed $order
	 */
	public function get_AOZ4WC_invoice_id( $order ) {
		if ( empty( $order ) ) {
			return false;
		}
		return apply_filters( 'aoz4wc_order_invoice_id', $order->get_meta( 'aoz4wc_invoice_id', true ), $order );
	}
	/**
	 * Summary of get_AOZ4WC_invoice_link
	 *
	 * @param mixed $order
	 */
	public function get_AOZ4WC_invoice_link( $order ) {
		if ( empty( $order ) ) {
			return '';
		}
		return apply_filters( 'aoz4wc_order_invoice_public_link', $order->get_meta( 'aoz4wc_invoice_public_link', true ), $order );
	}
	/**
	 * Summary of get_AOZ4WC_invoice_number
	 *
	 * @param mixed $order
	 */
	public function get_AOZ4WC_invoice_number( $order ) {
		if ( empty( $order ) ) {
			return '';
		}
		return apply_filters( 'aoz4wc_order_invoice_number', $order->get_meta( 'aoz4wc_invoice_number', true ), $order );
	}
	/**
	 * Summary of get_AOZ4WC_invoice_date
	 *
	 * @param mixed $order
	 */
	public function get_AOZ4WC_invoice_date( $order ) {
		if ( empty( $order ) ) {
			return '';
		}
		return apply_filters( 'aoz4wc_invoice_date', $order->get_meta( 'aoz4wc_invoice_number', true ), $order );
	}
	/**
	 * Summary of sync_customer
	 *
	 * @param mixed $user
	 */
	public function sync_customer( $user ) {
		$user = is_numeric( $user ) ? get_user_by( 'id', $user ) : $user;
		if ( AOZ4WC()->options()->async_mode() ) {
			AOZ4WC()->schedule( 'aoz4wc_sync_customer', array( $user->ID ) );
			return true;
		} else {
			return $this->do_sync_customer( $user );
		}
	}
	public function get_customer_from_order(WC_Order $order): WC_Customer {
		$customer = new WC_Customer();
		$customer->set_email($order->get_billing_email());
		$customer->set_first_name($order->get_billing_first_name());
		$customer->set_last_name($order->get_billing_last_name());
		$customer->set_billing_address_1($order->get_billing_address_1());
		$customer->set_billing_address_2($order->get_billing_address_2());
		$customer->set_billing_city($order->get_billing_city());
		$customer->set_billing_state($order->get_billing_state());
		$customer->set_billing_postcode($order->get_billing_postcode());
		$customer->set_billing_country($order->get_billing_country());
		$customer->set_billing_phone($order->get_billing_phone());

		$customer->set_shipping_address_1($order->get_shipping_address_1());
		$customer->set_shipping_address_2($order->get_shipping_address_2());
		$customer->set_shipping_city($order->get_shipping_city());
		$customer->set_shipping_state($order->get_shipping_state());
		$customer->set_shipping_postcode($order->get_shipping_postcode());
		$customer->set_shipping_country($order->get_shipping_country());
		return $customer;
	}
	/**
	 * Summary of do_sync_customer
	 *
	 * @param mixed $user
	 */
	public function do_sync_customer( $customer, $order = null ) {
		AOZ4WC()->sys_log( 'AOZ Sync Customer' );
		$data = array();
		if ( null !== $order ) {
			AOZ4WC()->sys_log( 'AOZ Sync Customer has an order' );
		}
		$customer = $customer instanceof \WC_Customer
			? $customer
			: ( $customer instanceof WP_User
			? new \WC_Customer( $customer->ID )
			: ( is_numeric( $customer )
			? new \WC_Customer( $customer )
			: false ) );
		// if ( ! $customer && $order instanceof WC_Order) {
		// 	$customer = $this->get_customer_from_order( $order );
		// }
		if ( ! $customer ) {
			return false;
		}
		$customer_id = $customer->get_id();
		AOZ4WC()->sys_log( 'AOZ Sync Customer 2' );
		AOZ4WC()->sys_log([
			$customer->get_billing_company(),
			$customer->get_first_name(),
			$customer->get_last_name()]
		);
		if ( $this->get_transient( 'customer', $customer_id ) ) {
			return false;
		}
		$this->set_transient( 'customer', $customer_id );
		// Name is mandatory in Altoviz
		if ( empty( $customer->get_billing_company() )
			&& empty( $customer->get_first_name() )
			&& empty( $customer->get_last_name() ) ) {
			// $this->sys_log(sprintf('Can\'t synchronize Woocommerce customer #%s (%s). A company name, first name or last name is mandatory', $customer_id, $customer->get_email()), 'warning');
			// translators: %s is the customer id
			AOZ4WC()->log( sprintf( __( 'Can\'t synchronize Woocommerce customer #%s', 'altoviz' ), $customer_id ) . ' ' . __( 'Missing company name or first and last name', 'altoviz' ), 'error' );
			return false;
		}
		$data['billingAddress']                      = $this->create_address(
			$customer->get_billing_address_1(),
			$customer->get_billing_address_2(),
			$customer->get_billing_postcode(),
			$customer->get_billing_city(),
			$customer->get_billing_state(),
			$customer->get_billing_country()
		);
		$data['cellPhone']                           = '';
		$data['companyName']                         = $customer->get_billing_company();
		$data['email']                               = $customer->get_email();
		$data['firstName']                           = $customer->get_first_name();
		$data['internalId']                          = $this->format_internal_id( $customer_id );
		$data['lastName']                            = $customer->get_last_name();
		$data['number']                              = '';
		$data['phone']                               = $customer->get_billing_phone();
		$data['shippingAddress']                     = $this->create_address(
			$customer->get_shipping_address_1(),
			$customer->get_shipping_address_2(),
			$customer->get_shipping_postcode(),
			$customer->get_shipping_city(),
			$customer->get_shipping_state(),
			$customer->get_shipping_country()
		);
		$data['companyInformations']['vatNumber']    = $this->get_vat_number_from_user( $customer_id );
		$data['title']                               = '';
		$data['type']                                = strlen( $customer->get_billing_company() ) > 0 ? 'company' : 'individual';
		$data['metadata']['woocommerce_customer_id'] = $customer_id;
		$data['metadata']['stripe_customer_id']      = get_user_meta( $customer_id, 'wp__stripe_customer_id', true );
		$aoz4wc_customer_id                          = null;
		$aoz4wc_customer                             = AOZ4WC()->api()->customers_find( '', $this->format_internal_id( $customer_id ), true );
		if ( $aoz4wc_customer ) {
			$aoz4wc_customer_id = $aoz4wc_customer['id'];
			$aoz4wc_customer    = AOZ4WC()->api()->customers_update( $aoz4wc_customer_id, array_merge( $aoz4wc_customer, $data ) );
			if ( $aoz4wc_customer ) {
				$this->log_customer( $aoz4wc_customer, 'update' );
			}
		} else {
			$aoz4wc_customer = AOZ4WC()->api()->customers_create( $data );
			if ( $aoz4wc_customer ) {
				$aoz4wc_customer_id = $aoz4wc_customer['id'];
				$this->log_customer( $aoz4wc_customer, 'create' );
			}
		}
		if ( $aoz4wc_customer ) {
			$aoz4wc_customer_id = $aoz4wc_customer['id'];
			update_user_meta( $customer_id, 'aoz4wc_customer_id', $aoz4wc_customer_id );
			update_user_meta( $customer_id, 'aoz4wc_customer_number', $aoz4wc_customer['number'] );
			return $aoz4wc_customer;
		}
		AOZ4WC()->log( sprintf( 'Can\'t synchronize Woocommerce customer #%s', $customer_id ), 'error' );
		return false;
	}
	/**
	 * Summary of log_customer
	 *
	 * @param mixed $aoz4wc_customer
	 * @param mixed $action
	 * @return void
	 */
	public function log_customer( $aoz4wc_customer, $action ) {
		AOZ4WC()->log(
			array(
				'source'         => 'customer',
				'action'         => $action,
				'number'         => $aoz4wc_customer['number'],
				'email'          => $aoz4wc_customer['email'],
				'name'           => $aoz4wc_customer['name'],
				'companyName'    => $aoz4wc_customer['companyName'],
				'firstName'      => $aoz4wc_customer['firstName'],
				'lastName'       => $aoz4wc_customer['lastName'],
				'altoviz_id'     => $aoz4wc_customer['id'],
				'woocommerce_id' => $this->extract_internal_id( $aoz4wc_customer['internalId'] ),
			)
		);
	}
	/**
	 * Summary of log_invoice
	 *
	 * @param mixed $aoz4wc_invoice
	 * @param mixed $action
	 * @return void
	 */
	public function log_invoice( $aoz4wc_invoice, $action ) {
		AOZ4WC()->log(
			array(
				'source'         => 'invoice',
				'action'         => $action,
				'number'         => $aoz4wc_invoice['number'],
				'email'          => $aoz4wc_invoice['billingContact']['email'],
				'name'           => $aoz4wc_invoice['customerName'],
				'altoviz_id'     => $aoz4wc_invoice['id'],
				'woocommerce_id' => $this->extract_internal_id( $aoz4wc_invoice['internalId'] ),
			)
		);
	}
	/**
	 * Summary of log_product
	 *
	 * @param mixed $aoz4wc_product
	 * @param mixed $action
	 * @return void
	 */
	public function log_product( $aoz4wc_product, $action ) {
		AOZ4WC()->log(
			array(
				'source'         => 'product',
				'action'         => $action,
				'number'         => $aoz4wc_product['number'],
				'name'           => $aoz4wc_product['name'],
				'altoviz_id'     => $aoz4wc_product['id'],
				'woocommerce_id' => $this->extract_internal_id( $aoz4wc_product['internalId'] ),
			)
		);
	}
	/**
	 * Summary of send_document
	 *
	 * @param mixed $order
	 * @param mixed $aoz4wc_document
	 * @return bool
	 */
	public function send_document( $order, $aoz4wc_document = false ) {
		$order = is_numeric( $order ) ? wc_get_order( $order ) : $order;
		if ( ! $order ) {
			return false;
		}
		$order_id           = $order->get_id();
		$credit             = 'shop_order_refund' === $order->get_type();
		$main_order         = $credit ? wc_get_order( $order->get_parent_id() ) : $order;
		$aoz4wc_document_id = null;
		if ( ! $aoz4wc_document ) {
			$aoz4wc_document = AOZ4WC()->api()->sales_documents_find( '', $this->format_internal_id( $order_id ), true, $credit );
		}
		if ( $aoz4wc_document ) {
			$aoz4wc_document_id = $aoz4wc_document['id'];
			$sent               = false;
			$sent               = AOZ4WC()->api()->sales_documents_send( $aoz4wc_document_id, $credit );
			if ( $sent ) {
				$order->update_meta_data( 'aoz4wc_invoice_sent', true );
				if ( $credit ) {
					$main_order->add_order_note( __( 'Credit sent.', 'altoviz' ) );
				} else {
					$order->add_order_note( __( 'Invoice sent.', 'altoviz' ) );
				}
				$order->save();
				$this->log_invoice( $aoz4wc_document, 'send' );
				AOZ4WC()->sys_log( 'AOZ Invoice sent ' . $aoz4wc_document['number'] . ' ' . $aoz4wc_document_id . ' ' . $order_id );
				return true;
			}
		}
		AOZ4WC()->log( sprintf( 'Can\'t send Altoviz invoice #%s for Woocommerce order #%s', $aoz4wc_document_id ?? '???', $order_id ), 'error' );
		return false;
	}
	/**
	 * Summary of sync_order
	 *
	 * @param mixed $order
	 */
	public function sync_order( $order ) {
		$order = is_numeric( $order ) ? wc_get_order( $order ) : $order;
		if ( AOZ4WC()->options()->async_mode() ) {
			AOZ4WC()->schedule( 'aoz4wc_sync_order', array( $order->get_id() ) );
			return true;
		} else {
			return $this->do_sync_order( $order );
		}
	}
	/**
	 * Summary of do_sync_order
	 *
	 * @param mixed $order
	 */
	public function do_sync_order( $order ) {
		$result = $this->do_sync_individual_order( $order );
		AOZ4WC()->sys_log(['do_sync_order' => $result]);
		if ( $result ) {
			$order_refunds = $order->get_refunds();
			AOZ4WC()->sys_log(['refunds' => count( $order_refunds )]);
			foreach ( $order_refunds as $refund ) {
				$result = $this->do_sync_individual_order( $refund );
				AOZ4WC()->sys_log(['refund' => $refund, 'r' => false !== $result ]);
			}
		}
		return $result;
	}
	/**
	 * Summary of get_customer_id
	 *
	 * @param mixed $order
	 */
	public function get_customer_id( $order ) {
		if ( 'shop_order_refund' === $order->get_type() ) {
			$order = wc_get_order( $order->get_parent_id() );
		}
		return $order->get_customer_id();
	}
	/**
	 * Summary of get_order_customer_data
	 *
	 * @param mixed $order
	 * @return void
	 */
	public function get_order_customer_data( $order ) {
	}
	/**
	 * Summary of do_sync_individual_order
	 *
	 * @param mixed $order
	 */
	public function do_sync_individual_order( $order ) {
		AOZ4WC()->sys_log( array( 'step' => '1' ) );
		// if( ! is_a( $order, 'WC_Order') ) { }
		// AOZ4WC()->sys_log(['step' => '1']);
		$order = is_numeric( $order ) ? wc_get_order( $order ) : $order;
		if ( ! $order ) {
			return false;
		}
		if ( ! AOZ4WC()->app()->is_supported_currency( $order->get_currency() ) ) {
			return false;
		}
		AOZ4WC()->sys_log( array( 'step' => '1.1' ) );
		$order_id = $order->get_id();
		if ( $this->get_transient( 'order', $order_id ) ) {
			return false;
		}
		AOZ4WC()->sys_log(
			array(
				'step'     => '1.2',
				'order_id' => $order_id,
			)
		);
		$this->set_transient( 'order', $order_id );
		$credit      = 'shop_order_refund' === $order->get_type();
		$main_order  = $credit ? wc_get_order( $order->get_parent_id() ) : $order;
		$customer_id = $main_order->get_customer_id();
		AOZ4WC()->sys_log(
			array(
				'step'        => '2',
				'customer_id' => $customer_id,
			)
		);
		if ( $credit ) {
			$aoz4wc_customer = AOZ4WC()->api()->customers_find( '', $this->format_internal_id( $customer_id ), true );
		} else {
			$aoz4wc_customer = $this->do_sync_customer( $customer_id );
		}
		if ( ! $aoz4wc_customer ) {
			return false;
		}
		AOZ4WC()->sys_log(
			array(
				'step'        => '3',
				'customer_id' => $customer_id,
			)
		);
		$aoz4wc_customer_id        = $aoz4wc_customer['id'];
		$data['customerId']        = intval( $aoz4wc_customer_id );
		$data['billingAddress']    = $this->create_address(
			$main_order->get_billing_address_1(),
			$main_order->get_billing_address_2(),
			$main_order->get_billing_postcode(),
			$main_order->get_billing_city(),
			$main_order->get_billing_state(),
			$main_order->get_billing_country()
		);
		$data['billingContact']    = $this->create_contact(
			$main_order->get_billing_first_name(),
			$main_order->get_billing_last_name(),
			$main_order->get_billing_email(),
			$main_order->get_billing_phone()
		);
		$data['customerVatNumber'] = $this->get_vat_number_from_order( $main_order );
		$data['internalId']        = $this->format_internal_id( $order_id );
		$data                      = AOZ4WC()->app()->switch_language(
			function () use ( $data, $order ) {
				// translators: %1$s order id, %2$s order date
				$data['customerOrderReference'] = sprintf( __( 'Order #%1$s on %2$s', 'altoviz' ), $order->get_id(), date_i18n( get_option( 'date_format' ), $order->get_date_created()->getTimestamp() ) );
				return $data;
			}
		);
		if ( $credit ) {
			$data['isDraft'] = true;
			// translators: %1$s the reason for the refund
			$data['internalNotes'] = sprintf( __( 'Refund reason: %1$s', 'altoviz' ), $order->get_reason() );
		}
		$tax_included = get_option( 'woocommerce_tax_display_cart' );// get_option('woocommerce_tax_display_shop');
		$tax_items    = $order->get_items( array( 'tax' ) );
		AOZ4WC()->sys_log( array( 'step' => '3.1' ) );
		$lines = array();
		foreach ( $order->get_items( 'line_item' ) as $item_id => $item ) {
			$line           = array();
			$product_id     = $item->get_variation_id() ? $item->get_variation_id() : $item->get_product_id();
			$product        = $item->get_product();
			$aoz4wc_product = AOZ4WC()->api()->products_find( '', $this->format_internal_id( $product_id ), true );
			AOZ4WC()->sys_log(
				array(
					'step'    => '3.2',
					'product' => $aoz4wc_product,
				)
			);
			if ( ! $aoz4wc_product ) {
				$aoz4wc_product = $this->do_sync_product( $product_id );
				AOZ4WC()->sys_log(
					array(
						'step'    => '3.2.1',
						'product' => $aoz4wc_product,
					)
				);
				if ( ! $aoz4wc_product ) {
					return false;
				} elseif ( is_array( $aoz4wc_product ) ) {
					$aoz4wc_product = $aoz4wc_product[0];
				}
			}
			$aoz4wc_product_id   = $aoz4wc_product['id'];
			$line['description'] = $item->get_name();
			if ( $item->get_subtotal() !== $item->get_total() ) {
				$line['discount'] = $this->create_discount( round( $item->get_subtotal() - $item->get_total(), 2 ), 'Fixed' );
			}
			$line['productId']         = intval( $aoz4wc_product_id );
			$line['productInternalId'] = $this->format_internal_id( $product_id );
			// "productNumber": "string",
			$line['purchasePrice']    = $aoz4wc_product['purchasePrice'];
			$line['quantity']         = $credit ? -$item->get_quantity() : $item->get_quantity();
			$line['taxExcludedPrice'] = $item->get_subtotal() / $item->get_quantity();
			$line['type']             = $product->is_virtual() ? 'Service' : 'Product';
			// $line['unit'] = $this->create_unit();
			/*
			$line['_product_id'] = $item->get_product_id();
			$line['_variation_id'] = $item->get_variation_id();
			$line['_tax_class'] = $item->get_tax_class();
			$line['_tax_status'] = $item->get_tax_status();
			//$line['_tax_rate_percent'] = $item->get_rate_percent();
			$line['_tax_status_edit'] = $item->get_tax_status('edit');
			$line['_tax_status_parent'] = $parent_product->get_tax_class();
			$line['_product_tax_class'] = $product->get_tax_class();
			*/
			$line['vat'] = $this->wc_get_line_vat( $main_order, $item );
			$lines[]     = $line;
		}
		foreach ( $order->get_fees() as $item_id => $item ) {
			$line                     = array();
			$line['type']             = 'Service';
			$line['description']      = $item->get_name();
			$line['quantity']         = 1;
			$line['vat']              = $this->wc_get_line_vat( $main_order, $item );
			$line['taxExcludedPrice'] = $item->get_total();
			$lines[]                  = $line;
		}
		$shipping_methods_count = $order->get_item_count( 'shipping' );
		// $data['shippingMethodsCount'] = $shipping_methods_count;
		if ( 1 === $shipping_methods_count ) {
			$item                   = $order->get_shipping_methods()[0];
			$data['shippingAmount'] = $item->get_total();
			$data['shippingVat']    = $this->wc_get_line_vat( $main_order, $item );
		} elseif ( $shipping_methods_count > 1 ) {
			foreach ( $order->get_shipping_methods() as $item_id => $item ) {
				$line                     = array();
				$line['type']             = 'Service';
				$line['description']      = $item->get_name();
				$line['quantity']         = 1;
				$line['vat']              = $this->wc_get_line_vat( $main_order, $item );
				$line['classificationId'] = AOZ4WC()->app()->get_settings_default_shipping_classification();
				$line['taxExcludedPrice'] = $item->get_total();
				$lines[]                  = $line;
			}
		}
		$coupons = '';
		foreach ( $order->get_coupons() as $coupon_id => $coupon ) {
			if ( strlen( $coupons ) > 0 ) {
				$coupons .= ', ';
			}
			$coupons .= $coupon->get_code();
		}
		if ( strlen( $coupons ) > 0 ) {
			$coupons     .= '.';
			$line         = array();
			$line['type'] = 'Text';
			// translators: %1$s coupon, %2$s discount total
			$line['description'] = sprintf( __( 'Coupon(s) : %1$s Total : %2$s', 'altoviz' ), $coupons, $order->get_discount_total() );
			$lines[]             = $line;
		}

		$data['lines']           = $lines;
		$country                 = $main_order->get_shipping_country() ?
			$main_order->get_shipping_country() : $main_order->get_billing_country();
		$postcode                = $main_order->get_shipping_postcode() ?
			$main_order->get_shipping_postcode() : $main_order->get_billing_postcode();
			$data['region']      = $this->region_from_address( $country, $postcode );
		$data['shippingAddress'] = $this->create_address(
			$main_order->get_shipping_address_1(),
			$main_order->get_shipping_address_2(),
			$main_order->get_shipping_postcode(),
			$main_order->get_shipping_city(),
			$main_order->get_shipping_state(),
			$main_order->get_shipping_country()
		);
		// $data['shippingAmount']  = 0;
		$data['shippingContact'] = $this->create_contact(
			$main_order->get_shipping_first_name(),
			$main_order->get_shipping_last_name()
		);
		// translators: %1$s invoice number
		$data['subject'] = $credit ? sprintf( __( 'Refund of the invoice #%1$s', 'altoviz' ), $main_order->get_meta( 'aoz4wc_invoice_number', true ) ) : '';
		// $data['shippingVat']     = $this->create_vat();
		// $data['taxAmount'] = 0,
		// "taxExcludedAmount": 0,
		// "taxIncludedAmount": 0,
		// "useTaxIncludedPrices": true,
		$data['vatMode'] = 'Auto';
		// $data['vatReverseCharge'] = boolval(false);
		// $subscriptions_ids = wcs_get_subscriptions_for_order($order_id, array('order_type' => 'any'));
		// if (count($subscriptions_ids) > 0) {
		// if($subscription_obj->order->id === $order_id) break; // Stop the loop
		// }
		// AOZ4WC()->log($data, true);
		$data['metadata']['woocommerce_order_id'] = $order->get_id();
		if ( ! $credit ) {
			$data['metadata']['woocommerce_order_number'] = $order->get_order_number();
		}
		// AOZ4WC()->sys_log(['step' => '3', 'data' => $data]);
		$data = apply_filters( 'aoz4wc_sync_order_data', $data, $order );
		AOZ4WC()->sys_log(
			array(
				'step' => '4',
				'data' => $data,
			)
		);
		$aoz4wc_invoice = AOZ4WC()->api()->sales_documents_find( '', $this->format_internal_id( $order_id ), true, $credit );
		if ( $aoz4wc_invoice ) {
			$aoz4wc_invoice_id = $aoz4wc_invoice['id'];
			if ( AOZ4WC()->is_true( $aoz4wc_invoice['isDraft'] ) ) {
				$aoz4wc_invoice = AOZ4WC()->api()->sales_documents_update(
					$aoz4wc_invoice_id,
					array_merge( $aoz4wc_invoice, $data ),
					$credit
				);
				if ( $aoz4wc_invoice ) {
					if ( $credit ) {
						// translators: %s credit number
						$main_order->add_order_note( sprintf( __( 'Altoviz credit #%s updated', 'altoviz' ), $aoz4wc_invoice['number'] ) );
					} else {
						// translators: %s invoice number
						$order->add_order_note( sprintf( __( 'Altoviz invoice #%s updated', 'altoviz' ), $aoz4wc_invoice['number'] ) );
					}
					$this->log_invoice( $aoz4wc_invoice, 'update' );
				}
			}
		} else {
			$aoz4wc_invoice = AOZ4WC()->api()->sales_documents_create( $data, $credit );
			if ( $aoz4wc_invoice ) {
				$aoz4wc_invoice_id = $aoz4wc_invoice['id'];
				$this->log_invoice( $aoz4wc_invoice, 'create' );
				if ( $credit ) {
					// translators: %s credit number
					$main_order->add_order_note( sprintf( __( 'Altoviz credit #%s created', 'altoviz' ), $aoz4wc_invoice['number'] ) );
				} else {
					// translators: %s invoice number
					$order->add_order_note( sprintf( __( 'Altoviz invoice #%s created', 'altoviz' ), $aoz4wc_invoice['number'] ) );
				}
			}
		}
		// Update meta in case next processing fails
		$this->update_order_meta( $order, $aoz4wc_invoice, true );
		AOZ4WC()->sys_log( array( $order->get_id(), $this->get_all_order_meta( $order ) ) );
		if ( $aoz4wc_invoice ) {
			if ( $order->has_status( array( 'processing', 'completed', 'refunded' ) ) ) {
				$is_paid             = AOZ4WC()->is_true( $aoz4wc_invoice['isPaid'] );
				$is_draft            = AOZ4WC()->is_true( $aoz4wc_invoice['isDraft'] );
				$finalize            = ! AOZ4WC()->options()->invoice_draft();
				$balance             = doubleval( $aoz4wc_invoice['balance'] );
				$tax_included_amount = doubleval( $aoz4wc_invoice['taxIncludedAmount'] );
				$payment_status      = 'success';

				/*
				if ($finalize && $is_draft) {
					if ($is_paid) {
						$aoz4wc_invoice = AOZ4WC()->api()->sales_documents_finalize($aoz4wc_invoice_id, $credit);
						if ($aoz4wc_invoice) {
								$this->log_invoice($aoz4wc_invoice, 'finalize');
						}
					} else {*/
				// paymentMethod = "Transfer" "Order" "Check" "Cash" "Card" "Bill" "Other"
				$payment_reference = AOZ4WC()->app()->switch_language(
					function () use ( $order ) {
						// translators: %1$s order id
						return sprintf( __( 'Order #%1$s', 'altoviz' ), $order->get_id() );
					}
				);
				$meta_data         = array();
				if ( ! $credit ) {
					$transaction_id          = $order->get_transaction_id();
					$meta_data['payment_id'] = $transaction_id;
				}
				$payment_method                = $order->get_payment_method();
				$meta_data['payment_provider'] = $payment_method;
				switch ( $payment_method ) {
					case 'stripe':
						if ( $credit ) {
							$stripe_refund_id = $order->get_meta( '_stripe_refund_id' );
							if (( strlen( $stripe_refund_id ) === 0 )	
								&& ( count($main_order->get_refunds()) === 1 ) ) {
									$stripe_refund_id = $main_order->get_meta( '_stripe_refund_id' );
							}
							$meta_data['stripe_refund_id'] = $stripe_refund_id;
						} else {
							$meta_data['stripe_charge_id'] = $transaction_id;
						}
						$meta_data['stripe_customer_id']      = $order->get_meta( '_stripe_customer_id' );
						$meta_data['stripe_intent_id']        = $order->get_meta( '_stripe_intent_id' );
						$meta_data['stripe_source_id']        = $order->get_meta( '_stripe_source_id' );
						$meta_data['stripe_upe_payment_type'] = $order->get_meta( '_stripe_upe_payment_type' );
						break;
					case 'gocardless':
						if ( $credit ) {
							$gocardless_refund_id = $order->get_meta( '_gocardless_refund_id' );
							if (( strlen( $gocardless_refund_id ) === 0 )
								&& ( count($main_order->get_refunds()) === 1 ) ) {
								$gocardless_refund_id = $main_order->get_meta( '_gocardless_refund_id' );
							}
							$meta_data['gocardless_refund_id'] = $gocardless_refund_id;
						}
						$gc_status = $order->get_meta( '_gocardless_payment_status' );
						if ( 'submitted' === $gc_status || 'submitting' === $gc_status ) {
							$payment_status = 'pending';
						}
						$meta_data['gocardless_mandate_id']              = $order->get_meta( '_gocardless_mandate_id' );
						$meta_data['gocardless_payment_id']              = $order->get_meta( '_gocardless_payment_id' );
						$meta_data['gocardless_billing_request_id']      = $order->get_meta( '_gocardless_billing_request_id' );
						$meta_data['gocardless_billing_request_flow_id'] = $order->get_meta( '_gocardless_billing_request_flow_id' );
						break;
				}
				if ( $is_paid ) {
					$aoz4wc_invoice = AOZ4WC()->api()->sales_documents_finalize( $aoz4wc_invoice_id, $credit );
				} else {
					if ( ! $credit || ( $credit && $order->get_refunded_payment() ) ) {
						$aoz4wc_invoice = AOZ4WC()->api()->sales_documents_markaspaid(
							array(
								'invoiceId'        => $aoz4wc_invoice_id,
								'amount'           => $aoz4wc_invoice['taxIncludedAmount'],
								'date'             => $aoz4wc_invoice['date'],
								'paymentMethod'    => 'Other',
								'finalizeInvoice'  => $finalize,
								'paymentReference' => $payment_reference,
								'metadata'         => $meta_data,
								'allowUpdate'      => $is_paid,
								'status'           => $payment_status,
							),
							$credit
						);
					} else {
						$aoz4wc_invoice = false;
					}
					if ( $aoz4wc_invoice ) {
						$this->log_invoice( $aoz4wc_invoice, 'markaspaid' . ( $finalize ? ';finalize' : '' ) );
					}
				}
				// Update meta as number might have changed
				$this->update_order_meta( $order, $aoz4wc_invoice );
			}
			if ( $aoz4wc_invoice
				&& AOZ4WC()->is_false( $aoz4wc_invoice['isDraft'] )
				&& empty( $aoz4wc_invoice['sentAt'] )
				&& AOZ4WC()->options()->invoice_send() ) {
				$this->send_document( $order, $aoz4wc_invoice );
			}
			/*
			AOZ4WC()->sys_log(['source' => 'AOZ Sync Invoice', 'number' => $aoz4wc_invoice['number'], 'aoz4wc_invoice_id' => $aoz4wc_invoice_id,
							'order_id' => $order_id, 'finalized' => AOZ4WC()->is_false($aoz4wc_invoice['isDraft']), 'option_invoice_send' => $this->option_invoice_send(),
							'order_status' => $order->get_status(), 'option_invoice_draft' => $this->option_invoice_draft()]);
			*/
			return $aoz4wc_invoice;
		}
		AOZ4WC()->log( sprintf( 'Can\'t synchronize Woocommerce order #%s', $order_id ), 'error' );
		AOZ4WC()->sys_log(
			array(
				'AOZ invoice problem',
				'id'        => $order_id,
				'aoz4wc_id' => $aoz4wc_invoice_id,
			)
		);
		return false;
	}
	/**
	 * Summary of update_order_meta
	 *
	 * @param mixed $order
	 * @param mixed $aoz4wc_invoice
	 * @param mixed $save
	 * @return void
	 */
	public function update_order_meta( $order, $aoz4wc_invoice, $save = true ) {
		if ( $aoz4wc_invoice && $order ) {
			$order->update_meta_data( 'aoz4wc_customer_id', $aoz4wc_invoice['customerId'] );
			$order->update_meta_data( 'aoz4wc_customer_number', $aoz4wc_invoice['customerNumber'] );
			$order->update_meta_data( 'aoz4wc_invoice_date', $aoz4wc_invoice['date'] );
			$order->update_meta_data( 'aoz4wc_invoice_id', $aoz4wc_invoice['id'] );
			$order->update_meta_data( 'aoz4wc_invoice_number', $aoz4wc_invoice['number'] );
			$order->update_meta_data( 'aoz4wc_invoice_public_link', $aoz4wc_invoice['publicLink'] );
			if ( $save ) {
				$order->save();
			}
		}
	}
	/**
	 * Summary of get_all_order_meta
	 *
	 * @param mixed $order
	 * @return array
	 */
	public function get_all_order_meta( $order ) {
		$meta = array();
		if ( $order ) {
			$meta['aoz4wc_customer_id']         = $order->get_meta_data( 'aoz4wc_customer_id' );
			$meta['aoz4wc_customer_number']     = $order->get_meta_data( 'aoz4wc_customer_number' );
			$meta['aoz4wc_invoice_date']        = $order->get_meta_data( 'aoz4wc_invoice_date' );
			$meta['aoz4wc_invoice_id']          = $order->get_meta_data( 'aoz4wc_invoice_id' );
			$meta['aoz4wc_invoice_number']      = $order->get_meta_data( 'aoz4wc_invoice_number' );
			$meta['aoz4wc_invoice_public_link'] = $order->get_meta_data( 'aoz4wc_invoice_public_link' );
		}
		return $meta;
	}
	/**
	 * Summary of sync_product
	 *
	 * @param mixed $product
	 */
	public function sync_product( $product ) {
		$product = is_numeric( $product ) ? wc_get_product( $product ) : $product;
		if ( AOZ4WC()->options()->async_mode() ) {
			AOZ4WC()->schedule( 'aoz4wc_sync_product', array( $product->get_id() ) );
			return true;
		} else {
			return $this->do_sync_product( $product );
		}
	}
	/**
	 * Summary of do_sync_product
	 *
	 * @param mixed $product
	 * @param mixed $sync_variable
	 */
	public function do_sync_product( $product, $sync_variable = false ) {
		$data    = array();
		$product = is_numeric( $product ) ? wc_get_product( $product ) : $product;
		if ( ! $product ) {
			return false;
		}
		$product_id = $product->get_id();
		if ( get_transient( 'product', $product_id ) ) {
			return false;
		}
		$this->set_transient( 'product', $product_id );
		AOZ4WC()->sys_log( 'AOZ Sync product=' . $product_id );
		if ( $product->is_type( 'variable', 'variable-subscription' ) ) {
			$children = array();
			foreach ( $product->get_children() as $variation_id ) {
				$child = $this->do_sync_product( $variation_id );
				if ( ! $child ) {
					return false;
				}
					$children[] = $child;
			}
			if ( ! $sync_variable ) {
					return $children;
			}
		}
		if ( $product->is_type( array( 'simple', 'variation', 'subscription', 'subscription-variation' ) )
			|| ( $product->is_type( 'variable', 'variable-subscription' ) && $sync_variable )
		) {
			// AOZ4WC()->sys_log('AOZ simple', true);
			// $aoz4wc_id = get_user_meta($id, 'aoz4wc_id', true);
			// $data['id'] = $id;
			$data['active']          = boolval( $product->get_catalog_visibility() !== 'hidden' );
			$data['defaultQuantity'] = 1;
			$parent_id               = $product->get_parent_id();
			$description             = $product->get_description();
			if ( empty( $description ) && ( $parent_id ) ) {
				$parent = wc_get_product( $parent_id );
				if ( $parent ) {
					$description = $parent->get_description();
				}
			}
			$data['description'] = $description;
			// $product->get_short_description();
			$data['internalId']             = $this->format_internal_id( $product_id );
			$data['isUnitPriceTaxIncluded'] = AOZ4WC()->is_true( get_option( 'woocommerce_prices_include_tax' ) === 'yes' );
			$data['name']                   = $product->get_name();
			$number                         = $product->get_sku( 'edit' );
			if ( ! $number ) {
				$number = $product->get_id();
			}
			$data['number'] = $number; // Avoid getting parent sku for product variations
			// $data['purchasePrice'] = 0;
			$data['type']      = $product->is_virtual() ? 'Service' : 'Product';
			$data['unit']      = $this->create_unit();
			$data['unitPrice'] = AOZ4WC()->zero_if_empty( $product->get_price() );
			// $data['_unitPriceNull'] = is_null($product->get_price()) ? 'true' : 'false';
			// $data['_unitPriceType'] = gettype($product->get_price());
			// $data['vat'] = $this->create_vat();
			// $data['_virtual'] = $product->get_virtual();
			// $data['_type'] = $product->get_type();
			// $data['_tax_status'] = $product->get_tax_status();
			// $data['_tax_class'] = $product->get_tax_class();
			// $data['_tax_rate'] = $product->get_tax_class();
			$data['metadata']['woocommerce_product_id'] = $product_id;
			$aoz4wc_product                             = AOZ4WC()->api()->products_find( '', $this->format_internal_id( $product_id ), true );
			if ( $aoz4wc_product ) {
				$aoz4wc_product = AOZ4WC()->api()->products_update( $aoz4wc_product['id'], array_merge( $aoz4wc_product, $data ) );
				if ( $aoz4wc_product ) {
					$this->log_product( $aoz4wc_product, 'update' );
				}
			} else {
				$aoz4wc_product = AOZ4WC()->api()->products_create( $data );
				if ( $aoz4wc_product ) {
					$this->log_product( $aoz4wc_product, 'create' );
				}
			}
			// AOZ4WC()->sys_log(['product meta', $id, $aoz4wc_product['id']], true);
			if ( $aoz4wc_product ) {
				$product->update_meta_data( 'aoz4wc_product_id', $aoz4wc_product['id'] );
				$product->update_meta_data( 'aoz4wc_product_number', $aoz4wc_product['number'] );
				$product->save();
			}
			return $aoz4wc_product;
		}
		AOZ4WC()->log( sprintf( 'Can\'t synchronize Woocommerce product #%s', $product_id ), 'error' );
		return false;
	}
	/**
	 * Summary of create_address
	 *
	 * @param mixed $address1
	 * @param mixed $address2
	 * @param mixed $postcode
	 * @param mixed $city
	 * @param mixed $state
	 * @param mixed $country_code
	 * @return array|null
	 */
	public function create_address( $address1, $address2, $postcode, $city, $state, $country_code ) {
		if ( empty( $address1 ) && empty( $address2 ) && empty( $postcode ) && empty( $city ) && empty( $state ) && empty( $country_code ) ) {
			return null;
		}
		$data               = array();
		$data['city']       = $city;
		$data['countryiso'] = $country_code;
		$data['street']     = ( strlen( $address2 ) > 0 ) ? $address1 . "\n" . $address2 : $address1;
		$data['zipcode']    = $postcode;
		return $data;
	}
	/**
	 * Summary of create_contact
	 *
	 * @param mixed $first_name
	 * @param mixed $last_name
	 * @param mixed $email
	 * @param mixed $phone
	 * @param mixed $cellphone
	 * @param mixed $company_name
	 * @param mixed $title
	 * @return array|null
	 */
	public function create_contact( $first_name = '', $last_name = '', $email = '', $phone = '', $cellphone = '', $company_name = '', $title = '' ) {
		if ( empty( $first_name ) && empty( $last_name ) && empty( $email ) && empty( $phone ) && empty( $cellphone ) && empty( $company_name ) && empty( $title ) ) {
			return null;
		}
		$data                = array();
		$data['cellPhone']   = $cellphone;
		$data['companyName'] = $company_name;
		$data['email']       = $email;
		$data['firstName']   = $first_name;
		$data['lastName']    = $last_name;
		$data['phone']       = $phone;
		$data['title']       = $title;
		return $data;
	}
	/**
	 * Summary of create_discount
	 *
	 * @param mixed $value
	 * @param mixed $type
	 * @return array|null
	 */
	public function create_discount( $value = 0, $type = 'Percent' ) {
		if ( empty( $value ) && empty( $type ) ) {
			return null;
		}
		$data          = array();
		$data['type']  = $type; // "Percent";
		$data['value'] = $value;
		return $data;
	}
	/**
	 * Summary of create_unit
	 *
	 * @param mixed $code
	 * @return string[]
	 */
	public function create_unit( $code = 'U' ) {
		$data         = array();
		$data['code'] = $code;
		// $data['conversion'] = 1;
		// $data['decimals'] = 2;
		// $data['name'] = '';
		// $data['type'] = '';
		return $data;
	}
	/**
	 * Summary of create_vat
	 *
	 * @param mixed $rate
	 * @param mixed $region
	 * @return array|null
	 */
	public function create_vat( $rate = 0, $region = 'FR' ) {
		if ( empty( $rate ) && empty( $region ) ) {
			return null;
		}
		$data           = array();
		$data['rate']   = doubleval( $rate );
		$data['region'] = $region;
		return $data;
	}
	/**
	 * Summary of country_is_eu
	 *
	 * @param mixed $country
	 * @return bool
	 */
	public function country_is_eu( $country ) {
		return in_array(
			strtoupper($country),
			array(
				'DE',
				'AT',
				'BE',
				'BG',
				'CY',
				'HR',
				'DK',
				'ES',
				'EE',
				'FI',
				'FR',
				'GR',
				'HU',
				'IE',
				'IT',
				'LV',
				'LT',
				'LU',
				'MT',
				'NL',
				'PL',
				'PT',
				'CZ',
				'RO',
				'SK',
				'SI',
				'SE',
			),
			true
		);
	}
	/**
	 * Summary of region_from_address
	 *
	 * @param mixed $country
	 * @param mixed $zipcode
	 * @param mixed $vat_number
	 * @return string
	 */
	public function region_from_address( $country, $zipcode = '', $vat_number = '' ) {
		$country = strtoupper( $country );
		if ( 'FR' === $country ) {
			if ( ( strlen( $zipcode ) === 5 ) && ( substr( $zipcode, 0, 2 ) === '20' ) ) {
				$region = 'Corse';
			} elseif ( ( strlen( $zipcode ) === 5 ) && ( in_array( substr( $zipcode, 0, 3 ), array( '971', '972', '974' ), true ) ) ) {
				$region = 'DOM';
			} else {
				$region = 'FR';
			}
		} elseif ( 'MC' === $country ) {
			$region = 'Monaco';
		} elseif ( $this->country_is_eu( $country ) ) {
			$region = empty( $vat_number ) ? 'FR' : 'EU';
		} elseif ( in_array( $country, array( 'RE', 'GP', 'MQ' ), true ) ) {
			$region = 'DOM';
		} else {
			$region = 'IE';
		}
		return $region;
	}
	/**
	 * Summary of wc_get_line_vat
	 *
	 * @param mixed $order
	 * @param mixed $item
	 * @return array|null
	 */
	public function wc_get_line_vat( $order, $item ) {
		$tax_class = $item->get_tax_class();
		if ( empty( $tax_class ) ) {
			$taxes = $item->get_taxes();
			$total = $taxes['total'] ?? false;
			if ( $total && count( $total ) > 0 ) {
				$tax_rate_id = array_keys( $total )[0];
				$tax         = \WC_Tax::_get_tax_rate( $tax_rate_id, OBJECT );
				AOZ4WC()->sys_log( array( 'AOZ line tax', $taxes, $tax, $item->get_tax_class(), $item->get_tax_class( 'edit' ) ), true );
				if ( ! is_wp_error( $tax ) && ! empty( $tax ) ) {
					return $this->create_vat( $tax->tax_rate, $this->region_from_address( $order->get_billing_country(), $order->get_billing_postcode() ) );
				}
			}
		} else {
			return $this->wc_create_vat( $order, $tax_class );
		}
		return null;
	}
	/**
	 * Summary of wc_create_vat
	 *
	 * @param mixed $order
	 * @param mixed $tax_class
	 * @return array|null
	 */
	public function wc_create_vat( $order, $tax_class ) {
		$country  = $order->get_shipping_country() ? $order->get_shipping_country() : $order->get_billing_country();
		$postcode = $order->get_shipping_postcode() ? $order->get_shipping_postcode() : $order->get_billing_postcode();
		AOZ4WC()->sys_log( 'AOZ tax ' . $country . ' - ' . $postcode . ' ' . $tax_class, true );
		$tax          = new \WC_Tax();
		$tax_criteria = array(
			'country'   => $country,
			'state'     => $order->get_shipping_state() ? $order->get_shipping_state() : $order->get_billing_state(),
			'city'      => $order->get_shipping_city() ? $order->get_shipping_city() : $order->get_billing_city(),
			'postcode'  => $postcode,
			'tax_class' => $tax_class,
		);
		// AOZ4WC()->sys_log('AOZ tax criteria ' . print_r($tax_criteria, true), true);
		$tax_rates_data = $tax->find_rates( $tax_criteria );
		// AOZ4WC()->sys_log('AOZ tax rate ' . $tax_rates_data, true);
		if ( ! empty( $tax_rates_data ) ) {
			return $this->create_vat( reset( $tax_rates_data )['rate'], $this->region_from_address( $country, $postcode ) );
		}
		return $this->create_vat();
	}
	/**
	 * Summary of get_vat_number_fields
	 *
	 * @return string[]
	 */
	private function get_vat_number_fields() {
		return array( 'vat_number', '_vat_number', 'billing_vat_number', '_billing_vat_number' );
	}
	/**
	 * Summary of get_vat_number_from_user
	 *
	 * @param mixed $user
	 */
	private function get_vat_number_from_user( $user ) {
		$user = is_numeric( $user ) ? get_user_by( 'id', $user ) : $user;
		if ( ! $user ) {
			return '';
		}
		$id  = $user->ID;
		$vat = '';
		foreach ( $this->get_vat_number_fields() as $field ) {
			$vat = get_user_meta( $id, $field, true );
			if ( $vat ) {
				break;
			}
		}
		return $vat;
	}
	/**
	 * Summary of get_vat_number_from_order
	 *
	 * @param mixed $order
	 */
	private function get_vat_number_from_order( $order ) {
		$vat = '';
		foreach ( $this->get_vat_number_fields() as $field ) {
			$vat = $order->get_meta( $field );
			if ( $vat ) {
				break;
			}
		}
		return $vat;
	}
	/**
	 * Summary of get_transient
	 *
	 * @param mixed $name
	 * @param mixed $id
	 * @return bool
	 */
	private function get_transient( $name, $id ) {
		return get_transient( 'aoz4wc_sync_' . $name . '_' . $id ) === true;
	}
	/**
	 * Summary of set_transient
	 *
	 * @param mixed $name
	 * @param mixed $id
	 * @param mixed $value
	 * @return void
	 */
	private function set_transient( $name, $id, $value = true ) {
		set_transient( 'aoz4wc_sync_' . $name . '_' . $id, $value, 3 );
	}
	/**
	 * Summary of AOZ4WC_log
	 *
	 * @param mixed $data
	 * @param mixed $level
	 * @return void
	 */
	public function aoz4wc_log( $data, $level = 'info' ) {
		if ( ! class_exists( 'woocommerce' ) ) {
			return;
		}
		$logger = wc_get_logger();
		if ( ! $logger ) {
			return;
		}
		$context = array( 'source' => 'altoviz' );
		switch ( $level ) {
			case 'error':
				$logger->error( wc_print_r( $data, true ), $context );
				break;
			case 'notice':
				$logger->notice( wc_print_r( $data, true ), $context );
				break;
			case 'warning':
				$logger->warning( wc_print_r( $data, true ), $context );
				break;
			default:
				$logger->info( wc_print_r( $data, true ), $context );
		}
	}
}
