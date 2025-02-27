<?php

namespace TopDeliverability;

use TopDeliverability\Score\AnalysisResult;
use TopDeliverability\Score\AnalysisNotAvailable;
use TopDeliverability\Score\BimiAnalysisResult;
use TopDeliverability\Score\BlacklistAnalysisResult;

class DeliverabilityScore {

	/**
	 * @var int
	 */
	private $totalScore;

	/**
	 * @var AnalysisResult|AnalysisNotAvailable
	 */
	private $spfScore;

	/**
	 * @var AnalysisResult|AnalysisNotAvailable
	 */
	private $dmarcScore;

	/**
	 * @var AnalysisResult|AnalysisNotAvailable
	 */
	private $domainAge;

	/**
	 * @var AnalysisResult|AnalysisNotAvailable
	 */
	private $dkimScore;

	/**
	 * @var AnalysisResult|AnalysisNotAvailable
	 */
	private $mx;

	/**
	 * @var AnalysisResult|AnalysisNotAvailable
	 */
	private $blacklist;

	/**
	 * @var AnalysisResult|AnalysisNotAvailable
	 */
	private $bimi;

	/**
	 * @param int                                          $totalScore
	 * @param AnalysisResult|AnalysisNotAvailable          $spfScore
	 * @param AnalysisResult|AnalysisNotAvailable          $dmarcScore
	 * @param AnalysisResult|AnalysisNotAvailable          $domainAge
	 * @param AnalysisResult|AnalysisNotAvailable          $dkimScore
	 * @param AnalysisResult|AnalysisNotAvailable          $mx
	 * @param AnalysisNotAvailable|BlacklistAnalysisResult $blacklist
	 * @param AnalysisNotAvailable|BimiAnalysisResult      $bimi
	 */
	public function __construct( $totalScore, $spfScore, $dmarcScore, $domainAge, $dkimScore, $mx, $blacklist, $bimi ) {
		$this->totalScore = $totalScore;
		$this->spfScore   = $spfScore;
		$this->dmarcScore = $dmarcScore;
		$this->domainAge  = $domainAge;
		$this->dkimScore  = $dkimScore;
		$this->mx         = $mx;
		$this->blacklist  = $blacklist;
		$this->bimi       = $bimi;
	}

	public function getTotalScore() {
		return $this->totalScore;
	}

	public function getSpfScore() {
		return $this->spfScore;
	}

	public function getDmarcScore() {
		return $this->dmarcScore;
	}

	public function getDomainAge() {
		return $this->domainAge;
	}

	public function getDkimScore() {
		return $this->dkimScore;
	}

	/**
	 * @return AnalysisNotAvailable|AnalysisResult|null
	 */
	public function getMx() {
		return $this->mx;
	}

	/**
	 * @return AnalysisNotAvailable|BlacklistAnalysisResult|null
	 */
	public function getBlacklist() {
		return $this->blacklist;
	}

	/**
	 * @return AnalysisNotAvailable|AnalysisResult|null
	 */
	public function getBimi() {
		return $this->bimi;
	}
}
