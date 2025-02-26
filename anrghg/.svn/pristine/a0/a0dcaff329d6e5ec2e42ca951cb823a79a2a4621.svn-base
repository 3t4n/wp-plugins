<?php
/**
 * Plugin Name: A.N.R.GHG Publishing Toolkit
 *
 * @package WordPress
 * @subpackage A.N.R.GHG Publishing Toolkit
 * Plugin Initialism: ‘Act Now, Reduce Greengouse Gasses!’
 * Plugin Slug: anrghg
 * Plugin URI: https://anrghg.sunsite.fr/publishing-toolkit/
 * Description: Among the Swiss Army knives completing WordPress, this one helps reduce GHG. AMP compatible. Table of contents, fragment IDs for paragraphs, notes and sources listed separately, templates reusable post-/site-wide, additional date information, & more.
 * Requires at least: 5.5
 * Tested up to: 6.3
 * Requires PHP: 7.0
 * Tested PHP up to: 8.1
 * CAUTION: The following field is parsed in the `Stable Tag` folder for upgrade configuration:
 * Version: 1.16.5
 * Author: ANRGHG
 * Author URI: https://anrghg.sunsite.fr
 * Author WordPress.org slug: @anrghg
 * Author email: anrghg@gmail.com
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: anrghg
 * Domain Path: /languages
 *
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
 * @see ./COPYING.txt
 *
 * Fixes:
 * @todo Documentation: Screenshots: Update in sync with plugin website.
 * @todo Notes and sources: Lists: Fix position of very small tooltips.
 * @todo Post Meta box: Store data as an array, ensure backcompat.
 * @todo Reference lists: Fix font size issue in collapsed lists.
 * @todo Thank You message: Fix block to prevent error when table of contents is deactivated in multisite.
 * Features:
 * @todo Conversion: Add conversion script Word ➔ WordPress with inline complements.
 * @todo Conversion: Debug enqueuing the conversion script, remove internal output.
 * @todo Conversion: Write the conversion script markdown ➔ inline complements.
 * @todo Customization: Custom CSS: Add option in multisite network settings for Additional CSS following https://core.trac.wordpress.org/ticket/58610#comment:1.
 * @todo Customization: Provide the ability to override plugin files with custom files.
 * @todo Customization: Web fonts: Load fonts locally.
 * @todo Date information: Support product pages, other custom post types.
 * @todo Emoji: Accessibility: Add emoji name in title and alt text for copy-paste.
 * @todo Emoji: Deactivation on a per-page basis, e.g. for math symbols.
 * @todo Export: Custom: Add preview feature.
 * @todo Export/import: Templates: Use reordered data structure for usability.
 * @todo First published information: Add configurable datalist to have multiple prefills to choose from.
 * @todo Formatting: Keycaps: New feature for adding and formatting kbd elements around predefined strings.
 * @todo Heading links: Optional navigation menus below with heading number as link text of fragment ID, previous/next heading, 1 level up heading, link to TOC, to top.
 * @todo Import: Settings: Import-merge feature not resetting values of non-existing keys.
 * @todo Interoperability: Add setting for CSS priority `anrghg_css_priority`.
 * @todo Interoperability: Optionally use a template stack at the expense of performance.
 * @todo Links: New feature for adding a symbol to external links.
 * @todo Links: New feature for opening external links in a new tab.
 * @todo Links: Remove the external link symbol from fragment identifiers.
 * @todo Localization: IDs and slugs: Add option to skip URL-encoding and let the browser do the job.
 * @todo Localization: IDs and slugs: Add option to use uppercase in page slugs, too, with a caveat.
 * @todo Localization: IDs and slugs: Detailed control over character categories to be simplified or removed.
 * @todo Localization: IDs and slugs: Make apostrophe to dash conversion optional for interoperability.
 * @todo Localization: IDs and slugs: Option to replace dash or colon with multiple hyphens.
 * @todo Localization: IDs and slugs: Optional emoji-to-keyword conversion.
 * @todo Localization: IDs and slugs: Optionally simplify configured HTML anchors.
 * @todo Localization: WPTexturize: Option to configure a post ID threshold.
 * @todo Notes and sources: Lists: Make collapsed negative row margin configurable.
 * @todo Notes and sources: Lists: Optionally output in widget.
 * @todo Notes and sources: Lists: Styling option adding horizontal lines.
 * @todo Notes and sources: Option for underlining both anchors and backlinks.
 * @todo Output hooks: Implement throughout.
 * @todo Paragraph links: Optionally add links to tables, table rows.  2023-07-01T0635+0200
 * @todo Post Meta box: Table of contents: Add setting for heading number display next to headings.
 * @todo Post Meta box: Table of contents: Add setting for heading number display in table.
 * @todo Reference lists: Add missing settings to make defaults configurable.
 * @todo Reference lists: Optionally output in widget.
 * @todo Reference lists: Process in widgets too.
 * @todo Security: Detect, log and alert successful logins while logging in is deactivated.
 * @todo Security: Option to deactivate login status display in Admin bar.
 * @todo Settings: Complete styling configurability for public pages.
 * @todo Table of contents: Add control over heading number position in table, separately.
 * @todo Table of contents: Option to display navigation menu beneath each heading.
 * @todo Table of contents: Optionally output in widget.
 * @todo Thank You message: Add template select dropdown in Block Inspector too.
 * @todo Thank You message: Make style names configurable, add settings for each one.
 * @todo User experience: Scroll offset: Option to deactivate the fix for the scroll padding.
 */

defined( 'ABSPATH' ) || exit( nl2br( "\r\n\r\n&nbsp; &nbsp; &nbsp; Sorry, this PHP file cannot be displayed in the browser." ) );

/**
 * Helps materialize the plugin version.
 *
 * @since 0.9.0
 * 0.9.0 is this plugin’s initial release.
 *
 * For a state-of-the-art versioning scheme covering all use cases,
 * a plugin needs three version number fields, two of which already
 * provided, one added. The reason for adding a third field is that
 * the provided fields are parsed for release/update configuration,
 * and can therefore not be used to increment a 4th version number,
 * as usually required to account for changes made to published (or
 * otherwise shared) files. Given that the readme in the Stable Tag
 * is the source code of the plugin’s pages in the Plugin Directory
 * and must be updatable anytime, we are advised that it is okay to
 * update display data and metadata without releasing a new version
 * throughout, beyond testing compatibility with a new WP Core. The
 * added 'Package Version' is now in the readme header only, as the
 * most update-prone file, and since that string is all for humans.
 * @link https://meta.trac.wordpress.org/ticket/5652
 * @var string C_S_ANRGHG_VER  Plugin version constant.
 */
define( 'C_S_ANRGHG_VER', '1.16.5' );

/**
 * Internationalization and localization.
 *
 * @link https://developer.wordpress.org/plugins/internationalization/how-to-internationalize-your-plugin/#add-text-domain-to-strings
 *
 * * Some strings are in sync with WordPress Core, to benefit from any
 *   existing translation. There is a caveat to this, @see link above.
 *   But those strings using this synergy are very unlikely to change.
 *   The basis for syncing with WordPress Core is in development. Only
 *   about half of these strings is shipped with WordPress as of 2022.
 *   The other half does not work until a future release.
 * * In order to reduce the translation workload, strings must be lean
 *   and translation friendly, more than just translation ready as can
 *   be achieved programmatically, by genericizing and merging similar
 *   strings.
 * * 100+ sets of sentences are optionally collapsible or hidden. That
 *   must be disclosed to the Translators in every single instance, by
 *   adding or appending ---This information is optionally collapsible
 *   or hidden. This way, partial translations can easily postpone the
 *   least exposed strings.
 * * The Portable Object File must be free from idle comments. Gettext
 *   makes sure to not miss any Translator comment and therefore makes
 *   a wide guess, adding duplicate items seemingly out of context. To
 *   mitigate the issue, function calls are preferredly multi-line and
 *   include an empty ‘// .’ comment (with just enough to be tolerated
 *   by the PHPCS validation tool) below a Translator comment, for the
 *   Gettext utility to not look beyond and not distract Translators.
 *
 * @link https://core.trac.wordpress.org/ticket/56435#ticket
 * Alleviate translation workload
 */

/**
 * Security and linting.
 *
 * * PHPCS often recommends breaking parameter type vertical alignment.
 * * In some instances, PHPCS inaccurately reports lack of a full stop.
 *
 * Both issues are addressed by these whitelisting comments (instead of
 * adding them where the respective issue begins). But these have to be
 * repeated after PHPCS is globally disabled (for the settings table of
 * contents), then re-enabled.
 *
 * The rest of PHPCS whitelisting is commented locally as needed.
 */
// phpcs:disable Squiz.Commenting.FunctionComment.SpacingAfterParamType
// phpcs:disable Squiz.Commenting.FunctionComment.ParamCommentFullStop

