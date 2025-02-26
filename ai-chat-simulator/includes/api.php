<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class BOAI_OPENAI_API {
    private $api_url = 'https://api.openai.com/v1/chat/completions';

    public function send_request($message)
    {
        $options = get_option('boai_chat_simulator_settings');
        $api_key = $options['boai_chatgpt_simulator_text_field_0']; // Retrieve API key from settings

        $body = wp_json_encode([
            'model' => 'gpt-3.5-turbo', // Adjust model as necessary
            'messages' => [["role" => "user", "content" => $message]],
        ]);

        $response = wp_remote_post($this->api_url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $api_key,
            ],
            'body' => $body,
            'data_format' => 'body',
        ]);


        if (is_wp_error($response)) {
            return false; // Handle error appropriately
        }

        $body = wp_remote_retrieve_body($response);
        return json_decode($body, true);
    }
}
