<?php
/**
 * JETI_Notification_Sender Class
 *
 * @package JetAPI_Integration_For_WooCommerce
 */

defined('ABSPATH') || exit;

/**
 * JETI_Notification_Sender Class
 */
class JETI_Notification_Sender {
    /**
     * Bearer Token for JetAPI service.
     *
     * @var string
     */
    private $bearer_token;

    /**
     * Cascade sending configuration.
     *
     * @var array
     */
    private $cascade_sending;

    /**
     * JetAPI endpoint URL.
     *
     * @var string
     */
    private $api_url = 'https://api.jetapi.io/api/v1/delivery';

    /**
     * User's plan (basic or advanced).
     *
     * @var string
     */
    private $user_plan;

    /**
     * Maximum number of retry attempts.
     *
     * @var int
     */
    private $max_retry_attempts = 3;

    /**
     * Enable notifications setting.
     *
     * @var bool
     */
    private $enable_notifications;

    /**
     * Use JetAPI channels setting.
     *
     * @var bool
     */
    private $use_jetapi_channels;

    /**
     * Individual channel settings.
     *
     * @var array
     */
    private $channel_settings;

    /**
     * Table name for message history.
     *
     * @var string
     */
    private $table_name;

    /**
     * Constructor.
     */
    public function __construct() {
        global $wpdb;
        $this->table_name = $wpdb->prefix . 'jeti_message_history';
        $this->load_settings();
        add_action('jeti_process_bulk_queue', array($this, 'process_bulk_queue'));
        add_action('init', array($this, 'schedule_queue_processing'));
        $this->maybe_create_table();
    }

    /**
     * Load settings from WooCommerce options.
     */
    private function load_settings() {
        $settings = get_option('jeti_settings', array());
        $this->bearer_token = isset($settings['bearer_token']) ? $settings['bearer_token'] : '';

        $this->cascade_sending = isset($settings['cascade_sending']) && is_array($settings['cascade_sending']) 
            ? $settings['cascade_sending'] 
            : array('whatsapp', 'tdlib', 'sms');

        $this->user_plan = isset($settings['user_plan']) && $settings['user_plan'] === 'advanced' ? 'advanced' : 'advanced';

        $this->enable_notifications = isset($settings['enable_notifications']) ? $settings['enable_notifications'] === 'yes' : true;

        $this->use_jetapi_channels = isset($settings['use_jetapi_channels']) ? $settings['use_jetapi_channels'] === 'yes' : false;

        $this->channel_settings = array(
            'whatsapp' => isset($settings['channel_whatsapp']) ? $settings['channel_whatsapp'] === 'yes' : true,
            'tdlib' => isset($settings['channel_telegram']) ? $settings['channel_telegram'] === 'yes' : true,
            'sms' => isset($settings['channel_sms']) ? $settings['channel_sms'] === 'yes' : true,
        );
    }

    /**
     * Create the message history table if it doesn't exist and add the retry_count column if missing.
     */
    private function maybe_create_table() {
        global $wpdb;
        
        $cache_key = 'jeti_table_exists_' . $this->table_name;
        $table_exists = wp_cache_get($cache_key);

        if (false === $table_exists) {
            $table_exists = $wpdb->get_var(
                $wpdb->prepare("SHOW TABLES LIKE %s", $this->table_name)
            );
            wp_cache_set($cache_key, $table_exists, '', HOUR_IN_SECONDS);
        }

        if ($table_exists != $this->table_name) {
            $charset_collate = $wpdb->get_charset_collate();
            $table_name = '`' . $wpdb->_real_escape($this->table_name) . '`';
            
            // Create table SQL with proper escaping
            $sql = "CREATE TABLE IF NOT EXISTS $table_name (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
                recipient varchar(255) NOT NULL,
                message text NOT NULL,
                status varchar(20) NOT NULL,
                channel varchar(20) NOT NULL,
                retry_count int(11) DEFAULT 0 NOT NULL,
                campaign_name varchar(255) DEFAULT NULL,
                PRIMARY KEY  (id)
            ) $charset_collate";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }

        // Check if columns need to be added
        $this->maybe_add_columns();
    }

