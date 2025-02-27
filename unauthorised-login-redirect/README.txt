=== Unauthorised Login Redirect ===
Contributors: rsdotscot
Tags: security, wp-admin, wp-login, login, redirect
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=VXYAWTLPZYE7E
Requires at least: 4.3
Tested up to: 6.4.2
Stable tag: trunk
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

This plugin allows you to effectively hide your wp-login.php and wp-admin by requiring that you access it via a custom URL.

== Description ==
This plugin allows you to effectively hide your wp-login.php and wp-admin by requiring that you access it via a custom URL of your specification, with every other request being redirected to a different URL of your specification.

== Installation ==
1. Download the zip file and decompress it.
2. Upload "unauthorised-login-redirect" to the "/wp-content/plugins/" directory.
3. Activate the plugin through the "Plugins" menu in WordPress.
4. Click *Login Redirect* in the admin menu.
5. Change the *secret login path*, *secret get key*, and *secret get value* to whatever you'd like them to be.

== Frequently Asked Questions ==
= I've forgotten my secret login path! How can I get logged in? =
Remove the following row from your wp_options table: rs_ulr_settings

Once it's removed you'll be able to log in to the site as normal and adjust the plugin settings.

== Screenshots ==
1. The admin interface.

== Changelog ==
= 0.3.9.1 =
* Bug fixing.

= 0.3.9 =
* Testing with WordPress 6.0.

= 0.3.8 =
* Minor bug fix.

= 0.3.7 =
* Testing with WordPress 5.3.

= 0.3.6 =
* Testing with WordPress 5.1.

= 0.3.5 =
* Testing with WordPress 4.7.2.

= 0.3.4 =
* Adjustment made for admin-ajax.php.

= 0.3.3 =
* Adding nonce to settings update.

= 0.3.2 =
* Reworked redirect options.

= 0.3.1 =
* Updating definitions.

= 0.3 =
* Addressing notices.

= 0.2.1 =
* CSS Bug fixes.

= 0.2 =
* Bug fixes.

= 0.1 =
* Initial release.

== Upgrade Notice ==
= 0.3.9.1 =
* Bug fixing.

= 0.3.9 =
* Testing with WordPress 6.0.

= 0.3.8 =
* Minor bug fix.

= 0.3.7 =
* Testing with WordPress 5.3.

= 0.3.6 =
* Testing with WordPress 5.1.

= 0.3.5 =
* Testing with WordPress 4.7.2.

= 0.3.4 =
* Adjustment made for admin-ajax.php.

= 0.3.3 =
* Adding nonce to settings update.

= 0.3.2 =
* Reworked redirect options.

= 0.3.1 =
* Updating definitions.

= 0.3 =
* Addressing notices.

= 0.2.1 =
* CSS Bug fixes.

= 0.2 =
* Bug fixes.

= 0.1 =
* Initial release.