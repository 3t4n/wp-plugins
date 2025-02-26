<?php
/**
 * Administration.
 *
 * @since 0.14.1  Split off the main file.
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
 * @see ../COPYING.txt
 */

defined( 'ABSPATH' ) || exit( nl2br( "\r\n\r\n&nbsp; &nbsp; &nbsp; Sorry, this PHP file cannot be displayed in the browser." ) );

// phpcs:disable Squiz.Commenting.FunctionComment.SpacingAfterParamType
// phpcs:disable Squiz.Commenting.FunctionComment.ParamCommentFullStop

/**
 * Includes.
 *
 * @since 1.2.1
 * @since 1.5.5 Move Gutenberg blocks to new `blocks.php`.
 * @since 1.5.5 Move Post Meta box to new `metabox.php`.
 * @since 1.8.2 Split `admin/options/settings.php` into 8 files.
 * Web-based code editors may not be able to save big files.
 * The threshold was around 65.000 characters.
 */
require_once plugin_dir_path( __FILE__ ) . 'blocks.php';
require_once plugin_dir_path( __FILE__ ) . 'metabox.php';
require_once plugin_dir_path( __FILE__ ) . 'options/convert.php';
require_once plugin_dir_path( __FILE__ ) . 'options/export.php';
require_once plugin_dir_path( __FILE__ ) . 'options/import.php';
require_once plugin_dir_path( __FILE__ ) . 'options/settings-cb-access.php';
require_once plugin_dir_path( __FILE__ ) . 'options/settings-cb-interoperability.php';
require_once plugin_dir_path( __FILE__ ) . 'options/settings-cb-paragraphs.php';
require_once plugin_dir_path( __FILE__ ) . 'options/settings-cb-tooltips.php';
require_once plugin_dir_path( __FILE__ ) . 'options/settings-sections.php';
require_once plugin_dir_path( __FILE__ ) . 'options/settings-text.php';
require_once plugin_dir_path( __FILE__ ) . 'options/settings-ui.php';
require_once plugin_dir_path( __FILE__ ) . 'options/settings.php';
require_once plugin_dir_path( __FILE__ ) . 'options/templates.php';

/**
 * Syncs or does not sync i18n with WordPress Core.
 *
 * @since 1.6.5
 * @since 0.60.3 Start syncing strings with WordPress Core.
 * As of v1.6.4, 22.5% of Gettext string instances are in sync.
 * Syncing as many strings as possible allows to leverage every
 * translation effort made for WordPress Core consistently with
 * this being a plugin for WordPress.
 * @see * Internationalization and localization.
 * @link https://developer.wordpress.org/plugins/internationalization/how-to-internationalize-your-plugin/#add-text-domain-to-strings
 * The reference is first-in-list development version af_ZA.
 * @since 1.6.5
 * As synced strings may be suboptimal due to limited available
 * strings or translations may be under development, syncing is
 * mandatory only for widely supported extensively used strings
 * but not where it screws up things. Then while syncing is the
 * default, opting out is available.
 * @param  string $p_s_synced     Translated for WordPress.
 * @param  string $p_s_not_synced Translated for this plugin.
 * @return string $p_s_synced or $p_s_not_synced.
 */
function anrghg_i18n( $p_s_synced, $p_s_not_synced ) {
	if ( anrghg_apply_config( 'anrghg_sync_i18n_with_wordpress_core' ) ) {
		return $p_s_synced;
	} else {
		return $p_s_not_synced;
	}
}

/**
 * Displays login status in Admin bar.
 *
 * @since 1.5.0
 * @courtesy @iqbalrony
 * @link https://developer.wordpress.org/reference/hooks/admin_bar_menu/
 * @see wp-includes/admin-bar.php:95.
 * @since 1.5.1 Move icon to the end of Admin bar menus.
 * Priority PHP_INT_MAX rather than 500.
 * E.g. WPForms optional Admin bar menu has priority 999.
 * @global object $admin_bar         The object storing Admin bar items.
 * @global bool   $g_s_login_control_constant  Defined in a mini plugin.
 * @return void
 */
