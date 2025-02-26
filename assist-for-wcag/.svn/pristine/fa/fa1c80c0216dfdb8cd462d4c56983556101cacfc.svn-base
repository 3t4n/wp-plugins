<?php
/**
 * Plugin Name: Assist For WCAG
 * Plugin URI:  https://wcag.dock.codes
 * Description: Assist For WCAG ensures accessibility by meeting WCAG 2.1/2.2 standards, offering tools to customize content display for improved usability and inclusivity.
 * Version: 1.0.3
 * Author: Dock
 * Author URI: https://wcag.dock.codes
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: assist-for-wcag
 * Domain Path: /languages
 */

define('ASSIST_FOR_WCAG_DOMAIN', getenv('ASSIST_FOR_WCAG_DOMAIN') ?: 'https://wcag.dock.codes');

add_action('admin_menu', 'assist_for_wcag_add_admin_menu');
add_action('admin_init', 'assist_for_wcag_settings_init');

function assist_for_wcag_add_admin_menu() {
    add_menu_page(esc_attr__('Accessibility', 'assist-for-wcag'), esc_attr__('Accessibility', 'assist-for-wcag'), 'manage_options', 'accessibility-settings', 'assist_for_wcag_options_page', 'dashicons-universal-access');
}

function assist_for_wcag_sanitize($options)
{
    if ($options && is_array($options)) {
        foreach ($options as $key => $value) {
            $options[$key] = sanitize_text_field($value);
        }
    }
    return $options;
}
function assist_for_wcag_settings_init() {
    register_setting('assist_for_wcag_settings_group', 'assist_for_wcag_settings', 'assist_for_wcag_sanitize');

    add_settings_section(
        'assist_for_wcag_settings_general_section',
        esc_attr__('General settings', 'assist-for-wcag'),
        'assist_for_wcag_settings_general_section_callback',
        'assist_for_wcag_settings_group'
    );
    add_settings_section(
        'assist_for_wcag_settings_section',
        esc_attr__('Accessibility Options', 'assist-for-wcag'),
        'assist_for_wcag_settings_section_callback',
        'assist_for_wcag_settings_group'
    );
    add_settings_section(
        'assist_for_wcag_settings_custom_selectors_section',
        esc_attr__('Custom selectors', 'assist-for-wcag'),
        'assist_for_wcag_settings_custom_selectors_section_callback',
        'assist_for_wcag_settings_group'
    );

    add_settings_field(
        'assist_for_wcag_key',
        esc_attr__('Token', 'assist-for-wcag'),
        function () {
            assist_for_wcag_key_render();
            echo '<p class="description">' .
                esc_attr__('No token yet?', 'assist-for-wcag') .
                ' <a href="' . ASSIST_FOR_WCAG_DOMAIN . '" target="_blank" rel="noopener noreferrer">' .
                esc_attr__('Get your token here.', 'assist-for-wcag') .
                '</a></p>';
        },
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_general_section'
    );

    add_settings_field(
        'assist_for_wcag_load_widget',
        esc_attr__('Load widget', 'assist-for-wcag'),
        'assist_for_wcag_load_widget_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_general_section'
    );

    add_settings_field(
        'assist_for_wcag_primary_color',
        esc_attr__('Primary color', 'assist-for-wcag'),
        'assist_for_wcag_primary_color_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_general_section'
    );

    add_settings_field(
        'assist_for_wcag_secondary_color',
        esc_attr__('Secondary color', 'assist-for-wcag'),
        'assist_for_wcag_secondary_color_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_general_section'
    );

    add_settings_field(
        'assist_for_wcag_default_position',
        esc_attr__('Default position', 'assist-for-wcag'),
        'assist_for_wcag_default_position_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_general_section'
    );

    add_settings_field(
        'assist_for_wcag_max_zoom',
        esc_attr__('Maximum zoom level', 'assist-for-wcag'),
        'assist_for_wcag_max_zoom_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_section'
    );

    add_settings_field(
        'assist_for_wcag_contrast_option',
        esc_attr__('Enable contrast adjustment', 'assist-for-wcag'),
        'assist_for_wcag_contrast_option_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_section'
    );

    add_settings_field(
        'assist_for_wcag_invert_option',
        esc_attr__('Enable color inversion', 'assist-for-wcag'),
        'assist_for_wcag_invert_option_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_section'
    );

    add_settings_field(
        'assist_for_wcag_text_resize_option',
        esc_attr__('Enable text resizing', 'assist-for-wcag'),
        'assist_for_wcag_text_resize_option_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_section'
    );
    add_settings_field(
        'assist_for_wcag_underline_option',
        esc_attr__('Enable underline links', 'assist-for-wcag'),
        'assist_for_wcag_underline_option_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_section'
    );
    add_settings_field(
        'assist_for_wcag_letter_spacing_option',
        esc_attr__('Enable letter spacing adjustment', 'assist-for-wcag') . assist_for_wcag_premium_badge(),
        'assist_for_wcag_letter_spacing_option_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_section'
    );
    add_settings_field(
        'assist_for_wcag_line_height_option',
        esc_attr__('Enable line height adjustment', 'assist-for-wcag') . assist_for_wcag_premium_badge(),
        'assist_for_wcag_line_height_option_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_section'
    );
    add_settings_field(
        'assist_for_wcag_text_to_speech_option',
        esc_attr__('Enable text-to-speech', 'assist-for-wcag') . assist_for_wcag_premium_badge(),
        'assist_for_wcag_text_to_speech_option_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_section'
    );
    add_settings_field(
        'assist_for_wcag_saturation_option',
        esc_attr__('Enable color saturation adjustment', 'assist-for-wcag') . assist_for_wcag_premium_badge(),
        'assist_for_wcag_saturation_option_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_section'
    );
    add_settings_field(
        'assist_for_wcag_enlarge_cursor_option',
        esc_attr__('Enable cursor enlargement', 'assist-for-wcag') . assist_for_wcag_premium_badge(),
        'assist_for_wcag_enlarge_cursor_option_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_section'
    );
    add_settings_field(
        'assist_for_wcag_hide_media_option',
        esc_attr__('Enable hide media', 'assist-for-wcag') . assist_for_wcag_premium_badge(),
        'assist_for_wcag_hide_media_option_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_section'
    );
    add_settings_field(
        'assist_for_wcag_disable_animations_option',
        esc_attr__('Enable tun off of animations', 'assist-for-wcag') . assist_for_wcag_premium_badge(),
        'assist_for_wcag_disable_animations_option_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_section'
    );
    add_settings_field(
        'assist_for_wcag_show_line_option',
        esc_attr__('Enable reading line', 'assist-for-wcag') . assist_for_wcag_premium_badge(),
        'assist_for_wcag_show_line_option_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_section'
    );
    add_settings_field(
        'assist_for_wcag_dyslexic_option',
        esc_attr__('Enable dyslexia-friendly mode', 'assist-for-wcag') . assist_for_wcag_premium_badge(),
        'assist_for_wcag_dyslexic_option_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_section'
    );

    add_settings_field(
        'assist_for_wcag_contrast_selector',
        esc_attr__('Contrast button selector', 'assist-for-wcag'),
        'assist_for_wcag_contrast_selector_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_custom_selectors_section'
    );
    add_settings_field(
        'assist_for_wcag_invert_color_selector',
        esc_attr__('Selector to the color invert button', 'assist-for-wcag'),
        'assist_for_wcag_invert_color_selector_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_custom_selectors_section'
    );
    add_settings_field(
        'assist_for_wcag_text_increase_selector',
        esc_attr__('Text increase button selector', 'assist-for-wcag'),
        'assist_for_wcag_text_increase_selector_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_custom_selectors_section'
    );
    add_settings_field(
        'assist_for_wcag_text_decrease_selector',
        esc_attr__('Text decrease button selector', 'assist-for-wcag'),
        'assist_for_wcag_text_decrease_selector_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_custom_selectors_section'
    );
    add_settings_field(
        'assist_for_wcag_text_resize_selector',
        esc_attr__('Text resize button selector', 'assist-for-wcag'),
        'assist_for_wcag_text_resize_selector_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_custom_selectors_section'
    );
    add_settings_field(
        'assist_for_wcag_underline_selector',
        esc_attr__('Underline button selector', 'assist-for-wcag'),
        'assist_for_wcag_underline_selector_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_custom_selectors_section'
    );
    add_settings_field(
        'assist_for_wcag_letter_spacing_selector',
        esc_attr__('Letter spacing button selector', 'assist-for-wcag') . assist_for_wcag_premium_badge(),
        'assist_for_wcag_letter_spacing_selector_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_custom_selectors_section'
    );
    add_settings_field(
        'assist_for_wcag_line_height_selector',
        esc_attr__('Line height button selector', 'assist-for-wcag') . assist_for_wcag_premium_badge(),
        'assist_for_wcag_line_height_selector_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_custom_selectors_section'
    );
    add_settings_field(
        'assist_for_wcag_text_to_speech_selector',
        esc_attr__('Text-to-speech button selector', 'assist-for-wcag') . assist_for_wcag_premium_badge(),
        'assist_for_wcag_text_to_speech_selector_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_custom_selectors_section'
    );
    add_settings_field(
        'assist_for_wcag_saturation_selector',
        esc_attr__('Saturation button selector', 'assist-for-wcag') . assist_for_wcag_premium_badge(),
        'assist_for_wcag_saturation_selector_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_custom_selectors_section'
    );
    add_settings_field(
        'assist_for_wcag_enlarge_cursor_selector',
        esc_attr__('Selector for the enlarge cursor button', 'assist-for-wcag') . assist_for_wcag_premium_badge(),
        'assist_for_wcag_enlarge_cursor_selector_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_custom_selectors_section'
    );
    add_settings_field(
        'assist_for_wcag_hide_media_selector',
        esc_attr__('Selector for the hide media', 'assist-for-wcag') . assist_for_wcag_premium_badge(),
        'assist_for_wcag_hide_media_selector_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_custom_selectors_section'
    );
    add_settings_field(
        'assist_for_wcag_disable_animations_selector',
        esc_attr__('Disable animations button selector', 'assist-for-wcag') . assist_for_wcag_premium_badge(),
        'assist_for_wcag_disable_animations_selector_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_custom_selectors_section'
    );
    add_settings_field(
        'assist_for_wcag_show_line_selector',
        esc_attr__('Selector button displaying a line for reading', 'assist-for-wcag') . assist_for_wcag_premium_badge(),
        'assist_for_wcag_show_line_selector_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_custom_selectors_section'
    );
    add_settings_field(
        'assist_for_wcag_dyslexic_selector',
        esc_attr__('Dyslexic button selector', 'assist-for-wcag') . assist_for_wcag_premium_badge(),
        'assist_for_wcag_dyslexic_selector_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_custom_selectors_section'
    );
    add_settings_field(
        'assist_for_wcag_motor_impaired_selector',
        esc_attr__('Motor-impaired button selector', 'assist-for-wcag') . assist_for_wcag_premium_badge(),
        'assist_for_wcag_motor_impaired_selector_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_custom_selectors_section'
    );
    add_settings_field(
        'assist_for_wcag_adhd_selector',
        esc_attr__('ADHD button selector', 'assist-for-wcag') . assist_for_wcag_premium_badge(),
        'assist_for_wcag_adhd_selector_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_custom_selectors_section'
    );
    add_settings_field(
        'assist_for_wcag_blind_selector',
        esc_attr__('Blind button selector', 'assist-for-wcag') . assist_for_wcag_premium_badge(),
        'assist_for_wcag_blind_selector_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_custom_selectors_section'
    );
    add_settings_field(
        'assist_for_wcag_cognitive_and_learning_selector',
        esc_attr__('Cognitive and learning button selector', 'assist-for-wcag') . assist_for_wcag_premium_badge(),
        'assist_for_wcag_cognitive_and_learning_selector_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_custom_selectors_section'
    );
    add_settings_field(
        'assist_for_wcag_color_blind_selector',
        esc_attr__('Color-blind button selector', 'assist-for-wcag') . assist_for_wcag_premium_badge(),
        'assist_for_wcag_color_blind_selector_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_custom_selectors_section'
    );
    add_settings_field(
        'assist_for_wcag_dyslexia_selector',
        esc_attr__('Dyslexia button selector', 'assist-for-wcag') . assist_for_wcag_premium_badge(),
        'assist_for_wcag_dyslexia_selector_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_custom_selectors_section'
    );
    add_settings_field(
        'assist_for_wcag_epileptic_selector',
        esc_attr__('Epileptic button selector', 'assist-for-wcag') . assist_for_wcag_premium_badge(),
        'assist_for_wcag_epileptic_selector_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_custom_selectors_section'
    );
    add_settings_field(
        'assist_for_wcag_low_vision_selector',
        esc_attr__('Low-vision button selector', 'assist-for-wcag') . assist_for_wcag_premium_badge(),
        'assist_for_wcag_low_vision_selector_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_custom_selectors_section'
    );
    add_settings_field(
        'assist_for_wcag_reset_selector',
        esc_attr__('Reset button selector', 'assist-for-wcag'),
        'assist_for_wcag_reset_selector_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_custom_selectors_section'
    );
    add_settings_field(
        'assist_for_wcag_statement_selector',
        esc_attr__('Selector to display availability statement', 'assist-for-wcag'),
        'assist_for_wcag_statement_selector_render',
        'assist_for_wcag_settings_group',
        'assist_for_wcag_settings_custom_selectors_section'
    );
}

