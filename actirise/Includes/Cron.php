<?php
namespace Actirise\Includes;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

use ActirisePublic\Includes\AdsTxt;
use ActirisePublic\Includes\PresizedDiv;
use Actirise\Includes\Options;
use Actirise\Includes\Helpers;
use Actirise\Includes\Logger;

/**
 * This class allows the management of cron jobs for the proper functioning of our plugin.
 *
 * @link       https://actirise.com
 * @since      2.0.0
 * @package    actirise
 * @subpackage actirise/includes
 * @author     actirise <wordpress@actirise.com>
 *
 * @phpstan-import-type PresizedDivSlot from PresizedDiv
 */
final class Cron {
	/**
	 * Schedule cron jobs
	 *
	 * @since    2.0.0
	 * @return void
	 */
	public function schedule() {
		if ( ACTIRISE_CRON === 'true' ) {
			if ( ! wp_next_scheduled( 'actirise_cron_update_adstxt' ) ) {
				wp_schedule_event( time(), 'hourly', 'actirise_cron_update_adstxt' );
				$this->update_adstxt();
			}

			if ( ! wp_next_scheduled( 'actirise_cron_update_presized_div' ) ) {
				wp_schedule_event( time(), 'hourly', 'actirise_cron_update_presized_div' );
				$this->check_presized_div();
			}

			if ( ! wp_next_scheduled( 'actirise_cron_update_fast_cmp' ) ) {
				wp_schedule_event( time(), 'hourly', 'actirise_cron_update_fast_cmp' );
				$this->get_fast_cmp();
			}
		}
	}

	/**
	 * Update ads.txt file
	 *
	 * @since    2.0.0
	 * @return void
	 */
	public function update_adstxt() {
		if ( Options::get( 'settings-uuid' ) ) {
			$ads_txt = AdsTxt::get_from_api();

			if ( $ads_txt !== false ) {
				Options::update( 'adstxt-actirise', $ads_txt );
				Options::update( 'adstxt-update', 'true' );

				if ( Options::get( 'adstxt-active', 'false' ) === 'true' ) {
					AdsTxt::update_file();
				}
			}

			if ( $ads_txt === false ) {
				Logger::add_log( 'adstxt get_from_api is false', 'include/cron', 'error' );
			}
		}
	}

	/**
	 * Check for presized div
	 *
	 * @since    2.0.0
	 * @return void
	 */
	public function check_presized_div() {
		if ( Options::get( 'settings-uuid' ) ) {
			/** @var array<PresizedDivSlot> | bool $presized_div */
			$presized_div = PresizedDiv::get_from_api();

			if ( $presized_div !== false ) {
				/** @var array<array{slotName: string, active: bool}> $presized_div_active */
				$presized_div_active = Options::get( 'presizeddiv-selected', array() );
				/** @var array<\stdclass> $presized_div_notif */
				$presized_div_notif = Options::get( 'presizeddiv-notif', array() );

				if ( ! is_array( $presized_div_active ) ) {
					$presized_div_active = array();
				}

				if ( ! is_array( $presized_div_notif ) ) {
					$presized_div_notif = array();
				}

				/** @var array<PresizedDivSlot> $presized_div */
				foreach ( $presized_div as $presized_div_item ) {
					/** @var string $slot_name */
					$slot_name = $presized_div_item['slotName'];
					if ( ! in_array( $slot_name, array_column( $presized_div_active, 'slotName' ), true ) ) {
						$presized_div_active[] = array(
							'slotName' => $slot_name,
							'active'   => false,
						);

						$presized_div_notif[] = $slot_name;
					}
				}

				/** @var array{slotName: string, active: bool} $presized_div_active_item */
				foreach ( $presized_div_active as $key => $presized_div_active_item ) {
					$slot_name = $presized_div_active_item['slotName'];
					if ( ! in_array( $slot_name, array_column( $presized_div, 'slotName' ), true ) ) {
						unset( $presized_div_active[ $key ] );
					}
				}

				Options::update( 'presizeddiv-selected', $presized_div_active );
				Options::update( 'presizeddiv-actirise', $presized_div );
				Options::update( 'presizeddiv-notif', $presized_div_notif );
			} else {
				Options::update( 'presizeddiv-actirise', array() );
			}
		}
	}

	/**
	 * Get FastCmp stub light
	 *
	 * @since    2.3.0
	 * @return void
	 */
	public function get_fast_cmp() {
		$this->get_fastcmp_stublight();
		$this->get_fastcmp_vendors();

		if ( Options::get( 'fastcmp-uuid', '' ) === '' ) {
			$this->get_fastcmp_uuid();
		}
	}

