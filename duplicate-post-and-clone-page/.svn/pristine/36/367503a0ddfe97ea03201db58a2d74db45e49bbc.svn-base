<?php
/*
 * Plugin Name: Duplicate Post and Clone Page
 * Description: One click duplicate post and page. The best solution for easy copy page and post. It just works!
 * Version: 1.0.0
 * Author: WP Genius
 * Tags: duplicate post, copy posts, copy pages, duplicate posts
 * Requires at least: 5.0
 * Tested up to: 6.5
 * Stable tag: 1.0.0
 * Requires PHP: 7.0
 * License: GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 */


defined('ABSPATH') || exit;
if ( ! function_exists( 'load_sdk_for_duplicate_post_and_clone_page' ) ) {
    /**
     * Load new SDK for WO Developer Plugin.
     *
     * @since    1.0.0
     */
    function load_sdk_for_duplicate_post_and_clone_page() {
        if ( ! function_exists( 'init_hto_skd_v1' ) ) {
            // Location of the SDK
            require_once __DIR__ . '/sdk/sdk-init.php';
        }

        init_hto_sdk_v1(
            array(
                'id'         => 'duplicate-post-and-clone-page',
                'public_key' => 'pk_$2y$12$snxvgYCLZz1gVhExhGkdqOQXRYdk5IDCbJ1iiZHcqgK20QbYEg4OW',
                'server_url' => 'https://app.wpinsightlab.com/api/v1/insight',
                'slug'       => array(
                    /**
                     * These are the slugs where the popup will showup
                     *
                     * @since    1.0.0
                     */
                    'admin.php?page=dpcp',
                    // or user admin.php?page=my-wp-plugin-*
                ),
                'theme'      => 'light', // dark
                'popup'      => array(
                    'title'         => 'Protect Your Peace of Mind...',
                    'description'   => "Be the first to know about <b>critical security</b> updates, feature improvements, and special offers which will save you lots of money.<br><br>Participate in our non-sensitive diagnostic tracking for a smoother experience.",
                    'accept_text'   => 'Allow & Continue >',
                    'skip_text'     => 'Skip',
                    'consent_title' => 'Which permission are being granted?',
                    'consent'       => array(
                        array(
                            'icon'        => 'dashicons-admin-users',
                            'title'       => 'View Basic Profile Info.',
                            'description' => 'Your WordPress user\'s first & last name, and email address.',
                        ),
                        array(
                            'icon'        => 'dashicons-admin-links',
                            'title'       => 'View Basic Website Info.',
                            'description' => 'Homepage Url & Title, WP & PHP versions, and site language.',
                        ),
                        array(
                            'icon'        => 'dashicons-admin-plugins',
                            'title'       => 'View Basic Plugin Info.',
                            'description' => 'Current Plugin & SKD versions, and if active or uninstalled.',
                        ),
                    ),
                ),
                'notice'     => array(
                    'title'       => "Protect Your Peace of Mind...",
                    'description' => "Be the first to know about <b>critical security</b> updates, feature improvements, and special offers which will save you lots of money.<br><br>Participate in our non-sensitive diagnostic tracking for a smoother experience.",
                    'accept_text' => 'Allow',
                    'skip_text'   => 'Skip',
                ),
            )
        );
    }
}
add_action( 'plugins_loaded', 'load_sdk_for_duplicate_post_and_clone_page' );
define('DPCP_PATH', plugin_dir_path(__FILE__));

require_once("functions/functions.php");
require_once(DPCP_PATH . "class.dpcp-settings.php");
require_once(DPCP_PATH . "functions/class.dpcp-notices.php");

class DPCP
{

    function __construct()
    {
        $this->define_constants();
        $dpcp_settings = new DPCP_Settings();
        add_action('admin_menu', array($this, 'add_menu'));
        add_action('admin_enqueue_scripts', array($this, 'register_admin_scripts'), 999);
        add_action('wp_enqueue_scripts', array($this, 'register_scripts'), 999);
        add_filter('post_row_actions', array($this, 'dpcp_duplicate_link'), 10, 2);
        add_filter('page_row_actions', array($this, 'dpcp_duplicate_link'), 10, 2);
        add_action('admin_action_dpcp_duplicate', array($this, 'duplicate'));
        add_action('admin_action_dpcp_hide_tutorial', array($this, 'hide_tutorial'));
        add_action('admin_notices', [new DPCPAdminNotice(), 'display_admin_notice']);
        add_action('admin_bar_menu', array($this, 'dpcp_admin_bar_menu'), 80);
    }

