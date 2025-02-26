<?php
/**
 * JetAPI Bulk Messaging Page
 *
 * @package JetAPI_Integration_For_WooCommerce
 */

defined('ABSPATH') || exit;

class JETI_Bulk_Messaging_Page {

    /**
     * Initialize the bulk messaging page
     */
    public static function init() {
        // Remove menu creation as it's now handled in class-jeti-integration.php
    }

    /**
     * Render the bulk messaging page
     */
    public static function render_bulk_messaging_page() {
        if (!current_user_can('manage_options')) {
            return;
        }

        if (!JETI_Auth::is_authenticated()) {
            self::render_authentication_message();
            return;
        }

        JETI_Dashboard_Page::render_tabs('bulk-messaging');

        if (isset($_POST['jeti_bulk_send']) && check_admin_referer('jeti_bulk_messaging')) {
            self::process_bulk_messaging();
        }

        $settings = get_option('jetapi_settings', array());
        $cascade_order = isset($settings['cascade_sending']) ? $settings['cascade_sending'] : array('whatsapp', 'Telegram', 'sms');

        self::render_bulk_messaging_form($cascade_order);
    }

    /**
     * Render the authentication message
     */
    private static function render_authentication_message() {
        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <div class="notice notice-error">
                <p><?php esc_html_e('Please authenticate with JetAPI to access this page.', 'jetapi-integration-for-woocommerce'); ?></p>
            </div>
            <p>
                <a href="<?php echo esc_url(admin_url('admin.php?page=jeti-settings')); ?>" class="button">
                    <?php esc_html_e('Go to JetAPI Settings', 'jetapi-integration-for-woocommerce'); ?>
                </a>
            </p>
        </div>
        <?php
    }

    /**
     * Render the bulk messaging form
     *
     * @param array $cascade_order The cascade order of channels
     */
    private static function render_bulk_messaging_form($cascade_order) {
        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <?php settings_errors('jeti_bulk_messaging'); ?>
            <p>
                <a href="<?php echo esc_url(admin_url('admin.php?page=jeti-messages')); ?>" class="button">
                    <?php esc_html_e('View Message History', 'jetapi-integration-for-woocommerce'); ?>
                </a>
            </p>
            <form method="post" action="" id="jeti_bulk_messaging_form">
                <?php wp_nonce_field('jeti_bulk_messaging'); ?>
                <table class="form-table">
                    <?php self::render_channels_field($cascade_order); ?>
                    <?php self::render_cascade_sending_field($cascade_order); ?>
                    <?php self::render_use_jetapi_channels_field(); ?>
                    <?php self::render_campaign_name_field(); ?>
                    <?php self::render_message_field(); ?>
                    <?php self::render_recipients_field(); ?>
                </table>
                <p class="submit">
                    <input type="submit" name="jeti_bulk_send" class="button button-primary" value="<?php esc_attr_e('Send Bulk Message', 'jetapi-integration-for-woocommerce'); ?>">
                </p>
            </form>
        </div>
        <?php
    }

    /**
     * Render the channels field
     *
     * @param array $cascade_order The cascade order of channels
     */
    private static function render_channels_field($cascade_order) {
        ?>
        <tr>
            <th scope="row"><?php esc_html_e('Channels', 'jetapi-integration-for-woocommerce'); ?></th>
            <td>
                <fieldset>
                    <legend class="screen-reader-text"><?php esc_html_e('Channels', 'jetapi-integration-for-woocommerce'); ?></legend>
                    <?php foreach ($cascade_order as $channel): ?>
                        <label>
                            <input type="checkbox" name="jeti_bulk_channels[]" value="<?php echo esc_attr($channel); ?>" class="jeti_bulk_channel">
                            <?php echo esc_html(ucfirst(str_replace('tdlib', 'Telegram', $channel))); ?>
                        </label>
                        <br>
                    <?php endforeach; ?>
                </fieldset>
            </td>
        </tr>
        <?php
    }

    /**
     * Render the cascade sending field
     *
     * @param array $cascade_order The cascade order of channels
     */
    private static function render_cascade_sending_field($cascade_order) {
        ?>
        <tr>
            <th scope="row"><?php esc_html_e('Cascade Sending Order', 'jetapi-integration-for-woocommerce'); ?></th>
            <td>
                <fieldset>
                    <legend class="screen-reader-text"><?php esc_html_e('Cascade Sending', 'jetapi-integration-for-woocommerce'); ?></legend>
                    <ul id="jeti_bulk_cascade_order" class="jetapi-ordered-multiselect">
                        <?php foreach ($cascade_order as $channel): ?>
                            <li data-value="<?php echo esc_attr($channel); ?>">
                                <input type="hidden" name="jeti_bulk_cascade_order[]" value="<?php echo esc_attr($channel); ?>" />
                                <?php echo esc_html(ucfirst(str_replace('tdlib', 'Telegram', $channel))); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <p class="description"><?php esc_html_e('Drag and drop to reorder the cascade sending priority.', 'jetapi-integration-for-woocommerce'); ?></p>
                </fieldset>
            </td>
        </tr>
        <?php
    }

