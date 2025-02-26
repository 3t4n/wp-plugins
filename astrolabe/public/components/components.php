<?php
/**
 * Helper functions to display components
 *
 * @package Astrolabe
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Display the main results map component
 *
 * @since 1.0.0
 */
function astr_hamburger_menu() {
	$component = new ASTR\Public\Components\Hamburger_Menu\Hamburger_Menu();
	return $component->render();
}
