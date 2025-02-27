<?php

namespace TopDeliverability\Usage;

class DailyUsageDataAttributes {

	/**
	 * @var int[]
	 */
	private $signed;

	/**
	 * @var int[]
	 */
	private $notSigned;

	/**
	 * @var int[]
	 */
	private $thresholds;

	/**
	 * @var string[]
	 */
	private $dayLabels;

	/**
	 * @param int[]    $signed
	 * @param int[]    $notSigned
	 * @param int[]    $thresholds
	 * @param string[] $dayLabels
	 */
	public function __construct( $signed, $notSigned, $thresholds, $dayLabels ) {
		$this->signed     = $signed;
		$this->notSigned  = $notSigned;
		$this->thresholds = $thresholds;
		$this->dayLabels  = $dayLabels;
	}

	public function get_signed() {
		return $this->signed;
	}

	public function get_not_signed() {
		return $this->notSigned;
	}

	public function get_thresholds() {
		return $this->thresholds;
	}

	public function get_day_labels() {
		return $this->dayLabels;
	}

}
