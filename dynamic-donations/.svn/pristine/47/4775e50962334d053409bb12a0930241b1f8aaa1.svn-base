<?php

function __dydo(string $text)
{
	return __($text, DYDO_TEXTDOMAIN);
}

function dydo_get_currency_attributes_by_iso($iso_array)
{
	$new_selected_currency = array();
	foreach ($iso_array as $value) {
		$value  = strtolower($value);
		$index  = array_search($value, array_column(DYDO_SUPPORTED_CURRENCIES, 'iso'));
		$symbol = DYDO_SUPPORTED_CURRENCIES[$index]['symbol'];
		array_push(
			$new_selected_currency,
			array(
				'iso'    => $value,
				'symbol' => $symbol,
			)
		);
	}
	return $new_selected_currency;
}

function dydo_save_currency_by_default_on_switch($payment_gateway)
{
	if ($payment_gateway === 'woocommerce') {
		dydo_save_options_array(strtolower(get_option('woocommerce_currency')), 'payment', 'default_currency');
		dydo_save_options_array(array(strtolower(get_option('woocommerce_currency'))), 'payment', 'selected_currencies');
	} else {
		dydo_save_options_array('usd', 'payment', 'default_currency');
		dydo_save_options_array(array('usd'), 'payment', 'selected_currencies');
	}
}

function dydo_get_options_array()
{
	return get_option('dydo_options');
}

function dydo_save_options_array($value, $index, $sub_index = null)
{
	$options = dydo_get_options_array();
	if ($sub_index) {
		$options[$index][$sub_index] = $value;
	} else {
		$options[$index] = $value;
	}
	update_option('dydo_options', $options);
}

function dydo_request($url, $method, array $body)
{
	return wp_remote_request(
		$url,
		array(
			'method' => $method,
			'body'   => $body,
		)
	);
}

function dydo_get_protocol()
{
	$protocol = (!empty(sanitize_text_field($_SERVER['HTTPS'])) && sanitize_text_field($_SERVER['HTTPS']) !== 'off' || sanitize_text_field($_SERVER['SERVER_PORT']) == 443) ? 'https://' : 'http://';
	return str_replace($protocol, '', get_bloginfo('wpurl'));
}

function dydo_validate_date($date, $format = 'Y-m-d')
{
	// Create the format date
	$d = DateTime::createFromFormat($format, $date);
	// Return the comparison
	return $d && $d->format(trim($format)) === trim($date);
}

function dydo_convert_file_to_string($file_path)
{
	$html = null;
	if (file_exists($file_path)) {
		ob_start();

		include_once $file_path;

		$html = ob_get_clean();
	}
	return $html;
}

function dydo_get_global_settings()
{
	$options             = dydo_get_options_array();
	$default_currency    = DYDO_SUPPORTED_CURRENCIES[$options['payment']['default_currency'] ?: 'usd'];
	$selected_currencies = array_values(
		array_filter(
			DYDO_SUPPORTED_CURRENCIES,
			function ($item) {
				return in_array($item['iso'], dydo_get_options_array()['payment']['selected_currencies']);
			}
		)
	);

	if ($options['payment']['payment_gateway'] === 'woocommerce') {
		$default_currency    = $this->build_woocommerce_array($options['payment']['default_currency']);
		$selected_currencies = array($this->build_woocommerce_array($options['payment']['default_currency']));
	}
	error_log(print_r($options['payment']['payment_gateway'],true));
	$data = array(
		'show_description'           => (bool) $options['style']['show_description'] == 1,
		'description'                => (string) $options['style']['description'],
		'amounts'                    => (array) $options['donations']['amounts'],
		'recurring_donation_enabled' => (bool) $options['donations']['recurring_donation_enabled'] == 1,
		'onetime_donation_enabled'   => (bool) $options['donations']['onetime_donation_enabled'] == 1,
		'stripe_enabled'             => (bool) $options['payment']['stripe_enabled'] == 1,
		'payment_gateway'            => (string) $options['payment']['payment_gateway'],
		'product_id'                 => (int) $options['donations']['product_id'],
		'stripe_pk'                  => (string) $options['payment']['stripe_pk'],
		'donations_url'              => (string) $options['donations']['donations_url_type'],
		'donations_page'             => (string) $options['donations']['donations_url'],
		'donations_url_type'         => (string) $options['donations']['donations_page'],
		'default_currency'           => $default_currency,
		'selected_currencies'        => $selected_currencies,
		'show_currencies'            => (bool) $options['style']['show_currencies'] == 1,
	);

	$data = apply_filters('dydo_send_global_settings_to_app', $data);
	return $data;
}

