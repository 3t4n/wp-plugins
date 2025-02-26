<?php
// Standard WP check if direct
if ( ! function_exists( 'add_action' ) ) {
	exit();
}

// settings export file
function inspry_toolkit_process_settings_export() {
	global $toolkit_performance_options, $toolkit_security_options, $toolkit_email_notification_options, $toolkit_options;

	if ( isset( $_POST['agency_toolkit_export'] ) ) {
		$export_data = array();

		$toolkit_all_options = array_merge( $toolkit_options, $toolkit_security_options, $toolkit_performance_options, $toolkit_email_notification_options );

		// Option Sub Fields
		$sub_option_array = array(
			// General TAB
			'inspry_toolkit_limit_admins'                 => array(
				'inspry_toolkit_limit_admins_list',
			),
			'inspry_toolkit_maintenance_mode'             => array(
				'inspry_toolkit_maintenance_mode_heading',
				'inspry_toolkit_maintenance_mode_sentence',
			),
			'inspry_toolkit_backend_footer'               => array(
				'inspry_toolkit_backend_footer_agency_name',
				'inspry_toolkit_backend_footer_agency_url',
				'inspry_toolkit_backend_footer_agency_email',
			),
			'inspry_toolkit_backend_logo'                 => array(
				'inspry_toolkit_backend_logo_image',
			),
			'inspry_toolkit_manage_environment_indicator' => array(
				'inspry_toolkit_development_environment_user_list',
				'inspry_toolkit_development_environment_host_name',
				'inspry_toolkit_manage_development_environment_banner_color',
			),
			'inspry_toolkit_control_wp_core_updates'      => array(
				'inspry_toolkit_wp_core_updates_option',
			),

			// Security TAB
			'inspry_toolkit_disable_installs_and_updates' => array(
				'inspry_toolkit_disable_installs_and_updates_list',
			),
			'inspry_toolkit_remove_site_health'           => array(
				'inspry_toolkit_remove_site_health_user_list',
			),
			'inspry_toolkit_checksum_verification_for_wordpress_core_files' => array(
				'inspry_toolkit_checksum_verification_for_wordpress_core_files_email_send',
			),
			'inspry_toolkit_limit_users_modify_admin_email' => array(
				'inspry_toolkit_limit_users_modify_admin_email_user_list',
			),
			'inspry_toolkit_disable_admin_notice'         => array(
				'inspry_toolkit_disable_admin_notice_user_list',
			),

			// Performance TAB
			'inspry_toolkit_limit_post_revisions'         => array(
				'inspry_toolkit_limit_post_revisions_number',
			),

			// Email Notifications TAB
			'inspry_toolkit_change_email_sender'          => array(
				'inspry_toolkit_change_email_sender_address',
				'inspry_toolkit_change_email_sender_name',
			),
			'inspry_toolkit_change_user_notifications_email' => array(
				'inspry_toolkit_change_user_notifications_email_sender',
			),
			'inspry_toolkit_enable_plugin_update_admin_notifications' => array(
				'inspry_toolkit_enable_plugin_update_admin_notifications_list',
				'inspry_toolkit_enable_plugin_update_admin_notifications_plugin_list',
			),
		);

		// EXPORT: option value
		foreach ( $toolkit_all_options as $option ) {
			$option_name  = 'inspry_toolkit_' . $option['name'];
			$option_value = get_option( $option_name );

			if ( $option_value ) {
				$export_data[] = array(
					'option_name'  => $option_name,
					'option_value' => $option_value,
				);

				// Option Have sub field
				if ( array_key_exists( $option_name, $sub_option_array ) ) {

					$option_sub_field_name = $sub_option_array[ $option_name ];

					$sub_field_value = array();
					foreach ( $option_sub_field_name  as $sub_field_name ) {

						if (
							$sub_field_name == 'inspry_toolkit_limit_admins_list'
							|| $sub_field_name == 'inspry_toolkit_development_environment_user_list'
							|| $sub_field_name == 'inspry_toolkit_disable_installs_and_updates_list'
							|| $sub_field_name == 'inspry_toolkit_remove_site_health_user_list'
							|| $sub_field_name == 'inspry_toolkit_limit_users_modify_admin_email_user_list'
							|| $sub_field_name == 'inspry_toolkit_disable_admin_notice_user_list'
							|| $sub_field_name == 'inspry_toolkit_enable_plugin_update_admin_notifications_list'
						) {

							$user_info = array();

							$user_ids = get_option( $sub_field_name );

							if ( ! empty( $user_ids ) ) {
								foreach ( $user_ids as $user_id ) {
									$user_info = get_userdata( $user_id );

									if ( $user_info ) {
										$sub_field_value[] = $user_info->user_login;
									}
								}
							}
						} else {
							$sub_field_value = get_option( $sub_field_name );
						}

						$export_data[] = array(
							'option_name'  => $sub_field_name,
							'option_value' => $sub_field_value,
						);
					}
				}
			}
		}

		$json = json_encode( $export_data );
		header( 'Content-disposition: attachment; filename=agency-toolkit.json' );
		header( 'Content-type: application/json' );
		file_put_contents( 'php://output', $json );
		exit;
	}
}
add_action( 'init', 'inspry_toolkit_process_settings_export' );

// settings import file
function inspry_toolkit_import_options_settings() {

	// Make sure request is valid for the impprt and user requesting is an admin
	if ( isset( $_POST['agency_toolkit_import'] ) && current_user_can( 'administrator' ) ) {

		// Get the file and decode JSON
		$filename        = file_get_contents( $_FILES['import_file']['tmp_name'] );
		$option_settings = json_decode( $filename );

		// Loop through the options in the file
		foreach ( $option_settings as $option ) {

			// Check if option is an admin selectable option
			if (
				$option->option_name == 'inspry_toolkit_limit_admins_list'
				|| $option->option_name == 'inspry_toolkit_development_environment_user_list'
				|| $option->option_name == 'inspry_toolkit_disable_installs_and_updates_list'
				|| $option->option_name == 'inspry_toolkit_remove_site_health_user_list'
				|| $option->option_name == 'inspry_toolkit_limit_users_modify_admin_email_user_list'
				|| $option->option_name == 'inspry_toolkit_disable_admin_notice_user_list'
				|| $option->option_name == 'inspry_toolkit_enable_plugin_update_admin_notifications_list'
			) {

				$user_logins = $option->option_value;

				foreach ( $user_logins as $user_login ) {
					$user = get_user_by( 'login', $user_login );
					if ( ! empty( $user ) ) {
						$user_info = get_userdata( $user->ID );
						if ( in_array( 'administrator', $user_info->roles ) ) {
							$option->option_value[] = $user->ID;
						}
					}
				}
				if ( empty( $option->option_value ) ) {
					continue;
				}
			}

			// Get option name
			$option_name = $option->option_name;

			// Make sure option name has "inspry_toolkit_" prefix
			if ( strpos( $option_name, 'inspry_toolkit_' ) === 0 ) {
				// Update the option
				update_option( $option_name, $option->option_value );
			}
		}
	}
}
add_action( 'init', 'inspry_toolkit_import_options_settings' );