	/**
	 * Set auto update
	 *
	 * @since    2.4.0
	 * @param bool $enabled
	 * @return void
	 */
	public function set_auto_update( $enabled ) {
		if ( ACTIRISE_CRON !== 'true' ) {
			return;
		}

		if ( $enabled === Helpers::has_auto_update() ) {
			return;
		}

		/** @var string $plugin_file */
		$plugin_file = plugin_basename( ACTIRISE_FILE );
		/** @var array<string> $auto_updates */
		$auto_updates = get_site_option( 'auto_update_plugins', array() );

		if ( $enabled ) {
			$plugins = array_unique( array_merge( $auto_updates, array( plugin_basename( ACTIRISE_FILE ) ) ) );
		} else {
			$plugins = array_values( array_diff( $auto_updates, array( plugin_basename( ACTIRISE_FILE ) ) ) );
		}

		update_site_option( 'auto_update_plugins', $plugins );
	}

	/**
	 * Get FastCmp stub light
	 *
	 * @since    2.2.0
	 * @return void
	 */
	private function get_fastcmp_stublight() {
		$stub_light_url = 'https://static.fastcmp.com/fast-cmp-stub-light.js';

		$response = wp_remote_request(
			$stub_light_url,
			array(
				'method'    => 'GET',
				'timeout'   => 10,
  			'sslverify' => true,
			)
		);

		if ( is_wp_error( $response ) ) {
			Logger::add_log( 'get_fastcmp_stublight error ' . $response->get_error_code(), 'include/cron', 'error' );
			return;
		}

		/** @var string|boolean $stub_light */
		$stub_light = wp_remote_retrieve_body( $response );

		if ( $stub_light === false ) {
			return;
		}

		Options::update( 'fastcmp-stub-light', $stub_light );
	}

	/**
	 * Get FastCmp vendors
	 *
	 * @since    2.2.0
	 * @return void
	 */
	private function get_fastcmp_vendors() {
		$vendors_api_url = 'https://eu.fastcmp.com/wp/vendor-list';

		$response = wp_remote_request(
			$vendors_api_url,
			array(
				'method'    => 'GET',
				'timeout'   => 10,
  			'sslverify' => true,
			)
		);

		if ( is_wp_error( $response ) ) {
			return;
		}

		/** @var string|boolean $vendors */
		$vendors = wp_remote_retrieve_body( $response );

		if ( $vendors === false ) {
			return;
		}

		/** @var string $vendors */
		$vendors_json = json_decode( $vendors, true );

		if ( $vendors_json === null ) {
			return;
		}

		Options::update( 'fastcmp-vendors', $vendors_json );
	}

	/**
	 * Get FastCmp uuid
	 *
	 * @since    2.2.0
	 * @return void
	 */
	private function get_fastcmp_uuid() {
		$fast_cmp_url = 'https://eu.fastcmp.com/wp/domain-uid?domain=';

		$domain = rawurlencode( Helpers::get_server_details()['host'] );
		$domain = str_replace( 'www.', '', $domain );

		$response = wp_remote_request(
			$fast_cmp_url . $domain,
			array(
				'method'    => 'GET',
				'timeout'   => 10,
  			'sslverify' => true,
			)
		);

		if ( is_wp_error( $response ) ) {
			return;
		}

		/** @var string|boolean $uuid */
		$uuid = wp_remote_retrieve_body( $response );

		if ( $uuid === false ) {
			return;
		}

		/** @var string $uuid */
		$uuid_json = json_decode( $uuid, true );

		/** @var null|array{domain?: string, domainUid?: string, error?: string} $uuid_json */
		if ( $uuid_json === null ) {
			return;
		}

		/** @var array{domain?: string, domainUid?: string, error?: string} $uuid_json */
		if ( isset( $uuid_json['error'] ) || ! isset( $uuid_json['domainUid'] ) ) {
			return;
		}

		Options::update( 'fastcmp-uuid', $uuid_json['domainUid'] );
	}

	/**
	 * Check if a scheduled task needs to be executed based on a transient expiration time.
	 *
	 * @param string   $transient_name
	 * @param callable $callback
	 * @param int      $duration
	 *
	 * @return bool
	 */
	public function check_scheduled_task_with_transient( $transient_name, callable $callback, $duration = 3600 ) {
		if ( false === get_transient( $transient_name ) ) {
				set_transient( $transient_name, true, $duration );
				call_user_func( $callback );

				return true;
		}
		return false;
	}
}
