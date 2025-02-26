<?php

/*
 * Return the available social networks
 *
 */
function spab_get_social_networks( $only_slugs = false ) {

	$networks = array(
		'facebook' 		=> array(
				'name' 				=> 'Facebook',
				'admin_description'	=> __( 'Add your Facebook username or URL', 'social-pug-author-box' )
			),
		'twitter'  	 	=> array(
				'name'				=> 'Twitter',
				'admin_description'	=> __( 'Add your Twitter username or URL', 'social-pug-author-box' )
			),
		'google-plus'	=> array(
				'name'				=> 'Google+',
				'admin_description'	=> __( 'Add your Google+ username or URL', 'social-pug-author-box' )
			),
		'pinterest'		=> array(
				'name'				=> 'Pinterest',
				'admin_description'	=> __( 'Add your Pinterest username or URL', 'social-pug-author-box' )
			),
		'linkedin'		=> array(
				'name'				=> 'LinkedIn',
				'admin_description'	=> __( 'Add your LinkedIn username or URL', 'social-pug-author-box' )
			),
		'vkontakte'		=> array(
				'name'				=> 'VK',
				'admin_description'	=> __( 'Add your VK username or URL', 'social-pug-author-box' )
			),
		'instagram'		=> array(
				'name'				=> 'Instagram',
				'admin_description'	=> __( 'Add your Instagram username or URL', 'social-pug-author-box' )
			),
		'youtube'		=> array(
				'name'				=> 'YouTube',
				'admin_description'	=> __( 'Add your YouTube username or URL', 'social-pug-author-box' )
			),
		'vimeo'			=> array(
				'name'				=> 'Vimeo',
				'admin_description'	=> __( 'Add your Vimeo username or URL', 'social-pug-author-box' )
			),
		'soundcloud'	=> array(
				'name'				=> 'SoundCloud',
				'admin_description'	=> __( 'Add your SoundCloud username or URL', 'social-pug-author-box' )
			),
		'twitch'		=> array(
				'name'				=> 'Twitch',
				'admin_description'	=> __( 'Add your Twitch username or URL', 'social-pug-author-box' )
			),
		'behance'		=> array(
				'name'				=> 'Behance',
				'admin_description'	=> __( 'Add your Behance username or URL', 'social-pug-author-box' )
			),
		'website'		=> array(
				'name'				=> 'Website',
				'admin_description'	=> __( 'Add your website\'s URL', 'social-pug-author-box' )
			)
	);

	if( $only_slugs )
		$networks = array_keys( $networks );

	return $networks;

}


/*
 * Function that displays the HTML for a settings field
 *
 */
function spab_settings_field( $type, $name, $saved_value = '', $label = '', $options = array(), $tooltip = '' ) {

	$settings_field_slug = ( !empty($label) ? strtolower(str_replace(' ', '-', $label)) : '' );

	echo '<div class="spab-setting-field-wrapper spab-setting-field-' . $type . ( count( $options ) == 1 ? ' spab-single' : ( count( $options ) > 1 ? ' spab-multiple' : '' ) ) . ' ' . ( !empty($label) ? 'spab-setting-field-' . $settings_field_slug : '' ) . '">';

	switch( $type ) {

		// Display input type text
		case 'text':

			echo !empty( $label ) ? '<label for="' . $name . '" class="spab-setting-field-label">' . $label . '</label>' : '';

			echo '<input type="text" ' . ( isset( $label ) ? 'id="' . $name . '"' : '' ) . ' name="' . $name . '" value="' . esc_attr( $saved_value ) . '" />';
			break;

		// Display textareas
		case 'textarea':
			echo !empty( $label ) ? '<label for="' . $name . '" class="spab-setting-field-label">' . $label . '</label>' : '';

			echo '<textarea ' . ( isset( $label ) ? 'id="' . $name . '"' : '' ) . ' name="' . $name . '">' . $saved_value . '</textarea>';

			break;

		// Display input type radio
		case 'radio':

			echo !empty( $label ) ? '<label class="spab-setting-field-label">' . $label . '</label>' : '';
			
			if( !empty( $options ) ) {
				foreach( $options as $option_value => $option_name ) {
					echo '<input type="radio" id="' . $name . '[' . $option_value . ']' . '" name="' . $name . '" value="' . $option_value . '" ' . checked( $option_value, $saved_value, false ) . ' />';
					echo '<label for="' . $name . '[' . $option_value . ']' . '" class="spab-settings-field-radio">' . ( isset( $option_name ) ? $option_name : $option_value ) . '<span></span></label>';
				}
			}
			break;

		// Display input type checkbox
		case 'checkbox':
		
			// If no options are passed make the main label as the label for the checkbox
			if( count( $options ) == 1 ) {

				if( is_array( $saved_value ) )
					$saved_value = $saved_value[0];

				echo '<input type="checkbox" ' . ( isset( $label ) ? 'id="' . $name . '"' : '' ) . ' name="' . $name . '" value="' . esc_attr( $options[0] ) . '" ' . checked( $options[0], $saved_value, false ) . ' />';
				echo !empty( $label ) ? '<label for="' . $name . '" class="spab-setting-field-label">' . $label . '<span></span></label>' : '';

			// Else display checkboxes just like radios
			} else {

				echo !empty( $label ) ? '<label class="spab-setting-field-label">' . $label . '</label>' : '';

				if( !empty( $options ) ) {
					foreach( $options as $option_value => $option_name ) {
						echo '<input type="checkbox" id="' . $name . '[' . $option_value . ']' . '" name="' . $name . '" value="' . $option_value . '" ' . ( in_array( $option_value, $saved_value ) ? 'checked' : '' ) . ' />';
						echo '<label for="' . $name . '[' . $option_value . ']' . '" class="spab-settings-field-checkbox">' . ( isset( $option_name ) ? $option_name : $option_value ) . '<span></span></label>';
					}
				}

			}
			break;

		case 'select':

			echo !empty( $label ) ? '<label for="' . $name . '" class="spab-setting-field-label">' . $label . '</label>' : '';
			echo '<select id="' . $name . '" name="' . $name . '">';

				foreach( $options as $option_value => $option_name ) {
					echo '<option value="' . $option_value . '" ' . selected( $saved_value, $option_value, false ) . '>' . $option_name . '</option>';
				}

			echo '</select>';

			break;

	} // end of switch

	if( !empty( $tooltip ) ) {

		spab_output_backend_tooltip( $tooltip );

	}

	do_action( 'spab_inner_after_settings_field', $settings_field_slug, $type, $name );

	echo '</div>';

}


