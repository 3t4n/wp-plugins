=== Plugin Activation Tracker ===

Contributors: galaxyweblinks
Tags: plugins, plugin info, plugin status, plugin tracker, tracker
Requires at least: 4.9 or higher
Tested up to: 6.7
Stable tag: 3.5
Requires PHP: 7.4
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Keep track of plugins you activate or deactivate through the dashboard by viewing when each and every one of them was enabled or disabled.

== Description ==

Keep track of plugins you activate or deactivate through the dashboard by viewing when each and every one of them was enabled or disabled.

This plugin allows storing plugin status tracker records for 60 days. Site administrator can customize the duration as their requirements.

Current features:

* Adds new columns on the plugins dashboard screen that shows when each plugin was activated and deactivated with author name and IP address.
* Supported on multisite.
* Control whether you'd like to see a relative date or a "regular" date as set under Settings > General

While by default the date & time settings are being used, you can always change the date format by filtering 'pat_date_time_format_gwl'. For instance:

`<?php

add_filter( 'pat_date_time_format_gwl', 'my_pat_date_time_format_gwl' );
function my_pat_date_time_format_gwl( $date_format ) {
	return 'm-d-Y';
}
`

Here's some more info on [date & time formatting in WordPress](http://codex.wordpress.org/Formatting_Date_and_Time)

Here’s a link to the documentation for the plugin. This will help you learn more about its features and how to use it.
<strong><strong>[Documentation](https://wp-plugins.galaxyweblinks.com/wp-plugins/plugin-activation-tracker/doc/)</strong>
For any feedback or queries regarding this plugin, please contact our [Support team](https://wp-plugins.galaxyweblinks.com/contact/).

== Installation ==

1. Download and extract in your `wp-content/plugins` directory
1. Activate the plugin through the Plugins menu in WordPress
1. You're all set!


== Frequently Asked Questions ==


= Installation Instructions =
STANDARD INSTALLATION
Upload plugin-activation-tracker folder to the /wp-content/plugins/ directory
Activate the plugin through the ‘Plugins’ menu in WordPress

MU-PLUGINS INSTALLATION
Upload the plugin-activation-tracker folder to the /wp-content/mu-plugins/ directory (if that directory does not exist, you can create it)
Move plugin-activation-tracker.php out of /wp-content/mu-plugins/plugin-activation-tracker/ and directly into /wp-content/mu-plugins/

= Will this work on a multisite installation? =
Yes. If you need to see the activation status of plugins in a standard WP install, you can simply go to Plugins -> Installed Plugins in your admin area. This plugin is specifically developed for non-multisite, multisite and multi-network installs of WordPress.

= How will change the date format? = 
Go to the general settings option and scroll on the bottom. The option will be there.

= How many days we can store status record? =
It can store 60 days but you can customize it according to your requirements. To customize go to the Dashboard > Settings > General

== Screenshots ==

1. Display the last Activated/Deactivated by Time.
2. Change the date and time format.
3. Display the last Activated/Deactivated by Date.
4. Plugin Status tracker recoreds

== Changelog ==

= 3.5 =
Stable Release.

= 3.4 =
Stable Release.

= 3.3 =
Stable Release.

= 3.2 =
Stable Release.

= 3.1 =
Stable Release.

= 3.0 =
Fixed - Minor issues.

= 2.0 =

= 1.0 =
* Initial release

== Upgrade Notice ==

= 3.5 =
Stable Release.

= 3.4 =
Stable Release.

= 3.3 =
Stable Release.

= 3.2 =
Stable Release.

= 3.1 =
Stable Release.

= 3.0 =
Fixed - Minor issues.

= 2.0 =

= 1.0 =
* Initial release
