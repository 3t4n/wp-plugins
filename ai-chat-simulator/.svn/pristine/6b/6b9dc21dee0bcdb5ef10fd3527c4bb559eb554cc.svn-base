<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class BOAI_Chat_Simulator_Admin
{
    public function enqueue_styles()
    {
        wp_enqueue_style('chatgpt-simulator-admin-style', plugin_dir_url(__FILE__) . 'css/admin-style.css', array(), '1.0', 'all');
    }

    public function add_plugin_admin_menu()
    {
        $icon_url = plugins_url('images/ai-chat-simulator-icon.png', dirname(__FILE__));
        add_menu_page('ChatGPT Simulator Settings', 'AI Chat Simulator', 'manage_options', 'chatgpt_simulator', array($this, 'display_plugin_setup_page'), $icon_url, 80);
    }

    public function display_plugin_setup_page()
    {
        include_once 'views/admin-settings.php';
    }

    public function register_and_build_fields()
    {
        register_setting('boai_chat_simulator_plugin_options', 'boai_chat_simulator_settings');

        add_settings_section(
            'boai_chat_simulator_plugin_page_section',
            'API Settings',
            array($this, 'boai_chat_simulator_settings_section_callback'),
            'chatgpt_simulator'
        );

        add_settings_field(
            'boai_chatgpt_simulator_text_field_0',
            'OpenAI API Key',
            array($this, 'boai_chat_simulator_text_field_0_render'),
            'chatgpt_simulator',
            'boai_chat_simulator_plugin_page_section'
        );
    }

    function message_handler()
    {
        if (!session_id()) session_start();

        wp_verify_nonce(sanitize_text_field(wp_unslash($_REQUEST['security'])), 'message_handler');
        $message = sanitize_text_field($_POST['message']);
        $api = new BOAI_OPENAI_API();
        $response = $api->send_request($message);

        if ($response) {
            error_log('OpenAI API Response: ' . wp_json_encode($response));
        }

        if ($response && isset($response['choices'][0]['message']['content'])) {
            // Save the user message and the response in session
            if (!isset($_SESSION['chat_history'])) {
                $_SESSION['chat_history'] = array();
            }

            $_SESSION['chat_history'][] = [
                'user_message' => $message,
                'bot_response' => $response['choices'][0]['message']['content'],
            ];

            echo esc_html($response['choices'][0]['message']['content']);
        } else {
            echo 'Could not retrieve a response. Please try again.';
        }

        wp_die(); // This is required to terminate immediately and return a proper response
    }

    function get_chat_history()
    {
        if (!session_id()) session_start();
        if (isset($_SESSION['chat_history'])) {
            $history = wp_json_encode($_SESSION['chat_history']);
            echo wp_kses_post($history);
        } else {
            echo wp_json_encode([]);
        }
        wp_die();
    }

    function boai_chat_simulator_text_field_0_render()
    {
        $options = get_option('boai_chat_simulator_settings');
        error_log(wp_json_encode($options));
?>
        <input type='text' name='boai_chat_simulator_settings[boai_chatgpt_simulator_text_field_0]' value='<?php echo esc_attr($options['boai_chatgpt_simulator_text_field_0']); ?>'>
<?php
    }

    function boai_chat_simulator_settings_section_callback()
    {
        echo 'Enter your OpenAI API Key here.';
    }
}
