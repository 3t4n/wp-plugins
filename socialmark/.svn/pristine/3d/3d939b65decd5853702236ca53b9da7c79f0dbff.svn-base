<?php
defined('ABSPATH') || exit();
smark_fs()->add_action('after_uninstall', 'socialmark_uninstall');
function socialmark_uninstall()
{
    $delete_socialmark_data = get_option('delete_socialmark_data');
    if ($delete_socialmark_data === "on") {
        global $wpdb;
        $postmeta_table = $wpdb->prefix . 'postmeta';
        $wpdb->delete($postmeta_table, array('meta_key' => 'socialmark_post_disable'));
        $wpdb->delete($postmeta_table, array('meta_key' => 'socialmark_post_position'));
        $wpdb->delete($postmeta_table, array('meta_key' => 'socialmark_post_overlay'));
        $wpdb->delete($postmeta_table, array('meta_key' => 'socialmark_post_image'));
        $wpdb->delete($postmeta_table, array('meta_key' => 'socialmark_og_image_url'));
        delete_option('default_socialmark_overlay');
        delete_option('default_socialmark_position');
        delete_option('disable_socialmark');
        delete_option('disable_socialmark_posts');
        delete_option('disable_socialmark_pages');
        delete_option('delete_socialmark_data');
        delete_option('socialmark_db_version');
        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}sm_images");
        global $wp_filesystem;
        if (file_exists(SOCIALMARK_UPLOAD)) {
            $wp_filesystem->delete(SOCIALMARK_UPLOAD, true);
        }
    }
}