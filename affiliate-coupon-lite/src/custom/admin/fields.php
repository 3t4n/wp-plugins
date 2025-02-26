<?php
/**
 * Fields For Setting Page
 *
 * Package  AffiliateCoupon\Custom\Admin
 * @since   1.0.0
 * @author  Mission 14
 * @link    https://couponplugin.co
 * @license GNU General Public License 2.0+
 */

namespace AffiliateCoupon\Custom\Admin;
/**
 * Generation Of Fields
 *
 * @since 1.0.0
 *
 * @param array Field Type
 *
 * @return void
 */
function setting_fields( $field_type ) {
	$option = get_option( 'affiliate_coupon_lite_settings' );
	switch ( $field_type['id'] ) {
		case "text":
			_e('<input class="input" type="text" name="affiliate_coupon_lite_settings[' . esc_attr($field_type['name']) . ']" value="' . esc_html($option[ $field_type['name'] ]) . '"/>');
			break;
		case "color":
			_e('<input class="cp-color-field" type="text" name="affiliate_coupon_lite_settings[' . esc_attr($field_type['name']) . ']" data-default-color="#037cd5" value="' . esc_html($option[ $field_type['name'] ]) . '">');
			break;
		default:

	}
}