    /**
     * Add new columns if they don't exist
     */
    private function maybe_add_columns() {
        global $wpdb;
        
        $columns_to_add = array(
            'retry_count' => "int(11) DEFAULT 0 NOT NULL",
            'campaign_name' => "varchar(255) DEFAULT NULL"
        );

        foreach ($columns_to_add as $column => $definition) {
            $cache_key = "jeti_column_{$column}_exists";
            $column_exists = wp_cache_get($cache_key);

            if (false === $column_exists) {
                // phpcs:ignore WordPress.DB.DirectDatabaseQuery
                $column_exists = $wpdb->get_results($wpdb->prepare(
                    "SELECT * FROM INFORMATION_SCHEMA.COLUMNS 
                    WHERE TABLE_SCHEMA = %s 
                    AND TABLE_NAME = %s 
                    AND COLUMN_NAME = %s",
                    DB_NAME,
                    $this->table_name,
                    $column
                ));
                wp_cache_set($cache_key, !empty($column_exists), '', HOUR_IN_SECONDS);
            }

            if (empty($column_exists)) {
                // phpcs:ignore WordPress.DB.DirectDatabaseQuery.SchemaChange, WordPress.DB.PreparedSQL.InterpolatedNotPrepared
                $wpdb->query(
                    "ALTER TABLE `" . esc_sql($this->table_name) . "` 
                    ADD COLUMN " . esc_sql($column) . " " . esc_sql($definition)
                );
            }
        }
    }

