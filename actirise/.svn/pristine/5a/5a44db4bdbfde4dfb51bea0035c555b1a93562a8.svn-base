<?php
namespace ActiriseAdmin\Includes;

use Actirise\Includes\Cron;
use Actirise\Includes\Options;
use ActirisePublic\Includes\AdsTxt;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * The admin-specific functionality of the plugin.
 *
 * This class executes the migrations of the plugin.
 *
 * @link       https://actirise.com
 * @since      2.4.0
 * @package    actirise
 * @subpackage actirise/admin/includes
 * @author     actirise <wordpress@actirise.com>
 */
final class Migrations {
	/**
	 * The ID of this plugin.
	 *
	 * @since    2.4.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    2.4.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * The migrations of the plugin.
	 *
	 * @since    2.4.0
	 * @access   private
	 * @var      array<string, array<int, string>>    $migrations    The migrations of the plugin.
	 */
	private $migrations = array(
		'2.4.0' => array(
			'actirise_migrate_240',
		),
		'2.5.1' => array(
			'actirise_migrate_251',
		),
		'2.5.3' => array(
			'actirise_migrate_253',
		),
		'2.5.5' => array(
			'actirise_migrate_255',
		),
		'2.5.6' => array(
			'actirise_migrate_256',
		),
		'2.6.0' => array(
			'actirise_migrate_260',
		),
		'2.6.3' => array(
			'actirise_migrate_263',
		),
		'2.6.5' => array(
			'actirise_migrate_265',
		),
	);

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    2.4.0
	 * @param    string $plugin_name          The name of this plugin.
	 * @param    string $version              The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Run the migrations of the plugin.
	 *
	 * @since    2.4.0
	 * @return void
	 */
	public function migrate() {
		/** @var array<string> $migration */
		$migration = Options::get( 'migrations', array() );
		$updated   = false;

		foreach ( $this->migrations as $version => $methods ) {
			if ( ! isset( $migration[ $version ] ) ) {
				foreach ( $methods as $method ) {
					$this->$method();
				}

				$migration[ $version ] = true;
				$updated               = true;
			}
		}

		if ( $updated === true ) {
			Options::update( 'migrations', $migration );
		}
	}

	/**
	 * Migrate to version 2.4.0
	 *
	 * @since    2.4.0
	 * @return void
	 */
	private function actirise_migrate_240() {
		if ( Options::get( 'adstxt-active', 'false' ) !== 'true' || Options::get( 'adstxt-actirise', '' ) === '' ) {
			return;
		}

		$path_ads_txt = ABSPATH . 'ads.txt';

		if ( file_exists( $path_ads_txt ) ) {
			return;
		}

		AdsTxt::update_file();
	}

	/**
	 * Migrate to version 2.5.1
	 *
	 * @since    2.5.1
	 * @return void
	 */
	private function actirise_migrate_251() {
		$old_logs = get_option( $this->plugin_name . '_logs', false );

		if ( $old_logs !== false ) {
			Options::update( 'logs', $old_logs );
			delete_option( $this->plugin_name . '_logs' );
		}
	}

	/**
	 * Migrate to version 2.5.3
	 *
	 * @since    2.5.3
	 * @return void
	 */
	private function actirise_migrate_253() {
		delete_option( 'actirise-api_version' );
		delete_option( 'actirise-api-lastupdate' );

		wp_clear_scheduled_hook( 'actirise_cron_get_api_version' );
	}

	/**
	 * Migrate to version 2.5.5
	 *
	 * @since 2.5.5
	 * @return void
	 */
	private function actirise_migrate_255() {
		delete_option( 'actirise-debug-last-update' );
		wp_clear_scheduled_hook( 'actirise_cron_update_debug_token' );
	}

	/**
	 * Migrate to version 2.5.6
	 *
	 * @since 2.5.6
	 * @return void
	 */
	private function actirise_migrate_256() {
		$cron = new Cron();
		$cron->update_adstxt();
	}

	/**
	 * Migrate to version 2.6.0
	 *
	 * @since 2.6.0
	 * @return void
	 */
	private function actirise_migrate_260() {
		$prefix = 'actirise-';

		delete_option( $prefix . 'adstxt-lastupdate' );
		delete_option( $prefix . 'presizeddiv-lastupdate' );
		delete_option( $prefix . 'fastcmp-lastupdate' );
		delete_option( $prefix . 'init-plugin' );

		global $wpdb;
		$table_name = $wpdb->prefix . 'actirise_options';

		$options = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT option_name, option_value, autoload FROM $wpdb->options WHERE option_name LIKE %s",
				$prefix . '%'
			),
			ARRAY_A
		);

		if ( empty( $options ) ) {
				return;
		}

		foreach ( $options as $option ) {
			$option_name  = substr( $option['option_name'], strlen( $prefix ) );
			$option_value = $option['option_value'];
			$autoload     = 1;

			if ( Options::exists( $option_name ) ) {
				$wpdb->query(
					$wpdb->prepare(
						"UPDATE $table_name SET option_value = %s, autoload = %d WHERE option_name = %s", // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
						$option_value,
						$autoload,
						$option_name
					)
				);
			} else {
				$wpdb->query(
					$wpdb->prepare(
						"INSERT INTO $table_name (option_name, option_value, autoload) VALUES (%s, %s, %d)", // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
						$option_name,
						$option_value,
						$autoload
					)
				);
			}
		}

		if ( ! Options::exists( 'debug-enabled' ) ) {
			Options::update( 'debug-enabled', true );
		}

		$wpdb->query(
			$wpdb->prepare(
				"DELETE FROM $wpdb->options WHERE option_name LIKE %s",
				$prefix . '%'
			)
		);
	}

	/**
	 * Migrate to version 2.6.3
	 *
	 * @since 2.6.3
	 * @return void
	 */
	private function actirise_migrate_263() {
		if ( ! Options::exists( 'custom1' ) ) {
			Options::update( 'custom1', 'author_ID' );
		}
		if ( ! Options::exists( 'custom2' ) ) {
			Options::update( 'custom2', 'category_0_slug' );
		}
		if ( ! Options::exists( 'custom3' ) ) {
			Options::update( 'custom3', 'post_ID' );
		}
		if ( ! Options::exists( 'custom4' ) ) {
			Options::update( 'custom4', '' );
		}
		if ( ! Options::exists( 'custom5' ) ) {
			Options::update( 'custom5', '' );
		}
	}

	/**
	 * Migrate to version 2.6.5
	 *
	 * @since 2.6.5
	 * @return void
	 */
	private function actirise_migrate_265() {
		Options::update( 'cta-cache-200', false );
	}
}
