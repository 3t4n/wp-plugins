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
 * Display a notice encouraging users to rate the plugin
 * on WordPress.org and provide options to dismiss the notice.
 */
function acfc_display_rating_notice() {
	$acfc_admin = new ACFC_Admin();

	$screen = get_current_screen();

	if ( ! get_option( 'acfc_rating_notice', '' )
		&& strpos( $screen->id, 'acfc_' ) ) {
		?>
			<div class="notice notice-success is-dismissible acfc-admin">
				<h3><?php echo esc_html( ACFC_PLUGIN_NAME ); ?>  🚀</h3>
				<p>
					<?php
					printf(
						wp_kses(
							/* translators: %1$s is replaced with "by giving it 5 stars rating" */
							__( '✨💪🔌 Could you kindly support the plugin %1$s? Thank you in advance!', 'acf-copilot' ),
							json_decode( ACFC_PLUGIN_ALLOWED_HTML_ARR, true )
						),
						'<strong>' . esc_html__( 'by giving it 5 stars rating', 'acf-copilot' ) . '</strong>'
					);
					?>
				</p>
				<div class="button-group">
					<a href="<?php echo esc_url( ACFC_PLUGIN_WPORG_RATE ); ?>" target="_blank" class="button button-primary">
						<?php echo esc_html__( 'Rate us @ WordPress.org', 'acf-copilot' ); ?>
						<i class="dashicons dashicons-external"></i>
					</a>
					<a href="<?php echo esc_url( admin_url( $acfc_admin->admin_page . ACFC_SETTINGS_SLUG . '&_wpnonce=' . wp_create_nonce( 'acfc_rating_notice_nonce' ) . '&action=acfc_dismiss_rating_notice' ) ); ?>" class="button">
						<?php echo esc_html__( 'I already did', 'acf-copilot' ); ?>
					</a>
					<a href="<?php echo esc_url( admin_url( $acfc_admin->admin_page . ACFC_SETTINGS_SLUG . '&_wpnonce=' . wp_create_nonce( 'acfc_rating_notice_nonce' ) . '&action=acfc_dismiss_rating_notice' ) ); ?>" class="button">
						<?php echo esc_html__( "Don't show this notice again!", 'acf-copilot' ); ?>
					</a>
				</div>
			</div>
		<?php
	}
}
