<?php

use Stripe\ErrorObject;

class DyDo_Admin_Ajax
{

	public function __construct()
	{
		$this->add_ajax_events();
	}

	public function add_ajax_events()
	{
		$ajax_events = array(
			'check_stripe_credentials',
			'get_donations',
			'save_paragraphs',
			'get_paragraphs',
			'save_donations_url_type',
			'save_label_button',
			'save_currencies',
			'save_show_currencies',
			'save_enable_donation_types_stripe',
			'save_stripe_credentials',
			'save_theme',
			'save_payment_gateway',
			'save_amounts',
			'save_enable_paragraphs',
			'get_donations_by_date_range',
			'get_donations_total_by_intervals',
			'get_previous_donations_currency',
			'activate_plugin',
			'generate_donations_csv',
			'save_receipts_settings',
			'create_webhook',
			'stripe_get_users_to_sync',
			'stripe_sync_onetime_donations',
			'stripe_sync_recurring_donations',
			'stripe_add_metadata_to_subs',
			'stripe_sync_recurring_donations_payments',
            'get_list_of_users',
            "send_reminders_expired"
		);

		foreach ($ajax_events as $ajax_event) {
			add_action("wp_ajax_dydo_{$ajax_event}", array($this, $ajax_event));
		}
	}

	/**
	 * Check that the stripe credentials are correct
	 * */
	public function check_stripe_credentials()
	{
		$res = DyDo_Stripe_Customers::all(1);

		if (isset($res->data)) {
			wp_send_json_success(__dydo('Success connection!'));
		} else {
			wp_send_json_error($res->message);
		}
	}

	public function get_donations()
	{
		$data      = array();
		$donations = dydo_get_donations(
			array(
				array('ORDER', 'BY', 'created_at'),
				'DESC',
			)
		);

		foreach ($donations as $donation) {
			$user = get_user_by('id', $donation->user_id);

			array_push(
				$data,
				array_merge(
					(array) $donation,
					array(
						'name' => "{$user->last_name}, {$user->first_name} ",
					)
				)
			);
		}

		wp_send_json_success($data);
	}

	public function save_paragraphs()
	{
		$description   = wp_unslash(sanitize_textarea_field($_POST['description']));
		$helper_labels = array(
			'donationTypeHelperLabel'      => sanitize_text_field($_POST['donationTypeHelperLabel'] ?: ''),
			'recurringDonationHelperLabel' => sanitize_text_field($_POST['recurringDonationHelperLabel'] ?: ''),
			'donationAmountHelperLabel'    => sanitize_text_field($_POST['donationAmountHelperLabel'] ?: ''),
			'addCardHelperLabel'           => sanitize_text_field($_POST['addCardHelperLabel'] ?: ''),
			'loginHelperLabel'             => sanitize_text_field($_POST['loginHelperLabel'] ?: ''),
			'registerHelperLabel'          => sanitize_text_field($_POST['registerHelperLabel'] ?: ''),
		);
		dydo_save_options_array($description, 'style', 'description');
		dydo_save_options_array($helper_labels, 'style', 'helper_labels');
		wp_send_json_success(array($description, $helper_labels));
	}

	public function save_enable_paragraphs()
	{
		$show_description = sanitize_text_field($_POST['showDescription']);
		dydo_save_options_array($show_description === 'true' ? 1 : 0, 'style', 'show_description');
		wp_send_json_success(array($show_description));
	}

	public function save_donations_url_type()
	{
		$donations_url      = sanitize_textarea_field($_POST['donationsUrl']);
		$donations_page     = sanitize_textarea_field($_POST['donationsPage']);
		$donations_url_type = sanitize_textarea_field($_POST['donatiosUrlType']);
		dydo_save_options_array($donations_url_type, 'donations', 'donations_url_type');
		dydo_save_options_array($donations_page, 'donations', 'donations_page');
		dydo_save_options_array($donations_url, 'donations', 'donations_url');
		wp_send_json_success('ok');
	}

	public function save_label_button()
	{
		dydo_save_options_array(sanitize_textarea_field($_POST['labelButton']), 'style', 'label_button');
		wp_send_json_success('ok');
	}

