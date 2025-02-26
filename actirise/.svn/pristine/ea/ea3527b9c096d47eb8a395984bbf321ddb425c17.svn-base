<?php
namespace ActirisePublic\Includes;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

use Actirise\Includes\Api;
use Actirise\Includes\Cron;
use Actirise\Includes\Helpers;
use Actirise\Includes\Logger;
use Actirise\Includes\Options;

/**
 * Actirise Ads.txt management
 *
 * @link       https://actirise.com
 * @since      2.0.0
 * @package    actirise
 * @subpackage actirise/public/includes
 * @author     actirise <wordpress@actirise.com>
 */
final class AdsTxt {
	/**
	 * Ads.txt constructor.
	 *
	 * @since    2.0.0
	 */
	public function __construct() {
		if ( ACTIRISE_CRON !== 'true' ) {
			$this->check_adstxt_update();
		}
	}

	/**
	 * The loader of this plugin.
	 *
	 * @since    2.0.0
	 * @return void
	 */
	public function init() {
		if ( Options::get( 'adstxt-active', false ) !== false && Options::get( 'adstxt-active', false ) !== 'false' ) {
			$request = isset( $_SERVER['REQUEST_URI'] ) ? esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : false;

			if ( $request === '/ads.txt' && Options::get( 'adstxt-actirise' ) !== false && Options::get( 'adstxt-file' ) !== 'true' ) {
				$this->render_adstxt();
			}
		}
	}

	/**
	 * Generate abd render ads.txt
	 *
	 * @since    2.0.0
	 * @return void
	 */
	private function render_adstxt() {
		header( 'Content-Type: text/plain' );
		header( 'Actirise: true' );
		header( 'Cache-Control: no-cache, must-revalidate' );
		header( 'Expires: Thu, 29 Dec 1994 12:25:00 GMT' );
		header( 'Pragma: no-cache' );

		$adstxt = self::get_adstxt( true );

		header( 'ETag: W/"' . md5( $adstxt ) . '"' );

		echo esc_html( apply_filters( 'actirise_ads_txt_content', $adstxt ) );
		die();
	}

	/**
	 * Clean duplicate line
	 *
	 * @since    2.4.0
	 * @param string $adstxt
	 * @param string $lines
	 *
	 * @return string
	 */
	private static function clean_duplicate_line( $adstxt, &$lines ) {
		$lines = explode( "\n", $lines );
		$lines = array_unique( $lines );

		foreach ( $lines as $key => &$line ) {
			$exploded_line = explode( ',', $line );

			if ( count( $exploded_line ) > 0 ) {
				$exploded_line[0] = strtolower( $exploded_line[0] );
			}

			if ( count( $exploded_line ) >= 2 ) {
				$exploded_line[2] = strtoupper( $exploded_line[2] );
			}

			$line = implode( ',', $exploded_line );

			if ( $line !== '' ) {
				if ( false !== strpos( $adstxt, $line ) ) {
					unset( $lines[ $key ] );
				}
			}
		}

		$lines = implode( "\n", $lines );

		return $lines;
	}

		/**
		 * Get ads.txt formated
		 *
		 * @since    2.0.0
		 * @param bool $custom
		 * @return string
		 */
	public static function get_adstxt( $custom = false ) {
		/** @var string $adstxt_actirise */
		$adstxt_actirise = Options::get( 'adstxt-actirise', '' );

		preg_match( '/OWNERDOMAIN=(.*)\n/', $adstxt_actirise, $matches );
		$owner_domain = '';

		if ( isset( $matches[1] ) ) {
			$owner_domain = $matches[1];
		}

		/** @var string $adstxt_actirise */
		$adstxt_actirise = preg_replace( '/MANAGERDOMAIN=.*\n/', '', $adstxt_actirise );
		/** @var string $adstxt_actirise */
		$adstxt_actirise = preg_replace( '/OWNERDOMAIN=.*\n/', '', $adstxt_actirise );
		/** @var string $adstxt_actirise */
		$adstxt_actirise = preg_replace( '/## START actirise.com ##\n/', '', $adstxt_actirise );
		/** @var string $adstxt_actirise */
		$adstxt_actirise = preg_replace( '/## END actirise.com ##/', '', $adstxt_actirise );

		/** @var string $adstxt */
		$adstxt  = '#---------------------------- Monetized by Actirise WordPress Plugin ----------------------------';
		$adstxt .= "\n";
		$adstxt .= "\n";
		$adstxt .= 'contact=hello@actirise.com';
		$adstxt .= "\n";
		$adstxt .= "\n";

		if ( $owner_domain !== '' ) {
			$adstxt .= 'OWNERDOMAIN=' . $owner_domain;
		}

		$adstxt .= "\n";
		$adstxt .= 'MANAGERDOMAIN=flashb.id';
		$adstxt .= "\n";

		/** @var string $adstxt */
		$adstxt .= $adstxt_actirise;
		$adstxt .= '#--------------------------------------- End Actirise.com ---------------------------------------';

		if ( $custom ) {
			/** @var string $adstxt_custom */
			$adstxt_custom = Options::get( 'adstxt-custom' );
			/** @var array<\stdClass> $adstxt_custom_array */
			$adstxt_custom_array = array();

			if ( $adstxt_custom ) {
				/** @var array<\stdClass> $adstxt_custom_array */
				$adstxt_custom_array = json_decode( $adstxt_custom );
			}

			if ( count( $adstxt_custom_array ) > 0 ) {
				$adstxt .= "\n";

				foreach ( $adstxt_custom_array as $adstxt_item ) {
					$cleaned_line = self::clean_duplicate_line( $adstxt, $adstxt_item->value );

					if ( $cleaned_line !== '' ) {
						$adstxt .= "\n";
						$adstxt .= '## START ' . $adstxt_item->title . " ##\n";
						$adstxt .= $cleaned_line . "\n";
						$adstxt .= '## END ' . $adstxt_item->title . " ##\n";
					}
				}
			}
		}

		return $adstxt;
	}

