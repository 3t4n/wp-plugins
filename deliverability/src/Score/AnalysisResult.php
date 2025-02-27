<?php

namespace TopDeliverability\Score;

class AnalysisResult {

	/**
	 * @var int
	 */
	private $score;

	/**
	 * @var string[]
	 */
	private $details;

	/**
	 * @param int      $score
	 * @param string[] $details
	 */
	public function __construct( $score, $details ) {
		$this->score   = $score;
		$this->details = $details;
	}

	public function getScore() {
		return $this->score;
	}

	public function getDetails() {
		return $this->details;
	}
}