/*
 * Outputs the HTML of the tooltip
 *
 * @param string tooltip - the text of the tooltip
 * @param bool $return 	 - wether to return or to output the HTML
 *
 */
function spab_output_backend_tooltip( $tooltip = '', $return = false ) {

	$output = '<div class="spab-setting-field-tooltip-wrapper ' . ( ( strpos( $tooltip,  '</a>' ) !== false ) ? 'spab-has-link' : '' ) . '">';
		$output .= '<span class="spab-setting-field-tooltip-icon"></span>';
		$output .= '<div class="spab-setting-field-tooltip spab-transition">' . $tooltip . '</div>';
	$output .= '</div>';

	if( $return )
		return $output;
	else
		echo $output;

}


/*
 * Add admin notice on plugin activation
 *
 */
function spab_admin_notice_first_activation() {

	// Get first activation of the plugin
	$first_activation = get_option( 'spab_first_activation', '' );

	if( empty($first_activation) )
		return;

	// Do not display this notice if user cannot activate plugins
	if( !current_user_can( 'activate_plugins' ) )
		return;

	// Do not display this notice if plugin has been activated for more than 3 minutes
	if( time() - 10 * MINUTE_IN_SECONDS >= $first_activation )
		return;

	// Do not display this notice for users that have dismissed it
	if( get_user_meta( get_current_user_id(), 'spab_admin_notice_first_activation', true ) != '' )
		return;

	// Echo the admin notice
	echo '<div class="spab-admin-notice spab-admin-notice-activation notice">';

    	echo '<h4>' . __( 'Thank you for installing Social Pug Author Box.', 'social-pug-author-box' ) . '</h4>';

    	echo '<a class="spab-admin-notice-link" href="' . add_query_arg( array( 'spab_admin_notice_activation' => 1 ), admin_url('options-general.php?page=social_pug_author_box') ) . '"><span class="dashicons dashicons-admin-settings"></span>' . __( 'Go to the Plugin', 'social-pug-author-box' ) . '</a>';
    	echo '<a class="spab-admin-notice-link" href="http://docs.devpups.com/social-pug/author-box/?utm_source=plugin&utm_medium=plugin-activation&utm_campaign=social-pug-author-box" target="_blank"><span class="dashicons dashicons-book"></span>' . __( 'View Documentation', 'social-pug-author-box' ) . '</a>';

    	echo '<a href="' . add_query_arg( array( 'spab_admin_notice_activation' => 1 ) ) . '" type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></a>';

    echo '</div>';

}
add_action( 'admin_notices', 'spab_admin_notice_first_activation' );


/*
 * Handle admin notices dismissals
 *
 */
function spab_admin_notice_dismiss() {

	if( isset( $_GET['spab_admin_notice_activation'] ) )
		add_user_meta( get_current_user_id(), 'spab_admin_notice_first_activation', 1, true );

}
add_action( 'admin_init', 'spab_admin_notice_dismiss' );