    /**
     * Send notification using JetAPI.
     *
     * @param string $recipient The recipient of the notification (phone number).
     * @param string $message The message to send.
     * @return bool True if the notification was sent successfully, false otherwise.
     */
    public function send_notification($recipient, $message) {
        if (!$this->enable_notifications) {
            return false;
        }

        if (empty($this->bearer_token)) {
            return false;
        }

        if (empty($recipient) || empty($message)) {
            return false;
        }

        $dispatch_routing = $this->use_jetapi_channels ? array() : array_values(array_filter($this->cascade_sending, function($channel) {
            return isset($this->channel_settings[$channel]) && $this->channel_settings[$channel];
        }));

        $request_body = array(
            'phone' => $recipient,
            'text' => $message,
            'sender_name' => get_option('jetapi_sender_name', 'JETAPI.IO'),
        );

        if (!empty($dispatch_routing)) {
            $request_body['dispatch_routing'] = $dispatch_routing;
        }
        
        $request_body = wp_json_encode($request_body);
        
        $response = wp_remote_post($this->api_url, array(
            'headers' => array(
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $this->bearer_token,
            ),
            'body' => $request_body,
            'timeout' => 30,
        ));

        if (is_wp_error($response)) {
            return false;
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        $success = isset($data['meta']['code']) && $data['meta']['code'] === 200;
        
        // Determine the channel(s) used
        if ($this->use_jetapi_channels) {
            $channel = 'JetAPI settings';
        } else {
            $channel = isset($data['delivery']['dispatch_routing']) && is_array($data['delivery']['dispatch_routing']) 
                ? implode(', ', $data['delivery']['dispatch_routing']) 
                : (isset($data['delivery']['dispatch_routing'][0]) ? $data['delivery']['dispatch_routing'][0] : 'unknown');
        }
        $status = isset($data['delivery']['status_description']) ? $data['delivery']['status_description'] : 'Unknown';
        $sender_name = isset($data['delivery']['sender_name']) ? $data['delivery']['sender_name'] : 'Unknown';
        
        $this->store_message_history($recipient, $message, $status, $channel, $sender_name);

        if (!$success) {
            return false;
        }

        return true;
    }

    /**
     * Send bulk notification using JetAPI.
     *
     * @param string $recipient The recipient of the notification (phone number).
     * @param string $message The message to send.
     * @param array $dispatch_routing The channels to use for sending the message.
     * @return bool True if the notification was sent successfully, false otherwise.
     */
    public function send_bulk_notification($recipient, $message, $dispatch_routing)
    {
        if (!$this->enable_notifications) {
            return false;
        }

        if (empty($this->bearer_token)) {
            return false;
        }

        if (empty($recipient) || empty($message)) {
            return false;
        }

        $request_body = array(
            'phone' => $recipient,
            'text' => $message,
            'sender_name' => get_option('jetapi_sender_name', 'JETAPI.IO'),
        );

        if (!empty($dispatch_routing)) {
            $request_body['dispatch_routing'] = $dispatch_routing;
        }

        $request_body = wp_json_encode($request_body);

        $response = wp_remote_post($this->api_url, array(
            'headers' => array(
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $this->bearer_token,
            ),
            'body' => $request_body,
            'timeout' => 30,
        ));

        if (is_wp_error($response)) {
            return false;
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        $success = isset($data['meta']['code']) && $data['meta']['code'] === 200;

        // Determine the channel(s) used
        if ($this->use_jetapi_channels) {
            $channel = 'JetAPI settings';
        } else {
            $channel = isset($data['delivery']['dispatch_routing']) && is_array($data['delivery']['dispatch_routing'])
            ? implode(', ', $data['delivery']['dispatch_routing'])
            : (isset($data['delivery']['dispatch_routing'][0]) ? $data['delivery']['dispatch_routing'][0] : 'unknown');
        }
        $status = isset($data['delivery']['status_description']) ? $data['delivery']['status_description'] : 'Unknown';
        $sender_name = isset($data['delivery']['sender_name']) ? $data['delivery']['sender_name'] : 'Unknown';

        $this->store_message_history($recipient, $message, $status, $channel, $sender_name);

        if (!$success) {
            return false;
        }

        return true;
    }

    /**
     * Send bulk notifications using JetAPI.
     *
     * @param string $campaign_name The name of the campaign.
     * @param array $recipients Array of recipient phone numbers.
     * @param string $message The message to send.
     * @param array $dispatch_routing The channels to use for sending the messages.
     * @return array Array of results for each recipient.
     */
    public function send_bulk_notifications($campaign_name, $recipients, $message, $dispatch_routing) {
        if (empty($recipients) || empty($message)) {
            return array();
        }

        $chunk_size = $this->user_plan === 'advanced' ? 5000 : 50;
        $chunks = array_chunk($recipients, $chunk_size);

        $campaign_id = wp_insert_post(array(
            'post_title' => $campaign_name,
            'post_type' => 'jeti_campaign',
            'post_status' => 'publish',
        ));

        foreach ($chunks as $index => $chunk) {
            $this->add_to_bulk_queue($campaign_id, $chunk, $message, $dispatch_routing, $index * ($this->user_plan === 'advanced' ? 1440 : 25), $campaign_name);
        }

        if (!wp_next_scheduled('jeti_process_bulk_queue')) {
            wp_schedule_single_event(time(), 'jeti_process_bulk_queue');
        }

        return array('queued' => count($recipients));
    }

    /**
     * Add messages to the bulk queue.
     *
     * @param int $campaign_id The ID of the campaign.
     * @param array $recipients Array of recipient phone numbers.
     * @param string $message The message to send.
     * @param array $dispatch_routing The channels to use for sending the messages.
     * @param int $delay Delay in minutes before processing this chunk.
     * @param string $campaign_name The name of the campaign.
     */
    private function add_to_bulk_queue($campaign_id, $recipients, $message, $dispatch_routing, $delay, $campaign_name) {
        $queue = get_option('jeti_bulk_message_queue', array());
        $queue[] = array(
            'campaign_id' => $campaign_id,
            'recipients' => $recipients,
            'message' => $message,
            'dispatch_routing' => $dispatch_routing,
            'process_time' => time() + ($delay * 60),
            'campaign_name' => $campaign_name,
        );
        update_option('jeti_bulk_message_queue', $queue);

        // Store queued messages in message history
        $channel = empty($dispatch_routing) ? 'JetAPI settings' : implode(', ', $dispatch_routing);
        foreach ($recipients as $recipient) {
            $this->store_message_history($recipient, $message, 'In queue', $channel, '', $campaign_name);
        }
    }

    /**
     * Process the bulk message queue.
     */
    public function process_bulk_queue() {
        $processed = 0;
        $queue = get_option('jeti_bulk_message_queue', array());
        foreach ($queue as $key => $item) {
            if ($item['process_time'] <= time()) {
                foreach ($item['recipients'] as $recipient) {
                    $success = $this->send_bulk_notification($recipient, $item['message'], $item['dispatch_routing']);
                    if ($success) {
                        $processed++;
                        $this->update_message_history_status($recipient, $item['message'], 'Queue proceeded', implode(', ', $item['dispatch_routing']), $item['campaign_name']);
                    } else {
                        $this->update_message_history_status($recipient, $item['message'], 'failed', implode(', ', $item['dispatch_routing']), $item['campaign_name']);
                        $this->add_to_bulk_retry_queue($recipient, $item['message'], $item['dispatch_routing'], $item['campaign_name']);
                    }
                }
                unset($queue[$key]);
            }
        }
        update_option('jeti_bulk_message_queue', $queue);

        // Process bulk retry queue
        $this->process_bulk_retry_queue();

        // Schedule next queue processing
        $this->schedule_queue_processing();

        return $processed;
    }

    /**
     * Add a failed bulk message to the retry queue.
     *
     * @param string $recipient The recipient of the notification.
     * @param string $message The message to send.
     * @param array $dispatch_routing The channels to use for sending the message.
     * @param string $campaign_name The name of the campaign.
     */
    private function add_to_bulk_retry_queue($recipient, $message, $dispatch_routing, $campaign_name) {
        global $wpdb;

        $wpdb->insert(
            $this->table_name,
            array(
                'date' => current_time('mysql'),
                'recipient' => $recipient,
                'message' => $message,
                'status' => 'failed',
                'channel' => implode(', ', $dispatch_routing),
                'retry_count' => 0,
                'campaign_name' => $campaign_name,
            ),
            array('%s', '%s', '%s', '%s', '%s', '%d', '%s')
        );
    }

    /**
     * Process the bulk retry queue.
     */
    private function process_bulk_retry_queue() {
        global $wpdb;
        $table_name = '`' . $wpdb->_real_escape($this->table_name) . '`';

        $cache_key = 'jeti_retry_messages';
        $retry_messages = wp_cache_get($cache_key);

        if (false === $retry_messages) {
            $retry_messages = $wpdb->get_results(
                $wpdb->prepare(
                    "SELECT * FROM $table_name 
                    WHERE status = %s 
                    AND retry_count < %d 
                    AND campaign_name IS NOT NULL",
                    'failed',
                    $this->max_retry_attempts
                ),
                ARRAY_A
            );
            wp_cache_set($cache_key, $retry_messages, '', 60);
        }
        return $retry_messages;
    }

    /**
     * Schedule queue processing.
     */
    public function schedule_queue_processing() {
        if (!wp_next_scheduled('jeti_process_bulk_queue')) {
            wp_schedule_event(time(), 'every_minute', 'jeti_process_bulk_queue');
        }
    }

    /**
     * Get the user plan.
     *
     * @return string The user plan ('basic' or 'advanced').
     */
    private function get_user_plan() {
        return $this->user_plan;
    }

    /**
     * Store message history.
     *
     * @param string $recipient The recipient of the notification.
     * @param string $message The message sent.
     * @param string $status The status of the message.
     * @param string $channel The delivery channel.
     * @param string $sender_name The sender name used.
     * @param string $campaign_name The name of the campaign (if applicable).
     */
    private function store_message_history($recipient, $message, $status, $channel, $sender_name = '', $campaign_name = '') {
        global $wpdb;

        $result = $wpdb->insert(
            $this->table_name,
            array(
                'date' => current_time('mysql'),
                'recipient' => $recipient,
                'message' => $message,
                'status' => $status,
                'channel' => $channel,
                'retry_count' => 0,
                'campaign_name' => $campaign_name,
            ),
            array('%s', '%s', '%s', '%s', '%s', '%d', '%s')
        );

        if ($result !== false) {
            // Clear related caches
            wp_cache_delete('jeti_message_history_*', '');
            wp_cache_delete('jeti_total_messages_*', '');
            return true;
        }
        
        return false;
    }

    /**
     * Update message history status.
     *
     * @param string $recipient The recipient of the notification.
     * @param string $message The message sent.
     * @param string $status The new status of the message.
     * @param string $channel The delivery channel.
     * @param string $campaign_name The name of the campaign.
     */
    private function update_message_history_status($recipient, $message, $status, $channel, $campaign_name) {
        global $wpdb;

        $result = $wpdb->update(
            $this->table_name,
            array('status' => $status),
            array(
                'recipient' => $recipient,
                'message' => $message,
                'status' => 'In queue',
                'channel' => $channel,
                'campaign_name' => $campaign_name
            ),
            array('%s'),
            array('%s', '%s', '%s', '%s', '%s')
        );

        if ($result !== false) {
            // Clear related caches
            wp_cache_delete('jeti_message_history_*', '');
            wp_cache_delete('jeti_total_messages_*', '');
        }
    }

    /**
     * Get message history.
     *
     * @param int $offset Offset for pagination.
     * @param int $per_page Number of items per page.
     * @param string $search Search term.
     * @return array Array of message history entries.
     */
    public function get_message_history($offset = 0, $per_page = 20, $search = '') {
        global $wpdb;
        $table_name = '`' . $wpdb->_real_escape($this->table_name) . '`';

        $cache_key = 'jeti_message_history_' . md5($offset . $per_page . $search);
        $results = wp_cache_get($cache_key);

        if (false === $results) {
            if (!empty($search)) {
                $search_like = '%' . $wpdb->esc_like($search) . '%';
                $results = $wpdb->get_results(
                    $wpdb->prepare(
                        "SELECT * FROM $table_name 
                        WHERE recipient LIKE %s 
                        OR message LIKE %s 
                        OR campaign_name LIKE %s 
                        ORDER BY date DESC 
                        LIMIT %d OFFSET %d",
                        $search_like,
                        $search_like,
                        $search_like,
                        $per_page,
                        $offset
                    ),
                    ARRAY_A
                );
            } else {
                $results = $wpdb->get_results(
                    $wpdb->prepare(
                        "SELECT * FROM $table_name 
                        ORDER BY date DESC 
                        LIMIT %d OFFSET %d",
                        $per_page,
                        $offset
                    ),
                    ARRAY_A
                );
            }
            wp_cache_set($cache_key, $results, '', 300);
        }

        return $results;
    }

    /**
     * Get total number of messages.
     *
     * @param string $search Search term.
     * @return int Total number of messages.
     */
    public function get_total_messages($search = '') {
        global $wpdb;
        $table_name = '`' . $wpdb->_real_escape($this->table_name) . '`';

        $cache_key = 'jeti_total_messages_' . md5($search);
        $total = wp_cache_get($cache_key);

        if (false === $total) {
            if (!empty($search)) {
                $search_like = '%' . $wpdb->esc_like($search) . '%';
                $total = $wpdb->get_var(
                    $wpdb->prepare(
                        "SELECT COUNT(*) FROM $table_name 
                        WHERE recipient LIKE %s 
                        OR message LIKE %s 
                        OR campaign_name LIKE %s",
                        $search_like,
                        $search_like,
                        $search_like
                    )
                );
            } else {
                $total = $wpdb->get_var(
                    "SELECT COUNT(*) FROM $table_name"
                );
            }
            wp_cache_set($cache_key, (int)$total, '', 300);
        }

        return (int)$total;
    }

    /**
     * Get current queue status.
     *
     * @return array Array containing queue status information.
     */
    public function get_bulk_queue_status() {
        $queue = get_option('jeti_bulk_message_queue', array());
        $total_messages = 0;
        $next_processing_time = PHP_INT_MAX;

        foreach ($queue as $item) {
            $total_messages += count($item['recipients']);
            $next_processing_time = min($next_processing_time, $item['process_time']);
        }

        return array(
            'messages_in_queue' => $total_messages,
            'next_processing_time' => $next_processing_time === PHP_INT_MAX ? null : $next_processing_time,
        );
    }
}
