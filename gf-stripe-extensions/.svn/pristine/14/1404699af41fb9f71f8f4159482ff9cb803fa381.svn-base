<?php
/*
Plugin Name: GF Stripe Extensions
Plugin URI: https://wordpress.org/plugins/gf-stripe-extensions
Version: 2.6.7
Description: Add Stripe functions to Wordpress (Apple Pay) including limit payments and payment recovery to Gravity Forms.
Author: James Low
Author URI: http://jameslow.com
*/

GFStripeExtensions::require_utils();
require_once 'gf-stripe-limit-payments.php'; //Limit stripe payments to certain number
require_once 'gf-stripe-apple-pay.php'; //Apple pay functions
require_once 'gf-stripe-analytics.php'; //Analytics UI and API
require_once 'gf-stripe-payment-recovery.php'; //Payment Recovery
require_once 'gf-stripe-create-entries.php'; //Create entries for missing payments

class GFStripeExtensions {
	public static $PREFIX = 'stripe-extensions';
	public static $GROUP = 'stripe-extensions-settings-group';
	public static $forms = null;
	public static $FIRSTYEAR = 2008; //First year of Gravity Forms
	public static $ValueCache = null;
	public static $roles = null;
	public static $paypaltoken = null;
	public static $virtuoustoken = null;
	public static $microsofttoken = null;
	public static $savetosent = 'default';

	private static $_version = null;