/**
 * Documentation.
 *
 * @contributor** and @contributor* tags:
 * A @contributor** or a @reporter**, whose tag is followed by a double asterisk,
 * has authored the linked contribution (code, design or both) for another plugin
 * but is acknowledged in this plugin for using their code/advice/report/feedback
 * under the GNU GPL.
 * A @contributor* with a single asterisk has contributed indirectly, e.g. when a
 * change was contributed to a plugin, then the fix is backported to this plugin.
 * The @author tag is not used, per WordPress Coding Standards.
 * The PHP Documentor tags need to be completed with @type and @hooked as used in
 * the WordPress ecosystem, as well as with FOSS related tags, like @contributor.
 * @see ./documentation-schema.txt
 *
 * @anrghg and @pewgeuges is the same person, as @anrghg is the professional slug
 * and @pewgeuges the private one. On WordPress.org, @pewgeuges is only kept live
 * in order to avoid disrupting the display of 600+ replies in the support forum,
 * mainly in the section dedicated to a plugin named “footnotes”, and mentions in
 * related commit logs and on Trac. I’m grieved that the Footnotes project became
 * ethically unsustainable. I apologize to the Footnotes Community for not trying
 * hard to prevent the project from taking that road, and for aiming to hand over
 * its development without making sure that the job will be done effectively. The
 * unaddressed Footnotes user requests are followed up in this new plugin started
 * after it had become clear to me that there remained no other way forward.
 * @pewgeuges provided support to Footnotes users from 2020-10-26 to 2022-03-29.
 * until the Footnotes plugin was abandoned on 2022-04-14.
 * @link https://wordpress.org/support/users/pewgeuges/replies/
 * @link https://wordpress.org/support/topic/plugin-is-abandoned-3/
 * @link https://web.archive.org/web/20220819113359/https://wordpress.org/support/topic/plugin-is-abandoned-3/
 * After the Footnotes plugin has been closed on 2022-11-14, @pewgeuges contacted
 * its owner on 2022-12-21, then the Plugin Directory from 2022-12-23–27 trying a
 * revival, then again from 2023-02-04–10 about resuming support on the Forum but
 * unsuccessfully. @pewgeuges also edited and committed the Footnotes plugin from
 * 2020-10-28 to 2021-04-15 in order to provide the customizations to the general
 * public as a v2.0, fix more bugs, and add features and settings in the process.
 * @link https://github.com/pewgeuges/footnotes
 * This was formerly https://github.com/media-competence-institute/footnotes
 * @link https://github.com/benleyjyc/footnotes
 * These are the start and end revisions committed by @pewgeuges:
 * @link https://plugins.trac.wordpress.org/changeset/2408002/footnotes
 * @link https://plugins.trac.wordpress.org/changeset/2515917/footnotes
 * Footnotes’ full revision log from plugin addition to plugin closure:
 * @link https://plugins.trac.wordpress.org/log/footnotes?rev=2521062&limit=999
 * Now the Footnotes plugin seems dead. Pull request #250 opened on 2023-10-15:
 * @link https://github.com/markcheret/footnotes/pull/250
 * Issue comment on 2023-10-22 in #48 on Footnotes’ failure wrt AMP compatibility:
 * @link https://github.com/markcheret/footnotes/issues/48#issuecomment-1773999755
 * @link https://web.archive.org/web/20231022053952/https://github.com/markcheret/footnotes/issues/48
 * @see ./readme.txt
 * == Frequently Asked Questions ==
 * = How about using jQuery? =
 *
 * To avoid overloading the core files with docblocks, the numerous configuration
 * filter hooks are documented in the configuration filter hook template file, as
 * are the output hooks in the related template file.
 * @see ./template-filter-config.php
 * @see ./template-filter-output.php
 */

/**
 * Style sheets.
 *
 * External style sheets appear to have too many and too serious downsides:
 *
 * * Version number URL parameters are removed by third party plugins focusing on
 *   security, causing a failure to cache bust;
 * * External style sheets are internalized and overridden by Custom CSS prone to
 *   become out of sync with updated plugins;
 * * It happens that additionally, a style sheet is even dequeued at that point.
 * * Configurable rules are internal; having all CSS in one place makes it easier
 *   to maintain.
 * * The official AMP plugin streamlines CSS by tree-shaking, then outputs CSS as
 *   internal.
 *
 * @see * Outputs internal CSS.
 * @see ./includes/filtered.php: anrghg_protected_echo().
 *
 *
 * Separators in class names:
 *
 * Class names derived from settings keys still contain underscores but as far as
 * possible, CSS classes use hyphen only. Identifiers used in URLs, likewise. But
 * IDs for internal use seem more convenient when containing no hyphens.
 */

/**
 * Template parts.
 *
 * @see ./template-filter-output.php
 * External template parts likewise are not flexible enough, so that their number
 * tends to explode as options add, which screws maintenance up. Customized files
 * are even harder to keep in sync. Loading partials has certainly downsides from
 * a performance perspective.
 *
 * Instead, filters may be added to a set of output hooks.
 */

/**
 * Hooks.
 *
 * @see ./template-filter-config.php
 * The other set of hooks are named after settings keys and are documented in the
 * configuration filter template file.
 *
 * @link https://wordpress.org/support/topic/compatibility-with-php-8-2/#post-15401987
 * For a streamlined code, anonymous functions are defined wherever possible. The
 * correct indentation involves then multiline arguments for `add_filter()`.
 *
 * @see wp-includes/plugin.php:403
 * The function `add_action()` is a wrapper for `add_filter()`. For a streamlined
 * code, actions are added calling `add_filter()`. Calling `add_action()` instead
 * of `add_filter` is more intuitive when the callback function returns void, but
 * beyond that, it doesn’t make any difference. The actual difference is in how a
 * given filter is applied, whether its callback returns a parameter supported by
 * `apply_filters()`, or not, as by `do_action()`.
 */

/**
 * Style and paradigm.
 *
 * @link https://wordpress.stackexchange.com/questions/167706/should-we-trust-the-post-globals
 * @link https://wordpress.stackexchange.com/questions/170358/when-to-use-global-post-and-other-global-variables
 * Accessing properties of the global `$post` is discouraged. Instead, a function
 * like `get_the_ID()` should be called. Template functions are more secure since
 * they generate the post object properly, rather than relying on the global that
 * may be changed by other parties. Therefore, we can safely ditch the use of the
 * object operator as in `$post->ID`.
 *
 * @link https://stackoverflow.com/questions/6703/when-is-oop-better-suited-for
 * @link https://stackoverflow.com/questions/8344008/is-oop-necessary-in-php-sites-cant-i-just-apply-its-concept-to-procedural-code
 * @link https://www.oreilly.com/content/object-oriented-vs-functional-programming/
 * @link https://www.quora.com/Why-was-there-a-big-hype-about-object-oriented-programming-in-the-90s/answer/Robert-Bass-13
 * @link https://www.quora.com/What-does-object-oriented-programming-do-better-than-functional-programming-and-why-is-it-the-most-popular-paradigm-when-everybody-seems-to-say-functional-programming-is-superior/answer/Panicz-Godek
 * If preferred, expected or required, OOP will eventually be used if and only if
 * the code would be refactored for the purpose later on. But for the time being,
 * most of PHP, CSS, HTML and JS is in these few files, to facilitate review, and
 * because the development of this plugin has been fast-tracked to address delays
 * and started from scratch to give way to necessary innovation, while reusing as
 * many parts as appropriate from those set out in that intent, or contributed to
 * other projects before, as acknowledged in the contributors list and docblocks.
 */

/**
 * Code formatting.
 *
 * @link https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/
 * @link https://make.wordpress.org/core/2020/03/20/updating-the-coding-standards-for-modern-php/
 * @link https://developer.wordpress.org/coding-standards/wordpress-coding-standards/javascript/
 * @link https://developer.wordpress.org/plugins/plugin-basics/best-practices/#boilerplate-starting-points
 * Familiarity is more important for code readability than a streamlined layout.
 *
 * @link https://herbsutter.com/2008/07/15/hungarian-notation-is-clearly-goodbad/
 * PHP variable names use Hungarian to facilitate development and maintenance.
 * Scope is global, local or parameter, and type is _i_ for integer instead of
 * _n_, _f_ for float, _n_ (numeric) for either float or integer, _m_ is mixed
 * as of maybe string (_s_) or boolean (_b_), or array (_a_), when it depends.
 * Objects _o_ may also occur, following a short yet flexible prefix scheme to
 * address the most current concern raised against (Systems) Hungarian.
 */

