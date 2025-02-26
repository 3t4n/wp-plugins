<?php
namespace AEFE;

if (!defined('ABSPATH')) {
    exit;
}

class Main {
    private static $instance = null;
    private $admin_notice;
    private $form_controls;
    private $validation;

    private function __construct() {
        $this->check_dependencies();
        $this->init_components();
    }

    public static function instance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function check_dependencies() {
        add_action('plugins_loaded', function() {
            if (!function_exists('is_plugin_active')) {
                include_once(ABSPATH . 'wp-admin/includes/plugin.php');
            }
            
            // Check for pro version first
            if (is_plugin_active('advanced-email-filter-for-elementor-forms-pro/advanced-email-filter-for-elementor-forms-pro.php')) {
                $this->admin_notice = new Admin_Notice('pro-active');
                deactivate_plugins(AEFE_PLUGIN_BASENAME);
                
                if (isset($_GET['activate'])) {
                    if (current_user_can('activate_plugins') && 
                        isset($_REQUEST['_wpnonce']) && 
                        wp_verify_nonce(
                            sanitize_text_field(wp_unslash($_REQUEST['_wpnonce'])),
                            'activate-plugin_' . AEFE_PLUGIN_BASENAME
                        )) {
                        unset($_GET['activate']);
                    }
                }
                return;
            }
            
            // Existing Elementor Pro check
            if (!is_plugin_active('elementor-pro/elementor-pro.php')) {
                $this->admin_notice = new Admin_Notice('elementor_pro');
                deactivate_plugins(AEFE_PLUGIN_BASENAME);
                
                // Verify nonce before handling activation parameter
                if (isset($_GET['activate'])) {
                    if (current_user_can('activate_plugins') && 
                        isset($_REQUEST['_wpnonce']) && 
                        wp_verify_nonce(
                            sanitize_text_field(wp_unslash($_REQUEST['_wpnonce'])),
                            'activate-plugin_' . AEFE_PLUGIN_BASENAME
                        )) {
                        unset($_GET['activate']);
                    }
                }
            }
        });
    }

    private function init_components() {
        add_action('plugins_loaded', function() {
            // Always load assets regardless of Elementor Pro status
            $this->asset_loader = new Asset_Loader();
            if (is_plugin_active('elementor-pro/elementor-pro.php')) {
                // Initialize form components
                $this->form_controls = new Form_Controls();
                $this->validation = new Validation();

                // Initialize admin interface
                if (is_admin() && current_user_can('manage_options')) {
                    new Admin\Filter_Settings();
                }
            }
        });
    }
}