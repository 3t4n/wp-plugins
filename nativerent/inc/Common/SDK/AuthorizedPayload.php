<?php

namespace NativeRent\Common\SDK;

trait AuthorizedPayload {
	/**
	 * @var string
	 */
	private $siteID;

	/**
	 * @return string
	 */
	public function getSiteID() {
		return $this->siteID;
	}
}
