<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class WC_Gateway_Acima_Credit_Processor
 *
 * Abstract base class for handling different types of webhook processors.
 */
abstract class WC_Gateway_Acima_Credit_Processor {

	/**
	 * @var mixed Event data likely passed as an array or object.
	 */
	protected $event;

	/**
	 * Constructor for the processor.
	 *
	 * @param mixed $event The event data associated with the webhook.
	 */
	public function __construct( $event ) {
		$this->event = $event;
	}

	/**
	 * Process the event.
	 *
	 * Each subclass should implement this method to handle the event processing
	 * in a manner appropriate for the specific type of event.
	 *
	 * @return void
	 */
	abstract public function process();
}