function assist_for_wcag_plugins_loaded() {
    load_plugin_textdomain( 'assist-for-wcag', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

add_action( 'plugins_loaded', 'assist_for_wcag_plugins_loaded' );

function assist_for_wcag_premium_badge() {
    return ' <small style="color: #b32d2e;">(' . esc_attr__('Premium', 'assist-for-wcag') . ')</small>';
}

function assist_for_wcag_admin_script($hook) {
    if ($hook === 'toplevel_page_accessibility-settings') {
        wp_enqueue_script(
            'assist-for-wcag-admin-js',
            plugins_url('assist-for-wcag/assets/js/admin.js'),
            [],
            '1.0.0',
            true
        );
    }
}
function assist_for_wcag_wp_script() {
    $options = get_option('assist_for_wcag_settings');
    $token = trim((empty($options['assist_for_wcag_key']) ? '' : $options['assist_for_wcag_key']));

    if ($token) {
        wp_register_script(
            'assist-for-wcag-front',
            ASSIST_FOR_WCAG_DOMAIN."/accessibility/$token/start.js?t=".time(),
            [],
            null,
            true
        );
        wp_add_inline_script('assist-for-wcag-front',
            sprintf('window.accessibility=%s;', json_encode(assist_for_wcag_options())), 'before');

        wp_enqueue_script('assist-for-wcag-front');
    }
}

add_action('admin_enqueue_scripts', 'assist_for_wcag_admin_script');
add_action('wp_enqueue_scripts', 'assist_for_wcag_wp_script');

function assist_for_wcag_contrast_option_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='checkbox' name='assist_for_wcag_settings[assist_for_wcag_contrast_option]' <?php echo checked(isset($options['assist_for_wcag_contrast_option']) ? $options['assist_for_wcag_contrast_option'] : true, 1) ?> class="assist_for_wcag_load_widget" value='1'>
    <?php
}

function assist_for_wcag_invert_option_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='checkbox' name='assist_for_wcag_settings[assist_for_wcag_invert_option]' <?php echo checked(isset($options['assist_for_wcag_invert_option']) ? $options['assist_for_wcag_invert_option'] : true, 1) ?> class="assist_for_wcag_load_widget" value='1'>
    <?php
}

