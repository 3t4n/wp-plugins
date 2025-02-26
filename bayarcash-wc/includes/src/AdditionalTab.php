<?php

namespace Bayarcash\WooCommerce;

defined('ABSPATH') || exit;

// Add settings tab
add_filter('woocommerce_settings_tabs_array', __NAMESPACE__ . '\add_settings_tab', 50);
add_action('woocommerce_settings_tabs_bayarcash_additional_merchant', __NAMESPACE__ . '\settings_tab');
add_action('woocommerce_update_options_bayarcash_additional_merchant', __NAMESPACE__ . '\update_settings');

function add_settings_tab($settings_tabs) {
	$settings_tabs['bayarcash_additional_merchant'] = __('Bayarcash Multi-Merchant', 'bayarcash-additional-merchant');
	return $settings_tabs;
}

function settings_tab(): void {
	woocommerce_admin_fields(get_settings());
}

function update_settings(): void {
	woocommerce_update_options(get_settings());
}

function get_settings() {
	$settings = [
		'section_title' => [
			'name'  => __('Multi-Merchant Configuration Settings', 'bayarcash-additional-merchant'),
			'type'  => 'title',
			'desc'  => __('Configure multiple Bayarcash merchant accounts for enhanced payment processing capabilities.', 'bayarcash-additional-merchant'),
			'id'    => 'bayarcash_additional_merchant_section',
		],
		'number_of_gateways' => [
			'name'     => __('Additional FPX Payment Gateways', 'bayarcash-additional-merchant'),
			'type'     => 'number',
			'desc'     => __('Specify the number of additional Bayarcash merchant gateways to implement for your enterprise setup.', 'bayarcash-additional-merchant'),
			'id'       => 'bayarcash_additional_fpx',
			'default'  => '1',
			'custom_attributes' => [
				'min'      => '2',
				'max'      => '50',
				'step'     => '1',
				'required' => 'required'
			],
		],
		'section_end' => [
			'type' => 'sectionend',
			'id'   => 'bayarcash_additional_merchant_section_end'
		]
	];

	return apply_filters('bayarcash_additional_merchant_settings', $settings);
}