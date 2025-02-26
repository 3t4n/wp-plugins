=== Freecaster ===
Contributors: fcalexis
Donate link: http://freecaster.tv
Tags: player, embed, jwplayer, video, video player, vod, live, streaming, html5
Requires at least: 4.0
Tested up to: 4.8.1
Stable tag: 1.1.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin allows you to embed videos from the Freecaster Platform.

== Description ==

Freecaster is a video on demand (VOD) and live streaming platform. This plugin allows you to embed videos from the Freecaster Platform, contact [Freecaster](http://freecaster.tv/) team to obtain your API credentials.

== Installation ==

First of all download our WordPress Freecaster plugin ZIP file, or search for it through the admin.

Installing the WordPress Freecaster plugin :

1. Upload the plugin files to the `/wp-content/plugins/freecaster` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the Settings->Freecaster screen to configure the plugin
4. Enter your API access to ensure a fully functionnal installation with live search and remote upload

That's all, now you can insert video from your Freecaster account in your posts and pages.

== Frequently Asked Questions ==

Our WordPress Freecaster plugin is user friendly, but here are some frequently asked questions that can help you.

= How to get the API access settings =

Please contact your Freecaster representative to obtain your API credentials.

== Screenshots ==

1. Search result with insertion screen
2. Live search window
3. Settings page

== Changelog ==

= 1.1.2 =
* Small fixes for local development (site_url added to avoid paths errors)
* Added a curl_file_create() alias for PHP < 5.5
* Check compatibility with latest WordPress release

= 1.1 =
* Adding ability to remotely upload a video
* Update of Freecaster API class

= 1.0 =
* Publication review, fixes bugs requested by Wordpress

= 0.9 =
* First public version
* Pre-release of the final version

= 0.6 =
* Adding translation

= 0.4 =
* Adding API access

= 0.1 =
* Initial release of the plugin with basic functionnality

== Upgrade Notice ==

= 1.0 =
Compliance with WordPress recommendations

= 0.9 =
First public finalised version with all bugfix.

== Other Notes ==

Here is some additional information.

Default options:

* Autostart video are off
* Width size are set to 100% (of container)