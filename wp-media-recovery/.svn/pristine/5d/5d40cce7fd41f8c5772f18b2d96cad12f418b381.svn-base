<?php
/**
 * [Short description]
 *
 * @package    DEVRY\MLR
 * @copyright  Copyright (c) 2024, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 * @since      1.4
 */

namespace DEVRY\MLR;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

/**
 * Add plugin rating notice to get some feedback for users.
 */
function mlr_display_rating_notice() {
	$mlr_admin = new MLR_Admin();

	$screen = get_current_screen();

	if ( ! get_option( 'mlr_rating_notice', '' )
		&& strpos( $screen->id, 'acfc_' ) ) {
		?>
			<div class="notice notice-info is-dismissible mlr-admin">
				<h3><?php echo esc_html( MLR_PLUGIN_NAME ); ?></h3>
				<p>
					<?php
					printf(
						wp_kses(
							/* translators: %1$s is replaced with "by giving it 5 stars rating" */
							__( '✨💪🔌 Could you kindly support the plugin %1$s? Thank you in advance!', 'wp-media-recovery' ),
							json_decode( MLR_PLUGIN_ALLOWED_HTML_ARR, true )
						),
						'<strong>' . esc_html__( 'by giving it 5 stars rating', 'wp-media-recovery' ) . '</strong>'
					);
					?>
				</p>
				<div class="button-group">
					<a href="<?php echo esc_url( MLR_PLUGIN_WPORG_RATE ); ?>" target="_blank" class="button button-primary">
						<?php echo esc_html__( 'Rate us @ WordPress.org', 'wp-media-recovery' ); ?>
						<i class="dashicons dashicons-external"></i>
					</a>
					<a href="<?php echo esc_url( admin_url( $mlr_admin->admin_page . MLR_SETTINGS_SLUG . '&_wpnonce=' . wp_create_nonce( 'mlr_rating_notice_nonce' ) . '&action=mlr_dismiss_rating_notice' ) ); ?>" class="button">
						<?php echo esc_html__( 'I already did', 'wp-media-recovery' ); ?>
					</a>
					<a href="<?php echo esc_url( admin_url( $mlr_admin->admin_page . MLR_SETTINGS_SLUG . '&_wpnonce=' . wp_create_nonce( 'mlr_rating_notice_nonce' ) . '&action=mlr_dismiss_rating_notice' ) ); ?>" class="button">
						<?php echo esc_html__( "Don't show this notice again!", 'wp-media-recovery' ); ?>
					</a>
				</div>
			</div>
		<?php
	}
}
