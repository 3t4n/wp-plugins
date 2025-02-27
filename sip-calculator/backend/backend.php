<?php
// Hook into the admin_menu action to add the settings page
add_action('admin_menu', 'sip_add_settings_page');

function sip_add_settings_page() {
    add_menu_page(
        'SIP Calculator Settings',       // Page title
        'SIP Settings',                 // Menu title
        'manage_options',               // Capability
        'sip_calculator_settings',      // Menu slug
        'sip_settings_page_callback',   // Callback function to render the page
        'dashicons-calculator',         // Icon
        60                              // Position in the menu
    );
}

// Render the settings page
function sip_settings_page_callback() {
    ?>
    <div class="wrap">
        <h1>SIP Calculator Settings</h1>
        <form method="post" action="options.php">
            <?php
            // Output settings fields for the registered settings section
            settings_fields('sip_settings_group');
            // Output the sections and fields
            do_settings_sections('sip_calculator_settings');
            // Add a save button
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Hook to initialize settings
add_action('admin_init', 'sip_register_settings');

function sip_register_settings() {
    // General Settings
    register_setting('sip_settings_group', 'sip_title');
    register_setting('sip_settings_group', 'sip_title_font');
    register_setting('sip_settings_group', 'sip_title_color');
    register_setting('sip_settings_group', 'sip_investamount_color');
    register_setting('sip_settings_group', 'sip_profitamount_color');
    register_setting('sip_settings_group', 'sip_slider_activ_color');
    register_setting('sip_settings_group', 'sip_slider_progress_color');
    register_setting('sip_settings_group', 'sip_slider_thumb_back_color');
    register_setting('sip_settings_group', 'sip_time_back_color');
    register_setting('sip_settings_group', 'sip_time_text_color');
    register_setting('sip_settings_group', 'sip_result_head_back_color');
    register_setting('sip_settings_group', 'sip_result_head_text_color');
    register_setting('sip_settings_group', 'sip_result_body_bg_color');
    register_setting('sip_settings_group', 'sip_result_body_text_color');
    register_setting('sip_settings_group', 'sip_result_body_hover_bg_color');
    register_setting('sip_settings_group', 'sip_enable_chart');
    register_setting('sip_settings_group', 'sip_enable_table');
    register_setting('sip_settings_group', 'sip_chart_type');
    register_setting('sip_settings_group', 'expected_amount_text');
    register_setting('sip_settings_group', 'amount_invested_text');
    register_setting('sip_settings_group', 'profit_earned_text');
    register_setting('sip_settings_group', 'chart_invested_amount_text');
    register_setting('sip_settings_group', 'chart_profit_earned_text');
    register_setting('sip_settings_group', 'default_invested_amount');
    register_setting('sip_settings_group', 'min_invested_amount');
    register_setting('sip_settings_group', 'max_invested_amount');
    register_setting('sip_settings_group', 'default_investment_period');
    register_setting('sip_settings_group', 'min_investment_period');
    register_setting('sip_settings_group', 'default_expected_annual');
    register_setting('sip_settings_group', 'min_expected_annual');
    register_setting('sip_settings_group', 'max_expected_annual');

    // Add General Settings Section
    add_settings_section(
        'sip_general_section',            // Section ID
        'General Settings',               // Title
        'sip_general_section_callback',   // Callback to render the section description
        'sip_calculator_settings'         // Page slug
    );

    // Add all fields
    $fields = [
        ['sip_title', 'Calculator Title', 'text'],
        ['sip_title_font', 'Title Font', 'text'],
        ['sip_title_color', 'Title Color', 'color'],
        ['sip_investamount_color', 'Invested Amount Color', 'color'],
        ['sip_profitamount_color', 'Profit Amount Color', 'color'],
        ['sip_slider_activ_color', 'Slider Active Color', 'color'],
        ['sip_slider_progress_color', 'Slider Progress Color', 'color'],
        ['sip_slider_thumb_back_color', 'Slider Thumb Background Color', 'color'],
        ['sip_time_back_color', 'Time Background Color', 'color'],
        ['sip_time_text_color', 'Time Text Color', 'color'],
        ['sip_result_head_back_color', 'Result Header Background Color', 'color'],
        ['sip_result_head_text_color', 'Result Header Text Color', 'color'],
        ['sip_result_body_bg_color', 'Result Body Background Color', 'color'],
        ['sip_result_body_text_color', 'Result Body Text Color', 'color'],
        ['sip_result_body_hover_bg_color', 'Result Body Hover Background Color', 'color'],
        ['sip_enable_chart', 'Enable Chart', 'checkbox'],
        ['sip_enable_table', 'Enable Table', 'checkbox'],
        ['sip_chart_type', 'Chart Type', 'text'],
        ['expected_amount_text', 'Expected Amount Text', 'text'],
        ['amount_invested_text', 'Amount Invested Text', 'text'],
        ['profit_earned_text', 'Profit Earned Text', 'text'],
        ['chart_invested_amount_text', 'Chart Invested Amount Text', 'text'],
        ['chart_profit_earned_text', 'Chart Profit Earned Text', 'text'],
        ['default_invested_amount', 'Default Invested Amount', 'number'],
        ['min_invested_amount', 'Minimum Invested Amount', 'number'],
        ['max_invested_amount', 'Maximum Invested Amount', 'number'],
        ['default_investment_period', 'Default Investment Period', 'number'],
        ['min_investment_period', 'Minimum Investment Period', 'number'],
        ['default_expected_annual', 'Default Expected Annual Return', 'number'],
        ['min_expected_annual', 'Minimum Expected Annual Return', 'number'],
        ['max_expected_annual', 'Maximum Expected Annual Return', 'number']
    ];

    foreach ($fields as $field) {
        add_settings_field(
            $field[0],
            $field[1],
            'sip_field_callback',
            'sip_calculator_settings',
            'sip_general_section',
            ['label_for' => $field[0], 'type' => $field[2]]
        );
    }
}

// Section description callback
function sip_general_section_callback() {
    echo '<p>Configure the settings for the SIP Calculator.</p>';
}

// Field callback
function sip_field_callback($args) {
    $option = get_option($args['label_for']);
    $type = $args['type'];

    if ($type === 'checkbox') {
        printf(
            '<input type="checkbox" id="%s" name="%s" value="1" %s>',
            esc_attr($args['label_for']),
            esc_attr($args['label_for']),
            checked(1, $option, false)
        );
    } elseif ($type === 'color') {
        printf(
            '<input type="color" id="%s" name="%s" value="%s">',
            esc_attr($args['label_for']),
            esc_attr($args['label_for']),
            esc_attr($option)
        );
    } else {
        printf(
            '<input type="%s" id="%s" name="%s" value="%s" class="regular-text">',
            esc_attr($type),
            esc_attr($args['label_for']),
            esc_attr($args['label_for']),
            esc_attr($option)
        );
    }
}
