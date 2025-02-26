<?php

	add_filter('bbp_admin_get_settings_sections', 'bbpress_autodelete_add_setting_section');
	function bbpress_autodelete_add_setting_section ($sections) 
	{
		$sections['bbp_settings_autodelete_spam'] = array(
					'title'    => __( 'Auto-delete Spam', 'bbpress' ),
					'callback' => 'bbp_admin_setting_autodelete_spam_header',
					'page'     => 'discussion'
				);
				
		//print_r($sections);
		return $sections;
	}

	function bbp_admin_setting_autodelete_spam_header()
	{
		?>
		<p><?php esc_html_e( 'Define auto-delete settings.', 'bbpress' ); ?></p>
		
		<?php
	}
	
	add_filter( 'bbp_admin_get_settings_fields', 'bbp_admin_setting_autodelete_spam_settings');		
	function bbp_admin_setting_autodelete_spam_settings($settings)
	{
		$settings['bbp_settings_autodelete_spam'] = array(

			// Edit lock setting
			'_bbp_delete_spam_hours_old' => array(
				'title'             => __( 'Auto delete spam replies older than x hours. ', 'bbpress' ),
				'callback'          => 'bbp_admin_setting_autodelete_spam_setting',
				'sanitize_callback' => 'intval',
				'args'              => array()
			)
		);
		//print_r($settings);
		return $settings;
	}
	
	function bbp_admin_setting_autodelete_spam_setting() {
	?>

		<input name="_bbp_delete_spam_hours_old" id="_bbp_delete_spam_hours_old" type="number" min="12" step="1" value="<?php bbp_form_option( '_bbp_delete_spam_hours_old', '.5' ); ?>" class="small-text"<?php bbp_maybe_admin_setting_disabled( '_bbp_delete_spam_hours_old' ); ?> />
		<label for="_bbp_delete_spam_hours_old"><?php esc_html_e( 'hours', 'bbpress' ); ?></label>

	<?php
	}

	add_filter('bbp_map_settings_meta_caps', 'bbp_admin_setting_add_permissions_autodelete' , 10, 4);
	function bbp_admin_setting_add_permissions_autodelete ( $caps, $cap, $user_id, $args )
	{
		if ($cap=='bbp_settings_autodelete_spam')
			$caps = array( bbpress()->admin->minimum_capability );
		
		return $caps;
	}
?>