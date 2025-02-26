<?php

namespace AIPT\Admin;

class SetupWizardPage {
    private $nonce_action = 'aipt_setup_wizard_nonce';
    private $nonce_name = 'aipt_setup_nonce';

    public function __construct() {
        add_action('admin_menu', [$this, 'add_setup_page']);
        add_action('admin_init', [$this, 'check_setup_status']);
    }

    public function add_setup_page() {
        add_submenu_page(
            'options.php',
            'AI Product Tools Setup',
            'Setup',
            'manage_options',
            'ai-product-tools-setup',
            [$this, 'render_setup_page']
        );
    }

    public function check_setup_status() {
        

        $current_page = isset($_GET['page']) ? sanitize_text_field(wp_unslash($_GET['page'])) : '';
        

        if ($current_page === 'ai-product-tools-setup') {

            $openai_api_key = get_option('aipt_openai_api_key', '');
            $gemini_api_key = get_option('aipt_gemini_api_key', '');
            

            if (!empty($openai_api_key) || !empty($gemini_api_key)) {
                $redirect_url = wp_nonce_url(
                    admin_url('admin.php?page=ai-product-tools'),
                    'aipt_redirect'
                );
                wp_safe_redirect($redirect_url);
                exit;
            }
        }
    }

    public function render_setup_page() {
        

        if (!current_user_can('manage_options')) {
            wp_die(esc_html__('You do not have sufficient permissions to access this page.', 'ai-product-tools'));
        }
        

        ?>
        <div class="wrap">
            <?php wp_nonce_field($this->nonce_action, $this->nonce_name); ?>
            <div id="aipt-setup-wizard"></div>
        </div>
        <?php
    }
} 