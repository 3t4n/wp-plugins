<?php

namespace TopDeliverability\Api;

use DateTimeInterface;

class DailyUsage {

	/**
	 * @var DateTimeInterface
	 */
	private $date;

	/**
	 * @var int
	 */
	private $requested;

	/**
	 * @var int
	 */
	private $threshold;

	/**
	 * @param DateTimeInterface $date
	 * @param int               $requested
	 * @param int               $threshold
	 */
	public function __construct( DateTimeInterface $date, $requested, $threshold ) {
		$this->date      = $date;
		$this->requested = $requested;
		$this->threshold = $threshold;
	}

	public function get_date() {
		return $this->date;
	}

	public function get_requested() {
		return $this->requested;
	}

	public function get_threshold() {
		return $this->threshold;
	}
}
