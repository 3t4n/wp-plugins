<?php

/**
 * Functions file
 */

if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Check if current page is a Lightning Dashboard page
 *
 * @since 1.0.0
 * @return bool
 */

function ldash_page() {

	if( is_admin() ) {

		global $pagenow;

		$pages = array(
			'toplevel_page_lightning-dashboard',
		);

		if( in_array( get_current_screen()->id, $pages ) ) {

			$is_page = true;

		} else {

			$is_page = false;

		}

	} else {

		$is_page = false;

	}

	return $is_page;

}

/**
 * Get current tab
 *
 * @since 1.0.0
 * @return string Current tab or fallback
 */

function ldash_current_tab() {

	// Using request as can be _GET if a normal page, but this function called from AJAX as _POST

	if( isset( $_REQUEST['tab'] ) && !empty( $_REQUEST['tab'] ) ) {

		$tab = $_REQUEST['tab'];

	} else {

		$tab = 'orders';  // always starts with orders tab as first

	}

	return $tab;

}

/**
 * Get current option
 *
 * @since 1.0.0
 * @return string Current option or fallback
 */

function ldash_current_option() {

	if( isset( $_REQUEST['option'] ) && !empty( $_REQUEST['option'] ) ) {

		$option = $_REQUEST['option'];

	} else {

		// Default options (add setting for this in settings and add option on activation)

		if( ldash_current_tab() == 'orders' ) {

			if( !empty( get_option( 'ldash_orders_options_default_option' ) ) ) {

				$option = get_option( 'ldash_orders_options_default_option' );

			} else {

				$option = 'last-7-days'; // fallback

			}

		} elseif( ldash_current_tab() == 'products' ) {

			if( !empty( get_option( 'ldash_products_options_default_option' ) ) ) {

				$option = get_option( 'ldash_products_options_default_option' );

			} else {

				$option = 'all-products'; // fallback

			}

		} elseif( ldash_current_tab() == 'customers' ) {

			if( !empty( get_option( 'ldash_customers_options_default_option' ) ) ) {

				$option = get_option( 'ldash_customers_options_default_option' );

			} else {

				$option = 'all-customers'; // fallback

			}

		} elseif( ldash_current_tab() == 'settings' ) {

			$option = 'general'; // always starts with general option as first

		}

	}

	return $option;

}

/**
 * Get current sub option
 *
 * @since 1.0.0
 * @return string|false Current sub option or false
 */

function ldash_current_sub_option() {

	if( isset( $_REQUEST['sub_option'] ) && !empty( $_REQUEST['sub_option'] ) ) {

		$sub_option = $_REQUEST['sub_option'];

	} else {

		$sub_option = false;

	}

	return $sub_option;

}

/**
 * Get all add-ons
 *
 * @since 1.0.0
 * @return array All the registered add-ons
 */

function ldash_add_ons() {

	$add_ons = array();
	$add_ons = apply_filters( 'ldash_add_ons', $add_ons );

	if( !empty( $add_ons ) ) {
		ksort( $add_ons );
	}

	return $add_ons;

}

/**
 * Check if an add-on is active
 *
 * @since 1.0.0
 * @param string $add_on Add-On to be checked is active
 * @return bool
 */

function ldash_add_on_active( $add_on ) {

	$active_status = false;

	if( !empty( $add_on ) ) {

		if( !empty( ldash_add_ons() ) ) {

			foreach( ldash_add_ons() as $id => $label ) {
				$active_ids[] = $id;
			}

			if( !empty( $active_ids ) ) {

				if( in_array( $add_on, $active_ids ) ) {

					$active_status = true;

				}

			}

		}

	}

	return $active_status;

}