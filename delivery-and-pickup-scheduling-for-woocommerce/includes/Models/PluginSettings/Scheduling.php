<?php
/**
 * Class responsible for grabbing Delivery Scheduling settings.
 *
 * Author:          Uriahs Victor
 * Created on:      25/11/2022 (d/m/y)
 *
 * @link    https://uriahsvictor.com
 * @since   1.0.0
 * @package Models
 */

namespace Lpac_DPS\Models\PluginSettings;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Lpac_DPS\Models\BaseModel;

/**
 * Class SchedulingModel.
 *
 * Class responsible for creating methods to get various delivery and pickup scheduling settings.
 *
 * @package Lpac_DPS\Models\PluginSettings
 */
class Scheduling extends BaseModel {

	/**
	 * The type of the setting to pull, whether delivery or pickup.
	 *
	 * @var string
	 * @since 1.0.0
	 */
	private string $order_type;

	/**
	 * Class constructor.
	 *
	 * @param string $order_type The type of the setting to pull whether 'delivery' or 'pickup'.
	 * @return void
	 * @since 1.0.0
	 */
	public function __construct( string $order_type ) {
		$this->order_type = $order_type;
	}

	/**
	 * Get date enabled field option.
	 *
	 * @return bool
	 * @since 1.0.0
	 */
	public function orderDateFieldEnabled(): bool {
		return (bool) self::get_setting( $this->order_type . '__enable_date_feature' );
	}

	/**
	 * Prepare the available days for JS consumption.
	 *
	 * The index of the array is the day of the week (needed by flatpickr js).
	 *
	 * @return array
	 * @since 1.0.0
	 */
	public function get_available_days(): array {

		$available_days = (array) self::get_setting( $this->order_type . '__available_days', array( 'monday', 'tuesday' ) );

		return array_filter( // Days with indexes.
			$this->daysOfTheWeek,
			function ( $item ) use ( $available_days ) {
				if ( in_array( $item, $available_days, true ) ) {
					return true;
				}
				return false;
			}
		);
	}

	/**
	 * Get date input field label.
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function get_date_selector_label(): string {
		return self::get_setting( $this->order_type . '__choose_date_field_label', __( 'Choose delivery date', 'delivery-and-pickup-scheduling-for-woocommerce' ) );
	}

	/**
	 * Get date input field label.
	 *
	 * @return bool
	 * @since 1.0.0
	 */
	public function is_date_required(): bool {
		return (bool) self::get_setting( $this->order_type . '__date_required' );
	}

	/**
	 * Get required notice text.
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function get_date_required_notice_text(): string {
		return self::get_setting( $this->order_type . '__no_date_selected_notice_text' );
	}

	/**
	 * Get time enabled field option.
	 *
	 * @return bool
	 * @since 1.0.0
	 */
	public function orderTimeFieldEnabled(): bool {
		return (bool) self::get_setting( $this->order_type . '__enable_time_feature' );
	}

	/**
	 * Get time field label.
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function get_timefield_label(): string {
		return self::get_setting( $this->order_type . '__choose_time_field_label', __( 'Choose time', 'delivery-and-pickup-scheduling-for-woocommerce' ) );
	}

	/**
	 * Check if time is required.
	 *
	 * @return bool
	 * @since 1.0.0
	 */
	public function is_time_required(): bool {
		return (bool) self::get_setting( $this->order_type . '__time_required' );
	}

	/**
	 * Get saved timeslots.
	 *
	 * @return array
	 * @since 1.0.0
	 */
	public function getSavedTimeslots(): array {

		$time_slots = self::get_setting( $this->order_type . '__time_slots_nested_repeater', array() );

		// Remove empty timeslots from list.
		foreach ( $time_slots as $time_slot => &$time_slot_data ) {

			if ( empty( $time_slot_data['time_slots'] ) ) {
				continue;
			}

			if ( ! is_array( $time_slot_data['time_slots'] ) ) {
				continue;
			}
			foreach ( $time_slot_data['time_slots'] as $key => $value ) {
				if ( empty( $value['time_range']['from'] ) && empty( $value['time_range']['to'] ) ) {
					unset( $time_slot_data['time_slots'][ $key ] );
				}
			}
		}

		unset( $time_slot_data );
		unset( $value );

		return $time_slots;
	}


	/**
	 * Get required notice text.
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function get_time_required_notice_text(): string {
		return self::get_setting( $this->order_type . '__no_time_selected_notice_text' );
	}

	/**
	 * Get the minimum number of days in the future that a customer can place an order.
	 *
	 * @return int
	 * @since 1.0.0
	 */
	public function get_minimum_days_in_future(): int {
		return (int) self::get_setting( $this->order_type . '__minimum_days_in_future', 0 );
	}

