<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://concord.tech
 * @since      1.0.0
 *
 * @package    Concord
 * @subpackage Concord/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Concord
 * @subpackage Concord/admin
 * @author     Concord <support@concord.tech>
 */

class Concord_Admin {
    private $plugin_name;
    private $version;

    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
        
        // Add menu page
        add_action('admin_menu', array($this, 'add_menu_page'));
        
        // Register AJAX handlers
        add_action('wp_ajax_concord_save_project_id', array($this, 'ajax_save_project_id'));
        add_action('wp_ajax_concord_delete_integration', array($this, 'ajax_delete_integration'));
        add_action('wp_ajax_concord_toggle_integration', array($this, 'ajax_toggle_integration'));

    }

    public function add_menu_page() {
        add_menu_page(
            'Concord Settings',
            'Concord',
            'manage_options',
            'concord',
            array($this, 'render_admin_page'),
            $this->get_menu_icon()
        );
    }

    private function get_menu_icon() {
        // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
        $icon = file_get_contents(CONCORD_PATH . 'assets/concord-white-mark.svg');
        return 'data:image/svg+xml;base64,' . base64_encode($icon);
    }

    public function enqueue_styles() {
        if (!$this->is_plugin_page()) return;
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/concord-admin.css', array(), $this->version, 'all');
    }

    public function enqueue_scripts() {
        if (!$this->is_plugin_page()) return;
        
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/concord-admin.js', array(), $this->version, true);
        
        wp_localize_script($this->plugin_name, 'concordData', array(
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('concord_nonce')
        ));
    }

    private function is_plugin_page() {
        return get_current_screen()->id === 'toplevel_page_concord';
    }

    public function render_admin_page() {
        $selected_project = get_option('concord_selected_project');
        
        include plugin_dir_path(__FILE__) . 'partials/concord-admin-display.php';
    }

    public function ajax_select_project() {
        check_ajax_referer('concord_nonce', "nonce");
        
        if (isset($_POST['project_id'])) {
            $project_id = sanitize_text_field(wp_unslash($_POST['project_id']));
            update_option('concord_selected_project', $project_id);
            update_option('concord_integration_enabled', true);
            
            wp_send_json_success();
        } else {
            wp_send_json_error(array('message' => 'Project ID is missing.'));
        }
    }

    public function ajax_save_project_id() {
        check_ajax_referer('concord_nonce', "nonce");
        
        if (isset($_POST['project_id'])) {
            $project_id = sanitize_text_field(wp_unslash($_POST['project_id']));

            try {
                update_option('concord_selected_project', $project_id);
                update_option('concord_integration_enabled', true);
                wp_send_json_success();
            } catch (Exception $e) {
                wp_send_json_error(array('message' => $e->getMessage()));
            }
        } else {
            wp_send_json_error(array('message' => 'Project ID is missing.'));
        }
    }

    public function ajax_delete_integration() {
        check_ajax_referer('concord_nonce', 'nonce');
        
        delete_option('concord_selected_project');
        delete_option('concord_integration_enabled');
        
        wp_send_json_success();
    }
    
    public function ajax_toggle_integration() {
        check_ajax_referer('concord_nonce', 'nonce');
        
        $current_state = get_option('concord_integration_enabled', true);
        update_option('concord_integration_enabled', !$current_state);
        
        wp_send_json_success(['enabled' => !$current_state]);
    }

}