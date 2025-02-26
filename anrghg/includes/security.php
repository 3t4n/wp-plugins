<?php
/**
 * Login dialog and authentication cookies.
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
 * @see ../COPYING.txt
 */

defined( 'ABSPATH' ) || exit( nl2br( "\r\n\r\n&nbsp; &nbsp; &nbsp; Sorry, this PHP file cannot be displayed in the browser." ) );

/**
 * Deactivates WordPress login, configures authentication duration.
 *
 * @since 0.24.0
 * @since 1.4.0 Discourage high and standard profiles.
 * @since 1.5.0 Display login status in Admin bar.
 *
 * This security enhancement optionally prevents a WordPress website from
 * sending auth cookies, either by blocking auth cookie sending, or by
 * making the login dialog unavailable in the first place, an option that
 * must not be chosen if the login dialog is still used sporadically.
 * Making a public page reflect the availability of an action would allow
 * bots to monitor that availability in real time.
 *
 * Unlike hosting platform login information, WordPress login information
 * may be transparent to SQL injection attacks plus hash dictionaries.
 *
 * Logging into WordPress may be done through the Hosting Platform.
 * If this is the only way used to access the Admin area, then the login
 * dialog may be blanked out. An optional message may then be displayed
 * in its place.
 *
 * If logging in on a public page is desired, the authentication cookie
 * generation may be active during narrow windows of opportunity.
 *
 * For convenience, these windows may be spaced out farther than 14 days
 * using the authentication cookie lifespan configuration feature. This
 * feature is available only if the login control constant is defined.
 *
 * Toggling the auth cookie sending requires editing this constant’s
 * value. The possible values are true and false:
 *      true       Authentication cookies are generated.
 *      false      Authentication cookies are not generated.
 *
 * The recommended place for defining this constant is a mini-plugin, as
 * this is stable across switching themes. Then it can be edited in the
 * Admin area using the WordPress Plugin Editor.
 *
 * Alternatively, the Hosting Platform’s file manager may be used, or an
 * FTP client for editing the file locally.
 *
 * The status of logging in on a public page is displayed in the Admin bar.
 *
 * @link https://resources.infosecinstitute.com/topic/hacking-a-wordpress-site/
 * @link https://secure.wphackedhelp.com/blog/hack-wordpress-website/
 * @link https://www.cloudways.com/blog/wordpress-sql-injection-protection/
 *
 * The name of the constant is `ANRGHG_WP_LOGIN_ACTIVE` (by default) or
 * `ANRGHG_WP_LOGIN_` plus some letters and underscore as configured so
 * that each site in a multisite network can have an individual toggle.
 * @see template in `template-mini-plugin.php`.
 *
 *     // Turn login off by replacing true with false:
 *     define( 'ANRGHG_WP_LOGIN_ACTIVE', true );
 *
 * If the login dialog is not used any longer, alternative high-profile
 * or standard behavior blanks the dialog out and displays a message in
 * its place (high profile) or does not elaborate (standard).
 *
 * This option is based on code from Jonathan Daggerhart (@daggerhart on GitHub).
 * @link https://gist.github.com/daggerhart/d19821ff8ce836a5fc68
 *
 * Auth cookie lifespan editing is based on code from Jenson Felsberg.
 * @link http://wpcodesnippet.com/keep-users-logged-in-longer-wordpress/
 *
 * NOTE: There is no switch to turn this feature on or off.
 * Defining the constant in wp-config.php acts as a switch.
 * Conversely these parameters are configurable only on the
 * settings page, because for security reasons there are no
 * configuration filters available.
 *
 * @see details in the respective functions’ docblocks below.
 * @see ./template-mini-plugin.php
 * @since 1.4.5 Remove configuration filter application.
 *
 * @return void
 */
