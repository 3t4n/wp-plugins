<?php
if (!defined('ABSPATH')) {
    exit;
}

class AltVision_Subscription_Handler {
    private $api_url = 'https://api-altvision.cstate.se';
    private $last_verify_transient = 'altvision_last_verify';
    private $verify_interval = 86400; // 24 hours in seconds

    public function __construct() {
        // Admin menu & settings
        add_action('admin_menu', array($this, 'add_settings_page'));
        add_action('admin_init', array($this, 'register_settings'));
        if (isset($_GET['page']) && 
            $_GET['page'] === 'altvision-subscription' && 
            isset($_GET['session_id'])) {
            add_action('admin_init', array($this, 'handle_checkout_return'), 5);
        }
        add_action('admin_init', array($this, 'maybe_verify_license'));
        
        // AJAX handlers
        add_action('wp_ajax_altvision_create_checkout', array($this, 'ajax_create_checkout'));
        add_action('wp_ajax_altvision_verify_license', array($this, 'ajax_verify_license'));
        add_action('wp_ajax_altvision_save_license', array($this, 'ajax_save_license'));

        // Admin notices
        add_action('admin_notices', array($this, 'show_activation_notice'));

        // License verification schedule
        add_filter('cron_schedules', array($this, 'add_daily_cron_schedule'));
        if (!wp_next_scheduled('altvision_daily_license_check')) {
            wp_schedule_event(time(), 'daily', 'altvision_daily_license_check');
        }
        add_action('altvision_daily_license_check', array($this, 'verify_license_cron'));

        // API request verification
        add_action('rest_api_init', array($this, 'maybe_verify_license'));
    }

    public function add_daily_cron_schedule($schedules) {
        $schedules['daily'] = array(
            'interval' => 86400,
            'display'  => __('Once Daily', 'altvision')
        );
        return $schedules;
    }

    public function verify_license_cron() {
        $this->verify_license_status();
    }

    public function maybe_verify_license() {
        $last_verify = get_transient($this->last_verify_transient);
        
        if ($last_verify === false || (time() - $last_verify) > $this->verify_interval) {
            $this->verify_license_status();
        }
    }

    private function verify_license_status() {
        $license_key = get_option('altvision_license_key', '');
        $license_status = get_option('altvision_license_status', false);

        if (empty($license_key)) {
            update_option('altvision_license_status', false);
            return false;
        }

        $timestamp = time();
        $current_domain = parse_url(get_site_url(), PHP_URL_HOST);
        
        $response = wp_remote_post($this->api_url . '/verify-license', [
            'body' => json_encode([
                'api_key' => $license_key,
                'domain' => $current_domain,
                'timestamp' => $timestamp,
                'signature' => $this->generate_verification_signature($license_key, $timestamp)
            ]),
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ],
            'timeout' => 30
        ]);

        if (!is_wp_error($response)) {
            $body = json_decode(wp_remote_retrieve_body($response));
            
            // Always update the license status based on the response
            update_option('altvision_license_status', !empty($body->valid));
            
            if (empty($body->valid)) {
                // Handle specific error cases
                if (!empty($body->error)) {
                    switch ($body->error) {
                        case 'expired':
                            update_option('altvision_license_error', 'Your license has expired.');
                            break;
                        case 'domain_mismatch':
                            update_option('altvision_license_error', sprintf(
                                'This license key is already registered to %s. Each license key can only be used on one domain.',
                                !empty($body->registered_domain) ? $body->registered_domain : 'another domain'
                            ));
                            break;
                        default:
                            update_option('altvision_license_error', 'License key is invalid.');
                    }
                } else {
                    update_option('altvision_license_error', 'License verification failed.');
                }
                
                error_log('AltVision license verification failed: ' . print_r($body, true));
                return false;
            }

            // Clear any previous error messages on success
            delete_option('altvision_license_error');
            set_transient($this->last_verify_transient, time(), $this->verify_interval + 3600);
            return true;
        }

