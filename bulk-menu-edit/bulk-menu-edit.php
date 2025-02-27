<?php
/**
 * Plugin Name:       Bulk Menu Edit
 * Plugin URI:        https://wordpress.org/plugins/bulk-menu-edit/
 * Description:       Remove multiple menu items in one single click
 * Version:           1.3.1
 * Tags:              menu, edit, bulk, items
 * Requires at least: 5.0 or higher
 * Requires PHP:      5.6
 * Tested up to:      6.7.1
 * Stable tag:        1.3.1
 * Author:            M . Code
 * Text Domain:       bulk-menu-edit
 * Domain Path:       /languages
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Contributors:      M . Code
 * Donate link:       https://ko-fi.com/devloper
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('BulkMenuEdit')):
    class BulkMenuEdit
    {
        private $rate_limit_key = 'bme_last_request_';
        private static $instance = null;

        public static function get_instance()
        {
            if (null === self::$instance) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function __construct()
        {
            if (!defined('BME_ASSETS_URL')) {
                define('BME_ASSETS_URL', plugin_dir_url(__FILE__) . 'assets/');
            }
            add_action('admin_enqueue_scripts', array($this, 'bme_enqueue_files'));
            add_action('wp_ajax_remove_menu_items', array($this, 'bme_ajax_call'));
        }

        private function check_rate_limit()
        {
            $user_id = get_current_user_id();
            if (!$user_id) {
                return false;
            }

            $key = $this->rate_limit_key . $user_id;
            $attempts = (int) get_transient($key . '_count') ?: 0;
            $last_request = get_transient($key);

            if ($last_request !== false) {
                $time_passed = time() - $last_request;
                if ($time_passed < 2 || $attempts > 10) {
                    return false;
                }
            }

            set_transient($key, time(), 60);
            set_transient($key . '_count', $attempts + 1, 60);
            return true;
        }

        private function verify_menu_item_ownership($menu_item_id)
        {
            if (!current_user_can('edit_theme_options')) {
                return false;
            }

            $menu_item = get_post($menu_item_id);
            if (!$menu_item || $menu_item->post_type !== 'nav_menu_item') {
                return false;
            }

            $menu_id = wp_get_post_terms($menu_item_id, 'nav_menu', array('fields' => 'ids'));
            if (empty($menu_id)) {
                return false;
            }

            $menu = wp_get_nav_menu_object($menu_id[0]);
            return $menu && current_user_can('edit_theme_options');
        }

        public function bme_enqueue_files()
        {
            $screen = get_current_screen();
            if (!$screen || $screen->base !== 'nav-menus') {
                return;
            }

            if (!current_user_can('edit_theme_options')) {
                return;
            }

            $text_domain = 'bulk-menu-edit';
            $version = '1.3';

            wp_register_script('bulk-menu-js', BME_ASSETS_URL . 'bulk-menu.js', array('jquery', 'wp-i18n'), $version, true);
            wp_set_script_translations('bulk-menu-js', $text_domain, plugin_dir_path(__FILE__) . 'languages');
            wp_enqueue_script('bulk-menu-js');

            wp_enqueue_style('bulk-menu-css', BME_ASSETS_URL . 'bulk-menu.css', array(), $version, 'all');

            wp_localize_script('bulk-menu-js', 'bulkMenuEdit', array(
                'ajaxurl' => esc_url_raw(admin_url('admin-ajax.php')),
                'nonce' => wp_create_nonce('bulk_menu_edit_nonce')
            ));
        }

        public function bme_ajax_call()
        {
            try {
                if (!check_ajax_referer('bulk_menu_edit_nonce', 'nonce', false)) {
                    wp_send_json_error('Invalid security token');
                    return;
                }

                if (!current_user_can('edit_theme_options')) {
                    wp_send_json_error('Insufficient permissions');
                    return;
                }

                if (!$this->check_rate_limit()) {
                    wp_send_json_error('Please wait before making another request');
                    return;
                }

                if (!isset($_POST['data']) || !is_array($_POST['data'])) {
                    wp_send_json_error('Invalid data format');
                    return;
                }

                $menu_items = $_POST['data'];
                global $wpdb;
                
                $wpdb->query('START TRANSACTION');

                try {
                    if (empty($_POST['data'])) {
                        throw new Exception('No menu items provided');
                    }
                    
                    $deleted_items = array();
                    $skipped_items = array();
                    
                    foreach ($menu_items as $data) {
                        if (!isset($data['value']) || !is_string((string) $data['value'])) {
                            $skipped_items[] = 'invalid_format';
                            continue;
                        }
                        
                        $menu_item_id = filter_var($data['value'], FILTER_VALIDATE_INT);
                        if ($menu_item_id === false || $menu_item_id <= 0) {
                            $skipped_items[] = $data['value'];
                            continue;
                        }

                        if (!$this->verify_menu_item_ownership($menu_item_id)) {
                            $skipped_items[] = $menu_item_id;
                            continue;
                        }

                        $deleted_items[] = $menu_item_id;
                    }

                    foreach ($deleted_items as $item_id) {
                        $result = wp_delete_post($item_id, true);
                        if (!$result) {
                            throw new Exception(sprintf('Failed to delete menu item %d', $item_id));
                        }
                    }

                    $wpdb->query('COMMIT');
                    wp_send_json_success(array(
                        'message' => 'Menu items deleted successfully',
                        'deleted_count' => count($deleted_items),
                        'skipped_count' => count($skipped_items)
                    ));

                } catch (Exception $e) {
                    $wpdb->query('ROLLBACK');
                    throw $e;
                }

            } catch (Exception $e) {
                wp_send_json_error($e->getMessage());
            }
        }
    }

    // Initialize plugin using singleton pattern
    function bulk_menu_edit_init()
    {
        return BulkMenuEdit::get_instance();
    }
    add_action('plugins_loaded', 'bulk_menu_edit_init');
endif;