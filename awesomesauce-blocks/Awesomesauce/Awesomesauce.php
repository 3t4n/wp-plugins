<?php

namespace Awesomesauce;

use Awesomesauce\Frontend\Frontend;
use Awesomesauce\Sanitization;

if (!defined('ABSPATH')) {
    exit;
}

class Awesomesauce {

    static $inner_plugin_dir;
    static $plugin_extra_dir;
    static $plugin_url;
    static $plugin_extra_url;
    static $base_url;
    static $uploads_folder_path;
    static $uploads_folder_url;
    static $version = '1.0.0';
    static $is_admin = false;
    private $capability = '';

    public function awesomesauce_blocks() {
        // required function for menuitem
    }

    public function __construct() {
        self::$base_url         = trim(get_site_url(), '/\\');
        self::$plugin_url       = AWESOMESAUCE_BLOCKS_PLUGIN_URL;
        self::$plugin_extra_url = str_replace('awesomesauce-blocks', 'awesomesauce-blocks-extra', AWESOMESAUCE_BLOCKS_PLUGIN_URL);
        self::$inner_plugin_dir = str_replace('\\', '/', AWESOMESAUCE_BLOCKS_PLUGIN_DIR);
        self::$plugin_extra_dir = str_replace('awesomesauce-blocks', 'awesomesauce-blocks-extra', self::$inner_plugin_dir);
        self::$inner_plugin_dir .= '/Awesomesauce';

        $uploads_folder            = wp_upload_dir();
        self::$uploads_folder_path = str_replace('\\', '/', $uploads_folder['basedir']);
        self::$uploads_folder_url  = $uploads_folder['baseurl'];

        require_once(self::$inner_plugin_dir . '/Functions.php');

        add_action('init', array(
            $this,
            'register_post_type'
        ));

        add_filter('post_updated_messages', array(
            $this,
            'post_updated_messages'
        ));

        add_action('plugins_loaded', array(
            $this,
            'init'
        ));
    }

    public function init() {
        if (is_admin()) {
            $user = wp_get_current_user();
            if (in_array('administrator', $user->roles) || !empty(array_intersect($user->roles, Functions::get_option('allowed_user_roles', array())))) {
                foreach (get_role($user->roles[0])->capabilities as $capability => $allowed) {
                    if ($allowed && current_user_can($capability)) {
                        $this->capability = $capability;
                        break;
                    }
                }

                self::$is_admin = true;
            }
        }

        if (self::$is_admin) {
            //This initiates a code, not processes it, so we don't need nonce verification
            if (isset($_GET['page']) && Functions::string_contains(sanitize_key(wp_unslash($_GET['page'])), 'awesomesauce')) { //phpcs:ignore WordPress.Security.NonceVerification.Recommended
                $this->call_in_admin_files();
            }

            add_action('admin_menu', array(
                $this,
                'admin_menu'
            ));

            add_filter('post_row_actions', array(
                $this,
                'modify_list_row_actions'
            ), 10, 2);

            //rating callback
            add_action('wp_ajax_nopriv_awesomesauce_rating', array(
                $this,
                'rating_callback'
            ));

            add_action('wp_ajax_awesomesauce_rating', array(
                $this,
                'rating_callback'
            ));

            //This initiates a code, not processes it, so we don't need nonce verification
            if ((!empty($_GET['post_type']) && $_GET['post_type'] == 'awesomesauce_blocks')) { //phpcs:ignore WordPress.Security.NonceVerification.Recommended
                if (isset($_GET['duplicate']) && isset($_GET['awesomesauce_duplicate_nonce']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_GET['awesomesauce_duplicate_nonce'])), 'awesomesauce_duplicate_nonce')) {
                    $block_id = intval($_GET['duplicate']);
                    if ($block_id > 0) {
                        add_action('admin_init', function () use ($block_id) {
                            $new_block_id = $this->duplicate_block($block_id);
                            exit(esc_url(wp_redirect(admin_url('post.php?action=edit&post=' . $new_block_id))));
                        });
                    }
                }

                //This initiates a code, not processes it, so we don't need nonce verification
                if (empty($_GET['category']) || empty($_GET['type'])) { //phpcs:ignore WordPress.Security.NonceVerification.Recommended
                    //redirect from All blocks -> Add new
                    add_action('admin_init', function () {
                        global $pagenow;
                        if ($pagenow == 'post-new.php') {
                            exit(esc_url(wp_redirect(admin_url('admin.php?page=awesomesauce_add_new'))));
                        }
                    });
                } else {
                    add_action('admin_enqueue_scripts', function () {
                        wp_register_script('awesomesauce_admin_script', '', false, self::$version, true);

                        wp_add_inline_script('awesomesauce_admin_script', "
                            document.addEventListener('DOMContentLoaded', function () {
                                var link = document.querySelector('a[href=\"admin.php?page=awesomesauce_add_new\"]');
                                if (link) {
                                    link.parentElement.classList.add('current');
                                }
                    
                                const titleField = document.getElementById('title');
                                if (titleField) {" . //This initiates a code, not processes it, so we don't need nonce verification
                            "titleField.value = '" . (empty($_GET['type']) ? '' : esc_js(sanitize_text_field(wp_unslash($_GET['type'])))) //phpcs:ignore WordPress.Security.NonceVerification.Recommended
                            . "';}
                            });
                        ");

                        wp_enqueue_script('awesomesauce_admin_script');
                    });

                }
            }
        } else if (!isset($_GET['fl_builder']) && !isset($_GET['et_fb']) && !isset($_GET['fb-edit']) && !isset($_GET['vc_editable']) && !isset($_GET['vcv-editable'])) {
            // Skip page builders. Elementor and Brizy won't reach this statement.
            // Beaver Builder = fl_builder
            // Divi = et_fb
            // Avada Builder = fb-edit
            // WP Bakery Page Builder = vc_editable
            // Visual Composer = vcv-editable

            Functions::call_in_file('Frontend/Frontend.php');
            new Frontend();
        }
    }

