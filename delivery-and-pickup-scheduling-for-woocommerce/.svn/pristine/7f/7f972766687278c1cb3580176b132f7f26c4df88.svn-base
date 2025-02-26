<?php

/**
 * Class responsible for handling our Ajax requests from the checkout page.
 *
 * Author:          Uriahs Victor
 * Created on:      27/11/2022 (d/m/y)
 *
 * @link    https://uriahsvictor.com
 * @since   1.0.0
 * @package Controllers
 */
namespace Lpac_DPS\Controllers\Checkout_Page\Ajax;

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
use Lpac_DPS\Controllers\Checkout_Page\BaseCheckoutPageController;
use Lpac_DPS\Helpers\FunctionsHelper;
use Lpac_DPS\Helpers\UtilitiesHelper;
use Lpac_DPS\Models\PluginSettings\Localization;
use Lpac_DPS\Models\PluginSettings\Scheduling;
/**
 * Class Handlers.
 *
 * Class responsible for methods that deal with Ajax logic happening on the checkout page.
 *
 * @package Lpac_DPS\Controllers\Checkout_Page\Ajax
 */
class Handlers extends BaseCheckoutPageController {
    /**
     * Drop passed time slots from array if the "to" time in the time slot has passed.
     *
     * @param string $date
     * @param array  $time_slots
     * @return array
     * @since 1.1.0
     */
    private function dropPassedTimeSlots( string $date, array $time_slots ) : array {
        $today = FunctionsHelper::getCurrentStoreDate();
        if ( $today !== $date ) {
            // If the timeslots pulled are not for the current day.
            return $time_slots;
        }
        $current_date_time = FunctionsHelper::getCurrentDateTime();
        return array_filter( $time_slots, function ( $slot ) use($current_date_time) {
            $from = $slot['time_range']['from'] ?? '';
            $to = ( $slot['time_range']['to'] ?: $from );
            // If no to time set then fall back to from time since it would most likely have a value.
            if ( empty( $from ) && empty( $to ) ) {
                return false;
            }
            $cutoff_date_time = UtilitiesHelper::convertTo24HourFormat( $to, 'Y-m-d H:i:s' );
            return UtilitiesHelper::timeIsLessThan( $current_date_time, $cutoff_date_time );
        } );
    }

    /**
     * Drop times that are about to expire based on "buffer" value set in DPS settings.
     *
     * @param string $date
     * @param array  $time_slots
     * @param int    $order_placement_buffer
     *
     * @return array
     * @since 1.2.0
     */
    private function dropExpiringTimeSlots( string $date, array $time_slots, int $order_placement_buffer ) : array {
        $padding = $order_placement_buffer;
        $padded_date_time = UtilitiesHelper::addMinutesToCurrentDateTime( $padding );
        return array_filter( $time_slots, function ( $time_slot ) use($padded_date_time, $date) {
            $to_time = ( $time_slot['time_range']['to'] ?: $time_slot['time_range']['from'] );
            $to_time = UtilitiesHelper::convertTo24HourFormat( $to_time );
            $to_datetime = $date . ' ' . $to_time;
            // The datetime in the future to compare to. This is what is passed to the function.
            return !UtilitiesHelper::timeIsGreaterThanOrEqualTo( $padded_date_time, $to_datetime );
            // return time_slot if it's not beyond our padded time.
        } );
    }

    /**
     * Ajax controller method for lpac_dps_get_times.
     *
     * @return void
     * @since 1.0.0
     */
    public function getTimesAjaxHandler() : void {
        $date_data = array_map( 'sanitize_text_field', wp_unslash( $_REQUEST['selectedDate'] ?? array() ) );
        if ( empty( $date_data ) ) {
            wp_send_json_error( 'Date data empty.', 500 );
        }
        $date = sanitize_text_field( $date_data['date'] );
        $day_of_the_week = $this->daysOfTheWeek[sanitize_text_field( $date_data['dayIndex'] )] ?? '';
        $order_type = sanitize_text_field( $date_data['orderType'] );
        $scheduling_model = new Scheduling($order_type);
        $time_slots_nested_repeater = $scheduling_model->getSavedTimeslots();
        $all_times = array_column( $time_slots_nested_repeater, 'time_slots', 'day_of_the_week' );
        $times_for_day = $all_times[$day_of_the_week] ?? array();
        $times_for_day = apply_filters(
            'chwazi_times_for_day_before',
            $times_for_day,
            $date,
            $day_of_the_week,
            $order_type
        );
        if ( empty( $times_for_day ) ) {
            wp_send_json_success( 'set_manually' );
            // Allow customer to set their delivery or pickup time manually.
        }
        // Drop passed time slots if option enabled.
        if ( $scheduling_model->dropPassedTimeSlots() ) {
            $times_for_day = $this->dropPassedTimeSlots( $date, $times_for_day );
        }
        $order_placement_buffer = $scheduling_model->getOrderPlacementBuffer();
        // Add buffer for order placement if a value is set and it's not 0.
        if ( !empty( $order_placement_buffer ) ) {
            $times_for_day = $this->dropExpiringTimeSlots( $date, $times_for_day, $order_placement_buffer );
        }
        $times_for_day = apply_filters(
            'chwazi_times_for_day_after',
            $times_for_day,
            $date,
            $day_of_the_week,
            $order_type
        );
        if ( empty( $times_for_day ) ) {
            $time_slots = "<option value=''>" . esc_html( Localization::getNoTimeSlotsAvailableText() ) . '</option>';
            wp_send_json_success( $time_slots );
        } else {
            $time_slots = "<option value=''>" . '--' . esc_html( Localization::getPleaseChooseAnOptionText() ) . '--' . '</option>';
        }
        foreach ( $times_for_day as $index => $data ) {
            $from = $data['time_range']['from'];
            $to = $data['time_range']['to'];
            $from_to = UtilitiesHelper::createTimeSlotDisplayText( $from, $to );
            if ( !empty( $to ) ) {
                $time_slots .= "<option value='{$from_to}'>" . $from_to . '</option>';
            } else {
                $time_slots .= "<option value='{$from}'>" . $from . '</option>';
            }
        }
        wp_send_json_success( $time_slots );
    }

}
