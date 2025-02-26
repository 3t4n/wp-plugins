<?php

namespace APG\Core;

use \stdClass;

/**
 * Class Updater
 * @package APG\Core
 */
class Updater {

	/**
	 * NOTE: THIS UPDATE CLASS IS USED ONLY FOR OUR PREMIUM ADD-ONS. WE USE THE WORDPRESS.ORG FUNCTIONALITY TO UPDATE THE AWESOME PHOTO GALLERY ITSELF.
	 */

	/**
	 * @var
	 */
	private $licenses;

	/**
	 * @var
	 */
	private $extensions;

	/**
	 * @var
	 */
	private $update_url;

	/**
	 * @var
	 */
	private $license_api_url;

	/**
	 * @param array $licenses
	 * @param array $extensions
	 */
	public function __construct( $licenses, $extensions ) {
		$this->license_api_url = 'https://api.licensekeys.io/';
		$this->update_url      = 'https://codebrothers.eu/';
		$this->licenses        = $licenses;
		$this->extensions      = $extensions;
		$this->apg_updates     = get_option( 'apg_updates', array() );

		if ( is_admin() ) {
			add_filter( 'pre_set_site_transient_update_plugins', array( $this, 'apg_show_updates' ) );
			add_filter( 'plugins_api', array( $this, 'apg_check_info' ), 10, 3 );
			add_action( 'shutdown', array( $this, 'apg_check_updates' ) );
		}
		add_action( 'shutdown', array( $this, 'apg_check_updates' ) );
	}

	/**
	 * Check for updates by using the licenses
	 */
	public function apg_check_updates() {
		if ( isset( $this->apg_updates['last_check'] ) && ( time() - $this->apg_updates['last_check'] ) < 43200 ) {
			// Last check is less then 12 hours, skip update.
			return false;
		}

		if( is_array( $this->licenses ) ) {
			foreach ( $this->licenses as $addon => $license ) {
				if ( $license['status'] != 'active' ) {
					// License is inactive, skip this one.
					continue;
				}

				if ( isset( $this->extensions[ $addon ]['metadata']['version'] ) ) {
					$this->check_addon_update( $addon, $license['key'], $this->extensions[ $addon ]['metadata']['version'] );
				}
			}
		}

		$this->apg_updates['last_check'] = time();
		update_option( 'apg_updates', $this->apg_updates );

		return true;
	}

	/**
	 * Add the APG add-on update in the transient
	 *
	 * @param $transient
	 *
	 * @return mixed
	 */
	public function apg_show_updates( $transient ) {
		if ( empty( $transient->checked ) ) {
			return $transient;
		}

		if( is_array( $this->apg_updates['updates'] ) ) {
			foreach ( $this->apg_updates['updates'] as $addon => $update ) {
				if ( version_compare( $update['new_version'], $this->extensions[ $addon ]['metadata']['version'] ) >= 1 ) {
					$obj                                           = new stdClass();
					$obj->slug                                     = $update['plugin_slug'];
					$obj->new_version                              = $update['new_version'];
					$obj->url                                      = $update['download_url'];
					$obj->package                                  = $update['download_url'];
					$transient->response[ $update['plugin_slug'] ] = $obj;
				}
			}
		}

		return $transient;
	}

	/**
	 * Add our self-hosted description to the filter
	 *
	 * @param boolean $false
	 * @param array $action
	 * @param object $arg
	 *
	 * @return bool|object
	 */
	public function apg_check_info( $false, $action, $arg ) {
		if( is_array( $this->apg_updates['updates'] ) ) {
			foreach ( $this->apg_updates['updates'] as $addon => $update ) {
				if ( $arg->slug === $update['plugin_slug'] ) {
					$obj                = new stdClass();
					$obj->slug          = $update['plugin_slug'];
					$obj->name          = $this->extensions[ $addon ]['metadata']['name'];
					$obj->plugin_name   = $update['plugin_slug'];
					$obj->new_version   = $update['new_version'];
					$obj->requires      = '3.9';
					$obj->tested        = '4.4';
					$obj->last_updated  = $update['available'];
					$obj->sections      = array(
						'description' => '<p>There is a new version of <strong>' . esc_attr( $this->extensions[ $addon ]['metadata']['name'] ) . '</strong> available. Please update your add-on to get new features, bugfixes and security patches.</p><h2>Changelog</h2><p>You can view the changelog on the website of CodeBrothers. <a href="' . esc_attr( $this->extensions[ $addon ]['metadata']['plugin_url'] ) . '" target="_blank">View changelog &raquo;</a></p><h2>Premium support</h2><p>Thank you for buying a valid license key for Awesome Photo Gallery. If you have a question, please contact us by using the <a href="https://codebrothers.eu/support/" target="_blank">premium support &raquo;</a>.</p>',
					);
					$obj->download_link = $update['download_url'];

					return $obj;
				}
			}
		}

		return false;
	}

	/**
	 * Check in the API if we have a new version
	 *
	 * @param $addon
	 * @param $key
	 * @param $current_version
	 */
	private function check_addon_update( $addon, $key, $current_version ) {
		$response = wp_remote_post( $this->license_api_url . 'updates/meta', array(
			'timeout'     => 30,
			'redirection' => 5,
			'httpversion' => '1.0',
			'sslverify'   => true,
			'body'        => array(
				'product_group' => esc_attr( $addon ),
				'license'       => esc_attr( $key ),
				'domain'        => esc_attr( get_site_url() ),
			),
		) );

		$result = json_decode( $response['body'] );

		if ( isset( $result->license ) && $result->license === 'active' ) {
			if ( version_compare( $result->version, $current_version ) >= 1 ) {
				$this->apg_updates['updates'][ $addon ] = array(
					'update'           => true,
					'new_version'      => $result->version,
					'available'        => $result->update,
					'download_url'     => $result->download_url,
					'download_expires' => $result->download_expires,
					'plugin_slug'      => $this->extensions[ $addon ]['metadata']['plugin_slug'],
				);
			}
		}
	}

}