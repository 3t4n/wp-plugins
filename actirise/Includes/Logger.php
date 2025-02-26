<?php
namespace Actirise\Includes;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

use Actirise\Includes\Options;

/**
 * Logger class.
 *
 * @link       https://actirise.com
 * @since      2.5.0
 * @package    actirise
 * @subpackage actirise/includes
 * @author     actirise <wordpress@actirise.com>
 */
class Logger {
	/**
	 * Add log.
	 *
	 * @since 2.5.0
	 * @param string $message
	 * @param string $file
	 * @param string $type
	 * @return void
	 */
	public static function add_log( $message, $file, $type ) {
		self::add_log_to_db( $message, $file, $type );
	}

	/**
	 * Get logs.
	 *
	 * @since 2.5.0
	 * @return array<array<'datelog'|'file'|'message'|'type', string>>
	 */
	public static function get_logs() {
		/** @var array<array<'datelog'|'file'|'message'|'type', string>> $logs */
		$logs = Options::get( 'logs', array() );

		if ( empty( $logs ) ) {
			return array();
		}

		if ( ! is_array( $logs ) ) {
			return array();
		}

		$logs = self::clear_old_logs( $logs );

		$clean_logs = array();

		foreach ( $logs as $log ) {
			$clean_logs[] = array(
				'datelog' => $log['datelog'],
				'file'    => $log['file'],
				'message' => $log['message'],
				'type'    => $log['type'],
			);
		}

		return $clean_logs;
	}

	/**
	 * Clear old logs.
	 *
	 * @since 2.5.0
	 * @param array<array<'datelog'|'file'|'message'|'type', string>> $logs
	 * @return array<array<'datelog'|'file'|'message'|'type', string>>
	 */
	public static function clear_old_logs( $logs ) {
		$logs = array_filter(
			$logs,
			/**
			 * @param array<'datelog'|'file'|'message'|'type', string> $log
			 * @return bool
			 */
			function ( $log ) {
				$now      = new \DateTime();
				$log_date = new \DateTime( $log['datelog'] );

				$diff = $now->diff( $log_date );

				if ( $diff->days > 7 ) {
					return false;
				}

				return true;
			}
		);

		// a maximum of 100 lines must remain
		if ( count( $logs ) > 100 ) {
			array_splice( $logs, 0, count( $logs ) - 100 );
		}

		return $logs;
	}

	/**
	 * Add log to database.
	 *
	 * @since 2.5.0
	 * @param string $message
	 * @param string $file
	 * @param string $type
	 * @return void
	 */
	private static function add_log_to_db( $message, $file, $type ) {
		/** @var array<array<'datelog'|'file'|'message'|'type', string>> $current_log */
		$current_log = Options::get( 'logs', array() );

		$current_log = self::clear_old_logs( $current_log );

		array_push(
			$current_log,
			array(
				'message' => $message,
				'file'    => $file,
				'type'    => $type,
				'datelog' => gmdate( 'Y-m-d H:i:s' ),
			)
		);

		Options::update( 'logs', $current_log );
	}
}
