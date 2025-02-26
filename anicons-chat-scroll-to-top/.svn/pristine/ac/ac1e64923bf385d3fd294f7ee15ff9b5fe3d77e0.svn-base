<?php

if (!defined('ABSPATH')) {
    exit;
}

function anicons_enqueue_styles() {
    wp_enqueue_style(
        'anicons-styles',
        esc_url(plugin_dir_url(__FILE__) . '../css/admin-styles.css'),
        array(),
        '1.0.0'
    );
}
add_action('admin_enqueue_scripts', 'anicons_enqueue_styles');

// Register settings
function anicons_register_settings() {
    // WhatsApp settings
    register_setting('anicons_settings_group', 'anicons_whatsapp_enabled', array(
        
        'default' => 'yes',
        'sanitize_callback' => 'sanitize_text_field', // Sanitize as text
    ));
    register_setting('anicons_settings_group', 'anicons_whatsapp_number', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field', // Sanitize as text
    ));
    register_setting('anicons_settings_group', 'anicons_whatsapp_bottom', array(
        'default' => '20',
        'sanitize_callback' => 'sanitize_text_field', // Sanitize as text
    ));
    register_setting('anicons_settings_group', 'anicons_whatsapp_left', array(
        'default' => '20',
        'sanitize_callback' => 'sanitize_text_field', // Sanitize as text
    ));
    register_setting('anicons_settings_group', 'anicons_whatsapp_icon', array(
        'default' => 'icon-whatsapp-01.png',
        'sanitize_callback' => 'sanitize_text_field', // Sanitize as text
    ));

    // Scroll settings
    register_setting('anicons_settings_group', 'anicons_scroll_enabled', array(

        'default' => 'yes',
        'sanitize_callback' => 'sanitize_text_field', // Sanitize as text
    ));
    register_setting('anicons_settings_group', 'anicons_scroll_bottom', array(
        'default' => '20',
        'sanitize_callback' => 'sanitize_text_field', // Sanitize as text
    ));
    register_setting('anicons_settings_group', 'anicons_scroll_right', array(
        'default' => '20',
        'sanitize_callback' => 'sanitize_text_field', // Sanitize as text
    ));
    register_setting('anicons_settings_group', 'anicons_scroll_icon', array(
        'default' => 'icon-scroll-to-top-01.png',
        'sanitize_callback' => 'sanitize_text_field', // Sanitize as text
    ));

    // Register the new setting for switching the icons on/off
    register_setting('anicons_settings_group', 'anicons_switch_enabled', array(
    'default' => 'yes',
    'sanitize_callback' => 'sanitize_text_field',
));
}
add_action('admin_init', 'anicons_register_settings');

