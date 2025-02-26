<?php
/**
 * Options page 5: Import.
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
 * ANRGHG import page.
 *
 * @courtesy Pippin Williamson
 * @link https://pippinsplugins.com/building-settings-import-export-feature/
 *
 * @since 0.74.0 Support configurable option name.
 * @reporter** Inovve Agência Web Design
 * @link https://pippinsplugins.com/building-settings-import-export-feature/
 */

/**
 * Registers option.
 *
 * @since 0.61.5
 * @return void
 */
add_filter(
	'admin_init',
	function() {
		$l_s_option_name  = 'anrghg_import';
		$l_s_option_group = $l_s_option_name;
		register_setting( $l_s_option_group, $l_s_option_name );
		return;
	}
);

/**
 * Import page callback function.
 *
 * @since 0.61.5 Provisional.
 * @since 0.62.0 Settings.
 * @since 0.67.0 Templates.
 * @since 0.74.0 Custom.
 * @return void
 */
function anrghg_import_page_cb() {
	global $g_a_anrghg_config, $g_a_anrghg_reuse, $g_a_anrghg_admin_page_titles;
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die(
			wp_kses(
				sprintf(
					// Translators: %s: ‘the nonce’, or ‘the role’.
					__( 'There is a problem with %s.', 'anrghg' ),
					// .
					_x( 'the role', 'There is a problem with %s.', 'anrghg' )
				),
				array()
			),
			'',
			array(
				'back_link' => true,
			)
		);
	}
	if ( isset( $_POST['anrghg_import_nonce'] ) && ! wp_verify_nonce( sanitize_key( $_POST['anrghg_import_nonce'] ), 'anrghg_import_nonce' ) ) {
		wp_die(
			wp_kses(
				sprintf(
					// Translators: %s: ‘the nonce’, or ‘the role’.
					__( 'There is a problem with %s.', 'anrghg' ),
					// .
					_x( 'the nonce', 'There is a problem with %s.', 'anrghg' )
				),
				array()
			),
			'',
			array(
				'back_link' => true,
			)
		);
	}

	anrghg_set_message(
		'import-succeeded',
		__( 'Your data has been successfully imported.', 'anrghg' ),
		true
	);
	anrghg_set_message(
		'option-not-found',
		__( 'Import failed.', 'anrghg' ) . C_S_ANRGHG_SPACE . __( 'This option cannot be found.', 'anrghg' )
	);
	anrghg_set_message(
		'option-not-defined',
		__( 'Import failed.', 'anrghg' ) . C_S_ANRGHG_SPACE . sprintf(
			// Translators: %s: ‘Option name’ or ‘File’.
			__( 'There is no %s.', 'anrghg' ),
			__( 'Option name', 'anrghg' )
		)
	);
	anrghg_set_message(
		'no-file',
		__( 'Import failed.', 'anrghg' ) . C_S_ANRGHG_SPACE . sprintf(
			// Translators: %s: ‘Option name’ or ‘File’.
			__( 'There is no %s.', 'anrghg' ),
			__( 'File' )
		)
	);
	anrghg_set_message(
		'invalid',
		__( 'Import failed.', 'anrghg' ) . C_S_ANRGHG_SPACE . __( 'The JSON could not be decoded, maybe due to a trailing comma.', 'anrghg' )
	);
	anrghg_set_message(
		'unexpected',
		__( 'Import failed.', 'anrghg' ) . C_S_ANRGHG_SPACE . __( 'The data is not as expected for a templates file.', 'anrghg' )
	);
	settings_errors( 'anrghg_messages' );

	/**
	 * Internal CSS.
	 */
	echo wp_kses( "\r\n<style>", array( 'style' => true ) );
	anrghg_protected_echo(
		anrghg_minilight(
			'css',
			'

				:root {
					--clear: #FFF;
					--risk: #FF0019;
					--risk_hover: #FF7900;
					--border: #006EBF;
					--h00: #8BFFA300;
					--h66: #8BFFA366;
					--hff: #8BFFA3FF;
				}

				div#setting-error-anrghg_message {
					position: sticky;
					top: 32px;
					z-index: 2147483647;
				}

				div.preview {
					width: 97%;
				}

				div.json {
					max-width: 95%;
					height: 87px;
					overflow: scroll;
					padding: 0 10px;
					margin: 3px 1px;
					background: white;
					border: 2px dashed var(--border);
					font-family: monospace;
					white-space: pre;
					user-select: all;
					resize: both;
				}

				h2 {
					margin: 10px 2px;
					border-top: 3px solid var(--border);
					padding-top: 10px;
					font-size: 25px;
					line-height: 1em;
					position: relative;
					z-index: 99;
				}

				a {
					text-decoration: none !important;
				}

				span.offset-id {
					position: absolute;
					top: -66px;
				}

				div.h2 {
					background: linear-gradient(to right, var(--h00), var(--h00), var(--h66), var(--hff), var(--hff));
					position: relative;
				}

				html[dir=rtl] div.h2 {
					background: linear-gradient(to left, var(--h00), var(--h00), var(--h66), var(--hff), var(--hff));
				}

				.info p {
					margin-left: 32px;
					margin-right: 32px;
					font-size: 14px;
					font-style: italic;
				}

				.important {
					font-weight: bold;
				}

				.info p:last-child {
					margin-bottom: 0;
				}

				p.submit .button {
					font-size: 140%;
				}

				div.secondary-button .button {
					color: var(--clear);
					background: var(--risk);
					font-weight: bold;
				}

				div.secondary-button .button:hover,
				div.secondary-button .button:focus {
					color: var(--clear);
					background: var(--risk_hover);
				}

				div.secondary-button .button:active {
					outline: 2px solid var(--risk);
					outline-offset: 3px;
				}

			'
		)
	);
	echo wp_kses( "\r\n</style>\r\n", array( 'style' => true ) );

	/**
	 * Header menu.
	 */
	anrghg_header_menu( 'import' );

	/**
	 * Page title.
	 */
	$l_s_output = "\r\n<div class=\"wrap\"><h1>";
	if ( 'none' === $g_a_anrghg_config['anrghg_menu_level']
		|| ! $g_a_anrghg_config['anrghg_menu_items_export_import']
	) {
		$l_s_output .= esc_html( $g_a_anrghg_admin_page_titles['import'] );
	} else {
		$l_s_output .= esc_html( get_admin_page_title() );
	}
	$l_s_output .= '</h1>';

	/**
	 * Import form for settings.
	 */
	$l_s_output .= '<a href="#settings" title="' . __( 'Click to pin', 'anrghg' );
	$l_s_output .= '"><div class="h2"><span class="offset-id" id="settings"></span>';
	$l_s_output .= '<h2>' . __( 'Settings' ) . '</h2></div></a>';
	$l_s_output .= '<div class="info">';
	$l_s_output .= '<p class="important">';
	// The comment below is only for consistency.
	// Translators: 1: link start tag to the import page; 2: link end tag.
	$l_s_output .= sprintf( __( '%1$s Importing%2$s a file overwrites and synchronizes the database row with the imported values.', 'anrghg' ), '', '' ) . C_S_ANRGHG_SPACE;
	$l_s_output .= '</p>';
	$l_s_output .= '<p>';
	$l_s_output .= __( 'The settings whose keys are missing will be reset to their default value.', 'anrghg' ) . C_S_ANRGHG_SPACE;
	$l_s_output .= __( 'Importing an empty file will erase all values stored in this option.', 'anrghg' ) . C_S_ANRGHG_SPACE;
	$l_s_output .= __( 'That is useful if the goal is a reset to default settings.', 'anrghg' ) . C_S_ANRGHG_SPACE;
	$l_s_output .= '</p>';

	$l_s_uploads_path = wp_upload_dir();
	$l_s_path_partial = trailingslashit( wp_basename( content_url() ) ) . wp_basename( $l_s_uploads_path['basedir'] );

	$l_s_output .= '<p>';
	// Translators: %s: the actual file path of wp-content/uploads/anrghg/templates/ or settings/ respectively.
	$l_s_output .= sprintf( __( 'To restore a previous state, please access the folder ‘%s’ and select the desired backup file based on the datestamp in its name.', 'anrghg' ), $l_s_path_partial . '/anrghg/settings/' ) . C_S_ANRGHG_SPACE;
	$l_s_output .= '</p>';
	$l_s_output .= '</div>';
	echo wp_kses( $l_s_output, anrghg_get_ui_whitelist() );

	anrghg_import_form( 'import_settings', __( 'Import' ) . C_S_ANRGHG_DASH . __( 'Replace' ), 'secondary' );

	/**
	 * Import form for adding templates.
	 *
	 * Note: Adding the ‘widget’ context is the only available way of reusing ‘Add’ translated for Core.
	 */
	$l_s_output  = '<a href="#add-templates" title="' . __( 'Click to pin', 'anrghg' );
	$l_s_output .= '"><div class="h2"><span class="offset-id" id="add-templates"></span>';
	$l_s_output .= '<h2>' . __( 'Templates' ) . C_S_ANRGHG_DASH . _x( 'Add', 'widget' ) . '</h2></div></a>';
	$l_s_output .= '<div class="info"><p>';
	$l_s_output .= __( 'This way of importing helps add templates in bulk.', 'anrghg' );
	$l_s_output .= '</p></div>';
	echo wp_kses( $l_s_output, anrghg_get_ui_whitelist() );

	anrghg_import_form( 'import_add_templates', __( 'Import' ) . C_S_ANRGHG_DASH . _x( 'Add', 'widget' ) );

	/**
	 * Import form for overwriting templates.
	 */
	$l_s_output       = '<a href="#change-templates" title="' . __( 'Click to pin', 'anrghg' );
	$l_s_output      .= '"><div class="h2"><span class="offset-id" id="change-templates"></span>';
	$l_s_output      .= '<h2>' . __( 'Templates' ) . C_S_ANRGHG_DASH . __( 'Replace' );
	$l_s_output      .= '</h2></div></a>';
	$l_s_output      .= '<div class="info"><p>';
	$l_s_uploads_path = wp_upload_dir();
	$l_s_path_partial = trailingslashit( wp_basename( content_url() ) ) . wp_basename( $l_s_uploads_path['basedir'] );
	// Translators: %s: the actual file path of wp-content/uploads/anrghg/templates/ or settings/ respectively.
	$l_s_output .= sprintf( __( 'To restore a previous state, please access the folder ‘%s’ and select the appropriate backup file based on the datestamp in its name.', 'anrghg' ), $l_s_path_partial . '/anrghg/templates/' ) . C_S_ANRGHG_SPACE;
	$l_s_output .= '</p></div>';
	echo wp_kses( $l_s_output, anrghg_get_ui_whitelist() );

	anrghg_import_form( 'import_overwrite_templates', __( 'Import' ) . C_S_ANRGHG_DASH . __( 'Replace' ), 'secondary' );

	/**
	 * Import form for custom.
	 */
	$l_s_output  = '<a href="#custom" title="' . __( 'Click to pin', 'anrghg' );
	$l_s_output .= '"><div class="h2"><span class="offset-id" id="custom"></span>';
	$l_s_output .= '<h2>' . __( 'Custom' ) . '</h2></div></a>';
	$l_s_output .= '<div class="info">';
	$l_s_output .= '<p>';
	// Translators: 1: link start tag to the import page; 2: link end tag.
	$l_s_output .= sprintf( __( '%1$s Importing%2$s a file overwrites and synchronizes the database row with the imported values.', 'anrghg' ), '', '' );
	$l_s_output .= '</p>';
	$l_s_output .= '<p>';
	$l_s_output .= __( 'After clicking a heading, this page will reload scrolled to that heading.', 'anrghg' );
	$l_s_output .= '</p>';
	$l_s_output .= '</div>';
	echo wp_kses( $l_s_output, anrghg_get_ui_whitelist() );

	anrghg_import_form( 'configurable_import', __( 'Import' ) . C_S_ANRGHG_DASH . __( 'Replace' ), 'secondary' );

	echo wp_kses( "</div><!--.wrap-->\r\n", array( 'div' => true ) );
}

