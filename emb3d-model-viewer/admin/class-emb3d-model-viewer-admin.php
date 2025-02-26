<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Emb3D_Model_Viewer
 * @subpackage Emb3D_Model_Viewer/admin
 * @author     Netfarm S.r.l. <info@emb3d.com>
 */
class Emb3D_Model_Viewer_Admin
{
    const EMB3D_MENU_ICON = 'data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9IjI0IiB3aWR0aD0iMjQiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTIyLjczNSAxNy4zMjNWNi43MzNMMTcuMzc5LjA0OHYyMy45NnoiIGZpbGw9Im5vbmUiIHN0cm9rZT0iI2ZmZiIgc3Ryb2tlLWxpbmVqb2luPSJiZXZlbCIgc3Ryb2tlLXdpZHRoPSIuNSIvPjxwYXRoIGQ9Ik0uODc1IDguNzI2Yy0uMDExIDAtLjAyMyAwLS4wMzQuMDA4YS4wNjkuMDY5IDAgMCAwLS4wMjMuMDE1LjA2OS4wNjkgMCAwIDAtLjAxNi4wMjMuMTE1LjExNSAwIDAgMC0uMDA3LjAzOHY2LjU0YzAgLjAxIDAgLjAyNi4wMDcuMDM4YS4wNjkuMDY5IDAgMCAwIC4wMTYuMDI2LjA2OS4wNjkgMCAwIDAgLjAyMy4wMTYuMDc3LjA3NyAwIDAgMCAuMDM4IDBsMi45MzYtLjQ0NWEuMDU3LjA1NyAwIDAgMCAuMDIzLS4wMTEuMDY5LjA2OSAwIDAgMCAuMDItLjAyLjExNS4xMTUgMCAwIDAgLjAxMS0uMDI2bC4wMDgtLjAzOC4wMDctLjEuMDItLjIyNi4wMjItLjIzLjAwOC0uMTIydi0uMDM1YS4wNzcuMDc3IDAgMCAwLS4wMTUtLjAyMy4wNS4wNSAwIDAgMC0uMDItLjAxNWgtLjAyMmwtMi4xNDguMjN2LTEuOTY2bDEuOTY0LS4wMzQuMDIzLS4wMDRhLjA2MS4wNjEgMCAwIDAgLjAyMy0uMDE5LjA5Mi4wOTIgMCAwIDAgLjAxMS0uMDI3di0uNzQ3YS4wOTYuMDk2IDAgMCAwLS4wMTEtLjAyNy4wNjEuMDYxIDAgMCAwLS4wMjMtLjAxOS4wNTcuMDU3IDAgMCAwLS4wMjMtLjAwNGwtMS45NjQtLjA1M1Y5LjY5NWwyLjE0NC4yM0gzLjlhLjA1LjA1IDAgMCAwIC4wMTktLjAxNS4wNjkuMDY5IDAgMCAwIC4wMTEtLjAyN2wuMDA0LS4wMy0uMDA4LS4xMjMtLjAyMy0uMjMtLjAxOS0uMjMtLjAwNy0uMWEuMjMuMjMgMCAwIDAtLjAwOC0uMDM4LjEyNi4xMjYgMCAwIDAtLjAxMS0uMDI3LjA2NS4wNjUgMCAwIDAtLjAyLS4wMTkuMDU0LjA1NCAwIDAgMC0uMDIzLS4wMDhsLTIuMTYzLS4zM3ptNC4zODQuNTctLjQyNS4wMTJjLS4wMDggMC0uMDE2IDAtLjAyMy4wMDhhLjA0Ni4wNDYgMCAwIDAtLjAyLjAxMS4wNjkuMDY5IDAgMCAwLS4wMS4wMjN2NS40NGwuMDEuMDI3YS4wMzguMDM4IDAgMCAwIC4wMi4wMTEuMDM4LjAzOCAwIDAgMCAuMDIzIDBsLjUyOC0uMDc2YS4wNS4wNSAwIDAgMCAuMDIzLS4wMTIuMDU0LjA1NCAwIDAgMCAuMDE1LS4wMTkuMTE5LjExOSAwIDAgMCAuMDE2LS4wNTd2LTQuNDE3bC4xLjcwNS44MjIgMy41NzhjMCAuMDA3IDAgLjAxOS4wMDguMDI2bC4wMDguMDIzLjAxMS4wMTIuMDE1LjAwNC40NDgtLjA3LjAxNi0uMDAzYS4wNTcuMDU3IDAgMCAwIC4wMTEtLjAybC4wMDgtLjAyMi4wMDctLjAzLjcwNS0zLjM3Mi4wNzYtLjYwNXYzLjg4OGwuMDEyLjAyYS4wMzguMDM4IDAgMCAwIC4wMTEuMDE0aC4wMmwuMzc5LS4wNTcuMDExLS4wMDRhLjA1NC4wNTQgMCAwIDAgLjAxMi0uMDE5bC4wMTEtLjAyVjkuNzY5YS4wODguMDg4IDAgMCAwLS4wMTEtLjAyM2wtLjAxMi0uMDEyYzAtLjAwNy0uMDA4LS4wMDctLjAxMS0uMDExbC0uMjg4LS4wMzgtLjM3LjAwN2EuMDMuMDMgMCAwIDAtLjAxMi4wMDguMDYxLjA2MSAwIDAgMC0uMDE2LjAxMWMwIC4wMDggMCAuMDE2LS4wMDcuMDIzYS4xMTUuMTE1IDAgMCAwLS4wMDguMDIzbC0uNzIgMy4zNTYtLjA0Ni41MS0uMDQyLS41MDYtLjgtMy42NjYtLjAwOC0uMDM1YS4xNDUuMTQ2IDAgMCAwLS4wMTEtLjAyMy4wNzcuMDc3IDAgMCAwLS4wMTUtLjAxOS4wMjcuMDI3IDAgMCAwLS4wMTItLjAwN3ptMy44MDkuNTc1LS4yOTkuMDItLjAxMS4wMDdhLjAyNy4wMjcgMCAwIDAtLjAxMi4wMTIuMDYxLjA2MSAwIDAgMC0uMDA3LjAxNVYxNC4ybC4wMDcuMDIuMDEyLjAxaC4wMTFsLjY3NC0uMTAzYTEuMDM0IDEuMDM0IDAgMCAwIC40NDQtLjE2LjcuNzAxIDAgMCAwIC4yMzgtLjI4NCAxLjI5IDEuMjkxIDAgMCAwIC4xMDctLjM5IDMuNzkgMy43OTIgMCAwIDAgMC0uNzUyIDEuMzA1IDEuMzA2IDAgMCAwLS4xNDYtLjQyMS45MDQuOTA0IDAgMCAwLS4xMTUtLjE0Ni43NDcuNzQ3IDAgMCAwIC4xLS4xNDEgMS4zMjggMS4zMyAwIDAgMCAuMTE1LS4zOTEgMy43MzMgMy43MzUgMCAwIDAtLjAwOC0uNzI4IDEuMjA2IDEuMjA3IDAgMCAwLS4xLS4zNzIuNjUuNjUxIDAgMCAwLS4yMjUtLjI2NC45NzYuOTc3IDAgMCAwLS40MS0uMTQ1bC0uMzc1LS4wNTh6bTUuMDguMDQ2LS41NjYuMDMtLjM4My4wNzhhLjA5Mi4wOTIgMCAwIDAtLjAyLjAxMS4wNDYuMDQ2IDAgMCAwLS4wMS4wMTJsLS4wMTIuMDE1djMuODc3YzAgLjAwNy4wMDcuMDExLjAxMS4wMTlsLjAxMi4wMTFhLjAzOC4wMzggMCAwIDAgLjAxOS4wMDRsLjk1LjA1YTEuNDM2IDEuNDM3IDAgMCAwIC44MDMtLjE2IDEuMTkgMS4xOTEgMCAwIDAgLjQ2Ny0uNTA3IDIuMjIgMi4yMjIgMCAwIDAgLjIwMy0uNjg1IDQuODI0IDQuODI3IDAgMCAwIC4wNDYtLjcwMWMwLS4yMTktLjAwNy0uNDYtLjA0Ni0uNzAxYTIuMjIgMi4yMjIgMCAwIDAtLjIwMy0uNjg2IDEuMTg3IDEuMTg4IDAgMCAwLS40NjMtLjQ5OCAxLjQzNiAxLjQzNyAwIDAgMC0uODA0LS4xNjl6bS0yLjU1Ny4wOGExLjE5NCAxLjE5NSAwIDAgMC0uNDM3LjEwNCAxLjQ3NCAxLjQ3NSAwIDAgMC0uMTMuMDY1bC0uMDQ2LjAyNy0uMDExLjAxMi0uMDEyLjAxMWEuMDczLjA3MyAwIDAgMC0uMDA3LjAxNWwtLjAwNC4wMTYtLjAwOC4wNjVjMCAuMDM4LS4wMDcuMDkyLS4wMTUuMTQ1IDAgLjA1LS4wMDguMTA4LS4wMTIuMTQ2bC0uMDAzLjA3N3YuMDIzbC4wMDcuMDE1YS4wMzguMDM4IDAgMCAwIC4wMy4wMTVsLjA2Mi0uMDI3YTMuMDQ3IDMuMDUgMCAwIDEgLjM3MS0uMTI2IDEuMDYgMS4wNjEgMCAwIDEgLjIxNS0uMDM0LjgxMi44MTIgMCAwIDEgLjI4LjAzLjMyLjMyIDAgMCAxIC4xNjguMTExLjQuNCAwIDAgMSAuMDguMTczIDEuMDM3IDEuMDM4IDAgMCAxIC4wMi4yMjIuNTI0LjUyNCAwIDAgMS0uMDM5LjIwNy40OTQuNDk0IDAgMCAxLS4xMDcuMTY0LjU4Ni41ODYgMCAwIDEtLjE2OS4xMi44OTIuODkzIDAgMCAxLS4yMzMuMDY4bC0uMzgzLjA2MS0uMDIuMDA0LS4wMS4wMTJhLjA0Mi4wNDIgMCAwIDAtLjAwOC4wMTUuMDY5LjA2OSAwIDAgMC0uMDA0LjAyM3YuMzhsLjAwNC4wMjIuMDA3LjAxNi4wMTIuMDExYS4wMzguMDM4IDAgMCAwIC4wMTUgMGwuMjkxLjAwNGMuMTExIDAgLjIwMy4wMjMuMjg3LjA1NGEuNTc0LjU3NSAwIDAgMSAuMzE4LjMzNy42NzQuNjc0IDAgMCAxIC4wMzguMjMgMS4xNTYgMS4xNTcgMCAwIDEtLjAxOS4yMy40OTguNDk4IDAgMCAxLS4wNzYuMTkxLjM2OC4zNjggMCAwIDEtLjE3My4xMjcuNjk3LjY5NyAwIDAgMS0uMjguMDM4IDMuMjU0IDMuMjU2IDAgMCAxLS40MDUtLjA3bC0uMTY1LS4wMzdhLjY4MS42ODIgMCAwIDAtLjA3Ni0uMDIzbC0uMDE2LjAwM2EuMDM4LjAzOCAwIDAgMC0uMDExLjAxMi4wNjEuMDYxIDAgMCAwLS4wMDguMDE1bC0uMDAzLjAyLS4wMDguMDY1LS4wMTIuMTQ1LS4wMTUuMTQ2LS4wMDQuMDc2LjAwNC4wMTZjMCAuMDA3IDAgLjAxNS4wMDguMDE5bC4wMTEuMDExLjAxNi4wMDguMDUzLjAxOS4xNTMuMDQ2YTIuODE0IDIuODE2IDAgMCAwIC40NzkuMDc3IDEuMjUgMS4yNSAwIDAgMCAuNTItLjA1OC42Ny42NyAwIDAgMCAuMzIyLS4yMy45MTkuOTIgMCAwIDAgLjE1My0uMzY0IDIuMzY2IDIuMzY3IDAgMCAwIC4wMi0uNzY2IDEuMjI5IDEuMjMgMCAwIDAtLjA3LS4yNTMuODczLjg3MyAwIDAgMC0uMTE4LS4yMTQuNjk3LjY5NyAwIDAgMC0uMTczLS4xNjEuNzE2LjcxNiAwIDAgMCAuMTc3LS4xNTcuODQ2Ljg0NyAwIDAgMCAuMTE4LS4yMDcgMS4xMSAxLjExIDAgMCAwIC4wODQtLjQ2MyAyLjI0IDIuMjQxIDAgMCAwLS4wMzgtLjQ2NC44Mi44MiAwIDAgMC0uMTUzLS4zNDkuNjUuNjUxIDAgMCAwLS4zMjItLjIxIDEuNDYyIDEuNDYzIDAgMCAwLS41Mi0uMDV6bS0yLjQ1OC40OTkuMzEuMDM4YS41OS41OSAwIDAgMSAuMjIyLjA1OC4zMTguMzE4IDAgMCAxIC4xMjMuMTE4LjQ3OS40NzkgMCAwIDEgLjA1Ny4xNzMgMS4zMjggMS4zMyAwIDAgMS0uMDU3LjYyNC4yOTUuMjk1IDAgMCAxLS4xMjMuMTIzLjQ2LjQ2IDAgMCAxLS4yMjIuMDM4bC0uMzEtLjAwOFYxMC41em01LjAxNS4wMTFhLjc1OC43NTggMCAwIDEgLjQ4Ni4xMzQuODg4Ljg4OSAwIDAgMSAuMjg0LjM2OGMuMDY1LjE1My4xMDcuMzIyLjEzLjQ5YTMuMzYxIDMuMzYzIDAgMCAxIDAgLjk0NyAxLjg2OCAxLjg3IDAgMCAxLS4xMy40ODYuODkyLjg5MyAwIDAgMS0uMjg0LjM3Mi43NTQuNzU1IDAgMCAxLS40ODYuMTM0bC0uNDgyLS4wMnYtMi44OTV6TTkuNDQzIDEyLjI3YS42MS42MSAwIDAgMSAuMjU3LjA1LjM0NS4zNDUgMCAwIDEgLjEzNy4xNDYuNjE2LjYxNyAwIDAgMSAuMDY2LjE5OSAxLjU1NCAxLjU1NSAwIDAgMSAwIC40Ni41NTEuNTUyIDAgMCAxLS4wNjYuMTkxLjM3NS4zNzUgMCAwIDEtLjEzNy4xNDIuNjU1LjY1NSAwIDAgMS0uMjU3LjA3N2wtLjMxLjAzdi0xLjI4N3oiIHN0eWxlPSJmaWxsOiNmZmY7ZmlsbC1vcGFjaXR5OjEiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC44ODEpIi8+PHBhdGggZD0iTTEuMjUgNS4wNzQgMTEuNDQ4IDguMDdsNS45My0uNjVWLjA0OHptMCAxMy45MDggMTAuMTk4LTIuOTk1IDUuOTMuNjV2Ny4zNzF6IiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmYiIHN0cm9rZS1saW5lam9pbj0iYmV2ZWwiIHN0cm9rZS13aWR0aD0iLjUiLz48L3N2Zz4=';
    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->add_actions();
    }

    public function admin_init()
    {
        // [opt] check here if we need to redirect to upgrade to premium page
        if (isset($_GET['page']) && $_GET['page'] == 'emv-upgrade') {
            wp_redirect(Emb3D::PREMIUM_URL . self::get_host());
            exit();
        }

        add_settings_section(
            Emb3D::REGISTRATION_SECTION,
            __('Plugin registration', 'emb3d-model-viewer'),
            '__return_false',
            Emb3D::OPTIONS
        );

        add_settings_field(
            Emb3D::REGISTRATION_KEY,
            __('Serial key', 'emb3d-model-viewer'),
            '__return_false',
            Emb3D::OPTIONS,
            Emb3D::REGISTRATION_SECTION
        );

        register_setting(Emb3D::REGISTRATION_SECTION, Emb3D::REGISTRATION_KEY);
    }

    public function meta_box_output($post)
    {
        include_once(plugin_dir_path(__FILE__) . 'partials/emb3d-model-viewer-meta-box-output.php');
    }

    public function add_meta_boxes()
    {
        add_meta_box(
            Emb3D::META_BOX_ID,
            Emb3D::PLUGIN_TITLE,
            [$this, 'meta_box_output'],
            'product',
            'side',
            'low'
        );
    }

    public function save_meta_boxes($post_id, $post)
    {
        if (empty($post_id) || empty($post)) {
            return;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (wp_is_post_revision($post) || wp_is_post_autosave($post)) {
            return;
        }

        // not my own
        if (!isset($_REQUEST[Emb3D::META_BOX_NONCE])) {
            return;
        }

        if (!wp_verify_nonce($_REQUEST[Emb3D::META_BOX_NONCE], Emb3D::META_BOX_NONCE)) {
            exit('Invalid nonce');
        }

        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        if (empty($_REQUEST[Emb3D::META_BOX_MODEL_ID])) {
            delete_post_meta($post_id, Emb3D::META_BOX_MODEL_ID);
            delete_post_meta($post_id, Emb3D::META_BOX_MODEL_FILENAME);
            delete_post_meta($post_id, Emb3D::META_BOX_MODEL_REPLACE_PRODUCT_IMAGE);
            delete_post_meta($post_id, Emb3D::META_BOX_MODEL_BACKGROUND_COLOR);
            delete_post_meta($post_id, Emb3D::META_BOX_MODEL_PROGRESS_COLOR);
        } else {
            update_post_meta($post_id, Emb3D::META_BOX_MODEL_ID, sanitize_text_field($_REQUEST[Emb3D::META_BOX_MODEL_ID]));

            if (!empty($_REQUEST[Emb3D::META_BOX_MODEL_FILENAME])) {
                update_post_meta($post_id, Emb3D::META_BOX_MODEL_FILENAME, sanitize_text_field($_REQUEST[Emb3D::META_BOX_MODEL_FILENAME]));
            }

            if (!empty($_REQUEST[Emb3D::META_BOX_MODEL_BACKGROUND_COLOR])) {
                update_post_meta($post_id, Emb3D::META_BOX_MODEL_BACKGROUND_COLOR, sanitize_text_field($_REQUEST[Emb3D::META_BOX_MODEL_BACKGROUND_COLOR]));
            }

            if (!empty($_REQUEST[Emb3D::META_BOX_MODEL_PROGRESS_COLOR])) {
                update_post_meta($post_id, Emb3D::META_BOX_MODEL_PROGRESS_COLOR, sanitize_text_field($_REQUEST[Emb3D::META_BOX_MODEL_PROGRESS_COLOR]));
            }

            $replace_product_image = intval($_REQUEST[Emb3D::META_BOX_MODEL_REPLACE_PRODUCT_IMAGE] == 'on');
            update_post_meta($post_id, Emb3D::META_BOX_MODEL_REPLACE_PRODUCT_IMAGE, $replace_product_image);
        }
    }

    public function add_actions()
    {
        add_action('admin_init', [$this, 'admin_init']);
        add_action('wp_ajax_emv_register_plugin', [$this, 'emv_register_plugin']);
        add_action('add_meta_boxes', [$this, 'add_meta_boxes']);
        add_action('save_post', [$this, 'save_meta_boxes'], 10, 2);
    }

    public function emv_register_plugin()
    {
        if (!wp_verify_nonce($_REQUEST['nonce'], Emb3D::REGISTRATION_NONCE)) {
            exit('Invalid nonce');
        }

        if (empty($_REQUEST[Emb3D::REGISTRATION_KEY])) {
            delete_option(Emb3D::REGISTRATION_KEY);
        } else {
            update_option(Emb3D::REGISTRATION_KEY, sanitize_text_field($_REQUEST[Emb3D::REGISTRATION_KEY]));
        }
    }

    public function admin_menu()
    {
        add_menu_page(
            Emb3D::PLUGIN_SHORT_TITLE,
            Emb3D::PLUGIN_SHORT_TITLE,
            'administrator',
            $this->plugin_name,
            null,
            self::EMB3D_MENU_ICON,
            26
        );

        add_submenu_page(
            $this->plugin_name,
            __('Overview', 'emb3d-model-viewer'),
            __('Overview', 'emb3d-model-viewer'),
            'administrator',
            $this->plugin_name,
            [$this, 'display_overview']
        );

        if (!get_option(Emb3D::REGISTRATION_KEY)) {
            add_submenu_page(
                $this->plugin_name,
                __('Upgrade', 'emb3d-model-viewer'),
                '<div style="white-space: nowrap;">' . esc_html__('Upgrade to Premium', 'emb3d-model-viewer') . ' <span class="dashicons dashicons-star-filled" style="font-size: 15px;"></div>',
                'administrator',
                'emv-upgrade',
                '__return_false'
            );
        }
    }

    public function display_overview()
    {
        include_once(plugin_dir_path(__FILE__) . 'partials/emb3d-model-viewer-overview.php');
    }

    static function get_host()
    {
        return parse_url(get_site_url())['host'];
    }

    static function lord_icon($name)
    {
        return plugin_dir_url(__FILE__) . 'icons/' . $name . '.json';
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {
        wp_enqueue_style(
            Emb3D::STYLE_ADMIN,
            plugin_dir_url(__FILE__) . 'css/emb3d-model-viewer-admin.css',
            [],
            $this->version,
            'all'
        );
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {
        wp_enqueue_media();

        $suffix = (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) ? '' : '.min';

        wp_enqueue_script(
            Emb3D::SCRIPT_ADMIN,
            plugin_dir_url(__FILE__) . 'js/emb3d-model-viewer-admin' . $suffix . '.js',
            ['jquery'],
            $this->version,
            false
        );

        wp_localize_script(
            Emb3D::SCRIPT_ADMIN,
            'frontendajax',
            array(
                'ajaxurl' => admin_url('admin-ajax.php'),
                'nonce' => wp_create_nonce(Emb3D::REGISTRATION_NONCE)
            )
        );

        // [opt] load lord icon script only on the overview page
        if (isset($_GET['page']) && $_GET['page'] == $this->plugin_name) {
            wp_enqueue_script(
                Emb3D::SCRIPT_LORD_ICON,
                plugin_dir_url(__FILE__) . 'js/lord-icon.js',
                [],
                Emb3D::SCRIPT_LORD_ICON_VERSION
            );
        }

        $screen = get_current_screen();
        $screen_id = $screen ? $screen->id : '';

        // [opt] Only in product screen
        if ($screen_id === 'product') {
            wp_enqueue_style('wp-color-picker');
            wp_enqueue_script(
                Emb3D::SCRIPT_WP_COLOR_PICKER_ALPHA,
                plugin_dir_url(__FILE__) . 'js/wp-color-picker-alpha' . $suffix . '.js',
                ['wp-color-picker'],
                Emb3D::SCRIPT_WP_COLOR_PICKER_ALPHA_VERSION,
                true
            );
            wp_add_inline_script(
                Emb3D::SCRIPT_WP_COLOR_PICKER_ALPHA,
                'jQuery(function() { jQuery(".color-picker").wpColorPicker(); });'
            );
        }
    }
}
