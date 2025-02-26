<?php
/**
 * Validation methods.
 *
 * Author:          Uriahs Victor
 * Created on:      17/11/2022 (d/m/y)
 *
 * @link    https://uriahsvictor.com
 * @since   1.0.0
 * @package Controllers
 */

namespace Lpac_DPS\Controllers\Checkout_Page;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use DateTime;
use DateTimeZone;
use Lpac_DPS\Models\PluginSettings\OrderType as OrderTypeSettings;
use Lpac_DPS\Models\PluginSettings\Scheduling as SchedulingSettings;
use Lpac_DPS\Models\PluginSettings\GeneralSettings;

/**
 * Class Validate.
 */
class Validate extends BaseCheckoutPageController {

	/**
	 * Override pickup selection fields validation when delivery is disabled and a shipping method other than local pickup is selected.
	 *
	 * This prevents the checkout from halting if a customer tries to checkout with a normal delivery method when only the
	 * "pickup" Chwazi fields are enabled in the plugin settings.
	 *
	 * @param array  $fields
	 * @param object $errors
	 *
	 * @return bool
	 * @since 1.3.0
	 */
	private function localPickupOverride( array $fields, object $errors ): bool {

		if ( OrderTypeSettings::isDeliveryEnabled() ) { // We only want to do this when delivery is disabled.
			return false;
		}

		$override_local_pickup = apply_filters( 'chwazi_override_local_pickup_validation', true, $fields, $errors );

		if ( $override_local_pickup ) {
			if ( function_exists( 'WC' ) ) {
				$chosen_shipping_method = WC()->session->get( 'chosen_shipping_methods' );
				$chosen_shipping_method = $chosen_shipping_method[0] ?? '';

				if ( strpos( $chosen_shipping_method, 'local_pickup' ) === false ) {
					return true;
				}
			}
		}

		return false;
	}

	/**
	 * Ensure the date being set by the user is in the future.
	 *
	 * @param array  $fields WooCommerce checkout fields.
	 * @param object $errors Errors object.
	 * @return void
	 */
	public function validate_future_date( array $fields, object $errors ): void {
		$order_type = sanitize_text_field( wp_unslash( $_POST['lpac_dps_order_type'] ?? '' ) );

		if ( empty( $order_type ) ) {
			return;
		}

		$date_set = sanitize_text_field( wp_unslash( $_POST[ "lpac_dps_{$order_type}_date" ] ?? '' ) );
		if ( empty( $date_set ) ) {
			return;
		}

		$time_set = sanitize_text_field( wp_unslash( $_POST[ "lpac_dps_{$order_type}_time" ] ?? '' ) );
		if ( empty( $time_set ) ) {
			return;
		}

		$parts = explode( '-', $time_set );
		if ( count( $parts ) > 1 ) { // If the time slot is a range example 1:00 PM - 3:00 PM.
			$time_set = trim( $parts[1] ); // Use the end time to check logic because any time before that is still technically allowed.
		}

		$general_settings = new GeneralSettings();
		$timezone         = new DateTimeZone( $general_settings::get_site_timezone() );
		$now              = new DateTime( 'now', $timezone );

		// We need to ensure we're creating the correct format depending on the time format set.
		$format            = ( '12hr' === $general_settings::get_preferred_time_format() ) ? 'Y-m-d h:i A' : 'Y-m-d H:i';
		$selected_date     = $date_set . ' ' . $time_set;
		$selected_date_obj = ( new DateTime() )::createFromFormat( $format, $selected_date, $timezone );

		if ( $selected_date_obj > $now ) {
			return;
		}

		$error_msg = '<strong>' . __( 'Please select a date and time in the future.', 'delivery-and-pickup-scheduling-for-woocommerce' ) . '</strong>';

		$errors->add( 'validation', $error_msg );
	}

	/**
	 * Check if the customer has selected a delivery date.
	 *
	 * @param array  $fields WooCommerce checkout fields.
	 * @param object $errors Errors object.
	 * @return void
	 */
	public function validate_date_field( array $fields, object $errors ): void {
		$order_type = sanitize_text_field( wp_unslash( $_POST['lpac_dps_order_type'] ?? '' ) );

		if ( empty( $order_type ) ) {
			return;
		}

		$settings = new SchedulingSettings( $order_type );

		if ( ! $settings->orderDateFieldEnabled() ) {
			return;
		}

		if ( ! $settings->is_date_required() ) {
			return;
		}

		if ( $this->localPickupOverride( $fields, $errors ) ) {
			return;
		}

		$date_set = sanitize_text_field( wp_unslash( $_POST[ "lpac_dps_{$order_type}_date" ] ?? '' ) );

		if ( ! empty( $date_set ) ) {
			return;
		}

		$error_msg = $settings->get_date_required_notice_text();

		$error_msg = '<strong>' . $error_msg . '</strong>';

		$errors->add( 'validation', $error_msg );
	}

	/**
	 * Check if the customer has selected a delivery date.
	 *
	 * @param array  $fields WooCommerce checkout fields.
	 * @param object $errors Errors object.
	 * @return void
	 */
	public function validate_time_field( array $fields, object $errors ): void {

		$order_type = sanitize_text_field( wp_unslash( $_POST['lpac_dps_order_type'] ?? '' ) );

		if ( empty( $order_type ) ) {
			return;
		}

		$settings = new SchedulingSettings( $order_type );

		if ( ! $settings->orderTimeFieldEnabled() ) {
			return;
		}

		if ( ! $settings->is_time_required() ) {
			return;
		}

		if ( $this->localPickupOverride( $fields, $errors ) ) {
			return;
		}

		$time_set = sanitize_text_field( wp_unslash( $_POST[ "lpac_dps_{$order_type}_time" ] ?? '' ) );

		if ( ! empty( $time_set ) ) {
			return;
		}

		$error_msg = $settings->get_time_required_notice_text();

		$error_msg = '<strong>' . $error_msg . '</strong>';

		$errors->add( 'validation', $error_msg );
	}
}
