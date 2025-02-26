<?php

namespace NativeRent\Api\Handlers;

use NativeRent\Common\NRentService;

final class PushEventHandler {
	const EVENT_ADV_PATTERNS_UPDATED = 'adv_patterns_updated';
	const EVENT_ADUNITS_CONFIG_UPDATED = 'adunits_config_updated';
	const EVENT_MONETIZATIONS_UPDATED = 'monetizations_updated';

	/** @var NRentService */
	private $nrentService;

	/**
	 * @param NRentService $nrentService
	 */
	public function __construct( $nrentService ) {
		$this->nrentService = $nrentService;
	}

	/**
	 * @param string $eventName
	 * @param int    $timestamp
	 *
	 * @return bool
	 */
	public function __invoke( $eventName, $timestamp ) {
		switch ( $eventName ) {
			case self::EVENT_ADV_PATTERNS_UPDATED:
				$this->nrentService->loadAdvPatterns();
				return true;
			case self::EVENT_ADUNITS_CONFIG_UPDATED:
				$this->nrentService->loadAdUnitsConfig();
				return true;
			case self::EVENT_MONETIZATIONS_UPDATED:
				$this->nrentService->loadMonetizations();
				return true;
			default:
				return false;
		}
	}
}
