<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function click_n_chat_get_ai_action_handler() {  
	
	if (!isset($_POST['security']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['security'])), 'ajax-call-nounce')) {
        wp_send_json_error('invalid nonce');
        wp_die();
    }
	
	global $wpdb;
	 
	$message = sanitize_textarea_field($_POST['message']);

	$click_n_chat_setting_chatgpt = get_option('click_n_chat_setting_chatgpt');
	$click_n_chat_setting_popup = get_option('click_n_chat_setting_popup');
	
	
	 
 	$url = 'https://api.openai.com/v1/chat/completions';
		
	$data = [
		'model' => $click_n_chat_setting_chatgpt->ai_models,
		'messages' => [
			['role' => 'system', 'content' => 'Hello! How can I help you today?'],
			['role' => 'user', 'content' => $message]
		],
		'max_tokens' =>  (float)$click_n_chat_setting_chatgpt->max_token,
		'temperature' =>  (float)$click_n_chat_setting_chatgpt->temperature,
		'presence_penalty' =>  (float)$click_n_chat_setting_chatgpt->presence_penalty,
		'frequency_penalty' =>  (float)$click_n_chat_setting_chatgpt->frequency_penalty
	];
	
	$args = [
		'headers' => [
			'Authorization' => 'Bearer ' . $click_n_chat_setting_chatgpt->api_key,
			'Content-Type'  => 'application/json',
		],
		'body' => wp_json_encode($data),  // Ensure the data is in JSON format
		'method' => 'POST',
		'timeout' => 30, // Timeout in seconds
	];
	$response = wp_remote_post($url, $args);
	
	if (is_wp_error($response)) {
		$reply_message = 'Error: ' . $response->get_error_message();
	}
	else
	{
		
		$response_body = wp_remote_retrieve_body($response);
		$responseData = json_decode($response_body);

		if(isset($responseData->choices[0]->message->content))
			$reply_message = $responseData->choices[0]->message->content;
		else
			$reply_message = $responseData->error->message;
		
	}

 
	wp_send_json([
        'reply' => $reply_message,
    ]);
}  
 
 
add_action('wp_ajax_click_n_chat_get_ai_action', 'click_n_chat_get_ai_action_handler');  
add_action('wp_ajax_nopriv_click_n_chat_get_ai_action', 'click_n_chat_get_ai_action_handler'); // For non-logged in users  
