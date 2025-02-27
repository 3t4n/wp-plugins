<?php

declare( strict_types=1 );

namespace WPDesk\ShopMagicTwilio\Admin;

use WPDesk\ShopMagic\Admin\Settings\FieldSettingsTab;
use WPDesk\ShopMagic\FormField\Field\InputTextField;

final class Settings extends FieldSettingsTab {
	const PARAM_NAME_SSID     = 'twilio_ssid';
	const PARAM_NAME_TOKEN    = 'twilio_token';
	const PARAM_NAME_PHONE    = 'twilio_phone';
	const PARAM_MESSAGING_SID = 'twilio_messaging_sid';

	public static function get_tab_slug(): string {
		return 'twilio';
	}

	public function get_fields(): array {
		return [
			( new InputTextField() )
				->set_label( __( 'Twilio Account SID Available from within your Twilio account', 'shopmagic-for-twilio' ) )
				->set_description( __( 'Enter Account SID API credentials are available on <a target="_blank" href="https://www.twilio.com/user/account/voice-sms-mms">https://www.twilio.com/user/account/voice-sms-mms</a>', 'shopmagic-for-twilio' ) )
				->set_name( self::PARAM_NAME_SSID ),
			( new InputTextField() )
				->set_label( __( 'Twilio Auth Token Available from within your Twilio account', 'shopmagic-for-twilio' ) )
				->set_description( __( 'Enter Auth Token API credentials are available on <a target="_blank" href="https://www.twilio.com/user/account/voice-sms-mms">https://www.twilio.com/user/account/voice-sms-mms</a>', 'shopmagic-for-twilio' ) )
				->set_name( self::PARAM_NAME_TOKEN ),
			( new InputTextField() )
				->set_label( esc_html__( 'Messaging Service SID', 'shopmagic-for-twilio' ) )
				->set_description( esc_html__( 'Using Messaging Service SID overwrites your "From" settings on this screen and automation settings. This field uses your Messaging Service configured in Twilio to pick sender name.', 'shopmagic-for-twilio' ) )
				->set_name( self::PARAM_MESSAGING_SID ),
			( new InputTextField() )
				->set_label( __( 'Twilio Number Valid number associated with your Twilio account', 'shopmagic-for-twilio' ) )
				->set_placeholder( '+16592045629' )
				->set_description( __( 'Country code + 10-digit Twilio phone number (i.e. +16592045629) or Alphanumeric Sender', 'shopmagic-for-twilio' ) )
				->set_name( self::PARAM_NAME_PHONE ),
		];
	}

	public function get_tab_name(): string {
		return __( 'Twilio', 'shopmagic-for-twilio' );
	}
}
