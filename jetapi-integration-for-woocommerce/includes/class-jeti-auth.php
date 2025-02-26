<?php

/**
 * JetAPI Authentication Class
 *
 * @package JetAPI_Integration_For_WooCommerce
 */

defined('ABSPATH') || exit;

/**
 * JETI_Auth Class
 */
class JETI_Auth
{
    /**
     * JetAPI endpoint URL for authentication.
     *
     * @var string
     */
    private $auth_url = 'https://api.jetapi.io/api/v1/account';

    /**
     * JetAPI endpoint URL for account information.
     *
     * @var string
     */
    private $account_url = 'https://api.jetapi.io/api/v1/account';

    /**
     * Constructor
     */
    public function __construct()
    {
        add_action('admin_init', array($this, 'check_token_on_page_load'));
        add_action('admin_init', array($this, 'process_authentication'));
        add_action('admin_init', array($this, 'handle_logout'));
        add_action('admin_notices', array($this, 'display_notices'));
        add_action('admin_post_jeti_authenticate', array($this, 'handle_authentication'));
    }

    /**
     * Handle authentication process
     */
    public function handle_authentication()
    {
        // Add nonce verification
        if (!isset($_POST['jeti_auth_nonce']) || 
            !wp_verify_nonce(
                sanitize_text_field(wp_unslash($_POST['jeti_auth_nonce'])), 
                'jeti_auth'
            )
        ) {
            wp_die(esc_html__('Security check failed.', 'jetapi-integration-for-woocommerce'));
        }

        // Properly sanitize and unslash the bearer token
        $bearer_token = isset($_POST['jeti_bearer_token']) 
            ? sanitize_text_field(wp_unslash($_POST['jeti_bearer_token'])) 
            : '';
        
        if (empty($bearer_token)) {
            add_settings_error('jeti_messages', 'jeti_error', __('Bearer token cannot be empty.', 'jetapi-integration-for-woocommerce'), 'error');
            return;
        }
        
        $validation_result = $this->validate_bearer_token($bearer_token);

        if ($validation_result) {
            $update_token = update_option('jeti_bearer_token', $bearer_token);
            $update_auth = update_option('jeti_authenticated', 'yes');
            
            if ($update_token && $update_auth) {
                add_settings_error('jeti_messages', 'jeti_success', __('Authentication successful. Your JetAPI account is now connected.', 'jetapi-integration-for-woocommerce'), 'success');
                wp_redirect(admin_url('admin.php?page=jeti-settings&auth=success'));
                exit;
            } else {
                add_settings_error('jeti_messages', 'jeti_error', __('Failed to update authentication options.', 'jetapi-integration-for-woocommerce'), 'error');
            }
        } else {
            add_settings_error('jeti_messages', 'jeti_error', __('Authentication failed. Please check your bearer token and try again.', 'jetapi-integration-for-woocommerce'), 'error');
        }
    }

    /**
     * Handle logout process
     */
    public function handle_logout()
    {
        if (isset($_POST['jeti_logout']) && check_admin_referer('jeti_auth'))
        {
            delete_option('jeti_bearer_token');
            delete_option('jeti_authenticated');

            // Clear the bearer token from the settings
            $settings = get_option('jeti_settings', array());
            if (isset($settings['bearer_token'])) {
                $settings['bearer_token'] = '';
                update_option('jeti_settings', $settings);
            }

            wp_redirect(admin_url('admin.php?page=jeti-settings&message=logout_success'));
            exit;
        }
    }

