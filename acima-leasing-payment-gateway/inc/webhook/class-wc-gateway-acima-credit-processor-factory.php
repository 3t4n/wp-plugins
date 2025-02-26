<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Responsible for creating the appropriate processor based on the event's workflow state.
 */
class WC_Gateway_Acima_Credit_Processor_Factory {

	/**
	 * @var array Maps workflow states to processor classes.
	 */
	private static $eventProcessorsMap = array(
		'delivery_confirmation_awaiting_delivery'  => 'WC_Gateway_Acima_Credit_Delivery_Pending_Processor',
		'delivery_confirmation_delivery_confirmed' => 'WC_Gateway_Acima_Credit_Delivery_Confirmed_Processor',
		'lease_cancelled'                          => 'WC_Gateway_Acima_Credit_Lease_Cancelled_Processor',
	);

	/**
	 * Creates a processor based on the webhook event's workflow_state or uses the DefaultProcessor if no specific
	 * processor is found.
	 *
	 * @param WC_Gateway_Acima_Credit_Event $event Event data to process.
	 * @return WC_Gateway_Acima_Credit_Processor_Interface The processor instance.
	 */
	public function create( WC_Gateway_Acima_Credit_Event $event ) {
		$key            = $event->resource . '_' . $event->workflowState;
		$processorClass = self::$eventProcessorsMap[ $key ] ?? 'WC_Gateway_Acima_Credit_Default_Processor';

		return new $processorClass( $event );
	}
}