	/**
	 * Whether to include the current day when calculating minimum days in future.
	 *
	 * @return bool
	 * @since 1.2.7
	 */
	public function minimumDaysIncludeCurrentDay(): bool {
		$value = self::get_setting( $this->order_type . '__minimum_days_include_current_day', true );
		return filter_var( $value, FILTER_VALIDATE_BOOLEAN );
	}

	/**
	 * Get the maximum number of days in the future that a customer can place an order.
	 *
	 * @return int
	 * @since 1.0.0
	 */
	public function get_maximum_days_in_future(): int {
		return (int) self::get_setting( $this->order_type . '__maximum_days_in_future', 120 );
	}

	/**
	 * Whether to include the current day when calculating maximum days in future.
	 *
	 * @return bool
	 * @since 1.2.7
	 */
	public function maximumDaysIncludeCurrentDay(): bool {
		$value = self::get_setting( $this->order_type . '__maximum_days_include_current_day', true );
		return filter_var( $value, FILTER_VALIDATE_BOOLEAN );
	}

	/**
	 * Get the created off days.
	 *
	 * @return array
	 * @since 1.0.0
	 */
	public function get_off_days(): array {
		$off_days = self::get_setting( $this->order_type . '_off_days__repeater', array() );
		if ( ! is_array( $off_days ) ) { // If no offdays are created it would be a string, so we need to change it to an array here.
			$off_days = array();
		}
		return array_column( $off_days, 'off_days__date' );
	}

	/**
	 * Get the maxed out dates for an order type, whether delivery or pickup. The days that can no longer take orders.
	 *
	 * @return array
	 * @since 1.0.0
	 */
	public function get_maxed_dates(): array {
		$maxed_dates = get_option( "lpac_dps_maxed_{$this->order_type}_dates", array() );

		/**
		 * Previously before v1.2.5 the maxed dates would some times be stored as a string, and this would
		 * cause an error because of wrong return type. This is a temporary addition to prevent that.
		 */
		if ( empty( $maxed_dates ) ) {
			return array();
		}
		return $maxed_dates;
	}

	/**
	 * Get customer note.
	 *
	 * @return array
	 * @since 1.0.0
	 */
	public function get_customer_note(): string {
		return self::get_setting( "{$this->order_type}__customer_note" );
	}

	/**
	 * Get customer font size.
	 *
	 * @return array
	 * @since 1.0.0
	 */
	public function get_customer_note_font_size(): string {
		$size = self::get_setting( "{$this->order_type}__font_size", 14 );
		if ( empty( $size ) ) {
			$size = 14;
		}
		return $size . 'px';
	}

	/**
	 * Get option to remove the passed time slots from list if the "to" time has passed.
	 *
	 * @return bool
	 * @since 1.1.0
	 */
	public function dropPassedTimeSlots(): bool {
		$value = self::get_setting( $this->order_type . '__drop_passed_time_slots', false );
		return filter_var( $value, FILTER_VALIDATE_BOOLEAN );
	}

	/**
	 * Get option for buffer needed before customer can plan an order.
	 *
	 * @return int
	 * @since 1.2.0
	 */
	public function getOrderPlacementBuffer(): int {
		$value = self::get_setting( $this->order_type . '__order_placement_buffer', 0 );
		return (int) $value;
	}

	/**
	 * Get option for whether to enable time slot fees.
	 *
	 * @return bool
	 * @since 1.2.2
	 */
	public function enableTimeslotFees(): bool {
		$value = self::get_setting( $this->order_type . '__time_slot_fee', false );
		return filter_var( $value, FILTER_VALIDATE_BOOLEAN );
	}

	/**
	 * Get option for whether to apply taxes to time slot fees.
	 *
	 * @return bool
	 * @since 1.3.0
	 */
	public function applyTaxesToTimeslotFees(): bool {
		$value = self::get_setting( $this->order_type . '__time_slot_fees_taxable', false );
		return filter_var( $value, FILTER_VALIDATE_BOOLEAN );
	}

	/**
	 * Get the tax class that should be applied to timeslot fees.
	 *
	 * @return string
	 * @since 1.3.0
	 */
	public function getTimeslotFeesTaxClass(): string {
		$value = self::get_setting( $this->order_type . '__time_slot_fee_tax_class', '' );

		if ( $value === 'Standard' ) { // When using standard tax class set to empty string so WC can use standard tax rate.
			$value = '';
		}

		return $value;
	}
}
