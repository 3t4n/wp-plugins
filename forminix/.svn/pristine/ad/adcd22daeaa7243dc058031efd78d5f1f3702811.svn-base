<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('ForminixClient')) {
    class ForminixClient
    {

        public $utils;
        public $settings;
        public $emails;
        public $integrations;

        public function __construct()
        {

            $this->utils = new ForminixUtils($this);
            $this->settings = new ForminixSettings($this);
            $this->emails = new ForminixEmails($this);
            $this->integrations = new ForminixIntegrations($this);
            new ForminixClientAjax($this);
            new ForminixShortcodeParser($this);

            add_action( 'wp_enqueue_scripts', array( $this, 'forminix_client_enqueue' ) );

        }


        function forminix_client_enqueue()
        {
            wp_enqueue_style('forminix-client-main', FORMINIX_CSS_DIR.'client_main.css', array(), FORMINIX_VERSION);
            wp_enqueue_script( 'forminix-client-main', FORMINIX_JS_DIR.'client_main.js', array('jquery'), FORMINIX_VERSION );

            if(function_exists("wp_enqueue_editor")){
                wp_enqueue_editor();
                wp_add_inline_script( 'forminix-client-main', 'const forminix_default_js_var = ' . json_encode( array(
                        'tinymce_code_plugin' => FORMINIX_JS_DIR.'tinymce_code_plugin.js',
                    ) ), 'before' );
            }


            wp_localize_script( 'forminix-client-main', 'forminix_client_script_object', array(
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
                'security' => wp_create_nonce( 'forminix_client_hashkey' )
            ));
        }


    }
}

new ForminixClient();

