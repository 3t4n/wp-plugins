<?php

/**
 * File responsible for defining methods that deal with Email reminders.
 *
 * Author:          Uriahs Victor
 * Created on:      21/08/2023 (d/m/y)
 *
 * @link    https://uriahsvictor.com
 * @since   1.1.0
 * @package Controllers
 */
namespace Lpac_DPS\Controllers\Reminders;

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
use DateTime;
use Lpac_DPS\Controllers\BaseController;
use Lpac_DPS\Helpers\FunctionsHelper;
use Lpac_DPS\Helpers\Logger;
use Lpac_DPS\Helpers\OrderHelper;
use Lpac_DPS\Helpers\UtilitiesHelper;
use Lpac_DPS\Models\PluginSettings\Emails as EmailsSettingsModel;
use WC_Email;
/**
 * Class responsible for handling E-mail Reminders feature.
 *
 * @package Lpac_DPS\Controllers\EmailRemindersController
 * @since 1.1.0
 */
class EmailRemindersController extends BaseController {
    /**
     * Available Magic tags that can be used for Reminders email content.
     *
     * @param mixed $order_id
     * @return array
     * @since 1.1.0
     */
    private function getAvailableMagicTags( $order_id ) : array {
        $order = wc_get_order( $order_id );
        $order_helper = new OrderHelper($order_id);
        $magic_tags = array(
            '{billing_first_name}'     => $order->get_billing_first_name(),
            '{billing_last_name}'      => $order->get_billing_last_name(),
            '{billing_full_name}'      => $order->get_formatted_billing_full_name(),
            '{billing_company}'        => $order->get_billing_company(),
            '{billing_address}'        => $order->get_formatted_billing_address(),
            '{billing_postcode}'       => $order->get_billing_postcode(),
            '{billing_phone}'          => $order->get_billing_phone(),
            '{shipping_first_name}'    => $order->get_shipping_first_name(),
            '{shipping_last_name}'     => $order->get_shipping_last_name(),
            '{shipping_full_name}'     => $order->get_formatted_shipping_full_name(),
            '{shipping_company}'       => $order->get_shipping_company(),
            '{shipping_address}'       => $order->get_formatted_shipping_address(),
            '{shipping_postcode}'      => $order->get_shipping_postcode(),
            '{shipping_phone}'         => $order->get_shipping_phone(),
            '{order_type}'             => $order_helper::getOrderType(),
            '{order_fulfillment_date}' => $order_helper::getOrderFulfillmentDate(),
            '{order_fulfillment_time}' => $order_helper::getOrderFulfillmentTime(),
        );
        return apply_filters( 'dps_reminders_available_magic_tags', $magic_tags, $order );
    }

    /**
     * Get an order details to include inside the reminder email.
     *
     * @param int $order_id
     * @return string
     * @since 1.1.0
     */
    private function getOrderDetails( int $order_id ) : string {
        $mailer = WC()->mailer();
        $order_obj = wc_get_order( $order_id );
        ob_start();
        $mailer->order_details( $order_obj );
        $mailer->customer_details( $order_obj );
        $mailer->email_addresses( $order_obj );
        return ob_get_clean();
    }