/**
 * Generates import form.
 *
 * @since 0.67.0
 * @param  string $p_s_name  Action name.
 * @param  string $p_s_label Button text.
 * @param  string $p_s_type  Button design.
 * @return void
 */
function anrghg_import_form(
	$p_s_name,
	$p_s_label,
	$p_s_type = 'primary'
) {
	$l_s_output = '<form method="post" enctype="multipart/form-data">';
	echo wp_kses( $l_s_output, anrghg_get_ui_whitelist() );
	settings_fields( 'anrghg_import' ); // Security.
	$l_s_output = '<div class="submit">';
	if ( 'configurable_import' === $p_s_name ) {
		$l_s_output .= '<input type="text" name="option" placeholder="' . __( 'Option name', 'anrghg' ) . '" /> ';
	}
	$l_s_output .= '<input type="file" name="import_file" />';
	$l_s_output .= '<input type="hidden" name="anrghg_action" value="' . esc_html( $p_s_name ) . '" />';
	echo wp_kses( $l_s_output, anrghg_get_ui_whitelist() );
	wp_nonce_field( 'anrghg_import_nonce', 'anrghg_import_nonce' );
	if ( 'secondary' === $p_s_type ) {
		echo wp_kses( '<div class="secondary-button">', anrghg_get_ui_whitelist() );
		submit_button( $p_s_label, $p_s_type );
		echo wp_kses( '</div>', anrghg_get_ui_whitelist() );
	} else {
		submit_button( $p_s_label, $p_s_type );
	}
	$l_s_output = "</div></form>\r\n";
	echo wp_kses( $l_s_output, anrghg_get_ui_whitelist() );
}

