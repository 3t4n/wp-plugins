=== 500px Image Showcase Lite ===
Contributors: inceptive
Plugin Name: 500px Image Showcase Lite
Plugin URI: http://extend.inceptive.gr/500px-image-showcase-lite/
Author URI: http://www.inceptive.gr
Author: Inceptive Design Labs
Tags: 500px, image, gallery, showcase, slider
Requires at least: 2.9.0
Tested up to: 3.5
Version: 1.1
License: GPLv2 or later

Image showcase from 500px photography community.

== Description ==

Image showcase from 500px photography community. This lite version of 500px Image Showcase does not include the full set of features that are available in the premium version. To see all the features available in the premium versions, check our [extensions website](http://extend.inceptive.gr/500px-image-showcase/ "Inceptive Extensions").

= Shortcode =

The shortcode must have the form [500px feature="popular"]. The arguments you can use are:

* feature: popular, upcoming, editors, fresh_today, fresh_yesterday, fresh_week, user, user_favorites, user_friends, tag
* username: if you chose user, user_favorites or user_friends as feature, you must set the username
* tag: if you chose tag as feature, you must set the tag
* num: the number of photos you want to show
* caption: "on" for showing captions or "off" for not showing (default is "on")
* post_or_page: "1" for showing only in posts and pages or "0" for showing everywhere (default is "1")

Example:

[500px feature="user_favorites" username="tchebotarev" num="5" caption="off" post_or_page="1"]

= Widget =

Go to Appearance -> Widgets and add ".:: Inceptive: ::.&nbsp;500px Widget" in the sidebar you want. Set the options of the widget and you are ready!

== Installation ==

1. Upload the entire inceptive-500px-image-showcase-lite folder to the /wp-content/plugins/ directory.
2. Activate the plugin through the ‘Plugins’ menu in WordPress.
3. Register a new application in 500px developers site.
4. Copy your consumer key and paste it into the Consumer Key field of 500px Image Showcase settings page in the WordPress admin panel.

== Frequently Asked Questions ==

= What features are supported? =

Shortcode support for posts/pages usage and widget support.

= Which 500px API calls are supported? =

Popular, fresh, upcoming, user photos, user favorites, user friends photos and tag based search

== Screenshots ==

1. Simple Gallery
2. Widget Settings
3. 500px Image Showcase Settings

== Changelog ==

= 1.0 = 
* Initial Release

= 1.1 = 
* Added caption removal option
* Added option to choose whether to show only in post and pages or everywhere
* Fixed minor bugs

== Upgrade Notice ==

Initial Release