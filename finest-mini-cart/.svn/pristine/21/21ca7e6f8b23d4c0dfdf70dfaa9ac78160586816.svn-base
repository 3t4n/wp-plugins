<?php

Kirki::add_section('general_settings', array(
	'title' => esc_html__('General Options', 'finest-mini-cart'),
	'panel' => 'fmc_panel',
	'priority' => 160,
)
);



Kirki::add_field('fmc_panel', [
	'type' => 'switch',
	'settings' => 'fmc_count_hide_checkout',
	'label' => esc_html__('Show Cart on Checkout page', 'finest-mini-cart'),
	'section' => 'general_settings',
	'default' => 'on',
	'priority' => 10,
	'choices' => [
		'on' => esc_html__('Enable', 'finest-mini-cart'),
		'off' => esc_html__('Disable', 'finest-mini-cart'),
	],

]);
Kirki::add_field('fmc_panel', [
	'type' => 'switch',
	'settings' => 'fmc_count_hide_cart',
	'label' => esc_html__('Show Cart on Cart page', 'finest-mini-cart'),
	'section' => 'general_settings',
	'default' => 'on',
	'priority' => 10,
	'choices' => [
		'on' => esc_html__('Enable', 'finest-mini-cart'),
		'off' => esc_html__('Disable', 'finest-mini-cart'),
	],
]);



Kirki::add_field('fmc_panel', [
	'type' => 'switch',
	'settings' => 'fmc_count_hide_cart',
	'label' => esc_html__('Show Cart on Cart page', 'finest-mini-cart'),
	'section' => 'general_settings',
	'default' => 'on',
	'priority' => 10,
	'choices' => [
		'on' => esc_html__('Enable', 'finest-mini-cart'),
		'off' => esc_html__('Disable', 'finest-mini-cart'),
	],
]);
/* 
$pages = get_pages();

// Initialize an array to store the page ID => page name pairs
$pageArray = array();

foreach ($pages as $page) {
	// Add page ID => page name pair to the array
	$pageArray[$page->ID] = $page->post_title;
}

Kirki::add_field('fmc_panel', [
	'type' => 'select',
	'settings' => 'fmc_page_hide_cart',
	'label' => esc_html__('Show Cart on Cart page', 'finest-mini-cart'),
	'section' => 'general_settings',
	'multiple' => 9999,
	'priority' => 10,
	'choices' => $pageArray,
]); */