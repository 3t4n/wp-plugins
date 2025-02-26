<?php
if (!defined('ABSPATH')) {
    exit;
}

class ALERTIFY_Admin {
    public function __construct() {
        add_action('admin_menu', array($this, 'add_admin_menu'), 99999);
        add_action('admin_init', array($this, 'register_settings'));
        add_action('admin_init', array($this, 'handle_test_email'));
    }

    public function add_admin_menu() {
        // Add main settings page
        add_submenu_page(
            'woocommerce',
            esc_html__('Alertify', 'alertify'),
            sprintf('<span class="dashicons dashicons-bell" style="font-size: 17px; vertical-align: middle;"></span> %s', esc_html__('Alertify', 'alertify')),
            'manage_woocommerce',
            'alertify-settings',
            array($this, 'display_settings_page'),
            99999
        );
    }

    public function register_settings() {
        register_setting('alertify_options', 'alertify_options', array($this, 'sanitize_settings'));

        // General Settings
        add_settings_section(
            'alertify_general_settings',
            '',
            null,
            'alertify_general_options'
        );

        add_settings_field(
            'enable_notifications',
            esc_html__('Enable Notifications', 'alertify'),
            array($this, 'render_enable_field'),
            'alertify_general_options',
            'alertify_general_settings'
        );

        // Frontend Text Settings
        add_settings_section(
            'alertify_frontend_text',
            esc_html__('Frontend Text', 'alertify'),
            null,
            'alertify_general_options'
        );

        add_settings_field(
            'button_text',
            esc_html__('Button Label', 'alertify'),
            array($this, 'render_text_field'),
            'alertify_general_options',
            'alertify_frontend_text',
            array('key' => 'button_text', 'default' => esc_html__('Notify When Available', 'alertify'))
        );

        add_settings_field(
            'popup_title',
            esc_html__('Popup Title', 'alertify'),
            array($this, 'render_text_field'),
            'alertify_general_options',
            'alertify_frontend_text',
            array('key' => 'popup_title', 'default' => esc_html__('Get Back In Stock Notification', 'alertify'))
        );

        add_settings_field(
            'submit_button_text',
            esc_html__('Submit Button Text', 'alertify'),
            array($this, 'render_text_field'),
            'alertify_general_options',
            'alertify_frontend_text',
            array('key' => 'submit_button_text', 'default' => esc_html__('Notify Me', 'alertify'))
        );

        // Email Settings
        add_settings_section(
            'alertify_email_settings',
            '',
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

    public function sanitize_settings($input) {
        $sanitized = array();
        
        $sanitized['enable_notifications'] = isset($input['enable_notifications']) ? 1 : 0;
        $sanitized['emails_per_hour'] = absint($input['emails_per_hour']);
        $sanitized['email_template'] = wp_kses_post($input['email_template']);
        
        // New text fields
        $text_fields = array('button_text', 'popup_title', 'submit_button_text');
        foreach ($text_fields as $field) {
            $sanitized[$field] = isset($input[$field]) ? sanitize_text_field($input[$field]) : '';
        }
        
        return $sanitized;
    }

    public function render_enable_field() {
        $options = get_option('alertify_options', array());
        $enabled = isset($options['enable_notifications']) ? $options['enable_notifications'] : 1;
        ?>
        <label>
            <input type="checkbox" name="alertify_options[enable_notifications]" value="1" <?php checked(1, $enabled); ?>>
            <?php esc_html_e('Enable "Notify Me" button for out-of-stock products', 'alertify'); ?>
        </label>
        <?php
    }

    public function render_emails_per_hour_field() {
        $options = get_option('alertify_options', array());
        $value = isset($options['emails_per_hour']) ? $options['emails_per_hour'] : 50;
        ?>
        <input type="number" name="alertify_options[emails_per_hour]" value="<?php echo esc_attr($value); ?>" min="1" max="100">
        <p class="description">
            <?php esc_html_e('Maximum number of emails to send per hour.', 'alertify'); ?><br>
            <span style="color: #d63638;">
                <?php esc_html_e('Note: Keep this number reasonably low to prevent your emails from being marked as spam.', 'alertify'); ?>
            </span>
        </p>
        <?php
    }

    public function render_email_template_field() {
        $options = get_option('alertify_options', array());
        $default_template = $this->get_default_template();
        $value = isset($options['email_template']) ? $options['email_template'] : $default_template;
        ?>
        <textarea name="alertify_options[email_template]" rows="10" cols="50" class="large-text code"><?php echo esc_textarea($value); ?></textarea>
        <p class="description">
            <?php esc_html_e('Available variables:', 'alertify'); ?><br>
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

    public function render_text_field($args) {
        $options = get_option('alertify_options', array());
        $value = isset($options[$args['key']]) ? $options[$args['key']] : $args['default'];
        ?>
        <input type="text" 
               name="alertify_options[<?php echo esc_attr($args['key']); ?>]" 
               value="<?php echo esc_attr($value); ?>" 
               class="regular-text">
        <?php
    }

    private function get_default_template() {
        return 'Hi {customer_name},

Good news! The product you were interested in is back in stock:

{product_name}
Price: {product_price}
SKU: {product_sku}

{product_image}

You can purchase it now at:
{product_link}

Best regards,
{site_name}

---
To unsubscribe from these notifications, click here: {unsubscribe_link}';
    }

    public function display_settings_page() {
        if (!current_user_can('manage_options')) {
            return;
        }

        // Verify nonce when processing form submission
        if (isset($_POST['test_email'])) {
            if (!isset($_POST['alertify_test_email_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['alertify_test_email_nonce'])), 'alertify_send_test_email')) {
                wp_die(esc_html__('Invalid nonce specified', 'alertify'), esc_html__('Error', 'alertify'), array(
                    'response'  => 403,
                    'back_link' => true,
                ));
            }
            // Process test email form here
        }

        $active_tab = isset($_GET['tab']) ? sanitize_text_field(wp_unslash($_GET['tab'])) : 'general';
        ?>
        <div class="wrap">
            <h1><?php esc_html_e('Alertify Settings', 'alertify'); ?></h1>

            <h2 class="nav-tab-wrapper">
                <a href="?page=alertify-settings&tab=general" class="nav-tab <?php echo $active_tab == 'general' ? 'nav-tab-active' : ''; ?>">
                    <?php esc_html_e('General', 'alertify'); ?>
                </a>
                <a href="?page=alertify-settings&tab=email" class="nav-tab <?php echo $active_tab == 'email' ? 'nav-tab-active' : ''; ?>">
                    <?php esc_html_e('Email Settings', 'alertify'); ?>
                </a>
                <a href="?page=alertify-settings&tab=subscriptions" class="nav-tab <?php echo $active_tab == 'subscriptions' ? 'nav-tab-active' : ''; ?>">
                    <?php esc_html_e('Subscriptions', 'alertify'); ?>
                </a>
            </h2>

            <?php if ($active_tab == 'subscriptions'): ?>
                <?php $this->display_subscriptions_list(); ?>
            <?php else: ?>
                <form method="post" action="options.php">
                    <?php
                    if ($active_tab == 'general') {
                        settings_fields('alertify_options');
                        do_settings_sections('alertify_general_options');
                    } else {
                        settings_fields('alertify_options');
                        do_settings_sections('alertify_email_options');
                    }
                    submit_button();
                    ?>
                </form>

                <?php if ($active_tab == 'email'): ?>
                    <hr>
                    <h2><?php esc_html_e('Send Test Email', 'alertify'); ?></h2>
                    <?php settings_errors('alertify_test_email'); ?>
                    <form method="post" action="">
                        <?php 
                        wp_nonce_field('alertify_send_test_email', 'alertify_test_email_nonce'); 
                        ?>
                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="test_email_address"><?php esc_html_e('Email Address', 'alertify'); ?></label>
                                </th>
                                <td>
                                    <input type="email" 
                                           name="test_email_address" 
                                           id="test_email_address" 
                                           class="regular-text" 
                                           value="<?php echo esc_attr(wp_get_current_user()->user_email); ?>"
                                           required>
                                    <p class="description">
                                        <?php esc_html_e('Enter an email address to send a test notification.', 'alertify'); ?>
                                    </p>
                                </td>
                            </tr>
                        </table>
                        <?php 
                        submit_button(
                            esc_html__('Send Test Email', 'alertify'), 
                            'secondary', 
                            'test_email'
                        ); 
                        ?>
                    </form>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <?php
    }

    private function display_subscriptions_list() {
        global $wpdb;
        
        // Handle bulk actions
        if (isset($_POST['action']) && $_POST['action'] === 'delete' && isset($_POST['subscription'])) {
            check_admin_referer('bulk-subscriptions');
            $ids = array_map('intval', $_POST['subscription']);
            
            if (!empty($ids)) {
                // Create placeholders string and prepare values array
                $placeholders = implode(',', array_fill(0, count($ids), '%d'));
                
                // Build and execute prepared query
                // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery
                $wpdb->query(
                    $wpdb->prepare(
                        sprintf(
                            "DELETE FROM {$wpdb->prefix}alertify_subscriptions WHERE id IN (%s)",
                            implode(',', array_fill(0, count($ids), '%d'))
                        ),
                        $ids
                    )
                );

                // Delete cache after modification
                wp_cache_delete('alertify_all_subscriptions', 'alertify');
            }
        }

        // Try to get from cache first
        $subscriptions = wp_cache_get('alertify_all_subscriptions', 'alertify');

        if (false === $subscriptions) {
            // Cache miss - get from database
            // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery
            $subscriptions = $wpdb->get_results(
                "SELECT s.*, p.post_title as product_name 
                FROM {$wpdb->prefix}alertify_subscriptions s
                LEFT JOIN {$wpdb->posts} p ON s.product_id = p.ID
                ORDER BY s.created_at DESC"
            );

            // Cache the results for 5 minutes
            wp_cache_set('alertify_all_subscriptions', $subscriptions, 'alertify', 5 * MINUTE_IN_SECONDS);
        }

        ?>
        <form method="post">
            <?php wp_nonce_field('bulk-subscriptions'); ?>
            
            <div class="tablenav top">
                <div class="alignleft actions bulkactions">
                    <select name="action">
                        <option value="-1"><?php esc_html_e('Bulk Actions', 'alertify'); ?></option>
                        <option value="delete"><?php esc_html_e('Delete', 'alertify'); ?></option>
                    </select>
                    <input type="submit" class="button action" value="<?php esc_attr_e('Apply', 'alertify'); ?>">
                </div>
            </div>

            <table class="wp-list-table widefat fixed striped">
                <thead>
                    <tr>
                        <td class="manage-column column-cb check-column">
                            <input type="checkbox" />
                        </td>
                        <th><?php esc_html_e('Product', 'alertify'); ?></th>
                        <th><?php esc_html_e('Customer Name', 'alertify'); ?></th>
                        <th><?php esc_html_e('Email', 'alertify'); ?></th>
                        <th><?php esc_html_e('Phone', 'alertify'); ?></th>
                        <th><?php esc_html_e('Status', 'alertify'); ?></th>
                        <th><?php esc_html_e('Date', 'alertify'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($subscriptions): ?>
                        <?php foreach ($subscriptions as $sub): ?>
                            <tr>
                                <th scope="row" class="check-column">
                                    <input type="checkbox" name="subscription[]" value="<?php echo esc_attr($sub->id); ?>" />
                                </th>
                                <td>
                                    <a href="<?php echo esc_url(get_edit_post_link($sub->product_id)); ?>">
                                        <?php echo esc_html($sub->product_name); ?>
                                    </a>
                                </td>
                                <td><?php echo esc_html($sub->name); ?></td>
                                <td><?php echo esc_html($sub->email); ?></td>
                                <td><?php echo esc_html($sub->phone); ?></td>
                                <td>
                                    <span class="status-<?php echo esc_attr($sub->status); ?>">
                                        <?php echo esc_html(ucfirst($sub->status)); ?>
                                    </span>
                                </td>
                                <td><?php echo esc_html(date_i18n(get_option('date_format') . ' ' . get_option('time_format'), strtotime($sub->created_at))); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7"><?php esc_html_e('No subscriptions found.', 'alertify'); ?></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </form>
        <?php
    }

    public function handle_test_email() {
        if (!isset($_POST['test_email']) || !isset($_POST['test_email_address'])) {
            return;
        }

        // Verify nonce
        if (!isset($_POST['alertify_test_email_nonce']) || 
            !wp_verify_nonce(
                sanitize_text_field(wp_unslash($_POST['alertify_test_email_nonce'])), 
                'alertify_send_test_email'
            )
        ) {
            add_settings_error(
                'alertify_test_email',
                'nonce_error',
                esc_html__('Security check failed.', 'alertify'),
                'error'
            );
            return;
        }

        $test_email = sanitize_email(wp_unslash($_POST['test_email_address']));
        if (!is_email($test_email)) {
            add_settings_error('alertify_test_email', 'invalid_email', esc_html__('Please enter a valid email address.', 'alertify'));
        } else {
            if (!class_exists('ALERTIFY_Email')) {
                require_once ALERTIFY_PLUGIN_DIR . 'includes/class-alertify-email.php';
            }

            $email = new ALERTIFY_Email();
            $sent = $email->test_email($test_email);

            if ($sent) {
                add_settings_error('alertify_test_email', 'test_email_sent', esc_html__('Test email sent successfully.', 'alertify'));
            } else {
                add_settings_error('alertify_test_email', 'test_email_failed', esc_html__('Failed to send test email. Please check your email settings.', 'alertify'));
            }
        }
    }
}

new ALERTIFY_Admin(); 