<?php
/**
 * Helper PHP functions for the plugin
 *
 * @package Astrolabe
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get the menu ID of the menu currently appened on the astrolabe-menu location
 *
 * @param string $location the location of the specific astro menu, e.g. astrolabe-hamburger-menu or astrolabe-menu
 */
function astr_get_menu_id( $location ) {
	$menu_locations      = get_nav_menu_locations();
	$astro_main_location = $location;

	if ( isset( $menu_locations[ $astro_main_location ] ) ) {
		$menu_id = $menu_locations[ $astro_main_location ];

		return $menu_id;
	}

	return null;
}
