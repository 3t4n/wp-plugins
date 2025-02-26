<?php
/**
 * Options page 2: Settings.
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
 * Initializes the settings infoblock ID.
 *
 * @since 0.62.12
 * @global int $g_i_anrghg_infoblock_id
 */
$g_i_anrghg_infoblock_id = 1;

/**
 * Saves settings and redirects to the accurate page.
 *
 * @since 1.7.3
 * Required because the URL depends on a setting.
 * @return void
 */
add_filter(
	'admin_init',
	function() {
		if ( isset( $_POST['anrghg_settings_nonce'] ) && ! wp_verify_nonce( sanitize_key( $_POST['anrghg_settings_nonce'] ), 'anrghg_settings_nonce' ) ) {
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
		if ( ! array_key_exists( 'anrghg', $_POST ) ) {
			return;
		}
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		global $g_a_anrghg_config;
		foreach ( $g_a_anrghg_config as $l_s_key => $l_s_val ) {
			$l_s_key = sanitize_key( $l_s_key );
			if ( array_key_exists( $l_s_key, $_POST['anrghg'] ) ) {
				// phpcs:ignore WordPress.Security.ValidatedSanitizedInput
				$l_s_new_value        = ( $_POST['anrghg'][ $l_s_key ] );
				$l_a_data[ $l_s_key ] = $l_s_new_value;
			}
		}
		update_option( 'anrghg', $l_a_data );

		wp_safe_redirect( add_query_arg( 'settings-updated', 'true', admin_url( anrghg_cur_slug( 'config' ) ) ) );
		exit;
	}
);

/**
 * Settings page callback function.
 *
 * @since 0.9.0
 * @since 0.24.9 Fix duplicate message displayed on saving options
 * when the page is in the Settings submenu.
 * Then the confirmation message is not configurable, because the
 * default message displays anyway.
 * @see wp-admin/options.php:333
 * @return void
 */
function anrghg_settings_page_cb() {
	global $g_a_anrghg_config, $g_a_anrghg_admin_page_titles;
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
	if ( isset( $_POST['anrghg_settings_nonce'] ) && ! wp_verify_nonce( sanitize_key( $_POST['anrghg_settings_nonce'] ), 'anrghg_settings_nonce' ) ) {
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

	if ( isset( $_GET['settings-updated'] ) ) {
		add_settings_error(
			'anrghg_messages',
			'anrghg_message',
			__( 'Your Configuration has been saved.', 'anrghg' ),
			'success'
		);
	}
	settings_errors( 'anrghg_messages' );

	/**
	 * Settings form internal CSS.
	 *
	 * @since 0.9.0
	 * @since 0.27.4 Invert glide switch appearance for consistency with radio buttons.
	 * @since 0.80.2 Fix bug causing the right-to-left page to x-scroll out of the viewport.
	 * Tune On and Off colors, for consistency with a Material Design glide switch.
	 * Optimize On/Off color scheme for a11y:
	 * On:  #09D260 ➔ #007F37 ➔ #005D29
	 * Off: #E00300 ➔ #FF6C6A ➔ #FF8C8A
	 */
	$l_s_state_label = __( 'Effect of the current state:', 'anrghg' ) . ' ';
	// Translators: %s: the settings submit button label.
	$l_s_state_alert = sprintf( __( 'Effective after clicking ‘%s’.', 'anrghg' ), __( 'Save Changes' ) );
	echo wp_kses( "\r\n<style>", array( 'style' => true ) );
	$l_s_output = anrghg_minilight(
		'css',
		"

			:root {
				--on: #005D29;
				--off: #FF8C8A;
				--label_on: #00400E;
				--label_off: #7F0200;
				--active: #4CFFD0;
				--focus: #09D260;
				--clear: #FFF;
				--dark: #00400E;
				--warn: #FF2900;
				--pinned: #FFFF00;
				--a_hover: #8BFFA3;
				--a_toc: #003960;
				--a_toc_hov: #000360;
				--a_toc_act: #117A3F;
				--border: #006EBF;
				--slot: #B5B5B5;
				--knob_border: #E4E4E4;
				--knob_focus: #1C55C3;
				--shadow: #BFBFBF;
				--info: #377BC8;
				--info_bak: #7DE4FF;
				--field: #7099FF40;
				--h00: #8BFFA300;
				--h66: #8BFFA366;
				--hff: #8BFFA3FF;
			}

			html {
				overflow-x: hidden;
			}

			div.wrap,
			label {
				color: black;
			}

			nav.toc {
				font-size: 18px;
			}

			@media (min-width: 769px) {

				nav.toc {
					columns: 2;
				}

			}

			.toc li {
				margin: 0;
				break-inside: avoid-column;
				font-weight: bold;
			}

			.toc li.section,
			.toc li.quick-access {
				margin-inline-start: -10px;
			}

			.toc li a {
				padding: 10px 5px;
				color: var(--a_toc);
				text-decoration: none;
				display: block;
			}

			.toc li a:hover,
			.toc li a:focus {
				color: var(--a_toc_hov);
				background: var(--a_hover);
			}

			.toc li a:active {
				color: var(--a_toc_act);
			}

			.toc li.subsec {
				margin-inline-start: 18px;
				font-size: 15px;
			}

			.toc li.quick-access {
				font-style: italic;
				font-weight: normal;
			}

			.to-the-top {
				position: fixed;
				z-index: 100;
				top: 60px;
				right: 24px;
				font-size: 14px;
				padding: 8px 12px 10px;
				background: var(--clear);
				color: var(--dark);
				border: 1px solid var(--shadow);
				border-radius: 5px;
				text-decoration: none;
			}

			html[dir=rtl] .to-the-top {
				right: unset;
				left: 24px;
			}

			.to-the-top:hover,
			.to-the-top:focus {
				background: var(--dark);
				color: var(--clear);
			}

			div.submit input#submit.button {
				position: fixed;
				bottom: 24px;
				right: 24px;
				z-index: 2147483647;
			}

			html[dir=rtl] div.submit input#submit.button {
				right: unset;
				left: 24px;
			}

			@media screen and (max-width: 782px) {

				div.submit input#submit.button {
					bottom: 7px;
					right: 7px;
				}

				html[dir=rtl] div.submit input#submit.button {
					right: unset;
					left: 7px;
				}

			}

			p.submit,
			div.submit.section {
				margin: 0;
				padding: 0;

			}

			div#setting-error-anrghg_message {
				position: sticky;
				top: 32px;
				z-index: 2147483647;
			}

			div.preview {
				width: 97%;
			}

			input.display-toggle {
				opacity: 0;
				position: absolute;
				left: -999px;
			}

			div.preview-toggle {
				margin-top: 15px;
				height: 16px;
				text-align: center;
				font-size: 13px;
				color: var(--clear);
				background: var(--dark);
			}

			div.preview-toggle:hover,
			input.display-toggle:focus + div.preview div.preview-toggle {
				background: var(--border);
			}

			input.display-toggle + div.preview > div.json {
				height: 0;
				visibility: hidden;
				transition: all 200ms;
			}

			input.display-toggle:checked + div.preview > div.json {
				height: 507px;
				visibility: visible;
				transition: all 1s;
			}

			div.json {
				max-width: 95%;
				white-space: pre-wrap;
				word-break: break-all;
				overflow-x: hidden;
				overflow-y: scroll;
				padding: 0 10px;
				margin: 3px 1px;
				background: var(--clear);
				border: 2px dashed var(--border);
				font-family: monospace;
				user-select: all;
			}

			h2 {
				border-top: 3px solid var(--border);
				padding-top: 10px;
				font-size: 25px;
				line-height: 1em;
				margin-bottom: -8px;
				position: relative;
				z-index: 99;
			}

			.screen-reader-text {
				display: block;
				width: 0px;
				height: 0px;
				overflow: hidden;
			}

			legend.top {
				display: block;
				padding-top: 14px;
				font-weight: bold;
			}

			.anrghg a:hover,
			.description a:hover {
				color: var(--dark);
				background: var(--a_hover);
			}

			.form-table td {
				padding-bottom: 8px;
			}

			.form-table td fieldset label {
				line-height: 1.3;
				margin: 0 !important;/*overrides !important prop in wp-admin/load-styles.php?c=1&dir=ltr&load%5Bchunk_0%5D=dashicons,admin-bar,common,forms,admin-menu,dashboard,list-tables,edit,revisions,media,themes,about,nav-menus,wp-pointer,widgets&load%5Bchunk_1%5D=,site-icon,l10n,buttons,wp-auth-check&ver=5.8:15*/
			}

			table.form-table td {
				padding-top: 8px;
				padding-bottom: 15px;
			}

			table.form-table td table.subsettings td {
				padding: 3px 0;
			}

			input.display-toggle {
				position: absolute;
				height: 0px;
				width: 0px;
				overflow: hidden;
				opacity: 0;
			}

			label.expander,
			.checkbox-cluster label.expander,
			.form-table td fieldset label.expander {
				display: inline-block;
				height: 16px;
				padding: 0 10px;
				margin-inline-start: 2px;
				color: var(--info);
				background: var(--info_bak);
				border: 1px solid var(--border);
				border-radius: 4px;
				cursor: pointer;
			}

			label.expander:hover,
			.checkbox-cluster label.expander:hover,
			.form-table td fieldset label.expander:hover {
				background: var(--clear);
				border: 1px solid lime;
			}

			label.expander:active,
			.checkbox-cluster label.expander:active,
			.form-table td fieldset label.expander:active {
				background: lime;
				border: 1px solid yellow;
			}

			input.display-toggle:not(:checked) + div.information {
				display: none;
			}

			code {
				font-weight: bold;
				font-style: normal;
				color: var(--dark);
				background: var(--clear)
			}

			code.label {
				font-weight: unset;
				color: unset;
			}

			code.surround {
				font-size: 1.3em;
				background: var(--clear);
				font-weight: normal;
				color: black;
				padding: 0;
				padding-inline-start: 5px;
			}

			tr {
				border-top: 1px solid var(--border);
			}

			p.anrghg {
				font-size: 16px;
				margin: 10px 0;
			}

			.base {
				position: relative;
				vertical-align: top;
				margin-bottom: 21px;
			}

			a.field-id {
				display: block;
				height: 0;
				line-height: 0;
				text-align: end;
				vertical-align: top;
				color: var(--field);
				text-decoration: none;
			}

			a.field-id::before {
				content: '📌';
				padding: 20px 10px 5px;
				color: var(--dark);
				text-decoration: none;
				z-index: 2147483647;
			}

			a.field-id:hover::before {
				background: var(--a_hover);
			}

			.anrghg.id:target + a.field-id::before {
				content: '⚫';
				text-shadow: 3px 3px var(--shadow);
				background: var(--pinned);
				color: var(--warn);
				padding-top: 0;
				pointer-events: none;
			}

			.base .id {
				position: absolute;
				bottom: 66px;
			}

			.base .link {
				display: block;
				position: absolute;
				bottom: -20px;
				height: 46px;
				width: 100%;
				z-index: 0;
			}

			.base .link {
				background: linear-gradient(to right, var(--h00), var(--h00), var(--h66), var(--hff), var(--hff));
			}

			html[dir=rtl] .base .link {
				background: linear-gradient(to left, var(--h00), var(--h00), var(--h66), var(--hff), var(--hff));
			}
			
			.base .link:focus {
				outline: 3px solid var(--warn);
			}
			
			.base .link:not(:focus)+div.save-info {
				display: none;
			}
				
			.base .link:focus+div.save-info {
				width: fit-content;
				margin: auto;
				background: var(--clear);
				padding: 10px;
				font-size: 20px;
				color: var(--warn);
				position: absolute;
				right: 2px;
				top: -23px;
				z-index: 2147483647;
			}
			
			html[dir=rtl] .base .link:focus+div.save-info {
				right: unset;
				left: 5px;
			}

			li.description,
			p.description,
			span.description {
				font-size: 14px;
				font-style: italic;
				color: black;
			}

			.important {
				font-weight: bold;
			}

			li.description,
			p.description {
				margin-bottom: 3px;
			}

			p.description.top {
				margin: 12px 0 10px;
			}

			ul.arguments {
				list-style-type: '- ';
				margin: 5px 2em 0;
			}

			table.form-table {
				margin-bottom: -24px;
			}

			table.text tr td:first-child label {
				padding-inline-end: 10px;
			}

			label.input-leading-label {
				font-weight: bold;
				white-space: nowrap;
			}

			select {
				margin-top: 4px;
			}

			div.flex {
				display: flex;
			}

			input.close-up-start {
				padding-inline-start: 0;
				text-align: start !important;
			}

			input[type=color] {
				margin: 10px 0;
				padding: 1px !important;
			}

			textarea,
			input[type=text],
			input[type=number] {
				width: 80%;
				margin-top: 5px;
				font-family: monospace;
				color: black;
				font-size: 1.3em;
			}

			textarea {
				width: 100% !important;
			}

			textarea:focus,
			input[type=text]:focus,
			input[type=number]:focus {
				outline: 3px solid var(--focus);
			}

			textarea {
				width: 80%;
				max-width: 100%;
				overflow: auto;
				resize: both;
			}

			textarea.medium {
				height: 157px;
			}

			textarea.flat {
				height: 90px;
			}

			input[type=text] {
				margin-bottom: 5px;
			}

			input[type=text].fullwide {
				width: 100%;
			}

			input[type=text].wide {
				width: 75%;
			}

			input[type=text].medium {
				width: 50%;
			}

			input[type=text].small {
				width: 140px;
			}

			input[type=text].tiny {
				width: 70px;
			}

			input[type=text],
			input[type=number] {
				margin-bottom: 5px;
			}

			input[type=number] {
				width: 200px;
				max-width: 100%;
				text-align: end;
			}

			input[type=number].medium {
				width: 110px;
			}

			input[type=number].small {
				width: 80px;
			}

			input[type=number].tiny {
				width: 60px;
				text-align: end;
			}

			div.top-bottom {
				margin-inline-start: 74px;
			}

			div.rectangle {
				display: inline-block;
				vertical-align: bottom;
				height: 33px;
				width: 42px;
				margin: 6px 10px;
				border: 2px solid black;
			}

			input.align-end {
				text-align: end;
			}

			.form-table input[type=checkbox],
			.form-table input[type=radio] {
				display: block;
				z-index: 99;
				margin: 14px 0 11px 0;
				margin-inline-end: -32px;
			}

			.form-table div.flex input[type=checkbox] + label,
			.form-table div.flex input[type=radio] + label {
				width: 100%;
			}

			@media (max-width: 768px) {

				.form-table input[type=checkbox],
				.form-table input[type=radio] {
					width: 25px;
					min-width: 25px;
				}

			}

			.form-table input[type=radio].box {
				margin-top: 29px;
			}

			.form-table input[type=checkbox] + label,
			.form-table input[type=radio] + label {
				display: block;
				position: relative;
				padding: 13px 42px;
			}

			.form-table input[type=checkbox] + label:hover,
			.form-table input[type=checkbox]:hover + label,
			.form-table input[type=checkbox]:focus + label,
			.form-table input[type=radio] + label:hover,
			.form-table input[type=radio]:hover + label,
			.form-table input[type=radio]:focus + label {
				background: var(--active);
			}

			.form-table input[type=radio]:checked::after {
				content: '';
				display: inline-block;
				position: relative;
				top: -17px;
				left: -2px;
				width: 19px;
				height: 19px;
				border-radius: 50%;
				background-color: var(--on);
			}

			html[dir=rtl] .form-table input[type=radio]:checked::after {
				right: -2px;
			}

			.form-table input[type=radio].no:checked::after {
				background-color: var(--off);
			}

			.form-table input[type=radio].warn:checked::after {
				background-color: var(--warn);
			}

			.form-table input[type=radio]:checked + label {
				font-weight: bold;
				color: var(--label_on);
			}

			.form-table input[type=radio].no:checked + label,
			.form-table input[type=radio].warn:checked + label {
				color: var(--label_off);
			}

			p + input {
				margin-top: 5px;
			}

			.checkbox-cluster label {
				display: block;
				padding: 15px;
			}

			.checkbox-cluster label:hover,
			.checkbox-cluster label:focus-within {
				background: var(--active);
			}

			@media (min-width: 768px) {

				.indented {
					display: block;
					margin-inline-start: 52px;
				}

			}

			#date_meta_tag_checkboxes {
				border-bottom: 2px solid var(--clear);
				margin-bottom: 18px;
			}

			.input-upper-label {
				margin: 13px 4px 0;
			}

			legend.description,
			label.description,
			.input-upper-label.description {
				font-style: italic;
			}

			input.delims {
				width: 200px;
				font-weight: normal;
			}

			span.field-ellipsis {
				display: inline-block;
				padding: 0 15px;
			}

			table.text tr td:last-child {
				width: 90%;
			}

			.form-table input[type=checkbox].switch + label {
				padding: 0;
			}

			input.switch {
				opacity: 0;
				position: absolute;
				left: -999px;
			}

			input.switch + label div.flex {
				margin-bottom: 10px;
			}

			input.switch + label:hover div.flex,
			input.switch:focus + label div.flex {
				background: var(--active);
			}

			div.switch {
				position: relative;
				height: 60px;
				width: 50px;
				margin-inline-start: -12px;
				padding-top: 15px;
			}

			div.slot {
				position: absolute;
				top: 18px;
				left: 29px;
				height: 40px;
				width: 10px;
				border-radius: 5px;
				background: var(--slot);
			}

			html[dir=rtl] div.slot {
				right: 29px;
			}

			div.knob {
				position: absolute;
				top: 37px;
				left: 18px;
				height: 30px;
				width: 30px;
				border: 1px solid var(--knob_border);
				border-radius: 50%;
				box-shadow: -5px 4px 5px var(--shadow);
				background-color: var(--off);
				transition: all .2s;
			}

			html[dir=rtl] div.knob {
				right: 18px;
				box-shadow: 5px 4px;
			}

			input.switch:checked + label div.knob {
				top: 7px;
				background-color: var(--on);
				transition: all .2s;
			}

			input.switch:focus + label div.knob {
				border: 1px solid var(--knob_focus);
			}

			div.knob::before {
				position: absolute;
				top: 4px;
				left: 7.5px;
				content: '⭘';
				font-size: 15px;
				color: var(--clear);
			}

			html[dir=rtl] div.knob::before {
				right: 7.5px;
			}

			input.switch:checked + label div.knob::before {
				left: 12.5px;
				content: 'I';
				font-size: 18px;
			}

			html[dir=rtl] input.switch:checked + label div.knob::before {
				right: 12.5px;
			}

			div.labels {
				width: 100%;
				padding-inline-start: 16px;
				padding-top: 15px;
			}

			div.labels div {
				width: 100%;
			}

			div.labels .label1 {
				min-height: 30px;
			}

			div.labels .state0,
			div.labels .state1 {
				padding: 10px 0;
			}

			input.switch:checked + label .label1 {
				font-weight: bold;
				color: var(--label_on);
			}

			.state1::before,
			.state0::before {
				content: '$l_s_state_label';
				font-weight: normal;
				font-style: italic;
			}

			input.switch + label .state1 {
				display: none;
			}

			input.switch:checked + label .state1 {
				display: block;
				font-weight: bold;
				color: var(--label_on);
			}

			input.switch + label .state0 {
				font-weight: bold;
				color: var(--label_off);
			}

			input.switch:checked + label .state0 {
				display: none;
			}

			span.apply::after {
				content: '$l_s_state_alert';
				padding-inline-start: 26px;
				font-style: italic;
				color: black;
			}

			input.switch + label span.apply,
			input.switch:checked + label span.apply.checked {
				display: none;
			}

			input.switch + label span.apply.checked,
			input.switch:checked + label span.apply {
				display: inline-block;
			}

			span.expandable .fulltext {
				display: none;
			}

			span.expandable:hover .fulltext {
				display: inline;
			}

			select {
				height: 38px;
				margin-bottom: 5px;
			}

			div.bottom-spacer {
				height: 42px;
			}

			@media (max-width: 768px) {

				.to-the-top {
					top: 4px;
				}

				div.toc {
					columns: 1;
				}

				.form-table input[type=radio]:checked::after {
					top: -29px;
					left: 0px;
					width: 29px;
					height: 29px;
				}

				html[dir=rtl] .form-table input[type=radio]:checked::after {
					right: 0px;
				}

			}

		"
	);
	if ( $g_a_anrghg_config['anrghg_keep_reusables_history'] ) {
		$l_s_output .= anrghg_minilight(
			'css',
			'

				#full_reusables_history {
					display: block;
				}

				#no_reusables_history {
					display: none;
				}

			'
		);
	} else {
		$l_s_output .= anrghg_minilight(
			'css',
			'

				#full_reusables_history {
					display: none;
				}

				#no_reusables_history {
					display: block;
				}

			'
		);
	}
	if ( $g_a_anrghg_config['anrghg_keep_settings_history'] ) {
		$l_s_output .= anrghg_minilight(
			'css',
			'

				#full_settings_history {
					display: block;
				}

				#no_settings_history {
					display: none;
				}

			'
		);
	} else {
		$l_s_output .= anrghg_minilight(
			'css',
			'

				#full_settings_history {
					display: none;
				}

				#no_settings_history {
					display: block;
				}

			'
		);
	}
	if ( ! $g_a_anrghg_config['anrghg_dates_label_uni'] ) {
		$l_s_output .= anrghg_minilight(
			'css',
			'

				table#unified_labels {
					visibility: collapse;
				}

			'
		);
	}
	if ( $g_a_anrghg_config['anrghg_dates_label_uni'] ) {
		$l_s_output .= anrghg_minilight(
			'css',
			'

				tr.anrghg_dates_label_post_top_modif,
				tr.anrghg_dates_label_page_top_modif,
				tr.anrghg_dates_label_post_top_publi,
				tr.anrghg_dates_label_page_top_publi,
				tr.anrghg_dates_label_post_end_modif,
				tr.anrghg_dates_label_page_end_modif,
				tr.anrghg_dates_label_post_end_publi,
				tr.anrghg_dates_label_page_end_publi {
					visibility: collapse;
				}

			'
		);
	} else {
		$g_a_anrghg_config['anrghg_dates_post_top_modif'] ? '' : $l_s_output .= 'tr.anrghg_dates_label_post_top_modif {visibility: collapse;}';
		$g_a_anrghg_config['anrghg_dates_page_top_modif'] ? '' : $l_s_output .= 'tr.anrghg_dates_label_page_top_modif {visibility: collapse;}';
		$g_a_anrghg_config['anrghg_dates_post_top_publi'] ? '' : $l_s_output .= 'tr.anrghg_dates_label_post_top_publi {visibility: collapse;}';
		$g_a_anrghg_config['anrghg_dates_page_top_publi'] ? '' : $l_s_output .= 'tr.anrghg_dates_label_page_top_publi {visibility: collapse;}';
		$g_a_anrghg_config['anrghg_dates_post_end_modif'] ? '' : $l_s_output .= 'tr.anrghg_dates_label_post_end_modif {visibility: collapse;}';
		$g_a_anrghg_config['anrghg_dates_page_end_modif'] ? '' : $l_s_output .= 'tr.anrghg_dates_label_page_end_modif {visibility: collapse;}';
		$g_a_anrghg_config['anrghg_dates_post_end_publi'] ? '' : $l_s_output .= 'tr.anrghg_dates_label_post_end_publi {visibility: collapse;}';
		$g_a_anrghg_config['anrghg_dates_page_end_publi'] ? '' : $l_s_output .= 'tr.anrghg_dates_label_page_end_publi {visibility: collapse;}';
	}
	$g_a_anrghg_config['anrghg_date_meta_common_published'] ? '' : $l_s_output .= '#pre_meta_common_published {display: none;}';
	$g_a_anrghg_config['anrghg_date_meta_common_last_edit'] ? '' : $l_s_output .= '#pre_meta_common_last_edit {display: none;}';
	$g_a_anrghg_config['anrghg_date_meta_open_g_published'] ? '' : $l_s_output .= '#pre_meta_open_g_published {display: none;}';
	$g_a_anrghg_config['anrghg_date_meta_open_g_last_edit'] ? '' : $l_s_output .= '#pre_meta_open_g_last_edit {display: none;}';

	anrghg_protected_echo( $l_s_output );
	echo wp_kses( "</style>\r\n", array( 'style' => true ) );

	/**
	 * Header menu.
	 */
	anrghg_header_menu( 'config' );

	/**
	 * Start of form.
	 */
	echo wp_kses(
		"\r\n<div class=\"wrap\"><h1>",
		array(
			'div' => array(
				'class' => true,
			),
			'h1'  => array(),
		)
	);
	echo esc_html(
		'none' === $g_a_anrghg_config['anrghg_menu_level'] ?
		$g_a_anrghg_admin_page_titles['config'] :
		get_admin_page_title()
	);
	echo wp_kses(
		'</h1><form method="post">',
		array(
			'form' => array(
				'method' => true,
			),
			'h1'   => array(),
		)
	);
	settings_fields( 'anrghg' ); // Security.
	echo wp_kses(
		'<a tabindex="-1" href="#wpwrap"><div class="to-the-top">' . anrghg_i18n( __( 'Top' ), __( 'To the top', 'anrghg' ) ) . '</div></a>',
		array(
			'a'   => array(
				'href'     => true,
				'tabindex' => true,
			),
			'div' => array(
				'class' => true,
			),
		)
	);

	/**
	 * Settings table of contents (stoc).
	 *
	 * Append subsections as arrays.
	 */
	anrghg_settings_toc(
		// phpcs:disable
		anrghg_toc_section( 'security'         , __( 'Security', 'anrghg' ) ),
		anrghg_toc_section( 'backup'           , __( 'Backup', 'anrghg' ) ),
		anrghg_toc_section( 'user_interface'   , __( 'User interface', 'anrghg' ) ),
		anrghg_toc_section( 'localization'     , __( 'Localization', 'anrghg' ) ),
		anrghg_toc_section( 'interoperability' , __( 'Interoperability', 'anrghg' ) ),
		anrghg_toc_section( 'user_xp'          , __( 'User experience', 'anrghg' ) ),
		anrghg_toc_section( 'customize'        , __( 'Customization', 'anrghg' ) ),
		anrghg_toc_section( 'include'          , __( 'Include HTML partials', 'anrghg' ) ),
		anrghg_toc_section( 'excerpts'         , __( 'Excerpts', 'anrghg' ) ),
		anrghg_toc_section( 'thank_you'        , __( 'Thank You message', 'anrghg' ),
			array( 'aspect', __( 'Aspect', 'anrghg' ) )
		),
		anrghg_toc_section( 'dates'            , __( 'Date information', 'anrghg' ),
			array( 'post_top', __( 'Aspect', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Top' ) . C_S_ANRGHG_DASH . __( 'All Posts' ) ),
			array( 'page_top', __( 'Aspect', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Top' ) . C_S_ANRGHG_DASH . __( 'All Pages' ) ),
			array( 'post_end', __( 'Aspect', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Bottom' ) . C_S_ANRGHG_DASH . __( 'All Posts' ) ),
			array( 'page_end', __( 'Aspect', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Bottom' ) . C_S_ANRGHG_DASH . __( 'All Pages' ) )
		),
		anrghg_toc_section( 'date_meta_tags'   , __( 'Date meta tags', 'anrghg' ) ),
		anrghg_toc_section( 'paragraph_links'  , __( 'Paragraph links', 'anrghg' ) ),
		anrghg_toc_section( 'heading_links'    , __( 'Heading links', 'anrghg' ) ),
		anrghg_toc_section( 'table_of_contents', __( 'Table of contents' ) ),
		anrghg_toc_section( 'notes_and_sources', __( 'Notes and sources', 'anrghg' ),
			array( 'anchors'                , __( 'Anchors', 'anrghg' ) ),
			array( 'tooltips'               , __( 'Anchor tooltips', 'anrghg' ) ),
			array( 'tooltip_position'       , __( 'Tooltip position', 'anrghg' ) ),
			array( 'tooltip_aspect'         , __( 'Tooltip aspect', 'anrghg' ) ),
			array( 'backlinks'              , __( 'Backlinks', 'anrghg' ) ),
			array( 'backlink_tooltip_aspect', __( 'Backlinks', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Tooltip aspect', 'anrghg' ) ),
			array( 'lists'                  , __( 'Lists', 'anrghg' ) )
		),
		anrghg_toc_section( 'references'       , __( 'Reference list', 'anrghg' ) ),
		// The rest is quick access.
		anrghg_toc_section( 'id_anrghg_css_smooth_scrolling'          , __( 'Scrolling (smooth, offset)', 'anrghg' ), true ),
		anrghg_toc_section( 'id_anrghg_web_fonts_active'              , __( 'Web fonts', 'anrghg' ), true ),
		anrghg_toc_section( 'id_anrghg_slug_body_class_active'        , __( 'Slug body class', 'anrghg' ), true ),
		anrghg_toc_section( 'id_anrghg_fragment_ids_support_titlecase', __( 'Conversions for slug readability', 'anrghg' ), true ),
		anrghg_toc_section( 'id_anrghg_allow_html_term_description'   , __( 'HTML term descriptions', 'anrghg' ), true ),
		anrghg_toc_section( 'id_anrghg_wptexturize_active'            , __( 'WPTexturize', 'anrghg' ), true ),
		anrghg_toc_section( 'id_anrghg_url_wrap'                      , __( 'URL line wrap', 'anrghg' ), true )
		// phpcs:enable
		// phpcs:disable Squiz.Commenting.FunctionComment.SpacingAfterParamType
		// phpcs:disable Squiz.Commenting.FunctionComment.ParamCommentFullStop
	);

	/**
	 * Form body.
	 */
	do_settings_sections( 'anrghg' );
	$l_s_output  = '<div class="bottom-spacer"></div>';
	$l_s_output .= '<div class="submit">';
	anrghg_kses_echo( $l_s_output );
	wp_nonce_field( 'anrghg_settings_nonce', 'anrghg_settings_nonce' );
	submit_button( __( 'Save Changes' ) );
	echo wp_kses( "</div></form></div><!--.wrap-->\r\n", anrghg_get_ui_whitelist() );

	/**
	 * Settings form internal JavaScript.
	 *
	 * @since 0.9.0
	 * @since 0.81.7 Replace less-than comparisons with greater-than
	 * and start passing internal JS through `wp_strip_all_tags()`,
	 * called by `anrghg_protected_echo()`, like what is done for
	 * CSS @since 0.81.5.
	 */
	echo wp_kses( "\r\n<script>", array( 'script' => true ) );
	anrghg_protected_echo(
		anrghg_minilight(
			'js',
			"

				const
					reusablesBackupSwitch = document.getElementById('anrghg_keep_reusables_history'),
					fullReusablesHistory  = document.getElementById('full_reusables_history'),
					noReusablesHistory    = document.getElementById('no_reusables_history'),
					settingsBackupSwitch  = document.getElementById('anrghg_keep_settings_history'),
					fullSettingsHistory   = document.getElementById('full_settings_history'),
					noSettingsHistory     = document.getElementById('no_settings_history'),
					dateCheckboxes        = document.querySelectorAll('
						#anrghg_dates_post_top_modif,
						#anrghg_dates_page_top_modif,
						#anrghg_dates_post_top_publi,
						#anrghg_dates_page_top_publi,
						#anrghg_dates_post_end_modif,
						#anrghg_dates_page_end_modif,
						#anrghg_dates_post_end_publi,
						#anrghg_dates_page_end_publi
					'),
					radiobutton          = document.getElementById('anrghg_dates_label_uni_0'),
					rows                 = document.querySelectorAll('
						.anrghg_dates_label_post_top_modif,
						.anrghg_dates_label_page_top_modif,
						.anrghg_dates_label_post_top_publi,
						.anrghg_dates_label_page_top_publi,
						.anrghg_dates_label_post_end_modif,
						.anrghg_dates_label_page_end_modif,
						.anrghg_dates_label_post_end_publi,
						.anrghg_dates_label_page_end_publi
					')
				;

				reusablesBackupSwitch.onchange = function() {
					if ( reusablesBackupSwitch.checked ) {
						fullReusablesHistory.style.display = 'block';
						noReusablesHistory.style.display = 'none';
					} else {
						fullReusablesHistory.style.display = 'none';
						noReusablesHistory.style.display = 'block';
					}
				};

				settingsBackupSwitch.onchange = function() {
					if ( settingsBackupSwitch.checked ) {
						fullSettingsHistory.style.display = 'block';
						noSettingsHistory.style.display = 'none';
					} else {
						fullSettingsHistory.style.display = 'none';
						noSettingsHistory.style.display = 'block';
					}
				};

				radiobutton.onchange = function() {
					document.getElementById('unified_labels').style.visibility = 'visible';
					for ( let i = 0; 8 > i; i++ ) {
						rows[i].style.visibility = 'collapse';
					}
				};

				document.getElementById('anrghg_dates_label_uni_1').onchange = function() {
					document.getElementById('unified_labels').style.visibility = 'collapse';
					for ( let i = 0; 8 > i; i++ ) {
						dateCheckboxes[i].checked ?
							rows[i].style.visibility = 'visible' :
							rows[i].style.visibility = 'collapse'
						;
					}
				};

				document.getElementById('dates_scope').onclick = function() {
					if ( ! radiobutton.checked ) {
						for ( let i = 0; 8 > i; i++ ) {
							dateCheckboxes[i].checked ?
								rows[i].style.visibility = 'visible' :
								rows[i].style.visibility = 'collapse'
							;
						}
					}
				};

				document.getElementById('date_meta_tag_checkboxes').onclick = function() {
					let boxes = [
						'anrghg_date_meta_common_published',
						'anrghg_date_meta_common_last_edit',
						'anrghg_date_meta_open_g_published',
						'anrghg_date_meta_open_g_last_edit'
					];
					let tags = [
						'pre_meta_common_published',
						'pre_meta_common_last_edit',
						'pre_meta_open_g_published',
						'pre_meta_open_g_last_edit'
					];
					let tag = '';
					for ( let i = 0; 4 > i; i++ ) {
						tag = document.getElementById( tags[i] );
						document.getElementById( boxes[i] ).checked ?
							tag.style.display = 'block' :
							tag.style.display = 'none'
						;
					}
				};

			"
		)
	);
	echo wp_kses( "\r\n</script>\r\n", array( 'script' => true ) );
}
