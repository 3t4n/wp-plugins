<?php

namespace WC_Gateway_ICount;

use WC_Logger_Interface;

require_once 'WC_ICount_ENUM.php';

class LEVEL_LOG extends WC_ICount_ENUM
{
	const INFO = 'INFO';
	const ERROR = 'ERROR';
	const DEBUG = 'DEBUG';
}

class WC_ICount_Logger
{
	private WC_Logger_Interface $logger;
	private bool $is_debug;

	public function __construct(bool $is_debug)
	{
		$this->logger = wc_get_logger();
		$this->is_debug = $is_debug;
	}

	public function log(string $message, LEVEL_LOG $type = null)
	{
		static $log_methods = null;
		if (is_null($log_methods))
			$log_methods = [
				(string)LEVEL_LOG::get(LEVEL_LOG::DEBUG) => 'debug',
				(string)LEVEL_LOG::get(LEVEL_LOG::ERROR) => 'error',
				(string)LEVEL_LOG::get(LEVEL_LOG::INFO) => 'info',
			];

		$type = $type ?? LEVEL_LOG::get(LEVEL_LOG::INFO);
		if ($type !== LEVEL_LOG::get(LEVEL_LOG::DEBUG) || $this->is_debug) {
			$this->logger->{$log_methods[(string)$type]}($message, ['source' => 'icount-payment']);
		}
	}
}
