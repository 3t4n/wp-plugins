<?php

namespace WooCommerceVariationSwatches\Admin;

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

/**
 * Notices class.
 *
 * @since 1.1.1
 * @package WooCommerceVariationSwatches\Admin
 */
class Notices {

	/**
	 * Notices constructor.
	 *
	 * @since 1.1.1
	 */
	public function __construct() {
		add_action( 'admin_init', array( $this, 'admin_notices' ) );
	}

	/**
	 * Admin notices.
	 *
	 * @since 1.1.1
	 */
	public function admin_notices() {
		$installed_time = get_option( 'wcvs_is_installed' );
		$current_time   = wp_date( 'U' );

		if ( ! defined( 'WCVS_PRO_VERSION' ) ) {
			WCVS()->notices->add(
				array(
					'message'     => __DIR__ . '/views/notices/upgrade.php',
					'notice_id'   => 'wcvs_upgrade_notice',
					'style'       => 'border-left-color: #0542fa;',
					'dismissible' => false,
				)
			);
		}

		// Show after 5 days.
		if ( $installed_time && $current_time > ( $installed_time + ( 5 * DAY_IN_SECONDS ) ) ) {
			WCVS()->notices->add(
				array(
					'message'     => __DIR__ . '/views/notices/review.php',
					'dismissible' => false,
					'notice_id'   => 'wcvs_review_notice',
					'style'       => 'border-left-color: #0542fa;',
				)
			);
		}
	}
}
