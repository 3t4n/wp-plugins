=== Refreshing Human Time Diff ===
Contributors: petersplugins
Tags: human time diff, postdate, postmeta, date, time, refresh, classicpress
Requires at least: 4.0
Tested up to: 5.5
Stable tag: 3.1
Requires PHP: 5.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Automatically refresh Human Readable Time Differences

== Description ==

The [Refreshing Human Time Diff](http://petersplugins.com/free-wordpress-plugins/refreshing-human-time-diff/) plugin automatically refreshes Human Readable Time Differences

== Usage ==

If your theme shows the date an article was posted in a human readable time difference - such as e.g. "posted 2 mins ago" - this plugin refreshes the time difference once a minute.

On the one hand this is a nice feature for your visitors - and on the other hand this allows you to use a caching plugin! All human readable time differences are updated immediately on page load. 

You don't have to change anything. Just activate this plugin and forget.

== Support ==

[Support Forum](https://wordpress.org/support/plugin/refreshing-human-time-diff/)

== Do you like this plugin? ==

I spend a lot of my precious spare time to develop and maintain my free WordPress plugins. You don’t need to make a donation. No money, no beer, no coffee. If you like this plugin then please do me a favor and [give it a good rating](https://wordpress.org/support/plugin/refreshing-human-time-diff/reviews/). Thanks.

== Plugin Privacy Information ==

* This plugin does not set cookies
* This plugin does not collect or store any data
* This plugin does not send any data to external servers

[Peters' Plugins Privacy Information Page](https://petersplugins.com/plugin-privacy-information/)

== ClassicPress ==

This plugin is compatible with [ClassicPress](https://www.classicpress.net/).

== More plugins from Peter ==

* **[404page](https://wordpress.org/plugins/404page/)** - Define any of your WordPress pages as 404 error page 
* **[smart User Slug Hider](https://wordpress.org/plugins/smart-user-slug-hider/)** - Hide usernames in author pages URLs to enhance security 
* **[hashtagger](https://wordpress.org/plugins/hashtagger/)** - Tag your posts by using #hashtags
* [See all](https://profiles.wordpress.org/petersplugins/#content-plugins)

== Stay up to date ==

[Follow me on Facebook](https://www.facebook.com/petersplugins/)

== Frequently Asked Questions ==

= Will this work with my theme? =

As long as your plugin uses the WordPress function [human_time_diff()](https://developer.wordpress.org/reference/functions/human_time_diff/) this plugin will work.

= What about translation? =

This plugin makes use of the translations coming with WordPress used for the [human_time_diff()](https://developer.wordpress.org/reference/functions/human_time_diff/) function. So there's no extra translation.

= What about different time zones or a wrong time set on the visitors device? =

You don't have to care about. The plugin sends a reference time to the browser which is considered on calculating the time difference.

= Will it work with a caching plugin? =

That's what this plugin originally was made for! All human readable time differences are updated immediately when a page is loaded. Visitors will see only the proper value.

= Will it work with Infinte Scroll? =

Yes, also posts loaded by Ajax are processed.

= Will there be extra server load? =

No, the refreshs are done locally.

= What else is there to know? =

All human readable time differences are updated once immediately on page load to show the proper value for cached pages. After that the values are refreshed once a minute as long as the time difference is less than 2 days.

== Changelog ==

= 3.1 (2019-03-11) =
* stupid mistake fix

= 3 (2019-03-11) =
* UI improvements
* code improvement

= 2 (2018-04-17) =
* minor code- & UI-improvements

= 1.1 (2017-11-16) =
* faulty display in WP 4.9 fixed

= 1.0 (2017-10-18) =
* Initial Release

== Upgrade Notice ==

= 3.1 =
stupid mistake fix

= 3 =
some improvements, no functional changes

= 2 =
minor code- & UI-improvements

= 1.1 =
faulty display in WP 4.9 fixed