<?php

namespace NativeRent\Common\SDK\State;

use NativeRent\Common\Entities\State;
use NativeRent\Common\SDK\AuthorizedPayload;
use NativeRent\Common\SDK\PayloadInterface;

final class SendStatePayload implements PayloadInterface {
	use AuthorizedPayload;

	/**
	 * @var string
	 */
	private $siteID;

	/**
	 * State instance.
	 *
	 * @var State
	 */
	private $state;

	/**
	 * @param string $siteID Current site ID.
	 * @param State  $state  State instance.
	 */
	public function __construct(
		$siteID,
		State $state
	) {
		$this->siteID = $siteID;
		$this->state  = $state;
	}

	/**
	 * @return State
	 */
	public function getState() {
		return $this->state;
	}

	/**
	 * {@inheritDoc}
	 */
	public function jsonSerialize() {
		return [
			'siteID' => $this->siteID,
			'state' => $this->state,
		];
	}
}