    public function define_constants()
    {
        define('DPCP_URL', plugin_dir_url(__FILE__));
        define('DPCP_VERSION', "1.0.0");
    }

    public static function activate()
    {
        DPCP_set_default_settings();
        add_option("dpcp_activate_redirect", array("redirect" => "1"));
    }

    public static function deactivate()
    {
    }

    public static function uninstall()
    {
        delete_option("dpcp_admin_notice_message");
        delete_option("dpcp_options");
        delete_option("dpcp_activate_redirect");
    }

    public function add_menu()
    {
        add_menu_page("Duplicate Page and Clone Post", "Duplicate Page and Clone Post", "edit_posts", "dpcp", array($this, 'dpcp_settings_page'), dpcp_get_svg_icon("dpcp-icon.svg"));
    }

    public function dpcp_settings_page()
    {
        if (!current_user_can("manage_options")) {
            return;
        }
        wp_enqueue_style("dpcp-admin-style");
        if (isset($_GET['settings-updated'])) {
            add_settings_error("dpcp_options", "dpcp_message", "Settings Saved.", "success");
            settings_errors("dpcp_options");
        }
        include(DPCP_PATH . "views/settings-page.php");
    }

    public function register_admin_scripts()
    {
        wp_register_style('dpcp-admin-style', DPCP_URL . "assets/css/admin.css", array(), DPCP_VERSION, "all");
    }

    public function register_scripts()
    {
        wp_register_style('dpcp-style', DPCP_URL . "assets/css/frontend.css", array(), DPCP_VERSION, "all");
    }

    public function dpcp_duplicate_link($actions, $post)
    {
        if ($post->post_type != "post" && $post->post_type != "page") return $actions;
        if (!current_user_can("edit_post", $post->ID)) return $actions;
        $duplicate_url = admin_url("admin.php");
        $duplicate_url = add_query_arg(
            array('action' => 'dpcp_duplicate', 'post_id' => $post->ID),
            $duplicate_url
        );
        $duplicate_url = wp_nonce_url($duplicate_url, 'dpcp_duplicate');
        $link_array = array(
            "dpcp_duplicate" => "<a href='$duplicate_url'>Duplicate</a>"
        );
        $actions = array_merge($actions, $link_array);
        return $actions;
    }


    public function duplicate()
    {
        if (!current_user_can('edit_posts')) {
            return;
        }
        check_admin_referer('dpcp_duplicate');

        if (!(isset($_GET['post_id']) && $_GET['post_id'] != '')) {
            return;
        }
        $post_id = esc_html(sanitize_text_field($_GET['post_id']));
        $original_post = get_post($post_id);
        $post_arr = array(
            "post_title" => $this->get_post_title($original_post),
            "post_type" => $original_post->post_type,
            "post_content" => $this->get_post_content($original_post),
            "post_excerpt" => $this->get_post_excerpt($original_post),
            "post_date" => $this->get_post_date($original_post),
            "post_status" => $this->get_post_status($original_post),
            "post_author" => $this->get_post_author($original_post),
            "post_password" => $this->get_post_password($original_post),
            "ping_status" => $original_post->ping_status,
            "post_mime_type" => $original_post->post_mime_type,
            "comment_status" => $this->get_allow_comments($original_post),
            "post_parent" => $this->get_post_parent($original_post),
        );
        $duplicate_post_id = wp_insert_post($post_arr, false);
        if ($duplicate_post_id == 0) {
            DPCPAdminNotice::display_error("Duplicate creation failed.");
        } else {
            $duplicate_post = get_post($duplicate_post_id);
            $this->dpcp_duplicate_success_message($duplicate_post);
            $this->duplicate_meta_datas($original_post, $duplicate_post);
            $this->duplicate_categories($original_post, $duplicate_post);
            $this->duplicate_tags($original_post, $duplicate_post);
            $this->duplicate_post_format($original_post, $duplicate_post);
            $this->duplicate_comments($original_post, $duplicate_post);
        }
        $this->redirect_url($original_post);
    }

