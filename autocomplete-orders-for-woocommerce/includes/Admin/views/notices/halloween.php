<?php
/**
 * Admin notice: Halloween offer.
 *
 * @package AutocompleteOrdersForWooCommerce
 * @since 1.1.2
 * @return void
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

?>
<div class="notice-body">
	<div class="notice-icon">
		<img src="<?php echo esc_url( autocomplete_orders_for_woocommerce()->get_assets_url( 'images/halloween-icon.svg' ) ); ?>" alt="Auto Complete Orders for WooCommerce Halloween Offer">
	</div>
	<div class="notice-content">
		<h3>
			<?php esc_html_e( 'Limited Time Offer! PluginEver Halloween Sale: 30% OFF!!', 'autocomplete-orders-for-woocommerce' ); ?>
		</h3>
		<p>
			<?php
			echo wp_kses_post(
				sprintf(
					// translators: 1.Offer Percentage, 2. Coupon Code.
					__( 'Spectacular Halloween Deal! Get %1$s on all premium plugins with code %2$s. Don\'t miss out — this offer vanishes soon! 👻', 'autocomplete-orders-for-woocommerce' ),
					'<strong>' . esc_attr( '30% OFF' ) . '</strong>',
					'<strong>' . esc_attr( 'BIGTREAT30' ) . '</strong>'
				)
			);
			?>
		</p>
	</div>
</div>
<div class="notice-footer">
	<div class="footer-btn">
		<a href="<?php echo esc_url( autocomplete_orders_for_woocommerce()->plugin_uri . '?utm_source=plugin&utm_medium=notice&utm_campaign=halloween-2024&discount=bigtreat30' ); ?>" class="primary halloween-upgrade-btn">
			<span class="dashicons dashicons-cart"></span>
			<?php esc_html_e( 'Claim your discount!!', 'autocomplete-orders-for-woocommerce' ); ?>
		</a>
		<a href="#" class="halloween-remind-btn" data-snooze="<?php echo esc_attr( WEEK_IN_SECONDS ); ?>">
			<span class="dashicons dashicons-clock"></span>
			<?php esc_html_e( 'Remind me later', 'autocomplete-orders-for-woocommerce' ); ?>
		</a>
		<a href="#" class="primary halloween-remove-btn" data-dismiss>
			<span class="dashicons dashicons-remove"></span>
			<?php esc_html_e( 'Never show this again!', 'autocomplete-orders-for-woocommerce' ); ?>
		</a>
		<a href="#" class="primary halloween-dismiss-btn" data-dismiss>
			<span class="dashicons dashicons-dismiss"></span>
			<?php esc_html_e( 'DISMISS', 'autocomplete-orders-for-woocommerce' ); ?>
		</a>
	</div>
	<strong class="halloween-footer-text"><?php esc_html_e( 'Valid until November 10, 2024', 'autocomplete-orders-for-woocommerce' ); ?></strong>
</div>
