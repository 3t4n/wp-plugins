<?php
/**
 * JetAPI Messages Admin Page
 *
 * @package JetAPI_Integration_For_WooCommerce
 */

defined( 'ABSPATH' ) || exit;

class JETI_Messages_Page {

    /**
     * Initialize the messages page
     */
    public static function init() {
        // Remove menu creation as it's now handled in class-jeti-integration.php
    }

    /**
     * Display JetAPI Messages admin page.
     */
    public static function render_messages_page() {
        // Add nonce field for messages
        $nonce = wp_create_nonce('jeti_messages_nonce');
        
        // Check if the user is authenticated
        if (!JETI_Auth::is_authenticated()) {
            ?>
            <div class="wrap">
                <div class="jeti-settings-wrapper">
                    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
                    <div class="jeti-admin-notice error">
                        <p><?php esc_html_e('Please authenticate with JetAPI to access this page.', 'jetapi-integration-for-woocommerce'); ?></p>
                    </div>
                    <p>
                        <a href="<?php echo esc_url(admin_url('admin.php?page=jeti-settings')); ?>" class="button"><?php esc_html_e('Go to JetAPI Settings', 'jetapi-integration-for-woocommerce'); ?></a>
                    </p>
                </div>
            </div>
            <?php
            return;
        }

        // Render tabs
        JETI_Dashboard_Page::render_tabs('messages');

        // Get and sanitize nonce
        $nonce_value = isset($_GET['_wpnonce']) ? sanitize_text_field(wp_unslash($_GET['_wpnonce'])) : '';

        // Display success or error messages with proper validation and sanitization
        if (isset($_GET['message']) && wp_verify_nonce($nonce_value, 'jeti_messages_nonce')) {
            $message = sanitize_text_field(wp_unslash($_GET['message']));
            echo '<div class="jeti-admin-notice success"><p>' . esc_html($message) . '</p></div>';
        }
        if (isset($_GET['error']) && wp_verify_nonce($nonce_value, 'jeti_messages_nonce')) {
            $error = sanitize_text_field(wp_unslash($_GET['error']));
            echo '<div class="jeti-admin-notice error"><p>' . esc_html($error) . '</p></div>';
        }
        ?>
        <div class="wrap">
            <div class="jeti-settings-wrapper">
                <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
                
                <h2><?php esc_html_e('Message History', 'jetapi-integration-for-woocommerce'); ?></h2>
                <p>
                    <a href="<?php echo esc_url(admin_url('admin.php?page=jeti-bulk-messaging')); ?>" class="button"><?php esc_html_e('Send Bulk Message', 'jetapi-integration-for-woocommerce'); ?></a>
                </p>
                <?php self::display_message_history(); ?>
            </div>
        </div>
        <?php
    }

