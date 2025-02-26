<?php
/**
 * Class AWSA_Shipping_Settings_Page_Fields
 *
 * @version           1.1.0
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @package           AWSA_Shipping
 */

namespace AWSA_Shipping;

/**
 * Class AWSA_Shipping_Settings_Page_Fields
 */
class Settings_Page_Fields extends \AWSA_Core\APIs\Settings\Settings_Page_Fields {

	/**
	 * @param array $fields_by_groups
	 *
	 * @return array
	 */
	public static function get_settings_fields( array $fields_by_groups ): array {

		$new_fields_by_groups = array(
			'general' => array(
				'awsa-calculate-from-vendor-address' => array(
					'title'        => __( 'Calculation of shipping costs', 'awsa-shipping' ),
					'type'         => 'checkbox',
					'name'         => 'awsa-calculate-from-vendor-address',
					'class'        => 'aw-checkbox',
					'value'        => 'yes',
					'label'        => __( 'Enable the calculation of postage from the seller', 'awsa-shipping' ),
					'description'  => __(
						'If the seller s address is not complete. The primary address in WooCommerce replaces it',
						'awsa-shipping'
					),
					'option_group' => 'awsa_shipping_settings',
					'option_key'   => 'calculate-from-vendor-address',
				),
				'awsa-validate-postal-code'          => array(
					'title'        => __( 'Postcode', 'awsa-shipping' ),
					'type'         => 'checkbox',
					'name'         => 'awsa-validate-postal-code',
					'class'        => 'aw-checkbox',
					'value'        => 'yes',
					'label'        => __( 'Postcode validation on checkout page', 'awsa-shipping' ),
					'option_group' => 'awsa_shipping_settings',
					'option_key'   => 'validate-postal-code',
				),
				'awsa-validate-mobile'               => array(
					'title'        => __( 'Mobile', 'awsa-shipping' ),
					'type'         => 'checkbox',
					'name'         => 'awsa-validate-mobile',
					'class'        => 'aw-checkbox',
					'value'        => 'yes',
					'label'        => __( 'Mobile number validation on checkout page', 'awsa-shipping' ),
					'option_group' => 'awsa_shipping_settings',
					'option_key'   => 'validate-mobile',
				),
				'awsa-product-min-weight'            => array(
					'title'        => __( 'Default weight', 'awsa-shipping' ),
					'type'         => 'number',
					'name'         => 'awsa-product-min-weight',
					'class'        => 'aw-number',
					'placeholder'  => __( 'Weight to grams', 'awsa-shipping' ),
					'min'          => 0,
					'description'  => __(
						'This value is for products for which weight is not defined (Weight to grams)',
						'awsa-shipping'
					),
					'option_group' => 'awsa_shipping_settings',
					'option_key'   => 'product-min-weight',
				),
				'awsa-shipping-icon'                 => array(
					'title'        => __( 'Icon of shipping method', 'awsa-shipping' ),
					'type'         => 'checkbox',
					'name'         => 'awsa-shipping-icon',
					'class'        => 'aw-checkbox',
					'value'        => 'no',
					'label'        => __( 'Enable icon shipping method on checkout and cart page', 'awsa-shipping' ),
					'option_group' => 'awsa_shipping_settings',
					'option_key'   => 'shipping-icon',
				),
				'awsa-add-order-statuses'            => array(
					'title'         => __( 'Add new status to order', 'awsa-shipping' ),
					'type'          => 'multicheckbox',
					'id'            => 'awsa-add-order-statuses',
					'name'          => 'awsa-add-order-statuses',
					'class'         => 'aw-checkbox',
					'label_classes' => 'display-block',
					'checkboxes'    => array(
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
					'option_group'  => 'awsa_shipping_settings',
					'option_key'    => 'add-order-statuses',
				),
				'awsa-parcel-details'                 => array(
					'title'        => __( 'Display parcel details', 'awsa-shipping' ),
					'type'         => 'multicheckbox',
					'id'           => 'awsa-parcel-details',
					'name'         => 'awsa-parcel-details',
					'class'        => 'aw-checkbox',
					'label_classes' => 'display-block',
					'checkboxes'    => array(
						'thank-you'   => array(
							'label' => __( 'thank you page', 'awsa-shipping' ),
							'value' => 'thank-you',
						),
						'view-order' => array(
							'label' => __( 'view order in my account page', 'awsa-shipping' ),
							'value' => 'view-order',
						),
					),
					'option_group' => 'awsa_shipping_settings',
					'option_key'   => 'parcel-details-display',
				),

				'awsa-hide-parcel-details'                 => array(
					'title'        => __( 'Hide parcel details', 'awsa-shipping' ),
					'type'         => 'multicheckbox',
					'id'           => 'awsa-hide-parcel-details',
					'name'         => 'awsa-hide-parcel-details',
					'class'        => 'aw-checkbox',
					'label_classes' => 'display-block',
					'checkboxes'    => array(
						'not-require-shipping'   => array(
							'label' => __( 'Hide if the order does not require shipping', 'awsa-shipping' ),
							'value' => 'not-require-shipping',
						),
						'empty-parcel-code' => array(
							'label' => __( 'Hide if parcel code is empty', 'awsa-shipping' ),
							'value' => 'empty-parcel-code',
						),
					),
					'option_group' => 'awsa_shipping_settings',
					'option_key'   => 'hide-parcel-details',
				),
			),
		);

		return array_merge( $fields_by_groups, $new_fields_by_groups );
	}

}
