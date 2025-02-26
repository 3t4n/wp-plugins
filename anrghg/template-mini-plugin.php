<?php
// phpcs:ignoreFile
/**
 * %%%%%%%Plugin Name: A.N.R.GHG Publishing Toolkit Configuration
 *
 * @package WordPress
 *
 * Description: Access toggle, configuration filters and output filters.
 *
 * Installation:
 *
 * 1. Please copy or move this file out of the `anrghg` plugin folder. Moving this file
 *    into an extra folder, for example `anrghg_config`, is optional.
 * 2. Delete the seven leading % signs above, for this to become a valid plugin header.
 * 3. Open your Admin area’s ‘Plugins’ page. The name above should show up in the list.
 *
 * Usage:
 *
 * Once this mini plugin is activated, the filters copy-pasted from the filter template
 * files or already present below become effective and override the settings configured
 * on the A.N.R.GHG Publishing Toolkit’s Settings page. Also the access toggle constanẗ
 * starts determining whether authentication cookies are sent, or whether logging in is
 * available at all, depending on the settings.
 *
 * @see anrghg/template-filter-config.php
 * @see anrghg/template-filter-output.php
 *
 * The previous delimiters, available as filters below, may eventually become available
 * as settings on the settings page too. If unused, these filters may be deleted.
 *
 * To allow handy one-liner templates, PHPCS does not check this file.
 */

defined( 'ABSPATH' ) || exit( nl2br( "\r\n\r\n&nbsp; &nbsp; &nbsp; Sorry, this PHP file cannot be displayed in the browser." ) );



/**
 * Security: Stay logged in and don’t leave logging in available non-stop.
 *
 * Security is improved by not sending authentication cookies except when
 * a constant is defined as true in a mini-plugin editable on the hosting
 * platform. The lifespan of the cookie may then optionally be increased.
 *
 * CAUTION: This security feature is efficient only on websites hosted on
 *          a dedicated server, a Virtual Private Server (VPS), or shared
 *          hosting with VPS level security set up by the hosting provider.
 *
 *          Unless the hosting provider has set up VPS level security,
 *          shared hosting can be hacked by web shell from any website
 *          in the same home directory.
 *
 * @link https://resources.infosecinstitute.com/topic/hacking-a-wordpress-site/
 * @date updated_date="05/05/2015" posted_date="05/05/2015"
 * @link https://secure.wphackedhelp.com/blog/hack-wordpress-website/
 * @date updated_time="2023-01-06T07:34:56+00:00" published_time="2021-02-25T14:16:20+00:00"
 * @link https://www.cloudways.com/blog/wordpress-sql-injection-protection/
 * @date Updated on December 8, 2021
 * @link https://www.getastra.com/blog/knowledge-base/shared-hosting-security-risks/
 * @date Updated on: July 22, 2022
 * @link https://secure.wphackedhelp.com/blog/web-shell-php-exploit/
 * @date Updated on January 4, 2023
 *
 * Unlike hosting platform login information, WordPress login information
 * may be transparent to SQL injection attacks.
 *
 * Logging into WordPress may be done through the Hosting Platform.
 * If this is the only way used to access the Admin area, then the login
 * dialog may be blanked out. An optional message may then be displayed
 * in its place.
 *
 * This security enhancement optionally prevents a WordPress website from
 * sending auth cookies, either by blocking auth cookie generation, or by
 * making the login dialog unavailable in the first place, an option that
 * must not be chosen if the login dialog is still used sporadically.
 * Making a public page reflect the availability of an action would allow
 * bots to monitor that availability in real time.
 *
 * If logging in on a public page is desired, the authentication cookie
 * generation may be active during narrow windows of opportunity.
 *
 * For convenience, these windows may be spaced out farther than 14 days
 * using the authentication cookie lifespan configuration feature. This
 * feature is available only if the login control constant is defined.
 *
 * Toggling the availability of auth cookies is done by editing this
 * constant’s value. The possible values are true and false:
 *      true       Authentication cookies are sent.
 *      false      Authentication cookies are not sent.
 *
 * The recommended place for defining this constant is a mini-plugin, as
 * this is stable across switching themes. Then it can be edited in the
 * Admin area using the WordPress Plugin Editor.
 *
 * Alternatively, the Hosting Platform’s file manager may be used, or an
 * FTP client for editing the file locally.
 *
 * The name of the constant is `ANRGHG_WP_LOGIN_ACTIVE` (by default) or
 * `ANRGHG_WP_LOGIN_` plus some letters and underscore as configured so
 * that each site in a multisite network can have an individual toggle.
 * @see template in `template-mini-plugin.php`.
 *
 * If the login dialog is not used any longer, alternative high-profile
 * or standard behavior blanks the dialog out and displays a message in
 * its place, for high profile, or does not elaborate, for standard.
 *
 * This option is based on code from Jonathan Daggerhart (@daggerhart on GitHub).
 * @link https://gist.github.com/daggerhart/d19821ff8ce836a5fc68
 *
 * Auth cookie lifespan editing is based on code from Jenson Felsberg.
 * @link http://wpcodesnippet.com/keep-users-logged-in-longer-wordpress/
 *
 * NOTE: There is no switch to turn this feature on or off.
 * Defining the constant in a mini-plugin acts as a switch.
 * Conversely these parameters are configurable only on the
 * settings page, because for security reasons there are no
 * configuration filters available.
 */
// Turn login off by replacing true with false.
define( 'ANRGHG_WP_LOGIN_ACTIVE', true );



/**
 * Previous delimiters for notes and sources
 *
 * If delimiters are in use that are no longer preferred, they
 * may be configured here, along with the ID of the first post
 * where the new delimiters as configured above will be used.
 *
 * Leave empty to skip any of these configurations.
 *
 * Tooltip-related previous delimiters may also be configured,
 * below under the title: * Previous delimiters for tooltips
 */
add_filter( 'anrghg_previous_delimiters_below_post_id', function() { return '0'; } );
add_filter( 'anrghg_previous_note_start', function() { return ''; } );
add_filter( 'anrghg_previous_note_end', function() { return ''; } );
add_filter( 'anrghg_previous_source_start', function() { return ''; } );
add_filter( 'anrghg_previous_source_end', function() { return ''; } );
add_filter( 'anrghg_previous_complement_name_start', function() { return ''; } );
add_filter( 'anrghg_previous_complement_name_end', function() { return ''; } );

/**
 * Previous delimiters for note and source tooltips
 *
 * If delimiters are in use that are no longer preferred, they
 * may be configured here, along with the ID of the first post
 * where the new delimiters as configured above will be used.
 *
 * Leave empty to skip any of these configurations.
 *
 * These are only the tooltip-related keys. All other previous
 * delimiters along with the post ID threshold are in the main
 * section above under the title: * Previous delimiters
 */
add_filter( 'anrghg_previous_anchor_tooltip_end', function() { return ''; } );
add_filter( 'anrghg_previous_anchor_tooltip_list_link_start', function() { return ''; } );
add_filter( 'anrghg_previous_anchor_tooltip_list_link_end', function() { return ''; } );
