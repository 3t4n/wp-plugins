=== AJAX Heartbeat Tool ===
Contributors: vizkr
Tags: ajax, heartbeat
Requires at least: 3.8
Tested up to: 5.7.2
Stable tag: 3.8
License: BSD(3 Clause)
License URI: http://opensource.org/licenses/BSD-3-Clause

Provides a method of turning the WordPress heartbeat off as well as change some settings.

== Description ==

Provides a method of turning the WordPress heartbeat off as well as change some settings. We use this plugin at RD because the heartbeat was clobbering site performance when more than one editor was logged into the CMS. In the future I plan to add the ability to adjust the settings.

+ Disables admin-ajax.php except on the posts, post edit & quick edit pages
+ Disables hearbeat autostart
+ Sets the heartbeat interval to 60 seconds

== Installation ==

1. Upload `ajax-heartbeat-tool` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. The get_called_class() kind requires PHP5.3 or newer
   (http://php.net/manual/en/function.get-called-class.php)

== Frequently Asked Questions ==

= Is there a setting or options page? =

Currently no, but in the future I plan to add the ability to adjust the settings.

== Screenshots ==

1. Since there's no settings page there is nothing to see here... yet. 

== Changelog ==

= 1.4.1 =
* Confirmed WordPress 5.7.2 compatibility.

= 1.4 =
* Refactored the singleton creator, eliminating the reliance on get_called_class()

= 1.3 =
* minor development changes not pushed

= 1.2 =
* minor development changes not pushed

= 1.1 =
* Added 'Quick edit exclusion'
* Corrected misleading constants

= 1.0 =
* Initial stable version.

== Arbitrary section ==

This is my arbitrary section. There's really nothing special to add because this is truly a simple plugin with no settings or configuration. Turn it on and block the iframe content thieves. Much of this can also be achieve by working with a good hosting provider. If you are board then head over to my content site [JAFDIP](https://www.jafdip.com).



