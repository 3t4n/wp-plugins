<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class DCPDUP_Post_Duplicate {

    public function __construct() {
        add_filter('post_row_actions', array($this, 'duplicate_post_link'), 10, 2);
        add_action('admin_action_duplicate_post_as_draft', array($this, 'duplicate_post_as_draft'));
    }

    // Add the duplicate link in the post list
    public function duplicate_post_link($actions, $post) {
        if (current_user_can('edit_posts') && $post->post_type != 'revision') {
            $actions['duplicate'] = '<a href="' . esc_url(wp_nonce_url('admin.php?action=duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce')) . '" title="' . esc_attr__('Duplicate this post', 'duplicate-copy-post') . '" rel="permalink">' . esc_html__('Duplicate', 'duplicate-copy-post') . '</a>';
        }
        return $actions;
    }

    // Duplicate post as draft
    public function duplicate_post_as_draft() {
        if (!isset($_GET['post']) || !isset($_GET['duplicate_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_GET['duplicate_nonce'])), basename(__FILE__))) {
            wp_die('No post to duplicate has been supplied!');
        }

        $post_id = absint($_GET['post']);
        $post = get_post($post_id);

        if (isset($post) && $post != null) {
            $new_post = array(
                'post_title'   => $post->post_title . ' (Copy)',
                'post_content' => $post->post_content,
                'post_status'  => 'draft',
                'post_type'    => $post->post_type,
                'post_author'  => get_current_user_id(),
            );

            $new_post_id = wp_insert_post($new_post);

            // Copy taxonomies, meta data, and custom fields
            $this->duplicate_post_taxonomies($post_id, $new_post_id);
            $this->duplicate_post_meta($post_id, $new_post_id);

            // Add the logging hook here
            do_action('DCPDUP_after_post_duplicate', $post_id, $new_post_id);  // This triggers the logging action

            wp_redirect(admin_url('edit.php?post_type=' . $post->post_type));
            exit;
        } else {
            wp_die('Post creation failed, could not find original post.');
        }
    }

    // Duplicate taxonomies (categories, tags)
    private function duplicate_post_taxonomies($old_post_id, $new_post_id) {
        $taxonomies = get_object_taxonomies(get_post_type($old_post_id));

        foreach ($taxonomies as $taxonomy) {
            $post_terms = wp_get_object_terms($old_post_id, $taxonomy, array('fields' => 'ids'));
            wp_set_object_terms($new_post_id, $post_terms, $taxonomy);
        }
    }

    // Duplicate meta data (custom fields, SEO data)
    private function duplicate_post_meta($old_post_id, $new_post_id) {
        $post_meta = get_post_meta($old_post_id);

        foreach ($post_meta as $meta_key => $meta_values) {
            foreach ($meta_values as $meta_value) {
                update_post_meta($new_post_id, $meta_key, maybe_unserialize($meta_value));
            }
        }
    }
}

new DCPDUP_Post_Duplicate();
