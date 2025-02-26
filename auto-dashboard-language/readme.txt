=== Auto Dashboard Language ===
Contributors: Patrick de Groot (WS)
Tags: language,detect language,browser language preference
Requires at least: 3
Tested up to: 4.9.4
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Auto Dashboard Language: Set WordPress widgets language to browser language of visitor unless configured at user profile.

== Description ==
If Auto Dashboard Language is installed and activated, the browser language preference is used to determine the WordPress Dashboard and widget language.

1) User visits WordPress site
2a) If the user is NOT logged in (anonymous):
The language preference set of the browser is compared to the installed WordPress languages. If any browser language in is installed, it is set as language for the user. If not, the global site language is used.
2b) If user is logged in:
If the user has a profile language configured (not equals 'Site Default') this language is used. If not:
The language preference set of the browser is compared to the installed WordPress languages. If any browser language in is installed, it is set as language for the user. If not, the global site language is used.

Plugin also fixes other plugins that don\'t recognize the profile language setting yet (introduced in WP 4.7).

If you use a caching plugin for anonymous users and wan't to prevent presenting some of your widgets in a random users preferred language (when page is saved in cache) add define('WSADL_SKIP_ANONYMOUS', true) to wp-config.php .

== Installation ==
1. Upload the auto-dashboard-language folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the \'Plugins\' menu in WordPress.
-OR-
Install and activate from WordPress plugins dashboard feature.


== Changelog ==
180201 Initial release
