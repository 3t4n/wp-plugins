<?php

define('AWAR_DB_CONFIGURATION', [
	'awar-popup-subtitle' => 'Please confirm your age.',
	'awar-popup-title' => 'Confirm your age',
	'awar-picker-day' => 'Day',
	'awar-picker-month' => 'Month',
	'awar-picker-year' => 'Year',
	'awar-picker-confirm-description' => 'I hereby declare that the information made is correct and I agree that this data will be collected electronically in order to confirm my age.',
	'awar-picker-title' => 'Enter your age',
	'awar-picker-button' => 'Confirm my age',
	'awar-picker-early' => 'or earlier',
	'awar-color-picker-submit' => '#4ea4e6',
	'awar-color-picker-submit-shadow' => 'rgb(56, 139, 202)',
    'awar-color-picker-submit-text-color' => 'white',
]);

define('AWAR_DB_ADMIN_MENU', [
	'@headlines' => [
		'AWEOS age restirction',
		"Welcome to the admin area of 'AWEOS age restirction'",
	],
	'awar-color-picker-submit' => [
		'type' => 'color-picker',
		'js-target-class' => 'awar-color-picker-submit',
		'title' => '<strong>Submit-Button Background Color</strong>',
	],
	'awar-color-picker-submit-shadow' => [
		'type' => 'color-picker',
		'js-target-class' => 'awar-color-picker-submit',
		'title' => '<strong>Submit-Button Shadow Color</strong>',
	],
    'awar-color-picker-submit-text-color' => [
		'type' => 'option',
		'options' => ['white', 'black'],
		'title' => '<strong>Submit-Button Text Color</strong>',
	],
	'awar-popup-subtitle' => [
		'type' => 'text-field',
		'title' => 'Subtitle e.g. Please confirm your age.',
	],
	'awar-popup-title' => [
		'type' => 'text-field',
		'title' => 'Title e.g. Confirm your age',
	],
	'awar-picker-day' => [
		'type' => 'text-field',
		'title' => 'Day',
	],
	'awar-picker-month' => [
		'type' => 'text-field',
		'title' => 'Month',
	],
	'awar-picker-year' => [
		'type' => 'text-field',
		'title' => 'Year',
	],
	'awar-picker-confirm-description' => [
		'type' => 'text-field',
		'title' => 'Check-Box Description e.g. I hereby declare that the information made is correct [...]',
	],
	'awar-picker-title' => [
		'type' => 'text-field',
		'title' => '(Age Picker Title) e.g. Enter your age',
	],
	'awar-picker-button' => [
		'type' => 'text-field',
		'title' => 'Button Description',
	],
	'awar-picker-early' => [
		'type' => 'text-field',
		'title' => 'Text for "or earlier" (Inside Age Year Picker)',
	],
]);