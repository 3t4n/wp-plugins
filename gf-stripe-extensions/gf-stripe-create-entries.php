<?php
class GFCreateEntries {
	public static function add_hooks() {
		add_action('parse_request', array('GFCreateEntries', 'parse_request'), 4);
	}
	public static function stripe_form() {
		return GFStripeExtensions::get_option('stripe-form');
	}
	public static function paypal_form() {
		return GFStripeExtensions::get_option('paypal-form');
	}
	public static function process_stripe() {
		return class_exists('GFStripe') && isset($_GET['callback']) && $_GET['callback'] == 'gravityformsstripe' && self::stripe_form() != '0' && self::stripe_form() != '';
	}
	public static function process_paypal() {
		return class_exists('GFPayPal') && isset($_GET['page']) && $_GET['page'] == 'gf_paypal_ipn' && self::paypal_form() != '0' && self::paypal_form() != '';
	}
	public static function stripe() {
		return GFStripeExtensions::get_boolean('stripe-test-webhooks') ? GFStripeExt::get_instance() : GFStripe::get_instance();
	}
	public static function stripe_data($event) {
		$stripe = self::stripe();
		$data = $event->data;
		$object = $data->object; 
		$subscription = isset($data->object->lines) && isset($data->object->lines) ? $stripe->get_subscription_line_item($event) : null;
		$recurring = (bool) $subscription;

		$data = array(
			'token' => null,
			'amount' => ($object->amount ? $object->amount : $object->amount_paid)/100,
			'currency' => strtoupper($object->currency),
			'recurring' => $recurring,
			'ip' => $_SERVER['REMOTE_ADDR'],
			'description' => $object->description,

			'test' => !$event->livemode,
			'name' => $object->customer_name,
			'email' => $object->customer_email,
			'phone' => $object->customer_phone,

			//TODO: address
			/*'address1' => self::get_param('address1'),
			'address2' => self::get_param('address2'),
			'city' => self::get_param('city'),
			'state' => self::get_param('state'),
			'zip' => self::get_param('zip'),
			'country' => self::get_param('country'),*/

			//TODO: url???
			'url' => $_SERVER['HTTP_REFERER'],
			'useragent' => $_SERVER['HTTP_USER_AGENT'],

			'cardnumber' => null,
			'cardtype' => 'Stripe',
			'method' => 'Stripe',
			'process' => false,

			'date' => date('Y-m-d H:i:s', $object->date ? $object->date : $object->created),
			'fulfilled' => 1,
			'status' => $recurring ? 'Active' : 'Authorized',
			'transaction' => $recurring ? $object->charge : $event->data->object->id,
			'subscription' => $recurring ? rgar($subscription, 'subscription') : null
		);

		if ($object->payment_method_details && $object->payment_method_details->card) {
			$card = $object->payment_method_details->card;
			$data['cardnumber'] = 'XXXXXXXXXXXXX'.$card->last4;
			$data['cardtype'] = ucfirst($card->brand);
			//$data['method'] = $data['cardtype'];
		}
		if ($object->billing_details) {
			$billing = $object->billing_details;
			$address = $billing->address;
			$data['address1'] = $address->line1;
			$data['address2'] = $address->line2;
			$data['city'] = $address->city;
			$data['state'] = $address->state;
			$data['zip'] = $address->postal_code;
			$data['country'] = $address->country;
			$data['email'] = $billing['email'];
			$data['phone'] = $billing['phone'];
			$data['name'] = $billing['name'];
		}
		if ($data['description'] == null || $data['description'] == '') {
			if ($object->lines && $object->lines->data && count($object->lines->data) > 0) {
				$line = $object->lines->data[0];
				$description = $line->description;
				if (strpos($description, '×') !== false) {
					$parts = explode('×', $description, 2);
					$description = $parts[1];
				}
				if (strpos($description, ' (') !== false) {
					$parts = explode(' (', $description, 2);
					$description = $parts[0];
				}
				$data['description'] = trim($description);
			}
		}

		//Refactor
		$data['total'] = $data['amount'];
		if ($data['firstname'] == null || $data['firstname'] == '') {
			$parts = explode(' ', $data['name'], 2);
			$data['firstname'] = count($parts) > 0 ? $parts[0] : null;
			$data['lastname'] = count($parts) > 1 ? $parts[1] : null;
		}
		return $data;
		
	}
	public static function paypal_data() {
		//https://developer.paypal.com/docs/classic/ipn/integration-guide/IPNandPDTVariables/#subscription-variables
		$item = rgpost('item_name1');
		$recurring = rgpost('txn_type') == 'subscr_payment';
		$item = $item != '' && $item != null ? $item : 'PayPal '.($recurring ? 'Subscription' : 'Payment');
		$data = array(
			'token' => null,
			'amount' => rgpost('mc_gross'),
			'currency' => rgpost('mc_currency'),
			'recurring' => $recurring,
			'ip' => $_SERVER['REMOTE_ADDR'],
			'description' => $item,

			'test' => (bool) rgpost('test_ipn'),
			'name' => rgpost('first_name').' '.rgpost('last_name'),
			'email' => rgpost('payer_email'),
			'phone' => null,

			'address1' => rgpost('address_street'),
			'address2' => null,
			'city' => rgpost('address_city'),
			'state' => rgpost('address_state'),
			'zip' => rgpost('address_zip'),
			'country' => rgpost('address_country'),

			//TODO: url???
			'url' => $_SERVER['HTTP_REFERER'],
			'useragent' => $_SERVER['HTTP_USER_AGENT'],

			'cardnumber' => null,
			'cardtype' => 'PayPal',
			'method' => 'PayPal',
			'process' => false,

			'date' => date('Y-m-d H:i:s', (new DateTime(rgpost('payment_date')))->getTimestamp() ),
			'fulfilled' => 1,
			'status' => $recurring ? 'Active' : 'Authorized',
			'transaction' => rgpost('txn_id'),
			'subscription' => rgpost('subscr_id')
		);

		//Refactor
		$data['total'] = $data['amount'];
		return $data;
		
	}
	public static function recent_entry($email) {
		global $wpdb;
		$prefix = $wpdb->prefix;
		$sql = "SELECT e.id
			FROM {$prefix}gf_entry e, {$prefix}gf_entry_meta m
			WHERE e.id = m.entry_id AND m.meta_value = '{$email}'
				AND date_created >= DATE_SUB(NOW(),INTERVAL 1 HOUR)
			LIMIT 1";
		$entry = $wpdb->get_results($sql);
		//return true for error because at least we won't proceed then
		return $wpdb->last_error != '' || count($entry) > 0;
	}
	public static function log_debug($message) {
		//error_log($message."\n");
		$addon = GFStripeExtensionsAddon::get_instance();
		$addon->log_debug($message);
	}
	public static function parse_request($query) {
		if (self::process_stripe()) {
			$stripe = self::stripe();
			$event = $stripe->get_webhook_event();
			if ($event && !is_wp_error($event)) {
				$type = $event->type;
				//self::log_debug('GFStripeExt: Event: '.print_r($event, true));
				//Not doing one of payments because they don't contain an email address from GForms so we can't ignore them
				// || $type == 'charge.succeeded'
				if ($type == 'invoice.payment_succeeded') {
					if ($type == 'invoice.payment_succeeded') {
						$subscription = $stripe->get_subscription_line_item($event);
						$transaction_id = rgar($subscription, 'subscription');
					} elseif (GFStripeExt::manual_charge($event)) {
						$transaction_id = $event->data->object->id;
					}
					self::log_debug('GFStripeExt: type: '.$type.', transaction_id: '.$transaction_id);
					if ($transaction_id != null && $transaction_id != '') {
						$entry_id = $stripe->get_entry_by_transaction_id($transaction_id);
						if (!$entry_id) {
							$data = self::stripe_data($event);
							if ($data) {
								if ($data['email'] != '' && $data['email'] != null && !self::recent_entry($data['email'])) {
									//self::log_debug('GFStripeExt: Data '.print_r($data, true));
									$entry = GFStripeExtensionsAddon::create_entry($data, self::stripe_form());
									//self::log_debug('GFStripeExt: Entry '.print_r($entry, true));
									if ($entry) {
										$entry_id = GFAPI::add_entry($entry);
									} else {
										self::log_debug('GFStripeExt: Could not create entry');
									}
								} else {
									self::log_debug('GFStripeExt: Recent entry found or email missing, skipping');
								}
							} else {
								self::log_debug('GFStripeExt: No Stripe data');
							}
						} else {
							self::log_debug('GFStripeExt: Matching entry found, skipping');
						}
					} else {
						self::log_debug('GFStripeExt: transaction_id is blank');
					}
				}
			}
		} elseif (self::process_paypal()) {
			//self::log_debug('CreateEntries: PayPal Data '.print_r($_POST, true));

			$type = rgpost('txn_type');
			if ($type == 'subscr_payment'|| $type == 'cart') { //I think we can process one off payments (cart) because they should have a 'custom' id that is a saved entry_id
				$paypal = GFPayPalExt::get_instance();
				$reflector = new ReflectionObject($paypal);
				$method = $reflector->getMethod('verify_paypal_ipn');
				$method->setAccessible(true);
				$is_verified = $method->invoke($paypal);
				//$is_verified = $paypal->verify_paypal_ipn(); //This is private, and is causing an error
				if ($is_verified) {
					$custom_field = rgpost('custom');
					$entry = $paypal->get_entry($custom_field);
					if (!$entry) {
						$data = self::paypal_data();
						if ($data) {
							if ($data['email'] != '' && $data['email'] != null && !self::recent_entry($data['email'])) {
								$entry = GFStripeExtensionsAddon::create_entry($data, self::paypal_form());
								if ($entry) {
									$entry_id = GFAPI::add_entry($entry);
								} else {
									self::log_debug('GFPayPalExt: Could not create entry');
								}
							} else {
								self::log_debug('GFPayPalExt: Recent entry found or email missing, skipping');
							}
						} else {
							self::log_debug('GFPayPalExt: No PayPal data');
						}
					} else {
						self::log_debug('GFPayPalExt: Matching entry found, skipping');
					}
				}
			}
		}
	}
}

GFCreateEntries::add_hooks();