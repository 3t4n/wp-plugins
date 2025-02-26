<?php
if (!defined('ABSPATH')) {
    exit;
}

class ALERTIFY_Email {
    private $settings;

    public function __construct() {
        $this->settings = get_option('alertify_options', array());
        
        // Schedule cron job
        add_action('init', array($this, 'schedule_cron'));
        add_action('alertify_send_notifications', array($this, 'process_notifications'));
        
        // Add settings
        add_action('admin_init', array($this, 'register_settings'));
    }

    public function register_settings() {
        register_setting(
            'alertify_email_options', 
            'alertify_options',
            array(
                'type' => 'array',
                'sanitize_callback' => array($this, 'sanitize_email_settings'),
                'default' => array(
                    'emails_per_hour' => 50,
                    'email_template' => $this->get_default_template()
                )
            )
        );

        add_settings_section(
            'alertify_email_settings',
            esc_html__('Email Settings', 'alertify'),
            null,
            'alertify_email_options'
        );

        add_settings_field(
            'emails_per_hour',
            esc_html__('Emails Per Hour', 'alertify'),
            array($this, 'render_emails_per_hour_field'),
            'alertify_email_options',
            'alertify_email_settings'
        );

        add_settings_field(
            'email_template',
            esc_html__('Email Template', 'alertify'),
            array($this, 'render_email_template_field'),
            'alertify_email_options',
            'alertify_email_settings'
        );
    }

    public function render_emails_per_hour_field() {
        $value = isset($this->settings['emails_per_hour']) ? $this->settings['emails_per_hour'] : 50;
        ?>
        <input type="number" name="alertify_options[emails_per_hour]" value="<?php echo esc_attr($value); ?>" min="1" max="100">
        <p class="description"><?php esc_html_e('Maximum number of emails to send per hour', 'alertify'); ?></p>
        <?php
    }

    public function render_email_template_field() {
        $default_template = $this->get_default_template();
        $value = isset($this->settings['email_template']) ? $this->settings['email_template'] : $default_template;
        ?>
        <textarea name="alertify_options[email_template]" rows="10" cols="50" class="large-text code"><?php echo esc_textarea($value); ?></textarea>
        <p class="description">
            <strong><?php esc_html_e('Available variables:', 'alertify'); ?></strong><br>
            {customer_name} - <?php esc_html_e('Customer\'s name', 'alertify'); ?><br>
            {product_name} - <?php esc_html_e('Product name', 'alertify'); ?><br>
            {product_link} - <?php esc_html_e('Link to product', 'alertify'); ?><br>
            {site_name} - <?php esc_html_e('Site name', 'alertify'); ?><br>
            {product_price} - <?php esc_html_e('Product price', 'alertify'); ?><br>
            {product_sku} - <?php esc_html_e('Product SKU', 'alertify'); ?><br>
            {product_image} - <?php esc_html_e('Product image', 'alertify'); ?><br>
            {unsubscribe_link} - <?php esc_html_e('Unsubscribe link', 'alertify'); ?>
        </p>
        <?php
    }

    private function get_default_template() {
        return 'Hi {customer_name},

Good news! The product you were interested in is back in stock:

{product_name}

You can purchase it now at:
{product_link}

Best regards,
{site_name}';
    }

    public function schedule_cron() {
        if (!wp_next_scheduled('alertify_send_notifications')) {
            wp_schedule_event(time(), 'hourly', 'alertify_send_notifications');
        }
    }

    public function process_notifications() {
        global $wpdb;

        // Get settings
        $emails_per_hour = isset($this->settings['emails_per_hour']) ? intval($this->settings['emails_per_hour']) : 50;
        $email_template = isset($this->settings['email_template']) ? $this->settings['email_template'] : $this->get_default_template();

        // Try to get notifications from cache first
        $notifications = wp_cache_get('alertify_pending_notifications', 'alertify');

        if (false === $notifications) {
            // Cache miss - get from database
            // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery
            $notifications = $wpdb->get_results(
                $wpdb->prepare(
                    "SELECT s.*, p.post_title as product_name 
                    FROM {$wpdb->prefix}alertify_subscriptions s
                    JOIN {$wpdb->posts} p ON s.product_id = p.ID
                    WHERE s.status = 'pending'
                    AND EXISTS (
                        SELECT 1 FROM {$wpdb->postmeta} 
                        WHERE post_id = s.product_id 
                        AND meta_key = '_stock_status' 
                        AND meta_value = 'instock'
                    )
                    LIMIT %d",
                    $emails_per_hour
                )
            );

            // Cache the results for 5 minutes
            wp_cache_set('alertify_pending_notifications', $notifications, 'alertify', 5 * MINUTE_IN_SECONDS);
        }

        foreach ($notifications as $notification) {
            $product = wc_get_product($notification->product_id);
            if (!$product) continue;

            // Get product image
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->get_id()), 'medium');
            $image_html = $image ? '<img src="' . esc_url($image[0]) . '" style="max-width: 300px;">' : '';

