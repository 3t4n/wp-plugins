<?php

namespace NativeRent\Common\SDK\State;

use NativeRent\Common\SDK\AuthorizedPayload;
use NativeRent\Common\SDK\PayloadInterface;

use function implode;

final class GetOptionsPayload implements PayloadInterface {
	use AuthorizedPayload;

	/**
	 * @var string
	 */
	private $siteID;

	/**
	 * List of options that need to be obtained.
	 * An empty value means all options are returned.
	 *
	 * @var []string
	 */
	private $only = [];

	/**
	 * @param string   $siteID Site ID.
	 * @param string[] $only List of fields.
	 */
	public function __construct( $siteID, $only = [] ) {
		$this->siteID = $siteID;
		$this->only = $only;
	}

	/**
	 * @return string[]
	 */
	public function getOnly() {
		return $this->only;
	}

	/**
	 * {@inheritDoc}
	 */
	public function jsonSerialize() {
		return [
			'siteID' => $this->siteID,
			'only' => ! empty( $this->only ) ? implode( ',', $this->only ) : null,
		];
	}
}
