<?php

declare( strict_types=1 );

namespace WPDesk\ShopMagicTwilio;

class TwilioExtension extends \WPDesk\ShopMagic\Extensions\AbstractExtension {

	public function get_actions(): array {
		return [
			'twilio_send_sms' => new Action\TwilioSendSms(),
		];
	}

}
