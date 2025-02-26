=== Plugin Name ===
Contributors: mrxthefifth
Tags: ssl, user, force ssl, https, security, frontend
Requires at least: 2.6.0
Tested up to: 4.8
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin forces logged in users to use SSL.

== Description ==

If your website has some functions that allow logged in users to interact with your website on the front end, you might want to force your logged in users to use your website through SSL without forcing normal users to use SSL. Instead of having to insert the code into your theme, you can also just use this plugin, which hooks it to the `get_header()` function.
To secure the WordPress administration with SSL as well, please edit your `wp-config.php` as described in the [WordPress Codex](https://codex.wordpress.org/Administration_Over_SSL).

== Installation ==

= Install via WordPress Admin =
1. Go to Admin > Plugins > Add New
2. Either search for Force User SSL or upload the zip file and click "Install"
3. After installation, activate it

= Install via FTP =
1. First unzip the plugin file
2. Using FTP go to your server's wp-content/plugins directory
3. Upload the unzipped plugin here
4. Once finished login into your WP Admin and go to Admin > Plugins
5. Look for Force User SSL and activate it


== Frequently Asked Questions ==

= Do I need to configure anything? =

No, this plugin does not need a settings page.

= Does this plugin also force SSL in the backend of the website? =

No, please edit your `wp-config.php` as described in the [WordPress Codex](https://codex.wordpress.org/Administration_Over_SSL).

= Why does my browser tell me that my website is not secure? =

You have to have a valid SSL certificate for your website in order for this plugin to work. If you don't know how to get one, [Google it](http://www.google.com/?#q=how+to+obtain+an+ssl+certificate).


== Changelog ==

= 1.0 =
* Initial release