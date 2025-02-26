=== Logout Button ===
Contributors: Ben Poland
Donate link: http://www.ben-poland-dev.com
Tags: log, out, logout, log out, log out button, redirect, re-direct, re direct
Requires at least: 3.0.0
Tested up to: 3.6
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Allows simple embedding of a log out button using one of three shortcodes corresponding to a different redirect option

== Description ==

<p>This plugin can be thought of as a front-end logout solution. It allows a WordPress administrator to embed a link on 
any page (or post if you want) that gives other WordPress users the ability to easily logout without having to fuss 
with the WordPress Dashboard. There are three shortcodes that can be used, and each one has a different redirect 
option: Redirect to Home, Current Page, or the WordPress Default wp-login.php page.</p>

<p>The Logout Button plugin uses the default log out functionality provided by WP through wp_loginout(). It checks to
see if the user is logged in. If the user is logged in, a Log Out link will be displayed to them. If the user is not
logged in, nothing will be shown to the user.</p>

<p>Future releases will include the ability to choose "Themes". Right now, a simple link is displayed and the CSS from
the currently activated theme is used on that link. Of course, there is always the ability to dive directly into 
display_button.php to edit the CSS yourself.</p>

== Installation ==

1. Upload the 'logout-button' folder to the `/wp-content/plugins/` directory. Alternatively, you can upload the .zip
   folder to WordPress directly using the WP Dashboard - Plugins -> Add New -> Upload.
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Choose the appropriate for your Pages or Posts: [logout-to-default], [logout-to-current], [logout-to-home]

== Frequently Asked Questions ==

== Screenshots ==

== Changelog ==

= 1.0 =
* This is the first release
* No known bugs

== Upgrade Notice ==
