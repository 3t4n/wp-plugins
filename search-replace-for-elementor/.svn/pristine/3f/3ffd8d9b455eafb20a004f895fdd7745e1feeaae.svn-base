<?php
/**
 * [Short description]
 *
 * @package    DEVRY\ELEMSNR
 * @copyright  Copyright (c) 2024, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 * @since      1.3
 */

namespace DEVRY\ELEMSNR;

! defined( ABSPATH ) || exit; // Exit if accessed directly

/**
 * Don't allow to have both Free and Pro active at the same time.
 */
function elemsnr_check_pro_plugin() {
	// Deactitve the Pro version if active.
	if ( is_plugin_active( 'search-replace-for-elementor-pro/search-replace-for-elementor.php' ) ) {
		deactivate_plugins( 'search-replace-for-elementor-pro/search-replace-for-elementor.php', true );
	}
}

register_activation_hook( ELEMSNR_PLUGIN_BASENAME, __NAMESPACE__ . '\elemsnr_check_pro_plugin' );

/**
 * Display a promotion for the pro plugin.
 */
function elemsnr_display_upgrade_notice() {
	$elemsnr_admin = new ELEMSNR_Admin();

	if ( get_option( 'elemsnr_upgrade_notice' )
		&& get_transient( 'elemsnr_upgrade_plugin' ) ) {
		return;
	}
	?>
		<div class="notice notice-success is-dismissible elemsnr-admin">
			<p class="elemsnr-upgrade-notice-discount">
				<?php
				// printf(
				// 	wp_kses(
				// 		/* translators: %1$s is replaced with "ELEMSNR10" */
				// 		/* translators: %2$s is replaced with "10% off" */
				// 		__( 'Use the %1$s promo code and get %2$s your purchase!', 'search-replace-for-elementor' ),
				// 		json_decode( ELEMSNR_PLUGIN_ALLOWED_HTML_ARR, true )
				// 	),
				// 	'<code>' . esc_html__( 'ELEMSNR10', 'search-replace-for-elementor' ) . '</code>',
				// 	'<strong>' . esc_html__( '10% off', 'search-replace-for-elementor' ) . '</strong>'
				// );
				?>
			</p>
			<h3><?php echo esc_html__( 'Elementor Search and Replace PRO 🚀', 'search-replace-for-elementor' ); ?></h3>
			<p>
				<?php
				printf(
					wp_kses(
						/* translators: %1$s is replaced with "Found the free version helpful" */
						/* translators: %2$s is replaced with "Elementor Search and Replace Pro" */
						__( '✨🎉📢 %1$s? Discover the benefits of upgrading to %2$s!', 'search-replace-for-elementor' ),
						json_decode( ELEMSNR_PLUGIN_ALLOWED_HTML_ARR, true )
					),
					'<strong>' . esc_html__( 'Found the free version helpful', 'search-replace-for-elementor' ) . '</strong>',
					'<strong>' . esc_html__( 'Elementor Search and Replace Pro', 'search-replace-for-elementor' ) . '</strong>'
				);
				?>
			</p>
			<div class="button-group">
				<a href="https://bit.ly/43dazVP" target="_blank" class="button button-primary button-success">
					<?php echo esc_html__( 'Go Pro', 'search-replace-for-elementor' ); ?>
					<i class="dashicons dashicons-external"></i>
				</a>
				<a href="<?php echo esc_url( admin_url( $elemsnr_admin->admin_page . ELEMSNR_SETTINGS_SLUG . '&_wpnonce=' . wp_create_nonce( 'elemsnr_upgrade_notice_nonce' ) . '&action=elemsnr_dismiss_upgrade_notice' ) ); ?>" class="button">
					<?php echo esc_html__( 'I already did', 'search-replace-for-elementor' ); ?>
				</a>
				<a href="<?php echo esc_url( admin_url( $elemsnr_admin->admin_page . ELEMSNR_SETTINGS_SLUG . '&_wpnonce=' . wp_create_nonce( 'elemsnr_upgrade_notice_nonce' ) . '&action=elemsnr_dismiss_upgrade_notice' ) ); ?>" class="button">
					<?php echo esc_html__( "Don't show this notice again!", 'search-replace-for-elementor' ); ?>
				</a>
			</div>
		</div>
	<?php
	delete_option( 'elemsnr_upgrade_notice' );

	// Set the transient to last for 30 days.
	set_transient( 'elemsnr_upgrade_plugin', true, 30 * DAY_IN_SECONDS );
}