    private function duplicate_block($block_id) {
        $original_block = get_post($block_id);

        $new_block_id = wp_insert_post(array(
            'post_title'  => $original_block->post_title . ' copy',
            'post_name'   => $original_block->post_name . ' copy',
            'post_type'   => 'awesomesauce_blocks',
            'post_status' => 'publish'
        ));

        $post_meta = get_post_custom($block_id);
        foreach ($post_meta as $key => $values) {
            foreach ($values as $value) {
                add_post_meta($new_block_id, $key, maybe_unserialize($value));
            }
        }

        return $new_block_id;
    }

    public function register_post_type() {
        register_post_type('awesomesauce_blocks', array(
            'public'               => 0,
            'show_ui'              => 1,
            'label'                => 'All Blocks',
            'labels'               => array(
                'name'               => 'Blocks',
                'singular_name'      => 'Block',
                'menu_name'          => 'All Blocks',
                'name_admin_bar'     => 'Block',
                'add_new'            => 'Add New Block',
                'add_new_item'       => 'Add New Block',
                'edit_item'          => 'Edit Block',
                'new_item'           => 'New Block',
                'view_item'          => 'View Block',
                'search_items'       => 'Search Blocks',
                'not_found'          => 'No blocks found',
                'not_found_in_trash' => 'No blocks found in Trash',
                'all_items'          => 'All Blocks',
            ),
            'show_in_menu'         => 'awesomesauce_blocks',
            'register_meta_box_cb' => array(
                $this,
                'awesomesauce_meta_fields'
            ),
            'map_meta_cap '        => true,
            'capability_type'      => array(
                'awesomesauce_block',
                'awesomesauce_blocks'
            ),
            'capabilities'         => array(
                'edit_post'              => 'edit_awesomesauce_block',
                'read_post'              => 'read_awesomesauce_block',
                'delete_post'            => 'delete_awesomesauce_block',
                'edit_posts'             => 'edit_awesomesauce_blocks',
                'edit_others_posts'      => 'edit_others_awesomesauce_blocks',
                'delete_posts'           => 'delete_awesomesauce_blocks',
                'publish_posts'          => 'publish_awesomesauce_blocks',
                'read_private_posts'     => 'read_private_awesomesauce_blocks',
                'delete_private_posts'   => 'delete_private_awesomesauce_blocks',
                'delete_published_posts' => 'delete_published_awesomesauce_blocks',
                'delete_others_posts'    => 'delete_others_awesomesauce_blocks',
                'edit_private_posts'     => 'edit_private_awesomesauce_blocks',
                'edit_published_posts'   => 'edit_published_awesomesauce_blocks',
                'create_posts'           => 'create_awesomesauce_blocks'
            )
        ));

        remove_post_type_support('awesomesauce_blocks', 'editor');

        /* saving */
        add_action('save_post', function ($post_id) {
            if (get_post_type($post_id) !== 'awesomesauce_blocks' || !self::$is_admin) {
                return;
            }

            if (!isset($_POST['awesomesauce_block_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['awesomesauce_block_nonce'])), 'awesomesauce_save_block_settings')) {
                return;
            }

            if (isset($_POST['awesomesauce_action'])) {
                wp_cache_delete('awesomesauce_action_results');

                if (!empty($_POST['awesomesauce_action'])) {
                    $value = sanitize_text_field(wp_unslash($_POST['awesomesauce_action']));
                    if (!add_post_meta($post_id, 'awesomesauce_action', $value, true)) {
                        update_post_meta($post_id, 'awesomesauce_action', $value);
                    }
                } else {
                    delete_post_meta($post_id, 'awesomesauce_action');
                }
            }

            if (isset($_POST['awesomesauce_all_settings'])) {
                $post_data = array();

                if (isset($_POST['awesomesauce_category'])) {
                    $post_data['awesomesauce_category'] = sanitize_text_field(wp_unslash($_POST['awesomesauce_category']));
                } else {
                    $post_data['awesomesauce_category'] = 'Missing category!';
                }

                if (isset($_POST['awesomesauce_type'])) {
                    $post_data['awesomesauce_type'] = sanitize_text_field(wp_unslash($_POST['awesomesauce_type']));
                } else {
                    $post_data['awesomesauce_category'] = 'Missing type!';
                }

                $settings = json_decode(sanitize_text_field(wp_unslash($_POST['awesomesauce_all_settings'])));

                foreach ($settings as $setting) {
                    if (isset($_POST[$setting]) && Functions::string_contains($setting, 'awesomesauce')) {
                        $post_data[sanitize_key($setting)] = wp_kses(wp_unslash($_POST[$setting]), Sanitization::allowed_html(true));
                    }
                }

                if (!empty($post_data)) {
                    if (!add_post_meta($post_id, 'awesomesauce_block_data', addslashes(wp_json_encode($post_data)), true)) {
                        update_post_meta($post_id, 'awesomesauce_block_data', addslashes(wp_json_encode($post_data)));
                    }
                }
            }
        });
    }

    public function post_updated_messages($messages) {
        global $post;

        $custom_post_type = 'awesomesauce_blocks';

        $messages[$custom_post_type] = array(
            1  => 'Block updated successfully.',
            6  => 'Block published.',
            7  => 'Block saved.',
            8  => 'Block submitted.',
            9  => sprintf('Block scheduled for: <strong>%1$s</strong>.', date_i18n(__('M j, Y @ G:i', 'awesomesauce-blocks'), strtotime($post->post_date))),
            10 => 'Block draft updated.'
        );

        return $messages;
    }

    private function call_in_admin_files() {
        $breakpoints = array(
            'tablet' => Functions::get_option('tablet_breakpoint', '1200'),
            'mobile' => Functions::get_option('mobile_breakpoint', '600'),
        );

        add_action('admin_enqueue_scripts', function () use ($breakpoints) {

            //call in WP media manager
            wp_enqueue_media();

            //call in admin CSS
            wp_enqueue_style('awesomesauce_admin_css', self::$plugin_url . '/Awesomesauce/Admin/Pages/admin.css', array(), self::$version);

            wp_register_style('awesomesauce_admin_inline_css', '', false, self::$version);
            wp_enqueue_style('awesomesauce_admin_inline_css');
            wp_add_inline_style('awesomesauce_admin_inline_css', '
            #awesomesauce_preview.desktop {
                min-width: min(100%, ' . intval($breakpoints['tablet']) . 'px);
            }
            
            #awesomesauce_preview.tablet {
                max-width: min(100%, ' . intval($breakpoints['tablet']) . 'px);
                min-width: min(100%, ' . intval($breakpoints['mobile']) . 'px);
            }
            
            #awesomesauce_preview.mobile {
                max-width: min(100%, ' . intval($breakpoints['mobile']) . 'px);
                min-width: min(100%, 350px);
            }');

            switch (Functions::get_option('block_settings_position', 0, true)) {
                case 1:
                    wp_register_style('awesomesauce_admin_block_settings_position_inline_css', '', false, self::$version);
                    wp_enqueue_style('awesomesauce_admin_block_settings_position_inline_css');
                    wp_add_inline_style('awesomesauce_admin_block_settings_position_inline_css', '
                    #advanced-sortables{
                        display: grid;
                        grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
                        gap: 20px;
                    }
                    #advanced-sortables .closed{
                        height: fit-content;
                    }');
                    break;

                case 2:
                    wp_register_script('awesomesauce_admin_block_settings_position_inline_js', '', false, self::$version, true);
                    wp_enqueue_script('awesomesauce_admin_block_settings_position_inline_js');
                    wp_add_inline_script('awesomesauce_admin_block_settings_position_inline_js', '
                    document.addEventListener("DOMContentLoaded", function () {
                        var blockSettings = document.getElementById("awesomesauce_block_settings");
                        var sideSortables = document.getElementById("side-sortables");
    
                        if (blockSettings && sideSortables) {
                            sideSortables.prepend(blockSettings);
                        }
                    });');
                    break;

                default:
                    break;
            }

            wp_enqueue_style('awesomesauce_admin_frontend_css', self::$plugin_url . '/Awesomesauce/Frontend/frontend.css', array(), self::$version);

            //call in admin JS
            wp_enqueue_script('awesomesauce_admin_js', self::$plugin_url . '/Awesomesauce/Admin/Pages/admin.js', array('jquery'), self::$version, true);
        });
    }