/**
 * Loads localized strings once available.
 *
 * @since 0.24.4
 * @since 0.61.4 Change folder name from `/translations` to `/languages`.
 *
 * @reporter** @ekp001
 * @link https://wordpress.org/support/topic/language-files-31/
 *
 * IMPORTANT NOTE: For effectiveness all sublocales must be
 * present. To streamline the process, the main sublocales’
 * .mo files `en_GB`, `es_ES`, `fr_FR` are propagated since
 * they are supposed to match all these 18 sublocales:
 * `en_AU`, `en_CA`, `en_NZ`, `en_SA`, `es_AR`, `es_CL`,
 * `es_CO`, `es_CR`, `es_DO`, `es_EC`, `es_GT`, `es_MX`,
 * `es_PE`, `es_PR`, `es_UY`, `es_VE`, `fr_BE`, `fr_CA`.
 * @see ./build.sh
 *
 * @since 0.61.0 — The included `languages/anrghg.pot` file
 * is provisional only, to ramp up the process, and to help
 * ensure that comments for Translators meet the standards.
 * @since 0.61.4 — The French localization is not complete,
 * as the `anrghg-fr_FR.po` and `anrghg-fr_FR.mo` files are
 * included only for test purposes at this point.
 * @since 0.62.11 — Derived en_US, adapted en_GB, to start.
 * @since 0.64.0 — Set up language support for Spanish, and
 * all nine sublocales supported in WordPress including ES.
 * @since 0.65.0 — Add four missing English sublocales to
 * the English language support, copied from en_GB.
 * @since 1.5.5 — Add four missing es-* sublocale MO files.
 * @since 1.5.7 Use `load_textdomain_mofile()` instead of
 * `load_plugin_textdomain()` for a test; failure.
 * The code is kept for further tests with a comment toggle
 * and, as commented-out code, is whitelisted for PHPCS.
 * @link https://developer.wordpress.org/plugins/internationalization/how-to-internationalize-your-plugin/#plugins-on-wordpress-org
 * @return void
 */
// phpcs:disable
add_filter(
	'init',
	function() {
		load_plugin_textdomain( 'anrghg', false, plugin_basename( __DIR__ ) . '/languages' );
	}
);
/*/
add_filter(
	'load_textdomain_mofile',
	function( $mofile, $domain ) {
		if ( 'anrghg' === $domain && false !== strpos( $mofile, WP_LANG_DIR . '/plugins/' ) ) {
			$locale = apply_filters( 'plugin_locale', determine_locale(), $domain );
			$mofile = WP_PLUGIN_DIR . '/' . dirname( plugin_basename( __FILE__ ) ) . '/languages/' . $domain . '-' . $locale . '.mo';
		}
		return $mofile;
	},
	10,
	2
);
//*/
// phpcs:enable

/**
 * Separator localization.
 *
 * @since 1.5.1
 * @see * Internationalization and localization.
 * @return void
 */
add_filter(
	'init',
	function() {

		/**
		 * Space as a word separator.
		 *
		 * In Chinese, the sentence-separating space is part of
		 * the Chinese period’s glyph. No extra space is needed.
		 * In many locales, a space is used to separate partials
		 * and must be inserted programmatically when a function
		 * builds up a paragraph out of individual sentences and
		 * where separately localizable elements are concatenated
		 * for a more streamlined localization.
		 *
		 * @var string C_S_ANRGHG_SPACE  1 or true or 0 or false.
		 */

		/*
		 * Translators: This switch configures a sentence separating space.
		 * If your language does not separate words with a space, then
		 * please translate this to ‘false’ or to the digit zero.
		 * Do not translate into your language.
		 */
		$l_s_space_is_word_separator = (string) _x( 'true', 'Whether your language uses space as a word separator: ‘1’ or ‘true’, or ‘0’ or ‘false’.', 'anrghg' );
		switch ( $l_s_space_is_word_separator ) {
			case '0':
			case 'false':
				define( 'C_S_ANRGHG_SPACE', '' );
				break;
			case '1':
			case 'true':
			default:
				define( 'C_S_ANRGHG_SPACE', ' ' );
		}

		/**
		 * Dash as a sentence separator.
		 *
		 * In English, the sentence-separating dash is an em dash,
		 * while in French and German an en dash may be preferred.
		 * In American English, the em dash is often space-padded,
		 * while British English may not use space around em dash.
		 *
		 * @var string C_S_ANRGHG_DASH A dash, space padded or not.
		 */

		/*
		 * Translators: This string configures a sentence separating dash.
		 * A language may use a long or em dash ‘—’, or a shorter or en dash
		 * ‘–’. The spaces padding the dash are also configured; an en dash
		 * is typically preceded and followed by a space, but an em dash may
		 * not be surrounded with spaces, depending on the language.
		 */
		define( 'C_S_ANRGHG_DASH', _x( ' — ', 'A dash, space-padded or not, as used in your language.', 'anrghg' ) );

	},
	PHP_INT_MAX
);

/**
 * Stores this file’s name in a constant.
 *
 * @since 0.58.6
 * @var string C_S_ANRGHG_PLUGIN  Plugin main file name.
 */
define( 'C_S_ANRGHG_PLUGIN', __FILE__ );

/**
 * Sets up the KSES whitelist global.
 *
 * @since 0.81.5
 * @global array|bool $g_m_anrghg_public_whitelist HTML elements and arguments.
 */
$g_m_anrghg_public_whitelist = false;

/**
 * Introduces global string of login control constant.
 *
 * @since 0.56.0 Removed from configuration array.
 * @global string $g_s_login_control_constant
 */
$g_s_login_control_constant = 'ANRGHG_WP_LOGIN_';

/**
 * Introduces global integer of login deactivation profile.
 *
 * @since 0.80.9
 * @global int $g_i_login_deactivation_profile
 */
$g_i_login_deactivation_profile = 0;

/**
 * Introduces global array of templates.
 *
 * @since 0.9.0
 * @since 0.80.1 Fix bug appearing at plugin activation.
 * @global array $g_a_anrghg_reuse  Templates.
 */
$g_a_anrghg_reuse = get_option( 'anrghg_reuse' );
if ( ! is_array( $g_a_anrghg_reuse )
	|| ( is_array( $g_a_anrghg_reuse )
		&& ( ! array_key_exists( 'key', $g_a_anrghg_reuse )
		|| ! array_key_exists( 'val', $g_a_anrghg_reuse )
		)
	)
) {
	$g_a_anrghg_reuse = array(
		'key' => array(),
		'val' => array(),
	);
}

/**
 * Removes empty templates.
 *
 * @since 1.6.22
 * The template editor may be saved while empty.
 * @since 1.7.8 Debug when there are no templates.
 */
foreach ( $g_a_anrghg_reuse['key'] as $l_s_index => $l_s_key ) {
	if ( ! empty( $l_s_key ) || ! empty( $g_a_anrghg_reuse['val'][ $l_s_index ] ) ) {
		$l_a_reuse['key'][] = $l_s_key;
		$l_a_reuse['val'][] = $g_a_anrghg_reuse['val'][ $l_s_index ];
	}
}
if ( isset( $l_a_reuse ) ) {
	$g_a_anrghg_reuse = $l_a_reuse;
}

/**
 * Introduces global array of post-wide reusable complements.
 *
 * @since 0.44.0
 * @global array $g_a_anrghg_post_reuse
 */
$g_a_anrghg_post_reuse = array(
	'key' => array(),
	'val' => array(),
);

/**
 * Introduces global array for fragment ID disambiguation.
 *
 * @since 0.9.0
 * @global array $g_a_anrghg_fragment_ids  Helps disambiguate IDs across both headings and paragraphs.
 */
$g_a_anrghg_fragment_ids = array();

/**
 * Introduces global string to store footer lists.
 *
 * @since 0.9.0
 * @global string $g_s_anrghg_footer  Complement lists if output in the footer.
 */
$g_s_anrghg_footer = '';

/**
 * Introduces global boolean of Elementor Integration test markup.
 *
 * @since 0.55.5
 * @global bool $g_b_elementor_test_markup  Whether test markup has been added.
 */
$g_b_elementor_test_markup = false;

/**
 * Introduces global boolean of unbalanced delimiter red flag.
 *
 * @since 0.77.0
 * @global bool|string $g_m_unbalanced_delim  A note / source delimiter is unbalanced.
 *                                            The text following the unbalanced delim.
 */
$g_m_unbalanced_delim = false;

/**
 * Introduces global array of configuration values.
 *
 * @since 0.9.0
 * Out of the DB, all configuration data is strings.
 * Therefore all defaults defined below are strings.
 * This failed a test:
 *
 *     $g_a_anrghg_config = wp_parse_args( get_option( 'anrghg' ) );
 *
 * @global array $g_a_anrghg_config  Configuration keys and values.
 */
$g_a_anrghg_config = array();

/**
 * Defines fast-tracked configuration defaults and loads all values.
 *
 * @since 0.25.3
 * Some early required values cannot wait for the moment when
 * translation manager plugins can filter DB calls. Therefore
 * these are fast-tracked. As a result they are loaded twice.
 *
 * @global array $g_a_fast_tracked_defaults
 */
$g_a_fast_tracked_defaults = array(

	/**
	 * Complement lists output in footer.
	 *
	 * @since 0.25.3
	 * @since 0.30.0 Drop `-1` in `anrghg_complement_list_footer_deferral`.
	 * Backcompat with pre-0.30.0 requires '-1' recovery conversion.
	 */
	'anrghg_complement_list_footer_deferral' => '0', // 0,1.
	'anrghg_complement_list_output_buffer'   => '0', // 0,1.

);
$g_a_registered = get_option( 'anrghg' );
foreach ( $g_a_fast_tracked_defaults as $l_s_key => $l_s_value ) {
	$g_a_anrghg_config[ $l_s_key ] = isset( $g_a_registered[ $l_s_key ] ) ?
		$g_a_registered[ $l_s_key ] :
		$g_a_fast_tracked_defaults[ $l_s_key ];
}
if ( '-1' === $g_a_fast_tracked_defaults['anrghg_complement_list_footer_deferral'] ) {
	$g_a_fast_tracked_defaults['anrghg_complement_list_footer_deferral'] = '0';
}

