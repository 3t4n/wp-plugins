<?php
/*
* Plugin Name: sm page duplicator
* Description: This Plugin is use for create functionality to duplicate any page with all custom fields & feature images
* Version:     1.0.0
* Author:      Shail Mehta
* Author URI:  https://profiles.wordpress.org/mehtashail/
* License:     GPLv2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: wordpress.org
*/
if (!class_exists('sm_page_duplicator')) {
    class Sm_page_duplicator
    {
        function sm_page_duplicator_install()
        {
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        }

        function activate()
        {
            flush_rewrite_rules();
        }

        function deactivate()
        {
            flush_rewrite_rules();
        }
    }

    // activation and deactivation
    $sm_page_duplicator = new Sm_page_duplicator();
    register_activation_hook(__FILE__, array($sm_page_duplicator, 'activate'));
    register_deactivation_hook(__FILE__, array($sm_page_duplicator, 'deactivate'));

    function sm_page_duplicator_as_draft()
    {
        global $wpdb;
        if (!(isset($_GET['post']) || isset($_POST['post']) || (isset($_REQUEST['action']) && 'sm_page_duplicator_as_draft' == $_REQUEST['action']))) {
            wp_die('No page to duplicate has been supplied!');
        }

        if (!isset($_GET['duplicate_nonce']) || !wp_verify_nonce($_GET['duplicate_nonce'], basename(__FILE__)))
            return;


        $post_id = (isset($_GET['post']) ? absint($_GET['post']) : absint($_POST['post']));

        $post = get_post($post_id);


        $current_user = wp_get_current_user();
        $new_post_author = $current_user->ID;


        if (isset($post) && $post != null) {

            // New Duplicate Post
            $args = array(
                'comment_status' => $post->comment_status,
                'ping_status' => $post->ping_status,
                'post_author' => $new_post_author,
                'post_content' => $post->post_content,
                'post_excerpt' => $post->post_excerpt,
                'post_name' => $post->post_name,
                'post_parent' => $post->post_parent,
                'post_password' => $post->post_password,
                'post_featured_image' => $post->post_featured_image,
                'post_status' => 'draft',
                'post_title' => $post->post_title,
                'post_type' => $post->post_type,
                'to_ping' => $post->to_ping,
                'menu_order' => $post->menu_order
            );

            //Insert Post
            $new_post_id = wp_insert_post($args);

            //get All Post Current Terms
            $taxonomies = get_object_taxonomies($post->post_type);
            foreach ($taxonomies as $taxonomy) {
                $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
                wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
            }

            // Sql Queries
            $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
            if (count($post_meta_infos) != 0) {
                $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
                foreach ($post_meta_infos as $meta_info) {
                    $meta_key = $meta_info->meta_key;
                    if ($meta_key == '_wp_old_slug') continue;
                    $meta_value = addslashes($meta_info->meta_value);
                    $sql_query_sel[] = "SELECT $new_post_id, '$meta_key', '$meta_value'";
                }
                $sql_query .= implode(" UNION ALL ", $sql_query_sel);
                $wpdb->query($sql_query);
            }

            //Redirect Post to List
            if ($post->post_type != 'post'):$returnpage = '?post_type=' . $post->post_type; endif;
            if (!empty($redirectit) && $redirectit == 'to_list'):wp_redirect(admin_url('edit.php' . $returnpage));
            elseif (!empty($redirectit) && $redirectit == 'to_page'):wp_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
            else:
                wp_redirect(admin_url('edit.php' . $returnpage));
            endif;
            exit;
        } else {
            wp_die('Error! Post creation failed: ' . $post_id);
        }
    }

    add_action('admin_action_sm_page_duplicator_as_draft', 'sm_page_duplicator_as_draft');


    function sm_page_duplicator_link($actions, $post)
    {
        if (current_user_can('edit_posts')) {
            $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=sm_page_duplicator_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce') . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
        }
        return $actions;
    }

    add_filter('page_row_actions', 'sm_page_duplicator_link', 10, 2);
}