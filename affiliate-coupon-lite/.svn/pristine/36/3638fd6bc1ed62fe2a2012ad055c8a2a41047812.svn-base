<?php
/**
 * Term MetaBox
 *
 * Package  AffiliateCoupon\Custom\Meta;
 * @since   1.0.0
 * @author  Mission 14
 * @link    https://couponplugin.co
 * @license GNU General Public License 2.0+
 */

namespace AffiliateCoupon\Custom\Meta;

add_action( 'coupon-store_edit_form_fields', __NAMESPACE__ . '\cp_store_image' );
add_action( 'edit_coupon-store', __NAMESPACE__ . '\cp_store_image_save' );
/**
 * Term edit field custom field markup
 *
 * @since 1.0.0
 *
 * @param  object $term term object in which custom filed is going to display
 *
 * @return void
 */
function cp_store_image( $term ) {

	ob_start();
	include 'views/term-uploader.php';
	ob_get_flush();

}

/**
 * Term custom field saving
 *
 * @since 1.0.0
 *
 * @param  int $term_id id of the term in which custom field has to be saved
 *
 * @return bool true/false
 */
function cp_store_image_save( $term_id ) {
	if ( ! isset( $_POST['coupon-plugin-term-nonce'] ) || ! wp_verify_nonce( $_POST['coupon-plugin-term-nonce'], 'coupon-plugin-term-nonce' ) ) {
		return false;
	}
	if ( isset( $_POST['cp_store_image'] ) ) {
		$link = sanitize_url(esc_url_raw( $_POST['cp_store_image'] ));
		update_term_meta( $term_id, 'cp_store_image', $link );
	}


}