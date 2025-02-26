<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Acima Credit Logger Class
 *
 * PSR-3 style logging functionality for the Acima Credit WooCommerce gateway.
 * Supports multiple log levels (DEBUG up to CRITICAL).
 * This logger class integrates with WooCommerce's logging system and Acima's error reporting.
 */
class WC_Gateway_Acima_Credit_Logger {

	/**
	 *
	 * Internal WooCommerce logger instance
	 * Lazily initialized when the first log message is written.
	 *
	 * @var WC_Logger|null WooCommerce logger instance
	 */
	protected static ?WC_Logger $logger = null;
	const WC_LOG_FILENAME               = 'woocommerce-gateway-acima';

	/**
	 * PSR-3 compatible log levels
	 */
	const DEBUG    = 100;
	const INFO     = 200;
	const WARNING  = 300;
	const ERROR    = 400;
	const CRITICAL = 500;

	protected static array $levels = array(
		100 => 'DEBUG',
		200 => 'INFO',
		300 => 'WARNING',
		400 => 'ERROR',
		500 => 'CRITICAL',
	);

	/**
	 * @param $message
	 * @param int        $level
	 * @param array      $context
	 * @param $start_time
	 * @param $end_time
	 *
	 * @return void
	 */
	public static function log( $message, int $level = self::DEBUG, array $context = array(), $start_time = null, $end_time = null ) {
		$settings = get_option( 'woocommerce_acima_credit_settings' );

		if ( ! class_exists( 'WC_Logger' ) || empty( $settings['acima_debug'] ) ) {
			return;
		}

		if ( apply_filters( 'wc_acima_logging', true, $message ) ) {
			if ( empty( self::$logger ) ) {
				self::$logger = wc_get_logger();
			}

			$log_entry = self::format_log_entry( $message, $level, $context, $start_time, $end_time );
			self::$logger->debug( $log_entry, array( 'source' => self::WC_LOG_FILENAME ) );

			// Only log to the api if we have a lease_id available
			if ( ! empty( $context['lease_id'] ) ) {
				$error_reporter = new WC_Gateway_Acima_Credit_Error_Reporter();
				$error_reporter->report_error(
					$settings['merchant_id'] ?? '',
					$context['lease_id'] ?? '',
					$message,
					array_merge(
						$context,
						array(
							'logLevel' => self::$levels[ $level ] ?? 'DEBUG',
						)
					)
				);
			}
		}
	}

	/**
	 * Formats an array for logging in a safe manner.
	 *
	 * @param array $data The array to format.
	 * @return string
	 */
	private static function format_array_for_log( array $data ): string {
		return wp_json_encode( $data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES );
	}

	/**
	 * @param $message
	 * @param $level
	 * @param $context
	 * @param $start_time
	 * @param $end_time
	 *
	 * @return string
	 */
	private static function format_log_entry( $message, $level, $context, $start_time, $end_time ): string {
		$log_entry  = "\n====Acima Version: " . WC_ACIMA_VERSION . "====\n";
		$log_entry .= '====Level: ' . ( self::$levels[ $level ] ?? 'DEBUG' ) . "====\n";

		if ( $context ) {
			$formatted_context = self::format_array_for_log( $context );
			$log_entry        .= "====Context====\n" . $formatted_context . "\n";
		}

		if ( ! is_null( $start_time ) ) {
			$formatted_start_time = date_i18n( get_option( 'date_format' ) . ' g:ia', $start_time );
			$end_time             = is_null( $end_time ) ? current_time( 'timestamp' ) : $end_time;
			$formatted_end_time   = date_i18n( get_option( 'date_format' ) . ' g:ia', $end_time );
			$elapsed_time         = round( abs( $end_time - $start_time ) / 60, 2 );

			$log_entry .= '====Start Log ' . $formatted_start_time . "====\n" . $message . "\n";
			$log_entry .= '====End Log ' . $formatted_end_time . ' (' . $elapsed_time . ")====\n\n";
		} else {
			$log_entry .= "====Start Log====\n" . $message . "\n====End Log====\n\n";
		}

		return $log_entry;
	}

	public static function debug( $message, $context = array() ) {
		self::log( $message, self::DEBUG, $context );
	}

	public static function info( $message, $context = array() ) {
		self::log( $message, self::INFO, $context );
	}

	public static function warning( $message, $context = array() ) {
		self::log( $message, self::WARNING, $context );
	}

	public static function error( $message, $context = array() ) {
		self::log( $message, self::ERROR, $context );
	}

	public static function critical( $message, $context = array() ) {
		self::log( $message, self::CRITICAL, $context );
	}
}