	public function save_currencies()
	{
		$default_currency    = sanitize_text_field($_POST['defaultCurrency']);
		$selected_currencies = sanitize_text_field($_POST['selectedCurrencies']);
		dydo_save_options_array($default_currency ?: 'usd', 'payment', 'default_currency');
		dydo_save_options_array(!empty($selected_currencies) ? explode(',', $selected_currencies) : array('usd'), 'payment', 'selected_currencies');
		wp_send_json_success(array($default_currency, $selected_currencies));
	}

	public function save_show_currencies()
	{
		$show_currencies = sanitize_text_field($_POST['showCurrencies']);
		dydo_save_options_array($show_currencies === 'true' ? 1 : 0, 'style', 'show_currencies');
		wp_send_json_success($show_currencies);
	}

	public function save_enable_donation_types_stripe()
	{
		$recurring_donation = sanitize_text_field($_POST['recurringDonation']);
		$onetime_donation   = sanitize_text_field($_POST['onetimeDonation']);
		dydo_save_options_array($recurring_donation === 'true' ? 1 : 0, 'donations', 'recurring_donation_enabled');
		dydo_save_options_array($onetime_donation === 'true' ? 1 : 0, 'donations', 'onetime_donation_enabled');
		wp_send_json_success(array($recurring_donation, $onetime_donation));
	}

	public function save_stripe_credentials()
	{
		try {
			$stripe_pk = sanitize_text_field($_POST['pk']);
			$stripe_sk = sanitize_text_field($_POST['sk']);
			dydo_save_options_array($stripe_pk, 'payment', 'stripe_pk');
			dydo_save_options_array($stripe_sk, 'payment', 'stripe_sk');
			wp_send_json_success(
				array(
					'stripePK' => $stripe_pk,
					'stripeSK' => $stripe_sk,
				)
			);
		} catch (\Throwable $th) {
			wp_send_json_error(
				$th->getMessage()
			);
		}
	}

	public function create_webhook()
	{
		try {
			$create_webhook = wp_validate_boolean($_POST['createWebhook']);
			$webhook_id     = dydo_get_options_array()['stripe_webhook']['id'];

			if ($create_webhook) {
				if (isset($webhook_id) && !empty($webhook_id)) {
					$webhook = DyDo_Stripe_Webhooks::delete($webhook_id);
					dydo_save_options_array('', 'stripe_webhook', 'id');
				}
				$webhook = DyDo_Stripe_Webhooks::create(
					get_site_url()  . '/wp-json/' . PWP_SITE_API_PREFIX . 'webhook',
					array(
						'payment_intent.succeeded',
						'charge.refunded',
					)
				);
				if ($webhook instanceof ErrorObject) {
					wp_send_json_error($webhook->message);
				}
				$webhook_id = $webhook->id;
				dydo_save_options_array($webhook_id, 'stripe_webhook', 'id');
			}
			wp_send_json_success($webhook_id);
		} catch (\Throwable $th) {
			wp_send_json_error(
				$th->getMessage()
			);
		}
	}

	public function save_theme()
	{
		$theme        = sanitize_text_field($_POST['theme']);
		$custom_style = sanitize_textarea_field($_POST['customStyle']);
		dydo_save_options_array($theme, 'style', 'theme');
		dydo_save_options_array(wp_unslash($custom_style), 'style', 'custom_style');
		wp_send_json_success(array($theme, $custom_style));
	}

	public function save_payment_gateway()
	{
		$payment_gateway = sanitize_text_field($_POST['paymentGateway']);
		dydo_save_currency_by_default_on_switch($payment_gateway);
		dydo_save_options_array($payment_gateway, 'payment', 'payment_gateway');
		wp_send_json_success($payment_gateway);
	}

	public function save_amounts()
	{
		$amounts = json_decode(wp_unslash($_POST['amounts']), true);
		$cleaned_amounts = array_map(
			function ($amount) {
				return [
					'title' => sanitize_text_field($amount['title']), 'name' => sanitize_text_field($amount['name']),
					'enabled_name' => sanitize_text_field($amount['enabled_name']), 'value_name' => sanitize_text_field($amount['value_name']),
					'amount_checked' => wp_validate_boolean($amount['amount_checked']), 'enabled' => wp_validate_boolean($amount['enabled']), 'amount' => sanitize_text_field($amount['amount'])
				];
			},
			$amounts
		);
		dydo_save_options_array($cleaned_amounts, 'donations', 'amounts');
		wp_send_json_success('Amounts saved successfully.');
	}

