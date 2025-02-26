<?php
/**
 * JetAPI Bulk Messaging Class
 *
 * @package JetAPI_Integration_For_WooCommerce
 */

defined( 'ABSPATH' ) || exit;

/**
 * JETI_Bulk_Messaging Class
 */
class JETI_Bulk_Messaging {

    /**
     * Notification sender instance.
     *
     * @var JETI_Notification_Sender
     */
    private $notification_sender;

    /**
     * Constructor
     */
    public function __construct() {
        $this->notification_sender = new JETI_Notification_Sender();
    }

    /**
     * Handle bulk message send
     *
     * This method uses only the settings from the bulk messaging page.
     * Global settings, except for "User Plan", do not affect bulk message sending.
     *
     * @param array  $channels The channels to use for sending messages.
     * @param string $campaign_name The name of the campaign.
     * @param string $message The message to send.
     * @param array  $recipients Array of recipient phone numbers.
     * @param bool   $use_jetapi_channels Whether to use JetApi channels and order.
     * @param array  $cascade_order The order of channels for cascade sending.
     * @return array Result of the bulk send operation.
     */
    public function handle_bulk_message_send($channels, $campaign_name, $message, $recipients, $use_jetapi_channels, $cascade_order) {
        if (empty($recipients)) {
            return array('error' => 'No valid recipients provided.');
        }

        if (empty($message)) {
            return array('error' => 'Message content is empty.');
        }

        if ($use_jetapi_channels) {
            $dispatch_routing = array();
        } else {
            if (empty($channels)) {
                return array('error' => 'No channels selected.');
            }
            $dispatch_routing = $this->get_dispatch_routing($channels, $cascade_order);
        }

        $result = $this->notification_sender->send_bulk_notifications($campaign_name, $recipients, $message, $dispatch_routing);

        $this->save_campaign_results($campaign_name, $channels, $message, $recipients, $result, $use_jetapi_channels, $cascade_order);

        return $result;
    }

    /**
     * Get dispatch routing based on selected channels and cascade order
     *
     * @param array $channels Selected channels
     * @param array $cascade_order Cascade sending order
     * @return array Dispatch routing
     */
    private function get_dispatch_routing($channels, $cascade_order) {
        $dispatch_routing = array();
        foreach ($cascade_order as $channel) {
            if (in_array($channel, $channels)) {
                $dispatch_routing[] = $channel;
            }
        }
        // Add any selected channels that weren't in the cascade order
        foreach ($channels as $channel) {
            if (!in_array($channel, $dispatch_routing)) {
                $dispatch_routing[] = $channel;
            }
        }
        return $dispatch_routing;
    }

    /**
     * Get current queue status
     *
     * @return array Array containing queue status information.
     */
    public function get_queue_status() {
        return $this->notification_sender->get_bulk_queue_status();
    }

    /**
     * Save campaign results
     *
     * @param string $campaign_name The name of the campaign.
     * @param array  $channels The channels used for sending messages.
     * @param string $message The message content.
     * @param array  $recipients The list of recipients.
     * @param array  $result The result of the bulk send operation.
     * @param bool   $use_jetapi_channels Whether JetApi channels and order were used.
     * @param array  $cascade_order The order of channels for cascade sending.
     */
    private function save_campaign_results($campaign_name, $channels, $message, $recipients, $result, $use_jetapi_channels, $cascade_order) {
        $campaign_data = array(
            'name' => sanitize_text_field($campaign_name),
            'channels' => array_map('sanitize_text_field', $channels),
            'use_jetapi_channels' => (bool) $use_jetapi_channels,
            'cascade_order' => array_map('sanitize_text_field', $cascade_order),
            'message' => sanitize_textarea_field($message),
            'recipients' => array_map('sanitize_text_field', $recipients),
            'queued' => absint($result['queued']),
            'timestamp' => current_time('mysql'),
        );

        $existing_campaigns = get_option('jeti_campaigns', array());
        $existing_campaigns[] = $campaign_data;
        update_option('jeti_campaigns', $existing_campaigns);
    }
}

// Include the notification sender class
require_once JETI_PLUGIN_DIR . 'includes/class-jeti-notification-sender.php';
