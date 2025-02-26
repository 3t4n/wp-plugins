<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class DCPDUP_Multisite_Duplication {

    public function __construct() {
        if (is_multisite()) {
            add_action('network_admin_menu', array($this, 'add_multisite_menu'));
            add_action('admin_post_duplicate_across_sites', array($this, 'duplicate_post_across_sites'));
        }
    }

    // Add a menu for multisite duplication
    public function add_multisite_menu() {
        add_submenu_page(
            'settings.php',  // Multisite network settings page
            'Multisite Duplication',
            'Multisite Duplication',
            'manage_network',
            'dcp-multisite-duplication',
            array($this, 'render_multisite_page')
        );
    }

    // Render the multisite duplication page
    public function render_multisite_page() {
        ?>
        <div class="wrap">
            <h1>Duplicate Post Across Sites</h1>
            <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                <input type="hidden" name="action" value="duplicate_across_sites">
                <?php wp_nonce_field('DCPDUP_duplicate_across_sites'); ?>
                <table class="form-table">
                    <tr>
                        <th scope="row"><label for="post_id">Post ID to Duplicate</label></th>
                        <td><input type="number" name="post_id" id="post_id" required></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="target_site">Target Site ID</label></th>
                        <td><input type="number" name="target_site" id="target_site" required></td>
                    </tr>
                </table>
                <p class="submit"><input type="submit" class="button button-primary" value="Duplicate"></p>
            </form>
        </div>
        <?php
    }

    // Duplicate a post across different sites
    public function duplicate_post_across_sites() {
        if (!current_user_can('manage_network') || !check_admin_referer('DCPDUP_duplicate_across_sites')) {
            wp_die('Unauthorized request.');
        }

        $post_id = absint($_POST['post_id']);
        $target_site_id = absint($_POST['target_site']);

        if (!$post_id || !$target_site_id) {
            wp_die('Invalid data.');
        }

        switch_to_blog($target_site_id);

        $post = get_post($post_id);
        if (!$post) {
            wp_die('Post not found on source site.');
        }

        $new_post = array(
            'post_title' => $post->post_title . ' (Copy)',
            'post_content' => $post->post_content,
            'post_status' => 'draft',
            'post_type' => $post->post_type,
            'post_author' => get_current_user_id(),
        );

        $new_post_id = wp_insert_post($new_post);

        if (is_wp_error($new_post_id)) {
            wp_die('Failed to duplicate post.');
        }

        // Duplicate taxonomies and meta data
        $this->duplicate_post_taxonomies($post_id, $new_post_id);
        $this->duplicate_post_meta($post_id, $new_post_id);

        restore_current_blog();

        wp_redirect(network_admin_url('settings.php?page=dcp-multisite-duplication'));
        exit;
    }

    // Duplicate taxonomies (for multisite)
    private function duplicate_post_taxonomies($old_post_id, $new_post_id) {
        $taxonomies = get_object_taxonomies(get_post_type($old_post_id));
        foreach ($taxonomies as $taxonomy) {
            $post_terms = wp_get_object_terms($old_post_id, $taxonomy, array('fields' => 'ids'));
            wp_set_object_terms($new_post_id, $post_terms, $taxonomy);
        }
    }

    // Duplicate meta data (for multisite)
    private function duplicate_post_meta($old_post_id, $new_post_id) {
        $post_meta = get_post_meta($old_post_id);
        foreach ($post_meta as $meta_key => $meta_values) {
            foreach ($meta_values as $meta_value) {
                update_post_meta($new_post_id, $meta_key, maybe_unserialize($meta_value));
            }
        }
    }
}

new DCPDUP_Multisite_Duplication();
