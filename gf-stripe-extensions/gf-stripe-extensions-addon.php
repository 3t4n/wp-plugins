<?php
if (class_exists('GFAddOn')) {
GFForms::include_payment_addon_framework();

class GFStripeExtensionsAddon extends GFAddOn {
	protected $_slug = 'gf-stripe-extensions';
	protected $_title = 'GF Stripe Extensions';
	protected $_short_title = 'GF Stripe Extensions';
	private static $_instance = null;
	public static $settings = 'gf-stripe-extensions';
	public static $settings_queries = 'gf-queries';
	public static $settings_limit = 'gf-limit-payments';

	public static function get_instance() {
		if ( self::$_instance == null ) {
			self::$_instance = new GFStripeExtensionsAddon();
		}
		return self::$_instance;
	}

	public function init_admin() {
		parent::init_admin();
	}
	/*public function plugin_settings_fields() {
		return array(
			array(
				'title'       => 'GF Stripe Extensions',
				'description' => '',
				'fields'      => array(
					array(
						'name'    => 'gf_stripe_extensions_apikey',
						'label'   => esc_html__( 'GF Stripe Extensions ApiKey', 'gf_stripe_extensions' ),
						'type'  => 'text',
						'default_value' => md5(wp_salt() . time())
					),
					array(
						'type' => 'save',
						'messages' => array(
							'success' => esc_html__( 'Settings have been updated.', 'gf_stripe_extensions' )
						),
					),
				),
			),
		);
	}*/
	public static function get_settings_query($form) {
		$form = is_array($form) ? $form : GFAPI::get_form($form);
		if (UtilsLib::array($form, self::$settings)) {
			return $form[self::$settings];
		} elseif ($form[self::$settings_queries]) {
			$settings = $form[self::$settings_queries];
			if ($settings) {
				$settings['transactions'] = $settings['enabled'];
			}
			return $settings;
		}
	}
	public static function get_settings_limit($form) {
		if ($form[self::$settings]) {
			return $form[self::$settings];
		} elseif ($form[self::$settings_limit]) {
			$settings = $form[self::$settings_limit];
			if ($settings) {
				$settings['limit'] = $settings['enabled'];
			}
			return $settings;
		}
	}
	public function form_settings_fields($form) {
		//Check if there are old settings from queries addon
		$queries = null;
		if (!$form[self::$settings]) {
			$queries = self::get_settings_query($form);
		}
		$limit = null;
		if (!$form[self::$settings]) {
			$limit = self::get_settings_limit($form);
		}
	
		$limits = array(array(
			'label' => esc_html__( 'infinite', $this->_slug),
			'name'  => '0'
		));
		for ($i=1; $i<=100; $i++) {
			$limits[] = array(
				'label' => esc_html__( ''.$i, $this->_slug),
				'name'  => ''.$i
			);
		}
		
		$fields = array(
			array(
				'label'   => esc_html__('Save To Sent (WPO 365)', $this->_slug),
				'type'    => 'select',
				'name'    => 'save_to_sent',
				'tooltip' => esc_html__('Save to sent settings for WPO365 plugin', $this->_slug),
				'choices' => array(
					array(
						'label' => esc_html__( '(Default)', $this->_slug),
						'name'  => 'default'
					),
					array(
						'label' => esc_html__( 'Yes', $this->_slug),
						'name'  => 'yes'
					),
					array(
						'label' => esc_html__( 'No', $this->_slug),
						'name'  => 'no'
					)
				)
			),
			array(
				'label'   => esc_html__('Enable Transactions API', $this->_slug),
				'type'    => 'checkbox',
				'name'    => 'transactions',
				'tooltip' => esc_html__('Enable Transactions API for this Gravity Form', $this->_slug),
				'choices' => array(
					array(
						'label' => esc_html__( 'Transactions', $this->_slug),
						'name'  => 'transactions',
						'default_value' => $queries ? $queries['transactions'] : 0
					)
				)
			),
			array(
				'label'   => esc_html__('Enable Analytics UI', $this->_slug),
				'type'    => 'checkbox',
				'name'    => 'analytics',
				'tooltip' => esc_html__('Enable Analytics UI for this Gravity Form', $this->_slug),
				'choices' => array(
					array(
						'label' => esc_html__( 'Analytics', $this->_slug),
						'name'  => 'analytics',
						'default_value' => $queries ? $queries['analytics'] : 0
					)
				)
			),
			array(
				'label'     => esc_html__('Field Mapping', $this->_slug),
				'type'      => 'field_map',
				'name'      => 'fields',
				'tooltip' => esc_html__('Map fields between this form and GF Stripe Extensions', $this->_slug),
				'field_map' => array(
					array(
						'name'          => 'firstname',
						'label'         => esc_html__( 'First Name', $this->_slug),
						'required'      => false,
						'field_type'    => array( 'text', 'name' ),
						'default_value' => $queries ? $queries['fields_firstname'] : ''
					),
					array(
						'name'          => 'lastname',
						'label'         => esc_html__( 'Last Name', $this->_slug),
						'required'      => false,
						'field_type'    => array( 'text', 'name' ),
						'default_value' => $queries ? $queries['fields_lastname'] : ''
					),
					array(
						'name'          => 'email',
						'label'         => esc_html__( 'Email', $this->_slug),
						'required'      => false,
						'field_type'    => array( 'text', 'email' ),
						'default_value' => $queries ? $queries['fields_email'] : ''
					),
					array(
						'name'          => 'phone',
						'label'         => esc_html__( 'Phone', $this->_slug),
						'required'      => false,
						'field_type'    => array( 'text', 'phone' ),
						'default_value' => $queries ? $queries['fields_phone'] : ''
					),
					array(
						'name'          => 'address1',
						'label'         => esc_html__( 'Street Address', $this->_slug),
						'required'      => false,
						'field_type'    => array( 'text', 'address' ),
						'default_value' => $queries ? $queries['fields_address1'] : ''
					),
					array(
						'name'          => 'address2',
						'label'         => esc_html__( 'Address 2', $this->_slug),
						'required'      => false,
						'field_type'    => array( 'text', 'address' ),
						'default_value' => $queries ? $queries['fields_address2'] : ''
					),
					array(
						'name'          => 'city',
						'label'         => esc_html__( 'City', $this->_slug),
						'required'      => false,
						'field_type'    => array( 'text', 'address' ),
						'default_value' => $queries ? $queries['fields_city'] : ''
					),
					array(
						'name'          => 'state',
						'label'         => esc_html__( 'State', $this->_slug),
						'required'      => false,
						'field_type'    => array( 'text', 'address' ),
						'default_value' => $queries ? $queries['fields_state'] : ''
					),
					array(
						'name'          => 'zip',
						'label'         => esc_html__( 'Zip', $this->_slug),
						'required'      => false,
						'field_type'    => array( 'text', 'address' ),
						'default_value' => $queries ? $queries['fields_zip'] : ''
					),
					array(
						'name'          => 'country',
						'label'         => esc_html__( 'Country', $this->_slug),
						'required'      => false,
						'field_type'    => array( 'text', 'address' ),
						'default_value' => $queries ? $queries['fields_country'] : ''
					),
					array(
						'name'          => 'description',
						'label'         => esc_html__( 'Description', $this->_slug),
						'required'      => false,
						'field_type'    => array( 'text', 'hidden', 'select' ),
						'default_value' => $queries ? $queries['fields_description'] : ''
					),
					array(
						'name'          => 'total',
						'label'         => esc_html__( 'Total', $this->_slug),
						'required'      => false,
						'field_type'    => array( 'total', 'price', 'product' ),
						'default_value' => $queries ? $queries['fields_total'] : ''
					),
					array(
						'name'          => 'shipping',
						'label'         => esc_html__( 'Shipping', $this->_slug),
						'required'      => false,
						'field_type'    => array( 'shipping' ),
						'default_value' => $queries ? $queries['fields_shipping'] : ''
					),
					array(
						'name'          => 'quantity',
						'label'         => esc_html__( 'Quantity', $this->_slug),
						'required'      => false,
						'field_type'    => array( 'quantity' ),
						'default_value' => $queries ? $queries['fields_quantity'] : ''
					),
					array(
						'name'          => 'product',
						'label'         => esc_html__( 'Product', $this->_slug),
						'required'      => false,
						'field_type'    => array( 'product' ),
						'default_value' => $queries ? $queries['fields_product'] : ''
					),
					array(
						'name'          => 'cardnumber',
						'label'         => esc_html__( 'Card Number', $this->_slug),
						'required'      => false,
						'field_type'    => array( 'creditcard' ),
						'default_value' => ''
					),
					array(
						'name'          => 'cardtype',
						'label'         => esc_html__( 'Card Type', $this->_slug),
						'required'      => false,
						'field_type'    => array( 'creditcard' ),
						'default_value' => ''
					),
					array(
						'name'          => 'recurring',
						'label'         => esc_html__( 'Recurring', $this->_slug),
						'required'      => false,
						'field_type'    => array( 'checkbox' ),
						'default_value' => ''
					),
					array(
						'name'          => 'processpayment',
						'label'         => esc_html__( 'Process Payment', $this->_slug),
						'required'      => false,
						'field_type'    => array( 'checkbox' ),
						'default_value' => ''
					),
					array(
						'name'          => 'referrer',
						'label'         => esc_html__( 'Refferrer URL', $this->_slug),
						'required'      => false,
						'field_type'    => array( 'text'),
						'default_value' => ''
					),
				)
			),
			array(
				'label'   => esc_html__('Enable Limit Payments', $this->_slug),
				'type'    => 'checkbox',
				'name'    => 'limit',
				'tooltip' => esc_html__('Enable Limit Payments for this Gravity Form, may not work correctly with daily subscription periods', $this->_slug),
				'choices' => array(
					array(
						'label' => esc_html__( 'Limit', $this->_slug),
						'name'  => 'limit',
						'default_value' => $limit ? $limit['limit'] : null
					)
				)
			),
			array(
				'label'   => esc_html__('Default Limit', $this->_slug),
				'type'    => 'select',
				'name'    => 'payments_default',
				'tooltip' => esc_html__('Default Limit', $this->_slug),
				'choices' => $limits,
				'default_value' => $limit ? $limit['payments_default'] : '0'
			)
		);

		$feeds = GFAPI::get_feeds(null, $form['id']);
		foreach ($feeds as $feed) {
			$id = $feed['id'];
			$name = $feed['meta']['feedName'];
			$name = $name ? $name : $feed['meta']['feed_name'];
			if (in_array($feed['addon_slug'], GFLimitPayments::slugs()) && GFLimitPayments::is_recurring($feed)) {
				$fields[] = array(
					'label'   => esc_html__($name, $this->_slug),
					'type'    => 'select',
					'name'    => 'payments_'.$id,
					'tooltip' => esc_html__($name, $this->_slug),
					'choices' => $limits,
					'default_value' => $limit ? $limit['payments_'.$id] : '0'
				);
			}
		}

		return array(
			array(
				'title'  => esc_html__('GF Stripe Extensions', $this->_slug),
				'fields' => $fields
			)
		);
	}
	public static function entryindex($index) {
		return str_replace('.','_',$index);
	}
	public static function create_entry($data, $form_id, $skip = array()) {
		//https://docs.gravityforms.com/entry-object/
		//https://docs.gravityforms.com/api-functions/#add-entry
		$map = GFStripeExtensionsAddon::get_settings_query($form_id);
		if ($map && is_array($map)) {
			$entry = array('form_id' => $form_id);
			$search = 'fields_';
			$pos = strlen($search);
			foreach($map as $key => $value) {
				if (strpos($key, $search) === 0) {
					$index = $map[$key];
					if ($index) {
						$param = substr($key, $pos);
						if (!in_array($param, $skip)) {
							$entry[$index] = $data[$param];
						}
					}
				}
			}
			$entry[$map['fields_recurring']] = $data['recurring'] ? '1' : null;
			$entry[$map['fields_processpayment']] = $data['process'] ? '1' : null;

			$entry['source_url'] = $data['url'];
			$entry['ip'] = $data['ip'];
			$entry['user_agent'] = $data['useragent'];
			$entry['payment_date'] = $data['date'];
			$entry['is_fulfilled'] = $data['fulfilled'];
			$entry['payment_status'] = $data['status'];
			$entry['payment_method'] = $data['method'];
			$entry['payment_amount'] = $data['amount'];
			$entry['currency'] = $data['currency'];
			$entry['transaction_id'] = $data['recurring'] ? $data['subscription'] : $data['transaction'];
			$entry['subscription_id'] = $data['subscription'];
			$entry['transaction_type'] = $data['recurring'] ? 2 : 1;

			return $entry;
		} else {
			GFStripeExtensionsAddon::get_instance()->log_debug('GFStripeExtensionsAddon: Form set, but not mapped form id: '.$form_id);
		}
	}
}

if (class_exists('GFPayPal')) {
	class GFPayPalExt extends GFPayPal {
		private static $_instance = null;
		public static function get_instance() {
			if ( null === self::$_instance ) {
				self::$_instance = new GFPayPalExt();
				self::$_instance->log_debug('Loading replacement GFPayPalExt');
			}
			return self::$_instance;
		}
		public function get_entry($custom_field) {
			$entry = empty($custom_field) ? false : parent::get_entry($custom_field);
			if (!$entry) {
				$subscription_id = rgpost('subscr_id');
				if ($subscription_id) {
					$entry = $this->get_entry_by_transaction_id($subscription_id);
				}
			}
			return $entry;
		}
	}
}

if (class_exists('GFStripe')) {
	class GFStripeExt extends GFStripe {
		private static $_instance = null;
		public static function get_instance() {
			if ( null === self::$_instance ) {
				self::$_instance = new GFStripeExt();
				self::$_instance->log_debug('Loading replacement GFStripeExt');
			}
			return self::$_instance;
		}
		private static $test_event = null;
		public static function test_event() {
			if (self::$test_event === null) {
				$body     = @file_get_contents( 'php://input' );
				$response = json_decode( $body, true );
				self::$test_event = $response['id'] == 'evt_00000000000000' && GFStripeExtensions::get_boolean('stripe-test-webhooks');
			}
			return self::$test_event;
		}
		public function get_wehbook_event2() {
			$body     = @file_get_contents( 'php://input' );
			$response = json_decode( $body, true );
	
			if ( empty( $response ) ) {
				return false;
			}
	
			$mode = rgempty( 'livemode', $response ) ? 'test' : 'live';
			$this->log_debug( __METHOD__ . '(): Processing ' . $mode . ' mode event.' );
	
			$feed_id         = intval( rgget( 'fid' ) );
			$feed            = ( ! empty( $feed_id ) ) ? $this->get_feed( $feed_id ) : null;
			$settings        = ( ! empty( $feed ) ) ? $feed['meta'] : null;
			$endpoint_secret = $this->get_webhook_signing_secret( $mode, $settings );
			$event           = $error_message = false;
	
			$event_id      = rgar( $response, 'id' );
			$is_test_event = 'evt_00000000000000' === $event_id;
	
			try {
	
				if ( empty( $endpoint_secret ) && ! $is_test_event ) {
	
					// Use the legacy method for getting the event.
					$event = $this->get_stripe_event( $event_id, $mode );
	
				} else {
	
					$this->include_stripe_api( $mode, $settings );
					$sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
					$event      = \Stripe\Webhook::constructEvent( $body, $sig_header, $endpoint_secret );
				}
	
			} catch ( \UnexpectedValueException $e ) {
	
				// Invalid payload.
				$error_message = $e->getMessage();
	
			} catch ( \Stripe\Error\SignatureVerification $e ) {
	
				// Invalid signature.
				$error_message = $e->getMessage();
	
			} catch ( \Exception $e ) {
	
				// Any other issue.
				$error_message = $e->getMessage();
	
			}
	
			if ( $error_message ) {
				$this->log_error( __METHOD__ . '(): Unable to retrieve Stripe Event object. ' . $error_message );
				$message = __( 'Invalid request. Webhook could not be processed.', 'gravityformsstripe' ) . ' ' . $error_message;
	
				return new WP_Error( 'invalid_request', $message, array( 'status_header' => 400 ) );
			}
	
			return $event;
		}
		public static function manual_charge($event) {
			//TODO: This needs to know if it's not a currently process entry
			return $event->type == 'charge.succeeded';
		}
		public function get_webhook_event() {
			//Only if we're testing to we override incase underlying code changes
			$event = GFCreateEntries::process_stripe() && self::test_event() ? self::get_wehbook_event2() : parent::get_webhook_event();
			return $event;
		}
		public function callback() {
			$action = parent::callback();
			if (GFCreateEntries::process_stripe()) {
				if ($action && !is_wp_error($action) && self::test_event()) {
					//Override event id if we're using test webhooks because it's always the sa,e
					$action['id'] = time();
				}
				if (!$action || is_wp_error($action)) {
					$event = $this->get_webhook_event();
					if (self::manual_charge($event)) {
						$data = $event->data;
						$object = $data->object;
						$transaction_id = $object->id;
						$entry_id = $this->get_entry_by_transaction_id($transaction_id);
						if ($entry_id) {
							$action = array();
							$action['transaction_id'] = $transaction_id;
							$action['entry_id']       = $entry_id;
							$action['type']           = 'complete_payment';
							$action['amount']         = $object->amount/100;
						}
					}
				}
			}
			return $action;
		}
		public function can_create_feed2() {
			// Check if the add-on settings are ready.
			$settings    = $this->get_plugin_settings();
			$api_mode    = $this->get_api_mode( $settings );
			$auth_token  = $this->get_auth_token( $settings, $api_mode );

			$account_set = rgar( $settings, "{$api_mode}_publishable_key_is_valid" ) && rgar( $settings, "{$api_mode}_secret_key_is_valid" ) && $this->is_webhook_enabled();
	
			// Check if the condition is met.
			$form            = $this->get_current_form();
			$feeds           = $this->get_feeds_by_slug( $this->_slug, $form['id'] );
			$checkout_method = $this->get_plugin_setting( 'checkout_method' );
			$has_credit_card = false;
	
			if ( $checkout_method !== 'stripe_checkout' ) {
				if ( $this->has_stripe_card_field( $form ) ) {
					$has_credit_card = true;
				} elseif ( $this->has_credit_card_field( $form )) {
					$has_credit_card = true;
				}
	
				if ( $has_credit_card ) {
					return $account_set;
				}
	
				return false;
			}

			return $account_set;
		}
		public function can_create_feed() {
			return GFStripeExtensions::get_boolean('stripe-allow-feeds') ? self::can_create_feed2() : parent::can_create_feed();
		}
	}
}

}