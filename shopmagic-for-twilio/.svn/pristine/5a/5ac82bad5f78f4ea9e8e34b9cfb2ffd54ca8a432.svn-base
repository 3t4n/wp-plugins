<?php

namespace WPDesk\ShopMagicTwilio\Action;

use ShopMagicTwilioVendor\Twilio\Rest\Client;
use WPDesk\ShopMagic\FormField\Field\InputTextField;
use WPDesk\ShopMagic\FormField\Field\TextAreaField;
use WPDesk\ShopMagic\Workflow\Action\Action;
use WPDesk\ShopMagic\Workflow\Event\DataLayer;
use WPDesk\ShopMagicTwilio\Admin\Settings;


final class TwilioSendSms extends Action {
	const PARAM_NAME_MESSAGE = 'message';
	const PARAM_NAME_FROM    = 'target_from';
	const PARAM_NAME_TO      = 'target_phone';

	/** @var string */
	private $account_sid;

	/** @var string */
	private $auth_token;

	/** @var string */
	private $phone_number;

	/** @var string */
	private $messaging_service_sid;

	public function __construct() {
		$this->account_sid           = trim( Settings::get_option( Settings::PARAM_NAME_SSID ) );
		$this->auth_token            = trim( Settings::get_option( Settings::PARAM_NAME_TOKEN ) );
		$this->messaging_service_sid = trim( Settings::get_option( Settings::PARAM_MESSAGING_SID ) );
		$this->phone_number          = trim( Settings::get_option( Settings::PARAM_NAME_PHONE ) );
	}

	public function get_name(): string {
		return __( 'Send SMS with Twilio', 'shopmagic-for-twilio' );
	}

	public function get_description(): string {
		return esc_html__('Dispatch text message through Twilio SMS marketing.', 'shopmagic-for-twilio');
	}

	public function get_fields(): array {
		return array_merge( parent::get_fields(), [
			( new InputTextField() )
				->set_label( __( 'To', 'shopmagic-for-twilio' ) )
				->set_name( self::PARAM_NAME_TO )
				->set_description( __( 'Country code + 10-digit phone number (i.e. +16592045629)',
					'shopmagic-for-twilio' ) )
				->set_default_value( '{{ customer.phone }} ' ),
			( new InputTextField() )
				->set_label( __( 'From', 'shopmagic-for-twilio' ) )
				->set_description( __( 'Country code + 10-digit Twilio phone number (i.e. +16592045629) or Alphanumeric Sender',
					'shopmagic-for-twilio' ) )
				->set_default_value( $this->phone_number )
				->set_name( self::PARAM_NAME_FROM ),
			( new TextAreaField() )
				->set_label( esc_html__( 'Message', 'shopmagic-for-twilio' ) )
				->set_name( self::PARAM_NAME_MESSAGE ),
		] );
	}

	/**
	 * @throws \ShopMagicTwilioVendor\Twilio\Exceptions\ConfigurationException
	 */
	public function execute( DataLayer $resources ): bool {
		$twilio = new Client( $this->account_sid, $this->auth_token );

		if ( ! empty( $this->messaging_service_sid ) ) {
			$message_parameters['messagingServiceSid'] = $this->messaging_service_sid;
		} else {
			$message_parameters['from'] = $this->placeholder_processor->process( $this->fields_data->get( self::PARAM_NAME_FROM ) ?: $this->phone_number );
		}
		$message_parameters['body'] = $this->placeholder_processor->process( $this->fields_data->get( self::PARAM_NAME_MESSAGE ) );

		$this->logger->debug( 'Sending message with parameters: ', [ 'parameters' => $message_parameters ] );

		$message = $twilio->messages->create(
			$this->placeholder_processor->process( $this->fields_data->get( self::PARAM_NAME_TO ) ?: '{{ customer.phone }}' ),
			$message_parameters
		);

		$this->logger->debug( 'Message status: ', [ 'message' => $message->toArray() ] );

		return is_null( $message->errorCode );
	}

	public function get_required_data_domains(): array {
		return [];
	}
}
