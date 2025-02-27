<?php

class Wildrobot_Logistra_Api
{

	public static function init() {}


	function wildrobot_api_create_consignment_register()
	{

		register_rest_route('wc/v3', '/wildrobot/consignment', array(
			'methods' => 'POST',
			'callback' => [self::class, 'wildrobot_api_create_consignment_callback'],
			'permission_callback' => function ($request) {
				// $test = true;
				// return $test ? "__return_true" : current_user_can('edit_posts');
				return current_user_can('edit_posts');
			}
		));
	}

	static function wildrobot_api_create_consignment_callback($request)
	{
		try {
			// Access and sanitize parameters
			$params = $request->get_params();
			$logger = new WC_Logger();
			$context = ['source' => 'wildrobot-api-create-consignment'];
			$logger->info("Request params: " . wc_print_r($params, true), $context);
			$order_id = isset($params["order_id"]) ? sanitize_text_field($params["order_id"]) : '';

			if (empty($order_id)) {
				return new WP_Error('missing_order_id', 'Order ID is required', array('status' => 400));
			}

			$messages = [];
			$errors = [];
			$consignment_args = Wildrobot_Logistra_Consignment_Order::get_consignment_args_from_order_id($order_id);

			if (empty($consignment_args) || !is_array($consignment_args)) {
				return new WP_Error('invalid_consignment_args', 'Invalid consignment arguments retrieved.', array('status' => 400));
			}

			foreach ($consignment_args as $consignment_arg) {
				try {
					// Simple overriding with sanitization
					if (!empty($params["wr_id"])) {
						$consignment_arg["wr_id"] = sanitize_text_field($params["wr_id"]);
						$consignment_arg["services"] = [];
					}
					if (!empty($params["services"]) && is_array($params["services"])) {
						$consignment_arg["services"] = array_map('sanitize_text_field', $params["services"]);
					}
					if (!empty($params["email_notification_to_consignee"])) {
						$consignment_arg["email_notification_to_consignee"] = $params["email_notification_to_consignee"] === "yes";
					}

					$consignment = new Wildrobot_Logistra_Consignment($consignment_arg);
					$messages_from_consignment = $consignment->send_backend();

					if (is_array($messages_from_consignment)) {
						$messages = array_merge($messages, $messages_from_consignment);
					}
					$order = wc_get_order($order_id);
				} catch (\Throwable $error) {
					$logger = new WC_Logger();
					$context = ['source' => 'wildrobot-api-create-consignment'];
					$logger->error("Order ID {$order_id} - Error: {$error->getMessage()}", $context);
					$errors[] = $error->getMessage();
				}
			}

			if (!empty($errors)) {
				return new WP_Error('consignment_errors', implode("\n | ", $errors), array('status' => 500));
			}

			$response_data = array(
				"success" => true,
				"order_id" => $order_id,
				"messages" => $messages,
				"tracking-url" => $order->get_meta('logistra-robots-tracking-url'),
				"tracking-url-return" => $order->get_meta('logistra-robots-tracking-url-return'),
				"label-url" => $order->get_meta('logistra-robots-freight-label-url'),
				"label-url-return" => $order->get_meta('logistra-robots-freight-label-url-return'),
				"number" => $order->get_meta('logistra-robots-freight-number'),
				"number-return" => $order->get_meta('logistra-robots-freight-number-return'),
			);
			$logger->info("Response data: " . wc_print_r($response_data, true), $context);
			return new WP_REST_Response($response_data, 200);
		} catch (\Throwable $error) {
			$logger->error("Error: " . $error->getMessage(), $context);
			return new WP_Error('api_error', $error->getMessage(), array('status' => 500));
		}
	}
}
