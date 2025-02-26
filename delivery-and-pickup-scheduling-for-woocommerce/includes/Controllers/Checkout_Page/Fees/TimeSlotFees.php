<?php

/**
 * Methods that handle fees created for timeslots.
 *
 * Author:          Uriahs Victor
 * Created on:      12/12/2023 (d/m/y)
 *
 * @link    https://uriahsvictor.com
 * @since   1.2.2
 * @package Controllers
 */
namespace Lpac_DPS\Controllers\Checkout_Page\Fees;

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
use Lpac_DPS\Controllers\Checkout_Page\BaseCheckoutPageController;
use Lpac_DPS\Helpers\FunctionsHelper;
use Lpac_DPS\Helpers\Logger;
use Lpac_DPS\Helpers\UtilitiesHelper;
use Lpac_DPS\Models\PluginSettings\Scheduling as SchedulingSettings;
/**
 * Responsible for creating methods that handle checkout fees based on timeslots.
 *
 * @package Lpac_DPS\Controllers\Checkout_Page\Fees
 * @since 1.2.2
 */
class TimeSlotFees extends BaseCheckoutPageController {
    /**
     * Get the fee set for a timeslot.
     *
     * @param string $order_type
     * @param string $selected_date
     * @param array  $normalized_time_array
     * @return null|array
     * @since 1.2.2
     */
    private function getTimeSlotFeeData( string $order_type, string $selected_date, array $normalized_time_array ) : ?array {
        $timeslots = ( new SchedulingSettings($order_type) )->getSavedTimeslots();
        $selected_day = strtolower( FunctionsHelper::getDateTimeFromFormat( $selected_date, 'Y-m-d', 'l' ) );
        // Get the timeslots and fees
        $timeslots_for_day = array();
        foreach ( $timeslots as $key => $timeslot_data ) {
            if ( $timeslot_data['day_of_the_week'] === $selected_day ) {
                $timeslots_for_day = $timeslot_data['time_slots'];
                break;
            }
        }
        if ( empty( $timeslots_for_day ) ) {
            return null;
        }
        $selected_from = $normalized_time_array['from'];
        $selected_to = $normalized_time_array['to'];
        $time_slot_data = array();
        foreach ( $timeslots_for_day as $key => $timeslots_for_day_details ) {
            $from = $timeslots_for_day_details['time_range']['from'];
            $to = $timeslots_for_day_details['time_range']['to'];
            if ( empty( $to ) ) {
                // When timeslots are single times (with no dash)
                if ( $from === $selected_from ) {
                    $time_slot_data = $timeslots_for_day[$key];
                    break;
                }
            }
            if ( $from === $selected_from && $to === $selected_to ) {
                $time_slot_data = $timeslots_for_day_details;
                break;
            }
        }
        $time_slot_fee_data = $time_slot_data['time_slot_fee'] ?? array();
        if ( empty( $time_slot_fee_data ) ) {
            ( new Logger() )->logError( 'There was an issue retrieving the timeslot fee from the database. Method: ' . __METHOD__ . ' Line: ' . __LINE__ );
        }
        $fee_amount = $time_slot_fee_data['fee_amount'] ?? 0;
        return array(
            'fee_amount' => $fee_amount,
            'fee_name'   => $time_slot_fee_data['fee_name'] ?? '',
        );
    }

    /**
     * Add tax to a timeslot fee.
     *
     * @param string $fee_name
     * @param float  $fee_amount
     * @param string $tax_class
     *
     * @return float
     * @since 1.3.0
     */
    private function calculateFeeTax( string $fee_name, float $fee_amount, string $tax_class ) : float {
        $excluded_fee_names = apply_filters(
            'chwazi_exclude_fee_from_taxes',
            array(),
            $fee_name,
            $fee_amount
        );
        if ( in_array( $fee_name, $excluded_fee_names, true ) ) {
            // Allow user to exclude taxes from calculating for certain fees based on name.
            return $fee_amount;
        }
        if ( $tax_class === 'Standard' ) {
            // When using standard tax class set to empty string so WC can use standard tax rate.
            $tax_class = '';
        }
        $rates = \WC_Tax::get_rates( $tax_class );
        $total_tax = (float) array_sum( \WC_Tax::calc_tax( $fee_amount, $rates ) );
        return $fee_amount + $total_tax;
    }