    /* admin page */
    public function awesomesauce_meta_fields() {
        $this->call_in_admin_files();

        add_meta_box('awesomesauce_preview', 'Preview', array(
            new Functions(get_the_ID()),
            'display_preview'
        ));

        add_meta_box('awesomesauce_block_settings', 'Settings', array(
            new Functions(),
            'display_settings'
        ));

        add_meta_box('awesomesauce_logo', 'Logo', array(
            new Functions(),
            'display_logo'
        ), null, 'side');

        if (!Functions::get_option('rated')) {
            add_meta_box('awesomesauce_rating', 'Rate this plugin', array(
                new Functions(),
                'display_rating'
            ), null, 'side');
        }

        add_meta_box('awesomesauce_shortcode', 'Publishing shortcode', array(
            new Functions(),
            'display_shortcode'
        ), null, 'side');

        add_meta_box('awesomesauce_action', 'Publishing action', array(
            new Functions(),
            'display_action'
        ), null, 'side');

        add_meta_box('awesomesauce_documentation', 'Documentation & help', array(
            new Functions(),
            'display_documentation'
        ), null, 'side');

        add_filter('get_user_option_meta-box-order_awesomesauce_blocks', array(
            $this,
            'awesomesauce_meta_order'
        ));
    }

    public function awesomesauce_meta_order($order) {
        if (!empty($order['side'])) {
            $side = array_filter(explode(',', $order['side']), function ($box) {
                return !in_array($box, array(
                    'awesomesauce_preview',
                    'awesomesauce_block_settings'
                ));
            });
        } else {
            $side = array();
        }

        return array(
            'side'     => implode(',', $side),
            'advanced' => 'awesomesauce_preview,awesomesauce_block_settings',
        );
    }


