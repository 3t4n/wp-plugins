<?php

use Stripe\ErrorObject;

class DyDo_Public_Ajax
{
	public function __construct()
	{
		$this->add_ajax_events();
	}

	public function add_ajax_events()
	{
		$ajax_events_nopriv = array(
			'wc_add_donation',
			'wp_get_global_settings',
			'wp_login',
			'wp_register',
			'wp_is_authenticated',
			'wp_get_current_user',
			'wp_stripe_setup_intents_and_customer',
			'wp_stripe_recurring_payment',
			'wp_stripe_onetime_payment',
			'wp_attach_payment_method_to_customer',
			'wp_payment_methods',
			'wp_stripe_change_status_subscription',
			'wp_stripe_save_donation', 'wp_stripe_update_donation',
			'wp_stripe_update_subscription_date',
			'wp_stripe_update_subscription_amount',
			'wp_stripe_update_subscription_payment_method',
			'wp_stripe_cancel_subscription',
			'wp_stripe_delete_payment_method',
            'wp_stripe_update_payment_method',
            'wp_stripe_payment_method_as_primary',
		);

		foreach ($ajax_events_nopriv as $ajax_event) {
			add_action("wp_ajax_{$ajax_event}", array($this, $ajax_event));
			add_action("wp_ajax_nopriv_{$ajax_event}", array($this, $ajax_event));
		}
	}

    private function get_origin_ip()
	{
		return isset($_SERVER['REMOTE_ADDR']) ? wp_unslash(sanitize_url($_SERVER['REMOTE_ADDR'])) : '0.0.0.0';
	}

	public function wp_get_global_settings()
	{
		wp_send_json_success(dydo_get_global_settings());
		exit();
	}

	public function wp_login()
	{
		// $this->verify_nonce( $_POST['nonce'] );

		$email    = sanitize_email($_POST['email']);
		$password = sanitize_text_field($_POST['password']);
		$remember = sanitize_text_field($_POST['remember']) === 'true';

		$data = DyDo_Auth::login($email, $password, $remember);

		if ($data['error']) {
			$data['post'] = $_POST;
			wp_send_json_error($data);
		} else {
			wp_send_json_success($data);
		}
	}

	public function wp_register()
	{
		// $this->verify_nonce( $_POST['nonce'] );

		$first_name       = sanitize_user($_POST['firstName']);
		$last_name        = sanitize_user($_POST['lastName']);
		$username         = sanitize_user($_POST['username']);
		$email            = sanitize_email($_POST['email']);
		$password         = sanitize_text_field($_POST['password']);
		$confirm_password = sanitize_text_field($_POST['confirmPassword']);

		$data = DyDo_Auth::register($first_name, $last_name, $username, $email, $password, $confirm_password);

		if ($data['error']) {
			wp_send_json_error($data);
		} else {
			wp_send_json_success($data);
		}
	}

	public function wp_is_authenticated()
	{
		wp_send_json(is_user_logged_in());
	}

	public function wp_get_current_user()
	{
		if (is_user_logged_in()) {
			$user = wp_get_current_user();

			wp_send_json(
				array(
					'user_id'      => $user->ID,
					'username'     => $user->user_login,
					'email'        => $user->user_email,
					'first_name'   => $user->user_firstname,
					'last_name'    => $user->user_lastname,
					'display_name' => $user->display_name,
				)
			);
		}

		wp_send_json(null);
	}

	public function wp_stripe_setup_intents_and_customer()
	{
		// $this->verify_nonce( $_POST['nonce'] );

		$setup_intent = DyDo_Stripe_Resources::setup_intent();

		if (isset($setup_intent->id)) {
			wp_send_json_success($setup_intent);
		} else {
			wp_send_json_error($setup_intent);
		}
	}