    /**
     * Render the "Use JetAPI channels" field
     */
    private static function render_use_jetapi_channels_field() {
        ?>
        <tr>
            <th scope="row"><?php esc_html_e('Use JetApi channels', 'jetapi-integration-for-woocommerce'); ?></th>
            <td>
                <label>
                    <input type="checkbox" name="jeti_use_jetapi_channels" id="jeti_use_jetapi_channels">
                    <?php esc_html_e('Use JetApi channels and order', 'jetapi-integration-for-woocommerce'); ?>
                </label>
                <p class="description">
                    <?php esc_html_e('When checked, selected channels and cascade sending order will be ignored. JetAPI will determine the channels and order.', 'jetapi-integration-for-woocommerce'); ?>
                </p>
            </td>
        </tr>
        <?php
    }

    private static function render_campaign_name_field() {
        ?>
        <tr>
            <th scope="row"><label for="jeti_bulk_name"><?php esc_html_e('Campaign Name', 'jetapi-integration-for-woocommerce'); ?></label></th>
            <td>
                <input type="text" name="jeti_bulk_name" id="jeti_bulk_name" class="regular-text" required>
            </td>
        </tr>
        <?php
    }

    private static function render_message_field() {
        ?>
        <tr>
            <th scope="row"><label for="jeti_bulk_message"><?php esc_html_e('Message', 'jetapi-integration-for-woocommerce'); ?></label></th>
            <td>
                <textarea name="jeti_bulk_message" id="jeti_bulk_message" class="large-text" rows="5" required></textarea>
            </td>
        </tr>
        <?php
    }

    private static function render_recipients_field() {
        ?>
        <tr>
            <th scope="row"><?php esc_html_e('Recipients', 'jetapi-integration-for-woocommerce'); ?></th>
            <td>
                <fieldset>
                    <legend class="screen-reader-text"><?php esc_html_e('Recipients', 'jetapi-integration-for-woocommerce'); ?></legend>
                    <label>
                        <input type="radio" name="jeti_recipient_type" value="manual" checked>
                        <?php esc_html_e('Enter recipients manually', 'jetapi-integration-for-woocommerce'); ?>
                    </label>
                    <br>
                    <label>
                        <input type="radio" name="jeti_recipient_type" value="wc_customers">
                        <?php esc_html_e('Select WooCommerce customers', 'jetapi-integration-for-woocommerce'); ?>
                    </label>
                </fieldset>
                <div id="jeti_manual_recipients">
                    <textarea name="jeti_bulk_recipients" id="jeti_bulk_recipients" class="large-text" rows="5"></textarea>
                    <p class="description"><?php esc_html_e('Enter one phone number or messenger ID per line.', 'jetapi-integration-for-woocommerce'); ?></p>
                </div>
                <div id="jeti_wc_customers" style="display: none;">
                    <?php self::render_customer_list(); ?>
                </div>
            </td>
        </tr>
        <?php
    }

    private static function render_customer_list() {
        if (!class_exists('WooCommerce')) {
            echo '<p>' . esc_html__('WooCommerce is not active. Please activate WooCommerce to use this feature.', 'jetapi-integration-for-woocommerce') . '</p>';
            return;
        }

        $customers = self::get_woocommerce_customers();

        echo '<div class="jeti-customer-list" style="max-height: 200px; overflow-y: scroll;">';
        echo '<label><input type="checkbox" id="jeti_select_all_customers">' . esc_html__('Select All', 'jetapi-integration-for-woocommerce') . '</label><br><br>';

        if (!empty($customers)) {
            foreach ($customers as $customer) {
                $phone_display = !empty($customer['phone']) ? $customer['phone'] : esc_html__('No phone', 'jetapi-integration-for-woocommerce');
                echo '<label>';
                echo '<input type="checkbox" class="jeti_customer_checkbox" name="jeti_bulk_recipients[]" value="' . esc_attr($customer['phone']) . '"' . (empty($customer['phone']) ? ' disabled' : '') . '>';
                echo esc_html($customer['name'] . ' (' . $phone_display . ') - Orders: ' . $customer['order_count']);
                echo '</label><br>';
            }
        } else {
            echo '<p>' . esc_html__('No customers found with orders.', 'jetapi-integration-for-woocommerce') . '</p>';
        }

        echo '</div>';
    }

