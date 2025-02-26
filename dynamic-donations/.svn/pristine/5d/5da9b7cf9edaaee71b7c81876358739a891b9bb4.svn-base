<?php

use Stripe\ErrorObject;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;

class DyDo_Stripe_Webhooks_Management
{

	private $allowed_hosts           = array(
		'http://3.18.12.63',
		'http://3.130.192.231',
		'http://13.235.14.237',
		'http://13.235.122.149',
		'http://18.211.135.69',
		'http://35.154.171.200',
		'http://52.15.183.38',
		'http://54.88.130.119',
		'http://54.88.130.237',
		'http://54.187.174.169',
		'http://54.187.205.235',
		'http://54.187.216.72',
		'http://192.168.48.1',
		'https://3.18.12.63',
		'https://3.130.192.231',
		'https://13.235.14.237',
		'https://13.235.122.149',
		'https://18.211.135.69',
		'https://35.154.171.200',
		'https://52.15.183.38',
		'https://54.88.130.119',
		'https://54.88.130.237',
		'https://54.187.174.169',
		'https://54.187.205.235',
		'https://54.187.216.72',
		'https://192.168.48.1'
	);
	private string $referer_ip       = '';
	private $mail_template_variables = array(
		'[website_name]'     => '',
		'[username]'         => '',
		'[custom_paragraph]' => '',
		'[donation_type]'    => '',
		'[amount]'           => '',
		'[currency]'         => '',
		'[link]'             => '',
        '[brand]'            => '',
        '[last4]'            => '',
        '[exp_year]'         => '',
        '[exp_month]'        => '',
        '[site_url]'        => ''
	);

	public function __construct(string $referer_ip)
	{
		$this->referer_ip = $referer_ip;
		if (dydo_get_options_array()['receipts']['smtp'] == true) {
			add_action('phpmailer_init', 'dydo_phpmailer_settings');
			add_action(
				'wp_mail_failed',
				function ($error) {
				}
			);
		}
	}

	/**
	 * @return ErrorObject|PaymentIntent|null
	 */
	public function manage_webhook_request(object $request)
	{
		try {
			if (in_array($this->referer_ip, $this->allowed_hosts)) {
				$decoded_request = JSON_decode($request->get_body(), true);
				$request_data    = $decoded_request['data']['object'];
				switch ($decoded_request['type']) {
					case 'payment_intent.succeeded':
						$this->payment_intent_succeeded($request_data);
						break;

					case 'charge.refunded':
						$this->charge_refunded($request_data);
						break;
					default:
						break;
				}
				return wp_send_json_success('Host not allowed');
			}
			return wp_send_json_error('Host not allowed');
		} catch (\Throwable $th) {
			return wp_send_json_error($th->getMessage());
		}
	}

	public function charge_refunded($request_data)
	{
		try {
			if ($request_data['amount'] > 0) {
				$currency = $request_data['currency'];
				$refund_amount = ($request_data['amount']) * (-1);
				if (!empty($request_data['invoice'])) {
					$invoices = new DyDo_Stripe_Invoices();
					$invoice  = $invoices->retrieve($request_data['invoice']);
					$subscription_id   = $invoice['lines']['data'][0]['subscription'];
					$donation          = dydo_get_donation(
						DYDO_SUBSCRIPTION_TABLENAME,
						array(
							'key'   => 'subscription_id',
							'value' => $subscription_id,
						)
					);
					if (empty($donation)) {
						return wp_send_json_error('Subscription does not exists.');
					}
					dydo_save_donation(
						DYDO_SUBSCRIPTION_DONATION_TABLENAME,
						array(
							'transaction_id'                    => $request_data['payment_intent'],
							'amount'                            => dydo_stripe_convert_to_real_currency($currency, $refund_amount),
							'currency'                          => strtoupper($currency),
							DYDO_SUBSCRIPTION_TABLENAME . '_id' => $donation->id,
							'created_at'                        => gmdate('Y-m-d H:i:s',  $request_data['refunds']['data'][0]['created']),
                            'confirmed' => 1
						)
					);
					return wp_send_json_success('Refund saved.');
				}
				$donation          = dydo_get_donation(
					DYDO_ONETIME_DONATION_TABLENAME,
					array(
						'key'   => 'transaction_id',
						'value' => $request_data['payment_intent'],
					)
				);
				if (empty($donation)) {
					return wp_send_json_error('There are not previous payment intents for this refund.');
				}
				dydo_save_donation(
					DYDO_ONETIME_DONATION_TABLENAME,
					array(
						'user_id'                    	=> 	$request_data['metadata']['wp_user_id'],
						'customer_id'                    	=> $request_data['customer'],
						'transaction_id'                    => $request_data['payment_intent'],
						'amount'                            => dydo_stripe_convert_to_real_currency($currency, $refund_amount),
						'currency'                          => strtoupper($currency),
						'created_at'                        => gmdate('Y-m-d H:i:s', $request_data['refunds']['data'][0]['created']),
						'dydo_gateways_id' => 2,
                        'confirmed' => 1
					)
				);
				return wp_send_json_success('Refund saved.');
			}
		} catch (\Throwable $th) {
			return wp_send_json_error($th->getMessage);
		}
	}


