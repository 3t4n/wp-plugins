<?php

if (!defined('ABSPATH')) {
	exit;
}
$new_settings = array(
	array(
		'id'	=> 'woom_template_wc_tab',
		'type' => 'title',
		'name' => __('Woocommerce', 'wc-messaging'),
	),
	array(
		'id' => 'woom_woocommerce',
		'type' => 'woom_config_template_settings',
		'name' => __('Woocommerce', 'wc-messaging'),
		'fields' => $this->get_settings_statuses('woom_woocommerce_config_per_status', wc_get_order_statuses()),
		'desc_tip'	=> true
	),
	array(
		'id' => 'woom_nonce',
		'type' => 'woom_hidden',
		'value' => wp_create_nonce('woom-template-settings')
	),
	array(
		'id'	=> 'woom_general_settings',
		'type'	=> 'sectionend',
		'name'	=> 'end_section',
	),
);
?>