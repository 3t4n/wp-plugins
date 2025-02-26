<?php 

if ( !defined( 'ABSPATH' ) ) exit;

function awar_enqueue_templates() {
	$loader = new Twig_Loader_Filesystem(__DIR__ . '/template');
	$twig = new Twig_Environment($loader);

	$age_picker = $twig->render('picker.twig', [
		'prefix' => 'awar',
		'from_year' => date('Y') - 25,
		'to_year' => date('Y') - 15,
		'picker_day' => get_option('awar-picker-day'),
		'picker_month' => get_option('awar-picker-month'),
		'picker_year' => get_option('awar-picker-year'),
		'picker_confirm_description' => get_option('awar-picker-confirm-description'),
		'picker_color_hex' => get_option('awar-color-picker-submit'),
		'picker_color_hex_shadow' => get_option('awar-color-picker-submit-shadow'),
		'picker_color_text' => get_option('awar-color-picker-submit-text-color'),
		'picker_button' => get_option('awar-picker-button'),
		'picker_early' => get_option('awar-picker-early'),
	]);

	$popup = $twig->render('popup.twig', [
		'picker_title' => get_option('awar-picker-title'),
		'prefix' => 'awar',
		'title' => get_option('awar-popup-title'),
		'popup_subtitle' => get_option('awar-popup-subtitle'),
		'content' => $age_picker,
		'required' => true,
	]);

	echo $popup;
}