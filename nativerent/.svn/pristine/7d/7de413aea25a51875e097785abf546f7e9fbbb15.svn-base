<?php

namespace NativeRent\Common\SDK\State;

use NativeRent\Common\Entities\AdUnitsConfig;
use NativeRent\Common\Entities\Monetizations;
use NativeRent\Common\Entities\SiteModerationStatus;

final class GetOptionsData {
	/**
	 * @var AdUnitsConfig|null
	 */
	private $adUnitsConfig;

	/**
	 * @var SiteModerationStatus|null
	 */
	private $siteModerationStatus;

	/**
	 * @var string[]|null
	 */
	private $advPatterns;

	/**
	 * @var Monetizations|null
	 */
	private $monetizations;

	/**
	 * @param  AdUnitsConfig|null        $adUnitsConfig
	 * @param  string[]|null             $advPatterns
	 * @param  SiteModerationStatus|null $siteModerationStatus
	 * @param  Monetizations|null        $monetizations
	 */
	public function __construct(
		AdUnitsConfig $adUnitsConfig = null,
		$advPatterns = null,
		SiteModerationStatus $siteModerationStatus = null,
		Monetizations $monetizations = null
	) {
		$this->adUnitsConfig = $adUnitsConfig;
		$this->advPatterns = $advPatterns;
		$this->siteModerationStatus = $siteModerationStatus;
		$this->monetizations = $monetizations;
	}

	/**
	 * @return AdUnitsConfig|null
	 */
	public function getAdUnitsConfig() {
		return $this->adUnitsConfig;
	}

	/**
	 * @return SiteModerationStatus|null
	 */
	public function getSiteModerationStatus() {
		return $this->siteModerationStatus;
	}

	/**
	 * @return string[]|null
	 */
	public function getAdvPatterns() {
		return $this->advPatterns;
	}

	/**
	 * @return Monetizations|null
	 */
	public function getMonetizations() {
		return $this->monetizations;
	}
}
