<?php
/**
 * Coupon MetaBox
 *
 * Package  CouponPlugin\Custom\Meta;
 * @since   1.0.0
 * @author  Coupon Plugin
 * @link    https://wpcouponplugin.com
 * @license GNU General Public License 2.0+
 */

namespace CouponPlugin\Custom\Meta;

add_action( 'add_meta_boxes', __NAMESPACE__ . '\add_custom_meta_box' );
add_action( 'add_meta_boxes', __NAMESPACE__ . '\add_shortcode_metabox' );
add_action( 'save_post_coupon', __NAMESPACE__ . '\save_custom_meta' );

/**
 * Metabox For Coupon Shortcode
 *
 * @since 1.0.0
 *
 * @return void
 */
function add_shortcode_metabox() {
	add_meta_box( 'coupon-plugin-shortcode-metabox',
		'Single Coupon Shortcode',
		__NAMESPACE__ . '\render_shortcode_meta_box',
		'coupon',
		'side',
		'high' );
}

/**
 * Metabox For Coupon Type
 *
 * @since 1.0.0
 *
 * @return void
 */
function add_custom_meta_box() {
	add_meta_box( 'coupon-plugin-metabox',
		'Coupon Plugin Settings',
		__NAMESPACE__ . '\render_meta_box',
		'coupon',
		'normal',
		'high' );
}

/**
 * Metabox Render
 *
 * @since 1.0.0
 *
 * @param  object $post post object passed
 *
 * @return void
 */
function render_meta_box( $post ) {

	wp_nonce_field( 'coupon-plugin-nonce', 'coupon-plugin-nonce' );
	ob_start();
	include 'views/input-view.php';
	ob_get_flush();

}

/**
 * Metabox For Shortcode Display
 *
 * @since 1.0.0
 *
 * @param  object $post post object passed
 *
 * @return void
 */
function render_shortcode_meta_box( $post ) {
	echo '<h4>' . __( 'After the Coupon Published Use The Below Shortcode To Show The Coupon Box inside Post', COUPON_PLUGIN_TEXT_DOMAIN ) . '</h4>';
	echo '[couponplugin id="' . get_the_ID() . '" h="h2"]';
	echo '<h4>' . __( 'You can use any of the h1, h2, h3, h4 etc in h tag in shortcode', COUPON_PLUGIN_TEXT_DOMAIN ) . '</h4>';
}

/**
 * Save Metabox Content
 *
 * @since 1.0.0
 *
 * @param  int $post_id post id of the coupon whose custom data to be saved
 *
 * @return void
 */
function save_custom_meta( $post_id ) {
	if ( ! validate_data( $post_id ) ) {
		return;
	}

	if ( isset( $_POST['coupon_plugin_code'] ) ) {
		$code = sanitize_text_field( $_POST['coupon_plugin_code'] );
		update_post_meta( $post_id, 'coupon_plugin_code', $code );
	}
	if ( isset( $_POST['coupon_plugin_affiliate_link'] ) ) {
		$link = esc_url_raw( $_POST['coupon_plugin_affiliate_link'] );
		update_post_meta( $post_id, 'coupon_plugin_affiliate_link', $link );
	}
	if ( isset( $_POST['coupon_plugin_popular'] ) ) {
		$popular = $_POST['coupon_plugin_popular'];
		update_post_meta( $post_id, 'coupon_plugin_popular', $popular );
	}
	if ( isset( $_POST['coupon_plugin_expiry'] ) ) {
		$date   = $_POST['coupon_plugin_expiry'];
		$expiry = '';
		if ( $date ) {
			$format_date = get_option( 'date_format' );
			$format_time = get_option( 'time_format' );
			$expiry = date( $format_date . ' ' . $format_time, strtotime( $date ) );
		}
		update_post_meta( $post_id, 'coupon_plugin_expiry', $expiry );
	}
	if ( isset( $_POST['coupon_plugin_description'] ) ) {
		$description = esc_textarea( $_POST['coupon_plugin_description'] );
		update_post_meta( $post_id, 'coupon_plugin_description', $description );
	}
	if ( isset( $_POST['coupon_plugin_voteup'] ) ) {
		$vote = intval( $_POST['coupon_plugin_voteup'] );
		update_post_meta( $post_id, 'coupon_plugin_voteup', $vote );
	}

}

/**
 * Validate Data
 *
 * @since 1.0.0
 *
 * @param  int $post_id post id of the coupon whose custom data to be saved
 *
 * @return bool true/false
 */
function validate_data( $post_id ) {

	if ( ! isset( $_POST['coupon-plugin-nonce'] ) || ! wp_verify_nonce( $_POST['coupon-plugin-nonce'], 'coupon-plugin-nonce' ) ) {
		return false;
	}
	// check autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return false;
	}
	// check permissions
	if ( 'coupon' != $_POST['post_type'] ) {
		return false;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return false;
	}

	return true;

}

