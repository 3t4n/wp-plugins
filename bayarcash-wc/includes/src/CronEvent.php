<?php
namespace Bayarcash\WooCommerce;

use Automattic\WooCommerce\Utilities\OrderUtil;
use Webimpian\BayarcashSdk\Bayarcash;

\defined('ABSPATH') || exit;

class CronEvent
{
	private $pt;
	private array $supported_payment_methods = [
		'bayarcash-wc',
		'duitnow-wc',
		'linecredit-wc',
		'directdebit-wc',
		'duitnowqr-wc',
		'duitnowshopee-wc',
		'duitnowboost-wc',
		'duitnowqris-wc',
		'duitnowqriswallet-wc',
		'duitnownets-wc'
	];

	public function __construct($pt)
	{
		$this->pt = $pt;
		$this->initialize_dynamic_payment_methods();
	}

	private function initialize_dynamic_payment_methods(): void
	{
		$additional_fpx = (int)get_option('bayarcash_additional_fpx', 1);
		if ($additional_fpx > 1) {
			for ($i = 2; $i <= $additional_fpx; $i++) {
				$this->supported_payment_methods[] = "bc-fpx-{$i}-wc";
			}
		}
	}

	public function register(): void {
		add_filter(
			'cron_schedules',
			function ($schedules) {
				$schedules['bayarcash_wc_schedule'] = [
					'interval' => 5 * MINUTE_IN_SECONDS,
					'display'  => esc_html__('Every 5 Minutes', 'bayarcash-wc'),
				];
				$schedules['bayarcash_wc_transaction_schedule'] = [
					'interval' => 3 * MINUTE_IN_SECONDS,
					'display'  => esc_html__('Every 3 Minutes', 'bayarcash-wc'),
				];
				return $schedules;
			},
			\PHP_INT_MAX
		);

		// Register both cron events
		add_action('bayarcash_wc_checkpayment', [$this, 'check_payment']);
		add_action('bayarcash_wc_check_transaction', [$this, 'check_transaction']);

		// Schedule both events if not already scheduled
		if (!wp_next_scheduled('bayarcash_wc_checkpayment')) {
			wp_schedule_event(time(), 'bayarcash_wc_schedule', 'bayarcash_wc_checkpayment');
		}
		if (!wp_next_scheduled('bayarcash_wc_check_transaction')) {
			wp_schedule_event(time(), 'bayarcash_wc_transaction_schedule', 'bayarcash_wc_check_transaction');
		}
	}

	public function unregister(): void {
		wp_clear_scheduled_hook('bayarcash_wc_checkpayment');
		wp_clear_scheduled_hook('bayarcash_wc_check_transaction');
	}

	// Existing check_payment method remains unchanged
	public function check_payment(): void {
		if (!$this->pt->is_woocommerce_activated()) {
			return;
		}

		foreach ($this->supported_payment_methods as $payment_method) {
			$option_name = 'woocommerce_' . $payment_method . '_settings';
			$serialized_settings = get_option($option_name);

			if (empty($serialized_settings)) {
				bayarcash_debug_log("Settings not found for $payment_method. Skipping payment check.");
				continue;
			}

			$settings = maybe_unserialize($serialized_settings);

			if (!is_array($settings)) {
				bayarcash_debug_log("Invalid settings format for $payment_method. Skipping payment check.");
				continue;
			}

			$bearer_token = $settings['bearer_token'] ?? '';
			if (empty($bearer_token)) {
				bayarcash_debug_log("Bearer token is not set for $payment_method. Skipping payment check.");
				continue;
			}

			$sandbox_mode = isset($settings['sandbox_mode']) && $settings['sandbox_mode'] === 'yes';

			try {
				$bayarcash = new Bayarcash($bearer_token);
				$bayarcash->setApiVersion('v3');
				if ($sandbox_mode) {
					$bayarcash->useSandbox();
					bayarcash_debug_log("Sandbox mode is enabled for $payment_method.");
				}
			} catch (\Exception $e) {
				bayarcash_debug_log("Failed to initialize Bayarcash SDK for $payment_method: " . $e->getMessage());
				continue;
			}

			$order_query = [
				'status'         => ['pending','failed'],
				'payment_method' => $payment_method,
				'limit'          => 30,
			];

			$orders = wc_get_orders($order_query);

			if (empty($orders)) {
				bayarcash_debug_log("No pending orders found for payment method: $payment_method");
				continue;
			}

			foreach ($orders as $order) {
				$payment_intent_id = $this->get_order_meta($order, 'bc_payment_intent');

				if (empty($payment_intent_id)) {
					bayarcash_debug_log(sprintf('No payment intent ID found for order %s with payment method %s', $order->get_id(), $payment_method));
					continue;
				}

				bayarcash_debug_log(sprintf('Checking payment intent %s for order %s with payment method %s', $payment_intent_id, $order->get_id(), $payment_method));

				try {
					$payment_intent = $bayarcash->getPaymentIntent($payment_intent_id);

					if ($payment_intent && !empty($payment_intent->attempts)) {
						$latest_attempt = end($payment_intent->attempts);

						$transaction_data = [
							'order_number' => $order->get_id(),
							'id' => $latest_attempt['transaction_id'] ?? '',
							'status' => $latest_attempt['status'] ?? '',
							'datetime' => $payment_intent->lastAttempt ?? date('Y-m-d H:i:s'),
							'exchange_reference_number' => $latest_attempt['exchange_reference_number'] ?? '',
							'payer_name' => $payment_intent->payerName ?? '',
							'payer_email' => $payment_intent->payerEmail ?? '',
							'status_description' => $latest_attempt['status_description'] ?? ''
						];

						$data_store = bayarcash_data_store();
						$data_store->update_payment_fpx($transaction_data);
						bayarcash_debug_log('Payment status updated for payment intent: ' . $payment_intent_id);
					}
				} catch (\Exception $e) {
					bayarcash_debug_log('Error checking payment intent: ' . $e->getMessage());
				}
			}
		}
	}

