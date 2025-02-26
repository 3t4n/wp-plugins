<?php
namespace Actirise\Includes;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Class to handle Actirise plugin options stored in database.
 *
 * @link       https://actirise.com
 * @since      2.5.8
 * @package    actirise
 * @subpackage actirise/includes
 * @author     actirise <wordpress@actirise.com>
 */
class Options {
	/**
	 * The name of the table in database
	 *
	 * @since    2.6.0
	 * @access   private
	 * @var      string $table_name
	 */
	private static $table_name;

	/**
	 * The array that stores autoloaded options
	 *
	 * @since    2.6.0
	 * @access   private
	 * @var      array<mixed> $autoloaded_options
	 */
	private static $autoloaded_options = array();

	/**
	 * The name of the cache group for plugin options
	 *
	 * @since    2.6.0
	 * @access   private
	 * @var      string $cache_group
	 */
	private static $cache_group;

	/**
	 * Initialize the class
	 *
	 * @since 2.5.8
	 * @return void
	 */
	public static function init() {
		global $wpdb;
		self::$table_name  = $wpdb->prefix . 'actirise_options';
		self::$cache_group = 'actirise_options';
		self::create_table( self::$table_name );
		self::load_autoloaded_options();
	}

	/**
	 * Create the custom options table
	 *
	 * @since 2.5.8
	 * @param string $table_name
	 * @return void
	 */
	private static function create_table( $table_name ) {
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE {$table_name} (
			option_id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			option_name VARCHAR(191) NOT NULL UNIQUE,
			option_value LONGTEXT NOT NULL,
			autoload TINYINT(1) NOT NULL DEFAULT 0,
			PRIMARY KEY (option_id),
			KEY autoload (autoload)
		) $charset_collate;";

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		maybe_create_table( $table_name, $sql );
	}

	/**
	 * Load autoloaded options into memory
	 *
	 * @since 2.5.8
	 * @return void
	 */
	private static function load_autoloaded_options() {
		if ( ! empty( self::$autoloaded_options ) ) {
			return;
		}

		/** @var array<mixed>|false $cached */
		$cached = wp_cache_get( 'autoloaded_options', self::$cache_group );
		if ( $cached !== false ) {
				self::$autoloaded_options = $cached;
				return;
		}

		global $wpdb;
		$table_name = self::$table_name;
		$results    = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT option_name, option_value FROM $table_name WHERE autoload = %d", // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
				1
			),
			ARRAY_A
		);

		foreach ( $results as $row ) {
			$value = maybe_unserialize( $row['option_value'] );
			if ( $value === '0' || $value === '1' ) {
				$value = (bool) $value;
			}
			self::$autoloaded_options[$row['option_name']] = $value;
		}

		wp_cache_set( 'autoloaded_options', self::$autoloaded_options, self::$cache_group );
	}

	/**
	 * Get an option from Actirise custom table
	 *
	 * @since 2.5.8
	 * @param string $option
	 * @param mixed  $default_value
	 * @return mixed
	 */
	public static function get( $option, $default_value = false ) {
		if ( isset( self::$autoloaded_options[$option] ) ) {
			return self::$autoloaded_options[$option];
		}

		$cached = wp_cache_get( $option, self::$cache_group );
		if ( $cached !== false ) {
			return $cached;
		}

		global $wpdb;
		$table_name = self::$table_name;
		$result     = $wpdb->get_var(
			$wpdb->prepare(
				"SELECT option_value FROM $table_name WHERE option_name = %s", // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
				$option
			)
		);

		if ( $result !== null ) {
			$value = maybe_unserialize( $result );
			if ( $value === '0' || $value === '1' ) {
				$value = (bool) $value;
			}
			wp_cache_set( $option, $value, self::$cache_group );
			return $value;
		}

		return $default_value;
	}

	/**
	 * Update/insert an option from Actirise custom table
	 *
	 * @since 2.5.8
	 * @param string $option
	 * @param mixed  $value
	 * @param bool   $autoload
	 * @return void
	 */
	public static function update( $option, $value, $autoload = true ) {
		global $wpdb;
		$table_name = self::$table_name;
		$autoload   = $autoload ? 1 : 0;

		// Convert boolean to integer
		if ( is_bool( $value ) ) {
			$serialized_value = $value ? '1' : '0';
		} elseif ( is_array( $value ) || is_object( $value ) || is_string( $value ) ) {
			$serialized_value = maybe_serialize( $value );
		} else {
			$serialized_value = $value;
		}

		if ( self::exists( $option ) ) {
			$wpdb->query(
				$wpdb->prepare(
					"UPDATE $table_name SET option_value = %s, autoload = %d WHERE option_name = %s", // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
					$serialized_value,
					$autoload,
					$option
				)
			);
		} else {
			$wpdb->query(
				$wpdb->prepare(
					"INSERT INTO $table_name (option_name, option_value, autoload) VALUES (%s, %s, %d)", // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
					$option,
					$serialized_value,
					$autoload
				)
			);
		}
		wp_cache_set( $option, $value, self::$cache_group );

		if ( $autoload === 1 ) {
			self::$autoloaded_options[$option] = $value;
			wp_cache_set( 'autoloaded_options', self::$autoloaded_options, self::$cache_group );
		} else {
			unset( self::$autoloaded_options[$option] );
			wp_cache_set( 'autoloaded_options', self::$autoloaded_options, self::$cache_group );
		}
	}

	/**
	 * Delete an option from Actirise custom table
	 *
	 * @since 2.5.8
	 * @param string $option
	 * @return void
	 */
	public static function delete( $option ) {
		global $wpdb;
		$table_name = self::$table_name;

		$wpdb->query(
			$wpdb->prepare(
				"DELETE FROM $table_name WHERE option_name = %s", // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
				$option
			)
		);

		wp_cache_delete( $option, self::$cache_group );

		unset( self::$autoloaded_options[$option] );
		wp_cache_set( 'autoloaded_options', self::$autoloaded_options, self::$cache_group );
	}

	/**
	 * Check if an Actirise option exists in database
	 *
	 * @since 2.5.8
	 * @param string $option
	 * @return bool
	 */
	public static function exists( $option ) {
		global $wpdb;
		$table_name = self::$table_name;

		$count = $wpdb->get_var(
			$wpdb->prepare(
				"SELECT COUNT(*) FROM $table_name WHERE option_name = %s", // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
				$option
			)
		);

		return $count > 0;
	}
}
