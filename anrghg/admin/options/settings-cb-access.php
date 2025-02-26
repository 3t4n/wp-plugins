<?php
/**
 * Options page 2: Settings callback functions part 1.
 *
 * @package WordPress
 * @subpackage A.N.R.GHG Publishing Toolkit
 * Copyright 2021–2023 ANRGHG
 * This file is part of A.N.R.GHG Publishing Toolkit.
 * A.N.R.GHG Publishing Toolkit is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * (at your option) any later version.
 * A.N.R.GHG Publishing Toolkit is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with A.N.R.GHG Publishing Toolkit.  If not, see <https://www.gnu.org/licenses/>.
 * @see COPYING.txt
 */

defined( 'ABSPATH' ) || exit( nl2br( "\r\n\r\n&nbsp; &nbsp; &nbsp; Sorry, this PHP file cannot be displayed in the browser." ) );

// phpcs:disable Squiz.Commenting.FunctionComment.SpacingAfterParamType
// phpcs:disable Squiz.Commenting.FunctionComment.ParamCommentFullStop

/**
 * Callback functions of settings sections and fields.
 *
 * @since 0.30.1 Identity scheme for radio buttons and checkboxes more consistent:
 * - Hidden checkboxes with `_false` suffix, not `_0`.
 * - Topmost radio buttons with `_0` suffix, not ID === name, also to prevent
 *   accidental linking of the left label, if `label_for` is not deactivated.
 * - All numeric ID suffixes start with an underscore.
 * Void is a valid return type and should be mentioned.
 * @link https://www.php.net/manual/en/migration71.new-features.php
 * @link https://stackoverflow.com/questions/29792827/void-as-return-type
 * @link https://stackoverflow.com/questions/2061550/phpdoc-return-void-necessary
 * @since 1.8.1 Split `admin/options/settings.php` into 8 files for maintainability.
 */

