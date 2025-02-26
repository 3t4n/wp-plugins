<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Handles the logic for processing and validating Acima webhook events.
 */
class WC_Gateway_Acima_Credit_Event {
	private $sharedApiKey;
	public $resource;
	public $workflowState;
	public $action;
	public $id;
	public $contractId;
	public $merchantId;
	public $locationId;

	/**
	 * Constructs a new event object and validates the incoming data.
	 *
	 * @param array  $eventData Data for the event.
	 * @param string $apiKey API key to validate.
	 * @param string $sharedApiKey Shared API key for validation.
	 * @param bool   $enabled Whether the webhook functionality is enabled.
	 */
	public function __construct( array $eventData, string $apiKey, string $sharedApiKey, bool $enabled ) {
		$this->sharedApiKey = $sharedApiKey;

		$this->validateWebhookIsEnabled( $enabled );
		$this->validateApiKey( $apiKey );

		$this->resource      = $eventData['resource'] ?? null;
		$this->workflowState = $eventData['workflow_state'] ?? null;
		$this->action        = $eventData['action'] ?? null;
		$this->id            = $eventData['id'] ?? null;
		$this->contractId    = $eventData['contract_id'] ?? null;
		$this->merchantId    = $eventData['merchant_id'] ?? null;
		$this->locationId    = $eventData['location_id'] ?? null;

		$this->validateEventData( $eventData );
	}

	/**
	 * Returns the contract ID as the lease ID.
	 *
	 * @return string|null
	 */
	public function getLeaseId() {
		return $this->contractId;
	}

	/**
	 * Validates the API key.
	 *
	 * @param string $apiKey The API key to validate
	 * @throws WC_Gateway_Acima_Credit_Exception If API key is invalid
	 */
	private function validateApiKey( $apiKey ) {
		if ( $this->sharedApiKey !== $apiKey ) {
			throw new WC_Gateway_Acima_Credit_Exception(
				esc_html__( 'Invalid API key', 'acima-leasing-payment-gateway' ),
				esc_html__( 'Invalid API key provided.', 'acima-leasing-payment-gateway' )
			);
		}
	}

	/**
	 * Validates the presence of required event data.
	 *
	 * @param array $data Event data to validate
	 * @throws WC_Gateway_Acima_Credit_Exception If required fields are missing
	 */
	private function validateEventData( $data ) {
		$requiredFields = array( 'resource', 'action', 'contract_id', 'merchant_id', 'location_id' );
		foreach ( $requiredFields as $field ) {
			if ( empty( $data[ $field ] ) ) {
				throw new WC_Gateway_Acima_Credit_Exception(
					sprintf(
					/* translators: %s: field name */
						esc_html__( 'Missing required field: %s', 'acima-leasing-payment-gateway' ),
						esc_html( $field )
					),
					sprintf(
					/* translators: %s: field name */
						esc_html__( 'Missing data for %s.', 'acima-leasing-payment-gateway' ),
						esc_html( $field )
					)
				);
			}
		}
	}

	/**
	 * Ensures that the webhook functionality is enabled.
	 *
	 * @param bool $enabled Whether webhooks are enabled
	 * @throws WC_Gateway_Acima_Credit_Exception If webhooks are disabled
	 */
	protected function validateWebhookIsEnabled( $enabled ) {
		if ( ! $enabled ) {
			throw new WC_Gateway_Acima_Credit_Exception(
				esc_html__( 'Webhook disabled in admin section.', 'acima-leasing-payment-gateway' ),
				esc_html__( 'Webhook functionality has been disabled.', 'acima-leasing-payment-gateway' )
			);
		}
	}
}