	// New method for checking transactions
	public function check_transaction(): void {
		if (!$this->pt->is_woocommerce_activated()) {
			return;
		}

		foreach ($this->supported_payment_methods as $payment_method) {
			$option_name = 'woocommerce_' . $payment_method . '_settings';
			$serialized_settings = get_option($option_name);

			if (empty($serialized_settings)) {
				bayarcash_debug_log("Settings not found for $payment_method. Skipping transaction check.");
				continue;
			}

			$settings = maybe_unserialize($serialized_settings);

			if (!is_array($settings)) {
				bayarcash_debug_log("Invalid settings format for $payment_method. Skipping transaction check.");
				continue;
			}

			$bearer_token = $settings['bearer_token'] ?? '';
			if (empty($bearer_token)) {
				bayarcash_debug_log("Bearer token is not set for $payment_method. Skipping transaction check.");
				continue;
			}

			$sandbox_mode = isset($settings['sandbox_mode']) && $settings['sandbox_mode'] === 'yes';

			try {
				$bayarcash = new Bayarcash($bearer_token);
				$bayarcash->setApiVersion('v3');
				if ($sandbox_mode) {
					$bayarcash->useSandbox();
					bayarcash_debug_log("Sandbox mode is enabled for $payment_method.");
				}
			} catch (\Exception $e) {
				bayarcash_debug_log("Failed to initialize Bayarcash SDK for $payment_method: " . $e->getMessage());
				continue;
			}

			$order_query = [
				'status'         => ['pending','failed'],
				'payment_method' => $payment_method,
				'limit'          => 30,
			];

			$orders = wc_get_orders($order_query);

			if (empty($orders)) {
				bayarcash_debug_log("No pending orders found for payment method: $payment_method");
				continue;
			}

			foreach ($orders as $order) {
				$transaction_id = $this->get_order_meta($order, 'bayarcash_wc_transaction_id');

				if (empty($transaction_id)) {
					bayarcash_debug_log(sprintf('No transaction ID found for order %s with payment method %s', $order->get_id(), $payment_method));
					continue;
				}

				bayarcash_debug_log(sprintf('Checking transaction ID %s for order %s with payment method %s', $transaction_id, $order->get_id(), $payment_method));

				try {
					$transaction = $bayarcash->getTransaction($transaction_id);

					//bayarcash_debug_log('Payment Intent Response: ' . print_r($transaction, true), $order);

					if ($transaction) {
						$transaction_data = [
							'order_number' => $order->get_id(),
							'id' => $transaction_id,
							'status' => $transaction->status ?? '',
							'datetime' => $transaction->createdAt ?? date('Y-m-d H:i:s'),
							'exchange_reference_number' => $transaction->exchangeReferenceNumber ?? '',
							'payer_name' => $transaction->payerName ?? '',
							'payer_email' => $transaction->payerEmail ?? '',
							'status_description' => $transaction->statusDescription ?? ''
						];

						$data_store = bayarcash_data_store();
						$data_store->update_payment_fpx($transaction_data);
						bayarcash_debug_log('Transaction status updated for transaction ID: ' . $transaction_id);
					}
				} catch (\Exception $e) {
					bayarcash_debug_log('Error checking transaction: ' . $e->getMessage());
				}
			}
		}
	}

	private function is_hpos_enabled(): bool {
		return class_exists('\Automattic\WooCommerce\Utilities\OrderUtil') && OrderUtil::custom_orders_table_usage_is_enabled();
	}

	private function get_order_meta($order, $key)
	{
		if ($this->is_hpos_enabled()) {
			return $order->get_meta($key);
		} else {
			return get_post_meta($order->get_id(), $key, true);
		}
	}
}