	/*
		We only want to save subscriptions payments or donations because we already saved one time donations
		on the fly.
	*/
	public function payment_intent_succeeded($request_data)
	{
		try {
			$invoices = new DyDo_Stripe_Invoices();
			$invoice  = $invoices->retrieve($request_data['charges']['data'][0]['invoice']);
			if ($invoice !== '') {
				$subscription_id   = $invoice['lines']['data'][0]['subscription'];
				if ($subscription_id === '' && !isset($subscription_id) && empty($subscription_id)) {
					return wp_send_json_error('Subscription not attached to invoice.');
				}
				$donation          = dydo_get_donation(
					DYDO_SUBSCRIPTION_TABLENAME,
					array(
						'key'   => 'subscription_id',
						'value' => $subscription_id,
					)
				);
				if (empty($donation)) {
					return wp_send_json_error('Subscription not found.');
				}
				$next_invoice        = DyDo_Stripe_Invoices::upcoming(
					array(
						'customer'                => $donation->customer_id,
						'subscription'            => $subscription_id,
					)
				);
				$payment_intent_id = $invoice->payment_intent;
				$currency          = $invoice->currency;
				$amount = dydo_stripe_convert_to_real_currency($currency, $invoice->amount_paid);
				dydo_update_donation(
					array(
						'updated_at'       => wp_date('Y-m-d H:i:s'),
						'next_payment_attempt' => $next_invoice->next_payment_attempt
					),
					array(
						'subscription_id' => $subscription_id,
					),
					DYDO_SUBSCRIPTION_TABLENAME

				);
				dydo_save_donation(
					DYDO_SUBSCRIPTION_DONATION_TABLENAME,
					array(
						'transaction_id'                    => $payment_intent_id,
						'amount'                            => $amount,
						'currency'                          => strtoupper($currency),
						DYDO_SUBSCRIPTION_TABLENAME . '_id' => $donation->id,
						'created_at'                        => gmdate('Y-m-d H:i:s', $invoice->created),
					)
				);
			}
			if (dydo_get_options_array()['receipts']['payment_gateway']['stripe'] == true) {
				$this->send_receipt_email($request_data);
			};
			return wp_send_json_success('Saved.');
		} catch (\Throwable $th) {
			return wp_send_json_error($th->getMessage());
		}
	}

	public function send_receipt_email($request_data)
	{
		try {
			$html = dydo_convert_file_to_string(DYDO_MAIL_TEMPLATES_PATH . 'stripe-receipt/template.html');
			$this->mail_template_variables['[website_name]']     = get_bloginfo('title');
			$this->mail_template_variables['[custom_paragraph]'] = dydo_get_options_array()['receipts']['custom_paragraph'];
			$invoice = isset($request_data['invoice']) ? $request_data['charges']['data'][0] : '';
			$transaction_id = $request_data['id'];
			if ($invoice == '') {
				$donation                                    = dydo_get_donation(
					DYDO_ONETIME_DONATION_TABLENAME,
					array(
						'key'   => 'transaction_id',
						'value' => $transaction_id,
					)
				);
				$email                                       = $request_data['receipt_email'];
				$user                                        = get_user_by('email', $email);
				$this->mail_template_variables['[username]'] = $user->display_name;
				$this->mail_template_variables['[donation_type]'] = 'One time';
			} else {
				$invoices                                    = new DyDo_Stripe_Invoices();
				$invoice                                     = $invoices->retrieve($request_data['charges']['data'][0]['invoice']);
				$donation                                   = dydo_get_donation(
					DYDO_SUBSCRIPTION_DONATION_TABLENAME,
					array(
						'key'   => 'transaction_id',
						'value' => $transaction_id,
					)
				);
				$email                                       = $invoice['customer_email'];
				$user                                        = get_user_by('email', $email);
				$this->mail_template_variables['[username]'] = $user->display_name;
				$this->mail_template_variables['[donation_type]'] = 'Recurring';
			}
			$this->mail_template_variables['[currency]'] = $donation->currency;
			$this->mail_template_variables['[amount]']   = $donation->amount;
			$this->mail_template_variables['[link]']     = $request_data['charges']['data'][0]['receipt_url'];

			foreach ($this->mail_template_variables as $variable => $value) {
				$html = str_replace($variable, $value, $html);
			}
			$headers[] = 'Content-Type: text/html; charset=UTF-8 From:' . dydo_get_options_array()['receipts']['smtp_settings']['from'] . ' ';
			$bcc       = dydo_get_options_array()['receipts']['bcc'];
			if (isset($bcc) && trim($bcc) != '') {
				$headers[] = 'Bcc: ' . $bcc;
			}
			return wp_mail($email, 'Your donation receipt', $html, $headers);
		} catch (\Throwable $th) {
			throw $th;
		}
	}

    public function send_payment_method_expired_mail($emails) 
    {
        try {
            $html = dydo_convert_file_to_string(DYDO_MAIL_TEMPLATES_PATH . 'payment-method-expired/template.html');
            $this->mail_template_variables['[site_url]']  = get_site_url();
            foreach ($this->mail_template_variables as $variable => $value) {
                $html = str_replace($variable, $value, $html);
            }
            $headers[] = 'Content-Type: text/html; charset=UTF-8 From:' . dydo_get_options_array()['receipts']['smtp_settings']['from'] . ' ';
            foreach ($emails as $emailto) {
                wp_mail($emailto, 'Important: Your Payment Method Needs Attention to Continue Supporting Us! ', $html, $headers);
            }
            return true;
        } catch (\Throwable $th) {
            return 'error';
        }
    }
}