    public function hide_tutorial()
    {
        $action_name = "dpcp_hide_tutorial";
        $query_name = "hide_tutorial";
        if (!current_user_can('edit_posts')) {
            return;
        }
        check_admin_referer($action_name);

        if (!isset($_GET[$query_name]) || $_GET[$query_name] == '') {
            return;
        }

        $hide_tutorial = esc_html(sanitize_text_field($_GET[$query_name]));
        $options = DPCP_Settings::$options;
        if ($hide_tutorial == "1") {
            $options[$query_name] = "1";
        }
        if ($hide_tutorial == "0") {
            $options[$query_name] = "0";
        }
        update_option("dpcp_options", $options);
        $this->redirect_to_settings_page();
    }

    public function redirect_to_settings_page()
    {
        $redirect_url = admin_url("admin.php");
        $redirect_url = add_query_arg(
            array('page' => 'dpcp'),
            $redirect_url
        );
        wp_redirect($redirect_url);
    }

    private function posts_list_url()
    {
        $url = admin_url('edit.php');
        return $url;
    }

    private function pages_list_url()
    {
        $url = admin_url('edit.php?post_type=page');
        return $url;
    }

    private function redirect_url($original_post)
    {
        $url = "";
        switch ($original_post->post_type) {
            case "post":
                $url = $this->posts_list_url();
                break;
            case "page":
                $url = $this->pages_list_url();
                break;
        }
        if ($url != '') {
            wp_redirect($url);
        }
    }

    public function dpcp_duplicate_success_message($duplicate_post)
    {
        $duplicate_post_id = $duplicate_post->ID;
        $edit_url = get_edit_post_link($duplicate_post_id);
        $message = "Duplicated successfully! You can edit your new copy <a href='$edit_url'>from here.</a>";
        DPCPAdminNotice::display_success($message);
    }

    private function get_post_title(WP_Post $post)
    {
        if (DPCP_Settings::$options['title'] == "0") {
            return $post->post_title;
        } else {
            return "Untitled";
        }
    }

    private function get_post_content(WP_Post $post)
    {
        if (DPCP_Settings::$options['content'] == "0") {
            return $post->post_content;
        } else {
            return "";
        }
    }

    private function get_post_excerpt(WP_Post $post)
    {
        if (DPCP_Settings::$options['excerpt'] == "0") {
            return $post->post_excerpt;
        } else {
            return "";
        }
    }

    private function duplicate_meta_datas($original_post, $duplicate_post)
    {
        $original_post_metas = get_post_meta($original_post->ID);
        foreach ($original_post_metas as $original_key => $original_post_meta) {
            if ($original_key == "_thumbnail_id" && DPCP_Settings::$options["featured_image"] == "1") {
                continue;
            }
            if ($original_key == "_wp_page_template" && DPCP_Settings::$options["template"] == "1") {
                continue;
            }
            if (count($original_post_meta) > 1) {
                update_post_meta($duplicate_post->ID, $original_key, $original_post_meta);
            } else {
                if (is_array($original_post_meta)) {
                    update_post_meta($duplicate_post->ID, $original_key, $original_post_meta[0]);
                } else {
                    update_post_meta($duplicate_post->ID, $original_key, $original_post_meta);
                }
            }
        }
    }


    private function get_post_date(WP_Post $post)
    {
        if (DPCP_Settings::$options['create_date'] == "0") {
            return $post->post_date;
        } else {
            return '';
        }
    }

    private function get_post_status(WP_Post $post)
    {
        if (DPCP_Settings::$options['status'] == "0") {
            return get_post_status($post->ID);
        } else {
            return 'draft';
        }
    }

    private function get_post_author(WP_Post $post)
    {
        $current_user = wp_get_current_user();
        if (DPCP_Settings::$options['author'] == "0") {
            return $post->post_author;
        } else {
            return $current_user->ID;
        }
    }

