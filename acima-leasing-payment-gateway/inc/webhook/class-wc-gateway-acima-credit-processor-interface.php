<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Interface WC_Gateway_Acima_Credit_Processor_Interface
 *
 * Defines the basic contract for webhook event processors in the Acima Credit plugin.
 */
interface WC_Gateway_Acima_Credit_Processor_Interface {

	/**
	 * Process the event.
	 *
	 * Implement this method in classes that handle specific types of webhook events.
	 *
	 * @return void
	 */
	public function process();
}