function dydo_phpmailer_settings($phpmailer)
{
	$smtp_settings = dydo_get_options_array()['receipts']['smtp_settings'];
	if ((isset($smtp_settings['host']) && $smtp_settings['host'] != '') &&
		(isset($smtp_settings['port']) && $smtp_settings['port'] != '') &&
		(isset($smtp_settings['from']) && $smtp_settings['from'] != '') &&
		(isset($smtp_settings['from_name']) && $smtp_settings['from_name'] != '')
	) {
		$phpmailer->isSMTP();
		$phpmailer->Host     = $smtp_settings['host'];
		$phpmailer->Port     = $smtp_settings['port'];
		$phpmailer->From     = $smtp_settings['from'];
		$phpmailer->FromName = $smtp_settings['from_name'];

		if (
			$smtp_settings['auth'] == true &&
			(isset($smtp_settings['username']) && $smtp_settings['username'] != '') &&
			(isset($smtp_settings['password']) && $smtp_settings['password'] != '')
		) {
			$phpmailer->SMTPAuth = true; // Ask it to use authenticate using the Username and Password properties
			$phpmailer->Username = $smtp_settings['username'];
			$phpmailer->Password = $smtp_settings['password'];
		}
	} else {
		throw new Exception('There are missing parameters for the mailer', 1);
	}
}

function dydo_is_woocommerce_activated()
{
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
	if (is_plugin_active('woocommerce/woocommerce.php')) {
		return true;
	} else {
		return false;
	}
}

function dydo_set_not_empty($variable)
{
	return isset($variable) && !empty($variable);
}

function dydo_save_onetime_donation($transaction_id, $amount, $currency, $confirmed = 0, $user_id, $created_at = '')
{
	if (empty($transaction_id) || empty($amount) || empty($currency)) {
		return ('Donation could not be saved to the database.');
	}
	$created_at = $created_at== ''?wp_date('Y-m-d H:i:s'): $created_at;
	return dydo_save_donation(
		DYDO_ONETIME_DONATION_TABLENAME,
		array(
			'user_id'          => $user_id,
			'customer_id'      => get_user_meta($user_id, 'dydo_stripe_customer_id', true),
			'transaction_id'   => $transaction_id,
			'dydo_gateways_id' => 2,
			'amount'           => (float) $amount,
			'currency'         => strtoupper(trim($currency)),
			'created_at'       => $created_at,
			'updated_at'       => $created_at,
			'confirmed' => $confirmed
		)
	);
	// else {
	// 	//Refactor
	// 	return dydo_save_donation(
	// 		DYDO_SUBSCRIPTION_TABLENAME,
	// 		array(
	// 			'user_id'          => get_current_user_id(),
	// 			'customer_id'      => get_user_meta(get_current_user_id(), 'dydo_stripe_customer_id', true),
	// 			'subscription_id'  => $transaction_id,
	// 			'dydo_gateways_id' => 2,
	// 			'active'           => 1,
	// 			'created_at'       => wp_date('Y-m-d H:i:s'),
	// 			'updated_at'       => wp_date('Y-m-d H:i:s'),
	// 		)
	// 	);
	// }
}

function dydo_update_onetime_donation($donation_id, $transaction_id, $amount, $currency, $confirmed = false, $user_id)
{
	if (empty($transaction_id) || empty($amount) || empty($currency) || empty($donation_id)) {
		return ('Donation could not be saved to the database.');
	}
	return dydo_update_donation(
		array(
			'dydo_gateways_id' => 2,
			'amount'           => (float) $amount,
			'currency'         => strtoupper(trim($currency)),
			'updated_at'       => wp_date('Y-m-d H:i:s'),
			'confirmed' => (bool) $confirmed
		),
		array(
			'id' => $donation_id,
			'customer_id'      => get_user_meta($user_id, 'dydo_stripe_customer_id', true),
			'transaction_id'   => $transaction_id
		),
		DYDO_ONETIME_DONATION_TABLENAME
	);
}

function dydo_stripe_convert_to_real_currency($currency, $amount)
{
	$is_decimal        = DYDO_SUPPORTED_CURRENCIES[$currency];
	if ($is_decimal !== true) {
		return  $amount / 100;
	}
	return  $amount;
}

function dydo_is_valid_timezone($timezone) {
	return in_array($timezone, timezone_identifiers_list());
}