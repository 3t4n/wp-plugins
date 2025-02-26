=== Get replytocom Back ===
Contributors: likeflamingo
Tags: replytocom, comments
Requires at least: 4.8
Tested up to: 4.9.7
Stable tag: trunk
Requires PHP: 5.2.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Simple plugin to re-enable replytocom if it is disabled by Yoast.

== Description ==

# Get replytocom Back #

By default, Yoast SEO (v7.0.2+) removes `?replytocom` variables from URLs. This breaks the default WordPress reply to comment function. As of v7.0.2 there is no longer a toggle switch for the user in the Yoast plugin. 

"Get replytocom Back" simply re-enables `?replytocom` using the method suggested by Yoast support at https://wordpress.org/support/topic/how-to-get-replytocom-back/ while avoiding the need to create a child theme or modify the functions.php file.

== Installation ==

1. Click on the `Download ZIP` button at the right to download the plugin.
2. Go to Plugins > Add New in your WordPress admin. Click on `Upload Plugin` and browse for the zip file.
3. Activate the plugin.

== Usage ==

1. Once the plugin is active ?replytocom should function again, there are no further steps. 
2. To disable the override simply deactivate or remove the plugin.

== Changelog ==

### 1.0.0 ###
* Initial Release
