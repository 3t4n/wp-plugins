<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('AltVision_API')):
class AltVision_API {
    private $api_endpoint = 'https://cloudfare-worker-api.chris-172.workers.dev/proxy/process-simple-vision-api';
    private $fetch_endpoint = 'https://cloudfare-worker-api.chris-172.workers.dev/proxy/fetch-image';
    private $license_server = 'https://api-altvision.cstate.se';
    private $license_check_transient = 'altvision_license_check';
    private $license_check_interval = 24 * HOUR_IN_SECONDS;

    public function __construct() {
        add_action('rest_api_init', array($this, 'register_rest_route'));
        
        if ($this->get_api_key()) {
            add_action('init', array($this, 'schedule_license_check'));
            add_action('altvision_check_license', array($this, 'check_license'));
            add_action('admin_notices', array($this, 'show_license_notices'));
        }
    }

    private function get_api_key() {
        $settings = get_option('altvision_settings', array());
        return !empty($settings['api_key']) ? $settings['api_key'] : false;
    }

    public function schedule_license_check() {
        if (!wp_next_scheduled('altvision_check_license')) {
            wp_schedule_event(time(), 'twicedaily', 'altvision_check_license');
        }
    }

    public function check_license() {
        $api_key = $this->get_api_key();
        if (!$api_key) {
            return;
        }

        $response = wp_remote_post($this->license_server . '/verify-license', array(
            'body' => json_encode(array(
                'api_key' => $api_key,
                'domain' => parse_url(get_site_url(), PHP_URL_HOST)
            )),
            'headers' => array('Content-Type' => 'application/json')
        ));

        if (is_wp_error($response)) {
            error_log('AltVision license check failed: ' . $response->get_error_message());
            return;
        }

        $body = json_decode(wp_remote_retrieve_body($response));
        $is_valid = !empty($body->valid);

        $previous_status = get_option('altvision_license_status', false);
        
        // Update the status
        update_option('altvision_license_status', $is_valid);
        set_transient($this->license_check_transient, time(), $this->license_check_interval);

        // If status changed from valid to invalid, log it
        if ($previous_status && !$is_valid) {
            error_log('AltVision license became invalid for site: ' . get_site_url());
            // Could add email notification here
        }
    }

    private function is_license_valid() {
        $api_key = $this->get_api_key();
        if (!$api_key) {
            return false;
        }

        // If no previous check exists or it's time for a new check
        if (!get_transient($this->license_check_transient)) {
            $this->check_license();
        }

        return get_option('altvision_license_status', false);
    }

    public function show_license_notices() {
        // Only show to admins
        if (!current_user_can('manage_options')) {
            return;
        }

        // Don't show on the settings page to avoid duplicate notices
        $screen = get_current_screen();
        if ($screen && $screen->id === 'settings_page_altvision') {
            return;
        }

        $license_status = get_option('altvision_license_status', false);
        if (!$license_status) {
            ?>
            <div class="notice notice-error is-dismissible">
                <p>
                    <strong><?php _e('AltVision Pro License Invalid', 'altvision-ai-alt-text-generator'); ?></strong>
                    <br>
                    <?php _e('Your AltVision Pro license is no longer valid. Premium features have been disabled.', 'altvision-ai-alt-text-generator'); ?>
                    <br>
                    <a href="<?php echo admin_url('options-general.php?page=altvision'); ?>" class="button button-secondary">
                        <?php _e('Check License Status', 'altvision-ai-alt-text-generator'); ?>
                    </a>
                </p>
            </div>
            <?php
        }
    }


    public function register_rest_route() {
        register_rest_route('image-processor/v1', '/process', array(
            'methods' => 'POST',
            'callback' => array($this, 'process_image'),
            'permission_callback' => function() {
                return current_user_can('edit_posts');
            }
        ));
    }

    public function process_image($request) {

        $params = $request->get_params();
        $image_url = isset($params['image_url']) ? sanitize_url($params['image_url']) : '';
        $image_id = url_to_postid($image_url);
        
        if (empty($image_url)) {
            return new WP_Error(
                'missing_url', 
                __('Image URL is required', 'altvision-ai-alt-text-generator'),
                array('status' => 400)
            );
        }

        try {
            $base64_image = $this->fetch_image_proxy($image_url);
            

            $vision_result = $this->call_vision_api($base64_image, $params);

            // Save the alt text to the attachment metadata
            if (isset($vision_result['message']) && $image_id) {
                update_post_meta($image_id, '_wp_attachment_image_alt', sanitize_text_field($vision_result['message']));
            }
            
            return array(
                'success' => true,
                'message' => isset($vision_result['message']) ? $vision_result['message'] : '',
                'status' => 200
            );

        } catch (Exception $e) {
            error_log('AltVision Error: ' . $e->getMessage());
            return new WP_Error(
                'processing_error',
                $e->getMessage(),
                array('status' => 500)
            );
        }
    }

    private function fetch_image_proxy($image_url) {
        $response = wp_remote_get($this->fetch_endpoint . '?url=' . urlencode($image_url), array(
            'headers' => array(
                'X-Source' => 'WordPress-Plugin',
                'X-Paid-User' => 'true'
            ),
            'timeout' => 30
        ));

        if (is_wp_error($response)) {
            error_log('AltVision proxy fetch failed: ' . $response->get_error_message());
            return false;
        }

        $body = json_decode(wp_remote_retrieve_body($response), true);
        
        if (isset($body['clientFetch']) && $body['clientFetch']) {
            return false; // Signal to try direct fetch
        }

        return isset($body['base64']) ? $body['base64'] : false;
    }

    private function call_vision_api($base64_image, $params) {
        $body = array(
            'base64Image' => $base64_image,
            'promptText' => isset($params['adjacent_content']) ? sanitize_text_field($params['adjacent_content']) : '',
            'threadId' => null
        );

        $headers = array(
            'Content-Type' => 'application/json',
            'X-Source' => 'WordPress-Plugin'
        );

       // Add license key to headers only if it exists and is valid
       $api_key = get_option('altvision_license_key', '');
       $license_status = get_option('altvision_license_status', false);

       if (!empty($api_key) && $license_status) {
           $headers['x-verify'] = sanitize_text_field($api_key);
       } else {
           error_log('AltVision API - No valid license key found');
       }

        $response = wp_remote_post($this->api_endpoint, array(
            'headers' => $headers,
            'body' => json_encode($body),
            'timeout' => 60
        ));

        if (is_wp_error($response)) {
            throw new Exception(__('Vision API error: ', 'altvision-ai-alt-text-generator') . $response->get_error_message());
        }

        $data = json_decode(wp_remote_retrieve_body($response), true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception(__('Invalid JSON response from Vision API', 'altvision-ai-alt-text-generator'));
        }

        return $data;
    }
}

endif; // End if class_exists check