function assist_for_wcag_text_resize_option_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='checkbox' name='assist_for_wcag_settings[assist_for_wcag_text_resize_option]' <?php echo checked(isset($options['assist_for_wcag_text_resize_option']) ? $options['assist_for_wcag_text_resize_option'] : true, 1) ?> class="assist_for_wcag_load_widget" value='1'>
    <?php
}
function assist_for_wcag_underline_option_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='checkbox' name='assist_for_wcag_settings[assist_for_wcag_underline_option]' <?php echo checked(isset($options['assist_for_wcag_underline_option']) ? $options['assist_for_wcag_underline_option'] : true, 1) ?> class="assist_for_wcag_load_widget" value='1'>
    <?php
}
function assist_for_wcag_letter_spacing_option_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='checkbox' name='assist_for_wcag_settings[assist_for_wcag_letter_spacing_option]' <?php echo checked(!empty($options['assist_for_wcag_letter_spacing_option']) ? $options['assist_for_wcag_letter_spacing_option'] : true, 1) ?> class="assist_for_wcag_load_widget" value='1'>
    <?php
}
function assist_for_wcag_line_height_option_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='checkbox' name='assist_for_wcag_settings[assist_for_wcag_line_height_option]' <?php echo checked(isset($options['assist_for_wcag_line_height_option']) ? $options['assist_for_wcag_line_height_option'] : true, 1) ?> class="assist_for_wcag_load_widget" value='1'>
    <?php
}
function assist_for_wcag_text_to_speech_option_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='checkbox' name='assist_for_wcag_settings[assist_for_wcag_text_to_speech_option]' <?php echo checked(isset($options['assist_for_wcag_text_to_speech_option']) ? $options['assist_for_wcag_text_to_speech_option'] : true, 1) ?> class="assist_for_wcag_load_widget" value='1'>
    <?php
}
function assist_for_wcag_saturation_option_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='checkbox' name='assist_for_wcag_settings[assist_for_wcag_saturation_option]' <?php echo checked(isset($options['assist_for_wcag_saturation_option']) ? $options['assist_for_wcag_saturation_option'] : true, 1) ?> class="assist_for_wcag_load_widget" value='1'>
    <?php
}
function assist_for_wcag_enlarge_cursor_option_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='checkbox' name='assist_for_wcag_settings[assist_for_wcag_enlarge_cursor_option]' <?php echo checked(isset($options['assist_for_wcag_enlarge_cursor_option']) ? $options['assist_for_wcag_enlarge_cursor_option'] : true, 1) ?> class="assist_for_wcag_load_widget" value='1'>
    <?php
}
function assist_for_wcag_hide_media_option_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='checkbox' name='assist_for_wcag_settings[assist_for_wcag_hide_media_option]' <?php echo checked(isset($options['assist_for_wcag_hide_media_option']) ? $options['assist_for_wcag_hide_media_option'] : true, 1) ?> class="assist_for_wcag_load_widget" value='1'>
    <?php
}
function assist_for_wcag_disable_animations_option_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='checkbox' name='assist_for_wcag_settings[assist_for_wcag_disable_animations_option]' <?php echo checked(isset($options['assist_for_wcag_disable_animations_option']) ? $options['assist_for_wcag_disable_animations_option'] : true, 1) ?> class="assist_for_wcag_load_widget" value='1'>
    <?php
}
function assist_for_wcag_show_line_option_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='checkbox' name='assist_for_wcag_settings[assist_for_wcag_show_line_option]' <?php echo checked(isset($options['assist_for_wcag_show_line_option']) ? $options['assist_for_wcag_show_line_option'] : true, 1) ?> class="assist_for_wcag_load_widget" value='1'>
    <?php
}
function assist_for_wcag_dyslexic_option_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='checkbox' name='assist_for_wcag_settings[assist_for_wcag_dyslexic_option]' <?php echo checked(isset($options['assist_for_wcag_dyslexic_option']) ? $options['assist_for_wcag_dyslexic_option'] : true, 1) ?> class="assist_for_wcag_load_widget" value='1'>
    <?php
}
function assist_for_wcag_contrast_selector_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='text' name='assist_for_wcag_settings[assist_for_wcag_contrast_selector]' value='<?php echo empty($options['assist_for_wcag_contrast_selector']) ? '' : esc_attr($options['assist_for_wcag_contrast_selector']) ?>'>
    <?php
}
function assist_for_wcag_invert_color_selector_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='text' name='assist_for_wcag_settings[assist_for_wcag_invert_color_selector]' value='<?php echo empty($options['assist_for_wcag_invert_color_selector']) ? '' : esc_attr($options['assist_for_wcag_invert_color_selector']) ?>'>
    <?php
}
function assist_for_wcag_text_increase_selector_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='text' name='assist_for_wcag_settings[assist_for_wcag_text_increase_selector]' value='<?php echo empty($options['assist_for_wcag_text_increase_selector']) ? '' : esc_attr($options['assist_for_wcag_text_increase_selector']) ?>'>
    <?php
}
function assist_for_wcag_text_decrease_selector_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='text' name='assist_for_wcag_settings[assist_for_wcag_text_decrease_selector]' value='<?php echo empty($options['assist_for_wcag_text_decrease_selector']) ? '' : esc_attr($options['assist_for_wcag_text_decrease_selector']) ?>'>
    <?php
}
function assist_for_wcag_text_resize_selector_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='text' name='assist_for_wcag_settings[assist_for_wcag_text_resize_selector]' value='<?php echo empty($options['assist_for_wcag_text_resize_selector']) ? '' : esc_attr($options['assist_for_wcag_text_resize_selector']) ?>'>
    <?php
}
function assist_for_wcag_underline_selector_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='text' name='assist_for_wcag_settings[assist_for_wcag_underline_selector]' value='<?php echo empty($options['assist_for_wcag_underline_selector']) ? '' : esc_attr($options['assist_for_wcag_underline_selector']) ?>'>
    <?php
}
function assist_for_wcag_letter_spacing_selector_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='text' name='assist_for_wcag_settings[assist_for_wcag_letter_spacing_selector]' value='<?php echo empty($options['assist_for_wcag_letter_spacing_selector']) ? '' : esc_attr($options['assist_for_wcag_letter_spacing_selector']) ?>'>
    <?php
}
function assist_for_wcag_line_height_selector_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='text' name='assist_for_wcag_settings[assist_for_wcag_line_height_selector]' value='<?php echo empty($options['assist_for_wcag_line_height_selector']) ? '' : esc_attr($options['assist_for_wcag_line_height_selector']) ?>'>
    <?php
}
function assist_for_wcag_text_to_speech_selector_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='text' name='assist_for_wcag_settings[assist_for_wcag_text_to_speech_selector]' value='<?php echo empty($options['assist_for_wcag_text_to_speech_selector']) ? '' : esc_attr($options['assist_for_wcag_text_to_speech_selector']) ?>'>
    <?php
}
function assist_for_wcag_saturation_selector_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='text' name='assist_for_wcag_settings[assist_for_wcag_saturation_selector]' value='<?php echo empty($options['assist_for_wcag_saturation_selector']) ? '' : esc_attr($options['assist_for_wcag_saturation_selector']) ?>'>
    <?php
}
function assist_for_wcag_enlarge_cursor_selector_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='text' name='assist_for_wcag_settings[assist_for_wcag_enlarge_cursor_selector]' value='<?php echo empty($options['assist_for_wcag_enlarge_cursor_selector']) ? '' : esc_attr($options['assist_for_wcag_enlarge_cursor_selector']) ?>'>
    <?php
}
function assist_for_wcag_hide_media_selector_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='text' name='assist_for_wcag_settings[assist_for_wcag_hide_media_selector]' value='<?php echo empty($options['assist_for_wcag_hide_media_selector']) ? '' : esc_attr($options['assist_for_wcag_hide_media_selector']) ?>'>
    <?php
}
function assist_for_wcag_disable_animations_selector_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='text' name='assist_for_wcag_settings[assist_for_wcag_disable_animations_selector]' value='<?php echo empty($options['assist_for_wcag_disable_animations_selector']) ? '' : esc_attr($options['assist_for_wcag_disable_animations_selector']) ?>'>
    <?php
}
function assist_for_wcag_show_line_selector_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='text' name='assist_for_wcag_settings[assist_for_wcag_show_line_selector]' value='<?php echo empty($options['assist_for_wcag_show_line_selector']) ? '' : esc_attr($options['assist_for_wcag_show_line_selector']) ?>'>
    <?php
}
function assist_for_wcag_dyslexic_selector_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='text' name='assist_for_wcag_settings[assist_for_wcag_dyslexic_selector]' value='<?php echo empty($options['assist_for_wcag_dyslexic_selector']) ? '' : esc_attr($options['assist_for_wcag_dyslexic_selector']) ?>'>
    <?php
}
function assist_for_wcag_motor_impaired_selector_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='text' name='assist_for_wcag_settings[assist_for_wcag_motor_impaired_selector]' value='<?php echo empty($options['assist_for_wcag_motor_impaired_selector']) ? '' : esc_attr($options['assist_for_wcag_motor_impaired_selector']) ?>'>
    <?php
}
function assist_for_wcag_adhd_selector_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='text' name='assist_for_wcag_settings[assist_for_wcag_adhd_selector]' value='<?php echo empty($options['assist_for_wcag_adhd_selector']) ? '' : esc_attr($options['assist_for_wcag_adhd_selector']) ?>'>
    <?php
}
function assist_for_wcag_blind_selector_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='text' name='assist_for_wcag_settings[assist_for_wcag_blind_selector]' value='<?php echo empty($options['assist_for_wcag_blind_selector']) ? '' : esc_attr($options['assist_for_wcag_blind_selector']) ?>'>
    <?php
}
function assist_for_wcag_cognitive_and_learning_selector_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='text' name='assist_for_wcag_settings[assist_for_wcag_cognitive_and_learning_selector]' value='<?php echo empty($options['assist_for_wcag_cognitive_and_learning_selector']) ? '' : esc_attr($options['assist_for_wcag_cognitive_and_learning_selector']) ?>'>
    <?php
}
function assist_for_wcag_color_blind_selector_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='text' name='assist_for_wcag_settings[assist_for_wcag_color_blind_selector]' value='<?php echo empty($options['assist_for_wcag_color_blind_selector']) ? '' : esc_attr($options['assist_for_wcag_color_blind_selector']) ?>'>
    <?php
}
function assist_for_wcag_dyslexia_selector_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='text' name='assist_for_wcag_settings[assist_for_wcag_dyslexia_selector]' value='<?php echo empty($options['assist_for_wcag_dyslexia_selector']) ? '' : esc_attr($options['assist_for_wcag_dyslexia_selector']) ?>'>
    <?php
}
function assist_for_wcag_epileptic_selector_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='text' name='assist_for_wcag_settings[assist_for_wcag_epileptic_selector]' value='<?php echo empty($options['assist_for_wcag_epileptic_selector']) ? '' : esc_attr($options['assist_for_wcag_epileptic_selector']) ?>'>
    <?php
}
function assist_for_wcag_low_vision_selector_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='text' name='assist_for_wcag_settings[assist_for_wcag_low_vision_selector]' value='<?php echo empty($options['assist_for_wcag_low_vision_selector']) ? '' : esc_attr($options['assist_for_wcag_low_vision_selector']) ?>'>
    <?php
}
function assist_for_wcag_reset_selector_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='text' name='assist_for_wcag_settings[assist_for_wcag_reset_selector]' value='<?php echo empty($options['assist_for_wcag_reset_selector']) ? '' : esc_attr($options['assist_for_wcag_reset_selector']) ?>'>
    <?php
}
function assist_for_wcag_statement_selector_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='text' name='assist_for_wcag_settings[assist_for_wcag_statement_selector]' value='<?php echo empty($options['assist_for_wcag_statement_selector']) ? '' : esc_attr($options['assist_for_wcag_statement_selector']) ?>'>
    <?php
}

