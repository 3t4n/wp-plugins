<?php
/*
Plugin Name: Agent700 AI Chat
Plugin URI: https://agent700.ai/
Description: Connect your WordPress site with Agent 700 AI for intelligent product assistance via live chat.
Version: 1.5.0
Requires at least: 6.7
Requires PHP: 7.2
Author: LevelUp Development
Author URI: https://www.levelupdevelopment.com/
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: agent700-ai-chat
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Scripts and Styles
function agent700_enqueue_scripts()
{
    if (get_option('agent700_agent_id')) {
        wp_enqueue_style('agent700-styles', home_url('/wp-content/plugins/agent700-ai-chat/styles/styles.css'), array(), '1.5.0');
        wp_enqueue_script('agent700-chat', home_url('/wp-content/plugins/agent700-ai-chat/scripts/agent-chat.js'), array(), '1.5.0', true);
        wp_enqueue_script('marked-js', 'https://cdn.jsdelivr.net/npm/marked/marked.min.js', array(), null, true);
        //DOMPurify security to XSS
        wp_enqueue_script('dompurify', 'https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.4.0/purify.min.js', array(), null, true);
    }
}
add_action('wp_enqueue_scripts', 'agent700_enqueue_scripts');

// Localize script to pass data to JavaScript
function agent700_localize_script()
{
    if (get_option('agent700_agent_id')) {
        wp_localize_script('agent700-chat', 'agent700_config', array(
            'agentId' => get_option('agent700_agent_id', ''),
            'hideOverlay' => get_option('agent700_hide_overlay', false),
            'layout_type' => get_option('agent700_layout_type', false),
        ));
    }
}
add_action('wp_enqueue_scripts', 'agent700_localize_script');

// Add custom CSS
function agent700_custom_css() {
    // Recuperar opciones con valores predeterminados
    $primary_color = get_option('agent700_primary_color', '#000000');
    $message_title_color = get_option('agent700_message_title_color', '#000000');
    $bot_name = get_option('agent700_bot_name', 'Expert');

    // Validar y asegurar valores
    $primary_color = !empty($primary_color) ? esc_attr($primary_color) : '#000000';
    $message_title_color = !empty($message_title_color) ? esc_attr($message_title_color) : '#000000';
    $bot_name = !empty($bot_name) ? esc_attr($bot_name) : 'Expert';

    // Generar CSS dinámico
    $custom_css = ":root {
        --primaryColor: {$primary_color};
        --messageTitleColor: {$message_title_color};
        --botName: \"{$bot_name}\";
    }";

    // Añadir estilos en línea
    wp_add_inline_style('agent700-styles', $custom_css);
}
add_action('wp_enqueue_scripts', 'agent700_custom_css', 20);

// Media uploader
function agent700_enqueue_admin_scripts($hook_suffix)
{
    if ($hook_suffix === 'settings_page_agent700_chat_settings') {
        wp_enqueue_media();
        wp_enqueue_script('agent700-admin-scripts', plugins_url('scripts/agent-admin.js', __FILE__), array('jquery'), '1.5.0', true);
    }
}
add_action('admin_enqueue_scripts', 'agent700_enqueue_admin_scripts');

// Add chat template to the end of the body
function agent700_add_chat_to_body()
{
    // Include the chat template (this will always be added)
    include plugin_dir_path(__FILE__) . 'agent700-chat-template.php';

    // Retrieve the value of the checkbox from the settings
    $use_shortcode = get_option('agent700_use_shortcode', '0');

    // Normalize the value: treat an empty string as '0'
    if ($use_shortcode === '0' || $use_shortcode === '') {
        // Add the icon when the checkbox is not checked
        $icon_url = get_option('agent700_chat_icon');
        $icon_url = $icon_url ? esc_url($icon_url) : esc_url(plugins_url('assets/chat-agent-icon.png', __FILE__));
        
        echo '<div class="chat-agent-icon">
                <img alt="Chat agent icon" src="' . esc_url($icon_url) . '"/>
              </div>';
    }
}
add_action('wp_footer', 'agent700_add_chat_to_body');

// Add admin menu for settings
function agent700_add_admin_menu()
{
    add_options_page(
        'Agent700 Chat Settings',
        'Agent700 Chat',
        'manage_options',
        'agent700_chat_settings',
        'agent700_chat_settings_page'
    );
}
add_action('admin_menu', 'agent700_add_admin_menu');

// Settings page content
function agent700_chat_settings_page()
{
    // Process the form submission for the checkbox
    if (isset($_POST['agent700_settings_submit'])) {
        check_admin_referer('agent700_settings');
        $use_shortcode = isset($_POST['agent700_use_shortcode']) ? '1' : '0';
        update_option('agent700_use_shortcode', $use_shortcode);
        echo '<div class="updated"><p>Settings saved.</p></div>';
    }

    // Get the saved checkbox value
    $use_shortcode = get_option('agent700_use_shortcode', '0');

?>
    <div class="wrap">
        <h1>Agent700 Chat Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('agent700_chat_settings');
            do_settings_sections('agent700_chat_settings');
            ?>

            <?php
            submit_button();
            ?>
        </form>
        <?php if (!get_option('agent700_agent_id')) : ?>
            <div style="color: red; margin-top: 20px;">
                <strong>Notice:</strong> The field "Agent ID" are required. Without valid entries in this field, the plugin will not function.
            </div>
        <?php endif; ?>
    </div>
<?php
}

// Register settings with sanitization
function agent700_register_settings()
{
    register_setting('agent700_chat_settings', 'agent700_chat_title', array(
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    register_setting('agent700_chat_settings', 'agent700_chat_avatar', array(
        'type'              => 'string',
        'sanitize_callback' => 'esc_url_raw',
    ));
    register_setting('agent700_chat_settings', 'agent700_bot_name', array(
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    register_setting('agent700_chat_settings', 'agent700_primary_color', array(
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    register_setting('agent700_chat_settings', 'agent700_message_title_color', array(
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    register_setting('agent700_chat_settings', 'agent700_agent_id', array(
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    register_setting('agent700_chat_settings', 'agent700_use_shortcode', array(
        'type'              => 'boolean',
        'sanitize_callback' => 'rest_sanitize_boolean',
    ));
    register_setting('agent700_chat_settings', 'agent700_chat_icon', array(
        'type'              => 'string',
        'sanitize_callback' => 'esc_url_raw',
    ));
    register_setting('agent700_chat_settings', 'agent700_chat_shortcode', array(
        'type'              => 'string',
        'sanitize_callback' => 'esc_url_raw',
    ));
    register_setting('agent700_chat_settings', 'agent700_layout_type', array(
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'popup',
    ));
    register_setting('agent700_chat_settings', 'agent700_hide_overlay', array(
        'type'              => 'boolean',
        'sanitize_callback' => 'rest_sanitize_boolean',
        'default'           => false,
    ));
    add_settings_section(
        'agent700_chat_section',
        'Chat Settings',
        null,
        'agent700_chat_settings'
    );

    add_settings_field('agent700_chat_title', 'Chat Title', 'agent700_chat_title_field_render', 'agent700_chat_settings', 'agent700_chat_section');
    add_settings_field('agent700_chat_avatar', 'Chat Avatar', 'agent700_chat_avatar_field_render', 'agent700_chat_settings', 'agent700_chat_section');
    add_settings_field('agent700_bot_name', 'Chat Name', 'agent700_bot_name_field_render', 'agent700_chat_settings', 'agent700_chat_section');
    add_settings_field('agent700_primary_color', 'Primary Color', 'agent700_primary_color_field_render', 'agent700_chat_settings', 'agent700_chat_section');
    add_settings_field('agent700_message_title_color', 'Message Title Color', 'agent700_message_title_color_field_render', 'agent700_chat_settings', 'agent700_chat_section');
    add_settings_field('agent700_agent_id', 'Agent ID', 'agent700_agent_id_field_render', 'agent700_chat_settings', 'agent700_chat_section');
    add_settings_field('agent700_chat_icon', 'Chat Icon', 'agent700_chat_icon_field_render', 'agent700_chat_settings', 'agent700_chat_section');
    add_settings_field('agent700_chat_shortcode', 'Shortcode', 'agent700_chat_shortcode', 'agent700_chat_settings', 'agent700_chat_section');
    add_settings_field('agent700_layout_type', 'Layout Type', 'agent700_chat_layout_field_render', 'agent700_chat_settings', 'agent700_chat_section');
    add_settings_field('agent700_hide_overlay', 'Hide Overlay', 'agent700_chat_hide_overlay_render', 'agent700_chat_settings', 'agent700_chat_section');

    // Only one shortcode checkbox
    add_settings_field('agent700_use_shortcode', 'Hide chat icon', 'agent700_chat_shortcode_checkbox_render', 'agent700_chat_settings', 'agent700_chat_section');
}
add_action('admin_init', 'agent700_register_settings');

// Render the shortcode checkbox field
function agent700_chat_shortcode_checkbox_render()
{
    $use_shortcode = get_option('agent700_use_shortcode', '0');
    echo '<input type="checkbox" name="agent700_use_shortcode" id="agent700_use_shortcode" value="1" ' . checked(1, $use_shortcode, false) . '>';
}

// Register the shortcode
add_shortcode('agent700_chat', 'agent700_render_chat_shortcode');
function agent700_render_chat_shortcode()
{
    return '<div class="chat-agent-shortcode">
            <button class="chat-agent-shortcode-button">' . esc_html__('Agent chat', 'agent700-ai-chat') . '</button>
        </div>';
}

function agent700_chat_title_field_render()
{
    $value = get_option('agent700_chat_title', 'Agent 700');
    echo "<input type='text' name='agent700_chat_title' value='" . esc_attr($value) . "' />";
}

function agent700_chat_avatar_field_render()
{
    $avatar_url = get_option('agent700_chat_avatar');
    echo "<input type='hidden' id='agent700_chat_avatar' name='agent700_chat_avatar' value='" . esc_attr($avatar_url) . "' />";
    echo "<button type='button' class='button' data-upload='avatar' id='upload_avatar_button'>Select Avatar</button>";
}

function agent700_bot_name_field_render()
{
    $bot_name = get_option('agent700_bot_name', 'Expert');
    echo "<input type='text' name='agent700_bot_name' value='" . esc_attr($bot_name) . "' />";
}

function agent700_primary_color_field_render()
{
    $color = get_option('agent700_primary_color', '#000000');
    echo '<input type="color" id="primary_color_picker" value="' . esc_attr($color) . '" onchange="updateHiddenColor(\'primary_color_picker\', \'agent700_primary_color\')" />';
    echo '<input type="hidden" id="agent700_primary_color" name="agent700_primary_color" value="' . esc_attr($color) . '"/>';
}

function agent700_message_title_color_field_render()
{
    $color = get_option('agent700_message_title_color', '#000000');
    echo '<input type="color" id="message_title_color_picker" name="agent700_message_title_color" value="' . esc_attr($color) . '" />';
}

function agent700_agent_id_field_render()
{
    $agent_id = get_option('agent700_agent_id', '');
    echo "<input type='text' name='agent700_agent_id' value='" . esc_attr($agent_id) . "' />";
}

function agent700_chat_shortcode()
{
    echo "<input type='text' name='agent700_chat_api_shortcode_usage' value='[agent700_chat]' readonly />";
}

function agent700_chat_icon_field_render() {
    $chat_icon = get_option('agent700_chat_icon');
    echo "<input type='hidden' id='agent700_chat_icon' name='agent700_chat_icon' value='" . esc_attr($chat_icon) . "' />";
    echo "<button type='button' class='button' data-upload='icon' id='upload_icon_button'>Select Icon</button>";
}

function agent700_chat_layout_field_render() {
    $layout_type = get_option('agent700_layout_type', 'popup');
    ?>
    <label>
        <input type="radio" name="agent700_layout_type" value="popup" <?php checked($layout_type, 'popup'); ?> />
        Popup
    </label>
    <br><br>
    <label>
        <input type="radio" name="agent700_layout_type" value="aside" <?php checked($layout_type, 'aside'); ?> />
        Aside
    </label>
    <?php
}

function agent700_chat_hide_overlay_render() {
    $hide_overlay = get_option('agent700_hide_overlay', false);
    ?>
    <label>
        <input type="checkbox" name="agent700_hide_overlay" value="1" <?php checked($hide_overlay, true); ?> />
        Enable this option to hide the overlay
    </label>
    <?php
}

//Add Settings link in plugins page
function agent700_chat_add_link_settings($links) {
    $settings_link = '<a href="' . admin_url('options-general.php?page=agent700_chat_settings') . '">Settings</a>';
    array_unshift($links, $settings_link);
    return $links;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'agent700_chat_add_link_settings');
