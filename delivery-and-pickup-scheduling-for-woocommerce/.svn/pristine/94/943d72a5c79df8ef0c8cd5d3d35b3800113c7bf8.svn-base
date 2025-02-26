<?php

/**
 * Orchestrate Checkout Page related logic.
 *
 * Author:          Uriahs Victor
 * Created on:      18/10/2022 (d/m/y)
 *
 * @link    https://uriahsvictor.com
 * @since   1.0.0
 * @package Controllers
 */
namespace Lpac_DPS\Controllers\Checkout_Page;

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
use Lpac_DPS\Controllers\Reminders\EmailRemindersController;
use Lpac_DPS\Models\OrderDetails;
use Lpac_DPS\Models\PluginSettings\Emails as EmailsSettingsModel;
/**
 * Class Delivery.
 */
class OrderData extends BaseCheckoutPageController {
    /**
     * Orchestrate the saving of our data with our model.
     *
     * @param int $order_id The order ID.
     * @return void
     */
    public function saveChwaziOrderMetaData( int $order_id ) : void {
        $order_type = sanitize_text_field( wp_unslash( $_POST['lpac_dps_order_type'] ?? '' ) );
        if ( empty( $order_type ) ) {
            return;
        }
        $date = sanitize_text_field( wp_unslash( $_POST["lpac_dps_{$order_type}_date"] ?? '' ) );
        $time = sanitize_text_field( wp_unslash( $_POST["lpac_dps_{$order_type}_time"] ?? '' ) );
        $data = array(
            'order_id'   => $order_id,
            'order_type' => $order_type,
            'date'       => $date,
            'time'       => $time,
        );
        $order_details_model = new OrderDetails();
        $order_details_model->saveOrderData( $data );
        // if ( ! empty( $date ) || ! empty( $time ) ) {
        // If E-mail reminders are enabled then schedule the reminder.
        if ( 'delivery' === $order_type && EmailsSettingsModel::deliveryReminderEnabled() || 'pickup' === $order_type && EmailsSettingsModel::pickupReminderEnabled() ) {
            if ( !empty( $time ) ) {
                // Only enable reminders if there is an order time.
                ( new EmailRemindersController() )->scheduleEmailReminders( $data );
            }
        }
        // }
    }

}