	public function wp_stripe_recurring_payment()
	{
		try {
			$payment_method_id = sanitize_text_field($_POST['payment_method_id']);
			$subscription_data = json_decode(wp_unslash($_POST['subscription_data']), true);
			$cleaned_subscription_data = [
				'amount' => sanitize_text_field($subscription_data['amount']),
				'period' => [
					'mode' => sanitize_text_field($subscription_data['period']['mode']),
					'interval' =>  sanitize_text_field($subscription_data['period']['interval']),
					'intervalCount' => sanitize_text_field($subscription_data['period']['intervalCount']),
					'startDate' => sanitize_text_field(trim($subscription_data['period']['startDate'])),
					'timezone' => $subscription_data['period']['timezone'] != '' ? sanitize_text_field($subscription_data['period']['timezone']) : date_default_timezone_get(),
				],
				'currency' => sanitize_text_field($subscription_data['currency'])
			];
			if (strtolower(trim($cleaned_subscription_data['period']['startDate'])) === '' || strtolower(trim($cleaned_subscription_data['period']['startDate'])) === 'now') {
				$cleaned_subscription_data['period']['startDate'] = 'now';
			}
			if ($cleaned_subscription_data['period']['startDate'] != 'now') {
				if (!dydo_validate_date($cleaned_subscription_data['period']['startDate'], "m/d/Y h:i A")) {
					wp_send_json_error('Invalid date format');
				}
				$start_date = DateTime::createFromFormat("m/d/Y h:i A", $cleaned_subscription_data['period']['startDate'], new DateTimeZone($cleaned_subscription_data['period']['timezone']));
				if ($start_date->getTimestamp() < time()) {
					wp_send_json_error('This date has passed. Please, select a date in the future.');
				}
				$cleaned_subscription_data['period']['startDate'] = $start_date->getTimestamp();
			}
			$subscription      = DyDo_Payment::method('stripe')->recurring($payment_method_id, $cleaned_subscription_data)->pay();
			$next_invoice        = DyDo_Stripe_Invoices::upcoming(
				array(
					'customer'                => $subscription->customer,
					'subscription'            => $subscription->id,
				)
			);
			if (isset($subscription->id)) {
				dydo_save_donation(
					DYDO_SUBSCRIPTION_TABLENAME,
					array(
						'user_id'          => get_current_user_id(),
						'customer_id'      => $subscription->customer,
						'subscription_id'  => $subscription->id,
						'dydo_gateways_id' => 2,
						'active'           => 1,
						'created_at'       => wp_date('Y-m-d H:i:s'),
						'updated_at'       => wp_date('Y-m-d H:i:s'),
						'amount'          => (float) $cleaned_subscription_data['amount'],
						'next_payment_attempt' => $next_invoice->next_payment_attempt,
						'start_date' => $cleaned_subscription_data['period']['startDate'],
					)
				);
				// 'amount'          => (float) $subscription_data['amount'],
				// 'currency'        => $subscription_data['currency'],
				wp_send_json_success($subscription);
			} else {
				wp_send_json_error($subscription);
			}
		} catch (\Throwable $th) {
			wp_send_json_error($th->getMessage());
		}
	}

	public function wp_stripe_onetime_payment()
	{
		$payment_method_id = sanitize_text_field($_POST['payment_method_id']);
		$amount            = sanitize_text_field($_POST['amount']);
		$currency          = sanitize_text_field($_POST['currency']);
		$payment = DyDo_Payment::method('stripe')->onetime((float) $amount, $payment_method_id, $currency)->pay();
		if (isset($payment->id)) {
			$donation_id = dydo_save_onetime_donation($payment->id, (float) $amount, strtoupper(trim($currency)), $payment->status === 'succeeded' ? 1 : 0, get_current_user_id());
			wp_send_json_success(['payment_intent' => $payment, 'onetime_donation_id' => $donation_id]);
		} else {
			wp_send_json_error($payment);
		}
	}

	public function wp_stripe_save_donation()
	{
		try {
			$transaction_id = sanitize_text_field($_POST['transaction_id']);
			$amount         = sanitize_text_field($_POST['amount']);
			$currency       = sanitize_text_field($_POST['currency']);
			$confirmed       = sanitize_text_field($_POST['confirmed']);
			wp_send_json_success(dydo_save_onetime_donation($transaction_id, $amount, $currency, $confirmed, get_current_user_id()));
		} catch (\Throwable $th) {
			wp_send_json_error($th->getMessage());
		}
	}