add_action(
	'admin_bar_menu',
	function( WP_Admin_Bar $admin_bar ) {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		global $g_s_login_control_constant;
		if ( ! defined( $g_s_login_control_constant ) ) {
			return;
		}
		if ( constant( $g_s_login_control_constant ) ) {

			$admin_bar->add_menu(
				array(
					'id'     => 'anrghg-wp-login-open',
					'title'  => '&#x26A0;', // ⚠.
					'parent' => null,
					'group'  => null,
					'meta'   => array(
						'title' => anrghg_i18n(
							__( 'Log In' ) . C_S_ANRGHG_DASH . __( 'Available' ) . C_S_ANRGHG_DASH . __( 'Always' ),
							// Translators: This string is not used if syncing with WordPress Core is active.
							__( 'Logging in is possible.', 'anrghg' )
						),
					),
				)
			);

		} else {

			$admin_bar->add_menu(
				array(
					'id'     => 'anrghg-wp-login-locked',
					'title'  => '&#x1F512;', // 🔒.
					'parent' => null,
					'group'  => null,
					'meta'   => array(
						'title' => anrghg_i18n(
							__( 'Log In' ) . C_S_ANRGHG_DASH . __( 'Off' ),
							// Translators: This string is not used if syncing with WordPress Core is active.
							__( 'Logging in is deactivated.', 'anrghg' )
						),
					),
				)
			);

		}
	},
	PHP_INT_MAX
);

/**
 * Gets the upgrade notice displayed on the plugin page.
 *
 * @since 0.27.2
 * @courtesy Andi Dittrich
 * @link https://andidittrich.com/2015/05/howto-upgrade-notice-for-wordpress-plugins.html
 * Formerly, the upgrade notice was displayed by default in this place.
 * This workaround reestablishes the legacy behavior, because else, the
 * upgrade notice is hidden in the UI and goes unnoticed in practice.
 * @link https://developer.wordpress.org/reference/hooks/in_plugin_update_message-file/
 *
 * @since 0.27.4 Fix trailing empty paragraph triggering an additional icon
 * instance below, due to the Upgrade Notice’s p tags interfering with the
 * default p tags. Easy fix: Delete closing p tag before closing div at l.589.
 * @see wp-admin/includes/update.php:479..589
 * @since 0.30.0 Add the 'Upgrade Notice' label as a fixed beginning.
 * Warning about the minor version upgrade requirement.
 *
 * WARNING: Upgrade notices about just bugfix releases will be ignored.
 * No upgrade notice is displayed, if the upgrade is not at least from
 * the preceding minor version. Incrementing to next minor is required.
 *
 * @param object $p_o_cur  Current plugin metadata.
 * @param object $p_o_new  New plugin metadata.
 * @return void
 */
add_filter(
	'in_plugin_update_message-' . plugin_basename( C_S_ANRGHG_PLUGIN ),
	function( $p_o_cur, $p_o_new ) {
		if ( isset( $p_o_new->upgrade_notice ) && 0 < strlen( trim( $p_o_new->upgrade_notice ) ) ) {
			$l_s_output  = C_S_ANRGHG_DASH . __( 'Upgrade Notice:', 'anrghg' );
			$l_s_output .= trim( $p_o_new->upgrade_notice );
			$l_s_output .= '<style>p:empty{display:none;}</style>';
			echo wp_kses( $l_s_output, anrghg_get_public_whitelist() );
		}
	},
	10,
	2
);

/**
 * Actions at plugin activation (provisional).
 *
 * @link https://developer.wordpress.org/plugins/plugin-basics/activation-deactivation-hooks/#activation
register_activation_hook( __FILE__, 'anrghg_activate' );
function anrghg_activate() {
}
 */

/**
 * Actions at plugin deactivation (provisional).
 *
 * @link https://developer.wordpress.org/plugins/plugin-basics/uninstall-methods/#method-1-register_uninstall_hook
register_uninstall_hook(__FILE__, 'anrghg_uninstall');
function anrghg_uninstall() {
}
 */

/**
 * Initializes the added Admin page names.
 *
 * @since 0.69.0
 * The page name is the first part of the page title.
 * @global array $g_a_anrghg_admin_page_names
 */
$g_a_anrghg_admin_page_names = array(
	'templt' => '',
	'config' => '',
	'conver' => '',
	'export' => '',
	'import' => '',
);

