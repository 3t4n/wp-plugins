<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class BOAI_Chat_Simulator_Public
{
    public function enqueue_styles()
    {
        wp_enqueue_style('chatgpt-simulator-public-style', plugin_dir_url(__FILE__) . 'css/chatgpt-simulator-public.css', array(), '1.0', 'all');
    }

    public function enqueue_scripts()
    {
        wp_enqueue_script('chatgpt-simulator-public-js', plugin_dir_url(__FILE__) . 'js/chatgpt-simulator-public.js', array(), '1.0', true);
        wp_localize_script('chatgpt-simulator-public-js', 'chatgptSimulatorAjax', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'security' => wp_create_nonce('chatgpt-simulator-nonce')
        ));
    }

    public function display_chat_interface()
    {
        ob_start();
        include_once plugin_dir_path(__FILE__) . 'views/chat-interface.php';
        return ob_get_clean();
    }

    
}