/**
 * Security section callback function.
 *
 * @since 0.27.2
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_security_cb( $p_a_params ) {
	anrghg_settings_section_link( $p_a_params );
	anrghg_introduction(
		'',
		__( 'Security is improved by not sending authentication cookies except when a certain constant is defined as true in a mini-plugin editable on the hosting platform.', 'anrghg' ),
		__( 'The lifespan of the cookie may then optionally be increased.', 'anrghg' )
	);
	anrghg_introduction(
		'important',
		__( 'This security feature is efficient only on websites hosted on a dedicated server, a Virtual Private Server (VPS), or shared hosting with VPS level security set up by the hosting provider.', 'anrghg' ),
		__( 'Unless the hosting provider has set up VPS level security, shared hosting can be hacked by web shell from any website in the same home directory.', 'anrghg' )
	);
	anrghg_introduction(
		'',
		sprintf(
			// Translators: %s: Author or website.
			__( 'This feature is based on code from %s', 'anrghg' ),
			'<a'
			. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
			. ' href="https://gist.github.com/daggerhart/d19821ff8ce836a5fc68" target="_blank">'
			. 'Jonathan Daggerhart'
			. '</a>'
		)
	);
	global $g_s_login_control_constant;
	$l_s_output = '<p class="description" tabindex="0">';
	// Translators: 1: Boolean false; 2: Boolean true.
	$l_s_output .= sprintf( __( 'The first step is to define a constant in a mini-plugin as %1$s. Logging in is possible while it is set to %2$s.', 'anrghg' ), '<code>false</code>', '<code>true</code>' );
	$l_s_output .= '<br /><code>// Turn login off by replacing true with false:</code><br /><code>define( \'<span id="const_demo">' . $g_s_login_control_constant . '</span>\', true );</code></p>';
	$l_s_output .= anrghg_return_information(
		anrghg_paragraph(
			'description',
			// Translators: %s: template-mini-plugin.php.---This information is optionally collapsible or hidden.
			sprintf( __( 'Best is to use the included mini-plugin template %s', 'anrghg' ), '<code>template-mini-plugin.php</code>' )
		),
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'This should be done by FTP or in the Hosting Platform’s file manager, to be sure the constant is editable outside WordPress.', 'anrghg' )
		),
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'The constant is configurable so that in multisite networks, login can be toggled individually on a per-site basis.', 'anrghg' )
		),
		anrghg_paragraph(
			'important description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'Another option is to access the Admin area through the Hosting Platform (➔ WordPress or Software).', 'anrghg' )
		)
	);
	echo wp_kses( $l_s_output, anrghg_get_ui_whitelist() );
}

/**
 * Login control constant field callback function.
 *
 * @since 0.45.0
 * @since 0.55.0 Debug display value of the login control constant end input field
 * for input by copy-paste, autocomplete, or with turned-off JavaScript support.
 * @since 0.60.0 `anrghg_input_setting()` is not used here, because adding support
 * for editing the value and for the onkeyup action for use in a single instance
 * would be pointless.
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_login_control_constant_end_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		'<label><code class="surround">ANRGHG_WP_LOGIN_</code><input type="text" class="medium close-up-start" id="' . $p_a_params['key_0'] . '" name="anrghg[' . $p_a_params['key_0'] . ']" value="' . preg_replace( '/[^A-Z_]/', '', strtoupper( $p_a_params['val_0'] ) ) . '" placeholder="ACTIVE" onkeyup="this.value = this.value.replace(/[^A-Z_]/g, \'\'); document.getElementById(\'const_demo\').innerHTML = \'ANRGHG_WP_LOGIN_\' + this.value;" /></label>',
		$p_a_params['ok']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'This input field should contain no other characters than uppercase letters A–Z and eventually underscore, that PHP constant names are limited to.', 'anrghg' )
		)
	);
	echo wp_kses( '<noscript>', $p_a_params['ok'] );
	echo wp_kses(
		anrghg_paragraph(
			'important description',
			// Translators: This information is displayed only when JavaScript is turned off.
			__( 'Please do not use any other characters. Those would be either converted to uppercase or removed at setting up the constant.', 'anrghg' )
		),
		$p_a_params['ok']
	);
	echo wp_kses( '</noscript>', $p_a_params['ok'] );
}

/**
 * Login page profile field callback function.
 *
 * @since 0.27.2
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_login_deactivation_profile_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'top important description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'Other than low profile would pose a security threat due to the state being detectable.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'Please avoid High and Standard profiles unless logging in on the Hosting Platform exclusively.', 'anrghg' )
		)
	);
	echo wp_kses(
		anrghg_fieldset(
			'',
			'',
			$p_a_params,
			anrghg_discrete_radio_button(
				0,
				'-1',
				array( __( 'Low profile', 'anrghg' ), __( 'Only the authentication cookie sending is blocked; login attempts are ineffective', 'anrghg' ) ),
				$p_a_params
			),
			anrghg_discrete_radio_button(
				1,
				'0',
				array( __( 'Standard profile', 'anrghg' ), __( 'The login dialog is blanked out, without the screen elaborating upon it', 'anrghg' ) ),
				$p_a_params,
				0,
				'warn'
			),
			anrghg_discrete_radio_button(
				2,
				'1',
				array( __( 'High profile', 'anrghg' ), __( 'The login dialog is replaced with a red-banded message', 'anrghg' ) ),
				$p_a_params,
				0,
				'warn'
			)
		),
		$p_a_params['ok']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			sprintf(
				// Translators: 1: `anrghg_deactivated_login_message`; 2: `anrghg_deactivated_login_screen`; 3: the file `template-filter-output.php` linked to its location in the plugin repository.---This information is optionally collapsible or hidden.
				__( 'The high-profile option may be further configured by filtering the hooks %1$s and %2$s documented in %3$s.', 'anrghg' ),
				'<code>anrghg_deactivated_login_message</code>',
				'<code>anrghg_deactivated_login_screen</code>',
				'<code><a'
				. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
				. ' href="https://plugins.svn.wordpress.org/anrghg/trunk/template-filter-output.php" target="_blank" charset="UTF-8">template-filter-output.php</a></code>'
			)
		)
	);
}

/**
 * Edit auth cookie lifespan field callback function.
 *
 * @since 0.27.2
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_auth_duration_edit_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'top description',
			sprintf(
				// Translators: %s: Author or website.
				__( 'This feature is based on code from %s', 'anrghg' ),
				'<a'
				. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
				. ' href="http://wpcodesnippet.com/keep-users-logged-in-longer-wordpress/" target="_blank">'
				. 'Jenson Felsberg'
				. '</a>'
			)
		)
	);
	anrghg_echo_glide_switch(
		__( 'Activate authentication cookie expiration editing', 'anrghg' ),
		__( 'Cookie validity is as defined below.', 'anrghg' ),
		__( 'Default validities apply.', 'anrghg' ),
		$p_a_params
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: %s: a checked checkbox labeled ‘Remember me’.---This information is optionally collapsible or hidden.
			sprintf( __( 'Normally, authentication cookies expire after 14 days if “%s” is checked, after 2 days if not.', 'anrghg' ), '☑ ' . __( 'Remember me' ) )
		)
	);
}

/**
 * Lifespan duration in days field callback function.
 *
 * @since 0.27.2
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_auth_expiration_days_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'top description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'This input maxes at one year plus a week.', 'anrghg' )
		)
	);
	echo wp_kses(
		anrghg_input_setting(
			array(
				1,
				373,
				1,
				'small',
			),
			'',
			'',
			__( 'days', 'anrghg' ),
			'',
			$p_a_params
		),
		$p_a_params['ok']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'This feature helps coordinate collaborators by scheduling login rushes.', 'anrghg' ),
			// Translators: %s: an unchecked checkbox labeled ‘Remember me’.---This information is optionally collapsible or hidden.
			sprintf( __( 'Applies also if “%s” is not checked.', 'anrghg' ), '<span style="font-style: normal;">☐ </span>' . __( 'Remember me' ) )
		)
	);
}

/**
 * Backup section callback function.
 *
 * @since 0.46.0 Rather than as a part of General options.
 * Everything must be fairly prominent or it is like hidden:
 * “Thanks a lot, that was a very well-hidden setup option!”
 * @reporter** @fondanalys
 * @link https://wordpress.org/support/topic/error-in-required-structured-data-element-48/#post-14729350
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_backup_cb( $p_a_params ) {
	anrghg_settings_section_link( $p_a_params );
	anrghg_introduction(
		'',
		__( 'The templates and the settings are backed up in a new, date-stamped file in the Uploads folder both at accessing and saving.', 'anrghg' ),
		__( 'In the following settings, creating a new file may be deactivated.', 'anrghg' )
	);
}

/**
 * Back up templates field callback function.
 *
 * @since 0.24.7
 * @since 0.24.8 Checkbox-based vertical glide switch.
 * @since 0.24.10 Display templates backup file.
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_keep_reusables_history_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Do keep a backup when opening or saving the template editor', 'anrghg' ),
		sprintf(
			// Translators: %s: ‘is stored’ or ‘is lost’.
			__( 'The backup history %s.', 'anrghg' ),
			// .
			_x( 'is stored', 'backup history', 'anrghg' )
		),
		sprintf(
			// Translators: %s: ‘is stored’ or ‘is lost’.
			__( 'The backup history %s.', 'anrghg' ),
			// .
			_x( 'is lost', 'backup history', 'anrghg' )
		),
		$p_a_params
	);

	/**
	 * Display of Templates backup.
	 *
	 * @since 1.4.6 Fix uploads directory for multisite installations.
	 * @link https://stackoverflow.com/questions/35781410/wordpress-multisite-wp-upload-dir-wrong
	 * @link https://stackoverflow.com/a/70847759
	 * @link https://developer.wordpress.org/reference/functions/switch_to_blog/
	 * @since 1.12.0 Fix tab navigation disturbance.
	 */
	global $g_a_anrghg_config, $g_a_anrghg_reuse;
	$l_a_upload_infos = wp_upload_dir();
	if ( is_multisite() ) {
		switch_to_blog( get_current_blog_id() );
		$l_a_upload_infos = wp_upload_dir();
		restore_current_blog();
	}
	$l_s_json_dt = wp_json_encode(
		$g_a_anrghg_reuse,
		JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
	);
	$l_s_introd  = sprintf(
		// Translators: %s: Templates, or Settings.
		__( 'Your %s data is stored in the DB and backed up in JSON like in the frame displayable below.', 'anrghg' ),
		// .
		__( 'Templates' )
	);
	$l_s_uppath  = $l_a_upload_infos['basedir'];
	$l_s_output  = '<div id="full_reusables_history">' . $l_s_introd . C_S_ANRGHG_SPACE;
	$l_s_scope   = __( 'Full revision history:', 'anrghg' );
	$l_s_stamp   = '-[date-time]';
	$l_s_output .= $l_s_scope . C_S_ANRGHG_SPACE;
	$l_s_output .= $l_s_uppath . "/anrghg/templates/anrghg-templates$l_s_stamp.json.</div>";
	$l_s_scope   = __( 'Last revision:', 'anrghg' );
	$l_s_stamp   = '-latest';
	$l_s_output .= '<div id="no_reusables_history">' . $l_s_introd . C_S_ANRGHG_SPACE;
	$l_s_output .= $l_s_scope . C_S_ANRGHG_SPACE;
	$l_s_output .= $l_s_uppath . "/anrghg/templates/anrghg-templates$l_s_stamp.json.</div>";
	$l_s_output .= '<p class="description">';
	$l_s_output .= __( 'To expand the preview, please click the bar.', 'anrghg' ) . C_S_ANRGHG_SPACE;
	$l_s_output .= __( 'Clicking the expanded preview selects all.', 'anrghg' ) . C_S_ANRGHG_SPACE;
	$l_s_output .= sprintf(
		// Translators: 1: link start tag to the export page; 2: link end tag.
		__( 'For custom select, please use the previews on the %1$s Export page%2$s.', 'anrghg' ),
		'<a'
		. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
		. ' href="' . admin_url( anrghg_cur_slug( 'export' ) ) . '">',
		'</a>'
	) . C_S_ANRGHG_SPACE;
	$l_s_output .= '</p>';
	$l_s_output .= '<input type="checkbox" id="templates_json_toggle" class="display-toggle"'
	. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
	. ' />';
	$l_s_output .= '<div class="preview">';
	$l_s_output .= '<label for="templates_json_toggle"><div class="preview-toggle">';
	$l_s_output .= __( 'Preview' ) . '</div></label>';
	$l_s_output .= '<div class="json"'
	. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
	. '>' . esc_attr( $l_s_json_dt ) . "</div></div>\r\n";
	echo wp_kses( $l_s_output, $p_a_params['user'] );
}

