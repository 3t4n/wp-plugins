<?php

namespace AGA\Admin;

/**
 * Class Settings
 * @package AGA\Admin
 */
class Settings extends Page {

	/**
	 * Construct the settings page with the options
	 */
	public function __construct() {
		$this->options = $this->get_options();
	}

	/**
	 * Render the Settings page
	 */
	public function render() {
		if ( ( $post_nonce = filter_input( INPUT_POST, 'aga_settings_nonce' ) ) && wp_verify_nonce( $post_nonce, 'aga_settings_nonce' ) ) {
			$new_settings = filter_input( INPUT_POST, 'aga_settings', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY );

			if ( isset( $new_settings['ua_code'] ) && $this->validate_ua_code( $new_settings['ua_code'] ) ) {
				$this->options['ua_code'] = $new_settings['ua_code'];
			}

			update_option( 'aga', $this->options );
			$this->render_view( 'backend/settings' );
			exit;
		} elseif ( ( $enable = filter_input( INPUT_GET, 'enable' ) ) && ! empty( $enable ) ) {
			$this->enable_feature( $enable );
		} elseif ( ( $disable = filter_input( INPUT_GET, 'disable' ) ) && ! empty( $disable ) ) {
			$this->disable_feature( $disable );
		}

		if ( ( $configure = filter_input( INPUT_GET, 'configure' ) ) && $configure === 'ua_code' ) {
			$this->render_view( 'backend/configure' );
		} else {
			$this->render_view( 'backend/settings' );
		}
	}

	/**
	 * Get options
	 *
	 * @return mixed
	 */
	private function get_options() {
		$options = get_option( 'aga', array() );

		if ( ! isset( $options['ua_code'] ) ) {
			$options['ua_code']      = '';
			$options['demographics'] = false;
			$options['anonymizeip']  = false;
			$options['forcessl']     = false;
			$options['autotrack']    = true;
		}

		return $options;
	}

	/**
	 * Validate an UA code
	 *
	 * @param $ua_code
	 *
	 * @return bool
	 */
	private function validate_ua_code( $ua_code ) {
		if ( preg_match( '/UA-[0-9]{6,10}-[0-9]{1,3}/i', $ua_code ) ) {
			return true;
		}

		return false;
	}

	/**
	 * Enable a feature
	 *
	 * @param $feature
	 */
	private function enable_feature( $feature ) {
		if ( $feature === 'demographics' ) {
			$this->options['demographics'] = true;
		} elseif ( $feature === 'anonymizeip' ) {
			$this->options['anonymizeip'] = true;
		} elseif ( $feature === 'forcessl' ) {
			$this->options['forcessl'] = true;
		} elseif ( $feature === 'autotrack' ) {
			$this->options['autotrack'] = true;
		}

		update_option( 'aga', $this->options );
	}

	/**
	 * Disable a feature
	 *
	 * @param $feature
	 */
	private function disable_feature( $feature ) {
		if ( $feature === 'demographics' ) {
			$this->options['demographics'] = false;
		} elseif ( $feature === 'anonymizeip' ) {
			$this->options['anonymizeip'] = false;
		} elseif ( $feature === 'forcessl' ) {
			$this->options['forcessl'] = false;
		} elseif ( $feature === 'autotrack' ) {
			$this->options['autotrack'] = false;
		}

		update_option( 'aga', $this->options );
	}

}