	public function get_donations_by_date_range()
	{
		$interval_count = sanitize_text_field($_POST['intervalCount']) ?: 7;
		$interval_unit   = sanitize_text_field($_POST['intervalUnit']) ?: 'day';
		$order           = strtoupper(sanitize_text_field($_POST['order'])) ?: 'DESC';
		$currency        = strtoupper(sanitize_text_field($_POST['currency'])) ?: 'USD';
		$between_date    = $this->get_date_range("-{$interval_count} {$interval_unit}");

		$donations = dydo_get_donations(
			array(
				array('WHERE', 'created_at', 'BETWEEN', "'{$between_date['start']}'", 'AND', "'{$between_date['end']}'"),
				array('AND', 'currency', '=', "'{$currency}'"),
				array('ORDER', 'BY', 'created_at', $order),
			)
		);

		wp_send_json_success($donations);
	}

	public function get_donations_total_by_intervals()
	{
		try {
			$interval_unit      = trim(sanitize_text_field($_POST['intervalUnit'])) ?: 'day';
			$currency           = trim(strtoupper(sanitize_text_field($_POST['currency']))) ?: 'USD';
			$payment_gateway    = trim(strtolower(sanitize_text_field($_POST['paymentGateway']))) ?: 'woocommerce';
			$filtered_donations = dydo_get_donations_total_by_date_interval($interval_unit, $currency, $payment_gateway);
			wp_send_json_success($filtered_donations);
		} catch (\Throwable $th) {
			wp_send_json_error($th->getMessage());
		}
	}

	public function get_previous_donations_currency()
	{
		try {
			$payment_gateway    = trim(strtolower(sanitize_text_field($_POST['paymentGateway']))) ?: 'woocommerce';
			$filtered_donations = dydo_get_donations(array('WHERE payment_gateway="' . $payment_gateway . '" AND TRIM(currency) <> "" ', 'GROUP BY currency'), 'SELECT DISTINCT currency');
			wp_send_json_success($filtered_donations);
		} catch (\Throwable $th) {
			wp_send_json_error($th->getMessage());
		}
	}

	public function save_receipts_settings()
	{
		try {
			$activate_receipts = wp_validate_boolean($_POST['receipts']) ? $_POST['receipts'] : false;
			$activate_smtp     = wp_validate_boolean($_POST['smtp']) ? $_POST['smtp'] : false;
			$custom_paragraph  = sanitize_textarea_field($_POST['customParagraph']) ?: '';
			$bcc               = sanitize_text_field($_POST['bcc']) ?: '';
			$payment_gateways  = dydo_get_options_array()['receipts']['payment_gateway'];
			$payment_gateways[dydo_get_options_array()['payment']['payment_gateway']] = $activate_receipts;
			dydo_save_options_array($custom_paragraph, 'receipts', 'custom_paragraph');
			dydo_save_options_array($bcc, 'receipts', 'bcc');
			dydo_save_options_array($payment_gateways, 'receipts', 'payment_gateway');
			dydo_save_options_array($activate_smtp, 'receipts', 'smtp');
			if ($activate_smtp) {
				$smtp_settings     = json_decode(wp_unslash($_POST['smtpSettings']), true);
				$cleaned_smtp_settings = [
					'host' => sanitize_text_field($smtp_settings['host']),
					'username' => sanitize_user($smtp_settings['username']),
					'password' => sanitize_text_field($smtp_settings['password']),
					'from' => sanitize_text_field($smtp_settings['from']),
					'from_name' => sanitize_text_field($smtp_settings['from_name']),
					'custom_paragraph' =>  sanitize_textarea_field($smtp_settings['custom_paragraph']),
					'port' => sanitize_text_field($smtp_settings['port']),
					'auth' => sanitize_text_field($smtp_settings['auth']),
				];
				if (
					!dydo_set_not_empty($cleaned_smtp_settings['host']) ||
					!dydo_set_not_empty($cleaned_smtp_settings['port']) ||
					!dydo_set_not_empty($cleaned_smtp_settings['from']) ||
					!dydo_set_not_empty($cleaned_smtp_settings['from_name']) ||
					!is_email($cleaned_smtp_settings['from'])
				) {
					wp_send_json_error('There are missing smtp fields.');
				}
				if (
					$cleaned_smtp_settings['auth'] == true && (!dydo_set_not_empty($cleaned_smtp_settings['username'])
						|| !dydo_set_not_empty($cleaned_smtp_settings['password']))
				) {
					wp_send_json_error('There are missing auth smtp fields.');
				}
				dydo_save_options_array($smtp_settings, 'receipts', 'smtp_settings');
			}
			wp_send_json_success('Smtp options saved');
		} catch (\Throwable $th) {
			wp_send_json_error($th->getMessage());
		}
	}

