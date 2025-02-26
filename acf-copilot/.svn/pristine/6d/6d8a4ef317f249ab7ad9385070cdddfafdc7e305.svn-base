<?php
/**
 * [Short description]
 *
 * @package    DEVRY\ACFC
 * @copyright  Copyright (c) 2025, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 * @since      1.0
 */

namespace DEVRY\ACFC;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

/**
 * Dismiss the rating notice, if the user chooses to do so.
 */
function acfc_dismiss_admin_notice() {
	$action   = ( isset( $_REQUEST['action'] ) ) ? sanitize_text_field( wp_unslash( $_REQUEST['action'] ) ) : '';
	$_wpnonce = ( isset( $_REQUEST['_wpnonce'] ) ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) ) : '';

	if ( empty( $action ) || empty( $_wpnonce ) ) {
		return;
	}

	if ( 'acfc_dismiss_rating_notice' === $action ) {
		if ( wp_verify_nonce( $_wpnonce, 'acfc_rating_notice_nonce' ) ) {
			add_option( 'acfc_rating_notice', true );
		}
	}
}

add_action( 'admin_init', __NAMESPACE__ . '\acfc_dismiss_admin_notice' );

/**
 * Dismiss the upgrade notice, if the user chooses to do so.
 */
function acfc_dismiss_upgrade_notice() {
	$action   = ( isset( $_REQUEST['action'] ) ) ? sanitize_text_field( wp_unslash( $_REQUEST['action'] ) ) : '';
	$_wpnonce = ( isset( $_REQUEST['_wpnonce'] ) ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) ) : '';

	if ( empty( $action ) || empty( $_wpnonce ) ) {
		return;
	}

	if ( 'acfc_dismiss_upgrade_notice' === $action ) {
		if ( wp_verify_nonce( $_wpnonce, 'acfc_upgrade_notice_nonce' ) ) {
			add_option( 'acfc_upgrade_notice', true );
		}
	}
}

add_action( 'admin_init', __NAMESPACE__ . '\acfc_dismiss_upgrade_notice' );
