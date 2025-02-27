<?php

namespace Pelecardwc\Invoices;

use Pelecardwc\Traits\Singleton;
use WC_Order;

class PayPer extends Base {

	use Singleton;

	public static $provider = 'payper';

	protected static $item_scheme = [
		'description',
		'price_per_unit',
		'quantity',
	];

	/**
	 * Payper constructor.
	 */
	public function __construct() {
		add_filter( 'wppc/invoices/' . self::$provider . '_formatted_item', [ $this, 'add_no_vat' ], 10, 2 );

		parent::__construct();
	}

	/**
	 * @param array                  $item_data
	 * @param \WC_Order_Item_Product $item
	 *
	 * @return array
	 */
	public function add_no_vat( array $item_data, \WC_Order_Item_Product $item ): array {

		$payper_include_vat = true;
		if ( 'yes' === $this->get_option( 'payper_no_vat' ) ){
			$payper_include_vat = false;
			
		} else {
			$payper_include_vat = true;
		}

		$product = $item->get_product();
		$item_data['Include_vat'] = $payper_include_vat;

		return $item_data;
	}

	public function get_checkout_args( array $args, WC_Order $order ): array {

		$typeDocument = $this->get_option( 'payper_doc_type' );
		if ( sizeof( $order->get_refunds() ) > 0 ) {
			$typeDocument = 'Credit';
		}


		$args['PayperParameters'] = $this->apply_checkout_filters( [
			'typeDocument' => $typeDocument, 
			'DataPayper' => [
				'customer_unique_id' => '',
				'customer_mail' => $order->get_billing_email(),
				'customer_name' => $order->get_formatted_billing_full_name(),
				'document_remarks' => '',
				'customer_mobile' => '',
				'customer_business_phone' => $order->get_billing_phone(),
				'customer_address' => $order->get_billing_address_1(),
				'document_subject' => sprintf( __( 'Order #%s', 'wc-pelecard-gateway' ), $order->get_order_number() ),
				'document_lang' => $this->get_option( 'payper_email_lang' ),
				'document_no_vat' => 'yes' === $this->get_option( 'payper_no_vat' ),
				'send_by_mail' => 'yes' === $this->get_option( 'payper_send_mail' ),
				'developer_email' => $this->get_option( 'payper_developer_email' ),
				'extra_recipients' => '',
				'reference_document_id' => '',
				'document_rounded' => false,
				'invoice_lines' => $this->get_formatted_items( $order ),
			]
		], $order );

		return $args;
	}
	public function get_admin_fields( array $fields ): array {
		$fields = array_merge( $fields, [
			'payper_title' => [
				'title' => __( 'PayPer (optional)', 'wc-pelecard-gateway' ),
				'type' => 'title',
			],
			'payper' => [
				'title' => __( 'Enable/Disable', 'wc-pelecard-gateway' ),
				'type' => 'checkbox',
				'description' => '',
				'label' => __( 'Enable PayPer', 'wc-pelecard-gateway' ),
				'default' => 'no',
				'desc_tip' => false,
			],
			'payper_no_vat' => [
				'title' => __( 'NO VAT', 'wc-pelecard-gateway' ),
				'type' => 'checkbox',
				'description' => '',
				'label' => __( 'NO VAT', 'wc-pelecard-gateway' ),
				'default' => 'no',
				'desc_tip' => false,
			],
			'payper_doc_type' => [
				'title' => __( 'Document Type', 'wc-pelecard-gateway' ),
				'type' => 'select',
				'class' => 'wc-enhanced-select',
				'description' => '',
				'default' => 'invrec',
				'desc_tip' => false,
				'options' => [
					'Invoice' => __( 'Invoice', 'wc-pelecard-gateway' ),
					'Proforma' => __( 'Proforma', 'wc-pelecard-gateway' ),
					'Invoice-Receipt' => __( 'Invoice-Receipt', 'wc-pelecard-gateway' ),
					'Receipt' => __( 'Receipt', 'wc-pelecard-gateway' ),
				],
			],
			'payper_email_lang' => [
				'title' => __( 'Document Language', 'wc-pelecard-gateway' ),
				'type' => 'select',
				'class' => 'wc-enhanced-select',
				'description' => '',
				'default' => 'he',
				'desc_tip' => false,
				'options' => [
					'hb' => __( 'Hebrew', 'wc-pelecard-gateway' ),
					'en' => __( 'English', 'wc-pelecard-gateway' ),
				],
			],
			'payper_send_mail' => [
				'title' => __( 'Send mail', 'wc-pelecard-gateway' ),
				'type' => 'checkbox',
				'description' => '',
				'label' => __( 'Send mail', 'wc-pelecard-gateway' ),
				'default' => 'no',
				'desc_tip' => true,
			],
			'payper_developer_email' => [
				'title' => __( 'Developer Email', 'wc-pelecard-gateway' ),
				'type' => 'email',
				'description' => '',
				'default' => '',
				'desc_tip' => false,
			],
		] );

		return $fields;
	}
}