/**
 * Back up settings field callback function.
 *
 * @since 0.24.7
 * @since 0.24.8 Checkbox-based vertical glide switch; move display here.
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_keep_settings_history_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Do keep a backup when opening or saving this page', 'anrghg' ),
		__( 'The backup history is stored.', 'anrghg' ),
		__( 'The backup history is lost.', 'anrghg' ),
		$p_a_params
	);

	/**
	 * Settings backup and display.
	 *
	 * @since 0.9.0 Using `fopen()` and `fwrite()`.
	 * As this is done behind the scenes without user involvement,
	 * use of PHP file functions avoids logging into an FTP client
	 * but brings the need to add PHPCS whitelisting instructions.
	 * The usual safe wrappers `wp_fopen()` and `wp_fwrite()` seem
	 * to not exist.
	 * @since 1.4.6 Fix uploads directory for multisite installations.
	 * @link https://stackoverflow.com/questions/35781410/wordpress-multisite-wp-upload-dir-wrong
	 * @link https://stackoverflow.com/a/70847759
	 * @link https://developer.wordpress.org/reference/functions/switch_to_blog/
	 * @since 1.12.0 Fix tab navigation disturbancy.
	 */
	global $g_a_anrghg_config;
	$l_a_upload_infos = wp_upload_dir();
	if ( is_multisite() ) {
		switch_to_blog( get_current_blog_id() );
		$l_a_upload_infos = wp_upload_dir();
		restore_current_blog();
	}
	$l_s_json_dt = wp_json_encode(
		$g_a_anrghg_config,
		JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
	);
	if ( ! is_dir( $l_a_upload_infos['basedir'] . '/anrghg' ) ) {
		mkdir( $l_a_upload_infos['basedir'] . '/anrghg' );
	}
	if ( ! is_dir( $l_a_upload_infos['basedir'] . '/anrghg/settings' ) ) {
		mkdir( $l_a_upload_infos['basedir'] . '/anrghg/settings' );
	}
	// phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_read_fopen
	$l_o_jsonfile = fopen( $l_a_upload_infos['basedir'] . '/anrghg/settings/anrghg-settings-latest.json', 'w' );
	// phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_read_fwrite
	fwrite( $l_o_jsonfile, $l_s_json_dt );
	if ( $g_a_anrghg_config['anrghg_keep_settings_history'] ) {
		$l_s_datetime = current_time( 'Y-m-d\TH:i:sO' );
		// phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_read_fopen
		$l_o_jsonfile = fopen( $l_a_upload_infos['basedir'] . "/anrghg/settings/anrghg-settings-$l_s_datetime.json", 'w' );
		// phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_read_fwrite
		fwrite( $l_o_jsonfile, $l_s_json_dt );
	}
	$l_s_introd = sprintf(
		// Translators: %s: Templates, or Settings.
		__( 'Your %s data is stored in the DB and backed up in JSON like in the frame displayable below.', 'anrghg' ),
		// .
		__( 'Settings' )
	);
	$l_s_uppath  = $l_a_upload_infos['basedir'];
	$l_s_output  = '<div id="full_settings_history">' . $l_s_introd . C_S_ANRGHG_SPACE;
	$l_s_scope   = __( 'Full revision history:', 'anrghg' );
	$l_s_stamp   = '-[date-time]';
	$l_s_output .= $l_s_scope . C_S_ANRGHG_SPACE;
	$l_s_output .= $l_s_uppath . "/anrghg/settings/anrghg-settings$l_s_stamp.json.</div>";
	$l_s_scope   = __( 'Last revision:', 'anrghg' );
	$l_s_stamp   = '-latest';
	$l_s_output .= '<div id="no_settings_history">' . $l_s_introd . C_S_ANRGHG_SPACE;
	$l_s_output .= $l_s_scope . C_S_ANRGHG_SPACE;
	$l_s_output .= $l_s_uppath . "/anrghg/settings/anrghg-settings$l_s_stamp.json.</div>";
	$l_s_output .= '<p class="description">';
	$l_s_output .= __( 'To expand the preview, please click the bar.', 'anrghg' ) . C_S_ANRGHG_SPACE;
	$l_s_output .= __( 'Clicking the expanded preview selects all.', 'anrghg' ) . C_S_ANRGHG_SPACE;
	$l_s_output .= sprintf(
		// Translators: 1: link start tag to the export page; 2: link end tag.
		__( 'For custom select, please use the previews on the %1$s Export page%2$s.', 'anrghg' ),
		'<a'
		. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
		. ' href="' . admin_url( anrghg_cur_slug( 'export' ) ) . '">',
		'</a>'
	) . '</p><p class="description">';
	$l_s_output .= sprintf(
		// Translators: %s: the actual file path of wp-content/uploads/anrghg/templates/ or settings/ respectively.
		__( 'To restore a previous state, please access the folder ‘%s’ and select the desired backup file based on the datestamp in its name.', 'anrghg' ),
		$l_s_uppath . '/anrghg/settings/'
	) . C_S_ANRGHG_SPACE;
	$l_s_output .= sprintf(
		// Translators: 1: link start tag to the import page; 2: link end tag.
		__( '%1$s Importing%2$s a file overwrites and synchronizes the database row with the imported values.', 'anrghg' ),
		'<a'
		. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
		. ' href="' . admin_url( anrghg_cur_slug( 'import' ) ) . '">',
		'</a>'
	);
	$l_s_output .= '</p>';
	$l_s_output .= '<input type="checkbox" id="settings_json_toggle" class="display-toggle"'
	. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
	. ' />';
	$l_s_output .= '<div class="preview">';
	$l_s_output .= '<label for="settings_json_toggle"><div class="preview-toggle">';
	$l_s_output .= __( 'Preview' ) . '</div></label>';
	$l_s_output .= '<div class="json"'
	. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
	. '>' . esc_attr( $l_s_json_dt ) . "</div></div>\r\n";
	echo wp_kses( $l_s_output, $p_a_params['user'] );
}

