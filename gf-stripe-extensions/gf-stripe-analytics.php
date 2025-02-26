<?php
class GFAnalytics {
	static $forms;
	static $fields;
	static $gateways;
	static $integers;
	static $floats;
	static $booleans;
	static $url;
	static $new_customer = 'gfa_new_customer';

	public static function get_form($form_id) {
		self::$forms = self::$forms == null ? array() : self::$forms;
		if (!isset(self::$forms[$form_id])) {
			self::$forms[$form_id] = RGFormsModel::get_form_meta($form_id);
		}
		if (self::$forms[$form_id] != null) {
			return GFStripeExtensionsAddon::get_settings_query(self::$forms[$form_id]);
		}
	}
	public static function url() {
		if (self::$url == null) {
			self::$url = GFStripeExtensions::get_option('analytics-url');
		}
		return self::$url;
	}
	public static function fields() {
		if (self::$fields == null) {
			self::$fields = array('firstname', 'lastname', 'email', 'phone', 'address1', 'address2', 'city', 'state', 'zip', 'country', 'description', 'total', 'shipping', 'quantity', 'product', 'cardtype', 'referrer');
		}
		return self::$fields;
	}
	public static function types() {
		return array (
			'' => 'Type',
			'recurring' => 'Recurring',
			'oneoff' => 'One Off'
		);
	}
	public static function is_state($state, $code, $name) {
		return $state == $code || strpos($state, $name) !== false;
	}
	public static function states() {
		return array(
			'' => 'State',
			'other' => '(Other)',
			'AL' => 'Alabama',
			'AK' => 'Alaska',
			'AZ' => 'Arizona',
			'AR' => 'Arkansas',
			'CA' => 'California',
			'CO' => 'Colorado',
			'CT' => 'Connecticut',
			'DE' => 'Delaware',
			'FL' => 'Florida',
			'GA' => 'Georgia',
			'HI' => 'Hawaii',
			'ID' => 'Idaho',
			'IL' => 'Illinois',
			'IN' => 'Indiana',
			'IA' => 'Iowa',
			'KS' => 'Kansas',
			'KY' => 'Kentucky',
			'LA' => 'Louisiana',
			'ME' => 'Maine',
			'MD' => 'Maryland',
			'MA' => 'Massachusetts',
			'MI' => 'Michigan',
			'MN' => 'Minnesota',
			'MS' => 'Mississippi',
			'MO' => 'Missouri',
			'MT' => 'Montana',
			'NE' => 'Nebraska',
			'NV' => 'Nevada',
			'NH' => 'New Hampshire',
			'NJ' => 'New Jersey',
			'NM' => 'New Mexico',
			'NY' => 'New York',
			'NC' => 'North Carolina',
			'ND' => 'North Dakota',
			'OH' => 'Ohio',
			'OK' => 'Oklahoma',
			'OR' => 'Oregon',
			'PA' => 'Pennsylvania',
			'RI' => 'Rhode Island',
			'SC' => 'South Carolina',
			'SD' => 'South Dakota',
			'TN' => 'Tennessee',
			'TX' => 'Texas',
			'UT' => 'Utah',
			'VT' => 'Vermont',
			'VA' => 'Virginia',
			'WA' => 'Washington',
			'WV' => 'West Virginia',
			'WI' => 'Wisconsin',
			'WY' => 'Wyoming' 
		);
	}
	public static function dates() {
		$year = intval(date("Y"));
		$firstyear = GFStripeExtensions::get_option('analytics-year');
		$dates = array(
			'' => 'Year',
			'month' => 'Month',
			'week' => 'Week',
			'custom' => 'Custom'
		);
		for ($i=$year; $i>=$firstyear; $i--) {
			$dates[''.$i] = ''.$i;
		}
		return $dates;
	}
	public static function gateways() {
		if (self::$gateways == null) {
			self::$gateways = array('gravityformspaypal' => 'PayPal', 'paypalpro' => 'PayPal Pro', 'gravityformsstripe' => 'Stripe');
		}
		return self::$gateways;
	}
	public static function gateway($slug, $default = null) {
		$gateways = self::gateways();
		return isset($gateways[$slug]) ? $gateways[$slug] : $default;
	}
	public static function integers() {
		if (self::$integers == null) {
			self::$integers = array('form_id', 'entry_id', 'row_id', 'date', 'recurring', 'created');
		}
		return self::$integers;
	}
	public static function floats() {
		if (self::$floats == null) {
			self::$floats = array('original_amount', 'amount');
		}
		return self::$floats;
	}
	public static function booleans() {
		if (self::$booleans == null) {
			self::$booleans = array('recurring');
		}
		return self::$booleans;
	}
	public static function add_hooks() {
		add_action('rest_api_init', array('GFAnalytics', 'rest_api_init'));
		add_action('admin_menu', array('GFAnalytics', 'admin_menu'));
		add_filter('gform_addon_navigation', array('GFAnalytics', 'create_menu'));
	}
	public static function admin_menu() {
		//Gravity forms only shows menu for Admin/Editor
		if (!current_user_can('publish_pages')) { 
			$icon = class_exists('GForms') ? GFForms::get_admin_icon_b64(GFForms::is_gravity_page() ? '#fff' : false) : '';
			add_menu_page('Analytics', 'Analytics', GFStripeExtensions::only_role(), 'gf-analytics', array('GFAnalytics', 'analytics_page'), $icon, apply_filters('gform_menu_position', '16.9'));
		}
	}
	public static function analytics_page2() {
		echo 'here';
	}
	public static function rest_api_init() {
		register_rest_route('gf-queries/v1', 'transactions', array(
			'methods' => 'GET,POST',
			'callback' => array('GFAnalytics', 'transactions'),
			'args' => array()
		));
		register_rest_route('gf-stripe-extensions/v1', 'transactions', array(
			'methods' => 'GET,POST',
			'callback' => array('GFAnalytics', 'transactions'),
			'args' => array()
		));
		register_rest_route('gf-stripe-extensions/v1', 'customers', array(
			'methods' => 'GET,POST',
			'callback' => array('GFAnalytics', 'customers'),
			'args' => array()
		));
		register_rest_route('gf-stripe-extensions/v1', 'recurring', array(
			'methods' => 'GET,POST',
			'callback' => array('GFAnalytics', 'recurring'),
			'args' => array()
		));
		register_rest_route('gf-stripe-extensions/v1', 'tags', array(
			'methods' => 'GET,POST',
			'callback' => array('GFAnalytics', 'tags'),
			'args' => array()
		));
		register_rest_route('gf-stripe-extensions/v1', 'campaigns', array(
			'methods' => 'GET,POST',
			'callback' => array('GFAnalytics', 'campaigns'),
			'args' => array()
		));
		register_rest_route('gf-stripe-extensions/v1', 'reconcile', array(
			'methods' => 'GET,POST',
			'callback' => array('GFAnalytics', 'reconcile'),
			'args' => array()
		));
		register_rest_route('gf-stripe-extensions/v1', 'check_customer', array(
			'methods' => 'GET,POST',
			'callback' => array('GFAnalytics', 'check_customer'),
			'args' => array()
		));
		register_rest_route('gf-stripe-extensions/v1', 'autocomplete', array(
			'methods' => 'GET,POST',
			'callback' => array('GFAnalytics', 'autocomplete'),
			'args' => array()
		));
		register_rest_route('gf-stripe-extensions/v1', 'entry', array(
			'methods' => 'GET,POST',
			'callback' => array('GFAnalytics', 'entry'),
			'args' => array()
		));
	}
	public static function create_menu( $menus ) {
		$menus[] = array(
				'name' => 'gf-analytics',
				'label' => __( 'Analytics' ),
				'callback' =>  array('GFAnalytics', 'analytics_page'),
				'permission' => GFStripeExtensions::only_role()
			);
		return $menus;
	}
	public static function analytics_page() {
		require_once 'gf-stripe-analytics-ui.php';
		GFAnalyticsUI::analytics_page();
	}
	public static function checkapikey() {
		$key = UtilsLib::request('apikey');
		return self::apikey() == $key || in_array($key, self::additional());
	}
	public static function apikey() {
		return GFStripeExtensions::get_option('analytics-key');
	}
	public static function additional() {
		$additional = GFStripeExtensions::get_option('analytics-additional');
		$keys = preg_split('/\s+/', $additional);
		$result = array();
		foreach ($keys as $key) {
			if (trim($key) != '') {
				$result[] = trim($key);
			}
		}
		return $result;
	}
	public static function transactions() {
		if (self::checkapikey()) {
			return self::get_transactions($_REQUEST['from'], $_REQUEST['to']);
		} else {
			return new WP_Error('gf-stripe-extensions-apikey', 'Invalid Api Key', array('status' => 200 ));
		}
	}
	public static function map_meta($t) {
		return self::map_entry($t->entry_id, $t->form_id, $t);
	}
	public static function map_entry($entry, $form = null, $result = null) {
		$result = $result != null ? $result : new stdClass();
		$entry = is_array($entry) ? $entry : GFAPI::get_entry($entry);
		$result->entry_id = $entry['id'];
		$form = $form ? $form : $entry['form_id'];
		$result->form_id = is_array($form) ? $form['id'] : $form;
		$map = self::get_form($result->form_id);
		$fields = self::fields();
		foreach ($fields as $field) {
			$fieldname = 'fields_'.$field;
			$result->$field = isset($map[$fieldname]) && $map[$fieldname] && isset($entry[$map[$fieldname]]) ? $entry[$map[$fieldname]] : '';
		}
		$result->url = $entry['source_url'];
		if (!$result->description) {
			$result->description = self::collapse($result->url);
		}
		return $result;
	}
	public static function get_transactions($from, $to = null, $analytics = false) {
		$key = 'transactions_'.$from.'_'.$to.'_'.$analytics;
		$result = GFStripeExtensions::$ValueCache->get($key);
		if ($result) {
			return json_decode($result);
		}
		$result = self::populate_meta(self::query_transactions($from, $to), $analytics);
		GFStripeExtensions::$ValueCache->put($key, json_encode($result));
		return $result;
	}
	public static function collapse($url) {
		$collapse = self::url();
		if ($collapse && $collapse != '') {
			$url = self::path($url);
			if ($collapse == 'path') {
				$url = self::first($url);
			}
		}
		return $url;
	}
	public static function first($url) {
		$parts = explode('/', $url);
		return '/'.(isset($parts[1])?$parts[1]:'');
	}
	public static function path($url) {
		$parts = parse_url($url);
		return rtrim($parts['path'], '/'); //Remove trailing slashes as some do and some don't
	}
	public static function customer_name($customer, $replace = null) {
		return self::name($customer->firstname, $customer->lastname, $replace ? $replace : $customer->email);
	}
	public static function name($firstname, $lastname = '', $replace = 'Customer') {
		return $firstname && $firstname != '' ? trim($firstname.' '.$lastname) : $replace;
	}
	public static function populate_meta($transactions, $analytics = false, $new_customer = false) {
		global $wpdb;
		$results = array();
		foreach ($transactions as $t) {
			$form = self::get_form($t->form_id);
			if ($form && ((UtilsLib::array($form, 'transactions') && !$analytics) || (UtilsLib::array($form, 'analytics') && $analytics))) {
				$t = self::map_meta($t);
				$integers = self::integers();
				foreach ($integers as $integer) {
					$t->$integer = (int) $t->$integer;
				}
				$floats = self::floats();
				foreach ($floats as $float) {
					$t->$float = (float) $t->$float;
				}
				$booleans = self::booleans();
				foreach ($booleans as $boolean) {
					$t->$boolean = (bool) $t->$boolean;
				}
				if ($t->payment_method == '') {
					$t->payment_method = $t->cardtype;
				}
				if ($t->payment_method == '') {
					$prefix = $wpdb->prefix;
					$sql = "SELECT meta_value FROM {$prefix}gf_entry_meta WHERE meta_key = 'payment_gateway' AND entry_id = '$t->entry_id'";
					$gateway = $wpdb->get_var($sql);
					$t->payment_method = self::gateway($gateway, '');
				}
				$t->payment_method = $t->payment_method ? strtolower($t->payment_method) : '';
				$t->page_full = self::path($t->source_url);
				$t->page = self::collapse($t->source_url);
				$t->referrer_full = self::path($t->referrer);
				$t->referrer = self::collapse($t->referrer);
				$results[] = $t;
			}
			if ($new_customer) {
				$t->new_customer = gform_get_meta($t->entry_id, self::$new_customer);
			}
		}
		return $results;
	}
	public static function query_transactions($from, $to = null) {
		/*
		SELECT *, IF(IFNULL(t.amount,0) = 0,payment_amount,amount) AS AMOUNT FROM wp_gf_entry e
			LEFT JOIN wp_gf_addon_payment_transaction t ON e.id = t.lead_id
			WHERE e.id = 75958
		*/
		$zero = GFStripeExtensions::get_boolean('analytics-zero');
		global $wpdb;
		$prefix = $wpdb->prefix;
		$from = date('Y-m-d H:i:s', $from);
		$to = date('Y-m-d H:i:s', $to);
		$fromsql = " AND (IF(IFNULL(t.date_created,0)=0,e.date_created,t.date_created) >= '$from' OR e.date_created >= '$from') ";
		$tosql = $to ? " AND (IF(IFNULL(t.date_created,0)=0,e.date_created,t.date_created) < '$to' OR e.date_created < '$to') " : '';
		//$zerosql = $zero ? '' : " AND IF(IFNULL(t.amount,0)=0,e.payment_amount,t.amount) > 0 ";
		$zerosql = $zero ? '' : " AND IFNULL(t.amount,0) > 0 ";
		$sql = "
		SELECT 
			e.id as 'entry_id', e.form_id, e.ip, e.source_url, e.currency, e.payment_method, e.payment_status, e.payment_amount as 'original_amount', e.transaction_id as 'original_id', UNIX_TIMESTAMP(e.date_created) as 'created', IFNULL(e.transaction_type,0) = 2 as 'recurring', 
			IF(IFNULL(t.amount,0)=0,e.payment_amount,t.amount) as 'amount', UNIX_TIMESTAMP(IF(IFNULL(t.date_created,0)=0,e.date_created,t.date_created)) as 'date', NOT(IFNULL(t.is_recurring,false)) as 'first_payment',
			t.transaction_id, t.subscription_id, t.transaction_type, t.id as 'row_id', COUNT(IFNULL(t2.lead_id,1)) as 'count'
			FROM {$prefix}gf_entry e
			LEFT JOIN {$prefix}gf_addon_payment_transaction t ON e.id = t.lead_id
			LEFT JOIN {$prefix}gf_addon_payment_transaction t2 ON t.lead_id = t2.lead_id
			WHERE e.status = 'active' AND IFNULL(t.transaction_type,'payment') = 'payment' AND IFNULL(e.payment_status,'Processing') != 'Processing'
				$fromsql $tosql $zerosql
			GROUP BY IFNULL(t.transaction_id, e.id)
			ORDER BY date DESC";
		return $wpdb->get_results($sql);
	}
	public static function mysqldate($date) {
		return date('Y-m-d H:i:s', $date);
	}
	public static function customers_date($start, $end, $analytics = false, $new_customer = false) {
		$key = 'customers_date_'.$start.'_'.$end.'_'.$analytics;
		//$result = GFStripeExtensions::$ValueCache->get($key);
		//if ($result) {
		//	return json_decode($result);
		//}
		$result = self::populate_meta(self::query_customers($start, $end), $analytics, $new_customer);
		GFStripeExtensions::$ValueCache->put($key, json_encode($result));
		return $result;
	}
	public static function query_customers($start, $end) {
		global $wpdb;
		$prefix = $wpdb->prefix;
		$sql = "
		SELECT 
			e.id as 'entry_id', e.form_id, e.ip, e.source_url, e.currency, e.payment_method, e.payment_status, e.payment_amount as 'original_amount', e.transaction_id as 'original_id', UNIX_TIMESTAMP(e.date_created) as 'created', IFNULL(e.transaction_type,0) = 2 as 'recurring',
			SUM(IF(IFNULL(t.amount,0)=0,e.payment_amount,t.amount)) as 'amount', COUNT(e.payment_amount) as 'count', MAX(UNIX_TIMESTAMP(IF(IFNULL(t.date_created,0)=0,e.date_created,t.date_created))) as 'last_payment'
			FROM {$prefix}gf_entry e
			LEFT JOIN {$prefix}gf_addon_payment_transaction t ON e.id = t.lead_id
			WHERE e.status = 'active' AND IFNULL(t.transaction_type,'payment') = 'payment' AND IFNULL(e.payment_status,'Processing') != 'Processing'
				AND IF(IFNULL(t.date_created,0)=0,e.date_created,t.date_created) >= '".self::mysqldate($start)."'
				AND IF(IFNULL(t.date_created,0)=0,e.date_created,t.date_created) < '".self::mysqldate($end)."'
			GROUP BY e.id
			ORDER BY amount DESC";
		return $wpdb->get_results($sql);	
	}
	public static function customers_single($value = 1000, $analytics = false) {
		$key = 'customers_single_'.$value.'_'.$analytics;
		$result = GFStripeExtensions::$ValueCache->get($key);
		if ($result) {
			return json_decode($result);
		}
		$result = self::populate_meta(self::query_customers_single($value), $analytics);
		GFStripeExtensions::$ValueCache->put($key, json_encode($result));
		return $result;
	}
	public static function query_customers_single($value = 1000) {
		global $wpdb;
		$prefix = $wpdb->prefix;
		$sql = "
		SELECT 
			e.id as 'entry_id', e.form_id, e.ip, e.source_url, e.currency, e.payment_method, e.payment_status, e.payment_amount as 'original_amount', e.transaction_id as 'original_id', UNIX_TIMESTAMP(e.date_created) as 'created', IFNULL(e.transaction_type,0) = 2 as 'recurring', 
			IF(IFNULL(t.amount,0)=0,e.payment_amount,t.amount) as 'amount', UNIX_TIMESTAMP(IF(IFNULL(t.date_created,0)=0,e.date_created,t.date_created)) as 'date', NOT(IFNULL(t.is_recurring,false)) as 'first_payment',
			t.transaction_id, t.subscription_id, t.transaction_type, t.id as 'row_id'
			FROM {$prefix}gf_entry e
			LEFT JOIN {$prefix}gf_addon_payment_transaction t ON e.id = t.lead_id
			WHERE e.status = 'active' AND IFNULL(t.transaction_type,'payment') = 'payment' AND IFNULL(e.payment_status,'Processing') != 'Processing' AND e.payment_amount >= $value
			ORDER BY t.amount DESC";
		return $wpdb->get_results($sql);
	}
	public static function customers_value($limit = 100, $analytics = false) {
		$key = 'customers_value_'.$limit.'_'.$analytics;
		$result = GFStripeExtensions::$ValueCache->get($key);
		if ($result) {
			return json_decode($result);
		}
		$result = self::populate_meta(self::query_customers_value($limit), $analytics);
		GFStripeExtensions::$ValueCache->put($key, json_encode($result));
		return $result;
	}
	public static function query_customers_value($limit = 100) {
		global $wpdb;
		$prefix = $wpdb->prefix;
		$limitsql = $limit ? "LIMIT $limit" : '';
		$sql = "
		SELECT 
			e.id as 'entry_id', e.form_id, e.ip, e.source_url, e.currency, e.payment_method, e.payment_status, e.payment_amount as 'original_amount', e.transaction_id as 'original_id', UNIX_TIMESTAMP(e.date_created) as 'created',
			SUM(IF(IFNULL(t.amount,0)=0,e.payment_amount,t.amount)) as 'amount', COUNT(e.payment_amount) as 'count', MAX(UNIX_TIMESTAMP(IF(IFNULL(t.date_created,0)=0,e.date_created,t.date_created))) as 'last_payment'
			FROM {$prefix}gf_entry e
			LEFT JOIN {$prefix}gf_addon_payment_transaction t ON e.id = t.lead_id
			WHERE e.status = 'active' AND IFNULL(t.transaction_type,'payment') = 'payment' AND IFNULL(e.payment_status,'Processing') != 'Processing' AND IFNULL(e.transaction_type,0) != 2
			GROUP BY e.id
			ORDER BY amount DESC
			$limitsql";
		return $wpdb->get_results($sql);
	}
	public static function customers_length($limit = 100, $analytics = false) {
		$key = 'customers_length_'.$limit.'_'.$analytics;
		$result = GFStripeExtensions::$ValueCache->get($key);
		if ($result) {
			return json_decode($result);
		}
		$result = self::populate_meta(self::query_customers_length($limit), $analytics);
		GFStripeExtensions::$ValueCache->put($key, json_encode($result));
		return $result;
	}
	public static function query_customers_length($limit = 100) {
		global $wpdb;
		$prefix = $wpdb->prefix;
		$limitsql = $limit ? "LIMIT $limit" : '';
		$sql = "
		SELECT 
			e.id as 'entry_id', e.form_id, e.ip, e.source_url, e.currency, e.payment_method, e.payment_status, e.payment_amount as 'original_amount', e.transaction_id as 'original_id', UNIX_TIMESTAMP(e.date_created) as 'created',
			SUM(IF(IFNULL(t.amount,0)=0,e.payment_amount,t.amount)) as 'amount', COUNT(e.payment_amount) as 'count', MAX(UNIX_TIMESTAMP(IF(IFNULL(t.date_created,0)=0,e.date_created,t.date_created))) as 'last_payment'
			FROM {$prefix}gf_entry e
			LEFT JOIN {$prefix}gf_addon_payment_transaction t ON e.id = t.lead_id
			WHERE e.status = 'active' AND IFNULL(t.transaction_type,'payment') = 'payment' AND IFNULL(e.payment_status,'Processing') != 'Processing' AND IFNULL(e.transaction_type,0) = 2
			GROUP BY e.id
			ORDER BY count DESC
			$limitsql";
		return $wpdb->get_results($sql);
	}
	public static function customer($email, $analytics = false) {
		$key = 'customer_'.$email.'_'.$analytics;
		$result = GFStripeExtensions::$ValueCache->get($key);
		if ($result) {
			return json_decode($result);
		}
		$result = self::populate_meta(self::query_customer($email), $analytics);
		GFStripeExtensions::$ValueCache->put($key, json_encode($result));
		return $result;
	}
	public static function query_customer($email) {
		global $wpdb;
		$prefix = $wpdb->prefix;
		$sql = "
		SELECT 
			e.id as 'entry_id', e.form_id, e.ip, e.source_url, e.currency, e.payment_method, e.payment_status, e.payment_amount as 'original_amount', e.transaction_id as 'original_id', UNIX_TIMESTAMP(e.date_created) as 'created', IFNULL(e.transaction_type,0) = 2 as 'recurring',
			SUM(IF(IFNULL(t.amount,0)=0,e.payment_amount,t.amount)) as 'amount', COUNT(e.payment_amount) as 'count', MAX(UNIX_TIMESTAMP(IF(IFNULL(t.date_created,0)=0,e.date_created,t.date_created))) as 'last_payment'
			FROM {$prefix}gf_entry e
			INNER JOIN {$prefix}gf_entry_meta m ON e.id = m.entry_id AND m.meta_value LIKE '{$email}'
			LEFT JOIN {$prefix}gf_addon_payment_transaction t ON e.id = t.lead_id
			WHERE e.status = 'active' AND IFNULL(t.transaction_type,'payment') = 'payment' AND IFNULL(e.payment_status,'Processing') != 'Processing'
			GROUP BY e.id
			ORDER BY last_payment DESC";
		return $wpdb->get_results($sql);
	}
	public static function strtotime($str, $timezone = null) {
		$timezone = $timezone ? $timezone : get_option('gmt_offset');
		$date = new DateTime($str, new DateTimeZone($timezone));
		return $date->format('U');
	}
	public static function start_end($period = null, $rolling = false) {
		$timezone = get_option('gmt_offset');
		$period = self::period($period);
		$now = time();
		if ($period == 'custom') {
			$start = strtotime($_GET['start'].' 00:00:00 '.$timezone);
			$end = strtotime($_GET['end'].' 00:00:00 '.$timezone);
		} elseif (is_numeric($period)) {
			$start = strtotime($period.'-01-01 00:00:00 '.$timezone);
			$end = strtotime((intval($period)+1).'-01-01 00:00:00 '.$timezone);
		} elseif ($period == 'year' || $period == 'month' || $period == 'week') {
			$diff = '-1 '.$period;
			$start = new DateTime('now', new DateTimeZone($timezone));
			$start = $start->modify($diff);
			$start = strtotime(date($period == 'year' || $rolling ? 'Y-m-1 00:00:00' : 'Y-m-d 00:00:00', $start->getTimestamp()).' '.$timezone);
			$end = new DateTime('now', new DateTimeZone($timezone));
			$end->modify('+1 day');
			$end = strtotime('midnight', $end->getTimestamp() + 3600*$timezone);
		} else { //Assume month of the year
			$start = new Datetime('now', new DateTimeZone($timezone));
			$start->setTimestamp(strtotime($period.' '.date('Y')));
			if ($start->getTimestamp() > $now) {
				$start->setTimestamp(strtotime($period.' '.(date('Y')-1)));
			}
			$start = strtotime(date('Y-m-d 00:00:00', $start->getTimestamp()).' '.$timezone);
			$end = new DateTime('now', new DateTimeZone($timezone));
			$end->setTimestamp($start);
			$end->modify('+1 month');
			$end = strtotime(date('Y-m-d 00:00:00', $end->getTimestamp()).' '.$timezone);
		}
		return array('start' => $start, 'end' => $end, 'now' => $now, 'period' => $period);
	}
	public static function period($period = null) {
		return $period ? $period : (UtilsLib::request('period', '') == '' ? 'year' : UtilsLib::request('period'));
	}
	public static function invalid_apikey() {
		return new WP_Error('gf-stripe-extensions-apikey', 'Invalid Api Key', array('status' => 403));
	}
	public static function virtuous_customers_tag($id, $limit = 1000) {
		$url = '/Contact/ByTag/'.$id.'?take='.$limit;
		$customers = GFStripeExtensions::virtuous('/Contact/ByTag/'.$id.'?take='.$limit, array(), 'GET', '/Contact/ByTag/'.$id.'?take='.$limit);
		return $customers->list;
	}
	public static function virtuous_gifts_tag($name, $limit = 1000) {
		$json = '{
			"groups": [
				{
					"conditions": [
						{
							"parameter": "Contact Tag",
							"operator": "IsAnyOf",
							"values": ["'.addslashes($name).'"]
						},
						{
							"parameter": "Gift Date",
							"operator": "GreaterThanOrEqual",
							"value": "1/1/'.(intval(date('Y'))-1).'"
						}
					]
				}
			],
			"sortBy": "name",
			"descending": false
		}';
		$url = '/Gift/Query/FullGift?take='.$limit;
		$gifts = GFStripeExtensions::virtuous($url,$json,'POST',$url.'&tag='.$name);
		return $gifts->list;
	}
	public static function virtuous_tags($limit = 1000) {
		$url = '/Tag?take='.$limit;
		$tags = GFStripeExtensions::virtuous($url,array(),'GET',$url);
		return $tags->list;
	}
	public static function virtuous_campaigns($limit = 1000) {
		$json = '{
			"groups": [ ],
			"sortBy": "name",
			"descending": false
		}';
		$url = '/Campaign/Query?take=1000';
		$campaigns = GFStripeExtensions::virtuous($url,$json,'POST',$url);
		return $campaigns = $campaigns->list;
	}
	public static function group_gifts($id, $name, $format = 'year') {
		$customers = GFAnalytics::virtuous_customers_tag($id);
		$gifts = GFAnalytics::virtuous_gifts_tag($name);
		$year = date('Y');
		$last = ''.(intval(date('Y'))-1);
		$results = array();
		if ($format == 'year') {
			foreach ($customers as $customer) {
				$row = array(
					'id' => $customer->id,
					'name' => $customer->name,
					'email' => $customer->email,
					''.$year.'_total' => 0,
					''.$year.'_count' => 0,
					''.$last.'_total' => 0,
					''.$last.'_count' => 0
				);
				$i = 0;
				while ($i < count($gifts)) {
					$gift = $gifts[$i];
					if ($gift->contactId == $customer->id) {
						if (self::ends_with($gift->giftDateFormatted, $year)) {
							$row[''.$year.'_count'] = $row[''.$year.'_count'] + 1;
							$row[''.$year.'_total'] = $row[''.$year.'_total'] + $gift->amount;
						} elseif (self::ends_with($gift->giftDateFormatted, $last)) { 
							$row[''.$last.'_count'] = $row[''.$last.'_count'] + 1;
							$row[''.$last.'_total'] = $row[''.$last.'_total'] + $gift->amount;
						}
						array_splice($gifts, $i, 1);
					} else  {
						$i++;
					}
				}
				$results[] = $row;
			}
			$row = array(
				'id' => null,
				'name' => 'Unassigned',
				'email' => null,
				''.$year.'_total' => 0,
				''.$year.'_count' => 0,
				''.$last.'_total' => 0,
				''.$last.'_count' => 0
			);
			foreach ($gifts as $gift) {
				if (self::ends_with($gift->giftDateFormatted, $year)) {
					$row[''.$year.'_count'] = $row[''.$year.'_count'] + 1;
					$row[''.$year.'_total'] = $row[''.$year.'_total'] + $gift->amount;
				} elseif (self::ends_with($gift->giftDateFormatted, $last)) { 
					$row[''.$last.'_count'] = $row[''.$last.'_count'] + 1;
					$row[''.$last.'_total'] = $row[''.$last.'_total'] + $gift->amount;
				}
			}
			$results[] = $row;
		} else {
			foreach ($customers as $customer) {
				$rowlast = array(
					'id' => $customer->id,
					'name' => $customer->name,
					'email' => $customer->email,
					'year' => $last,
					'1' => 0,'2' => 0,'3' => 0,'4' => 0,'5' => 0,'6' => 0,'7' => 0,'8' => 0,'9' => 0,'10' => 0,'11' => 0,'12' => 0, 'total' => 0
				);
				$rowyear = array(
					'id' => $customer->id,
					'name' => $customer->name,
					'email' => $customer->email,
					'year' => $year,
					'1' => 0,'2' => 0,'3' => 0,'4' => 0,'5' => 0,'6' => 0,'7' => 0,'8' => 0,'9' => 0,'10' => 0,'11' => 0,'12' => 0, 'total' => 0
				);
				$i = 0;
				while ($i < count($gifts)) {
					$gift = $gifts[$i];
					if ($gift->contactId == $customer->id) {
						$date = explode('/', $gift->giftDateFormatted);
						$y = $date[2];
						$m = $date[0];
						if ($y == $year) {
							$rowyear[$m] = $rowyear[$m] + $gift->amount;
							$rowyear['total'] = $rowyear['total'] + $gift->amount;
						} else {
							$rowlast[$m] = $rowlast[$m] + $gift->amount;
							$rowlast['total'] = $rowlast['total'] + $gift->amount;
						}
						array_splice($gifts, $i, 1);
					} else  {
						$i++;
					}
				}
				$results[] = $rowlast;
				$results[] = $rowyear;
			}
			$rowlast = array(
				'id' => null,
				'name' => 'Unassigned',
				'email' => null,
				'year' => $last,
				'1' => 0,'2' => 0,'3' => 0,'4' => 0,'5' => 0,'6' => 0,'7' => 0,'8' => 0,'9' => 0,'10' => 0,'11' => 0,'12' => 0, 'total' => 0
			);
			$rowyear = array(
				'id' => null,
				'name' => 'Unassigned',
				'email' => null,
				'year' => $year,
				'1' => 0,'2' => 0,'3' => 0,'4' => 0,'5' => 0,'6' => 0,'7' => 0,'8' => 0,'9' => 0,'10' => 0,'11' => 0,'12' => 0, 'total' => 0
			);
			foreach ($gifts as $gift) {
				$date = explode('/', $gift->giftDateFormatted);
				$y = $date[2];
				$m = $date[0];
				if ($y == $year) {
					$rowyear[$m] = $rowyear[$m] + $gift->amount;
					$rowyear['total'] = $rowyear['total'] + $gift->amount;
				} else {
					$rowlast[$m] = $rowlast[$m] + $gift->amount;
					$rowlast['total'] = $rowlast['total'] + $gift->amount;
				}
			}
			$results[] = $rowlast;
			$results[] = $rowyear;
		}
		return $results;
	}
	public static function ends_with($string, $endString) { 
		$len = strlen($endString); 
		if ($len == 0) { 
			return true; 
		} 
		return (substr($string, -$len) === $endString); 
	}
	public static function filename($file) {
		$file = mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $file);
		return mb_ereg_replace("([\.]{2,})", '', $file);
	}
	public static function tags() {
		if (self::checkapikey()) {
			$id = $_REQUEST['id'];
			$name = $_REQUEST['name'];
			$report = $_REQUEST['report'];
			if (!isset($name) || $name != '') {
				$tags = self::virtuous_tags();
				foreach ($tags as $tag) {
					if ($tag->id == $id) {
						$name = $tag->tagName;
						break;
					}
				}
			}
			$year = date('Y');
			$last = ''.(intval(date('Y'))-1);
			$customers = self::group_gifts($id, $name, $report);
			if ($report == 'year') {
				$header = array('Id','Name','Email',''.$year.' Total',''.$year.' Count',''.$last.' Total',''.$last.' Count');
			} else {
				$header = array('Id','Name','Email','Year','January','February','March','April','May','June','July','August','September','October','November','December','Total');
			}
			if ($_REQUEST['format'] == 'csv') {
				header('Content-Type: text/csv');
				header('Content-Disposition: attachment; filename="gifts-'.self::filename($name).'.csv"');
				$out = fopen('php://output', 'w');
				fputcsv($out, $header);
				foreach ($customers as $customer) {
					fputcsv($out, $customer);
				}
				fclose($out);
			} else {
				return $customers;
			}
		} else {
			return self::invalid_apikey();
		}
	}
	public static function sort_name($a, $b) {
		return strcmp($a['name'], $b['name']);
	}
	public static function gifts_campaign($name, $page = 1, $limit = 1000) {
		$json = '{
			"groups": [
				{
					"conditions": [
						{
							"parameter": "Campaign Name",
							"operator": "Is",
							"value": "'.$name.'"
						}
					]
				}
			],
			"sortBy": "giftDate",
			"descending": true
		}';
		$url = '/Gift/Query/FullGift?take='.$limit.'&skip='.(1000*($page-1));
		return GFStripeExtensions::virtuous($url,$json,'POST',$url.'&campaign='.$name);
	}
	public static function contact_json($array, $field, $numeric = false) {
		$groups = '';
		foreach ($array as $row) {
			$groups .= ($groups==''?'':',').'{
				"conditions": [
					{
						"parameter": "'.$field.'",
						"operator": "Is",
						"value": '.($numeric?$row:'"'.$row.'"').'
					}
				]
			}';
		}
		$json = '{
			"groups": ['.$groups.'],
			"sortBy": "name",
			"descending": true
		}';
		return $json;
	}
	public static function campaign_summary() {
		$timezone = get_option('gmt_offset');
		$startend = self::start_end('month', true);
		$start = $startend['start'];
		$end = $startend['end'];
		$startofmonth = strtotime(date('Y-m-1 00:00:00', $end).' '.$timezone);
		$campaigns = GFStripeExtensions::get_campaigns();
		$result = array();
		foreach ($campaigns as $campaign) {
			$group = array('previous' => 0, 'current' => 0);
			for ($i=1; $i<3; $i++) {
				$virtuous = self::gifts_campaign($campaign, $i);
				$gifts = $virtuous->list;
				foreach ($gifts as $gift) {
					$date = new DateTime($gift->giftDateFormatted);
					if ($date->getTimestamp() >= $startofmonth) {
						$group['current'] = $group['current'] + $gift->amount;
					} elseif ($date->getTimestamp() >= $start) {
						$group['previous'] = $group['previous'] + $gift->amount;
					}
				}
			}
			$result[$campaign] = $group;
		}
		return $result;
	}
	public static function campaign_gifts($id, $name, $report) {
		if ($report == 'customer') {
			$gifts = self::gifts_campaign($name);
			$gifts = $gifts->list;
			$customers = array();
			$segments = array();
			foreach ($gifts as $gift) {
				$contactid = $gift->contactId;
				$segment = $gift->segment;
				if (!isset($customers[$contactid])) {
					$customers[$contactid] = array();
				}
				if (!isset($customers[$contactid][$segment])) {
					$customers[$contactid][$segment] = 0;
				}
				$customers[$contactid][$segment] = $customers[$contactid][$segment] + $gift->amount;
				if (!in_array($segment, $segments)) {
					$segments[] = $segment;
				}
			}
			asort($segments);
			$contacts = GFStripeExtensions::virtuous('/Contact/Query/FullContact?take=1000',self::contact_json(array_keys($customers),'Contact Id',true),'POST',$url.'&campaign='.$name);
			$contacts = $contacts->list;
			$results = array();
			foreach ($customers as $contactid => $customer) {
				$use = null;
				foreach ($contacts as $contact) {
					if ($contactid == $contact->id) {
						$use = $contact;
						break;
					}
				}
				if ($use) {
					$list = $use->contactIndividuals;
					$email = '';
					foreach ($list as $ind) {
						$methods = $ind->contactMethods;
						foreach ($methods as $method) {
							if (strpos($method->value, '@') > 0) {
								$email = $method->value;
								break;
							}
						}
						if ($email != '') {
							break;
						}
					}
					$row = array(
						'id' => $contactid,
						'name' => $use->name,
						'email' => $email
					);
					foreach ($segments as $segment) {
						$row[$segment] = $customer[$segment];
					}
					$results[] = $row;
				}
			}
			usort($results, array('GFAnalytics', 'sort_name'));
			return array('customers' => $results, 'segments' => $segments);
		} else {
			$gifts = self::gifts_campaign($name);
			$gifts = $gifts->list;
			$segments = array();
			foreach ($gifts as $gift) {
				$segment = $gift->segment;
				if (!isset($segments[$segment])) {
					$segments[$segment] = array('count'=>0,'total'=>0);
				}
				$segments[$segment]['count'] = $segments[$segment]['count'] + 1;
				$segments[$segment]['total'] = $segments[$segment]['total'] + $gift->amount;
			}
			ksort($segments);
			$results = array();
			foreach ($segments as $name => $segment) {
				$results[] = array (
					'name' => $name,
					'total' => $segment['total'],
					'count' => $segment['count'],
					'average' => $segment['count'] == 0 ? 0 : $segment['total']/$segment['count']
				);
			}
			return $results;
		}
	}
	public static function parse_amount($amount) {
		return floatval(str_replace(',','',substr($amount,1)));
	}
	public static function campaigns() {
		if (self::checkapikey()) {
			$id = $_REQUEST['id'];
			$name = $_REQUEST['name'];
			$report = $_REQUEST['report'];
			if (!isset($name) || $name != '') {
				$campaigns = self::virtuous_campaigns();
				foreach ($campaigns as $campaign) {
					if ($campaign->campaignId == $id) {
						$name = $campaign->name;
						break;
					}
				}
			}
			$results = self::campaign_gifts($id, $name, $report);
			if ($report == 'customer') {
				$header = array('Id', 'Name', 'Email');
				$segments = $results['segments'];
				foreach ($segments as $segment) {
					$header[] = $segment;
				}
				$results = $results['customers'];
				$prefix = 'gifts';
			} else {
				$header = array('Segment','Total','Payments','Average');
				$prefix = 'campaigns';
			}
			if ($_REQUEST['format'] == 'csv') {
				header('Content-Type: text/csv');
				header('Content-Disposition: attachment; filename="'.$prefix.'-'.self::filename($name).'.csv"');
				$out = fopen('php://output', 'w');
				fputcsv($out, $header);
				foreach ($results as $result) {
					fputcsv($out, $result);
				}
				fclose($out);
			} else {
				return $customers;
			}
		} else {
			return self::invalid_apikey();
		}
	}
	public static function city_state($city, $state) {
		return $city . ($state == '' || $state == null ? '' : ', '.$state);
	}
	public static function excel_date($timestamp) {
		return 25569 + $timestamp/86400;
	}
	public static function recurring() {
		if (self::checkapikey()) {
			$search_criteria = array(
				'status' => 'active',
				'field_filters' => array(
					array('key' => 'payment_status', 'value' => 'Active')
				)
			);
			$entries = GFAPI::get_entries(0, $search_criteria, array(), array('offset' => 0, 'page_size' => 10000));
			$results = array();
			foreach ($entries as $entry) {
				$results[] = self::map_entry($entry);
			}
			if ($_REQUEST['format'] == 'csv') {
				header('Content-Type: text/csv');
				header('Content-Disposition: attachment; filename="recurring.csv"');
				$out = fopen('php://output', 'w');
				fputcsv($out, array('Entry', 'Form', 'Firstname', 'Lastname', 'Email', 'Phone' , 'Total', 'Description', 'Url'));
				foreach ($results as $result) {
					$array = array(
						$result->entry_id,
						$result->form_id,
						$result->firstname,
						$result->lastname,
						$result->email,
						$result->phone,
						$result->total,
						$result->description,
						$result->url
					);
					fputcsv($out, $array);
				}
				fclose($out);
			} else {
				return $results;
			}
		} else {
			return self::invalid_apikey();
		}
	}
	public static function customers() {
		if (self::checkapikey()) {
			$customers = self::get_customers();
			$customers = self::filter_description($customers);
			if ($_REQUEST['format'] == 'csv') {
				header('Content-Type: text/csv');
				header('Content-Disposition: attachment; filename="contacts.csv"');
				$out = fopen('php://output', 'w');
				fputcsv($out, array('Date','Email','Customer','City/State','Amount','Payments','Method','Source','Page','New?'));
				foreach ($customers as $customer) {
					$array = array(
						self::excel_date(intval($customer->created)),
						$customer->email,
						self::customer_name($customer),
						self::city_state($customer->city, $customer->state),
						$customer->amount,
						$customer->count==0||!$customer->recurring?'-':$customer->count,
						$customer->payment_method,
						$customer->description,
						$customer->page,
						$customer->new_customer ? $customer->new_customer : ''
					);
					fputcsv($out, $array);
				}
				fclose($out);
			} else {
				return $customers;
			}
		} else {
			return self::invalid_apikey();
		}
	}
	public static function filter_description($customers) {
		$description = $_REQUEST['description'];
		if (isset($description)) {
			$filtered = array();
			foreach($customers as $customer) {
				if ($description == $customer->description) {
					$filtered[] = $customer;
				}
			}
			$customers = $filtered;
		}
		return $customers;
	}
	public static function get_customers() {
		$startend = self::start_end();
		$start = $startend['start'];
		$end = $startend['end'];
		$state = $_REQUEST['state'];
		$type = $_REQUEST['type'];
		$status = $_REQUEST['status'];
		
		$customers = self::customers_date($start, $end, false, GFStripeExtensions::get_option('virtuous-token')); 
		for($i=0; $i<count($customers); $i++) {
			if (!$customers[$i]->description) {
				$customers[$i]->description = $customers[$i]->page;
			}
		}
		if (isset($type)) {
			$filtered = array();
			foreach($customers as $customer) {
				if (($type == 'recurring' && $customer->recurring) ||
					($type == 'oneoff' && !$customer->recurring)) {
					$filtered[] = $customer;
				}
			}
			$customers = $filtered;
		}
		if (isset($state)) {
			$states = self::states();
			$code = strtolower($state);
			$name = strtolower($states[$state]);
			$filtered = array();
			unset($states['']);
			unset($states['other']);

			foreach($customers as $customer) {
				$state = strtolower(trim($customer->state));
				if ($code == 'other') {
					$found = false;
					foreach ($states as $c => $n) {
						if (self::is_state($state, strtolower($c), strtolower($n))) {
							$found = true;
							break;
						}
					}
					if (!$found) {
						$filtered[] = $customer;
					}
				} elseif ($state != '') {
					if (self::is_state($state, $code, $name)) {
						$filtered[] = $customer;
					}
				}
			}
			$customers = $filtered;
		}
		if (isset($status)) {
			$filtered = array();
			foreach($customers as $customer) {
				if ($customer->new_customer == $status) {
					$filtered[] = $customer;
				}
			}
			$customers = $filtered;
		}
		return $customers;
	}
	public static function getresponse_url() {
		return GFStripeExtensions::get_option('getresponse-enterprise') == 1 ? 'https://api3.getresponse360.com/v3' : 'https://api.getresponse.com/v3';
	}
	public static function getresponse_site() {
		return GFStripeExtensions::get_option('getresponse-enterprise') == 1 ? 'https://'.GFStripeExtensions::get_option('getresponse-domain') : 'https://app.getresponse.com/';
	}
	public static function getresponse($uri, $paramsbody = array(), $method = 'GET') {
		GFStripeExtensions::require_http();
		$http = new HTTPRequest(self::getresponse_url().$uri);
		$headerarray = array(
			'X-Auth-Token' => 'api-key '.GFStripeExtensions::get_option('getresponse-apikey'),
			'X-DOMAIN' => GFStripeExtensions::get_option('getresponse-domain')
		);
		if ($method == 'POST') {
			$headerarray['Content-Type'] = 'application/json';
			$result = $http->Post($paramsbody, true, $headerarray);
		} else {
			$result = $http->Query($method, $paramsbody, true, $headerarray);
		}
		return json_decode($result['body']);
	}
	public static function reconcile_virtous($start, $end) {
		$json = '{
			"groups": [
				{
					"conditions": [
						{
							"parameter": "Gift Date",
							"operator": "GreaterThanOrEqual",
							"value": "'.date('n/j/Y',$start).'"
						}
						,{
							"parameter": "Gift Date",
							"operator": "LessThanOrEqual",
							"value": "'.date('n/j/Y',$end).'"
						}
					]
				}
			],
			"sortBy": "giftDate",
			"descending": true
		}';
		$results = array();
		$i=0;
		for ($i=0; $i<2; $i++) {
			$url = '/Gift/Query/FullGift?take=1000&skip='.(1000*$i);
			$virtous = GFStripeExtensions::virtuous($url,$json,'POST',$url.'&start='.$start.'&end='.$end);
			$results = array_merge($results, $virtous->list);
		}
		return $results;
	}
	public static function reconcile_stripe($start, $end) {
		$results = array();
		$nextid = null;
		$url = '/charges?limit=100&created[gte]='.$start.'&created[lte]='.$end;
		for ($i=0; $i<10; $i++) {
			$path = $url.($nextid?'&starting_after='.$nextid:'');
			$stripe = GFStripeExtensions::stripe($path, null, $path);
			$results = array_merge($results, $stripe['data']);
			$count = count($stripe['data']);
			if ($count >= 100) {
				$nextid = $stripe['data'][$count-1]['id'];
			} else {
				break;
			}
		}
		return $results;
	}
	public static function reconcile_both($start, $end, $type = '') {
		$transactions = $type == 'paypal' ? self::reconcile_paypal($start, $end) : self::reconcile_stripe($start, $end);
		$virtous = self::reconcile_virtous($start, $end);
		//$forms = GFAnalyticsUI::get_transactions($start, $end);
		$forms = self::get_transactions($start, $end);
		$results = array(
			'missing' => array(),
			'matched' => array(),
			'virtuous' => array()
		);
		foreach ($transactions as $s) {
			$found = false;
			foreach ($forms as $f) {
				if ($s['id'] == null && $s['entry_id'] == $f->entry_id) {
					$s['id'] = $f->transaction_id;
					$s['payment_intent'] = $f->transaction_id;
				}
				if ($s['metadata']) {
					if (!$s['billing_details']['name']) {
						$s['billing_details']['name'] = self::name($s['metadata']['First Name'], $s['metadata']['Last Name'], '');
					}
					if (!$s['billing_details']['email']) {
						$s['billing_details']['email'] = $s['metadata']['Email'];
					}
				}
				if ($s['payment_intent'] == $f->transaction_id && $s['payment_intent'] != null) {
					//transaction_id = pi_1H37PSLRNs2IlSvyAQJYpdJV
					//subscription_id/original_id =sub_9iLndSxJI6ytMK
					$s['forms'] = $f;
					if (!$s['billing_details']['name']) {
						$s['billing_details']['name'] = self::customer_name($f, '');
					}
					if (!$s['billing_details']['email']) {
						$s['billing_details']['email'] = $f->email;
					}
					if (strpos($s['billing_details']['name'], '@') !== false && ($f->firstname || $f->lastname)) {
						$s['billing_details']['name'] = $f->firstname . ' ' . $f->lastname;
					}
					break;
				} elseif ($s['metadata']) {
					$s['forms'] = (object) array('desciption' => $s['metadata']['Form'], 'source_url' => $s['metadata']['Url'], 'page' => self::collapse($s['metadata']['Url']));
				}
				
			}
			foreach($virtous as $v) {
				if (($s['id'] == $v->transactionId && $v->transactionId != '') ||
					(strpos($v->notes, $s['id']) !== false && trim($s['id']) != '') ||
					(strpos($v->notes, $s['transaction_id']) !== false && trim($s['transaction_id']) != '')) {
					$s['virtuous'] = $v;
					$found = true;
					break;
				}
			}
			if ($found) {
				$results['matched'][] = $s;
			} else {
				$results['missing'][] = $s;
			}
		}
		foreach($virtous as $v) {
			$found = false;
			foreach ($transactions as $s) {
				if (($s['id'] == $v->transactionId && $v->transactionId != '') || ($s['id'] == $v->notes && $v->notes != '') || ($s['transaction_id'] == $v->notes && $v->notes != '')) {
					$found = true;
					break;
				}
			}
			if (!$found) {
				$s = array('virtuous' => $v);
				$results['virtuous'][] = $s;
			}
		}
		return $results;
	}
	public static function paypal_date($timestamp) {
		return date(DateTimeInterface::RFC3339, $timestamp);
	}
	public static function reconcile_paypal($start, $end) {
		//TODO: Check if there really are no matching imported gifts (we may be matching the wrong id or it may not be entered in Virtous)
		$all = array();
		for ($i=1; $i<3; $i++) {
			$uri = '/v1/reporting/transactions?fields=all&start_date='.urlencode(self::paypal_date($start)).'&end_date='.urlencode(self::paypal_date($end)).'&page_size=500&page='.$i;
			$paypal = GFStripeExtensions::paypal($uri, array(), 'GET', $uri);
			$all = array_merge($all, $paypal->transaction_details);
		}
		$results = array();
		foreach ($all as $row) {
			$t = $row->transaction_info;
			$p = $row->payer_info;
			$a = $row->shipping_info->address;
			$amount = floatval($t->transaction_amount->value);
			if ($amount > 0) {
				$parts = explode('|', $t->custom_field);
				$results[] = array(
					'type' => 'paypal',
					'entry_id' => $parts[0],
					'id' => $t->paypal_reference_id,
					'payment_intent' => $t->paypal_reference_id,
					'transaction_id' => $t->transaction_id,
					'amount' => $amount * 100,
					'created' => date_create($t->transaction_initiation_date)->getTimestamp(),
					'status' => 'succeeded', //Could convert status too
					'billing_details' => array(
						'address' => array(
							"city" => $a->city,
							"country" => $a->country_code,
							"line1" => $a->line1,
							"line2" => null,
							"postal_code" => $a->postal_code,
							"state"  => $a->state
						),
						'email' => $p->email_address,
						'name' => $p->payer_name->alternate_full_name, //Can also be from address->name
						'phone' => null
					)
				);
			}
		}
		return array_reverse($results);
	}
	public static function reconcile_new($start, $end) {
		$customers = array();
		$transactions = self::get_transactions($start, $end);
		foreach($transactions as $row) {
			$email = strtolower($row->email);
			$customers[$email] = $email; //Quick way to make sure we don't have duplicates
		}
		$contacts = array();
		$i=0;
		for ($i=0; $i<1; $i++) {
			$url = '/Contact/Query?take=1000&skip='.(1000*$i);
			//TODO: In practice this query is too slow so we can't use it
			$virtous = GFStripeExtensions::virtuous($url, self::contact_json(array_keys($customers),'Email Address'), 'POST', $url);
			$contacts = array_merge($contacts, $virtous->list);
		}
		return $contacts;
	}
	public static function last_name($name) {
		$parts = explode(' ',trim($name));
		return $parts[count($parts)-1];
	}
	public static function smart_match($name) {
		return trim(preg_replace("/[^A-Za-z0-9 ]/", '', str_replace('-', ' ', str_replace(' sr', '', str_replace(' jr', '', str_replace(' ii', '', str_replace(' iii', '', strtolower($name))))))));
	}
	public static function check_last($virtuos, $stripe, $forms, $ok = '', $check = 'Check') {
		$virtous = self::smart_match($virtuos ? $virtuos : '');
		$stripe = self::smart_match($stripe);
		$forms = self::smart_match($forms);
		$vlast = self::last_name($virtous);
		$slast = self::last_name($stripe);
		$flast = self::last_name($forms);
		return ($vlast=='' || $slast=='' || $vlast == $slast
			|| strpos($stripe, $vlast) !== false || strpos($virtous, $slast) !== false
			|| strpos($forms, $vlast) !== false || strpos($virtous, $flast) !== false
			|| $vlast == $flast) ? $ok : $check;
	}
	public static function reconcile() {
		if (self::checkapikey()) {
			$startend = self::start_end();
			$start = $startend['start'];
			$end = $startend['end'];
			$type = $_GET['type'];
			$reconcile = self::reconcile_both($start, $end, $type);
			if ($_REQUEST['format'] == 'csv') {
				header('Content-Type: text/csv');
				header('Content-Disposition: attachment; filename="reconcile.csv"');
				$out = fopen('php://output', 'w');

				fputcsv($out, array('Date', ($type=='paypal'?'PayPal':'Stripe'), 'Virtuous', 'Email', 'Amount', 'Status', 'Source', 'Charge Id', 'Contact', 'Reconcile','Check'));
				$missing = $reconcile['missing'];
				$matched = $reconcile['matched'];
				$virtuous = $reconcile['virtuous'];
				$i=2;
				foreach ($missing as $row) {
					if ($row['status'] != 'failed') {
						$forms = $row['forms'];
						$stripe = trim($row['billing_details']['name']?$row['billing_details']['name']:'');
						fputcsv($out, array(
							self::excel_date(intval($row['created'])),
							$stripe,
							'',
							$row['billing_details']['email']?$row['billing_details']['email']:'',
							$row['amount']/100,
							$row['status'],
							$forms?($forms->page?$forms->page:$forms->description):'',
							$row['id'],
							'',
							'missing',
							''
							//'=IF(AND(C'.$i.'<>"",TRIM(RIGHT(SUBSTITUTE(B'.$i.'," ",REPT(" ",100)),100))<>TRIM(RIGHT(SUBSTITUTE(C'.$i.'," ",REPT(" ",100)),100))),"Check","")'
						));
						$i++;
					}
				}
				foreach ($matched as $row) {
					$forms = $row['forms'];
					$stripe = trim($row['billing_details']['name']?$row['billing_details']['name']:'');
					$formsname = $forms && ($forms->firstname || $forms->lastname) ? $forms->firstname . ' ' . $forms->lastname : '';
					fputcsv($out, array(
						self::excel_date(intval($row['created'])),
						$stripe,
						$row['virtuous']->contactName,
						$row['billing_details']['email']?$row['billing_details']['email']:'',
						$row['amount']/100,
						$row['status'],
						$forms?($forms->page?$forms->page:$forms->description):'',
						$row['id'],
						'https://app.virtuoussoftware.com/Generosity/Gift/View/'.$row['virtuous']->id,
						'matched',
						self::check_last($row['virtuous']->contactName, $stripe, $formsname)
						//'=IF(AND(C'.$i.'<>"",TRIM(RIGHT(SUBSTITUTE(B'.$i.'," ",REPT(" ",100)),100))<>TRIM(RIGHT(SUBSTITUTE(C'.$i.'," ",REPT(" ",100)),100))),"Check","")'
					));
					$i++;
				}
				/*foreach ($virtuous as $row) {
					fputcsv($out, array(
						'', //date('j/n/Y',$row['created']),
						'', //($row['billing_details']['name']?$row['billing_details']['name']:'(Customer)'),
						'', //$row['amount']/100,
						'', //$row['status'],
						'',
						$row['virtuous']->id,
						'virtuous'
					));
				}*/

				fclose($out);
			} else {
				return $reconcile;
			}
		} else {
			return self::invalid_apikey();
		}
	}
	public static function check_customer() {
		if (self::checkapikey()) {
			$entry = GFAPI::get_entry($_REQUEST['entry_id']);
			if ($entry) {
				$email = strtolower($_REQUEST['email']);
				$search = GFStripeExtensions::virtuous('/Contact/Search', json_encode(array('search' => $email)), 'POST');
				$virtuous = $search && $search->list && count($search->list) > 0;
				$value = $virtuous ? 'No' : 'Yes';
				gform_update_meta($entry['id'], self::$new_customer, $value);
				return $value;
			} else {
				return new WP_Error('gf-stripe-extensions-entry', 'Entry not found', array('status' => 404));
			}
		} else {
			return self::invalid_apikey();
		}
	}
	public static function search_customer($term, $limit = 1000) {
		if ($term) {
			$search = GFStripeExtensions::virtuous('/Contact/Search?take='.$limit, json_encode(array('search' => $term)), 'POST');
			return $search->list;
		}
		return array();
	}
	public static function contains($string, $terms) {
		$string = strtolower($string);
		foreach ($terms as $term) {
			if (strpos($string, $term) === false) {
				return false;
			}
		}
		return true;
	}
	public static function autocomplete() {
		if (self::checkapikey()) {
			$term = strtolower(trim(isset($_REQUEST['term']) ? $_REQUEST['term'] : ''));
			$results = array();
			if (strlen($term) >= 3) {
				if (GFStripeExtensions::get_option('virtuous-token')) {
					$customers = self::search_customer($term, 20);
					foreach ($customers as $customer) {
						if ($customer->email) {
							//$results[$customer->name?$customer->name:$customer->email] = $customer->email; //TODO: display not working with auto complete so not using
							$results[$customer->email] = $customer->email;
						}
					}
				}
				//Just searching last year for now since it should be cached, and because of how Gravity Forms works it makes it hard to search all fields
				//This means some customers may be missing
				$terms = explode(' ', $term);
				$startend = self::start_end('year');
				$transactions = self::get_transactions($startend['start'], $startend['end']);
				foreach ($transactions as $t) {
					$email = $t->email;
					if ($email && $email != '') {
						$name = self::customer_name($t);
						if (self::contains($name, $terms) || self::contains($email, $terms)) {
							//$results[$name?$name:$email] = $email; //TODO: display not working with auto complete so not using
							$results[$email] = $email;
						}
					}
				}
				if (count($results) == 0) {
					global $wpdb;
					$prefix = $wpdb->prefix;
					$row = is_numeric($term) ? self::entry_id($term) : self::transaction_id($term);
					if ($row) {
						$entry = GFAPI::get_entry($row->id);
						$map = self::get_form($row->form_id);
						if ($map) {
							if ($map['fields_email']) {
								$email = $entry[$map['fields_email']];
								$results[$email] = $email;
							}
						}
					}
					
				}
			}
			ksort($results);
			return $results;
		} else {
			return new WP_Error('gf-stripe-extensions-apikey', 'Invalid Api Key', array('status' => 200 ));
		}
	}
	public static function transaction_id($transaction) {
		global $wpdb;
		$prefix = $wpdb->prefix;
		$sql = "SELECT e.id, e.form_id FROM {$prefix}gf_entry e, {$prefix}gf_addon_payment_transaction t WHERE e.id = lead_id AND (t.transaction_id = '$transaction' OR t.subscription_id = '$transaction')";
		return $wpdb->get_row($sql);
	}
	public static function entry_id($entry) {
		global $wpdb;
		$prefix = $wpdb->prefix;
		$sql = "SELECT e.id, e.form_id FROM {$prefix}gf_entry e WHERE e.id = $entry";
		$row = $wpdb->get_row($sql);
	}
	public static function entry() {
		if (self::checkapikey()) {
			$entry = isset($_REQUEST['entry']) ? sanitize_text_field($_REQUEST['entry']) : '';
			$transaction = isset($_REQUEST['transaction']) ? sanitize_text_field($_REQUEST['transaction']) : '';
			if ($entry || $transaction) {
				if (is_numeric($entry)) {
					$row = self::entry_id($entry);
				} else {
					$row = self::transaction_id($transaction);
					if (!$row && strpos($transaction, 'ch_') === 0) {
						$charge = GFStripeExtensions::stripe('/charges/'.$transaction);
						if ($charge && is_array($charge) && $charge['payment_intent']) {
							$row = self::transaction_id($charge['payment_intent']);
						}
					}
				}
				if ($row) {
					return self::map_entry($row->id, $row->form_id);
				} else {
					return new WP_Error('gf-stripe-extensions-notfound', 'Entry not found', array('status' => 200 ));
				}
			} else {
				return new WP_Error('gf-stripe-extensions-param', '"entry" or "transaction" is required', array('status' => 200 ));
			}
		} else {
			return new WP_Error('gf-stripe-extensions-apikey', 'Invalid Api Key', array('status' => 200 ));
		}
	}
}
GFAnalytics::add_hooks();