add_filter(
	'plugins_loaded',
	function() {
		global $g_s_login_control_constant, $g_i_login_deactivation_profile, $g_a_anrghg_config;
		if ( defined( $g_s_login_control_constant ) ) {
			if ( ! constant( $g_s_login_control_constant ) ) {
				$g_i_login_deactivation_profile = (int) $g_a_anrghg_config['anrghg_login_deactivation_profile'];

				if ( -1 === $g_i_login_deactivation_profile ) {

					/**
					 * Deactivates sending auth cookies. Low profile option.
					 *
					 * @since 0.24.0
					 * Recommended low-profile behavior only blocks cookie sending.
					 * The filter `send_auth_cookies` is documented in `wp-includes/pluggable.php`.
					 * @see wp-includes/pluggable.php:954
					 * @return false
					 */
					add_filter( 'send_auth_cookies', '__return_false' );

				} else {

					add_filter(
						'wp_login_errors',
						function( $p_o_errors ) {
							global $g_i_login_deactivation_profile;

							if ( 1 === $g_i_login_deactivation_profile ) {

								/**
								 * Edits the login page/screen. High profile option.
								 *
								 * @since 0.24.0
								 * The filter `wp_login_errors` is documented in `wp-login.php`.
								 * @see wp-login.php:1377..
								 * @since 0.80.9 Escape using `wp_kses_post()`.
								 * @since 0.81.4 Revert to 0.81.0, fix broken plugin, remove KSES.
								 * @param  object $p_o_errors  WP Error object.
								 * @return void
								 */
								login_header( __( 'Login deactivated', 'anrghg' ), '', $p_o_errors );
								$l_s_message = __( 'Login deactivated', 'anrghg' );
								$l_s_message = apply_filters( 'anrghg_deactivated_login_message_hook', $l_s_message );
								$l_s_markup  = '</div>';
								$l_s_markup .= '<div style="text-align: center; font-size: 18px;';
								$l_s_markup .= ' background: #E76262; padding: 30px;">';
								$l_s_markup .= '<p>' . $l_s_message . '</p></div>';
								anrghg_kses_echo(
									anrghg_minilight(
										'html',
										apply_filters(
											'anrghg_deactivated_login_screen_hook',
											$l_s_markup,
											$l_s_message
										)
									)
								);

							} else {

								/**
								 * Redacts the login dialog. Intermediate profile option.
								 *
								 * @since 0.24.0
								 *
								 * @courtesy Jonathan Daggerhart (@daggerhart on GitHub)
								 * @link https://gist.github.com/daggerhart/d19821ff8ce836a5fc68
								 *
								 * @param  object $p_o_errors  WP Error object.
								 * @return void
								 */
								login_header( __( 'Log In' ), '', $p_o_errors );
								echo '</div>';

							}
							do_action( 'login_footer' );
							echo "\r\n\t</body>\r\n</html>";
							exit;
						}
					);
				}
			}

			/**
			 * Edits the authentication cookie lifespan.
			 *
			 * @since 0.24.0
			 * Complementary optional authentication duration configuration.
			 *
			 * @courtesy Jenson Felsberg
			 * @link http://wpcodesnippet.com/keep-users-logged-in-longer-wordpress/
			 *
			 * @since 0.24.1 More fine-grained configuration (days, not weeks).
			 * @see wp-includes/pluggable.php:892
			 * @see wp-includes/user.php:2383
			 * @since 0.27.2 Input field maxes at 373 on settings page.
			 * @since 0.43.1 Debug. Apologies for the late debugging.
			 * @see https://developer.wordpress.org/reference/functions/apply_filters/#comment-2122
			 * @since 0.68.0 Hard-code the restriction to 1 year + 1 week.
			 * @since 0.80.4 Fix bug due to the auth cookie not being editable regardless what Boolean the constant is defined as.
			 * @since 1.4.5 Remove configuration filter application.
			 *
			 * @param  int $p_i_auth_expiration_seconds
			 * @return int $p_i_auth_expiration_seconds
			 */
			if ( $g_a_anrghg_config['anrghg_auth_duration_edit'] ) {
				add_filter(
					'auth_cookie_expiration',
					function( $p_i_auth_expiration_seconds ) {
						global $g_a_anrghg_config;
						$l_i_auth_expiration_days = (int) $g_a_anrghg_config['anrghg_auth_expiration_days'];
						if ( 373 < $l_i_auth_expiration_days ) {
							$l_i_auth_expiration_days = 373;
						}
						$p_i_auth_expiration_seconds = 86400 * $l_i_auth_expiration_days;
						return $p_i_auth_expiration_seconds;
					},
					10,
					3
				);
			}
		}
		return;
	}
);
