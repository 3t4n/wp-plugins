<?php
/**
 * Options page 4: Export.
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
 * ANRGHG export page.
 *
 * @since 0.62.0 Export page and import page, first for the settings.
 * @reporter** @weblwp
 * @link https://wordpress.org/support/topic/export-footnotes-config/
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
		$l_s_option_name  = 'anrghg_export';
		$l_s_option_group = $l_s_option_name;
		register_setting( $l_s_option_group, $l_s_option_name );
		return;
	}
);

/**
 * Export page callback function.
 *
 * @since 0.61.5 Provisional.
 * @since 0.62.0 Settings.
 * @since 0.67.0 Templates.
 * @since 0.74.0 Custom.
 * @return void
 */
function anrghg_export_page_cb() {
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

	/**
	 * Internal CSS.
	 */
	echo wp_kses( "\r\n<style>", array( 'style' => true ) );
	anrghg_protected_echo(
		anrghg_minilight(
			'css',
			'

				:root {
					--border: #006EBF;
					--h00: #8BFFA300;
					--h66: #8BFFA366;
					--hff: #8BFFA3FF;
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
					bordtestmergeer: 2px dashed var(--border);
					font-family: monospace;
					white-space: pre;
					user-select: auto;
					resize: vertical;
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

				div.h2 {
					background: linear-gradient(to right, var(--h00), var(--h00), var(--h66), var(--hff), var(--hff));
				}

				html[dir=rtl] div.h2 {
					background: linear-gradient(to left, var(--h00), var(--h00), var(--h66), var(--hff), var(--hff));
				}

			'
		)
	);
	echo wp_kses( "\r\n</style>\r\n", array( 'style' => true ) );

	/**
	 * Header menu.
	 */
	anrghg_header_menu( 'export' );

	/**
	 * Page title.
	 */
	$l_s_output = "\r\n<div class=\"wrap\"><h1>";
	if ( 'none' === $g_a_anrghg_config['anrghg_menu_level']
		|| ! $g_a_anrghg_config['anrghg_menu_items_export_import']
	) {
		$l_s_output .= esc_html( $g_a_anrghg_admin_page_titles['export'] );
	} else {
		$l_s_output .= esc_html( get_admin_page_title() );
	}
	$l_s_output .= '</h1>';

	/**
	 * Settings section.
	 */
	$l_s_output .= '<div class="h2"><h2>' . __( 'Settings' ) . '</h2></div>';

	/**
	 * Settings data preview.
	 */
	$l_s_json    = wp_json_encode(
		$g_a_anrghg_config,
		JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
	);
	$l_s_output .= '<div class="preview">';
	$l_s_output .= '<div class="json" tabindex="-1">' . esc_attr( $l_s_json ) . "</div></div>\r\n";
	echo wp_kses( $l_s_output, anrghg_get_ui_with_user_input_whitelist() );

	/**
	 * Export form for settings.
	 */
	anrghg_export_form( 'export_settings' );

	/**
	 * Templates section.
	 *
	 * @since 0.68.0 Add frame showing templates in human readable data structure.
	 */
	$l_s_output = '<div class="h2"><h2>' . __( 'Templates' ) . '</h2></div>';

	/**
	 * Templates data preview.
	 */
	$l_s_json    = wp_json_encode(
		$g_a_anrghg_reuse,
		JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
	);
	$l_s_output .= '<div class="preview">';
	$l_s_output .= '<div class="json" tabindex="-1">' . esc_attr( $l_s_json ) . "</div></div>\r\n";
	echo wp_kses( $l_s_output, anrghg_get_ui_with_user_input_whitelist() );

	/**
	 * Export form for templates.
	 */
	anrghg_export_form( 'export_templates' );

	/**
	 * Custom section.
	 */
	$l_s_output = '<div class="h2"><h2>' . __( 'Custom' ) . '</h2></div>';
	echo wp_kses( $l_s_output, anrghg_get_ui_whitelist() );
	anrghg_export_form( 'configurable_export' );

	/**
	 * Templates data, reordered.
	 */
	$l_s_json    = wp_json_encode(
		anrghg_reorder_template_array( $g_a_anrghg_reuse ),
		JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
	);
	$l_s_output  = '<div class="h2"><h2>' . __( 'Templates, reordered', 'anrghg' ) . '</h2></div>';
	$l_s_output .= '<p><strong>';
	// This text is provisional only and shall be removed.
	$l_s_output .= 'The preview above shows the process oriented data structure.' . C_S_ANRGHG_SPACE;
	$l_s_output .= 'The following data is reordered for readability.' . C_S_ANRGHG_SPACE;
	$l_s_output .= 'As it is, this data is neither exported nor imported.' . C_S_ANRGHG_SPACE;
	$l_s_output .= '</strong></p>';
	$l_s_output .= '<div class="preview">';
	$l_s_output .= '<div class="json" tabindex="-1">' . esc_attr( $l_s_json ) . "</div></div>\r\n";
	$l_s_output .= "</div><!--.wrap-->\r\n";
	echo wp_kses( $l_s_output, anrghg_get_ui_with_user_input_whitelist() );
}

/**
 * Generates export form.
 *
 * @since 0.67.0
 * @param  string $p_s_name  Action name.
 * @return void
 */
function anrghg_export_form( $p_s_name ) {

	$l_s_output = '<form method="post">';
	echo wp_kses( $l_s_output, anrghg_get_ui_whitelist() );
	settings_fields( 'anrghg_export' ); // Security.

	$l_s_output = '<div class="submit">';
	if ( 'configurable_export' === $p_s_name ) {
		$l_s_output .= '<input type="text" name="option" placeholder="' . __( 'Option name', 'anrghg' ) . '" />';
	}
	$l_s_output .= '<input type="hidden" name="anrghg_action" value="' . esc_html( $p_s_name ) . '" />';
	echo wp_kses( $l_s_output, anrghg_get_ui_whitelist() );
	wp_nonce_field( 'anrghg_export_nonce', 'anrghg_export_nonce' );
	submit_button( __( 'Export' ) );
	$l_s_output = "</div></form>\r\n";
	echo wp_kses( $l_s_output, anrghg_get_ui_whitelist() );
}

/**
 * Export process.
 *
 * @since 0.62.0
 * @courtesy Pippin Williamson
 * @link https://pippinsplugins.com/building-settings-import-export-feature/
 *
 * NOTE: `wp_kses()` cannot escape the output file since it
 * breaks the JSON by unescaping double quotes.
 * Tested with:
 *
 *     echo wp_kses( $l_s_data, anrghg_get_ui_with_user_input_whitelist() );
 *
 * @since 1.0.4 Document that `wp_kses()` calls `wp_kses_split()`,
 * that calls `_wp_kses_split_callback()`, that calls `wp_kses_split2()`.
 * @link https://docs.classicpress.net/reference/functions/_wp_kses_split_callback/
 * And the first thing `wp_kses_split2()` does is to “fix” the data by calling
 * `wp_kses_stripslashes()`, that strips backslashes from in front of double quotes.
 * @link https://docs.classicpress.net/reference/functions/wp_kses_split2/
 * @link https://developer.wordpress.org/reference/functions/wp_kses_stripslashes/
 * Exported data is expected to truly mirror the existing data.
 * Thus we mustn’t escape the output when echoing for download.
 * @link https://core.trac.wordpress.org/ticket/56118#ticket
 * @return void
*/
add_filter(
	'admin_init',
	function() {
		// Sanitizing this causes a bug.
		if ( empty( $_POST['anrghg_action'] ) ) {
			return;
		}
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
		if ( isset( $_POST['anrghg_export_nonce'] ) && ! wp_verify_nonce( sanitize_key( $_POST['anrghg_export_nonce'] ), 'anrghg_export_nonce' ) ) {
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

		$l_s_name   = 'anrghg';
		$l_s_scope  = 'export-';
		$l_s_prefix = 'anrghg-v' . C_S_ANRGHG_VER;
		if ( 'export_settings' === sanitize_key( $_POST['anrghg_action'] ) ) {
			$l_s_scope = $l_s_prefix . '-settings-';
		} elseif ( 'export_templates' === sanitize_key( $_POST['anrghg_action'] ) ) {
			$l_s_name  = 'anrghg_reuse';
			$l_s_scope = $l_s_prefix . '-templates-';
		} elseif ( 'configurable_export' === sanitize_key( $_POST['anrghg_action'] ) ) {
			if ( ! empty( $_POST['option'] ) ) {
				$l_s_name = sanitize_text_field( sanitize_key( $_POST['option'] ) );
				$l_a_all  = wp_load_alloptions();
				if ( ! is_array( $l_a_all ) || ! array_key_exists( $l_s_name, $l_a_all ) ) {
					wp_die(
						wp_kses(
							__( 'This option is not found.', 'anrghg' ) . C_S_ANRGHG_SPACE . __( 'Export failed.', 'anrghg' ),
							array()
						),
						'',
						array(
							'back_link' => true,
						)
					);
				}
				$l_s_scope = $l_s_name . '-';
			} else {
				wp_die(
					wp_kses(
						__( 'Export failed.', 'anrghg' ) . C_S_ANRGHG_SPACE . sprintf(
							// Translators: %s: ‘Option name’ or ‘File’.
							__( 'There is no %s.', 'anrghg' ),
							__( 'Option name', 'anrghg' )
						),
						array()
					),
					'',
					array(
						'back_link' => true,
					)
				);
			}
		} else {
			return;
		}

		$l_s_data = wp_json_encode(
			get_option( $l_s_name ),
			JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
		);

		$l_s_filename = sanitize_file_name( $l_s_scope . current_time( 'Y-m-d\TH:i:sO' ) . '.json' );

		ignore_user_abort( true );

		nocache_headers();
		header( 'Content-Type: application/json; charset=utf-8' );
		header( 'Content-Disposition: attachment; filename=' . $l_s_filename );
		header( 'Expires: 0' );

		// We must not escape the output of this instance of echo.
		// phpcs:ignore
		echo $l_s_data;
		exit;
	}
);

/**
 * Reorders template array for human readability.
 *
 * @since 0.67.0
 * @param  array $p_a_templates Grouped by keys and values.
 * @return array $p_a_templates Array of key-value pairs.
 */
function anrghg_reorder_template_array( $p_a_templates ) {
	$l_a_reorder = array();
	if ( isset( $p_a_templates['key'] ) ) {
		foreach ( $p_a_templates['key'] as $l_i_index => $l_s_name ) {
			if ( ! empty( $l_s_name ) || ! empty( $p_a_templates['val'][ $l_i_index ] ) ) {
				$l_a_reorder[] = array( $l_s_name => $p_a_templates['val'][ $l_i_index ] );
			}
		}
		$p_a_templates = $l_a_reorder;
	}
	return $p_a_templates;
}
