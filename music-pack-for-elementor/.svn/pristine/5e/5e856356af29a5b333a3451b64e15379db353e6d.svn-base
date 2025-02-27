<?php

class MPACK_Duplicate_Post {
    private static $instance = null;

    private function __construct() {
        add_filter('post_row_actions', [$this, 'add_duplicate_link'], 10, 2);
        add_action('admin_action_mpack_duplicate_post_as_draft', [$this, 'duplicate_post_as_draft']);
    }

    public static function get_instance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function add_duplicate_link($actions, $post) {
        if (!current_user_can('edit_posts') || $post->post_type !== "js_events") {
            return $actions;
        }

        $actions['duplicate'] = sprintf(
            '<a href="admin.php?action=mpack_duplicate_post_as_draft&amp;post=%d&amp;nonce=%s" title="%s" rel="permalink">%s</a>',
            $post->ID,
            wp_create_nonce('mpack-duplicate-post-' . $post->ID),
            esc_attr__('Duplicate event as draft', 'music-pack'),
            esc_html__('Duplicate Event', 'music-pack')
        );

        return $actions;
    }

    public function duplicate_post_as_draft() {
        if (!isset($_REQUEST['post']) || !isset($_REQUEST['nonce'])) {
            wp_die(__('No post to duplicate has been supplied!', 'music-pack'));
        }

        $post_id = intval($_REQUEST['post']);
        $nonce = sanitize_text_field($_REQUEST['nonce']);

        if (!wp_verify_nonce($nonce, 'mpack-duplicate-post-' . $post_id) || !current_user_can('edit_posts')) {
            wp_die(__('Security check failed, please try again.', 'music-pack'));
        }

        global $wpdb;
        $post = get_post($post_id);

        if (!$post) {
            wp_die(__('Could not find original post.', 'music-pack'));
        }

        $current_user = wp_get_current_user();
        $args = [
            'comment_status' => $post->comment_status,
            'ping_status' => $post->ping_status,
            'post_author' => $current_user->ID,
            'post_content' => $post->post_content,
            'post_excerpt' => $post->post_excerpt,
            'post_parent' => $post->post_parent,
            'post_password' => $post->post_password,
            'post_status' => 'draft',
            'post_title' => $post->post_title . ' (Duplicate)',
            'post_type' => $post->post_type,
            'to_ping' => $post->to_ping,
            'menu_order' => $post->menu_order,
        ];

        $new_post_id = wp_insert_post($args);

        if ($new_post_id) {
            $taxonomies = get_object_taxonomies($post->post_type);
            foreach ($taxonomies as $taxonomy) {
                $post_terms = wp_get_object_terms($post_id, $taxonomy, ['fields' => 'slugs']);
                wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
            }

            // metadata
            $post_meta_infos = get_post_meta($post_id);
            if ($post_meta_infos) {
                foreach ($post_meta_infos as $meta_key => $meta_values) {
                    foreach ($meta_values as $meta_value) {
                        $safe_meta_value = maybe_unserialize($meta_value);
                        
                        // elementor
                        if ($meta_key === '_elementor_data') {
                            $decoded_data = json_decode($meta_value, true);
                            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded_data)) {
                                update_post_meta($new_post_id, '_elementor_data', wp_slash(json_encode($decoded_data)));
                            } else {
                                update_post_meta($new_post_id, '_elementor_data', json_encode([]));
                            }
                        } elseif ($meta_key === '_elementor_edit_mode' || $meta_key === '_elementor_template_type') {
                            delete_post_meta($new_post_id, $meta_key);
                        } elseif (!empty($safe_meta_value)) {
                            update_post_meta($new_post_id, $meta_key, $safe_meta_value);
                        }
                    }
                }
            }

            // redirect to posts
            $redirect_url = admin_url('edit.php' . ($post->post_type !== 'post' ? '?post_type=' . $post->post_type : ''));
            wp_redirect($redirect_url);
            exit;
        }
    }

}

MPACK_Duplicate_Post::get_instance();