/**
 * Displays information on reloading the forms.
 *
 * @since 1.7.5
 * @param  string $p_s_status  Trigger.
 * @param  string $p_s_message Displayed.
 * @param  bool   $p_b_success Styling.
 * @return void
 */
function anrghg_set_message( $p_s_status, $p_s_message, $p_b_success = false ) {
	if ( isset( $_POST['anrghg_import_nonce'] ) && ! wp_verify_nonce( sanitize_key( $_POST['anrghg_import_nonce'] ), 'anrghg_import_nonce' ) ) {
		return;
	}
	if ( isset( $_GET[ $p_s_status ] ) ) {
		add_settings_error(
			'anrghg_messages',
			'anrghg_message',
			$p_s_message,
			$p_b_success ? 'success' : 'error'
		);
	}
}

/**
 * Import process.
 *
 * @since 0.62.0
 * @since 0.67.0 Fix bug in redirect if in Tools submenu.
 * @courtesy Pippin Williamson
 * @link https://pippinsplugins.com/building-settings-import-export-feature/
 *
 * @since 1.0.4 Document that `wp_kses()` calls `wp_kses_split()`,
 * that calls `_wp_kses_split_callback()`, that calls `wp_kses_split2()`.
 * @link https://docs.classicpress.net/reference/functions/_wp_kses_split_callback/
 * And the first thing `wp_kses_split2()` does is to “fix” the data by calling
 * `wp_kses_stripslashes()`, that strips backslashes from in front of double quotes.
 * @link https://docs.classicpress.net/reference/functions/wp_kses_split2/
 * @link https://developer.wordpress.org/reference/functions/wp_kses_stripslashes/
 * Imported data is expected to truly mirror the existing data.
 * Thus we mustn’t escape the import file.
 * @link https://core.trac.wordpress.org/ticket/56118#ticket
 * @return void
 */
