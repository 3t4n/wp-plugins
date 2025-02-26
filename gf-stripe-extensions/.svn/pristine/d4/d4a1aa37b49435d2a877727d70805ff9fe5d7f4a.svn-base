<?php
class GFStripeApplePay {
	public static function add_hooks() {
		add_action( 'rest_api_init', function () {
			register_rest_route( 'gf-stripe-extensions/v1', 'applepay', array(
				'methods' => 'GET,POST',
				'callback' => array('GFStripeApplePay', 'applepay'),
				'args' => array()
			));
		});
		add_action('wp_enqueue_scripts', array('GFStripeApplePay', 'wp_enqueue_scripts'));
		add_action('wp_head', array('GFStripeApplePay', 'wp_head'));
		add_shortcode('stripe_applepay', array('GFStripeApplePay', 'shortcode'));
	}
	public static function shortcode($atts) {
		$a = shortcode_atts(array(
			'url' => '',
			'amount' => 1,
			'currency' => 'USD',
			//'test' => GFStripeExtensions::stripe_test(),
			'test' => false,
			'recurring' => false,
			'description' => 'Payment',
			'country' => 'US',
			'internal' => ''
		), $atts);
		$id = rand(1,32768);
		return '
			<style>
			.gf-stripe-applepay {
				display: none;
				background-color: black;
				background-image: -webkit-named-image(apple-pay-logo-white);
				background-size: 100% 100%;
				background-origin: content-box;
				background-repeat: no-repeat;
				width: 100%;
				height: 44px;
				padding: 10px 0;
				border-radius: 5px;
				cursor: pointer;
			}
			</style>
			<div onclick="GFStripeExtensions.buttonClick(this);" class="gf-stripe-applepay" id="gf-stripe-applepay-'.$id.
			'" data-amount="'.esc_attr($a['amount']).
			'" data-description="'.esc_attr($a['description']).
			'" data-currency="'.esc_attr(strtoupper($a['currency'])).
			'" data-url="'.esc_attr($a['url']).
			'" data-recurring="'.esc_attr($a['recurring']).
			'" data-country="'.esc_attr(strtoupper($a['country'])).
			'" data-internal="'.esc_attr($a['internal']).
			'" data-test="'.esc_attr($a['test']).'"></div>';
	}
	public static function wp_head() { ?>
		<script>
			var GF_STRIPE_EXTENSION_LIVE = '<?php echo esc_html(GFStripeExtensions::get_stripe_live_public()); ?>';
			var GF_STRIPE_EXTENSION_TEST = '<?php echo esc_html(GFStripeExtensions::get_stripe_test_public()); ?>';
			var GF_STRIPE_EXTENSION_URL = '<?php echo esc_html(get_rest_url(null, 'gf-stripe-extensions/v1')); ?>';
		</script>
	<?php }
	public static function wp_enqueue_scripts() {
		wp_enqueue_script('stripe-extensions-stripe', 'https://js.stripe.com/v2/');
		wp_enqueue_script('stripe-extensions', plugin_dir_url(__FILE__).'js/stripe-extensions.js', array(), GFStripeExtensions::version());
	}
	public static function get_param($key, $default = null) {
		$value = $_REQUEST[$key];
		return isset($value) ? $value : $default;
	}
	public static function assert_param($key, $description = null) {
		$value = $_REQUEST[$key];
		if (isset($value)) {
			return $value;
		} else {
			throw new Exception(($description?$description:$key).' is required.');
		}
	}
	public static function error($message) {
		return self::output(array('status' => 'error', 'error' => $message));
	}
	public static function ok($message = null) {
		return self::output(array('status' => 'ok', 'message' => $message));
	}
	public static function output($json) {
		return $json;
	}
	public static function planid($description, $amount, $currency = 'USD', $interval = 'month') {
		$prefix = preg_replace('/[[:^print:]]/', '', $description); //Remove Ascii
		//$prefix = preg_replace('/ /', '_', $prefix); //Change spaces to _
		$prefix = preg_replace('/[^a-zA-Z0-9_]/', '', $prefix); //Remove non alphanumeric
		return 'applepay_'.strtolower($prefix.'_'.($amount*100).'_'.$currency.'_'.$interval);
	}
	public static function get_plan($description, $amount, $currency = 'USD', $interval = 'month', $test = false) {
		$planid = self::planid($description, $amount, $currency, $interval);
		try {
			//Check if plan exists
			$plan = GFStripeExtensions::stripe('/plans/'.$planid, null, $test);
		} catch (Exception $e) {
			//Otherwise create
			$params = array(
				'id' => $planid,
				'amount' => $amount * 100,
				'currency' => $currency,
				'interval' => $interval,
				'nickname' => $description,
				'product[name]' => $description
			);
			$plan = GFStripeExtensions::stripe('/plans', $params, $test);
		}
		return $planid;
	}
	public static function create_customer($source, $email, $test = false) {
		return GFStripeExtensions::stripe('/customers', array('source' => $source, 'email' => $email), $test);
	}
	public static function subscribe($customerid, $planid, $test = false) {
		return GFStripeExtensions::stripe('/subscriptions', array('customer' => $customerid, 'items[0][plan]' => $planid), $test);
	}
	public static function charge($description, $amount, $currency, $token, $test = false) {
		$params = array(
			'amount' => $amount * 100,
			'currency' => $currency,
			'description' => $description,
			'source' => $token
		);
		return GFStripeExtensions::stripe('/charges', $params, $test);
	}
	public static function get_data() {
		$name = self::get_param('name');
		$recurring = self::get_param('recurring');
		$test = self::get_param('test');
		$data = array(
			'token' => self::assert_param('token'),
			'amount' => (float) self::assert_param('amount'),
			'currency' => self::get_param('currency', 'USD'),
			'recurring' => $recurring == 'true' || $recurring == '1',
			'ip' => self::get_param('ip', $_SERVER['REMOTE_ADDR']),
			'description' => self::get_param('description'),
			'test' =>  $test == 'true' || $test == '1',

			//These can be read back from charge result, but for testing we'll use them from here
			'name' => $name,
			'email' => self::get_param('email'),
			'phone' => self::get_param('phone'), //I think this can be read back too, but we aren't requesting it client side since it's not defaulty set up
			'address1' => self::get_param('address1'),
			'address2' => self::get_param('address2'),
			'city' => self::get_param('city'),
			'state' => self::get_param('state'),
			'zip' => self::get_param('zip'),
			'country' => self::get_param('country'),
			'url' => self::get_param('url', $_SERVER['HTTP_REFERER']),
			'useragent' => self::get_param('useragent', $_SERVER['HTTP_USER_AGENT']),
			'cardnumber' => self::get_param('cardnumber'),
			'cardtype' => self::get_param('cardtype'),
			'method' => 'ApplePay',
			'process' => true
		);
		$data['total'] = $data['amount'];
		if ($data['firstname'] == null || $data['firstname'] == '') {
			$parts = explode(' ', $name, 2);
			$data['firstname'] = count($parts) > 0 ? $parts[0] : null;
			$data['lastname'] = count($parts) > 1 ? $parts[1] : null;
		}
		return $data;
	}
	public static function applepay() {
		//Not protecting via apikey becaue generation of valid token on our site should be enough
		try {
			$data = self::get_data();
			if ($result = self::submitform($data)) {
				//TODO: submitform is erroring with applepay button
				return self::ok($result);
			} else {
				if ($data['recurring']) {
					//https://stripe.com/docs/apple-pay/web/v2
					$planid = self::get_plan($data['description'], $data['amount'], $data['currency'], 'month', $data['test']);
					$customer = self::create_customer($data['token'], $data['email'], $data['test']);
					return self::ok(self::subscribe($customer['id'], $planid, $data['test']));
				} else {
					//https://stripe.com/docs/charges
					return self::ok(self::charge($data['description'], $data['amount'], $data['currency'], $data['token'], $data['test']));
				}
			}
		} catch (Exception $e) {
			return self::error($e->getMessage());
		}
	}
	public static function entryindex($index) {
		return str_replace('.','_',$index);
	}
	public static function submitform($data) {
		//https://docs.gravityforms.com/api-functions/#submit-form
		if (class_exists('GFAPI')) {
			require_once 'gf-stripe-extensions-addon.php'; //Stripe addon
			$form_id = GFStripeExtensions::get_option('applepay-form');
			$skip = array('cardnumber', 'cardtype', 'recurring', 'processpayment');
			if ($form_id != '' && $form_id != '0') {
				$map = GFStripeExtensionsAddon::get_settings_query($form_id);
				if ($map && is_array($map)) {
					//Submit form
					$input_values = array();
					$search = 'fields_';
					$pos = strlen($search);
					foreach($map as $key => $value) {
						if (strpos($key, $search) === 0) {
							$index = $map[$key];
							if ($index) {
								$param = substr($key, $pos);
								if (!in_array($param, $skip)) {
									$input_values['input_'.self::entryindex($index)] = $data[$param];
								}
							}
						}
					}
					$input_values['input_'.self::entryindex($map['fields_recurring'])] = $data['recurring'] ? '1' : null;
					$input_values['input_'.self::entryindex($map['fields_processpayment'])] = $data['process'] ? '1' : null;
					$submission = GFAPI::submit_form($form_id, $input_values, $field_value);
				
					$entry_id = $submission['entry_id'];
					//Update params separately
					$entry = GFAPI::get_entry($entry_id);
					if (is_wp_error($entry)) {
						throw new Exception(print_r($submission, true));
					}
					$entry['source_url'] = $data['url'];
					$entry['ip'] = $data['ip'];
					$entry['user_agent'] = $data['useragent'];
					//$entry['payment_method'] = $data['cardtype'];
					$entry['payment_method'] = 'ApplePay';
					$entry[$map['fields_cardnumber']] = 'XXXXXXXXXXXX'.$data['cardnumber'];
					$entry[$map['fields_cardtype']] = $data['cardtype'];
					GFAPI::update_entry($entry);
					return $entry;
				} else {
					GFStripeExtensionsAddon::get_instance()->log_debug('GFStripeApplePay: Apple Pay Form set, but not mapped form id: '.$form_id);
				}
			} else {
				GFStripeExtensionsAddon::get_instance()->log_debug('GFStripeApplePay: Apple Pay Form Not Set, skipping Gravity Forms entry');
			}
		}
	}
}
GFStripeApplePay::add_hooks();