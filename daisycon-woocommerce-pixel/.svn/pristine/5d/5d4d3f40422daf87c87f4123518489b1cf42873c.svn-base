<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Daisycon_Woocommerce
 * @subpackage Daisycon_Woocommerce/includes
 * @author     daisycon
 */
class Daisycon_Woocommerce_Error_Handler
{
	public function enable()
	{
		set_error_handler([$this, 'handleError']);
		register_shutdown_function([$this, 'handleShutdown']);
	}

	public function handleShutdown()
	{
		if (($_GET['page'] ?? null) !== 'daisycon-woocommerce') {
			return;
		}

		$error = error_get_last();
		if (false === empty($error)) {
			$this->handleError($error['type'], $error['message'], $error['file'], $error['line']);
		}
	}

	public function handleError($errorNumber, $message, $filename, $lineNumber): bool
	{
		if (false === isset($_ENV['AT_DEV']) && (false === defined('DAISYCON_DEBUG_LOG') || true !== DAISYCON_DEBUG_LOG)) {
			return false;
		}

		if (false === isset($_ENV['AT_DEV']) && ($errorNumber === E_DEPRECATED || $errorNumber === E_USER_DEPRECATED)) {
			return true;
		}

		$backtrace = $this->formatTraceToString(debug_backtrace());
		$replacements = [
			'{errorType}'  => strtoupper($this->getErrorTypeByNumber($errorNumber)),
			'{message}'    => $message,
			'{filename}'   => $filename,
			'{lineNumber}' => $lineNumber,
			'{backtrace}'  => $backtrace,
		];

		$printTemplate = <<<'ERRORMESSAGE'
{errorType}: {message}
in file: {filename}
on line number: {lineNumber}

Backtrace:
{backtrace}
ERRORMESSAGE;

		echo '<div class="notice notice-error" style="word-wrap: break-word; word-break: break-all;">'
			. '<pre>',
			str_replace(array_keys($replacements), $replacements, $printTemplate),
			'</pre></div>';
		return true;
	}

	private function formatTraceToString($backtrace): string
	{
		if ($backtrace[0]['function'] === 'handleError') {
			array_shift($backtrace);
		}
		$count = count($backtrace) + 1;
		return array_reduce(
			$backtrace,
			function ($message, $trace) use (&$count) {
				--$count;
				return $message
					. '#' . $count
					. ' ' . preg_replace('/.*\/wp-/', 'wp-', preg_replace('/.*daisycon-woocommerce-pixel\//', 'dwp/', $trace['file']))
					. '::' . $trace['function']
					. ' @ ' . $trace['line']
					. ' (' . implode(
						', ',
						array_map(
							function ($arg) {
								return var_export($arg, true);
							},
							$trace['args'] ?? []
						)
					) . ')'
					. "\n";
			},
			''
		);
	}

	private function getErrorTypeByNumber($errorNumber)
	{
		switch ($errorNumber) {
			case E_ERROR:
				return 'Error';

			case E_WARNING:
				return 'Warning';

			case E_PARSE:
				return 'Parse';

			case E_NOTICE:
				return 'Notice';

			case E_CORE_ERROR:
				return 'Core error';

			case E_CORE_WARNING:
				return 'Core warning';

			case E_COMPILE_ERROR:
				return 'Compile error';

			case E_COMPILE_WARNING:
				return 'Compile warning';

			case E_USER_ERROR:
				return 'User error';

			case E_USER_WARNING:
				return 'User warning';

			case E_USER_NOTICE:
				return 'User notice';

			case E_STRICT:
				return 'Strict';

			case E_RECOVERABLE_ERROR:
				return 'Recoverable error';

			case E_DEPRECATED:
				return 'Deprecated';

			case E_USER_DEPRECATED:
				return 'User deprecated';
		}

		return 'Unknown';
	}

	public function disable()
	{
		restore_error_handler();
	}
}