	public function wp_stripe_update_donation()
	{
		try {
			$transaction_id = sanitize_text_field($_POST['transaction_id']);
			$confirmed         = sanitize_text_field($_POST['confirmed']);
			$amount         = sanitize_text_field($_POST['amount']);
			$currency       = sanitize_text_field($_POST['currency']);
			$donation_id       = sanitize_text_field($_POST['donation_id']);
			wp_send_json_success(dydo_update_onetime_donation($donation_id, $transaction_id, $amount, $currency, $confirmed, get_current_user_id()));
		} catch (\Throwable $th) {
			wp_send_json_error($th->getMessage());
		}
	}

	public function wp_attach_payment_method_to_customer()
	{
		// $this->verify_nonce( $_POST['nonce'] . '12' );
		$payment_method_id = sanitize_text_field($_POST['payment_method_id']);
		if (!isset($payment_method_id) || empty($payment_method_id)) {
			wp_send_json_error('Invalid payment method');
		}
		$attach = DyDo_Stripe_PaymentMethods::attach($payment_method_id);

		if (isset($attach->id)) {
			wp_send_json_success($attach);
		} else {
			wp_send_json_error($attach);
		}
	}

	public function wp_payment_methods()
	{

		// Get Payment Methods
		$paymentmethods = DyDo_Stripe_Paymentmethods::all();

        $customer = DyDo_Stripe_Customers::retrieve();
        $default_payment_method_id = $customer->invoice_settings->default_payment_method;


		// Build credit card data
		$data = array();
		if (isset($paymentmethods->data)) {
			foreach ($paymentmethods->data as $paymentmethod) {
                $value = false; 
                if ($paymentmethod->id == $default_payment_method_id) $value = true; 
				array_push(
					$data,
					array(
						'brand'     => $paymentmethod->card->brand,
						'last4'     => $paymentmethod->card->last4,
						'exp_month' => $paymentmethod->card->exp_month,
						'exp_year'  => $paymentmethod->card->exp_year,
						'customer'  => $paymentmethod->customer,
						'id'        => $paymentmethod->id,
                        'default_payment_method' => $value
					)
				);
			}
		}

		wp_send_json_success($data);
	}

	public function wp_stripe_change_status_subscription()
	{
		$subscription_id     = sanitize_text_field($_POST['subscription_id']);
		$subscription_status = sanitize_text_field($_POST['subscription_status']);

		if ($subscription_status == 'subscribe') {
			$res = DyDo_Stripe_Subscriptions::subscribe($subscription_id);

			wp_send_json_success($res);
		}

		if ($subscription_status == 'unsubscribe') {
			$res = DyDo_Stripe_Subscriptions::unsubscribe($subscription_id);

			wp_send_json_success($res);
		}

		wp_send_json_error('Error');
	}

	public function wc_add_donation()
	{
		$response  = array();
		$amount     = sanitize_text_field($_POST['amount']);
		$product_id = sanitize_text_field($_POST['pid']);

		if (!empty($amount) && $amount >= 1) {
			$this->wc_add_donation_product_to_cart($product_id);
			$response['url_woo_cart'] = wc_get_cart_url();
			$response['amount']       = $amount;
			$response['redirect']     = true;
		} else {
			$response['msg']      = 'Please enter a valid value !!';
			$response['redirect'] = false;
		}

		wp_send_json_success($response);
		die();
	}

	/**
	 * @throws Exception
	 */
	private function wc_add_donation_product_to_cart($id)
	{
		$found = false;

		if (sizeof(WC()->cart->get_cart()) > 0) {

			foreach (WC()->cart->get_cart() as $cart_item_key => $values) {
				$_product = $values['data'];

				if ($_product->get_id() == $id) {
					$found = true;
					WC()->cart->remove_cart_item($cart_item_key);
					WC()->cart->add_to_cart($id);
				}
			}

			if (!$found) {
				WC()->cart->add_to_cart($id);
			}
		} else {
			WC()->cart->add_to_cart($id);
		}
	}

