<?php

namespace MuzaPay\PostTypes;

use MuzaPayDeps\BenefitPlusGatewaySdk\Model\InitPaymentRequest;
use MuzaPayDeps\Wpify\CustomFields\CustomFields;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

class ProductPostType {
	public function __construct(
		private CustomFields $custom_fields
	) {
		add_action( 'init', array( $this, 'register_custom_fields' ) );
	}

	public function register_custom_fields() {
		$this->custom_fields->create_product_options(
			[
				'tab'           => array(
					'id'       => 'muzapay',
					'label'    => 'MúzaPay',
					'priority' => 100,
				),
				'init_priority' => 10,
				'items'         => array(
					[
						'id'      => '_muzapay_category',
						'type'    => 'select',
						'label'   => 'MúzaPay Category',
						'options' => [
							[
								'value' => InitPaymentRequest::PRODUCT_CODE_LEISURE,
								'label' => InitPaymentRequest::PRODUCT_CODE_LEISURE,
							],
							[
								'value' => InitPaymentRequest::PRODUCT_CODE_FOOD,
								'label' => InitPaymentRequest::PRODUCT_CODE_FOOD,
							],
						],
					],
				),
			]
		);
	}

}
