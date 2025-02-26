<?php
/*
Plugin Name: AISiteAssistant
Plugin URI: https://aisiteassistant.com
Description: AISiteAssistant plugin with a chat interface that uses the full knowledge base of the user's website to answer queries. Requires a subscription with a 5-day money-back guarantee. Note: This plugin communicates with the AISiteAssistant API servers to function correctly.
Version: 1.4
Author: AISiteAssistant
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: aisiteassistant
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class AISiteAssistant_Plugin {
    private $api_url;

    public function __construct() {
        $this->api_url = 'https://api69.aisiteassistant.com';

        // Admin menu and settings
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));
        add_action('admin_init', array($this, 'register_settings'));

        // Frontend scripts
        add_action('wp_enqueue_scripts', array($this, 'enqueue_frontend_scripts'));
        add_action('wp_footer', array($this, 'conditionally_add_chat_widget'));

        // AJAX handlers
        add_action('wp_ajax_start_scraping', array($this, 'start_scraping'));
        add_action('wp_ajax_check_status', array($this, 'check_status'));
        add_action('wp_ajax_get_current_status', array($this, 'get_current_status'));
        add_action('wp_ajax_handle_chat_request', array($this, 'handle_chat_request'));
        add_action('wp_ajax_nopriv_handle_chat_request', array($this, 'handle_chat_request'));

        // Cron schedules and events
        add_filter('cron_schedules', array($this, 'add_custom_cron_intervals'));
        add_action('AISiteAssistant_cron_event', array($this, 'handle_scheduled_scraping'));

        // Activation and deactivation hooks
        register_activation_hook(__FILE__, array($this, 'activate'));
        register_deactivation_hook(__FILE__, array($this, 'deactivate'));
        register_uninstall_hook(__FILE__, array('AISiteAssistant_Plugin', 'uninstall'));
    }

    /**
     * Activation hook: Set default options and schedule cron events.
     */
    public function activate() {
        // Add default options if they don't exist
        add_option('aisiteassistant_chat_enabled', 'no');
        add_option('aisiteassistant_last_db_time', '');
        add_option('aisiteassistant_update_frequency', 'manual');
        add_option('aisiteassistant_last_url', '');
        add_option('aisiteassistant_task_id', '');
        add_option('aisiteassistant_task_status', '');
        add_option('aisiteassistant_api_key', '');
        add_option('aisiteassistant_secret_key', '');
        add_option('aisiteassistant_next_scheduled_time', 'Not Scheduled');

        // Add default values for new settings
        add_option('aisiteassistant_chat_placeholder', 'Type your message...');
        add_option('aisiteassistant_chat_send_label', 'Send');

        // Schedule the next run based on update frequency
        $this->schedule_next_run();
    }

    /**
     * Deactivation hook: Clear scheduled cron events.
     */
    public function deactivate() {
        wp_clear_scheduled_hook('AISiteAssistant_cron_event');
    }

    /**
     * Uninstall hook: Clean up all options.
     */
    public static function uninstall() {
        delete_option('aisiteassistant_chat_enabled');
        delete_option('aisiteassistant_last_db_time');
        delete_option('aisiteassistant_status');
        delete_option('aisiteassistant_last_db');
        delete_option('aisiteassistant_update_frequency');
        delete_option('aisiteassistant_last_url');
        delete_option('aisiteassistant_task_id');
        delete_option('aisiteassistant_task_status');
        delete_option('aisiteassistant_api_key');
        delete_option('aisiteassistant_secret_key');
        delete_option('aisiteassistant_next_scheduled_time');

        // Delete new settings
        delete_option('aisiteassistant_chat_placeholder');
        delete_option('aisiteassistant_chat_send_label');
    }

    /**
     * Add the admin menu page.
     */
    public function add_admin_menu() {
        add_menu_page(
            'AISiteAssistant',
            'AISiteAssistant',
            'manage_options',
            'aisiteassistant',
            array($this, 'create_admin_page'),
            'dashicons-admin-site',
            100
        );
    }

    /**
     * Create the admin page content.
     */
    public function create_admin_page() {
        // Retrieve options
        $last_db_created_time = get_option('aisiteassistant_last_db_time', false);
        $chat_enabled = get_option('aisiteassistant_chat_enabled', 'no');
        $update_frequency = get_option('aisiteassistant_update_frequency', 'manual');
        $api_key = get_option('aisiteassistant_api_key', '');
        $secret_key = get_option('aisiteassistant_secret_key', '');
        $task_status = get_option('aisiteassistant_task_status', '');

        // New settings
        $chat_placeholder = get_option('aisiteassistant_chat_placeholder', 'Type your message...');
        $chat_send_label = get_option('aisiteassistant_chat_send_label', 'Send');

        // Mask the secret key to show only the first 4 characters
        $masked_secret_key = '';
        if (!empty($secret_key)) {
            $masked_secret_key = substr($secret_key, 0, 4) . str_repeat('*', max(strlen($secret_key) - 4, 0));
        }

        // Display the admin page
        ?>
        <div class="wrap">
            <h1>AISiteAssistant</h1>

            <!-- Subscription and API management text -->
            <div class="text-wrapper">
                <p>
                    <a href="https://aisiteassistant.com" target="_blank">Manage your subscriptions and API keys here</a>
                </p>
            </div>

            <!-- Informative text -->
            <div class="text-wrapper">
                <p>*This might take some time. If you have a large website with many pages, it could take up to several hours. You can leave this page, and the database creation will continue until you see the confirmation of database creation. You might need to reload this page to view the updated status.</p>
            </div>

            <!-- API Key Setting -->
            <form method="post" action="options.php">
                <?php settings_fields('aisiteassistant_api_key_settings'); ?>
                <?php do_settings_sections('aisiteassistant_api_key_settings'); ?>
                <div class="setting-row">
                    <label for="api_key">API Key:</label>
                    <input type="text" name="aisiteassistant_api_key" id="api_key" value="<?php echo esc_attr($api_key); ?>" required>
                    <?php submit_button('Save', 'primary', 'submit', false, array('class' => 'submit-button')); ?>
                </div>
            </form>

            <!-- Secret Key Setting -->
            <form method="post" action="options.php">
                <?php settings_fields('aisiteassistant_secret_key_settings'); ?>
                <?php do_settings_sections('aisiteassistant_secret_key_settings'); ?>
                <div class="setting-row">
                    <label for="secret_key">Secret Key:</label>
                    <input type="text" name="aisiteassistant_secret_key" id="secret_key" value="<?php echo esc_attr($masked_secret_key); ?>" required>
                    <?php submit_button('Save', 'primary', 'submit', false, array('class' => 'submit-button')); ?>
                </div>
            </form>

            <!-- Update Frequency Setting -->
            <form method="post" action="options.php">
                <?php settings_fields('aisiteassistant_update_frequency_settings'); ?>
                <?php do_settings_sections('aisiteassistant_update_frequency_settings'); ?>
                <div class="setting-row">
                    <label for="update_frequency">Update Frequency:</label>
                    <select name="aisiteassistant_update_frequency" id="update_frequency">
                        <option value="manual" <?php selected($update_frequency, 'manual'); ?>>Manual</option>
                        <option value="daily" <?php selected($update_frequency, 'daily'); ?>>Daily</option>
                        <option value="weekly" <?php selected($update_frequency, 'weekly'); ?>>Weekly</option>
                        <option value="monthly" <?php selected($update_frequency, 'monthly'); ?>>Monthly</option>
                    </select>
                    <?php submit_button('Save', 'primary', 'submit', false, array('class' => 'submit-button')); ?>
                </div>
            </form>

            <!-- Create Database Form -->
            <form id="scraper-form">
                <div class="setting-row">
                    <label for="start_url">Create database:</label>
                    <input type="text" name="start_url" id="start_url" value="<?php echo esc_attr(site_url('/')); ?>" readonly>
                    <?php submit_button('Start', 'primary', 'submit', false, array('id' => 'start-button', 'class' => 'submit-button')); ?>
                </div>
            </form>

            <!-- Errors and informative text aligned below user website URL -->
            <div class="setting-row">
                <div style="width: 160px;"></div> <!-- Empty space to align with labels -->
                <div style="flex: 1;">
                    <?php
                    // Determine the message to display
                    if (!empty($task_status)) {
                        $message = $task_status;
                    } elseif ($last_db_created_time) {
                        $message = 'Database is created and up to date';
                    } else {
                        $message = '';
                    }

                    if (!empty($message)) {
                        echo '<div id="scraper-result">' . esc_html($message) . '</div>';
                    }
                    ?>
                </div>
            </div>

            <!-- Enable Chat Interface Setting -->
            <form method="post" action="options.php">
                <?php settings_fields('aisiteassistant_chat_enabled_settings'); ?>
                <?php do_settings_sections('aisiteassistant_chat_enabled_settings'); ?>
                <div class="setting-row">
                    <label for="chat_enabled">Enable Chat Interface:</label>
                    <input type="checkbox" name="aisiteassistant_chat_enabled" id="chat_enabled" value="yes" <?php checked($chat_enabled, 'yes'); ?>>
                    <?php submit_button('Save', 'primary', 'submit', false, array('class' => 'submit-button')); ?>
                </div>
            </form>

            <!-- New: Chat Customization Settings -->
            <h2>Chat Customization</h2>
            <form method="post" action="options.php">
                <?php
                // Register the settings fields for chat customization
                settings_fields('aisiteassistant_chat_settings');
                do_settings_sections('aisiteassistant_chat_settings');
                ?>
                <div class="setting-row">
                    <label for="chat_placeholder">Chat Input Placeholder:</label>
                    <input type="text" name="aisiteassistant_chat_placeholder" id="chat_placeholder" value="<?php echo esc_attr($chat_placeholder); ?>">
                </div>
                <div class="setting-row">
                    <label for="chat_send_label">Chat Send Button Label:</label>
                    <input type="text" name="aisiteassistant_chat_send_label" id="chat_send_label" value="<?php echo esc_attr($chat_send_label); ?>">
                </div>
                <?php submit_button('Save Chat Settings', 'primary', 'submit', false, array('class' => 'submit-button')); ?>
            </form>

        </div>
        <?php
    }

    /**
     * Enqueue admin scripts and styles.
     */
    public function enqueue_admin_scripts($hook) {
        // Only load on your plugin's admin page
        if ($hook !== 'toplevel_page_aisiteassistant') {
            return;
        }

        $script_version = filemtime(plugin_dir_path(__FILE__) . 'js/aisiteassistant.js');
        $style_version = filemtime(plugin_dir_path(__FILE__) . 'css/admin-styles.css');

        // Enqueue Admin CSS
        wp_enqueue_style(
            'AISiteAssistant-admin-css',
            plugins_url('css/admin-styles.css', __FILE__),
            array(),
            $style_version
        );

        // Enqueue Google Font
        wp_enqueue_style(
            'AISiteAssistant-admin-fonts',
            'https://fonts.googleapis.com/css2?family=Manrope:wght@400;700&display=swap',
            array(),
            null
        );

        // Enqueue Admin JavaScript
        wp_enqueue_script(
            'AISiteAssistant-js',
            plugins_url('js/aisiteassistant.js', __FILE__),
            array('jquery'),
            $script_version,
            true
        );

        // Localize script without exposing API and Secret Keys
        wp_localize_script('AISiteAssistant-js', 'AISiteAssistant', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            // 'api_key' => get_option('aisiteassistant_api_key', ''), // Removed for security
            'current_task_id' => get_option('aisiteassistant_task_id', ''),
            'domain' => isset($_SERVER['HTTP_HOST']) ? sanitize_text_field(wp_unslash($_SERVER['HTTP_HOST'])) : '',
            'nonce' => wp_create_nonce('aisiteassistant_nonce')
        ));
    }

    /**
     * Enqueue frontend scripts and styles if chat is enabled.
     */
    public function enqueue_frontend_scripts() {
        $chat_enabled = get_option('aisiteassistant_chat_enabled', 'no');
        if ($chat_enabled === 'yes') {
            $domain = isset($_SERVER['HTTP_HOST']) ? sanitize_text_field(wp_unslash($_SERVER['HTTP_HOST'])) : '';
            $script_version = filemtime(plugin_dir_path(__FILE__) . 'js/aisiteassistant.js');
            $style_version = filemtime(plugin_dir_path(__FILE__) . 'css/aisiteassistant_styles.css');
            $nonce = wp_create_nonce('aisiteassistant_nonce');

            // Retrieve new settings
            $chat_placeholder = get_option('aisiteassistant_chat_placeholder', 'Type your message...');
            $chat_send_label = get_option('aisiteassistant_chat_send_label', 'Send');

            wp_enqueue_script(
                'AISiteAssistant-js',
                plugins_url('js/aisiteassistant.js', __FILE__),
                array('jquery'),
                $script_version,
                true
            );
            wp_enqueue_style(
                'AISiteAssistant-css',
                plugins_url('css/aisiteassistant_styles.css', __FILE__),
                array(),
                $style_version
            );

            // Enqueue Google Font
            wp_enqueue_style(
                'AISiteAssistant-fonts',
                'https://fonts.googleapis.com/css2?family=Manrope:wght@400;700&display=swap',
                array(),
                null
            );

            wp_localize_script('AISiteAssistant-js', 'AISiteAssistant', array(
                'ajax_url'         => admin_url('admin-ajax.php'),
                'bot_avatar'       => plugins_url('assistant.png', __FILE__),
                'domain'           => $domain,
                'nonce'            => $nonce,
                'chat_placeholder' => esc_js($chat_placeholder),
                'chat_send_label'  => esc_js($chat_send_label)
            ));
        }
    }

    /**
     * Conditionally add the chat widget to the frontend.
     */
    public function conditionally_add_chat_widget() {
        $chat_enabled = get_option('aisiteassistant_chat_enabled', 'no');
        if ($chat_enabled === 'yes') {
            $this->add_chat_widget();
        }
    }

    /**
     * Output the chat widget HTML.
     */
    public function add_chat_widget() {
        ?>
        <div id="chat-icon">
            <img src="<?php echo esc_url(plugins_url('assistant.png', __FILE__)); ?>" alt="Chat Icon">
        </div>
        <div id="chat-widget" style="display:none;">
            <div id="chat-content" style="height:300px;overflow-y:auto;"></div>
            <div id="chat-input-container">
                <input type="text" id="chat-input" placeholder="<?php echo esc_attr(get_option('aisiteassistant_chat_placeholder', 'Type your message...')); ?>"/>
                <button id="chat-send"><?php echo esc_html(get_option('aisiteassistant_chat_send_label', 'Send')); ?></button>
            </div>
        </div>
        <?php
    }

    /**
     * Normalize the domain from a given URL.
     */
    private function normalize_domain($url) {
        $parsed_url = wp_parse_url($url);
        $domain = isset($parsed_url['host']) ? $parsed_url['host'] : $parsed_url['path'];

        $domain = preg_replace('/^www\./', '', $domain);
        $domain = rtrim($domain, '/');

        return $domain;
    }

    /**
     * Send a request to the AISiteAssistant API.
     *
     * @param string $endpoint API endpoint.
     * @param string $method HTTP method (GET or POST).
     * @param array  $data    Data to send.
     * @return array|WP_Error API response or error.
     */
    public function send_request($endpoint, $method = 'POST', $data = array()) {
        $api_key = sanitize_text_field(get_option('aisiteassistant_api_key'));
        $secret_key = sanitize_text_field(get_option('aisiteassistant_secret_key'));
        $domain = isset($_SERVER['HTTP_HOST']) ? sanitize_text_field(wp_unslash($_SERVER['HTTP_HOST'])) : '';

        // Check if API key and secret key are provided
        if (empty($api_key) || empty($secret_key)) {
            return new WP_Error('missing_keys', 'API Key and Secret Key are required.');
        }

        // Generate timestamp and nonce
        $timestamp = time();
        $nonce = wp_generate_uuid4();

        // Sanitize endpoint and method
        $endpoint = esc_url_raw($endpoint);
        $method = sanitize_text_field($method);

        // **Selective Sanitization**
        $sanitized_data = array();

        // Sanitize 'url' if exists
        if (isset($data['url'])) {
            $sanitized_data['url'] = sanitize_text_field($data['url']);
        }

        // Sanitize 'query' if exists
        if (isset($data['query'])) {
            $sanitized_data['query'] = sanitize_text_field($data['query']);
        }

        // Sanitize 'update_frequency' if exists
        if (isset($data['update_frequency'])) {
            $sanitized_data['update_frequency'] = sanitize_text_field($data['update_frequency']);
        }

        // Sanitize 'urls' if exists (assumed to be an array of URLs)
        if (isset($data['urls']) && is_array($data['urls'])) {
            $sanitized_data['urls'] = array_map('esc_url_raw', $data['urls']);
        }

        // Preserve 'html_content' as raw HTML
        if (isset($data['html_content'])) {
            $sanitized_data['html_content'] = $data['html_content'];
        }

        // Optionally, sanitize other fields as needed

        // Encode the body using consistent JSON encoding
        if ($method === 'GET') {
            $body = '';
        } else {
            $body = wp_json_encode($sanitized_data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        }

        // Construct the string to sign
        $string_to_sign = "{$method}\n{$endpoint}\n{$body}\n{$timestamp}\n{$nonce}";

        // Calculate HMAC signature
        $signature = hash_hmac('sha256', $string_to_sign, $secret_key);

        $args = array(
            'method'    => $method,
            'headers'   => array(
                'Content-Type'  => 'application/json',
                'X-API-KEY'     => $api_key,
                'X-Timestamp'   => $timestamp,
                'X-Nonce'       => $nonce,
                'X-Signature'   => $signature,
            ),
            'timeout'   => 30,
        );

        // Only include body for non-GET requests
        if ($method !== 'GET') {
            $args['body'] = $body;
        }

        if ($method === 'GET') {
            $response = wp_remote_get($this->api_url . $endpoint, $args);
        } else {
            $response = wp_remote_post($this->api_url . $endpoint, $args);
        }

        if (is_wp_error($response)) {
            return new WP_Error('api_error', 'An error occurred while connecting to the API.');
        }

        $response_body = wp_remote_retrieve_body($response);
        $decoded_body = json_decode($response_body, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return new WP_Error('invalid_json', 'Invalid response from the API.');
        }

        if (isset($decoded_body['error'])) {
            return new WP_Error('api_error', $decoded_body['error']);
        }

        return $decoded_body;
    }

    /**
     * Retrieve all active URLs with their corresponding HTML content.
     *
     * @return array Array containing 'urls' and 'html_content'.
     */
    private function get_all_active_urls_with_html() {
        $urls = array();
        $html_content = array();

        // Simulate logged-out state by temporarily "logging out" any logged-in user.
        $original_user = wp_get_current_user();
        wp_set_current_user(0); // Set the current user to "no user" (ID 0)

        $args = array(
            'post_type'      => array('post', 'page'),
            'post_status'    => 'publish',
            'posts_per_page' => -1,
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $urls[] = get_permalink();

                // Collect the content that a non-logged-in user sees
                $content = get_the_content();
                $filtered_content = apply_filters('the_content', $content);

                $html_content[] = $filtered_content;
            }
        }

        wp_reset_postdata();

        // Restore the original logged-in user after processing
        if ($original_user instanceof WP_User && $original_user->ID !== 0) {
            wp_set_current_user($original_user->ID);
        }

        return array('urls' => $urls, 'html_content' => $html_content);
    }

    /**
     * Handle the scraping initiation via AJAX.
     */
    public function start_scraping() {
        check_ajax_referer('aisiteassistant_nonce', 'nonce');

        if (isset($_POST['start_url'])) {
            $start_url = sanitize_text_field(wp_unslash($_POST['start_url']));
        } else {
            wp_send_json_error('start_url not provided');
        }

        update_option('aisiteassistant_status', 'Starting...');
        update_option('aisiteassistant_last_url', $start_url);

        $update_frequency = get_option('aisiteassistant_update_frequency', 'manual');

        $all_data = $this->get_all_active_urls_with_html();

        $data = array(
            'url'              => $start_url,
            'urls'             => $all_data['urls'],
            'html_content'     => $all_data['html_content'],
            'update_frequency' => $update_frequency
        );

        $response = $this->send_request('/scrape', 'POST', $data);

        if (is_wp_error($response)) {
            wp_send_json_error($response->get_error_message());
        } else {
            update_option('aisiteassistant_task_id', $response['task_id']);
            wp_send_json_success($response);
        }
    }

    /**
     * Handle checking the status of a scraping task via AJAX.
     */
    public function check_status() {
        check_ajax_referer('aisiteassistant_nonce', 'nonce');

        if (isset($_POST['task_id'])) {
            $task_id = sanitize_text_field(wp_unslash($_POST['task_id']));
        } else {
            wp_send_json_error('task_id not provided');
        }

        $response = $this->send_request('/status/' . $task_id, 'GET');

        if (is_wp_error($response)) {
            wp_send_json_error($response->get_error_message());
        } else {
            $status = isset($response['status']) ? $response['status'] : 'Unknown status';
            $result = isset($response['result']) ? $response['result'] : '';

            update_option('aisiteassistant_status', $status);
            update_option('aisiteassistant_task_status', $status);
            if ($status == 'Database created and ready to use!') {
                update_option('aisiteassistant_last_db', $result);
                update_option('aisiteassistant_last_db_time', current_time('mysql'));
                update_option('aisiteassistant_status', 'Database is created and up to date');
                delete_option('aisiteassistant_task_id');
                delete_option('aisiteassistant_task_status');
            }

            wp_send_json_success($response);
        }
    }

    /**
     * Retrieve the current status via AJAX.
     */
    public function get_current_status() {
        $status = get_option('aisiteassistant_status', 'No active tasks.');
        $last_db = get_option('aisiteassistant_last_db', '');
        $last_db_time = 'Database is created and up to date';
        $next_scheduled_time = get_option('aisiteassistant_next_scheduled_time', 'Not Scheduled');
        wp_send_json_success(array('status' => $status, 'last_db' => $last_db, 'last_db_time' => $last_db_time, 'next_scheduled_time' => $next_scheduled_time));
    }

    /**
     * Handle chat requests via AJAX.
     */
    public function handle_chat_request() {
        check_ajax_referer('aisiteassistant_nonce', 'nonce');

        if (isset($_POST['query'])) {
            $query = sanitize_text_field(wp_unslash($_POST['query']));
        } else {
            wp_send_json_error('query not provided');
        }

        // Ensure 'url' is correctly set to the site URL
        $data = array(
            'url'   => site_url(),
            'query' => $query
        );

        $response = $this->send_request('/chat', 'POST', $data);

        if (is_wp_error($response)) {
            wp_send_json_error($response->get_error_message());
        } else {
            wp_send_json_success(array('response' => $response['response']));
        }
    }

    /**
     * Register plugin settings with proper sanitization callbacks.
     */
    public function register_settings() {
        register_setting(
            'aisiteassistant_api_key_settings',
            'aisiteassistant_api_key',
            array(
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        register_setting(
            'aisiteassistant_secret_key_settings',
            'aisiteassistant_secret_key',
            array(
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        register_setting(
            'aisiteassistant_update_frequency_settings',
            'aisiteassistant_update_frequency',
            array(
                'sanitize_callback' => array($this, 'sanitize_update_frequency'),
            )
        );

        register_setting(
            'aisiteassistant_chat_enabled_settings',
            'aisiteassistant_chat_enabled',
            array(
                'sanitize_callback' => array($this, 'sanitize_chat_enabled'),
            )
        );

        // Register new settings for chat customization
        register_setting(
            'aisiteassistant_chat_settings',
            'aisiteassistant_chat_placeholder',
            array(
                'sanitize_callback' => array($this, 'sanitize_chat_placeholder'),
            )
        );

        register_setting(
            'aisiteassistant_chat_settings',
            'aisiteassistant_chat_send_label',
            array(
                'sanitize_callback' => array($this, 'sanitize_chat_send_label'),
            )
        );
    }

    /**
     * Sanitize the update frequency setting.
     *
     * @param string $input The input value.
     * @return string Sanitized value.
     */
    public function sanitize_update_frequency($input) {
        $valid = array('manual', 'daily', 'weekly', 'monthly');

        if (in_array($input, $valid, true)) {
            // Reschedule cron jobs based on the new frequency
            $this->schedule_next_run();
            return $input;
        } else {
            add_settings_error(
                'aisiteassistant_update_frequency',
                'invalid_frequency',
                'Invalid update frequency selected.',
                'error'
            );
            return get_option('aisiteassistant_update_frequency', 'manual');
        }
    }

    /**
     * Sanitize the chat enabled setting.
     *
     * @param string $input The input value.
     * @return string Sanitized value.
     */
    public function sanitize_chat_enabled($input) {
        return ($input === 'yes') ? 'yes' : 'no';
    }

    /**
     * Sanitize the chat placeholder setting.
     *
     * @param string $input The input value.
     * @return string Sanitized value.
     */
    public function sanitize_chat_placeholder($input) {
        $input = sanitize_text_field($input);
        if (empty($input)) {
            return 'Type your message...';
        }
        return $input;
    }

    /**
     * Sanitize the chat send label setting.
     *
     * @param string $input The input value.
     * @return string Sanitized value.
     */
    public function sanitize_chat_send_label($input) {
        $input = sanitize_text_field($input);
        if (empty($input)) {
            return 'Send';
        }
        return $input;
    }

    /**
     * Add custom cron intervals.
     *
     * @param array $schedules Existing cron schedules.
     * @return array Modified cron schedules.
     */
    public function add_custom_cron_intervals($schedules) {
        $schedules['monthly'] = array(
            'interval' => 30 * DAY_IN_SECONDS,
            'display'  => __('Once a Month', 'aisiteassistant')
        );
        $schedules['weekly'] = array(
            'interval' => WEEK_IN_SECONDS,
            'display'  => __('Once a Week', 'aisiteassistant')
        );
        $schedules['daily'] = array(
            'interval' => DAY_IN_SECONDS,
            'display'  => __('Once a Day', 'aisiteassistant')
        );
        return $schedules;
    }

    /**
     * Schedule the next scraping run based on update frequency.
     */
    public function schedule_next_run() {
        $update_frequency = get_option('aisiteassistant_update_frequency', 'manual');

        wp_clear_scheduled_hook('AISiteAssistant_cron_event');

        $schedules = wp_get_schedules();

        if ($update_frequency !== 'manual' && isset($schedules[$update_frequency])) {
            $interval = $schedules[$update_frequency]['interval'];
            $next_run = time() + $interval;

            if (!wp_next_scheduled('AISiteAssistant_cron_event')) {
                wp_schedule_event($next_run, $update_frequency, 'AISiteAssistant_cron_event');
            }

            $next_scheduled_time = wp_next_scheduled('AISiteAssistant_cron_event');
            update_option('aisiteassistant_next_scheduled_time', gmdate('Y-m-d H:i:s', $next_scheduled_time));
        } else {
            update_option('aisiteassistant_next_scheduled_time', 'Not Scheduled');
        }
    }

    /**
     * Handle scheduled scraping via cron.
     */
    public function handle_scheduled_scraping() {
        $last_url = get_option('aisiteassistant_last_url');
        if (!empty($last_url)) {
            $this->start_scheduled_scraping($last_url);
        }
    }

    /**
     * Start scheduled scraping.
     *
     * @param string $url The starting URL.
     */
    private function start_scheduled_scraping($url) {
        $url = esc_url_raw($url);

        update_option('aisiteassistant_status', 'Starting scheduled database creation...');

        $update_frequency = get_option('aisiteassistant_update_frequency', 'manual');

        $all_data = $this->get_all_active_urls_with_html();

        $data = array(
            'url'              => $url,
            'urls'             => $all_data['urls'],
            'html_content'     => $all_data['html_content'],
            'update_frequency' => $update_frequency
        );

        $response = $this->send_request('/scrape', 'POST', $data);

        if (!is_wp_error($response) && isset($response['task_id'])) {
            update_option('aisiteassistant_task_id', $response['task_id']);
        }
    }
}

new AISiteAssistant_Plugin();
