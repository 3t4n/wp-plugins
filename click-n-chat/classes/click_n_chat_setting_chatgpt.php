<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!class_exists('click_n_chat_setting_chatgpt')) {
	class click_n_chat_setting_chatgpt {
		public $api_key = 'Flag92';
    	public $max_token = '500';
		public $temperature = '0.5';
		public $presence_penalty = '1';
		public $frequency_penalty = '1';
		public $ai_models = 'gpt-3.5-turbo';
		public $ai_instructions = 'You are a virtual assistant for a clothing store, specifically designed to help customers with the checkout process. Assist customers by guiding them through each step of the checkout process, including reviewing their cart, applying discount codes, selecting shipping options, and completing payment. Provide clear and accurate information, and ensure a smooth and user-friendly checkout experience. Address any questions or issues they may have related to the checkout process.';
	}
}