    public function modify_list_row_actions($actions, $post) {
        if ($post->post_type == "awesomesauce_blocks") {

            $url = admin_url('edit.php?post_type=awesomesauce_blocks&duplicate=' . $post->ID . '&awesomesauce_duplicate_nonce=' . wp_create_nonce('awesomesauce_duplicate_nonce'));

            $actions['duplicate'] = sprintf('<a href="' . esc_url($url) . '">Duplicate</a>');
        }

        return $actions;
    }

    public function admin_menu() {
        if (isset($this->capability)) {
            /* https://fontawesome.com/search?q=wand%20sparkles&o=r&m=free
                SVG -> add this to <path> element: fill="#f0f6fc"
                echo base64_encode */

            add_menu_page('Awesomesauce', 'Ѧwesoməsauce', $this->capability, 'awesomesauce_blocks', array(
                $this,
                'awesomesauce_blocks'
            ), 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA1MTIgNTEyIj48IS0tISBGb250IEF3ZXNvbWUgUHJvIDYuNC4wIGJ5IEBmb250YXdlc29tZSAtIGh0dHBzOi8vZm9udGF3ZXNvbWUuY29tIExpY2Vuc2UgLSBodHRwczovL2ZvbnRhd2Vzb21lLmNvbS9saWNlbnNlIChDb21tZXJjaWFsIExpY2Vuc2UpIENvcHlyaWdodCAyMDIzIEZvbnRpY29ucywgSW5jLiAtLT48cGF0aCBkPSJNNDY0IDYuMWM5LjUtOC41IDI0LTguMSAzMyAuOWw4IDhjOSA5IDkuNCAyMy41IC45IDMzbC04NS44IDk1LjljLTIuNiAyLjktNC4xIDYuNy00LjEgMTAuN1YxNzZjMCA4LjgtNy4yIDE2LTE2IDE2SDM4NC4yYy00LjYgMC04LjkgMS45LTExLjkgNS4zTDEwMC43IDUwMC45Qzk0LjMgNTA4IDg1LjMgNTEyIDc1LjggNTEyYy04LjggMC0xNy4zLTMuNS0yMy41LTkuOEw5LjcgNDU5LjdDMy41IDQ1My40IDAgNDQ1IDAgNDM2LjJjMC05LjUgNC0xOC41IDExLjEtMjQuOGwxMTEuNi05OS44YzMuNC0zIDUuMy03LjQgNS4zLTExLjlWMjcyYzAtOC44IDcuMi0xNiAxNi0xNmgzNC42YzMuOSAwIDcuNy0xLjUgMTAuNy00LjFMNDY0IDYuMXpNNDMyIDI4OGMzLjYgMCA2LjcgMi40IDcuNyA1LjhsMTQuOCA1MS43IDUxLjcgMTQuOGMzLjQgMSA1LjggNC4xIDUuOCA3LjdzLTIuNCA2LjctNS44IDcuN2wtNTEuNyAxNC44LTE0LjggNTEuN2MtMSAzLjQtNC4xIDUuOC03LjcgNS44cy02LjctMi40LTcuNy01LjhsLTE0LjgtNTEuNy01MS43LTE0LjhjLTMuNC0xLTUuOC00LjEtNS44LTcuN3MyLjQtNi43IDUuOC03LjdsNTEuNy0xNC44IDE0LjgtNTEuN2MxLTMuNCA0LjEtNS44IDcuNy01Ljh6TTg3LjcgNjkuOGwxNC44IDUxLjcgNTEuNyAxNC44YzMuNCAxIDUuOCA0LjEgNS44IDcuN3MtMi40IDYuNy01LjggNy43bC01MS43IDE0LjhMODcuNyAyMTguMmMtMSAzLjQtNC4xIDUuOC03LjcgNS44cy02LjctMi40LTcuNy01LjhMNTcuNSAxNjYuNSA1LjggMTUxLjdjLTMuNC0xLTUuOC00LjEtNS44LTcuN3MyLjQtNi43IDUuOC03LjdsNTEuNy0xNC44TDcyLjMgNjkuOGMxLTMuNCA0LjEtNS44IDcuNy01LjhzNi43IDIuNCA3LjcgNS44ek0yMDggMGMzLjcgMCA2LjkgMi41IDcuOCA2LjFsNi44IDI3LjMgMjcuMyA2LjhjMy42IC45IDYuMSA0LjEgNi4xIDcuOHMtMi41IDYuOS02LjEgNy44bC0yNy4zIDYuOC02LjggMjcuM2MtLjkgMy42LTQuMSA2LjEtNy44IDYuMXMtNi45LTIuNS03LjgtNi4xbC02LjgtMjcuMy0yNy4zLTYuOGMtMy42LS45LTYuMS00LjEtNi4xLTcuOHMyLjUtNi45IDYuMS03LjhsMjcuMy02LjggNi44LTI3LjNjLjktMy42IDQuMS02LjEgNy44LTYuMXoiIGZpbGw9IiNhN2FhYWQiLz48L3N2Zz4=');

            add_submenu_page('awesomesauce_blocks', 'Add New', 'Add New', $this->capability, 'awesomesauce_add_new', array(
                $this,
                'add_new_page'
            ));

            add_submenu_page('awesomesauce_blocks', 'Global Settings', 'Global Settings', $this->capability, 'awesomesauce_global_settings', array(
                $this,
                'global_settings_page'
            ));

            add_submenu_page('awesomesauce_blocks', 'Install Category', 'Install Category', $this->capability, 'awesomesauce_install_category', array(
                $this,
                'install_category_page'
            ));
        }
    }

    public function add_new_page() {
        $this->call_in_admin_page('AddNew.php');
    }

    public function global_settings_page() {
        $this->call_in_admin_page('GlobalSettings.php');
    }

    public function install_category_page() {
        $this->call_in_admin_page('InstallCategory.php');
    }

    private function call_in_admin_page($page) {
        echo '<div id="awesomesauce_admin_page" class="awesomesauce_' . esc_attr(strtolower(str_replace('.php', '', $page))) . '">';
        global $awesomesauce_docs_link;
        $awesomesauce_docs_link = 'http://awesomesauce.great-site.net/docs/awesomesauce-blocks-documentation/configuration/#content';
        Functions::call_in_file('Admin/Pages/' . $page);
        $this->bottom_links($awesomesauce_docs_link);
        echo '</div>';
    }

    public function rating_callback() {
        Functions::save_option('rated', 1);
    }

    private function bottom_links($docs_link) {
        echo '<h2 class="awesomesauce_title awesomesauce_bottom_links" style="order:9999;"><a href="' . esc_url($docs_link) . '" target="_blank">Documentation</a> | <a href="https://wordpress.org/support/plugin/awesomesauce-blocks" target="_blank">Support</a></h2>';
    }
}