add_filter(
	'admin_init',
	function() {
		if ( isset( $_POST['anrghg_import_nonce'] ) && ! wp_verify_nonce( sanitize_key( $_POST['anrghg_import_nonce'] ), 'anrghg_import_nonce' ) ) {
			wp_die(
				wp_kses(
					sprintf(
						// Translators: %s: ‘the nonce’, or ‘the role’.
						__( 'There is a problem with %s.', 'anrghg' ),
						// .
						_x( 'the nonce', 'There is a problem with %s.', 'anrghg' )
					),
					array()
				),
				'',
				array(
					'back_link' => true,
				)
			);
		}
		// Sanitizing this causes a bug.
		if ( ! array_key_exists( 'anrghg_action', $_POST ) ) {
			return;
		}
		$l_s_action = sanitize_key( $_POST['anrghg_action'] );
		if ( ! ( 'import_settings' === $l_s_action
			|| 'import_add_templates' === $l_s_action
			|| 'import_overwrite_templates' === $l_s_action
			|| 'configurable_import' === $l_s_action )
		) {
			return;
		}
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$l_o_import_file = '';
		$l_s_status      = 'do-import';
		if ( isset( $_FILES['import_file']['tmp_name'] ) ) {
			// JSON data mustn't be unslashed or it will be broken.
			// phpcs:ignore
			$l_o_import_file = $_FILES['import_file']['tmp_name'];
		}
		if ( ! isset( $_FILES['import_file']['tmp_name'] ) || empty( $l_o_import_file ) ) {
			$l_s_status = 'no-file';

		} else {

			/**
			 * Retrieves the data from the file and converts the JSON object to an array.
			 */
			// Cannot use wp_remote_get() since this performs an HTTP request.
			// phpcs:ignore
			$l_a_data = json_decode( file_get_contents( $l_o_import_file ), true );

			if ( null === $l_a_data ) {
				$l_s_status = 'invalid';

			} else {

				if ( 'import_settings' === sanitize_key( $_POST['anrghg_action'] ) ) {
					$l_s_name = 'anrghg';

				} elseif ( 'configurable_import' === sanitize_key( $_POST['anrghg_action'] ) ) {
					if ( empty( $_POST['option'] ) ) {
						$l_s_status = 'option-not-defined';
					} else {
						$l_s_name = sanitize_text_field( sanitize_key( $_POST['option'] ) );
						$l_a_all  = wp_load_alloptions();
						if ( ! is_array( $l_a_all ) || ! array_key_exists( $l_s_name, $l_a_all ) ) {
							$l_s_status = 'option-not-found';
						}
					}
				} elseif ( 'import_add_templates' === sanitize_key( $_POST['anrghg_action'] )
					|| 'import_overwrite_templates' === sanitize_key( $_POST['anrghg_action'] )
				) {
					if ( ! array_key_exists( 'key', $l_a_data ) || ! array_key_exists( 'val', $l_a_data ) ) {
						$l_s_status = 'unexpected';

					} else {
						$l_s_name = 'anrghg_reuse';

						if ( 'import_add_templates' === sanitize_key( $_POST['anrghg_action'] ) ) {
							global $g_a_anrghg_reuse;
							$l_a_data['key'] = array_merge( $g_a_anrghg_reuse['key'], $l_a_data['key'] );
							$l_a_data['val'] = array_merge( $g_a_anrghg_reuse['val'], $l_a_data['val'] );
						}
					}
				}
			}
		}

		if ( 'do-import' === $l_s_status ) {
			update_option( $l_s_name, $l_a_data );
			$l_s_status = 'import-succeeded';
		}

		wp_safe_redirect( add_query_arg( $l_s_status, 'true', admin_url( anrghg_cur_slug( 'import' ) ) ) );
		exit;
	}
);
