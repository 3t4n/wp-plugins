=== Development Environment Notification ===
Contributors: alexphelps3
Donate link: https://goo.gl/BeyOdv
Tags: development, admin bar, development tools
Requires at least: 0.2
Tested up to: 3.9
Stable tag: 0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin adds a simple notification on the WP Admin bar to help the developer know if they are looking at development or production. 

== Description ==

#### Ever confused between Development and Production when using Host Files?

This plugin adds a simple notification on the WP Admin bar to help the developer know if they are looking at development or production environments without needing to check host files and so on. 



== Installation ==

This section describes how to install the plugin and get it working.

1. Drop into mu plugins or if your on a single site, can just activate like a regular plugin
2. Define `define('DEVBAR_NOTIFY', true);` in your wp-config.php

== Frequently Asked Questions ==


= Does this work with Multisite? =

Yes, this plugin is intended to be used as a mu plugin.

= How do I enable the notification? =

Define `define('DEVBAR_NOTIFY', true);` in your wp-config.php and you’ll see the notification.

== Screenshots ==

1. Admin bar notification when you’re logged in.

2. Login screen notification so you know when you’re logging in.


== Changelog ==

= 0.2 =
* Add notification to the login screen as well

= 0.1 =
* Initial release


== Upgrade Notice ==

= 0.2 =
Added feature to show a notification on the login screen as well.