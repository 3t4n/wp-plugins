=== APC Cache Purge ===
Contributors: 2020media,tj-stein
Donate link: http://www.2020media.com/wordpress/
Tags: APC, Cache, Purge
Requires at least: 3.2
Tested up to: 4.4
Stable tag: trunk
License: GPLv2 or later

This is a simple, single purpose plugin to flush the APC cache.

== Description ==

 Alternative PHP Cache, is a free open-source opcode (operation code) caching plugin for PHP. If your host has installed APC cache this plugin allows you to flush the cache from within WordPress. Once activated, go to Tools -> Purge APC to send the command to flush the APC cache. 

The plugin returns either 'Success' or gives a detailed error message if it is unable to run the command successfully.

Original Author: TJ Stein, inspired by Kaspars Dambis of konstruktors.com

== Installation ==

How to install the plugin and get it working.

1. Upload the plugin files to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Use Tools -> Purge APC to flush the APC cache.

== Frequently Asked Questions ==

= It does not work=

Not all hosts will allow the PHP commands that are necessary to flush the APC cache. There is nothing we can do about that. Sorry




== Changelog ==

= 1.0 =
* Initial release based on TJ Stein code.