function assist_for_wcag_load_widget_render() {
    $options = get_option('assist_for_wcag_settings', []);
    ?>
    <input type='checkbox' name='assist_for_wcag_settings[assist_for_wcag_load_widget]' <?php echo checked(isset($options['assist_for_wcag_load_widget']) ? $options['assist_for_wcag_load_widget'] : true); ?> value='1' id="assist_for_wcag_load_widget">
    <?php
}
function assist_for_wcag_primary_color_render() {
    $options = get_option('assist_for_wcag_settings', []);
    ?>
    <div>
        <input type='color' data-default="#0021C8" name='assist_for_wcag_settings[assist_for_wcag_primary_color]' value='<?php echo empty($options['assist_for_wcag_primary_color']) ? '#0021C8' : esc_attr($options['assist_for_wcag_primary_color']) ?>' id="assist_for_wcag_primary_color" class="assist_for_wcag_load_widget">
        <button type="button" class="assist-for-wcag-btn-reset"><?php echo esc_attr__('Restore default', 'assist-for-wcag') ?></button>
    </div>
    <?php
}
function assist_for_wcag_secondary_color_render() {
    $options = get_option('assist_for_wcag_settings', []);
    ?>
    <div>
        <input type='color' data-default='#000243' name='assist_for_wcag_settings[assist_for_wcag_secondary_color]' value='<?php echo empty($options['assist_for_wcag_secondary_color']) ? '#000243' : esc_attr($options['assist_for_wcag_secondary_color']) ?>' id="assist_for_wcag_primary_color" class="assist_for_wcag_load_widget">
        <button type="button" class="assist-for-wcag-btn-reset"><?php echo esc_attr__('Restore default', 'assist-for-wcag') ?></button>
    </div>
    <?php
}
function assist_for_wcag_default_position_render() {
    $options = get_option('assist_for_wcag_settings', []);
    ?>
        <select name="assist_for_wcag_settings[assist_for_wcag_default_position]" class="assist_for_wcag_load_widget">
            <option value="right"<?php echo isset($options['assist_for_wcag_default_position']) && $options['assist_for_wcag_default_position'] === 'right' ? ' selected' : ''?>><?php echo esc_attr__('Show on right', 'assist-for-wcag') ?></option>
            <option value="left"<?php echo isset($options['assist_for_wcag_default_position']) && $options['assist_for_wcag_default_position'] === 'left' ? ' selected' : ''?>><?php echo esc_attr__('Show on left', 'assist-for-wcag') ?></option>
        </select>
    <?php
}
function assist_for_wcag_max_zoom_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='number' min="1" max="5" name='assist_for_wcag_settings[assist_for_wcag_max_zoom]' value="<?php echo empty($options['assist_for_wcag_max_zoom']) ? 5 : esc_attr($options['assist_for_wcag_max_zoom']); ?>">
    <?php
}
function assist_for_wcag_key_render() {
    $options = get_option('assist_for_wcag_settings');
    ?>
    <input type='text' name='assist_for_wcag_settings[assist_for_wcag_key]' value='<?php echo empty($options['assist_for_wcag_key']) ? '' : esc_attr($options['assist_for_wcag_key']) ?>'>
    <?php
}

