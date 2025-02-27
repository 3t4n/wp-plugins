<?php

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('WC_Email_Fortnox_Sync_Error', false)) :

    class WC_Email_Fortnox_Sync_Error extends WC_Email {

        public function __construct() {
            $this->id = 'fortnox_sync_error';
            $this->title = __('Fortnox Sync Error', 'woo-fortnox-hub');
            $this->description = __('This email is sent to the admin when a Fortnox sync error occurs.', 'woo-fortnox-hub');

            $this->recipient = get_option('fortnox_user_email', get_option('admin_email'));

            $this->template_html = 'templates/fortnox-sync-error.php';
            $this->template_plain = 'templates/plain/fortnox-sync-error.php';

            // Call parent constructor
            parent::__construct();
        }

        public function get_default_subject() {
            return __('[{site_title}] Fortnox Sync Error', 'woo-fortnox-hub');
        }

        public function get_default_heading() {
            return __('Fortnox Sync Error', 'woo-fortnox-hub');
        }

        public function trigger($error_message) {
            $this->object = array(
                'error_message' => $error_message,
            );

            if ($this->is_enabled() && $this->get_recipient()) {
                $this->send($this->get_recipient(), $this->get_subject(), $this->get_content(), $this->get_headers(), $this->get_attachments());
            }
        }

        public function get_content_html() {
            return wc_get_template_html(
                $this->template_html,
                array(
                    'error_message' => $this->object['error_message'],
                    'email_heading' => $this->get_heading(),
                    'sent_to_admin' => true,
                    'plain_text'    => false,
                    'email'         => $this,
                ),
                '',
                WC_FH()->includes_dir . 'emails/'
            );
        }

        public function get_content_plain() {
            return wc_get_template_html(
                $this->template_plain,
                array(
                    'error_message' => $this->object['error_message'],
                    'email_heading' => $this->get_heading(),
                    'sent_to_admin' => true,
                    'plain_text'    => true,
                    'email'         => $this,
                ),
                WC_FH()->includes_dir . '',
                WC_FH()->includes_dir . 'emails/'
            );
        }
    }

endif;

