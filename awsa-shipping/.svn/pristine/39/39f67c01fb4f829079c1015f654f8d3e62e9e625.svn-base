<?php

namespace AWSA_Core\APIs\Settings;

class Settings {

	/**
	 * @var array
	 */
	protected $settings;

	/**
	 * @var self
	 */
	protected static $instance;

	/**
	 * @since 1.0.0
	 * @return self
	 */
	public static function instance(): self {

		if ( is_null( self::$instance ) ) {

			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Get options from database
	 *
	 * @param $settings_group
	 *
	 * @since 1.0.0
	 * @return false|array|string
	 */
	public function _get_settings( $settings_group ) {

		$this->settings[ $settings_group ] = get_option( $settings_group, array() );

		return $this->settings[ $settings_group ];
	}

	/**
	 * Get cached data for $settings_group or the setting
	 *
	 * @param string $settings_group
	 * @param string $setting_name
	 *
	 * @since 1.0.0
	 * @return mixed
	 */
	public function get_settings( string $settings_group, $setting_name = null ) {

		if ( empty( $this->settings[ $settings_group ] ) ) {

			$this->_get_settings( $settings_group );
		}

		if ( null === $setting_name ) {

			return $this->settings[ $settings_group ];
		}

		return $this->settings[ $settings_group ][ $setting_name ];
	}


	/**
	 * Update settings in database
	 *
	 * @param string             $settings_group
	 * @param false|string|array $new_settings
	 *
	 * @since 1.0.0
	 */
	public function update_settings( string $settings_group, $new_settings = false ): void {

		if ( !$new_settings ) {

			$new_settings = $this->settings[ $settings_group ];
		}

		update_option( $settings_group, $new_settings );

		$this->_get_settings( $settings_group );
	}

	/**
	 * Update settings in database
	 *
	 * @param string             $settings_group
	 * @param false|string|array $new_settings
	 *
	 * @since 1.0.0
	 */
	public function update_settings_without_lost_others( string $settings_group, $new_settings = false ): void {

		$new_settings = wp_parse_args(
			$new_settings,
			$this->get_settings( $settings_group )
		);

		update_option( $settings_group, $new_settings );

		$this->_get_settings( $settings_group );
	}

}