<?php
/**
 * JetAPI Campaign Manager Class
 *
 * @package JetAPI_Integration_For_WooCommerce
 */

defined( 'ABSPATH' ) || exit;

/**
 * JETI_Campaign_Manager Class
 */
class JETI_Campaign_Manager {

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
        add_action( 'admin_post_jeti_create_campaign', array( $this, 'handle_campaign_creation' ) );
        $this->notification_sender = new JETI_Notification_Sender();
    }

    /**
     * Create a new campaign
     *
     * @param string $name Campaign name.
     * @param string $channel Communication channel.
     * @param array  $recipients Campaign recipients.
     * @param string $message Campaign message.
     * @return int Campaign ID
     */
    public function create_campaign($name, $channel, $recipients, $message) {
        return $this->save_campaign($name, $channel, $message, $recipients, count($recipients));
    }

    /**
     * Handle campaign creation
     */
    public function handle_campaign_creation() {
        if ( ! current_user_can( 'manage_woocommerce' ) ) {
            wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'jetapi-integration-for-woocommerce' ) );
        }

        // Verify nonce
        check_admin_referer( 'jeti_create_campaign' );

        // Validate and sanitize POST data
        $campaign_name = isset($_POST['jeti_campaign_name']) 
            ? sanitize_text_field(wp_unslash($_POST['jeti_campaign_name'])) 
            : '';
        $channel = isset($_POST['jeti_channel']) 
            ? sanitize_text_field(wp_unslash($_POST['jeti_channel'])) 
            : '';
        $message = isset($_POST['jeti_message']) 
            ? sanitize_textarea_field(wp_unslash($_POST['jeti_message'])) 
            : '';
        $recipients = $this->get_recipients_from_post();

        if (empty($recipients)) {
            $this->redirect_with_error('No valid recipients provided.');
            return;
        }

        if (empty($message)) {
            $this->redirect_with_error('Message content is empty.');
            return;
        }

        // Create campaign
        $campaign_id = $this->create_campaign($campaign_name, $channel, $recipients, $message);

        // Queue campaign messages
        $result = $this->notification_sender->send_bulk_notifications($campaign_name, $recipients, $message, $channel);

        $redirect_message = sprintf(
            'Campaign "%s" created and queued. Total recipients: %d',
            $campaign_name,
            $result['queued']
        );

        wp_redirect( add_query_arg( 
            array(
                'message' => urlencode($redirect_message),
                '_wpnonce' => wp_create_nonce('jeti_messages_nonce')
            ), 
            admin_url( 'admin.php?page=jeti-messages' ) 
        ) );
        exit;
    }

    /**
     * Get recipients from POST data
     *
     * @return array
     */
    private function get_recipients_from_post() {
        $recipients = array();
        
        // Verify nonce for this function as well
        check_admin_referer('jeti_create_campaign');
        
        if (isset($_POST['jeti_recipients'])) {
            // First sanitize the entire textarea content
            $recipients_text = sanitize_textarea_field(wp_unslash($_POST['jeti_recipients']));
            
            // Split into lines and process each recipient
            $raw_recipients = explode("\n", $recipients_text);
            foreach ($raw_recipients as $recipient) {
                // Additional sanitization for each recipient
                $recipient = trim(sanitize_text_field($recipient));
                
                // Basic phone number validation (can be enhanced based on your needs)
                if (!empty($recipient) && preg_match('/^[0-9+\-\s()]*$/', $recipient)) {
                    // Remove any spaces or formatting characters, keeping only numbers and plus sign
                    $recipient = preg_replace('/[^0-9+]/', '', $recipient);
                    if (!empty($recipient)) {
                        $recipients[] = $recipient;
                    }
                }
            }
        }
        
        // Remove any duplicates
        return array_unique($recipients);
    }

    /**
     * Save campaign to the database
     *
     * @param string $name Campaign name.
     * @param string $channel Communication channel.
     * @param string $message Campaign message.
     * @param array  $recipients Campaign recipients.
     * @param int    $queued Number of queued messages.
     * @return int Campaign ID
     */
    private function save_campaign( $name, $channel, $message, $recipients, $queued ) {
        $campaign_data = array(
            'name' => sanitize_text_field($name),
            'channel' => sanitize_text_field($channel),
            'message' => sanitize_textarea_field($message),
            'recipients' => array_map('sanitize_text_field', $recipients),
            'queued' => absint($queued),
            'timestamp' => current_time('mysql'),
        );

        $existing_campaigns = get_option('jeti_campaigns', array());
        $campaign_id = count($existing_campaigns);
        $existing_campaigns[] = $campaign_data;
        update_option('jeti_campaigns', $existing_campaigns);

        return $campaign_id;
    }

    /**
     * Redirect with error message
     *
     * @param string $error_message The error message to display.
     */
    private function redirect_with_error($error_message) {
        wp_redirect( add_query_arg( 
            array(
                'error' => urlencode($error_message),
                '_wpnonce' => wp_create_nonce('jeti_messages_nonce')
            ), 
            admin_url( 'admin.php?page=jeti-messages' ) 
        ) );
        exit;
    }

    /**
     * Get all campaigns
     *
     * @return array Array of campaigns.
     */
    public function get_campaigns() {
        return get_option('jeti_campaigns', array());
    }

    /**
     * Get campaign by ID
     *
     * @param int $campaign_id Campaign ID.
     * @return array|false Campaign data or false if not found.
     */
    public function get_campaign($campaign_id) {
        $campaigns = $this->get_campaigns();
        return isset($campaigns[$campaign_id]) ? $campaigns[$campaign_id] : false;
    }
}

// Include the notification sender class
require_once JETI_PLUGIN_DIR . 'includes/class-jeti-notification-sender.php';
