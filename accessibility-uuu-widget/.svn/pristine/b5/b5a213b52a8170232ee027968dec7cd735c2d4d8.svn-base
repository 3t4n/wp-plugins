<?php
/**
 * Accessibility UUU Widget
 *
 * @package       ACCESSIBIL
 * @author        Toitx
 * @version       1.0.2
 * @license       GPL-3.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:   Accessibility UUU Widget
 * Plugin URI:    https://wordpress.org/plugins/accessibility-uuu-widget
 * Description:   This plugin integrates with a third-party service provided by UUU. By installing and using this plugin, a script from UUU will be embedded into your WordPress site. This script is used to enhance website accessibility and improve user experience.
 * Version:       1.0.2
 * Author:        Toitx
 * Author URI:    https://uuu.user-a11y.com
 * License:       GPL v3 or later
 * License URI:   http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:   accessibility-uuu-widget
 * Domain Path:   /languages
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
// Plugin name
define( 'ACCESSIBIL_NAME',			'Accessibility UUU Widget' );

// Plugin version
define( 'ACCESSIBIL_VERSION',		'1.0.2' );

// Plugin Root File
define( 'ACCESSIBIL_PLUGIN_FILE',	__FILE__ );

// Plugin base
define( 'ACCESSIBIL_PLUGIN_BASE',	plugin_basename( ACCESSIBIL_PLUGIN_FILE ) );

// Plugin Folder Path
define( 'ACCESSIBIL_PLUGIN_DIR',	plugin_dir_path( ACCESSIBIL_PLUGIN_FILE ) );

// Plugin Folder URL
define( 'ACCESSIBIL_PLUGIN_URL',	plugin_dir_url( ACCESSIBIL_PLUGIN_FILE ) );

/**
 * Load the main class for the core functionality
 */
require_once ACCESSIBIL_PLUGIN_DIR . 'core/class-accessibility-uuu-widget.php';

/**
 * The main function to load the only instance
 * of our master class.
 *
 * @author  Toitx
 * @since   1.0.2
 * @return  object|Accessibility_Uuu_Widget
 */
function ACCESSIBIL() {
	return Accessibility_Uuu_Widget::instance();
}

ACCESSIBIL();

// Start here
// Register and sanitize input field
function uuuaccessibility_text_display_settings() {
    register_setting(
        'uuuaccessibility_text_display_options',
        'uuuaccessibility_text_display',
        'sanitize_text_field'
    );

    add_settings_section(
        'uuuaccessibility_text_display_section',
        'Type your API key here',
        'uuuaccessibility_text_display_section_callback',
        'uuuaccessibility-text-display'
    );

    add_settings_field(
        'uuuaccessibility_text_display_input',
        'API key',
        'uuuaccessibility_text_display_input_callback',
        'uuuaccessibility-text-display',
        'uuuaccessibility_text_display_section'
    );
}
add_action('admin_init', 'uuuaccessibility_text_display_settings');

// Render input field
function uuuaccessibility_text_display_input_callback() {
    $value = get_option('uuuaccessibility_text_display');
    echo '<input type="text" name="uuuaccessibility_text_display" value="' . esc_attr($value) . '" style="width: 100%;" />';
}

function uuuaccessibility_admin_styles() {
    $version = '1.0.2';
    wp_register_style(
        'uuuaccessibility-admin-style',
        false,
        array(),
        $version
    );

    wp_enqueue_style('uuuaccessibility-admin-style');

    $inline_style = '
        .uuuaccessibility-text-display .uuuaccessibility_text_display_input_label {
            width: 100px;
            display: inline-block;
        }
    ';

    wp_add_inline_style('uuuaccessibility-admin-style', $inline_style);
}
add_action('admin_head', 'uuuaccessibility_admin_styles');

// Render section callback
function uuuaccessibility_text_display_section_callback() {
    echo 'Enter the API key you registered here to use the Universal Usability for U service!';
}

