<?php

defined( 'ABSPATH' ) || exit();

function hide_anything_get_selectors() {
	global $wp;

	$selectors = (array) get_option( 'hide_anything_selectors' );
	if ( empty( $selectors[ $wp->request ] ) ) {
		return [];
	}

	return array_filter( $selectors[ $wp->request ] );
}

function hide_anything_get_admin_selectors() {
	$selectors = (array) get_option( 'hide_anything_admin_selectors' );

	return ! empty( $selectors[''] ) ? array_filter( $selectors[''] ) : [];
}

function hide_anything_can_show() {
	$user          = wp_get_current_user();
	$allowed_roles = array( 'administrator' );

	return array_intersect( $allowed_roles, $user->roles );
}

function hide_anything_get_css() {

	$selectors = is_admin() ? hide_anything_get_admin_selectors() : hide_anything_get_selectors();

	if ( empty( $selectors ) ) {
		return '';
	}

	$common_selectors  = [];
	$desktop_selectors = [];
	$tablet_selectors  = [];
	$mobile_selectors  = [];


	foreach ( $selectors as $selector => $devices ) {
		if ( empty( $selector ) ) {
			continue;
		}

		$is_desktop = in_array( 'desktop', $devices );
		$is_tablet  = in_array( 'tablet', $devices );
		$is_mobile  = in_array( 'mobile', $devices );


		if ( $is_desktop && $is_tablet && $is_mobile ) {
			$common_selectors[] = $selector;
		} else {
			if ( $is_desktop ) {
				$desktop_selectors[] = $selector;
			}
			if ( $is_tablet ) {
				$tablet_selectors[] = $selector;
			}
			if ( $is_mobile ) {
				$mobile_selectors[] = $selector;
			}
		}

	}

	$css = '';

	if ( ! empty( $common_selectors ) ) {
		$css .= sprintf( '%s{display: none !important;}', implode( ',', $common_selectors ) );
	}

	if ( ! empty( $desktop_selectors ) ) {
		$css .= sprintf( '@media (min-width: 992px){%s{display: none !important;}}', implode( ',', $desktop_selectors ) );
	}

	if ( ! empty( $tablet_selectors ) ) {
		$css .= sprintf( '@media (min-width: 768px) and (max-width: 991px){%s{display: none !important;}}',
			implode( ',', $tablet_selectors ) );
	}

	if ( ! empty( $mobile_selectors ) ) {
		$css .= sprintf( '@media (max-width: 767px){%s{display: none !important;}}', implode( ',', $mobile_selectors ) );
	}

	return $css;
}

function hide_anything_get_settings( $key, $default = '' ) {
	$settings = (array) get_option( 'hide_anything_settings' );


	return isset( $settings[ $key ] ) ? $settings[ $key ] : $default;
}
