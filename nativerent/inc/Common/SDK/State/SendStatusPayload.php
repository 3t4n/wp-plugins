<?php

namespace NativeRent\Common\SDK\State;

use NativeRent\Common\Entities\IntegrationStatus;
use NativeRent\Common\SDK\AuthorizedPayload;
use NativeRent\Common\SDK\PayloadInterface;

final class SendStatusPayload implements PayloadInterface {
	use AuthorizedPayload;

	/**
	 * State instance.
	 *
	 * @var IntegrationStatus
	 */
	private $status;

	/**
	 * @param  string            $siteID
	 * @param  IntegrationStatus $status
	 */
	public function __construct(
		$siteID,
		IntegrationStatus $status
	) {
		$this->siteID = $siteID;
		$this->status = $status;
	}

	/**
	 * @return IntegrationStatus
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * {@inheritDoc}
	 */
	public function jsonSerialize() {
		return [
			'siteID' => $this->siteID,
			'status' => $this->status->getValue(),
		];
	}
}