/**
 * User interface section callback function.
 *
 * @since 0.46.0 Rather than as a part of former General options.
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_user_interface_cb( $p_a_params ) {
	anrghg_settings_section_link( $p_a_params );
}

/**
 * Post Meta box field callback function.
 *
 * @since 0.30.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_meta_box_active_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Add a Post Meta box in the editor side pane', 'anrghg' ),
		sprintf(
			// Translators: %s: the Post Meta box label ‘A.N.R.GHG’.
			__( 'The ‘%s’ Post Meta box displays in the editor.', 'anrghg' ),
			$p_a_params['name']
		),
		__( 'No Post Meta box is added.', 'anrghg' ),
		$p_a_params
	);
	echo wp_kses(
		anrghg_fieldset(
			__( 'The settings checked below are displayed inside.', 'anrghg' ),
			'description',
			$p_a_params,
			anrghg_checkbox_list(
				array(
					array( __( '‘Published first’ information', 'anrghg' ), __( 'Saves both the prefills and the field contents.', 'anrghg' ) ),
					__( 'Thank You message', 'anrghg' ),
					__( 'Table of contents' ) . C_S_ANRGHG_DASH . __( 'Insertion', 'anrghg' ),
					__( 'Table of contents' ) . C_S_ANRGHG_DASH . __( 'Alignment' ),
					__( 'Table of contents' ) . C_S_ANRGHG_DASH . __( 'Label' ),
					__( 'Table of contents' ) . C_S_ANRGHG_DASH . __( 'Collapsing', 'anrghg' ),
					__( 'Notes and sources', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Deactivation', 'anrghg' ),
					__( 'Notes and sources', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Lists', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Anchor tooltips', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Text direction', 'anrghg' ),
					array(
						__( 'Notes and sources', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Delimiters', 'anrghg' ),
						__( 'Prefills the delimiters as configured when adding the post, and saves the field contents.', 'anrghg' ),
					),
					__( 'Notes and sources', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Lists', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Label' ),
					__( 'Notes and sources', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Lists', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Collapsing', 'anrghg' ),
					__( 'Notes and sources', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Lists', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Footer deferral', 'anrghg' ),
				),
				true,
				$p_a_params,
				1,
				false
			)
		),
		$p_a_params['ok']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			sprintf(
				// Translators: %s: the Meta box label, ‘A.N.R.GHG’.---This information is optionally collapsible or hidden.
				__( 'The ‘%s’ Post Meta box is added with low priority.', 'anrghg' ),
				$p_a_params['name']
			),
			// Translators: This information is optionally collapsible or hidden.
			__( 'To move it from the inspector to the bottom of the editor, click the up arrow next to the label.', 'anrghg' )
		)
	);
}

/**
 * Gutenberg blocks field callback function.
 *
 * @since 0.34.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_thank_you_block_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'top description',
			sprintf(
				// Translators: 1: ‘Text’; 2: ‘Design’; 3: ‘Embeds’.---This information is optionally collapsible or hidden.
				__( 'The following blocks are available in the %1$s, %2$s or %3$s categories.', 'anrghg' ),
				// .
				__( 'Text' ),
				__( 'Design' ),
				__( 'Embeds' )
			)
		)
	);
	echo wp_kses(
		anrghg_checkbox_list(
			array(
				array(
					__( 'Thank You message', 'anrghg' ),
					__( 'helps place and configure one or more message boxes', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Text' ),
				),
				array(
					// Translators: This string is not used if syncing with WordPress Core is active.
					anrghg_i18n( __( 'Table of contents' ), __( 'Table of contents', 'anrghg' ) ),
					sprintf(
						// Translators: %s: ‘Table of contents’.
						__( 'helps position and configure a %s', 'anrghg' ),
						// Translators: This string is not used if syncing with WordPress Core is active.
						anrghg_i18n( __( 'Table of contents' ), __( 'Table of contents', 'anrghg' ) )
					) . C_S_ANRGHG_DASH . __( 'Design' ),
				),
				array(
					__( 'Notes and sources', 'anrghg' ),
					sprintf(
						// Translators: %s: ‘Notes and sources’.
						__( 'helps configure ‘%s’ lists where a section ends', 'anrghg' ),
						// .
						__( 'Notes and sources', 'anrghg' )
					) . C_S_ANRGHG_DASH . __( 'Design' ),
				),
				array(
					__( 'Reference list', 'anrghg' ),
					sprintf(
						// Translators: %s: ‘Reference list’.
						__( 'helps place and configure a standalone ‘%s’', 'anrghg' ),
						// .
						__( 'Reference list', 'anrghg' )
					) . C_S_ANRGHG_DASH . __( 'Text' ),
				),
				array(
					__( 'Include partial', 'anrghg' ),
					__( 'for locally stored HTML partials', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Embeds' ),
				),
			),
			true,
			$p_a_params
		),
		$p_a_params['ok']
	);
	echo wp_kses(
		anrghg_fieldset(
			__( 'Block settings elements', 'anrghg' ),
			'',
			$p_a_params,
			anrghg_adjacent_radio_buttons(
				array( '2', '1', '0' ),
				array(
					array(
						__( 'Verbose', 'anrghg' ),
						__( 'Most settings are right in the block; only a few are in the Block Inspector.', 'anrghg' ),
					),
					array(
						__( 'Intermediate', 'anrghg' ),
						__( 'Blocks are limited to text input. All radio buttons are in the Inspector.', 'anrghg' ),
					),
					array(
						__( 'Minimal', 'anrghg' ),
						__( 'Limits the blocks to the main input field. All other UI elements are in the Inspector.', 'anrghg' ),
					),
				),
				$p_a_params,
				5,
				-1,
				false
			)
		),
		$p_a_params['ok']
	);
}

/**
 * Template editor field callback function.
 *
 * @since 0.70.0
 * @since 1.8.0 Move Line break on Enter here.
 * @since 1.8.0 Complete.
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_template_editor_tinymce_active_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Edit templates in TinyMCE', 'anrghg' ), // Label.
		__( 'TinyMCE is active.', 'anrghg' ), // On.
		__( 'A plain textarea replaces TinyMCE.', 'anrghg' ), // Off.
		$p_a_params
	);
	anrghg_echo_glide_switch(
		__( 'Switch the effect of the Enter key', 'anrghg' ),
		sprintf(
			// Translators: 1, 2: Line break, Paragraph break, or conversely.
			__( '%1$s on Enter, %2$s on Shift + Enter.', 'anrghg' ),
			// .
			__( 'Line break', 'anrghg' ),
			__( 'Paragraph break', 'anrghg' )
		),
		sprintf(
			// Translators: 1, 2: Line break, Paragraph break, or conversely.
			__( '%1$s on Enter, %2$s on Shift + Enter.', 'anrghg' ),
			// .
			__( 'Paragraph break', 'anrghg' ),
			__( 'Line break', 'anrghg' )
		),
		$p_a_params,
		1
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'In anchor tooltips, paragraph breaks and double line breaks are replaced with a paragraph break emulator.', 'anrghg' )
		)
	);
	anrghg_echo_glide_switch(
		__( 'Rich text list view', 'anrghg' ), // Label.
		__( 'Templates display in HTML.', 'anrghg' ), // On.
		__( 'Templates display in plain text.', 'anrghg' ), // Off.
		$p_a_params,
		2
	);
	anrghg_echo_glide_switch(
		sprintf(
			// Translators: %s: ‘Text’, Name for the Text editor tab (formerly HTML).
			__( 'Support %s mode for moving into editor', 'anrghg' ), // Label.
			_x( 'Text', 'Name for the Text editor tab (formerly HTML)' )
		),
		sprintf(
			// Translators: %s: ‘Text’, Name for the Text editor tab (formerly HTML).
			__( 'Templates can be moved into editor in %s mode too.', 'anrghg' ), // On.
			_x( 'Text', 'Name for the Text editor tab (formerly HTML)' )
		),
		sprintf(
			// Translators: %s: ‘Visual’, Name for the Visual editor tab.
			__( 'Moving templates into editor requires %s mode.', 'anrghg' ), // Off.
			_x( 'Visual', 'Name for the Visual editor tab' )
		),
		$p_a_params,
		3
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			sprintf(
				// Translators: 1: Text; 2: Move into editor.
				__( 'Please do not switch to ‘%1$s’ mode before clicking the ‘%2$s’ button.', 'anrghg' ),
				_x( 'Text', 'Name for the Text editor tab (formerly HTML)' ),
				__( 'Move into editor', 'anrghg' )
			)
		)
	);
	anrghg_echo_glide_switch(
		__( 'Unescape pointy brackets', 'anrghg' ), // Label.
		sprintf(
			// Translators: 1: &lt; 2: &gt; 3: < 4: >.
			__( 'Any %1$s and %2$s are replaced with %3$s and %4$s.', 'anrghg' ), // On.
			'&amp;lt;',
			'&amp;gt;',
			'&lt;',
			'&gt;'
		),
		sprintf(
			// Translators: 1: < 2: > 3: &lt; 4: &gt;.
			__( 'In visual mode, %1$s and %2$s are replaced with %3$s and %4$s.', 'anrghg' ), // Off.
			'&lt;',
			'&gt;',
			'&amp;lt;',
			'&amp;gt;'
		),
		$p_a_params,
		4
	);
}

/**
 * Menu_level field callback function.
 *
 * @since 0.9.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_menu_level_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_fieldset(
			'',
			'',
			$p_a_params,
			anrghg_discrete_radio_button(
				0,
				'none',
				array(
					__( 'No menu items added', 'anrghg' ),
					sprintf(
						// Translators: %s: the WordPress ‘Plugins’ page title.
						__( 'Access is from this plugin’s list entry on the ‘%s’ page only.', 'anrghg' ),
						__( 'Plugins' )
					),
				),
				$p_a_params,
				0,
				'no'
			),
			anrghg_discrete_radio_button(
				1,
				'sub',
				__( 'Add the following submenu items.', 'anrghg' ),
				$p_a_params
			),
			anrghg_checkbox_list(
				array(
					array(
						sprintf(
							// Translators: 1: first part of submenu item label; 2: ‘A.N.R.GHG’; 3: top level menu item label.
							__( '‘%1$s %2$s’ under ‘%3$s’', 'anrghg' ),
							// Label.
							__( 'Templates' ),
							$p_a_params['name'],
							__( 'Tools' )
						),
						__( 'Reusable complements for use as note, source, reference, message.', 'anrghg' ),
					),
					array(
						sprintf(
							// Translators: 1: first part of submenu item label; 2: ‘A.N.R.GHG’; 3: top level menu item label.
							__( '‘%1$s %2$s’ under ‘%3$s’', 'anrghg' ),
							__( 'Settings' ),
							$p_a_params['name'],
							__( 'Settings' )
						),
						__( 'This page.', 'anrghg' ),
					),
					array(
						sprintf(
							// Translators: 1: first part of submenu item label; 2: ‘A.N.R.GHG’; 3: top level menu item label.
							__( '‘%1$s %2$s’ under ‘%3$s’', 'anrghg' ),
							// Label.
							__( 'Conversion', 'anrghg' ),
							$p_a_params['name'],
							__( 'Tools' )
						),
						__( 'A tool to convert endnote formats is projected but is currently still in draft stage.', 'anrghg' ),
					),
					sprintf(
							// Translators: 1: first part of submenu item label; 2: ‘A.N.R.GHG’; 3: first part of other submenu label; 4: top level menu item label.
						__( '‘%1$s %2$s’ and ‘%3$s %2$s’ under ‘%4$s’', 'anrghg' ),
						__( 'Export' ),
						$p_a_params['name'],
						__( 'Import' ),
						__( 'Tools' )
					),
				),
				true,
				$p_a_params,
				1,
				false
			),
			anrghg_discrete_radio_button(
				2,
				'top',
				array(
					__( 'Add an item to the Admin main menu', 'anrghg' ),
					sprintf(
						// Translators: %s: ‘A.N.R.GHG’.
						__( 'Its label is ‘%s’.', 'anrghg' ),
						$p_a_params['name']
					) . C_S_ANRGHG_SPACE . sprintf(
						// Translators: 1: Templates; 2: Settings.
						__( 'Its submenu contains at least %1$s and %2$s.', 'anrghg' ),
						__( 'Templates' ),
						__( 'Settings' )
					),
				),
				$p_a_params
			)
		),
		$p_a_params['ok']
	);
}

/**
 * Menu_position field callback function.
 *
 * @since 0.9.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_menu_position_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'top description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'This setting is effective only in the Admin main menu, where it matters most.', 'anrghg' )
		)
	);
	echo wp_kses(
		anrghg_adjacent_radio_buttons(
			array( 'top', 'mid', 'low' ),
			array(
				array(
					sprintf(
						// Translators: %s: the WordPress ‘Comments’ main menu label.
						__( 'Beneath ‘%s’', 'anrghg' ),
						__( 'Comments' )
					),
					__( 'WordPress default position for plugins.', 'anrghg' ),
				),
				sprintf(
					// Translators: %s: the WordPress ‘Settings’ main menu label.
					__( 'Below ‘%s’', 'anrghg' ),
					__( 'Settings' )
				),
				array(
					__( 'Lowest Zone', 'anrghg' ),
					__( 'May be the same as above.', 'anrghg' ),
				),
			),
			$p_a_params
		),
		$p_a_params['ok']
	);
}

/**
 * Settings information field callback function.
 *
 * @since 0.63.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_settings_display_information_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_adjacent_radio_buttons(
			array( '2', '1', '0' ),
			array(
				array(
					__( 'Verbose', 'anrghg' ),
					__( 'All available information is displayed by default.', 'anrghg' ),
				),
				array(
					__( 'Intermediate', 'anrghg' ),
					__( 'Additional information is displayed on demand.', 'anrghg' ),
				),
				array(
					__( 'Minimal', 'anrghg' ),
					__( 'Additional information is hidden entirely without expand buttons.', 'anrghg' ),
				),
			),
			$p_a_params,
			0,
			2
		),
		$p_a_params['ok']
	);
}

/**
 * Settings tab navigability field callback function.
 *
 * @since 1.12.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_settings_tab_nav_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_fieldset(
			'',
			'',
			$p_a_params,
			anrghg_glide_switch(
				__( 'Settings page fully tab navigable', 'anrghg' ),
				__( 'Links and preview buttons are tab navigable too.', 'anrghg' ),
				__( 'Only settings elements are tab navigable.', 'anrghg' ),
				$p_a_params
			)
		),
		$p_a_params['ok']
	);
}

/**
 * Localization section callback function.
 *
 * @since 0.37.0
 * @since 0.63.0 Move interoperability to dedicated section.
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_localization_cb( $p_a_params ) {
	anrghg_settings_section_link( $p_a_params );
}

/**
 * Sync with WordPress Core field callback function.
 *
 * @since 1.6.5
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_sync_i18n_with_wordpress_core_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_fieldset(
			'',
			'',
			$p_a_params,
			anrghg_glide_switch(
				__( 'Use matching strings translated for WordPress Core', 'anrghg' ),
				__( 'The most possible strings are synced.', 'anrghg' ),
				__( 'Available alternative strings are used.', 'anrghg' ),
				$p_a_params
			)
		),
		$p_a_params['ok']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'As syncing aims to reduce translation workload, there is mostly no opt-out.', 'anrghg' )
		)
	);
}

/**
 * Titlecase in URL identifiers field callback function.
 *
 * @since 0.74.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_fragment_ids_support_titlecase_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_fieldset(
			'',
			'',
			$p_a_params,
			anrghg_glide_switch(
				__( 'Keep uppercase letters in fragment identifiers', 'anrghg' ),
				__( 'Identifiers may contain uppercase letters.', 'anrghg' ),
				__( 'Identifiers are all lowercase.', 'anrghg' ),
				$p_a_params
			)
		),
		$p_a_params['ok']
	);
}

/**
 * Increase identifier legibility field callback function.
 *
 * @since 0.37.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_additional_id_conversions_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_fieldset(
			'',
			'',
			$p_a_params,
			anrghg_description_textarea(
				'medium',
				__( 'The conversions configured below are performed first.', 'anrghg' ),
				__( 'Please separate values with a comma, and pairs with a semicolon.', 'anrghg' ) . C_S_ANRGHG_SPACE
				. __( 'Line breaks, tabs and spaces are ignored.', 'anrghg' ) . C_S_ANRGHG_SPACE
				// Translators: %s: an example pattern for the syntax used.
				. sprintf( __( 'Example: %s', 'anrghg' ), "\r\noriginal1,result1;original2, result2;\r\noriginal3 , result3 ;" ),
				$p_a_params
			),
			anrghg_glide_switch(
				// Translators: The asterisk is a footnote anchor referring to an enumeration of letter conversions.
				__( 'Perform the following alphabetic conversions*', 'anrghg' ),
				// .
				__( 'The conversions enumerated below are added.', 'anrghg' ),
				__( 'No other letters are converted.', 'anrghg' ),
				$p_a_params,
				1
			),
			anrghg_return_information(
				anrghg_paragraph(
					'description',
					// Translators: The %s placeholder is an enumeration of letter conversions.---This information is optionally collapsible or hidden.
					sprintf( __( '* Titlecase is kept if applicable: %s.', 'anrghg' ), '<code>ɛ➔3, ɔ➔o, ŋ➔ng, ɲ➔nj, ɂ➔7, ʔ➔7, ɣ➔g, ɠ➔g, ȝ➔3, ʒ➔zh, ǝ➔e. ɑ➔a, ʊ➔u, ʃ➔sh</code>' )
				)
			),
			anrghg_glide_switch(
				__( 'Remove accents and other diacritics', 'anrghg' ),
				sprintf(
					// Translators: 1, 2: the tags linking the text to the full list at https://developer.wordpress.org/reference/functions/remove_accents/.
					__( 'A %1$s set of diacriticized and other letters%2$s are converted.', 'anrghg' ),
					'<a'
					. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
					. ' href="https://developer.wordpress.org/reference/functions/remove_accents/" target="_blank">',
					'</a>'
				),
				__( 'Most letters beyond the base alphabet are URL-encoded.', 'anrghg' ),
				$p_a_params,
				2
			),
			anrghg_return_information(
				anrghg_paragraph(
					'description',
					// Translators: %s: an enumeration of converted characters.---This information is optionally collapsible or hidden.
					sprintf( __( 'Then, some other conversions are also performed: %s.', 'anrghg' ), '<code>£➔L, å➔aa, č➔cz, ř➔rz, ß➔ss, ä➔ae</code>' ),
					// Translators: %s: an enumeration of converted characters.---This information is optionally collapsible or hidden.
					sprintf( __( 'In German and Swedish: %s.', 'anrghg' ), '<code>ö➔oe, ü➔ue</code>' ),
					// Translators: The placeholder %s represents the conversion of letter apostrophe to underscore.---This information is optionally collapsible or hidden.
					sprintf( __( 'Also, letter apostrophe and ʻokina are converted to underscore: %s.', 'anrghg' ), '<code>ʼ➔_</code>' )
				),
				anrghg_paragraph(
					'description',
					// Translators: This information is optionally collapsible or hidden.
					__( 'Anyway, spaces, hyphens, dashes, minus sign are replaced with ASCII hyphen.', 'anrghg' ),
					// Translators: This information is optionally collapsible or hidden.
					__( 'So are both punctuation apostrophes.', 'anrghg' ),
					// Translators: This information is optionally collapsible or hidden.
					__( 'And format controls, for example zero width space, are always removed.', 'anrghg' )
				)
			)
		),
		$p_a_params['ok']
	);
}

/**
 * ID maximum length field callback function.
 *
 * @since 0.66.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_fragment_identifier_max_length_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_input_setting(
			array(
				0,
				999,
				1,
				'small',
			),
			'',
			'',
			__( 'characters', 'anrghg' ),
			'',
			$p_a_params
		),
		$p_a_params['ok']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'Content-derived fragment IDs are cropped to the latest space.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'The WordPress default maximum length is 200 characters.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'The maximum length of paragraph IDs is configurable separately.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'With a length set to zero, the IDs are entirely numeric.', 'anrghg' )
		)
	);
}

/**
 * Alternative slug generation field callback function.
 *
 * @since 0.74.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_alternative_sanitize_title_active_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_glide_switch(
		__( 'Use the same rules for the slugs of posts and pages', 'anrghg' ), // Label.
		__( 'Slugs are generated using rules specified above.', 'anrghg' ), // On.
		__( 'Slug generation remains unchanged.', 'anrghg' ), // Off.
		$p_a_params
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'important description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'In the editor’s slug input field, this setting is partly ineffective.', 'anrghg' )
		),
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'Please do not save the post after the slug input field had focus.', 'anrghg' ),
			sprintf(
				// Translators: 1: wp*_posts; 2: post_name.---This information is optionally collapsible or hidden.
				__( 'Else, the slug needs to be restored in the database, %1$s table, %2$s column.', 'anrghg' ),
				'<code>wp*_posts</code>',
				'<code>post_name</code>'
			)
		)
	);
}

/**
 * Fragment identifier separator field callback function.
 *
 * @since 0.63.0
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_fragment_id_separator_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	echo wp_kses(
		anrghg_input_setting(
			'tiny',
			'',
			'',
			// Translators: %s: fallback character literal.
			sprintf( __( 'Empty falls back to ‘%s’.', 'anrghg' ), '-' ),
			'',
			$p_a_params
		),
		$p_a_params['ok']
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'Used in URL fragment identifiers of paragraphs, headings and complements, this separator is required for disambiguation in edge cases.', 'anrghg' )
		)
	);
}

/**
 * Activate WPTexturize field callback function.
 *
 * @since 0.9.0
 * @since 0.24.8 Checkbox-based vertical glide switch.
 * @since 1.5.0 Remove ‘Option to deactivate WPTexturize’ section.
 * Move setting to ‘Localization’ section.
 * @param  array $p_a_params Settings keys and other parameters.
 * @return void
 */