    /**
     * Validate bearer token
     *
     * @param string $bearer_token Bearer token to validate.
     * @return bool
     */
    private function validate_bearer_token($bearer_token)
    {
        if (empty($bearer_token))
        {
            return false;
        }

        $response = wp_remote_get($this->auth_url, array(
            'headers' => array(
                'Authorization' => 'Bearer ' . $bearer_token,
            ),
        ));

        if (is_wp_error($response))
        {
            return false;
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        // Check if the response contains account information
        if (isset($data['account']) && !empty($data['account'])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check if the plugin is authenticated
     *
     * @return bool
     */
    public static function is_authenticated()
    {
        $authenticated = get_option('jeti_authenticated', 'no');
        $bearer_token = get_option('jeti_bearer_token', '');

        if (!empty($bearer_token) && $authenticated === 'yes') {
            // Validate the token with the API
            $auth = new self();
            $validated = $auth->validate_bearer_token($bearer_token);
            if ($validated) {
                return true;
            } else {
                delete_option('jeti_authenticated');
                delete_option('jeti_bearer_token');
                return false;
            }
        }

        return false;
    }

    /**
     * Get account information from JetAPI
     *
     * @return array|false Account information or false if unable to retrieve
     */
    public function get_account_info()
    {
        $bearer_token = get_option('jeti_bearer_token');

        if (empty($bearer_token))
        {
            return false;
        }

        $response = wp_remote_get($this->account_url, array(
            'headers' => array(
                'Authorization' => 'Bearer ' . $bearer_token,
            ),
        ));

        if (is_wp_error($response))
        {
            return false;
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        if (isset($data['account']))
        {
            return $data['account'];
        }

        return false;
    }

    /**
     * Get the authentication form HTML
     *
     * @return string
     */
    public static function get_auth_form()
    {
        ob_start();
        ?>
        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" id="jetapi-auth-form">
            <?php wp_nonce_field('jeti_auth', 'jeti_auth_nonce'); ?>
            <input type="hidden" name="action" value="jeti_authenticate">
            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="jeti_bearer_token"><?php esc_html_e('Bearer Token', 'jetapi-integration-for-woocommerce'); ?></label>
                    </th>
                    <td>
                        <input type="text" name="jeti_bearer_token" id="jeti_bearer_token" class="regular-text" required>
                        <p class="description"><?php esc_html_e('Enter your JetAPI Bearer Token for authentication.', 'jetapi-integration-for-woocommerce'); ?></p>
                    </td>
                </tr>
            </table>
            <p class="submit">
                <input type="submit" class="button button-primary" value="<?php esc_attr_e('Authenticate', 'jetapi-integration-for-woocommerce'); ?>">
            </p>
        </form>
        <?php
        return ob_get_clean();
    }

    /**
     * Get the logout form HTML
     *
     * @return string
     */
    public static function get_logout_form()
    {
        ob_start();
        ?>
        <form method="post" action="">
            <?php wp_nonce_field('jeti_auth'); ?>
            <p>
                <?php esc_html_e('You are currently authenticated with JetAPI.', 'jetapi-integration-for-woocommerce'); ?>
            </p>
            <p class="submit">
                <input type="submit" name="jeti_logout" class="button button-secondary" value="<?php esc_attr_e('Log Out', 'jetapi-integration-for-woocommerce'); ?>">
            </p>
        </form>
        <?php
        return ob_get_clean();
    }

    /**
     * Check token on page load
     */
    public function check_token_on_page_load()
    {
        $authenticated = get_option('jeti_authenticated', 'no');
        $bearer_token = get_option('jeti_bearer_token', '');

        if ($authenticated === 'yes' && !empty($bearer_token)) {
            $validation_result = $this->validate_bearer_token($bearer_token);
            if (!$validation_result) {
                delete_option('jeti_bearer_token');
                update_option('jeti_authenticated', 'no');
                add_action('admin_notices', function() {
                    echo '<div class="notice notice-error is-dismissible"><p>' . esc_html__('Your JetAPI authentication has expired. Please re-authenticate.', 'jetapi-integration-for-woocommerce') . '</p></div>';
                });
            }
        } elseif ($authenticated === 'yes' && empty($bearer_token)) {
            update_option('jeti_authenticated', 'no');
            add_action('admin_notices', function() {
                echo '<div class="notice notice-error is-dismissible"><p>' . esc_html__('JetAPI authentication error. Please re-authenticate.', 'jetapi-integration-for-woocommerce') . '</p></div>';
            });
        }
    }

    /**
     * Display notices
     */
    public function display_notices()
    {
        settings_errors('jeti_messages');
    }

    /**
     * Get user information HTML
     *
     * @return string
     */
    public function get_user_info_html()
    {
        if (!self::is_authenticated()) {
            return '<p>' . esc_html__('You are not authenticated with JetAPI.', 'jetapi-integration-for-woocommerce') . '</p>';
        }

        $account_info = $this->get_account_info();
        if (!$account_info) {
            return '<p>' . esc_html__('Unable to retrieve account information.', 'jetapi-integration-for-woocommerce') . '</p>';
        }

        ob_start();
        ?>
        <div class="jetapi-user-info">
            <h3><?php esc_html_e('JetAPI Account Information', 'jetapi-integration-for-woocommerce'); ?></h3>
            <p><strong><?php esc_html_e('WhatsApp Status:', 'jetapi-integration-for-woocommerce'); ?></strong> <?php echo esc_html($account_info['whatsapp_session'] ? __('Connected', 'jetapi-integration-for-woocommerce') : __('Not Connected', 'jetapi-integration-for-woocommerce')); ?></p>
            <p><strong><?php esc_html_e('Telegram Status:', 'jetapi-integration-for-woocommerce'); ?></strong> <?php echo esc_html($account_info['tdlib_session'] ? __('Connected', 'jetapi-integration-for-woocommerce') : __('Not Connected', 'jetapi-integration-for-woocommerce')); ?></p>
            <p><strong><?php esc_html_e('Balance:', 'jetapi-integration-for-woocommerce'); ?></strong> <?php echo esc_html($account_info['total_amount']); ?></p>
            <p><strong><?php esc_html_e('Subscription Status:', 'jetapi-integration-for-woocommerce'); ?></strong> <?php echo esc_html($account_info['subscription_status']); ?></p>
            <p><strong><?php esc_html_e('Subscription Expiry:', 'jetapi-integration-for-woocommerce'); ?></strong> <?php echo esc_html($account_info['subscription_paid_until']); ?></p>
        </div>
        <?php
        return ob_get_clean();
    }

    public function process_authentication()
    {
        // Add nonce verification for both actions
        if (isset($_POST['action'])) {
            if ($_POST['action'] === 'jeti_authenticate') {
                if (!isset($_POST['jeti_auth_nonce']) || 
                    !wp_verify_nonce(
                        sanitize_text_field(wp_unslash($_POST['jeti_auth_nonce'])), 
                        'jeti_auth'
                    )
                ) {
                    wp_die(esc_html__('Security check failed.', 'jetapi-integration-for-woocommerce'));
                }
                $this->handle_authentication();
            } elseif ($_POST['action'] === 'update_jeti_settings') {
                if (!isset($_POST['jeti_settings_nonce']) || 
                    !wp_verify_nonce(
                        sanitize_text_field(wp_unslash($_POST['jeti_settings_nonce'])), 
                        'jeti_settings_nonce'
                    )
                ) {
                    wp_die(esc_html__('Security check failed.', 'jetapi-integration-for-woocommerce'));
                }
                $this->handle_settings_update();
            }
        }
    }

    private function handle_settings_update()
    {
        // Verify nonce first
        if (!isset($_POST['jeti_settings_nonce']) || 
            !wp_verify_nonce(
                sanitize_text_field(wp_unslash($_POST['jeti_settings_nonce'])), 
                'jeti_settings_nonce'
            )
        ) {
            return;
        }

        // Get settings instance to get the correct field key
        $settings = new JETI_Integration_Settings();
        $field_key = $settings->get_field_key('bearer_token');

        // Properly sanitize and unslash the bearer token
        $bearer_token = isset($_POST[$field_key]) 
            ? sanitize_text_field(wp_unslash($_POST[$field_key])) 
            : '';
        
        if (!empty($bearer_token)) {
            $validation_result = $this->validate_bearer_token($bearer_token);
            
            if ($validation_result) {
                update_option('jeti_bearer_token', $bearer_token);
                update_option('jeti_authenticated', 'yes');

                // Also update the token in settings
                $settings_array = get_option('jeti_settings', array());
                $settings_array['bearer_token'] = $bearer_token;
                update_option('jeti_settings', $settings_array);

                add_settings_error('jeti_messages', 'jeti_success', __('JetAPI settings updated successfully.', 'jetapi-integration-for-woocommerce'), 'success');
            } else {
                add_settings_error('jeti_messages', 'jeti_error', __('Invalid bearer token. Please check and try again.', 'jetapi-integration-for-woocommerce'), 'error');
            }
        }
    }
}
