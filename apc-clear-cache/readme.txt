=== APC Clear Cache ===
Contributors: obydul
Tags: apcu, apc, cache, purge
Requires at least: 3.2
Tested up to: 5.4.1
Stable tag: 1.2.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

This is a simple, single purpose plugin to clear the APC cache.

== Description ==

APCu/APC, is a free open-source opcode (operation code) caching plugin for PHP. If your host has installed APC/APCu cache this plugin allows you to clear the cache from within WordPress. Once activated, go to Tools -> APC Clear Cache to send the command to clear the APC/APCu cache. 

The plugin returns either 'Success' or gives a detailed error message if it is unable to run the command successfully.

Original Author: TJ Stein, inspired by 2020Media. 2020Media first created the plugin and 2020Media doesn't update their plugin since 3 years. For this reason I have released this plugin with some modifications.

👉 See Official GitHub page: [GitHub](https://github.com/mdobydullah/apc-clear-cache)

== Installation ==

How to install the plugin and get it working.

1. Upload the plugin files to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Use Tools -> APC Clear Cache to clear the APC/APCu cache.

== Frequently Asked Questions ==

= It does not work=

Not all hosts will allow the PHP commands that are necessary to clear the APC/APCu cache. There is nothing we can do about that. Sorry.

== Screenshots ==

1. screenshot-1.png

== Changelog ==

= 1.2 =
Release Date: Feb 24, 2020

* Added APCu clear cache option.

= 1.1 =
Release Date: Jun 23, 2018

* Added plugin settings page.

= 1.0 =
Release Date: Jun 11, 2018

* Initial release based on TJ Stein code.