function anicons_settings_page_content() {
    // Check if the form has been submitted and verify the nonce
    if (isset($_POST['submit'])) {
        // Unslash and sanitize the nonce
        $nonce = isset($_POST['anicons_settings_nonce']) ? sanitize_key(wp_unslash($_POST['anicons_settings_nonce'])) : '';

        if (!wp_verify_nonce($nonce, 'anicons_settings_action')) {
            wp_die('Security check failed');
        }

        // Process form data here
        // For example, you can save the settings using `update_option` or let WordPress handle it via `settings_fields`
    }

    if (isset($_GET['settings-updated'])) {
        add_settings_error('anicons_messages', 'anicons_message', 'Settings Saved', 'updated');
    }
    settings_errors('anicons_messages');
    ?>
    <div class="wrap">
        <h1>Anicons Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('anicons_settings_group');
            do_settings_sections('anicons_settings_group');
            wp_nonce_field('anicons_settings_action', 'anicons_settings_nonce');
            ?>
            <div class="anicons-columns">
                <!-- WhatsApp Icon Section -->
                <div class="anicons-column">
                    <h2 class="anicons-heading">WhatsApp Icon</h2>
                    <div class="anicons-section">
                        <label style="display: flex; align-items: center;">
                            <input type="checkbox"
                                   name="anicons_whatsapp_enabled"
                                   value="yes"
                                   <?php checked(esc_attr(get_option('anicons_whatsapp_enabled', 'yes')), 'yes'); ?>
                                   style="margin-right: 8px;">
                            Enable WhatsApp Icon
                        </label>
                    </div>

                    <div>
                        <div style="margin-bottom: 10px;">Select WhatsApp Icon:</div>
                        <div class="anicons-icon-select">
                            <?php
                            // WhatsApp Icon Styles
                            wp_register_style('anicons-whatsapp-preview', false, array(), '1.0.0');

                            $whatsapp_icons = ['icon-whatsapp-01.png', 'icon-whatsapp-02.png', 'icon-whatsapp-01.gif'];
                            $whatsapp_css = '';

                            foreach ($whatsapp_icons as $index => $icon) {
                                $icon_url = esc_url(plugin_dir_url(__FILE__) . 'assets/' . $icon);
                                $whatsapp_css .= "
                                    .anicons-whatsapp-icon-{$index} {
                                        display: block;
                                        width: 40px;
                                        height: 40px;
                                        background-image: url('{$icon_url}');
                                        background-size: contain;
                                        background-repeat: no-repeat;
                                        padding: 5px;
                                        border-radius: 4px;
                                    }
                                ";
                            }

                            // Sanitize CSS using wp_kses
                            $whatsapp_css = wp_kses($whatsapp_css, array(
                                'display' => array(),
                                'width' => array(),
                                'height' => array(),
                                'background-image' => array(),
                                'background-size' => array(),
                                'background-repeat' => array(),
                                'padding' => array(),
                                'border-radius' => array(),
                            ));

                            wp_add_inline_style('anicons-whatsapp-preview', $whatsapp_css);
                            wp_enqueue_style('anicons-whatsapp-preview');

                            foreach ($whatsapp_icons as $index => $icon) {
                                $checked = esc_attr(get_option('anicons_whatsapp_icon', 'icon-whatsapp-01.png')) === $icon ? 'checked' : '';
                                ?>
                                <label class="anicons-icon-label">
                                    <input type="radio"
                                           name="anicons_whatsapp_icon"
                                           value="<?php echo esc_attr($icon); ?>"
                                           <?php echo esc_attr($checked); ?>
                                           style="margin-right: 8px;">
                                    <span class="anicons-whatsapp-icon-<?php echo esc_attr($index); ?>"
                                          role="img"
                                          aria-label="<?php echo esc_attr($icon); ?>"></span>
                                </label>
                                <?php
                            }
                            ?>
                        </div>
                    </div>

                    <div class="anicons-section">
                        <label>
                            <div style="margin-bottom: 5px;"><span class="required">*</span> WhatsApp Number:</div>
                            <input type="text"
                                   name="anicons_whatsapp_number"
                                   value="<?php echo esc_attr(get_option('anicons_whatsapp_number', '')); ?>"
                                   placeholder="+1234567890"
                                   class="anicons-input">
                            <small style="display: block; margin-top: 5px; color: #6b7280;">If this field is left blank, the WhatsApp icon will not appear on the front end.</small>
                        </label>
                    </div>

                    <div class="anicons-section">
                        <div style="margin-bottom: 5px;">Position (Bottom | Left/Right):</div>
                        <div class="anicons-flex">
                            <input type="number"
                                   name="anicons_whatsapp_bottom"
                                   value="<?php echo esc_attr(get_option('anicons_whatsapp_bottom', '20')); ?>"
                                   placeholder="Bottom"
                                   class="anicons-input">
                            <input type="number"
                                   name="anicons_whatsapp_left"
                                   value="<?php echo esc_attr(get_option('anicons_whatsapp_left', '20')); ?>"
                                   placeholder="Left/Right"
                                   class="anicons-input">
                        </div>
                        <small style="display: block; margin-top: 5px; color: #6b7280;">Set the icon's distance from the bottom and Left/Right of the screen.</small>
                    </div>
                </div>

                <!-- Scroll-to-Top Icon Section -->
                <div class="anicons-column">
                    <h2 class="anicons-heading">Scroll to Top Icon</h2>
                    <div class="anicons-section">
                        <label style="display: flex; align-items: center;">
                            <input type="checkbox"
                                   name="anicons_scroll_enabled"
                                   value="yes"
                                   <?php checked(esc_attr(get_option('anicons_scroll_enabled', 'yes')), 'yes'); ?>
                                   style="margin-right: 8px;">
                            Enable Scroll-to-Top Icon
                        </label>
                    </div>

                    <div>
                        <div style="margin-bottom: 10px;">Select Scroll-to-Top Icon:</div>
                        <div class="anicons-icon-select">
                            <?php
                            // Scroll-to-Top Icon Styles
                            wp_register_style('anicons-scroll-preview', false, array(), '1.0.0');

                            $scroll_icons = ['icon-scroll-to-top-01.png', 'icon-scroll-to-top-02.png', 'icon-scroll-to-top-01.gif'];
                            $scroll_css = '';

                            foreach ($scroll_icons as $index => $icon) {
                                $icon_url = esc_url(plugin_dir_url(__FILE__) . 'assets/' . $icon);
                                $scroll_css .= "
                                    .anicons-scroll-icon-{$index} {
                                        display: block;
                                        width: 40px;
                                        height: 40px;
                                        background-image: url('{$icon_url}');
                                        background-size: contain;
                                        background-repeat: no-repeat;
                                        padding: 5px;
                                        border-radius: 4px;
                                    }
                                ";
                            }

                            // Sanitize CSS using wp_kses
                            $scroll_css = wp_kses($scroll_css, array(
                                'display' => array(),
                                'width' => array(),
                                'height' => array(),
                                'background-image' => array(),
                                'background-size' => array(),
                                'background-repeat' => array(),
                                'padding' => array(),
                                'border-radius' => array(),
                            ));

                            wp_add_inline_style('anicons-scroll-preview', $scroll_css);
                            wp_enqueue_style('anicons-scroll-preview');

                            foreach ($scroll_icons as $index => $icon) {
                                $checked = esc_attr(get_option('anicons_scroll_icon', 'icon-scroll-to-top-01.png')) === $icon ? 'checked' : '';
                                ?>
                                <label class="anicons-icon-label">
                                    <input type="radio"
                                           name="anicons_scroll_icon"
                                           value="<?php echo esc_attr($icon); ?>"
                                           <?php echo esc_attr($checked); ?>
                                           style="margin-right: 8px;">
                                    <span class="anicons-scroll-icon-<?php echo esc_attr($index); ?>"
                                          role="img"
                                          aria-label="<?php echo esc_attr($icon); ?>"></span>
                                </label>
                                <?php
                            }
                            ?>
                        </div>
                    </div>

                    <div class="anicons-section">
                        <div style="margin-bottom: 5px;">Position (Bottom | Left/Right):</div>
                        <div class="anicons-flex">
                            <input type="number"
                                   name="anicons_scroll_bottom"
                                   value="<?php echo esc_attr(get_option('anicons_scroll_bottom', '20')); ?>"
                                   placeholder="Bottom"
                                   class="anicons-input">
                            <input type="number"
                                   name="anicons_scroll_right"
                                   value="<?php echo esc_attr(get_option('anicons_scroll_right', '20')); ?>"
                                   placeholder="Left/Right"
                                   class="anicons-input">
                        </div>
                        <small style="display: block; margin-top: 5px; color: #6b7280;">Set the icon's distance from the bottom and Left/Right of the screen.</small>
                    </div>
                </div>
            </div>

            <!-- Icon Switch Section -->

            <div class="anicons-section">
                <br>
    <label class="toggle-button">
        <input type="checkbox"
               name="anicons_switch_enabled"
               value="yes"
               <?php checked(esc_attr(get_option('anicons_switch_enabled', 'yes')), 'yes'); ?>
               class="toggle-button-checkbox">
        <span class="toggle-button-slider"></span>
    </label>
    Move WhatsApp icon to the Right.
</div>




            <div style="margin-top: 20px;">
                <?php submit_button('Save Changes', 'primary', 'submit', false); ?>
            </div>
        </form>
    </div>
    <?php
}