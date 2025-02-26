<?php

function cfw_add_settings_page() {
    add_menu_page(
        'Calorie Calculator Settings',
        'Calorie Calculator',
        'manage_options',
        'calorie-calculator-settings',
        'cfw_settings_page_content'
    );
}

add_action('admin_menu', 'cfw_add_settings_page');

// Register the settings
function cfw_register_settings() {
    // Register general settings
    register_setting('ccfw_settings_group', 'cfw_title');
    register_setting('ccfw_settings_group', 'cfw_about_text');
    register_setting('ccfw_settings_group', 'cfw_activate_text');
    register_setting('ccfw_settings_group', 'cfw_calc_btn_text');
    register_setting('ccfw_settings_group', 'wmc_weight_loss_text');
    register_setting('ccfw_settings_group', 'wmc_weight_gain_text');

    // Register color settings
    register_setting('ccfw_settings_group', 'cfw_btn_back_color');
    register_setting('ccfw_settings_group', 'cfw_btn_text_color');
    register_setting('ccfw_settings_group', 'cfw_btnhover_back');
    register_setting('ccfw_settings_group', 'cfw_btnhover_text');
    register_setting('ccfw_settings_group', 'cfw_msg_text_color');
    register_setting('ccfw_settings_group', 'cfw_msg_back_color');
    register_setting('ccfw_settings_group', 'cfw_tab_act_back_color');
    register_setting('ccfw_settings_group', 'cfw_tab_act_text_color');
    register_setting('ccfw_settings_group', 'cfw_tab_act_border_color');
    register_setting('ccfw_settings_group', 'cfw_tab_back_color');
    register_setting('ccfw_settings_group', 'cfw_tab_text_color');
    register_setting('ccfw_settings_group', 'cfw_tab_border_color');
    register_setting('ccfw_settings_group', 'cfw_result_title_back_color');
}

add_action('admin_init', 'cfw_register_settings');

// Add settings fields
function cfw_add_settings_fields() {
    // General settings section
    add_settings_section(
        'cfw_general_section',
        'General Options',
        null,
        'calorie-calculator-settings'
    );

    add_settings_field(
        'cfw_title',
        'Header Title Text',
        'cfw_text_field_callback',
        'calorie-calculator-settings',
        'cfw_general_section',
        ['id' => 'cfw_title']
    );

    add_settings_field(
        'cfw_about_text',
        'About Text',
        'cfw_text_field_callback',
        'calorie-calculator-settings',
        'cfw_general_section',
        ['id' => 'cfw_about_text']
    );

    add_settings_field(
        'cfw_activate_text',
        'Activate Text',
        'cfw_text_field_callback',
        'calorie-calculator-settings',
        'cfw_general_section',
        ['id' => 'cfw_activate_text']
    );

    add_settings_field(
        'cfw_calc_btn_text',
        'Calculate Button Text',
        'cfw_text_field_callback',
        'calorie-calculator-settings',
        'cfw_general_section',
        ['id' => 'cfw_calc_btn_text']
    );

    add_settings_field(
        'wmc_weight_loss_text',
        'Weight Loss Text',
        'cfw_text_field_callback',
        'calorie-calculator-settings',
        'cfw_general_section',
        ['id' => 'wmc_weight_loss_text']
    );

    add_settings_field(
        'wmc_weight_gain_text',
        'Weight Gain Text',
        'cfw_text_field_callback',
        'calorie-calculator-settings',
        'cfw_general_section',
        ['id' => 'wmc_weight_gain_text']
    );

    // Color settings section
    add_settings_section(
        'cfw_color_section',
        'Color Options',
        null,
        'calorie-calculator-settings'
    );

    // Add color fields
    $color_fields = [
        'cfw_btn_back_color' => 'Button Background Color',
        'cfw_btn_text_color' => 'Button Text Color',
        'cfw_btnhover_back' => 'Button Hover Background Color',
        'cfw_btnhover_text' => 'Button Hover Text Color',
        'cfw_msg_text_color' => 'Message Text Color',
        'cfw_msg_back_color' => 'Message Background Color',
        'cfw_tab_act_back_color' => 'Tab Active Background Color',
        'cfw_tab_act_text_color' => 'Tab Active Text Color',
        'cfw_tab_act_border_color' => 'Tab Active Border Color',
        'cfw_tab_back_color' => 'Tab Background Color',
        'cfw_tab_text_color' => 'Tab Text Color',
        'cfw_tab_border_color' => 'Tab Border Color',
        'cfw_result_title_back_color' => 'Result Title Background Color',
    ];

    foreach ($color_fields as $id => $label) {
        add_settings_field(
            $id,
            $label,
            'cfw_color_picker_callback',
            'calorie-calculator-settings',
            'cfw_color_section',
            ['id' => $id]
        );
    }
}

add_action('admin_init', 'cfw_add_settings_fields');

// Callback functions for text fields and color pickers
function cfw_text_field_callback($args) {
    $id = $args['id'];
    $value = get_option($id);
    echo '<input type="text" id="' . esc_attr($id) . '" name="' . esc_attr($id) . '" value="' . esc_attr($value) . '" class="regular-text">';
}

function cfw_color_picker_callback($args) {
    $id = $args['id'];
    $value = get_option($id);
    echo '<input type="text" id="' . esc_attr($id) . '" name="' . esc_attr($id) . '" value="' . esc_attr($value) . '" class="color-picker">';
}

// The settings page content
function cfw_settings_page_content() {
    ?>
    <div class="wrap">
        <h1>Calorie Calculator Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('ccfw_settings_group');
            do_settings_sections('calorie-calculator-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}
?>
