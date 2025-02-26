<?php

namespace DavidWenner\ATestimonialBuilder;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


defined('ATBS_API_URL') or define('ATBS_API_URL', 'https://api.vocalreferences.com/wp/');

use WP_Error;
use DavidWenner\ATestimonialBuilder\ATBS_ApiClient;
use DavidWenner\ATestimonialBuilder\ATBS_LayoutMapper;
use DavidWenner\ATestimonialBuilder\ATBS_Functions;
use DavidWenner\ATestimonialBuilder\ATBS_FlashMessages;

class ATBS_Handlers {

    public function __construct()
    {
        add_action('admin_post_atbs_login', [$this, 'atbs_handle_login_form_submission']);
        add_action('admin_post_atbs_settings', [$this, 'atbs_handle_widget_settings_form_submission']);
        add_action('admin_post_atbs_profile', [$this, 'atbs_handle_profile_submission']);
    }

    /**
     * static::atbs_api
     * @return \ATBS_Api_Client
     */
    public static function atbs_api()
    {
        return new ATBS_ApiClient(get_option('atbs_oauth_token', null), ATBS_API_URL);
    }

    /**
     * static::atbs_get_user_identity
     * @return string|null
     */
    public static function atbs_get_user_identity()
    {
        if (get_option('atbs_is_logged_in', false)) {
            return get_option('atbs_user_identity', null);
        }
        if (get_option('atbs_is_guest_logged_in', false)) {
            return get_option('atbs_guest_identity', null);
        }
        return null;
    }

    /**
     * atbs_get_guest_user_identity
     * @return string|null
     */
    public static function atbs_get_guest_user_identity()
    {
        return get_option('atbs_guest_identity', null);
    }

