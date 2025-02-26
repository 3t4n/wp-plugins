=== Prevent Password Reuse ===
Contributors: simonbbrown
Tags: password, security, prevent password reuse
Requires at least: 3.7
Tested up to: 4.0
Stable tag: 1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin keeps records of your users hashed passwords in order to prevent them from reusing their current or a previous password

== Description ==

This plugin keeps records of your users hashed passwords in order to prevent them from reusing their current or a previous password

*   Stores password securely
*   Prevents users from reusing their exisiting or previous passwords

== Installation ==

1. Download
1. Upload to your `/wp-contents/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.

== Frequently Asked Questions ==

= Are stored passwords secure? =
The passwords are as secure as the current password for your user, the plugin only stores the hashed version of the password.

= How can I reset the stored passwords? =
run the following mysql - TRUNCATE TABLE `###password_log` - where ### is your table prefix (this can be found on your wp-config.php


== Changelog ==

= 1.1 =
Code refactoring for best practices.

= 1.0 =
Initial release version