<?php
defined('ABSPATH') or die('No script kiddies please!!');
if (!class_exists('FSDT_Admin')) {
    class FSDT_Admin extends FSDT_Library {
        function __construct() {
            add_action('admin_menu', array($this, 'fsdt_admin_menu'));
            add_action('admin_footer', array($this, 'compare_pro_vs_free_html'));
        }
        function fsdt_admin_menu() {
            add_menu_page(esc_html__('Floating Side Tab', 'floating-side-tab'), esc_html__('Floating Side Tab', 'floating-side-tab'), 'manage_options', 'floating-side-tab', array($this, 'fsdt_generate_main_page'), 'dashicons-menu-alt3');

            add_submenu_page('floating-side-tab', esc_html__('Floating Side Tab', 'floating-side-tab'), esc_html__('Floating Side Tab', 'floating-side-tab'), 'manage_options', 'floating-side-tab', array($this, 'fsdt_generate_main_page'));
            add_submenu_page('floating-side-tab', esc_html__('Add New Tab Menu', 'floating-side-tab'), esc_html__('Add New Tab Menu', 'floating-side-tab'), 'manage_options', 'add-new-menu', array($this, 'fstm_add_new_menu_settings_page'));
            add_submenu_page('floating-side-tab', esc_html__('Settings', 'floating-side-tab'), esc_html__('Settings', 'floating-side-tab'), 'manage_options', 'fsdt-settings', array($this, 'fsdt_settings'));
        }
        function fsdt_generate_main_page() {
            if (isset($_GET['action'], $_GET['menu_id']) && sanitize_text_field($_GET['action']) == 'edit_menu') {

                if (!empty($_GET['menu_id'])) {
                    $menu_id = intval($_GET['menu_id']);
                    $menu_row = $this->get_menu_row_by_id($menu_id);

                    if (empty($menu_row)) {
                        // Translators: %d will be replaced by actual menu ID 
                        echo sprintf(esc_html__("No menu found with ID %d", 'floating-side-tab'), esc_html($menu_id));
                    } else {
                        $menu_title = $menu_row->menu_title;
                        $menu_details = maybe_unserialize($menu_row->menu_details);
                    }
                    include(FSDT_PATH . '/includes/views/backend/menus/fsdt-menu-edit.php');
                }
            } else {
                include(FSDT_PATH . '/includes/views/backend/menus/fsdt-menu-lists.php');
            }
        }

        /**
         * add new menu 
         */
        function fstm_add_new_menu_settings_page() {
            include(FSDT_PATH . '/includes/views/backend/menus/fsdt-add-new-menu.php');
        }
        function fsdt_settings() {
            include(FSDT_PATH . '/includes/views/backend/fsdt-settings.php');
        }

        /**
        compare pro vs free
        */
         function compare_pro_vs_free_html() {
            include(FSDT_PATH . '/includes/views/backend/free-vs-pro.php');
        }
    }

    new FSDT_Admin();
}
