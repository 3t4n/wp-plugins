<?php

use Mollie\Api\Types\PaymentMethod;

class Mollie_EDD_Gateway_Giftcard extends Mollie_EDD_Gateway_Mollie_Abstract
{
	/**
	 *
	 */
	public function __construct() {
		$this->supports = array (
			'products',
			'refunds',
		);
		
		/* Has issuers dropdown */
		$this->has_fields = TRUE;

		parent::__construct();
	}

	/**
	 * Initialise Gateway Settings Form Fields
	 */
	public function init_form_fields()
	{
		parent::init_form_fields();
		// $this->form_fields = array_merge($this->form_fields, array(
		// 	'issuers_dropdown_shown' => array(
		// 		'title'       => __('Show gift cards dropdown', 'edd-mollie-gateway'),
		// 		'type'        => 'checkbox',
		// 		'description' => sprintf(__('If you disable this, a dropdown with various gift cards will not be shown in the EDD checkout, so users will select a gift card on the Mollie payment page after checkout.', 'edd-mollie-gateway'), $this->getDefaultTitle()),
		// 		'default'     => 'yes',
		// 		'desc_tip'    => true,
		// 	),
		// 	'issuers_empty_option' => array(
		// 		'title'       => __('Issuers empty option', 'edd-mollie-gateway'),
		// 		'type'        => 'text',
		// 		'description' => sprintf(__('This text will be displayed as the first option in the gift card dropdown, but only if the above \'Show gift cards dropdown\' is enabled.', 'edd-mollie-gateway'), $this->getDefaultTitle()),
		// 		'default'     => 'Select your bank',
		// 		'desc_tip'    => true,
		// 	),
		// ));
	}

	/**
	 * @return string
	 */
	public function getMollieMethodId() {
		return PaymentMethod::GIFTCARD;
	}

	/**
	 * @return string
	 */
	public function getDefaultTitle() {
		return __( 'Gift cards', 'edd-mollie-gateway' );
	}

	/**
	 * @return string
	 */
	protected function getSettingsDescription() {
		return '';
	}

	/**
	 * @return string
	 */
	protected function getDefaultDescription() {
		/* translators: Default gift card dropdown description, displayed above issuer drop down */
		return __('Select your gift card', 'edd-mollie-gateway');
	}

	/**
	 * Display fields below payment method in checkout
	 */
	public function payment_fields()
	{
		// Display description above issuers
		parent::payment_fields();
		$test_mode = EDD_Mollie_Helper()->settings->isTestModeEnabled();
		$issuers = EDD_Mollie_Helper()->data->getMethodIssuers(
			$test_mode,
			$this->getMollieMethodId()
		);
		$selected_issuer = $this->getSelectedIssuer();
		$html  = '<select name="' . 'edd_mollie_issuer_' . $this->id . '">';
		$html .= '<option value="">' . $this->get_option( 'issuers_empty_option',  $this->getDefaultDescription() ) . '</option>';
		foreach ($issuers as $issuer)
		{
			$html .= '<option value="' . esc_attr($issuer->id) . '"' . ($selected_issuer == $issuer->id ? ' selected=""' : '') . '>' . esc_html($issuer->name) . '</option>';
		}
		$html .= '</select>';
		
		$allowed_html = array(
			'select' => array(
				'name' => array(),
			),
			'option' => array(
				'value' => array(),
				'selected' => array(),
			),
		);
		
		echo wp_kses( wpautop( wptexturize( $html ) ), $allowed_html );
	}

}
