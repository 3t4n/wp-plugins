<?php
/**
 * Fields For Setting Page
 *
 * Package  CouponPlugin\Custom\Admin
 * @since   1.0.0
 * @author  Coupon Plugin
 * @link    https://wpcouponplugin.com
 * @license GNU General Public License 2.0+
 */

namespace CouponPlugin\Custom\Admin;
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
	$option = get_option( 'coupon_plugin_settings' );
	switch ( $field_type['id'] ) {
		case "text":
			echo '<input class="input" type="text" name="coupon_plugin_settings[' . $field_type['name'] . ']" value="' . $option[ $field_type['name'] ] . '"/>';
			break;
		case "color":
			echo '<input class="cp-color-field" type="text" name="coupon_plugin_settings[' . $field_type['name'] . ']" data-default-color="#037cd5" value="' . $option[ $field_type['name'] ] . '">';
			break;
		default:

	}
}