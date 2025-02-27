<?php
/**
 * Admin notice for upgrade.
 *
 * @since 2.0.0
 * @return void
 * @package WooCommerceVariationSwatches\Admin\Notices
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

?>
<div class="notice-body">
	<div class="notice-icon">
		<img src="<?php echo esc_attr( WCVS()->get_assets_url( 'images/plugin-icon.png' ) ); ?>" alt="WC Variation Swatches"><?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage ?>
	</div>
	<div class="notice-content">
		<h3><?php esc_attr_e( 'Flash Sale Alert!', 'wc-variation-swatches' ); ?></h3>
		<p>
			<?php
			echo wp_kses_post(
				sprintf(
					// translators: %1$s: WC Category Slider Pro link, %2$s: Coupon code.
					__( 'Get access to %1$s with a <strong>20%% discount</strong> for the next <strong>72 hours</strong> only! Use coupon code %2$s at checkout. Hurry up, the offer ends soon.', 'wc-variation-swatches' ),
					'<a href="https://pluginever.com/plugins/wc-variation-swatches-pro/?utm_source=plugin&utm_medium=notice&utm_campaign=flash-sale" target="_blank"><strong>WC Variation Swatches Pro</strong></a>',
					'<strong>FLASH20</strong>'
				)
			);
			?>
		</p>
	</div>
</div>
<div class="notice-footer">
	<a class="primary" href="https://pluginever.com/plugins/wc-variation-swatches-pro/?utm_source=plugin&utm_medium=notice&utm_campaign=flash-sale" target="_blank">
		<span class="dashicons dashicons-cart"></span>
		<?php esc_attr_e( 'Upgrade now', 'wc-variation-swatches' ); ?>
	</a>
	<a href="#" data-snooze="<?php echo esc_attr( MONTH_IN_SECONDS ); ?>">
		<span class="dashicons dashicons-clock"></span>
		<?php esc_attr_e( 'Maybe later', 'wc-variation-swatches' ); ?>
	</a>
</div>
