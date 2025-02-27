<?php

namespace TopDeliverability\Notice;

use TopDeliverability\Template;

class Notice {

	/**
	 * @param string $testId
	 * @param string $message
	 * @return Template\Context
	 */
	public static function error( $testId, $message ) {
		return self::context(
			'error',
			$testId,
			$message
		);
	}

	/**
	 * @param string $level
	 * @param string $testId
	 * @param string $message
	 * @return Template\Context
	 */
	private static function context( $level, $testId, $message ) {
		return new Template\Context(
			array(
				'level'   => $level,
				'testid'  => $testId,
				'message' => $message,
			)
		);
	}

	private function __construct() {
	}
}
