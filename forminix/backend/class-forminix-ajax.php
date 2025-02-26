<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('ForminixAdminAjax')) {
    class ForminixAdminAjax
    {

        public $base_admin;

        public function __construct($base_admin)
        {
            $this->base_admin = $base_admin;

            add_action( 'wp_ajax_forminix_modules_update_activated', array($this, 'forminix_modules_update_activated') );

            add_action( 'wp_ajax_forminix_list_forms', array($this, 'forminix_list_forms') );
            add_action( 'wp_ajax_forminix_delete_form', array($this, 'forminix_delete_form') );
            add_action( 'wp_ajax_forminix_import_form', array($this, 'forminix_import_form') );

            add_action( 'wp_ajax_forminix_list_entries', array($this, 'forminix_list_entries') );
            add_action( 'wp_ajax_forminix_delete_entries', array($this, 'forminix_delete_entries') );
            add_action( 'wp_ajax_forminix_change_status_entries', array($this, 'forminix_change_status_entries') );
            add_action( 'wp_ajax_forminix_get_entry', array($this, 'forminix_get_entry') );
            add_action( 'wp_ajax_forminix_get_settings', array($this, 'forminix_get_settings') );
            add_action( 'wp_ajax_forminix_update_settings', array($this, 'forminix_update_settings') );

            add_action( 'wp_ajax_forminix_update_form', array($this, 'forminix_update_form') );
            add_action( 'wp_ajax_forminix_get_form', array($this, 'forminix_get_form') );

            /* Mailchimp Integration */
            add_action( 'wp_ajax_forminix_mailchimp_fetch_lists', array($this, 'forminix_mailchimp_fetch_lists') );
            add_action( 'wp_ajax_forminix_mailchimp_fetch_fields', array($this, 'forminix_mailchimp_fetch_fields') );
        }

        public function forminix_modules_update_activated() {
            include_once FORMINIX_PATH . "backend/api/update_module_status.php";
            wp_die();
        }

        public function forminix_list_forms() {
            include_once FORMINIX_PATH . "backend/api/list_forms.php";
            wp_die();
        }

        public function forminix_delete_form() {
            include_once FORMINIX_PATH . "backend/api/delete_form.php";
            wp_die();
        }

        public function forminix_import_form() {
            include_once FORMINIX_PATH . "backend/api/import_form.php";
            wp_die();
        }

        public function forminix_list_entries() {
            include_once FORMINIX_PATH . "backend/api/list_entries.php";
            wp_die();
        }

        public function forminix_delete_entries() {
            include_once FORMINIX_PATH . "backend/api/delete_entries.php";
            wp_die();
        }

        public function forminix_change_status_entries() {
            include_once FORMINIX_PATH . "backend/api/change_status_entries.php";
            wp_die();
        }

        public function forminix_get_entry() {
            include_once FORMINIX_PATH . "backend/api/get_entry.php";
            wp_die();
        }

        public function forminix_get_settings() {
            include_once FORMINIX_PATH . "backend/api/get_settings.php";
            wp_die();
        }

        public function forminix_update_settings() {
            include_once FORMINIX_PATH . "backend/api/update_settings.php";
            wp_die();
        }

        public function forminix_update_form() {
            include_once FORMINIX_PATH . "backend/api/update_form.php";
            wp_die();
        }

        public function forminix_get_form() {
            include_once FORMINIX_PATH . "backend/api/get_form.php";
            wp_die();
        }


        /* Mailchimp Integration */
        public function forminix_mailchimp_fetch_lists() {
            include_once FORMINIX_PATH . "backend/api/mailchimp/fetch_lists.php";
            wp_die();
        }
        public function forminix_mailchimp_fetch_fields() {
            include_once FORMINIX_PATH . "backend/api/mailchimp/fetch_fields.php";
            wp_die();
        }
        
    }
}
