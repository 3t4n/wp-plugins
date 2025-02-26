<?php
/**
 * Class AWSA_Shipping_Settings_Page_Fields
 *
 * @package           AWSA_Shipping
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @version           1.1.0
 */

/**
 * Class AWSA_Shipping_Settings_Page_Fields
 */
class AWSA_Shipping_Settings_Page_Fields extends AWSA_Settings_Page_Fields {
	/**
	 * Get Settings Fields
	 *
	 * @return mixed
	 */
	public function get_settings_fields() {
		$settings = awsa_shipping_get_settings();
		$fields   = array(
			'awsa-calculate-from-vendor-address' => array(
				'title'         => __( 'Calculation of shipping costs', 'awsa-shipping' ),
				'type'          => 'checkbox',
				'name'          => 'awsa-calculate-from-vendor-address',
				'class'         => 'aw-checkbox',
				'value'         => 'yes',
				'current_value' => isset( $settings['calculate-from-vendor-address'] ) ? $settings['calculate-from-vendor-address'] : 'yes',
				'label'         => __( 'Enable the calculation of postage from the seller', 'awsa-shipping' ),
				'description'   => __( 'If the seller s address is not complete. The primary address in WooCommerce replaces it', 'awsa-shipping' ),
			),
			'awsa-validate-postal-code'          => array(
				'title'         => __( 'Postcode', 'awsa-shipping' ),
				'type'          => 'checkbox',
				'name'          => 'awsa-validate-postal-code',
				'class'         => 'aw-checkbox',
				'value'         => 'yes',
				'current_value' => isset( $settings['validate-postal-code'] ) ? $settings['validate-postal-code'] : 'yes',
				'label'         => __( 'Postcode validation on checkout page', 'awsa-shipping' ),
			),
			'awsa-validate-mobile'               => array(
				'title'         => __( 'Mobile', 'awsa-shipping' ),
				'type'          => 'checkbox',
				'name'          => 'awsa-validate-mobile',
				'class'         => 'aw-checkbox',
				'value'         => 'yes',
				'current_value' => isset( $settings['validate-mobile'] ) ? $settings['validate-mobile'] : 'yes',
				'label'         => __( 'Mobile number validation on checkout page', 'awsa-shipping' ),
			),
			'awsa-product-min-weight'            => array(
				'title'       => __( 'Default weight', 'awsa-shipping' ),
				'type'        => 'number',
				'name'        => 'awsa-product-min-weight',
				'class'       => 'aw-number',
				'placeholder' => __( 'Weight to grams', 'awsa-shipping' ),
				'min'         => 0,
				'value'       => isset( $settings['product-min-weight'] ) ? $settings['product-min-weight'] : '',
				'description' => __( 'This value is for products for which weight is not defined', 'awsa-shipping' ),
			),
			'awsa-shipping-icon'                 => array(
				'title'         => __( 'Icon of shipping method', 'awsa-shipping' ),
				'type'          => 'checkbox',
				'name'          => 'awsa-shipping-icon',
				'class'         => 'aw-checkbox',
				'value'         => 'no',
				'current_value' => isset( $settings['shipping-icon'] ) ? $settings['shipping-icon'] : 'no',
				'label'         => __( 'Enable icon shipping method on checkout and cart page', 'awsa-shipping' ),
			),
			'awsa-add-order-statuses'            => array(
				'title'         => __( 'Add new status to order', 'awsa-shipping' ),
				'type'          => 'multicheckbox',
				'id'            => 'awsa-add-order-statuses',
				'name'          => 'awsa-add-order-statuses',
				'class'         => 'aw-checkbox',
				'label_classes' => 'd-block',
				'value'         => array(
					'wc-aw-d-warehouse'   => array(
						'label' => __( 'Delivered to Warehouse', 'awsa-shipping' ),
						'value' => 'wc-aw-d-warehouse',
					),
					'wc-aw-ready-to-send' => array(
						'label' => __( 'Ready to send', 'awsa-shipping' ),
						'value' => 'wc-aw-ready-to-send',
					),
					'wc-aw-sended'        => array(
						'label' => __( 'Delivered to Post', 'awsa-shipping' ),
						'value' => 'wc-aw-sended',
					),
				),
				'current_value' => isset( $settings['add-order-statuses'] ) ? $settings['add-order-statuses'] : array(),
			),
		);

		return $fields;
	}

	/**
	 * Update Settings
	 *
	 * @param mixed $settings
	 * @return void
	 */
	public function update_settings( $settings ) {
		$fields   = $this->get_settings_fields();
		$settings = array(
			'calculate-from-vendor-address' => $settings['awsa-calculate-from-vendor-address'],
			'validate-postal-code'          => $settings['awsa-validate-postal-code'],
			'validate-mobile'               => $settings['awsa-validate-mobile'],
			'product-min-weight'            => $settings['awsa-product-min-weight'],
			'shipping-icon'                 => $settings['awsa-shipping-icon'],
			'add-order-statuses'            => $settings['awsa-add-order-statuses'],
		);

		awsa_shipping_update_settings( $settings );
	}
}
