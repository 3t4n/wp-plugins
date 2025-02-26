<?php
if (!defined('ABSPATH')) {
    exit;
}

class ALERTIFY_Frontend {
    public function __construct() {
        // Hook into WooCommerce single product page
        add_action('woocommerce_single_product_summary', array($this, 'add_notification_button'), 31);
        add_action('wp_footer', array($this, 'add_notification_modal'));
        
        // AJAX handlers
        add_action('wp_ajax_alertify_subscribe', array($this, 'handle_subscription'));
        add_action('wp_ajax_nopriv_alertify_subscribe', array($this, 'handle_subscription'));
        
        // Add dashicons to frontend
        add_action('wp_enqueue_scripts', array($this, 'enqueue_dashicons'));
        
        // Add My Account endpoint
        add_action('init', array($this, 'add_endpoints'));
        add_filter('woocommerce_account_menu_items', array($this, 'add_account_menu_item'));
        add_action('woocommerce_account_waitlist_endpoint', array($this, 'endpoint_content'));
        
        // Handle unsubscribe action
        add_action('template_redirect', array($this, 'handle_unsubscribe'));
    }

    public function add_notification_button() {
        global $product;
        
        $options = get_option('alertify_options', array());
        $enabled = isset($options['enable_notifications']) ? $options['enable_notifications'] : 1;
        
        if (!$enabled) {
            return;
        }
        
        if (!$product->is_in_stock()) {
            $button_text = isset($options['button_text']) ? $options['button_text'] : __('Notify When Available', 'alertify');
            ?>
            <div class="alertify-notify-button-wrapper">
                <button type="button" class="button alertify-notify-button" data-product-id="<?php echo esc_attr($product->get_id()); ?>">
                    <span class="dashicons dashicons-bell"></span>
                    <?php echo esc_html($button_text); ?>
                </button>
            </div>
            <?php
        }
    }

    public function add_notification_modal() {
        $options = get_option('alertify_options', array());
        $popup_title = isset($options['popup_title']) ? $options['popup_title'] : __('Get Back In Stock Notification', 'alertify');
        $submit_text = isset($options['submit_button_text']) ? $options['submit_button_text'] : __('Notify Me', 'alertify');
        
        // Get current user info if logged in
        $current_user = wp_get_current_user();
        $user_email = $current_user->exists() ? $current_user->user_email : '';
        $user_name = $current_user->exists() ? $current_user->display_name : '';
        ?>
        <div id="alertify-modal" style="display: none;">
            <div class="alertify-modal-content">
                <span class="alertify-close">&times;</span>
                <h2><?php echo esc_html($popup_title); ?></h2>
                <form id="alertify-notification-form">
                    <input type="hidden" name="product_id" id="alertify-product-id" value="">
                    <input type="hidden" name="action" value="alertify_subscribe">
                    <?php wp_nonce_field('alertify_notification', 'alertify_nonce'); ?>
                    
                    <div class="alertify-form-group">
                        <label for="alertify-name"><?php esc_html_e('Name', 'alertify'); ?></label>
                        <input type="text" 
                               name="name" 
                               id="alertify-name" 
                               value="<?php echo esc_attr($user_name); ?>"
                               required>
                    </div>
                    
                    <div class="alertify-form-group">
                        <label for="alertify-email"><?php esc_html_e('Email', 'alertify'); ?></label>
                        <input type="email" 
                               name="email" 
                               id="alertify-email" 
                               value="<?php echo esc_attr($user_email); ?>"
                               required>
                    </div>
                    
                    <div class="alertify-form-group">
                        <label for="alertify-phone"><?php esc_html_e('Phone (optional)', 'alertify'); ?></label>
                        <input type="tel" 
                               name="phone" 
                               id="alertify-phone" 
                               pattern="[0-9+\-\s()]+"
                               title="<?php esc_attr_e('Please enter a valid phone number', 'alertify'); ?>"
                               placeholder="<?php esc_attr_e('e.g., +1 (555) 123-4567', 'alertify'); ?>">
                    </div>
                    
                    <button type="submit" class="button">
                        <?php echo esc_html($submit_text); ?>
                    </button>
                </form>
            </div>
        </div>
        <?php
    }