/**
 * Initializes the added Admin page titles.
 *
 * @since 0.62.9
 * The page title is the page name plus the name and version of the plugin.
 * @global array $g_a_anrghg_admin_page_titles
 */
$g_a_anrghg_admin_page_titles = $g_a_anrghg_admin_page_names;

/**
 * Defines the added Admin page endpoints.
 *
 * @since 0.62.8
 * @global array $g_a_anrghg_admin_page_endpoints
 */
$g_a_anrghg_admin_page_endpoints = array(
	'templt' => 'anrghg-templates',
	'config' => 'anrghg-config',
	'conver' => 'anrghg-convert',
	'export' => 'anrghg-export',
	'import' => 'anrghg-import',
);

/**
 * Defines the added Admin page slugs.
 *
 * @since 0.62.8
 * @global array $g_a_anrghg_admin_page_slugs
 */
$g_a_anrghg_admin_page_slugs = array(
	'sub' => array(
		// phpcs:disable Squiz.Strings.ConcatenationSpacing
		'templt' => 'tools.php?page='           . $g_a_anrghg_admin_page_endpoints['templt'],
		'config' => 'options-general.php?page=' . $g_a_anrghg_admin_page_endpoints['config'],
		'conver' => 'tools.php?page='           . $g_a_anrghg_admin_page_endpoints['conver'],
		'export' => 'tools.php?page='           . $g_a_anrghg_admin_page_endpoints['export'],
		'import' => 'tools.php?page='           . $g_a_anrghg_admin_page_endpoints['import'],
		// phpcs:enable Squiz.Strings.ConcatenationSpacing
	),
	'top' => array(
		'templt' => 'admin.php?page=' . $g_a_anrghg_admin_page_endpoints['templt'],
		'config' => 'admin.php?page=' . $g_a_anrghg_admin_page_endpoints['config'],
		'conver' => 'admin.php?page=' . $g_a_anrghg_admin_page_endpoints['conver'],
		'export' => 'admin.php?page=' . $g_a_anrghg_admin_page_endpoints['export'],
		'import' => 'admin.php?page=' . $g_a_anrghg_admin_page_endpoints['import'],
	),
);

/**
 * Determines the actual slug of a given page.
 *
 * @since 0.67.0
 * The current slug depends on the menu level, and on
 * whether export and import are part of the submenu.
 * @since 1.6.22 Fetch real-time configuration data.
 * @since 1.7.2 Debug if option does not exist or is empty.
 * @link https://core.trac.wordpress.org/ticket/51699
 * @param  string $p_s_key     Admin page name key.
 * @return string $l_s_current
 */
function anrghg_cur_slug( $p_s_key ) {
	global $g_a_anrghg_config, $g_a_anrghg_admin_page_slugs;
	$l_a_settings = get_option( 'anrghg', 'none' );
	if ( 'none' === $l_a_settings || empty( $l_a_settings ) ) {
		$l_a_settings = $g_a_anrghg_config;
	}
	if ( ( 'export' === $p_s_key || 'import' === $p_s_key )
	&& ! $l_a_settings['anrghg_menu_items_export_import']
	) {
		$l_s_current = $g_a_anrghg_admin_page_slugs['sub'][ $p_s_key ];
	} else {
		$l_s_menu_level = $l_a_settings['anrghg_menu_level'];
		$l_s_menu_level = ( 'none' === $l_s_menu_level ? 'sub' : $l_s_menu_level );
		$l_s_current    = $g_a_anrghg_admin_page_slugs[ $l_s_menu_level ][ $p_s_key ];
	}
	return $l_s_current;
}

/**
 * Adds complementary links to the plugin’s list entry.
 *
 * @since 0.30.0
 * @since 0.60.2 Fix PHP 7.4 notice: Trying to access array offset on value of type bool
 * @link https://plugintests.com/plugins/wporg/anrghg/0.60.1
 * @link https://exerror.com/notice-trying-to-access-array-offset-on-value-of-type-bool/
 * @since 0.60.3 Non-standard fix used on failure of commonly accepted solution.
 * @since 0.62.0 Add Export and Import links.
 * @param  array $p_a_links  Links added by default.
 * @return array $p_a_links  Unreordered with new links appended.
 */