/**
 * Defines all other configuration defaults and loads all values.
 *
 * @since 0.9.0
 *
 * @since 0.24.0 Configuration keys can be filtered.
 * @see ./template-filter-config.php
 *
 * @since 0.24.4 Filters cannot be applied here as they aren’t added yet.
 * Do nothing before the `plugins_loaded` hook is fired, else other plugins
 * are unable to filter configurable strings as they’re loaded from the DB.
 *
 * @contributor** @chouby
 * @link https://wordpress.org/support/topic/plugin-string-translations-ineffective/#post-14714185
 * @link https://polylang.pro/dont-take-any-action-before-plugins_loaded-is-fired/
 * @reporter** @neondlight
 * @link https://wordpress.org/support/topic/reference-container-heading-translations-and-a-collapse-feature/#post-14717295
 *
 * Also, the keys are prefixed like filters, to avoid namespace conflicts and
 * for ease of retrieval in string translation panels and in web DB editors.
 *
 * The keys of all configurable strings must be in the language configuration file.
 * @link https://wpml.org/documentation/support/language-configuration-files/
 *
 * @since 0.80.8 Shorten configuration keys to max 44 characters.
 * Keys must not be longer than 44 characters, because of alignment
 * issues reported by PHPCS when these keys are longer than that.
 *
 * @since 1.4.7 Centralize delimiter preset configuration.
 * The preset is the delimiter’s default value that must be saved
 * to the database so as to become immutable, to avoid disrupting
 * existing installations when the default needs to be changed.
 * In Gutenberg, square brackets are used as a shortcut, for page link insertion.
 * Thus, these must not be used any longer to delimit inline sources or endnotes.
 *
 * @return void
 */
