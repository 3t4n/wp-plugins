<?php
/**
 * Class AWSA_Checkout
 *
 * @version           1.1.0
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @package           AWSA_Shipping
 */

/**
 * Class AWSA_Checkout
 */
class AWSA_Checkout {

	/**
	 * Init
	 *
	 * @return void
	 */
	public static function init() {

		$shipping_settings = awsa_shipping_get_settings();
		if ( !isset( $shipping_settings['validate-mobile'] ) || 'no' !== $shipping_settings['validate-mobile'] ) {
			add_action( 'woocommerce_checkout_process', __CLASS__ . '::validate_mobile' );
		}

		if ( !isset( $shipping_settings['validate-postal-code'] ) || 'no' !== $shipping_settings['validate-postal-code'] ) {
			add_action( 'woocommerce_checkout_process', __CLASS__ . '::validate_postal_code' );
		}
	}

	/**
	 * Check Validate Mobile Number and Add Error
	 *
	 * @return void
	 */
	public static function validate_mobile() {

		if ( isset( $_POST['billing_phone'] ) ) {
			$_POST['billing_phone'] = awsa_fa_to_en_number( $_POST['billing_phone'] );
			$mobile                 = awsa_sanitize_mobile_number( $_POST['billing_phone'] );
			if ( !$mobile ) {
				wc_add_notice( __( 'Mobile number is incorrect', 'awsa-shipping' ), 'error' );
			}
		}
	}

	/**
	 * Check Validate Postcode and Add Error
	 *
	 * @return void
	 */
	public static function validate_postal_code() {

		$types = array( 'billing' => __( 'Billing', 'awsa-shipping' ) );
		if ( isset( $_POST['ship_to_different_address'] ) ) {
			$types['shipping'] = __( 'Shipping', 'awsa-shipping' );
		}

		foreach ( $types as $type => $text ) {
			$base_country                 = WC()->countries->get_base_country();
			$_POST[ $type . '_postcode' ] = isset( $_POST[ $type . '_postcode' ] ) ? awsa_fa_to_en_number(
				$_POST[ $type . '_postcode' ]
			) : '';
			$postal_code                  = isset( $_POST[ $type . '_postcode' ] ) ? sanitize_text_field(
				$_POST[ $type . '_postcode' ]
			) : '';
			$country_id                   = isset( $_POST[ $type . '_country' ] ) ? sanitize_text_field(
				$_POST[ $type . '_country' ]
			) : $base_country;
			$check                        = awsa_check_postal_code( $postal_code, $country_id );

			if ( empty( $postal_code ) ) {
				wc_add_notice( $text . ': ' . __( 'Postcode not entered', 'awsa-shipping' ), 'error' );
			} elseif ( !$check ) {
				wc_add_notice( $text . ': ' . __( 'Postcode is incorrect', 'awsa-shipping' ), 'error' );
			}
		}
	}

}