add_filter(
	'plugin_action_links_' . plugin_basename( C_S_ANRGHG_PLUGIN ),
	function( $p_a_links ) {
		$p_a_links[] = '<a href="' . admin_url( anrghg_cur_slug( 'config' ) ) . '">' . __( 'Settings' ) . '</a>';
		$p_a_links[] = '<a href="' . admin_url( anrghg_cur_slug( 'templt' ) ) . '">' . __( 'Templates' ) . '</a>';
		$p_a_links[] = '<a href="' . admin_url( anrghg_cur_slug( 'export' ) ) . '">' . __( 'Export' ) . '</a>';
		$p_a_links[] = '<a href="' . admin_url( anrghg_cur_slug( 'import' ) ) . '">' . __( 'Import' ) . '</a>';
		return $p_a_links;
	}
);

/**
 * Adds an Admin menu item and/or submenu items.
 *
 * @since 0.9.0
 * @reporter** @lookaheadio
 * @link https://wordpress.org/support/topic/too-many-top-level-dashboard-menu-items/
 * @link https://developer.wordpress.org/plugins/settings/custom-settings-page/
 * @since 0.24.6 Experimental 3rd admin page to test format conversion.
 * The Conversion page cannot be accessed from the plugin list entry,
 * hence it is added conditionally. All others are added by default,
 * as are the action links in the plugin list entry; only the menu or
 * submenu items are removable.
 * @since 0.60.0 Menu items removed by default.
 * @courtesy PluginTests
 * @link https://plugintests.com/plugins/wporg/anrghg/tips
 * @since 0.62.6 Debug the plugin initialism for readability by screen readers,
 * and prevent it from being mistaken as a misspelled interjection in all caps.
 * @return void
 */
