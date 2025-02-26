<?php

if (!defined('ABSPATH')) exit;

class acf_admin {
    public $page_ids;
    public $admin_page_url = 'options-general.php';

    function __construct() {
        add_action('admin_enqueue_scripts', array(&$this, 'admin_enqueue_scripts'));
        add_action('admin_menu', array(&$this, 'admin_menu'));
        add_action('admin_init', array(&$this, 'save_settings'));
    }

    public function admin_enqueue_scripts($hook) {
        if ($hook == 'settings_page_ajax-contact-form') {
            wp_enqueue_script('jquery-ui-core');
            wp_enqueue_script('jquery-ui-tabs');

            wp_enqueue_style('acf-styler-admin-css', ACF_URL.'css/admin.css');
            wp_enqueue_style('acf-styler-jqeruyui-css', ACF_URL.'css/ui-lightness/jquery-ui-1.10.3.custom.css');

            do_action('acf_admin_enqueue_scripts');
        }
    }

    public function admin_menu() {
        $this->page_ids[] = add_options_page(__("AJAX Contact Form: Settings", "ajax-contact-form"), __("AJAX Contact Form", "ajax-contact-form"), 'activate_plugins', 'ajax-contact-form', array(&$this, 'tools_menu'));
    }

    public function save_settings() {
        if (!empty($_POST)) {
//            var_dump($_POST);
//            exit();
            global $acf_core_loader;

            foreach ($_POST as $k => $v) {
                $acf_core_loader->set($k, $v);
            }
            $acf_core_loader->save();
            wp_redirect($this->admin_page_url.'?page=ajax-contact-form');
            exit;
        }
    }

    public function tools_menu() {
        global $acf_core_loader;

        include(ACF_PATH.'core/index.php');

        do_action('acf_admin_display_panel_after');
    }
}

$acf_core_admin = new acf_admin();

?>