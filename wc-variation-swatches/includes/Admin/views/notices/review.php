<?php
/**
 * Admin notice for review.
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
		<h3>
			<?php esc_html_e( 'Enjoying WC Variation Swatches?', 'wc-variation-swatches' ); ?>
		</h3>
		<p>
			<?php
			echo wp_kses_post(
				sprintf(
				/* translators: %1$s: WC Category Slider Pro link, %2$s: Coupon code. */
					__( 'We hope you had a wonderful experience using %1$s. Please take a moment to show us your support by leaving a 5-star review on <a href="%2$s" target="_blank"><strong>WordPress.org</strong></a>. Thank you! 😊', 'wc-variation-swatches' ),
					'<a href="https://wordpress.org/plugins/wc-variation-swatches/" target="_blank"><strong>WC Variation Swatches</strong></a>',
					'https://wordpress.org/support/plugin/wc-variation-swatches/reviews/?filter=5#new-post'
				)
			);
			?>
		</p>
	</div>
</div>
<div class="notice-footer">
	<a class="primary" href="https://wordpress.org/support/plugin/wc-variation-swatches/reviews/?filter=5#new-post" target="_blank">
		<span class="dashicons dashicons-heart"></span>
		<?php esc_html_e( 'Sure, I\'d love to help!', 'wc-variation-swatches' ); ?>
	</a>
	<a href="#" data-snooze>
		<span class="dashicons dashicons-clock"></span>
		<?php esc_html_e( 'Maybe later', 'wc-variation-swatches' ); ?>
	</a>
	<a href="#" data-dismiss>
		<span class="dashicons dashicons-smiley"></span>
		<?php esc_html_e( 'I\'ve already left a review', 'wc-variation-swatches' ); ?>
	</a>
</div>