function anrghg_menu_entries() {
	global $g_a_anrghg_config, $g_a_anrghg_admin_page_endpoints,
		$g_a_anrghg_admin_page_titles, $g_a_anrghg_admin_page_names;
	switch ( $g_a_anrghg_config['anrghg_menu_position'] ) {
		case 'top':
			$l_i_item_position = 25;
			break;
		case 'mid':
			$l_i_item_position = 80;
			break;
		case 'low':
		default:
			$l_i_item_position = 100;
	}

	$l_s_name_version = sprintf(
		// Translators: %s: the plugin’s initialism, in English ‘A.N.R.GHG’.
		__( '%s Publishing Toolkit', 'anrghg' ),
		// .
		_x( 'A.N.R.GHG', 'Act Now, Reduce Greenhouse Gasses', 'anrghg' )
	) . C_S_ANRGHG_SPACE . C_S_ANRGHG_VER;
	$l_s_dash                     = C_S_ANRGHG_DASH;
	$l_s_current_user_can         = 'manage_options';
	$g_a_anrghg_admin_page_names  = array(
		'templt' => __( 'Templates' ),
		'config' => __( 'Settings' ),
		'conver' => __( 'Conversion', 'anrghg' ),
		'export' => __( 'Export' ),
		'import' => __( 'Import' ),
	);
	$g_a_anrghg_admin_page_titles = array(
		'templt' => $g_a_anrghg_admin_page_names['templt'] . $l_s_dash . __( 'Template editor', 'anrghg' ) . $l_s_dash . $l_s_name_version,
		'config' => $g_a_anrghg_admin_page_names['config'] . $l_s_dash . $l_s_name_version,
		'conver' => $g_a_anrghg_admin_page_names['conver'] . $l_s_dash . $l_s_name_version,
		'export' => $g_a_anrghg_admin_page_names['export'] . $l_s_dash . $l_s_name_version,
		'import' => $g_a_anrghg_admin_page_names['import'] . $l_s_dash . $l_s_name_version,
	);

	$l_s_templates_main_menu_label = _x( 'A.N.R.GHG', 'Act Now, Reduce Greenhouse Gasses', 'anrghg' );
	$l_s_templates_submenu_label   = $g_a_anrghg_admin_page_names['templt'] . C_S_ANRGHG_SPACE . _x( 'A.N.R.GHG', 'Act Now, Reduce Greenhouse Gasses', 'anrghg' );
	$l_s_settings_submenu_label    = $g_a_anrghg_admin_page_names['config'] . C_S_ANRGHG_SPACE . _x( 'A.N.R.GHG', 'Act Now, Reduce Greenhouse Gasses', 'anrghg' );
	$l_s_conversion_submenu_label  = $g_a_anrghg_admin_page_names['conver'] . C_S_ANRGHG_SPACE . _x( 'A.N.R.GHG', 'Act Now, Reduce Greenhouse Gasses', 'anrghg' );
	$l_s_export_submenu_label      = $g_a_anrghg_admin_page_names['export'] . C_S_ANRGHG_SPACE . _x( 'A.N.R.GHG', 'Act Now, Reduce Greenhouse Gasses', 'anrghg' );
	$l_s_import_submenu_label      = $g_a_anrghg_admin_page_names['import'] . C_S_ANRGHG_SPACE . _x( 'A.N.R.GHG', 'Act Now, Reduce Greenhouse Gasses', 'anrghg' );

	if ( 'top' === $g_a_anrghg_config['anrghg_menu_level'] ) {
		add_menu_page( // Main menu (original template).
			'', // Page title not here.
			$l_s_templates_main_menu_label,
			$l_s_current_user_can,
			$g_a_anrghg_admin_page_endpoints['templt'],
			'', // Callback.
			'dashicons-editor-justify',
			$l_i_item_position
		);
		add_submenu_page(
			$g_a_anrghg_admin_page_endpoints['templt'],
			$g_a_anrghg_admin_page_titles['templt'],
			$g_a_anrghg_admin_page_names['templt'],
			$l_s_current_user_can,
			$g_a_anrghg_admin_page_endpoints['templt'],
			'anrghg_reusables_page_cb'
		);
		add_submenu_page(
			$g_a_anrghg_admin_page_endpoints['templt'],
			$g_a_anrghg_admin_page_titles['config'],
			$g_a_anrghg_admin_page_names['config'],
			$l_s_current_user_can,
			$g_a_anrghg_admin_page_endpoints['config'],
			'anrghg_settings_page_cb'
		);
		if ( $g_a_anrghg_config['anrghg_menu_item_format_conversion'] ) {
			add_submenu_page(
				$g_a_anrghg_admin_page_endpoints['templt'],
				$g_a_anrghg_admin_page_titles['conver'],
				$g_a_anrghg_admin_page_names['conver'],
				$l_s_current_user_can,
				$g_a_anrghg_admin_page_endpoints['conver'],
				'anrghg_conversion_page_cb'
			);
		}
		if ( $g_a_anrghg_config['anrghg_menu_items_export_import'] ) {
			add_submenu_page(
				$g_a_anrghg_admin_page_endpoints['templt'],
				$g_a_anrghg_admin_page_titles['export'],
				$g_a_anrghg_admin_page_names['export'],
				$l_s_current_user_can,
				$g_a_anrghg_admin_page_endpoints['export'],
				'anrghg_export_page_cb'
			);
			add_submenu_page(
				$g_a_anrghg_admin_page_endpoints['templt'],
				$g_a_anrghg_admin_page_titles['import'],
				$g_a_anrghg_admin_page_names['import'],
				$l_s_current_user_can,
				$g_a_anrghg_admin_page_endpoints['import'],
				'anrghg_import_page_cb'
			);
		} else {
			add_submenu_page(
				'tools.php',
				$g_a_anrghg_admin_page_titles['export'],
				$l_s_export_submenu_label,
				$l_s_current_user_can,
				$g_a_anrghg_admin_page_endpoints['export'],
				'anrghg_export_page_cb'
			);
			add_submenu_page(
				'tools.php',
				$g_a_anrghg_admin_page_titles['import'],
				$l_s_import_submenu_label,
				$l_s_current_user_can,
				$g_a_anrghg_admin_page_endpoints['import'],
				'anrghg_import_page_cb'
			);
		}
	}
	if ( ! ( 'top' === $g_a_anrghg_config['anrghg_menu_level'] ) ) {
		add_submenu_page(
			'tools.php',
			$g_a_anrghg_admin_page_titles['templt'],
			$l_s_templates_submenu_label,
			$l_s_current_user_can,
			$g_a_anrghg_admin_page_endpoints['templt'],
			'anrghg_reusables_page_cb'
		);
		add_options_page( // Submenu of Settings.
			$g_a_anrghg_admin_page_titles['config'],
			$l_s_settings_submenu_label,
			$l_s_current_user_can,
			$g_a_anrghg_admin_page_endpoints['config'],
			'anrghg_settings_page_cb'
		);
		if ( $g_a_anrghg_config['anrghg_menu_item_format_conversion'] ) {
			add_submenu_page(
				'tools.php',
				$g_a_anrghg_admin_page_titles['conver'],
				$l_s_conversion_submenu_label,
				$l_s_current_user_can,
				$g_a_anrghg_admin_page_endpoints['conver'],
				'anrghg_conversion_page_cb'
			);
		}
		add_submenu_page(
			'tools.php',
			$g_a_anrghg_admin_page_titles['export'],
			$l_s_export_submenu_label,
			$l_s_current_user_can,
			$g_a_anrghg_admin_page_endpoints['export'],
			'anrghg_export_page_cb'
		);
		add_submenu_page(
			'tools.php',
			$g_a_anrghg_admin_page_titles['import'],
			$l_s_import_submenu_label,
			$l_s_current_user_can,
			$g_a_anrghg_admin_page_endpoints['import'],
			'anrghg_import_page_cb'
		);
	}
	if ( 'none' === $g_a_anrghg_config['anrghg_menu_level']
		|| ! $g_a_anrghg_config['anrghg_menu_item_template_editor']
	) {
		remove_submenu_page( 'tools.php', $g_a_anrghg_admin_page_endpoints['templt'] );
	}
	if ( 'none' === $g_a_anrghg_config['anrghg_menu_level']
		|| ! $g_a_anrghg_config['anrghg_menu_items_export_import']
	) {
		remove_submenu_page( 'tools.php', $g_a_anrghg_admin_page_endpoints['export'] );
		remove_submenu_page( 'tools.php', $g_a_anrghg_admin_page_endpoints['import'] );
	}
	if ( 'none' === $g_a_anrghg_config['anrghg_menu_level']
		|| ! $g_a_anrghg_config['anrghg_menu_item_settings_page']
	) {
		remove_submenu_page( 'options-general.php', $g_a_anrghg_admin_page_endpoints['config'] );
	}
}
add_filter( 'admin_menu', 'anrghg_menu_entries' );

