<?php

namespace TopDeliverability\Settings\Widget;

use TopDeliverability\Api\DailyUsage;
use TopDeliverability\Usage\DailyUsageDataAttributes;

class DailyUsageAdapter {

	/**
	 * @var bool
	 */
	private $thresholdEnabled;

	/**
	 * @param bool $thresholdEnabled
	 */
	public function __construct( $thresholdEnabled ) {
		$this->thresholdEnabled = $thresholdEnabled;
	}

	/**
	 * @param DailyUsage[] $dailyUsageData
	 *
	 * @return DailyUsageDataAttributes
	 */
	public function adaptDailyUsage( $dailyUsageData ) {
		return new DailyUsageDataAttributes(
			$this->adaptSignedCount( $dailyUsageData ),
			$this->adaptNotSignedCount( $dailyUsageData ),
			$this->adaptThresholds( $dailyUsageData ),
			$this->adaptDayLabels( $dailyUsageData )
		);
	}

	/**
	 * @param DailyUsage[] $dailyUsageData
	 *
	 * @return string[]
	 */
	private function adaptDayLabels( array $dailyUsageData ) {
		return array_map(
			function ( DailyUsage $dailyUsage ) {
				return $dailyUsage->get_date()->format( 'Y-m-d' );
			},
			$dailyUsageData
		);
	}

	/**
	 * @param DailyUsage[] $dailyUsageData
	 *
	 * @return int[]
	 */
	private function adaptSignedCount( array $dailyUsageData ) {
		return array_map(
			function ( DailyUsage $dailyUsage ) {
				return min( $dailyUsage->get_requested(), $dailyUsage->get_threshold() );
			},
			$dailyUsageData
		);
	}

	/**
	 * @param DailyUsage[] $dailyUsageData
	 *
	 * @return int[]
	 */
	private function adaptNotSignedCount( array $dailyUsageData ) {
		return array_map(
			function ( DailyUsage $dailyUsage ) {
				return max( 0, $dailyUsage->get_requested() - $dailyUsage->get_threshold() );

			},
			$dailyUsageData
		);
	}

	/**
	 * @param DailyUsage[] $dailyUsageData
	 *
	 * @return int[]
	 */
	private function adaptThresholds( array $dailyUsageData ) {
		if ( $this->thresholdEnabled ) {
			return array_map(
				function ( DailyUsage $dailyUsage ) {
					return $dailyUsage->get_threshold();
				},
				$dailyUsageData
			);
		} else {
			return array();
		}
	}
}