    /**
     * Set the additional fee at checkout.
     *
     * @return void
     * @since 1.2.2
     */
    public function setAdditionalFee() {
        if ( is_admin() && !defined( 'DOING_AJAX' ) ) {
            return;
        }
        if ( !is_checkout() ) {
            return;
        }
        $posted_data = sanitize_text_field( $_POST['post_data'] ?? '' );
        /**
         * Bail for new orders.
         */
        if ( empty( $posted_data ) && empty( WC()->session->get( 'dps_timeslot_fee_amount' ) ) ) {
            return;
        }
        /**
         * This check happens when customer clicks "Place Order" button and ajax runs.
         * $posted_data would be empty but we would have already set the session key for the fee on the checkout page.
         */
        if ( empty( $posted_data ) && !empty( WC()->session->get( 'dps_timeslot_fee_amount' ) ) ) {
            $fee_name = WC()->session->get( 'dps_timeslot_fee_name' );
            $fee_amount = WC()->session->get( 'dps_timeslot_fee_amount' );
            $taxable = ( WC()->session->get( 'chwazi_timeslot_fee_taxable' ) ?: false );
            $tax_class = ( WC()->session->get( 'chwazi_timeslot_fee_tax_class' ) ?: false );
            WC()->cart->add_fee(
                $fee_name,
                $fee_amount,
                $taxable,
                $tax_class
            );
            // Fees vary if its taxable or not.
            WC()->session->set( 'dps_timeslot_fee_amount', false );
            // Set to false so new orders don't show the fee until it is set.
            WC()->session->set( 'dps_timeslot_fee_name', false );
            // Set to false so new orders don't show the fee until it is set.
            WC()->session->set( 'chwazi_timeslot_fee_taxable', false );
            // Set to false so new orders don't have tax settings if not set.
            WC()->session->set( 'chwazi_timeslot_fee_tax_class', false );
            // Set to false so new orders don't have tax settings if not set.
            return;
        }
        $fields = UtilitiesHelper::normalizePostString( $posted_data );
        $order_type = $fields['lpac_dps_order_type'] ?? '';
        if ( empty( $order_type ) ) {
            return;
        }
        $scheduling_settings = new SchedulingSettings($order_type);
        if ( $scheduling_settings->enableTimeslotFees() === false ) {
            return;
        }
        $date_field = 'lpac_dps_' . $order_type . '_date';
        $selected_date = $fields[$date_field] ?? '';
        if ( empty( $selected_date ) ) {
            return;
        }
        $time_field = 'lpac_dps_' . $order_type . '_time';
        $selected_time = $fields[$time_field] ?? '';
        if ( empty( $selected_time ) ) {
            return;
        }
        $normalized_time_array = UtilitiesHelper::normalizePostTimeslot( $selected_time );
        $order_type = WC()->session->get( 'lpac_dps_order_type' );
        $fee_data = $this->getTimeSlotFeeData( $order_type, $selected_date, $normalized_time_array );
        $fee_name = $fee_data['fee_name'] ?? '';
        $fee_amount = (float) ($fee_data['fee_amount'] ?? 0);
        if ( empty( $fee_amount ) ) {
            WC()->session->set( 'dps_timeslot_fee_amount', false );
            WC()->session->set( 'dps_timeslot_fee_name', false );
            return;
        }
        if ( $scheduling_settings->applyTaxesToTimeslotFees() ) {
            // If taxes are enabled for timeslot fees.
            $tax_class = $scheduling_settings->getTimeslotFeesTaxClass();
            WC()->cart->add_fee(
                $fee_name,
                $fee_amount,
                true,
                $tax_class
            );
            WC()->session->set( 'chwazi_timeslot_fee_taxable', true );
            WC()->session->set( 'chwazi_timeslot_fee_tax_class', $tax_class );
        } else {
            WC()->cart->add_fee( $fee_name, $fee_amount );
        }
        /**
         * This fee_amount is shown on the checkout page but the actual attaching happens after the Place Order button is clicked
         * And the fee is retrieved from the session and added.
         * This can be seen in the empty( $posted_data ) && ! empty( WC()->session->get( 'dps_timeslot_fee_amount' ) ) logic above.
         */
        WC()->session->set( 'dps_timeslot_fee_amount', $fee_amount );
        WC()->session->set( 'dps_timeslot_fee_name', $fee_name );
    }

}
