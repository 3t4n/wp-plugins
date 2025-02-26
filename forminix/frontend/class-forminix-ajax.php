<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('ForminixClientAjax')) {
    class ForminixClientAjax
    {

        public $base_client;

        public function __construct($base_client)
        {
            $this->base_client = $base_client;
            add_action( 'wp_ajax_forminix_client_submit_form', array($this, 'forminix_client_submit_form') );
            add_action( 'wp_ajax_nopriv_forminix_client_submit_form', array($this, 'forminix_client_submit_form') );
        }


        public function forminix_client_submit_form() {
            include_once FORMINIX_PATH . "frontend/api/submit_form.php";
            wp_die();
        }

    }
}