	/**
	 * Get ads.txt from API
	 *
	 * @since    2.0.0
	 *
	 * @return bool|string
	 */
	public static function get_from_api() {
		$args = array(
			'domain' => rawurlencode( Helpers::get_server_details()['host'] ),
		);

		if ( Options::get( 'settings-uuid-type', 'boot' ) === 'universal' ) {
			$args['universal'] = 'true';
			$args['product']   = '3';
		}

		/** @var string $uuid */
		$uuid     = Options::get( 'settings-uuid' );
		$api_url  = 'adstxt_files/' . $uuid;
		$api      = new Api();
		$response = $api->get( 'api', $api_url, $args );

		if ( is_wp_error( $response ) ) {
			Logger::add_log( 'get_from_api error ' . $response->get_error_code(), 'public/include/adstxt', 'error' );
			return false;
		}

		if ( ! is_array( $response ) ) {
			Logger::add_log( 'get_from_api response is not array ', 'public/include/adstxt', 'error' );
			return false;
		}

		if ( ! isset( $response['datas'] ) ) {
			Logger::add_log( 'get_from_api response is empty ', 'public/include/adstxt', 'error' );
			return false;
		}

		$array_response = array( $response['datas'] );

		if ( count( $array_response ) !== 1 ) {
			Logger::add_log( 'get_from_api responselength is up to 1 ', 'public/include/adstxt', 'error' );
			return false;
		}

		if ( empty( $array_response[0] ) ) {
			Logger::add_log( 'get_from_api responselength[0] is not exist ', 'public/include/adstxt', 'error' );
			return false;
		}

		return $response['datas'];
	}

	/**
	 * Update ads.txt file
	 *
	 * @since    2.4.0
	 * @return void
	 */
	public static function update_file() {
		Logger::add_log( 'update_file start', 'public/include/adstxt', 'debug' );
		try {
			$wp_fs = Helpers::get_wp_fs();

			if ( is_wp_error( $wp_fs ) ) {
				Logger::add_log( 'update_file wp_fs error', 'public/include/adstxt', 'error' );

				Options::update( 'adstxt-file', false );

				return;
			}

			$path_ads_txt = ABSPATH . 'ads.txt';

			if ( $wp_fs->exists( $path_ads_txt ) && ! $wp_fs->is_writable( $path_ads_txt ) ) {
				Logger::add_log( 'update_file not writable', 'public/include/adstxt', 'error' );

				Options::update( 'adstxt-file', false );

				return;
			}

			if ( defined( 'FS_CHMOD_FILE' ) ) {
				$modes = FS_CHMOD_FILE;
			} else {
				$modes = false;
			}

			$success = $wp_fs->put_contents( $path_ads_txt, self::get_adstxt( true ), $modes );

			Logger::add_log( 'update_file success: ' . $success, 'public/include/adstxt', 'debug' );

			Options::update( 'adstxt-file', $success );
		} catch ( \Exception $e ) {
			Logger::add_log( 'update_file catch: ', 'public/include/adstxt', 'error' );

			Options::update( 'adstxt-file', false );
		}
	}

	/**
	 * Check if ads.txt need to be updated
	 *
	 * @since    2.0.0
	 * @return void
	 */
	private function check_adstxt_update() {
		$cron = new Cron();
		$cron->check_scheduled_task_with_transient(
			'update_adstxt',
			array(
				$cron,
				'update_adstxt',
			)
		);
	}
}
