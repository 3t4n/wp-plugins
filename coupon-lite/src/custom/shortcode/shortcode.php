<?php
/**
 * Shortcode For Single Coupon & ALL Coupon From A Category
 *
 * Package  CouponPlugin\Custom\ShortCode;
 * @since   1.0.0
 * @author  Coupon Plugin
 * @link    https://wpcouponplugin.com
 * @license GNU General Public License 2.0+
 */

namespace CouponPlugin\Custom\ShortCode;
add_shortcode( 'couponplugin', __NAMESPACE__ . '\process_coupon_plugin_shortcodes' );
/**
 * shortcode function
 *
 * @since 1.0.0
 *
 * @param array $user_defined_atts attributes comes form user.
 * @param string $hidden_content not required
 *
 * @type string $shortcode_name name of the shortcode
 *
 * @return string html markup
 */
function process_coupon_plugin_shortcodes( $user_defined_atts, $hidden_content, $shortcode_name ) {


	$attributes = shortcode_atts( array(
		'h'  => 'h3',
		'id' => 0,
	),
		$user_defined_atts,
		$shortcode_name );

	$attributes['id'] = (int) $attributes['id'];
	if ( $attributes['id'] < 1 ) {
		return '';
	}
	cp_enqueue_scripts();
	ob_start();

	render_coupon_single( $attributes );

	return ob_get_clean();
}

/**
 * Enqueue Javascript Only On Shortcode Pages
 *
 * @since 1.0.0
 *
 * @return void
 */
function cp_enqueue_scripts() {
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_script( 'couponplugin-js' );
}

/**
 * Render Single coupon
 *
 * @since 1.0.0
 *
 * @param array $attributes comes form shortcode processing.
 *
 * @return void
 */
function render_coupon_single( $attributes ) {
	$coupon = get_post( $attributes['id'] );
	if ( ! $coupon ) {
		return;
	}
	if ( ! ( get_post_status( $coupon->ID ) == 'publish' ) ) {
		return;
	}
	$title = $coupon->post_title;
	$id    = $attributes['id'];
	include( COUPON_PLUGIN_PATH . 'src/custom/shortcode/helpers/meta-loading.php' );
	include( COUPON_PLUGIN_PATH . 'src/custom/shortcode/views/coupon.php' );
}
