<?php

class antiBlockSettings {

    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct() {
        add_action('admin_menu', array($this, 'add_plugin_page'));
        add_action('admin_init', array($this, 'page_init'));
    }

    /**
     * Add options page
     */
    public function add_plugin_page() {
        // This page will be under "Settings"
        add_options_page(
                'Settings Admin', 'Anti-block', 'manage_options', 'anti-block', array($this, 'create_admin_page')
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page() {
        // Set class property
        $this->options = get_option('anti_block_settings');
        ?>
        <div class="wrap">
        <?php screen_icon(); ?>
            <h2>Anti-block Settings</h2>           
            <form method="post" action="options.php">
        <?php
        // This prints out all hidden setting fields
        settings_fields('anti_block_option_group');
        do_settings_sections('anti-block-setting-admin');
        submit_button();
        ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init() {
        register_setting(
                'anti_block_option_group', // Option group
                'anti_block_settings', // Option name
                array($this, 'sanitize') // Sanitize
        );

        add_settings_section(
                'setting_section_id', // ID
                'Enter your settings below', // Title
                array($this, 'print_section_info'), // Callback
                'anti-block-setting-admin' // Page
        );

        add_settings_field(
                'yes', // ID
                'Okay button', // Title 
                array($this, 'okay_button_callback'), // Callback
                'anti-block-setting-admin', // Page
                'setting_section_id' // Section           
        );

        add_settings_field(
                'no', 'No button', array($this, 'no_button_callback'), 'anti-block-setting-admin', 'setting_section_id'
        );

        add_settings_field(
                'title', 'Title', array($this, 'title_callback'), 'anti-block-setting-admin', 'setting_section_id'
        );

        add_settings_field(
                'message', 'Message body', array($this, 'message_callback'), 'anti-block-setting-admin', 'setting_section_id'
        );

        add_settings_field(
                'do_not_nag', 'If the visitor declines to disable ad-blocker, hide the pop-up until his next visit.', array($this, 'do_not_nag_callback'), 'anti-block-setting-admin', 'setting_section_id'
        );
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize($input) {
        $new_input = array();
        if (isset($input['okay_btn']))
            $new_input['okay_btn'] = sanitize_text_field($input['okay_btn']);

        if (isset($input['no_btn']))
            $new_input['no_btn'] = sanitize_text_field($input['no_btn']);

        if (isset($input['title']))
            $new_input['title'] = sanitize_text_field($input['title']);

        if (isset($input['message']))
            $new_input['message'] = sanitize_text_field($input['message']);

        if (isset($input['message']))
            $new_input['do_not_nag'] = $input['do_not_nag'];



        return $new_input;
    }

    /**
     * Print the Section text
     */
    public function print_section_info() {
        
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function okay_button_callback() {
        printf(
                '<input size="50" type="text" id="okay_btn" name="anti_block_settings[okay_btn]" value="%s" />', isset($this->options['okay_btn']) ? esc_attr($this->options['okay_btn']) : ''
        );
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function no_button_callback() {
        printf(
                '<input size="50" type="text" id="no_btn" name="anti_block_settings[no_btn]" value="%s" />', isset($this->options['no_btn']) ? esc_attr($this->options['no_btn']) : ''
        );
    }

    public function title_callback() {
        printf(
                '<input size="50" type="text" id="title" name="anti_block_settings[title]" value="%s" />', isset($this->options['title']) ? esc_attr($this->options['title']) : ''
        );
    }

    public function message_callback() {
        printf(
                '<textarea rows="6" cols="47" id="message" name="anti_block_settings[message]" >%s</textarea>', isset($this->options['message']) ? esc_attr($this->options['message']) : ''
        );
    }

    public function do_not_nag_callback() {
        printf(
               '<select id="do_not_nag" name="anti_block_settings[do_not_nag]">
                   <option value="0" %s>No</option>
                   <option value="1" %s>Yes</option>
                </select>',
                isset($this->options['do_not_nag']) && $this->options['do_not_nag'] == 0 ? 'selected' : '',
                isset($this->options['do_not_nag']) && $this->options['do_not_nag'] == 1 ? 'selected' : ''
              );
    }

}

if (is_admin())
    $my_settings_page = new antiBlockSettings();