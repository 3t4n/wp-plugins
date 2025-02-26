<?php

namespace Profitblue\Settings;

use Profitblue\Abstracts\AbstractSettings;
use Profitblue\Settings;

class GeneralSettings extends AbstractSettings {
	const DATA = 'data';
	const PRODUCTS = 'products';
	const ORDERS = 'orders';
	const FEATURE_CONVERSION_TRACKING = 'conversion_tracking';

	public function setup() {
		$items = array(
			array(
				'title'   => esc_html__( 'Enabled features', 'profitblue-financial-reporting-for-woocommerce' ),
				'id'      => 'enabled_features',
				'type'    => 'multi_toggle',
				'options' => [
					[
						'label' => esc_html__( 'Data', 'profitblue-financial-reporting-for-woocommerce' ),
						'value' => self::DATA,
					],
					[
						'label' => esc_html__( 'Products', 'profitblue-financial-reporting-for-woocommerce' ),
						'value' => self::PRODUCTS,
					],
					[
						'label' => esc_html__( 'Orders', 'profitblue-financial-reporting-for-woocommerce' ),
						'value' => self::ORDERS,
					],
					
				],
			),
		);

		$this->wcf->create_woocommerce_settings(
			array(
				'tab'        => array(
					'id'    => 'profitblue-financial-reporting-for-woocommerce',
					'label' => esc_html__( 'profitblue-financial-reporting-for-woocommerce', 'profitblue-financial-reporting-for-woocommerce' ),
				),
				'section'    => array(
					'id'    => Settings::SECTION_GENERAL,
					'label' => esc_html__( 'General settings', 'profitblue-financial-reporting-for-woocommerce' ),
				),
				'page_title' => esc_html__( 'Profitblue Settings', 'profitblue-financial-reporting-for-woocommerce' ),
				'items'      => array(
					array(
						'type'  => 'group',
						'id'    => Settings::SECTION_GENERAL,
						'items' => $items,
					),
				),
			)
		);
	}
}