	public function wp_stripe_update_subscription_date()
	{
		$this->verify_nonce($_POST['nonce']);
		try {
			$subscription_id = sanitize_text_field($_POST['subscription_id']);
			$new_date        = sanitize_text_field($_POST['new_date']);
			$timezone        = dydo_is_valid_timezone(sanitize_text_field($_POST['timezone'])) ? sanitize_text_field($_POST['timezone']) : date_default_timezone_get();
			if (dydo_validate_date($new_date, "m/d/Y h:i A")) {
				$new_date = DateTime::createFromFormat("m/d/Y h:i A", $new_date, new DateTimeZone($timezone));
				$res = DyDo_Stripe_Subscriptions::update_subscription_date($subscription_id, $new_date->getTimestamp());
				isset($res->message) ? wp_send_json_error($res) : wp_send_json_success($res);
			} else {
				wp_send_json_error('Please enter a valid date.');
			}
		} catch (\Throwable $th) {
			wp_send_json_error($th->getMessage());
		}
	}

	public function wp_stripe_update_subscription_amount()
	{
		$this->verify_nonce($_POST['nonce']);
		$subscription_id = sanitize_text_field($_POST['subscription_id']);
		$new_amount      = (float) sanitize_text_field($_POST['new_amount']);
		try {
			if (!empty($new_amount) && $new_amount > 0) {
				$res = DyDo_Stripe_Subscriptions::update_subscription_amount($subscription_id, $new_amount);
				isset($res->message) ? wp_send_json_error($res) : wp_send_json_success($res);
			}
			wp_send_json_error('New amount must be bigger than 0');
		} catch (\Throwable $th) {
			wp_send_json_error($th->getMessage());
		}
	}

	public function wp_stripe_update_subscription_payment_method()
	{
		$this->verify_nonce($_POST['nonce']);
		$subscription_id = sanitize_text_field($_POST['subscription_id']);
		$payment_method_id      = sanitize_text_field($_POST['payment_method_id']);
		try {
			if (!empty($payment_method_id)) {
				$res = DyDo_Stripe_Subscriptions::update_subscription_payment_method($subscription_id, $payment_method_id);
				wp_send_json_success($res);
			}
			wp_send_json_error('Payment method cannot be empty.');
		} catch (\Throwable $th) {
			wp_send_json_error($th->getMessage());
		}
	}

	public function wp_stripe_cancel_subscription()
	{
		try {
			$subscription_id = sanitize_text_field($_POST['subscription_id']);
			wp_send_json_success(DyDo_Stripe_Subscriptions::cancel_subscription($subscription_id));
		} catch (\Throwable $th) {
			wp_send_json_error($th->getMessage());
		}
	}

	public function wp_stripe_delete_payment_method()
	{
		try {
			$payment_methods = isset($_POST['payment_methods']) ? json_decode(wp_unslash(sanitize_text_field($_POST['payment_methods']))): array();
			$default_payment_method_id = sanitize_text_field(trim($_POST['default_payment_method_id']));
			if (isset($default_payment_method_id) && $default_payment_method_id != '' &&  count($payment_methods) > 0) {
				wp_send_json_success(DyDo_Stripe_PaymentMethods::detach_payment_methods($payment_methods, $default_payment_method_id));
			}
			wp_send_json_error('Must leave at least one payment method for remaining payments.');
		} catch (\Throwable $th) {
			wp_send_json_error($th->getMessage());
		}
	}

	private function verify_nonce($value)
	{
		$nonce = isset($value) ? sanitize_text_field($value) : '';

		if (!wp_verify_nonce($nonce, 'dydo-public-nonce')) {

			$data = array(
				'message' => 'Server Error',
				'error'   => 'Server Error',
			);

			wp_send_json_error($data);
		}
	}

    public function wp_stripe_update_payment_method() {
        try {
            if (isset($_POST['payment_method'])) {
                wp_send_json_success(DyDo_Stripe_PaymentMethods::update_payment_method($_POST['payment_method'], $_POST['exp_month'], $_POST['exp_year']));
            }
        } catch (\Throwable $th) {
            wp_send_json_error($th->getMessage());
        }
    }

    public function wp_stripe_payment_method_as_primary() 
    {
        try {
            wp_send_json_success(DyDo_Stripe_Customers::payment_method_set_as_primary((sanitize_text_field($_POST['paymentmethod']))));
        } catch (\Throwable $th) {
            //throw $th;
        }
        
    }
}