/**
 * Displays tab-like header menu.
 *
 * @since 0.69.0
 * @since 1.5.4 Moved to `anrghg-admin.php`.
 * @since 1.5.8 Display only if no top level Admin menu entry.
 * @since 1.7.0 Display also when Export/Import not in submenu.
 * @param  string $p_s_active The active tab, highlighted.
 * @return void
 */
function anrghg_header_menu( $p_s_active ) {
	global $g_a_anrghg_config, $g_a_anrghg_admin_page_names;
	if ( 'top' === $g_a_anrghg_config['anrghg_menu_level']
		&& $g_a_anrghg_config['anrghg_menu_items_export_import']
	) {
		return;
	}
	if ( ! $g_a_anrghg_config['anrghg_menu_item_format_conversion'] ) {
		unset( $g_a_anrghg_admin_page_names['conver'] );
	}

	echo wp_kses( "\r\n<style>", array( 'style' => true ) );
	anrghg_protected_echo(
		anrghg_minilight(
			'css',
			'

				div.header-menu {
					width: 100%;
					display: flex;
					justify-content: space-evenly;
				}

				div.header-menu a {
					text-decoration: none;
				}

				div.header-tab {
					flex: 1;
					padding-top: 2px;
					padding-bottom: 10px;
					text-align: center;
				}

				div.header-tab.active {
					font-weight: bold;
				}

			'
		)
	);
	echo wp_kses( "\r\n</style>\r\n", array( 'style' => true ) );

	$l_s_output = '<div class="header-menu">';
	foreach ( $g_a_anrghg_admin_page_names as $l_s_key => $l_s_name ) {
		$l_s_output .= '<a href="' . anrghg_cur_slug( $l_s_key ) . '"';
		$l_s_output .= ' title="' . __( 'Quick access', 'anrghg' ) . '">';
		$l_s_output .= '<div class="header-tab' . ( $p_s_active === $l_s_key ? ' active' : '' ) . '">';
		$l_s_output .= esc_html( $l_s_name ) . '</div></a>';
	}
	$l_s_output .= '</div>';
	echo wp_kses( $l_s_output, anrghg_get_ui_whitelist() );
}
