<?php

class Loya_ID_ELF_Admin_Settings {

    private $options;

    public function init() {
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_init', array($this, 'page_init'));
    }

    public function add_admin_menu() {
        add_menu_page(
            'LOYA.ID Lead Form Settings',
            'LOYA.ID Lead Form',
            'manage_options',
            'loya-id-easy-lead-form',
            array($this, 'create_admin_page'),
            'dashicons-admin-generic',
            6
        );
    }

    public function create_admin_page() {
        $this->options = get_option('loya_id_elf_options');
        ?>
        <div class="wrap">
            <h1>LOYA.ID Lead Form Settings</h1>
            <form method="post" action="options.php">
                <?php
                settings_fields('loya_id_elf_option_group');
                do_settings_sections('loya-id-easy-lead-form');
                wp_nonce_field('loya_id_elf_nonce_action', 'loya_id_elf_nonce');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    public function page_init() {
        register_setting(
            'loya_id_elf_option_group',
            'loya_id_elf_options',
            array($this, 'sanitize')
        );

        add_settings_section(
            'setting_section_id',
            'API Settings',
            array($this, 'print_section_info'),
            'loya-id-easy-lead-form'
        );

        // add_settings_field(
        //     'api_key',
        //     'API Key',
        //     array($this, 'api_key_callback'),
        //     'loya-id-easy-lead-form',
        //     'setting_section_id'
        // );

        add_settings_field(
            'token',
            'Bearer TOKEN',
            array($this, 'token_callback'),
            'loya-id-easy-lead-form',
            'setting_section_id'
        );

        add_settings_section(
            'setting_section_recaptcha',
            'reCAPTCHA Settings',
            array($this, 'print_section_info_recaptcha'),
            'loya-id-easy-lead-form'
        );

        add_settings_field(
            'recaptcha_site_key',
            'Site Key',
            array($this, 'recaptcha_site_key_callback'),
            'loya-id-easy-lead-form',
            'setting_section_recaptcha'
        );

        add_settings_field(
            'recaptcha_secret_key',
            'Secret Key',
            array($this, 'recaptcha_secret_key_callback'),
            'loya-id-easy-lead-form',
            'setting_section_recaptcha'
        );
    }

    public function sanitize($input) {
        // Validate nonce
        if (!isset($_POST['loya_id_elf_nonce']) || !wp_verify_nonce($_POST['loya_id_elf_nonce'], 'loya_id_elf_nonce_action')) {
            wp_die(__('Security check failed.', 'loya-id-easy-lead-form'));
        }
    
        $sanitized_input = array();
    
        if (isset($input['token'])) {
            $sanitized_input['token'] = sanitize_text_field($input['token']);
        }
    
        if (isset($input['api_key'])) {
            $sanitized_input['api_key'] = sanitize_text_field($input['api_key']);
        }

        if (isset($input['recaptcha_site_key'])) {
            $sanitized_input['recaptcha_site_key'] = sanitize_text_field($input['recaptcha_site_key']);
        }

        if (isset($input['recaptcha_secret_key'])) {
            $sanitized_input['recaptcha_secret_key'] = sanitize_text_field($input['recaptcha_secret_key']);
        }
    
        return $sanitized_input;
    }
    

    public function print_section_info() {
        echo 'Enter your API Token below. You can get it from the registration page at <a href="https://loya.id" target="_blank">loya.id</a>.';
        echo '<h4>To display the form, you can add the shortcode [loya_id_easy_lead_form] to any post, page, or widget</h4>';
    }

    public function token_callback() {
        $token = isset($this->options['token']) ? esc_attr($this->options['token']) : '';
        echo '<input type="text" id="token" name="loya_id_elf_options[token]" value="' . $token . '" style="width: 100%; max-width: 400px;" />';
        echo '<p class="description">Enter your LOYA.ID TOKEN.</p>';
    }

    // public function api_key_callback() {
    //     $options = get_option('loya_id_elf_options');
    //     $api_key = isset($options['api_key']) ? esc_attr($options['api_key']) : '';
    //     echo '<input type="text" id="api_key" name="loya_id_elf_options[api_key]" value="' . $api_key . '" style="width: 100%; max-width: 400px;" />';
    //     echo '<p class="description">Enter your LOYA.ID API Key.</p>';
    // }

    public function print_section_info_recaptcha() {
        echo '<hr>Enter your Site & Secret Key below. You can get it from <a href="https://google.com" target="_blank">google.com</a>.';
    }

    public function recaptcha_site_key_callback() {
        $options = get_option('loya_id_elf_options');
        $recaptcha_site_key = isset($options['recaptcha_site_key']) ? esc_attr($options['recaptcha_site_key']) : '';
        echo '<input type="text" id="recaptcha_site_key" name="loya_id_elf_options[recaptcha_site_key]" value="' . $recaptcha_site_key . '" style="width: 100%; max-width: 400px;" />';
        echo '<p class="description">Enter your reCAPTCHA Site Key.</p>';
    }

    public function recaptcha_secret_key_callback() {
        $options = get_option('loya_id_elf_options');
        $recaptcha_secret_key = isset($options['recaptcha_secret_key']) ? esc_attr($options['recaptcha_secret_key']) : '';
        echo '<input type="text" id="recaptcha_secret_key" name="loya_id_elf_options[recaptcha_secret_key]" value="' . $recaptcha_secret_key . '" style="width: 100%; max-width: 400px;" />';
        echo '<p class="description">Enter your reCAPTCHA Secret Key.</p>';
    }
}