    /**
     * Display message history table.
     */
    private static function display_message_history() {
        // Verify nonce for form submissions
        $nonce = wp_create_nonce('jeti_messages_nonce');
        
        $notification_sender = new JETI_Notification_Sender();
        
        // Get and sanitize nonce
        $nonce_value = isset($_GET['_wpnonce']) ? sanitize_text_field(wp_unslash($_GET['_wpnonce'])) : '';
        $valid_nonce = wp_verify_nonce($nonce_value, 'jeti_messages_nonce');
        
        // Pagination with proper validation and sanitization
        $page = ($valid_nonce && isset($_GET['paged'])) ? absint($_GET['paged']) : 1;
        $per_page = ($valid_nonce && isset($_GET['per_page'])) ? absint($_GET['per_page']) : 20;
        $offset = ($page - 1) * $per_page;
        
        // Search with proper validation and sanitization
        $search = '';
        if ($valid_nonce && isset($_GET['search'])) {
            $search = sanitize_text_field(wp_unslash($_GET['search']));
        }

        $messages = $notification_sender->get_message_history($offset, $per_page, $search);
        $total_messages = $notification_sender->get_total_messages($search);

        if (empty($messages)) {
            echo '<p>' . esc_html__('No messages have been sent yet.', 'jetapi-integration-for-woocommerce') . '</p>';
            return;
        }

        // Search form
        ?>
        <div class="jeti-campaign-history">
            <form method="get" action="" class="search-form">
                <input type="hidden" name="page" value="jeti-messages">
                <input type="hidden" name="_wpnonce" value="<?php echo esc_attr($nonce); ?>">
                <p class="search-box">
                    <label class="screen-reader-text" for="message-search-input"><?php esc_html_e( 'Search Messages:', 'jetapi-integration-for-woocommerce' ); ?></label>
                    <input type="search" id="message-search-input" name="search" value="<?php echo esc_attr($search); ?>">
                    <input type="submit" id="search-submit" class="button" value="<?php esc_html_e( 'Search Messages', 'jetapi-integration-for-woocommerce' ); ?>">
                    <?php if (!empty($search)) : ?>
                        <a href="<?php echo esc_url(admin_url('admin.php?page=jeti-messages')); ?>" class="button"><?php esc_html_e( 'Clear Search', 'jetapi-integration-for-woocommerce' ); ?></a>
                    <?php endif; ?>
                </p>
            </form>

            <form method="get" action="" class="items-per-page-form">
                <input type="hidden" name="page" value="jeti-messages">
                <input type="hidden" name="_wpnonce" value="<?php echo esc_attr($nonce); ?>">
                <label for="per_page"><?php esc_html_e( 'Messages per page:', 'jetapi-integration-for-woocommerce' ); ?></label>
                <select name="per_page" id="per_page">
                    <?php
                    $per_page_options = array(10, 20, 50, 100);
                    foreach ($per_page_options as $option) {
                        echo '<option value="' . esc_attr($option) . '"' . selected($per_page, $option, false) . '>' . esc_html($option) . '</option>';
                    }
                    ?>
                </select>
                <input type="submit" class="button" value="<?php esc_html_e( 'Apply', 'jetapi-integration-for-woocommerce' ); ?>">
            </form>

            <?php
            $first_item = $offset + 1;
            $last_item = min($offset + $per_page, $total_messages);
            // phpcs:ignore WordPress.WP.I18n.MissingTranslatorsComment
            /**
             * Translators: %1$d: first message number, %2$d: last message number, %3$d: total number of messages
             */
            echo '<p class="displaying-num">' . sprintf(
                esc_html__('Showing %1$d to %2$d of %3$d messages', 'jetapi-integration-for-woocommerce'),
                esc_html($first_item),
                esc_html($last_item),
                esc_html($total_messages)
            ) . '</p>';

            echo '<table class="widefat jeti-campaign-history">';
            echo '<thead><tr>';
            echo '<th>' . esc_html__('Date', 'jetapi-integration-for-woocommerce') . '</th>';
            echo '<th>' . esc_html__('Recipient', 'jetapi-integration-for-woocommerce') . '</th>';
            echo '<th>' . esc_html__('Message', 'jetapi-integration-for-woocommerce') . '</th>';
            echo '<th>' . esc_html__('Channel', 'jetapi-integration-for-woocommerce') . '</th>';
            echo '<th>' . esc_html__('Status', 'jetapi-integration-for-woocommerce') . '</th>';
            echo '<th>' . esc_html__('Campaign', 'jetapi-integration-for-woocommerce') . '</th>';
            echo '</tr></thead><tbody>';

            foreach ($messages as $message) {
                echo '<tr>';
                echo '<td>' . esc_html($message['date']) . '</td>';
                echo '<td>' . esc_html($message['recipient']) . '</td>';
                echo '<td>' . esc_html(substr($message['message'], 0, 50)) . (strlen($message['message']) > 50 ? '...' : '') . '</td>';
                echo '<td>' . esc_html(str_replace('tdlib', 'Telegram', $message['channel'])) . '</td>';
                echo '<td>' . esc_html($message['status']) . '</td>';
                echo '<td>' . (empty($message['campaign_name']) ? esc_html__('N/A', 'jetapi-integration-for-woocommerce') : esc_html($message['campaign_name'])) . '</td>';
                echo '</tr>';
            }

            echo '</tbody></table>';

            // Pagination
            $total_pages = ceil($total_messages / $per_page);
            if ($total_pages > 1) {
                echo '<div class="tablenav"><div class="tablenav-pages">';
                $pagination_args = array(
                    'base' => esc_url(add_query_arg('paged', '%#%')),
                    'format' => '',
                    'prev_text' => esc_html__('&laquo;', 'jetapi-integration-for-woocommerce'),
                    'next_text' => esc_html__('&raquo;', 'jetapi-integration-for-woocommerce'),
                    'total' => $total_pages,
                    'current' => $page,
                    'add_args' => array(
                        'per_page' => $per_page,
                        'search' => $search,
                        '_wpnonce' => $nonce,
                    ),
                );
                echo wp_kses_post(paginate_links($pagination_args));
                echo '</div></div>';
            }
            ?>
        </div>
        <?php
    }
}

// Include required files
require_once JETI_PLUGIN_DIR . 'includes/class-jeti-auth.php';
require_once JETI_PLUGIN_DIR . 'includes/class-jeti-notification-sender.php';

// Initialize the messages page
JETI_Messages_Page::init();