	public function activate_plugin()
	{
		$key    = sanitize_text_field($_POST['key']);
		$domain = dydo_get_protocol();
		$url     = PWP_SITE_BASE_URL . '/wp-json' . PWP_SITE_LICENSES_ENDPOINT;
		if (!isset($key) || empty($key)) {
			wp_send_json_error('Invalid key provided.');
		}
		$res     = dydo_request(
			$url,
			'POST',
			array(
				'action' => 'activate',
				'key'    => $key,
				'domain' => $domain,
			)
		);
		$body    = json_decode($res['body']);
		if (!is_wp_error($res) && $res['response']['code'] == 200) {
			$license = array(
				'key'         => $key,
				'product_id'  => $body->product_unique_id,
				'installable' => false,
				// 'status'      => 'completed',
			);
			dydo_save_options_array($license, 'license', 'code');
			dydo_save_options_array('active', 'license', 'status');
			unset($body->code);
			unset($body->status_code);
			$body->license = $license;
			wp_send_json_success($body);
		} else {
			wp_send_json_error($body);
		}
	}

	private function get_date_range($interval = '-7 day')
	{
		return array(
			'start' => date('Y-m-d', strtotime($interval)),
			'end'   => date('Y-m-d 23:59:59'),
		);
	}

	public function stripe_get_users_to_sync()
	{
		wp_send_json_success(get_users(['meta_key' => 'dydo_stripe_customer_id']));
	}

	public function stripe_sync_onetime_donations()
	{
		$added = 0;
		$total = 0;
		$failed = 0;
		$updated = 0;
		try {
			$user_id = sanitize_text_field($_POST['user_id']);
			$payments = DyDo_Stripe_Resources::list_payment_intent(get_user_meta($user_id, 'dydo_stripe_customer_id', true), 100);
			if ($payments != false) {
				foreach ($payments->autoPagingIterator() as $payment) {
					if (empty($payment['invoice'])) {
						$total++;
						$donation = dydo_get_donations(
							array(
								'WHERE',
								array('user_id', '=', strval($user_id)),
								'AND',
								array('transaction_id', '=',  "'{$payment['id']}'"),
								'AND',
								array('customer_id', '=', ' "' . get_user_meta($user_id, 'dydo_stripe_customer_id', true) . '"'),
								'AND',
								array('amount', '>',  0),
							),
							'SELECT *',
							DYDO_ONETIME_DONATION_TABLENAME
						);

						if (empty($donation)) {
							$added++;
							dydo_save_onetime_donation($payment['id'], dydo_stripe_convert_to_real_currency($payment['currency'], $payment['amount']), $payment['currency'], $payment['status'] == 'succeeded' ? true : false, $user_id, gmdate('Y-m-d H:i:s', $payment['created']));
						} else {
							if ($donation[0]->confirmed == 0 || $donation[0]->confirmed == false) {
								$updated++;
								dydo_update_onetime_donation($donation[0]->id, $payment['id'], dydo_stripe_convert_to_real_currency($payment['currency'], $payment['amount']), $payment['currency'], $payment['status'] == 'succeeded' ? true : false, $user_id);
							}
						}
					}
				}
			}
		} catch (\Throwable $th) {
			if ($th->getMessage() === "Api key missing or invalid") {
				wp_send_json_error($th->getMessage());
			}
			$failed++;
		}
		wp_send_json_success([
			'added' => $added,
			'total' => $total,
			'failed' => $failed,
			'updated' => $updated
		]);
	}

