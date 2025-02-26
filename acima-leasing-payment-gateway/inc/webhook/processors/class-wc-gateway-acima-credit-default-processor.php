<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class WC_Gateway_Acima_Credit_Default_Processor
 *
 * Handles the default processing of Acima webhooks.
 */
class WC_Gateway_Acima_Credit_Default_Processor extends WC_Gateway_Acima_Credit_Processor implements WC_Gateway_Acima_Credit_Processor_Interface {
	/**
	 * Processes the webhook event.
	 *
	 * @return void
	 */
	public function process() {
		WC_Gateway_Acima_Credit_Logger::debug( 'Unknown workflow state. We do nothing.' );
		return null;
	}
}
