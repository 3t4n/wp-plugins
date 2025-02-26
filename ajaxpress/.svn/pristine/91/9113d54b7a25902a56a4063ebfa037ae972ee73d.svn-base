<?php
/**
 * AjaxPress Settings
 *
 * @package AjaxPress
 * @since 1.3.0
 */
namespace AjaxPress;

/**
 * Assets
 */
class Settings extends Base {

	/**
	 * Actions
	 */
	public function actions() {
		add_action( 'admin_menu', [ $this, 'admin_menu' ] );

		add_action( 'wp_ajax_ajaxpress_save_settings', [ $this, 'save_settings' ] );

		// Action links.
		add_filter( 'plugin_action_links_' . plugin_basename( AJAXPRESS_FILE ), [ $this, 'plugin_action_links' ] );
	}

	/**
	 * Add admin menu
	 */
	public function admin_menu() {
		add_options_page(
			__('AjaxPress Settings', 'ajaxpress'),
			__('AjaxPress', 'ajaxpress'),
			'manage_options',
			'ajaxpress',
			[ $this, 'settings_page' ]
		);
	}

	/**
	 * Settings page
	 */
	public function settings_page() {
		include_once AJAXPRESS_PATH . 'templates/settings.php';
	}

	/**
	 * Save settings
	 */
	public function save_settings() {
		// Check nonce.
		check_ajax_referer( 'ajaxpress_admin', 'nonce' );

		// Check permissions.
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error( __( 'You do not have permission to do that.', 'ajaxpress' ) );
		}

		$keys    = App::get_instance()->get_options();
		$updated = [];

		foreach ( $keys as $key => $default_value ) {
			if ( isset( $_POST[ $key ] ) ) {
				$value           = sanitize_text_field( wp_unslash( $_POST[ $key ] ) );
				$updated[ $key ] = $value;

				$option_key = 'ajaxpress_' . $key;
				update_option( $option_key, $value );
			}
		}

		wp_send_json_success( $updated );
	}

	/**
	 * Plugin action links
	 *
	 * @param array $links Plugin action links.
	 * @return array
	 */
	public function plugin_action_links( $links ) {
		// Unshihft link.
		array_unshift(
			$links,
			sprintf(
				'<a href="%s">%s</a>',
				admin_url( 'options-general.php?page=ajaxpress' ),
				__( 'Settings', 'ajaxpress' )
			)
		);

		return $links;
	}
}

Settings::init();
