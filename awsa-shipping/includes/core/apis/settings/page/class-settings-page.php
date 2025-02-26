<?php


namespace AWSA_Core\APIs\Settings\Page;


use AWSA_Core\APIs\Settings;

class Settings_Page extends Base_Page {

	/**
	 * @var self
	 */
	protected static $instance;

	/**
	 * @param string $page_slug
	 *
	 * @since 1.0.0
	 * @return self
	 */
	public static function instance( string $page_slug = '' ): self {

		$p_slug = !is_null( self::$instance ) ? self::$instance->page_slug : null;
		if ( $page_slug !== $p_slug ) {

			self::$instance = new self( $page_slug );
		}

		return self::$instance;
	}

	/**
	 * Sanitize Fields value for Save
	 *
	 * @param array $values
	 *
	 * @since 1.0.0
	 * @return array
	 */
	public function sanitize_fields( array $values ): array {

		$fields = $this->get_fields_tab();

		$vfields = array();
		foreach ( $fields as $field_id => $field_atts ) {

			$name = $field_atts['name'] ?? null;
			if ( is_null( $name ) ) {

				continue;
			}
			$v = $values[ $name ] ?? '';

			$field_atts['value'] = $v;
			$v                   = Settings\Settings_API::sanitize_field( $field_atts );

			$option_group = $field_atts['option_group'] ?? $field_id;
			$option_key   = $field_atts['option_key'] ?? null;

			if ( is_a( $v, 'AWSA_Error' ) ) {

				$vfields['awsa_errors'][ $field_id ] = $v;
			}

			if ( !is_null( $option_key ) ) {

				$vfields[ $option_group ][ $option_key ] = $v;
			}
		}

		return $vfields;
	}

	/**
	 * Check has AWSA_Error in Values and Return Errors
	 *
	 * @param array $values
	 *
	 * @since 1.0.0
	 * @return false|array
	 */
	public function has_error( array $values ) {

		if ( !empty( $values['awsa_errors'] ) ) {

			$errors = $values['awsa_errors'];
		}

		return !empty( $errors ) ? $errors : false;
	}

	/**
	 * Update settings page in db
	 *
	 * @param $settings
	 *
	 * @since 1.0.0
	 */
	public function update_settings( $settings ): void {

		unset( $settings['awsa_errors'] );

		foreach ( $settings as $option_key => $options ) {

			Settings\Settings::instance()->update_settings_without_lost_others( $option_key, $options );
		}
	}

	/**
	 * Save settings page handler
	 *
	 * @since 1.0.0
	 */
	public function save_settings(): void {

		$active_tab = $_REQUEST['aw-tab'] ?? 'general';
		if ( empty( $this->page_slug ) ) {

			return;
		}

		if ( !isset( $_POST['awsa-save-settings'] ) ) {

			return;
		}

		if ( !isset( $_POST['_awsa_settings_page_nonce'] ) || !wp_verify_nonce( $_POST['_awsa_settings_page_nonce'], 'awsa_' . $this->page_slug . '_nf_' . $active_tab . date( 'd' ) ) ) {

			return;
		}

		$values = $this->sanitize_fields( $_POST );
		$errors = $this->has_error( $values );
		if ( !$errors ) {

			// save settings
			$this->update_settings( $values );
			do_action( 'awsa_update_settings_page-' . $this->page_slug );
		}

		wp_redirect( $_SERVER['HTTP_REFERER'] );
		exit();
	}

}