    public function handle_subscription() {
        check_ajax_referer('alertify_notification', 'alertify_nonce');

        $product_id = isset($_POST['product_id']) ? absint($_POST['product_id']) : 0;
        $email = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';
        $name = isset($_POST['name']) ? sanitize_text_field(wp_unslash($_POST['name'])) : '';
        $phone = isset($_POST['phone']) ? sanitize_text_field(wp_unslash($_POST['phone'])) : '';

        if (!$product_id || !$email) {
            wp_send_json_error(esc_html__('Invalid data provided.', 'alertify'));
        }

        global $wpdb;
        $table_name = $wpdb->prefix . 'alertify_subscriptions';

        // Try to get from cache first
        $cache_key = 'alertify_subscription_' . $product_id . '_' . md5($email);
        $existing = wp_cache_get($cache_key, 'alertify');

        if (false === $existing) {
            // Cache miss - get from database
             // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery
            $existing = $wpdb->get_var(
                $wpdb->prepare(
                    "SELECT id FROM {$wpdb->prefix}alertify_subscriptions 
                    WHERE product_id = %d 
                    AND email = %s 
                    AND status = 'pending'",
                    $product_id,
                    $email
                )
            );

            // Cache the result for 5 minutes
            wp_cache_set($cache_key, $existing, 'alertify', 5 * MINUTE_IN_SECONDS);
        }

        if ($existing) {
            wp_send_json_error(esc_html__('You are already subscribed to this product.', 'alertify'));
            return;
        }

        // Insert new subscription
        // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery
        $result = $wpdb->insert(
            $table_name,
            array(
                'product_id' => $product_id,
                'email' => $email,
                'name' => $name,
                'phone' => $phone,
                'status' => 'pending',
                'created_at' => current_time('mysql')
            ),
            array(
                '%d',  // product_id
                '%s',  // email
                '%s',  // name
                '%s',  // phone
                '%s',  // status
                '%s'   // created_at
            )
        );

        if ($result === false) {
            wp_send_json_error(array(
                'message' => esc_html__('Unable to process your request. Please try again.', 'alertify'),
                'code' => 'db_error'
            ));
            return;
        }

        wp_send_json_success(esc_html__('You will be notified when this product becomes available.', 'alertify'));
    }

    public function enqueue_dashicons() {
        wp_enqueue_style('dashicons');
    }

    public function add_endpoints() {
        add_rewrite_endpoint('waitlist', EP_ROOT | EP_PAGES);
    }

    public function add_account_menu_item($items) {
        // Add new item after orders
        $new_items = array();
        foreach ($items as $key => $item) {
            $new_items[$key] = $item;
            if ($key === 'orders') {
                $new_items['waitlist'] = esc_html__('Waitlist', 'alertify');
            }
        }
        return $new_items;
    }

