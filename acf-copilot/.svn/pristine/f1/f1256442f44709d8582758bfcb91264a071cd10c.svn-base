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

! defined( ABSPATH ) || exit; // Exit if accessed directly

/**
 * Don't allow to have both Free and Pro active at the same time.
 */
function acfc_check_pro_plugin() {
	// Deactitve the Pro version if active.
	if ( is_plugin_active( 'acf-copilot-pro/acf-copilot.php' ) ) {
		deactivate_plugins( 'acf-copilot-pro/acf-copilot.php', true );
	}
}

register_activation_hook( ACFC_PLUGIN_BASENAME, __NAMESPACE__ . '\acfc_check_pro_plugin' );

/**
 * Display a promotion for the pro plugin.
 */
function acfc_display_upgrade_notice() {
	$acfc_admin = new ACFC_Admin();

	if ( get_option( 'acfc_upgrade_notice' )
		&& get_transient( 'acfc_upgrade_plugin' ) ) {
		return;
	}
	?>
		<div class="notice notice-success is-dismissible acfc-admin">
		<p class="acfc-upgrade-notice-discount">
				<?php
				printf(
					wp_kses(
						/* translators: %1$s is replaced with "ACFC10" */
						/* translators: %2$s is replaced with "10% off" */
						__( 'Use the %1$s promo code and get %2$s your purchase!', 'acf-copilot' ),
						json_decode( ACFC_PLUGIN_ALLOWED_HTML_ARR, true )
					),
					'<code>' . esc_html__( 'ACFC10', 'acf-copilot' ) . '</code>',
					'<strong>' . esc_html__( '10% off', 'acf-copilot' ) . '</strong>'
				);
				?>
				<hr />
			</p>
			<h3><?php echo esc_html__( 'ACF Copilot PRO 🚀', 'acf-copilot' ); ?></h3>
			<p>
				<?php
				printf(
					wp_kses(
						/* translators: %1$s is replaced with "Found the free version helpful" */
						/* translators: %2$s is replaced with "ACF Copilot Pro" */
						__( '✨🎉📢 %1$s? Discover the added benefits of upgrading to %2$s?', 'acf-copilot' ),
						json_decode( ACFC_PLUGIN_ALLOWED_HTML_ARR, true )
					),
					'<strong>' . esc_html__( 'Found the free version helpful', 'acf-copilot' ) . '</strong>',
					'<strong>' . esc_html__( 'ACF Copilot Pro', 'acf-copilot' ) . '</strong>'
				);
				?>
			</p>
		
			<div class="button-group">
				<a href="https://bit.ly/40rTpDS" target="_blank" class="button button-primary button-success">
					<?php echo esc_html__( 'Go Pro', 'acf-copilot' ); ?>
					<i class="dashicons dashicons-external"></i>
				</a>
				<a href="<?php echo esc_url( admin_url( $acfc_admin->admin_page . ACFC_SETTINGS_SLUG . '&_wpnonce=' . wp_create_nonce( 'acfc_upgrade_notice_nonce' ) . '&action=acfc_dismiss_upgrade_notice' ) ); ?>" class="button">
					<?php echo esc_html__( 'I already did', 'acf-copilot' ); ?>
				</a>
				<a href="<?php echo esc_url( admin_url( $acfc_admin->admin_page . ACFC_SETTINGS_SLUG . '&_wpnonce=' . wp_create_nonce( 'acfc_upgrade_notice_nonce' ) . '&action=acfc_dismiss_upgrade_notice' ) ); ?>" class="button">
					<?php echo esc_html__( "Don't show this notice again!", 'acf-copilot' ); ?>
				</a>
			</div>
		</div>
	<?php
	delete_option( 'acfc_upgrade_notice' );

	// Set the transient to last for 30 days.
	set_transient( 'acfc_upgrade_plugin', true, 30 * DAY_IN_SECONDS );
}