    /**
     * atbs_handle_login_form_submission
     * @return mixed
     */
    public static function atbs_handle_login_form_submission()
    {
        // Verify nonce
        if (!isset($_POST['atbs_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['atbs_nonce'])), 'atbs_login')) {
            ATBS_FlashMessages::atbs_queue_flash_message(__('Nonce verification failed.', 'a-testimonial-builder'), 'error');
        }

        // Check if form was submitted
        if (isset($_POST['action'])) {
            $username = isset($_POST['username']) ? sanitize_text_field(wp_unslash($_POST['username'])) : null;
            $password = isset($_POST['password']) ? sanitize_text_field(wp_unslash($_POST['password'])) : null;
            if ($username && $password) {

                $data = static::atbs_api()->post('login', wp_json_encode([
                    'email' => $username,
                    'password' => $password,
                ]));

                if ($data instanceof WP_Error && $data->has_errors()) {
                    ATBS_FlashMessages::atbs_queue_flash_message($data->get_error_message(), 'error');
                } else {
                    if (!isset($data['auth_token'])) {
                        ATBS_FlashMessages::atbs_queue_flash_message($data['message'] ?? __('Login failed. Please check your username and password.', 'a-testimonial-builder'), 'error');
                    } else if (isset($data['auth_token'])) {
                        // Set access token in options
                        update_option('atbs_user_identity', $data['auth_token']);
                        update_option('atbs_is_logged_in', true);
                        update_option('atbs_is_guest_logged_in', false);
                        update_option('atbs_user_email', $username);
                    }
                }
            } else {
                ATBS_FlashMessages::atbs_queue_flash_message(__('Login failed. Please check your username and password.', 'a-testimonial-builder'), 'error');
            }
        }
        return wp_redirect(admin_url('admin.php?page=a-testimonial-builder'));
    }

    /**
     * atbs_handle_get_content
     * @param string $sort
     * @return array
     */
    public static function atbs_handle_get_content($search = [])
    {
        $data = static::atbs_api()->post('content', wp_json_encode([
            'search' => array_map('sanitize_text_field', $search),
            'auth_token' => static::atbs_get_user_identity(),
        ]));

        if ($data instanceof WP_Error && $data->has_errors()) {
            ATBS_FlashMessages::atbs_queue_flash_message($data->get_error_message(), 'error');
        } else if (!empty($data) && isset($data['result']) && $data['result'] == true) {
            return $data ?? [];
        } else if ((isset($data['result']) && $data['result'] == false) || isset($data['message'])) {
            ATBS_FlashMessages::atbs_queue_flash_message($data['message'] ?? __('System error.', 'a-testimonial-builder'), 'error');
        }
        return [];
    }

    /**
     * atbs_handle_get_settings
     * @return array
     */
    public static function atbs_handle_get_settings()
    {
        $data = static::atbs_api()->get('widget-settings', [
            'auth_token' => static::atbs_get_user_identity(),
        ]);

        if ($data instanceof WP_Error && $data->has_errors()) {
            ATBS_FlashMessages::atbs_queue_flash_message($data->get_error_message(), 'error');
        } else if (!empty($data) && isset($data['result']) && $data['result'] == true) {
            return $data['options'] ?? [];
        } else if ((isset($data['result']) && $data['result'] == false) || isset($data['message'])) {
            ATBS_FlashMessages::atbs_queue_flash_message($data['message'] ?? __('System error.', 'a-testimonial-builder'), 'error');
        }
        return [];
    }

    /**
     * atbs_handle_widget_settings_form_submission
     * @return mixed
     */
    public static function atbs_handle_widget_settings_form_submission()
    {
        // Verify nonce
        if (!isset($_POST['atbs_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['atbs_nonce'])), 'atbs_settings')) {
            ATBS_FlashMessages::atbs_queue_flash_message(__('Nonce verification failed.', 'a-testimonial-builder'), 'error');
        }
        // Check if form was submitted
        if (isset($_POST['action'])) {
            $fields = isset($_POST['fields']) ? array_map('sanitize_text_field', wp_unslash($_POST['fields'])) : [];
            if ($fields) {
                $originFields = (new ATBS_LayoutMapper())->unmap($fields);

                $data = static::atbs_api()->post('widget-settings/update', wp_json_encode([
                    'fields' => $originFields,
                    'auth_token' => static::atbs_get_user_identity(),
                ]));

                if ($data instanceof WP_Error && $data->has_errors()) {
                    ATBS_FlashMessages::atbs_queue_flash_message($data->get_error_message(), 'error');
                } else if (!empty($data) && isset($data['result']) && $data['result'] == true) {
                    if (isset($_POST['publish'])) {
                        static::atbs_handle_widget_settings_form_publish($fields);
                        ATBS_FlashMessages::atbs_queue_flash_message(__('Widget successfully published.', 'a-testimonial-builder'), 'updated');
                    } else {
                        ATBS_FlashMessages::atbs_queue_flash_message(__('Settings successfully updated.', 'a-testimonial-builder'), 'updated');
                    }
                } else if ((isset($data['result']) && $data['result'] == false) || isset($data['message'])) {
                    ATBS_FlashMessages::atbs_queue_flash_message($data['message'] ?? __('System error.', 'a-testimonial-builder'), 'error');
                }
            } else {
                ATBS_FlashMessages::atbs_queue_flash_message(__('Empty post data.', 'a-testimonial-builder'), 'error');
            }
        }
        return wp_redirect(admin_url('admin.php?page=a-testimonial-builder-settings'));
    }

    /**
     * atbs_handle_widget_settings_form_publish
     * @param array $data
     */
    public static function atbs_handle_widget_settings_form_publish($data)
    {
        $layout_id = $data['wp_layout'] ?? ATBS_LayoutMapper::LAYOUT_HORIZON;
        if (($post_id = get_option('atbs_post_id', null)) && ($post = get_post($post_id))) {
            $post->post_content = static::atbs_handle_get_updated_short_code($post->post_content, $layout_id);
            $post->post_status = 'publish';
            $post->post_type = 'page';
            wp_update_post($post);
        } else {
            $new_post = array(
                'post_title' => __('Testimonials', 'a-testimonial-builder'),
                'post_content' => "<!-- wp:shortcode -->\n[atbs_widget layout_id={$layout_id}]\n<!-- /wp:shortcode -->",
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_author' => get_current_user_id(),
            );
            $post_id = wp_insert_post($new_post);
            update_option('atbs_post_id', $post_id);
        }
    }

    /**
     * atbs_handle_get_updated_short_code
     * @param string $post_content
     * @param int $layout_id
     * @return string
     */
    public static function atbs_handle_get_updated_short_code($post_content, $layout_id)
    {
        $pattern = '/(?<=layout_id=)\d+/';
        preg_match($pattern, $post_content, $matches);
        if (isset($matches[0])) {
            $post_content = str_replace($matches[0], $layout_id, $post_content);
        }
        return $post_content;
    }

    /**
     * atbs_handle_get_capture_links
     * @return array
     */
    public static function atbs_handle_get_capture_links()
    {
        $data = static::atbs_api()->get('capture', [
            'auth_token' => static::atbs_get_user_identity(),
        ]);

        if ($data instanceof WP_Error && $data->has_errors()) {
            ATBS_FlashMessages::atbs_queue_flash_message($data->get_error_message(), 'error');
        } else if (!empty($data) && isset($data['result']) && $data['result'] == true) {
            return $data['options'] ?? [];
        } else if ((isset($data['result']) && $data['result'] == false) || isset($data['message'])) {
            ATBS_FlashMessages::atbs_queue_flash_message($data['message'] ?? __('System error.', 'a-testimonial-builder'), 'error');
        }
        return [];
    }

    /**
     * atbs_handle_get_profile
     * @return array
     */
    public static function atbs_handle_get_profile()
    {
        $data = static::atbs_api()->get('profile', [
            'auth_token' => static::atbs_get_user_identity(),
        ]);

        if ($data instanceof WP_Error && $data->has_errors()) {
            ATBS_FlashMessages::atbs_queue_flash_message($data->get_error_message(), 'error');
        } else if (!empty($data) && isset($data['id'])) {
            return $data ?? [];
        } else if ((isset($data['result']) && $data['result'] == false) || isset($data['message'])) {
            ATBS_FlashMessages::atbs_queue_flash_message($data['message'] ?? __('System error.', 'a-testimonial-builder'), 'error');
        }
        return [];
    }

    /**
     * atbs_handle_profile_submission
     * @return mixed
     */
    public static function atbs_handle_profile_submission()
    {
        // Verify nonce
        if (!isset($_POST['atbs_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['atbs_nonce'])), 'atbs_settings')) {
            ATBS_FlashMessages::atbs_queue_flash_message(__('Nonce verification failed.', 'a-testimonial-builder'), 'error');
        }
        // Check if form was submitted
        if (isset($_POST['action'])) {

            // Sanitize and validate the fields
            $fields = isset($_POST['fields']) ? array_map('sanitize_text_field', wp_unslash($_POST['fields'])) : [];
            if (!empty($fields)) {

                $data = static::atbs_api()->post('profile/update', wp_json_encode([
                    'fields' => $fields,
                    'auth_token' => static::atbs_get_user_identity(),
                ]));

                if ($data instanceof WP_Error && $data->has_errors()) {
                    ATBS_FlashMessages::atbs_queue_flash_message($data->get_error_message(), 'error');
                } else if (!empty($data) && isset($data['auth_token']) && $data['auth_token']) {
                    ATBS_FlashMessages::atbs_queue_flash_message(__('Profile successfully updated.', 'a-testimonial-builder'), 'updated');
                } else if ((isset($data['result']) && $data['result'] == false) || isset($data['message'])) {
                    ATBS_FlashMessages::atbs_queue_flash_message($data['message'] ?? __('System error.', 'a-testimonial-builder'), 'error');
                }
            } else {
                ATBS_FlashMessages::atbs_queue_flash_message(__('Empty post data.', 'a-testimonial-builder'), 'error');
            }
        }
        return wp_redirect(admin_url('admin.php?page=a-testimonial-builder-profile'));
    }
}
