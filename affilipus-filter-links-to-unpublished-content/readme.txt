=== Affilipus: Filter Broken Links ===
Contributors: Zaglov, imbaa
Tags: filter, affilipus
Requires at least: 4.0.0
Tested up to: 4.7.1
Stable tag: 1.1.7
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This Plugin filters Links to broken pages.

== Description ==

This plugin filters links to broken pages. If a link returns a 404 tha Link is filtered from the content.
The Link-Text stays and is wrapped in a span, so you can style broken links if you want.

The Links are checked every 24 hours.
If you update a Post the Links in the post will be rechecked automatically.

Please be aware that this can cause some additional loading time on the first page load as the plugin is fetching the Links and checks if the sites are available.

Please let us know about features you would like to see in future releases!

**How to use**

Just install the Plugin, the rest is magic.

== Installation ==

1. Upload the Plug-In Direcotry into the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= Is there a way to enable the filter only on some pages? =

No there is not, but there will be a way soon.

== Changelog ==

= 1.1.7 =

* Fixed problems with malformed urls

= 1.1.6 =

* Minor fix which caused performance issues. Thx to Max

= 1.1.5 =

* Fixed: Relative Links and Anchor-Links would be filtered out - now they won't be

= 1.1.4 =

* Added Cronjob to check broken links every hour
* Added Cronjob to delete Metadata for borken links which are older than 24 hours
* Added functionality to check links on update of a post

= 1.1.3 =

* Removed error caused by missing file

= 1.1.0 =

* Check through HTTP-Response-Code
* Cache Results
* Auto Purge results on update or expired links

= 1.0.0 =

* First working Release of the Plugin