        error_log('AltVision license verification error: ' . $response->get_error_message());
        update_option('altvision_license_status', false);
        update_option('altvision_license_error', 'Failed to verify license: Connection error');
        return false;
    }

    private function generate_verification_signature($license_key, $timestamp) {
        return hash_hmac(
            'sha256',
            $license_key . parse_url(get_site_url(), PHP_URL_HOST) . $timestamp,
            wp_salt('auth')
        );
    }

    public function check_license_before_action() {
        if (!$this->verify_license_status()) {
            return new WP_Error(
                'license_invalid',
                __('Your license is invalid or has expired.', 'altvision')
            );
        }
        return true;
    }


    public function add_settings_page() {
        add_options_page(
            'AltVision Pro',
            'AltVision Pro',
            'manage_options',
            'altvision-subscription',
            array($this, 'render_settings_page')
        );
    }

    public function register_settings() {
        register_setting('altvision_license_settings', 'altvision_license_key');
        register_setting('altvision_license_settings', 'altvision_license_status');
    }

    // Add this new method
    public function handle_checkout_return() {
    
        // First verify user is logged in
        if (!is_user_logged_in()) {
            auth_redirect();
            exit;
        }
    
        $session_id = preg_replace('/[?&].*$/', '', $_GET['session_id']);
    
        // Verify the license status with the API
        $response = wp_remote_post($this->api_url . '/verify-session', [
            'body' => json_encode([
                'session_id' => $session_id,
                'domain' => parse_url(get_site_url(), PHP_URL_HOST)
            ]),
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ],
            'timeout' => 30
        ]);


    
            if (!is_wp_error($response)) {
                $status_code = wp_remote_retrieve_response_code($response);
                
                $body = json_decode(wp_remote_retrieve_body($response));
                
                if ($status_code === 200 && !empty($body->api_key)) {
                    update_option('altvision_license_key', $body->api_key);
                    update_option('altvision_license_status', true);
                    
                    wp_safe_redirect(
                        add_query_arg(
                            array(
                                'page' => 'altvision-subscription',
                                'activated' => '1'
                            ),
                            admin_url('admin.php')
                        )
                    );
                    exit;
                } else {
                    // Add an admin notice for the error
                    add_action('admin_notices', function() {
                        ?>
                        <div class="notice notice-error is-dismissible">
                            <p><?php _e('Error activating license. Please contact support.', 'altvision'); ?></p>
                        </div>
                        <?php
                    });
                }
            } else {
                error_log('WP Error: ' . $response->get_error_message());
            }
    }


    public function render_settings_page() {

        $license_key = get_option('altvision_license_key', '');
        $license_status = get_option('altvision_license_status', false);
        ?>
        <div class="wrap">
            <h1><?php _e('AltVision Pro Subscription', 'altvision'); ?></h1>

            <?php if ($license_status): ?>
                <div class="notice notice-success">
                    <p>✨ <?php _e('Your Pro subscription is active!', 'altvision-ai-alt-text-generator'); ?></p>
                    <p><?php _e('License Key:', 'altvision-ai-alt-text-generator'); ?> <code><?php echo esc_html($license_key); ?></code></p>
                </div>

                <div class="card">
                    <h3><?php _e('Manage Your License', 'altvision-ai-alt-text-generator'); ?></h3>
                    <p><?php _e('Thank you for being a Pro user! Your subscription is active and you have access to all premium features.', 'altvision-ai-alt-text-generator'); ?></p>
                    <button id="altvision-verify-license" class="button button-secondary">
                        <?php _e('Verify License', 'altvision-ai-alt-text-generator'); ?>
                    </button>
                    <div id="altvision-license-message" class="notice" style="display: none; margin-top: 15px;">
                        <p></p>
                    </div>
                </div>

                <script>
                   (function() {
                        const verifyButton = document.getElementById('altvision-verify-license');
                        const messageDiv = document.getElementById('altvision-license-message');
                        const messageParagraph = messageDiv.querySelector('p');

                        if (verifyButton) {
                            verifyButton.addEventListener('click', function() {
                                this.disabled = true;
                                this.textContent = '<?php echo esc_js(__('Verifying...', 'altvision-ai-alt-text-generator')); ?>';
                                messageDiv.style.display = 'none';
                                
                                fetch(ajaxurl, {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/x-www-form-urlencoded'
                                    },
                                    body: new URLSearchParams({
                                        action: 'altvision_verify_license',
                                        nonce: '<?php echo wp_create_nonce('altvision_verify_license'); ?>',
                                        license_key: '<?php echo esc_js($license_key); ?>'
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    messageDiv.classList.remove('notice-success', 'notice-error');
                                    
                                    if (data.success) {
                                        messageDiv.classList.add('notice-success');
                                        messageParagraph.textContent = '<?php echo esc_js(__('License verified successfully!', 'altvision-ai-alt-text-generator')); ?>';
                                        setTimeout(() => {
                                            location.reload();
                                        }, 1500);
                                    } else {
                                        throw new Error(data.data?.message || '<?php echo esc_js(__('License verification failed', 'altvision-ai-alt-text-generator')); ?>');
                                    }
                                    messageDiv.style.display = 'block';
                                })
                                .catch(error => {
                                    messageDiv.classList.add('notice-error');
                                    messageParagraph.textContent = error.message;
                                    messageDiv.style.display = 'block';
                                    this.disabled = false;
                                    this.textContent = '<?php echo esc_js(__('Verify License', 'altvision-ai-alt-text-generator')); ?>';
                                });
                            });
                        }
                    })();
          
                </script>


            <?php else: ?>
                <div class="card" style="max-width: 600px;">
                    <h2><?php _e('Upgrade to Pro', 'altvision'); ?></h2>
                    
                    <?php if (!empty($license_key)): ?>
                        <div class="notice notice-error" style="margin: 10px 0;">
                            <p>⚠️ <?php _e('Your license key is invalid or has expired.', 'altvision'); ?></p>
                        </div>
                    <?php endif; ?>

                    <p><?php _e('Get unlimited AI-powered alt text generation for your images.', 'altvision'); ?></p>
                    
                    <ul class="altvision-features" style="margin-left: 20px;">
                        <li>✨ <?php _e('Unlimited image processing', 'altvision'); ?></li>
                        <li>🚀 <?php _e('Priority support', 'altvision'); ?></li>
                        <li>🎯 <?php _e('Advanced contextual analysis', 'altvision'); ?></li>
                        <li>⚡ <?php _e('Batch processing', 'altvision'); ?></li>
                    </ul>

                    <div class="altvision-license-input" style="margin: 20px 0;">
                        <h3><?php _e('Already have a license?', 'altvision'); ?></h3>
                        <p>
                            <input type="text" 
                                   id="altvision-license-key" 
                                   value="<?php echo esc_attr($license_key); ?>" 
                                   class="regular-text"
                                   placeholder="<?php esc_attr_e('Enter your license key', 'altvision'); ?>">
                            <button id="altvision-activate-license" class="button button-secondary">
                                <?php _e('Activate License', 'altvision'); ?>
                            </button>
                        </p>
                    </div>

                    <p style="margin-top: 20px;">
                        <button id="altvision-checkout-button" class="button button-primary">
                            <?php _e('Subscribe Now - $4.99/month', 'altvision'); ?> 
                        </button>
                    </p>
                </div>

                <script>
                (function() {
                    // Checkout button handler
                    const checkoutButton = document.getElementById('altvision-checkout-button');
                    if (checkoutButton) {
                        checkoutButton.addEventListener('click', function() {
                            this.disabled = true;
                            this.textContent = '<?php echo esc_js(__('Please wait...', 'altvision')); ?>';
                            
                            fetch(ajaxurl, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded'
                                },
                                body: new URLSearchParams({
                                    action: 'altvision_create_checkout',
                                    nonce: '<?php echo wp_create_nonce('altvision_checkout'); ?>'
                                })
                            })
                            .then(response => response.json())
                            .then(response => {
                                if (response.success && response.data.checkout_url) {
                                    window.location.href = response.data.checkout_url;
                                } else {
                                    throw new Error(response.data?.message || 'Failed to create checkout session');
                                }
                            })
                            .catch(error => {
                                alert('Error: ' + error.message);
                                this.disabled = false;
                                this.textContent = '<?php echo esc_js(__('Subscribe Now - $4.99/month', 'altvision')); ?>';
                            });
                        });
                    }

                    // License activation handler
                    const activateButton = document.getElementById('altvision-activate-license');
                    const licenseInput = document.getElementById('altvision-license-key');
                    
                    if (activateButton && licenseInput) {
                        activateButton.addEventListener('click', function() {
                            const licenseKey = licenseInput.value;
                            if (!licenseKey) {
                                alert('<?php echo esc_js(__('Please enter your license key', 'altvision')); ?>');
                                return;
                            }

                            this.disabled = true;
                            this.textContent = '<?php echo esc_js(__('Verifying...', 'altvision')); ?>';

                            fetch(ajaxurl, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded'
                                },
                                body: new URLSearchParams({
                                    action: 'altvision_verify_license',
                                    nonce: '<?php echo wp_create_nonce('altvision_verify_license'); ?>',
                                    license_key: licenseKey
                                })
                            })
                            .then(response => response.json())
                            .then(response => {
                                if (response.success) {
                                    location.reload();
                                } else {
                                    throw new Error(response.data?.message || 'Invalid license key');
                                }
                            })
                            .catch(error => {
                                alert('Error: ' + error.message);
                                this.disabled = false;
                                this.textContent = '<?php echo esc_js(__('Activate License', 'altvision')); ?>';
                            });
                        });
                    }

                })();
                </script>
            <?php endif; ?>
        </div>

        <style>
        .altvision-features li {
            margin: 10px 0;
            font-size: 15px;
        }
        .card {
            padding: 20px;
        }
        </style>
        <?php
    }

    public function ajax_create_checkout() {
        check_ajax_referer('altvision_checkout', 'nonce');
    
        if (!current_user_can('manage_options')) {
            wp_send_json_error(['message' => 'Unauthorized']);
        }
    
        $response = wp_remote_post($this->api_url . '/create-checkout', [
            'body' => json_encode([
                'domain' => parse_url(get_site_url(), PHP_URL_HOST),
                'email' => wp_get_current_user()->user_email,
                'return_url' => add_query_arg(
                    array(
                        'page' => 'altvision-subscription',
                        'nonce' => wp_create_nonce('altvision_checkout_return')
                    ),
                    admin_url('admin.php')
                )
            ]),
            'headers' => [
                'Content-Type' => 'application/json'
            ]
        ]);
    
        if (is_wp_error($response)) {
            wp_send_json_error(['message' => $response->get_error_message()]);
        }
    
        $body = json_decode(wp_remote_retrieve_body($response));
        
        if (!empty($body->error)) {
            $message = 'Failed to create checkout session';
            
            if ($body->error === 'domain_exists') {
                $message = __('This domain already has an active license. Please deactivate the existing license first.', 'altvision');
            }
            
            wp_send_json_error(['message' => $message]);
        }
    
        if (!empty($body->checkout_url)) {
            wp_send_json_success(['checkout_url' => $body->checkout_url]);
        } else {
            wp_send_json_error(['message' => __('Invalid response from licensing server', 'altvision')]);
        }
    }


    public function ajax_verify_license() {
        check_ajax_referer('altvision_verify_license', 'nonce');

        if (!current_user_can('manage_options')) {
            wp_send_json_error(['message' => 'Unauthorized']);
        }

        $license_key = sanitize_text_field($_POST['license_key']);
        $timestamp = time();
        
        $response = wp_remote_post($this->api_url . '/verify-license', [
            'body' => json_encode([
                'api_key' => $license_key,
                'domain' => parse_url(get_site_url(), PHP_URL_HOST),
                'timestamp' => $timestamp,
                'signature' => $this->generate_verification_signature($license_key, $timestamp)
            ]),
            'headers' => [
                'Content-Type' => 'application/json'
            ]
        ]);

        if (is_wp_error($response)) {
            wp_send_json_error(['message' => $response->get_error_message()]);
        }

        $body = json_decode(wp_remote_retrieve_body($response));
        if (!empty($body->valid)) {
            update_option('altvision_license_key', $license_key);
            update_option('altvision_license_status', true);
            set_transient($this->last_verify_transient, time(), $this->verify_interval + 3600);
            wp_send_json_success();
        } else {
            update_option('altvision_license_status', false);
            wp_send_json_error(['message' => 'Invalid or expired license key']);
        }
    }

    public function show_activation_notice() {
        if (!current_user_can('manage_options')) {
            return;
        }

        $screen = get_current_screen();
        if ($screen->id === 'settings_page_altvision-subscription') {
            return;
        }

        $license_status = get_option('altvision_license_status', false);
        if (!$license_status) {
            ?>
            <div class="notice notice-warning is-dismissible">
                <p>
                    <?php _e('AltVision is running in limited mode.', 'altvision'); ?> 
                    <a href="<?php echo admin_url('admin.php?page=altvision-subscription'); ?>">
                        <?php _e('Activate your license', 'altvision'); ?> →
                    </a>
                </p>
            </div>
            <?php
        }
    }


    public static function deactivate() {
        wp_clear_scheduled_hook('altvision_daily_license_check');
        delete_transient('altvision_last_verify');
    }

    public static function is_license_active() {
        $instance = new self();
        $license_check = $instance->check_license_before_action();
        return !is_wp_error($license_check);
    }
}

// Register deactivation hook in your main plugin file
register_deactivation_hook(__FILE__, array('AltVision_Subscription_Handler', 'deactivate'));