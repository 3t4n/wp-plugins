<?php

class DyDo_Activator
{

	public static function activate()
	{
		self::set_options();
		DyDo_DB::create_tables();

		do_action('dydo_activate');
	}

	public static function set_options()
	{
		$default_amounts = array(
			self::set_custom_amount('First Custom Amount', 'dydo_first_amount', 5, true),
			self::set_custom_amount('Second Custom Amount', 'dydo_second_amount', 25),
			self::set_custom_amount('Third Custom Amount', 'dydo_third_amount', 50),
			self::set_custom_amount('Fourth Custom Amount', 'dydo_fourth_amount', 100),
		);
		$styles_content  = self::set_custom_styles();

		$plugin_options = array(
			'donations'       => array(
				'amounts'                    => $default_amounts,
				'recurring_donation_enabled' => 0,
				'onetime_donation_enabled'   => 1,
				'donations_url_type'         => '',
				'donations_url'              => '',
				'donations_page'             => '',
				'product_id'                 => '',

			),
			'style'           => array(
				'description'      => 'Donation description',
				'show_description' => 1,
				'show_currencies'  => 1,
				'theme'            => 'default',
				'custom_style'     => $styles_content,
				'label_button'     => 'Donate',
				'helper_labels'    => array(),
			),
			'payment'         => array(
				'selected_currencies' => array('usd'),
				'default_currency'    => 'usd',
				'payment_gateway'     => 'stripe',
				'stripe_enabled'      => 1,
				'stripe_pk'           => '',
				'stripe_sk'           => '',
			),
			'license'         => array(
				'code'   => PWP_LICENSE_DEFAULT,
				'status' => '',
			),
			'receipts'        => array(
				'custom_paragraph' => '',
				'bcc' => '',
				'payment_gateway'  => array('stripe' => false),
				'smtp'             => false,
				'smtp_settings'    => array(
					'host'      => '',
					'port'      => '',
					'auth'      => false,
					'username'  => '',
					'password'  => '',
					'secure'    => '',
					'from'      => '',
					'from_name' => '',
				),
			),
			'stripe_webhook' => array('id' => '')
		);
		$saved_options = null !== dydo_get_options_array() && !empty(dydo_get_options_array())  ? dydo_get_options_array() : array();
		foreach ($plugin_options as $group => $group_value) {
			foreach ($group_value as $key => $value) {
				if (empty($saved_options[$group][$key])) {
					$saved_options[$group][$key] = $value;
				}
			}
		}
		update_option('dydo_options', $saved_options);
	}

	private static function set_custom_styles()
	{
		$filename       = plugin_dir_path(dirname(__FILE__)) . 'includes/resources/base-custom-styles.css';
		$styles_content = file_get_contents($filename);
		$data           = '';

		if (is_file($filename)) {
			$data = $styles_content;
		}

		return $data;
	}

	private static function set_custom_amount($title, $name, $amount, $default = false, $enabled = true)
	{
		return array(
			'title'          => $title,
			'name'           => $name,
			'enabled_name'   => $name . '-enabled',
			'value_name'     => $name . '-value',
			'amount_checked' => $default,
			'enabled'        => $enabled,
			'amount'         => $amount,
		);
	}
}
