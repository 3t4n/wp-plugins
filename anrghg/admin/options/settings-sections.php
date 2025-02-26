<?php
/**
 * Options page 2: Settings sections.
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
 * Settings sections.
 *
 * @since 0.9.0
 * The order in this function determines the layout order on the Settings page.
 *
 * Set the 2nd argument of `anrghg_add_settings_field()` to `false` if the label
 * of a particular field should not select the field. WordPress does that if the
 * field is a radio button group.
 *
 * Don’t use `esc_html_e()` as it breaks the code, and criminalizes translators.
 *
 * Setting default values in `register_setting()` did not work; instead they are
 * now used as fallbacks when defining the constants used throughout.
 *
 * The first argument (`$option_group`) of `register_setting()` must be equal to
 * the second (`$option_name`): “an easy solution is to make $option_group match
 * $option_name.”
 * @link https://wordpress.stackexchange.com/a/140071
 * @link https://wordpress.stackexchange.com/questions/139660/error-options-page-not-found-on-settings-page-submission-for-an-oop-plugin
 * @link https://core.trac.wordpress.org/ticket/7277
 * It must also be equal to the page slug defined in `add_{menu|options}_page()`.
 * @link https://wordpress.stackexchange.com/a/316063
 * @return void
 */
function anrghg_settings_sections() {
	global $g_a_anrghg_config;
	$l_s_option_name  = 'anrghg';
	$l_s_option_group = $l_s_option_name;
	register_setting( $l_s_option_group, $l_s_option_name );

	$l_s_class = 'main';

	$l_s_heading = __( 'Security', 'anrghg' );
	$l_s_section = 'anrghg_security';
	$l_s_head_id = $l_s_section;
	anrghg_add_settings_section(
		$l_s_heading,
		$l_s_section
	);

	anrghg_add_settings_field(
		__( 'Login control constant', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_login_control_constant_end'
	);

	anrghg_add_settings_field(
		__( 'Login page profile', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_login_deactivation_profile'
	);

	anrghg_add_settings_field(
		__( 'Edit auth cookie lifespan', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_auth_duration_edit'
	);

	anrghg_add_settings_field(
		__( 'Lifespan duration in days', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_auth_expiration_days'
	);

	$l_s_heading = __( 'Backup', 'anrghg' );
	$l_s_section = 'anrghg_backup';
	$l_s_head_id = $l_s_section;
	anrghg_add_settings_section(
		$l_s_heading,
		$l_s_section
	);

	anrghg_add_settings_field(
		sprintf(
			// Translators: %s: ‘Templates’ or ‘Settings’.
			__( 'Backup of %s', 'anrghg' ),
			__( 'Templates' )
		),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_keep_reusables_history'
	);

	anrghg_add_settings_field(
		sprintf(
			// Translators: %s: ‘Templates’ or ‘Settings’.
			__( 'Backup of %s', 'anrghg' ),
			__( 'Settings' )
		),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_keep_settings_history'
	);

	$l_s_heading = __( 'User interface', 'anrghg' );
	$l_s_section = 'anrghg_user_interface';
	$l_s_head_id = $l_s_section;
	anrghg_add_settings_section(
		$l_s_heading,
		$l_s_section
	);

	anrghg_add_settings_field(
		__( 'Post Meta box settings' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_meta_box_active',
		'anrghg_meta_box_published_first',
		'anrghg_meta_box_thank_you_message',
		'anrghg_meta_box_contents_insert',
		'anrghg_meta_box_contents_alignment',
		'anrghg_meta_box_contents_label',
		'anrghg_meta_box_contents_collapse',
		'anrghg_meta_box_complements_process_active',
		'anrghg_meta_box_complements_writing_dir',
		'anrghg_meta_box_complement_delimiters',
		'anrghg_meta_box_complement_list_labels',
		'anrghg_meta_box_complement_list_collapse',
		'anrghg_meta_box_complement_list_footer_defer'
	);

	anrghg_add_settings_field(
		__( 'Gutenberg blocks', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_thank_you_block',
		'anrghg_table_of_contents_block',
		'anrghg_complements_block',
		'anrghg_references_block',
		'anrghg_include_block',
		'anrghg_block_setting_elements'
	);

	anrghg_add_settings_field(
		__( 'Template editor', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_template_editor_tinymce_active',
		'anrghg_template_editor_line_break_on_enter',
		'anrghg_template_editor_list_rich_text_view',
		'anrghg_template_editor_move_into_text_mode',
		'anrghg_template_editor_unescape_pointy_brack'
	);

	anrghg_add_settings_field(
		__( 'Menu level and submenu items', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_menu_level',
		'anrghg_menu_item_template_editor',
		'anrghg_menu_item_settings_page',
		'anrghg_menu_item_format_conversion',
		'anrghg_menu_items_export_import'
	);

	anrghg_add_settings_field(
		__( 'Menu position', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_menu_position'
	);

	anrghg_add_settings_field(
		__( 'Settings verbosity', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_settings_display_information'
	);

	anrghg_add_settings_field(
		__( 'Settings tab navigability', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_settings_tab_nav'
	);

	$l_s_heading = __( 'Localization', 'anrghg' );
	$l_s_section = 'anrghg_localization';
	$l_s_head_id = $l_s_section;
	anrghg_add_settings_section(
		$l_s_heading,
		$l_s_section
	);

	anrghg_add_settings_field(
		__( 'Synergy with WordPress Core', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_sync_i18n_with_wordpress_core'
	);

	anrghg_add_settings_field(
		__( 'Titlecase in URL identifiers', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_fragment_ids_support_titlecase'
	);

	anrghg_add_settings_field(
		__( 'Increase identifier legibility', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_additional_id_conversions',
		'anrghg_fragment_ids_more_conversions',
		'anrghg_fragment_ids_remove_accents'
	);

	anrghg_add_settings_field(
		__( 'ID maximum length', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_fragment_identifier_max_length'
	);

	anrghg_add_settings_field(
		__( 'Alternative slug generation', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_alternative_sanitize_title_active'
	);

	anrghg_add_settings_field(
		__( 'Fragment identifier separator', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_fragment_id_separator'
	);

	anrghg_add_settings_field(
		__( 'WPTexturize', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_wptexturize_active'
	);

	$l_s_heading = __( 'Interoperability', 'anrghg' );
	$l_s_section = 'anrghg_interoperability';
	$l_s_head_id = $l_s_section;
	anrghg_add_settings_section(
		$l_s_heading,
		$l_s_section
	);

	anrghg_add_settings_field(
		__( 'Line-wrap long URLs', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_url_wrap'
	);

	anrghg_add_settings_field(
		__( 'HTML in term descriptions', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_allow_html_term_description'
	);

	anrghg_add_settings_field(
		__( 'Elementor test mode', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_activate_elementor_test_mode'
	);

	anrghg_add_settings_field(
		__( 'Advanced Custom Fields', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_filter_acf_the_content_hook'
	);

	anrghg_add_settings_field(
		__( 'Support alternative content hooks', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_additional_content_hooks'
	);

	$l_s_heading = __( 'User experience', 'anrghg' );
	$l_s_section = 'anrghg_user_xp';
	$l_s_head_id = $l_s_section;
	anrghg_add_settings_section(
		$l_s_heading,
		$l_s_section
	);

	anrghg_add_settings_field(
		__( 'CSS smooth scrolling', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_css_smooth_scrolling'
	);

	anrghg_add_settings_field(
		__( 'Scroll offset', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_css_scroll_offset'
	);

	anrghg_add_settings_field(
		__( 'Generic mobile breakpoint', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_general_mobile_breakpoint'
	);

	anrghg_add_settings_field(
		__( 'Generic list margins', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_list_wrapper_margin_top',
		'anrghg_list_wrapper_margin_bottom'
	);

	$l_s_heading = __( 'Customization', 'anrghg' );
	$l_s_section = 'anrghg_customize';
	$l_s_head_id = $l_s_section;
	anrghg_add_settings_section(
		$l_s_heading,
		$l_s_section
	);

	anrghg_add_settings_field(
		__( 'Web fonts', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_web_fonts_active',
		'anrghg_web_font_urls'
	);

	anrghg_add_settings_field(
		__( 'URL slug as a CSS selector', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_slug_body_class_active',
		'anrghg_slug_body_class_prefix'
	);

	$l_s_heading = __( 'Include HTML partials', 'anrghg' );
	$l_s_section = 'anrghg_include';
	$l_s_head_id = $l_s_section;
	anrghg_add_settings_section(
		$l_s_heading,
		$l_s_section
	);

	anrghg_add_settings_field(
		__( 'Base directory', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_include_base_directory'
	);

	anrghg_add_settings_field(
		__( 'Placeholder for the classes', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_include_classes_placeholder'
	);

	anrghg_add_settings_field(
		__( 'Placeholder for the value', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_include_value_placeholder'
	);

	anrghg_add_settings_field(
		__( 'Security HTML filter', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_include_html_filter_active'
	);

	$l_s_heading = __( 'Excerpts', 'anrghg' );
	$l_s_section = 'anrghg_excerpts';
	$l_s_head_id = $l_s_section;
	anrghg_add_settings_section(
		$l_s_heading,
		$l_s_section
	);

	anrghg_add_settings_field(
		_x( 'Clean automatic excerpts', '‘Clean’: adjective', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_clean_auto_excerpts'
	);

	anrghg_add_settings_field(
		sprintf(
			// Translators: %s: ‘automatic’ or ‘manual’.
			__( 'Filter %s excerpts', 'anrghg' ),
			// .
			_x( 'automatic', 'excerpts', 'anrghg' )
		),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_apply_the_content_auto_excerpts'
	);

	anrghg_add_settings_field(
		sprintf(
			// Translators: %s: ‘automatic’ or ‘manual’.
			__( 'Filter %s excerpts', 'anrghg' ),
			// .
			_x( 'manual', 'excerpts', 'anrghg' )
		),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_apply_the_content_manual_excerpts'
	);

	$l_s_heading = __( 'Thank You message', 'anrghg' );
	$l_s_section = 'anrghg_thank_you';
	$l_s_head_id = $l_s_section;
	anrghg_add_settings_section(
		$l_s_heading,
		$l_s_section
	);

	anrghg_add_settings_field(
		__( 'Basic behavior', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_thank_you_active'
	);

	anrghg_add_settings_field(
		__( 'Display on home page', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_thank_you_display_on_home'
	);

	anrghg_add_settings_field(
		__( 'Content' ) . C_S_ANRGHG_DASH . __( 'All Posts' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_thank_you_content'
	);

	anrghg_add_settings_field(
		__( 'Content' ) . C_S_ANRGHG_DASH . __( 'All Pages' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_thank_you_content_page'
	);

	anrghg_add_settings_field(
		__( 'Template selection', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_thank_you_select_list'
	);

	anrghg_add_settings_field(
		__( 'Default Style' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_thank_you_default_style'
	);

	anrghg_add_settings_field(
		__( 'Priority' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_thank_you_priority_select',
		'anrghg_thank_you_priority_input'
	);

	$l_s_subheading = __( 'Aspect', 'anrghg' );
	$l_s_subsection = 'anrghg_aspect';
	$l_s_section    = $l_s_subsection . '_' . substr( $l_s_head_id, 6 );
	anrghg_add_settings_subsection(
		$l_s_subheading,
		$l_s_heading,
		$l_s_section
	);

	anrghg_add_settings_field(
		__( 'Font size' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_thank_you_font_size_option',
		'anrghg_thank_you_font_size_px',
		'anrghg_thank_you_font_size_em',
		'anrghg_thank_you_font_size_rem'
	);

	anrghg_add_settings_field(
		__( 'Color' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_thank_you_foreground_color',
		'anrghg_thank_you_background_color'
	);

	anrghg_add_settings_field(
		__( 'Border' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_thank_you_border_width',
		'anrghg_thank_you_border_style',
		'anrghg_thank_you_border_radius',
		'anrghg_thank_you_border_color'
	);

	anrghg_add_settings_field(
		__( 'Shadow', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_thank_you_shadow_x_offset',
		'anrghg_thank_you_shadow_y_offset',
		'anrghg_thank_you_shadow_blur',
		'anrghg_thank_you_shadow_spread',
		'anrghg_thank_you_shadow_color'
	);

	anrghg_add_settings_field(
		__( 'Padding' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_thank_you_padding_top',
		'anrghg_thank_you_padding_start',
		'anrghg_thank_you_padding_end',
		'anrghg_thank_you_padding_bottom'
	);

	anrghg_add_settings_field(
		__( 'Margin' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_thank_you_margin_top',
		'anrghg_thank_you_margin_start',
		'anrghg_thank_you_margin_end',
		'anrghg_thank_you_margin_bottom'
	);

	$l_s_heading = __( 'Date information', 'anrghg' );
	$l_s_section = 'anrghg_dates';
	$l_s_head_id = $l_s_section;
	anrghg_add_settings_section(
		$l_s_heading,
		$l_s_section
	);

	anrghg_add_settings_field(
		__( 'Activate and scope', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_dates_active',
		'anrghg_dates_post_top_modif',
		'anrghg_dates_page_top_modif',
		'anrghg_dates_post_end_modif',
		'anrghg_dates_page_end_modif',
		'anrghg_dates_post_top_publi',
		'anrghg_dates_page_top_publi',
		'anrghg_dates_post_end_publi',
		'anrghg_dates_page_end_publi'
	);

	anrghg_add_settings_field(
		__( 'Chronological order', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_dates_post_top_chrono',
		'anrghg_dates_page_top_chrono',
		'anrghg_dates_post_end_chrono',
		'anrghg_dates_page_end_chrono'
	);

	anrghg_add_settings_field(
		__( 'Label' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_dates_label_uni',
		'anrghg_dates_label_modified',
		'anrghg_dates_label_published'
	);

	anrghg_add_settings_field(
		__( 'Label' ) . C_S_ANRGHG_DASH . __( 'Last Modified' ) . C_S_ANRGHG_DASH . __( 'Top' ) . C_S_ANRGHG_DASH . __( 'All Posts' ),
		true,
		'anrghg_dates_label_post_top_modif',
		$l_s_section,
		'anrghg_dates_label_post_top_modif'
	);

	anrghg_add_settings_field(
		__( 'Label' ) . C_S_ANRGHG_DASH . __( 'Last Modified' ) . C_S_ANRGHG_DASH . __( 'Top' ) . C_S_ANRGHG_DASH . __( 'All Pages' ),
		true,
		'anrghg_dates_label_page_top_modif',
		$l_s_section,
		'anrghg_dates_label_page_top_modif'
	);

	anrghg_add_settings_field(
		__( 'Label' ) . C_S_ANRGHG_DASH . __( 'Last Modified' ) . C_S_ANRGHG_DASH . __( 'Bottom' ) . C_S_ANRGHG_DASH . __( 'All Posts' ),
		true,
		'anrghg_dates_label_post_end_modif',
		$l_s_section,
		'anrghg_dates_label_post_end_modif'
	);

	anrghg_add_settings_field(
		__( 'Label' ) . C_S_ANRGHG_DASH . __( 'Last Modified' ) . C_S_ANRGHG_DASH . __( 'Bottom' ) . C_S_ANRGHG_DASH . __( 'All Pages' ),
		true,
		'anrghg_dates_label_page_end_modif',
		$l_s_section,
		'anrghg_dates_label_page_end_modif'
	);

	anrghg_add_settings_field(
		__( 'Label' ) . C_S_ANRGHG_DASH . __( 'Published' ) . C_S_ANRGHG_DASH . __( 'Top' ) . C_S_ANRGHG_DASH . __( 'All Posts' ),
		true,
		'anrghg_dates_label_post_top_publi',
		$l_s_section,
		'anrghg_dates_label_post_top_publi'
	);

	anrghg_add_settings_field(
		__( 'Label' ) . C_S_ANRGHG_DASH . __( 'Published' ) . C_S_ANRGHG_DASH . __( 'Top' ) . C_S_ANRGHG_DASH . __( 'All Pages' ),
		true,
		'anrghg_dates_label_page_top_publi',
		$l_s_section,
		'anrghg_dates_label_page_top_publi'
	);

	anrghg_add_settings_field(
		__( 'Label' ) . C_S_ANRGHG_DASH . __( 'Published' ) . C_S_ANRGHG_DASH . __( 'Bottom' ) . C_S_ANRGHG_DASH . __( 'All Posts' ),
		true,
		'anrghg_dates_label_post_end_publi',
		$l_s_section,
		'anrghg_dates_label_post_end_publi'
	);

	anrghg_add_settings_field(
		__( 'Label' ) . C_S_ANRGHG_DASH . __( 'Published' ) . C_S_ANRGHG_DASH . __( 'Bottom' ) . C_S_ANRGHG_DASH . __( 'All Pages' ),
		true,
		'anrghg_dates_label_page_end_publi',
		$l_s_section,
		'anrghg_dates_label_page_end_publi'
	);

	anrghg_add_settings_field(
		sprintf(
			// Translators: %s: ‘Published first’ information.
			__( '%s prefills', 'anrghg' ),
			// .
			__( '‘Published first’ information', 'anrghg' )
		),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_published_first_top_prefill',
		'anrghg_published_first_end_prefill'
	);

	anrghg_add_settings_field(
		__( 'Priority' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_dates_priority_select',
		'anrghg_dates_priority_input'
	);

	$l_s_subheading = __( 'Aspect', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Top' ) . C_S_ANRGHG_DASH . __( 'All Posts' );
	$l_s_subsection = 'anrghg_post_top';
	$l_s_section    = $l_s_subsection . '_' . substr( $l_s_head_id, 6 );
	anrghg_add_settings_subsection(
		$l_s_subheading,
		$l_s_heading,
		$l_s_section
	);

	anrghg_add_settings_field(
		__( 'Text align', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_dates_post_top_text_align'
	);

	anrghg_add_settings_field(
		__( 'Margin' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_dates_post_top_margin_above',
		'anrghg_dates_post_top_margin_below'
	);

	anrghg_add_settings_field(
		__( 'Font size' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_dates_post_top_font_size_option',
		'anrghg_dates_post_top_font_size_px',
		'anrghg_dates_post_top_font_size_em',
		'anrghg_dates_post_top_font_size_rem'
	);

	anrghg_add_settings_field(
		__( 'Color' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_dates_post_top_color'
	);

	$l_s_subheading = __( 'Aspect', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Top' ) . C_S_ANRGHG_DASH . __( 'All Pages' );
	$l_s_subsection = 'anrghg_page_top';
	$l_s_section    = $l_s_subsection . '_' . substr( $l_s_head_id, 6 );
	anrghg_add_settings_subsection(
		$l_s_subheading,
		$l_s_heading,
		$l_s_section
	);

	anrghg_add_settings_field(
		__( 'Text align', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_dates_page_top_text_align'
	);

	anrghg_add_settings_field(
		__( 'Margin' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_dates_page_top_margin_above',
		'anrghg_dates_page_top_margin_below'
	);

	anrghg_add_settings_field(
		__( 'Font size' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_dates_page_top_font_size_option',
		'anrghg_dates_page_top_font_size_px',
		'anrghg_dates_page_top_font_size_em',
		'anrghg_dates_page_top_font_size_rem'
	);

	anrghg_add_settings_field(
		__( 'Color' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_dates_page_top_color'
	);

	$l_s_subheading = __( 'Aspect', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Bottom' ) . C_S_ANRGHG_DASH . __( 'All Posts' );
	$l_s_subsection = 'anrghg_post_end';
	$l_s_section    = $l_s_subsection . '_' . substr( $l_s_head_id, 6 );
	anrghg_add_settings_subsection(
		$l_s_subheading,
		$l_s_heading,
		$l_s_section
	);

	anrghg_add_settings_field(
		__( 'Text align', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_dates_post_end_text_align'
	);

	anrghg_add_settings_field(
		__( 'Margin' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_dates_post_end_margin_above',
		'anrghg_dates_post_end_margin_below'
	);

	anrghg_add_settings_field(
		__( 'Font size' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_dates_post_end_font_size_option',
		'anrghg_dates_post_end_font_size_px',
		'anrghg_dates_post_end_font_size_em',
		'anrghg_dates_post_end_font_size_rem'
	);

	anrghg_add_settings_field(
		__( 'Color' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_dates_post_end_color'
	);

	$l_s_subheading = __( 'Aspect', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Bottom' ) . C_S_ANRGHG_DASH . __( 'All Pages' );
	$l_s_subsection = 'anrghg_page_end';
	$l_s_section    = $l_s_subsection . '_' . substr( $l_s_head_id, 6 );
	anrghg_add_settings_subsection(
		$l_s_subheading,
		$l_s_heading,
		$l_s_section
	);

	anrghg_add_settings_field(
		__( 'Text align', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_dates_page_end_text_align'
	);

	anrghg_add_settings_field(
		__( 'Margin' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_dates_page_end_margin_above',
		'anrghg_dates_page_end_margin_below'
	);

	anrghg_add_settings_field(
		__( 'Font size' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_dates_page_end_font_size_option',
		'anrghg_dates_page_end_font_size_px',
		'anrghg_dates_page_end_font_size_em',
		'anrghg_dates_page_end_font_size_rem'
	);

	anrghg_add_settings_field(
		__( 'Color' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_dates_page_end_color'
	);

	$l_s_heading = __( 'Date meta tags', 'anrghg' );
	$l_s_section = 'anrghg_date_meta_tags';
	$l_s_head_id = $l_s_section;
	anrghg_add_settings_section(
		$l_s_heading,
		$l_s_section
	);

	anrghg_add_settings_field(
		__( 'Activate and scope', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_date_meta_tags_active',
		'anrghg_date_meta_common_last_edit',
		'anrghg_date_meta_open_g_last_edit',
		'anrghg_date_meta_common_published',
		'anrghg_date_meta_open_g_published'
	);

	$l_s_heading = __( 'Paragraph links', 'anrghg' );
	$l_s_section = 'anrghg_paragraph_links';
	$l_s_head_id = $l_s_section;
	anrghg_add_settings_section(
		$l_s_heading,
		$l_s_section
	);

	anrghg_add_settings_field(
		__( 'Activate' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_paragraph_links_active'
	);

	anrghg_add_settings_field(
		__( 'Symbol', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_paragraph_link_character_select',
		'anrghg_paragraph_link_character_input'
	);

	anrghg_add_settings_field(
		__( 'Plain tooltips', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_paragraph_link_plain_tooltip_active',
		'anrghg_paragraph_link_plain_tooltip_text'
	);

	anrghg_add_settings_field(
		__( 'ID maximum length', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_paragraph_identifier_max_length'
	);

	$l_s_heading = __( 'Heading links', 'anrghg' );
	$l_s_section = 'anrghg_heading_links';
	$l_s_head_id = $l_s_section;
	anrghg_add_settings_section(
		$l_s_heading,
		$l_s_section
	);

	anrghg_add_settings_field(
		__( 'Activate' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_heading_links_active'
	);

	anrghg_add_settings_field(
		__( 'Plain tooltips', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_heading_link_plain_tooltip_active',
		'anrghg_heading_link_plain_tooltip_text'
	);

	// Translators: This string is not used if syncing with WordPress Core is active.
	$l_s_heading = anrghg_i18n( __( 'Table of contents' ), __( 'Table of contents', 'anrghg' ) );
	$l_s_section = 'anrghg_table_of_contents';
	$l_s_head_id = $l_s_section;
	anrghg_add_settings_section(
		$l_s_heading,
		$l_s_section
	);

	anrghg_add_settings_field(
		__( 'Activate' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_table_of_contents_active'
	);

	anrghg_add_settings_field(
		__( 'Minimum number of headings', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_table_of_contents_min_number'
	);

	anrghg_add_settings_field(
		__( 'Depth', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_table_of_contents_depth'
	);

	anrghg_add_settings_field(
		__( 'Heading number position', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_heading_number_position'
	);

	anrghg_add_settings_field(
		__( 'Plain tooltips', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_heading_backlink_plain_tooltip_active',
		'anrghg_heading_backlink_plain_tooltip_text'
	);

	anrghg_add_settings_field(
		__( 'Label' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_table_of_contents_label'
	);

	anrghg_add_settings_field(
		__( 'Collapsing', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_table_of_contents_collapsing'
	);

	anrghg_add_settings_field(
		__( 'Alignment' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_table_of_contents_alignment'
	);

	anrghg_add_settings_field(
		__( 'Default position', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_table_of_contents_position'
	);

	anrghg_add_settings_field(
		__( 'Positioner code name', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_table_of_contents_positioner_name'
	);

	anrghg_add_settings_field(
		__( 'ID prefix', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_table_of_contents_heading_id_prefix'
	);

	anrghg_add_settings_field(
		__( 'Top level heading font weight', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_table_of_contents_top_heading_bold'
	);

	anrghg_add_settings_field(
		__( 'Indent' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_table_of_contents_stepped_indentation',
		'anrghg_table_of_contents_desktop_indent_px',
		'anrghg_table_of_contents_mobile_indent_px'
	);

	anrghg_add_settings_field(
		__( 'Exclude labels of generated lists', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_table_of_contents_exclude_generated'
	);

	anrghg_add_settings_field(
		__( 'Priority' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_fragment_identifiers_priority_select',
		'anrghg_fragment_identifiers_priority_input'
	);

	$l_s_heading = __( 'Notes and sources', 'anrghg' );
	$l_s_section = 'anrghg_notes_and_sources';
	$l_s_head_id = $l_s_section;
	anrghg_add_settings_section(
		$l_s_heading,
		$l_s_section
	);

	anrghg_add_settings_field(
		__( 'Activate' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_complements_active'
	);

	anrghg_add_settings_field(
		__( 'Exclude' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_complements_excluded_posts'
	);

	anrghg_add_settings_field(
		__( 'Delimiter syntax error warning', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_complements_syntax_warning'
	);

	anrghg_add_settings_field(
		__( 'Delimiters', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Notes', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_note_delimiter_preset',
		'anrghg_easy_note_start',
		'anrghg_easy_note_end',
		'anrghg_safe_note_start',
		'anrghg_safe_note_end',
		'anrghg_free_note_start',
		'anrghg_free_note_end'
	);

	anrghg_add_settings_field(
		__( 'Delimiters', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Sources', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_source_delimiter_preset',
		'anrghg_easy_source_start',
		'anrghg_easy_source_end',
		'anrghg_safe_source_start',
		'anrghg_safe_source_end',
		'anrghg_free_source_start',
		'anrghg_free_source_end'
	);

	anrghg_add_settings_field(
		__( 'Delimiters', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Name', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_name_delimiter_preset',
		'anrghg_easy_name_start',
		'anrghg_easy_name_end',
		'anrghg_safe_name_start',
		'anrghg_safe_name_end',
		'anrghg_free_name_start',
		'anrghg_free_name_end'
	);

	anrghg_add_settings_field(
		__( 'Automatically cut posts into sections', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_subheadings_as_section_dividers'
	);

	anrghg_add_settings_field(
		sprintf(
			// Translators: %s: Notes and sources.
			__( 'Process %s in widgets', 'anrghg' ),
			// .
			__( 'Notes and sources', 'anrghg' )
		),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_process_complements_in_widgets'
	);

	anrghg_add_settings_field(
		__( 'Section end delimiter', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_complement_section_end_name'
	);

	$l_s_subheading = __( 'Anchors', 'anrghg' );
	$l_s_subsection = 'anrghg_anchors';
	$l_s_section    = $l_s_subsection . '_' . substr( $l_s_head_id, 6 );
	anrghg_add_settings_subsection(
		$l_s_subheading,
		$l_s_heading,
		$l_s_section
	);

	anrghg_add_settings_field(
		sprintf(
			// Translators: %s: Notes, Sources, or References.
			__( 'Numbering system for %s', 'anrghg' ),
			// .
			__( 'Notes', 'anrghg' )
		),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_note_numbering_system'
	);

	anrghg_add_settings_field(
		sprintf(
			// Translators: %s: Notes, Sources, or References.
			__( 'Numbering system for %s', 'anrghg' ),
			// .
			__( 'Sources', 'anrghg' )
		),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_source_numbering_system'
	);

	anrghg_add_settings_field(
		sprintf(
			// Translators: %s: Notes and sources.
			__( 'Combine identical %s', 'anrghg' ),
			// .
			__( 'Notes and sources', 'anrghg' )
		),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_combine_identical_complements'
	);

	anrghg_add_settings_field(
		__( 'Word joiner prefix', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_complement_anchor_prefix_word_joiner'
	);

	anrghg_add_settings_field(
		__( 'Bracketing characters', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_note_anchor_prefix',
		'anrghg_note_anchor_suffix',
		'anrghg_source_anchor_prefix',
		'anrghg_source_anchor_suffix'
	);

	anrghg_add_settings_field(
		__( 'Accessibility', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_note_anchor_aria_label',
		'anrghg_source_anchor_aria_label'
	);

	anrghg_add_settings_field(
		__( 'Separator', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_adjacent_complement_anchor_separator'
	);

	anrghg_add_settings_field(
		__( 'ID prefix', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_complement_anchor_url_id_prefix'
	);

	anrghg_add_settings_field(
		__( 'Spacing', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_complement_anchor_spacing',
		'anrghg_complement_anchor_padding'
	);

	$l_s_subheading = __( 'Anchor tooltips', 'anrghg' );
	$l_s_subsection = 'anrghg_tooltips';
	$l_s_section    = $l_s_subsection . '_' . substr( $l_s_head_id, 6 );
	anrghg_add_settings_subsection(
		$l_s_subheading,
		$l_s_heading,
		$l_s_section
	);

	anrghg_add_settings_field(
		__( 'Activate' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_anchor_tooltips_active'
	);

	anrghg_add_settings_field(
		__( 'Display on tap', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_display_anchor_tooltips_on_tap'
	);

	anrghg_add_settings_field(
		__( 'Tooltip end delimiter', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_tooltip_delimiter_preset',
		'anrghg_easy_tooltip_end',
		'anrghg_safe_tooltip_end',
		'anrghg_free_tooltip_end'
	);

	anrghg_add_settings_field(
		__( 'List link delimiters', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_list_link_delimiter_preset',
		'anrghg_easy_list_link_start',
		'anrghg_easy_list_link_end',
		'anrghg_safe_list_link_start',
		'anrghg_safe_list_link_end',
		'anrghg_free_list_link_start',
		'anrghg_free_list_link_end'
	);

	anrghg_add_settings_field(
		sprintf(
			// Translators: %s: Notes or Sources.
			__( 'Read more link in dedicated %s tooltips', 'anrghg' ),
			// .
			__( 'Notes', 'anrghg' )
		),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_note_tooltip_list_link_active',
		'anrghg_note_tooltip_list_link_text'
	);

	anrghg_add_settings_field(
		sprintf(
			// Translators: %s: Notes or Sources.
			__( 'Read more link in dedicated %s tooltips', 'anrghg' ),
			// .
			__( 'Sources', 'anrghg' )
		),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_source_tooltip_list_link_active',
		'anrghg_source_tooltip_list_link_text'
	);

	anrghg_add_settings_field(
		__( 'Generic tooltips', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_generic_note_tooltip_active',
		'anrghg_generic_note_tooltip_content',
		'anrghg_generic_source_tooltip_active',
		'anrghg_generic_source_tooltip_content'
	);

	$l_s_subheading = __( 'Tooltip position', 'anrghg' );
	$l_s_subsection = 'anrghg_tooltip_position';
	$l_s_section    = $l_s_subsection . '_' . substr( $l_s_head_id, 6 );
	anrghg_add_settings_subsection(
		$l_s_subheading,
		$l_s_heading,
		$l_s_section
	);

	anrghg_add_settings_field(
		__( 'Maximum width', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_small_anchor_tooltip_maximum_width'
	);

	anrghg_add_settings_field(
		__( 'Horizontal offset', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_small_anchor_tooltip_horizontal_edge',
		'anrghg_small_anchor_tooltip_horizontal_inset'
	);

	anrghg_add_settings_field(
		__( 'Vertical offset', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_small_anchor_tooltip_vertical_edge',
		'anrghg_small_anchor_tooltip_vertical_inset'
	);

	anrghg_add_settings_field(
		__( 'Length breakpoint', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_anchor_tooltip_str_length_breakpoint'
	);

	anrghg_add_settings_field(
		__( 'Mobile breakpoint', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_small_tooltip_mobile_breakpoint'
	);

	anrghg_add_settings_field(
		__( 'Scrollable', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_scrollable_anchor_tooltips',
		'anrghg_anchor_tooltip_maximum_height'
	);

	$l_s_subheading = __( 'Tooltip aspect', 'anrghg' );
	$l_s_subsection = 'anrghg_tooltip_aspect';
	$l_s_section    = $l_s_subsection . '_' . substr( $l_s_head_id, 6 );
	anrghg_add_settings_subsection(
		$l_s_subheading,
		$l_s_heading,
		$l_s_section
	);

	anrghg_add_settings_field(
		__( 'Timing', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_anchor_tooltip_fade_in_delay',
		'anrghg_anchor_tooltip_fade_in_duration',
		'anrghg_anchor_tooltip_fade_in_function',
		'anrghg_anchor_tooltip_fade_out_delay',
		'anrghg_anchor_tooltip_fade_out_duration',
		'anrghg_anchor_tooltip_fade_out_function'
	);

	anrghg_add_settings_field(
		__( 'Font size' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_anchor_tooltip_font_size'
	);

	anrghg_add_settings_field(
		__( 'Line height' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_anchor_tooltip_line_height'
	);

	anrghg_add_settings_field(
		__( 'Color' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_anchor_tooltip_foreground_color',
		'anrghg_anchor_tooltip_background_color'
	);

	anrghg_add_settings_field(
		__( 'Border' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_anchor_tooltip_border_width',
		'anrghg_anchor_tooltip_border_style',
		'anrghg_anchor_tooltip_border_radius',
		'anrghg_anchor_tooltip_border_color'
	);

	anrghg_add_settings_field(
		__( 'Shadow', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_anchor_tooltip_shadow_x_offset',
		'anrghg_anchor_tooltip_shadow_y_offset',
		'anrghg_anchor_tooltip_shadow_blur',
		'anrghg_anchor_tooltip_shadow_spread',
		'anrghg_anchor_tooltip_shadow_color'
	);

	anrghg_add_settings_field(
		__( 'Padding' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_anchor_tooltip_padding_top',
		'anrghg_anchor_tooltip_padding_start',
		'anrghg_anchor_tooltip_padding_end',
		'anrghg_anchor_tooltip_padding_bottom'
	);

	$l_s_subheading = __( 'Backlinks', 'anrghg' );
	$l_s_subsection = 'anrghg_backlinks';
	$l_s_section    = $l_s_subsection . '_' . substr( $l_s_head_id, 6 );
	anrghg_add_settings_subsection(
		$l_s_subheading,
		$l_s_heading,
		$l_s_section
	);

	anrghg_add_settings_field(
		__( 'Symbol', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_number_backlink_symbol_display',
		'anrghg_number_backlink_symbol_select',
		'anrghg_number_backlink_symbol_input'
	);

	anrghg_add_settings_field(
		__( 'Trailing backlink', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_tail_backlink_symbol_display',
		'anrghg_tail_backlink_symbol_select',
		'anrghg_tail_backlink_symbol_input'
	);

	anrghg_add_settings_field(
		__( 'Plain tooltips', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_backlink_plain_tooltip_mode',
		'anrghg_backlink_plain_tooltip_verbose',
		'anrghg_backlink_plain_tooltip_symbolic'
	);

	anrghg_add_settings_field(
		__( 'Rich backlink tooltips', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_backlink_rich_tooltip_first',
		'anrghg_backlink_rich_tooltip_last'
	);

	$l_s_subheading = __( 'Backlinks', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Tooltip aspect', 'anrghg' );
	$l_s_subsection = 'anrghg_backlink_tooltip_aspect';
	$l_s_section    = $l_s_subsection . '_' . substr( $l_s_head_id, 6 );
	anrghg_add_settings_subsection(
		$l_s_subheading,
		$l_s_heading,
		$l_s_section
	);

	anrghg_add_settings_field(
		__( 'Timing', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_backlink_tooltip_fade_in_delay',
		'anrghg_backlink_tooltip_fade_in_duration',
		'anrghg_backlink_tooltip_fade_in_function',
		'anrghg_backlink_tooltip_fade_out_delay',
		'anrghg_backlink_tooltip_fade_out_duration',
		'anrghg_backlink_tooltip_fade_out_function'
	);

	anrghg_add_settings_field(
		__( 'Color' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_backlink_tooltip_foreground_color',
		'anrghg_backlink_tooltip_background_color'
	);

	anrghg_add_settings_field(
		__( 'Border' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_backlink_tooltip_border_width',
		'anrghg_backlink_tooltip_border_style',
		'anrghg_backlink_tooltip_border_radius',
		'anrghg_backlink_tooltip_border_color'
	);

	anrghg_add_settings_field(
		__( 'Shadow', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_backlink_tooltip_shadow_x_offset',
		'anrghg_backlink_tooltip_shadow_y_offset',
		'anrghg_backlink_tooltip_shadow_blur',
		'anrghg_backlink_tooltip_shadow_spread',
		'anrghg_backlink_tooltip_shadow_color'
	);

	anrghg_add_settings_field(
		__( 'Padding' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_backlink_tooltip_padding_top',
		'anrghg_backlink_tooltip_padding_start',
		'anrghg_backlink_tooltip_padding_end',
		'anrghg_backlink_tooltip_padding_bottom'
	);

	$l_s_subheading = __( 'Lists', 'anrghg' );
	$l_s_subsection = 'anrghg_lists';
	$l_s_section    = $l_s_subsection . '_' . substr( $l_s_head_id, 6 );
	anrghg_add_settings_subsection(
		$l_s_subheading,
		$l_s_heading,
		$l_s_section
	);

	anrghg_add_settings_field(
		__( 'Priority' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_complement_priority_select',
		'anrghg_complement_priority_input'
	);

	anrghg_add_settings_field(
		__( 'Accessibility', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_note_list_number_aria_label',
		'anrghg_source_list_number_aria_label'
	);

	anrghg_add_settings_field(
		__( 'URL readability', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_note_url_id_prefix',
		'anrghg_source_url_id_prefix'
	);

	anrghg_add_settings_field(
		__( 'List group heading', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_complement_list_grouping_active',
		'anrghg_complement_list_group_heading'
	);

	anrghg_add_settings_field(
		sprintf(
			// Translators: %s: Element or Font size.
			__( 'Group heading %s', 'anrghg' ),
			__( 'element', 'anrghg' )
		),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_list_group_heading_element'
	);

	anrghg_add_settings_field(
		sprintf(
			// Translators: %s: Element or Font size.
			__( 'Group heading %s', 'anrghg' ),
			__( 'Font size' )
		),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_list_group_heading_font_size_option',
		'anrghg_list_group_heading_font_size_px',
		'anrghg_list_group_heading_font_size_em',
		'anrghg_list_group_heading_font_size_rem'
	);

	anrghg_add_settings_field(
		sprintf(
			// Translators: %s: Element or Font size.
			__( 'List label %s', 'anrghg' ),
			__( 'element', 'anrghg' )
		),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_complement_list_label_element'
	);

	anrghg_add_settings_field(
		sprintf(
			// Translators: %s: Element or Font size.
			__( 'List label %s', 'anrghg' ),
			__( 'Font size' )
		),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_complement_list_label_font_size_opt',
		'anrghg_complement_list_label_font_size_px',
		'anrghg_complement_list_label_font_size_em',
		'anrghg_complement_list_label_font_size_rem'
	);

	anrghg_add_settings_field(
		__( 'Labels', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Note list', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_note_list_label_aria_label',
		'anrghg_note_list_label_plural',
		'anrghg_note_list_label_dual',
		'anrghg_note_list_label_singular'
	);

	anrghg_add_settings_field(
		__( 'Labels', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Source list', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_source_list_label_aria_label',
		'anrghg_source_list_label_plural',
		'anrghg_source_list_label_dual',
		'anrghg_source_list_label_singular'
	);

	anrghg_add_settings_field(
		__( 'Layout', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Note list', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_note_list_layout'
	);

	anrghg_add_settings_field(
		__( 'Layout', 'anrghg' ) . C_S_ANRGHG_DASH . __( 'Source list', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_source_list_layout'
	);

	anrghg_add_settings_field(
		__( 'Collapsible behavior and collapsed state', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_note_list_collapsing',
		'anrghg_full_note_list_expand_from_anchor',
		'anrghg_source_list_collapsing',
		'anrghg_full_source_list_expand_from_anchor'
	);

	anrghg_add_settings_field(
		__( 'Footer deferral', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_complement_list_footer_deferral'
	);

	anrghg_add_settings_field(
		__( 'Automatic positioning in the footer', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_complement_list_output_buffer'
	);

	anrghg_add_settings_field(
		__( 'Display link URL as visible text in complement lists', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_display_urls_note_list',
		'anrghg_display_urls_source_list',
		'anrghg_display_urls_selectable'
	);

	$l_s_heading = __( 'Reference list', 'anrghg' );
	$l_s_section = 'anrghg_references';
	$l_s_head_id = $l_s_section;
	anrghg_add_settings_section(
		$l_s_heading,
		$l_s_section
	);

	anrghg_add_settings_field(
		__( 'Accessibility', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_reference_list_aria_label',
		'anrghg_reference_item_aria_label'
	);

	anrghg_add_settings_field(
		__( 'List label', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_reference_list_label'
	);

	anrghg_add_settings_field(
		sprintf(
			// Translators: %s: Element or Font size.
			__( 'List label %s', 'anrghg' ),
			__( 'element', 'anrghg' )
		),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_reference_list_label_element'
	);

	anrghg_add_settings_field(
		sprintf(
			// Translators: %s: Element or Font size.
			__( 'List label %s', 'anrghg' ),
			__( 'Font size' )
		),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_reference_list_label_font_size_option',
		'anrghg_reference_list_label_font_size_px',
		'anrghg_reference_list_label_font_size_em',
		'anrghg_reference_list_label_font_size_rem'
	);

	anrghg_add_settings_field(
		sprintf(
			// Translators: %s: Notes, Sources, or References.
			__( 'Numbering system for %s', 'anrghg' ),
			// .
			__( 'References', 'anrghg' )
		),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_reference_list_numbering_system'
	);

	anrghg_add_settings_field(
		__( 'Bullets', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_reference_list_bullet_active',
		'anrghg_reference_list_bullet_select',
		'anrghg_reference_list_bullet_input'
	);

	anrghg_add_settings_field(
		__( 'List item link', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_reference_item_link_active'
	);

	anrghg_add_settings_field(
		__( 'Number tooltip', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_reference_item_tooltip_text'
	);

	anrghg_add_settings_field(
		__( 'ID prefix', 'anrghg' ),
		true,
		$l_s_class,
		$l_s_section,
		'anrghg_reference_list_url_id_prefix'
	);

	anrghg_add_settings_field(
		__( 'Collapsible behavior and collapsed state', 'anrghg' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_reference_list_collapsing'
	);

	anrghg_add_settings_field(
		__( 'Priority' ),
		false,
		$l_s_class,
		$l_s_section,
		'anrghg_reference_list_priority_select',
		'anrghg_reference_list_priority_input'
	);
}
add_filter( 'admin_init', 'anrghg_settings_sections' );