add_filter(
	'plugins_loaded',
	function() {
		global $g_a_anrghg_config, $g_a_fast_tracked_defaults;
		$l_a_defaults = array(

			/**
			 * Security.
			 */
			'anrghg_login_control_constant_end'            => 'ACTIVE',
			'anrghg_login_deactivation_profile'            => '-1', // -1 low-profile, 0 intermediate, 1 high-profile.
			'anrghg_auth_duration_edit'                    => '0',
			'anrghg_auth_expiration_days'                  => '14',

			/**
			 * Backup.
			 */
			'anrghg_keep_reusables_history'                => '1',
			'anrghg_keep_settings_history'                 => '1',

			/**
			 * User interface.
			 */
			'anrghg_meta_box_active'                       => '0',
			'anrghg_meta_box_published_first'              => '1',
			'anrghg_meta_box_thank_you_message'            => '1',
			'anrghg_meta_box_contents_insert'              => '1',
			'anrghg_meta_box_contents_alignment'           => '1',
			'anrghg_meta_box_contents_label'               => '1',
			'anrghg_meta_box_contents_collapse'            => '1',
			'anrghg_meta_box_complements_writing_dir'      => '1',
			'anrghg_meta_box_complements_process_active'   => '1',
			'anrghg_meta_box_complement_delimiters'        => '1',
			'anrghg_meta_box_complement_list_labels'       => '1',
			'anrghg_meta_box_complement_list_collapse'     => '1',
			'anrghg_meta_box_complement_list_footer_defer' => '1',
			'anrghg_thank_you_block'                       => '1',
			'anrghg_table_of_contents_block'               => '1',
			'anrghg_complements_block'                     => '1',
			'anrghg_references_block'                      => '1',
			'anrghg_include_block'                         => '1',
			'anrghg_block_setting_elements'                => '2', // 0 none, 1 part, 2 all.
			'anrghg_template_editor_tinymce_active'        => '1',
			'anrghg_template_editor_line_break_on_enter'   => '1',
			'anrghg_template_editor_list_rich_text_view'   => '1',
			'anrghg_template_editor_move_into_text_mode'   => '1',
			'anrghg_template_editor_unescape_pointy_brack' => '0',
			'anrghg_menu_level'                            => 'none', // top, sub, none.
			'anrghg_menu_position'                         => 'low', // top, mid, low.
			'anrghg_menu_item_template_editor'             => '1',
			'anrghg_menu_item_settings_page'               => '1',
			'anrghg_menu_item_format_conversion'           => '0',
			'anrghg_menu_items_export_import'              => '1',
			'anrghg_settings_display_information'          => '2', // 0 none, 1 buttons, 2 all.
			'anrghg_settings_tab_nav'                      => '0', // 0 UI elements only, 1 links too.

			/**
			 * Localization.
			 */
			'anrghg_sync_i18n_with_wordpress_core'         => '1',
			'anrghg_fragment_ids_support_titlecase'        => '0',
			'anrghg_additional_id_conversions'             => '',
			'anrghg_fragment_ids_more_conversions'         => '0',
			'anrghg_fragment_ids_remove_accents'           => '1',
			'anrghg_fragment_id_separator'                 => '-',
			'anrghg_fragment_identifier_max_length'        => '200', // characters.
			'anrghg_alternative_sanitize_title_active'     => '0',
			'anrghg_wptexturize_active'                    => '1',

			/**
			 * Interoperability.
			 */
			'anrghg_css_priority_select'                   => '0', // @todo.
			'anrghg_css_priority_input'                    => '3', // @todo.
			'anrghg_url_wrap'                              => '1',
			'anrghg_allow_html_term_description'           => '1',
			'anrghg_activate_elementor_test_mode'          => '0',
			'anrghg_filter_acf_the_content_hook'           => '1',
			'anrghg_additional_content_hooks'              => '',

			/**
			 * User experience.
			 */
			'anrghg_css_smooth_scrolling'                  => '1',
			'anrghg_css_scroll_offset'                     => '115', // pixels.
			'anrghg_general_mobile_breakpoint'             => '768', // pixels.
			'anrghg_list_wrapper_margin_top'               => '0', // pixels.
			'anrghg_list_wrapper_margin_bottom'            => '0', // pixels.

			/**
			 * Customization.
			 */
			'anrghg_web_fonts_active'                      => '0',
			'anrghg_web_font_urls'                         => 'https://fonts.googleapis.com/css?family=Titillium+Web:regular,bold,italic,bolditalic;',
			'anrghg_slug_body_class_active'                => '0',
			'anrghg_slug_body_class_prefix'                => '_',

			/**
			 * Include HTML partials.
			 */
			'anrghg_include_base_directory'                => '/',
			'anrghg_include_classes_placeholder'           => '{{{anrghg-classes}}}',
			'anrghg_include_value_placeholder'             => '{{{anrghg-value}}}',
			'anrghg_include_html_filter_active'            => '1',

			/**
			 * Excerpts.
			 */
			'anrghg_clean_auto_excerpts'                   => '1',
			'anrghg_apply_the_content_auto_excerpts'       => '0',
			'anrghg_apply_the_content_manual_excerpts'     => '1',

			/**
			 * Thank You message.
			 */
			'anrghg_thank_you_active'                      => '0', // 0 none, 1 posts, 2 pages, 3 both.
			'anrghg_thank_you_display_on_home'             => '0',
			// Translators: %s: the post title. This string is configurable and can be translated by the user.
			'anrghg_thank_you_content'                     => __( 'Thank you for reading! We hope you enjoyed <em>%s</em>. Feel free to share your thoughts below.', 'anrghg' ),
			// Translators: %s: the page title. This string is configurable and can be translated by the user.
			'anrghg_thank_you_content_page'                => __( 'Thank you for reading <em>%s</em>!', 'anrghg' ),
			'anrghg_thank_you_select_list'                 => '',
			'anrghg_thank_you_default_style'               => '', // 0..9 or empty.
			'anrghg_thank_you_priority_select'             => '0', // -1 highest, 0 input, 1 lowest.
			'anrghg_thank_you_priority_input'              => '10',

			/**
			 * Aspect (Thank You message)
			 */
			'anrghg_thank_you_font_size_option'            => '1', // 0 inherit, 1 px, 2 em, 3 rem.
			'anrghg_thank_you_font_size_px'                => '15',
			'anrghg_thank_you_font_size_em'                => '1.5',
			'anrghg_thank_you_font_size_rem'               => '1.5',
			'anrghg_thank_you_foreground_color'            => '#000000',
			'anrghg_thank_you_background_color'            => '#FFFFFF',
			'anrghg_thank_you_border_width'                => '1',
			'anrghg_thank_you_border_style'                => 'solid', // solid, dotted, dashed, double, inset, outset, ridge, groove, none, hidden.
			'anrghg_thank_you_border_radius'               => '2', // pixels.
			'anrghg_thank_you_border_color'                => '#00FF00',
			'anrghg_thank_you_shadow_x_offset'             => '-5', // pixels.
			'anrghg_thank_you_shadow_y_offset'             => '7', // pixels.
			'anrghg_thank_you_shadow_blur'                 => '5', // pixels.
			'anrghg_thank_you_shadow_spread'               => '2', // pixels.
			'anrghg_thank_you_shadow_color'                => '#484848',
			'anrghg_thank_you_padding_top'                 => '20', // pixels.
			'anrghg_thank_you_padding_start'               => '24', // pixels.
			'anrghg_thank_you_padding_end'                 => '24', // pixels.
			'anrghg_thank_you_padding_bottom'              => '20', // pixels.
			'anrghg_thank_you_margin_top'                  => '50', // pixels.
			'anrghg_thank_you_margin_start'                => '16', // pixels.
			'anrghg_thank_you_margin_end'                  => '16', // pixels.
			'anrghg_thank_you_margin_bottom'               => '50', // pixels.

			/**
			 * Date information.
			 */
			'anrghg_dates_active'                          => '0',
			'anrghg_dates_post_top_modif'                  => '1',
			'anrghg_dates_post_top_publi'                  => '0',
			'anrghg_dates_post_end_modif'                  => '0',
			'anrghg_dates_post_end_publi'                  => '0',
			'anrghg_dates_page_top_modif'                  => '0',
			'anrghg_dates_page_top_publi'                  => '0',
			'anrghg_dates_page_end_modif'                  => '1',
			'anrghg_dates_page_end_publi'                  => '1',
			'anrghg_dates_post_top_chrono'                 => '0',
			'anrghg_dates_post_end_chrono'                 => '0',
			'anrghg_dates_page_top_chrono'                 => '0',
			'anrghg_dates_page_end_chrono'                 => '0',
			'anrghg_dates_label_uni'                       => '1',
			// Translators: %s: the date. This string is configurable and can be translated by the user.
			'anrghg_dates_label_modified'                  => __( 'Last modified: %s', 'anrghg' ),
			// Translators: %s: the date. This string is configurable and can be translated by the user.
			'anrghg_dates_label_published'                 => __( 'Published: %s', 'anrghg' ),
			// Translators: %s: the date. This string is configurable and can be translated by the user.
			'anrghg_dates_label_post_top_modif'            => __( 'Post last modified: %s', 'anrghg' ),
			// Translators: %s: the date. This string is configurable and can be translated by the user.
			'anrghg_dates_label_post_top_publi'            => __( 'Post published: %s', 'anrghg' ),
			// Translators: %s: the date. This string is configurable and can be translated by the user.
			'anrghg_dates_label_post_end_modif'            => __( 'This post was last modified on %s', 'anrghg' ),
			// Translators: %s: the date. This string is configurable and can be translated by the user.
			'anrghg_dates_label_post_end_publi'            => __( 'This post was published on %s', 'anrghg' ),
			// Translators: %s: the date. This string is configurable and can be translated by the user.
			'anrghg_dates_label_page_top_modif'            => __( 'Page last modified: %s', 'anrghg' ),
			// Translators: %s: the date. This string is configurable and can be translated by the user.
			'anrghg_dates_label_page_top_publi'            => __( 'Page published: %s', 'anrghg' ),
			// Translators: %s: the date. This string is configurable and can be translated by the user.
			'anrghg_dates_label_page_end_modif'            => __( 'This page was last modified on %s', 'anrghg' ),
			// Translators: %s: the date. This string is configurable and can be translated by the user.
			'anrghg_dates_label_page_end_publi'            => __( 'This page was published on %s', 'anrghg' ),
			// Translators: This string is a configurable prefill with blank and can be translated by the user.
			'anrghg_published_first_top_prefill'           => __( 'Published first on', 'anrghg' ), // Not for wpml-config.xml.
			// Translators: This string is a configurable prefill with blank and can be translated by the user.
			'anrghg_published_first_end_prefill'           => __( 'This article was first published in', 'anrghg' ), // Not for wpml-config.xml.
			'anrghg_dates_priority_select'                 => '0', // -1 highest, 0 input, 1 lowest.
			'anrghg_dates_priority_input'                  => '1500',

			/**
			 * Aspect at post top (Date information).
			 */
			'anrghg_dates_post_top_text_align'             => 'start', // start,center,end.
			'anrghg_dates_post_top_margin_above'           => '-30', // pixels.
			'anrghg_dates_post_top_margin_below'           => '50', // pixels.
			'anrghg_dates_post_top_font_size_option'       => '1', // 0 inherit, 1 px, 2 em, 3 rem.
			'anrghg_dates_post_top_font_size_px'           => '14',
			'anrghg_dates_post_top_font_size_em'           => '1.4',
			'anrghg_dates_post_top_font_size_rem'          => '1.4',
			'anrghg_dates_post_top_color'                  => '#595959',

			/**
			 * Aspect at page top (Date information).
			 */
			'anrghg_dates_page_top_text_align'             => 'start', // start,center,end.
			'anrghg_dates_page_top_margin_above'           => '-30', // pixels.
			'anrghg_dates_page_top_margin_below'           => '50', // pixels.
			'anrghg_dates_page_top_font_size_option'       => '1', // 0 inherit, 1 px, 2 em, 3 rem.
			'anrghg_dates_page_top_font_size_px'           => '14',
			'anrghg_dates_page_top_font_size_em'           => '1.4',
			'anrghg_dates_page_top_font_size_rem'          => '1.4',
			'anrghg_dates_page_top_color'                  => '#595959',

			/**
			 * Aspect at post end (Date information).
			 */
			'anrghg_dates_post_end_text_align'             => 'end', // start,center,end.
			'anrghg_dates_post_end_margin_above'           => '50', // pixels.
			'anrghg_dates_post_end_margin_below'           => '0', // pixels.
			'anrghg_dates_post_end_font_size_option'       => '1', // 0 inherit, 1 px, 2 em, 3 rem.
			'anrghg_dates_post_end_font_size_px'           => '14',
			'anrghg_dates_post_end_font_size_em'           => '1.4',
			'anrghg_dates_post_end_font_size_rem'          => '1.4',
			'anrghg_dates_post_end_color'                  => '#000000',

			/**
			 * Aspect at page end (Date information).
			 */
			'anrghg_dates_page_end_text_align'             => 'end', // start,center,end.
			'anrghg_dates_page_end_margin_above'           => '50', // pixels.
			'anrghg_dates_page_end_margin_below'           => '0', // pixels.
			'anrghg_dates_page_end_font_size_option'       => '1', // 0 inherit, 1 px, 2 em, 3 rem.
			'anrghg_dates_page_end_font_size_px'           => '14',
			'anrghg_dates_page_end_font_size_em'           => '1.4',
			'anrghg_dates_page_end_font_size_rem'          => '1.4',
			'anrghg_dates_page_end_color'                  => '#000000',

			/**
			 * Date meta tags.
			 */
			'anrghg_date_meta_tags_active'                 => '0',
			'anrghg_date_meta_common_last_edit'            => '1',
			'anrghg_date_meta_open_g_last_edit'            => '1',
			'anrghg_date_meta_common_published'            => '1',
			'anrghg_date_meta_open_g_published'            => '1',

			/**
			 * Paragraph links.
			 */
			'anrghg_paragraph_links_active'                => '0',
			'anrghg_paragraph_link_character_select'       => '¶',
			'anrghg_paragraph_link_character_input'        => '',
			'anrghg_paragraph_link_plain_tooltip_active'   => '1',
			// Translators: This string is configurable and can be translated by the user.
			'anrghg_paragraph_link_plain_tooltip_text'     => __( 'Permalink to this fragment', 'anrghg' ),
			'anrghg_paragraph_identifier_max_length'       => '80', // characters.

			/**
			 * Heading links.
			 */
			'anrghg_heading_links_active'                  => '0',
			'anrghg_heading_link_plain_tooltip_active'     => '1',
			// Translators: This string is configurable and can be translated by the user.
			'anrghg_heading_link_plain_tooltip_text'       => __( 'Permalink to this heading', 'anrghg' ),

			/**
			 * Table of contents.
			 */
			'anrghg_table_of_contents_active'              => '-1', // -1 on demand, 1 always.
			'anrghg_table_of_contents_min_number'          => '2',
			'anrghg_table_of_contents_depth'               => '6', // 2..6.
			'anrghg_heading_number_position'               => '1', // -1 prepended, 0 none, 1 appended.
			'anrghg_heading_backlink_plain_tooltip_active' => '1',
			// Translators: This string is configurable and can be translated by the user.
			'anrghg_heading_backlink_plain_tooltip_text'   => __( 'Link to this heading in the table of contents', 'anrghg' ),
			// Translators: This string is configurable and can be translated by the user.
			'anrghg_table_of_contents_label'               => __( 'Quick access', 'anrghg' ),
			'anrghg_table_of_contents_collapsing'          => '1', // -1 expanded, 0 uncollapsible, 1 collapsed.
			'anrghg_table_of_contents_alignment'           => '', // -1 left, 0 center, 1 right, <empty> unspecified.
			'anrghg_table_of_contents_position'            => '0', // -1 end, 0 before-1st-h, 1 top.
			'anrghg_table_of_contents_positioner_name'     => 'anrghg_toc',
			'anrghg_table_of_contents_heading_id_prefix'   => 't',
			'anrghg_table_of_contents_top_heading_bold'    => '1', // 1 bold, 0 normal.
			'anrghg_table_of_contents_stepped_indentation' => '1', // 1 indented, 0 aligned.
			'anrghg_table_of_contents_desktop_indent_px'   => '22',
			'anrghg_table_of_contents_mobile_indent_px'    => '7',
			'anrghg_table_of_contents_exclude_generated'   => '0',
			'anrghg_fragment_identifiers_priority_select'  => '0', // -1 highest, 0 input, 1 lowest.
			'anrghg_fragment_identifiers_priority_input'   => '1500',

			/**
			 * Notes and sources.
			 */
			'anrghg_complements_active'                    => '0',
			'anrghg_complements_syntax_warning'            => '1',
			'anrghg_complements_excluded_posts'            => '', // comma-separated post IDs.
			'anrghg_note_delimiter_preset'                 => '1', // -1 easy, 0 free, 1 safe.
			'anrghg_easy_note_start'                       => '(((',
			'anrghg_easy_note_end'                         => ')))',
			'anrghg_safe_note_start'                       => '[note]',
			'anrghg_safe_note_end'                         => '[/note]',
			'anrghg_free_note_start'                       => '[σημ]',
			'anrghg_free_note_end'                         => '[/σημ]',
			'anrghg_note_start'                            => '', // Determined below.
			'anrghg_note_end'                              => '', // Determined below.
			'anrghg_source_delimiter_preset'               => '1', // -1 easy, 0 free, 1 safe.
			'anrghg_easy_source_start'                     => '{{{',
			'anrghg_easy_source_end'                       => '}}}',
			'anrghg_safe_source_start'                     => '[src]',
			'anrghg_safe_source_end'                       => '[/src]',
			'anrghg_free_source_start'                     => '[упом]',
			'anrghg_free_source_end'                       => '[/упом]',
			'anrghg_source_start'                          => '', // Determined below.
			'anrghg_source_end'                            => '', // Determined below.
			'anrghg_name_delimiter_preset'                 => '1', // -1 easy, 0 free, 1 safe.
			'anrghg_easy_name_start'                       => '((',
			'anrghg_easy_name_end'                         => '))',
			'anrghg_safe_name_start'                       => '[name]',
			'anrghg_safe_name_end'                         => '[/name]',
			'anrghg_free_name_start'                       => '[이름]',
			'anrghg_free_name_end'                         => '[/이름]',
			'anrghg_complement_name_start'                 => '', // Determined below.
			'anrghg_complement_name_end'                   => '', // Determined below.
			'anrghg_complement_delimiters_use_post_meta'   => '1', // By configuration filter only.
			'anrghg_previous_delimiters_below_post_id'     => '0', // By configuration filter only.
			'anrghg_previous_note_start'                   => '', // By configuration filter only.
			'anrghg_previous_note_end'                     => '', // By configuration filter only.
			'anrghg_previous_source_start'                 => '', // By configuration filter only.
			'anrghg_previous_source_end'                   => '', // By configuration filter only.
			'anrghg_previous_complement_name_start'        => '', // By configuration filter only.
			'anrghg_previous_complement_name_end'          => '', // By configuration filter only.
			'anrghg_subheadings_as_section_dividers'       => '0',
			'anrghg_process_complements_in_widgets'        => '0',
			'anrghg_complement_section_end_name'           => 'anrghg_section',

			/**
			 * Anchors (Notes and sources).
			 */
			'anrghg_note_numbering_system'                 => '5', // 0 Western Arabic, 1 Eastern Arabic, 2 uppercase Roman, 3 lowercase Roman, 4 lowercase Latin, 5 uppercase Latin.
			'anrghg_source_numbering_system'               => '0', // 0 Western Arabic, 1 Eastern Arabic, 2 uppercase Roman, 3 lowercase Roman, 4 lowercase Latin, 5 uppercase Latin.
			'anrghg_combine_identical_complements'         => '1',
			'anrghg_complement_anchor_prefix_word_joiner'  => '1',
			'anrghg_note_anchor_prefix'                    => '(',
			'anrghg_note_anchor_suffix'                    => ')',
			'anrghg_source_anchor_prefix'                  => '',
			'anrghg_source_anchor_suffix'                  => '',
			// Translators: %s: the note number. This string is a configurable ARIA label and can be translated by the user.
			'anrghg_note_anchor_aria_label'                => __( 'Note %s anchor', 'anrghg' ),
			// Translators: %s: the source number. This string is a configurable ARIA label and can be translated by the user.
			'anrghg_source_anchor_aria_label'              => __( 'Source %s anchor', 'anrghg' ),
			'anrghg_adjacent_complement_anchor_separator'  => ',',
			'anrghg_complement_anchor_url_id_prefix'       => 'a',
			'anrghg_complement_anchor_spacing'             => '0', // 0 none, 1 CSS, 2 SPACE.
			'anrghg_complement_anchor_padding'             => '0.2', // em.

			/**
			 * Anchor tooltips (Notes and sources).
			 */
			'anrghg_anchor_tooltips_active'                => '1',
			'anrghg_display_anchor_tooltips_on_tap'        => '0',
			'anrghg_tooltip_delimiter_preset'              => '1', // -1 easy, 0 free, 1 safe.
			'anrghg_easy_tooltip_end'                      => '||',
			'anrghg_safe_tooltip_end'                      => '[/view]',
			'anrghg_free_tooltip_end'                      => '[/ดู]',
			'anrghg_anchor_tooltip_end'                    => '', // Determined below.
			'anrghg_list_link_delimiter_preset'            => '1', // -1 easy, 0 free, 1 safe.
			'anrghg_easy_list_link_start'                  => '{{',
			'anrghg_easy_list_link_end'                    => '}}',
			'anrghg_safe_list_link_start'                  => '[link]',
			'anrghg_safe_list_link_end'                    => '[/link]',
			'anrghg_free_list_link_start'                  => '[リンク]',
			'anrghg_free_list_link_end'                    => '[/リンク]',
			'anrghg_anchor_tooltip_list_link_start'        => '', // Determined below.
			'anrghg_anchor_tooltip_list_link_end'          => '', // Determined below.
			'anrghg_previous_anchor_tooltip_end'           => '', // By configuration filter only.
			'anrghg_previous_tooltip_list_link_start'      => '', // By configuration filter only.
			'anrghg_previous_tooltip_list_link_end'        => '', // By configuration filter only.
			'anrghg_note_tooltip_list_link_active'         => '1',
			// Translators: This string is a configurable list link text in dedicated note tooltip and can be translated by the user.
			'anrghg_note_tooltip_list_link_text'           => __( 'See the note', 'anrghg' ),
			'anrghg_source_tooltip_list_link_active'       => '1',
			// Translators: This string is a configurable list link text in dedicated source tooltip and can be translated by the user.
			'anrghg_source_tooltip_list_link_text'         => __( 'See the source', 'anrghg' ),
			'anrghg_generic_note_tooltip_active'           => '0',
			// Translators: 1, 2: the start and end tags of the link to the note list item. This string is a configurable generic note tooltip content and can be translated by the user.
			'anrghg_generic_note_tooltip_content'          => __( 'Please click %1$s here%2$s to read the note.', 'anrghg' ),
			'anrghg_generic_source_tooltip_active'         => '0',
			// Translators: 1, 2: the start and end tags of the link to the source list item. This string is a configurable generic source tooltip content and can be translated by the user.
			'anrghg_generic_source_tooltip_content'        => __( 'Please click %1$s here%2$s to read the source.', 'anrghg' ),

			/**
			 * Tooltip position (Notes and sources).
			 */
			'anrghg_small_anchor_tooltip_maximum_width'    => '290', // pixels.
			'anrghg_small_anchor_tooltip_horizontal_edge'  => 'left', // left,right.
			'anrghg_small_anchor_tooltip_horizontal_inset' => '-145', // pixels.
			'anrghg_small_anchor_tooltip_vertical_edge'    => 'bottom', // top,bottom.
			'anrghg_small_anchor_tooltip_vertical_inset'   => '30', // pixels.
			'anrghg_anchor_tooltip_str_length_breakpoint'  => '400', // characters.
			'anrghg_small_tooltip_mobile_breakpoint'       => '768', // pixels, width.
			'anrghg_scrollable_anchor_tooltips'            => '0', // boolean.
			'anrghg_anchor_tooltip_maximum_height'         => '240', // pixels.

			/**
			 * Tooltip aspect (Notes and sources).
			 */
			'anrghg_anchor_tooltip_fade_in_delay'          => '0', // milliseconds.
			'anrghg_anchor_tooltip_fade_in_duration'       => '200', // milliseconds.
			'anrghg_anchor_tooltip_fade_in_function'       => 'ease-in-out', // linear, ease-out, ease, ease-in-out, ease-in.
			'anrghg_anchor_tooltip_fade_out_delay'         => '500', // milliseconds.
			'anrghg_anchor_tooltip_fade_out_duration'      => '1000', // milliseconds.
			'anrghg_anchor_tooltip_fade_out_function'      => 'ease-in-out', // linear, ease-out, ease, ease-in-out, ease-in.
			'anrghg_anchor_tooltip_line_height'            => '1.5', // times the font size.
			'anrghg_anchor_tooltip_font_size'              => '15', // pixels.
			'anrghg_anchor_tooltip_foreground_color'       => '#000000',
			'anrghg_anchor_tooltip_background_color'       => '#FFFFFF',
			'anrghg_anchor_tooltip_border_width'           => '2',
			'anrghg_anchor_tooltip_border_style'           => 'solid', // solid, dotted, dashed, double, inset ,outset, ridge, groove, none, hidden.
			'anrghg_anchor_tooltip_border_radius'          => '0', // pixels.
			'anrghg_anchor_tooltip_border_color'           => '#8FC27A',
			'anrghg_anchor_tooltip_shadow_x_offset'        => '-2', // pixels.
			'anrghg_anchor_tooltip_shadow_y_offset'        => '4', // pixels.
			'anrghg_anchor_tooltip_shadow_blur'            => '11', // pixels.
			'anrghg_anchor_tooltip_shadow_spread'          => '5', // pixels.
			'anrghg_anchor_tooltip_shadow_color'           => '#5B5B5B',
			'anrghg_anchor_tooltip_padding_top'            => '10', // pixels.
			'anrghg_anchor_tooltip_padding_start'          => '20', // pixels.
			'anrghg_anchor_tooltip_padding_end'            => '18', // pixels.
			'anrghg_anchor_tooltip_padding_bottom'         => '10', // pixels.

			/**
			 * Backlinks (Notes and sources).
			 */
			'anrghg_number_backlink_symbol_display'        => '1', // -1 before, 0 none, 1 after.
			'anrghg_number_backlink_symbol_select'         => '↑',
			'anrghg_number_backlink_symbol_input'          => '',
			'anrghg_tail_backlink_symbol_display'          => '0', // 0, 1.
			'anrghg_tail_backlink_symbol_select'           => '↑',
			'anrghg_tail_backlink_symbol_input'            => '',
			// Translators: This string is a configurable first part of rich tooltip text for list numbers and can be translated by the user.
			'anrghg_backlink_rich_tooltip_first'           => __( 'This complement is linked from the following anchors:', 'anrghg' ),
			// Translators: This string is a configurable last part of rich tooltip text for list numbers and can be translated by the user.
			'anrghg_backlink_rich_tooltip_last'            => __( 'Please use the backbutton to scroll up exactly where you left.', 'anrghg' ),

			'anrghg_backlink_tooltip_fade_in_delay'        => '0', // milliseconds.
			'anrghg_backlink_tooltip_fade_in_duration'     => '200', // milliseconds.
			'anrghg_backlink_tooltip_fade_in_function'     => 'ease-in-out', // linear, ease-out, ease, ease-in-out, ease-in.
			'anrghg_backlink_tooltip_fade_out_delay'       => '500', // milliseconds.
			'anrghg_backlink_tooltip_fade_out_duration'    => '1000', // milliseconds.
			'anrghg_backlink_tooltip_fade_out_function'    => 'ease-in-out', // linear, ease-out, ease, ease-in-out, ease-in.

			'anrghg_backlink_tooltip_foreground_color'     => '#000000',
			'anrghg_backlink_tooltip_background_color'     => '#FFFFFF',
			'anrghg_backlink_tooltip_border_width'         => '2',
			'anrghg_backlink_tooltip_border_style'         => 'solid', // solid, dotted, dashed, double, inset ,outset, ridge, groove, none, hidden.
			'anrghg_backlink_tooltip_border_radius'        => '0', // pixels.
			'anrghg_backlink_tooltip_border_color'         => '#8FC27A',
			'anrghg_backlink_tooltip_shadow_x_offset'      => '-2', // pixels.
			'anrghg_backlink_tooltip_shadow_y_offset'      => '4', // pixels.
			'anrghg_backlink_tooltip_shadow_blur'          => '11', // pixels.
			'anrghg_backlink_tooltip_shadow_spread'        => '5', // pixels.
			'anrghg_backlink_tooltip_shadow_color'         => '#5B5B5B',
			'anrghg_backlink_tooltip_padding_top'          => '10', // pixels.
			'anrghg_backlink_tooltip_padding_start'        => '20', // pixels.
			'anrghg_backlink_tooltip_padding_end'          => '18', // pixels.
			'anrghg_backlink_tooltip_padding_bottom'       => '10', // pixels.
			'anrghg_backlink_plain_tooltip_mode'           => '1', // 0 none, 1 symbolic, 2 verbose.
			// Translators: This string is a configurable verbose plain tooltip text for list numbers and can be translated by the user.
			'anrghg_backlink_plain_tooltip_verbose'        => __( 'Hint: Hit the backbutton instead.', 'anrghg' ),
			'anrghg_backlink_plain_tooltip_symbolic'       => 'Alt + ←', // Ordinary arrow instead of U+2B05, rather than less supported triangle-headed U+2B60.

			/**
			 * Lists (Notes and sources).
			 */
			'anrghg_complement_priority_select'            => '1', // -1 highest, 0 input, 1 lowest.
			'anrghg_complement_priority_input'             => '1000',
			// Translators: %s: the note number. This string is a configurable ARIA label for note list number and can be translated by the user.
			'anrghg_note_list_number_aria_label'           => __( 'Note number %s', 'anrghg' ),
			// Translators: %s: the source number. This string is a configurable ARIA label for source list number and can be translated by the user.
			'anrghg_source_list_number_aria_label'         => __( 'Source number %s', 'anrghg' ),
			'anrghg_note_url_id_prefix'                    => 'note',
			'anrghg_source_url_id_prefix'                  => 'source',
			'anrghg_complement_list_grouping_active'       => '1',
			// Translators: This string is a configurable List group heading and can be translated by the user.
			'anrghg_complement_list_group_heading'         => __( 'Notes and Sources', 'anrghg' ),
			'anrghg_list_group_heading_element'            => '7', // 0 auto, 1..6 h1..h6, 7 div.
			'anrghg_list_group_heading_font_size_option'   => '3', // 0 inherit, 1 px, 2 em, 3 rem.
			'anrghg_list_group_heading_font_size_px'       => '15',
			'anrghg_list_group_heading_font_size_em'       => '1.5',
			'anrghg_list_group_heading_font_size_rem'      => '1.5',
			'anrghg_complement_list_label_element'         => '7', // 0 auto, 1..6 h1..h6, 7 div.
			'anrghg_complement_list_label_font_size_opt'   => '3', // 0 inherit, 1 px, 2 em, 3 rem.
			'anrghg_complement_list_label_font_size_px'    => '15',
			'anrghg_complement_list_label_font_size_em'    => '1.5',
			'anrghg_complement_list_label_font_size_rem'   => '1.5',
			// Translators: This string is a configurable list heading ARIA label and can be translated by the user.
			'anrghg_note_list_label_aria_label'            => __( 'Note list', 'anrghg' ),
			// Translators: This string is configurable and can be translated by the user.
			'anrghg_note_list_label_plural'                => _x( 'Notes', 'configurable plural', 'anrghg' ),
			// Translators: This string is configurable and can be translated by the user.
			'anrghg_note_list_label_dual'                  => _x( 'Notes', 'configurable dual', 'anrghg' ),
			// Translators: This string is configurable and can be translated by the user.
			'anrghg_note_list_label_singular'              => _x( 'Note', 'configurable', 'anrghg' ),
			// Translators: This string is a configurable list heading ARIA label and can be translated by the user.
			'anrghg_source_list_label_aria_label'          => _x( 'Source list', 'configurable', 'anrghg' ),
			// Translators: This string is configurable and can be translated by the user.
			'anrghg_source_list_label_plural'              => _x( 'Sources', 'configurable plural', 'anrghg' ),
			// Translators: This string is configurable and can be translated by the user.
			'anrghg_source_list_label_dual'                => _x( 'Sources', 'configurable dual', 'anrghg' ),
			// Translators: This string is configurable and can be translated by the user.
			'anrghg_source_list_label_singular'            => _x( 'Source', 'configurable singular', 'anrghg' ),
			'anrghg_note_list_layout'                      => '1', // 1, 2, 3 columns.
			'anrghg_source_list_layout'                    => '1', // 1, 2, 3 columns.
			// 'anrghg_complement_list_footer_deferral'    => Fast-tracked above.
			// 'anrghg_complement_list_output_buffer'      => Fast-tracked above.
			'anrghg_note_list_collapsing'                  => '1', // -1 expanded, 0 uncollapsible, 1 collapsed.
			'anrghg_source_list_collapsing'                => '1', // -1 expanded, 0 uncollapsible, 1 collapsed.
			'anrghg_full_note_list_expand_from_anchor'     => '0',
			'anrghg_full_source_list_expand_from_anchor'   => '0',
			'anrghg_display_urls_note_list'                => '0',
			'anrghg_display_urls_source_list'              => '0',
			'anrghg_display_urls_selectable'               => '1',

			/**
			 * Reference lists.
			 */
			// Translators: This string is a configurable list ARIA label and can be translated by the user.
			'anrghg_reference_list_aria_label'             => __( 'Reference list', 'anrghg' ),
			// Translators:
			// Translators: %s: the numeral of the reference (may not be a number). This string is a configurable item ARIA label and can be translated by the user.
			'anrghg_reference_item_aria_label'             => __( 'Reference %s', 'anrghg' ),
			// Translators: This string is a configurable label and can be translated by the user.
			'anrghg_reference_list_label'                  => __( 'References', 'anrghg' ),
			'anrghg_reference_list_label_element'          => '7', // 0 auto, 1..6 h1..h6, 7 div.
			'anrghg_reference_list_label_font_size_option' => '3', // 0 inherit, 1 px, 2 em, 3 rem.
			'anrghg_reference_list_label_font_size_px'     => '15',
			'anrghg_reference_list_label_font_size_em'     => '1.5',
			'anrghg_reference_list_label_font_size_rem'    => '1.5',
			'anrghg_reference_list_numbering_system'       => '0', // 0 Western Arabic, 1 Eastern Arabic, 2 uppercase Roman, 3 lowercase Roman, 4 lowercase Latin, 5 uppercase Latin.
			'anrghg_reference_list_bullet_active'          => '0',
			'anrghg_reference_list_bullet_select'          => '•',
			'anrghg_reference_list_bullet_input'           => '',
			'anrghg_reference_item_link_active'            => '1',
			// Translators: This string is a configurable tooltip and can be translated by the user.
			'anrghg_reference_item_tooltip_text'           => __( 'Link to this reference', 'anrghg' ),
			'anrghg_reference_list_url_id_prefix'          => 'ref',
			'anrghg_reference_list_collapsing'             => '1', // -1 expanded, 0 uncollapsible, 1 collapsed.
			'anrghg_reference_list_priority_select'        => '0', // -1 highest, 0 input, 1 lowest.
			'anrghg_reference_list_priority_input'         => '1000',

		);

		/**
		 * Prepares the final configuration array.
		 */
		$l_a_defaults      = array_merge( $g_a_fast_tracked_defaults, $l_a_defaults );
		$l_a_registered    = get_option( 'anrghg' );
		$g_a_anrghg_config = array();
		foreach ( $l_a_defaults as $l_s_key => $l_s_value ) {
			$g_a_anrghg_config[ $l_s_key ] = isset( $l_a_registered[ $l_s_key ] ) ?
				$l_a_registered[ $l_s_key ] :
				$l_a_defaults[ $l_s_key ];
		}

		/**
		 * Resolves preset values.
		 */
		switch ( $g_a_anrghg_config['anrghg_note_delimiter_preset'] ) {
			case '-1':
				$g_a_anrghg_config['anrghg_note_start'] = $g_a_anrghg_config['anrghg_easy_note_start'];
				$g_a_anrghg_config['anrghg_note_end']   = $g_a_anrghg_config['anrghg_easy_note_end'];
				break;
			case '0':
				$g_a_anrghg_config['anrghg_note_start'] = $g_a_anrghg_config['anrghg_free_note_start'];
				$g_a_anrghg_config['anrghg_note_end']   = $g_a_anrghg_config['anrghg_free_note_end'];
				break;
			case '1':
			default:
				$g_a_anrghg_config['anrghg_note_start'] = $g_a_anrghg_config['anrghg_safe_note_start'];
				$g_a_anrghg_config['anrghg_note_end']   = $g_a_anrghg_config['anrghg_safe_note_end'];
		}
		switch ( $g_a_anrghg_config['anrghg_source_delimiter_preset'] ) {
			case '-1':
				$g_a_anrghg_config['anrghg_source_start'] = $g_a_anrghg_config['anrghg_easy_source_start'];
				$g_a_anrghg_config['anrghg_source_end']   = $g_a_anrghg_config['anrghg_easy_source_end'];
				break;
			case '0':
				$g_a_anrghg_config['anrghg_source_start'] = $g_a_anrghg_config['anrghg_free_source_start'];
				$g_a_anrghg_config['anrghg_source_end']   = $g_a_anrghg_config['anrghg_free_source_end'];
				break;
			case '1':
			default:
				$g_a_anrghg_config['anrghg_source_start'] = $g_a_anrghg_config['anrghg_safe_source_start'];
				$g_a_anrghg_config['anrghg_source_end']   = $g_a_anrghg_config['anrghg_safe_source_end'];
		}
		switch ( $g_a_anrghg_config['anrghg_name_delimiter_preset'] ) {
			case '-1':
				$g_a_anrghg_config['anrghg_complement_name_start'] = $g_a_anrghg_config['anrghg_easy_name_start'];
				$g_a_anrghg_config['anrghg_complement_name_end']   = $g_a_anrghg_config['anrghg_easy_name_end'];
				break;
			case '0':
				$g_a_anrghg_config['anrghg_complement_name_start'] = $g_a_anrghg_config['anrghg_free_name_start'];
				$g_a_anrghg_config['anrghg_complement_name_end']   = $g_a_anrghg_config['anrghg_free_name_end'];
				break;
			case '1':
			default:
				$g_a_anrghg_config['anrghg_complement_name_start'] = $g_a_anrghg_config['anrghg_safe_name_start'];
				$g_a_anrghg_config['anrghg_complement_name_end']   = $g_a_anrghg_config['anrghg_safe_name_end'];
		}
		switch ( $g_a_anrghg_config['anrghg_tooltip_delimiter_preset'] ) {
			case '-1':
				$g_a_anrghg_config['anrghg_anchor_tooltip_end'] = $g_a_anrghg_config['anrghg_easy_tooltip_end'];
				break;
			case '0':
				$g_a_anrghg_config['anrghg_anchor_tooltip_end'] = $g_a_anrghg_config['anrghg_free_tooltip_end'];
				break;
			case '1':
			default:
				$g_a_anrghg_config['anrghg_anchor_tooltip_end'] = $g_a_anrghg_config['anrghg_safe_tooltip_end'];
		}
		switch ( $g_a_anrghg_config['anrghg_list_link_delimiter_preset'] ) {
			case '-1':
				$g_a_anrghg_config['anrghg_anchor_tooltip_list_link_start'] = $g_a_anrghg_config['anrghg_easy_list_link_start'];
				$g_a_anrghg_config['anrghg_anchor_tooltip_list_link_end']   = $g_a_anrghg_config['anrghg_easy_list_link_end'];
				break;
			case '0':
				$g_a_anrghg_config['anrghg_anchor_tooltip_list_link_start'] = $g_a_anrghg_config['anrghg_free_list_link_start'];
				$g_a_anrghg_config['anrghg_anchor_tooltip_list_link_end']   = $g_a_anrghg_config['anrghg_free_list_link_end'];
				break;
			case '1':
			default:
				$g_a_anrghg_config['anrghg_anchor_tooltip_list_link_start'] = $g_a_anrghg_config['anrghg_safe_list_link_start'];
				$g_a_anrghg_config['anrghg_anchor_tooltip_list_link_end']   = $g_a_anrghg_config['anrghg_safe_list_link_end'];
		}

		/**
		 * Fixes the table of contents activation state.
		 *
		 * @since 1.4.4
		 * When the table of contents is fully deactivated on a site that is
		 * part of a multisite network, the unrelated Thank You message block
		 * encounters an error.
		 * Deactivating the table of contents overall is pointless anyway.
		 * The previous default was '0'.
		 */
		if ( '0' === $g_a_anrghg_config['anrghg_table_of_contents_active'] ) {
			$g_a_anrghg_config['anrghg_table_of_contents_active'] = '-1';
		}

		/**
		 * Determines the login control constant.
		 *
		 * @since 0.45.0
		 */
		global $g_s_login_control_constant;
		$l_s_constant_end            = $g_a_anrghg_config['anrghg_login_control_constant_end'];
		$l_s_constant_end            = preg_replace( '/[^A-Z_]/', '', strtoupper( $l_s_constant_end ) );
		$g_s_login_control_constant .= $l_s_constant_end;

	}
);

/**
 * Includes the functions for public pages.
 *
 * @since 1.0.1 Split files off to keep the code editable online.
 * Web-based code editors may not be able to save big files.
 * The threshold was around 65.000 characters.
 * @since 1.3.1 Add: `security.php`, `messages.php`, `dates.php`.
 * @since 1.5.9 Finish organizing the code.
 * @since 1.9.0 Add `customize.php`.
 * @since 1.15.0 Add `include.php`.
 * @since 1.16.0 Add `filtered.php`.
 * @since 1.16.0 Add `interoperability.php`.
 * The small helping features are reunited in `helpers.php`.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/complements.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/contents.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/customize.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/dates.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/filtered.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/helpers.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/include.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/interoperability.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/messages.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/modular.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/references.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/security.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/styles.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/stylesplit.php';

/**
 * Calls the administration page.
 *
 * @since 0.14.1
 * @link https://developer.wordpress.org/plugins/plugin-basics/best-practices/#conditional-loading
 */
if ( is_admin() ) {
	include_once plugin_dir_path( __FILE__ ) . 'admin/anrghg-admin.php';
}
