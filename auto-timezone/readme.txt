=== Auto-Timezone Plugin ===
Contributors: immortaltako
Author: Kevin Smithwick - kevin@smithwickdesign.com
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7UAEH3GMKPHRS
Tags: time, date, auto, automatically, timezone, time zone, time, zone, calendar, world clock, clock, maxmind, auto timezone, auto time zone
Requires at least: 3.0
Tested up to: 3.9
Stable tag: 1.2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
License: GPLv2 or later

Determines and set the timzone based on the user's remote IP address automatically


== Description ==

Auto-Timezone uses MaxMind's free GeoLiteCity.dat database to determine the visitor's country and region. Based on that information, it then determines and automatically sets the timezone using date_default_timezone_set

== Installation ==

1. Copy the 'auto_timezone' directory into your WordPress Plugins directory (usually wp-content/plugins). Hint: You can also conduct this step within your Admin Menu.

2. In the WordPress Admin Menu go to the Plugins tab and activate the Auto-Timezone plugin.

3. That's it. All date/time PHP functions will now execute using the visitor's timezone automatically

== Note ==

This plugin using php-mbstring library. Be sure to have it installed (http://us3.php.net/mb-string)

== Frequently Asked Questions ==

N/A

== Changelog ==

= 1.2 =
* Changed hook priority
* Optimized code and added more documentation

= 1.1 =
* Default to the wordpress timezone setting if auto detect fails

== Upgrade Notice ==

N/A

== Screenshots ==

N/A