	public function stripe_sync_recurring_donations()
	{
		$added = 0;
		$total = 0;
		$failed = 0;
		$updated = 0;
		try {
			$user_id = sanitize_text_field($_POST['user_id']);
			$subscriptions  = new DyDo_Stripe_Subscriptions();
			$subscriptions_by_customer = $subscriptions->all_by_customer(get_user_meta($user_id, 'dydo_stripe_customer_id', true));
			foreach ($subscriptions_by_customer->autoPagingIterator() as $subscription) {
				if ($subscription->metadata->wp_user_id == $user_id) {
					$is_active    = $subscription->status === 'active' ? true : false;
					$next_invoice        = DyDo_Stripe_Invoices::upcoming(
						array(
							'customer'                => $subscription->customer,
							'subscription'            => $subscription->id,
						)
					);
					if (!$next_invoice  instanceof ErrorObject) {
						$donation          = dydo_get_donation(
							DYDO_SUBSCRIPTION_TABLENAME,
							array(
								'key'   => 'subscription_id',
								'value' => $subscription->id,
							)
						);
						if (!empty($donation)) {
							dydo_update_donation(
								array(
									'amount'         => (float) dydo_stripe_convert_to_real_currency($next_invoice->currency, $next_invoice->total),
									'next_payment_attempt' => $next_invoice->next_payment_attempt,
									'active' => $is_active,
									'updated_at' =>  wp_date('Y-m-d H:i:s')
								),
								array(
									'subscription_id' => $subscription->id,
									'user_id' => $user_id,
									'id' => $donation->id
								),

								DYDO_SUBSCRIPTION_TABLENAME
							);
							$updated++;
						} else {
							dydo_save_donation(
								DYDO_SUBSCRIPTION_TABLENAME,
								array(
									'user_id'          => $user_id,
									'customer_id'      => $subscription->customer,
									'subscription_id'  => $subscription->id,
									'dydo_gateways_id' => 2,
									'active'           => $is_active,
									'created_at'       => wp_date('Y-m-d H:i:s', $subscription->created),
									'updated_at'       => wp_date('Y-m-d H:i:s'),
									'amount'          => (float) dydo_stripe_convert_to_real_currency($next_invoice->currency, $next_invoice->total),
									'next_payment_attempt' =>  $next_invoice->next_payment_attempt
								)
							);
							$added++;
						}
					}
				}
				$total++;
			}
		} catch (\Throwable $th) {
			if ($th->getMessage() === "Api key missing or invalid") {
				return wp_send_json_error($th->getMessage());
			}
			$failed++;
		}
		wp_send_json_success([
			'added' => $added,
			'total' => $total,
			'failed' => $failed,
			'updated' => $updated
		]);
	}

	public function stripe_add_metadata_to_subs()
	{
		try {
			$subscriptions_rows = dydo_get_donations(array(), 'SELECT *', DYDO_SUBSCRIPTION_TABLENAME);
			$updated_subs = array();
			foreach ($subscriptions_rows as $subscription) {
				$subscriptions  = new DyDo_Stripe_Subscriptions();
				$user = get_user_by('id', $subscription->user_id);
				$subscription = $subscriptions->update($subscription->subscription_id, ['metadata'             => [
					'wp_user_id'    => $user->ID,
					'wp_user_email' => $user->user_email,
				]]);
				if (!$subscription  instanceof ErrorObject) {
					array_push($updated_subs, $subscription);
				}
			}
			return wp_send_json_success($subscriptions);
		} catch (\Throwable $th) {
			return wp_send_json_error($th->getMessage());
		}
	}

