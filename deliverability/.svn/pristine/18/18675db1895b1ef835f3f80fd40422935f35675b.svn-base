<?php

namespace TopDeliverability\Score;

/**
 * @method Blacklisted[] getDetails()
 */
class BlacklistAnalysisResult extends AnalysisResult {

	/**
	 * @param int           $score
	 * @param Blacklisted[] $details
	 */
	public function __construct( $score, $details ) {
		/**
		 * @noinspection PhpParamsInspection
		 * REFACTOR $details is declared as string[] in the parent class, but here we are passing a Blacklisted[]; we
		 *  need to find a way to correctly type this variable, otherwise it could cause issues in the dashboard page in
		 *  case the actual subtype is not evaluated
		 */
		parent::__construct( $score, $details );
	}
}