            // Generate unsubscribe link
            $unsubscribe_link = add_query_arg(array(
                'alertify_unsubscribe' => base64_encode($notification->email),
                'token' => wp_create_nonce('alertify_unsubscribe_' . $notification->email)
            ), home_url());

            $replacements = array(
                '{customer_name}' => $notification->name,
                '{product_name}' => $product->get_name(),
                '{product_link}' => $product->get_permalink(),
                '{site_name}' => get_bloginfo('name'),
                '{product_price}' => wc_price($product->get_price()),
                '{product_sku}' => $product->get_sku(),
                '{product_image}' => $image_html,
                '{unsubscribe_link}' => $unsubscribe_link
            );

            $email_content = str_replace(
                array_keys($replacements),
                array_values($replacements),
                $email_template
            );

            $headers = array('Content-Type: text/html; charset=UTF-8');
            $subject = sprintf(
                /* translators: 1: Site name, 2: Product name - Email subject when product is back in stock */
                esc_html__('[%1$s] %2$s is back in stock', 'alertify'),
                get_bloginfo('name'),
                $product->get_name()
            );

            $sent = wp_mail(
                $notification->email,
                $subject,
                $email_content,
                $headers
            );
           
            if ($sent) {
                // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery
                $wpdb->update(
                    $wpdb->prefix . 'alertify_subscriptions',
                    array(
                        'status' => 'notified',
                        'notified_at' => current_time('mysql')
                    ),
                    array('id' => $notification->id),
                    array('%s', '%s'),
                    array('%d')
                );
            }
        }
    }

    public function test_email($email) {
        $template = isset($this->settings['email_template']) ? $this->settings['email_template'] : $this->get_default_template();
        
        // Get a sample product for test
        $products = wc_get_products(array('limit' => 1));
        $product = !empty($products) ? $products[0] : null;
        
        if ($product) {
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->get_id()), 'medium');
            $image_html = $image ? '<img src="' . esc_url($image[0]) . '" style="max-width: 300px;">' : '';
        }
        
        // Generate test unsubscribe link
        $unsubscribe_link = add_query_arg(array(
            'alertify_unsubscribe' => base64_encode($email),
            'token' => wp_create_nonce('alertify_unsubscribe_' . $email)
        ), home_url());

        $replacements = array(
            '{customer_name}' => 'Test User',
            '{product_name}' => $product ? $product->get_name() : 'Test Product',
            '{product_link}' => $product ? $product->get_permalink() : site_url(),
            '{site_name}' => get_bloginfo('name'),
            '{product_price}' => $product ? wc_price($product->get_price()) : wc_price(99.99),
            '{product_sku}' => $product ? $product->get_sku() : 'TEST-SKU-123',
            '{product_image}' => isset($image_html) ? $image_html : '',
            '{unsubscribe_link}' => $unsubscribe_link
        );

        $email_content = str_replace(
            array_keys($replacements),
            array_values($replacements),
            $template
        );

        $headers = array('Content-Type: text/html; charset=UTF-8');
        $subject = sprintf(
            /* translators: %s: Site name - Test email subject */
            esc_html__('[%s] Test Back in Stock Notification', 'alertify'),
            get_bloginfo('name')
        );

        return wp_mail($email, $subject, $email_content, $headers);
    }

    public function sanitize_email_settings($input) {
        if (!is_array($input)) {
            return array();
        }

        $sanitized = array();

        // Sanitize emails per hour
        $sanitized['emails_per_hour'] = isset($input['emails_per_hour']) 
            ? absint($input['emails_per_hour']) 
            : 50;

        // Ensure emails_per_hour is between 1 and 100
        $sanitized['emails_per_hour'] = min(100, max(1, $sanitized['emails_per_hour']));

        // Sanitize email template
        $sanitized['email_template'] = isset($input['email_template']) 
            ? wp_kses_post($input['email_template']) 
            : $this->get_default_template();

        return $sanitized;
    }
}

new ALERTIFY_Email(); 