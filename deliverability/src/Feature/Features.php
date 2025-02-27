<?php

namespace TopDeliverability\Feature;

use TopDeliverability\Feature\Unleash\UnleashClient;

class Features {

	/**
	 * @var UnleashClient
	 */
	private $client;

	/**
	 * @param UnleashClient $client
	 */
	public function __construct( UnleashClient $client ) {
		$this->client = $client;
	}

	/**
	 * @return bool
	 */
	public function showEmbeddedAuthenticationForm() {
		return $this->client->getFeature( 'embedded-authentication-form' );
	}
}