function anrghg_wptexturize_active_cb( $p_a_params ) {
	anrghg_settings_field_link( $p_a_params );
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'top description',
			sprintf(
				// Translators: %s: Author or website.
				__( 'This feature is based on code from %s', 'anrghg' ),
				'<a'
				. ( anrghg_apply_config( 'anrghg_settings_tab_nav' ) ? '' : ' tabindex="-1"' )
				. ' href="https://web.archive.org/web/20211123083648/https://www.thewebflash.com/how-to-properly-disable-wptexturize-in-wordpress/" target="_blank">'
				. 'The Web Flash'
				. '</a>'
			)
		)
	);
	anrghg_echo_glide_switch(
		__( 'Keep WPTexturize active', 'anrghg' ),
		__( 'WPTexturize keeps working.', 'anrghg' ),
		__( 'WPTexturize is deactivated.', 'anrghg' ),
		$p_a_params
	);
	anrghg_echo_information(
		$p_a_params,
		anrghg_paragraph(
			'description',
			// Translators: This information is optionally collapsible or hidden.
			__( 'WordPress is able to convert a number of ASCII strings to strings containing non-ASCII characters.', 'anrghg' ),
			// Translators: This information is optionally collapsible or hidden.
			__( 'The use of a keyboard layout extensively supporting Unicode gives full control over the character representing an instance of a quotation mark or a dash.', 'anrghg' )
		)
	);
}