    private static function get_woocommerce_customers() {
        $customers = array();

        // Check if HPOS is active
        $use_hpos = jeti_is_hpos_active();

        if ($use_hpos) {
            $orders = jeti_get_orders(array(
                'limit'  => -1,
                'type'   => 'shop_order',
                'status' => array('completed', 'processing'),
            ));
        } else {
            $args = array(
                'post_type'      => 'shop_order',
                'post_status'    => array('wc-completed', 'wc-processing'),
                'posts_per_page' => -1,
            );
            $orders = get_posts($args);
        }

        foreach ($orders as $order) {
            if (is_a($order, 'WP_Post')) {
                $order = jeti_get_order($order->ID);
            }

            if (!$order) {
                continue;
            }

            $email = $order->get_billing_email();
            if (!empty($email) && !isset($customers[$email])) {
                $customers[$email] = array(
                    'name' => $order->get_billing_first_name() . ' ' . $order->get_billing_last_name(),
                    'phone' => $order->get_billing_phone(),
                    'email' => $email,
                    'order_count' => 1
                );
            } elseif (!empty($email)) {
                $customers[$email]['order_count']++;
            }
        }

        return $customers;
    }

    private static function process_bulk_messaging() {
        if (!check_admin_referer('jeti_bulk_messaging')) {
            return;
        }

        // Validate and sanitize all POST data
        $use_jetapi_channels = isset($_POST['jeti_use_jetapi_channels']);
        $channels = $use_jetapi_channels ? array() : (
            isset($_POST['jeti_bulk_channels']) 
            ? array_map('sanitize_text_field', wp_unslash($_POST['jeti_bulk_channels'])) 
            : array()
        );
        $cascade_order = isset($_POST['jeti_bulk_cascade_order']) 
            ? array_map('sanitize_text_field', wp_unslash($_POST['jeti_bulk_cascade_order'])) 
            : array();
        
        $name = isset($_POST['jeti_bulk_name']) 
            ? sanitize_text_field(wp_unslash($_POST['jeti_bulk_name'])) 
            : '';
        $message = isset($_POST['jeti_bulk_message']) 
            ? sanitize_textarea_field(wp_unslash($_POST['jeti_bulk_message'])) 
            : '';

        if (isset($_POST['jeti_recipient_type']) && $_POST['jeti_recipient_type'] === 'manual') {
            $recipients = isset($_POST['jeti_bulk_recipients']) 
                ? self::get_recipients_from_textarea(sanitize_textarea_field(wp_unslash($_POST['jeti_bulk_recipients'])))
                : array();
        } else {
            $recipients = isset($_POST['jeti_bulk_recipients']) 
                ? array_map('sanitize_text_field', wp_unslash($_POST['jeti_bulk_recipients'])) 
                : array();
        }

        if (empty($recipients)) {
            add_settings_error('jeti_bulk_messaging', 'no_recipients', __('Please enter at least one valid recipient.', 'jetapi-integration-for-woocommerce'), 'error');
            return;
        }

        if (empty($message)) {
            add_settings_error('jeti_bulk_messaging', 'empty_message', __('Please enter a message.', 'jetapi-integration-for-woocommerce'), 'error');
            return;
        }

        if (!$use_jetapi_channels && empty($channels)) {
            add_settings_error('jeti_bulk_messaging', 'no_channels', __('Please select at least one channel or use JetApi channels.', 'jetapi-integration-for-woocommerce'), 'error');
            return;
        }

        $bulk_messaging = new JETI_Bulk_Messaging();
        $result = $bulk_messaging->handle_bulk_message_send($channels, $name, $message, $recipients, $use_jetapi_channels, $cascade_order);

        if ($result['queued'] > 0) {
            $queue_status = $bulk_messaging->get_queue_status();
            // phpcs:ignore WordPress.WP.I18n.MissingTranslatorsComment
            /**
             * Translators: %1$s: Campaign name, %2$d: Number of queued messages, 
             * %3$d: Number of messages currently in queue, %4$s: Estimated completion time
             */
            $success_message = sprintf(
                __('Bulk messaging campaign "%1$s" created successfully. %2$d messages queued for sending. Current queue status: %3$d messages in queue. Estimated completion time: %4$s', 'jetapi-integration-for-woocommerce'),
                $name,
                $result['queued'],
                $queue_status['messages_in_queue'],
                gmdate('Y-m-d H:i:s', $queue_status['next_processing_time'])
            );
            add_settings_error('jeti_bulk_messaging', 'success', $success_message, 'success');
        } else {
            add_settings_error('jeti_bulk_messaging', 'queue_error', __('Failed to queue messages. Please try again.', 'jetapi-integration-for-woocommerce'), 'error');
        }
    }

    /**
     * Get recipients from textarea input
     *
     * @param string $input Textarea input
     * @return array Array of recipients
     */
    private static function get_recipients_from_textarea($input) {
        $recipients = array();
        $lines = explode("\n", $input);
        foreach ($lines as $line) {
            $recipient = trim(sanitize_text_field($line));
            if (!empty($recipient)) {
                $recipients[] = $recipient;
            }
        }
        return $recipients;
    }
}

// Include required files
require_once JETI_PLUGIN_DIR . 'includes/class-jeti-bulk-messaging.php';
require_once JETI_PLUGIN_DIR . 'includes/class-jeti-auth.php';

// Initialize the bulk messaging page
JETI_Bulk_Messaging_Page::init();
