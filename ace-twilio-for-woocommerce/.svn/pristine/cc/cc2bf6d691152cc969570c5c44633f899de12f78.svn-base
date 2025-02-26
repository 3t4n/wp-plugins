<?php

/**
 * Fired during plugin activation
 *
 * @link       www.acewebx.com
 * @since      1.0.0
 *
 * @package    Ace_Twilio_For_Woocommerce
 * @subpackage Ace_Twilio_For_Woocommerce/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Ace_Twilio_For_Woocommerce
 * @subpackage Ace_Twilio_For_Woocommerce/includes
 * @author     AceWebx Team <developer@acewebx.com>
 */
class Ace_Twilio_For_Woocommerce_Activator
{

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate()
	{
		if (get_option('ace-twilio-for-woocommerce-default-status') != 1) {

			update_option('ace-twilio-for-woocommerce-default-status', 1);
			$acePaymentEnabled =  array(
				'pending'             => 'on',
				'processing'          => 'on',
				'completed'           => 'on',
				'on-hold'             => 'on',
				'cancelled'           => 'on',
				'refunded'            => 'on',
				'failed'              => 'on'
			);

			$ace_twilio_message = array(
				'pending'     =>  'Your Order is Pending.',
				'processing'  =>  'Your Order is Processing.',
				'completed'   =>  'Your Order is Complete.',
				'on-hold'     =>  'Your Order is on Hold.',
				'cancelled'   =>  'Your Order is Cancelled.',
				'refunded'    =>  'Your Order is Refunded.',
				'failed'      =>  'Your Order is Failed.',
			);

			$data = array(
				'ace_twilio_enable_de'          => 'on',
				'ace_twilio_sid'                => '',
				'ace_twilio_auth'               => '',
				'ace_payment_twilio_enabled'    => $acePaymentEnabled,
				'ace_twilio_message'            => $ace_twilio_message,
				'ace_from_country_code'         => '',
				'ace_from_twilio_number'        => ''
			);

			update_option('ace_twilio_setting_data', $data);
		}
	}
}