    public function endpoint_content() {
        global $wpdb;
        
        // Handle unsubscribe action
        if (isset($_POST['unsubscribe']) && isset($_POST['subscription_id'])) {
            check_admin_referer('alertify_unsubscribe');
            
            $subscription_id = absint($_POST['subscription_id']);
            $current_user_email = wp_get_current_user()->user_email;

            // Try to get subscription from cache first
            $cache_key = 'alertify_subscription_' . $subscription_id . '_' . md5($current_user_email);
            $subscription = wp_cache_get($cache_key, 'alertify');
            
            if (false === $subscription) {
                // Cache miss - get from database
                // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery
                $subscription = $wpdb->get_row($wpdb->prepare(
                    "SELECT * FROM {$wpdb->prefix}alertify_subscriptions WHERE id = %d AND email = %s",
                    $subscription_id,
                    $current_user_email
                ));
                
                // Cache the subscription for 5 minutes
                if ($subscription) {
                    wp_cache_set($cache_key, $subscription, 'alertify', 5 * MINUTE_IN_SECONDS);
                }
            }

            if ($subscription) {
                // Delete from database
                // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery
                $wpdb->delete(
                    $wpdb->prefix . 'alertify_subscriptions',
                    array(
                        'id' => $subscription_id,
                        'email' => $current_user_email
                    ),
                    array('%d', '%s')
                );

                // Delete all related caches
                wp_cache_delete('alertify_subscription_' . $subscription_id, 'alertify');
                wp_cache_delete('alertify_all_subscriptions', 'alertify');
                wp_cache_delete('alertify_pending_notifications', 'alertify');
                
                wc_add_notice(__('Successfully unsubscribed from notification.', 'alertify'), 'success');
            }
        }
        
        // Get current user's subscriptions
        $current_user_email = wp_get_current_user()->user_email;
        // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery
        $subscriptions = $wpdb->get_results($wpdb->prepare("
            SELECT s.*, p.post_title as product_name 
            FROM {$wpdb->prefix}alertify_subscriptions s
            JOIN {$wpdb->posts} p ON s.product_id = p.ID
            WHERE s.email = %s
            ORDER BY s.created_at DESC
        ", $current_user_email));
        
        ?>
        <h2><?php esc_html_e('Back in Stock Notifications', 'alertify'); ?></h2>
        
        <?php if ($subscriptions): ?>
            <table class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive">
                <thead>
                    <tr>
                        <th><?php esc_html_e('Product', 'alertify'); ?></th>
                        <th><?php esc_html_e('Date', 'alertify'); ?></th>
                        <th><?php esc_html_e('Status', 'alertify'); ?></th>
                        <th><?php esc_html_e('Actions', 'alertify'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($subscriptions as $subscription): ?>
                        <tr>
                            <td>
                                <a href="<?php echo esc_url(get_permalink($subscription->product_id)); ?>">
                                    <?php echo esc_html($subscription->product_name); ?>
                                </a>
                            </td>
                            <td>
                                <?php echo esc_html(date_i18n(get_option('date_format'), strtotime($subscription->created_at))); ?>
                            </td>
                            <td>
                                <?php
                                $status_labels = array(
                                    'pending' => esc_html__('Waiting for stock', 'alertify'),
                                    'notified' => esc_html__('Notified', 'alertify')
                                );
                                echo esc_html($status_labels[$subscription->status] ?? $subscription->status);
                                ?>
                            </td>
                            <td>
                                <form method="post" style="display: inline;">
                                    <?php wp_nonce_field('alertify_unsubscribe'); ?>
                                    <input type="hidden" name="subscription_id" value="<?php echo esc_attr($subscription->id); ?>">
                                    <button type="submit" 
                                            name="unsubscribe" 
                                            class="button" 
                                            onclick="return confirm('<?php esc_attr_e('Are you sure you want to unsubscribe?', 'alertify'); ?>')">
                                        <?php esc_html_e('Unsubscribe', 'alertify'); ?>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p><?php esc_html_e('You have no active back in stock notifications.', 'alertify'); ?></p>
        <?php endif;
    }

    public function handle_unsubscribe() {
        if (isset($_GET['alertify_unsubscribe']) && isset($_GET['token'])) {
            // Sanitize and decode the email
            $email = base64_decode(
                sanitize_text_field(
                    wp_unslash($_GET['alertify_unsubscribe'])
                )
            );
            
            // Verify the email is valid
            if (!is_email($email)) {
                wp_die(esc_html__('Invalid unsubscribe link.', 'alertify'));
                return;
            }

            // Sanitize the token
            $token = sanitize_text_field(wp_unslash($_GET['token']));
            
            // Verify the token is valid
            if (!$token || !is_string($token)) {
                wp_die(esc_html__('Invalid unsubscribe link.', 'alertify'));
                return;
            }
            
            if (wp_verify_nonce($token, 'alertify_unsubscribe_' . $email)) {
                global $wpdb;
                
                // Update database
                 // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery
                $wpdb->update(
                    $wpdb->prefix . 'alertify_subscriptions',
                    array('status' => 'unsubscribed'),
                    array('email' => $email),
                    array('%s'),
                    array('%s')
                );

                // Delete relevant caches
                wp_cache_delete('alertify_all_subscriptions', 'alertify');
                wp_cache_delete('alertify_pending_notifications', 'alertify');
                
                wp_die(
                    esc_html__('You have been successfully unsubscribed from all notifications.', 'alertify'), 
                    esc_html__('Unsubscribed', 'alertify')
                );
            }
        }
    }
}

new ALERTIFY_Frontend(); 