function uuuaccessibility_display_script() {
    $api_key = get_option('uuuaccessibility_text_display');
    $script_version = '1.0.2';

    wp_register_script(
        'uuuaccessibility-a11y-script',
        'https://uuu.user-a11y.com/assets/js/a11y/script.min.js',
        array(),
        $script_version,
        true
    );

    wp_enqueue_script('uuuaccessibility-a11y-script');

    $inline_script = 'document.addEventListener("DOMContentLoaded", function() {';
    $inline_script .= 'var script = document.querySelector(\'script[src^="https://uuu.user-a11y.com/assets/js/a11y/script.min.js"]\');';
    $inline_script .= 'if (script) {';
    $inline_script .= '  script.setAttribute("uuu_a11y_apikey", "' . esc_attr($api_key) . '");';
    $inline_script .= '}';
    $inline_script .= '});';

    wp_add_inline_script('uuuaccessibility-a11y-script', $inline_script, 'after');
}
add_action('wp_footer', 'uuuaccessibility_display_script');

// Display menu page
function uuuaccessibility_tts_display_menu_page() {
    $plugin_url = plugin_dir_url(__FILE__);
    add_menu_page(
        'UUU',
        'UUU',
        'manage_options',
        'uuuaccessibility_tts',
        'uuuaccessibility_script_tts',
        $plugin_url . 'assets/icon.png'
    );
}
add_action('admin_menu', 'uuuaccessibility_tts_display_menu_page');

// Render menu page content
function uuuaccessibility_script_tts() {
    $plugin_url = plugin_dir_url(__FILE__);
    ?>
    <div class="wrap">
        <h2>UUU Widget Setting</h2>
        <form method="post" action="options.php">
            <?php settings_fields('uuuaccessibility_text_display_options'); ?>
            <?php do_settings_sections('uuuaccessibility-text-display'); ?>
            <?php submit_button('Save'); ?>
            <p style="margin-top: 20px; font-style: italic; line-height: 1.6;">
                <p>This plugin integrates with a third-party service provided by UUU. By installing and using this plugin, a script from UUU will be embedded into your WordPress site. This script is used to enhance website accessibility and improve user experience.</p>
                <p>For more information, you can visit the service page at <a href="https://uuu.user-a11y.com" target="_blank">here</a>.</p>
                <p>You can review the terms of use and privacy policies of UUU at the following links: <a href="https://uuu.user-a11y.com/terms.html" target="_blank">[Terms of Use]</a> and <a href="https://uuu.user-a11y.com/privacy.html" target="_blank">[Privacy Policy]</a></p>
                <p>To use the Universal Usability for U service, please follow these steps:</p>
                <ol style="margin-top: 10px; font-weight: bold; font-size: 14px;">
                    <li>
                        Register an account at
                        <a href="https://user-a11y.com/auth/register" target="_blank">https://user-a11y.com/auth/register</a>.<br>
                        <a href="https://user-a11y.com/auth/login" target="_blank">
                            <img src="<?php echo esc_url($plugin_url . 'assets/register.png'); ?>" alt="Register Page" style="width: 50%; height: auto; margin-top: 10px;">
                        </a><br>
                        If you already have an account, you can log in at 
                        <a href="https://user-a11y.com/auth/login" target="_blank">https://user-a11y.com/auth/login</a>.
                        <br>
                        <a href="https://user-a11y.com/auth/login" target="_blank">
                            <img src="<?php echo esc_url($plugin_url . 'assets/login.png'); ?>" alt="Login Page" style="width: 50%; height: auto; margin-top: 10px;">
                        </a>
                    </li>
                    <li>
                        Register your domain at
                        <a href="https://user-a11y.com/domain/website" target="_blank">https://user-a11y.com/domain/website</a>.
                        <br>
                        <a href="https://user-a11y.com/auth/register" target="_blank">
                            <img src="<?php echo esc_url($plugin_url . 'assets/domain.png'); ?>" alt="Registration Page" style="width: 50%; height: auto; margin-top: 10px;">
                        </a>
                    </li>
                    <li>
                        Copy the API key from the dashboard and paste it into the input field above. Then click "Save".
                    </li>
                </ol>
            </p>
        </form>
    </div>
    <?php
}