	public function stripe_sync_recurring_donations_payments()
	{
		$added = 0;
		$failed = 0;
		try {
			$user_id = sanitize_text_field($_POST['user_id']);
			$subscriptions = dydo_get_donations(
				array(
					'WHERE',
					array('user_id', '=', strval($user_id)),
					'AND',
					array('customer_id', '=', ' "' . get_user_meta($user_id, 'dydo_stripe_customer_id', true) . '"'),
				),
				'SELECT *',
				DYDO_SUBSCRIPTION_TABLENAME
			);
			foreach ($subscriptions as $subscription) {
				$stripe_invoices = new DyDo_Stripe_Invoices();
				$invoices        = $stripe_invoices->list_all_invoices($subscription->customer_id, $subscription->subscription_id)['data'];
				if ($invoices == false) {
					continue;
				}
				foreach ($invoices as $invoice) {
					if (empty($invoice->payment_intent) || $invoice->payment_intent == '') {
						continue;
					}
					$donations = dydo_get_donations(
						array(
							'WHERE',
							array('amount', '=', strval((float) dydo_stripe_convert_to_real_currency($invoice->currency, $invoice->total))),
							'AND',
							array('transaction_id', '=', "'" . $invoice->payment_intent . "'"),
							'AND',
							array('created_at', '=', "'" . strval(gmdate('Y-m-d H:i:s', $invoice->created) . "'")),
							'AND',
							array('dydo_subscriptions_id', '=', strval($subscription->id))
						),
						'SELECT *',
						DYDO_SUBSCRIPTION_DONATION_TABLENAME
					);
					if ($invoice->paid == 1 && empty($donations)) {
						dydo_save_donation(
							DYDO_SUBSCRIPTION_DONATION_TABLENAME,
							array(
								'transaction_id' => $invoice->payment_intent,
								'amount'         => (float) dydo_stripe_convert_to_real_currency($invoice->currency, $invoice->total),
								'currency'       => strtoupper($invoice->currency,),
								DYDO_SUBSCRIPTION_TABLENAME . '_id' => $subscription->id,
								'created_at'     => gmdate('Y-m-d H:i:s', $invoice->created),
							)
						);
						$added++;
					}
				}
			}
		} catch (\Throwable $th) {
			if ($th->getMessage() === "Api key missing or invalid") {
				return wp_send_json_error($th->getMessage());
			}
			$failed++;
		}
		return wp_send_json_success([
			'added' => $added,
			'failed' => $failed,
		]);
	}

    public function get_list_of_users() {
        $users = get_users();
        $array_emails = [];
        // username, email, brand, last4, date, days
        foreach ($users as $user) {
            $customer_id = DyDo_Stripe_Customers::wp_get_user_customer_id($user->ID);
            $payment_methods_by_user = DyDo_Stripe_PaymentMethods::all(100, $customer_id);
            if (isset($payment_methods_by_user->data)) {
                foreach ($payment_methods_by_user->data as $paymentmethod) {

                    // iterate payment methods by user and verify each one
                    $days = $this->verify_days_for_expired_payment_methods($paymentmethod, $user->user_email);
                    //if ($days == 15 || $days == 4 || $days == 0 || $days < 0)
                    if ($days < 15) {
                        array_push($array_emails, [
                            "email" => $user->user_email,
                            "days" => $days,
                            "card" => strtoupper ($paymentmethod->card->brand).' ****-****-****-'.$paymentmethod->card->last4,
                            "exp_month" => $paymentmethod->card->exp_month,
                            "exp_year" => $paymentmethod->card->exp_year,
                        ]);
                    }
                }                
            }  
        }
        return wp_send_json_success($array_emails);
    }

    private function verify_days_for_expired_payment_methods($paymentmethod, $email) 
    {
        $fecha_actual = new DateTime(date('Y-m-d'));
        $fecha_aux = $paymentmethod->card->exp_year.'-'.$paymentmethod->card->exp_month.'-01';
        $last_date_of_month = date("Y-m-t", strtotime($fecha_aux));
        $last_day = substr($last_date_of_month, -2, 2);
        $fecha_card = $paymentmethod->card->exp_year.'-'.$paymentmethod->card->exp_month.'-'.$last_day;
        $fecha_final = new DateTime($fecha_card);
        $dias = $fecha_actual->diff($fecha_final)->format('%r%a');
        // echo 'Payment: '.$paymentmethod->card->last4.' expire on '.$dias.' days (user mail: '.$email.') <br>';
        return $dias;
    }

    public function send_reminders_expired() {
        $list_of_emails = explode(',', $_POST['emails']);
        try {
            $my_instance = new DyDo_Stripe_Webhooks_Management($this->get_origin_ip());
            $my_instance->send_payment_method_expired_mail($list_of_emails);
            return wp_send_json_success('success');
        } catch (\Throwable $th) {
            wp_send_json_error($th->getMessage());
        }  
    }

    private function get_origin_ip()
	{
		return isset($_SERVER['REMOTE_ADDR']) ? wp_unslash(sanitize_url($_SERVER['REMOTE_ADDR'])) : '0.0.0.0';
	}
}
