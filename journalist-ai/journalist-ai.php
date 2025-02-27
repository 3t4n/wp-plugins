<?php
/**
 * @link              https://tryjournalist.com/
 * @since             1.1.0
 * @package           JournalistAI
 *
 * @wordpress-plugin
 * Plugin Name:     Journalist AI SEO Writer
 * Description:     Journalist AI - AI SEO writer for WordPress.
 * Version:         1.1.0
 * Author:          Journalist AI
 * Author URI:      https://tryjournalist.com/
 * License:         GPL-2.0 or later
 * License URI:     http://www.gnu.org/licenses/gpl-2.0.txt
 */

if (!defined('WPINC')) {
    die;
}

if (!class_exists('JournalistAI')) {
    class JournalistAI
    {
        const REST_VERSION = 1;
        const SECRET_OPTION = 'journalistai_secret';

        public function __construct()
        {
            add_action('rest_api_init', [$this, 'register_rest_route']);

            if (is_admin()) {
                add_filter('plugin_action_links_' . plugin_basename(__FILE__), [$this, 'add_settings_link']);
                add_action('admin_menu', [$this, 'add_plugin_page']);
                add_action('admin_post_journalistai_handle_form', [$this, 'handle_form_submission']);
                register_deactivation_hook(__FILE__, [$this, 'deactivate']);
            }
        }

        public function register_rest_route(): void
        {
            register_rest_route('journalistai/v' . self::REST_VERSION, '/webhook', [
                'methods' => 'POST',
                'callback' => [$this, 'handle_webhook'],
                'permission_callback' => '__return_true',
            ]);
        }

        public function handle_webhook($request): WP_REST_Response
        {
            $event = $request->get_param('event');
            $received_secret = $request->get_header('x-secret');
            $stored_secret = get_option(self::SECRET_OPTION);

            if ($received_secret !== $stored_secret) {
                return new WP_REST_Response('Unauthorized', 401);
            }

            switch ($event) {
                case 'integration_created':
                    return new WP_REST_Response('Integration successful', 200);

                case 'create_post':
                    $title = $request->get_param('payload')['title'];
                    $content = $request->get_param('payload')['content'];
                    $thumbnail = $request->get_param('payload')['thumbnail'] ?? null;
                    $thumbnail_alt = $request->get_param('payload')['thumbnail_alt'] ?? '';
                    $status = $request->get_param('payload')['status'] ?? 'publish';

                    if (empty($title) || empty($content)) {
                        return new WP_REST_Response('Invalid payload: title and content are required', 400);
                    }

                    // Validate status
                    $valid_statuses = ['publish', 'draft', 'pending', 'private'];
                    if (!in_array($status, $valid_statuses)) {
                        $status = 'publish'; // Default to publish if invalid status
                    }

                    $post_id = wp_insert_post(array(
                        'post_title' => sanitize_text_field($title),
                        'post_content' => wp_kses_post($content),
                        'post_status' => $status
                    ));

                    if (is_wp_error($post_id)) {
                        return new WP_REST_Response('Failed to create post: ' . $post_id->get_error_message(), 500);
                    }

                    // Handle thumbnail if provided
                    if (!empty($thumbnail)) {
                        require_once(ABSPATH . 'wp-admin/includes/media.php');
                        require_once(ABSPATH . 'wp-admin/includes/file.php');
                        require_once(ABSPATH . 'wp-admin/includes/image.php');

                        // Download and attach the image
                        $tmp = download_url($thumbnail);
                        if (is_wp_error($tmp)) {
                            // Use proper WordPress logging
                            if (WP_DEBUG) {
                                wp_log_error('JournalistAI: Failed to download image: ' . esc_html($tmp->get_error_message()));
                            }
                        } else {
                            $file_array = array(
                                'name' => basename($thumbnail),
                                'tmp_name' => $tmp
                            );

                            $attachment_id = media_handle_sideload($file_array, $post_id);
                            if (is_wp_error($attachment_id)) {
                                if (WP_DEBUG) {
                                    wp_log_error('JournalistAI: Failed to process image: ' . esc_html($attachment_id->get_error_message()));
                                }
                            } else {
                                set_post_thumbnail($post_id, $attachment_id);
                                
                                // Set alt text if provided
                                if (!empty($thumbnail_alt)) {
                                    update_post_meta($attachment_id, '_wp_attachment_image_alt', sanitize_text_field($thumbnail_alt));
                                }
                            }
                            
                            // Clean up temp file using WordPress function
                            wp_delete_file($tmp);
                        }
                    }

                    $post_url = get_permalink($post_id);
                    return new WP_REST_Response(array(
                        'message' => 'Post created successfully',
                        'post_id' => $post_id,
                        'url' => $post_url
                    ), 200);

                default:
                    return new WP_REST_Response('Event not recognized', 400);
            }
        }

        public function deactivate(): void
        {
            delete_option(self::SECRET_OPTION);
        }

        public function handle_form_submission(): void
        {
            check_admin_referer('journalistai_settings_action', 'journalistai_settings_nonce');

            $secret = wp_generate_password(32, false);
            update_option(self::SECRET_OPTION, $secret);

            $webhook_url = esc_url_raw(rest_url('journalistai/v' . self::REST_VERSION . '/webhook'));
            $redirect_url = add_query_arg(
                array(
                    'webhook_url' => urlencode($webhook_url),
                    'secret' => urlencode($secret)
                ),
                'https://api.tryjournalist.com/wp-plugin/authorize'
            );

            wp_redirect($redirect_url);
        }

        public function add_settings_link($links): array
        {
            $settings_link = '<a href="' . esc_url(admin_url('options-general.php?page=journalist-ai-setting-admin')) . '">Settings</a>';
            array_unshift($links, $settings_link);
            return $links;
        }

        public function add_plugin_page(): void
        {
            add_options_page(
                'Journalist AI Settings',
                'Journalist AI',
                'manage_options',
                'journalist-ai-setting-admin',
                [$this, 'create_admin_page']
            );
        }

        public function create_admin_page(): void
        {
            $template_path = plugin_dir_path(__FILE__) . 'admin-settings.php';
            if (file_exists($template_path)) {
                include $template_path;
            }
        }
    }

    new JournalistAI();
}