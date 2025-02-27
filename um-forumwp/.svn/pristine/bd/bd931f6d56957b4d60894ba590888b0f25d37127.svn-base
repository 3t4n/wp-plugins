<?php
namespace um_ext\um_forumwp\core;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Account
 *
 * @package um_ext\um_forumwp\core
 */
class Account {

	/**
	 * Account constructor.
	 */
	public function __construct() {
		add_filter( 'um_account_notifications_tab_enabled', '__return_true' );
		add_filter( 'um_account_page_default_tabs_hook', array( &$this, 'account_notification_tab' ) );
		add_filter( 'um_account_content_hook_notifications', array( &$this, 'account_tab' ), 49, 2 );

		add_action( 'um_post_account_update', array( &$this, 'account_update' ) );
	}

	/**
	 * Add Notifications tab to account page
	 *
	 * @param array $tabs
	 * @return array
	 */
	public function account_notification_tab( $tabs ) {
		if ( defined( 'UM_DEV_MODE' ) && UM_DEV_MODE && UM()->options()->get( 'enable_new_ui' ) ) {
			return $tabs;
		}

		if ( empty( $tabs[400]['notifications'] ) ) {
			$tabs[400]['notifications'] = array(
				'icon'         => 'um-faicon-envelope',
				'title'        => __( 'Notifications', 'um-forumwp' ),
				'submit_title' => __( 'Update Notifications', 'um-forumwp' ),
			);
		}

		return $tabs;
	}

	public function account_tab( $output, $shortcode_args ) {
		if ( defined( 'UM_DEV_MODE' ) && UM_DEV_MODE && UM()->options()->get( 'enable_new_ui' ) ) {
			return $output;
		}

		$globally_enabled_emails = FMWP()->common()->mail()->get_public_emails();

		$email_fields = '';
		foreach ( $globally_enabled_emails as $email_key => $email_data ) {
			$field_key = '_enable_' . $email_key;
			if ( isset( $shortcode_args[ $field_key ] ) && empty( $shortcode_args[ $field_key ] ) ) {
				continue;
			}

			UM()->account()->add_displayed_field( $field_key, 'notifications' );

			$meta_key = 'enabled_' . $email_key . '_notification';
			$enabled  = (bool) get_user_meta( get_current_user_id(), 'fmwp_' . $meta_key, true );

			$t_args        = compact( 'field_key', 'enabled', 'email_key', 'email_data' );
			$email_fields .= UM()->get_template( 'account-notification.php', um_forumwp_plugin, $t_args );
		}

		if ( ! empty( $email_fields ) ) {
			$t_args  = compact( 'email_fields' );
			$output .= UM()->get_template( 'account-notifications.php', um_forumwp_plugin, $t_args );
		}

		return $output;
	}

	/**
	 * Update Account action
	 */
	public function account_update() {
		/**
		 * issue helpscout#31301
		 */
		$current_tab = isset( $_POST['_um_account_tab'] ) ? sanitize_key( $_POST['_um_account_tab'] ) : null;
		if ( 'notifications' !== $current_tab ) {
			return;
		}

		$user_id = get_current_user_id();

		$globally_enabled_emails = FMWP()->common()->mail()->get_public_emails();
		foreach ( $globally_enabled_emails as $email_key => $email_data ) {
			$field_key = '_enable_' . $email_key;

			$meta_key = 'enabled_' . $email_key . '_notification';

			if ( ! empty( $_POST[ $field_key ] ) ) {
				update_user_meta( $user_id, 'fmwp_' . $meta_key, true );
			} else {
				update_user_meta( $user_id, 'fmwp_' . $meta_key, false );
			}
		}
	}
}
