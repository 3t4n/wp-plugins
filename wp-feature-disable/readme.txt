=== Plugin Name ===
Contributors: GKauten
Donate link: http://www.gkauten.com/playground
Tags: WordPress, Disable, Functions
Requires at least: 2.8
Tested up to: 2.8.6
Stable tag: 1.0

Disables a collection of WordPress features that can help your blog run more efficiently and smoother.

== Description ==

Disables a collection of WordPress features that can help your blog run more efficiently and smoother.
This includes functions such as the auto-save and revision tracking features used on the post and page 
editor sections which can help reduce database size by eliminating the build up of revisions which exist 
purely for administrative purposes and reduce server load. Other functions include the comment author URL, 
WordPress 'Generator' tag, and more.

Special thanks to John Blackbourn (http://johnblackbourn.com/) for his explorations of the Core Update system.

== Installation ==

1. Upload 'wp-feature-disable.php' to the '/content/plugins/' directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Visit the 'WP Function Disable' sub-menu under the 'Settings' menu in WordPress.
1. Select which functions you would like to disable and click 'Update'.
1. Once your settings have been saved, the selected functions will then be disabled.

== Frequently Asked Questions ==

= Will this plugin disable mission critical functions? =

No. This plugin is designed to only allow you to disable certain functions that would be considered
value-adding for convenience (often at a cost of some sort), or un-neccessary.

== Screenshots ==

1. Displays the administration panel for the plugin and available options.

== Changelog ==

= 1.0 =
* Initial release.

`<?php code(); // goes in backticks ?>`