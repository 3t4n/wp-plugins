<?php

namespace TopDeliverability\Score;

class ScoreAdapter {

	/**
	 * @param int $score
	 *
	 * @return string
	 */
	public function getTextualScore( $score ) {
		if ( $score <= 49 ) {
			return __( 'Critical issues found - please fix immediately', 'deliverability' );
		} elseif ( $score <= 99 ) {
			return __( 'Attention required - Things to be aware of', 'deliverability' );
		} else {
			return __( 'Correct - No issues to address', 'deliverability' );
		}
	}

	/**
	 * @param int $score
	 *
	 * @return string
	 */
	public function getScoreClass( $score ) {
		if ( $score <= 49 ) {
			return 'failure';
		} elseif ( $score <= 99 ) {
			return 'warning';
		} else {
			return 'success';
		}
	}
}
