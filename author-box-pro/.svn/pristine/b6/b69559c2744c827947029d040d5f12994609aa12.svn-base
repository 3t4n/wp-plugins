<?php

/**
 * class.MelibuMetaBox.php 
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        https://www.tnado.com/author/prod3v3loper/
 * @package     Melabu
 * @subpackage  Author Box Pro
 * @since       1.0
 */

if (!class_exists('MB_AUTHOR_BOX_META_BOXS')) {

    class MB_AUTHOR_BOX_META_BOXS {

        /**
         * Constructor.
         */
        public function __construct() {

            if (is_admin()) {
                add_action('load-post.php', array($this, 'init_metabox'));
                add_action('load-post-new.php', array($this, 'init_metabox'));
                // WP author meta box to publish field
                add_action('admin_menu', array($this, 'remove_post_author_meta_box'));
                add_action('post_submitbox_misc_actions', array($this, 'author_in_publish'));
            }
        }

        /**
         * Meta box initialization.
         */
        public function init_metabox() {

            add_action('save_post', array($this, 'save_metabox'), 10, 2);
        }

        /**
         * Handles saving the meta box.
         *
         * @param int     $post_id Post ID.
         * @param WP_Post $post    Post object.
         * @return null
         */
        public function save_metabox($post_id, $post) {

            /*
             * We need to verify this came from the our screen and with proper authorization,
             * because save_post can be triggered at other times.
             */

            // Check if our nonce is set.
            if (!isset($_POST['mb-author-box-pro-meta-activate-nonce-action'])) {
                return $post_id;
            }

            $nonce = $_POST['mb-author-box-pro-meta-activate-nonce-action'];

            // Verify that the nonce is valid.
            if (!wp_verify_nonce($nonce, 'mb-author-box-pro-meta-activate-nonce')) {
                return $post_id;
            }

            /*
             * If this is an autosave, our form has not been submitted,
             * so we don't want to do anything.
             */
            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
                return $post_id;
            }

            // Check the user's permissions.
            if ('page' == $_POST['post_type']) {
                if (!current_user_can('edit_page', $post_id)) {
                    return $post_id;
                }
            } else {
                if (!current_user_can('edit_post', $post_id)) {
                    return $post_id;
                }
            }

            /* OK, it's safe for us to save the data now. */

            if (!isset($_POST['mb-author-box-pro-meta-activate'])) {
                $mydata = '';
            } else {
                // Sanitize the user input.
                $mydata = sanitize_text_field($_POST['mb-author-box-pro-meta-activate']);
            }

            // Update the meta field.
            update_post_meta($post_id, 'mb-author-box-pro-meta-activate', $mydata);
        }

        /**
         * 
         */
        public function remove_post_author_meta_box() {
            
            global $MB_AUTHOR_BOX_HELPER;
            $postTypesArray = $MB_AUTHOR_BOX_HELPER->post_types();
            remove_meta_box('authordiv', $postTypesArray, 'normal');
        }

        /**
         * 
         * @global type $post_ID
         */
        public function author_in_publish() {

            global $post_ID;

            // Add an nonce field so we can check for it later.
            wp_nonce_field('mb-author-box-pro-meta-activate-nonce', 'mb-author-box-pro-meta-activate-nonce-action');
            $post = get_post($post_ID);
            echo '<div class="misc-pub-section"><span class="dashicons dashicons-admin-users"></span> ' . __('Select Author', 'author-box-pro') . ':';
            post_author_meta_box($post);
            echo '</div>';
            echo '<div class="misc-pub-section"><img src="' . plugins_url('img/icon-MB-20.png', dirname(__FILE__)) . '" alt="" width="10" height="10"> ';
            // Use get_post_meta to retrieve an existing value from the database.
            $value = get_post_meta($post->ID, 'mb-author-box-pro-meta-activate', true);
            // Display the form, using the current value.
            ?>
            <input type="checkbox" id="mb-author-box-pro-meta-activate" name="mb-author-box-pro-meta-activate" <?php checked(esc_attr($value), 'on'); ?> value="on"> <?php _e('Activate MB Author Box', 'author-box-pro'); ?>
            <?php
            echo '</div>';
        }

    }

    new MB_AUTHOR_BOX_META_BOXS();
}