function assist_for_wcag_settings_section_callback() {
    echo esc_attr__('Configure accessibility options for your site.', 'assist-for-wcag');
}

function assist_for_wcag_settings_custom_selectors_section_callback() {
    echo '';
}
function assist_for_wcag_settings_general_section_callback() {
    echo '';
}

function assist_for_wcag_options_page() {
    ?>
    <form action='options.php' method='post'>
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <?php
        settings_fields('assist_for_wcag_settings_group');
        do_settings_sections('assist_for_wcag_settings_group');
        submit_button();
        ?>
    </form>
    <?php
}


function assist_for_wcag_options() {
    $options = get_option('assist_for_wcag_settings');

    $maxZoom = !empty($options['assist_for_wcag_max_zoom']) ? $options['assist_for_wcag_max_zoom'] : 5;
    $hideContrast = !empty($options['assist_for_wcag_contrast_option']);
    $hideInvert = !empty($options['assist_for_wcag_invert_option']);
    $hideResize = !empty($options['assist_for_wcag_text_resize_option']);
    $underline = !empty($options['assist_for_wcag_underline_option']);
    $letterSpacing = !empty($options['assist_for_wcag_letter_spacing_option']);
    $lineHeight = !empty($options['assist_for_wcag_line_height_option']);
    $textToSpeech = !empty($options['assist_for_wcag_text_to_speech_option']);
    $saturation = !empty($options['assist_for_wcag_saturation_option']);
    $enlargeCursor = !empty($options['assist_for_wcag_enlarge_cursor_option']);
    $hideMedia = !empty($options['assist_for_wcag_hide_media_option']);
    $disableAnimations = !empty($options['assist_for_wcag_disable_animations_option']);
    $showLine = !empty($options['assist_for_wcag_show_line_option']);
    $dyslexic = !empty($options['assist_for_wcag_dyslexic_option']);
    $loadWidget = !empty($options['assist_for_wcag_load_widget']);
    $contrastSelector = empty($options['assist_for_wcag_contrast_selector']) ? '' : $options['assist_for_wcag_contrast_selector'];
    $invertColorSelector = empty($options['assist_for_wcag_invert_color_selector']) ? '' : $options['assist_for_wcag_invert_color_selector'];
    $increaseSelector = empty($options['assist_for_wcag_text_increase_selector']) ? '' : $options['assist_for_wcag_text_increase_selector'];
    $decreaseSelector = empty($options['assist_for_wcag_text_decrease_selector']) ? '' : $options['assist_for_wcag_text_decrease_selector'];
    $textResizeSelector = empty($options['assist_for_wcag_text_resize_selector']) ? '' : $options['assist_for_wcag_text_resize_selector'];
    $showLineSelector = empty($options['assist_for_wcag_show_line_selector']) ? '' : $options['assist_for_wcag_show_line_selector'];
    $underlineSelector = empty($options['assist_for_wcag_underline_selector']) ? '' : $options['assist_for_wcag_underline_selector'];
    $lineHeightSelector = empty($options['assist_for_wcag_line_height_selector']) ? '' : $options['assist_for_wcag_line_height_selector'];
    $letterSpacingSelector = empty($options['assist_for_wcag_letter_spacing_selector']) ? '' : $options['assist_for_wcag_letter_spacing_selector'];
    $textToSpeechSelector = empty($options['assist_for_wcag_text_to_speech_selector']) ? '' : $options['assist_for_wcag_text_to_speech_selector'];
    $saturationSelector = empty($options['assist_for_wcag_saturation_selector']) ? '' : $options['assist_for_wcag_saturation_selector'];
    $enlargeCursorSelector = empty($options['assist_for_wcag_enlarge_cursor_selector']) ? '' : $options['assist_for_wcag_enlarge_cursor_selector'];
    $hideMediaSelector = empty($options['assist_for_wcag_hide_media_selector']) ? '' : $options['assist_for_wcag_hide_media_selector'];
    $dyslexicSelector = empty($options['assist_for_wcag_dyslexic_selector']) ? '' : $options['assist_for_wcag_dyslexic_selector'];
    $disableAnimationsSelector = empty($options['assist_for_wcag_disable_animations_selector']) ? '' : $options['assist_for_wcag_disable_animations_selector'];
    $motorImpairedSelector = empty($options['assist_for_wcag_motor_impaired_selector']) ? '' : $options['assist_for_wcag_motor_impaired_selector'];
    $adhdSelector = empty($options['assist_for_wcag_adhd_selector']) ? '' : $options['assist_for_wcag_adhd_selector'];
    $blindSelector = empty($options['assist_for_wcag_blind_selector']) ? '' : $options['assist_for_wcag_blind_selector'];
    $cognitiveAndLearningSelector = empty($options['assist_for_wcag_cognitive_and_learning_selector']) ? '' : $options['assist_for_wcag_cognitive_and_learning_selector'];
    $colorBlindSelector = empty($options['assist_for_wcag_color_blind_selector']) ? '' : $options['assist_for_wcag_color_blind_selector'];
    $dyslexiaSelector = empty($options['assist_for_wcag_dyslexia_selector']) ? '' : $options['assist_for_wcag_dyslexia_selector'];
    $epilepticSelector = empty($options['assist_for_wcag_epileptic_selector']) ? '' : $options['assist_for_wcag_epileptic_selector'];
    $lowVisionSelector = empty($options['assist_for_wcag_low_vision_selector']) ? '' : $options['assist_for_wcag_low_vision_selector'];
    $resetSelector = empty($options['assist_for_wcag_reset_selector']) ? '' : $options['assist_for_wcag_reset_selector'];
    $statementSelector = empty($options['assist_for_wcag_statement_selector']) ? '' : $options['assist_for_wcag_statement_selector'];
    $primaryColor = empty($options['assist_for_wcag_primary_color']) ? null : $options['assist_for_wcag_primary_color'];
    $secondaryColor = empty($options['assist_for_wcag_secondary_color']) ? null : $options['assist_for_wcag_secondary_color'];
    $token = (empty($options['assist_for_wcag_key']) ? '' : $options['assist_for_wcag_key']);
    $defaultPosition = (empty($options['assist_for_wcag_default_position']) ? 'right' : $options['assist_for_wcag_default_position']);

    return [
        'options' => [
           'contrast' => $hideContrast,
           'invertColor' => $hideInvert,
           'fontSize' => $hideResize,
           'underline' => $underline,
           'letterSpacing' => $letterSpacing,
           'lineHeight' => $lineHeight,
           'textToSpeech' => $textToSpeech,
           'saturation' => $saturation,
           'enlargeCursor' => $enlargeCursor,
           'hideMedia' => $hideMedia,
           'disableAnimations' => $disableAnimations,
           'showLine' => $showLine,
           'dyslexic' => $dyslexic,
        ],
        'token' => $token,
        'widget' => $loadWidget,
        'maxZoom' => $maxZoom,
        'position' => $defaultPosition,
        'host' => ASSIST_FOR_WCAG_DOMAIN,
        'selectors' => [
            'invertColor' => $invertColorSelector,
            'contrast' => $contrastSelector,
            'increase' => $increaseSelector,
            'decrease' => $decreaseSelector,
            'textResize' => $textResizeSelector,
            'showLine' => $showLineSelector,
            'lineHeight' => $lineHeightSelector,
            'letterSpacing' => $letterSpacingSelector,
            'underline' => $underlineSelector,
            'textToSpeech' => $textToSpeechSelector,
            'saturation' => $saturationSelector,
            'enlargeCursor' => $enlargeCursorSelector,
            'hideMedia' => $hideMediaSelector,
            'dyslexic' => $dyslexicSelector,
            'disableAnimations' => $disableAnimationsSelector,
            'motorImpaired' => $motorImpairedSelector,
            'adhd' => $adhdSelector,
            'blind' => $blindSelector,
            'cognitiveAndLearning' => $cognitiveAndLearningSelector,
            'colorBlind' => $colorBlindSelector,
            'dyslexia' => $dyslexiaSelector,
            'epileptic' => $epilepticSelector,
            'lowVision' => $lowVisionSelector,
            'reset' => $resetSelector,
            'statement' => $statementSelector,
        ],
        'colors' => [
            'primary' => $primaryColor,
            'secondary' => $secondaryColor,
        ],
    ];
}