    /**
     * Schedule an Email Reminder for a customer.
     *
     * @param array $reminder_data
     * @return void
     * @since 1.1.0
     */
    public function scheduleEmailReminders( array $reminder_data ) : void {
        $order_type = $reminder_data['order_type'];
        $order_id = $reminder_data['order_id'];
        $order_date = $reminder_data['date'];
        // In case no order date is given, assume that the order is taking place on the same day.
        if ( empty( $order_date ) ) {
            $order_date = FunctionsHelper::getCurrentStoreDate();
        }
        // If order time is taken from a timeslot then use the starting time.
        $order_time = UtilitiesHelper::getStartTimeFromTimeSlot( $reminder_data['time'] );
        $order_datetime = trim( $order_date . ' ' . $order_time );
        if ( FunctionsHelper::using24hrTime() ) {
            $formatted_date = DateTime::createFromFormat( 'Y-m-d H:i', $order_datetime, FunctionsHelper::getTimezone() );
        } else {
            $formatted_date = DateTime::createFromFormat( 'Y-m-d h:i A', $order_datetime, FunctionsHelper::getTimezone() );
        }
        if ( empty( $formatted_date ) ) {
            // We need this so that we can get the timestamp.
            return;
        }
        $timestamp = $formatted_date->getTimestamp();
        if ( empty( $timestamp ) ) {
            return;
        }
        // How many minutes before the order is due should the email be sent.
        $minutes_before = EmailsSettingsModel::{$order_type . 'ReminderTimeBefore'}();
        $timestamp = UtilitiesHelper::subtractMinutesFromTimestamp( $timestamp, $minutes_before );
        $logger = new Logger();
        if ( !class_exists( 'WC_Action_Queue' ) ) {
            if ( file_exists( WP_PLUGIN_DIR . '/woocommerce/includes/interfaces/class-wc-queue-interface.php' ) && file_exists( WP_PLUGIN_DIR . '/woocommerce/includes/queue/class-wc-action-queue.php' ) ) {
                require_once WP_PLUGIN_DIR . '/woocommerce/includes/interfaces/class-wc-queue-interface.php';
                require_once WP_PLUGIN_DIR . '/woocommerce/includes/queue/class-wc-action-queue.php';
            } else {
                $logger->logCritical( 'WC_Action_Queue class not found and there was an issue including the class files.' );
            }
        }
        try {
            $action_scheduler = new \WC_Action_Queue();
        } catch ( \Throwable $th ) {
            $logger->logError( 'Error scheduling email reminder: ' . $th->getMessage() );
            return;
        }
        $reminder_data['customer_email'] = wc_get_order( $order_id )->get_billing_email();
        $action_scheduler->schedule_single(
            $timestamp,
            'dps_for_wc_email_reminder',
            array(
                'reminder_data' => $reminder_data,
            ),
            'dps-for-wc'
        );
    }

    /**
     * Send a reminder to the customer.
     *
     * @param mixed $reminder_data
     * @return void
     * @since 1.1.0
     */
    public function sendReminder( $reminder_data ) {
        $mailer = WC()->mailer();
        $email = new WC_Email();
        $order_id = $reminder_data['order_id'];
        $excluded_statuses = array('completed', 'cancelled');
        // No need to send reminder if order is marked as completed or cancelled.
        $excluded_statuses = apply_filters(
            'chwazi_reminders_excluded_statuses',
            $excluded_statuses,
            $reminder_data,
            WC()
        );
        if ( !empty( $order_status = wc_get_order( $order_id )->get_status() ) && in_array( $order_status, $excluded_statuses ) ) {
            return;
        }
        $order_type = $reminder_data['order_type'];
        $to = $reminder_data['customer_email'];
        $magic_tags = $this->getAvailableMagicTags( $order_id );
        $email_subject = EmailsSettingsModel::{$order_type . 'ReminderEmailSubject'}();
        $email_subject = UtilitiesHelper::replaceMagicTags( $magic_tags, $email_subject );
        $email_heading = EmailsSettingsModel::{$order_type . 'ReminderEmailHeading'}();
        $email_heading = UtilitiesHelper::replaceMagicTags( $magic_tags, $email_heading );
        $email_message = EmailsSettingsModel::{$order_type . 'ReminderEmailBody'}();
        $email_message = UtilitiesHelper::replaceMagicTags( $magic_tags, $email_message );
        $include_order_details = EmailsSettingsModel::{$order_type . 'ReminderIncludeOrderDetails'}();
        if ( $include_order_details ) {
            $email_message = $email_message . $this->getOrderDetails( $order_id );
        }
        $message = $mailer->wrap_message( $email_heading, $email_message );
        $headers = apply_filters( 'dps_reminder_email_headers', $email->get_headers(), $reminder_data );
        $attachments = apply_filters( 'dps_reminder_email_attachments', $email->get_attachments(), $reminder_data );
        $email->send(
            $to,
            $email_subject,
            $message,
            $headers,
            $attachments
        );
    }

}