	public static function version() {
		if (!self::$_version) {
			if (!function_exists('get_plugin_data')){
				require_once(ABSPATH . 'wp-admin/includes/plugin.php');
			}
			$data = get_plugin_data(__FILE__);
			self::$_version = $data['Version'];
		}
		return self::$_version;
	}
	public static function add_hooks() {
		add_action('plugins_loaded', array('GFStripeExtensions', 'plugins_loaded'));
		add_action('gform_loaded', array('GFStripeExtensions', 'gform_loaded'), 6); //6 so it loads after stripe 5
		add_action('admin_menu', array('GFStripeExtensions', 'admin_menu'));
		add_action('admin_enqueue_scripts', array('GFStripeExtensions', 'include_cssjs'));
		//add_filter('gform_stripe_customer_id', array('GFStripeExtensions', 'gform_stripe_customer_id'), 10, 4);
		//gform_post_payment_completed
		//add_action('gform_post_payment_action', array('GFStripeExtensions', 'post_payment'), 10, 2);
		add_filter('gform_stripe_subscription_params_pre_update_customer', array('GFStripeExtensions', 'gform_stripe_subscription_params_pre_update_customer'), 10, 7);
		add_filter('gform_enable_legacy_markup', array('GFStripeExtensions', 'gform_enable_legacy_markup'), 10, 2);
		//add_filter('option_wpo365_options', array('GFStripeExtensions', 'option_wpo365_options'), 10, 2);
		add_filter('gform_notification', array('GFStripeExtensions', 'gform_notification'), 10, 3);
	}
	public static function gform_notification($notification, $form, $entry) {
		$meta = GFAnalytics::get_form($form['id']);
		$save = UtilsLib::array($meta, 'save_to_sent');
		if ($save != '' && $save != null) {
			self::$savetosent = strtolower($save);
			if (self::$savetosent == 'yes') {
				$GLOBALS['WPO_CONFIG']['options']['mail_save_to_sent_items'] = true;
			} elseif (self::$savetosent == 'no') {
				$GLOBALS['WPO_CONFIG']['options']['mail_save_to_sent_items'] = false;
			} else {
				//e.g. $value['mail_save_to_sent_items'] = $value['mail_save_to_sent_items']
			}
		}
		return $notification;
	}
	/*public static function option_wpo365_options($value, $option) {
		if (is_array($value)) {
			if (self::$savetosent == 'yes') {
				$value['mail_save_to_sent_items'] = true;
			} elseif (self::$savetosent == 'no') {
				$value['mail_save_to_sent_items'] = false;
			} else {
				//e.g. $value['mail_save_to_sent_items'] = $value['mail_save_to_sent_items']
			}
		}
		return $value;
	}*/
	public static function gform_enable_legacy_markup($is_enabled, $form) {
		//https://docs.gravityforms.com/gform_enable_legacy_markup/
		if (self::get_boolean('gforms-legacy')) {
			if (isset($_GET['page']) && $_GET['page'] == 'gf_edit_forms' && !isset($_GET['view'])) {
				return false;
			}
		}
		return $is_enabled;
	}
	public static function gform_stripe_subscription_params_pre_update_customer($subscription_params, $customer, $plan, $feed, $entry, $form, $trial_period_days) {
		$meta = GFStripeExtensionsAddon::get_settings_limit($form);
		if ($meta && $meta['limit']) {
			$limit = $meta['payments_'.$feed['id']];
			if ($limit == '' || $limit == '0' && $limit == null) {
				$limit = $meta['payments_default'];
			}
			if ($limit != '' && $limit != '0' && $limit != null) {
				$limit = (int) $limit;
				//error_log(print_r($feed, true));
				$length = $feed['meta']['billingCycle_length'];
				$unit = $feed['meta']['billingCycle_unit'];
				$interval = '';
				$period = $limit * $length;
				if ($unit == 'day') {
					$interval = $period.'D';
				} elseif ($unit == 'week') {
					$interval = ($period * 7).'D';
				} elseif ($unit == 'month') {
					$interval = $period.'M';
				} elseif ($unit == 'year') {
					$interval = $period.'Y';
				}
				//$period = ($limit - 1) * $length;
				/*if ($unit == 'day') {
					$interval = $period.'DT12H';
				} elseif ($unit == 'week') {
					$interval = (($period * 7) + 5).'D';
				} elseif ($unit == 'month') {
					$interval = $period.'M15D';
				} elseif ($unit == 'year') {
					$interval = $period.'Y182D';
				}*/
				/*if ($unit == 'day') {
					$interval = $period.'DT12H';
				} elseif ($unit == 'week') {
					$interval = ($period * 7).'DT12H';
				} elseif ($unit == 'month') {
					$interval = $period.'MT12H';
				} elseif ($unit == 'year') {
					$interval = $period.'YT12H';
				}*/
				if ($interval != '') {
					$date = new DateTime();
					$add = new DateInterval('P'.$interval);
					$date->add($add);
					$subscription_params['cancel_at'] = $date->getTimestamp();
					//$subscription_params['proration_behavior'] = 'none';
				}
			}
		}
		return $subscription_params;
	}
	public static function roles() {
		if (!self::$roles) {
			self::$roles = array(
				'manage_options' => 'Adminstrator',
				'publish_pages' => 'Editor',
				'publish_posts' => 'Author',
				'edit_posts' => 'Contributor',
				'read' => 'Subscriber'
			);
		}
		return self::$roles;
	}
	public static function include_cssjs() {
		if (isset($_GET['page']) && $_GET['page'] == 'gf-analytics') {
			wp_enqueue_script('jquery');
			wp_enqueue_script('jquery-ui-autocomplete');
		}
	}
	public static function require_cache() {
		if (class_exists('PageApp')) {
			PageApp::require_cache();
		} else {
			require_once 'lib/cachelib.php'; //MySQL based value cache to cache external apis locally
		}
	}
	public static function require_http() {
		if (class_exists('PageApp')) {
			PageApp::require_http();
		} else {
			require_once 'lib/httplib.php';
		}
	}
	public static function require_utils() {
		if (class_exists('PageApp')) {
			PageApp::require_utils();
		} else {
			require_once 'lib/utilslib.php';
		}
	}
	public static function plugins_loaded() {
		self::require_cache();
		self::$ValueCache = new ValueCache(__FILE__, 'gfse');
		self::$ValueCache->enable = self::get_boolean('analytics-cache');
	}
	public static function gform_loaded() {
		require_once 'gf-stripe-extensions-addon.php'; //Stripe addon
		GFAddOn::register('GFStripeExtensionsAddon');
		if (class_exists('GFStripe') && (GFCreateEntries::process_stripe() || self::get_boolean('stripe-allow-feeds'))) {
			GFAddOn::register('GFStripeExt', 'GFStripe');
		}
		if (class_exists('GFPayPal') && GFCreateEntries::process_paypal()) {
			GFAddOn::register('GFPayPalExt', 'GFPayPal');
		}
		if (self::get_boolean('paypal-ignore-hash')) {
			add_filter('gform_paypal_hash_matches', array('GFStripeExtensions', 'gform_paypal_hash_matches'), 10, 4);
		}
	}
	public static function gform_paypal_hash_matches($hash_matches, $entry_id, $hash, $custom_field) {
		return true;
	}
	public static function stripe_event() {
		$body = @file_get_contents('php://input');
		return json_decode($body, true);
	}
	public static function get_role() {
		$role = self::get_option('analytics-role', 'manage_options');
		return $role && $role != '' ? $role : 'manage_options';
	}
	public static function only_role() {
		$role = self::get_option('analytics-only', 'publish_pages');
		return $role && $role != '' ? $role : 'publish_pages';
	}
	public static function admin_menu() {
		//Manage options because only admin should be able to edit settings
		add_options_page('Stripe Extensions', 'Stripe Extensions', 'manage_options', self::$PREFIX, array('GFStripeExtensions', 'options_page'));
		add_action('admin_init', array('GFStripeExtensions', 'admin_init'));
	}
	public static function register_setting($setting, $args = array()) {
		//register_setting(self::$GROUP, self::$PREFIX.'-analytics-key');
		register_setting(self::$GROUP, self::$PREFIX.'-'.$setting, $args);
	}
	public static function admin_init() {
		self::register_setting('analytics-key');
		self::register_setting('analytics-additional');
		self::register_setting('analytics-total');
		self::register_setting('analytics-value');
		self::register_setting('analytics-year', ''.self::$FIRSTYEAR);
		self::register_setting('analytics-cache', '1');
		self::register_setting('analytics-role', 'manage_options');
		self::register_setting('analytics-only', 'publish_pages');
		self::register_setting('analytics-url');
		self::register_setting('analytics-zero', '1');
		self::register_setting('stripe-public');
		self::register_setting('stripe-secret');
		self::register_setting('stripe-public-test');
		self::register_setting('stripe-secret-test');
		self::register_setting('stripe-form');
		self::register_setting('stripe-test-webhooks');
		self::register_setting('stripe-allow-feeds');
		self::register_setting('stripe-create-customer');
		self::register_setting('getresponse-apikey');
		self::register_setting('getresponse-domain');
		self::register_setting('getresponse-enterprise');
		self::register_setting('virtuous-token');
		self::register_setting('virtuous-campaigns');
		self::register_setting('microsoft-clientid');
		self::register_setting('microsoft-secret');
		self::register_setting('microsoft-domain');
		self::register_setting('applepay-form');
		self::register_setting('paypal-form');
		self::register_setting('paypal-ignore-hash');
		self::register_setting('paypal-clientid');
		self::register_setting('paypal-secret');
		self::register_setting('paypal-clientid-test');
		self::register_setting('paypal-secret-test');
		self::register_setting('payment-type');
		self::register_setting('gforms-legacy');
		self::register_setting('recovery-enable');
		self::register_setting('recovery-url');
		self::register_setting('recovery-address');
		self::register_setting('recovery-name');
		self::register_setting('recovery-subject');
		self::register_setting('recovery-bcc');
		self::register_setting('recovery-template', 'Dear [fullname],

		Thank you for your continued support for [sitename].
		
		Your recent recurring payment has [error]. Please update your billing information at the link below:
		<a href="[link]">[link]</a>
		
		Thank You,
		[sitename]');
	}
	public static function get_forms() {
		if (!self::$forms) {
			self::$forms = RGFormsModel::get_forms(1, 'title');
		}
		return self::$forms;
	}
	public static function feed_select($option, $title, $none = '(None)') {
		if (class_exists('RGFormsModel')) {
			$forms = self::get_forms();
			$values = array();
			foreach ($forms as $form) {
				$values[$form->id] = $form->title;
			}
		?>
			<tr valign="top"><th scope="row"><?php echo $title; ?></th>
			<td colspan="2"><?php echo self::select($option, $values, $none); ?></td></tr>
<?php 	}
	}
	public static function select($option, $values, $none = null) {
		$current = self::get_option($option);
		?>
		<select name="<?php echo self::$PREFIX.'-'.$option; ?>">
			<?php
			echo $none ? '<option value="0">'.$none.'</option>' : '';
			foreach ($values as $key => $name) {
				echo '<option value="'.$key.'"'.($current==$key?' selected="selected"':'').'>'.esc_html($name).'</option>';
			}
			?>
		</select>
		<?php
	}
	public static function years() {
		$years = array();
		$year = intval(date("Y"));
		$firstyear = self::$FIRSTYEAR;
		$dates = array();
		for ($i=$year; $i>=$firstyear; $i--) {
			$dates[''.$i] = ''.$i;
		}
		return $dates;
	}
	public static function checkbox($id, $label) {
		return '<input id="'.$id.'" type="checkbox" name="'.self::$PREFIX.'-'.$id.'" value="1" '.checked(self::get_boolean($id), true, false).' />
		<label for="'.$id.'">'.$label.'</label>';
	}
	public static function textarea($id) {
		return '<textarea id="'.$id.'" name="'.self::$PREFIX.'-'.$id.'" cols="45" style="height:120px;">'.esc_html(self::get_option($id)).'</textarea>';
	}
	public static function options_page() { ?>
		<div class="wrap">
		<h1>Stripe Extensions</h1>
		<form method="post" action="options.php">
		<?php
		settings_fields(self::$GROUP);
		do_settings_sections(self::$GROUP);
		$fromgravity = class_exists('GFStripe');
		?>
		
		<table class="form-table">
			<tr valign="top">
				<th colspan="2"><h2>Analytics</h2></th>
			</tr>
			<tr valign="top">
				<th scope="row">API Key</th>
				<td><?php echo self::setting('analytics-key','API Key'); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row">Additional Keys</th>
				<td><?php echo self::textarea('analytics-additional'); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row">Analytics Grouping</th>
				<td><?php echo self::setting('analytics-total','(Payments)'); ?>
				<?php echo self::setting('analytics-value','(Value)'); ?>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">First Year</th>
				<td><?php self::select('analytics-year', self::years()); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row">Caching</th>
				<td><?php echo self::checkbox('analytics-cache', 'Enable Analytics Cache'); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row">Full Access Role</th>
				<td><?php self::select('analytics-role', self::roles()); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row">Analytics Role</th>
				<td><?php self::select('analytics-only', self::roles()); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row">Analytics URL</th>
				<td><?php self::select('analytics-url', array('' => 'All', 'query' => 'Remove Query', 'path' => 'First Path Only')); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row">Zero Payments</th>
				<td><?php echo self::checkbox('analytics-zero', 'Show $0 payments in analytics'); ?></td>
			</tr>
			<tr valign="top">
				<th colspan="2"><h2>Gravity Forms</h2></th>
			</tr>
			<tr valign="top">
				<th scope="row">Payment Type</th>
				<td><?php echo self::checkbox('payment-type', 'Backfill for recurring payments'); ?></td>
			</tr>
			<?php
			self::feed_select('applepay-form', 'ApplePay Form', "(Don't log ApplePay)");
			self::feed_select('stripe-form', 'Stripe Unknown Form', "(Don't create entries)");
			self::feed_select('paypal-form', 'PayPal Unknown Form', "(Don't create entries)");
			?>
			<tr valign="top">
				<th scope="row">Gravity Forms Legacy</th>
				<td><?php echo self::checkbox('gforms-legacy', 'Allow columns on legacy forms'); ?></td>
			</tr>
			<tr valign="top">
				<th colspan="2"><h2>PayPal</h2></th>
			</tr>
			<tr valign="top">
				<th scope="row">PayPal Live</th>
				<td><?php echo self::setting('paypal-clientid','Client Id'); ?>
				<?php echo self::setting('paypal-secret','Secret',true); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row">PayPal Sandbox</th>
				<td><?php echo self::setting('paypal-clientid-test','Sandbox Client Id'); ?>
				<?php echo self::setting('paypal-secret-test','Sandbox Secret',true); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row">PayPal Entry Hash</th>
				<td><?php echo self::checkbox('paypal-ignore-hash', 'Ignore Hash'); ?></td>
			</tr>
			<tr valign="top">
				<th colspan="2"><h2>Stripe</h2></th>
			</tr>
			<tr valign="top">
				<th scope="row">Stripe Live</th>
				<td><?php echo self::setting('stripe-public',$fromgravity?'(Public From Gravity Forms)':'Public Key'); ?>
				<?php echo self::setting('stripe-secret',$fromgravity?'(Secret From Gravity Forms)':'Secret Key',true); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row">Stripe Test</th>
				<td><?php echo self::setting('stripe-public-test',$fromgravity?'(Public From Gravity Forms)':'Public Key'); ?>
				<?php echo self::setting('stripe-secret-test',$fromgravity?'(Secret From Gravity Forms)':'Secret Key',true); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row">Enable Test Webhooks</th>
				<td><?php echo self::checkbox('stripe-test-webhooks', 'Enable stripe test webhooks (debugging)'); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row">Allow Legacy Feeds</th>
				<td><?php echo self::checkbox('stripe-allow-feeds', 'Allow Legacy Card Feeds'); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row">Create Customer</th>
				<td><?php echo self::checkbox('stripe-create-customer', 'Create for Products & Services'); ?></td>
			</tr>

			<tr valign="top">
				<th colspan="2"><h2>Get Response</h2></th>
			</tr>
			<tr valign="top">
				<th scope="row">API Settings</th>
				<td><?php echo self::setting('getresponse-apikey','Api Key'); ?>
				<?php echo self::setting('getresponse-domain','Domain'); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row">Enterprise</th>
				<td><?php echo self::checkbox('getresponse-enterprise', 'Enterprise Account'); ?></td>
			</tr>

			<tr valign="top">
				<th colspan="2"><h2>Virtuous</h2></th>
			</tr>
			<tr valign="top">
				<th scope="row">API Settings</th>
				<td><?php echo self::setting('virtuous-token','Virtuos Refresh Token'); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row">Default Campaigns</th>
				<td><?php echo self::textarea('virtuous-campaigns'); ?></td>
			</tr>

			<tr valign="top">
				<th colspan="2"><h2>Microsoft</h2></th>
			</tr>
			<tr valign="top">
				<th scope="row">Azure App</th>
				<td><?php echo self::setting('microsoft-clientid','Client ID'); ?>
				<?php echo self::setting('microsoft-secret', 'Secret Value', true); ?></td>
			</tr>
			<tr valign="top">
			<th scope="row">Office 365</th>
				<td><?php echo self::setting('microsoft-domain','Domain Name'); ?></td>
			</tr>

			<tr valign="top">
				<th colspan="2"><h2>Payment Recovery</h2></th>
			</tr>
			<tr valign="top">
				<th scope="row">Recovery Url</th>
				<td>
				<?php echo self::setting('recovery-url','(URL)'); ?>
				<?php echo self::checkbox('recovery-enable', 'Enable Recovery'); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row">Recovery Email</th>
				<td>
					<?php echo self::setting('recovery-subject','(Subject)'); ?>
					<?php echo self::setting('recovery-bcc','(BCC Address)'); ?>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">Email Address</th>
				<td>
					<?php echo self::setting('recovery-name','(From Name)'); ?>
					<?php echo self::setting('recovery-address','(From Address)'); ?>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">Email Template
				<div style="font-weight:normal;"><br />Tags:<br />
					[fullname]<br />
					[link]<br />
					[error]<br />
					[email]<br />
					[sitename]<br />
				</div>
				</th>
				<td>
					<?php 
						wp_editor(self::get_option('recovery-template'), 'stripe-extensions-recovery-template', $settings = array('textarea_rows'=> '10') );
					?>
				</td>
			</tr>
			
		</table>
		<?php submit_button(); ?>
		</form><?php
	}
	public static function setting($id, $placeholder = '', $password = false) {
		return '<input placeholder="'.$placeholder.'" type="'.($password?'password':'text').'" name="'.self::$PREFIX.'-'.$id.'" value="'.esc_attr(self::get_option($id)).'" />';
	}
	public static function get_boolean($id) {
		return 1 == self::get_option($id);
	}
	public static function get_option($id, $default = false) {
		$value = get_option(self::$PREFIX.'-'.$id, $default);
		if ($id == 'analytics-key') {
			if (!$value) {
				$value = md5(wp_salt() . time());
				self::set_option($id, $value);
			}
		} elseif ($id == 'analytics-year') {
			if (!$value || $value == '') {
				$value = 2008;
				self::set_option($id, $value);
			}
		}
		return $value;
	}
	public static function get_campaigns() {
		$values = trim(self::get_option('virtuous-campaigns', ''));
		$array = explode("\n", $values);
		$results = array();
		foreach ($array as $row) {
			if (trim($row) != '') {
				$results[] = $row;
			}
		}
		return $results;
	}
	public static function get_stripe_key($id, $stripe) {
		$value = self::get_stripe_setting($stripe);
		return $value !== null ? $value : self::get_option($id);
	}
	public static function get_stripe_setting($stripe) {
		if (class_exists('GFStripe')) {
			return GFStripe::get_instance()->get_plugin_setting($stripe);
		}
	}
	public static function stripe_test() {
		return self::get_stripe_setting('api_mode') != 'live';
	}
	public static function get_stripe_live_public() {
		return self::get_stripe_key('stripe-public', 'live_publishable_key');
	}
	public static function get_stripe_live_secret() {
		return self::get_stripe_key('stripe-secret', 'live_secret_key');
	}
	public static function get_stripe_test_public() {
		return self::get_stripe_key('stripe-public-test', 'test_publishable_key');
	}
	public static function get_stripe_test_secret() {
		return self::get_stripe_key('stripe-secret-test', 'test_secret_key');
	}
	public static function set_option($id, $value) {
		update_option(self::$PREFIX.'-'.$id, $value);
	}
	public static function post_payment($entry, $action) {
		//This code currently isn't being used, as we decided to just map the card field, rather than populate during submission
		if (class_exists('GFStripe') && isset($entry['payment_method']) && $entry['payment_method'] != '') {
			$stripe = GFStripe::get_instance();
			if (isset($_POST['stripe_response'])) {
				$response = $stipe->get_stripe_js_response();
				$stripe->log_debug( __METHOD__ . print_r($entry, true));
				$stripe->log_debug( __METHOD__ . print_r($action, true));
				$stripe->log_debug( __METHOD__ . print_r($response, true));
				if (isset($response->token) && isset($response->token->card)) {
					$entry['payment_method'] = $response->token->card->brand;
					GFAPI::update_entry($entry);
				}
			}
		}
	}
	public static function stripe($path, $params = null, $cache = null) {
		if ($cache) {
			$result = self::$ValueCache->get($cache);
			if ($result) {
				return json_decode($result, true);
			}
		}

		self::require_http();
		$secret = self::stripe_test() ? self::get_stripe_test_secret() : self::get_stripe_live_secret();
		if ($secret == '' || $secret == null) {
			throw new Exception('Stripe secret key has not been set.');
		}
		$http = new HTTPRequest('https://api.stripe.com/v1'.$path);
		$headerarray = array('Authorization' => 'Bearer ' . $secret);
		$result = $params ? $http->Post($params, true, $headerarray) : $http->Get(array(), true, $headerarray);
		if ($result['http']['code'] == 200) {
			$body = $result['body'];
			if ($cache) {
				self::$ValueCache->put($cache, $body);
			}
			return json_decode($body, true);
		} else {
			$error = json_decode($result['body'], true);
			error_log(print_r($error, true));
			throw new Exception('Stripe Error: '.$error['error']['message']);
		}
	}
	public static function virtuous_token() {
		if (!self::$virtuoustoken) {
			self::require_http();
			$http = new HTTPRequest('https://api.virtuoussoftware.com/Token');
			$token = $http->Post(array('grant_type' => 'refresh_token', 'refresh_token' => self::get_option('virtuous-token')), true);
			$token = json_decode($token['body']);
			self::$virtuoustoken = $token->access_token;
		}
		return self::$virtuoustoken;
	}
	public static function virtuous($uri, $paramsbody = array(), $method = 'GET', $cache = null) {
		if ($cache) {
			$result = self::$ValueCache->get($cache);
			if ($result) {
				return json_decode($result);
			}
		}
		self::require_http();
		$headerarray = array(
			'Authorization' => 'Bearer '.self::virtuous_token()
		);
		$http = new HTTPRequest('https://api.virtuoussoftware.com/api'.$uri);
		if ($method == 'POST') {
			$headerarray['Content-Type'] = 'application/json';
			$result = $http->Post($paramsbody, true, $headerarray);
		} else {
			$result = $http->Query($method, $paramsbody, true, $headerarray);
		}
		$body = $result['body'];
		if ($cache) {
			self::$ValueCache->put($cache, $body);
		}
		return json_decode($body);
	}
	public static function query($sql, $cache = null) {
		global $wpdb;
		if ($cache) {
			$result = self::$ValueCache->get($cache);
			if ($result) {
				return json_decode($result);
			}
		}
		$results = $wpdb->get_results($sql);
		if ($cache) {
			self::$ValueCache->put($cache, json_encode($results));
		}
		return $results;
	}
	public static function paypal_token() {
		if (self::$paypaltoken == null) {
			self::require_http();
			$apiurl = 'https://api.paypal.com';
			$http = new HTTPRequest($apiurl.'/v1/oauth2/token');
			//echo self::get_option('paypal-clientid') . '<br/>';
			//echo self::get_option('paypal-secret') . '<br/>';
			$headerarray = array(
				'Accept' => 'application/json',
				'Accept-Language' => 'en_US',
				'Authorization' => 'Basic '.base64_encode(self::get_option('paypal-clientid').':'.self::get_option('paypal-secret'))
			);
			$params = array(
				'grant_type' => 'client_credentials'
			);
			$result = $http->Post($params, true, $headerarray);
			$json = json_decode($result['body']);
			return $json->access_token;
		}
		return self::$paypaltoken;
	}
	public static function paypal($uri, $paramsbody = array(), $method = 'GET', $cache = null) {
		if ($cache) {
			$result = self::$ValueCache->get($cache);
			if ($result) {
				return json_decode($result);
			}
		}
		self::require_http();
		$apiurl = 'https://api.paypal.com';
		$http = new HTTPRequest($apiurl.$uri);
		$headerarray = array(
			'Content-Type' => 'application/json',
			'Authorization' => 'Bearer '.self::paypal_token()
		);
		$result = $http->Query($method, $paramsbody, true, $headerarray);
		$body = $result['body'];
		if ($cache) {
			self::$ValueCache->put($cache, $body);
		}
		return json_decode($body);
	}
	public static function microsoft_token() {
		if (self::$microsofttoken == null) {
			self::require_http();
			$apiurl = 'https://login.microsoftonline.com/movieguide.org/oauth2/v2.0/token';
			$http = new HTTPRequest($apiurl.$uri);
			$paramsbody = array(
				'client_id' => self::get_option('microsoft-clientid'),
				'scope' => 'https://graph.microsoft.com/.default',
				'client_secret' => self::get_option('microsoft-secret'),
				'grant_type' => 'client_credentials'
			);
			$http = new HTTPRequest($apiurl.$uri);
			$result = $http->Post($paramsbody, true, array());
			$body = $result['body'];
			$json = json_decode($body, true);
			self::$microsofttoken = $json['access_token'];
		}
		return self::$microsofttoken;
	}
	public static function microsoft_graph($uri, $paramsbody = array(), $method = 'GET', $cache = null) {
		if ($cache) {
			$result = self::$ValueCache->get($cache);
			if ($result) {
				return json_decode($result);
			}
		}
		self::require_http();
		$apiurl = 'https://graph.microsoft.com/v1.0';
		$http = new HTTPRequest($apiurl.$uri);
		$headerarray = array(
			'Authorization' => 'Bearer '.self::microsoft_token()
		);
		$result = $http->Query($method, $paramsbody, true, $headerarray);
		$body = $result['body'];
		if ($cache) {
			self::$ValueCache->put($cache, $body);
		}
		return json_decode($body);
	}
	public static function gform_stripe_customer_id($customer_id, $feed, $entry, $form) {
		if (self::get_boolean('stripe-create-customer') && !$customer_id && class_exists('\Stripe\Customer')) {
			$details = GFAnalytics::map_entry($entry, $form);
			//We could still create a customer if there is no email, as it would feed through data to Virtuous, but might create duplicates if can't check if it exists by email first
			if ($details && $details->email) {
				$customer = \Stripe\Customer::all(array('email' => $details->email));
				if ($customer && $customer->data && count($customer->data) > 0) {
					return $customer->data[0]->id;
				} else {
					$meta = array(
						'email' => $details->email,
						'name' => trim($details->firstname.' '.$details->lastname),
						'phone' => $details->phone,
						'address' =>  array(
							'line1' => $details->address1,
							'line2' => $details->address2,
							'city' => $details->city,
							'state' => $details->state,
							'postal_code' => $details->zip,
							//'country' => $details->country //TODO: convert to country code
						)
					);
					$customer = \Stripe\Customer::create($meta);
					if ($customer && !is_wp_error($customer)) {
						return $customer->id;
					}
				}
			}
		}
		return $customer_id;
	}
}
GFStripeExtensions::add_hooks();