    private function get_post_password(WP_Post $post)
    {
        if (DPCP_Settings::$options['password'] == "0") {
            return $post->post_password;
        } else {
            return "";
        }
    }

    private function get_allow_comments(WP_Post $post)
    {
        if (DPCP_Settings::$options['allow_comments'] == "0") {
            return $post->comment_status;
        } else {
            return "";
        }
    }

    private function get_post_parent(WP_Post $post)
    {
        if (DPCP_Settings::$options['parent'] == "0") {
            return $post->post_parent;
        } else {
            return "";
        }
    }

    private function duplicate_categories($original_post, $duplicate_post)
    {
        if (DPCP_Settings::$options['categories'] == "1") {
            return;
        }
        $original_categories = wp_get_post_categories($original_post->ID);
        wp_set_post_categories($duplicate_post->ID, $original_categories);
    }

    private function duplicate_tags($original_post, $duplicate_post)
    {
        if (DPCP_Settings::$options['tags'] == "1") {
            return;
        }
        $original_tags_terms = wp_get_post_tags($original_post->ID);
        $original_tags = array();
        foreach ($original_tags_terms as $original_tags_term) {
            array_push($original_tags, $original_tags_term->name);
        }
        wp_set_post_tags($duplicate_post->ID, $original_tags);
    }

    private function duplicate_post_format($original_post, $duplicate_post)
    {
        $original_post_format = get_post_format($original_post);
        if ($original_post_format) {
            set_post_format($duplicate_post, $original_post_format);
        }
    }

    private function duplicate_comments($original_post, $duplicate_post)
    {
        if (DPCP_Settings::$options['comments'] == "1") {
            return;
        }
        //get original post comments
        $comments = get_comments(array(
            'post_id' => $original_post->ID,
            'order' => 'ASC',
            'orderby' => 'comment_date_gmt'
        ));
        // reserve all old ids in keys and value new id
        $old_id_to_new_id = array();
        foreach ($comments as $comment) {
            $commentdata = array(
                'comment_post_ID' => $duplicate_post->ID,
                'comment_author' => $comment->comment_author,
                'comment_author_email' => $comment->comment_author_email,
                'comment_author_url' => $comment->comment_author_url,
                'comment_content' => $comment->comment_content,
                'comment_type' => '',
                'comment_parent' => isset($old_id_to_new_id[$comment->comment_parent]) ? $old_id_to_new_id[$comment->comment_parent] : 0,
                'user_id' => $comment->user_id,
                'comment_author_IP' => $comment->comment_author_IP,
                'comment_agent' => $comment->comment_agent,
                'comment_karma' => $comment->comment_karma,
                'comment_approved' => $comment->comment_approved,
                'comment_date' => $comment->comment_date,
                'comment_date_gmt' => get_gmt_from_date($comment->comment_date),
            );
            $new_comment_id = wp_insert_comment($commentdata);
            $old_id_to_new_id[$comment->comment_ID] = $new_comment_id;
        }
    }

    public function dpcp_admin_bar_menu($admin_bar)
    {
        global $post;
        if (!is_single() && !is_page()) return;
        if ($post->post_type != "post" && $post->post_type != "page") return;
        if (!current_user_can("edit_post", $post->ID)) return;
        $duplicate_url = admin_url("admin.php");
        $duplicate_url = add_query_arg(
            array('action' => 'dpcp_duplicate', 'post_id' => $post->ID),
            $duplicate_url
        );
        $duplicate_url = wp_nonce_url($duplicate_url, 'dpcp_duplicate');
        wp_enqueue_style("dpcp-style");
        $icon = '<span class="dpcp-admin-bar-icon"></span>';
        $admin_bar->add_menu(array(
            'id' => 'dpcp_duplicate_admin_bar',
            'parent' => null,
            'group' => null,
            'title' => $icon . "Duplicate",
            'href' => $duplicate_url,
            //            'meta' => array('class' => 'cdp-admin-bar-copy', 'target' => '_self')
        ));
    }
}

register_activation_hook(__FILE__, array('DPCP', 'activate'));
register_deactivation_hook(__FILE__, array('DPCP', 'deactivate'));
register_uninstall_hook(__FILE__, array('DPCP', 'uninstall'));
$dpcp = new DPCP();
